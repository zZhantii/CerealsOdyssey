<?php
include_once('config/dataBase.php');

class buyController
{
    public function buyOrder()
    {
        $cartPrice = $_SESSION['cart'];
        $total = Cart::total_price($cartPrice);
        $view = 'views/pages/buy.php';
        include_once 'views/main.php';
    }

    public function createOrder()
    {
        $inputs = ['country', 'first_name', 'last_name', 'email', 'address', 'city', 'state', 'postal_code'];
        $orderInputs = [];

        foreach ($inputs as $item) {
            if (isset($_POST[$item])) {
                $orderInputs[$item] = $_POST[$item];
            } else {
                break;
            }
        }

        AllProductsDAO::createOrder($_SESSION['user'], $_SESSION['cart']);
        header("Location:?controller=categories");

        // AllProductsDAO::createOrder($orderInputs);
    }
}
