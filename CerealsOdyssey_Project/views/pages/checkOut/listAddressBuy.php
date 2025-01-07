<?php
if (!empty($address)) {
    foreach ($address as $item) {
        $firstName = $item['First_Name'] ?? '';
        $lastName = $item['Last_Name'] ?? '';
        $addressLine = $item['Address'] ?? '';
        $apartment = $item['Apartment'] ?? '';
        $city = $item['City'] ?? '';
        $state = $item['State'] ?? '';
        $zipCode = $item['ZipCode'] ?? '';
        $country = $item['Country'] ?? '';

        if (count($address) > 1) {
?>
            <div class="d-flex align-items-center justify-content-between bg-buy p-3 mt-2 rounded">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <input type="checkbox" name="" id="">
                    </div>
                    <div class="d-flex flex-column">
                        <b><?= htmlspecialchars($firstName . ' ' . $lastName . ', ' . $addressLine . ' ' . $apartment) ?></b>
                        <p><?= htmlspecialchars($city . ' ' . $state . ' ' . $zipCode . ' ' . $country) ?></p>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="d-flex align-items-center justify-content-between bg-buy p-3 mt-2 rounded">
                <div>
                    <b><?= htmlspecialchars($firstName . ' ' . $lastName . ', ' . $addressLine . ' ' . $apartment) ?></b>
                    <p><?= htmlspecialchars($city . ' ' . $state . ' ' . $zipCode . ' ' . $country) ?></p>
                </div>
            </div>
<?php
        }
    }
} else {
    echo '<p>No hay direcciones disponibles.</p>';
}
