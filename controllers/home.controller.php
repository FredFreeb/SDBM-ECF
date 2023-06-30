<?php


$title = 'Home';

class HomeController {

    public function index() {

        include 'views/layout.php';
        require 'views/home.view.php';
        include 'views/footer.php';
    }
}

?>