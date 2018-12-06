<?php include("../../../header.php"); ?>

<?php

redirect_if_not_logged_in();

$id = $_GET['id'];
$sql = "SELECT title FROM products WHERE `id`=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: ../../not-found.php");
}

$row = $result->fetch_assoc();

?>

<h1 class="display-3">Prekė: <?php echo $row['title']; ?></h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<p>Ar tikrai norite šalinti "<?php echo $row['title']; ?>" prekę?</p>

<p>
    <a href="delete_action.php?id=<?php echo $id; ?>" class="btn btn-primary">Taip</a>
    <a href="index.php" class="btn btn-secondary">Ne</a>
</p>

<?php include("../../../footer.php"); ?>