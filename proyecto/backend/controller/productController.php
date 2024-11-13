<?php
include_once('model/CerealsDAO.php');
include_once('model/Cereals.php');
include_once('config/database.php');

class productController
{
    public function listStore()
    {
        $cereals = CerealsDAO::getAll();
        include_once 'views/products/list.php';
        $viewList = 'views/products/list.php';
    }

    public function home()
    {
        include_once 'views/pages/home.php';
    }

    public function shop()
    {
        include_once 'views/pages/shop.php';
    }

    public function listCategories()
    {
        $categories = CerealsDAO::listCategories();
        $viewListCategories = 'views/products/listCategories.php';
        include_once 'views/products/listCategories.php';
    }





    // Products

    public function createProduct()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $amount = $_POST['amount'];

        $product = new Cereals();

        $product->setName($name);
        $product->setPrice($price);
        $product->setImage($image);
        $product->setAmount($amount);

        CerealsDAO::createProduct($product);
    }

    public function create()
    {
        include_once 'views/products/create.php';
    }
}
