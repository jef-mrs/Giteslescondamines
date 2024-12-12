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
        }
    }


?>