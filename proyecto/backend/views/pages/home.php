<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= css ?>">
</head>

<body id="main">
    <main>
        <section class="mx-5">
            <div id="carouselExampleRide" class="carousel slide my-3" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-lg-flex col-lg-12 ">
                            <img src="<?= img ?>banner1.png" class="d-block w-100 object-fit-cover" alt="Banner1" height="540px">
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
        <section class="mx-5 mt-5">
            <div class="container my-3">
                <div class="row filters">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="d-flex align-items-center align-items-between flex-column">
                            <a href="#"><img src="<?= img ?>photo1home.png" alt="filter1" class="object-fit-cover img-fluid"></a>
                            <h3 class="mt-3">Classics</h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="d-flex align-items-center flex-column">
                            <a href="#"><img src="<?= img ?>photo1home.png" alt="filter1" class="object-fit-cover img-fluid"></a>
                            <h3 class="mt-3">Classics</h3>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 ">
                        <div class="d-flex align-items-center flex-column">
                            <a href="#"><img src="<?= img ?>photo1home.png" alt="filter1" class="object-fit-cover img-fluid"></a>
                            <h3 class="mt-3">Classics</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-product-main ">
            <div class="container-product-main my-5 d-flex justify-content-center">
                <div class="row productMain w-75 px-3">
                    <div class="col py-5">
                        <div class="d-flex flex-column gap-3 align-items-start">
                            <h2>Celebrate with Odyssey</h2>
                            <p>The perfect sweet snacks for your next party, or the perfect gift for your friends and family. Check out our cereal celebrations.</p>
                            <a href="?controller=product&action=shop" class="btn btn-primary buttonMain">Shop Celebrations</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-center">
                            <img src="<?= img ?>photo1home.png" alt="photo1home" height="380" width="380" class="object-fit-cover circle">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>