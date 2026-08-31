<?php

session_start();


// ==========================================
// CHECK FORM SUBMISSION
// ==========================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit;
}


// ==========================================
// GET USER INPUT
// ==========================================

$username =
    trim($_POST["username"] ?? "");

$password =
    $_POST["password"] ?? "";


// ==========================================
// DEMO CREDENTIALS
// ==========================================

$validUsername = "admin";

$validPassword = "admin123";


// ==========================================
// AUTHENTICATION
// ==========================================

if (
    $username === $validUsername &&
    $password === $validPassword
) {

    // Create a new session ID
    // for better security

    session_regenerate_id(true);


    // Store login information

    $_SESSION["logged_in"] = true;

    $_SESSION["username"] = $username;


    // ======================================
    // HTTP HEADER REDIRECTION
    // ======================================

    header(
        "Location: dashboard.php"
    );

    exit;

}


// ==========================================
// INVALID LOGIN
// ==========================================

header(
    "Location: index.php?error=1"
);

exit;

?>