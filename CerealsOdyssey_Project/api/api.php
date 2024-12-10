<?php
//include_once '../model/AllProductsDAO.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $products = AllProductsDAO::getAllProductsApi();


        echo json_encode(['status' => 'exito', 'data' => $products]);


    case 'POST':
        // Aquí puedes manejar la creación de un nuevo cereal
        break;
    case 'PUT':
        // Aquí puedes manejar la actualización de un cereal existente
        break;
    case 'DELETE':
        // Aquí puedes manejar la eliminación de un cereal
        break;
    default:
        http_response_code(405);
        echo json_encode(["message" => "Método no permitido"]);
        break;
}
