<?php
include_once('model/CerealsDAO.php');
include_once('model/Cereals.php');
include_once('config/database.php');

class productController
{
    public function listStore()
    {
        $cereals = CerealsDAO::getAll();
        $viewList = 'views/products/list.php';
    }

    public function main()
    {
        $viewHome = 'views/pages/home.php';
        include_once 'views/pages/home.php';
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
}
