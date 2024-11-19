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
}
