<?php include("../../header.php"); ?>

<?php redirect_if_not_logged_in(); ?>

<h1 class="display-3">Naujas adresas</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<form action="new_action.php" method="POST">
    <div class="form-group">
        <label for="addressLineId">Gatvė ir namo/buto numeris</label>
        <input type="text" class="form-control" id="addressLineId" name="addressLineInput">
    </div>
    <div class="form-group">
        <label for="cityId">Miestas</label>
        <input type="text" class="form-control" id="cityId" name="cityInput">
    </div>
    <div class="form-group">
        <label for="countryId">Šalis</label>
        <input type="text" class="form-control" id="countryId" name="countryInput">
    </div>
    <div class="form-group">
        <label for="postalId">Pašto kodas</label>
        <input type="text" class="form-control" id="postalId" name="postalInput">
    </div>
    <button type="submit" class="btn btn-success">Sukurti</button>
    <a href="index.php" class="btn btn-secondary">Grįžti</a>
</form>

<?php include("../../footer.php"); ?>