<?php
include_once 'config/database.php';
include_once 'model/CerealsDAO.php';
include_once 'model/Categories.php';

foreach ($categories as $item) {
    echo '<div class="col-sm-12 col-md-6 col-lg-4">' .
        '<div class="d-flex align-items-center align-items-between flex-column">' .
        '<a href="#">' . $item->getImage() . '</a>' .
        '<h3 class="mt-3">' . $item->getName() . '</h3>' .
        '</div>' .
        '</div>';
?>
    <?php } ?>