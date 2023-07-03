<?php

class BeerModel {
    private $conn;

    public function __construct() {
        require 'config.php';
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    }

    public function createBeer($name, $volume, $marqueId, $couleurId, $typeId) {
        $query = 'INSERT INTO article (NOM_ARTICLE, VOLUME, ID_MARQUE, ID_COULEUR, ID_TYPE) 
                    VALUES (:name, :volume, :marqueId, :couleurId, :typeId)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':volume', $volume);
        $stmt->bindParam(':marqueId', $marqueId);
        $stmt->bindParam(':couleurId', $couleurId);
        $stmt->bindParam(':typeId', $typeId);
        $stmt->execute();
    }

    public function getBeers($colorId = "") {
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
    }

    public function updateBeer($beerId, $newName) {
        $query = 'UPDATE article SET NOM_ARTICLE = :newName WHERE ID_ARTICLE = :beerId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newName', $newName);
        $stmt->bindParam(':beerId', $beerId);
        $stmt->execute();
    }

    public function deleteBeer($beerId) {
        $query = 'DELETE FROM article WHERE ID_ARTICLE = :beerId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':beerId', $beerId);
        $stmt->execute();
    }
}

?>