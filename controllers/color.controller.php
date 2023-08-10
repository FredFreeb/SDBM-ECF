<?php


class ColorController {
    public function index() {
        // Instanciation du modèle
        $colorModel = new ColorModel();

        // Récupération de toutes les couleurs
        $colors = $colorModel->getAllColor();

        // Affichage de la vue
        $content = 'views/colors/read.php';
        include 'views/layout.php';

    }

    public function create() {
        // Vérification si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $colorName = $_POST['colorName'];
            $colorModel = new ColorModel();
            $nextId = $colorModel->getNextPrimaryKeyValue('couleur', 'ID_COULEUR');
            
            $created = $colorModel->create($colorName, $nextId);
            if ($created) {
                // Rediriger vers la liste des couleurs après la création
                header("Location: /index.php/colors");
                exit;
            }
        }
    
        $content = 'views/colors/create.php';
        include 'views/layout.php';
    }

    public function update($colorId) {
        // Vérification si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $colorName = $_POST['colorName'];
            $colorModel = new ColorModel();
            $updated = $colorModel->update($colorId, $colorName);
            if ($updated) {
                // Rediriger vers la liste des couleurs après la mise à jour
                header("Location: /index.php/colors");
                exit;
            }
        }
    
        // Si le formulaire n'est pas soumis ou la mise à jour échoue,
        // afficher la vue de mise à jour avec les données de la couleur
        $colorModel = new ColorModel();
        $color = $colorModel->getColorById($colorId);
    
        $content = 'views/colors/update.php';
        include 'views/layout.php';
    }
    

    public function delete($colorId) {
        // Instanciation du modèle
        $colorModel = new ColorModel();
        // Suppression de la couleur
        $colorModel->delete($colorId);
        // Redirection vers la liste des couleurs
        header('Location: /index.php/colors');
    }
}
?>