<?php

session_start();

date_default_timezone_set("Asia/Kolkata");

$file = "activities.txt";

$records = [];

$academic = 0;
$assessment = 0;
$workshop = 0;
$sports = 0;
$cultural = 0;


/*
    Read file
*/

if (file_exists($file)) {

    $lines = file(
        $file,
        FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
    );


    foreach ($lines as $line) {

        $data = explode("|", $line);


        if (count($data) >= 5) {

            $record = [

                "student" => $data[0],

                "activity" => $data[1],

                "type" => $data[2],

                "date" => $data[3],

                "recorded_at" => $data[4]

            ];


            $records[] = $record;


            /*
                Count activity types
            */

            switch ($data[2]) {

                case "Academic":
                    $academic++;
                    break;

                case "Assessment":
                    $assessment++;
                    break;

                case "Workshop":
                    $workshop++;
                    break;

                case "Sports":
                    $sports++;
                    break;

                case "Cultural":
                    $cultural++;
                    break;
            }

        }

    }

}


/*
    Sort records by date
*/

usort(
    $records,
    function ($a, $b) {

        return strtotime($b["date"])
             - strtotime($a["date"]);

    }
);


/*
    Find student names
*/

$students = [];

foreach ($records as $record) {

    if (!in_array(
        $record["student"],
        $students
    )) {

        $students[] = $record["student"];

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Activity Report | CampusChronicle</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="report-page">


    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="brand">

            <div class="brand-icon">
                CC
            </div>

            <div>
                <strong>CampusChronicle</strong>
                <small>STUDENT ACTIVITY HUB</small>
            </div>

        </div>

        <a href="index.php" class="nav-report">
            + New Activity
        </a>

    </nav>


    <main class="report-container">


        <!-- HEADER -->

        <section class="report-header">

            <div>

                <span>
                    ✦ LEARNER ANALYTICS
                </span>

                <h1>
                    Activity Report
                </h1>

                <p>
                    A consolidated view of recorded student activities.
                </p>

            </div>


            <div class="report-date">

                <small>
                    REPORT GENERATED
                </small>

                <strong>
                    <?php
                    echo date("d M Y");
                    ?>
                </strong>

            </div>

        </section>


        <!-- SUMMARY -->

        <section class="summary-grid">


            <div class="summary-card">

                <span>
                    TOTAL ACTIVITIES
                </span>

                <strong>
                    <?php
                    echo count($records);
                    ?>
                </strong>

                <small>
                    Records stored
                </small>

            </div>


            <div class="summary-card blue-card">

                <span>
                    ACADEMIC
                </span>

                <strong>
                    <?php
                    echo $academic;
                    ?>
                </strong>

                <small>
                    Learning activities
                </small>

            </div>


            <div class="summary-card green-card">

                <span>
                    WORKSHOPS
                </span>

                <strong>
                    <?php
                    echo $workshop;
                    ?>
                </strong>

                <small>
                    Skill development
                </small>

            </div>


            <div class="summary-card orange-card">

                <span>
                    ASSESSMENTS
                </span>

                <strong>
                    <?php
                    echo $assessment;
                    ?>
                </strong>

                <small>
                    Evaluation records
                </small>

            </div>

        </section>


        <!-- STUDENT SUMMARY -->

        <section class="student-summary">

            <div class="section-title">

                <span>
                    LEARNERS
                </span>

                <h2>
                    Student overview
                </h2>

            </div>


            <div class="student-chips">

                <?php foreach ($students as $student): ?>

                    <div class="student-chip">

                        <div class="student-avatar">

                            <?php
                            echo strtoupper(
                                substr($student, 0, 1)
                            );
                            ?>

                        </div>

                        <div>

                            <strong>
                                <?php
                                echo htmlspecialchars($student);
                                ?>
                            </strong>

                            <small>

                                <?php

                                $student_count = 0;

                                foreach (
                                    $records
                                    as $record
                                ) {

                                    if (
                                        $record["student"]
                                        === $student
                                    ) {

                                        $student_count++;

                                    }

                                }

                                echo $student_count;

                                ?>
                                activities

                            </small>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>


        <!-- ACTIVITY TIMELINE -->

        <section class="activity-section">

            <div class="section-title">

                <span>
                    ACTIVITY LOG
                </span>

                <h2>
                    Recent activities
                </h2>

            </div>


            <?php if (empty($records)): ?>

                <div class="empty-state">

                    <div>
                        📚
                    </div>

                    <h3>
                        No activities yet
                    </h3>

                    <p>
                        Add your first student activity to generate
                        the report.
                    </p>

                    <a href="index.php">
                        Add Activity →
                    </a>

                </div>


            <?php else: ?>


                <div class="activity-list">

                    <?php foreach ($records as $record): ?>

                        <div class="activity-row">


                            <div class="activity-date">

                                <strong>
                                    <?php
                                    echo date(
                                        "d",
                                        strtotime($record["date"])
                                    );
                                    ?>
                                </strong>

                                <span>
                                    <?php
                                    echo date(
                                        "M",
                                        strtotime($record["date"])
                                    );
                                    ?>
                                </span>

                            </div>


                            <div class="activity-marker">
                                •
                            </div>


                            <div class="activity-details">

                                <span>
                                    <?php
                                    echo htmlspecialchars(
                                        $record["type"]
                                    );
                                    ?>
                                </span>

                                <h3>
                                    <?php
                                    echo htmlspecialchars(
                                        $record["activity"]
                                    );
                                    ?>
                                </h3>

                                <small>
                                    Student:
                                    <?php
                                    echo htmlspecialchars(
                                        $record["student"]
                                    );
                                    ?>
                                </small>

                            </div>


                            <div class="recorded">

                                Recorded

                                <strong>
                                    <?php
                                    echo htmlspecialchars(
                                        $record["recorded_at"]
                                    );
                                    ?>
                                </strong>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>


            <?php endif; ?>


        </section>


        <!-- ACTIVITY TYPE FOOTER -->

        <section class="type-summary">

            <div>

                <span>ACADEMIC</span>

                <strong>
                    <?php echo $academic; ?>
                </strong>

            </div>

            <div>

                <span>ASSESSMENT</span>

                <strong>
                    <?php echo $assessment; ?>
                </strong>

            </div>

            <div>

                <span>WORKSHOP</span>

                <strong>
                    <?php echo $workshop; ?>
                </strong>

            </div>

            <div>

                <span>SPORTS</span>

                <strong>
                    <?php echo $sports; ?>
                </strong>

            </div>

            <div>

                <span>CULTURAL</span>

                <strong>
                    <?php echo $cultural; ?>
                </strong>

            </div>

        </section>


    </main>

</div>

</body>

</html>