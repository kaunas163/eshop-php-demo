<?php include("../../../header.php"); ?>

<h1 class="display-3">Prekių kategorijos</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">
<p>
    <a href="new.php" class="btn btn-success">Nauja</a>
</p>

<?php

$sql = "SELECT `id`, `title`, `description`, `parent_category_id` FROM `categories`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col" style="width: 60%">Kategorija</th>
                <th scope="col">Veiksmai</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row["title"]; ?></td>
                <td>
                    <a href="view.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Peržiūrėti</a>
                    <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-warning">Atnaujinti</a>
                    <a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Šalinti</a>
                </td>
            </tr>
        <?php
    }
    ?>
        </tbody>
    </table>
    <?php
} else {
    echo '<div class="row"><p>Nieko nėra.</p></div>';
}

?>

<?php include("../../../footer.php"); ?>