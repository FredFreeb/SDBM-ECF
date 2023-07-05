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
        $colors = $this->colorModel->getColor();
        $content = 'views/beers/read.php';
        include 'views/layout.php';
    }

    public function create() {

        // Générer l'ID suivant
        $nextId = $this->beerModel->getNextPrimaryKeyValue('article', 'ID_ARTICLE');
    
        // Récupérer les autres paramètres du formulaire
        $beerName = $_POST['beerName'];
        $marqueId = $_POST['marqueId'];
        $couleurId = $_POST['couleurId'];
        $typeId = $_POST['typeId'];
        $volume = $_POST['volume'];
        $prixAchat = $_POST['prixAchat'];
        $titrage = $_POST['titrage'];
    
        // Appeler la méthode createBeer avec tous les paramètres
        $this->beerModel->createBeer($nextId, $beerName, $marqueId, $couleurId, $typeId, $volume, $prixAchat, $titrage);
        var_dump($_POST);
        $content = 'views/beers/create.php';
        require 'views/layout.php';
    }
    

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleId = $_POST['articleId'];
            $articleName = $_POST['articleName'];
            $this->beerModel->updateBeer($articleId, $articleName);
        } else {
            $beer = $this->beerModel->getBeersById('articleId'); // Récupérer les informations de l'article à mettre à jour
            $volumes = $this->beerModel->getVolumes();
            $marques = $this->beerModel->getMarques();
            $types = $this->beerModel->getTypes();
            $colors = $this->colorModel->getColor();
    
            $content = 'views/beers/update.php';
            require 'views/layout.php';
        }
    }
    

    public function delete($articleId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->beerModel->deleteBeer($articleId);
            header('Location: index.php?id=' . $articleId);
        } else {
            $articleId= $this->beerModel->getBeersById($articleId);
            $content = 'views/beers/delete.php';
        }
    }
}
?>

