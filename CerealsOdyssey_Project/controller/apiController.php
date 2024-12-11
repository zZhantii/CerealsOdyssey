<?php
include_once('model/AllProductsDAO.php');

class apiController
{
    public static function test()
    {

        $products = AllProductsDAO::getAllProductsApi();

        echo json_encode([
            'estado' => 'Correct',
            'data' => 'HOla'
        ]);
    }
}
