<?php
include_once 'model/CerealsAndMilk.php';
include_once 'config/dataBase.php';

class CerealsAndMilkDAO
{
    public static function getAllCerealsAndMilk()
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM products");

        $stmt->execute();

        $result = $stmt->get_result();

        $allProducts = [];
        while ($row = $result->fetch_object('cerealsandmilk')) {
            $allProducts[] = $row;
        }

        $conex->close();
        return $allProducts;
    }
}
