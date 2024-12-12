<?php 

    namespace Components\Manager;

    require dirname(__DIR__, 2).'/config/database.php';

    abstract class AbstractManager {

        private function connect() {
            // Implementation de la connexion à la base de données
            $db = new \PDO(
                "mysql:host=".DB_INFOS['host'].";port=".DB_INFOS['PORT'].";dbname=".DB_INFOS['dbname'],
                DB_INFOS['username'],
                DB_INFOS['password']
            );
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $db->exec("SET NAMES utf8");
            return $db;
        }

        private function executeQuery(string $query, array $params=[]): \PDOStatement{
            $db = $this->connect();
            $stmt = $db->prepare($query);
            foreach ($params as $key => $param) $stmt->bindValue($key, $param);
            $stmt->execute();
            return $stmt;
        }

        private function getTableName(string $class): string {
            if(defined($class.'::TABLE_NAME')){
                $table = $class::TABLE_NAME;
            } else {
                $tmp = explode('\\', $class);
                $table = strtolower(end($tmp));
            }
            return $table;
        }

        protected function readOne(string $class, array $filters): mixed {
            $query = 'SELECT * FROM '.$this->getTableName($class).'WHERE';
            foreach(array_keys($filters) as $filter){
                $query .= $filter." = :".$filter;
                if($filter != array_key_last($filters)) $query .= ' AND';
            }
            $stmt = $this->executeQuery($query, $filters);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
            return $stmt->fetch();
        }

        protected function readMany(string $class, array $filters = [], array $order = [], int $limit = null, int $offset = null): mixed {
            $query = ' SELECT * FROM ' . $this->getTableName($class);

            if (!empty($filters)) {
                $query .= ' WHERE ';
                foreach (array_keys($filters) as $filter) {
                    $query.= $filter.' = :'.$filter;
                    if ($filter!= array_key_last($filters)) $query.='AND ';
                }
            }

            if (!empty($order)) {
                $query.='ORDER BY ';
                foreach ($order as $field => $direction) {
                    $query.= $field.' '.$direction;
                    if ($field!= array_key_last($order)) $query.=', ';
                }
            }

            if ($limit!== null) {
                $query.='LIMIT '.$limit;
                if ($offset!== null) {
                    $query.='OFFSET '.$offset;
                }
            }

            $stmt = $this->executeQuery($query, $filters);
            $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
            return $stmt->fetchAll();
        }

        protected function create(string $class, array $fields): \PDOStatement {
            $query = "INSERT INTO " . $this->getTableName($class) . " (";
            foreach (array_keys($fields) as $field) {
                $query .= $field;
                if ($field != array_key_last($fields)) $query .= ', ';
            }
            $query .= ') VALUES (';
            foreach (array_keys($fields) as $field) {
                $query .= ':' . $field;
                if ($field != array_key_last($fields)) $query .= ', ';
            }
            $query .= ')';
            return $this->executeQuery($query, $fields);
        }

        protected function update(string $class, array $fields, int $id): \PDOStatement {
            $query = "UPDATE " . $this->getTableName($class) . " SET ";
            foreach (array_keys($fields) as $field) {
                $query .= $field . " = :" . $field;
                if ($field != array_key_last($fields)) $query .= ', ';
            }
            $query .= ' WHERE id = :id';
            $fields['id'] = $id;
            return $this->executeQuery($query, $fields);
        }

        protected function remove(string $class, int $id): \PDOStatement {
            $query = "DELETE FROM " . $this->getTableName($class) . " WHERE id = :id";
            return $this->executeQuery($query, [ 'id' => $id ]);
        }
    
    }


?>