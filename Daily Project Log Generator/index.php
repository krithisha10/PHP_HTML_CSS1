<?php
date_default_timezone_set("Asia/Kolkata");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>DayLog | Daily Project Log</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="page">

    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="brand-icon">
                DL
            </div>

            <div class="brand-text">

                <strong>DayLog</strong>

                <span>
                    DAILY PROJECT JOURNAL
                </span>

            </div>

        </div>


        <div class="date-display">

            <small>
                TODAY
            </small>

            <strong>
                <?php echo date("d M Y"); ?>
            </strong>

        </div>

    </header>


    <!-- MAIN CONTENT -->

    <main class="main-container">


        <!-- LEFT SIDE -->

        <section class="intro-section">

            <div class="tag">
                ✦ PROJECT DOCUMENTATION
            </div>


            <h1>
                Turn today's work
                <span>into tomorrow's progress.</span>
            </h1>


            <p>
                Record your daily project activities and
                automatically organize them into date-based
                log files.
            </p>


            <!-- TODAY CARD -->

            <div class="today-card">

                <div class="calendar">

                    <div class="month">
                        <?php echo date("M"); ?>
                    </div>

                    <div class="day">
                        <?php echo date("d"); ?>
                    </div>

                    <div class="year">
                        <?php echo date("Y"); ?>
                    </div>

                </div>


                <div class="today-info">

                    <span>
                        TODAY'S LOG
                    </span>

                    <strong>
                        project_log_<?php
                        echo date("d-m-Y");
                        ?>.txt
                    </strong>

                    <small>
                        A new file is generated automatically
                        for each day.
                    </small>

                </div>

            </div>


            <!-- FEATURES -->

            <div class="features">

                <div class="feature">

                    <div class="feature-number">
                        01
                    </div>

                    <strong>
                        Auto Create
                    </strong>

                    <span>
                        Daily log files
                    </span>

                </div>


                <div class="feature">

                    <div class="feature-number">
                        02
                    </div>

                    <strong>
                        Time Stamps
                    </strong>

                    <span>
                        Date & time recorded
                    </span>

                </div>


                <div class="feature">

                    <div class="feature-number">
                        03
                    </div>

                    <strong>
                        File Storage
                    </strong>

                    <span>
                        Organized project logs
                    </span>

                </div>

            </div>

        </section>


        <!-- RIGHT SIDE FORM -->

        <section class="log-card">


            <div class="card-heading">

                <div class="pen-icon">
                    ✎
                </div>

                <div>

                    <span>
                        NEW DAILY ENTRY
                    </span>

                    <h2>
                        Project Log
                    </h2>

                </div>

            </div>


            <form
                action="process.php"
                method="POST"
            >


                <!-- PROJECT NAME -->

                <div class="form-group">

                    <label>
                        Project Name
                    </label>

                    <input
                        type="text"
                        name="project_name"
                        placeholder="Enter project name"
                        required
                    >

                </div>


                <!-- PROGRESS -->

                <div class="form-group">

                    <label>
                        Today's Progress
                    </label>

                    <textarea
                        name="progress"
                        placeholder="Describe what you completed today..."
                        required
                    ></textarea>

                </div>


                <!-- STATUS -->

                <div class="form-group">

                    <label>
                        Project Status
                    </label>

                    <select
                        name="status"
                        required
                    >

                        <option value="">
                            Select current status
                        </option>

                        <option value="Completed">
                            Completed
                        </option>

                        <option value="In Progress">
                            In Progress
                        </option>

                        <option value="Pending">
                            Pending
                        </option>

                        <option value="On Hold">
                            On Hold
                        </option>

                    </select>

                </div>


                <!-- HOURS -->

                <div class="form-group">

                    <label>
                        Hours Worked
                    </label>

                    <input
                        type="number"
                        name="hours"
                        min="0"
                        max="24"
                        placeholder="e.g. 5"
                        required
                    >

                </div>


                <!-- SUBMIT -->

                <button type="submit">

                    Create Today's Log

                    <span>→</span>

                </button>

            </form>


            <!-- NOTE -->

            <div class="automatic-note">

                <span>●</span>

                Date and time will be added
                automatically.

            </div>

        </section>

    </main>


    <!-- FOOTER -->

    <footer>

        <span>
            DayLog
        </span>

        · PHP Daily Project Log Generator

    </footer>

</div>

</body>

</html>