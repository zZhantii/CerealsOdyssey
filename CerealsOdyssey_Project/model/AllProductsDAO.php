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

    public static function getProductId($productId)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM products WHERE product_id = ?");

        $stmt->bind_param("i", $productId);

        $stmt->execute();

        $result = $stmt->get_result();

        $product = [];
        while ($row = $result->fetch_object('AllProducts')) {
            $product[] = $row;
        }

        $conex->close();
        return $product;
    }

    public static function createOrder($order)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("");

        $stmt->bind_param("i", $productId);

        $stmt->execute();

        $result = $stmt->get_result();

        $product = [];
        while ($row = $result->fetch_object('AllProducts')) {
            $product[] = $row;
        }

        $conex->close();
        return $product;
    }
}
