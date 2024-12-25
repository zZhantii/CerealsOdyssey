<head>
    <title>Cereals Odyssey | Checkout</title>
</head>

<body>
    <main class="d-flex justify-content-center">
        <section class="informationPersonal container-fluid">
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
                <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
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
                </div>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-white p-0 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Ship to
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show ">
                            <div class="accordion-body p-0 ">

                                <?php include_once 'views/assets/listAddressBuy.php' ?>

                                <button class="btn ms-3 text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2"> + use a different address</button>
                                <!-- Model -->
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
                            </div>
                        </div>
                    </div>
                </div>
                <form action="?controller=buy&action=createOrder" method="POST">
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
                        <button type="submit" class="btn btn-primary buttonMain col-12">PAY NOW</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="buyProducts container-fluid border-start">
            <div class="container sticky-top buyProducts2">
                <div class="row d-flex flex-column gap-3">

                    <?php include_once 'views/assets/listProductBuy.php' ?>
                    <form action="index.php?controller=cart&action=applyDiscountCart" method="post">
                        <div class="col">
                            <div class="form-floating my-3 d-flex gap-3">
                                <input type="text" name="description" class="form-control" id="floatingInput" placeholder="Discount Code">
                                <label for="floatingInput">Discount Code</label>
                                <input type="submit" value="Apply" class="border rounded px-3">
                            </div>
                        </div>
                    </form>
                    <div class="col d-flex flex-column gap-3">
                        <div class="col d-flex justify-content-between p-0">
                            <?php if (count($_SESSION['cart']) > 1) { ?>
                                <p>Subtotal · <?= count($_SESSION['cart']) ?> items</p>
                            <?php } else { ?>
                                <p>Subtotal</p>
                            <?php } ?>
                            <?php if (empty($_SESSION['discounts'])) { ?>
                                <h6><?= $total ?> €</h6>
                            <?php } else {
                                $cartSummary = $_SESSION['discounts'];
                                $totalDiscount = $cartSummary['newPrice'];
                            ?>
                                <div class="d-flex align-items-end gap-3">
                                    <h6><?= $totalDiscount ?> €</h6>
                                    <h6 class="text-decoration-line-through discount"><?= $total ?> €</h6>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col d-flex justify-content-between p-0">
                            <p>Shipping</p>
                            <p>IVA included</p>
                        </div>
                        <div class="col d-flex justify-content-between p-0 mt-3">
                            <h3>Total</h3>
                            <?php if (empty($_SESSION['discounts'])) { ?>
                                <h3><?= $total ?> €</h3>
                            <?php } else {
                                $cartSummary = $_SESSION['discounts'];
                                $totalDiscount = $cartSummary['newPrice'];
                            ?>
                                <div class="d-flex flex-column align-items-end gap-3">
                                    <h3 class="text-decoration-line-through discount"><?= $total ?> €</h3>
                                    <h3><?= $totalDiscount ?> €</h3>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>