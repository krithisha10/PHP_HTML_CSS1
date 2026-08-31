<?php

session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    // Demo credentials
    $validUsername = "admin";
    $validPassword = "admin123";

    if (
        $username === $validUsername &&
        $password === $validPassword
    ) {

        session_regenerate_id(true);

        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $username;

        header("Location: index.php");
        exit;

    } else {

        $message = "Invalid username or password.";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>SecureVault | Login</title>

    <link rel="stylesheet" href="style.css">

</head>

<body class="login-page">

<div class="login-card">

    <div class="vault-logo">
        🔐
    </div>

    <span class="login-label">
        SECURE DOCUMENT PORTAL
    </span>

    <h1>
        Welcome back
    </h1>

    <p class="login-description">
        Sign in to access your protected documents.
    </p>


    <?php if ($message !== ""): ?>

        <div class="login-error">
            <?php echo htmlspecialchars($message); ?>
        </div>

    <?php endif; ?>


    <form method="POST">

        <label>
            Username
        </label>

        <input
            type="text"
            name="username"
            placeholder="Enter username"
            required
        >


        <label>
            Password
        </label>

        <input
            type="password"
            name="password"
            placeholder="Enter password"
            required
        >


        <button
            type="submit"
            class="login-button"
        >
            Access Secure Vault →
        </button>

    </form>


    <div class="demo-login">

        <span>
            DEMO ACCESS
        </span>

        <p>
            Username: <strong>admin</strong>
        </p>

        <p>
            Password: <strong>admin123</strong>
        </p>

    </div>

</div>

</body>

</html>