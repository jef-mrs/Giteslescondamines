<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Electronic</title>
    <link rel="stylesheet" href="../../../css/styles.css">
</head>
<body>

    <?php include '../template/navbar.php'; ?>

    <h1 id="form-title">Creer un contact</h1>

    <form action="../../controler/contact/insert.php" method="post" class="form">
        <div class="form-input">
            <input type="text" id="nom" name="nom" placeholder="Nom" required>
        </div>
        <div class="form-input">   
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
        </div>
        <div class="form-input">
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-input">
            <input type="tel" id="telephone" name="telephone" placeholder="Telephone" required>
        </div>
        <div class="form-input">
            <input type="text" id="entreprise" name="entreprise" placeholder="Entreprise" required>
        </div>
        <input class="btn" type="submit" value="Enregistrer">
        <a class="btn" href="/electronikAgenda/index.php">Retour à la liste des contacts</a>

    </form>
</body>
</html>