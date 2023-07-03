<?php
class ColorModel {
    private $conn;

    public function __construct() {
        require 'config.php';
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    }

    public function createColor($newColor) {
        $query = 'INSERT INTO couleur (NOM_COULEUR) VALUES (:newColor)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newColor', $newColor);
        $stmt->execute();
    }

    public function getColors() {
        $query = 'SELECT NOM_COULEUR, ID_COULEUR FROM couleur ORDER BY NOM_COULEUR';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $colors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $colors;
    }

    public function updateColor($colorId, $newColor) {
        $query = 'UPDATE couleur SET NOM_COULEUR = :newColor WHERE ID_COULEUR = :colorId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newColor', $newColor);
        $stmt->bindParam(':colorId', $colorId);
        $stmt->execute();
    }

    public function deleteColor($colorId) {
        $query = 'DELETE FROM couleur WHERE ID_COULEUR = :colorId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':colorId', $colorId);
        $stmt->execute();
    }
}
  
?>