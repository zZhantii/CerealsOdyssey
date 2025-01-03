<div class="d-flex gap-5 align-items-start pt-3">
    <?php foreach ($address as $item) {
        $modalId = 'modal_' . $item->getAddress_id(); // ID único para cada modal
    ?>
        <div class="d-flex flex-column">
            <p><?= $item->getFirst_Name() . ' ' . $item->getLast_Name() ?></p>
            <p><?= $item->getAddress() ?></p>
            <p><?= $item->getApartment() ?></p>
            <p><?= $item->getCity() . ' ' . $item->getState() . ' ' . $item->getZipCode() ?></p>
            <p><?= $item->getCountry() ?></p>
        </div>

        <!-- Botón para abrir el modal de edición -->
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00359a" viewBox="0 0 256 256">
                <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path>
            </svg>
        </button>

        <!-- Modal único para esta dirección -->
        <form action="?controller=user&action=editInformationUser" method="post">
            <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-labelledby="label_<?= $modalId ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="label_<?= $modalId ?>">Edit Address</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex gap-3 flex-column">
                            <!-- Campos del formulario -->
                            <input type="hidden" name="address_id" value="<?= $item->getAddress_id() ?>">
                            <div class="form-floating p-0">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="country" required>
                                    <!-- África -->
                                    <optgroup label="Africa">
                                        <option value="Nigeria" <?= $item->getCountry() === 'Nigeria' ? 'selected' : '' ?>>Nigeria</option>
                                        <option value="South Africa" <?= $item->getCountry() === 'South Africa' ? 'selected' : '' ?>>South Africa</option>
                                        <option value="Egypt" <?= $item->getCountry() === 'Egypt' ? 'selected' : '' ?>>Egypt</option>
                                        <option value="Kenya" <?= $item->getCountry() === 'Kenya' ? 'selected' : '' ?>>Kenya</option>
                                        <option value="Uganda" <?= $item->getCountry() === 'Uganda' ? 'selected' : '' ?>>Uganda</option>
                                    </optgroup>

                                    <!-- América del Norte -->
                                    <optgroup label="North America">
                                        <option value="United States" <?= $item->getCountry() === 'United States' ? 'selected' : '' ?>>United States</option>
                                        <option value="Canada" <?= $item->getCountry() === 'Canada' ? 'selected' : '' ?>>Canada</option>
                                        <option value="Mexico" <?= $item->getCountry() === 'Mexico' ? 'selected' : '' ?>>Mexico</option>
                                    </optgroup>

                                    <!-- América del Sur -->
                                    <optgroup label="South America">
                                        <option value="Brazil" <?= $item->getCountry() === 'Brazil' ? 'selected' : '' ?>>Brazil</option>
                                        <option value="Argentina" <?= $item->getCountry() === 'Argentina' ? 'selected' : '' ?>>Argentina</option>
                                        <option value="Chile" <?= $item->getCountry() === 'Chile' ? 'selected' : '' ?>>Chile</option>
                                        <option value="Colombia" <?= $item->getCountry() === 'Colombia' ? 'selected' : '' ?>>Colombia</option>
                                        <option value="Peru" <?= $item->getCountry() === 'Peru' ? 'selected' : '' ?>>Peru</option>
                                    </optgroup>

                                    <!-- Europa -->
                                    <optgroup label="Europe">
                                        <option value="United Kingdom" <?= $item->getCountry() === 'United Kingdom' ? 'selected' : '' ?>>United Kingdom</option>
                                        <option value="Germany" <?= $item->getCountry() === 'Germany' ? 'selected' : '' ?>>Germany</option>
                                        <option value="France" <?= $item->getCountry() === 'France' ? 'selected' : '' ?>>France</option>
                                        <option value="Italy" <?= $item->getCountry() === 'Italy' ? 'selected' : '' ?>>Italy</option>
                                        <option value="Spain" <?= $item->getCountry() === 'Spain' ? 'selected' : '' ?>>Spain</option>
                                        <option value="Sweden" <?= $item->getCountry() === 'Sweden' ? 'selected' : '' ?>>Sweden</option>
                                    </optgroup>

                                    <!-- Asia -->
                                    <optgroup label="Asia">
                                        <option value="China" <?= $item->getCountry() === 'China' ? 'selected' : '' ?>>China</option>
                                        <option value="India" <?= $item->getCountry() === 'India' ? 'selected' : '' ?>>India</option>
                                        <option value="Japan" <?= $item->getCountry() === 'Japan' ? 'selected' : '' ?>>Japan</option>
                                        <option value="South Korea" <?= $item->getCountry() === 'South Korea' ? 'selected' : '' ?>>South Korea</option>
                                        <option value="Singapore" <?= $item->getCountry() === 'Singapore' ? 'selected' : '' ?>>Singapore</option>
                                    </optgroup>

                                    <!-- Oceanía -->
                                    <optgroup label="Oceania">
                                        <option value="Australia" <?= $item->getCountry() === 'Australia' ? 'selected' : '' ?>>Australia</option>
                                        <option value="New Zealand" <?= $item->getCountry() === 'New Zealand' ? 'selected' : '' ?>>New Zealand</option>
                                    </optgroup>

                                    <!-- Medio Oriente -->
                                    <optgroup label="Middle East">
                                        <option value="United Arab Emirates" <?= $item->getCountry() === 'United Arab Emirates' ? 'selected' : '' ?>>United Arab Emirates</option>
                                        <option value="Saudi Arabia" <?= $item->getCountry() === 'Saudi Arabia' ? 'selected' : '' ?>>Saudi Arabia</option>
                                        <option value="Israel" <?= $item->getCountry() === 'Israel' ? 'selected' : '' ?>>Israel</option>
                                        <option value="Turkey" <?= $item->getCountry() === 'Turkey' ? 'selected' : '' ?>>Turkey</option>
                                    </optgroup>
                                </select>
                                <label for="floatingSelect">Country / Regions</label>
                            </div>

                            <div class="d-flex gap-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="first_name" value="<?= $item->getFirst_Name() ?>" required>
                                    <label>First Name</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="last_name" value="<?= $item->getLast_Name() ?>" required>
                                    <label>Last Name</label>
                                </div>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="address" value="<?= $item->getAddress() ?>" required>
                                <label>Address</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="apartment" value="<?= $item->getApartment() ?>">
                                <label>Apartment</label>
                            </div>
                            <div class="d-flex">
                                <div class="form-floating p-0 pe-3 col-md-4">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="City" value="<?= $item->getCity() ?>" name="city" required>
                                    <label for="floatingInput">City</label>
                                </div>
                                <div class="form-floating p-0 pe-3 col-md-4">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="state" required>
                                        <!-- Estados de Estados Unidos -->
                                        <optgroup label="United States">
                                            <option value="Alabama" <?= $item->getCountry() === 'Alabama' ? 'selected' : '' ?>>Alabama</option>
                                            <option value="Alaska" <?= $item->getCountry() === 'Alaska' ? 'selected' : '' ?>>Alaska</option>
                                            <option value="Arizona" <?= $item->getCountry() === 'Arizona' ? 'selected' : '' ?>>Arizona</option>
                                            <option value="Arkansas" <?= $item->getCountry() === 'Arkansas' ? 'selected' : '' ?>>Arkansas</option>
                                            <option value="California" <?= $item->getCountry() === 'California' ? 'selected' : '' ?>>California</option>
                                            <option value="Colorado" <?= $item->getCountry() === 'Colorado' ? 'selected' : '' ?>>Colorado</option>
                                            <option value="Connecticut" <?= $item->getCountry() === 'Connecticut' ? 'selected' : '' ?>>Connecticut</option>
                                            <option value="Delaware" <?= $item->getCountry() === 'Delaware' ? 'selected' : '' ?>>Delaware</option>
                                            <option value="Florida" <?= $item->getCountry() === 'Florida' ? 'selected' : '' ?>>Florida</option>
                                            <option value="Georgia" <?= $item->getCountry() === 'Georgia' ? 'selected' : '' ?>>Georgia</option>
                                            <option value="Hawaii" <?= $item->getCountry() === 'Hawaii' ? 'selected' : '' ?>>Hawaii</option>
                                            <option value="Idaho" <?= $item->getCountry() === 'Idaho' ? 'selected' : '' ?>>Idaho</option>
                                            <option value="Illinois" <?= $item->getCountry() === 'Illinois' ? 'selected' : '' ?>>Illinois</option>
                                            <option value="Indiana" <?= $item->getCountry() === 'Indiana' ? 'selected' : '' ?>>Indiana</option>
                                            <option value="Iowa" <?= $item->getCountry() === 'Iowa' ? 'selected' : '' ?>>Iowa</option>
                                            <option value="Kansas" <?= $item->getCountry() === 'Kansas' ? 'selected' : '' ?>>Kansas</option>
                                            <option value="Kentucky" <?= $item->getCountry() === 'Kentucky' ? 'selected' : '' ?>>Kentucky</option>
                                            <option value="Louisiana" <?= $item->getCountry() === 'Louisiana' ? 'selected' : '' ?>>Louisiana</option>
                                            <option value="Maine" <?= $item->getCountry() === 'Maine' ? 'selected' : '' ?>>Maine</option>
                                            <option value="Maryland" <?= $item->getCountry() === 'Maryland' ? 'selected' : '' ?>>Maryland</option>
                                            <option value="Massachusetts" <?= $item->getCountry() === 'Massachusetts' ? 'selected' : '' ?>>Massachusetts</option>
                                            <option value="Michigan" <?= $item->getCountry() === 'Michigan' ? 'selected' : '' ?>>Michigan</option>
                                            <option value="Minnesota" <?= $item->getCountry() === 'Minnesota' ? 'selected' : '' ?>>Minnesota</option>
                                            <option value="Mississippi" <?= $item->getCountry() === 'Mississippi' ? 'selected' : '' ?>>Mississippi</option>
                                            <option value="Missouri" <?= $item->getCountry() === 'Missouri' ? 'selected' : '' ?>>Missouri</option>
                                            <option value="Montana" <?= $item->getCountry() === 'Montana' ? 'selected' : '' ?>>Montana</option>
                                            <option value="Nebraska" <?= $item->getCountry() === 'Nebraska' ? 'selected' : '' ?>>Nebraska</option>
                                            <option value="Nevada" <?= $item->getCountry() === 'Nevada' ? 'selected' : '' ?>>Nevada</option>
                                            <option value="New Hampshire" <?= $item->getCountry() === 'New Hampshire' ? 'selected' : '' ?>>New Hampshire</option>
                                            <option value="New Jersey" <?= $item->getCountry() === 'New Jersey' ? 'selected' : '' ?>>New Jersey</option>
                                            <option value="New Mexico" <?= $item->getCountry() === 'New Mexico' ? 'selected' : '' ?>>New Mexico</option>
                                            <option value="New York" <?= $item->getCountry() === 'New York' ? 'selected' : '' ?>>New York</option>
                                            <option value="North Carolina" <?= $item->getCountry() === 'North Carolina' ? 'selected' : '' ?>>North Carolina</option>
                                            <option value="North Dakota" <?= $item->getCountry() === 'North Dakota' ? 'selected' : '' ?>>North Dakota</option>
                                            <option value="Ohio" <?= $item->getCountry() === 'Ohio' ? 'selected' : '' ?>>Ohio</option>
                                            <option value="Oklahoma" <?= $item->getCountry() === 'Oklahoma' ? 'selected' : '' ?>>Oklahoma</option>
                                            <option value="Oregon" <?= $item->getCountry() === 'Oregon' ? 'selected' : '' ?>>Oregon</option>
                                            <option value="Pennsylvania" <?= $item->getCountry() === 'Pennsylvania' ? 'selected' : '' ?>>Pennsylvania</option>
                                            <option value="Rhode Island" <?= $item->getCountry() === 'Rhode Island' ? 'selected' : '' ?>>Rhode Island</option>
                                            <option value="South Carolina" <?= $item->getCountry() === 'South Carolina' ? 'selected' : '' ?>>South Carolina</option>
                                            <option value="South Dakota" <?= $item->getCountry() === 'South Dakota' ? 'selected' : '' ?>>South Dakota</option>
                                            <option value="Tennessee" <?= $item->getCountry() === 'Tennessee' ? 'selected' : '' ?>>Tennessee</option>
                                            <option value="Texas" <?= $item->getCountry() === 'Texas' ? 'selected' : '' ?>>Texas</option>
                                            <option value="Utah" <?= $item->getCountry() === 'Utah' ? 'selected' : '' ?>>Utah</option>
                                            <option value="Vermont" <?= $item->getCountry() === 'Vermont' ? 'selected' : '' ?>>Vermont</option>
                                            <option value="Virginia" <?= $item->getCountry() === 'Virginia' ? 'selected' : '' ?>>Virginia</option>
                                            <option value="Washington" <?= $item->getCountry() === 'Washington' ? 'selected' : '' ?>>Washington</option>
                                            <option value="West Virginia" <?= $item->getCountry() === 'West Virginia' ? 'selected' : '' ?>>West Virginia</option>
                                            <option value="Wisconsin" <?= $item->getCountry() === 'Wisconsin' ? 'selected' : '' ?>>Wisconsin</option>
                                            <option value="Wyoming" <?= $item->getCountry() === 'Wyoming' ? 'selected' : '' ?>>Wyoming</option>
                                        </optgroup>
                                    </select>
                                    <label for="floatingSelect">State</label>
                                </div>
                                <div class="form-floating p-0 col-md-4">
                                    <input type="text" class="form-control" id="floatingInput" value="<?= $item->getZipCode() ?>" placeholder="Zip Code" name="zipCode" required>
                                    <label for="floatingInput">Zip Code</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- Botón para eliminar -->
                            <a class="btn btn-danger" href="?controller=user&action=removeAddress&id=<?= $item->getAddress_id() ?>">
                                Delete
                            </a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php } ?>
</div>