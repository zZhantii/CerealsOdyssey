<header class="px-5 sticky-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="?controller=categories">
                <img src="public/img/logo.png" alt="Logo" width="64" height="64" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-link" aria-current="page" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <rect x="32" y="48" width="192" height="160" rx="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <path d="M168,88a40,40,0,0,1-80,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>Shop
                    </a>
                    <?php if (isset($_SESSION['user']['rol']) && $_SESSION['user']['rol'] == 'admin') { ?>
                        <a class="nav-link" href="?controller=admin&action=showPanel">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                                <rect width="256" height="256" fill="none" />
                                <path d="M136,216V32a8,8,0,0,0-12.44-6.65l-80,53.33A8,8,0,0,0,40,85.35V216" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <path d="M136,88h72a8,8,0,0,1,8,8V216" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="16" y1="216" x2="240" y2="216" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="104" y1="112" x2="104" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="72" y1="112" x2="72" y2="128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="72" y1="168" x2="72" y2="184" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                                <line x1="104" y1="168" x2="104" y2="184" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            </svg>Admin
                        </a>
                    <?php } ?>
                    <a class="nav-link" aria-current="page" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <polyline points="176 32 176 128 143.99 104 112 128 112 32" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <path d="M48,216a24,24,0,0,1,24-24H208V32H72A24,24,0,0,0,48,56Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <polyline points="48 216 48 224 192 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>About us
                    </a>
                </div>
            </div>
            <div class="nav-link-profile">
                <?php if (empty($_SESSION['user'])) { ?>
                    <a href="?controller=user&action=login" class="nav-link-icon ps-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <circle cx="128" cy="96" r="64" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <path d="M32,216c19.37-33.47,54.55-56,96-56s76.63,22.53,96,56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                    </a>
                <?php } else { ?>
                    <a href="?controller=user&action=orders" class="nav-link-icon ps-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <circle cx="128" cy="96" r="64" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <path d="M32,216c19.37-33.47,54.55-56,96-56s76.63,22.53,96,56" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                    </a>
                <?php } ?>
                <a class="btn" href="javascript:void(0)" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                        <rect width="256" height="256" fill="none" />
                        <rect x="32" y="48" width="192" height="160" rx="8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        <path d="M168,88a40,40,0,0,1-80,0" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>
    <hr>
    <div class="collapse" id="collapseExample">
        <?php include_once('listHeaderCategories.php'); ?>
    </div>
    <hr>
    <div class="collapse" id="collapseExample4">
        <div>
            <div class="navbar mx-auto d-flex justify-content-center gap-4">
                <a class="subnav-link disabled" href="?controller=enterprise&action=story" aria-disabled="true">
                    Our story
                </a>
                <a class="subnav-link" href="?controller=enterprise&action=contact">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</header>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Cart (<?= count($_SESSION['cart']) ?>)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="container ">
            <div class="row d-flex flex-column justify-content-center">
                <?php include_once 'listCartHeaderProducts.php' ?>
                <div class="col-12 d-flex bg-white justify-content-center flex-column mt-3">
                    <?php
                    $cart = $_SESSION['cart'];
                    $total = Cart::total_price($cart);
                    ?>
                    <a href="?controller=buy&action=buyOrder" class="btn btn-primary buttonMain mt-3"><b>Continue to Checkout</b> - <?= number_format($total, 2, ',', '') ?> €</a>
                    <div class="container">
                        <div class="row">
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <img src="public/img/ShopPay.svg" height="20" alt="ShopPay">
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <img src="public/img/AmazonPay.svg" height="70" alt="AmazonPay">
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <img src="public/img/ApplePay.svg" height="70" alt="AppelPay">
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <img src="public/img/GooglePay.svg" height="70" alt="GooglePay">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>