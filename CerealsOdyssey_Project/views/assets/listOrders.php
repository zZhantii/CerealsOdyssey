<?php

foreach ($orders as $item2) { ?>
    <div class="col-md-6 col-sm-12 container-order border rounded bg-white p-3">
        <div class="title rounded d-flex justify-content-between align-items-center p-4 gap-3">
            <img src="public/img/logo.png" height="40" alt="product">
            <h3>Order #<?= $item2->order_id ?></h3>

            <!-- Button Modal -->
            <?php if ($item2->getStatus() == 'making')  ?>
            <button type="button" class="border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#Delivery">
                <?= $item2->getStatus() ?>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="Delivery" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php include_once 'views/assets/informationShipment.php' ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Understood</button>
                        </div>
                    </div>
                </div>
            </div>

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
            <?php if ($item2->getDiscount_value() > 0) { ?>
                <p class="discount text-decoration-line-through"><?= $item2->getTotalPrice() ?> €</p>
            <?php } else { ?>
                <p><?= $item2->getTotalPrice() ?> €</p>
            <?php } ?>
        </div>
        <div class="mt-3 d-flex justify-content-between px-4">
            <strong>Total with Discount:</strong>
            <p><?= $item2->getTotalDiscount() ?> €</p>
        </div>
    </div>
<?php
}
?>