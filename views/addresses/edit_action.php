<?php

include("../../header.php");

redirect_if_not_logged_in();

if (empty($_POST) === false) {
    $id = (int)$_GET['id'];

    if (empty($id)) {
        header("Location: ../../not-found.php");
    }

    $address = $_POST['addressLineInput'];
    $city = $_POST['cityInput'];
    $country = $_POST['countryInput'];
    $postal = $_POST['postalInput'];

    if (empty($address) || empty($city) || empty($country) || empty($postal)) {
        echo "<p>Nesuvesti visi reikiami duomenys</p>";
    }
    else {
        $sql = "UPDATE addresses
                SET address_line='$address',
                    city='$city',
                    country='$country',
                    postal='$postal'
                WHERE id=$id";
        $conn->query($sql);
        header("Location: index.php");
    }
}

include("../../footer.php");