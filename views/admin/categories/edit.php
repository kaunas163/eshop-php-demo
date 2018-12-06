<?php include("../../../header.php"); ?>

<?php

redirect_if_not_logged_in();
redirect_if_not_admin($user_data);

$id = $_GET['id'];
$sql = "SELECT title FROM categories WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {
    header("Location: ../../not-found.php");
}

$title = $result->fetch_assoc();

?>

<h1 class="display-3">Redaguoti kategoriją: <?php echo $title['title']; ?></h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<?php

$sql = "SELECT id, title, description, parent_category_id FROM categories WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {
    header("Location: ../../not-found.php");
}

$current = $result->fetch_assoc();

$sql = "SELECT id, title, parent_category_id FROM `categories`";
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
        <label for="parentCategoryId">Tėvinė kategorija kuriai priklauso</label>
        <select class="form-control" id="parentCategoryId" name="parentCategoryIdInput">
            <option value="0" <?php echo ($current['parent_category_id'] == 0 || $current['parent_category_id'] == null) ? "selected" : ""; ?>>---</option>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row['id']; ?>" <?php echo ($current['parent_category_id'] == $row['id']) ? "selected" : ""; ?>>
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