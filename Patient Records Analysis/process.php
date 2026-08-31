<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}


/* =====================================================
   MULTIDIMENSIONAL ARRAY
   ===================================================== */

$patients = $_POST["patients"];


/* =====================================================
   CLEAN AND PROCESS DATA
   ===================================================== */

foreach ($patients as $key => $patient) {

    $patients[$key]["name"] =
        htmlspecialchars(trim($patient["name"]));

    $patients[$key]["age"] =
        (int)$patient["age"];

    $patients[$key]["department"] =
        htmlspecialchars(trim($patient["department"]));

    $patients[$key]["treatment"] =
        htmlspecialchars(trim($patient["treatment"]));
}


/* =====================================================
   PATIENT COUNT
   ===================================================== */

$totalPatients = count($patients);


/* =====================================================
   AGE ANALYSIS
   ===================================================== */

$ages = array_column($patients, "age");

$totalAge = array_sum($ages);

$averageAge = $totalAge / $totalPatients;


/* =====================================================
   DEPARTMENT-WISE ANALYSIS
   ===================================================== */

$departmentCounts = [];

foreach ($patients as $patient) {

    $department = $patient["department"];

    if (!isset($departmentCounts[$department])) {

        $departmentCounts[$department] = 0;

    }

    $departmentCounts[$department]++;

}


/* =====================================================
   TREATMENT STATISTICS
   ===================================================== */

$treatmentCounts = [];

foreach ($patients as $patient) {

    $treatment = $patient["treatment"];

    if (!isset($treatmentCounts[$treatment])) {

        $treatmentCounts[$treatment] = 0;

    }

    $treatmentCounts[$treatment]++;

}


/* =====================================================
   MOST COMMON DEPARTMENT
   ===================================================== */

$highestDepartmentCount = max($departmentCounts);

$popularDepartment =
    array_search(
        $highestDepartmentCount,
        $departmentCounts
    );


/* =====================================================
   MOST COMMON TREATMENT
   ===================================================== */

$highestTreatmentCount = max($treatmentCounts);

$popularTreatment =
    array_search(
        $highestTreatmentCount,
        $treatmentCounts
    );


/* =====================================================
   DEPARTMENT COLORS
   ===================================================== */

$departmentColors = [
    "#4f91c6",
    "#48a49b",
    "#8874c4",
    "#df9654"
];

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Patient Records Report</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f4f8fa;

            color: #30444e;

        }


        .page {

            width: 100%;

            padding: 35px 5% 30px;

        }


        /* HEADER */

        .header {

            display: flex;

            align-items: center;

            gap: 15px;

            margin-bottom: 28px;

        }


        .header-icon {

            width: 52px;
            height: 52px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #e2f1f5;

            border-radius: 13px;

            font-size: 23px;

        }


        .eyebrow {

            font-size: 8px;

            letter-spacing: 1.7px;

            color: #4e9aaa;

            font-weight: bold;

            margin-bottom: 5px;

        }


        h1 {

            font-size: 27px;

            color: #263e49;

        }


        .header p {

            font-size: 10px;

            color: #89989e;

            margin-top: 5px;

        }


        /* HERO */

        .hero {

            background: #2e6471;

            border-radius: 15px;

            padding: 25px 30px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 25px;

        }


        .hero-label {

            color: #bde2e7;

            font-size: 8px;

            letter-spacing: 1.5px;

            font-weight: bold;

        }


        .hero h2 {

            color: #ffffff;

            font-size: 22px;

            margin-top: 7px;

        }


        .hero p {

            color: #c6dadd;

            font-size: 9px;

            margin-top: 5px;

        }


        .hero-number {

            text-align: right;

        }


        .hero-number strong {

            display: block;

            color: #ffffff;

            font-size: 36px;

        }


        .hero-number span {

            color: #c6dadd;

            font-size: 8px;

            letter-spacing: 1px;

        }


        /* SUMMARY */

        .summary {

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 15px;

            margin-bottom: 27px;

        }


        .summary-card {

            padding: 22px;

            border-radius: 13px;

        }


        .summary-card:nth-child(1) {

            background: #e6f2fa;

        }


        .summary-card:nth-child(2) {

            background: #e5f5f2;

        }


        .summary-card:nth-child(3) {

            background: #f0ebfa;

        }


        .summary-card span {

            display: block;

            font-size: 8px;

            letter-spacing: 1px;

            color: #71858d;

            font-weight: bold;

            margin-bottom: 8px;

        }


        .summary-card strong {

            font-size: 27px;

            color: #30444e;

        }


        /* SECTION */

        .section-title {

            margin-bottom: 14px;

        }


        .section-title span {

            font-size: 8px;

            letter-spacing: 1.5px;

            color: #5795a3;

            font-weight: bold;

        }


        .section-title h2 {

            font-size: 18px;

            margin-top: 4px;

            color: #344b55;

        }


        /* PATIENT CARDS */

        .patient-grid {

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 15px;

            margin-bottom: 27px;

        }


        .patient {

            background: #ffffff;

            border: 1px solid #dce7eb;

            border-radius: 13px;

            padding: 19px;

            position: relative;

            overflow: hidden;

        }


        .patient::before {

            content: "";

            position: absolute;

            left: 0;
            top: 0;

            width: 4px;
            height: 100%;

            background: #4f91c6;

        }


        .patient-number {

            font-size: 8px;

            color: #9aa8ad;

            font-weight: bold;

            letter-spacing: 1px;

            margin-bottom: 14px;

        }


        .patient h3 {

            font-size: 14px;

            color: #354b55;

            margin-bottom: 15px;

        }


        .patient-info {

            margin-bottom: 10px;

        }


        .patient-info span {

            display: block;

            font-size: 8px;

            color: #99a6ab;

            margin-bottom: 3px;

        }


        .patient-info strong {

            font-size: 10px;

            color: #53666e;

        }


        /* STATISTICS */

        .statistics {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 18px;

            margin-bottom: 22px;

        }


        .stat-box {

            background: #ffffff;

            border: 1px solid #dce7eb;

            border-radius: 13px;

            padding: 22px;

        }


        .stat-box h3 {

            font-size: 14px;

            color: #3c535d;

            margin-bottom: 17px;

        }


        .stat-row {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 11px 0;

            border-bottom: 1px solid #edf1f2;

        }


        .stat-row:last-child {

            border-bottom: none;

        }


        .stat-name {

            font-size: 10px;

            color: #61747c;

        }


        .stat-value {

            padding: 5px 9px;

            background: #edf5f7;

            color: #43818e;

            border-radius: 5px;

            font-size: 9px;

            font-weight: bold;

        }


        /* FINAL RESULT */

        .result {

            background: #e7f4f2;

            border: 1px solid #d3eae6;

            border-radius: 13px;

            padding: 18px 22px;

            display: flex;

            align-items: center;

            gap: 14px;

            margin-bottom: 20px;

        }


        .result-icon {

            width: 40px;
            height: 40px;

            min-width: 40px;

            background: #438d83;

            color: white;

            border-radius: 9px;

            display: flex;

            align-items: center;
            justify-content: center;

        }


        .result span {

            font-size: 8px;

            letter-spacing: 1px;

            color: #438d83;

            font-weight: bold;

        }


        .result h3 {

            font-size: 12px;

            color: #3b504f;

            margin-top: 4px;

        }


        .result p {

            font-size: 9px;

            color: #7d8d8e;

            margin-top: 4px;

        }


        /* BUTTON */

        .actions {

            text-align: center;

        }


        .back {

            display: inline-block;

            text-decoration: none;

            background: #315d69;

            color: white;

            padding: 11px 20px;

            border-radius: 7px;

            font-size: 9px;

            font-weight: bold;

        }


        footer {

            text-align: center;

            margin-top: 22px;

            font-size: 8px;

            color: #9aa7ac;

        }


        /* RESPONSIVE */

        @media (max-width: 900px) {

            .patient-grid {

                grid-template-columns: repeat(2, 1fr);

            }

        }


        @media (max-width: 650px) {

            .summary,
            .statistics,
            .patient-grid {

                grid-template-columns: 1fr;

            }

            .hero {

                align-items: flex-start;

            }

        }

    </style>

</head>


<body>


<div class="page">


    <!-- HEADER -->

    <div class="header">

        <div class="header-icon">
            🏥
        </div>

        <div>

            <div class="eyebrow">
                HEALTHCARE ANALYTICS
            </div>

            <h1>
                Patient Records Report
            </h1>

            <p>
                Department and treatment analysis
            </p>

        </div>

    </div>


    <!-- HERO -->

    <div class="hero">

        <div>

            <div class="hero-label">
                PATIENT RECORDS
            </div>

            <h2>
                Healthcare Overview
            </h2>

            <p>
                Consolidated analysis of patient information
            </p>

        </div>


        <div class="hero-number">

            <strong>
                <?= $totalPatients ?>
            </strong>

            <span>
                TOTAL PATIENTS
            </span>

        </div>

    </div>


    <!-- SUMMARY -->

    <div class="summary">

        <div class="summary-card">

            <span>
                PATIENT COUNT
            </span>

            <strong>
                <?= $totalPatients ?>
            </strong>

        </div>


        <div class="summary-card">

            <span>
                AVERAGE AGE
            </span>

            <strong>
                <?= number_format($averageAge, 1) ?>
            </strong>

        </div>


        <div class="summary-card">

            <span>
                DEPARTMENTS
            </span>

            <strong>
                <?= count($departmentCounts) ?>
            </strong>

        </div>

    </div>


    <!-- PATIENT DETAILS -->

    <div class="section-title">

        <span>
            PATIENT DETAILS
        </span>

        <h2>
            Patient Overview
        </h2>

    </div>


    <div class="patient-grid">


        <?php foreach ($patients as $index => $patient): ?>

            <div class="patient">

                <div class="patient-number">
                    PATIENT <?= str_pad($index + 1, 2, "0", STR_PAD_LEFT) ?>
                </div>


                <h3>
                    <?= $patient["name"] ?>
                </h3>


                <div class="patient-info">

                    <span>
                        AGE
                    </span>

                    <strong>
                        <?= $patient["age"] ?> years
                    </strong>

                </div>


                <div class="patient-info">

                    <span>
                        DEPARTMENT
                    </span>

                    <strong>
                        <?= $patient["department"] ?>
                    </strong>

                </div>


                <div class="patient-info">

                    <span>
                        TREATMENT
                    </span>

                    <strong>
                        <?= $patient["treatment"] ?>
                    </strong>

                </div>

            </div>

        <?php endforeach; ?>


    </div>


    <!-- STATISTICS -->

    <div class="section-title">

        <span>
            ANALYTICS
        </span>

        <h2>
            Department & Treatment Statistics
        </h2>

    </div>


    <div class="statistics">


        <!-- DEPARTMENT -->

        <div class="stat-box">

            <h3>
                🏨 Department-wise Patients
            </h3>


            <?php foreach ($departmentCounts as $department => $count): ?>

                <div class="stat-row">

                    <div class="stat-name">
                        <?= $department ?>
                    </div>

                    <div class="stat-value">
                        <?= $count ?> patient<?= $count != 1 ? "s" : "" ?>
                    </div>

                </div>

            <?php endforeach; ?>


        </div>


        <!-- TREATMENT -->

        <div class="stat-box">

            <h3>
                💊 Treatment Statistics
            </h3>


            <?php foreach ($treatmentCounts as $treatment => $count): ?>

                <div class="stat-row">

                    <div class="stat-name">
                        <?= $treatment ?>
                    </div>

                    <div class="stat-value">
                        <?= $count ?>
                    </div>

                </div>

            <?php endforeach; ?>


        </div>


    </div>


    <!-- FINAL RESULT -->

    <div class="result">

        <div class="result-icon">
            ✓
        </div>


        <div>

            <span>
                KEY ANALYSIS
            </span>

            <h3>
                <?= $popularDepartment ?>
                has the highest number of patients.
            </h3>

            <p>
                <?= $popularDepartment ?>
                has <?= $highestDepartmentCount ?>
                patient<?= $highestDepartmentCount != 1 ? "s" : "" ?>,
                while the most common treatment is
                <?= $popularTreatment ?>.
            </p>

        </div>

    </div>


    <!-- BACK -->

    <div class="actions">

        <a href="index.php" class="back">
            ← Enter New Patient Data
        </a>

    </div>


    <footer>
        PHP Practical • Multidimensional Arrays • Patient Records Analysis
    </footer>


</div>


</body>

</html>