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
            // La couleur existe déjà, pas besoin de l'insérer
            return;
        }
    
        // Récupérer le dernier ID_COULEUR
        $query = 'SELECT MAX(ID_COULEUR) AS maxId FROM couleur';
        $stmt = $this->conn->query($query);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastId = $result['maxId'];
    
        // Incrémenter l'ID_COULEUR
        $newId = $lastId + 1;
    
        // Insérer la nouvelle couleur avec le nouvel ID_COULEUR
        $query = 'INSERT INTO couleur (ID_COULEUR, NOM_COULEUR) VALUES (:newId, :newColor)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newId', $newId);
        $stmt->bindParam(':newColor', $newColor);
        $stmt->execute();
        echo '<script>reloadPage();</script>';
    }
    
    
}    
?>