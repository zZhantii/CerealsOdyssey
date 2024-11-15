<?php
include_once('model/CelebrateDAO.php');
include_once('model/Celebrate.php');
include_once('model/OdysseyIDDAO.php');
include_once('model/OdysseyID.php');
include_once('model/MilkDAO.php');
include_once('model/Milk.php');
include_once('model/CerealsDAO.php');
include_once('model/Cereals.php');
include_once('model/CerealsAndMilkDAO.php');
include_once('model/CerealsAndMilk.php');
include_once('config/dataBase.php');

class productController
{
    public static function getAllProducts()
    {
        $allProducts = CerealsAndMilkDAO::getAllCerealsAndMilk();
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/shop.php';
        include_once 'views/main.php';
    }

    public static function getCereals()
    {
        $allProducts = CerealsDAO::getAllCereals();
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/shop.php';
        include_once 'views/main.php';
    }

    public static function getMilks()
    {
        $allProducts = MilkDAO::getAllMilks();
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/shop.php';
        include_once 'views/main.php';
    }

    public static function getOdysseyID()
    {
        $allProducts = OdysseyIDDAO::getOdysseyID();
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/shop.php';
        include_once 'views/main.php';
    }

    public static function getCelebrate()
    {
        $allProducts = CelebrateDAO::getCelebrate();
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/shop.php';
        include_once 'views/main.php';
    }
}
