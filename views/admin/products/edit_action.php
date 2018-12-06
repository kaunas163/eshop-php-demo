<?php

include("../../../header.php");

redirect_if_not_logged_in();
redirect_if_not_admin();

if (empty($_POST) === false) {
    $id = (int)$_GET['id'];

    if (empty($id)) {
        header("Location: ../../not-found.php");
    }

    $title = $_POST['titleInput'];
    $description = $_POST['descriptionInput'];
    $price = $_POST['priceInput'];
    $categoryId = $_POST['categoryIdInput'];

    if (empty($title)) {
        echo "<p>Pavadinimas neįvestas</p>";
    }
    else {
        $sql = "UPDATE products
                SET title='$title',
                    description='$description',
                    price=$price,
                    category_id=$categoryId
                WHERE id=$id";
        $conn->query($sql);
        header("Location: index.php");
    }
}

include("../../../footer.php");