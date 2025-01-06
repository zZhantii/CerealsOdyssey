<head>
    <title>Admin Orders | Cereals Odyssey</title>
</head>

<div class="container my-3">
    <h1>Admin Panel</h1>
    <div class="d-flex gap-3">
        <div class="d-flex flex-column gap-3">
            <button id="createTable" class="buttonTable">Get</button>
            <button id="createAudi" class="buttonTable">View History</button>
            <button class="buttonTable" data-bs-toggle="modal" data-bs-target="#Order">Create</button>
            <button class="buttonTable" data-bs-toggle="modal" data-bs-target="#Order">Modify</button>
            <button id="DeleteUser" class="buttonTable">Delete</button>
            <a href="?controller=catgories" class="buttonTable">Go to Home</a>
            <a href="?controller=admin&action=showPanel" class="buttonTable">Go to Choose</a>

            <label for="filter-user-id">Search by User ID:</label>
            <input type="text" id="filter-user-id" placeholder="Enter User ID">

            <label for="filter-name">Search by Name:</label>
            <input type="text" id="filter-name" placeholder="Enter Name">

            <label for="filter-lastName">Search by Last Name:</label>
            <input type="text" id="filter-lastName" placeholder="Enter Last Name">

            <label for="filter-email">Search by Email:</label>
            <input type="text" id="filter-email" placeholder="Enter Email">

            <label for="filter-rol">Search by Role:</label>
            <input type="text" id="filter-rol" placeholder="Enter Role">

            <button id="apply-filter">Apply Filters</button>

            <label for="order-by">Sort by:</label>
            <select id="user-by">
                <option value="user_id">User ID</option>
                <option value="firstName">First Name</option>
                <option value="lastName">Last Name</option>
                <option value="email">Email</option>
                <option value="rol">Role</option>
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
                    <input type="text" class="form-control" id="floatingEmail" placeholder="Email">
                    <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingFirstName" placeholder="First Name">
                    <label for="floatingFirstName">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingLastName" placeholder="Last Name">
                    <label for="floatingLastName">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="floatingRol" aria-label="Floating label select example">
                        <option selected>Open this select menu</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                    <label for="floatingRol">Role</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitUser">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script type="module" src="api/apiUser.js"></script>