<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?= img ?>Logo.png" type="image/x-icon">
</head>

<body>

    <!-- Header -->
    <?php include_once 'views/partials/header.php' ?>

    <!-- View -->
    <?php include_once $view ?>

    <!-- Footer -->
    <?php include_once 'views/partials/footer.php' ?>

    <!-- BootStrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>