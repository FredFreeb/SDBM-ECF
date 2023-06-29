<?php

class beerModel {
    private $conn;

    public function __construct() {
        require_once 'config.php';
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    }

    public function getBeers() {
        $requeteComp = $this->conn->query('SELECT NOM_ARTICLE, VOLUME, NOM_MARQUE, NOM_COULEUR, NOM_TYPE 
                                            FROM article 
                                                JOIN marque ON article.ID_MARQUE = marque.ID_MARQUE 
                                                    JOIN couleur ON article.ID_COULEUR = couleur.ID_COULEUR
                                                        JOIN typebiere ON article.ID_TYPE = typebiere.ID_TYPE
                                                            GROUP BY NOM_MARQUE
                                                            ORDER BY NOM_MARQUE ' );
        $beers = $requeteComp->fetchAll(PDO::FETCH_ASSOC);
        return $beers;
    }
}
?>
