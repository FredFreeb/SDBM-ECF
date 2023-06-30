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
        // Vérifier si la couleur existe déjà
        $query = 'SELECT ID_COULEUR FROM couleur WHERE NOM_COULEUR = :newColor';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newColor', $newColor);
        $stmt->execute();
        $existingColor = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($existingColor) {
            //pas de couleur déjà dans la base
            return;
        }
    
        // dernier id du tableau
        $query = 'SELECT MAX(ID_COULEUR) AS maxId FROM couleur';
        $stmt = $this->conn->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastId = $result['maxId'];
    
        // incrémente de 1
        $newId = $lastId + 1;
    
        // donnée à ajouter
        $query = 'INSERT INTO couleur (ID_COULEUR, NOM_COULEUR) VALUES (:newId, :newColor)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newId', $newId);
        $stmt->bindParam(':newColor', $newColor);
        $stmt->execute();
        echo '<script>reloadPage();</script>';
    }
    
    
}    
?>