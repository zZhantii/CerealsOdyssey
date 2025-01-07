<head>
    <title>Admin Orders | Cereals Odyssey</title>
</head>

<div class="container my-3">
    <h1>Admin Panel Orders</h1>
    <div class="d-flex gap-3">
        <div class="d-flex flex-column gap-3">
            <button id="createTable" class="buttonTable">Get</button>
            <button id="createAudi" class="buttonTable">View History</button>
            <button class="buttonTable" data-bs-toggle="modal" data-bs-target="#Order">Create</button>
            <button class="buttonTable" data-bs-toggle="modal" data-bs-target="#Order">Modify</button>
            <button id="DeleteOrder" class="buttonTable">Delete</button>
            <a href="?controller=catgories" class="buttonTable">Go to Home</a>
            <a href="?controller=admin&action=showPanel" class="buttonTable">Go to Choose</a>

            <label for="filter-user-id">Search by User ID:</label>
            <input type="text" id="filter-user-id" placeholder="Enter User ID">

            <label for="filter-order-id">Search by Order ID:</label>
            <input type="text" id="filter-order-id" placeholder="Enter Order ID">

            <label for="filter-date">Search by Date:</label>
            <input type="date" id="filter-date">

            <label for="filter-price">Search by Price:</label>
            <input type="number" id="filter-price" placeholder="Enter Price">

            <label for="filter-status">Search by Status:</label>
            <input type="text" id="filter-status" placeholder="Enter Status">

            <button id="apply-filter" class="buttonTable">Apply Filters</button>

            <label for="order-by">Sort by:</label>
            <select id="order-by">
                <option value="order_id">Order ID</option>
                <option value="user_id">User ID</option>
                <option value="price">Price</option>
                <option value="date">Date</option>
                <option value="status">Status</option>
            </select>
        </div>
        <div class="w-100">
            <div id="tablaContainer"></div>
        </div>
        <!-- <div class="w-100">
            <div id="auditTableContainer"></div>
        </div> -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Order" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Orders</h1>
                <p class="d-flex ps-3 gap-2" id="ID"></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingUser" placeholder="User ID">
                    <label for="floatingUser">User ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingDiscount" placeholder="Discount">
                    <label for="floatingDiscount">Discount</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingCardNumber" placeholder="Card Number">
                    <label for="floatingCardNumber">Card Number</label>
                </div>
                <div class="form-floating mb-9 d-flex">
                    <select class="form-select" id="floatingOptionsProducts" aria-label="Select Product"></select>
                    <label for="floatingOptionsProducts">Products</label>
                    <div class="d-flex">
                        <input type="number" id="productQuantity" value="1" min="1" readonly>
                        <button id="increaseQuantity">+</button>
                    </div>
                </div>
                <div class="mb-3 form-floating">
                    <select class="form-select" id="floatingStatus" aria-label="Select Status">
                        <option selected>Choose status</option>
                        <option value="Making">Making</option>
                        <option value="Delivery">Delivery</option>
                        <option value="Three">Three</option>
                    </select>
                    <label for="floatingStatus">Status</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitOrder">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script type="module" src="api/apiOrder.js"></script>