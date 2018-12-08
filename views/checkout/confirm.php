<?php

include("../../header.php");
$_SESSION['payment_method'] = $_GET['payment_method'];

?>

<h1 class="display-3">Užsakymo detalės</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<div class="row">
    <div class="col">
        <h4>Prekės</h4>
        <?php

            if (count($_SESSION['cart']) > 0) {
                ?>
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Pavadinimas</th>
                            <th scope="col">Kaina, eur</th>
                            <th scope="col">Veiksmai</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach ($_SESSION['cart'] as $product) {
                        echo "<tr>";
                            foreach ($product as $key => $value) {
                                ?>
                                    <th scope="row"><?php echo $value; ?></th>
                                <?php
                            }
                            ?>
                                <td scope="row">
                                    <a href="../catalog/product.php?id=<?php echo $product["id"]; ?>" class="btn btn-primary">Peržiūrėti</a>
                                </td>
                            </tr>
                        <?php
                    }
                ?>
                    </tbody>
                </table>
                <?php
            } else {
                ?>
                    <p>Vis dar nieko nepridėta</p>
                    <p>
                        <a href="../catalog/category.php" class="btn btn-primary">Žiūrėti katalogą</a>
                    </p>
                <?php
            }

        ?>
    </div>
</div>

<?php

$addressId = $_SESSION['address_id'];
$sql = "SELECT id, city, postal, country, address_line FROM addresses WHERE id=$addressId";
$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
$fullAddress = $result["address_line"] . ", " . $result['city'] . ", " . $result['country'] . ", " . $result['postal'];

?>

<div class="row">
    <div class="col">
        <h4>Pristatymo adresas</h4>
        <p><?php echo $fullAddress; ?></p>
    </div>
</div>

<div class="row">
    <div class="col">
        <h4>Mokėjimo būdas</h4>
        <p>
            <?php
                switch ($_SESSION['payment_method']) {
                    case "cash":
                        echo "Grynaisiais";
                        break;
                    case "bank":
                        echo "Banko pavedimu";
                        break;
                    case "card":
                        echo "Mokėjimo kortele";
                        break;
                }
            ?>
        </p>
    </div>
</div>

<div class="row">
    <div class="col">
        <a href="create.php" class="btn btn-primary">Sukurti užsakymą</a>
    </div>
</div>

<?php

include("../../footer.php");
