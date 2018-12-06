<?php include("../../../header.php"); ?>

<?php

    redirect_if_not_logged_in();
    redirect_if_not_admin();

    $id = $_GET['id'];
    $sql = "SELECT products.id, products.title, products.description, products.price, products.category_id, categories.title AS category
            FROM products
            LEFT JOIN categories ON products.category_id = categories.id
            WHERE products.id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        ?>
            <h1 class="display-3">Prekė: <?php echo $product['title']; ?></h1>
            <p class="lead">Koks nors paaiškinamasis tekstas.</p>
            <hr class="my-4">

            <p><strong>ID:</strong> <?php echo $product['id']; ?></p>
            <p><strong>Aprašymas:</strong> <?php echo $product['description']; ?></p>
            <p><strong>Kaina:</strong> <?php echo $product['price']; ?> eur</p>
            <p><strong>Kategorija:</strong> <?php echo $product['category']; ?></p>
            <p><a href="index.php" class="btn btn-primary">Grįžti</a></p>
        <?php
    } else {
        header("Location: ../../not-found.php");
    }

?>


<?php include("../../../footer.php"); ?>