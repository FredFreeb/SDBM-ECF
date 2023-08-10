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
    
        // Récupère les valeurs des filtres depuis le formulaire HTML
        $colorId = isset($_POST['couleurId']) ? $_POST['couleurId'] : "";
        $typeId= isset($_POST['typeId']) ? $_POST['typeId'] : "";
        $marqueId = isset($_POST['marqueId']) ? $_POST['marqueId'] : "";
    
        // Obtient les données filtrées des bières en utilisant les valeurs des filtres
        $beers = $this->beerModel->getBeers($colorId, $typeId, $marqueId);
    
        // Charge la vue avec les données filtrées pour afficher les résultats
        $marques = $this->beerModel->getMarques();
        $colors = $this->colorModel->getColor();
        $types = $this->beerModel->getTypes();
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
            $beerModel = new BeerModel;
            $nextId = $this->beerModel->getNextPrimaryKeyValue('article', 'ID_ARTICLE');
            $created = $beerModel->create($nextId, $beerName, $titrage, $volume, $prixAchat, $marqueId, $couleurId, $typeId);
    
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
            $articleId = $_POST['articleId'];
            $beerName = $_POST['beerName'];
            $titrage = $_POST['titrage'];
            $volume= $_POST['volume'];
            $prixAchat = $_POST['prixAchat'];
            $marqueId = $_POST['marqueId'];
            $couleurId = $_POST['couleurId'];
            $typeId = $_POST['typeId'];

            $updated = $this->beerModel->update($articleId, $beerName, $titrage, $volume, $prixAchat, $marqueId, $couleurId, $typeId);
            if ($updated) {
                // Rediriger vers la liste des couleurs après la modification
                header("Location: /index.php/beers");
                exit;
            }
        }
    
        $beer = $this->beerModel->getBeersById($articleId);
        $marques = $this->beerModel->getMarques();
        $colors = $this->colorModel->getColor();
        $types = $this->beerModel->getTypes();
        $content = 'views/beers/update.php';
        include 'views/layout.php';
    }
    

// Pour delete un crud complexe soit dans ma base de donnees j'insère ce script:
//      ALTER TABLE vendre
//      ADD CONSTRAINT FK_VENDRE_ARTICLE
//      FOREIGN KEY (ID_ARTICLE) REFERENCES article (ID_ARTICLE)
//      ON DELETE CASCADE;
// Soit je le fais directement dans mon code de cette manière


    public function delete($articleId) {
        // Instanciation du modèle
        $BeerModel = new BeerModel();
        // Suppression de la bière
        $BeerModel->delete($articleId);
        // Redirection vers la liste des couleurs
        header('Location: /index.php/beers');
    }
    
    
}

?>

