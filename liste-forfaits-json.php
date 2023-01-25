<?php
    header('Content-Type: application/json');

    require_once 'controleurs/forfaits.php';
    $controlerForfaits=new ControleurForfait;
    $controlerForfaits->afficherJSON();
?>
