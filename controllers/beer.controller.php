<?php
require_once 'models/beer.model.php';
require_once 'models/color.model.php';

// class BeerController {
//     private $beerModel;
//     private $colorModel;

//     public function __construct(){
//         $this->beerModel = new BeerModel();
//         $this->colorModel = new ColorModel();

//     }

//     public function index($action = null, $beerId = null) {
//         if ($action === 'edit' && $beerId !== null) {
//             $this->beerModel->selectBeer($beerId);
//             return;
//         } elseif ($action === 'create') {
//             header("Location: /beers/create");
//             return;
//         }
//         $selectedColor = isset($_POST['color']) ? $_POST['color'] : "";
//         $beers = $this->beerModel->getBeers($selectedColor);
//         $colors = $this->colorModel->getColor();
//         $content = 'views/beers/read.php';
//         include 'views/layout.php';
//     }

//     public function create() {
//         // Vérifier si le formulaire a été soumis
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             // Récupérer les informations du formulaire
//             $titrage = $_POST['titrage'];
//             $marqueId = $_POST['marqueId'];
//             $volume = $_POST['volume'];
//             $couleurId = $_POST['couleurId'];
//             $typeId = $_POST['typeId'];
//             $prixAchat = $_POST['prixAchat'];
//             $beerName = $_POST['beerName'];
    
//             // Traiter les informations (par exemple, en utilisant le modèle)
//             $this->beerModel->createBeer($titrage, $marqueId, $volume, $couleurId, $typeId, $prixAchat, $beerName);
    
//             // Afficher un message de succès
//             echo 'La bière a été créée avec succès !';
//         }
    
//         // Afficher le formulaire
//         $content = 'views/beers/create.php';
//         require 'views/layout.php';
//     }
    
    

//     public function update() {
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $articleId = $_POST['articleId'];
//             $articleName = $_POST['articleName'];
//             $this->beerModel->updateBeer($articleId, $articleName);
//         } else {
//             $beer = $this->beerModel->getBeersById('articleId'); // Récupérer les informations de l'article à mettre à jour
//             $volumes = $this->beerModel->getVolumes();
//             $marques = $this->beerModel->getMarques();
//             $types = $this->beerModel->getTypes();
//             $colors = $this->colorModel->getColor();
    
//             $content = 'views/beers/update.php';
//             require 'views/layout.php';
//         }
//     }
    

//     public function delete($articleId) {
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $this->beerModel->deleteBeer($articleId);
//             header('Location: index.php?id=' . $articleId);
//         } else {
//             $articleId= $this->beerModel->getBeersById($articleId);
//             $content = 'views/beers/delete.php';
//         }
//     }
// }


class BeerController {
    private $beerModel;
    private $colorModel;

    public function __construct() {
        $this->beerModel = new BeerModel();
        $this->colorModel = new ColorModel();
    }

    public function index($action = null, $beerId = null) {
        if ($action === 'edit' && $beerId !== null) {
            $this->editBeer($beerId);
            return;
        } elseif ($action === 'create') {
            $this->createBeer();
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
    
    

    public function createBeer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $beerName = $_POST['beerName'];
            $titrage = $_POST['titrage'];
            $marqueId = $_POST['marqueId'];
            $volume = $_POST['volume'];
            $couleurId = $_POST['couleurId'];
            $typeId = $_POST['typeId'];
            $prixAchat = $_POST['prixAchat'];

            $this->beerModel->createBeer($beerName, $titrage, $marqueId, $volume, $couleurId, $typeId, $prixAchat);

            // Rediriger vers la page d'accueil ou afficher un message de succès
            echo "La bière a été crée avec succès !";
            exit;
        }

        $marques = $this->beerModel->getMarques();
        $volumes = $this->beerModel->getVolumes();
        $types = $this->beerModel->getTypes();
        $content = 'views/beers/create.php';
        include 'views/layout.php';
    }

    public function editBeer($articleId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $beerName = $_POST['beerName'];
            $articleId= $_POST['articleId'];
            $this->beerModel->updateBeer($articleId, $beerName);
            $content = 'views/beers/edit.php';
            // Rediriger vers la page d'accueil ou afficher un message de succès
            header("Location: /");
            exit;
        }

        $beer = $this->beerModel->getBeersById($articleId);
        $marques = $this->beerModel->getMarques();
        $volumes = $this->beerModel->getVolumes();
        $types = $this->beerModel->getTypes();
        $content = 'views/beers/edit.php';
        include 'views/layout.php';
    }

    public function deleteBeer($articleId) {
        // Récupérer les détails de l'article
        $articleId = $this->beerModel->deleteBeer(['articleId']);

        // Vérifier si la requête est une méthode POST avant de supprimer la bière
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->beerModel->deleteBeer($articleId);
            

            header("Location: /");
            exit;
        } else {
            // Inclure la vue de confirmation de suppression
            include 'views/beers/delete.php';
        }
    }
    
}

?>

