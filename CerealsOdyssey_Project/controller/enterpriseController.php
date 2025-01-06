<?php

class enterpriseController
{
    public function story()
    {
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/home/story.php';
        include_once 'views/main.php';
    }

    public function contact()
    {
        $categories = CategoriesDAO::getAllCategories();
        $view = 'views/pages/home/contact.php';
        include_once 'views/main.php';
    }
}
