<?php

class enterpriseController
{
    public function story()
    {
        $view = 'views/pages/home/story.php';
        include_once 'views/main.php';
    }

    public function contact()
    {
        $view = 'views/pages/home/contact.php';
        include_once 'views/main.php';
    }
}
