<?php
include_once 'config/params.php';
include_once url_base . 'config/database.php';
include_once url_base . 'model/Product.php';
include_once 'Cereals.php';
include_once 'Categories.php';


class CerealsDAO
{
    public static function getAll()
    {
        // Conexion a la base de datos
        $conex = Database::connect();
        // Query
        $stmt = $conex->prepare('SELECT * FROM products');
        // Ejecutamos
        $stmt->execute();
        // Guardamos los resultados en un variable
        $result = $stmt->get_result();
        // Creamos una array, recorremos la variable y la guardamos
        $cereals = [];
        while ($row = $result->fetch_object('Cereals')) {
            $cereals[] = $row;
        }
        // Cerramos conexion
        $conex->close();
        // Devolvemos el resultado
        return $cereals;
    }

    public static function listCategories()
    {
        $conex = database::connect();
        $stmt = $conex->prepare('SELECT * FROM categories');

        $stmt->execute();

        $result = $stmt->get_result();

        $categories = [];
        while ($row = $result->fetch_object('Categories')) {
            $categories[] = $row;
        }

        $conex->close();

        return $categories;
    }

    public static function createProduct($product)
    {
        $conex = Database::connect();

        $stmt = $conex->prepare('INSERT INTO shirts (name, price, images) VALUES (?,?,?)');
        $stmt->bind_param("sdb", $product->getName(), $product->getPrice(), $product->getImage());

        $stmt->execute();
        $conex->close();
    }
}
