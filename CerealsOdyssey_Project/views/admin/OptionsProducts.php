<?php
foreach ($optionsProducts as $items) { ?>

<option value="$items">ucfirst($items[name]) . $items[price]</option>
  
<?php } ?>
