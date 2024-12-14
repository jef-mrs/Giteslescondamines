<div class="container">
    <img src="images/tournesol.jpg" alt="" class="image">
    <div class="texte">
        <h3 class="intro-title">
            Bienvenue en Provence
        </h3>
        <p class="intro-texte">
            André et Marjorie vous accueillent aux "Condamines en Luberon" dans leur propriété viticole de 7 hectares en plein cœur du Parc Régional du Luberon.
        </p>
        <p class="intro-texte">
            Dans une ambiance bucolique, vous trouverez calme, harmonie et douceur de vivre durant votre séjour et partagerez ce rythme si cher aux Provençaux, fait de nonchalance, spontanéité et chaleur humaine. 
        </p>
    </div>

    <h3 class="title">Nos logements</h3>
    <?php var_dump($_GET('flats')) ?>
    <div class="cards">
        <?php if($_GET('flats') !== NULL) :?>
            <?php $flats = $_GET('flats') ?>
            <?php foreach($flats as $flat) :?>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $flat->getName()?></h4>
                        <p class="card-text"><?php echo $flat->getDescription()?></p>
                        <a href="?path=flats/show&id=<?php echo $flat->getId()?>" class="btn">Voir plus</a>
                    </div>
                </div>
            <?php endforeach?>
        <?php else :?>
            <p class="intro-texte">Aucun logement disponible</p>
        <?php endif ?>
    </div>
    <a href="?path=flats/new" class="btn">Ajouter logement</a>
    <?php if(isset($_GET['reponse'])) :?>
        <div class="notification"><?php echo $_GET['reponse'] ?></div>
    <?php endif ?>
</div>