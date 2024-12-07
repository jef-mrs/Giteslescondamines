<?php 

    require_once '../../database/connect.php';


    $statement = $database->prepare('INSERT INTO contact VALUES (NULL, :nom, :prenom, :email, :telephone, :entreprise)');
    $statement->bindValue(':nom', $_POST["nom"], PDO::PARAM_STR);
    $statement->bindValue(':prenom', $_POST["prenom"], PDO::PARAM_STR);
    $statement->bindValue(':email', $_POST["email"], PDO::PARAM_STR);
    $statement->bindValue(':telephone', $_POST["telephone"], PDO::PARAM_STR);
    $statement->bindValue(':entreprise', $_POST["entreprise"], PDO::PARAM_STR);

    $isOK = $statement->execute();
    $response = $isOK? "Le contact a été créé avec succès" : "Une erreur s'est produite lors de la création du contact";
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Agenda Electronic</title>
            <link rel="stylesheet" href="../../../css/styles.css">
        </head>
        <body>
            <?php include '../../view/template/navbar.php' ?>
            <p><?php echo $response ?></p>
            <a class="btn" href="/electronikAgenda/index.php">Retour à la liste des contacts</a>
            
        </body>
    </html>