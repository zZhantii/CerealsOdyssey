<?php
foreach ($optionsProducts as $items) { ?>
    <option value="<?= $items ?>"><?= ucfirst($items) . $items ?></option>
<?php } ?>