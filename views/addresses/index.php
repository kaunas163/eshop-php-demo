<?php include("../../header.php"); ?>

<?php redirect_if_not_logged_in(); ?>

<h1 class="display-3">Vartotojo adresai</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">
<p>
    <a href="new.php" class="btn btn-success">Naujas adresas</a>
</p>

<?php

$user_id = $_SESSION['user_id'];

$sql = "SELECT id, city, postal, country, address_line FROM addresses WHERE user_id=$user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col" style="width: 60%">Adresas</th>
                <th scope="col">Veiksmai</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td scope="row">
                    <?php
                        echo $row["address_line"] . ", "
                            . $row['city'] . ", "
                            . $row['country'] . ", "
                            . $row['postal'];
                    ?>
                </td>
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

<?php include("../../footer.php"); ?>