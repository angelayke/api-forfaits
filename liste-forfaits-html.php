<?php
require_once 'controleurs/forfaits.php';
?>
<?php include_once('controleurs/forfaits.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>Liste forfaits html</title>
</head>
<body>
    <div class="container">
        <h1 class="my-4">API Forfaits</h1>
    </div>
    <!-- Affichage en mode "liste" -->
    <?php
    $controlerForfaits=new ControleurForfait;
    $controlerForfaits->afficherListe();
    ?>
</body>
</html>