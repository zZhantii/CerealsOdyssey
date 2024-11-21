<?php
session_start();

class Cart
{
    public static function addCart($product)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        foreach ($product as $item) {
            $productDetails = [
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'image' => $item->getImage()
            ];

            $_SESSION['cart'][] = $productDetails;
        }

        return $_SESSION['cart'];
    }

    public static function getCart()
    {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
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
}
