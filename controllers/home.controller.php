<?php
require_once 'models/beer.model.php';

class HomeController {
    private $model;

    public function __construct(){
        $this->model = new beerModel();
    }

    public function index() {
        $randomBeers = $this->model->getRandomBeers();
        $content = 'views/home.view.php';
        include 'views/layout.php';
    }
}


?>