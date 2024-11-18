<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cereals Odyssey | Checkout</title>
</head>

<body>
    <main class="d-flex justify-content-center">
        <section class="informationPersonal">
            <form action="">
                <div class="container container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <img src="<?= url_base ?>public/img/logo.png" alt="logo" height="90" width="90">
                            <p class="m-0">bolsa</p>
                        </div>
                    </div>
                    <div class="row gap-3 mt-5">
                        <p class="m-0 text-center">CheckOut Express</p>
                        <div class="col">
                            <input type="button" class="form-control" value="First name" aria-label="First name">
                        </div>
                        <div class="col">
                            <input type="button" class="form-control" value="Last name" aria-label="Last name">
                        </div>
                    </div>
                    <div class="row ">
                        <p class="text-center">OR</p>
                    </div>
                    <div class="row mt-4">
                        <div class="col d-flex justify-content-between align-items-center">
                            <h3>Contact</h3>
                            <a href="">Log In</a>
                        </div>
                        <div class="form-floating mb-3 p-0">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                By submitting my email address, I agree to receive marketing communications from Oreo and other Mondelez Brands. I also confirm that I am at least 18 years of age and that I have read and agreed to the privacy policy.
                            </label>
                        </div>
                    </div>
                    <div class="row mt-4 g-3">
                        <h3>Delivery</h3>
                        <div class="form-floating p-0">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Country / Regions</label>
                        </div>
                        <div class="p-0 pe-3 col-md-6">
                            <label for="inputEmail4" class="form-label">First Name</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="p-0 col-md-6">
                            <label for="inputPassword4" class="form-label">Last Name</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="p-0 col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="p-0 col-12">
                            <label for="inputAddress2" class="form-label">Aparment</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="p-0 pe-3 col-md-4">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="p-0 pe-3 col-md-4">
                            <label for="inputState" class="form-label">State</label>
                            <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="p-0 col-md-4">
                            <label for="inputZip" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <h3>Payment</h3>
                        <div class="col-12 bg-info d-flex justify-content-between rounded-top border border-primary">
                            <p class="text-center m-0 p-3">Credit Card</p>
                        </div>
                        <div class="col-12 bg-secondary rounded-bottom">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="d-flex">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email address</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-check my-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Use shipping address as billing address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <h4>Remember me</h4>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item p-3 m-0">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        Accordion Item #1
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div>
                                        <p>Next time you check out here or on other stores powered by Shopify, you’ll receive a code by text message to securely purchase with Shop Pay.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary buttonMain">Submit</button>
            </form>
        </section>
        <section class="buyProducts border-start">
            <div class="container">
                <div class="row d-flex flex-column gap-4">
                    <div class="col d-flex gap-3">
                        <div>
                            <img src="../../frontend/img/photo1home.png" alt="producto" height="64" width="64" class="img-product border">
                        </div>
                        <div class="d-flex flex-column">
                            <p>Celeraes de coores</p>
                            <p>1</p>
                        </div>
                        <div class="col">
                            <p class="text-end">2.5€</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex gap-3">
                            <input type="text" name="" id="" class="border">
                            <input type="submit" value="Apply" class="border">
                        </div>
                    </div>
                    <div class="col d-flex flex-column gap-3">
                        <div class="col d-flex justify-content-between p-0">
                            <p>Subtotal</p>
                            <p>2.50€</p>
                        </div>
                        <div class="col d-flex justify-content-between p-0">
                            <p>Shipping</p>
                            <p>Enter shipping address</p>
                        </div>
                        <div class="col d-flex justify-content-between p-0 mt-3">
                            <h3>Total</h3>
                            <h4>2.50€</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>