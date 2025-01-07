<?php
include_once 'model/Address.php';
include_once 'config/dataBase.php';

class AddressDAO
{
    public static function getAddress()
    {
        $userId = $_SESSION['user']['id'];

        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM address WHERE user_id = ?");

        $stmt->bind_param("i", $userId);

        $stmt->execute();

        $result = $stmt->get_result();

        $address = [];
        while ($row = $result->fetch_assoc()) {
            $address[] = $row;
        }

        $conex->close();
        return $address;
    }


    public static function edit_Address($address_id, $first_name, $last_name, $apartment, $address, $city, $state, $zipCode, $country)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("UPDATE address SET country=?, apartment=?, address=?, city=?, state=?, zipCode=?, first_name=?, last_name=? WHERE address_id=$address_id");

        $stmt->bind_param("sssssiss", $country, $apartment, $address, $city, $state, $zipCode, $first_name, $last_name,);

        $success = $stmt->execute();

        $conex->close();

        return $success;
    }

    public static function removeAddress($address_id)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("DELETE FROM address WHERE address_id = ?");
        $stmt->bind_param("i", $address_id);

        $stmt->execute();

        $conex->close();
    }
}
