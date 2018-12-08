<?php

include("../../header.php");
redirect_if_not_logged_in();

?>

<h1 class="display-3">Redaguoti adresą</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<?php

$id = $_GET['id'];
$sql = "SELECT id, city, postal, country, address_line FROM addresses WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {
    header("Location: ../../not-found.php");
}

$current = $result->fetch_assoc();

?>

<form action="edit_action.php?id=<?php echo $id; ?>" method="POST">
    <div class="form-group">
        <label for="addressLineId">Gatvė ir namo/buto numeris</label>
        <input type="text" class="form-control" id="addressLineId" name="addressLineInput" value="<?php echo $current['address_line']; ?>">
    </div>
    <div class="form-group">
        <label for="cityId">Miestas</label>
        <input type="text" class="form-control" id="cityId" name="cityInput" value="<?php echo $current['city']; ?>">
    </div>
    <div class="form-group">
        <label for="countryId">Šalis</label>
        <input type="text" class="form-control" id="countryId" name="countryInput" value="<?php echo $current['country']; ?>">
    </div>
    <div class="form-group">
        <label for="postalId">Pašto kodas</label>
        <input type="text" class="form-control" id="postalId" name="postalInput" value="<?php echo $current['postal']; ?>">
    </div>
    <button type="submit" class="btn btn-success">Atnaujinti</button>
    <a href="index.php" class="btn btn-secondary">Grįžti</a>
</form>

<?php include("../../footer.php"); ?>