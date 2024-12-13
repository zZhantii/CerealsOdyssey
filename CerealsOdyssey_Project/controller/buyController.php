<?php
include_once('config/dataBase.php');

class buyController
{
    public function buyOrder()
    {
        if (empty($_SESSION['user'])) {
            $view = 'views/pages/user/login.php';
            include_once 'views/main.php';
        } elseif (empty($_SESSION['cart'])) {
            $view = 'views/pages/cart.php';
            include_once 'views/main.php';
        } else {
            $cartPrice = $_SESSION['cart'];
            $total = Cart::total_price($cartPrice);
            $address = AddressDAO::getAddress();

            $view = 'views/pages/buy.php';
            include_once 'views/main.php';
        }
    }

    public function createOrder()
    {
        if (isset($_POST['cardNumber'])) {
            $cardNumber = $_POST['cardNumber'];

            // Obtén los últimos 4 dígitos
            $lastFourDigits = substr($cardNumber, -4);

            // Prepara el nuevo formato con un asterisco
            $maskedCardNumber = '*' . $lastFourDigits;

            // Almacena el número de tarjeta en la sesión
            $_SESSION['user']['cardNumber'] = $maskedCardNumber;

            AllProductsDAO::createOrder($_SESSION['user'], $_SESSION['cart']);
            unset($_SESSION['discounts']);
            unset($_SESSION['cart']);
            header("Location:?controller=user&action=orders");
        }
    }
}
