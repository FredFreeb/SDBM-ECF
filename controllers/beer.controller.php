<?php

require_once 'models/beer.model.php';


class BeerController {
    private $BeerModel;

    public function __construct(){
        $this->BeerModel = new BeerModel();
    }

    public function index() {
        if (isset($_POST['NOM_COULEUR'])) {
            // Le bouton de filtrage a été cliqué, effectuer les opérations de filtrage
            $colorFilter = $this->BeerModel->getBeerByColors();
        } else {
            // Le formulaire n'a pas été soumis, obtenir toutes les bières
            $beers = $this->BeerModel->getBeers();
        }

        $content = 'views/beer.view.php';
        include 'views/layout.php';
    }
}

?>