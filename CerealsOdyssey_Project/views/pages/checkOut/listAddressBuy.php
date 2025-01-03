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
            <div class="dropdown">
                <button class="btn bg-transparent dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256">
                        <path d="M112,60a16,16,0,1,1,16,16A16,16,0,0,1,112,60Zm16,52a16,16,0,1,0,16,16A16,16,0,0,0,128,112Zm0,68a16,16,0,1,0,16,16A16,16,0,0,0,128,180Z"></path>
                    </svg>
                </button>
                <ul class="dropdown-menu">
                    <li><button class="btn ms-3 text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Edit </button></li>
                </ul>
            </div>
        </div>
    <?php } else { ?>
        <div class="d-flex align-items-center justify-content-between bg-buy p-3 mt-2 rounded">
            <div>
                <b><?= $item->getFirst_Name() . ' ' . $item->getLast_Name() . ',' . $item->getAddress() . ' ' .  $item->getApartment() ?></b>
                <p><?= $item->getCity() . ' ' . $item->getState() . ' ' . $item->getZipCode() . ' ' . $item->getCountry() ?></p>
            </div>
            <div class="dropdown">
            </div>
        </div>
    <?php } ?>
<?php } ?>