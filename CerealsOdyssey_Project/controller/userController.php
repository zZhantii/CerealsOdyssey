<?php
include_once('model/UsersDAO.php');
include_once('model/Users.php');
include_once('config/dataBase.php');
include_once('config/proteccion.php');

class userController
{
    public static function addUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = new Users();

        $user->setEmail($email);
        $user->setPassword($password);

        UsersDAO::createUser($user);

        $_SESSION['user'] = $user->getEmail();

        $view = 'views/pages/user/register.php';
        include_once 'views/main.php';
    }

    public static function searchUser()
    {
        $userId = $_GET['id'];
        $userData = UsersDAO::findUserId($userId);

        $view = 'views/pages/user/login.php';
        include_once 'views/main.php';
    }
}
