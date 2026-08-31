<?php

session_start();


/*
    Destroy shopping session
*/

session_unset();

session_destroy();


/*
    Keep shopping_user cookie
    so the browser remembers
    the user name.
*/

header("Location: index.php");

exit();

?>