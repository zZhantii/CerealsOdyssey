<div class="container my-3">
    <div class="row filters2">

        <?php foreach ($categories as $item) { ?>
            <div class="col-3">
                <div class="d-flex align-items-center align-items-between flex-column">
                    <a href="?controller=product&action=filter&id=<?= $item->getCategorie_id() ?>"><img src="public/img/categories/<?= $item->getImage() ?>" alt="filter1" class="object-fit-cover img-fluid"></a>
                    <h4 class="mt-3"><?= $item->getName() ?></h4>
                </div>
            </div>
        <?php } ?>

    </div>
</div>