<?php

include("../../../header.php");

redirect_if_not_logged_in();
redirect_if_not_admin();

$id = $_GET['id'];

$sql = "DELETE FROM `categories` WHERE `id`=$id";
$conn->query($sql);

mysqli_close($conn);
header("Location: index.php");
