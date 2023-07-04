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

    public function index($action = null, $beerId = null) {
        if ($action === 'edit' && $beerId !== null) {
            $this->beerModel->editBeer($beerId);
            return;
        } elseif ($action === 'create') {
            header("Location: /beer/create");
            return;
        }
        $selectedColor = isset($_POST['color']) ? $_POST['color'] : "";
        $beers = $this->beerModel->getBeers($selectedColor);
        $colors = $this->colorModel->getColors();
        $content = 'views/beer.view.php';
        include 'views/layout.php';
    }

    public function create() {
        $volumes = $this->beerModel->getVolumes();
        $marques = $this->beerModel->getMarques();
        $couleurs = $this->beerModel->getCouleurs();
        $types = $this->beerModel->getTypes();
        $colors = $this->colorModel->getColors();
        $content = 'views/create.view.php';
        include 'views/layout.php';

    }
public function update() {
    $volumes = $this->beerModel->getVolumes();
    $marques = $this->beerModel->getMarques();
    $couleurs = $this->beerModel->getCouleurs();
    $types = $this->beerModel->getTypes();
    $colors = $this->colorModel->getColors();
    $content = 'views/modif.view.php';
    include 'views/layout.php';
}

    
}
?>





