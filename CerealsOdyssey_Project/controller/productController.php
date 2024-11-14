<?php
include_once('model/CerealsAndMilkDAO.php');
include_once('model/CerealsAndMilk.php');
include_once('config/dataBase.php');

class productController
{
    public static function showAll()
    {
        $allProducts = CerealsAndMilkDAO::getAllCerealsAndMilk();
        $view = 'views/pages/shop.php';
        include_once 'views/main.php';
    }
}
