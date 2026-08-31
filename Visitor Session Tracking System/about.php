<?php

session_start();

$currentPage = "About";

if (!isset($_SESSION["visited_pages"])) {

    $_SESSION["visited_pages"] = [];

}

$_SESSION["visited_pages"][] = $currentPage;

$_SESSION["page_count"] =
    count($_SESSION["visited_pages"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Visitor Journey | About</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <div class="brand">

        <div class="brand-icon">
            VJ
        </div>

        <div>
            <h2>Visitor Journey</h2>
            <span>SESSION TRACKING SYSTEM</span>
        </div>

    </div>

    <div class="session-badge">
        SESSION ACTIVE
    </div>

</header>


<nav>

    <a href="index.php">Home</a>

    <a class="active" href="about.php">About</a>

    <a href="services.php">Services</a>

    <a href="contact.php">Contact</a>

</nav>


<main>

    <section class="page-banner">

        <span>
            PAGE 02
        </span>

        <h1>
            About the system
        </h1>

        <p>
            This page has been recorded as part of
            your current browsing session.
        </p>

    </section>


    <section class="single-content">

        <div class="large-icon">
            02
        </div>

        <div>

            <span class="eyebrow">
                SESSION ACTIVITY
            </span>

            <h2>
                Your visit has been tracked.
            </h2>

            <p>
                PHP session variables allow the application
                to maintain information about your browsing
                activity while you move between pages.
            </p>

            <div class="visit-result">

                <strong>
                    <?php
                    echo $_SESSION["page_count"];
                    ?>
                </strong>

                <span>
                    total pages visited in this session
                </span>

            </div>

        </div>

    </section>

</main>


<footer>

    VISITOR JOURNEY · SESSION TRACKING

</footer>

</body>

</html>