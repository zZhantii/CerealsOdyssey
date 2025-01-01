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

    public static function get_products_orders()
    {
        echo json_encode($products = AllProductsDAO::get_products_order_api());
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

        error_log(print_r($data, true));
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

    public static function get_users()
    {
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requestd-With");

        echo json_encode($products = UsersDAO::getUserApi());
    }

    public static function create_user()
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

        $result = UsersDAO::create_user_api($data);

        echo json_encode($result);
    }

    public static function modify_user()
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

        error_log(print_r($data, true));
        $result = UsersDAO::modify_user_api($data);

        echo json_encode($result);
    }

    public static function delete_user()
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

        $result = UsersDAO::delete_user_api($data);

        echo json_encode($result);
    }

    public static function get_product()
    {
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requestd-With");

        echo json_encode($products = AllProductsDAO::get_product_api());
    }

    public static function create_product()
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

        error_log(print_r($data, true));
        $result = AllProductsDAO::create_product_api($data);

        echo json_encode($result);
    }

    public static function modify_product()
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

        error_log(print_r($data, true));
        $result = AllProductsDAO::modify_product_api($data);

        echo json_encode($result);
    }

    public static function delete_product()
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

        $result = AllProductsDAO::delete_product_api($data);

        echo json_encode($result);
    }
}
