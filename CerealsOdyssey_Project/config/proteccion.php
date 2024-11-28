<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [];
}

if (!isset($_SESSION['userInformation'])) {
    $_SESSION['userInformation'] = [];
}

if (!isset($_SESSION['userAddress'])) {
    $_SESSION['userAddress'] = [];
}
