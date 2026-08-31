<?php

session_start();

$currentPage = "Contact";

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

    <title>Visitor Journey | Contact</title>

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

    <a href="services.php">Services</a>

    <a class="active" href="contact.php">Contact</a>

</nav>


<main>

    <section class="page-banner">

        <span>
            PAGE 04
        </span>

        <h1>
            Contact page
        </h1>

        <p>
            Your session has successfully recorded
            another page visit.
        </p>

    </section>


    <section class="contact-card">

        <div>

            <span class="eyebrow">
                SESSION SUMMARY
            </span>

            <h2>
                Browsing session completed.
            </h2>

            <p>
                You have explored multiple pages.
                The session counter has been updated automatically.
            </p>

        </div>


        <div class="big-count">

            <strong>
                <?php
                echo $_SESSION["page_count"];
                ?>
            </strong>

            <span>
                PAGES VISITED
            </span>

        </div>

    </section>


    <div class="contact-info">

        <div>
            <strong>Email</strong>
            <span>support@visitorjourney.test</span>
        </div>

        <div>
            <strong>System</strong>
            <span>PHP Session Tracking</span>
        </div>

    </div>

</main>


<footer>

    VISITOR JOURNEY · SESSION TRACKING

</footer>

</body>

</html>