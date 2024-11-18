<?php
include_once 'config/params.php';
include_once 'controller/categoriesController.php';
include_once 'controller/productController.php';
include_once 'controller/buyController.php';

if (!isset($_GET['controller'])) {
    echo 'No hay controlador';
    // header("Location:" . url_base . "?controller=categories");
} else {
    $name_controller = $_GET['controller'] . "Controller";

    if (class_exists($name_controller)) {
        $controller = new $name_controller();

        if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = default_action;
        }

        $controller->$action();
    } else {
        // header("Location:" . url_base . "?controller=categories");
    }
}
