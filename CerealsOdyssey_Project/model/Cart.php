<?php
include_once 'config/proteccion.php';

class Cart
{
    public static function addCart($product)
    {
        foreach ($product as $item) {
            $productDetails = [
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'image' => $item->getImage(),
                'id' => $item->getProduct_id()
            ];

            $_SESSION['cart'][] = $productDetails;
        }
        return $_SESSION['cart'];
    }

    public static function showCart()
    {
        $view = '';
    }

    public static function removeProduct($productId)
    {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }

    public static function clearCart()
    {
        unset($_SESSION['cart']);
    }

    public static function total_price($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'];
        }
        return $total;
    }
}
