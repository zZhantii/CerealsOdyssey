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

            // Si la sesión ya tiene un carrito, lo obtenemos
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

            // Si el producto no se encontró en la sesión, lo agregamos
            if (!$found) {
                $_SESSION['cart'][] = $productDetails;
            }

            // Actualizacion cookie al insertar
            self::updateCartCookie($_SESSION['cart']);
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
            // Actualizacion cookie al eliminar
            self::updateCartCookie($_SESSION['cart']);
        }
    }

    public static function clearCart()
    {
        unset($_SESSION['cart']);
        // Limpiar cookie
        setcookie('cart', '', time() - 3600, '/');
    }

    public static function total_price($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['amount'];
        }

        return $total;
    }

    public static function total_price_IVA($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['amount'];
        }

        $totalWithIVA = $total * 1.21;

        return $totalWithIVA;
    }

    public static function total_Amount($cart)
    {
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['amount'];
        }
        return $totalAmount;
    }

    public static function total_Items($cart)
    {
        $totalItems = count($cart);

        return $totalItems;
    }

    // Función para actualizar la cookie 
    private static function updateCartCookie($cart)
    {
        $cartJson = json_encode($cart);
        // x dias x horas x min x s
        setcookie('cart', $cartJson, time() + (60), '/');
    }

    // Función para recuperar el carrito desde la cookie si no hay sesión activa
    public static function loadCartFromCookie()
    {
        if (!isset($_SESSION['cart']) && isset($_COOKIE['cart'])) {
            $_SESSION['cart'] = json_decode($_COOKIE['cart'], true);
        }
    }
}
