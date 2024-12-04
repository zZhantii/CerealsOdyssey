<head>
    <title>Cereals Odyssey | Profile</title>
</head>

<body class="bg-light">
    <main>
        <section class="container mt-4">
            <h3>Profile</h3>
            <div class="container bg-white mt-4 p-4 rounded d-flex flex-column">
                <div class="d-flex gap-3 align-items-center">
                    <?php if (!empty($_SESSION['user']['firstName']) || !empty($_SESSION['user']['lastName'])) { ?>
                        <strong><?= $_SESSION['user']['firstName'] . ' ' . $_SESSION['user']['lastName'] ?></strong>
                    <?php } else { ?>
                        <p>Name</p>
                    <?php } ?>
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00359a" viewBox="0 0 256 256">
                            <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path>
                        </svg>
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="?controller=user&action=addInformationPersonal" method="post">
                                    <div class="modal-body">
                                        <div class="d-flex gap-3">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="firstName">
                                                <label for="floatingInput">First Name</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingtext" placeholder="Last Name" name="lastName">
                                                <label for="floatingtext">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" aria-describedby="information" disabled>
                                            <label for="floatingInputDisabled">Email address</label>
                                            <div id="information" class="form-text">The e-mail address used to log in cannot be changed.</div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn " data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary buttonMain">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p>Email</p>
                    <strong><?= $_SESSION['user']['email'] ?></strong>
                </div>
            </div>
            <div class="container bg-white mt-4 p-4 rounded d-flex flex-column">
                <div class="d-flex gap-3 align-items-center">
                    <b>Address</b>
                    <button class="btn ms-3 text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        + Agregar
                    </button>
                </div>
                <!-- Model para añadir informacion al usuario -->
                <form action="?controller=user&action=addInformation" method="post">
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add an Address</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex gap-3 flex-column">
                                    <div>
                                        <div class="form-floating p-0">
                                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="country" required>
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
                                                <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="first_name" required>
                                                <label for="floatingInput">First Name</label>
                                            </div>
                                            <div class="form-floating p-0 col-md-6 ps-2">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="last_name" required>
                                                <label for="floatingInput">Last Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-floating p-0 col-md-12">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Address" name="address" required>
                                            <label for="floatingInput">Address</label>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-floating p-0 col-md-12">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Apartment" name="apartment" required>
                                            <label for="floatingInput">Apartment</label>
                                        </div>
                                    </div>
                                    <div class="d-flex ">
                                        <div class="form-floating p-0 pe-3 col-md-4">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="City" name="city" required>
                                            <label for="floatingInput">City</label>
                                        </div>
                                        <div class="form-floating p-0 pe-3 col-md-4">
                                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="state" required>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <label for="floatingSelect">State</label>
                                        </div>
                                        <div class="form-floating p-0 col-md-4">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Zip Code" name="zipCode" required>
                                            <label for="floatingInput">Zip Code</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn " data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary buttonMain">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div>
                    <?php if (!empty($_SESSION['user']['first_name']) || !empty($_SESSION['user']['last_name']) || !empty($_SESSION['user']['address']) || !empty($_SESSION['user']['apartment']) || !empty($_SESSION['user']['city']) || !empty($_SESSION['user']['state']) || !empty($_SESSION['user']['zipCode']) || !empty($_SESSION['user']['country'])) { ?>
                        <div class="d-flex align-items-center gap-3">
                            <p>Direccion predeterminada</p>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00359a" viewBox="0 0 256 256">
                                    <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Model para actualizar informacion -->
                        <form action="?controller=user&action=addInformation" method="post">
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add an Address</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex gap-3 flex-column">
                                            <div>
                                                <div class="form-floating p-0">
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="country" required>
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
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="first_name" value="<?= $_SESSION['user']['first_name'] ?>" required>
                                                        <label for="floatingInput">First Name</label>
                                                    </div>
                                                    <div class="form-floating p-0 col-md-6 ps-2">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="last_name" value="<?= $_SESSION['user']['last_name'] ?>" required>
                                                        <label for="floatingInput">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="form-floating p-0 col-md-12">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Address" name="address" value="<?= $_SESSION['user']['address'] ?>" required>
                                                    <label for="floatingInput">Address</label>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="form-floating p-0 col-md-12">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Apartment" name="apartment" value="<?= $_SESSION['user']['apartment'] ?>" required>
                                                    <label for="floatingInput">Apartment</label>
                                                </div>
                                            </div>
                                            <div class="d-flex ">
                                                <div class="form-floating p-0 pe-3 col-md-4">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="City" name="city" value="<?= $_SESSION['user']['city'] ?>" required>
                                                    <label for="floatingInput">City</label>
                                                </div>
                                                <div class="form-floating p-0 pe-3 col-md-4">
                                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="state" required>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                    <label for="floatingSelect">State</label>
                                                </div>
                                                <div class="form-floating p-0 col-md-4">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Zip Code" name="zipCode" value="<?= $_SESSION['user']['zipCode'] ?>" required>
                                                    <label for="floatingInput">Zip Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn " data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary buttonMain">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p><?= $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'] ?></p>
                        <p><?= $_SESSION['user']['address'] ?></p>
                        <p><?= $_SESSION['user']['apartment'] ?></p>
                        <p><?= $_SESSION['user']['city'] . ' ' . $_SESSION['user']['state'] . ' ' . $_SESSION['user']['zipCode'] ?></p>
                        <p><?= $_SESSION['user']['country'] ?></p>
                    <?php } else { ?>
                        <div class="bg-secondary p-3 mt-3 rounded border">
                            <p>No se agregaron direcciones.</p>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </section>
    </main>
    <?php include_once 'views\partials\footerUser.php' ?>
</body>

</html>