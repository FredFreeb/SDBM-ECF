<?php

class BeerModel {
    private $conn;

    public function __construct() {
        require 'config.php';
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function createBeer($name, $volume, $marqueId, $couleurId, $typeId) {
        try {
            $query = 'INSERT INTO article (NOM_ARTICLE, VOLUME, ID_MARQUE, ID_COULEUR, ID_TYPE) 
                    VALUES (:name, :volume, :marqueId, :couleurId, :typeId)';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':volume', $volume);
            $stmt->bindParam(':marqueId', $marqueId);
            $stmt->bindParam(':couleurId', $couleurId);
            $stmt->bindParam(':typeId', $typeId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la création de la bière : " . $e->getMessage();
        }
    }

    public function editBeer($beerId) {
        try {
            $query = 'SELECT * FROM article WHERE ID_ARTICLE = :beerId';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':beerId', $beerId);
            $stmt->execute();
            $beer = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $stmt->bindParam(':marqueId', $marqueId);
            $stmt->bindParam(':couleurId', $couleurId);
            $stmt->bindParam(':volume', $volume);
    
            $content = 'views/edit-beer.view.php';
            include 'views/layout.php';
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de la bière : " . $e->getMessage();
        }
    }
    
    public function getBeers($colorId = "") {
        try {
            $query = 'SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
                    FROM article 
                    JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
                    JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
                    JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE';

            if ($colorId !== "") {
                $query .= ' WHERE couleur.ID_COULEUR = :colorId';
            }

            $query .= ' ORDER BY NOM_MARQUE';

            $stmt = $this->conn->prepare($query);

            if ($colorId !== "") {
                $stmt->bindParam(':colorId', $colorId);
            }

            $stmt->execute();
            $beers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $beers;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des bières : " . $e->getMessage();
        }
    }
    public function getVolumes() {
        try {
            $query = 'SELECT DISTINCT VOLUME FROM article';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $volumes = $stmt->fetchAll(PDO::FETCH_COLUMN);
            return $volumes;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des volumes : " . $e->getMessage();
        }
    }
    
    public function getMarques() {
        try {
            $query = 'SELECT ID_MARQUE, NOM_MARQUE FROM marque';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $marques = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $marques;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des marques : " . $e->getMessage();
        }
    }
    
    public function getCouleurs() {
        try {
            $query = 'SELECT ID_COULEUR, NOM_COULEUR FROM couleur';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $couleurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $couleurs;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des couleurs : " . $e->getMessage();
        }
    }
    
    public function getTypes() {
        try {
            $query = 'SELECT ID_TYPE, NOM_TYPE FROM typebiere';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $types;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des types : " . $e->getMessage();
        }
    }
    
    public function getRandomBeers() {
        try {
            $query = 'SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
                    FROM article 
                    JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
                    JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
                    JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE
                    ORDER BY RAND()
                    LIMIT 5';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $beers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $beers;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des bières aléatoires : " . $e->getMessage();
        }
    }

    public function updateBeer() {
        try {
            $query = 'UPDATE article SET NOM_ARTICLE = :newName, PRIX_ACHAT = :newPrice, VOLUME = :newVolume, TITRAGE = :newTitration, ID_MARQUE = :newBrandId, ID_COULEUR = :newColorId, ID_TYPE = :newTypeId WHERE ID_ARTICLE = :beerId';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':newName', $newName);
            $stmt->bindParam(':newPrice', $newPrice);
            $stmt->bindParam(':newVolume', $newVolume);
            $stmt->bindParam(':newTitration', $newTitration);
            $stmt->bindParam(':newBrandId', $newBrandId);
            $stmt->bindParam(':newColorId', $newColorId);
            $stmt->bindParam(':beerId', $beerId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de la bière : " . $e->getMessage();
        }
    }
    


    public function deleteBeer($beerId) {
        try {
            $query = 'DELETE FROM article WHERE ID_ARTICLE = :beerId';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':beerId', $beerId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de la bière : " . $e->getMessage();
        }
    }
}

?>