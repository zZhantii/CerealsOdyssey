<?php

class adminController
{
    public static function showPanel()
    {
        $view = 'views/admin/panelAdmin.php';
        include_once 'views/main.php';
    }
}
