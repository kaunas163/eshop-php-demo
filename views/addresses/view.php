<?php

include("../../header.php");
redirect_if_not_logged_in();

$id = $_GET['id'];
$sql = "SELECT id, city, postal, country, address_line FROM addresses WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $address = $result->fetch_assoc();
    ?>
        <h1 class="display-3">Vartotojo adreso informacija</h1>
        <p class="lead">Koks nors paaiškinamasis tekstas.</p>
        <hr class="my-4">

        <p><strong>ID:</strong> <?php echo $address['id']; ?></p>
        <p><strong>Gatvė ir buto/namo numeris:</strong> <?php echo $address['address_line']; ?></p>
        <p><strong>Miestas</strong> <?php echo $address['city']; ?></p>
        <p><strong>Šalis</strong> <?php echo $address['country']; ?></p>
        <p><strong>Pašto kodas</strong> <?php echo $address['postal']; ?></p>

        <p><a href="index.php" class="btn btn-primary">Grįžti</a></p>
    <?php
} else {
    header("Location: ../../not-found.php");
}

include("../../footer.php");
