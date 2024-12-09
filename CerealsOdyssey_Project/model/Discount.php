<?php

class Discount
{
    public static function applyCartDiscount($cartTotal, $discountPercentage)
    {
        $discount = $cartTotal * ($discountPercentage / 100);
        $newPrice = $cartTotal - $discount;

        $_SESSION['discounts'] = [
            'discount' => $discount,
            'newPrice' => $newPrice,
        ];

        return $newPrice;
    }

    public static function applyProductDiscount($ProductPrice, $discountPercentage)
    {
        $discount = $ProductPrice * ($discountPercentage / 100);
        $newPrice = $ProductPrice - $discount;

        $_SESSION['discountsP'] = [
            'discount' => $discount,
            'newPrice' => $newPrice,
        ];

        return $newPrice;
    }
}
