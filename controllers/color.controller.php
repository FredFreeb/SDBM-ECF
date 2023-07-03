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
        $colors = $this->model->getColors();
        $content = 'views/color.view.php';
        include 'views/layout.php';

    }

        // $model = new colorModel();
    // $colors = $model->getColors();

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     if (isset($_POST['newColor'])) {
    //         $newColor = $_POST['newColor'];
    //         $model->createColor($newColor);
    //     }
}
?>