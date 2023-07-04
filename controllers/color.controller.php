<?php
require_once 'models/color.model.php';

class ColorController {
    private $model;

    public function __construct(){
        $this->model = new ColorModel();
    }

    public function index() {
        $colors = $this->model->getColors();
        $content = 'views/color.view.php';
        include 'views/layout.php';
    }

    public function updateColor() {
        $colors = $this->model->updateColor();
        $content = 'views/color.view.php';
        include 'views/layout.php';
    }

    public function addColor() {
        // Récupérer le nom de la couleur depuis le formulaire
        $newColor = $_POST['newColor'];
    
        // Obtenir l'ID maximum actuel depuis la base de données
        $maxId = $this->model->getMaxColorId();
    
        // Calculer le nouvel ID en ajoutant 1
        $newId = $maxId + 1;
    
        // Appeler la fonction createColor() en passant le nouvel ID et le nom de la couleur
        $this->model->createColor($newId, $newColor);
    
        // Rediriger vers la page de liste des couleurs avec un message de confirmation
        $message = 'La nouvelle couleur a été ajoutée avec succès.';
        $colors = $this->model->getColors();
        $content = 'views/color.view.php';
        include 'views/layout.php';
    }
    
}
?>
