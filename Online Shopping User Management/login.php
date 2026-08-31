<?php

session_start();


/*
    Get username from form
*/

$username = trim($_POST["username"]);


/*
    Create user session
*/

$_SESSION["username"] = $username;

$_SESSION["logged_in"] = true;


/*
    Create shopping cart
    if it doesn't already exist
*/

if (!isset($_SESSION["cart"])) {

    $_SESSION["cart"] = [];

}


/*
    Create browsing history
    if it doesn't already exist
*/

if (!isset($_SESSION["history"])) {

    $_SESSION["history"] = [];

}


/*
    Store username using cookie
    for 30 days
*/

setcookie(
    "shopping_user",
    $username,
    time() + (30 * 24 * 60 * 60),
    "/"
);


/*
    Store last visit time
*/

setcookie(
    "last_visit",
    date("d M Y, h:i A"),
    time() + (30 * 24 * 60 * 60),
    "/"
);


header("Location: shop.php");

exit();

?>