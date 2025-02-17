<head>
    <title>CerealsOdyssey | Shop</title>
</head>

<body>
    <main>
        <section class="mx-5 my-3">
            <h3>Shop by</h3>
            <div class="container my-3">

                <?php include_once 'views/pages/home/listCategories.php' ?>

            </div>
        </section>

        <section class="mx-5 my-5 d-flex justify-content-center flex-column">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 d-flex flex-column filterShop">
                        <div class="d-flex justify-content-between border-bottom">
                            <p class="mb-3">FILTER BY</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#303B43" viewBox="0 0 256 256" class="rotate">
                                <path d="M84,136a28,28,0,0,1-20,26.83V216a8,8,0,0,1-16,0V162.83a28,28,0,0,1,0-53.66V40a8,8,0,0,1,16,0v69.17A28,28,0,0,1,84,136Zm52-74.83V40a8,8,0,0,0-16,0V61.17a28,28,0,0,0,0,53.66V216a8,8,0,0,0,16,0V114.83a28,28,0,0,0,0-53.66Zm72,80V40a8,8,0,0,0-16,0V141.17a28,28,0,0,0,0,53.66V216a8,8,0,0,0,16,0V194.83a28,28,0,0,0,0-53.66Z"></path>
                            </svg>
                        </div>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed border-bottom p-0 py-3 bg-transparent bor" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Cereals
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse border-bottom box-shadow-none" data-bs-parent="#accordionFlushExample">
                                    <ul class="ms-3">
                                        <li class="d-flex align-items-center gap-3 mb-4 mt-4 cereals">
                                            <input type="checkbox" class="squareCheckBox" value="1" onchange="filterURL()"> Classics
                                        </li>
                                        <li class="d-flex align-items-center gap-3 mb-4 cereals">
                                            <input type="checkbox" class="squareCheckBox" value="2" onchange="filterURL()"> Energy Boost
                                        </li>
                                        <li class="d-flex align-items-center gap-3 mb-4 cereals">
                                            <input type="checkbox" class="squareCheckBox" value="3" onchange="filterURL()"> Calm & Relax
                                        </li>
                                        <li class="d-flex align-items-center gap-3 mb-4 cereals">
                                            <input type="checkbox" class="squareCheckBox" value="4" onchange="filterURL()"> Kids Fun Mix
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row d-flex justify-content-around">
                            <div class="filterProduct col col-sm-12 d-flex justify-content-between">
                                <h3 class="mb-4">Products (<?= count($allProducts) ?>)</h3>
                                <form method="GET" action="">
                                    <select id="order" class="border border-black py-2" onchange="location.href=this.value">
                                        <option value="#" disabled selected>Order By</option>
                                        <option value="?controller=product&action=getAllProducts&order=asc">Price: Low to High</option>
                                        <option value="?controller=product&action=getAllProducts&order=desc">Price: High to Low</option>
                                    </select>
                                </form>
                            </div>

                            <?php include_once 'views/pages/products/listAllProducts.php' ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include_once 'views/assets/errors.php' ?>
</body>