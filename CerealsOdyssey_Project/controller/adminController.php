<?php

class adminController
{
    public static function showPanel()
    {
        $view = 'views/admin/panelAdmin.php';
        include_once 'views/main.php';
    }

    public static function showPanelOrder()
    {
        $view = 'views/admin/panelAdminOrder.php';
        include_once 'views/main.php';
    }

    public static function showPanelUser()
    {
        $view = 'views/admin/panelAdminUser.php';
        include_once 'views/main.php';
    }

    public static function showPanelProduct()
    {
        $view = 'views/admin/panelAdminProduct.php';
        include_once 'views/main.php';
    }
}
