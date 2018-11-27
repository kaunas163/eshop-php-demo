<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "eshop-demo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Prisijungti nepavyko: " . mysqli_connect_error());
}

// echo "Prisijungti pavyko";