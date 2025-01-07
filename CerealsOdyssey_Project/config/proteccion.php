<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['user']) || !is_array($_SESSION['user'])) {
    $_SESSION['user'] = [];
}
