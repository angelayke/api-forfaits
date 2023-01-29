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


    /* GET */
    /* Fonction permettant de récupérer un des produits et de l'afficher au format JSON */
    function afficherFicheJSON() {
        $forfait = modele_forfait::ObtenirUn($_GET['id']);
        echo json_encode($forfait);
    }

    /* POST */
    /* Fonction permettant d'ajouter un produit reçu au format JSON */
   /*     $resultat = new stdClass();
        if(isset($data['nom']) && isset($data['description']) && isset($data['code']) && isset($data['categories']) && isset($data['etablissement']) && isset($data['date_debut']) && isset($data['date_fin']) && isset($data['prix']) && isset($data['nouveau_prix']) && isset($data['premium']) && isset($data['avis']) ) {
        $resultat->message = modele_forfait::ajouter($data['nom'], $data['description'], $data['code'], $data['categorie'],$data['etablissement'], $data['date_debut'], $data['date_fin'], $data['prix'], $data['nouveau_prix'], $data['premium'], $data['avis']);
        } else {
        $resultat->message = "Impossible d'ajouter un forfait. Des informations sont manquantes";
        }
        echo json_encode($resultat);
        }
    */
    /* PUT */
    /* Fonction permettant de modifier un produit reçu au format JSON */
  /*  function modifierJSON($data) {
        $resultat = new stdClass();
        if(isset($_GET['id']) && isset($data['nom']) && isset($data['description']) && isset($data['code']) && isset($data['categories']) && isset($data['etablissement']) && isset($data['date_debut']) && isset($data['date_fin']) && isset($data['prix']) && isset($data['nouveau_prix']) && isset($data['premium']) && isset($data['avis'])) {
        $resultat->message = modele_forfait::modifier($_GET['id'], $data['nom'], $data['description'], $data['code'], $data['categorie'],$data['etablissement'], $data['date_debut'], $data['date_fin'], $data['prix'], $data['nouveau_prix'], $data['premium'], $data['avis']);
        } else {
        $resultat->message = "Impossible de modifier le forfait. Des informations sont manquantes";
        require './vue/erreur.php';
        }
        echo json_encode($resultat);
        }
    */
    /* DELETE */
    function supprimerJSON($id) {
        $resultat = new stdClass();
        $resultat->message = modele_forfait::supprimer($_GET['id']);
        echo json_encode($resultat);
        }
        
}

?>