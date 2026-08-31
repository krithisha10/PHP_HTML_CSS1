<?php

session_start();


// Remove session variables

$_SESSION = [];


// Destroy session

session_destroy();


// Prevent browser caching

header("Cache-Control: no-store, no-cache, must-revalidate");

header("Pragma: no-cache");


// Redirect to login

header("Location: index.php");

exit;

?>