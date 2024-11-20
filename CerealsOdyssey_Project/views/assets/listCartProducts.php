<?php 
session_start();
include_once '../controller/cartController.php';

if (empty($cart)): ?>
        <p>Tu carrito está vacío.</p>
<?php else: 
    
    foreach ($car as $item) { ?>
        <div class="container-fluid border rounded-2 container-product py-2 px-3 d-flex gap-4">
            <img src="../../frontend/img/photo1home.png" alt="photoproduct" height="160" width="160" class="object-fit-cover img-fluid">
            <div class="productInformation d-flex flex-column justify-content-evenly">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Cereales de colores</h4>
                    <p>basura</p>
                </div>
                <div>
                    <p>Size: </p>
                </div>
                <div class="d-flex justify-content-between align-items-center buttons">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary border-0 minus">-</button>
                        <button type="button" class="btn btn-primary border-0 amount">01</button>
                        <button type="button" class="btn btn-primary border-0 plus">+</button>
                    </div>
                    <p>2.50€</p>
                </div>
            </div>
        </div>
    <?php }?>
