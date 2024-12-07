<?php 

    require 'src/database/connect.php';
    $statement = $database->prepare('SELECT * FROM contact ORDER BY nom ASC');
    $isContact = $statement->execute();

    if($isContact){
        $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Electronic</title>
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>

    <?php include 'src/view/template/navbar.php'; ?>
    <h1 id="list-title">Liste des contacts</h1>
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
    </div>

</body>
</html>