<?php foreach ($_SESSION['cart'] as $item) { ?>
    <div class="col d-flex gap-3">
        <div>
            <img src="<?= url_base ?>public/img/products/<?= $item->getImage() ?>" alt="producto" height="64" width="64" class="img-product border">
        </div>
        <div class="d-flex flex-column">
            <p><?= $item->getName() ?></p>
            <p>1</p>
        </div>
        <div class="col">
            <p class="text-end"><?= $item->getPrice() ?> €</p>
        </div>
    </div>
<?php } ?>