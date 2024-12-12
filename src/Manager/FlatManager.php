<?php 

    namespace App\Manager;

    use Components\Manager\AbstractManager;
    use App\Model\Flat;

    class FlatManager extends AbstractManager {

        public function find(int $id) {
            return $this->readOne(Flat::class, [ 'id' => $id ]);
        }

        public function findOneBy(array $filters) {
            return $this->readOne(Flat::class, $filters);
        }

        public function findAll() {
            return $this->readMany(Flat::class);
        }

        public function add(Flat $flat) {
            return $this->create(Flat::class, [
                    'name' => $flat->getName(),
                    'description' => $flat->getDescription()
                ]
            );
        }

        public function edit(Flat $flat) {
            return $this->update(Flat::class, [
                    'name' => $flat->getName(),
                    'description' => $flat->getDescription(),
                ],
                $flat->getId()
            );
        }

        public function delete(Flat $flat) {
            return $this->remove(Flat::class, $flat->getId());
        }

    }

?>