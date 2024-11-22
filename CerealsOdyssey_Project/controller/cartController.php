<?php
include_once('model/Cart.php');
include_once('model/AllProductsDAO.php');
include_once('config/dataBase.php');

class CartController
{
    public static function show()
    {
        $productId = $_GET['id'];
        $product = AllProductsDAO::getProductId($productId);
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/cart.php';
        include_once 'views/main.php';
    }

    public static function add()
    {
        $productId = $_GET['id'];
        $product = AllProductsDAO::getProductId($productId);
        $categories = CategoriesDAO::getAllCategories();
        $cart = Cart::addCart($product);

        $view = 'views/pages/cart.php';
        include_once 'views/main.php';
    }

    public static function remove()
    {
        if (isset($_POST['remove_cart'])) {
            $productId = $_POST['productId'];
            Cart::removeProduct($productId);
        }
        header("Location:?controller=cart&action=show");
    }

    public static function clear()
    {
        Cart::clearCart();

        $view = 'views/pages/cart.php';
        include_once 'views/main.php';
    }
}
