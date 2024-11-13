<?php
include_once 'config/params.php';
include_once 'config/database.php';
include_once 'model/Categories.php';
include_once 'model/CategoriesDAO.php';

class homeController
{
    public function index()
    {
        // Llamamos a la base de datos y lo guardamos en una variable
        $categories = CategoriesDAO::getAllCategories();
        // Creamos una variable para mostrar la vista que nos interesa
        $view = include_once url_base . 'views/products/categories.php';
        // Incluimos la pagina que queremos que se vea
        include_once 'views/pages/home.php';
    }
}
