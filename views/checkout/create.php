<?php

include("../../header.php");

$date = new DateTime("NOW");
$formattedDate = $date->format("Y-m-d H:i:s");
$status = "new";
$address = $_SESSION['address_id'];
$payment = $_SESSION['payment_method'];
$user = $_SESSION['user_id'];
$products = $_SESSION['cart'];

$sql = "INSERT INTO orders (created, status, address_id, payment_method, user_id)
    VALUES ('$formattedDate', '$status', $address, '$payment', $user)";

if (mysqli_query($conn, $sql)) {
    $orderId = (int)mysqli_insert_id($conn);
    $sql = "INSERT INTO products_in_orders (products_id, orders_id) VALUES";
    $productsCount = count($products);
    for ($i = 0; $i < $productsCount; $i++) {
        $productId = $products[$i]['id'];
        $sql .= " ($productId, $orderId)";
        if ($i + 1 < $productsCount) {
            $sql .= ",";
        }
    }
    $conn->query($sql);
}

include("../../footer.php");
