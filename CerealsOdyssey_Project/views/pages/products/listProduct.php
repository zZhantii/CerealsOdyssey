<?php foreach ($product as $item) { ?>
    <div class="container-fluid bg-info c1 p-0">
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
                    <div class="d-flex align-items-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary border-0 minus rounded-start">-</button>
                            <button type="button" class="btn btn-primary border-0 amount">01</button>
                            <button type="button" class="btn btn-primary border-0 plus ">+</button>
                        </div>
                        <a href="" class="btn btn-primary buttonMain rounded-end px-5"> Add to Bag - <?= $item->getPrice() ?> €</a>
                    </div>
                </div>
                <div class="col text">
                    <p><?= $item->getDescription() ?></p>
                </div>

            </div>
        </div>
    </div>
<?php } ?>