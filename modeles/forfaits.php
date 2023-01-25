<?php

require_once "./include/config.php";

class modele_forfait {
    public $id; 
    public $nom;
    public $description;
    public $code;
    public $categories;
    public $etablissement;
    public $date_debut;
    public $date_fin;
    public $prix;
    public $nouveau_prix;
    public $premium;
    public $avis;

    /* Fonction permettant de construire un objet de type modele_forfait */
    public function __construct($id, $nom, $description, $code, $categories, $etablissement, 
                                $date_debut, $date_fin, $prix, $nouveau_prix, $premium, $avis) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->code = $code;
        $this->categories = $categories;
        $this->etablissement = $etablissement;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->prix = $prix;
        $this->nouveau_prix = $nouveau_prix;
        $this->premium = $premium;
        $this->avis = $avis;
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

         /* Fonction permettant de récupérer l'ensemble des forfaits */
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, nom, description, code, categories, etablissement, date_debut, date_fin, prix, nouveau_prix, premium, avis FROM forfaits ORDER BY nom");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_forfait($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['code'], $enregistrement['categories'], $enregistrement['etablissement'], $enregistrement['date_debut'], $enregistrement['date_fin'], $enregistrement['prix'], $enregistrement['nouveau_prix'], $enregistrement['premium'], $enregistrement['avis']);
        }

        return $liste;
    }
}
?>