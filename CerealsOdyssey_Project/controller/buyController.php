<?php
include_once('config/dataBase.php');

class buyController
{
    public function buyOrder()
    {
        $cartPrice = $_SESSION['cart'];
        $total = Cart::total_price($cartPrice);

        $showForm = isset($_SESSION['user']) && !empty($_SESSION['user']);
        $showInformationAddress = !empty(array_filter([$_SESSION['user']['first_name'], $_SESSION['user']['last_name'], $_SESSION['user']['address'], $_SESSION['user']['apartment'], $_SESSION['user']['city'], $_SESSION['user']['state'], $_SESSION['user']['zipCode'], $_SESSION['user']['country']]));

        $view = 'views/pages/buy.php';
        include_once 'views/main.php';
    }

    public function createOrder()
    {
        if (empty($_SESSION['user'])) {
            $inputs = ['country', 'first_name', 'last_name', 'email', 'address', 'city', 'state', 'postal_code', 'cardNumber'];
            $orderInputs = [];

            foreach ($inputs as $item) {
                if (isset($_POST[$item])) {
                    $orderInputs[$item] = $_POST[$item];
                } else {
                    break;
                }
            }

            AllProductsDAO::createOrder($orderInputs, $_SESSION['cart']);
            header("Location:?controller=categories");
        } else {
            AllProductsDAO::createOrder($_SESSION['user'], $_SESSION['cart']);
            header("Location:?controller=categories");
        }


        // AllProductsDAO::createOrder($orderInputs);
    }
}
