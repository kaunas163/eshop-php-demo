<?php include("../../../header.php"); ?>

<?php

$id = $_GET['id'];
$sql = "SELECT `title` FROM `categories` WHERE `id`=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: ../../not-found.php");
}

$row = $result->fetch_assoc();

?>

<h1 class="display-3">Prekių kategorija: <?php echo $row['title']; ?></h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<p>Ar tikrai norite šalinti "<?php echo $row['title']; ?>" kategoriją?</p>

<p>
    <a href="delete_action.php?id=<?php echo $id; ?>" class="btn btn-primary">Taip</a>
    <a href="index.php" class="btn btn-secondary">Ne</a>
</p>

<?php include("../../../footer.php"); ?>