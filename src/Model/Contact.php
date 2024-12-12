<?php 

    class Contact {

        private $id;
        private $nom;
        private $prenom;
        private $email;
        private $telephone;
        private $message;
    
            const TABLE_NAME = "contact";

        //Column Id
        public function getId() {
            return $this->id;
         }

         //column nom
        public function getNom() {
            return $this->nom;
        }
        public function setNom($nom) {
            $this->nom = $nom;
        }

        //column prenom
        public function getPrenom() {
            return $this->prenom;
        }

        public function setPrenom($prenom) {
            $this->prenom = $prenom;
        }

        //column email
        public function getEmail() {
            return $this->email;
        }
        
        public function setEmail($email) {
            $this->email = $email;
        }

    
        //column telephone
        public function getTelephone() {
            return $this->telephone;
        }

        public function setTelephone($telephone) {
            $this->telephone = $telephone;
        }

        //column message
        public function getMessage() {
            return $this->message;
        }

        public function setEntreprise($message) {
            $this->message= $message;
        }






    }


?>