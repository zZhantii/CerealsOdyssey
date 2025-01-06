<?php
include_once 'model/Products.php';
include_once 'model/Cereals.php';
include_once 'config/dataBase.php';

class AllProductsDAO
{
    public static function getAllProducts($filter)
    {
        $conex = database::connect();

        $order = isset($_GET['order']) ? $_GET['order'] : '';

        if ($filter == null) {
            $sql = "SELECT * FROM products";
            if ($order === 'asc') {
                $sql .= " ORDER BY price ASC";
            } elseif ($order === 'desc') {
                $sql .= " ORDER BY price DESC";
            }

            $stmt = $conex->prepare($sql);
        } else {
            $sql = "SELECT * FROM products p JOIN categories c ON c.categorie_id = p.categorie_id WHERE p.categorie_id = ?";

            $stmt = $conex->prepare($sql);
            $stmt->bind_param("i", $filter);

            if ($order === 'asc') {
                $sql .= " ORDER BY price ASC";
            } elseif ($order === 'desc') {
                $sql .= " ORDER BY price DESC";
            }
        }

        $stmt->execute();


        $result = $stmt->get_result();

        $allProducts = [];
        while ($row = $result->fetch_object('Cereals')) {
            $allProducts[] = $row;
        }

        $conex->close();

        return $allProducts;
    }

    public static function getProductId($productId)
    {
        $conex = database::connect();
        $stmt = $conex->prepare("SELECT * FROM products WHERE product_id = ?");

        $stmt->bind_param("i", $productId);

        $stmt->execute();

        $result = $stmt->get_result();

        $product = [];
        while ($row = $result->fetch_object('Cereals')) {
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

        $conex->close();
    }

    public static function getOrder()
    {
        $conex = database::connect();

        $stmtOrder = $conex->prepare("SELECT DISTINCT o.*
        FROM orders o
        LEFT JOIN order_details od ON o.order_id = od.order_id
        LEFT JOIN discounts d ON d.discount_id = od.discount_id
        WHERE od.order_detail_id = (SELECT MIN(order_detail_id) FROM order_details WHERE order_id = o.order_id) OR od.order_detail_id IS NULL");

        $stmtOrder->execute();

        $result = $stmtOrder->get_result();

        $orders = [];
        while ($row = $result->fetch_object('Cereals')) {
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
        while ($row = $result->fetch_object('Cereals')) {
            $order_details[] = $row;
        }

        $conex->close();

        return $order_details;
    }

    public static function create_order_api($data)
    {
        $conex = database::connect();
        $user_id = $data['user_id'];
        $discount = $data['discount'];
        $cardNumber = $data['cardNumber'];
        $status = $data['status'];

        $amount = $data['amount'];
        $product = (int) $data['product'];
        $price = $data['priceProduct'];
        $totalPrice = $amount * $price;

        $stmtOrder = $conex->prepare("INSERT INTO orders (user_id, discount_id, status, cardNumber, totalPrice, totalAmount) VALUES (?, ?, ?, ?, ?, ?)");
        $initialTotalItems = 0;
        $stmtOrder->bind_param("iissdi", $user_id, $discount, $status, $cardNumber, $totalPrice, $initialTotalItems);

        if (!$stmtOrder->execute()) {
            return ['success' => false, 'message' => 'Error creating order: ' . $stmtOrder->error];
        }

        $orderId = $stmtOrder->insert_id;

        $stmtOrderDetails = $conex->prepare("INSERT INTO order_details (order_id, discount_id, product_id, price, amount) VALUES (?, ?, ?, ?, ?)");
        $stmtOrderDetails->bind_param("iiiii", $orderId, $discount, $product, $price, $amount);


        if (!$stmtOrderDetails->execute()) {
            return ['success' => false, 'message' => 'Error creating order details: ' . $stmtOrderDetails->error];
        }

        // Calcular el total de registros en order_details para este order_id
        $countQuery = $conex->prepare("SELECT COUNT(*) FROM order_details WHERE order_id = ?");
        $countQuery->bind_param("i", $orderId);
        $countQuery->execute();
        $countQuery->bind_result($totalItems);
        $countQuery->fetch();
        $countQuery->close();

        // Actualizar el campo totalItems en la tabla orders
        $updateOrderQuery = $conex->prepare("UPDATE orders SET totalAmount = ? WHERE order_id = ?");
        $updateOrderQuery->bind_param("ii", $totalItems, $orderId);

        if (!$updateOrderQuery->execute()) {
            return ['success' => false, 'message' => 'Error updating total items in orders: ' . $updateOrderQuery->error];
        }

        return ['success' => true, 'message' => 'Order created successfully'];
    }

    public static function getOrderApi()
    {
        $conex = database::connect();

        $stmtOrder = $conex->prepare("SELECT * FROM orders");
        $stmtOrder->execute();

        $result = $stmtOrder->get_result();

        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        $conex->close();

        return $orders;
    }

    public static function get_products_order_api()
    {
        $conex = database::connect();

        $stmtOrder = $conex->prepare("SELECT * FROM products");
        $stmtOrder->execute();

        $result = $stmtOrder->get_result();

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        $conex->close();

        return $products;
    }

    public static function modify_order_api($data)
    {
        $conex = database::connect();
        // Asegúrate de que estás accediendo a los valores correctos
        $orderID = $data['orderID'];
        $cardNumber = $data['cardNumber'];
        $status = $data['status'];
        $discount = $data['discount'];

        $stmt = $conex->prepare("UPDATE orders SET status=?, cardNumber=?, discount_value=? WHERE order_id=?");
        $stmt->bind_param("ssdi", $status, $cardNumber, $discount, $orderID);

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

    public static function get_product_api()
    {
        $conex = database::connect();

        $stmtOrder = $conex->prepare("SELECT * FROM products");
        $stmtOrder->execute();

        $result = $stmtOrder->get_result();

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        $conex->close();

        return $products;
    }

    public static function create_product_api($data)
    {
        $conex = database::connect();

        $price = $data['price'];
        $name = $data['name'];
        $image = $data['image'];
        $PriceDiscount = $data['priceDiscount'];

        // Aquí es donde deberías preparar tu consulta SQL
        $stmt = $conex->prepare("INSERT INTO products (name, price, image, priceDiscount) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdsd", $name, $price, $image, $PriceDiscount);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Order create successfully'];
        } else {
            return ['success' => false, 'message' => 'Error modifying order: ' . $stmt->error];
        }
    }

    public static function modify_product_api($data)
    {
        $conex = database::connect();
        // Asegúrate de que estás accediendo a los valores correctos
        $productID = $data['productID'];
        $price = $data['price'];
        $name = $data['name'];
        $image = $data['image'];

        // Aquí es donde deberías preparar tu consulta SQL
        $stmt = $conex->prepare("UPDATE products SET name=?, price=?, image=? WHERE product_id=$productID");
        $stmt->bind_param("sds", $name, $price, $image);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Order modified successfully'];
        } else {
            return ['success' => false, 'message' => 'Error modifying order: ' . $stmt->error];
        }
    }

    public static function delete_product_api($product_ID)
    {
        $conex = database::connect();
        // Delete Orders_details
        $stmtOrder_Details = $conex->prepare("DELETE FROM products WHERE product_id = $product_ID");
        $stmtOrder_Details->execute();

        // Delete orders
        $stmtOrder = $conex->prepare("DELETE FROM products WHERE product_id = $product_ID");
        $stmtOrder->execute();

        $conex->close();
        return 'success';
    }

    public static function get_audit_log()
    {
        $conex = database::connect();

        $stmt = $conex->prepare("SELECT * FROM auditoria");
        $stmt->execute();

        $result = $stmt->get_result();

        $auditoria = [];
        while ($row = $result->fetch_assoc()) {
            $auditoria[] = $row;
        }

        $conex->close();

        return $auditoria;
    }

    public static function log_audit_orders($input)
    {
        $conex = Database::connect();

        $operation = $input['operation'];
        $details = $input['details'];
        $user_id = $details['user_id'];
        $user_id = (int)$user_id;

        $detailsJson = json_encode($details, JSON_UNESCAPED_UNICODE);
        $stmt = $conex->prepare("INSERT INTO auditoria (user_id, operation, new_data) VALUES (?, ?, ?)");

        $stmt->bind_param("iss", $user_id, $operation, $detailsJson);

        $stmt->execute();

        $conex->close();

        return 'success';
    }


    public static function log_audit_products($input)
    {
        $conex = Database::connect();

        $operation = $input['operation'];
        $details = $input['details'];
        $user_id = $details['productID'];
        $user_id = (int)$user_id;

        $detailsJson = json_encode($details, JSON_UNESCAPED_UNICODE);
        $stmt = $conex->prepare("INSERT INTO auditoria (user_id, operation, new_data) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $operation, $detailsJson);

        $stmt->execute();

        $conex->close();
        return 'success';
    }

    public static function log_audit_users($input)
    {
        $conex = Database::connect();

        $operation = $input['operation'];
        $details = $input['details'];
        $user_id = $details['user_id'];
        $user_id = (int)$user_id;

        $detailsJson = json_encode($details, JSON_UNESCAPED_UNICODE);
        $stmt = $conex->prepare("INSERT INTO auditoria (user_id, operation, new_data) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $operation, $detailsJson);

        $stmt->execute();


        $conex->close();
        return 'success';
    }
}
