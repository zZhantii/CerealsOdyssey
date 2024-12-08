<?php
include_once 'model/AllProducts.php';
include_once 'config/dataBase.php';

class AllProductsDAO
{
    public static function getAllProducts()
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM products");

        $stmt->execute();

        $result = $stmt->get_result();

        $allProducts = [];
        while ($row = $result->fetch_object('AllProducts')) {
            $allProducts[] = $row;
        }

        $conex->close();
        return $allProducts;
    }

    public static function getProductsFilter($id)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT p.* FROM products p 
                                INNER JOIN categories c ON p.categorie_id = c.categorie_id 
                                WHERE c.categorie_id = ?");

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $categories = [];
        while ($row = $result->fetch_object('AllProducts')) {
            $categories[] = $row;
        }

        $conex->close();
        return $categories;
    }

    public static function getProductId($productId)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM products WHERE product_id = ?");

        $stmt->bind_param("i", $productId);

        $stmt->execute();

        $result = $stmt->get_result();

        $product = [];
        while ($row = $result->fetch_object('AllProducts')) {
            $product[] = $row;
        }

        $conex->close();
        return $product;
    }

    public static function createOrder($user, $cart)
    {
        $conex = database::connect();

        // Create order
        $stmtOrder = $conex->prepare("INSERT INTO orders (user_id, discount_id, status, cardNumber, totalAmount, totalPrice, totalItems) VALUES (?, 1, 'making', ?, ?, ?, ?)");

        $totalAmount = Cart::total_Amount($cart);
        $totalPrice = Cart::total_Price($cart);
        $totalItems = Cart::total_Items($cart);

        if (isset($user['id']) && isset($user['cardNumber'])) {
            // Accede a los valores directamente
            $userId = $user['id'];
            $cardNumber = $user['cardNumber'];

            // Vincula los parámetros
            $stmtOrder->bind_param("isidi", $userId, $cardNumber, $totalAmount, $totalPrice, $totalItems);

            // Ejecuta la consulta
            $stmtOrder->execute();
        }
        $orderId = $stmtOrder->insert_id;

        // Create Order_details
        $stmtCart = $conex->prepare("INSERT INTO order_details (order_id, discount_id, product_id, price, amount) VALUES (?, 1, ?, ?, ?)");

        foreach ($cart as $itemCart) {
            $stmtCart->bind_param("idid", $orderId, $itemCart['id'], $itemCart['price'], $itemCart['amount']);

            $stmtCart->execute();
        }

        $conex->close();
    }

    public static function getOrder()
    {
        $conex = database::connect();

        $stmtOrder = $conex->prepare("SELECT o.order_id, price, o.totalAmount, o.totalPrice, o.totalItems, d.discount_value FROM orders o
                                    INNER JOIN order_details od ON o.order_id = od.order_id
                                    INNER JOIN discounts d ON d.discount_id = od.discount_id");

        $stmtOrder->execute();

        $result = $stmtOrder->get_result();

        $orders = [];
        while ($row = $result->fetch_object('AllProducts')) {
            $orders[] = $row;
        }

        $conex->close();

        return $orders;
    }

    public static function getOrder_details()
    {
        $conex = database::connect();

        // Order_details
        $stmtOrder_Details = $conex->prepare("SELECT p.name, p.price, d.discount_value, od.amount FROM order_details od 
                                            INNER JOIN products p ON p.product_id = od.product_id 
                                            INNER JOIN discounts d ON d.discount_id = od.discount_id");

        $stmtOrder_Details->execute();

        $result = $stmtOrder_Details->get_result();

        $order_details = [];
        while ($row = $result->fetch_object('AllProducts')) {
            $order_details[] = $row;
        }

        $conex->close();

        return $order_details;
    }
}
