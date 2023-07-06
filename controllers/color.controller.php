<?php
require_once 'models/color.model.php';

class ColorController {
    private $colorModel;

    public function __construct(){
        $this->colorModel = new ColorModel();
        
    }

    public function index() {
        $colors = $this->colorModel->getAllColor();
        $content='views/colors/read.php';
        require 'views/layout.php';
    }

    public function create($colorName) { 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $colorName = $_POST['colorName'];
            $this->colorModel->createColor($colorName);
        } else {
    
        }
        $content = 'views/colors/create.php';
        include 'views/layout.php';
    }
    

    public function update() {
        $colorId = $_POST['colorId']; 
        $colorName = $_POST['colorName'];
        $this->colorModel->updateColor($colorId, $colorName);
        $content = 'views/color.view.php';
        include 'views/layout.php';
    }
    
    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $colorId = $_POST['colorId'];
            $this->colorModel->deleteColor($colorId);
            $content = 'views/colors/delete.php';
        } else {
            echo "Méthode de requête incorrecte.";
            $content = 'views/colors/delete.php';
        }
        include 'views/layout.php';
    }
}
?>