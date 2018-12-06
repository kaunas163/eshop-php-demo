<?php

include("../../header.php");

$errors = [];

if (empty($_POST) === false)
{
    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];
    
    if (empty($username) || empty($password))
    {
        $errors[] = 'Reikia įvesti vartotojo vardą ir slaptažodį.';
    }
    else if (user_exists($conn, $username) === false)
    {
        $errors[] = 'Blogi prisijungimo duomenys.';
    }
    else
    {
        $login = login($conn, $username, $password);
        
        if($login === false)
        {
            $errors[] = "Blogi prisijungimo duomenys";
        }
        else {
            $_SESSION['user_id'] = $login;
            header('Location: ' . $base_page);
            exit();
        }
    }
}

?>

<h1 class="display-3">Prisijungimas</h1>
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

<form action="login.php" method="POST">
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