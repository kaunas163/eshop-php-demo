<?php

include("../../header.php");
redirect_if_not_logged_in();

?>

<h1 class="display-3">Sukurti užsakymai</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<?php

$user_id = $_SESSION['user_id'];

$sql = "SELECT id, created, status FROM orders WHERE user_id=$user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col" style="width: 60%">Sukūrimo data</th>
                <th scope="col">Būsena</th>
                <th scope="col">Veiksmai</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td scope="row"><?php echo $row['created']; ?></td>
                <td scope="row"><?php echo $row['status']; ?></td>
                <td scope="row">
                    <a href="view.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Peržiūrėti</a>
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