<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../frontend/css/style.css">
    <link rel="shortcut icon" href="../../frontend/img/Logo.png" type="image/x-icon">
    <title>Checkout</title>
</head>

<body>
    <main class="d-flex justify-content-center">
        <section class="informationPersonal">
            <form action="#">
                <div class="container">
                    <div class="row d-flex flex-column gap-3">
                        <div class="col d-flex align-items-center justify-content-between">
                            <img src="../../frontend/img/Logo.png" alt="Logo" height="80" width="80" class="object-fit-cover img-fluid">
                            <a href=" cart.html">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none" />
                                    <rect x="32" y="48" width="192" height="160" rx="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                    <path d="M168,88a40,40,0,0,1-80,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                </svg>
                            </a>
                        </div>
                        <div class="col d-flex align-items-center flex-column buttons">
                            <h4 class="text-center">Express Checkout</h4>
                            <div class="d-flex align-items-center gap-3 pt-3">
                                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center">Shop Pay</a>
                                <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center">Google pay</a>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center">
                            or
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-between">
                                <h3 class="mb-4">Contact</h3>
                                <a href="">log in</a>
                            </div>
                            <div class="d-flex gap-3 flex-column">
                                <input type="text" name="" id="">
                                <div class="d-flex align-items-start gap-2">
                                    <input type="checkbox" name="" id="">
                                    <label for="">By submitting my email address, I agree to receive marketing communications from Oreo and other Mondelez Brands. I also confirm that I am at least 18 years of age and that I have read and agreed to the privacy policy.</label>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4">Delivery</h3>
                            <div class="container">
                                <div class="row d-flex flex-column gap-3">
                                    <div class="col">
                                        <div class="selects">
                                            <label for="">Country / Region</label>
                                            <select name="" id="">
                                                <option value="United State">United State</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-row gap-3">
                                        <input type="text" name="" id="">
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="col">
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="col d-flex flex-row gap-3">
                                        <input type="text" name="" id="">
                                        <div class="selects">
                                            <label for="">Country / Region</label>
                                            <select name="" id="">
                                                <option value="United State">United State</option>
                                            </select>
                                        </div>
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="col">
                                        <p class="mb-4">Shipping method</>
                                        <p>Enter your shipping address to view available shipping methods.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <h3 class="mb-4">Payment</h3>
                            <h4>All transactions are secure and encrypted.</h4>
                        </div>
                        <div class="container">
                            <div class="row d-flex flex-column gap-3">
                                <div class="col d-flex justify-content-between">
                                    <p>Credit Card</p>
                                    <div class="d-flex">
                                        <p>creditCard</p>
                                        <p>creditCard</p>
                                        <p>creditCard</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <input type="text" name="" id="">
                                </div>
                                <div class="col d-flex flex-row gap-3">
                                    <input type="text" name="" id="">
                                    <input type="text" name="" id="">
                                </div>
                                <div class="col">
                                    <input type="text" name="" id="">
                                </div>
                                <div class="d-flex flex-column">
                                    <h4 class="mb-4">Remember</h4>
                                    <div class="container">
                                        <div class="row d-flex flex-column gap-3">
                                            <div class="col checkbox p-3 d-flex">
                                                <input type="checkbox" name="" id="">
                                                <label for="">Save my information for a faster checkout</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="" id="">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="" id="">
                                            </div>
                                            <div class="col">
                                                <p>Next time you check out here or on other stores powered by Shopify, you’ll receive a code by text message to securely purchase with Shop Pay.</p>
                                                <p>By continuing, you agree to Shop Pay’s Privacy Policy and Terms of Service</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Pay Now">
                </div>
        </section>
        </form>
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