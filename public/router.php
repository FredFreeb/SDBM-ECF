<?php
$url = $_SERVER['REQUEST_URI'];

$path = parse_url($url, PHP_URL_PATH);
$parts = explode('/', $path);
$page = '/'.end($parts);
echo $page;
switch ($page) {
    case '/index.php':
        require_once 'home.controller.php';
        echo '$page';
        break;

    case '/home.view.php':
        require_once 'controllers/home.controller.php';
        break;

    case '/beer.view.php':
        require_once 'controllers/beer.controller.php';
        $controller = new beerModel();
        break;

    case '/color.view.php':
        require_once 'controllers/color.controller.php';
        $controller = new colorModel();
        break;
}
?>
