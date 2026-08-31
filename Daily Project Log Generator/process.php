<?php

session_start();

date_default_timezone_set("Asia/Kolkata");


/* =========================================
   GET FORM DATA
========================================= */

$project_name = trim($_POST["project_name"] ?? "");

$progress = trim($_POST["progress"] ?? "");

$status = trim($_POST["status"] ?? "");

$hours = trim($_POST["hours"] ?? "");


/* =========================================
   VALIDATE INPUT
========================================= */

if (
    $project_name == "" ||
    $progress == "" ||
    $status == "" ||
    $hours == ""
) {
    die("Please fill in all the required fields.");
}


/* =========================================
   CREATE LOG DIRECTORY
========================================= */

$log_directory = "logs/";

if (!is_dir($log_directory)) {

    mkdir($log_directory, 0777, true);

}


/* =========================================
   DATE AND TIME
========================================= */

$today = date("d-m-Y");

$display_date = date("d M Y");

$current_time = date("h:i A");


/* =========================================
   AUTOMATIC DAILY FILE NAME
========================================= */

$filename =
    $log_directory .
    "project_log_" .
    $today .
    ".txt";


/* =========================================
   CREATE LOG ENTRY
========================================= */

$log_content =
    "========================================" . PHP_EOL .
    "          DAILY PROJECT LOG" . PHP_EOL .
    "========================================" . PHP_EOL .
    "Project Name : " . $project_name . PHP_EOL .
    "Date         : " . $display_date . PHP_EOL .
    "Time         : " . $current_time . PHP_EOL .
    "Status       : " . $status . PHP_EOL .
    "Hours Worked : " . $hours . " hours" . PHP_EOL .
    "----------------------------------------" . PHP_EOL .
    "Progress:" . PHP_EOL .
    $progress . PHP_EOL .
    "========================================" . PHP_EOL .
    PHP_EOL;


/* =========================================
   APPEND ENTRY TO TODAY'S FILE
========================================= */

if (
    file_put_contents(
        $filename,
        $log_content,
        FILE_APPEND | LOCK_EX
    ) === false
) {
    die("Unable to create or update the project log file.");
}


/* =========================================
   SESSION VARIABLES
========================================= */

$_SESSION["project_name"] = $project_name;

$_SESSION["log_file"] = $filename;

$_SESSION["log_time"] = $current_time;


/* =========================================
   READ UPDATED FILE
========================================= */

$file_content = file_get_contents($filename);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Log Created | DayLog</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

<div class="result-page">


    <!-- =================================
         RESULT HEADER
    ================================== -->

    <header class="result-top">

        <div class="brand">

            <div class="brand-icon">
                DL
            </div>

            <div class="brand-text">

                <strong>
                    DayLog
                </strong>

                <span>
                    DAILY PROJECT JOURNAL
                </span>

            </div>

        </div>


        <a href="index.php">
            + New Entry
        </a>

    </header>



    <!-- =================================
         RESULT CONTENT
    ================================== -->

    <main class="result-main">


        <!-- SUCCESS MESSAGE -->

        <section class="success-section">

            <div class="success-icon">
                ✓
            </div>


            <span>
                DAILY LOG CREATED
            </span>


            <h1>

                Today's progress is
                <strong>saved.</strong>

            </h1>


            <p>

                Your project information has been
                successfully stored in today's
                automatically generated log file.

            </p>

        </section>



        <!-- =================================
             GENERATED FILE
        ================================== -->

        <section class="file-banner">


            <div class="file-symbol">
                TXT
            </div>


            <div>

                <small>
                    GENERATED FILE
                </small>

                <strong>

                    <?php
                    echo htmlspecialchars($filename);
                    ?>

                </strong>

            </div>


            <div class="file-date">

                <small>
                    CREATED AT
                </small>

                <strong>

                    <?php
                    echo htmlspecialchars($current_time);
                    ?>

                </strong>

            </div>


        </section>



        <!-- =================================
             RESULT GRID
        ================================== -->

        <section class="result-grid">


            <!-- PROJECT DETAILS -->

            <div class="details-card">


                <span class="section-label">
                    PROJECT DETAILS
                </span>


                <h2>

                    <?php
                    echo htmlspecialchars(
                        $project_name
                    );
                    ?>

                </h2>


                <div class="detail">

                    <span>
                        DATE
                    </span>

                    <strong>

                        <?php
                        echo htmlspecialchars(
                            $display_date
                        );
                        ?>

                    </strong>

                </div>


                <div class="detail">

                    <span>
                        TIME
                    </span>

                    <strong>

                        <?php
                        echo htmlspecialchars(
                            $current_time
                        );
                        ?>

                    </strong>

                </div>


                <div class="detail">

                    <span>
                        STATUS
                    </span>

                    <strong class="status">

                        <?php
                        echo htmlspecialchars(
                            $status
                        );
                        ?>

                    </strong>

                </div>


                <div class="detail">

                    <span>
                        HOURS WORKED
                    </span>

                    <strong>

                        <?php
                        echo htmlspecialchars(
                            $hours
                        );
                        ?>

                        hours

                    </strong>

                </div>


            </div>



            <!-- =================================
                 FILE PREVIEW
            ================================== -->

            <div class="preview-card">


                <div class="preview-header">

                    <span>
                        FILE PREVIEW
                    </span>


                    <span class="live">
                        ● SAVED
                    </span>

                </div>


                <pre><?php
                    echo htmlspecialchars(
                        $file_content
                    );
                ?></pre>


            </div>


        </section>



        <!-- =================================
             BOTTOM ACTION
        ================================== -->

        <div class="bottom">


            <div>

                <span class="green-dot"></span>

                Log stored successfully

            </div>


            <a href="index.php">
                Create Another Log →
            </a>


        </div>


    </main>

</div>

</body>

</html>