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
        $content = 'views/beer.view.php';
        include 'views/layout.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $beerId = $_POST['beerId'];
            $newName = $_POST['name'];
            
            $this->beerModel->updateBeer();
        }
    
        $content = 'views/beer.view.php';
        include 'views/layout.php';
    }
    
}
?>






