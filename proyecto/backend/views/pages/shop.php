<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= css ?>">
    <link rel="shortcut icon" href="<?= img ?>Logo.png" type="image/x-icon">
    <title>All Products</title>
</head>

<body>
    <!-- Header -->
    <?php include_once 'views/partials/header.php' ?>

    <main>
        <section class="mx-5">
            <h3>Shop by</h3>
            <div class="container my-3">
                <div class="row filters">
                    <?= include_once $viewListCategories ?>
                </div>
            </div>
        </section>
        </section>
        <section class="mx-5 my-5 d-flex justify-content-center flex-column">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 d-flex flex-column filterShop">
                        <div class="d-flex justify-content-between">
                            <p class="mb-3">FILTER BY</p>
                            <p>sliders</p>
                        </div>
                        <h2 class="py-3 border border-end-0 border-start-0">Selecd Filters (0)</h2>
                        <a href="#" class="btn btn-secundary py-3 ps-0 border-bottom d-flex justify-content-between">
                            Merch
                            <p>flecha</p>
                        </a>
                        <a href="#" class="btn btn-secundary py-3 ps-0 d-flex justify-content-between">
                            Cereals
                            <p>flecha</p>
                        </a>
                        <div class="border-bottom">
                            <ul class="ms-2">
                                <li class="d-flex align-items-center gap-3 mb-4 cereals ">
                                    <div class="squareCheckBox"></div> Cookies Crips
                                </li>
                                <li class="d-flex align-items-center gap-3 mb-4 cereals ">
                                    <div class="squareCheckBox"></div> Cookies Crips
                                </li>
                                <li class="d-flex align-items-center gap-3 mb-4 cereals ">
                                    <div class="squareCheckBox"></div> Cookies Crips
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row d-flex justify-content-center gap-3">
                            <div class="col col-sm-12 d-flex justify-content-between">
                                <h3 class="mb-4">Products (100)</h3>
                                <select name="" id="" class="border border-black py-2">
                                    <option value="Feature">Feature</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include_once 'views/partials/footer.php' ?>
</body>

</html>