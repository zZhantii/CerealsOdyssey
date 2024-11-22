<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cereals Odyssey | Profile</title>
</head>

<body class="bg-light">
    <?php include_once 'views\partials\headerUser.php' ?>

    <main>
        <section class="container mt-4">
            <h3>Profile</h3>
            <div class="container bg-white mt-4 p-4 rounded d-flex flex-column gap-4">
                <div class="d-flex gap-3 align-items-center">
                    <p>Name</p>
                    <p>Lapiz</p>
                </div>
                <div>
                    <p>Email</p>
                    <p><?= $_SESSION['user']['email'] ?></p>
                    <?= var_dump($_SESSION['user']); ?>
                </div>
            </div>
            <div class="container bg-white mt-4 p-4 rounded d-flex flex-column gap-4">
                <div class="d-flex gap-3 align-items-center">
                    <b>Address</b>
                    <p>+agregar</p>
                </div>
                <div class="bg-secondary p-3 rounded border">
                    <p>No se agregaron direcciones.</p>
                </div>
                <div>
                    <p>Address</p>
                    <p>santiago.lozada.925602@gmail.com</p>
                    <p>direccion</p>
                    <p>Aparment</p>
                    <p>city, estaod, zip code</p>
                    <p>country</p>
                </div>
            </div>
        </section>
    </main>
    <?php include_once 'views\partials\footerUser.php' ?>
</body>

</html>