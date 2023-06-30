<?php

require_once 'models/beer.model.php';

class BeerController {
    private $model;

    public function __construct(){
        $this->model = new BeerModel();
    }

    public function index() {
        $beers = $this->model->getBeers();
        $content = 'views/beer.view.php';
        include 'views/layout.php';
    }

}

?>
