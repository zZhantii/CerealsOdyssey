<?php

class database
{
    public static function connect($host = 'fdb1029.awardspace.net', $user = '4571976_cerealsodyssey', $pass = 'Ex-hN8Ck9W,Ri%(I', $db = '4571976_cerealsodyssey')
    {
        $con = new mysqli($host, $user, $pass, $db);

        if ($con->connect_error) {
            die("ERROR!!: No te puedes conectar " . $con->connect_error);
        } else {
            return $con;
        }
    }
}
