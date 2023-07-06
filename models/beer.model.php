<?php

// class BeerModel {
//     private $conn;

//     public function __construct() {
//         require 'config.php';
//         $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
//         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     }

//     public function getNextPrimaryKeyValue($tableName, $primaryKeyColumnName) {
//         $query = "SELECT MAX($primaryKeyColumnName) AS max_id FROM $tableName";
//         $stmt = $this->conn->prepare($query);
//         $stmt->execute();
//         $result = $stmt->fetch(PDO::FETCH_ASSOC);
//         $maxId = $result['max_id'];
//         $nextId = $maxId + 1;
//         return $nextId;
//     }

//     public function getAllBeers() {
//         $query = 'SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
//                     FROM article 
//                         JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
//                         JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
//                         JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE
//                             ORDER BY ID_ARTICLE ASC';
//         $stmt = $this->conn->prepare($query);
//         $stmt->execute();
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }

//     public function getBeersById($articleId) {
//         $query = "SELECT * FROM article WHERE ID_ARTICLE = :articleId";
//         $stmt = $this->conn->prepare($query);
//         $stmt->bindParam(':articleId', $articleId);
//         $stmt->execute();
//         return $stmt->fetch(PDO::FETCH_ASSOC);
//     }

//     public function getBeers($colorId = "") {
//         try {
//             $query = 'SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
//                     FROM article 
//                     JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
//                     JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
//                     JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE';

//             if ($colorId !== "") {
//                 $query .= ' WHERE couleur.ID_COULEUR = :colorId';
//             }

//             $query .= ' ORDER BY NOM_MARQUE';

//             $stmt = $this->conn->prepare($query);

//             if ($colorId !== "") {
//                 $stmt->bindParam(':colorId', $colorId);
//             }

//             $stmt->execute();
//             $beers = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             return $beers;
//         } catch (PDOException $e) {
//             echo "Erreur lors de la récupération des bières : " . $e->getMessage();
//         }
//     }

//     public function getVolumes() {
//         try {
//             $query = 'SELECT DISTINCT VOLUME FROM article';
//             $stmt = $this->conn->prepare($query);
//             $stmt->execute();
//             $volumes = $stmt->fetchAll(PDO::FETCH_COLUMN);
//             return $volumes;
//         } catch (PDOException $e) {
//             echo "Erreur lors de la récupération des volumes : " . $e->getMessage();
//         }
//     }
    
//     public function getMarques() {
//         try {
//             $query = 'SELECT ID_MARQUE, NOM_MARQUE FROM marque';
//             $stmt = $this->conn->prepare($query);
//             $stmt->execute();
//             $marques = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             return $marques;
//         } catch (PDOException $e) {
//             echo "Erreur lors de la récupération des marques : " . $e->getMessage();
//         }
//     }

//     public function getTypes() {
//         try {
//             $query = 'SELECT ID_TYPE, NOM_TYPE FROM typebiere';
//             $stmt = $this->conn->prepare($query);
//             $stmt->execute();
//             $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             return $types;
//         } catch (PDOException $e) {
//             echo "Erreur lors de la récupération des types : " . $e->getMessage();
//         }
//     }

//     public function createBeer($beerName, $titrage, $marqueId, $volume, $couleurId, $typeId, $prixAchat) {
//         $nextId = $this->getNextPrimaryKeyValue('article', 'ID_ARTICLE');
//         $query = 'INSERT INTO article (ID_ARTICLE, NOM_ARTICLE, VOLUME, ID_MARQUE, ID_COULEUR, ID_TYPE, PRIX_ACHAT, TITRAGE) 
//                 VALUES (:nextId, :beerName, :volume, :marqueId, :couleurId, :typeId, :prixAchat, :titrage)';
//         $stmt = $this->conn->prepare($query);
//         $stmt->bindParam(':nextId', $nextId);
//         $stmt->bindParam(':beerName', $beerName);
//         $stmt->bindParam(':volume', $volume);
//         $stmt->bindParam(':prixAchat', $prixAchat);
//         $stmt->bindParam(':titrage', $titrage);
//         $stmt->bindParam(':marqueId', $marqueId);
//         $stmt->bindParam(':couleurId', $couleurId);
//         $stmt->bindParam(':typeId', $typeId);
//         $stmt->execute();
//     }
    
//     public function selectBeer($beerId) {
//         try {
//             $query = 'SELECT * FROM article WHERE ID_ARTICLE = :beerId';
//             $stmt = $this->conn->prepare($query);
//             $stmt->bindParam(':beerId', $beerId);
//             $stmt->execute();
//             $beer = $stmt->fetch(PDO::FETCH_ASSOC);
    
//             $stmt->bindParam(':marqueId', $marqueId);
//             $stmt->bindParam(':couleurId', $couleurId);
//             $stmt->bindParam(':volume', $volume);
    
//             $content = 'views/edit-beer.view.php';
//             include 'views/layout.php';
//         } catch (PDOException $e) {
//             echo "Erreur lors de la récupération de la bière : " . $e->getMessage();
//         }
//     }

//     public function updateBeer($articleId, $articleName) {
//         $query = "UPDATE article SET NOM_article = :nom WHERE ID_ARTICLE = :id";
//         $stmt = $this->conn->prepare($query);
//         $stmt->bindParam(':id', $articleId);
//         $stmt->bindParam(':nom', $articleName);
//         return $stmt->execute();
//     }

//     public function deleteBeer($articleId) {
//         $query = "DELETE FROM article WHERE ID_ARTICLE = :articleId";
//         $stmt = $this->conn->prepare($query);
//         $stmt->bindParam(':articleId', $articleId);
//         $stmt->bindParam(':nom', $articleName);
//         return $stmt->execute();
//     }

//     public function getRandomBeers() {
//         try {
//             $query = 'SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
//                     FROM article 
//                         JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
//                         JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
//                         JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE
//                             ORDER BY RAND()
//                             LIMIT 5';

//             $stmt = $this->conn->prepare($query);
//             $stmt->execute();
//             $beers = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             return $beers;
//         } catch (PDOException $e) {
//             echo "Erreur lors de la récupération des bières aléatoires : " . $e->getMessage();
//         }
//     }
// }
class BeerModel {
    private $conn;

    public function __construct() {
        require 'config.php';
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
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

    public function getAllBeers() {
        $query = 'SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
                    FROM article 
                        JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
                        JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
                        JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE
                            ORDER BY ID_ARTICLE ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBeersById($articleId) {
        $query = "SELECT * FROM article WHERE ID_ARTICLE = :articleId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':articleId', $articleId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

            $query .= ' ORDER BY ID_ARTICLE';

            $stmt = $this->conn->prepare($query);

            if ($colorId !== "") {
                $stmt->bindParam(':colorId', $colorId);
            }

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des bières : " . $e->getMessage();
            return [];
        }
    }

    public function getVolumes() {
        try {
            $query = 'SELECT DISTINCT VOLUME FROM article';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des volumes : " . $e->getMessage();
            return [];
        }
    }
    
    public function getMarques() {
        try {
            $query = 'SELECT ID_MARQUE, NOM_MARQUE FROM marque';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            echo "Erreur lors de la récupération des marques : " . $e->getMessage();
            return [];
        }
    }

    public function getTypes() {
        try {
            $query = 'SELECT ID_TYPE, NOM_TYPE FROM typebiere';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des types : " . $e->getMessage();
            return [];
        }
    }

    public function createBeer($beerName, $titrage, $marqueId, $volume, $couleurId, $typeId, $prixAchat) {
        try {
            $nextId = $this->getNextPrimaryKeyValue('article', 'ID_ARTICLE');
            $query = 'INSERT INTO article (ID_ARTICLE, NOM_ARTICLE, VOLUME, ID_MARQUE, ID_COULEUR, ID_TYPE, PRIX_ACHAT, TITRAGE) 
                    VALUES (:nextId, :beerName, :volume, :marqueId, :couleurId, :typeId, :prixAchat, :titrage)';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nextId', $nextId);
            $stmt->bindParam(':beerName', $beerName);
            $stmt->bindParam(':volume', $volume);
            $stmt->bindParam(':prixAchat', $prixAchat);
            $stmt->bindParam(':titrage', $titrage);
            $stmt->bindParam(':marqueId', $marqueId);
            $stmt->bindParam(':couleurId', $couleurId);
            $stmt->bindParam(':typeId', $typeId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la création de la bière : " . $e->getMessage();
        }
    }
    
    public function updateBeer($articleId) {
        try {
            $query = "UPDATE article SET NOM_ARTICLE = :nom WHERE ID_ARTICLE = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $articleId);
            $stmt->bindParam(':nom', $articleName);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour de la bière : " . $e->getMessage();
            return false;
        }
    }

    public function deleteBeer($articleId) {
        try {
            $query = "DELETE FROM article WHERE ID_ARTICLE = :articleId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':articleId', $articleId);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de la bière : " . $e->getMessage();
            return false;
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
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des bières aléatoires : " . $e->getMessage();
            return [];
        }
    }
}
?>