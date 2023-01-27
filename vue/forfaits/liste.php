<div class="container">
    <h2>Liste de forfaits</h2>
    <ul>
        <?php foreach ($forfaits as $forfaits) {  ?> 
            <li><?= $forfait->nom ?> (Code <?= $forfait->code ?>)</li>
            <a class="btn btn-secondary" role="button" href="fiche-forfait-html.php?id=<?= $forfait->id ?>">Plus de détails</a>
        <?php  } ?>
    </ul>
</div>