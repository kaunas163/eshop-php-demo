<?php

include("../../../header.php");

redirect_if_not_logged_in();
redirect_if_not_admin();

if (empty($_POST) === false) {
    $title = $_POST['titleInput'];
    $description = $_POST['descriptionInput'];
    $parentCategoryId = $_POST['parentCategoryIdInput'];

    if (empty($title)) {
        echo "<p>Pavadinimas neįvestas</p>";
    }
    else {
        $sql = "INSERT INTO categories (title, description, parent_category_id) VALUES ('$title', '$description', $parentCategoryId)";
        $conn->query($sql);
        header("Location: index.php");
    }
}

include("../../../footer.php");