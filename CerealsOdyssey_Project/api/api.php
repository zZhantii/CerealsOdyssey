<?php
//include_once '../controller/adminController.php';

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':

        getOrders();
        break;
}

function getOrders()
{
    echo 'hola';

    // $information = adminController::showPanel();

    // if (!empty($information)) {
    //     json_encode(["status" => "200"]);
    // }
}
