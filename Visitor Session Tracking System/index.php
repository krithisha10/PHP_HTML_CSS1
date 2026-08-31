<?php
session_start();

$currentPage = "Home";

if (!isset($_SESSION["visited_pages"])) {
    $_SESSION["visited_pages"] = [];
}

$_SESSION["visited_pages"][] = $currentPage;

$_SESSION["page_count"] = count($_SESSION["visited_pages"]);

$visitNumber = $_SESSION["page_count"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Visitor Journey | Home</title>

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

    <a class="active" href="index.php">Home</a>

    <a href="about.php">About</a>

    <a href="services.php">Services</a>

    <a href="contact.php">Contact</a>

</nav>


<main>

    <section class="hero">

        <div class="hero-text">

            <span class="eyebrow">
                VISITOR SESSION ANALYTICS
            </span>

            <h1>
                Your digital<br>
                <strong>journey starts here.</strong>
            </h1>

            <p>
                Every page you visit during this browsing
                session is recorded and counted using PHP sessions.
            </p>

            <div class="hero-buttons">

                <a href="about.php" class="primary-btn">
                    Explore Website →
                </a>

                <a href="reset.php" class="secondary-btn">
                    Reset Session
                </a>

            </div>

        </div>


        <div class="counter-card">

            <span>
                PAGES VISITED
            </span>

            <strong>
                <?php echo $visitNumber; ?>
            </strong>

            <small>
                during this session
            </small>

            <div class="counter-line"></div>

            <p>
                Session tracking is currently active.
            </p>

        </div>

    </section>


    <section class="content-grid">

        <div class="info-card">

            <span class="number">
                01
            </span>

            <h3>
                Session Tracking
            </h3>

            <p>
                PHP sessions maintain the visitor's
                browsing information across different pages.
            </p>

        </div>


        <div class="info-card">

            <span class="number">
                02
            </span>

            <h3>
                Page Monitoring
            </h3>

            <p>
                Every page opened by the visitor is
                added to the current session history.
            </p>

        </div>


        <div class="info-card">

            <span class="number">
                03
            </span>

            <h3>
                Visit Counter
            </h3>

            <p>
                The application automatically calculates
                the total number of pages visited.
            </p>

        </div>

    </section>


    <section class="journey">

        <div class="section-heading">

            <div>
                <span>
                    CURRENT SESSION
                </span>

                <h2>
                    Your browsing journey
                </h2>
            </div>

            <div class="count-pill">
                <?php echo $visitNumber; ?> VISITS
            </div>

        </div>


        <div class="timeline">

            <?php

            foreach ($_SESSION["visited_pages"] as $index => $page) {

                echo '<div class="timeline-item">';

                echo '<div class="timeline-number">';
                echo ($index + 1);
                echo '</div>';

                echo '<div class="timeline-content">';

                echo '<strong>';
                echo htmlspecialchars($page);
                echo '</strong>';

                echo '<span>';
                echo 'Page visited during current session';
                echo '</span>';

                echo '</div>';

                echo '</div>';
            }

            ?>

        </div>

    </section>

</main>


<footer>

    <span>
        VISITOR JOURNEY · PHP SESSION TRACKING
    </span>

    <span>
        SESSION BASED PAGE ANALYTICS
    </span>

</footer>

</body>

</html>