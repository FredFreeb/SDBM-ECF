<?php
$url = $_SERVER['REQUEST_URI'];

$path = parse_url($url, PHP_URL_PATH);
$parts = explode('/', $path);
$page = '/'.end($parts);
echo $page;
switch ($page) {
    case '/index.php':
        require_once 'controllers/home.controller.php';
        break;

    case '/home.view.php':
        require_once '../app/controllers/home.controller.php';
        break;

    case '/beer.view.php':
        require_once '../app/controllers/beer.controller.php';
        $controller = new beerModel();
        break;

    case '/color.view.php':
        require_once '../app/controllers/color.controller.php';
        $controller = new colorModel();
        break;
}
?>
