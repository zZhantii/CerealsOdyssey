<div class="d-flex gap-5 align-items-start pt-3">
    <?php foreach ($address as $item) { ?>
        <div class="d-flex flex-column">
            <p><?= $item->getFirst_Name() . ' ' . $item->getLast_Name() ?></p>
            <p><?= $item->getAddress() ?></p>
            <p><?= $item->getApartment() ?></p>
            <p><?= $item->getCity() . ' ' . $item->getState() . ' ' . $item->getZipCode() ?></p>
            <p><?= $item->getCountry() ?></p>
        </div>
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#00359a" viewBox="0 0 256 256">
                <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM51.31,160,136,75.31,152.69,92,68,176.68ZM48,179.31,76.69,208H48Zm48,25.38L79.31,188,164,103.31,180.69,120Zm96-96L147.31,64l24-24L216,84.68Z"></path>
            </svg>
        </button>

        <form action="?controller=user&action=addInformation" method="post">
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
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
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
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
</div>