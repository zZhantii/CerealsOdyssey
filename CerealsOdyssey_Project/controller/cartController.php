<?php
include_once('model/Cart.php');
include_once('model/AllProductsDAO.php');
include_once('config/dataBase.php');

class CartController
{
    public static function show()
    {
        $cart = $_SESSION['cart'];
        $total = Cart::total_price($cart);
        $view = 'views/pages/cart.php';
        include_once 'views/main.php';
    }

    public static function add()
    {
        $productId = $_GET['id'];
        $cartPrice = $_SESSION['cart'];

        $product = AllProductsDAO::getProductId($productId);
        $categories = CategoriesDAO::getAllCategories();

        $cart = Cart::addCart($product);
        $total = Cart::total_price($cartPrice);
        $view = 'views/pages/cart.php';
        include_once 'views/main.php';
    }

    public static function remove()
    {
        $productId = $_GET['productId'];
        Cart::removeProduct($productId);
        $cart = $_SESSION['cart'];
        $total = Cart::total_price($cart);
        header("Location:?controller=cart&action=show");
    }

    public static function clear()
    {
        Cart::clearCart();

        $view = 'views/pages/cart.php';
        include_once 'views/main.php';
    }
}
