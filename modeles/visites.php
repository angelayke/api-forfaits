<?php

require_once "./include/config.php";

class modele_forfait {
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
}

?>