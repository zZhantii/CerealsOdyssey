<?php
include_once('model/CategoriesDAO.php');
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

    public static function showProduct()
    {
        $product_id = $_GET['id'];
        $product = AllProductsDAO::getProductId($product_id);

        $view = 'views/pages/product.php';
        include_once 'views/main.php';
    }
}
