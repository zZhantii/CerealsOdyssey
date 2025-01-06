<?php
include_once 'model/Categories.php';
include_once 'config/dataBase.php';
error_reporting(E_ALL & ~E_DEPRECATED);

class CategoriesDAO
{
    public static function getAllCategories()
    {
        $conex = database::connect();
        $stmt = $conex->prepare('SELECT * FROM categories');

        $stmt->execute();

        $result = $stmt->get_result();

        $categories = [];
        while ($row = $result->fetch_object('categories')) {
            $categories[] = $row;
        }

        $conex->close();
        return $categories;
    }

    public static function applyDiscount($discount)
    {
        $conex = database::connect();
        $stmt = $conex->prepare('INSERT INTO products (discount) VALUES (?)');

        $stmt->execute();

        $result = $stmt->get_result();

        $conex->close();
    }
}
