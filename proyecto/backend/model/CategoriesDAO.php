<?php

include_once 'config/database.php';
include_once 'model/categories.php';

class CategoriesDAO
{
    public static function getAllCategories()
    {
        // Conexion a la base de datos
        $conex = Database::connect();
        // Query
        $stmt = $conex->prepare('SELECT * FROM categories');
        // Ejecutamos
        $stmt->execute();
        // Guardamos los resultados en un variable
        $result = $stmt->get_result();
        // Creamos una array, recorremos la variable y la guardamos
        $categories = [];
        while ($row = $result->fetch_object('categories')) {
            $categories[] = $row;
        }
        // Cerramos conexion
        $conex->close();
        // Devolvemos el resultado
        return $categories;
    }
}
