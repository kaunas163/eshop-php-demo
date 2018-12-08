<?php

include("../../header.php");
redirect_if_not_logged_in();

?>

<h1 class="display-3">Užsakymo informacija</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<?php

$user_id = $_SESSION['user_id'];
$order_id = $_GET['id'];

$sql = "SELECT id, created, status, address_id, payment_method FROM orders WHERE id=$order_id";
$order = mysqli_fetch_assoc(mysqli_query($conn, $sql));

?>

<div class="row">
    <div class="col">
        <p><strong>ID:</strong> <?php echo $order['id']; ?></p>
        <p><strong>Sukurta:</strong> <?php echo $order['created']; ?></p>
        <p><strong>Būsena:</strong> <?php echo $order['status']; ?></p>
        <p>
            <strong>Pristatymo adresas:</strong>
            <a href="../addresses/view.php?id=<?php echo $order['address_id']; ?>" class="">
                Žiūrėti
            </a>
        </p>
        <p>
            <strong>Mokėjimo būdas:</strong>
            <?php echo payment_method_name($_SESSION['payment_method']); ?>
        </p>
    </div>
</div>

<div class="row">
    <div class="col">
        <h4>Užsakytos prekės</h4>
        
        <?php
            $sql = "SELECT products.id, products.title, products.price
                    FROM products
                    JOIN products_in_orders
                    ON products_id=products.id
                    WHERE orders_id=$order_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
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
                while($product = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $product['id']; ?></th>
                            <td scope="row" style="width: 40%"><?php echo $product["title"]; ?></td>
                            <td scope="row"><?php echo $product["price"]; ?></td>
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
                echo '<div class="row"><p>Nieko nėra.</p></div>';
            }
        ?>
    </div>
</div>

<?php include("../../footer.php"); ?>