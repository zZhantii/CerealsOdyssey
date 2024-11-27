<?php foreach ($_SESSION['cart'] as $item) {
    $itemName = $item['name'];
    $itemPrice = $item['price'];
    $itemImage = $item['image'];
    $itemId = $item['id'];
    $itemAmount = $item['amount'];
?>
    <div class="col d-flex gap-3">
        <img src="<?= url_base ?>public/img/products/<?= $itemImage ?>" alt="producto" height="64" width="64" class="img-product border rounded">
        <div class="notification position-absolute translate-middle badge rounded-circle"><?= $itemAmount ?></div>
        <div class="d-flex flex-column justify-content-center">
            <p><?= $itemName ?></p>
        </div>
        <div class="col d-flex flex-column justify-content-center">
            <p class="text-end"><?= $itemPrice ?> €</p>
        </div>
    </div>
<?php } ?>