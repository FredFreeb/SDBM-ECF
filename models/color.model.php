<?php
class ColorModel {
    private $conn;

    public function __construct() {
        require 'config.php';
        // quand je passe par mac alterner les lignes de connexion
        // $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4;unix_socket=$dbSocket", $dbUser, $dbPass);
        $this->conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
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

    public function getAllColor() {
        $query = "SELECT * FROM couleur";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getColor() {
        $query = 'SELECT NOM_COULEUR, ID_COULEUR FROM couleur ORDER BY NOM_COULEUR';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $colors = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $colors;
    }

    public function getColorById($colorId) {
        $query = "SELECT * FROM couleur WHERE ID_COULEUR = :colorId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':colorId', $colorId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($colorName, $nextId) {
        $query = "INSERT INTO couleur (ID_COULEUR, NOM_COULEUR) VALUES (:colorId, :colorName)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':colorId', $nextId);
        $stmt->bindParam(':colorName', $colorName);
        return $stmt->execute();
    }

    public function update($colorId, $colorName) {
        $query = "UPDATE couleur SET NOM_COULEUR = :colorName WHERE ID_COULEUR = :colorId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':colorId', $colorId);
        $stmt->bindParam(':colorName', $colorName);
        return $stmt->execute();
    }

    // Méthode pour supprimer une couleur
    public function delete($colorId) {
        $query = "DELETE FROM couleur WHERE ID_COULEUR = :colorId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':colorId', $colorId);
        return $stmt->execute();
    }
}

?>