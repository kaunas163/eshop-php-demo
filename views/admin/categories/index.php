<?php include("../../../header.php"); ?>

<?php

redirect_if_not_logged_in();
redirect_if_not_admin($user_data);

?>

<h1 class="display-3">Prekių kategorijos</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">
<p>
    <a href="../index.php" class="btn btn-primary">Atgal į administravimą</a>
    <a href="new.php" class="btn btn-success">Nauja kategorija</a>
</p>

<?php

$sql = "SELECT `id`, `title`, `description`, `parent_category_id` FROM `categories`";

// $sql = "SELECT t1.name AS lev1, t2.name as lev2, t3.name as lev3, t4.name as lev4
//         FROM categories AS t1
//         LEFT JOIN categories AS t2 ON t2.parent_category_id = t1.id
//         LEFT JOIN categories AS t3 ON t3.parent_category_id = t2.id
//         LEFT JOIN categories AS t4 ON t4.parent_category_id = t3.id
//         WHERE t1.title = 'kompiuteriai';";

// $sql = "SELECT t1.id, t1.title AS lev1, t2.id, t2.title as lev2, t3.id, t3.title as lev3, t4.id, t4.title as lev4
//         FROM categories AS t1
//         LEFT JOIN categories AS t2 ON t2.parent_category_id = t1.id
//         LEFT JOIN categories AS t3 ON t3.parent_category_id = t2.id
//         LEFT JOIN categories AS t4 ON t4.parent_category_id = t3.id";

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
                <td scope="row"><?php echo $row["title"]; ?></td>
                <td scope="row">
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