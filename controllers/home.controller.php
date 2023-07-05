<?php
require_once 'models/beer.model.php';

class homeController {
    private $model;

    public function __construct(){
        $this->model = new beerModel();

    }

    public function index() {
        $randomBeers = $this->model->getRandomBeers();
        $content = 'views/home.view.php';
        require 'views/layout.php';

    }
}


?>