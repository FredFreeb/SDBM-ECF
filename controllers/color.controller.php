<?php
$title = 'Colors';

class ColorController {
    public function index() {
        include 'views/layout.php';
        require 'models/color.model.php';
        require 'views/color.view.php';
        include 'views/footer.php';
    }
}
?>