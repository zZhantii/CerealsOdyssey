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
        $inputs = ['country', 'first_name', 'last_name', 'email', 'address', 'city', 'state', 'Zip_Code'];
        $order = [];

        foreach ($inputs as $item) {
            if (!isset($_POST[$item])) {
                $item = false;
                break;
            } else {
                $order[] = $item;
            }
        }

        AllProductsDAO::createOrder($order);
    }
}
