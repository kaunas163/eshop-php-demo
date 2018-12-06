<?php

include '../../header.php';

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

if (empty($errors) === false)
{
    ?>
    
    <h1 class="display-3">Atsiprašome, tačiau įvyko klaida.</h1>
    <p class="lead">Koks nors trumpas paaiškinamasis tekstas.</p>
    <hr class="my-4">
    <p><?php echo $errors[0]; ?></p>
    <br><a href="login.php" class="btn btn-success">Bandyti dar kartą</a>
    
    <?php
}
else
{
    header("Location: info.php");
}

include '../../footer.php';