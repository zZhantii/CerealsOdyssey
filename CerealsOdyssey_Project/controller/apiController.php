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
}
