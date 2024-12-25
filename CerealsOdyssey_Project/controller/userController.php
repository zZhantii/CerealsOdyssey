<?php
include_once('model/AddressDAO.php');
include_once('model/Address.php');
include_once('model/UsersDAO.php');
include_once('model/Users.php');
include_once('config/dataBase.php');
include_once('config/proteccion.php');

class userController
{
    public static function orders()
    {
        $order_details = AllProductsDAO::getOrder_details();
        $orders = AllProductsDAO::getOrder();
        $cart = $_SESSION['cart'];
        $total = Cart::total_price($cart);
        $totalItems = Cart::total_items($cart);
        $view = 'views/pages/user/orders.php';
        include_once 'views/main.php';
    }

    public static function login()
    {
        $view = 'views/pages/user/login.php';
        include_once 'views/main.php';
    }

    public static function logUser()
    {
        if (isset($_POST['password']) && isset($_POST['email'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = UsersDAO::get_User_ByEmail($email);

            $rol = $user->getRol();

            if ($user) {
                $hashedPassword = $user->getPassword();
                // Comprueba la contraseña encriptada
                if (password_verify($password, $hashedPassword)) {
                    $user_Id = $user->getUser_id();
                }

                // Almacena datos en la variable
                $_SESSION['user'] = [
                    'id' => $user_Id,
                    'email' => $email,
                    'rol' => $rol
                ];

                // Redirigir al perfil del usuario
                header("Location:?controller=user&action=profile");
                exit;
            } else {
                // Redirigir con un error
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
            $password = $_POST['password']; // Mantener la contraseña en texto plano
            $confirmPassword = $_POST['confirmPassword']; // Mantener la confirmación en texto plano

            if (UsersDAO::findUser($email)) {
                header("Location:?controller=user&action=register&error=4012");
                exit;
            } else {
                if ($password === $confirmPassword) { // Comparar las contraseñas en texto plano
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash de la contraseña

                    $user = new Users();
                    $user->setPassword($hashedPassword);
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
        $address = AddressDAO::getAddress();
        $email = $_SESSION['user']['email'];
        $user = UsersDAO::get_User_ByEmail($email);
        $view = 'views/pages/user/profile.php';
        include_once 'views/main.php';
    }

    public static function removeAddress()
    {
        $address_id = $_GET['id'];
        $remove = AddressDAO::removeAddress($address_id);
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

    public static function destroy()
    {
        session_destroy();
        header("location:" . url_base . "?controller=categories");
    }

    public static function addInformationPersonal()
    {
        if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];

            $_SESSION['user']['firstName'] = $firstName;
            $_SESSION['user']['lastName'] = $lastName;

            UsersDAO::addInformation($firstName, $lastName);

            header("Location:?controller=user&action=profile&success=1");
            exit;
        } else {
            header("Location:?controller=user&action=profile&error=500");
            exit;
        }
    }

    public static function addInformation()
    {
        if (isset(
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['apartment'],
            $_POST['address'],
            $_POST['city'],
            $_POST['state'],
            $_POST['zipCode'],
            $_POST['country']
        )) {

            // Recoger los datos enviados por el formulario
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $apartment = $_POST['apartment'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zipCode = $_POST['zipCode'];
            $country = $_POST['country'];

            // Obtener el ID del usuario desde la sesión
            $userId = $_SESSION['user']['id'];

            // Actualizar los datos del usuario en la base de datos
            $success = UsersDAO::updateUser(
                $userId,
                $first_name,
                $last_name,
                $apartment,
                $address,
                $city,
                $state,
                $zipCode,
                $country
            );

            if ($success) {
                // Actualizar los datos en la variable de sesión
                $_SESSION['user']['first_name'] = $first_name;
                $_SESSION['user']['last_name'] = $last_name;
                $_SESSION['user']['apartment'] = $apartment;
                $_SESSION['user']['address'] = $address;
                $_SESSION['user']['city'] = $city;
                $_SESSION['user']['state'] = $state;
                $_SESSION['user']['zipCode'] = $zipCode;
                $_SESSION['user']['country'] = $country;

                header("Location:?controller=user&action=profile&success=1");
                exit;
            } else {
                header("Location:?controller=user&action=profile&error=500");
                exit;
            }
        } else {
            echo "No entra isset";
        }
    }

    public static function editInformationUser()
    {
        if (isset(
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['apartment'],
            $_POST['address'],
            $_POST['city'],
            $_POST['state'],
            $_POST['zipCode'],
            $_POST['country']
        )) {

            // Recoger los datos enviados por el formulario
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $apartment = $_POST['apartment'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zipCode = $_POST['zipCode'];
            $country = $_POST['country'];

            // Obtener el ID del usuario desde la sesión
            $userId = $_SESSION['user']['id'];

            // Actualizar los datos del usuario en la base de datos
            $success = AddressDAO::edit_Address(
                $userId,
                $first_name,
                $last_name,
                $apartment,
                $address,
                $city,
                $state,
                $zipCode,
                $country
            );

            header("Location:?controller=user&action=profile&success=1");
            exit;
        }
    }
}
