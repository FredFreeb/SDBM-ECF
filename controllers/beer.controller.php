<?php
require_once 'models/beer.model.php';
require_once 'models/color.model.php';

class BeerController {
    private $beerModel;
    private $colorModel;

    public function __construct(){
        $this->beerModel = new BeerModel();
        $this->colorModel = new ColorModel();
    }

    public function index() {
        $selectedColor = isset($_POST['color']) ? $_POST['color'] : "";
        $beers = $this->beerModel->getBeers($selectedColor);
        $colors = $this->colorModel->getColors();
        
        // Inclure le contenu du modal dans la variable $modalContent
        ob_start();
        include 'views/modal.view.php';
        $modalContent = ob_get_clean();

        $content = 'views/beer.view.php';
        include 'views/layout.php';
    }
}
?>






