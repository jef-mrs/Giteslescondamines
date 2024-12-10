<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Electronic</title>
    <link rel="stylesheet" href="/electronikAgenda/templates/css/styles.css">
</head>
<body>
    <?php if(!empty($response)): ?>
        <p class="notification"><?php echo $response; ?></p>   
    <?php endif; ?>

    <?php include '../partials/navbar.php'; ?>

    <h1 id="form-title">Creer un contact</h1>

    <form action="/electronikAgenda/templates/view/contact/create.php" method="post" class="form">
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
            <input class="btn material-symbols-outlined" type="submit" value="save">     
            <a class="btn btn-rotate material-symbols-outlined" href="/electronikAgenda/public/index.php">redo</a>
        </div>
    </form>
</body>
</html>

