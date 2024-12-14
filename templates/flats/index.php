<h1>bonjour</h1>

<?php echo var_dump(($_GET('flats'))) ?>

<?php $flats = $_GET('flats') ?>
<?php foreach($flats as $flat) :?>
    <h4><?php echo $flat->getName() ?></h4>
<?php endforeach ?>