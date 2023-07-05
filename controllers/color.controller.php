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

    public function create($colorName) { // Renommer le paramètre en $colorName
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $colorName = $_POST['color'];
            $this->colorModel->createColor($colorName); // Appeler la fonction createColor du modèle
        } else {
            require 'views/colors/create.php';
        }
    }
    

    public function update() {
        $newColor = $_POST['newColor'];
        $colorId = $_POST['colorId'];
        $this->colorModel->updateColor($newColor, $colorId);
        $content = 'views/color.view.php';
        include 'views/layout.php';
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $colorId = $_POST['colorId'];
        $this->colorModel->deleteColor($colorId);
    } else {
        $content = 'views/colors/delete.php';
    }
        include 'views/layout.php';
    }

}
?>