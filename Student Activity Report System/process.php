<?php

session_start();

date_default_timezone_set("Asia/Kolkata");


/*
    Get form values
*/

$student_name = trim($_POST["student_name"]);

$activity = trim($_POST["activity"]);

$activity_type = $_POST["activity_type"];

$activity_date = $_POST["activity_date"];


/*
    Convert date into
    readable format
*/

$formatted_date = date(
    "d M Y",
    strtotime($activity_date)
);


/*
    Current date and time
*/

$recorded_at = date(
    "d M Y, h:i A"
);


/*
    Store student name
    in session
*/

$_SESSION["student_name"] = $student_name;


/*
    Create activity record
*/

$record = [
    "student" => $student_name,
    "activity" => $activity,
    "type" => $activity_type,
    "date" => $formatted_date,
    "recorded_at" => $recorded_at
];


/*
    Store activity in session
*/

$_SESSION["student_activities"][] = $record;


/*
    Store activity in text file
*/

$file = "activities.txt";


$file_data =
    $student_name . "|" .
    $activity . "|" .
    $activity_type . "|" .
    $formatted_date . "|" .
    $recorded_at . PHP_EOL;


file_put_contents(
    $file,
    $file_data,
    FILE_APPEND | LOCK_EX
);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Activity Saved | CampusChronicle</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="result-page">

    <div class="result-card">

        <div class="success">
            ✓
        </div>

        <span class="success-label">
            ACTIVITY RECORDED
        </span>

        <h1>
            Nice work,
            <span>
                <?php
                echo htmlspecialchars($student_name);
                ?>
            </span>
        </h1>

        <p>
            Your student activity has been successfully
            stored in the activity file and session.
        </p>


        <div class="record-card">

            <div class="record-icon">
                ✦
            </div>

            <div>

                <span>
                    ACTIVITY
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars($activity);
                    ?>
                </strong>

            </div>

        </div>


        <div class="record-grid">

            <div>

                <span>
                    TYPE
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars($activity_type);
                    ?>
                </strong>

            </div>


            <div>

                <span>
                    ACTIVITY DATE
                </span>

                <strong>
                    <?php
                    echo $formatted_date;
                    ?>
                </strong>

            </div>


            <div>

                <span>
                    RECORDED AT
                </span>

                <strong>
                    <?php
                    echo $recorded_at;
                    ?>
                </strong>

            </div>

        </div>


        <div class="result-actions">

            <a href="index.php">
                + Add Another
            </a>

            <a href="report.php" class="primary">
                View Activity Report →
            </a>

        </div>

    </div>

</div>

</body>

</html>