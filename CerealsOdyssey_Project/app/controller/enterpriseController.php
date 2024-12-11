<?php

class enterpriseController
{
    public function story()
    {
        $view = 'views/pages/story.php';
        include_once 'views/main.php';
    }

    public function contact()
    {
        $view = 'views/pages/contact.php';
        include_once 'views/main.php';
    }
}
