<?php

$title = 'Nos bières';


class BeerController {
    public function index() {
        include 'views/layout.php';
        require 'models/beer.model.php';
        require 'views/beer.view.php';
        include 'views/modal.view.php';
        include 'views/footer.php';
    }
}
?>
