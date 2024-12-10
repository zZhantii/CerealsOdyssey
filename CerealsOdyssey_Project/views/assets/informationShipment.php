<?php

foreach ($orders as $item) { ?>
    <?= $item->Shipment_id ?>
    <?= $item->getStatus() ?>
    <?= $item->getAddress() ?>
    <?= $item->getCity() ?>
    <?= $item->getDate_shipment() ?>
<?php } ?>