<?php
include_once('model/UsersDAO.php');
include_once('model/Users.php');
include_once('config/dataBase.php');

class userController
{
    public static function show()
    {
        $view = 'views/pages/login.php';
        include_once 'views/main.php';
    }

    public static function profile()
    {
        $view = 'views/pages/user/profile.php';
        include_once 'views/main.php';
    }

    public static function settings()
    {
        $view = 'views/pages/user/settings.php';
        include_once 'views/main.php';
    }

    public static function logUser()
    {
        // $name = $_POST['name'];
        // $password = $_POST['password'];
        // $email = $_POST['email'];

        // $user = new Users();

        // $user->setName($name);
        // $user->setPassword($password);
        // $user->setEmail($email);

        // UsersDAO::createUser($user);
    }

    public static function createUser()
    {
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (isset($_POST['password']) && ($_POST['email'])) {
            $password = $_POST['password'];
            $email = $_POST['email'];

            $user = new Users();
            $user->setPassword($password);
            $user->setEmail($email);

            UsersDAO::createUser($user);
            header("Location:?controller=user&action=profile");
        } else {
            var_dump($_POST);
            die("Error: Los campos de contraseña y correo electrónico son obligatorios.");
        }
    }
}
