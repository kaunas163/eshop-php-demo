<?php include("../../../header.php"); ?>

<?php

    $id = $_GET['id'];
    $sql = "SELECT `id`, `title`, `description`, `parent_category_id` FROM `categories` WHERE `id`=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $results = $result->fetch_assoc();
        ?>
            <h1 class="display-3">Prekių kategorija: <?php echo $results['title']; ?></h1>
            <p class="lead">Koks nors paaiškinamasis tekstas.</p>
            <hr class="my-4">

            <p><strong>ID:</strong> <?php echo $results['id']; ?></p>
            <p><strong>Aprašymas:</strong> <?php echo $results['description']; ?></p>
            <p><strong>Tėvinė kategorija kuriai priklauso:</strong> <?php echo $results['parent_category_id']; ?></p>

            <p><a href="index.php" class="btn btn-primary">Grįžti</a></p>
        <?php
    } else {
        header("Location: ../../not-found.php");
    }

?>


<?php include("../../../footer.php"); ?>