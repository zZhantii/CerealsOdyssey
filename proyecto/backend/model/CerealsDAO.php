<?php
include_once 'config/database.php';
include_once 'model/Cereals.php';


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

    public static function createProduct($product)
    {
        $conex = Database::connect();

        $stmt = $conex->prepare('INSERT INTO shirts (name, price, images) VALUES (?,?,?)');
        $stmt->bind_param("sdb", $product->getName(), $product->getPrice(), $product->getImage());

        $stmt->execute();
        $conex->close();
    }
}
