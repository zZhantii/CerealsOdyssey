<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="public/img/logo.png" type="image/x-icon">
</head>

<body>
    <!-- Header -->
    <?php
    if (isset($_GET['controller']) && $_GET['controller'] == 'categories' || $_GET['controller'] == 'product' || $_GET['controller'] == 'cart' ||  $_GET['controller'] == 'admin') {
        include_once 'partials/header.php';
    }

    if (isset($_GET['controller']) && $_GET['controller'] == 'user') {
        if (isset($_GET['action']) && $_GET['action'] == 'login' || $_GET['action'] == 'register') {
        } else {
            include_once 'partials/headerUser.php';
        }
    }

    ?>

    <!-- View -->
    <?php include_once $view ?>

    <!-- Footer -->
    <?php
    if (isset($_GET['controller']) && $_GET['controller'] == 'categories') {
        include_once 'partials/footer.php';
    } elseif (isset($_GET['controller']) && $_GET['controller'] == 'user') {
        if (isset($_GET['action']) && $_GET['action'] == 'login' || $_GET['action'] == 'register' || $_GET['action'] == 'buyOrder') {
        } else {
            include_once 'partials/footerUser.php';
        }
    } else {
        include_once 'partials/footer2.php';
    }
    ?>

    <!-- JS -->
    <script src="public/js/index.js"></script>
    <script src="api/api.js" defer></script>

    <!-- BootStrap -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>

</html>