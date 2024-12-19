<head>
    <title>Admin | Cereals Odysset</title>
</head>

<div class="container my-3">
    <h1>Admin Panel</h1>
    <div class="d-flex gap-3">
        <div class="d-flex flex-column gap-3">
            <button id="createTable" class="buttonTable">Get Orders</button>
            <button class="buttonTable">View History</button>
            <button class="buttonTable" data-bs-toggle="modal" data-bs-target="#Order">Create Order</button>
            <button class="buttonTable" data-bs-toggle="modal" data-bs-target="#Order">Modify Order</button>
            <button id="DeleteOrder" class="buttonTable">Delete Order</button>
            <a href="?controller=catgories" class="buttonTable">Go to home</a>

            <label for="filter-user-id">Buscar por User ID:</label>
            <input type="text" id="filter-user-id" placeholder="Ingrese User ID">

            <label for="filter-order-id">Buscar por Order ID:</label>
            <input type="text" id="filter-order-id" placeholder="Ingrese Order ID">

            <label for="filter-date">Buscar por Fecha:</label>
            <input type="date" id="filter-date">

            <label for="filter-price">Buscar por Precio:</label>
            <input type="number" id="filter-price" placeholder="Ingrese Precio">

            <label for="filter-status">Buscar por Estado:</label>
            <input type="text" id="filter-status" placeholder="Ingrese Estado">

            <button id="apply-filter">Aplicar Filtros</button>

            <label for="order-by">Ordenar por:</label>
            <select id="order-by">
                <option value="order_id">ID Pedido</option>
                <option value="user_id">ID Usuario</option>
                <option value="price">Precio</option>
                <option value="date">Fecha</option>
                <option value="status">Estado</option>
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
                <button type="button" class="btn btn-primary" id="submitOrder">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script type="module" src="api/api.js"></script>