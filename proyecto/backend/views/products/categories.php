<section class="mx-5 mt-5">
    <div class="container my-3">
        <div class="row filters">

            <?php foreach ($categories as $item) { ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="d-flex align-items-center flex-column">
                        <a href="#"><img src="<?= img . $item->getImage() ?>" alt="filter" class="object-fit-cover img-fluid"></a>
                        <h3 class="mt-3"><?= $item->getName() ?></h3>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>