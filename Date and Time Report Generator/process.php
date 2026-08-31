<?php

date_default_timezone_set("Asia/Kolkata");


// ========================================
// GET FORM VALUES
// ========================================

$date_format = $_POST["date_format"] ?? "d-m-Y";

$time_format = $_POST["time_format"] ?? "h:i:s A";


// ========================================
// ALLOWED FORMATS
// ========================================

$allowed_date_formats = [
    "d-m-Y",
    "d/m/Y",
    "d M Y",
    "l, d F Y",
    "Y-m-d"
];

$allowed_time_formats = [
    "h:i:s A",
    "h:i A",
    "H:i:s",
    "H:i"
];


// ========================================
// VALIDATE FORMATS
// ========================================

if (!in_array($date_format, $allowed_date_formats)) {
    $date_format = "d-m-Y";
}

if (!in_array($time_format, $allowed_time_formats)) {
    $time_format = "h:i:s A";
}


// ========================================
// GENERATE REPORT
// ========================================

$current_date = date($date_format);

$current_time = date($time_format);

$full_date = date("l, d F Y");

$day = date("l");

$month = date("F");

$year = date("Y");

$week = date("W");

$day_of_year = date("z") + 1;

$timestamp = time();

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
        TimeStudio | Generated Report
    </title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

<div class="app">


    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                ◷
            </div>

            <div>

                <h2>TimeStudio</h2>

                <span>
                    DATE & TIME REPORTS
                </span>

            </div>

        </div>


        <div class="sidebar-content">

            <div class="side-label">
                REPORT CENTER
            </div>

            <div class="side-item active">
                <span>◫</span>
                Date & Time
            </div>

            <div class="side-item">
                <span>◷</span>
                Live Clock
            </div>

            <div class="side-item">
                <span>▤</span>
                Formats
            </div>

        </div>


        <div class="sidebar-footer">

            <div class="status-dot"></div>

            <div>

                <strong>
                    Report Ready
                </strong>

                <small>
                    PHP Date Engine
                </small>

            </div>

        </div>

    </aside>



    <!-- MAIN -->

    <main class="main">


        <!-- TOPBAR -->

        <header class="topbar">

            <div>

                <span class="eyebrow">
                    DASHBOARD / GENERATED REPORT
                </span>

                <h1>
                    Customized Report
                </h1>

            </div>

            <div class="top-date">

                <span>
                    REPORT GENERATED
                </span>

                <strong>
                    <?php echo date("d M Y, h:i A"); ?>
                </strong>

            </div>

        </header>



        <!-- RESULT HERO -->

        <section class="hero-card">

            <div class="hero-info">

                <span class="hero-label">
                    GENERATED DATE & TIME
                </span>

                <div class="live-time">

                    <?php
                    echo htmlspecialchars($current_time);
                    ?>

                </div>

                <p>

                    <?php
                    echo htmlspecialchars($current_date);
                    ?>

                </p>

            </div>


            <div class="clock-symbol">
                ✓
            </div>

        </section>



        <!-- REPORT DETAILS -->

        <section class="stats-grid">


            <div class="stat-card">

                <div class="stat-icon">
                    D
                </div>

                <span>
                    SELECTED DATE
                </span>

                <h3>
                    <?php
                    echo htmlspecialchars($current_date);
                    ?>
                </h3>

                <p>
                    Custom date format
                </p>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    T
                </div>

                <span>
                    SELECTED TIME
                </span>

                <h3>
                    <?php
                    echo htmlspecialchars($current_time);
                    ?>
                </h3>

                <p>
                    Custom time format
                </p>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    W
                </div>

                <span>
                    WEEK
                </span>

                <h3>
                    <?php
                    echo "Week " . $week;
                    ?>
                </h3>

                <p>
                    Current calendar week
                </p>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    Y
                </div>

                <span>
                    YEAR
                </span>

                <h3>
                    <?php echo $year; ?>
                </h3>

                <p>
                    Current calendar year
                </p>

            </div>


        </section>



        <!-- REPORT CONTENT -->

        <section class="content-grid">


            <!-- GENERATED REPORT -->

            <div class="format-card">

                <div class="section-heading">

                    <div>

                        <span>
                            DATE & TIME REPORT
                        </span>

                        <h2>
                            Report Summary
                        </h2>

                    </div>

                    <div class="heading-icon">
                        ✓
                    </div>

                </div>


                <p class="description">

                    The following information was
                    generated using PHP date and time
                    functions.

                </p>


                <div class="format-row">

                    <div>

                        <strong>
                            Full Date
                        </strong>

                        <small>
                            <?php
                            echo htmlspecialchars($full_date);
                            ?>
                        </small>

                    </div>

                    <span>
                        DATE
                    </span>

                </div>


                <div class="format-row">

                    <div>

                        <strong>
                            Day
                        </strong>

                        <small>
                            <?php
                            echo htmlspecialchars($day);
                            ?>
                        </small>

                    </div>

                    <span>
                        DAY
                    </span>

                </div>


                <div class="format-row">

                    <div>

                        <strong>
                            Month
                        </strong>

                        <small>
                            <?php
                            echo htmlspecialchars($month);
                            ?>
                        </small>

                    </div>

                    <span>
                        MONTH
                    </span>

                </div>


                <div class="format-row">

                    <div>

                        <strong>
                            Day of Year
                        </strong>

                        <small>
                            <?php
                            echo $day_of_year;
                            ?>
                        </small>

                    </div>

                    <span>
                        NUMBER
                    </span>

                </div>


                <form action="index.php" method="GET">

                    <button type="submit">

                        Create Another Report

                        <span>→</span>

                    </button>

                </form>

            </div>



            <!-- FORMAT DETAILS -->

            <div class="info-card">

                <span class="info-label">
                    FORMAT DETAILS
                </span>

                <h2>
                    Selected Formats
                </h2>


                <div class="format-row">

                    <div>

                        <strong>
                            Date Format
                        </strong>

                        <small>
                            <?php
                            echo htmlspecialchars($date_format);
                            ?>
                        </small>

                    </div>

                    <span>
                        DATE
                    </span>

                </div>


                <div class="format-row">

                    <div>

                        <strong>
                            Time Format
                        </strong>

                        <small>
                            <?php
                            echo htmlspecialchars($time_format);
                            ?>
                        </small>

                    </div>

                    <span>
                        TIME
                    </span>

                </div>


                <div class="format-row">

                    <div>

                        <strong>
                            Timestamp
                        </strong>

                        <small>
                            <?php
                            echo $timestamp;
                            ?>
                        </small>

                    </div>

                    <span>
                        PHP
                    </span>

                </div>


                <div class="format-row">

                    <div>

                        <strong>
                            Timezone
                        </strong>

                        <small>
                            Asia/Kolkata
                        </small>

                    </div>

                    <span>
                        IST
                    </span>

                </div>

            </div>


        </section>



        <!-- FOOTER -->

        <footer>

            <span>
                TIMESTUDIO · PHP DATE & TIME REPORT GENERATOR
            </span>

            <span>
                REPORT GENERATED SUCCESSFULLY
            </span>

        </footer>


    </main>

</div>

</body>

</html>