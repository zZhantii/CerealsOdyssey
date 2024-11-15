<section class="mx-5 mt-5">
    <div class="container my-3">
        <div class="row filters">

            <?php foreach ($categories as $item) { ?>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="d-flex align-items-center align-items-between flex-column">
                        <a href="<?= $item->getLink() ?>"><img src="public/img/categories/<?= $item->getImage() ?>" alt="filter1" class="object-fit-cover img-fluid"></a>
                        <h3 class="mt-3"><?= $item->getName() ?></h3>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>