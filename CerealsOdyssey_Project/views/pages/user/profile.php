<head>
    <title>Cereals Odyssey | Profile</title>
</head>

<body class="bg-light">
    <main class="profile my-5">
        <section class="container mt-4">
            <h3>Profile</h3>
            <div class="container bg-white mt-4 p-4 rounded d-flex flex-column">
                <div class="d-flex gap-3 align-items-center">
                    <?php if (!empty($user)) { ?>
                        <strong><?= $user->getFirstName() . ' ' . $user->getLastName() ?></strong>
                    <?php } else { ?>
                        <p>Name</p>
                    <?php } ?>
                    <!-- Button Modal -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00359a" viewBox="0 0 256 256">
                            <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path>
                        </svg>
                    </button>
                    <!-- Modal -->
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
                                                <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="firstName" value="<?= !empty($user) ? $user->getFirstName() : '' ?>">
                                                <label for="floatingInput">First Name</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="lastName" value="<?= !empty($user) ? $user->getLastName() : '' ?>">
                                                <label for="floatingInput">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInputDisabled" placeholder="<?= $_SESSION['user']['email'] ?>" aria-describedby="information" disabled>
                                            <label for="floatingInputDisabled"><strong><?= $_SESSION['user']['email'] ?></strong></label>
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
                                                <!-- África -->
                                                <optgroup label="Africa">
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Uganda">Uganda</option>
                                                </optgroup>

                                                <!-- América del Norte -->
                                                <optgroup label="North America">
                                                    <option value="United States">United States</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Mexico">Mexico</option>
                                                </optgroup>

                                                <!-- América del Sur -->
                                                <optgroup label="South America">
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Peru">Peru</option>
                                                </optgroup>

                                                <!-- Europa -->
                                                <optgroup label="Europe">
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="France">France</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sweden">Sweden</option>
                                                </optgroup>

                                                <!-- Asia -->
                                                <optgroup label="Asia">
                                                    <option value="China">China</option>
                                                    <option value="India">India</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="South Korea">South Korea</option>
                                                    <option value="Singapore">Singapore</option>
                                                </optgroup>

                                                <!-- Oceanía -->
                                                <optgroup label="Oceania">
                                                    <option value="Australia">Australia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                </optgroup>

                                                <!-- Medio Oriente -->
                                                <optgroup label="Middle East">
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Turkey">Turkey</option>
                                                </optgroup>
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
                                    <div class="d-flex">
                                        <div class="form-floating p-0 pe-3 col-md-4">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="City" name="city" required>
                                            <label for="floatingInput">City</label>
                                        </div>
                                        <div class="form-floating p-0 pe-3 col-md-4">
                                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="state" required>
                                                <!-- Estados de Estados Unidos -->
                                                <optgroup label="United States">
                                                    <option value="Alabama">Alabama</option>
                                                    <option value="Alaska">Alaska</option>
                                                    <option value="Arizona">Arizona</option>
                                                    <option value="Arkansas">Arkansas</option>
                                                    <option value="California">California</option>
                                                    <option value="Colorado">Colorado</option>
                                                    <option value="Connecticut">Connecticut</option>
                                                    <option value="Delaware">Delaware</option>
                                                    <option value="Florida">Florida</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Hawaii">Hawaii</option>
                                                    <option value="Idaho">Idaho</option>
                                                    <option value="Illinois">Illinois</option>
                                                    <option value="Indiana">Indiana</option>
                                                    <option value="Iowa">Iowa</option>
                                                    <option value="Kansas">Kansas</option>
                                                    <option value="Kentucky">Kentucky</option>
                                                    <option value="Louisiana">Louisiana</option>
                                                    <option value="Maine">Maine</option>
                                                    <option value="Maryland">Maryland</option>
                                                    <option value="Massachusetts">Massachusetts</option>
                                                    <option value="Michigan">Michigan</option>
                                                    <option value="Minnesota">Minnesota</option>
                                                    <option value="Mississippi">Mississippi</option>
                                                    <option value="Missouri">Missouri</option>
                                                    <option value="Montana">Montana</option>
                                                    <option value="Nebraska">Nebraska</option>
                                                    <option value="Nevada">Nevada</option>
                                                    <option value="New Hampshire">New Hampshire</option>
                                                    <option value="New Jersey">New Jersey</option>
                                                    <option value="New Mexico">New Mexico</option>
                                                    <option value="New York">New York</option>
                                                    <option value="North Carolina">North Carolina</option>
                                                    <option value="North Dakota">North Dakota</option>
                                                    <option value="Ohio">Ohio</option>
                                                    <option value="Oklahoma">Oklahoma</option>
                                                    <option value="Oregon">Oregon</option>
                                                    <option value="Pennsylvania">Pennsylvania</option>
                                                    <option value="Rhode Island">Rhode Island</option>
                                                    <option value="South Carolina">South Carolina</option>
                                                    <option value="South Dakota">South Dakota</option>
                                                    <option value="Tennessee">Tennessee</option>
                                                    <option value="Texas">Texas</option>
                                                    <option value="Utah">Utah</option>
                                                    <option value="Vermont">Vermont</option>
                                                    <option value="Virginia">Virginia</option>
                                                    <option value="Washington">Washington</option>
                                                    <option value="West Virginia">West Virginia</option>
                                                    <option value="Wisconsin">Wisconsin</option>
                                                    <option value="Wyoming">Wyoming</option>
                                                </optgroup>
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
                    <?php if (empty($address)) { ?>
                        <div class="bg-secondary p-3 mt-3 rounded border">
                            <p>No addresses were added.</p>
                        </div>
                    <?php } else { ?>
                        <?php include_once 'views/pages/user/listAddress.php' ?>
                    <?php } ?>

                </div>
            </div>
        </section>
        <?php include_once 'views/assets/success.php' ?>
    </main>
</body>

</html>