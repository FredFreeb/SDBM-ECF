<?php
class colorModel {
    private $conn;

    public function __construct() {
        require_once 'config.php';
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    }

    public function getColors() {
        $requete = $this->conn->query('SELECT NOM_COULEUR FROM couleur ORDER BY NOM_COULEUR');
        $colors = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $colors;
    }

    public function createColor($newColor) {
        $query = 'INSERT INTO couleur (NOM_COULEUR) VALUES (:newColor)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newColor', $newColor);
        $stmt->execute();
    }
}    
?>