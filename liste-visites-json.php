<?php
    header('Content-Type: application/json');

    require_once 'controleurs/visites.php';
    $controlerVisites=new ControleurVisite;
    $controlerVisites->afficherJSON();
?>