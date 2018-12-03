<?php

include("../../../header.php");

if (empty($_POST) === false) {
    $id = (int)$_GET['id'];

    if (empty($id)) {
        header("Location: ../../not-found.php");
    }

    $title = $_POST['titleInput'];
    $description = $_POST['descriptionInput'];
    $parentCategoryId = $_POST['parentCategoryIdInput'];

    if (empty($title)) {
        echo "<p>Pavadinimas neįvestas</p>";
    }
    else {
        $sql = "INSERT INTO categories (title, description, parent_category_id) VALUES ('$title', '$description', $parentCategoryId)";
        $sql = "UPDATE categories
                SET title='$title',
                    description='$description',
                    parent_category_id=$parentCategoryId
                WHERE id=$id";
        $conn->query($sql);
        header("Location: index.php");
    }
}

include("../../../footer.php");