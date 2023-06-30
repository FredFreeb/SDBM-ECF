<?php
// router.php

// Récupérer l'URL demandée
$requestUrl = $_SERVER['REQUEST_URI'];

// Supprimer la partie de la racine de l'URL
$baseUrl = '/SBDM-ECF/';
$route = str_replace($baseUrl, '', $requestUrl);

// Supprimer les éventuels paramètres de requête
$route = strtok($route, '?');

echo "ici ".$route;


// Traiter la route demandée
switch ($route) {
    case '/':
        require_once 'controllers/home.controller.php';
        $controller = new HomeController();
        $controller->index();
        break;
    case '/index.php':
        require_once 'controllers/home.controller.php';
        $controller = new HomeController();
        $controller->index();
        break;
    case '/index.php/beer':
        require_once 'controllers/beer.controller.php';
        $controller = new BeerController();
        $controller->index();
        break;
    case '/index.php/color':
        require_once 'controllers/color.controller.php';
        $controller = new ColorController();
        $controller->index();
        break;
    default:
        // Route non trouvée, afficher une page d'erreur ou rediriger vers une page d'accueil
        echo '404 - Page not found';
        break;
}