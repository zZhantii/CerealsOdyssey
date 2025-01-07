<?php
include_once 'model/Users.php';
include_once 'config/dataBase.php';

class UsersDAO
{
    public static function get_User_ByEmail($email)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        $user = $result->fetch_object('Users');

        $stmt->close();
        $conex->close();

        return $user;
    }

    public static function createUser($user)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("INSERT INTO users ( email, password) VALUES (?,?)");
        $stmt->bind_param("ss", $user->getEmail(), $user->getPassword());

        $stmt->execute();
        $conex->close();
    }

    public static function logUser($email, $password)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $conex->close();
    }

    public static function addInformation($fistName, $lastName)
    {
        $userId = $_SESSION['user']['id'];

        $conex = database::connect();
        $stmt = $conex->prepare("UPDATE users SET firstName = ?, lastName = ? WHERE user_id = ?");
        $stmt->bind_param("ssi", $fistName, $lastName, $userId);

        $success = $stmt->execute();

        $conex->close();

        return $success;
    }

    public static function updateUser($userId, $first_name, $last_name, $apartment, $address, $city, $state, $zipCode, $country)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("INSERT INTO address (user_id, country, apartment, address, city, state, zipCode, first_name, last_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("isssssiss", $userId, $country, $apartment, $address, $city, $state, $zipCode, $first_name, $last_name,);

        $success = $stmt->execute();

        $conex->close();

        return $success;
    }

    public static function getUserID($userId)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM users WHERE user_id = ?");

        $stmt->bind_param("i", $userId);

        $stmt->execute();

        $result = $stmt->get_result();

        $users = [];
        while ($row = $result->fetch_object('users')) {
            $users[] = $row;
        }

        $conex->close();
        return $users;
    }



    public static function findUser($email)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $conex->close();
    }


    public static function getUserApi()
    {
        $conex = database::connect();

        $stmtOrder = $conex->prepare("SELECT * FROM users");
        $stmtOrder->execute();

        $result = $stmtOrder->get_result();

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        $conex->close();

        return $users;
    }

    public static function create_user_api($data)
    {
        $conex = database::connect();

        $email = $data['email'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $password = $data['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $rol = $data['rol'];

        // Aquí es donde deberías preparar tu consulta SQL
        $stmt = $conex->prepare("INSERT INTO users (email, firstName, lastName, password, rol) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $email, $firstName, $lastName, $hashedPassword, $rol);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Order create successfully'];
        } else {
            return ['success' => false, 'message' => 'Error modifying order: ' . $stmt->error];
        }
    }

    public static function modify_user_api($data)
    {
        $conex = database::connect();
        // Asegúrate de que estás accediendo a los valores correctos
        $userId = $data['userID'];
        $email = $data['email'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $password = $data['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $rol = $data['rol'];

        // Aquí es donde deberías preparar tu consulta SQL
        $stmt = $conex->prepare("UPDATE users SET email=?, firstName=?, lastName=?, password=?, rol=? WHERE user_id=$userId");
        $stmt->bind_param("sssss", $email, $firstName, $lastName, $hashedPassword, $rol);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Order modified successfully'];
        } else {
            return ['success' => false, 'message' => 'Error modifying order: ' . $stmt->error];
        }
    }

    public static function delete_user_api($user_id)
    {
        $conex = database::connect();
        // Delete Orders_details
        $stmtOrder_Details = $conex->prepare("DELETE FROM users WHERE user_id = $user_id");
        $stmtOrder_Details->execute();

        $conex->close();
        return 'success';
    }
}
