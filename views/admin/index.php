<?php include("../../header.php"); ?>

<?php

redirect_if_not_logged_in();
redirect_if_not_admin($user_data);

?>

<h1 class="display-3">Administravimas</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<a href="categories/index.php" class="btn btn-primary">Kategorijos</a>
<a href="products/index.php" class="btn btn-primary">Prekės</a>

<?php include("../../footer.php"); ?>