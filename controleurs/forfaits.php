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
    /* Fonction permettant de récupérer l'ensemble des forfaits et de les afficher au format JSON */
    function afficherJSON() {
        $forfaits = modele_forfait::ObtenirTous();
        echo json_encode($forfaits);
    }


    /* GET */
    /* Fonction permettant de récupérer un des forfait et de l'afficher au format JSON */
    function afficherFicheJSON() {
        $forfait = modele_forfait::ObtenirUn($_GET['id']);
        echo json_encode($forfait);
    }

    /* POST */
    /* Fonction permettant d'ajouter un forfait reçu au format JSON */
    function ajouterJSON($data) {   
        $resultat = new stdClass();
        if(isset($data['nom']) 
            && isset($data['description']) 
            && isset($data['code'])  
            && isset($data['etablissement']['nomEtablissement']) 
            && isset($data['dateDebut']) 
            && isset($data['dateFin']) 
            && isset($data['prix'])   ) {
        $resultat->message = modele_forfait::ajouter($data['nom'],
            $data['description'], 
            $data['code'], 
            '', 
            $data['etablissement']['nomEtablissement'], 
            $data['dateDebut'], 
            $data['dateFin'], 
            $data['prix'], 
            0, 
            false, 
           '');
        } else {
        $resultat->message = "Impossible d'ajouter un forfait. Des informations sont manquantes";
        }
        echo json_encode($resultat);
        }
    
    /* PUT */
    /* Fonction permettant de modifier un produit reçu au format JSON */
    function modifierJSON($data) {
        $resultat = new stdClass();
        if(isset($_GET['id']) 
            && isset($data['nom']) 
            && isset($data['description']) 
            && isset($data['code']) 
            && isset($data['categories']) 
            && isset($data['etablissement']['nomEtablissement']) 
            && isset($data['dateDebut']) 
            && isset($data['dateFin']) 
            && isset($data['prix']) 
            && isset($data['nouveauprix']) 
            && isset($data['premium'])  ) {
        $resultat->message = modele_forfait::modifier($_GET['id'], 
            $data['nom'],
            $data['description'], 
            $data['code'], 
            $data['categories'], 
            $data['etablissement']['nomEtablissement'], 
            $data['dateDebut'], 
            $data['dateFin'], 
            $data['prix'], 
            $data['nouveauprix'], 
            $data['premium'], 
            '');
        } else {
        $resultat->message = "Impossible de modifier le forfait. Des informations sont manquantes";
        require './vue/erreur.php';
        }
        echo json_encode($resultat);
        }
    
    /* DELETE */
    function supprimerJSON($id) {
        $resultat = new stdClass();
        $resultat->message = modele_forfait::supprimer($_GET['id']);
        echo json_encode($resultat);
        }
      
}

?>