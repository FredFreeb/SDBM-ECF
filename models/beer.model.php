<?php

class BeerModel {
    private $conn;

    public function __construct() {
        $dbHost = 'localhost';
        $dbName = 'sdbm_v2';
        $dbUser = 'root';
        $dbPass = '';
        // require_once 'config.php';
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    }

    public function getBeers() {
        $requeteComp = $this->conn->query('SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
                                            FROM article 
                                            JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
                                            JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
                                            JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE
                                            GROUP BY NOM_MARQUE
                                            ORDER BY NOM_MARQUE');
        $beers = $requeteComp->fetchAll(PDO::FETCH_ASSOC);
        return $beers;
    }
    public function getBeerByColors() {
        $query = 'SELECT ID_ARTICLE, NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
                        FROM article
                        JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR';
                        
        $colors = $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $colors;
    }
    public function updateBeer($beerId, $newName) {
        $query = 'UPDATE article SET NOM_ARTICLE = :newName WHERE ID_ARTICLE = :beerId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newName', $newName);
        $stmt->bindParam(':beerId', $beerId);
        $stmt->execute();
    }
}

?>