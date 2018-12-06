<?php

include("../../header.php");

if (empty($_POST) === false)
{
    $required_fields = [
        'inputUsername',
        'inputPassword',
        'inputConfirmPassword'
    ];
    
    foreach ($_POST as $key => $value)
    {
        if (empty($value) && in_array($key, $required_fields) === true)
        {
            $errors[] = "Visi laukeliai yra privalomi.";
            break 1;
        }
    }
    
    if (empty($errors) === true)
    {
        if (user_exists($conn, $_POST['inputUsername']) === true) {
            $errors[] = "Toks vartotojas jau yra.";
        }

        if (strlen($_POST['inputPassword']) < 6) {
            $errors[] = "Slaptažodis turi būti ilgesnis nei 6 simboliai.";
        }

        if ($_POST['inputPassword'] !== $_POST['inputConfirmPassword']) {
            $errors[] = "Slaptažodžiai nesutampa.";
        }
    }
}

?>

<h1 class="display-3">Registracija</h1>
<p class="lead">Koks nors trumpas paaiškinamasis tekstas.</p>
<hr class="my-4">

<div class="row">
    <div class="col text-danger">
        <?php
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
        ?>
    </div>
</div>

<form action="register.php" method="POST">
    <div class="form-group">
        <label for="inputUsername">Prisijungimo vardas</label>
        <input type="text" class="form-control" id="inputUsername" name="inputUsername">
    </div>
    <div class="form-group">
        <label for="inputPassword">Slaptažodis</label>
        <input type="password" class="form-control" id="inputPassword" name="inputPassword">
    </div>
    <div class="form-group">
        <label for="inputConfirmPassword">Pakartoti slaptažodį</label>
        <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword">
    </div>
    <button type="submit" class="btn btn-primary">Registruotis</button>
</form>

<?php include("../../footer.php"); ?>