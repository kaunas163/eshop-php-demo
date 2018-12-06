<?php include("../../header.php"); ?>

<h1 class="display-3">Prisijungimas</h1>
<p class="lead">Koks nors trumpas paaiškinamasis tekstas.</p>
<hr class="my-4">

<form action="login_action.php" method="POST">
    <div class="form-group">
        <label for="inputUsername">Prisijungimo vardas</label>
        <input type="text" class="form-control" id="inputUsername" name="inputUsername">
    </div>
    <div class="form-group">
        <label for="inputPassword">Slaptažodis</label>
        <input type="password" class="form-control" id="inputPassword" name="inputPassword">
    </div>
    <button type="submit" class="btn btn-primary">Prisijungti</button>
</form>

<?php include("../../footer.php"); ?>