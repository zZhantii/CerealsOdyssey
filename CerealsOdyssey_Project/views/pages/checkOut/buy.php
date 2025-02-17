<head>
    <title>Cereals Odyssey | Checkout</title>
</head>

<body>
    <main class="d-flex justify-content-center" id="checkOut">
        <section class="informationPersonal container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <a href="?controller=categories">
                            <img src="<?= url_base ?>public/img/logo.png" class="img-fluid" alt="logo" height="90" width="90">
                        </a>
                        <a href="?controller=cart&action=show">
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

                                <?php include_once 'views/pages/checkOut/listAddressBuy.php' ?>

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
                            <div class="col-12 d-flex justify-content-between  p-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="expiry_date" id="floatingInput" placeholder="MM/YY">
                                    <label for="floatingInput">Expiry Date</label>
                                </div>
                                <div class="form-floating">
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

                    <?php include_once 'views/pages/checkOut/listProductBuy.php' ?>
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
                                <h6><?= number_format($total, 2, '.', '') ?> €</h6>
                            <?php } else {
                                $cartSummary = $_SESSION['discounts'];
                                $totalDiscount = $cartSummary['newPrice'];
                            ?>
                                <div class="d-flex align-items-end gap-3">
                                    <h6><?= number_format($totalDiscount, 2, '.', '') ?> €</h6>
                                    <h6 class="text-decoration-line-through discount"><?= number_format($total, 2, '.', '') ?> €</h6>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col d-flex justify-content-between p-0">
                            <p>Shipping</p>
                            <p>IVA 21%</p>
                        </div>
                        <div class="col d-flex justify-content-between p-0 mt-3">
                            <h3>Total</h3>
                            <?php if (empty($_SESSION['discounts'])) { ?>
                                <h3><?= number_format($totalIVA, 2, '.', '') ?> €</h3>
                            <?php } else {
                                $cartSummary = $_SESSION['discounts'];
                                $totalDiscountIVA = $cartSummary['newPriceIVA'];
                            ?>
                                <div class="d-flex flex-column align-items-end gap-3">
                                    <h3 class="text-decoration-line-through discount"><?= number_format($totalIVA, 2, '.', '') ?> €</h3>
                                    <h3><?= number_format($totalDiscountIVA, 2, '.', '') ?> €</h3>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>