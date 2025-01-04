<?php
include_once('model/CategoriesDAO.php');
include_once('model/AllProductsDAO.php');
include_once('model/Products.php');
include_once('config/dataBase.php');

class productController
{
    public static function getAllProducts()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;

        if ($id) {
            $allProducts = AllProductsDAO::getAllProducts($id);
        } else {
            $allProducts = AllProductsDAO::getAllProducts(NULL);
        }
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/products/shop.php';
        include_once 'views/main.php';
    }

    public static function showProduct()
    {
        $product_id = $_GET['id'];
        $product = AllProductsDAO::getProductId($product_id);
        $view = 'views/pages/products/product.php';
        include_once 'views/main.php';
    }
}
