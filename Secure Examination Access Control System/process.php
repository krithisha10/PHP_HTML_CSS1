<?php

session_start();


// ==========================================
// CHECK REQUEST
// ==========================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit;
}


// ==========================================
// GET INPUT
// ==========================================

$username = trim($_POST["username"] ?? "");

$password = $_POST["password"] ?? "";


// ==========================================
// VALID CREDENTIALS
// ==========================================

$validUsername = "student";

$validPassword = "exam123";


// ==========================================
// AUTHENTICATION
// ==========================================

if (
    $username === $validUsername &&
    $password === $validPassword
) {

    // Create a fresh session ID

    session_regenerate_id(true);


    // Store authentication information

    $_SESSION["authenticated"] = true;

    $_SESSION["student_username"] = $username;

    $_SESSION["exam_access"] = true;


    // ======================================
    // COOKIE MANAGEMENT
    // ======================================

    setcookie(
        "student_name",
        $username,
        time() + 3600,
        "/",
        "",
        false,
        true
    );


    // Store login timestamp

    $_SESSION["login_time"] =
        date("d-m-Y h:i:s A");


    // ======================================
    // HTTP HEADER REDIRECTION
    // ======================================

    header("Location: exam.php");

    exit;

}


// ==========================================
// INVALID LOGIN
// ==========================================

header("Location: index.php?error=1");

exit;

?>