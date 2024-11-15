<?php
include_once 'model/Cereals.php';
include_once 'config/dataBase.php';

class OdysseyIDDAO
{
    public static function getOdysseyID()
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT p.* FROM products p 
                                INNER JOIN categories c ON p.categorie_id = c.categorie_id 
                                WHERE c.name = 'OdysseyID'");

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
