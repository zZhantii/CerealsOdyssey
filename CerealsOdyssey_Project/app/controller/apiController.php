<?php
include_once('model/AllProductsDAO.php');

// Configurar las cabeceras para JSON
// header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

class apiController
{
    public static function get_products()
    {
        // Capturar el método HTTP
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':

                self::show();

                break;
        }

        // $view = 'views/admin/panelAdmin.php';
        // include_once 'views/main.php';
    }


    public static function show()
    {
        echo json_encode($products = AllProductsDAO::getAllProductsApi());
    }
}
