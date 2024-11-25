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
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00359a" viewBox="0 0 256 256">
                            <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path>
                        </svg>
                    </a>
                </div>
                <div>
                    <p>Email</p>
                    <p><b><?= $_SESSION['user'][0]['email'] ?></b></p>
                </div>
            </div>
            <div class="container bg-white mt-4 p-4 rounded d-flex flex-column gap-4">
                <div class="d-flex gap-3 align-items-center">
                    <b>Address</b>
                    <a href="?controller=user&action=addInformation" class="ms-3">+ Agregar</a>
                </div>
                <div class="bg-secondary p-3 rounded border">
                    <p>No se agregaron direcciones.</p>
                </div>
                <div>
                    <div class="d-flex align-items-center gap-3">
                        <p>Direccion predeterminada</p>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00359a" viewBox="0 0 256 256">
                                <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path>
                            </svg>
                        </a>
                    </div>
                    <p><?= $_SESSION['user'][0]['name'] ?></p>
                    <p><?= $_SESSION['user'][0]['email'] ?></p>
                    <p><?= $_SESSION['user'][0]['address'] ?></p>
                    <p><?= $_SESSION['user'][0]['apartment'] ?></p>
                    <p><?= $_SESSION['user'][0]['city'] ?></p>
                    <p><?= $_SESSION['user'][0]['stage'] ?></p>
                    <p><?= $_SESSION['user'][0]['zipcode'] ?></p>
                    <p><?= $_SESSION['user'][0]['contry'] ?></p>
                </div>
            </div>
        </section>

        <div class="container w-75 bg-info rounded p-4">
            <form action="?controller=user&action=addInformation" method="post">
                <div class="row gap-3 flex-column">
                    <div>
                        <div class="d-flex justify-content-between">
                            <h3>Agregar una direccion</h3>
                            <p>Cruz</p>
                        </div>
                    </div>
                    <div>
                        <div class="form-floating p-0">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="Country/regions">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Country / Regions</label>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between p-0 ">
                            <div class="form-floating p-0 col-md-6 pe-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="name">
                                <label for="floatingInput">First Name</label>
                            </div>
                            <div class="form-floating p-0 col-md-6 ps-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="lastName">
                                <label for="floatingInput">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-floating p-0 col-md-12">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="address">
                            <label for="floatingInput">Address</label>
                        </div>
                    </div>
                    <div>
                        <div class="form-floating p-0 col-md-12">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Address" name="aparment">
                            <label for="floatingInput">Aparment</label>
                        </div>
                    </div>
                    <div class="d-flex ">
                        <div class="form-floating p-0 pe-3 col-md-4">
                            <input type="text" class="form-control" id="floatingInput" placeholder="City" name="city">
                            <label for="floatingInput">City</label>
                        </div>
                        <div class="form-floating p-0 pe-3 col-md-4">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="stage">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Works with selects</label>
                        </div>
                        <div class="form-floating p-0 col-md-4">
                            <input type="text" class="form-control" id="floatingInput" placeholder="zipCode" name="zipCode">
                            <label for="floatingInput">Zip Code</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <input type="submit" class="buttonMain" value="Delete">
                        </div>
                        <div class="d-flex gap-3">
                            <input type="submit" class="buttonMain2" value="Cancelar">
                            <input type="submit" class="buttonMain" value="Guardar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php include_once 'views\partials\footerUser.php' ?>
</body>

</html>