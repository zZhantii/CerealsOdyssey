<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location:?controller=user&action=login");
    exit();
}


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
