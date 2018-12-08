<?php

include("../../header.php");
$_SESSION['address_id'] = $_GET['address_id'];

?>

<h1 class="display-3">Pasirinkite mokėjimo būdą</h1>
<p class="lead">Koks nors paaiškinamasis tekstas.</p>
<hr class="my-4">

<div class="row">
    <div class="col-4">
        <div class="card bg-light mb-3">
            <div class="card-body">
                <p class="card-text">
                    <a href="confirm.php?payment_method=cash">Grynaisiais</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card bg-light mb-3">
            <div class="card-body">
                <p class="card-text">
                    <a href="confirm.php?payment_method=bank">Banko pavedimu</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card bg-light mb-3">
            <div class="card-body">
                <p class="card-text">
                    <a href="confirm.php?payment_method=card">Mokėjimo kortele</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php

include("../../footer.php");
