<?php

include("../../../header.php");

$id = $_GET['id'];

$sql = "DELETE FROM `categories` WHERE `id`=$id";
$conn->query($sql);

mysqli_close($conn);
header("Location: index.php");
