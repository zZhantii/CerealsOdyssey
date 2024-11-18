<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CerealsOdyssey | Shop</title>
</head>

<body>
    <main>
        <section class="mx-5">
            <h3>Shop by</h3>
            <div class="container my-3">
                <div class="row filters">

                    <?php include_once 'views/assets/listCategories.php' ?>

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
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed p-0 py-3 bg-transparent bor" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Cereals
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse border-bottom box-shadow-none" data-bs-parent="#accordionFlushExample">
                                    <ul class="ms-3">
                                        <li class="d-flex align-items-center gap-3 mb-4 mt-4 cereals">
                                            <input type="checkbox" class="squareCheckBox">OdysseyID</input>
                                        </li>
                                        <li class="d-flex align-items-center gap-3 mb-4 cereals ">
                                            <input type="checkbox" class="squareCheckBox">Cereals</input>
                                        </li>
                                        <li class="d-flex align-items-center gap-3 mb-4 cereals ">
                                            <input type="checkbox" class="squareCheckBox">Milks</input>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row d-flex justify-content-around">
                            <div class="col col-sm-12 d-flex justify-content-between">
                                <h3 class="mb-4">Products (<?= count($allProducts) ?>)</h3>
                                <select name="" id="" class="border border-black py-2">
                                    <option value="Order By" disabled>Order By</option>
                                    <option value="Feature">Feature</option>
                                    <option value="Price1">Price: Low to High</option>
                                    <option value="Price2">Price: High to Low</option>
                                    <option value="BestSelling">BestSelling</option>
                                    <option value="Newest">Newest</option>
                                </select>
                            </div>

                            <?php include_once 'views/assets/listAllProducts.php' ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>