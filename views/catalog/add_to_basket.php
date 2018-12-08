<?php

include("../../header.php");

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$product = array(
    'id' => (int)$_GET['id'],
    'title' => $_GET['title'],
    'price' => $_GET['price']
);

array_push($_SESSION['cart'], $product);

include("../../footer.php");

header("Location: ../checkout/index.php");
