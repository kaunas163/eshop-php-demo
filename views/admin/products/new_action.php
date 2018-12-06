<?php

include("../../../header.php");

redirect_if_not_logged_in();

if (empty($_POST) === false) {
    $title = $_POST['titleInput'];
    $description = $_POST['descriptionInput'];
    $price = $_POST['priceInput'];
    $categoryId = $_POST['categoryIdInput'];

    if (empty($title)) {
        echo "<p>Pavadinimas neįvestas</p>";
    }
    else {
        $sql = "INSERT INTO products (title, description, price, category_id) VALUES ('$title', '$description', $price, $categoryId)";
        $conn->query($sql);
        header("Location: index.php");
    }
}

include("../../../footer.php");