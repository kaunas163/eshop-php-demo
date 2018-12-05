<?php include("../../header.php"); ?>

<h1 class="display-3">Mūsų turimas prekių katalogas</h1>
<p class="lead">Koks nors tekstas apie turimas prekes.</p>
<hr class="my-4">

<?php

    $categoryId = 0;
    $pageHeading = "";

    if (isset($_GET['id'])) {
        $categoryId = $_GET['id'];
    }

    $sql = "SELECT title, parent_category_id FROM categories WHERE id=$categoryId";
    $current = $conn->query($sql);
    $currentCategory = $current->fetch_assoc();

    if ($current->num_rows > 0) {
        if ($categoryId != 0) {
            $pageHeading .= '"' . $currentCategory['title'] . '" subkategorijos:';
        }
    }

    $sql = "SELECT `id`, `title`, `description`, `parent_category_id` FROM `categories` WHERE parent_category_id=$categoryId";
    $result = $conn->query($sql);

?>

<div class="row">
    <div class="col">
        <?php
            if ($current->num_rows > 0) {
                if ($categoryId != 0) {
                    ?>
                        <p>
                            <a href="category.php?id=<?php echo $currentCategory['parent_category_id']; ?>" class="btn btn-primary">Grįžti</a>
                        </p>
                    <?php
                }
            }
        ?>
        <h4>Kategorijos <?php echo $pageHeading; ?></h4>
    </div>
</div>

<div class="row">

<?php

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
                <div class="col-4">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-header">
                            <a href="./category.php?id=<?php echo $row['id']; ?>" class="text-white">
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

<?php

if ($categoryId != 0) {

?>

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
                            <p>Kaina: <?php echo $product['price']; ?> eur</p>
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

<?php

}

?>

<?php include("../../footer.php"); ?>