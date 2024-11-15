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
                                    <button class="accordion-button collapsed p-0 py-3" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Accordion Item #1
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="d-flex justify-content-between">
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
                        </div> -->
                    </div>
                    <div class="col-sm-9">
                        <div class="row d-flex justify-content-center gap-3">
                            <div class="col col-sm-12 d-flex justify-content-between">
                                <h3 class="mb-4">Products (100)</h3>
                                <select name="" id="" class="border border-black py-2">
                                    <option value="Feature">Feature</option>
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