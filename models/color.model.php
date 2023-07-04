<?php
class ColorModel {
    private $conn;

    public function __construct() {
        require 'config.php';
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    }

    public function createColor($newId, $newColor) {
        $query = 'INSERT INTO couleur (ID, NOM_COULEUR) VALUES (:newId, :newColor)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newId', $newId);
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

    public function getMaxColorId() {
        $query = 'SELECT MAX(ID) AS max_id FROM couleur';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $maxId = $stmt->fetchColumn();
        return $maxId;
    }

    public function updateColor() {
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