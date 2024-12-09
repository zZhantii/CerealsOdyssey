<?php
include_once 'model/Users.php';
include_once 'config/dataBase.php';

class UsersDAO
{
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

    public static function getUserByEmail($email)
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
}
