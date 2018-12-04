<?php include("../../header.php"); ?>

<h1 class="display-3">Mūsų turimas prekių katalogas</h1>
<p class="lead">Koks nors tekstas apie turimas prekes.</p>
<hr class="my-4">

<div class="row">
    <div class="col">
        <h4>Kategorijos</h4>
    </div>
</div>

<div class="row">

<?php

    $categoryId = 0;

    if (isset($_GET['id'])) {
        $categoryId = $_GET['id'];
    }

    $sql = "SELECT `id`, `title`, `description`, `parent_category_id` FROM `categories` WHERE parent_category_id=$categoryId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if ($categoryId != 0) {
            ?>
                <div class="col-12">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <p class="card-text">Subkategorijos</p>
                        </div>
                    </div>
                </div>
            <?php
        }
        while($row = $result->fetch_assoc()) {
            ?>
                <div class="col-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <a href="./category.php?id=<?php echo $row['id']; ?>">
                                <?php echo $row["title"]; ?>
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $row["description"]; ?></p>
                        </div>
                    </div>
                </div>
            <?php
        }
    } else {
        echo '<div class="col"><p>Nieko nėra.</p></div>';
    }

?>

</div>

<div class="row">
    <div class="col">
        <h4>Prekės</h4>
    </div>
</div>

<div class="row">

<?php

$sql = "SELECT id, title, description, price FROM products WHERE category_id=$categoryId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($product = $result->fetch_assoc()) {
        ?>
            <div class="col-4">
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <a href="./product.php?id=<?php echo $product['id']; ?>">
                            <?php echo $product["title"]; ?>
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $product["description"]; ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <p>Kaina: <?php echo $product['price']; ?></p>
                    </div>
                </div>
            </div>
        <?php
    }
} else {
    echo '<div class="col"><p>Nieko nėra.</p></div>';
}

?>

</div>

<?php include("../../footer.php"); ?>