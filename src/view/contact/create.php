<?php 

    if(isset($_POST) AND !empty($_POST) ){
        require_once '../../database/connect.php';


        $statement = $database->prepare('INSERT INTO contact VALUES (NULL, :nom, :prenom, :email, :telephone, :entreprise)');
        $statement->bindValue(':nom', $_POST["nom"], PDO::PARAM_STR);
        $statement->bindValue(':prenom', $_POST["prenom"], PDO::PARAM_STR);
        $statement->bindValue(':email', $_POST["email"], PDO::PARAM_STR);
        $statement->bindValue(':telephone', $_POST["telephone"], PDO::PARAM_STR);
        $statement->bindValue(':entreprise', $_POST["entreprise"], PDO::PARAM_STR);
    
        $isOK = $statement->execute();
        $response = $isOK? "Le contact a été créé avec succès" : "Une erreur s'est produite lors de la création du contact";
    }

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
    <?php if(!empty($response)): ?>
        <p class="notification"><?php echo $response; ?></p>   
    <?php endif; ?>

    <?php include '../template/navbar.php'; ?>

    <h1 id="form-title">Creer un contact</h1>

    <form action="/electronikAgenda/src/view/contact/create.php" method="post" class="form">
        <div class="form-input">
            <input type="text" id="nom" name="nom" placeholder="Nom" required>
        </div>
        <div class="form-input">   
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
        </div>
        <div class="form-input">
            <input class="material-symbols-outlined" type="email" id="email" name="email" placeholder="mail" required>
        </div>
        <div class="form-input">
            <input class="material-symbols-outlined" type="tel" id="telephone" name="telephone" placeholder="call" required>
        </div>
        <div class="form-input">
            <input class="material-symbols-outlined" type="text" id="entreprise" name="entreprise" placeholder="source_environment" required>
        </div>
        <div  class='btns'>
            <input class="btn" type="submit" value="Enregistrer">     
            <a class="btn" href="/electronikAgenda/index.php">Retour à la liste des contacts</a>
        </div>
    </form>
</body>
</html>