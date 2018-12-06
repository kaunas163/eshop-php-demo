<?php include("../../../header.php"); ?>

<?php

$id = $_GET['id'];
$sql = "SELECT title FROM products WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {
    header("Location: ../../not-found.php");
}

$title = $result->fetch_assoc();

?>

<h1 class="display-3">Redaguoti prekę: <?php echo $title['title']; ?></h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<?php

$sql = "SELECT id, title, description, price, category_id FROM products WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {
    header("Location: ../../not-found.php");
}

$current = $result->fetch_assoc();

$sql = "SELECT id, title FROM categories";
$result = $conn->query($sql);

?>

<form action="edit_action.php?id=<?php echo $id; ?>" method="POST">
    <div class="form-group">
        <label for="titleId">Pavadinimas</label>
        <input type="text" class="form-control" id="titleId" name="titleInput" value="<?php echo $current['title']; ?>">
    </div>
    <div class="form-group">
        <label for="descriptionId">Aprašymas</label>
        <textarea class="form-control" id="descriptionId" name="descriptionInput" rows="3"><?php echo $current['description']; ?></textarea>
    </div>
    <div class="form-group">
        <label for="priceId">Kaina</label>
        <input type="number" min="0" class="form-control" id="priceId" name="priceInput" value="<?php echo $current['price']; ?>">
    </div>
    <div class="form-group">
        <label for="categoryId">Kategorija kuriai priklauso</label>
        <select class="form-control" id="categoryId" name="categoryIdInput">
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row['id']; ?>" <?php echo ($current['category_id'] == $row['id']) ? "selected" : ""; ?>>
                                <?php echo $row['title']; ?>
                            </option>
                        <?php
                    }
                }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Atnaujinti</button>
    <a href="index.php" class="btn btn-secondary">Grįžti</a>
</form>

<?php include("../../../footer.php"); ?>