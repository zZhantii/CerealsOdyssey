<?php
include_once 'model/Users.php';
include_once 'config/dataBase.php';

class UsersDAO
{
    public static function createUser($user)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("INSERT INTO users (password, email) VALUES (?,?)");
        $stmt->bind_param("ss", $user->getPassword(), $user->getEmail());

        $stmt->execute();
        $conex->close();
    }

    public static function insertInformation($userData)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("UPDATE users SET name = ?, lastName = ?, aparment = ?, address = ?, city = ?, stage = ?, zipCode = ?, country = ? WHERE user_id = ?");
        $stmt->bind_param("sssisi", $userData->getName(), $userData->getLastName(), $userData->getAparment(), $userData->getAddress(), $userData->getCity(), $userData->getZipCode(), $userData->getCountry(), $userData->getUser_Id());

        $stmt->execute();
        $conex->close();
    }

    public static function getUser($userId)
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

    public static function getUserEmail($email)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM users WHERE email = ?");

        $stmt->bind_param("i", $email);

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
}
