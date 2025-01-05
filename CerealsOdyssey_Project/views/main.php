<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Icon -->
    <link rel="shortcut icon" href="public/img/logo.png" type="image/x-icon">
</head>

<body>
    <!-- Header -->
    <?php
    $controller = $_GET['controller'];
    $action = $_GET['action'] ?? null;

    if (in_array($controller, ['categories', 'product', 'cart', 'enterprise'])) {
        include_once 'layouts/header.php';
    } elseif (($controller == 'admin' || $controller == 'buy') || ($controller === 'user' && in_array($action, ['login', 'register']))) {
    } else {
        include_once 'layouts/headerUser.php';
    }
    ?>

    <!-- View -->
    <?php include_once $view ?>

    <!-- Footer -->
    <?php
    if ($controller === 'categories') {
        include_once 'layouts/footer.php';
    } elseif ($controller === 'user' && in_array($action, ['login', 'register', 'buyOrder'])) {
    } elseif ($controller == 'admin') {
    } else {
        include_once 'layouts/footer2.php';
    }
    ?>

    <!-- JS -->
    <script src="public/js/index.js"></script>
</body>

</html>