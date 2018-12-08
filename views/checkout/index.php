<?php include("../../header.php"); ?>

<?php redirect_if_not_logged_in(); ?>

<h1 class="display-3">Prekių krepšelis</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<div class="row">
    <div class="col">
        <h4>Pasirinktos prekės</h4>
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

    if (!empty($_SESSION['cart'])) {
        ?>
            <div class="row">
                <div class="col">
                    <p><a href="address.php" class="btn btn-primary">Pristatymo adresas ></a></p>
                </div>
            </div>
        <?php
    }

?>

<?php include("../../footer.php"); ?>
