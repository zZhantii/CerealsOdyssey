<div class="navbar mx-auto d-flex justify-content-center gap-4">
    <?php foreach ($categories as $item) { ?>
        <a class="subnav-link" href="?controller=product&action=getAllProducts&id=<?= $item->getCategorie_id() ?>" aria-disabled="true">
            <?= $item->getName() ?>
        </a>
    <?php } ?>
    <a class="subnav-link" href="?controller=product&action=getAllProducts">
        Shop All
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
            <rect width="256" height="256" fill="none" />
            <line x1="40" y1="128" x2="216" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
            <polyline points="144 56 216 128 144 200" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
        </svg>
    </a>
</div>