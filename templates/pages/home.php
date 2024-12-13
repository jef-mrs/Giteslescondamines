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
    
    <a href="?path=flats/new" class="btn">Ajouter logement</a>
    <?php if(isset($_GET['reponse'])) :?>
        <div class="notification"><?php echo $_GET['reponse'] ?></div>
    <?php endif ?>
</div>