<div class="container">
    <h2>Liste de forfaits</h2>
    <ul>
        <?php foreach ($forfaits as $forfait) {  ?> 
            <li><?= $forfait->nom ?> (Code <?= $forfait->code ?>)</li>
            <p>Catégorie: <?= $forfait->categories ?></p>
            <a class="btn btn-secondary" role="button" href="fiche-forfait-html.php?id=<?= $forfait->id ?>">Voir ce forfait</a>
            <br><br>
            <?php  } ?>
    </ul>
</div>