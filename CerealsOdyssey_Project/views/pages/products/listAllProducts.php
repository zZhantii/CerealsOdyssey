<?php foreach ($allProducts as $item) { ?>
    <div class="card mb-3 d-flex " style="width: 18rem;">
        <a href="?controller=product&action=showProduct&id=<?= $item->getProduct_id() ?>">
            <img src="public/img/products/<?= $item->getImage() ?>" class="card-img-top" alt="product">
        </a>
        <div class="card-body p-0 ">
            <h4 class="card-title"><?= $item->getName() ?></h4>
            <p class="card-text"><?= $item->getPrice() ?> €</p>
            <div class="d-flex align-items-center gap-3 pt-3 pb-3 buttons">
                <a href="?controller=cart&action=add&id=<?= $item->getProduct_id() ?>"
                    class="btn btn-primary d-flex align-items-center justify-content-center buttonMain add-to-cart"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight">
                    Add to Cart
                </a>

                <a href="?controller=product&action=showProduct&id=<?= $item->getProduct_id() ?>" class="btn btn-primary d-flex align-items-center justify-content-center buttonMain2">More Details</a>
            </div>
        </div>
    </div>
<?php } ?>