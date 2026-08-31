<?php

session_start();

$currentPage = "Services";

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

    <title>Visitor Journey | Services</title>

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

    <a href="about.php">About</a>

    <a class="active" href="services.php">Services</a>

    <a href="contact.php">Contact</a>

</nav>


<main>

    <section class="page-banner">

        <span>
            PAGE 03
        </span>

        <h1>
            Our services
        </h1>

        <p>
            Another page visit has been added to
            your active browsing session.
        </p>

    </section>


    <section class="service-grid">

        <div class="service-card">

            <span>01</span>

            <h3>
                Session Management
            </h3>

            <p>
                Maintains visitor information throughout
                the browsing session.
            </p>

        </div>


        <div class="service-card">

            <span>02</span>

            <h3>
                Page Tracking
            </h3>

            <p>
                Records every page visited by the
                current visitor.
            </p>

        </div>


        <div class="service-card">

            <span>03</span>

            <h3>
                Visit Analytics
            </h3>

            <p>
                Calculates the number of pages visited
                during the current session.
            </p>

        </div>

    </section>


    <div class="session-summary">

        <span>
            CURRENT PAGE COUNT
        </span>

        <strong>
            <?php
            echo $_SESSION["page_count"];
            ?>
        </strong>

        <p>
            pages visited in your current session
        </p>

    </div>

</main>


<footer>

    VISITOR JOURNEY · SESSION TRACKING

</footer>

</body>

</html>