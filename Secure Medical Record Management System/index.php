<?php
session_start();

if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if (isset($_GET["error"])) {
    $error = "Invalid username or password.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MedVault | Secure Login</title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="login-page">

<div class="login-wrapper">

    <section class="login-intro">

        <div class="medical-logo">
            +
        </div>

        <span class="label">
            MEDVAULT · SECURE RECORDS
        </span>

        <h1>
            Medical records,<br>
            <strong>protected.</strong>
        </h1>

        <p>
            A secure PHP-based medical record management
            system designed to protect sensitive patient information.
        </p>

        <div class="security-points">

            <div>
                <span>✓</span>
                Session-based authentication
            </div>

            <div>
                <span>✓</span>
                Protected medical files
            </div>

            <div>
                <span>✓</span>
                Authorized record access
            </div>

        </div>

    </section>


    <section class="login-card">

        <span class="label">
            AUTHORIZED ACCESS
        </span>

        <h2>
            Sign in
        </h2>

        <p class="description">
            Enter your credentials to access medical records.
        </p>


        <?php if ($error != "") { ?>

            <div class="error">
                <?php echo $error; ?>
            </div>

        <?php } ?>


        <form action="process.php" method="POST">

            <div class="input-group">

                <label>
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    placeholder="Enter username"
                    required
                >

            </div>


            <div class="input-group">

                <label>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >

            </div>


            <button type="submit">
                Secure Login →
            </button>

        </form>


        <div class="demo">

            <span>DEMO ACCOUNT</span>

            <p>
                Username:
                <strong>doctor</strong>
            </p>

            <p>
                Password:
                <strong>med123</strong>
            </p>

        </div>

    </section>

</div>

</body>
</html>