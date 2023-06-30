<?php


$title = 'Home';

class HomeController {

    public function index() {

        $content = 'views/home.view.php';
        include 'views/layout.php';
    }
}

?>