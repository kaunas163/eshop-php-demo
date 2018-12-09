<?php

function payment_method_name($name) {
    switch ($name) {
        case "cash":
            return "Grynaisiais";
        case "bank":
            return "Banko pavedimu";
        case "card":
            return "Mokėjimo kortele";
        default:
            return "";
    }
}