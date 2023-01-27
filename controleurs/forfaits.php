<?php
require_once './modeles/forfaits.php';

class ControleurForfait {

    function afficherListe () {
        $forfaits = modele_forfait::ObtenirTous();
        require './vue/forfaits/liste.php';
    }

function afficherUnForfait() {
    $forfait = modele_forfait::ObtenirUn($_GET['id']);
    require './vue/forfaits/forfait.php';
}

   /////// JSON //////
    /* GET */
    /* Fonction permettant de récupérer l'ensemble des produits et de les afficher au format JSON */
    function afficherJSON() {
        $forfaits = forfait::ObtenirTous();
        echo json_encode($forfaits);
    }


}

?>