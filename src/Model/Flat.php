<?php 

    namespace App\Model;

    class Flat {
        
        private $id;
        private $name;
        private $description;

        const TABLE_NAME = 'flat';

        //Column Id
        public function getId() {
            return $this->id;
        }

        //column name

        public function getName() {
            return $this->name;
        }
        
        public function setName($name) {
            $this->name = $name;
        }

        //column description

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }
    }

?>