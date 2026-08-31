<?php

session_start();


// Remove session variables

$_SESSION = [];


// Destroy session

session_destroy();


// Remove authentication cookie

setcookie(
    "student_name",
    "",
    time() - 3600,
    "/"
);


// Redirect to login

header("Location: index.php");

exit;

?>