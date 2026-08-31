<?php
session_start();

$error = "";

if (isset($_GET["error"])) {
    $error = "Invalid username or password. Please try again.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ExamSecure | Student Login</title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="login-page">

<div class="login-container">

    <div class="login-info">

        <div class="exam-logo">
            EX
        </div>

        <span class="portal-label">
            SECURE EXAMINATION PORTAL
        </span>

        <h1>
            Your exam.<br>
            <strong>Your opportunity.</strong>
        </h1>

        <p>
            Access your examination securely using
            authenticated sessions and protected access controls.
        </p>

        <div class="security-list">

            <div>
                <span>✓</span>
                Session Authentication
            </div>

            <div>
                <span>✓</span>
                Secure Cookie Management
            </div>

            <div>
                <span>✓</span>
                Protected Examination Access
            </div>

        </div>

    </div>


    <div class="login-box">

        <span class="login-label">
            STUDENT ACCESS
        </span>

        <h2>
            Sign in to your exam
        </h2>

        <p class="login-description">
            Enter your examination credentials to continue.
        </p>


        <?php if ($error != "") { ?>

            <div class="error-message">
                <?php echo $error; ?>
            </div>

        <?php } ?>


        <form action="process.php"
              method="POST">

            <div class="input-group">

                <label>
                    Student Username
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
                Access Examination
                <span>→</span>
            </button>

        </form>


        <div class="demo-login">

            <span>DEMO CREDENTIALS</span>

            <p>
                Username:
                <strong>student</strong>
            </p>

            <p>
                Password:
                <strong>exam123</strong>
            </p>

        </div>

    </div>

</div>

</body>
</html>