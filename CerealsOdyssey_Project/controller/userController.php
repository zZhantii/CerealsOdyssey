<?php
include_once('model/UsersDAO.php');
include_once('model/Users.php');
include_once('config/dataBase.php');
include_once('config/proteccion.php');

class userController
{
    public static function login()
    {
        $view = 'views/pages/user/login.php';
        include_once 'views/main.php';
    }

    public static function register()
    {
        $view = 'views/pages/user/register.php';
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

    public static function orders() {}

    public static function logUser()
    {
        if (isset($_POST['password']) && ($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userAdd = [
                'email' => $email,
                'password' => $password
            ];

            if (UsersDAO::logUser($email, $password)) {
                // Users::addUser($userAdd);
                header("Location:?controller=user&action=profile&id=" . $_SESSION['user']['id']);
            } else {
                echo "Invalid email or password";
            }
        }
    }

    public static function createUser()
    {
        if (isset($_POST['password']) && isset($_POST['email']) && isset($_POST['confirmPassword'])) {
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Error: El formato del correo electrónico es inválido.";
                return;
            }

            if (UsersDAO::findUser($email)) {
                echo "Error: El usuario ya existe.";
                return;
            } else {
                if ($password === $confirmPassword) {
                    $user = new Users();
                    $user->setPassword($password);
                    $user->setEmail($email);

                    UsersDAO::createUser($user);
                    Users::addUser($user);
                    header("Location:?controller=user&action=profile");
                    exit;
                } else {
                    echo "Error: Las contraseñas no coinciden.";
                    return;
                }
            }
        } else {
            echo "Error: Los campos de contraseña y correo electrónico son obligatorios.";
            return;
        }
    }
}
