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

        if (preg_match("/\\s/", $_POST['inputUsername']) == true) {
            $errors[] = "Vartotojo varde negali būti tarpų.";
        }

        if (strlen($_POST['inputPassword']) < 5) {
            $errors[] = "Slaptažodis turi būti ilgesnis nei 5 simboliai.";
        }

        if ($_POST['inputPassword'] !== $_POST['inputConfirmPassword']) {
            $errors[] = "Slaptažodžiai nesutampa.";
        }
    }
}

if (empty($_POST) === false && empty($errors) === true) {
    $register_data = array(
        'username' => $_POST['inputUsername'],
        'password' => $_POST['inputPassword']
    );
    register_user($conn, $register_data);
    header("Location: register.php?success");
    exit();
}

?>

<h1 class="display-3">Registracija</h1>
<p class="lead">Koks nors trumpas paaiškinamasis tekstas.</p>
<hr class="my-4">

<?php

if (empty($errors) === false)
{
    ?>
        <div class="row">
            <div class="col text-danger">
                <?php
                    foreach ($errors as $error) {
                        echo "<p>$error</p>";
                    }
                ?>
            </div>
        </div>
    <?php
}

if (isset($_GET['success']) && empty($_GET['success']))
{
    ?>
        <div class="row">
            <div class="col text-success">
                <p>Vartotojas užregistruotas sėkmingai.</p>
                <p><a href="login.php" class="btn btn-primary">Prisijungti</a></p>
            </div>
        </div>
    <?php
}
else
{
    ?>
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
    <?php
}

include("../../footer.php");
