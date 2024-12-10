<?php
foreach ($address as $item) { ?>
    <div class="d-flex align-items-center justify-content-between bg-info p-3 mt-2 rounded">
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
<form action="?controller=user&action=addInformation" method="post">
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
                                <input type="text" class="form-control" id="floatingInput" placeholder="First Name" name="first_name" required>
                                <label for="floatingInput">First Name</label>
                            </div>
                            <div class="form-floating p-0 col-md-6 ps-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Last Name" name="last_name" required>
                                <label for="floatingInput">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-floating p-0 col-md-12">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Address" name="address" required>
                            <label for="floatingInput">Address</label>
                        </div>
                    </div>
                    <div>
                        <div class="form-floating p-0 col-md-12">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Apartment" name="apartment" required>
                            <label for="floatingInput">Apartment</label>
                        </div>
                    </div>
                    <div class="d-flex ">
                        <div class="form-floating p-0 pe-3 col-md-4">
                            <input type="text" class="form-control" id="floatingInput" placeholder="City" name="city" required>
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
                            <input type="text" class="form-control" id="floatingInput" placeholder="Zip Code" name="zipCode" required>
                            <label for="floatingInput">Zip Code</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary buttonMain">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>