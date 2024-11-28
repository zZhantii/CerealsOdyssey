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

    public static function logUser()
    {
        if (isset($_POST['password']) && isset($_POST['email'])) {
            $email = $_POST['email'];
            $password =  $_POST['password'];

            if (UsersDAO::logUser($email, $password)) {
                $user = new Users();
                $user->setEmail($email);
                $user->setPassword($password);

                $user_Id = UsersDAO::getUserEmail($email);

                foreach ($user_Id as $item) {
                    $user_Id = $item->getUser_id();
                }

                $user->setUser_id($user_Id);

                self::addUser([$user]);

                header("Location:?controller=user&action=profile");
                exit;
            } else {
                header("Location:?controller=user&action=login&error=401");
                exit;
            }
        }
    }

    public static function register()
    {
        $view = 'views/pages/user/register.php';
        include_once 'views/main.php';
    }

    public static function createUser()
    {
        if (isset($_POST['password']) && isset($_POST['email']) && isset($_POST['confirmPassword'])) {
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $confirmPassword = password_hash($_POST['confirmPassword'], PASSWORD_DEFAULT);

            if (UsersDAO::findUser($email)) {
                header("Location:?controller=user&action=register&error=4012");
                exit;
            } else {
                if ($password === $confirmPassword) {
                    $user = new Users();
                    $user->setPassword($password);
                    $user->setEmail($email);

                    UsersDAO::createUser($user);
                    header("Location:?controller=user&action=login");
                    exit;
                } else {
                    header("Location:?controller=user&action=register&error=4013");
                    exit;
                }
            }
        }
    }

    public static function profile()
    {
        $view = 'views/pages/user/profile.php';
        include_once 'views/main.php';
    }

    public static function addInformationUser()
    {
        if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];

            $informaion = [$firstName, $lastName];

            UsersDAO::addInformation($firstName, $lastName);

            $userData = [
                'firstName' => $firstName,
                'lastName' => $lastName
            ];

            $_SESSION['userInformation'][] = $userData;

            return $_SESSION['userInformation'];
        }
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

        // $inputs = ['Country/regions', 'name', 'lastName', 'address', 'aparment', 'city', 'stage', 'zipCode'];
        // $inputsTrue = [];

        // foreach ($inputs as $item) {
        //     if (!isset($_POST[$item])) {
        //         $items = false;
        //         break;
        //     } else {
        //         $inputsTrue[] = $item;
        //     }
        // }

        // var_dump($inputsTrue);

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
}
