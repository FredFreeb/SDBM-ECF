<?php
$url = $_SERVER['REQUEST_URI'];

$path = parse_url($url, PHP_URL_PATH);
$parts = explode('/', $path);
$page = '/'.end($parts);

switch ($page) {
    case '/index.php':
        header('Location: /home.view.php'); // Rediriger vers la page d'accueil
        exit;
        break;

    case '/home.view.php':
        require_once 'controllers/home.controller.php';
        break;

    case '/beer.view.php':
        require_once 'controllers/beer.controller.php';
        break;

    case '/color.view.php':
        require_once 'controllers/color.controller.php';
        break;

    default:
        // Page non trouvée, afficher une erreur ou une page 404
        echo 'Page not found';
        break;
}

?>
