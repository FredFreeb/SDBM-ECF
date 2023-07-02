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

    // public function createColor() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         if (isset($_POST['newColor'])) {
    //             $newColor = $_POST['newColor'];
    //             $this->model->createColor($newColor);
    //         }
    //     }
    //     exit();
    // }
    // public function route() {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
    //         $action = $_GET['action'];
    //         if ($action === 'createColor') {
    //             $this->createColor();
    //         }
    //     }
    // }
}

?>