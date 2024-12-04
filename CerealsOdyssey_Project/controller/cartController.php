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

    public static function cart2()
    {
        $cart = $_SESSION['cart'];
        $total = Cart::total_price($cart);
    }

    public static function add()
    {
        $productId = $_GET['id'];
        $cartPrice = $_SESSION['cart'];

        $product = AllProductsDAO::getProductId($productId);
        $categories = CategoriesDAO::getAllCategories();

        $cart = Cart::addCart($product);
        $total = Cart::total_price($cartPrice);
    }

    public static function remove()
    {
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];
            Cart::removeProduct($productId);
            $cart = $_SESSION['cart'];
            $total = Cart::total_price($cart);
            header("Location:?controller=cart&action=show");
            exit;
        } else {
            header("Location:?controller=cart&action=show&error=invalid_id");
            exit;
        }
    }

    public static function clear()
    {
        Cart::clearCart();

        $view = 'views/pages/cart.php';
        include_once 'views/main.php';
    }
}
