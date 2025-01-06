<?php
foreach ($address as $item) {
    if (count($address) > 1) {
?>
        <div class="d-flex align-items-center justify-content-between bg-buy p-3 mt-2 rounded">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <input type="checkbox" name="" id="">
                </div>
                <div class="d-flex flex-column">
                    <b><?= $item->getFirst_Name() . ' ' . $item->getLast_Name() . ',' . $item->getAddress() . ' ' .  $item->getApartment() ?></b>
                    <p><?= $item->getCity() . ' ' . $item->getState() . ' ' . $item->getZipCode() . ' ' . $item->getCountry() ?></p>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="d-flex align-items-center justify-content-between bg-buy p-3 mt-2 rounded">
            <div>
                <b><?= $item->getFirst_Name() . ' ' . $item->getLast_Name() . ',' . $item->getAddress() . ' ' .  $item->getApartment() ?></b>
                <p><?= $item->getCity() . ' ' . $item->getState() . ' ' . $item->getZipCode() . ' ' . $item->getCountry() ?></p>
            </div>
        </div>
    <?php } ?>
<?php } ?>