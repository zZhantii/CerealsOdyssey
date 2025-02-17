<?php
if (empty($orders)) { ?>
    <div class="bg-secondary p-3 mt-3 rounded border">
        <p>No orders were create.</p>
    </div>
<?php }
foreach ($orders as $item2) { ?>
    <div class="container-order border rounded bg-white p-3">
        <div class="title rounded d-flex justify-content-between align-items-center p-4 gap-3">
            <img src="public/img/logo.png" height="40" alt="product">
            <h3>Order #<?= $item2->order_id ?></h3>
        </div>
        <div class="container mt-3 p-3">
            <h4>Order summary</h4>
            <?php foreach ($order_details as $items) {

                if ($item2->order_id == $items->order_id) {
            ?>
                    <div class="m-3 d-flex justify-content-between">
                        <p><?= $items->getAmount() ?></p>
                        <p><?= $items->getName() ?></p>
                        <p><?= $items->getPrice() ?> €</p>
                    </div>
                    <div class="border-bottom border-black"></div>
            <?php }
            } ?>
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
            <?php if ($item2->getDiscount_value() == null) { ?>
                <p>0 €</p>
            <?php } else { ?>
                <p><?= number_format($item2->getDiscount_value(), 2, '.', '') ?> €</p>
            <?php } ?>
        </div>
        <div class="mt-3 d-flex justify-content-between px-4">
            <strong>Total:</strong>
            <?php if ($item2->getDiscount_value() > 0) { ?>
                <p class="discount text-decoration-line-through"><?= $item2->getTotalPrice() ?> €</p>
            <?php } else { ?>
                <p><?= number_format($item2->getTotalPrice(), 2, '.', '') ?> €</p>
            <?php } ?>
        </div>
        <div class="mt-3 d-flex justify-content-between px-4">
            <strong>Total with Discount:</strong>
            <?php if ($item2->getTotalDiscount() == null) { ?>
                <p>0 €</p>
            <?php } else { ?>
                <p><?= number_format($item2->getTotalDiscount(), 2, '.', '') ?> €</p>
            <?php } ?>
        </div>
    </div>
<?php
}
?>