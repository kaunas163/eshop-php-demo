<?php include("../../header.php"); ?>

<?php redirect_if_not_logged_in(); ?>

<h1 class="display-3">Vartotojo "<?php echo $user_data['username']; ?>" informacija</h1>
<p class="lead">Koks nors trumpas paaiškinamasis tekstas.</p>
<hr class="my-4">

<div class="row">
    <div class="col">
        <a href="../addresses/index.php" class="btn btn-primary">Adresai</a>
        <a href="../orders/index.php" class="btn btn-primary">Užsakymai</a>
    </div>
</div>

<?php include("../../footer.php"); ?>
