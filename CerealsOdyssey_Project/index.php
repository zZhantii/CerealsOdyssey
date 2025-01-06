<?php
include_once 'config/params.php';

$controllers = ['enterprise', 'categories', 'product', 'buy', 'user', 'cart', 'admin', 'api'];

foreach ($controllers as $controller) {
    include_once "controller/{$controller}Controller.php";
}


if (!isset($_GET['controller'])) {
    header("Location:?controller=" . default_controller);
    exit();
}

$controllerName = $_GET['controller'];
$name_controller = $controllerName . "Controller";

if (class_exists($name_controller)) {
    $controller = new $name_controller();
    $action = isset($_GET['action']) && method_exists($controller, $_GET['action']) ? $_GET['action'] : default_action;
    $controller->$action();
} else {
    header("Location:?controller=categories");
}
