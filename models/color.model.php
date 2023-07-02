<?php

class ColorModel {
    private $conn;

    public function __construct() {
        require_once 'config.php';
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    }

    public function createColor($newColor) {
        // Instancier le modèle ColorModel
        $colorModel = new ColorModel();
        // Appeler la méthode createColor() pour ajouter une nouvelle couleur
        $newColor = "Nouvelle couleur";
        $colorModel->createColor($newColor);
        }
    

    public function getColors() {
        $query = 'SELECT NOM_COULEUR FROM couleur ORDER BY NOM_COULEUR';
        $colors = $this->conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $colors;
    }

    public function updateColor($colorId, $newName) {
        $query = 'UPDATE couleur SET NOM_COULEUR = :newName WHERE ID_COULEUR = :colorId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newName', $newName);
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