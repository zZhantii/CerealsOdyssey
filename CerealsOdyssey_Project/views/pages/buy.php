<head>
    <title>Cereals Odyssey | Checkout</title>
</head>

<body>
    <main class="d-flex justify-content-center">
        <section class="informationPersonal container-fluid">
            <form action="?controller=buy&action=createOrder" method="POST">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <a href="?contoller=categories">
                                <img src="<?= url_base ?>public/img/logo.png" alt="logo" height="90" width="90">
                            </a>
                            <a href="?contoller=cart&action=show">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#0359ca" viewBox="0 0 256 256">
                                    <path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM176,88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <?php if ($showForm) { ?>
                        <div class="accordion accordion-flush my-5" id="accordionFlushExample">
                            <div class="accordion-item border-bottom pb-4">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed p-0 " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Account
                                    </button>
                                    <p class="pt-3"><?= $_SESSION['user']['email'] ?></p>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body p-0 pt-3">
                                        <a href="?controller=user&action=destroy">Log out</a>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                        Ship to
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div>
                                            <?php if ($showInformationAddress) { ?>
                                                <p><?= $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'] . ',' . $_SESSION['user']['address'] . ' ' .  $_SESSION['user']['apartment'] ?></p>
                                                <p><?= $_SESSION['user']['city'] . ' ' . $_SESSION['user']['state'] . ' ' . $_SESSION['user']['zipCode'] . ' ' . $_SESSION['user']['country'] ?></p>
                                            <?php } else { ?>
                                                <a href="?controller=user&action=addInformation">Use a different address</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else { ?>
                        <div class="row mt-4">
                            <div class="col mb-3 d-flex justify-content-between align-items-center">
                                <h3>Contact</h3>
                                <a href="?controller=user&action=login">Log In</a>
                            </div>
                            <div class="form-floating mb-3 p-0">
                                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked"> By submitting my email address, I agree to receive marketing communications from Oreo and other Mondelez Brands. I also confirm that I am at least 18 years of age and that I have read and agreed to the privacy policy. </label>
                            </div>
                        </div>
                        <div class="row mt-4 g-3">
                            <h3>Delivery</h3>
                            <div class="form-floating p-0">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="country" required>
                                    <option selected disabled>Select Country / Region</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">Country / Regions</label>
                            </div>
                            <div class="d-flex justify-content-between p-0">
                                <div class="form-floating p-0 col-md-6 pe-2">
                                    <input type="text" class="form-control" name="first_name" id="floatingInput" placeholder="First Name" required>
                                    <label for="floatingInput">First Name</label>
                                </div>
                                <div class="form-floating p-0 col-md-6 ps-2">
                                    <input type="text" class="form-control" name="last_name" id="floatingInput" placeholder="Last Name" required>
                                    <label for="floatingInput">Last Name</label>
                                </div>
                            </div>
                            <div class="form-floating p-0 col-md-12">
                                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating p-0 col-md-12">
                                <input type="text" class="form-control" name="address" id="floatingInput" placeholder="Address" required>
                                <label for="floatingInput">Address</label>
                            </div>
                            <div class="form-floating p-0 pe-3 col-md-4">
                                <input type="text" class="form-control" name="city" id="floatingInput" placeholder="City" required>
                                <label for="floatingInput">City</label>
                            </div>
                            <div class="form-floating p-0 pe-3 col-md-4">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="state" required>
                                    <option selected disabled>Select State</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="floatingSelect">State</label>
                            </div>
                            <div class="form-floating p-0 col-md-4">
                                <input type="text" class="form-control" name="postal_code" id="floatingInput" placeholder="Zip_Code" required>
                                <label for="floatingInput">Postal Code</label>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row mt-4">
                        <h3 class="mb-3">Payment</h3>
                        <h5>All transactions are secure and encrypted.</h5>
                        <div class="col-12 d-flex justify-content-between rounded-top border border-primary payment">
                            <p class="text-center m-0 p-3">Credit Card</p>
                            <div class="d-flex gap-3">
                                <!-- Add your payment icons here -->
                            </div>
                        </div>
                        <div class="col-12 rounded-bottom payment2">
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Card Number">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="col-12 d-flex  p-0">
                                <div class="form-floating col-mb-6">
                                    <input type="text" class="form-control" name="expiry_date" id="floatingInput" placeholder="MM/YY">
                                    <label for="floatingInput">Expiry Date</label>
                                </div>
                                <div class="form-floating col-mb-6">
                                    <input type="text" class="form-control" name="cvv" id="floatingInput" placeholder="CVV">
                                    <label for="floatingInput">CVV</label>
                                </div>
                            </div>
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" name="cardNumber" id="floatingInput" placeholder="Card Number">
                                <label for="floatingInput">Card Number</label>
                            </div>
                            <div class="form-check my-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked"> Use shipping address as billing address </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <button type="submit" class="btn btn-primary buttonMain col-12">Submit</button>
                    </div>
                </div>
            </form>
        </section>
        <section class="buyProducts container-fluid border-start">
            <div class="container sticky-top buyProducts2">
                <div class="row d-flex flex-column gap-3">

                    <?php include_once 'views/assets/listProductBuy.php' ?>

                    <div class="col">
                        <div class="form-floating my-3 d-flex gap-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Discount Code">
                            <label for="floatingInput">Discount Code</label>
                            <input type="submit" value="Apply" class="border rounded px-3">
                        </div>
                    </div>
                    <div class="col d-flex flex-column gap-3">
                        <div class="col d-flex justify-content-between p-0">
                            <?php
                            if (count($_SESSION['cart']) > 1) { ?>
                                <p>Subtotal · <?= count($_SESSION['cart']) ?> items</p>
                            <?php } else { ?>
                                <p>Subtotal</p>
                            <?php } ?>
                            <h6><?= $total ?> €</h6>
                        </div>
                        <div class="col d-flex justify-content-between p-0">
                            <p>Shipping</p>
                            <p>Enter shipping address</p>
                        </div>
                        <div class="col d-flex justify-content-between p-0 mt-3">
                            <h3>Total</h3>
                            <h3><?= $total ?> €</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>