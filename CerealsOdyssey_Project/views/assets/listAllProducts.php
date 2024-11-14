<?php foreach ($allProducts as $item) { ?>
    <div class="col-sm-12 col-md-6 col-lg-4 border rounded-2 d-flex flex-column align-items-center p-3 justify-content-between containt-product">
        <div>
            <div class="img-product-shop d-flex justify-content-center">
                <img src="<?= $item->getImage() ?>" alt="product" class="object-fit-cover img-fluid">
            </div>
            <div class="d-flex gap-3 flex-column price">
                <a href="#" class="information"><?= $item->getName() ?></a>
                <p><?= $item->getPrice() ?> €</p>
            </div>
            <div class="d-flex align-items-center gap-3 pt-3 buttons">
                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center buttonMain">Add to Cart</a>
                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center buttonMain2">More Details</a>
            </div>
        </div>
    </div>
<?php } ?>