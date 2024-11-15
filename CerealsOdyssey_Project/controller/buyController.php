<?php
include_once('config/dataBase.php');

class buyController
{
    public function buyOrder()
    {
        $view = 'views/pages/buy.php';
        include_once 'views/main.php';
    }
}
