<?php

if (empty($_SESSION['cart'])) { ?>
    <div class="col-12 bg-white">
        <h3>Oh no, your cart is empty!</h3>
        <div>
            <h3 class="mt-5">Shop by</h2>
                <?php include_once 'views/assets/listCategoriesCart.php' ?>
        </div>
    </div>
    <?php } else {
    foreach ($_SESSION['cart'] as $item) {
        $itemName = $item['name'];
        $itemPrice = $item['price'];
        $itemImage = $item['image'];
        $itemId = $item['id'];
        $itemAmount = $item['amount'];
    ?>

        <div class="container border rounded-2 container-product d-flex gap-2 mb-3">
            <img src="public/img/products/<?= $itemImage ?>" alt="photoproduct" height="115" width="115" class="object-fit-cover img-fluid">
            <div class="productInformation d-flex flex-column justify-content-evenly">
                <div class="d-flex justify-content-between align-items-center">
                    <h4><?= $itemName ?></h4>
                    <a href="?controller=cart&action=remove&id=<?= $itemId ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0359ca" viewBox="0 0 256 256">
                            <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                        </svg></a>
                </div>
                <div class="d-flex justify-content-between align-items-center buttons" id="cart">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="border-0 minus  rounded-start">-</button>
                        <button type="button" class="border-0 amount"><?= $itemAmount ?></button></button>
                        <button type="button" class="border-0 plus rounded-end">+</button>
                    </div>
                    <p><?= $itemPrice * $itemAmount ?> €</p>
                </div>
            </div>
        </div>

<?php }
} ?>