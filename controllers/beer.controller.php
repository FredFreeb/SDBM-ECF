<?php
require_once 'models/color.model.php';

class BeerController {
    private $beerModel;
    private $colorModel;

    public function __construct() {
        $this->beerModel = new BeerModel();
        $this->colorModel = new ColorModel();
    }

    public function index($action = null, $beerId = null) {
        if ($action === 'edit' && $beerId !== null) {
            $this->update($beerId);
            return;
        } elseif ($action === 'create') {
            $this->create();
            return;
        }
    
        $selectedColor = isset($_POST['color']) ? $_POST['color'] : "";
        $selectedType = isset($_POST['ID_TYPE']) ? $_POST['ID_TYPE'] : "";
        $selectedBrand = isset($_POST['ID_MARQUE']) ? $_POST['ID_MARQUE'] : "";
    
        $colors = $this->colorModel->getColor();
        $types = $this->beerModel->getTypes();
        $brands = $this->beerModel->getMarques();
        $volumes = $this->beerModel->getVolumes();
        $beers = $this->beerModel->getBeers($selectedColor, $selectedType, $selectedBrand);
    
        $content = 'views/beers/read.php';
        include 'views/layout.php';
    }
    
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $beerName = $_POST['beerName'];
            $titrage = $_POST['titrage'];
            $volume = $_POST['volume'];
            $prixAchat = $_POST['prixAchat'];
            $marqueId = $_POST['marqueId'];
            $couleurId = $_POST['couleurId'];
            $typeId = $_POST['typeId'];
    
            $nextId = $this->beerModel->getNextPrimaryKeyValue('article', 'ID_ARTICLE');
            $created = $this->beerModel->create($nextId, $beerName, $titrage, $volume, $prixAchat, $marqueId, $couleurId, $typeId);
    
            if ($created) {
                header("Location: /index.php/beers");
                exit;
            }
        }
    
        $marques = $this->beerModel->getMarques();
        $colors = $this->colorModel->getColor();
        $types = $this->beerModel->getTypes();
        $content = 'views/beers/create.php';
        include 'views/layout.php';
    }
    
    
    

    public function update($articleId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleId = $_POST['id']; // Utilisez 'id' au lieu de 'articleId'
            $beerName = $_POST['articleName'];
            $titrage = $_POST['titrage'];
            $volume = $_POST['volume'];
            $marqueId = $_POST['marque'];
            $couleurId = $_POST['color'];
            $typeId = $_POST['type'];

            $this->beerModel->update($articleId, $beerName, $titrage, $volume, $marqueId, $couleurId, $typeId);

            header("Location: /index.php/beers");
            exit;
        }

        $beer = $this->beerModel->getBeersById($articleId);
        $marques = $this->beerModel->getMarques();
        $colors = $this->colorModel->getColor();
        $types = $this->beerModel->getTypes();
        $content = 'views/beers/update.php';
        include 'views/layout.php';
    }

    

    public function delete($articleId) {
        $beer = $this->beerModel->getBeersById($articleId);
        $articleName = $beer['NOM_ARTICLE'];
        $content = 'views/beers/delete.php';
        include 'views/layout.php';
    }
    
    
}

?>

