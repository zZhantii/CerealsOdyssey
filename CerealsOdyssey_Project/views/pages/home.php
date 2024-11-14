<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="main">
    <main>
        <section class="mx-5">
            <div id="carouselExampleRide" class="carousel slide my-3" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-lg-flex col-lg-12">
                            <img src="public/img/banners/banner1.png" class="d-block w-100 object-fit-cover" alt="Banner1" height="540px">
                            <div class="square d-flex flex-column justify-content-center gap-4">
                                <h1 class="text-white">Shop your favorite cereals</h1>
                                <a href="?controller=product&action=showAll" class="btn btn-primary buttonMain2">Shop Celebrations</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <div class="d-lg-flex col-lg-12 ">
                            <img src="public/img/banners/banner2.webp" class="d-block w-100 object-fit-cover" alt="Banner1" height="540px">
                            <div class="square d-flex flex-column justify-content-center gap-4">
                                <h1 class="text-white">Shop your favorite cereals</h1>
                                <a href="?controller=product&action=shop" class="btn btn-primary buttonMain2">Shop Celebrations</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <?php include_once 'views/assets/listCategories.php' ?>

        <section class="section-product-main ">
            <div class="container-product-main my-5 d-flex justify-content-center">
                <div class="row px-3 d-flex ">
                    <div class="col d-flex productMain mb-5 mx-5 px-5 justify-content-between">
                        <div class="py-5 w-50">
                            <div class="d-flex flex-column gap-3 align-items-start">
                                <h2>Make your own cereal bowl</h2>
                                <p>You can customice your own cereal bowl, gifts and more.</p>
                                <a href="?controller=product&action=shop" class="btn btn-primary buttonSpecial">Create your cereals <img src="public/img/logo.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center circle">
                            <img src="public/img/home/home1.webp" alt="photo1home" height="280" width="380" class="object-fit-contain ">
                        </div>
                    </div>
                    <div class="col d-flex productMain mb-5 mx-5 px-5 justify-content-between">
                        <div class="py-5 w-50">
                            <div class="d-flex flex-column gap-3 align-items-start">
                                <h2>Celebrate with Odyssey</h2>
                                <p>The perfect sweet snacks for your next party, or the perfect gift for your friends and family. Check out our cereal celebrations.</p>
                                <a href="?controller=product&action=shop" class="btn btn-primary buttonMain">Shop Celebrations</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center circle">
                            <img src="public/img/home/home2.png" alt="photo1home" height="280" width="380" class="object-fit-contain ">
                        </div>
                    </div>
                    <div class="col d-flex productMain mb-5 mx-5 px-5 justify-content-between">
                        <div class="py-5 w-50">
                            <div class="d-flex flex-column gap-3 align-items-start">
                                <h2>Celeals classics and more</h2>
                                <p>Explore our collection of new arrivals, playful limited editions and your favorite classic OREO cookies.</p>
                                <a href="?controller=product&action=shop" class="btn btn-primary buttonMain">Shop All Cereals</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center circle">
                            <img src="public/img/home/home3.png" alt="photo1home" height="280" width="380" class="object-fit-contain ">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>