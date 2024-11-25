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

    public static function destroy()
    {
        session_destroy();
        header("location:" . url_base . "?controller=categories");
    }

    public static function addUser($users)
    {
        if (!is_array($users)) {
            $users = [$users];
        }

        foreach ($users as $item) {
            $userData = [
                'email' => $item->getEmail(),
                'password' => $item->getPassword(),
                'id' => $item->getUser_id(),
            ];

            $_SESSION['user'][] = $userData;
        }
        return $_SESSION['user'];
    }

    public static function addInformation($users)
    {
        if (!is_array($users)) {
            $users = [$users];
        }

        foreach ($users as $item) {
            $userData = [
                'name' => $item->getName(),
                'email' => $item->getEmail(),
                'password' => $item->getPassword(),
                'id' => $item->getUser_id(),
                'address' => $item->getAddress(),
                'apartment' => $item->getApartment(),
                'city' => $item->getCity(),
                'stage' => $item->getStage(),
                'ZipCode' => $item->getZipCode(),
                'Country' => $item->getCountry()
            ];

            UsersDAO::insertInformation($userData);
            $_SESSION['user'][] = $userData;
        }
        return $_SESSION['user'];
    }

    public static function logUser()
    {
        if (isset($_POST['password']) && isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (UsersDAO::logUser($email, $password)) {
                $user = new Users();
                $user->setEmail($email);
                $user->setPassword($password);

                $user_Id = UsersDAO::getUserEmail($email);

                foreach ($user_Id as $item) {
                    $user_Id = $item->getUser_id();
                }

                $user->setUser_id($user_Id);


                // Agregar el usuario a la sesión.
                self::addUser([$user]);

                // Redirigir al perfil del usuario.
                header("Location:?controller=user&action=profile");
                exit;
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
                    header("Location:?controller=user&action=login");
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
