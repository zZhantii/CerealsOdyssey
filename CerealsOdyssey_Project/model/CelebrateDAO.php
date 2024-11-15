<?php
include_once 'model/Celebrate.php';
include_once 'config/dataBase.php';

class CelebrateDAO
{
    public static function getCelebrate()
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
}
