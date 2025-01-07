<?php

class database
{
    public static function connect($host = 'localhost', $user = 'root', $pass = 'Cereals2024!@#', $db = 'CerealsOdyssey_DB')
    {
        $con = new mysqli($host, $user, $pass, $db);

        if ($con->connect_error) {
            die("ERROR!!: No te puedes conectar " . $con->connect_error);
        } else {
            return $con;
        }
    }
}
