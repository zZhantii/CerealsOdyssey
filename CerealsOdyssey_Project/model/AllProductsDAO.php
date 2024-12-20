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
        $order = isset($_POST['order']) ? $_POST['order'] : 'asc'; // Valor por defecto

        // Asegúrate de que el valor sea válido
        if ($order !== 'asc' && $order !== 'desc') {
            $order = 'asc';
        }

        // Prepara la consulta SQL
        $stmt = $conex->prepare("SELECT p.* FROM products p 
                                INNER JOIN categories c ON p.categorie_id = c.categorie_id 
                                WHERE c.categorie_id = ? 
                                ORDER BY p.price $order");

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
        if (!empty($_SESSION['discounts'])) {
            $stmtOrder = $conex->prepare("INSERT INTO orders (user_id, discount_id, status, cardNumber, totalAmount, totalPrice, totalItems, totalDiscount, discount_value) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        } else {
            $stmtOrder = $conex->prepare("INSERT INTO orders (user_id, discount_id, status, cardNumber, totalAmount, totalPrice, totalItems) VALUES (?, ?, ?, ?, ?, ?, ?)");
        }

        $totalAmount = Cart::total_Amount($cart);

        $totalPrice = Cart::total_Price($cart);

        $totalItems = Cart::total_Items($cart);

        if (isset($user['id']) && isset($user['cardNumber'])) {
            // Accede a los valores directamente
            $userId = $user['id'];
            $cardNumber = $user['cardNumber'];

            if (!empty($_SESSION['discounts'])) {
                $cartSummary = $_SESSION['discounts'];

                $totalDiscount = $cartSummary['newPrice'];
                $discount_value = $cartSummary['discount'];

                $status = 'making';
                $discountId = '1';

                $stmtOrder->bind_param(
                    "iissididd",
                    $userId,
                    $discountId,
                    $status,
                    $cardNumber,
                    $totalAmount,
                    $totalPrice,
                    $totalItems,
                    $totalDiscount,
                    $discount_value
                );
            } else {
                $stmtOrder->bind_param(
                    "iissidi",
                    $userId,
                    $discountId,
                    $status,
                    $cardNumber,
                    $totalAmount,
                    $totalPrice,
                    $totalItems
                );
            }

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

        // Shipments
        $stmtShipment = $conex->prepare("INSERT INTO shipments ( order_id, status, address, city, date_shipment) VALUES ( ?, ?, ?, ?, ?)");

        $address = AddressDAO::getAddress();

        $dateShipment = date('Y-m-d', strtotime('+3 days'));
        $status = 'making';

        var_dump($address);

        foreach ($address as $itemShipment) {
            $stmtShipment->bind_param("issss", $orderId, $status, $itemShipment->getAddress(), $itemShipment->getCity(), $dateShipment);
            $stmtShipment->execute();
        }

        $conex->close();
    }

    public static function getOrder()
    {
        $conex = database::connect();

        $stmtOrder = $conex->prepare("SELECT DISTINCT o.*
        FROM orders o
        LEFT JOIN order_details od ON o.order_id = od.order_id
        LEFT JOIN discounts d ON d.discount_id = od.discount_id
        LEFT JOIN shipments s ON o.order_id = s.order_id
        WHERE od.order_detail_id = (SELECT MIN(order_detail_id) FROM order_details WHERE order_id = o.order_id) OR od.order_detail_id IS NULL");

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
        $stmtOrder_Details = $conex->prepare("SELECT p.name, od.amount, p.price, o.order_id 
                                            FROM order_details od
                                            INNER JOIN orders o ON o.order_id = od.order_id
                                            INNER JOIN products p ON p.product_id = od.product_id");

        $stmtOrder_Details->execute();

        $result = $stmtOrder_Details->get_result();

        $order_details = [];
        while ($row = $result->fetch_object('AllProducts')) {
            $order_details[] = $row;
        }

        $conex->close();

        return $order_details;
    }

    public static function create_order_api($data)
    {
        $conex = database::connect();
        $user_id = $data['user_id'];
        $price = $data['price'];
        $cardNumber = $data['cardNumber'];
        $status = $data['status'];

        // Aquí es donde deberías preparar tu consulta SQL
        $stmt = $conex->prepare("INSERT INTO orders (user_id, status, cardNumber, totalPrice) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issd", $user_id, $status, $cardNumber, $price);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Order create successfully'];
        } else {
            return ['success' => false, 'message' => 'Error modifying order: ' . $stmt->error];
        }
    }

    public static function getOrderApi()
    {
        $conex = database::connect();

        $stmtOrder = $conex->prepare("SELECT DISTINCT o.*
        FROM orders o
        LEFT JOIN order_details od ON o.order_id = od.order_id
        LEFT JOIN discounts d ON d.discount_id = od.discount_id
        LEFT JOIN shipments s ON o.order_id = s.order_id
        WHERE od.order_detail_id = (SELECT MIN(order_detail_id) FROM order_details WHERE order_id = o.order_id) OR od.order_detail_id IS NULL");
        $stmtOrder->execute();

        $result = $stmtOrder->get_result();

        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        $conex->close();

        return $orders;
    }

    public static function modify_order_api($data)
    {
        $conex = database::connect();
        // Asegúrate de que estás accediendo a los valores correctos
        $orderID = $data['orderID'];
        $price = $data['price'];
        $cardNumber = $data['cardNumber'];
        $status = $data['status'];

        // Aquí es donde deberías preparar tu consulta SQL
        $stmt = $conex->prepare("UPDATE orders SET status=?, cardNumber=?, totalPrice=? WHERE order_id=$orderID");
        $stmt->bind_param("ssd", $status, $cardNumber, $price);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Order modified successfully'];
        } else {
            return ['success' => false, 'message' => 'Error modifying order: ' . $stmt->error];
        }
    }

    public static function delete_order_api($order_id)
    {
        $conex = database::connect();
        // Delete Orders_details
        $stmtOrder_Details = $conex->prepare("DELETE FROM order_details WHERE order_id = $order_id");
        $stmtOrder_Details->execute();

        // Delete orders
        $stmtOrder = $conex->prepare("DELETE FROM orders WHERE order_id = $order_id");
        $stmtOrder->execute();

        $conex->close();
        return 'success';
    }

    public static function getUserApi()
    {
        $conex = database::connect();

        $stmtOrder = $conex->prepare("SELECT DISTINCT o.*
        FROM orders o
        LEFT JOIN order_details od ON o.order_id = od.order_id
        LEFT JOIN discounts d ON d.discount_id = od.discount_id
        LEFT JOIN shipments s ON o.order_id = s.order_id
        WHERE od.order_detail_id = (SELECT MIN(order_detail_id) FROM order_details WHERE order_id = o.order_id) OR od.order_detail_id IS NULL");
        $stmtOrder->execute();

        $result = $stmtOrder->get_result();

        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        $conex->close();

        return $orders;
    }

    public static function modify_order_api($data)
    {
        $conex = database::connect();
        // Asegúrate de que estás accediendo a los valores correctos
        $orderID = $data['orderID'];
        $price = $data['price'];
        $cardNumber = $data['cardNumber'];
        $status = $data['status'];

        // Aquí es donde deberías preparar tu consulta SQL
        $stmt = $conex->prepare("UPDATE orders SET status=?, cardNumber=?, totalPrice=? WHERE order_id=$orderID");
        $stmt->bind_param("ssd", $status, $cardNumber, $price);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Order modified successfully'];
        } else {
            return ['success' => false, 'message' => 'Error modifying order: ' . $stmt->error];
        }
    }

    public static function delete_order_api($order_id)
    {
        $conex = database::connect();
        // Delete Orders_details
        $stmtOrder_Details = $conex->prepare("DELETE FROM order_details WHERE order_id = $order_id");
        $stmtOrder_Details->execute();

        // Delete orders
        $stmtOrder = $conex->prepare("DELETE FROM orders WHERE order_id = $order_id");
        $stmtOrder->execute();

        $conex->close();
        return 'success';
    }
}
