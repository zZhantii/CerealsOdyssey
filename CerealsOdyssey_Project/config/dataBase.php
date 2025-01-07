<?php

class database
{
    public static function connect($host = 'sql108.infinityfree.com', $user = 'if0_38054284', $pass = 'iAK9JS1qCcEu', $db = 'if0_38054284_cerealsodyssey')
    {
        $con = new mysqli($host, $user, $pass, $db);

        if ($con->connect_error) {
            die("ERROR!!: No te puedes conectar " . $con->connect_error);
        } else {
            return $con;
        }
    }
}
