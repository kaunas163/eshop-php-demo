<?php

include("../../header.php");

redirect_if_not_logged_in();

if (empty($_POST) === false) {
    $address = $_POST['addressLineInput'];
    $city = $_POST['cityInput'];
    $country = $_POST['countryInput'];
    $postal = $_POST['postalInput'];
    $user = $_SESSION['user_id'];

    if (empty($address) || empty($city) || empty($country) || empty($postal) || empty($user)) {
        echo "<p>Nesuvesti visi reikiami duomenys</p>";
    }
    else {
        $sql = "INSERT INTO addresses (address_line, city, country, postal, user_id) VALUES ('$address', '$city', '$country', '$postal', $user)";
        $conn->query($sql);
        header("Location: index.php");
    }
}

include("../../footer.php");