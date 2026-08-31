<?php

session_start();


// ==========================================
// IF ALREADY LOGGED IN
// ==========================================

if (
    isset($_SESSION["logged_in"]) &&
    $_SESSION["logged_in"] === true
) {

    header("Location: index.php");

    exit;

}


// ==========================================
// LOGIN PROCESS
// ==========================================

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username =
        trim($_POST["username"] ?? "");

    $password =
        $_POST["password"] ?? "";


    // Demo credentials

    $validUsername = "admin";

    $validPassword = "admin123";


    if (
        $username === $validUsername &&
        $password === $validPassword
    ) {


        // Secure session ID

        session_regenerate_id(true);


        // Session variables

        $_SESSION["logged_in"] = true;

        $_SESSION["username"] =
            $username;


        // ==================================
        // CREATE LOG DIRECTORY
        // ==================================

        if (!is_dir("logs")) {

            mkdir(
                "logs",
                0777,
                true
            );

        }


        // ==================================
        // LOGIN LOG
        // ==================================

        $loginTime =
            date(
                "d-m-Y h:i:s A"
            );


        $loginRecord =
            "User: " .
            $username .
            " | Login: " .
            $loginTime .
            PHP_EOL;


        file_put_contents(
            "logs/login_history.txt",
            $loginRecord,
            FILE_APPEND | LOCK_EX
        );


        // ==================================
        // COOKIE
        // ==================================

        setcookie(
            "logged_user",
            $username,
            time() + (86400 * 30)
        );


        setcookie(
            "login_time",
            $loginTime,
            time() + (86400 * 30)
        );


        header(
            "Location: index.php"
        );

        exit;

    } else {

        $error =
            "Invalid username or password.";

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

    <title>
        Activity Monitor | Login
    </title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body class="login-page">


<div class="login-card">


    <div class="login-mark">
        AM
    </div>


    <span class="login-label">
        ACTIVITY MONITOR
    </span>


    <h1>
        Sign in
    </h1>


    <p>
        Access your user activity dashboard.
    </p>


    <?php if ($error !== ""): ?>

        <div class="error">

            <?php
            echo htmlspecialchars(
                $error
            );
            ?>

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


        <button type="submit">

            Sign in to dashboard

            <span>
                →
            </span>

        </button>


    </form>


    <div class="demo">

        <span>
            DEMO CREDENTIALS
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