<?php include("../../header.php"); ?>

<?php

    $id = 0;
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $sql = "SELECT id, title, description, price, category_id FROM products WHERE id=$id";
    $results = $conn->query($sql);
    $product = $results->fetch_assoc();

    $productCategoryId = $product['category_id'];

    $sql = "SELECT title FROM categories WHERE id=$productCategoryId";
    $results = $conn->query($sql);
    $category = $results->fetch_assoc();

    if ($results->num_rows == 0) {
        header("Location: ../not-found.php");
    }

?>

<h1 class="display-3">Prekė: <?php echo $product['title']; ?></h1>
<p class="lead">Koks nors trumpas aprašymas.</p>
<hr class="my-4">

<div class="row">
    <div class="col">
        <p>
            <strong>ID:</strong>
            <?php echo $product['id']; ?>
        </p>
        <p>
            <strong>Aprašymas:</strong>
            <?php echo $product['description']; ?>
        </p>
        <p>
            <strong>Kaina: </strong>
            <?php echo $product['price']; ?> eur.
        </p>
        <p>
            <strong>Priklauso kategorijai:</strong>
            <a href="category.php?id=<?php echo $product['category_id']; ?>"><?php echo $category['title']; ?></a>
        </p>
    </div>
</div>

<?php include("../../footer.php"); ?>