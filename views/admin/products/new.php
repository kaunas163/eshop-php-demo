<?php include("../../../header.php"); ?>

<?php redirect_if_not_logged_in(); ?>

<h1 class="display-3">Nauja prekė</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<?php

$sql = "SELECT `id`, `title` FROM `categories`";
$result = $conn->query($sql);

?>

<form action="new_action.php" method="POST">
    <div class="form-group">
        <label for="titleId">Pavadinimas</label>
        <input type="text" class="form-control" id="titleId" name="titleInput">
    </div>
    <div class="form-group">
        <label for="descriptionId">Aprašymas</label>
        <textarea class="form-control" id="descriptionId" name="descriptionInput" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="priceId">Kaina, eur</label>
        <input type="number" min="0" class="form-control" id="priceId" name="priceInput">
    </div>
    <div class="form-group">
        <label for="parentCategoryId">Kategorija kuriai priklauso</label>
        <select class="form-control" id="parentCategoryId" name="categoryIdInput">
            <?php
                if ($result->num_rows > 0) {
                    while($category = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $category['id']; ?>">
                                <?php echo $category['title']; ?>
                            </option>
                        <?php
                    }
                }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Sukurti</button>
    <a href="index.php" class="btn btn-secondary">Grįžti</a>
</form>

<?php include("../../../footer.php"); ?>