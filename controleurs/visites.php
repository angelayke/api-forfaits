<?php
require_once './modeles/visites.php';

class ControleurVisite {

    function afficherListe () {
        $visites = modele_visite::ObtenirTous();
        require './vue/visites/liste.php';
    }

    function afficherUneVisite() {
        $visite = modele_visite::ObtenirUn($_GET['id']);
        require './vue/visites/visite.php';
    }

    
  /////// JSON //////
    /* GET */
    /* Fonction permettant de récupérer l'ensemble des visites et de les afficher au format JSON */
    function afficherJSON() {
        $visites = modele_visite::ObtenirTous();
        echo json_encode($visites);
    }


    /* GET */
    /* Fonction permettant de récupérer une des visite et de l'afficher au format JSON */
    function afficherFicheJSON() {
        $visite = modele_visite::ObtenirUn($_GET['id']);
        echo json_encode($visite);
    }

}

?>