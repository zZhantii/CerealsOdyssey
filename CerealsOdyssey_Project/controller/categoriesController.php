<?php
include_once('model/CategoriesDAO.php');
include_once('model/Categories.php');
include_once('config/dataBase.php');

class categoriesController
{
    public function index()
    {
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/home/home.php';
        include_once 'views/main.php';
    }
}
