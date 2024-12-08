<?php
class SpecificProduct extends Products
{
    public function applyDiscount()
    {
        // Aplicar descuento porcentual
        return Discounts::applyPercentageDiscount($this->price, $this->discount_value);
    }
}
