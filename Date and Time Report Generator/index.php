<?php
date_default_timezone_set("Asia/Kolkata");

$currentDate = date("d M Y");
$currentTime = date("h:i:s A");
$currentDay = date("l");
$currentMonth = date("F");
$currentYear = date("Y");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TimeStudio | Date & Time Reports</title>

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
                <span>DATE & TIME REPORTS</span>
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
                <strong>System Active</strong>
                <small>PHP Date Engine</small>
            </div>

        </div>

    </aside>


    <!-- MAIN -->

    <main class="main">

        <!-- TOP BAR -->

        <header class="topbar">

            <div>

                <span class="eyebrow">
                    DASHBOARD / DATE REPORT
                </span>

                <h1>
                    Date & Time Report
                </h1>

            </div>

            <div class="top-date">

                <span>INDIA STANDARD TIME</span>

                <strong>
                    <?php echo date("D, d M Y"); ?>
                </strong>

            </div>

        </header>


        <!-- CURRENT TIME -->

        <section class="hero-card">

            <div class="hero-info">

                <span class="hero-label">
                    CURRENT DATE & TIME
                </span>

                <div class="live-time">
                    <?php echo date("h:i:s"); ?>
                    <small><?php echo date("A"); ?></small>
                </div>

                <p>
                    <?php echo date("l, d F Y"); ?>
                </p>

            </div>


            <div class="clock-symbol">
                ◷
            </div>

        </section>


        <!-- SUMMARY CARDS -->

        <section class="stats-grid">

            <div class="stat-card">

                <div class="stat-icon">
                    D
                </div>

                <span>DATE</span>

                <h3>
                    <?php echo date("d M Y"); ?>
                </h3>

                <p>Short date format</p>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    T
                </div>

                <span>TIME</span>

                <h3>
                    <?php echo date("h:i A"); ?>
                </h3>

                <p>12-hour format</p>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    W
                </div>

                <span>WEEKDAY</span>

                <h3>
                    <?php echo date("l"); ?>
                </h3>

                <p>Current day</p>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    Y
                </div>

                <span>YEAR</span>

                <h3>
                    <?php echo date("Y"); ?>
                </h3>

                <p>Current year</p>

            </div>

        </section>


        <!-- REPORT GENERATOR -->

        <section class="content-grid">

            <div class="format-card">

                <div class="section-heading">

                    <div>

                        <span>
                            CUSTOM REPORT
                        </span>

                        <h2>
                            Generate a Date Report
                        </h2>

                    </div>

                    <div class="heading-icon">
                        +
                    </div>

                </div>


                <p class="description">
                    Select your preferred date and time
                    format to generate a customized report.
                </p>


                <form action="process.php" method="POST">


                    <!-- DATE FORMAT -->

                    <div class="form-group">

                        <label>
                            DATE FORMAT
                        </label>

                        <select name="date_format" required>

                            <option value="d-m-Y">
                                DD-MM-YYYY
                            </option>

                            <option value="d/m/Y">
                                DD/MM/YYYY
                            </option>

                            <option value="d M Y">
                                DD Mon YYYY
                            </option>

                            <option value="l, d F Y">
                                Day, DD Month YYYY
                            </option>

                            <option value="Y-m-d">
                                YYYY-MM-DD
                            </option>

                        </select>

                    </div>


                    <!-- TIME FORMAT -->

                    <div class="form-group">

                        <label>
                            TIME FORMAT
                        </label>

                        <select name="time_format" required>

                            <option value="h:i:s A">
                                12-Hour with Seconds
                            </option>

                            <option value="h:i A">
                                12-Hour
                            </option>

                            <option value="H:i:s">
                                24-Hour with Seconds
                            </option>

                            <option value="H:i">
                                24-Hour
                            </option>

                        </select>

                    </div>


                    <button type="submit">
                        Generate Report
                        <span>→</span>
                    </button>

                </form>

            </div>


            <!-- FORMAT INFORMATION -->

            <div class="info-card">

                <span class="info-label">
                    AVAILABLE FORMATS
                </span>

                <h2>
                    PHP Date Formats
                </h2>

                <div class="format-row">

                    <div>
                        <strong>d-m-Y</strong>
                        <small>31-08-2026</small>
                    </div>

                    <span>Date</span>

                </div>


                <div class="format-row">

                    <div>
                        <strong>d M Y</strong>
                        <small>31 Aug 2026</small>
                    </div>

                    <span>Date</span>

                </div>


                <div class="format-row">

                    <div>
                        <strong>h:i:s A</strong>
                        <small>09:30:25 AM</small>
                    </div>

                    <span>Time</span>

                </div>


                <div class="format-row">

                    <div>
                        <strong>H:i:s</strong>
                        <small>09:30:25</small>
                    </div>

                    <span>24-Hour</span>

                </div>

            </div>

        </section>


        <!-- FOOTER -->

        <footer>

            <span>
                TIMESTUDIO · PHP DATE & TIME REPORT GENERATOR
            </span>

            <span>
                TIMEZONE: ASIA/KOLKATA
            </span>

        </footer>

    </main>

</div>

</body>
</html>