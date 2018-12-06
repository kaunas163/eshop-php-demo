<?php

    $basePage = "http://localhost/eshop-demo/";
    require_once("database.php");
    session_start();
    require "functions/general.php";
    require "functions/users.php";
    error_reporting(0);

    if (logged_in() === true)
    {
        $user_data = user_data($conn, $_SESSION['user_id'], 'id', 'username', 'password', 'role');
    }

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo $basePage; ?>assets/css/bootstrap.min.css">
    <title>E-shop</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $basePage; ?>">E-Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $basePage; ?>">Pradžia <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $basePage; ?>views/catalog/category.php">Prekių katalogas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $basePage; ?>views/checkout/index.php">Krepšelis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $basePage; ?>views/admin/index.php">Administravimas</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-sm-2">
                    <?php
                        if(logged_in() === false)
                        {
                            ?>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $basePage; ?>views/users/register.php">Registruotis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $basePage; ?>views/users/login.php">Prisijungti</a>
                                </li>

                            <?php
                        }
                        else
                        {
                            ?>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $basePage; ?>views/users/info.php">Mano profilis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $basePage; ?>views/users/logout.php">Atsijungti</a>
                                </li>

                            <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron">