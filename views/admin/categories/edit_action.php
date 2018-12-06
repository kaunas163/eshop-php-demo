<?php

include("../../../header.php");

redirect_if_not_logged_in();

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