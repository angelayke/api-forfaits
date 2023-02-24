<?php

require_once "./include/config.php";

class modele_etablissement {
    public $nomEtablissement; 

    public function __construct($nomEtablissement) {
        $this->nomEtablissement = $nomEtablissement;

    }

}

class modele_forfait {
    public $id; 
    public $nom;
    public $description;
    public $code;
    public $categories;
    public $etablissement;
    public $dateDebut;
    public $dateFin;
    public $prix;
    public $nouveau_prix;
    public $premium;


    /* Fonction permettant de construire un objet de type modele_forfait */
    public function __construct($id, $nom, $description, $code, $categories, $nom_etablissement, 
                                $date_debut, $date_fin, $prix, $nouveau_prix, $premium, $avis) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->code = $code;
        $this->categories = $categories;
        $this->etablissement = new modele_etablissement($nom_etablissement);
        $this->dateDebut = $date_debut;
        $this->dateFin = $date_fin;
        $this->prix = $prix;
        $this->nouveauprix = $nouveau_prix;
        $this->premium = $premium;

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

       /* Fonction permettant de récupérer un forfait en fonction de son identifiant */
    public static function ObtenirUn($id)
    {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM forfaits WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("i", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸

            if ($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $forfait = new modele_forfait($enregistrement['id'], $enregistrement['nom'], $enregistrement['description'], $enregistrement['code'], $enregistrement['categories'],
                                                $enregistrement['etablissement'], $enregistrement['date_debut'], $enregistrement['date_fin'], $enregistrement['prix'], 
                                                $enregistrement['nouveau_prix'], $enregistrement['premium'], $enregistrement['avis']);
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
        return $forfait;
    }

    /* Fonction permettant d'ajouter un forfait */
    public static function ajouter($nom, $description, $code, $categories, $etablissement, $date_debut, $date_fin, $prix, $nouveau_prix, $premium, $avis) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("INSERT INTO forfaits(nom, description, code, categories, etablissement, date_debut, date_fin, prix, nouveau_prix, premium, avis) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {      

        $requete->bind_param("sssssssddis", $nom, $description, $code, $categories, $etablissement, $date_debut, $date_fin, $prix, $nouveau_prix, $premium, $avis);

        if($requete->execute()) { // Exécution de la requête
            $message = "Forfait ajouté";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

     /* Fonction permettant de modifier un forfait */
    public static function modifier($id, $nom, $description, $code, $categories, $etablissement, $date_debut, $date_fin, $prix, $nouveau_prix, $premium, $avis) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("UPDATE forfaits SET nom=?, description=?, code=?, categories=?, etablissement=?, date_debut=?, date_fin=?, prix=?, nouveau_prix=?, premium=?, avis=? WHERE id=?")) {      

        $requete->bind_param("sssssssddisi", $nom, $description, $code, $categories, $etablissement, $date_debut, $date_fin, $prix, $nouveau_prix, $premium, $avis, $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Forfait modifié";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de la modification: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    /* Fonction permettant de supprimer un forfait */
    public static function supprimer($id) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("DELETE FROM forfaits WHERE id=?")) {      

        $requete->bind_param("i", $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Forfait supprimé";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }
}
?>