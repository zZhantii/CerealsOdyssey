<?php

foreach ($order_details as $items) {
    foreach ($orders as $item2) { ?>
        <div class="col-md-6 col-sm-12 container-order border rounded bg-white p-3">
            <div class="title rounded d-flex align-items-center p-4 gap-3">
                <img src="public/img/logo.png" height="40" alt="product">
                <h3>Order #<?= $item2->order_id ?></h3>
            </div>
            <div class="container mt-3 p-3">
                <h4>Order summary</h4>
                <div class="m-3 d-flex justify-content-between">
                    <p><?= $items->getName() ?></p>
                    <p><?= $items->getPrice() ?> €</p>
                </div>
                <div class="border-bottom border-black"></div>
            </div>
            <div class="mt-3 d-flex justify-content-between px-4">
                <strong>Total Amount:</strong>
                <p><?= $items->getAmount() ?></p>
            </div>
            <div class="mt-3 d-flex justify-content-between px-4">
                <strong>Discount:</strong>
                <p><?= $items->getDiscount_value() ?>€</p>
            </div>
            <div class="mt-3 d-flex justify-content-between px-4">
                <strong>Total:</strong>
                <p><?= $item2->getPrice() ?>€</p>
            </div>
        </div>
<?php
    }
}
?>