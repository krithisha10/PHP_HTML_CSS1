<?php

session_start();


// Destroy current session

session_unset();

session_destroy();


// Start a fresh session

session_start();


// Redirect to home page

header("Location: index.php");

exit;

?>