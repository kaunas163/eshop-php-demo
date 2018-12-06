<?php include("../../header.php"); ?>

<?php

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
            
        }
    }

?>

<h1 class="display-3">Registracija</h1>
<p class="lead">Koks nors trumpas paaiškinamasis tekstas.</p>
<hr class="my-4">

<form action="" method="POST" role="form">
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