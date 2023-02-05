<div class="container">
    <h2>Liste de visites</h2>
    <ul>
        <?php foreach ($visites as $visite) {  ?> 
            <h3><?= $visite->nom_visite ?></h3>
            <p><em>Durée de la visite: <?= $visite->duree_visite ?></em></p>
            <p>Prix: <?= $visite->prix_visite ?>$</p>
            <!--<a class="btn btn-secondary" role="button" href="fiche-forfait-html.php?id=< ?= $forfait->id ?>">Voir ce forfait</a>-->
            <br><br>
            <?php  } ?>
    </ul>
</div>