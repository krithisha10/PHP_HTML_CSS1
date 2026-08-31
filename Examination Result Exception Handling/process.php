<?php

/* =========================================================
   EXAMINATION RESULT PROCESSING
   Runtime Exception Handling
   ========================================================= */


/* ---------------------------------------------------------
   RECEIVE FORM DATA
   --------------------------------------------------------- */

$students = $_POST['students'] ?? [];

$results = [];

$errors = [];

$totalStudents = count($students);

$processedCount = 0;

$errorCount = 0;

$totalMarks = 0;


/* ---------------------------------------------------------
   FUNCTION TO CALCULATE GRADE
   --------------------------------------------------------- */

function calculateGrade($average)
{
    if ($average >= 90) {
        return "A+";
    } elseif ($average >= 80) {
        return "A";
    } elseif ($average >= 70) {
        return "B";
    } elseif ($average >= 60) {
        return "C";
    } elseif ($average >= 50) {
        return "D";
    } else {
        return "F";
    }
}


/* ---------------------------------------------------------
   PROCESS EACH STUDENT
   --------------------------------------------------------- */

foreach ($students as $index => $student) {

    try {

        /* ---------------------------------------------
           CHECK STUDENT RECORD
           --------------------------------------------- */

        if (!is_array($student)) {

            throw new Exception(
                "Invalid student record."
            );
        }


        /* ---------------------------------------------
           GET STUDENT DETAILS
           --------------------------------------------- */

        $name = trim(
            $student['name'] ?? ''
        );

        $registerNo = strtoupper(
            trim(
                $student['register_no'] ?? ''
            )
        );


        $mark1 = $student['mark1'] ?? '';

        $mark2 = $student['mark2'] ?? '';

        $mark3 = $student['mark3'] ?? '';


        /* ---------------------------------------------
           VALIDATE NAME
           --------------------------------------------- */

        if ($name === '') {

            throw new Exception(
                "Student name is missing."
            );
        }


        if (!preg_match(
            "/^[a-zA-Z ]+$/",
            $name
        )) {

            throw new Exception(
                "Student name contains invalid characters."
            );
        }


        /* ---------------------------------------------
           VALIDATE REGISTER NUMBER
           --------------------------------------------- */

        if ($registerNo === '') {

            throw new Exception(
                "Register number is missing."
            );
        }


        /* ---------------------------------------------
           VALIDATE MARKS
           --------------------------------------------- */

        if (
            $mark1 === '' ||
            $mark2 === '' ||
            $mark3 === ''
        ) {

            throw new Exception(
                "One or more marks are missing."
            );
        }


        if (
            !is_numeric($mark1) ||
            !is_numeric($mark2) ||
            !is_numeric($mark3)
        ) {

            throw new Exception(
                "Marks must contain numeric values."
            );
        }


        /* Convert marks to numbers */

        $mark1 = (float)$mark1;

        $mark2 = (float)$mark2;

        $mark3 = (float)$mark3;


        /* ---------------------------------------------
           CHECK MARK RANGE
           --------------------------------------------- */

        if (
            $mark1 < 0 || $mark1 > 100 ||
            $mark2 < 0 || $mark2 > 100 ||
            $mark3 < 0 || $mark3 > 100
        ) {

            throw new Exception(
                "Marks must be between 0 and 100."
            );
        }


        /* ---------------------------------------------
           CALCULATE TOTAL
           --------------------------------------------- */

        $total =
            $mark1 +
            $mark2 +
            $mark3;


        /* ---------------------------------------------
           NUMBER OF SUBJECTS
           --------------------------------------------- */

        $subjects = 3;


        /*
         * Runtime safety check.
         * Prevents division by zero.
         */

        if ($subjects <= 0) {

            throw new Exception(
                "Unable to calculate average."
            );
        }


        /* ---------------------------------------------
           CALCULATE AVERAGE
           --------------------------------------------- */

        $average =
            $total / $subjects;


        /* ---------------------------------------------
           CALCULATE GRADE
           --------------------------------------------- */

        $grade =
            calculateGrade($average);


        /* ---------------------------------------------
           DETERMINE RESULT
           --------------------------------------------- */

        if (
            $mark1 >= 40 &&
            $mark2 >= 40 &&
            $mark3 >= 40
        ) {

            $status = "PASS";

        } else {

            $status = "FAIL";
        }


        /* ---------------------------------------------
           STORE SUCCESSFUL RESULT
           --------------------------------------------- */

        $results[] = [

            'number' =>
                $index + 1,

            'name' =>
                htmlspecialchars($name),

            'register_no' =>
                htmlspecialchars($registerNo),

            'mark1' =>
                $mark1,

            'mark2' =>
                $mark2,

            'mark3' =>
                $mark3,

            'total' =>
                $total,

            'average' =>
                $average,

            'grade' =>
                $grade,

            'status' =>
                $status,

            'error' =>
                ''

        ];


        $processedCount++;

        $totalMarks += $total;

    }


    /* -----------------------------------------------------
       EXCEPTION HANDLING
       ----------------------------------------------------- */

    catch (Exception $e) {

        $errorCount++;


        $errorMessage =
            "Student " .
            ($index + 1) .
            ": " .
            $e->getMessage();


        /* Record error */

        $errors[] = $errorMessage;


        /* ---------------------------------------------
           STORE ERROR RECORD
           --------------------------------------------- */

        $results[] = [

            'number' =>
                $index + 1,

            'name' =>
                htmlspecialchars(
                    $student['name']
                    ?? 'Unknown Student'
                ),

            'register_no' =>
                htmlspecialchars(
                    $student['register_no']
                    ?? 'Not Available'
                ),

            'mark1' =>
                $student['mark1']
                ?? '—',

            'mark2' =>
                $student['mark2']
                ?? '—',

            'mark3' =>
                $student['mark3']
                ?? '—',

            'total' =>
                '—',

            'average' =>
                '—',

            'grade' =>
                '—',

            'status' =>
                'ERROR',

            'error' =>
                $e->getMessage()

        ];

    }

}


/* ---------------------------------------------------------
   OVERALL AVERAGE
   --------------------------------------------------------- */

if ($processedCount > 0) {

    $overallAverage =
        $totalMarks /
        ($processedCount * 3);

} else {

    $overallAverage = 0;

}


/* ---------------------------------------------------------
   PROCESSING STATUS
   --------------------------------------------------------- */

if ($totalStudents == 0) {

    $systemStatus = "NO RECORDS";

} elseif ($errorCount == 0) {

    $systemStatus = "ALL PROCESSED";

} elseif ($processedCount > 0) {

    $systemStatus = "PARTIALLY PROCESSED";

} else {

    $systemStatus = "PROCESSING FAILED";

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Examination Result Report
    </title>

    <link rel="stylesheet" href="style.css">


    <style>

        /* =========================================
           RESULT HEADER
           ========================================= */

        .result-heading {

            background: #eeecf8;

            border: 1px solid #dedaf0;

            border-radius: 13px;

            padding: 22px 25px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 16px;

        }


        .result-heading span {

            display: block;

            font-size: 6px;

            letter-spacing: 1.3px;

            color: #7567a8;

            font-weight: bold;

            margin-bottom: 6px;

        }


        .result-heading h2 {

            font-size: 23px;

            color: #383b46;

            margin-bottom: 6px;

        }


        .result-heading p {

            font-size: 7px;

            color: #8d909a;

        }


        .result-status {

            padding: 11px 16px;

            border-radius: 9px;

            background: #ffffff;

            border: 1px solid #ddd9ed;

            text-align: center;

        }


        .result-status strong {

            display: block;

            font-size: 10px;

            color: #7567a8;

            margin-bottom: 4px;

        }


        .result-status small {

            font-size: 5px;

            color: #9699a2;

            letter-spacing: .7px;

        }


        /* =========================================
           SUMMARY
           ========================================= */

        .summary {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 9px;

            margin-bottom: 16px;

        }


        .summary-box {

            background: #ffffff;

            border: 1px solid #e1e4ea;

            border-radius: 10px;

            padding: 13px;

        }


        .summary-box span {

            display: block;

            font-size: 5px;

            color: #92959e;

            letter-spacing: .8px;

            font-weight: bold;

            margin-bottom: 7px;

        }


        .summary-box strong {

            font-size: 18px;

            color: #555963;

        }


        .summary-box:nth-child(1) strong {

            color: #7567a8;

        }


        .summary-box:nth-child(2) strong {

            color: #648a72;

        }


        .summary-box:nth-child(3) strong {

            color: #b47768;

        }


        .summary-box:nth-child(4) strong {

            color: #77709c;

        }


        /* =========================================
           RESULT PANEL
           ========================================= */

        .report-panel {

            background: #ffffff;

            border: 1px solid #e1e4ea;

            border-radius: 13px;

            padding: 20px;

        }


        .report-title {

            margin-bottom: 13px;

        }


        .report-title span {

            display: block;

            font-size: 6px;

            letter-spacing: 1.2px;

            color: #7567a8;

            font-weight: bold;

            margin-bottom: 5px;

        }


        .report-title h3 {

            font-size: 15px;

            color: #454852;

        }


        /* =========================================
           RESULT TABLE
           ========================================= */

        .result-wrapper {

            width: 100%;

            overflow-x: auto;

            border: 1px solid #e2e4e9;

            border-radius: 9px;

        }


        .result-table {

            width: 100%;

            min-width: 900px;

            border-collapse: collapse;

        }


        .result-table th {

            height: 40px;

            padding: 0 9px;

            background: #f3f2f7;

            border-bottom: 1px solid #e0e2e7;

            text-align: left;

            font-size: 5px;

            letter-spacing: .7px;

            color: #7e818a;

        }


        .result-table td {

            height: 52px;

            padding: 7px 9px;

            border-bottom: 1px solid #eceef1;

            font-size: 7px;

            color: #626670;

        }


        .result-table tr:last-child td {

            border-bottom: none;

        }


        .result-table tbody tr:hover {

            background: #fafafe;

        }


        .result-table th:first-child,
        .result-table td:first-child {

            text-align: center;

            width: 45px;

        }


        /* =========================================
           STUDENT NAME
           ========================================= */

        .student-name {

            font-size: 8px !important;

            font-weight: bold;

            color: #4b4e58 !important;

        }


        /* =========================================
           MARK VALUES
           ========================================= */

        .mark-value {

            font-weight: bold;

            color: #656875;

        }


        .total-value {

            font-weight: bold;

            color: #62588b;

        }


        .average-value {

            font-weight: bold;

            color: #666b75;

        }


        /* =========================================
           GRADE
           ========================================= */

        .grade-badge {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: 29px;

            height: 29px;

            border-radius: 7px;

            background: #efedfa;

            color: #7567a8;

            font-size: 7px;

            font-weight: bold;

        }


        /* =========================================
           STATUS
           ========================================= */

        .status {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 6px 9px;

            border-radius: 15px;

            font-size: 5px;

            font-weight: bold;

        }


        .status.pass {

            background: #e9f5ee;

            color: #638c73;

        }


        .status.fail {

            background: #fff0ed;

            color: #b47467;

        }


        .status.error {

            background: #fff5e8;

            color: #a87d50;

        }


        /* =========================================
           ERROR BOX
           ========================================= */

        .error-message {

            margin-top: 15px;

            padding: 13px 15px;

            border-radius: 9px;

            background: #fff6e9;

            border: 1px solid #eddfcd;

        }


        .error-message h3 {

            font-size: 8px;

            color: #9d7650;

            margin-bottom: 8px;

        }


        .error-item {

            font-size: 6px;

            color: #8d7862;

            padding: 4px 0;

        }


        /* =========================================
           SUCCESS MESSAGE
           ========================================= */

        .success-message {

            margin-top: 15px;

            padding: 13px 15px;

            border-radius: 9px;

            background: #edf7f1;

            border: 1px solid #dbe9e0;

            display: flex;

            align-items: center;

            gap: 9px;

        }


        .success-icon {

            width: 30px;

            height: 30px;

            border-radius: 7px;

            background: #ffffff;

            color: #648d73;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: bold;

        }


        .success-message strong {

            display: block;

            font-size: 8px;

            color: #557362;

            margin-bottom: 3px;

        }


        .success-message p {

            font-size: 6px;

            color: #89998f;

        }


        /* =========================================
           BUTTONS
           ========================================= */

        .buttons {

            display: flex;

            justify-content: center;

            gap: 9px;

            margin-top: 17px;

        }


        .buttons a {

            text-decoration: none;

            padding: 11px 18px;

            border-radius: 7px;

            font-size: 7px;

            font-weight: bold;

        }


        .back {

            background: #ffffff;

            color: #70737c;

            border: 1px solid #dfe2e8;

        }


        .back:hover {

            background: #f5f6f8;

        }


        .process-again {

            background: #7567a8;

            color: #ffffff;

        }


        .process-again:hover {

            background: #625594;

        }


        /* =========================================
           RESPONSIVE
           ========================================= */

        @media (max-width: 800px) {

            .summary {

                grid-template-columns:
                    repeat(2, 1fr);

            }


            .result-heading {

                align-items: flex-start;

                gap: 15px;

            }

        }


        @media (max-width: 600px) {

            .result-heading {

                flex-direction: column;

            }


            .result-status {

                width: 100%;

            }


            .summary {

                grid-template-columns: 1fr;

            }


            .report-panel {

                padding: 14px;

            }


            .buttons {

                flex-direction: column;

            }


            .buttons a {

                text-align: center;

            }

        }

    </style>

</head>


<body>


<div class="page">


    <!-- =========================================
         HEADER
         ========================================= -->

    <header class="top-header">


        <div class="header-left">


            <div class="college-logo">
                🎓
            </div>


            <div>

                <h1>
                    Examination Result Portal
                </h1>

                <p>
                    Result Processing & Exception Management
                </p>

            </div>


        </div>


        <div class="system-status">

            <span class="status-dot"></span>

            <?php
            echo htmlspecialchars($systemStatus);
            ?>

        </div>


    </header>



    <!-- =========================================
         MAIN
         ========================================= -->

    <main class="main-container">


        <!-- RESULT HEADING -->

        <section class="result-heading">


            <div>

                <span>
                    EXAMINATION RESULT REPORT
                </span>


                <h2>
                    Results Generated Successfully
                </h2>


                <p>
                    Each student record was processed independently
                    using PHP exception handling.
                </p>

            </div>


            <div class="result-status">

                <strong>

                    <?php
                    echo $processedCount;
                    ?>

                    /

                    <?php
                    echo $totalStudents;
                    ?>

                </strong>

                <small>
                    RECORDS PROCESSED
                </small>

            </div>


        </section>



        <!-- =========================================
             SUMMARY
             ========================================= -->

        <section class="summary">


            <div class="summary-box">

                <span>
                    TOTAL STUDENTS
                </span>

                <strong>
                    <?php
                    echo $totalStudents;
                    ?>
                </strong>

            </div>


            <div class="summary-box">

                <span>
                    PROCESSED
                </span>

                <strong>
                    <?php
                    echo $processedCount;
                    ?>
                </strong>

            </div>


            <div class="summary-box">

                <span>
                    RUNTIME ERRORS
                </span>

                <strong>
                    <?php
                    echo $errorCount;
                    ?>
                </strong>

            </div>


            <div class="summary-box">

                <span>
                    OVERALL AVERAGE
                </span>

                <strong>

                    <?php

                    echo number_format(
                        $overallAverage,
                        1
                    );

                    ?>

                </strong>

            </div>


        </section>



        <!-- =========================================
             REPORT
             ========================================= -->

        <section class="report-panel">


            <div class="report-title">

                <span>
                    MARKSHEET
                </span>

                <h3>
                    Student Examination Results
                </h3>

            </div>



            <div class="result-wrapper">


                <table class="result-table">


                    <thead>

                        <tr>

                            <th>
                                NO.
                            </th>

                            <th>
                                STUDENT NAME
                            </th>

                            <th>
                                REGISTER NO.
                            </th>

                            <th>
                                MARK 1
                            </th>

                            <th>
                                MARK 2
                            </th>

                            <th>
                                MARK 3
                            </th>

                            <th>
                                TOTAL
                            </th>

                            <th>
                                AVERAGE
                            </th>

                            <th>
                                GRADE
                            </th>

                            <th>
                                RESULT
                            </th>

                        </tr>

                    </thead>



                    <tbody>


                    <?php foreach (
                        $results as $result
                    ): ?>


                        <tr>


                            <td>

                                <?php

                                echo str_pad(
                                    $result['number'],
                                    2,
                                    '0',
                                    STR_PAD_LEFT
                                );

                                ?>

                            </td>


                            <td class="student-name">

                                <?php
                                echo $result['name'];
                                ?>

                            </td>


                            <td>

                                <?php
                                echo $result['register_no'];
                                ?>

                            </td>


                            <td class="mark-value">

                                <?php
                                echo $result['mark1'];
                                ?>

                            </td>


                            <td class="mark-value">

                                <?php
                                echo $result['mark2'];
                                ?>

                            </td>


                            <td class="mark-value">

                                <?php
                                echo $result['mark3'];
                                ?>

                            </td>


                            <td class="total-value">

                                <?php
                                echo $result['total'];
                                ?>

                            </td>


                            <td class="average-value">

                                <?php

                                if (
                                    is_numeric(
                                        $result['average']
                                    )
                                ) {

                                    echo number_format(
                                        $result['average'],
                                        1
                                    );

                                } else {

                                    echo "—";

                                }

                                ?>

                            </td>


                            <td>

                                <span class="grade-badge">

                                    <?php
                                    echo $result['grade'];
                                    ?>

                                </span>

                            </td>


                            <td>


                                <?php

                                if (
                                    $result['status']
                                    === "PASS"
                                ) {

                                    echo
                                    '<span class="status pass">
                                        ✓ PASS
                                    </span>';

                                } elseif (
                                    $result['status']
                                    === "FAIL"
                                ) {

                                    echo
                                    '<span class="status fail">
                                        ✕ FAIL
                                    </span>';

                                } else {

                                    echo
                                    '<span class="status error">
                                        ! ERROR
                                    </span>';

                                }

                                ?>


                            </td>


                        </tr>


                    <?php endforeach; ?>


                    </tbody>


                </table>


            </div>



            <!-- =====================================
                 ERROR LOG
                 ===================================== -->

            <?php if (
                !empty($errors)
            ): ?>


                <div class="error-message">


                    <h3>
                        ⚠ Runtime Error Log
                    </h3>


                    <?php foreach (
                        $errors as $error
                    ): ?>


                        <div class="error-item">

                            •

                            <?php
                            echo htmlspecialchars($error);
                            ?>

                        </div>


                    <?php endforeach; ?>


                </div>


            <?php else: ?>


                <div class="success-message">


                    <div class="success-icon">
                        ✓
                    </div>


                    <div>

                        <strong>
                            No Runtime Errors Detected
                        </strong>

                        <p>
                            All submitted examination records
                            were processed successfully.
                        </p>

                    </div>


                </div>


            <?php endif; ?>


        </section>



        <!-- =========================================
             ACTION BUTTONS
             ========================================= -->

        <div class="buttons">


            <a
                href="index.php"
                class="back"
            >

                ← Back to Entry

            </a>


            <a
                href="index.php"
                class="process-again"
            >

                Process New Results →

            </a>


        </div>



        <!-- =========================================
             FOOTER
             ========================================= -->

        <footer>

            <span>
                PHP PRACTICAL
            </span>

            <i>•</i>

            Examination Result Processing

            <i>•</i>

            Runtime Exception Handling

        </footer>


    </main>


</div>


</body>

</html>