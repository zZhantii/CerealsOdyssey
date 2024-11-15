<?php
include_once 'model/Cereals.php';
include_once 'config/dataBase.php';

class CerealsDAO
{
    public static function getAllCereals()
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT p.* FROM products p 
                                INNER JOIN categories c ON p.categorie_id = c.categorie_id 
                                WHERE c.name = 'Cereals'");

        $stmt->execute();

        $result = $stmt->get_result();

        $categories = [];
        while ($row = $result->fetch_object('cereals')) {
            $categories[] = $row;
        }

        $conex->close();
        return $categories;
    }
}
