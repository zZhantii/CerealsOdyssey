<head>
    <title>Admin Orders | Cereals Odyssey</title>
</head>

<div class="container my-3">
    <h1>Admin Panel</h1>
    <div class="d-flex gap-3">
        <div class="d-flex flex-column gap-3">
            <button id="createTable" class="buttonTable">Get Products</button>
            <button class="buttonTable">View History</button>
            <button class="buttonTable" data-bs-toggle="modal" data-bs-target="#Order">Create</button>
            <button class="buttonTable" data-bs-toggle="modal" data-bs-target="#Order">Modify</button>
            <button id="Deleteproduct" class="buttonTable">Delete</button>
            <a href="?controller=catgories" class="buttonTable">Go to home</a>
            <a href="?controller=admin&action=showPanel" class="buttonTable">Go to choose</a>

            <label for="filter-product-id">Find by product ID:</label>
            <input type="text" id="filter-product-id" placeholder="put Product ID">

            <label for="filter-price">Find by price:</label>
            <input type="number" id="filter-price" placeholder="put Price">

            <label for="filter-name">Find by name:</label>
            <input type="text" id="filter-name" placeholder="put Name">

            <button id="apply-filter" class="buttonTable">Apply Filters</button>

            <label for="order-by">Order by:</label>
            <select id="product-by">
                <option value="product_id">ID Product</option>
                <option value="price">Price</option>
                <option value="name">Name</option>
            </select>
        </div>
        <div class="w-100">
            <div id="tablaContainer"></div>
        </div>
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
                    <input type="text" class="form-control" id="floatingName" placeholder="Name">
                    <label for="floatingName">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPrice" placeholder="Price">
                    <label for="floatingPrice">Price</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="floatingImage">
                    <label for="floatingImage">Image</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPriceDiscount" placeholder="Price Discount">
                    <label for="floatingPriceDiscount">Price Discount</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitproduct">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script type="module" src="api/apiProduct.js"></script>