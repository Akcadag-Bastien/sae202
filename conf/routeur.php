<?php
// ETAPE 1:
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$items = explode('/', $path);

// ETAPE 2:
if (empty($items[1])) {
    $controller = 'accueil';
} else {
    $controller = $items[1];
}

// ETAPE 3:
if (empty($items[2])) {
    $action = 'index';
} else {
    $action = $items[2];
}

// ETAPE 4:
require_once('controller/' . $controller . '_controller.php');
$action();