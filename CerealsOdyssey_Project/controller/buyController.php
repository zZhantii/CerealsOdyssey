<?php
include_once('config/dataBase.php');

class buyController
{
    public function buyOrder()
    {
        $cartPrice = $_SESSION['cart'];
        $total = Cart::total_price($cartPrice);

        if (empty($_SESSION['user'])) {
            $view = 'views/pages/user/login.php';
            include_once 'views/main.php';
        } else {
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
            header("Location:?controller=user&action=orders");
        }
    }
}
