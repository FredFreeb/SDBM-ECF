<?php

class BeerModel {
    private $conn;

    public function __construct() {
        require 'config.php';
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4;unix_socket=$dbSocket", $dbUser, $dbPass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getNextPrimaryKeyValue($tableName, $primaryKeyColumnName) {
        $query = "SELECT MAX($primaryKeyColumnName) AS max_id FROM $tableName";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $maxId = $result['max_id'];
        $nextId = $maxId + 1;
        return $nextId;
    }

    // public function getAllBeers() {
    //     $query = 'SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
    //                 FROM article 
    //                     JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
    //                     JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
    //                     JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE
    //                         ORDER BY ID_ARTICLE ASC';
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function getBeersById($articleId) {
        $query = "SELECT * FROM article WHERE ID_ARTICLE = :articleId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':articleId', $articleId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getBeers($colorId = "", $typeId = "", $marqueId = "") {
        $query = 'SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
                    FROM article 
                        JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
                        JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
                        JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE';
        $conditions = [];
        $params = [];

        if (!empty($colorId)) {
            $conditions[] = 'couleur.ID_COULEUR = :colorId';
            $params[':colorId'] = $colorId;
        }

        if (!empty($typeId)) {
            $conditions[] = 'typebiere.ID_TYPE = :typeId';
            $params[':typeId'] = $typeId;
        }

        if (!empty($marqueId)) {
            $conditions[] = 'marque.ID_MARQUE = :marqueId';
            $params[':marqueId'] = $marqueId;
        }

        if (!empty($conditions)) {
            $query .= ' WHERE ' . implode(' AND ', $conditions);
        }

        $query .= ' ORDER BY ID_ARTICLE';

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    public function getVolumes() {
            $query = 'SELECT DISTINCT VOLUME FROM article';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $volume = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $volume;
    }
    
    public function getMarques() {
            $query = 'SELECT ID_MARQUE, NOM_MARQUE FROM marque';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $marques = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $marques;
    }

    public function getTypes() {
            $query = 'SELECT ID_TYPE, NOM_TYPE FROM typebiere';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $types;
    }

    public function create($nextId, $beerName, $titrage, $volume, $prixAchat, $marqueId, $couleurId, $typeId) {
            $nextId = $this->getNextPrimaryKeyValue('article', 'ID_ARTICLE');
            $query = 'INSERT INTO article (ID_ARTICLE, NOM_ARTICLE, TITRAGE, VOLUME, ID_MARQUE, ID_COULEUR, ID_TYPE, PRIX_ACHAT) 
                    VALUES (:nextId, :beerName, :titrage, :volume, :marqueId, :couleurId, :typeId, :prixAchat)';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nextId', $nextId);
            $stmt->bindParam(':beerName', $beerName);
            $stmt->bindParam(':titrage', $titrage);
            $stmt->bindParam(':volume', $volume);
            $stmt->bindParam(':prixAchat', $prixAchat);
            $stmt->bindParam(':marqueId', $marqueId);
            $stmt->bindParam(':couleurId', $couleurId);
            $stmt->bindParam(':typeId', $typeId);
            $stmt->execute();
    }
    
    public function update($articleId, $beerName, $titrage, $volume, $prixAchat, $marqueId, $couleurId, $typeId) {
            $query = "UPDATE article SET NOM_ARTICLE = :nom, TITRAGE = :titrage, VOLUME = :volume, PRIX_ACHAT = :prixAchat,
                        ID_MARQUE = :marqueId, ID_COULEUR = :couleurId, ID_TYPE = :typeId WHERE ID_ARTICLE = :id";  
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $articleId);
            $stmt->bindParam(':nom', $beerName);
            $stmt->bindParam(':titrage', $titrage);
            $stmt->bindParam(':volume', $volume);
            $stmt->bindParam(':prixAchat', $prixAchat);
            $stmt->bindParam(':marqueId', $marqueId);
            $stmt->bindParam(':couleurId', $couleurId);
            $stmt->bindParam(':typeId', $typeId);
            return $stmt->execute();
    }
    

    // public function delete($articleId) {
    //         $query = "DELETE FROM article WHERE ID_ARTICLE = :articleId";
    //         $stmt = $this->conn->prepare($query);
    //         $stmt->bindParam(':articleId', $articleId);
    //         return $stmt->execute();
    // }
    
    
    public function delete($articleId) {
            // Suppression des enregistrements associés dans la table vendre
            $this->deleteVendreRecords($articleId);
    
            // Suppression de la bière dans la table article
            $query = "DELETE FROM article WHERE ID_ARTICLE = :articleId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':articleId', $articleId);
            return $stmt->execute();
    }
    
    private function deleteVendreRecords($articleId) {
            $query = "DELETE FROM vendre WHERE ID_ARTICLE = :articleId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':articleId', $articleId);
            $stmt->execute();
    }
    
    public function getRandomBeers() {
            $query = 'SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
                    FROM article 
                        JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
                        JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
                        JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE
                            ORDER BY RAND()
                            LIMIT 5';

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>