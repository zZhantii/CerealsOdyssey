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
    <?php } ?>

    <!-- Model -->
    <form action="?controller=user&action=editInformationUser" method="post">
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add an Address</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex gap-3 flex-column">
                        <div>
                            <div class="form-floating p-0">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="country" required>
                                    <!-- África -->
                                    <optgroup label="Africa">
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Uganda">Uganda</option>
                                    </optgroup>

                                    <!-- América del Norte -->
                                    <optgroup label="North America">
                                        <option value="United States">United States</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Mexico">Mexico</option>
                                    </optgroup>

                                    <!-- América del Sur -->
                                    <optgroup label="South America">
                                        <option value="Brazil">Brazil</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Chile">Chile</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Peru">Peru</option>
                                    </optgroup>

                                    <!-- Europa -->
                                    <optgroup label="Europe">
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Germany">Germany</option>
                                        <option value="France">France</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sweden">Sweden</option>
                                    </optgroup>

                                    <!-- Asia -->
                                    <optgroup label="Asia">
                                        <option value="China">China</option>
                                        <option value="India">India</option>
                                        <option value="Japan">Japan</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Singapore">Singapore</option>
                                    </optgroup>

                                    <!-- Oceanía -->
                                    <optgroup label="Oceania">
                                        <option value="Australia">Australia</option>
                                        <option value="New Zealand">New Zealand</option>
                                    </optgroup>

                                    <!-- Medio Oriente -->
                                    <optgroup label="Middle East">
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Turkey">Turkey</option>
                                    </optgroup>
                                </select>
                                <label for="floatingSelect">Country / Regions</label>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between p-0 ">
                                <div class="form-floating p-0 col-md-6 pe-2">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="first_name" value="<?= $item->getFirst_Name() ?>" required>
                                    <label for="floatingInput">First Name</label>
                                </div>
                                <div class="form-floating p-0 col-md-6 ps-2">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="last_name" value="<?= $item->getLast_Name() ?>" required>
                                    <label for="floatingInput">Last Name</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-floating p-0 col-md-12">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Address" name="address" value="<?= $item->getAddress() ?>" required>
                                <label for="floatingInput">Address</label>
                            </div>
                        </div>
                        <div>
                            <div class="form-floating p-0 col-md-12">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Apartment" name="apartment" value="<?= $item->getApartment() ?>" required>
                                <label for="floatingInput">Apartment</label>
                            </div>
                        </div>
                        <div class="d-flex ">
                            <div class="form-floating p-0 pe-3 col-md-4">
                                <input type="text" class="form-control" id="floatingInput" placeholder="City" name="city" value="<?= $item->getCity() ?>" required>
                                <label for="floatingInput">City</label>
                            </div>
                            <div class="form-floating p-0 pe-3 col-md-4">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="state" required>
                                    <!-- Estados de Estados Unidos -->
                                    <optgroup label="United States">
                                        <option value="Alabama">Alabama</option>
                                        <option value="Alaska">Alaska</option>
                                        <option value="Arizona">Arizona</option>
                                        <option value="Arkansas">Arkansas</option>
                                        <option value="California">California</option>
                                        <option value="Colorado">Colorado</option>
                                        <option value="Connecticut">Connecticut</option>
                                        <option value="Delaware">Delaware</option>
                                        <option value="Florida">Florida</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Idaho">Idaho</option>
                                        <option value="Illinois">Illinois</option>
                                        <option value="Indiana">Indiana</option>
                                        <option value="Iowa">Iowa</option>
                                        <option value="Kansas">Kansas</option>
                                        <option value="Kentucky">Kentucky</option>
                                        <option value="Louisiana">Louisiana</option>
                                        <option value="Maine">Maine</option>
                                        <option value="Maryland">Maryland</option>
                                        <option value="Massachusetts">Massachusetts</option>
                                        <option value="Michigan">Michigan</option>
                                        <option value="Minnesota">Minnesota</option>
                                        <option value="Mississippi">Mississippi</option>
                                        <option value="Missouri">Missouri</option>
                                        <option value="Montana">Montana</option>
                                        <option value="Nebraska">Nebraska</option>
                                        <option value="Nevada">Nevada</option>
                                        <option value="New Hampshire">New Hampshire</option>
                                        <option value="New Jersey">New Jersey</option>
                                        <option value="New Mexico">New Mexico</option>
                                        <option value="New York">New York</option>
                                        <option value="North Carolina">North Carolina</option>
                                        <option value="North Dakota">North Dakota</option>
                                        <option value="Ohio">Ohio</option>
                                        <option value="Oklahoma">Oklahoma</option>
                                        <option value="Oregon">Oregon</option>
                                        <option value="Pennsylvania">Pennsylvania</option>
                                        <option value="Rhode Island">Rhode Island</option>
                                        <option value="South Carolina">South Carolina</option>
                                        <option value="South Dakota">South Dakota</option>
                                        <option value="Tennessee">Tennessee</option>
                                        <option value="Texas">Texas</option>
                                        <option value="Utah">Utah</option>
                                        <option value="Vermont">Vermont</option>
                                        <option value="Virginia">Virginia</option>
                                        <option value="Washington">Washington</option>
                                        <option value="West Virginia">West Virginia</option>
                                        <option value="Wisconsin">Wisconsin</option>
                                        <option value="Wyoming">Wyoming</option>
                                    </optgroup>
                                </select>
                                <label for="floatingSelect">State</label>
                            </div>
                            <div class="form-floating p-0 col-md-4">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Zip Code" name="zipCode" value="<?= $item->getZipCode() ?>" required>
                                <label for="floatingInput">Zip Code</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" href="?controller=user&action=removeAddress&id=<?= $item->getAddress_id() ?>">Delete</a>
                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary buttonMain">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>