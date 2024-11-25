<?php
include_once 'controller/cartController.php';

if (empty($_SESSION['cart'])) { ?>
    <div class="container border-0 container-product py-2 px-5 d-flex flex-column w-75 gap-4">
        <div class="container productInformation d-flex flex-column justify-content-evenly">
            <h3>Oh no! Your Cart is Empty!</h3>
            <div>
                <h3 class="mt-5">Shop by</h3>
            </div>
        </div>
        <?php include_once 'views/assets/listCategoriesCart.php' ?>
        <div class=" container d-flex flex-column  gap-4">
            <div>
                <h4>You May Also Like</h4>
                <div class="d-flex border rounded-2 py-2 px-3 my-3 container-like align-items-center gap-2">
                    <img src="public/img/products/product1.jpg" alt="producto" height="96" width="96" class="object-fit-cover img-fluid">
                    <div class="container-buy">
                        <div>
                            <h4>Cereales de colores</h4>
                        </div>
                        <div>
                            <p>2.50€</p>
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
        ?>
            <div class="container border rounded-2 container-product py-2 px-5 d-flex gap-4 mb-3">
                <img src="public/img/products/<?= $itemImage ?>" alt="photoproduct" height="160" width="160" class="object-fit-cover img-fluid">
                <div class="productInformation d-flex flex-column justify-content-evenly">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4><?= $itemName ?></h4>
                        <a href="?controller=cart&action=remove&id=<?= $itemId ?>">basura</a>
                    </div>
                    <div>
                        <p>Size: </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center buttons">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary border-0 minus">-</button>
                            <button type="button" class="btn btn-primary border-0 amount">01</button>
                            <button type="button" class="btn btn-primary border-0 plus">+</button>
                        </div>
                        <p><?= $itemPrice ?> €</p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class=" container d-flex flex-column my-5 gap-4">
            <div>
                <h4>You May Also Like</h4>
                <div class="d-flex border rounded-2 py-2 px-3 my-3 container-like align-items-center gap-2">
                    <img src="public/img/products/product1.jpg" alt="producto" height="96" width="96" class="object-fit-cover img-fluid">
                    <div class="container-buy">
                        <div>
                            <h4>Cereales de colores</h4>
                        </div>
                        <div>
                            <p>2.50€</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-3">
            <a href="?controller=buy&action=buyOrder" class="btn btn-primary buttonMain container">Continue to Cheackout - <?= $total ?> €</a>
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