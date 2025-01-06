<?php

if (empty($_SESSION['cart'])) { ?>
    <div class="container ">
        <div class="row d-flex flex-column justify-content-center">
            <?php include_once 'views/layouts/listCartHeaderProducts.php' ?>
            <div class="col-12 d-flex bg-white justify-content-center flex-column mt-3">
                <?php
                $cart = $_SESSION['cart'];
                $total = Cart::total_price($cart);
                ?>
                <a href="?controller=buy&action=buyOrder" class="btn btn-primary buttonMain mt-3"><b>Continue to Checkout</b> - <?= number_format($total, 2, '.', '') ?> €</a>
                <div class="container">
                    <div class="row">
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="public/img/ShopPay.svg" height="20" alt="ShopPay">
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="public/img/AmazonPay.svg" height="70" alt="AmazonPay">
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="public/img/ApplePay.svg" height="70" alt="AppelPay">
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="public/img/GooglePay.svg" height="70" alt="GooglePay">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
} else { ?>
    <div class="container">
        <?php
        foreach ($_SESSION['cart'] as $item) {
            $itemName = $item['name'];
            $itemPrice = $item['price'];
            $itemImage = $item['image'];
            $itemId = $item['id'];
            $itemAmount = $item['amount'];
        ?>
            <div class="container border rounded-2 container-product py-2 px-5 d-flex gap-4 mb-3">
                <img src="public/img/products/<?= $itemImage ?>" alt="photoproduct" height="160" width="160" class="object-fit-cover img-fluid">
                <div class="productInformation d-flex flex-column justify-content-evenly">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4><?= $itemName ?></h4>
                        <a href="?controller=cart&action=remove&id=<?= $itemId ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0359ca" viewBox="0 0 256 256">
                                <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                            </svg></a>
                    </div>
                    <div>
                        <p>Size: </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center buttons" id="cart">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <!-- Botón para disminuir cantidad -->
                            <form method="post" action="?controller=cart&action=decrementAmount&id=<?= $item['id'] ?>">
                                <input type="hidden" name="action" value="decrement">
                                <input type="hidden" name="productId" value="<?= $item['id'] ?>">
                                <button type="submit" class="border-0 minus rounded-start">-</button>
                            </form>

                            <!-- Muestra la cantidad actual -->
                            <span class="amount d-flex justify-content-center align-items-center"><?= $itemAmount ?></span>

                            <!-- Botón para incrementar cantidad -->
                            <form method="post" action="?controller=cart&action=incrementAmount&id=<?= $item['id'] ?>">
                                <input type="hidden" name="action" value="increment">
                                <input type="hidden" name="productId" value="<?= $productId ?>">
                                <button type="submit" class="border-0 plus rounded-end">+</button>
                            </form>
                        </div>
                        <!-- Precio del producto -->
                        <p><?= number_format($itemPrice * $itemAmount, 2, '.', '') ?> €</p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="container mb-3">
            <a href="?controller=buy&action=buyOrder" class="btn btn-primary buttonMain container">Continue to Cheackout - <?= number_format($total, 2, '.', '') ?> €</a>
            <div class="row d-flex align-items-center mt-4">
                <div class="col-3 d-flex align-items-center justify-content-center">
                    <img src="public/img/ShopPay.svg" height="40" alt="ShopPay">
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center">
                    <img src="public/img/AmazonPay.svg" height="100" alt="AmazonPay">
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center">
                    <img src="public/img/ApplePay.svg" height="100" alt="AppelPay">
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center">
                    <img src="public/img/GooglePay.svg" height="100" alt="GooglePay">
                </div>
            </div>
        </div>
    <?php } ?>
    </div>