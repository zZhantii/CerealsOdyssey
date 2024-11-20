<?php
session_start();

class Sesions
{
    public static function addCart($productId, $quantity)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
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
