<head>
    <title>Admin | Cereals Odysset</title>
</head>

<div class="container my-3">
    <h1>Admin Panel</h1>
    <div class="d-flex gap-5">
        <div class="d-flex flex-column gap-3">
            <button id="refreshCereals" class="buttonTable">Get Orders</button>
            <button id="" class="buttonTable">View History</button>
            <div class="form-floating p-0">
                <select class="form-select" id="floatingSelect" name="sort" aria-label="Floating label select example">
                    <option value="order_id" selected>order_id</option>
                    <option value="user_id">user_id</option>
                    <option value="price">price</option>
                    <option value="status">status</option>
                    <option value="date">date</option>
                </select>
                <label for="floatingSelect">Filter</label>
            </div>
            <p>CRUD</p>
            <button id="" class="buttonTable" data-bs-toggle="modal" data-bs-target="#CreateOrder">Create Order</button>
            <button id="" class="buttonTable" data-bs-toggle="modal" data-bs-target="#ModifyOrder">Modify Order</button>
            <button id="DeleteOrder" class="buttonTable">Delete Order</button>
            <a href="?controller=catgories" class="buttonTable">Go to home</a>
        </div>
        <div class="w-100">
            <div id="tablaContainer"></div>
        </div>
    </div>

    <!-- Model Create -->
    <div class="modal fade" id="CreateOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Order</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPrice" placeholder="Price">
                        <label for="floatingPrice">Price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingCardNumber" placeholder="Card Number">
                        <label for="floatingCardNumber">Card Number</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" id="floatingStatus" aria-label="Floating label select example">
                            <option selected>Open this select menu</option>
                            <option value="Making">Making</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Three">Three</option>
                        </select>
                        <label for="floatingStatus">Status</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="submitCreateOrder" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Modify -->
    <div class="modal fade" id="ModifyOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modify</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingPrice" placeholder="Price">
                        <label for="floatingPrice">Price</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingCardNumber" placeholder="Card Number">
                        <label for="floatingCardNumber">Card Number</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" id="floatingStatus" aria-label="Floating label select example">
                            <option selected>Open this select menu</option>
                            <option value="Making">Making</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Three">Three</option>
                        </select>
                        <label for="floatingStatus">Status</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submitModifyOrder">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script type="module" src="api/api.js"></script>
</div>