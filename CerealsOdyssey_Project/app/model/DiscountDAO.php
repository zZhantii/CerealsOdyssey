<?php
include_once 'model/Discount.php';
include_once 'config/dataBase.php';

class DiscountDAO
{
    public static function getDiscount($description)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM discounts WHERE description = ?");

        $stmt->bind_param("s", $description);

        $stmt->execute();

        $result = $stmt->get_result();

        $discount = [];
        while ($row = $result->fetch_object('discount')) {
            $discount[] = $row;
        }

        $conex->close();
        return $discount;
    }
}
