<?php

function payment_method_name($name) {
    switch ($_SESSION['payment_method']) {
        case "cash":
            return "Grynaisiais";
            break;
        case "bank":
            return "Banko pavedimu";
            break;
        case "card":
            return "Mokėjimo kortele";
            break;
        default:
            return "";
            break;
    }
}