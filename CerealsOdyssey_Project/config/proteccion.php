<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = [];
}


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
