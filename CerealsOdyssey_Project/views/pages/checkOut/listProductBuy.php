<?php foreach ($_SESSION['cart'] as $item) {
    $itemName = $item['name'];
    $itemPrice = $item['price'];
    $itemImage = $item['image'];
    $itemId = $item['id'];
    $itemAmount = $item['amount'];
    $totalPrice = $itemPrice * $itemAmount;
?>
    <div class="col d-flex gap-3">
        <div class="img-product border rounded position-relative">
            <img src="public/img/products/<?= $itemImage ?>" alt="producto" height="64" width="64">
            <span class="notification position-absolute top-0 start-100 translate-middle badge rounded-pill">
                <?= $itemAmount ?>
                <span class="visually-hidden">unread messages</span>
            </span>
        </div>
        <div class="d-flex flex-column justify-content-center">
            <p><?= $itemName ?></p>
        </div>
        <div class="col d-flex flex-column justify-content-center">
            <p class="text-end"><?= number_format($totalPrice, 2, '.', '') ?> €</p>
        </div>
    </div>
<?php } ?>