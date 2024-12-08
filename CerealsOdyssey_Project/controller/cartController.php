<?php
include_once('model/Cart.php');
require_once 'model/Discount.php';
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

    public function applyDiscount()
    {
        $cart = $_SESSION['cart'];
        $cartprice = Cart::total_price($cart);
        $cartTotal = $cartprice;
        $discountCode = $_POST['discount_code'] ?? null;
        $discounts = [
            "SALE10" => 10, // 10% de descuento
            "FLAT50" => 50, // $50 de descuento
        ];

        // Verificar si el código de descuento es válido
        if ($discountCode && isset($discounts[$discountCode])) {
            $discountValue = $discounts[$discountCode];
            if (is_numeric($discountValue)) {
                $newTotal = Discount::applyCartDiscount($cartTotal, $discountValue);
                echo "Nuevo total después del descuento: $" . number_format($newTotal, 2);
            } else {
                echo "Código de descuento no válido.";
            }
        } else {
            echo "Por favor, introduce un código de descuento válido.";
        }
    }
}
