<?php
// session_start();

class Discount
{
    public static function applyCartDiscount($discountPercentage)
    {
        $cart = $_SESSION['cart'];
        $cartTotal = Cart::total_price($cart);

        $discount = $cartTotal * ($discountPercentage / 100);
        $newprice = $cartTotal - $discount;

        return $newprice;
    }
}
