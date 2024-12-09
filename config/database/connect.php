<?php 

    $servername = 'localhost';
    $username = 'root';
    $password = '';

    //On établit la connexion
    $database = new PDO("mysql:host=$servername;dbname=agenda", $username, $password);
    $message = "";
    if(!$database) {
         $message = "Erreur lors de la connexion à la base de données.";
    } else {
        $message = "connexion réussi";
    } 

?>