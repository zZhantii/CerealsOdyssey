<?php
foreach ($address as $item) { ?>
    <b><?= $item->getFirst_Name() . ' ' . $item->getLast_Name() . ',' . $item->getAddress() . ' ' .  $item->getApartment() ?></b>
    <p><?= $item->getCity() . ' ' . $item->getState() . ' ' . $item->getZipCode() . ' ' . $item->getCountry() ?></p>
<?php } ?>