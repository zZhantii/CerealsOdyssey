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

    public static function findUserId($userId)
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
}
