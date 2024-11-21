<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container m-0 ">
        <div class="row d-flex flex-column justify-content-center">
            <div class="col-6 p-3 d-flex justify-content-between align-items-center bg-secondary">
                <h3 class="m-0">Cart (0)</h3>
                <p class="m-0">cruz</p>
            </div>
            <div class="col-6 bg-white">
                <h3>Oh no, your cart is empty!</h3>
                <div>
                    <h3 class="mt-5">Shop by</h2>
                        <?php include_once 'views/assets/listCategoriesCart.php' ?>
                </div>
            </div>
            <div class="col-6 sticky-bottom">
                <h2>You may also like</h2>
                <div class="container border rounded-3">
                    <div class="row">
                        <div class="col d-flex align-items-center gap-3">
                            <img src="../../public/img/products/product2.jpg" alt="productp" height="96" class="object-contain">
                            <div class="">
                                <h3>Cerealses</h3>
                                <p>2.5 €</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex sticky-bottom  bg-white justify-content-center flex-column">
                <a href="" class="btn btn-primary buttonMain mt-3"><b>Continue to Checkout</b> - xxx 0.00</a>
                <div class="container">
                    <div class="row">
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="../../public/img/ShopPay.svg" height="20" alt="ShopPay">
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="../../public/img/AmazonPay.svg" height="70" alt="AmazonPay">
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="../../public/img/ApplePay.svg" height="70" alt="AppelPay">
                        </div>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <img src="../../public/img/GooglePay.svg" height="70" alt="GooglePay">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>