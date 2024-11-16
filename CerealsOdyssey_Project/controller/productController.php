<?php
include_once('model/AllProductsDAO.php');
include_once('model/AllProducts.php');
include_once('config/dataBase.php');

class productController
{
    public static function getAllProducts()
    {
        $allProducts = AllProductsDAO::getAllProducts();
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/shop.php';
        include_once 'views/main.php';
    }

    public static function filter()
    {
        $id = $_GET['id'];
        $allProducts = AllProductsDAO::getProductsFilter($id);
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/shop.php';
        include_once 'views/main.php';
    }
}
