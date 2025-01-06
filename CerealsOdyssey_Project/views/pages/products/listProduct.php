<?php foreach ($product as $item) { ?>
    <div class="container-fluid bg-product c1 p-0">
        <div class="container d-flex justify-content-end p-4">
            <img src="public\img\products\<?= $item->getImage() ?>" alt="product" height="750" class="rounded bg-white">
        </div>
    </div>
    <div class="container-fluid c2 p-0">
        <div class="container mt-5">
            <div class="row flex-column gap-4 ms-3 me-5">
                <div class="col">
                    <h3><?= $item->getName() ?></h3>
                </div>
                <div class="col">
                    <h4><?= $item->getPrice() ?> €</h4>
                </div>
                <div class="col">
                    <div class="buttons" id="cart">
                        <a href="?controller=cart&action=add&id=<?= $item->getProduct_id() ?>"
                            class="btn btn-primary buttonMain px-5 d-flex align-items-center justify-content-center"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight">
                            Add to Cart
                        </a>
                    </div>
                    <div class="col text">
                        <p><?= $item->getDescription() ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>