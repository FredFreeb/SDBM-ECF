<?php
// router.php

// Récupérer l'URL demandée
$requestUrl = $_SERVER['REQUEST_URI'];

// Supprimer la partie de la racine de l'URL
$baseUrl = '/SBDM-ECF/';
$route = str_replace($baseUrl, '', $requestUrl);

// Supprimer les éventuels paramètres de requête
$route = strtok($route, '?');
// // test de page
// echo (strtok($route, '?'));
// Traiter la route demandée
switch ($route) {
    case '/':
    case '/index.php':
        require_once 'controllers/home.controller.php';
        $controller = new homeController();
        $controller->index();
        break;
    case '/index.php/beers':
        require_once 'controllers/beer.controller.php';
        $controller = new BeerController();
        $controller->index();
        break;
    
    case '/index.php/beers/create':
        require_once 'controllers/beer.controller.php';
        $controller = new BeerController();
        $controller->createBeer();
        break;

    case '/index.php/beers/read':
        require_once 'controllers/beer.controller.php';
        $controller = new BeerController();
        $controller->index();
        break;

    case '/index.php/beers/update':
        require_once 'controllers/beer.controller.php';
        $controller = new BeerController();
        $controller->editBeer($articleId);
        break;

    case '/index.php/beers/delete':
        require_once 'controllers/beer.controller.php';
        $controller = new BeerController();
        $controller->deleteBeer($articleId);
        break;
    
    case '/index.php/colors':
        require_once 'controllers/color.controller.php';
        $controller = new ColorController();
        $controller->index();
        break;

    case '/index.php/colors/create':
        require_once 'controllers/color.Controller.php';
        $controller = new ColorController();
        $controller->create('color');
        break;

    case '/index.php/colors/read':
            require_once 'controllers/color.controller.php';
            $controller = new ColorController();
            $controller->index();
            break;
    
    case '/index.php/colors/update':
        require_once 'controllers/color.controller.php';
        $controller = new ColorController();
        $controller->update();
        break;

    case '/index.php/colors/delete':
        require_once 'controllers/color.controller.php';
        $controller = new ColorController();
        $controller->delete();

        break;
    default:
        // Route non trouvée, afficher une page d'erreur ou rediriger vers une page d'accueil
        echo '404 - Page not found';
        break;
}
?>