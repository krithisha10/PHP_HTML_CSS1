<?php

session_start();


// ==========================================
// AUTHENTICATION CHECK
// ==========================================

if (
    !isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true
) {

    header("Location: index.php");

    exit;
}


$username =
    $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Dashboard | Campus Portal
    </title>

    <link rel="stylesheet"
          href="style.css">

</head>


<body class="dashboard-body">


<header class="dashboard-header">

    <div class="dashboard-logo">

        <div class="logo-small">
            CP
        </div>

        <div>

            <strong>
                Campus Portal
            </strong>

            <span>
                STUDENT DASHBOARD
            </span>

        </div>

    </div>


    <a href="logout.php"
       class="logout-btn">

        Logout

    </a>

</header>



<main class="dashboard">


    <section class="welcome-card">

        <div>

            <span class="dashboard-label">
                AUTHENTICATION SUCCESSFUL
            </span>

            <h1>
                Hello,
                <?php
                echo htmlspecialchars($username);
                ?> 👋
            </h1>

            <p>
                You have been successfully authenticated
                and redirected to your dashboard.
            </p>

        </div>


        <div class="success-circle">
            ✓
        </div>

    </section>



    <section class="dashboard-grid">


        <div class="info-card">

            <div class="card-number">
                01
            </div>

            <h3>
                Authentication
            </h3>

            <p>
                Your login credentials were verified
                successfully.
            </p>

        </div>


        <div class="info-card">

            <div class="card-number">
                02
            </div>

            <h3>
                HTTP Redirection
            </h3>

            <p>
                The Location HTTP header redirected
                you to this dashboard.
            </p>

        </div>


        <div class="info-card">

            <div class="card-number">
                03
            </div>

            <h3>
                Active Session
            </h3>

            <p>
                Your authenticated session is currently
                active.
            </p>

        </div>


    </section>


    <section class="technical-card">

        <span>
            PHP IMPLEMENTATION
        </span>

        <h2>
            How the redirection works
        </h2>

        <div class="code-display">

            <span>
                Authentication successful
            </span>

            <strong>
                ↓
            </strong>

            <span>
                Session created
            </span>

            <strong>
                ↓
            </strong>

            <span>
                HTTP Location Header
            </span>

            <strong>
                ↓
            </strong>

            <span>
                dashboard.php
            </span>

        </div>

    </section>


</main>


<footer>

    PHP Web Development · Login Redirection

</footer>


</body>
</html>