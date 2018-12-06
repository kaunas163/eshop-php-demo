<?php include("../../../header.php"); ?>

<?php redirect_if_not_logged_in(); ?>

<h1 class="display-3">Turimos prekės</h1>
<p class="lead">Koks nors trumpas aprašymas.</p>
<hr class="my-4">
<p>
    <a href="../index.php" class="btn btn-primary">Atgal į administravimą</a>
    <a href="new.php" class="btn btn-success">Nauja prekė</a>
</p>

<?php

$sql = "SELECT products.id, products.title, products.description, products.price, products.category_id, categories.title AS category
        FROM products
        LEFT JOIN categories ON products.category_id = categories.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Pavadinimas</th>
                <th scope="col">Kaina, eur</th>
                <th scope="col">Kategorija</th>
                <th scope="col">Veiksmai</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while($product = $result->fetch_assoc()) {
        ?>
            <tr>
                <th scope="row"><?php echo $product['id']; ?></th>
                <td scope="row" style="width: 40%"><?php echo $product["title"]; ?></td>
                <td scope="row"><?php echo $product["price"]; ?></td>
                <td scope="row"><?php echo $product["category"]; ?></td>
                <td scope="row">
                    <a href="view.php?id=<?php echo $product["id"]; ?>" class="btn btn-primary">Peržiūrėti</a>
                    <a href="edit.php?id=<?php echo $product["id"]; ?>" class="btn btn-warning">Atnaujinti</a>
                    <a href="delete.php?id=<?php echo $product["id"]; ?>" class="btn btn-danger">Šalinti</a>
                </td>
            </tr>
        <?php
    }
    ?>
        </tbody>
    </table>
    <?php
} else {
    echo '<div class="row"><p>Nieko nėra.</p></div>';
}

?>

<?php include("../../../footer.php"); ?>