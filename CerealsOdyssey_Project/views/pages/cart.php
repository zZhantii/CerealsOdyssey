<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>
    <main>
        <div class="container cart d-flex flex-column justify-content-center gap-4">
            <h1>Cart</h1>
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
            <div>
                <h4>You May Also Like</h4>
                <div class="d-flex border rounded-2 py-2 px-3 container-like align-items-center gap-2">
                    <img src="../../frontend/img/photo1home.png" alt="producto" height="96" width="96" class="object-fit-cover img-fluid">
                    <div class="container-buy">
                        <div>
                            <h4>Cereales de colores</h4>
                        </div>
                        <div>
                            <p>2.50€</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="buttonMain">Continue to Checkout - 2.50€</button>
        </div>

    </main>
</body>

</html>