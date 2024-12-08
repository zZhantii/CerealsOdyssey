<?php

class Discount
{
    public static function applyProductDiscount($productPrice, $discountPercentage)
    {
        return $productPrice - ($productPrice * ($discountPercentage / 100));
    }

    public static function applyCartDiscount($cartTotal, $discountAmount)
    {
        return max(0, $cartTotal - $discountAmount); // Evitar valores negativos
    }
}
