<?php

/* =====================================================
   COURSE ENROLMENT ANALYSIS
   ===================================================== */

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}


/* =====================================================
   MULTIDIMENSIONAL ARRAY
   ===================================================== */

$courses = [
    [
        "name" => "Computer Science",
        "code" => "CS01",
        "students" => (int)($_POST["courses"][0]["students"] ?? 0)
    ],

    [
        "name" => "Data Science",
        "code" => "DS02",
        "students" => (int)($_POST["courses"][1]["students"] ?? 0)
    ],

    [
        "name" => "Artificial Intelligence",
        "code" => "AI03",
        "students" => (int)($_POST["courses"][2]["students"] ?? 0)
    ],

    [
        "name" => "Web Development",
        "code" => "WD04",
        "students" => (int)($_POST["courses"][3]["students"] ?? 0)
    ]
];


/* =====================================================
   ARRAY FUNCTIONS
   ===================================================== */

/* Extract enrolment values */

$enrolments = array_column($courses, "students");


/* Total number of students */

$totalEnrolments = array_sum($enrolments);


/* Number of courses */

$totalCourses = count($courses);


/* Highest enrolment */

$highestEnrolment = max($enrolments);


/* Lowest enrolment */

$lowestEnrolment = min($enrolments);


/* Average enrolment */

$averageEnrolment = $totalEnrolments / $totalCourses;


/* =====================================================
   FIND MOST POPULAR COURSE
   ===================================================== */

$popularIndex = array_search(
    $highestEnrolment,
    $enrolments
);

$popularCourse = $courses[$popularIndex]["name"];
$popularCode = $courses[$popularIndex]["code"];


/* =====================================================
   FIND LEAST POPULAR COURSE
   ===================================================== */

$leastIndex = array_search(
    $lowestEnrolment,
    $enrolments
);

$leastCourse = $courses[$leastIndex]["name"];


/* =====================================================
   SORT COURSES FROM HIGHEST TO LOWEST
   ===================================================== */

usort($courses, function ($a, $b) {

    return $b["students"] <=> $a["students"];

});


/* =====================================================
   COURSE COLORS
   ===================================================== */

$colors = [
    "blue",
    "purple",
    "orange",
    "green"
];

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Course Enrolment Analysis</title>

    <style>

        /* =================================================
           RESET
           ================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =================================================
           BODY
           ================================================= */

        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f5f7f6;

            color: #26332f;

            min-height: 100vh;

        }


        /* =================================================
           MAIN WRAPPER
           ================================================= */

        .page {

            width: 100%;

            min-height: 100vh;

            padding: 35px 5% 30px;

        }


        /* =================================================
           HEADER
           ================================================= */

        .header {

            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            margin-bottom: 28px;

        }


        .header-left {

            display: flex;

            align-items: center;

            gap: 15px;

        }


        .header-icon {

            width: 52px;
            height: 52px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #e8f1ee;

            border-radius: 13px;

            font-size: 23px;

        }


        .eyebrow {

            font-size: 8px;

            letter-spacing: 1.8px;

            font-weight: bold;

            color: #659080;

            margin-bottom: 6px;

        }


        .header h1 {

            font-size: 27px;

            color: #263a34;

        }


        .header p {

            font-size: 10px;

            color: #8b9793;

            margin-top: 5px;

        }


        .report-tag {

            padding: 8px 13px;

            background: #ffffff;

            border: 1px solid #dce5e1;

            border-radius: 7px;

            font-size: 8px;

            color: #73837d;

            letter-spacing: .7px;

        }


        /* =================================================
           POPULAR COURSE
           ================================================= */

        .popular {

            background: #273b35;

            border-radius: 16px;

            padding: 25px 30px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;

            position: relative;

            overflow: hidden;

        }


        .popular::after {

            content: "";

            position: absolute;

            width: 230px;

            height: 230px;

            border: 1px solid rgba(255,255,255,.08);

            border-radius: 50%;

            right: -90px;

            top: -120px;

        }


        .popular-label {

            font-size: 8px;

            letter-spacing: 1.6px;

            color: #e5ca72;

            font-weight: bold;

        }


        .popular h2 {

            font-size: 23px;

            color: #ffffff;

            margin: 7px 0 5px;

        }


        .popular p {

            font-size: 9px;

            color: #bdc9c5;

        }


        .popular-number {

            text-align: right;

            position: relative;

            z-index: 2;

        }


        .popular-number strong {

            display: block;

            font-size: 34px;

            color: #e5ca72;

            line-height: 1;

        }


        .popular-number span {

            display: block;

            font-size: 8px;

            letter-spacing: 1px;

            color: #bdc9c5;

            margin-top: 5px;

        }


        /* =================================================
           SECTION HEADING
           ================================================= */

        .section-heading {

            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            margin-bottom: 14px;

        }


        .section-heading span {

            font-size: 8px;

            letter-spacing: 1.5px;

            color: #77938a;

            font-weight: bold;

        }


        .section-heading h2 {

            font-size: 18px;

            color: #34443f;

            margin-top: 4px;

        }


        .section-heading p {

            font-size: 9px;

            color: #9aa5a1;

        }


        /* =================================================
           COURSE GRID
           ================================================= */

        .course-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 15px;

            margin-bottom: 25px;

        }


        /* =================================================
           COURSE CARD
           ================================================= */

        .course-card {

            background: #ffffff;

            border-radius: 14px;

            border: 1px solid #dfe7e3;

            overflow: hidden;

            box-shadow:
                0 7px 20px rgba(41,61,54,.05);

            transition: transform .2s ease,
                        box-shadow .2s ease;

        }


        .course-card:hover {

            transform: translateY(-4px);

            box-shadow:
                0 12px 28px rgba(41,61,54,.10);

        }


        /* =================================================
           CARD COLOR STRIP
           ================================================= */

        .card-strip {

            height: 5px;

        }


        .blue .card-strip {
            background: #5c94d6;
        }

        .purple .card-strip {
            background: #8d72cc;
        }

        .orange .card-strip {
            background: #e49a50;
        }

        .green .card-strip {
            background: #5ba17d;
        }


        /* =================================================
           CARD CONTENT
           ================================================= */

        .card-content {

            padding: 20px;

        }


        .card-top {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;

        }


        .course-code {

            font-size: 8px;

            letter-spacing: 1.2px;

            font-weight: bold;

            color: #9aa49f;

        }


        .rank {

            font-size: 8px;

            padding: 5px 7px;

            background: #f1f3f2;

            color: #7f8b86;

            border-radius: 5px;

        }


        .rank.first {

            background: #fff2cb;

            color: #9b7b24;

        }


        .course-card h3 {

            font-size: 14px;

            line-height: 1.35;

            color: #33423e;

            min-height: 38px;

        }


        .course-card .description {

            font-size: 8px;

            color: #9aa49f;

            margin-top: 5px;

        }


        /* =================================================
           ENROLMENT NUMBER
           ================================================= */

        .enrolment {

            display: flex;

            align-items: baseline;

            gap: 6px;

            margin-top: 20px;

            padding-top: 15px;

            border-top: 1px solid #edf0ef;

        }


        .enrolment strong {

            font-size: 27px;

            color: #33423e;

        }


        .enrolment span {

            font-size: 8px;

            color: #9aa49f;

        }


        /* =================================================
           STATUS
           ================================================= */

        .status {

            margin-top: 12px;

            display: inline-block;

            padding: 6px 9px;

            background: #f3f5f4;

            border-radius: 5px;

            font-size: 8px;

            color: #7d8984;

        }


        .status.popular {

            background: #fff2cb;

            color: #92752a;

        }


        .status.low {

            background: #f9ece7;

            color: #a46b58;

        }


        /* =================================================
           SUMMARY
           ================================================= */

        .summary {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            background: #ffffff;

            border: 1px solid #dfe7e3;

            border-radius: 14px;

            overflow: hidden;

            margin-bottom: 20px;

        }


        .summary-item {

            padding: 22px;

            text-align: center;

            border-right: 1px solid #e9eeeb;

        }


        .summary-item:last-child {

            border-right: none;

        }


        .summary-item span {

            display: block;

            font-size: 8px;

            letter-spacing: 1px;

            color: #94a09b;

            margin-bottom: 8px;

        }


        .summary-item strong {

            font-size: 22px;

            color: #34443f;

        }


        /* =================================================
           FINAL ANALYSIS
           ================================================= */

        .analysis {

            display: flex;

            align-items: center;

            gap: 15px;

            background: #edf5f1;

            border: 1px solid #dcebe4;

            border-radius: 13px;

            padding: 18px 22px;

            margin-bottom: 22px;

        }


        .analysis-icon {

            width: 40px;
            height: 40px;

            min-width: 40px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #5c927f;

            color: white;

            border-radius: 9px;

            font-size: 17px;

        }


        .analysis-label {

            font-size: 8px;

            letter-spacing: 1px;

            color: #5c927f;

            font-weight: bold;

        }


        .analysis h3 {

            font-size: 12px;

            color: #354740;

            margin: 4px 0;

        }


        .analysis p {

            font-size: 9px;

            color: #7c8984;

        }


        /* =================================================
           BACK BUTTON
           ================================================= */

        .actions {

            text-align: center;

            margin-top: 5px;

        }


        .back-button {

            display: inline-block;

            text-decoration: none;

            padding: 11px 20px;

            border-radius: 7px;

            background: #344b43;

            color: #ffffff;

            font-size: 9px;

            font-weight: bold;

            transition: .2s ease;

        }


        .back-button:hover {

            background: #253932;

            transform: translateY(-2px);

        }


        /* =================================================
           FOOTER
           ================================================= */

        footer {

            text-align: center;

            font-size: 8px;

            color: #a2aba7;

            margin-top: 22px;

        }


        /* =================================================
           RESPONSIVE
           ================================================= */

        @media (max-width: 950px) {

            .course-grid {

                grid-template-columns:
                    repeat(2, 1fr);

            }

        }


        @media (max-width: 650px) {

            .page {

                padding: 25px 4%;

            }


            .header {

                align-items: flex-start;

            }


            .report-tag {

                display: none;

            }


            .popular {

                padding: 22px;

            }


            .popular h2 {

                font-size: 19px;

            }


            .course-grid {

                grid-template-columns: 1fr;

            }


            .summary {

                grid-template-columns: 1fr;

            }


            .summary-item {

                border-right: none;

                border-bottom: 1px solid #e9eeeb;

            }


            .summary-item:last-child {

                border-bottom: none;

            }

        }

    </style>

</head>


<body>


<div class="page">


    <!-- =================================================
         HEADER
         ================================================= -->

    <header class="header">

        <div class="header-left">

            <div class="header-icon">
                🎓
            </div>

            <div>

                <div class="eyebrow">
                    ACADEMIC ANALYTICS
                </div>

                <h1>
                    Course Enrolment Analysis
                </h1>

                <p>
                    Consolidated analysis of student course enrolments
                </p>

            </div>

        </div>


        <div class="report-tag">
            REPORT GENERATED
        </div>

    </header>



    <!-- =================================================
         MOST POPULAR COURSE
         ================================================= -->

    <section class="popular">

        <div>

            <div class="popular-label">
                ★ MOST POPULAR COURSE
            </div>

            <h2>
                <?= htmlspecialchars($popularCourse) ?>
            </h2>

            <p>
                Course Code:
                <?= htmlspecialchars($popularCode) ?>
            </p>

        </div>


        <div class="popular-number">

            <strong>
                <?= $highestEnrolment ?>
            </strong>

            <span>
                STUDENTS ENROLLED
            </span>

        </div>

    </section>



    <!-- =================================================
         COURSE DETAILS
         ================================================= -->

    <div class="section-heading">

        <div>

            <span>
                COURSE DETAILS
            </span>

            <h2>
                Enrolment Overview
            </h2>

        </div>

        <p>
            <?= $totalCourses ?> courses analysed
        </p>

    </div>



    <!-- =================================================
         COURSE CARDS
         ================================================= -->

    <section class="course-grid">


        <?php foreach ($courses as $index => $course): ?>

            <?php

            /*
             * Determine course ranking
             */

            $rank = 1;

            foreach ($courses as $otherCourse) {

                if (
                    $otherCourse["students"]
                    > $course["students"]
                ) {

                    $rank++;

                }

            }


            /*
             * Determine status
             */

            if (
                $course["students"]
                == $highestEnrolment
            ) {

                $status = "★ Most Popular";
                $statusClass = "popular";

            } elseif (
                $course["students"]
                == $lowestEnrolment
            ) {

                $status = "Least Enrolled";
                $statusClass = "low";

            } else {

                $status = "Active Enrolment";
                $statusClass = "";

            }

            ?>


            <div class="course-card <?= $colors[$index] ?>">

                <div class="card-strip"></div>


                <div class="card-content">


                    <div class="card-top">

                        <div class="course-code">

                            <?= htmlspecialchars($course["code"]) ?>

                        </div>


                        <div class="rank
                            <?= $rank == 1 ? 'first' : '' ?>">

                            RANK #<?= $rank ?>

                        </div>

                    </div>


                    <h3>

                        <?= htmlspecialchars($course["name"]) ?>

                    </h3>


                    <p class="description">

                        Student course enrolment

                    </p>


                    <div class="enrolment">

                        <strong>
                            <?= $course["students"] ?>
                        </strong>

                        <span>
                            students
                        </span>

                    </div>


                    <div class="status <?= $statusClass ?>">

                        <?= $status ?>

                    </div>


                </div>

            </div>


        <?php endforeach; ?>


    </section>



    <!-- =================================================
         SUMMARY
         ================================================= -->

    <section class="summary">


        <div class="summary-item">

            <span>
                TOTAL ENROLMENTS
            </span>

            <strong>
                <?= $totalEnrolments ?>
            </strong>

        </div>


        <div class="summary-item">

            <span>
                COURSES ANALYSED
            </span>

            <strong>
                <?= $totalCourses ?>
            </strong>

        </div>


        <div class="summary-item">

            <span>
                AVERAGE ENROLMENT
            </span>

            <strong>
                <?= number_format($averageEnrolment, 1) ?>
            </strong>

        </div>


    </section>



    <!-- =================================================
         ANALYSIS RESULT
         ================================================= -->

    <section class="analysis">

        <div class="analysis-icon">
            ✓
        </div>


        <div>

            <div class="analysis-label">
                ANALYSIS RESULT
            </div>

            <h3>

                <?= htmlspecialchars($popularCourse) ?>
                has the highest enrolment.

            </h3>

            <p>

                <?= htmlspecialchars($popularCourse) ?>
                leads with
                <?= $highestEnrolment ?>
                students, while
                <?= htmlspecialchars($leastCourse) ?>
                has the lowest enrolment.

            </p>

        </div>

    </section>



    <!-- =================================================
         BACK BUTTON
         ================================================= -->

    <div class="actions">

        <a href="index.php"
           class="back-button">

            ← Enter New Enrolment Data

        </a>

    </div>



    <!-- =================================================
         FOOTER
         ================================================= -->

    <footer>

        PHP Practical
        &nbsp;•&nbsp;
        Multidimensional Arrays
        &nbsp;•&nbsp;
        Array Functions

    </footer>


</div>


</body>

</html>