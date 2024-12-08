<?php 

    require 'src/database/connect.php';
    $statement = $database->prepare('SELECT * FROM contact ORDER BY nom ASC');
    if($statement->execute()){
        $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
        $message = "Recuperation des contacts réussi";
    }else{
        $message = "Erreur lors de la récupération des contacts.";
        exit;  // Stop le script si une erreur survient. ici, on ne fait rien de plus.
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Electronic</title>
    <link rel="stylesheet" href="web/css/styles.css">

</head>
<body>
    <p class="notification"><?php echo $message; ?></p>
    <?php include 'web/view/template/navbar.php'; ?>
    <h1 id="list-title">Liste des contacts</h1>
    <?php if(isset($contacts) AND !empty($contacts)): ?>
        <div class="list">
            <?php foreach($contacts as $contact):?>
                <div class="list-item">
                    <h4><span class="material-symbols-outlined">person</span><?php echo $contact['prenom']. " ".$contact['nom'] ?></h4>
                    <p><span class="material-symbols-outlined">mail</span><?php echo $contact['email']?></p>
                    <p><span class="material-symbols-outlined">call</span><?php echo $contact['telephone']?></p>
                    <p><span class="material-symbols-outlined">source_environment</span><?php echo $contact['entreprise']?></p>
                </div>
            <?php endforeach;?>
        </div>
    <?php else: ?>
        <p>Aucun contact trouvé.</p>
    <?php endif;?>

</body>
</html>