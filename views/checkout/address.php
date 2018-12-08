<?php include("../../header.php"); ?>

<h1 class="display-3">Pasirinkite pristatymo adresą</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<p>
    <a href="../addresses./new.php" class="btn btn-success">Naujas adresas</a>
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
                    <a href="payment.php?address_id=<?php echo $row["id"]; ?>" class="btn btn-primary">Pasirinkti</a>
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
