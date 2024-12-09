<?php

foreach ($orders as $item2) { ?>
    <div class="col-md-6 col-sm-12 container-order border rounded bg-white p-3">
        <div class="title rounded d-flex align-items-center p-4 gap-3">
            <img src="public/img/logo.png" height="40" alt="product">
            <h3>Order #<?= $item2->order_id ?></h3>
        </div>
        <div class="container mt-3 p-3">
            <h4>Order summary</h4>
            <?php foreach ($order_details as $items) { ?>
                <div class="m-3 d-flex justify-content-between">
                    <p><?= $items->getAmount() ?></p>
                    <p><?= $items->getName() ?></p>
                    <p><?= $items->getPrice() ?> €</p>
                </div>
                <div class="border-bottom border-black"></div>
            <?php } ?>
        </div>
        <div class="mt-3 d-flex justify-content-between px-4">
            <strong>Total Amount:</strong>
            <p><?= $item2->getTotalAmount() ?></p>
        </div>
        <div class="mt-3 d-flex justify-content-between px-4">
            <strong>Total Items:</strong>
            <p><?= $item2->getTotalItems() ?></p>
        </div>
        <div class="mt-3 d-flex justify-content-between px-4">
            <strong>Discount:</strong>
            <p><?= $item2->getDiscount_value() ?> €</p>
        </div>
        <div class="mt-3 d-flex justify-content-between px-4">
            <strong>Total:</strong>
            <p><?= $item2->getTotalPrice() ?> €</p>
        </div>
        <div class="mt-3 d-flex justify-content-between px-4">
            <strong>Total with Discount:</strong>
            <p><?= $item2->getTotalDiscount() ?> €</p>
        </div>
    </div>
<?php
}
?>