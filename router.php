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

// Inclure les contrôleurs une fois
require_once 'controllers/home.controller.php';
require_once 'controllers/beer.controller.php';
require_once 'controllers/color.controller.php';
require_once 'models/beer.model.php';
require_once 'models/color.model.php';

switch ($route) {
    case '/':
    case '/index.php':
        $controller = new homeController();
        $controller->index();
        break;
    case '/index.php/beers':
        $BeerModel = new BeerModel();
        $controller = new BeerController($BeerModel);
        $controller->index();
        break;
    
    case '/index.php/beers/create':
        $BeerModel = new BeerModel();
        $controller = new BeerController($BeerModel);
        $controller->create('beer');
        break;

    case '/index.php/beers/update':
        $BeerModel = new BeerModel();
        $controller = new BeerController($BeerModel);
        $controller->update($_GET['id']);
        break;

    case '/index.php/beers/delete':
        $BeerModel = new BeerModel();
        $controller = new BeerController($BeerModel);
        $controller->delete($_GET['id']);
        break;
    
    case '/index.php/colors':
        $colorModel = new ColorModel();
        $controller = new ColorController($colorModel);
        $controller->index();
        break;

    case '/index.php/colors/create':
        $colorModel = new ColorModel();
        $controller = new ColorController($colorModel);
        $controller->create('color');
        break;

    
    case '/index.php/colors/update':
        $colorModel = new ColorModel();
        $controller = new ColorController($colorModel);
        $controller->update($_GET['id']);
        break;

    case '/index.php/colors/delete':
        $colorModel = new ColorModel();
        $controller = new ColorController($colorModel);
        $controller->delete($_GET['id']);

        break;
    default:
        // Route non trouvée, afficher une page d'erreur ou rediriger vers une page d'accueil
        echo '404 - Page not found';
        break;
}
?>