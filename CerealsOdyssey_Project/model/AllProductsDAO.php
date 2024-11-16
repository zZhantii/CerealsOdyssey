<?php
include_once 'model/AllProducts.php';
include_once 'config/dataBase.php';

class AllProductsDAO
{
    public static function getAllProducts()
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM products");

        $stmt->execute();

        $result = $stmt->get_result();

        $allProducts = [];
        while ($row = $result->fetch_object('AllProducts')) {
            $allProducts[] = $row;
        }

        $conex->close();
        return $allProducts;
    }

    public static function getProductsFilter($id)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT p.* FROM products p 
                                INNER JOIN categories c ON p.categorie_id = c.categorie_id 
                                WHERE c.categorie_id = ?");

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $categories = [];
        while ($row = $result->fetch_object('AllProducts')) {
            $categories[] = $row;
        }

        $conex->close();
        return $categories;
    }
}
