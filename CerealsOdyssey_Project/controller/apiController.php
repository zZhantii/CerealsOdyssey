<?php
include_once('model/AllProductsDAO.php');

class apiController
{
    public static function get_orders()
    {
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requestd-With");

        echo json_encode($products = AllProductsDAO::getOrderApi());
    }

    public static function create_order()
    {
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $data = json_decode(file_get_contents("php://input"), true);

        if ($data === null) {
            echo json_encode(['error' => 'Invalid JSON input']);
            return;
        }

        $result = AllProductsDAO::create_order_api($data);

        echo json_encode($result);
    }

    public static function modify_order()
    {
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $data = json_decode(file_get_contents("php://input"), true);

        if ($data === null) {
            echo json_encode(['error' => 'Invalid JSON input']);
            return;
        }

        $result = AllProductsDAO::modify_order_api($data);

        echo json_encode($result);
    }

    public static function delete_order()
    {
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $data = json_decode(file_get_contents("php://input"), true);

        if ($data === null) {
            echo json_encode(['error' => 'Invalid JSON input']);
            return;
        }

        $result = AllProductsDAO::delete_order_api($data);

        echo json_encode($result);
    }
}
