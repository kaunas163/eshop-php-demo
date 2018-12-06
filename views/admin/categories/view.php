<?php include("../../../header.php"); ?>

<?php

    redirect_if_not_logged_in();
    redirect_if_not_admin($user_data);

    $id = $_GET['id'];
    $sql = "SELECT `id`, `title`, `description`, `parent_category_id` FROM `categories` WHERE `id`=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $category = $result->fetch_assoc();
        ?>
            <h1 class="display-3">Prekių kategorija: <?php echo $category['title']; ?></h1>
            <p class="lead">Koks nors paaiškinamasis tekstas.</p>
            <hr class="my-4">

            <p><strong>ID:</strong> <?php echo $category['id']; ?></p>
            <p><strong>Aprašymas:</strong> <?php echo $category['description']; ?></p>

            <?php

            if (!(empty($category['parent_category_id']) || $category['parent_category_id'] == 0)) {
                $parentId = $category['parent_category_id'];
                $sql = "SELECT title FROM categories WHERE id=$parentId";
                $parentResults = $conn->query($sql);
    
                if ($parentResults->num_rows > 0) {
                    $parent = $parentResults->fetch_assoc();
                    ?>
                        <p><strong>Tėvinė kategorija kuriai priklauso:</strong> <?php echo $parent['title']; ?></p>
                    <?php
                }
            }

            ?>

            <p><a href="index.php" class="btn btn-primary">Grįžti</a></p>
        <?php
    } else {
        header("Location: ../../not-found.php");
    }

?>


<?php include("../../../footer.php"); ?>