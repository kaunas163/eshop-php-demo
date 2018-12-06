<?php include("../../../header.php"); ?>

<?php redirect_if_not_logged_in(); ?>

<h1 class="display-3">Nauja prekių kategorija</h1>
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
        <label for="parentCategoryId">Tėvinė kategorija kuriai priklauso</label>
        <select class="form-control" id="parentCategoryId" name="parentCategoryIdInput">
            <option value="0">---</option>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row['id']; ?>">
                                <?php echo $row['title']; ?>
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