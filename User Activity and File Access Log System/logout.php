<?php

session_start();


// ==========================================
// LOGOUT TIME
// ==========================================

if (
    isset($_SESSION["username"])
) {

    if (!is_dir("logs")) {

        mkdir(
            "logs",
            0777,
            true
        );

    }


    $logoutRecord =
        "User: " .
        $_SESSION["username"] .
        " | Logout: " .
        date(
            "d-m-Y h:i:s A"
        ) .
        PHP_EOL;


    file_put_contents(
        "logs/login_history.txt",
        $logoutRecord,
        FILE_APPEND | LOCK_EX
    );

}


// ==========================================
// CLEAR SESSION
// ==========================================

$_SESSION = [];

session_destroy();


// ==========================================
// CLEAR COOKIES
// ==========================================

setcookie(
    "logged_user",
    "",
    time() - 3600
);

setcookie(
    "login_time",
    "",
    time() - 3600
);

setcookie(
    "last_visit",
    "",
    time() - 3600
);


// ==========================================
// REDIRECT
// ==========================================

header(
    "Location: process.php"
);

exit;

?>