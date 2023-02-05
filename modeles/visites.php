<?php

require_once "./include/config.php";

class modele_visite {
    public $id; 
    public $nom_visite;
    public $duree_visite;
    public $prix_visite;

     /* Fonction permettant de construire un objet de type modele_visite */
    public function __construct($id, $nom_visite, $duree_visite, $prix_visite) {
        $this->id = $id;
        $this->nom_visite = $nom_visite;
        $this->duree_visite = $duree_visite;
        $this->prix_visite = $prix_visite;
        }

     /* Fonction permettant de se connecter à la base de données */
     static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        //pour eviter les caracteres speciaux
        mysqli_set_charset($mysqli,"utf8");

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;
            exit();
        } 

        return $mysqli;
    }

    /* Fonction permettant de récupérer l'ensemble des visites */
     public static function ObtenirTous() {
        $liste = [];
         $mysqli = self::connecter();
    
        $resultatRequete = $mysqli->query("SELECT id, nom_visite, duree_visite, prix_visite FROM visites_touristiques ORDER BY nom_visite");
    
        foreach ($resultatRequete as $enregistrement) {
                $liste[] = new modele_visite($enregistrement['id'], $enregistrement['nom_visite'], $enregistrement['duree_visite'], $enregistrement['prix_visite']);
        }
    
        return $liste;
    }

    /* Fonction permettant de récupérer un forfait en fonction de son identifiant */
    public static function ObtenirUn($id)
    {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM visites_touristiques WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("i", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸

            if ($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $visite = new modele_visite($enregistrement['id'], $enregistrement['nom_visite'], $enregistrement['duree_visite'], $enregistrement['prix_visite']);
            } else {
                echo "Erreur: Aucun enregistrement trouvé";
                exit();
            }

            $requete->close(); // Fermeture du traitement 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }
        return $visite;
    }
}

?>