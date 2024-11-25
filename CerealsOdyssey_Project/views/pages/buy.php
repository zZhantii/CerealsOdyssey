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
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <a href="?contoller=categories">
                                <img src="<?= url_base ?>public/img/logo.png" alt="logo" height="90" width="90">
                            </a>
                            <a href="?contoller=cart&action=show">
                                <p class="m-0">bolsa</p>
                            </a>
                        </div>
                    </div>
                    <div class="row g-3 mt-5 mb-3">
                        <p class="m-0 text-center">CheckOut Express</p>
                        <div class="col-6 ps-0">
                            <input type="button" class="form-control" value="First name" aria-label="First name">
                        </div>
                        <div class="col-6 pe-0">
                            <input type="button" class="form-control" value="Last name" aria-label="Last name">
                        </div>
                    </div>
                    <div class="row ">
                        <p class="text-center">OR</p>
                    </div>
                    <div class="row mt-4">
                        <div class="col mb-3 d-flex justify-content-between align-items-center">
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
                        <div class="d-flex justify-content-between p-0 ">
                            <div class="form-floating p-0 col-md-6 pe-2">
                                <input type="email" class="form-control" id="floatingInput" placeholder="First Name">
                                <label for="floatingInput">First Name</label>
                            </div>
                            <div class="form-floating p-0 col-md-6 ps-2">
                                <input type="email" class="form-control" id="floatingInput" placeholder="Last Name">
                                <label for="floatingInput">Last Name</label>
                            </div>
                        </div>
                        <div class="form-floating p-0 col-md-12">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating p-0 col-md-12">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Address">
                            <label for="floatingInput">Address</label>
                        </div>
                        <div class="form-floating p-0 pe-3 col-md-4">
                            <input type="email" class="form-control" id="floatingInput" placeholder="City">
                            <label for="floatingInput">City</label>
                        </div>
                        <div class="form-floating p-0 pe-3 col-md-4">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Works with selects</label>
                        </div>
                        <div class="form-floating p-0 col-md-4">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Address">
                            <label for="floatingInput">Address</label>
                        </div>
                    </div>
                    <div class="row mt-4 ">
                        <h3 class="mb-3">Payment</h3>
                        <div class="col-12 d-flex justify-content-between rounded-top border border-primary payment">
                            <p class="text-center m-0 p-3">Credit Card</p>

                            <div class="d-flex gap-3">
                                <svg width="800px" height="800px" viewBox="0 -11 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="69" height="47" rx="5.5" fill="white" stroke="#D9D9D9" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.2505 32.5165H17.0099L13.8299 20.3847C13.679 19.8267 13.3585 19.3333 12.8871 19.1008C11.7106 18.5165 10.4142 18.0514 9 17.8169V17.3498H15.8313C16.7742 17.3498 17.4813 18.0514 17.5991 18.8663L19.2491 27.6173L23.4877 17.3498H27.6104L21.2505 32.5165ZM29.9675 32.5165H25.9626L29.2604 17.3498H33.2653L29.9675 32.5165ZM38.4467 21.5514C38.5646 20.7346 39.2717 20.2675 40.0967 20.2675C41.3931 20.1502 42.8052 20.3848 43.9838 20.9671L44.6909 17.7016C43.5123 17.2345 42.216 17 41.0395 17C37.1524 17 34.3239 19.1008 34.3239 22.0165C34.3239 24.2346 36.3274 25.3992 37.7417 26.1008C39.2717 26.8004 39.861 27.2675 39.7431 27.9671C39.7431 29.0165 38.5646 29.4836 37.3881 29.4836C35.9739 29.4836 34.5596 29.1338 33.2653 28.5494L32.5582 31.8169C33.9724 32.3992 35.5025 32.6338 36.9167 32.6338C41.2752 32.749 43.9838 30.6502 43.9838 27.5C43.9838 23.5329 38.4467 23.3004 38.4467 21.5514ZM58 32.5165L54.82 17.3498H51.4044C50.6972 17.3498 49.9901 17.8169 49.7544 18.5165L43.8659 32.5165H47.9887L48.8116 30.3004H53.8772L54.3486 32.5165H58ZM51.9936 21.4342L53.1701 27.1502H49.8723L51.9936 21.4342Z" fill="#172B85" />
                                </svg>
                                <svg width="800px" height="800px" viewBox="0 -11 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.5" width="69" height="47" rx="5.5" fill="white" stroke="#D9D9D9" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M35.3945 34.7619C33.0114 36.8184 29.92 38.0599 26.5421 38.0599C19.0047 38.0599 12.8945 31.8788 12.8945 24.254C12.8945 16.6291 19.0047 10.448 26.5421 10.448C29.92 10.448 33.0114 11.6895 35.3945 13.7461C37.7777 11.6895 40.869 10.448 44.247 10.448C51.7843 10.448 57.8945 16.6291 57.8945 24.254C57.8945 31.8788 51.7843 38.0599 44.247 38.0599C40.869 38.0599 37.7777 36.8184 35.3945 34.7619Z" fill="#ED0006" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M35.3945 34.7619C38.3289 32.2296 40.1896 28.4616 40.1896 24.254C40.1896 20.0463 38.3289 16.2783 35.3945 13.7461C37.7777 11.6895 40.869 10.448 44.247 10.448C51.7843 10.448 57.8945 16.6291 57.8945 24.254C57.8945 31.8788 51.7843 38.0599 44.247 38.0599C40.869 38.0599 37.7777 36.8184 35.3945 34.7619Z" fill="#F9A000" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M35.3946 13.7461C38.329 16.2784 40.1897 20.0463 40.1897 24.254C40.1897 28.4616 38.329 32.2295 35.3946 34.7618C32.4603 32.2295 30.5996 28.4616 30.5996 24.254C30.5996 20.0463 32.4603 16.2784 35.3946 13.7461Z" fill="#FF5E00" />
                                </svg>
                                <svg height="800px" width="800px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 291.764 291.764" xml:space="preserve">
                                    <g>
                                        <path style="fill:#26A6D1;" d="M18.235,41.025h255.294c10.066,0,18.235,8.169,18.235,18.244v173.235c0,10.066-8.169,18.235-18.235,18.235H18.235C8.16,250.74,0,242.57,0,232.505V59.269C0,49.194,8.169,41.025,18.235,41.025z" />
                                        <path style="fill:#FFFFFF;" d="M47.047,113.966l-28.812,63.76h34.492l4.276-10.166h9.774l4.276,10.166h37.966v-7.759l3.383,7.759
                                        h19.639l3.383-7.923v7.923h78.959l9.601-9.902l8.99,9.902l40.555,0.082l-28.903-31.784l28.903-32.058h-39.926l-9.346,9.719
                                        l-8.707-9.719h-85.897l-7.376,16.457l-7.549-16.457h-34.42v7.495l-3.829-7.495C76.479,113.966,47.047,113.966,47.047,113.966z
                                        M53.721,123.02h16.813l19.111,43.236V123.02h18.418l14.761,31l13.604-31h18.326v45.752h-11.151l-0.091-35.851l-16.257,35.851
                                        h-9.975l-16.348-35.851v35.851h-22.94l-4.349-10.257H50.147l-4.34,10.248H33.516C33.516,168.763,53.721,123.02,53.721,123.02z
                                        M164.956,123.02h45.342L224.166,138l14.315-14.98h13.868l-21.071,22.995l21.071,22.73h-14.497l-13.868-15.154l-14.388,15.154
                                        h-44.64L164.956,123.02L164.956,123.02z M61.9,130.761l-7.741,18.272h15.473L61.9,130.761z M176.153,132.493v8.352h24.736v9.309
                                        h-24.736v9.118h27.745l12.892-13.43l-12.345-13.357h-28.292L176.153,132.493z" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="col-12 rounded-bottom payment2">
                            <div class="form-floating my-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="d-flex justify-content-between p-0">
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
                    <div class="row mt-4 g-3 mb-3">
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
                    <div class="row">
                        <button type="submit" class="btn btn-primary buttonMain col-12">Submit</button>
                    </div>
                </div>
            </form>
        </section>
        <section class="buyProducts border-start">
            <div class="container sticky-top buyProducts2">
                <div class="row d-flex flex-column gap-4">
                    <div class="col d-flex gap-3">
                        <div>
                            <img src="<?= url_base ?>public/img/products/product1.jpg" alt="producto" height="64" width="64" class="img-product border">
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
                        <div class="form-floating my-3 d-flex gap-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Discount Code">
                            <label for="floatingInput">Discount Code</label>
                            <input type="submit" value="Apply" class="border rounded px-3">
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