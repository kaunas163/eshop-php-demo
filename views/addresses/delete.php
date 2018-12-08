<?php

include("../../header.php");
redirect_if_not_logged_in();

$id = $_GET['id'];
$sql = "SELECT id, city, postal, country, address_line FROM addresses WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: ../../not-found.php");
}

$row = $result->fetch_assoc();

$fullAddress =  $row["address_line"] . ", " . $row['city'] . ", " . $row['country'] . ", " . $row['postal'];

?>

<h1 class="display-3">Adreso šalinimas</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<p>Ar tikrai norite šalinti "<?php echo $fullAddress; ?>" adresą?</p>

<p>
    <a href="delete_action.php?id=<?php echo $id; ?>" class="btn btn-primary">Taip</a>
    <a href="index.php" class="btn btn-secondary">Ne</a>
</p>

<?php include("../../footer.php"); ?>