<?php
include_once('model/Cart.php');

class CartContreller
{
    public function add()
    {
        if (isset($_POST['add_cart'])) {
            $productId = $_POST['productId'];
            $quantity = $_POST['quantity'];
            $cart = Cart::addCart($productId, $quantity);

            $view = 'views/pages/cart.php';
            include_once 'views/main.php';
        }
    }

    public function remove()
    {
        if (isset($_POST['remove_cart'])) {
            $productId = $_POST['productId'];
            Cart::removeProduct($productId);

            $view = 'views/pages/cart.php';
            include_once 'views/main.php';
        }
    }

    public function clear()
    {
        Cart::clearCart();

        $view = 'views/pages/cart.php';
        include_once 'views/main.php';
    }
}
