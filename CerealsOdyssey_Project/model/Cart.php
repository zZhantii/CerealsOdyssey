<?php
include_once 'config/proteccion.php';

class Cart
{
    public static function addCart($product)
    {
        foreach ($product as $item) {
            $productId = $item->getProduct_id();
            $productDetails = [
                'name' => $item->getName(),
                'price' => $item->getPrice(),
                'image' => $item->getImage(),
                'id' => $productId,
                'amount' => 1
            ];

            $found = false;

            // Añadir un campo ['producto'] y buscarlo directamente sin tener que hacer if

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as &$cartItem) {
                    if ($cartItem['id'] === $productId) {
                        $cartItem['amount']++;
                        $found = true;
                        break;
                    }
                }
                unset($cartItem);
            }

            if (!$found) {
                $_SESSION['cart'][] = $productDetails;
            }
        }
        return $_SESSION['cart'];
    }

    public static function removeProduct($productId)
    {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $productId) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
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
            (float)$total += $item['price'] * $item['amount'];
        }
        return $total;
    }
}
