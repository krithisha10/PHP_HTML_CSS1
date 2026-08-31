<?php

/* =========================================================
   PATIENT DATA PROCESSING WITH VALIDATION
   AND EXCEPTION HANDLING
   ========================================================= */


/* ---------------------------------------------------------
   RECEIVE PATIENT DATA
   --------------------------------------------------------- */

$patients = $_POST['patients'] ?? [];

$processedPatients = [];

$validCount = 0;
$invalidCount = 0;

$totalAge = 0;

$exceptions = [];


/* ---------------------------------------------------------
   VALIDATION FUNCTION
   --------------------------------------------------------- */

function validatePatient($patient)
{
    $errors = [];

    /* Patient Name Validation */

    if (!isset($patient['name']) ||
        trim($patient['name']) === '') {

        $errors[] = "Patient name is required.";

    } elseif (!preg_match("/^[a-zA-Z ]+$/", trim($patient['name']))) {

        $errors[] = "Patient name must contain only letters.";

    }


    /* Age Validation */

    if (!isset($patient['age']) ||
        $patient['age'] === '') {

        $errors[] = "Age is required.";

    } elseif (!is_numeric($patient['age'])) {

        $errors[] = "Age must be a number.";

    } elseif ($patient['age'] < 0 ||
              $patient['age'] > 120) {

        $errors[] = "Age must be between 0 and 120.";

    }


    /* Department Validation */

    $departments = [
        "General Medicine",
        "Cardiology",
        "Neurology",
        "Orthopedics",
        "Pediatrics"
    ];

    if (!isset($patient['department']) ||
        !in_array(
            $patient['department'],
            $departments
        )) {

        $errors[] = "Invalid department selected.";

    }


    /* Patient ID Validation */

    if (!isset($patient['patient_id']) ||
        trim($patient['patient_id']) === '') {

        $errors[] = "Patient ID is required.";

    } elseif (!preg_match(
        "/^P[0-9]{4}$/",
        strtoupper(trim($patient['patient_id']))
    )) {

        $errors[] =
            "Patient ID must follow the format P1001.";

    }


    return $errors;
}


/* ---------------------------------------------------------
   PROCESS EACH PATIENT
   --------------------------------------------------------- */

foreach ($patients as $index => $patient) {

    try {

        /* Basic array check */

        if (!is_array($patient)) {

            throw new Exception(
                "Invalid patient record format."
            );

        }


        /* Clean input */

        $name = trim($patient['name'] ?? '');

        $age = $patient['age'] ?? '';

        $department =
            trim($patient['department'] ?? '');

        $patientId =
            strtoupper(
                trim($patient['patient_id'] ?? '')
            );


        /* Validate record */

        $errors = validatePatient([
            'name' => $name,
            'age' => $age,
            'department' => $department,
            'patient_id' => $patientId
        ]);


        /* ---------------------------------------------
           VALID RECORD
           --------------------------------------------- */

        if (empty($errors)) {

            $validCount++;

            $totalAge += (int)$age;


            $processedPatients[] = [

                'number' => $index + 1,

                'name' => htmlspecialchars($name),

                'age' => (int)$age,

                'department' =>
                    htmlspecialchars($department),

                'patient_id' =>
                    htmlspecialchars($patientId),

                'status' => 'Valid',

                'errors' => []

            ];

        }


        /* ---------------------------------------------
           INVALID RECORD
           --------------------------------------------- */

        else {

            $invalidCount++;


            $processedPatients[] = [

                'number' => $index + 1,

                'name' =>
                    htmlspecialchars(
                        $name !== ''
                            ? $name
                            : 'Not provided'
                    ),

                'age' =>
                    $age !== ''
                        ? htmlspecialchars($age)
                        : '—',

                'department' =>
                    $department !== ''
                        ? htmlspecialchars($department)
                        : 'Not selected',

                'patient_id' =>
                    $patientId !== ''
                        ? htmlspecialchars($patientId)
                        : 'Not provided',

                'status' => 'Invalid',

                'errors' => $errors

            ];

        }

    }


    /* -----------------------------------------------------
       EXCEPTION HANDLING
       ----------------------------------------------------- */

    catch (Exception $e) {

        $invalidCount++;


        $exceptions[] =
            "Patient " .
            ($index + 1) .
            ": " .
            $e->getMessage();


        $processedPatients[] = [

            'number' => $index + 1,

            'name' => 'Processing Error',

            'age' => '—',

            'department' => '—',

            'patient_id' => '—',

            'status' => 'Exception',

            'errors' => [
                $e->getMessage()
            ]

        ];

    }

}


/* ---------------------------------------------------------
   CALCULATE AVERAGE AGE
   --------------------------------------------------------- */

$averageAge = $validCount > 0
    ? $totalAge / $validCount
    : 0;


/* ---------------------------------------------------------
   PROCESSING STATUS
   --------------------------------------------------------- */

$totalRecords = count($processedPatients);

if ($totalRecords === 0) {

    $overallStatus = "No Records";

} elseif ($invalidCount === 0) {

    $overallStatus = "All Records Valid";

} elseif ($validCount === 0) {

    $overallStatus = "Validation Failed";

} else {

    $overallStatus = "Processing Completed";

}


/* ---------------------------------------------------------
   DEPARTMENT ANALYSIS
   --------------------------------------------------------- */

$departmentCount = [];

foreach ($processedPatients as $patient) {

    if (
        $patient['status'] === 'Valid' &&
        $patient['department'] !== '—'
    ) {

        $department =
            $patient['department'];

        if (!isset($departmentCount[$department])) {

            $departmentCount[$department] = 0;

        }

        $departmentCount[$department]++;

    }

}


/* Sort department count */

arsort($departmentCount);

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Patient Processing Report
    </title>

    <link rel="stylesheet" href="style.css">


    <style>

        /* =========================================
           RESULT PAGE
           ========================================= */

        .report-hero {

            margin-top: 20px;

            padding: 28px 32px;

            border-radius: 18px;

            background: #e5f3ef;

            border: 1px solid #d3e8e2;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

        }


        .report-hero-label {

            display: block;

            font-size: 7px;

            letter-spacing: 1.5px;

            color: #579486;

            font-weight: bold;

            margin-bottom: 8px;

        }


        .report-hero h2 {

            font-size: 28px;

            font-weight: 400;

            color: #3e4c49;

            margin-bottom: 7px;

        }


        .report-hero h2 strong {

            color: #4e9584;

        }


        .report-hero p {

            font-size: 8px;

            color: #81908c;

            line-height: 1.7;

        }


        .status-circle {

            min-width: 110px;

            height: 110px;

            border-radius: 50%;

            background: #ffffff;

            border: 8px solid #d8eee7;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            color: #579486;

            box-shadow:
                0 8px 25px rgba(70, 120, 105, .08);

        }


        .status-circle strong {

            font-size: 24px;

        }


        .status-circle span {

            font-size: 6px;

            letter-spacing: .8px;

            margin-top: 3px;

        }


        /* =========================================
           SUMMARY
           ========================================= */

        .result-summary {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 10px;

            margin-top: 17px;

        }


        .result-card {

            min-height: 105px;

            padding: 15px;

            border-radius: 12px;

            border: 1px solid;

        }


        .result-card:nth-child(1) {

            background: #edf7f4;

            border-color: #dcebe6;

        }


        .result-card:nth-child(2) {

            background: #eef7f1;

            border-color: #dceade;

        }


        .result-card:nth-child(3) {

            background: #fff2ef;

            border-color: #efddda;

        }


        .result-card:nth-child(4) {

            background: #f3f1fa;

            border-color: #e4e0ef;

        }


        .result-card label {

            display: block;

            font-size: 6px;

            letter-spacing: .8px;

            color: #87918e;

            font-weight: bold;

            margin-bottom: 9px;

        }


        .result-card strong {

            display: block;

            font-size: 19px;

            color: #53615d;

            margin-bottom: 5px;

        }


        .result-card small {

            font-size: 6px;

            color: #9ba3a0;

        }


        .result-card:nth-child(1) strong {

            color: #579486;

        }


        .result-card:nth-child(2) strong {

            color: #65966f;

        }


        .result-card:nth-child(3) strong {

            color: #bd786b;

        }


        .result-card:nth-child(4) strong {

            color: #8174ac;

        }


        /* =========================================
           PATIENT REPORT
           ========================================= */

        .patient-report {

            margin-top: 18px;

            background: #ffffff;

            border: 1px solid #dfe6e4;

            border-radius: 15px;

            padding: 21px;

        }


        .report-title {

            margin-bottom: 15px;

        }


        .report-title span {

            display: block;

            font-size: 7px;

            letter-spacing: 1.4px;

            color: #579486;

            font-weight: bold;

            margin-bottom: 5px;

        }


        .report-title h2 {

            font-size: 17px;

            color: #414d4a;

        }


        /* =========================================
           TABLE HEADER
           ========================================= */

        .patient-table-header {

            display: grid;

            grid-template-columns:
                45px 1.3fr 70px 1fr 100px 75px;

            gap: 8px;

            padding: 9px 11px;

            border-radius: 8px;

            background: #f3f6f5;

            margin-bottom: 7px;

        }


        .patient-table-header div {

            font-size: 6px;

            letter-spacing: .6px;

            color: #8a9491;

            font-weight: bold;

        }


        /* =========================================
           PATIENT ROW
           ========================================= */

        .patient-row {

            display: grid;

            grid-template-columns:
                45px 1.3fr 70px 1fr 100px 75px;

            gap: 8px;

            align-items: center;

            padding: 11px;

            border-radius: 9px;

            margin-bottom: 6px;

            border: 1px solid #e2e9e7;

            background: #f9fbfa;

        }


        .patient-row:nth-child(even) {

            background: #f5f8fa;

            border-color: #e1e8ec;

        }


        .patient-row div {

            font-size: 7px;

            color: #66736f;

        }


        .patient-row .patient-name {

            font-size: 8px;

            font-weight: bold;

            color: #4d5c58;

        }


        .patient-row .patient-number {

            margin: 0;

        }


        /* =========================================
           STATUS
           ========================================= */

        .status {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 6px 8px;

            border-radius: 15px;

            font-size: 6px;

            font-weight: bold;

        }


        .status.valid {

            background: #e5f5ed;

            color: #5a9473;

        }


        .status.invalid {

            background: #fff0ed;

            color: #b46f64;

        }


        .status.exception {

            background: #fff5e5;

            color: #ad8252;

        }


        /* =========================================
           ERROR DETAILS
           ========================================= */

        .error-details {

            margin-top: 7px;

            padding: 9px 11px;

            border-radius: 7px;

            background: #fff3f1;

            border: 1px solid #f0deda;

            grid-column: 2 / -1;

        }


        .error-details p {

            font-size: 6px;

            color: #a36e66;

            margin-bottom: 3px;

        }


        /* =========================================
           DEPARTMENT SECTION
           ========================================= */

        .department-section {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 11px;

            margin-top: 18px;

        }


        .department-card {

            background: #ffffff;

            border: 1px solid #dfe6e4;

            border-radius: 14px;

            padding: 18px;

        }


        .department-card > span {

            display: block;

            font-size: 6px;

            letter-spacing: 1px;

            color: #579486;

            font-weight: bold;

            margin-bottom: 6px;

        }


        .department-card h3 {

            font-size: 14px;

            color: #4a5854;

            margin-bottom: 13px;

        }


        .department-item {

            display: flex;

            justify-content: space-between;

            align-items: center;

            padding: 8px 0;

            border-bottom: 1px solid #edf1f0;

        }


        .department-item:last-child {

            border-bottom: none;

        }


        .department-item span {

            font-size: 7px;

            color: #78837f;

        }


        .department-count {

            min-width: 25px;

            padding: 5px 7px;

            text-align: center;

            border-radius: 6px;

            background: #e8f4f0;

            color: #579486;

            font-size: 7px;

            font-weight: bold;

        }


        /* =========================================
           EXCEPTION BOX
           ========================================= */

        .exception-box {

            margin-top: 18px;

            padding: 16px;

            border-radius: 11px;

            background: #fff6e9;

            border: 1px solid #efdfc9;

        }


        .exception-box h3 {

            font-size: 9px;

            color: #a67d50;

            margin-bottom: 7px;

        }


        .exception-box p {

            font-size: 7px;

            color: #927e68;

            margin-bottom: 4px;

        }


        /* =========================================
           RELIABILITY BOX
           ========================================= */

        .reliability {

            margin-top: 18px;

            padding: 16px;

            border-radius: 11px;

            background: #edf8f4;

            border: 1px solid #d6ebe4;

            display: flex;

            align-items: center;

            gap: 11px;

        }


        .reliability-icon {

            width: 37px;

            height: 37px;

            border-radius: 9px;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #579486;

            font-size: 14px;

            font-weight: bold;

        }


        .reliability h3 {

            font-size: 9px;

            color: #4b625c;

            margin-bottom: 4px;

        }


        .reliability p {

            font-size: 7px;

            color: #899994;

            line-height: 1.5;

        }


        /* =========================================
           ACTIONS
           ========================================= */

        .report-actions {

            display: flex;

            justify-content: center;

            gap: 10px;

            margin-top: 19px;

        }


        .report-actions a {

            text-decoration: none;

            padding: 11px 20px;

            border-radius: 8px;

            font-size: 8px;

            font-weight: bold;

        }


        .modify {

            background: #ffffff;

            border: 1px solid #d9e2df;

            color: #687571;

        }


        .modify:hover {

            background: #f3f6f5;

        }


        .process-new {

            background: #579486;

            color: #ffffff;

        }


        .process-new:hover {

            background: #477f72;

        }


        /* =========================================
           RESPONSIVE
           ========================================= */

        @media (max-width: 900px) {

            .result-summary {

                grid-template-columns:
                    repeat(2, 1fr);

            }


            .patient-table-header,
            .patient-row {

                grid-template-columns:
                    40px 1.3fr 60px 1fr 85px 70px;

            }

        }


        @media (max-width: 700px) {

            .report-hero {

                padding: 23px;

            }


            .report-hero h2 {

                font-size: 23px;

            }


            .status-circle {

                min-width: 85px;

                height: 85px;

            }


            .status-circle strong {

                font-size: 19px;

            }


            .patient-table-header {

                display: none;

            }


            .patient-row {

                grid-template-columns:
                    35px 1fr;

                gap: 8px;

            }


            .patient-row > div {

                grid-column: 2;

            }


            .patient-row .patient-number {

                grid-column: 1;

                grid-row: 1 / span 5;

            }


            .error-details {

                grid-column: 2;

            }


            .department-section {

                grid-template-columns: 1fr;

            }

        }


        @media (max-width: 500px) {

            .header {

                padding: 0 5%;

            }


            .container {

                width: 92%;

            }


            .result-summary {

                grid-template-columns: 1fr;

            }


            .report-hero {

                display: block;

            }


            .status-circle {

                margin: 20px auto 0;

            }


            .report-actions {

                flex-direction: column;

            }


            .report-actions a {

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

    <header class="header">


        <div class="brand">

            <div class="brand-icon">
                🩺
            </div>


            <div>

                <span class="eyebrow">
                    HEALTHCARE DATA SYSTEM
                </span>

                <h1>
                    Patient Processing
                </h1>

            </div>

        </div>


        <div class="status-badge">

            <span></span>

            <?php
            echo strtoupper(
                htmlspecialchars($overallStatus)
            );
            ?>

        </div>

    </header>



    <!-- =========================================
         MAIN
         ========================================= -->

    <main class="container">


        <!-- =====================================
             REPORT HERO
             ===================================== -->

        <section class="report-hero">


            <div>

                <span class="report-hero-label">
                    PROCESSING REPORT
                </span>


                <h2>

                    Patient records
                    <strong>
                        processed.
                    </strong>

                </h2>


                <p>

                    All submitted records were checked
                    using validation rules and exception
                    handling mechanisms.

                </p>

            </div>


            <div class="status-circle">

                <strong>

                    <?php
                    echo $totalRecords;
                    ?>

                </strong>

                <span>
                    RECORDS
                </span>

            </div>


        </section>



        <!-- =====================================
             SUMMARY CARDS
             ===================================== -->

        <section class="result-summary">


            <div class="result-card">

                <label>
                    TOTAL RECORDS
                </label>

                <strong>

                    <?php
                    echo $totalRecords;
                    ?>

                </strong>

                <small>
                    Records received
                </small>

            </div>



            <div class="result-card">

                <label>
                    VALID RECORDS
                </label>

                <strong>

                    <?php
                    echo $validCount;
                    ?>

                </strong>

                <small>
                    Successfully validated
                </small>

            </div>



            <div class="result-card">

                <label>
                    INVALID RECORDS
                </label>

                <strong>

                    <?php
                    echo $invalidCount;
                    ?>

                </strong>

                <small>
                    Require correction
                </small>

            </div>



            <div class="result-card">

                <label>
                    AVERAGE AGE
                </label>

                <strong>

                    <?php
                    echo number_format(
                        $averageAge,
                        1
                    );
                    ?>

                </strong>

                <small>
                    Valid patient records
                </small>

            </div>


        </section>



        <!-- =====================================
             PATIENT REPORT
             ===================================== -->

        <section class="patient-report">


            <div class="report-title">

                <span>
                    VALIDATION RESULTS
                </span>

                <h2>
                    Patient Record Analysis
                </h2>

            </div>



            <!-- TABLE HEADER -->

            <div class="patient-table-header">

                <div>
                    NO.
                </div>

                <div>
                    PATIENT
                </div>

                <div>
                    AGE
                </div>

                <div>
                    DEPARTMENT
                </div>

                <div>
                    PATIENT ID
                </div>

                <div>
                    STATUS
                </div>

            </div>



            <!-- PATIENT RECORDS -->

            <?php if (!empty($processedPatients)): ?>


                <?php foreach (
                    $processedPatients
                    as $patient
                ): ?>


                    <div class="patient-row">


                        <div class="patient-number">

                            <?php

                            echo str_pad(
                                $patient['number'],
                                2,
                                '0',
                                STR_PAD_LEFT
                            );

                            ?>

                        </div>


                        <div class="patient-name">

                            <?php
                            echo $patient['name'];
                            ?>

                        </div>


                        <div>

                            <?php
                            echo $patient['age'];
                            ?>

                        </div>


                        <div>

                            <?php
                            echo $patient['department'];
                            ?>

                        </div>


                        <div>

                            <?php
                            echo $patient['patient_id'];
                            ?>

                        </div>


                        <div>

                            <?php

                            if (
                                $patient['status']
                                === 'Valid'
                            ) {

                                echo
                                '<span class="status valid">
                                    ✓ VALID
                                </span>';

                            } elseif (
                                $patient['status']
                                === 'Exception'
                            ) {

                                echo
                                '<span class="status exception">
                                    ! EXCEPTION
                                </span>';

                            } else {

                                echo
                                '<span class="status invalid">
                                    ✕ INVALID
                                </span>';

                            }

                            ?>

                        </div>



                        <!-- ERROR DETAILS -->

                        <?php

                        if (
                            !empty(
                                $patient['errors']
                            )
                        ):

                        ?>

                            <div class="error-details">

                                <?php

                                foreach (
                                    $patient['errors']
                                    as $error
                                ):

                                ?>

                                    <p>
                                        •
                                        <?php
                                        echo htmlspecialchars(
                                            $error
                                        );
                                        ?>
                                    </p>

                                <?php endforeach; ?>

                            </div>

                        <?php endif; ?>


                    </div>


                <?php endforeach; ?>


            <?php else: ?>


                <div class="patient-row">

                    <div class="patient-name">

                        No patient records were submitted.

                    </div>

                </div>


            <?php endif; ?>


        </section>



        <!-- =====================================
             DEPARTMENT ANALYSIS
             ===================================== -->

        <section class="department-section">


            <div class="department-card">

                <span>
                    DEPARTMENT ANALYSIS
                </span>

                <h3>
                    Valid Patients by Department
                </h3>


                <?php

                if (!empty($departmentCount)):

                    foreach (
                        $departmentCount
                        as $department => $count
                    ):

                ?>

                    <div class="department-item">

                        <span>

                            <?php
                            echo htmlspecialchars(
                                $department
                            );
                            ?>

                        </span>


                        <div class="department-count">

                            <?php
                            echo $count;
                            ?>

                        </div>

                    </div>

                <?php

                    endforeach;

                else:

                ?>

                    <div class="department-item">

                        <span>
                            No valid department data
                        </span>

                    </div>

                <?php endif; ?>


            </div>



            <!-- PROCESSING SUMMARY -->

            <div class="department-card">

                <span>
                    SYSTEM SUMMARY
                </span>

                <h3>
                    Processing Information
                </h3>


                <div class="department-item">

                    <span>
                        Records Received
                    </span>

                    <div class="department-count">

                        <?php
                        echo $totalRecords;
                        ?>

                    </div>

                </div>


                <div class="department-item">

                    <span>
                        Successfully Validated
                    </span>

                    <div class="department-count">

                        <?php
                        echo $validCount;
                        ?>

                    </div>

                </div>


                <div class="department-item">

                    <span>
                        Records With Issues
                    </span>

                    <div class="department-count">

                        <?php
                        echo $invalidCount;
                        ?>

                    </div>

                </div>


            </div>


        </section>



        <!-- =====================================
             EXCEPTIONS
             ===================================== -->

        <?php if (!empty($exceptions)): ?>


            <section class="exception-box">

                <h3>
                    ⚠ Exceptions Handled
                </h3>


                <?php foreach (
                    $exceptions
                    as $exception
                ): ?>

                    <p>

                        <?php
                        echo htmlspecialchars(
                            $exception
                        );
                        ?>

                    </p>

                <?php endforeach; ?>


            </section>


        <?php endif; ?>



        <!-- =====================================
             RELIABILITY MESSAGE
             ===================================== -->

        <section class="reliability">


            <div class="reliability-icon">
                ✓
            </div>


            <div>

                <h3>
                    Reliable Processing Completed
                </h3>

                <p>

                    Validation errors and processing
                    exceptions were handled safely.
                    The application continued processing
                    the remaining patient records.

                </p>

            </div>


        </section>



        <!-- =====================================
             ACTION BUTTONS
             ===================================== -->

        <div class="report-actions">


            <a
                href="index.php"
                class="modify"
            >
                ← Modify Patient Records
            </a>


            <a
                href="index.php"
                class="process-new"
            >
                Process New Records →
            </a>


        </div>



        <!-- =====================================
             FOOTER
             ===================================== -->

        <footer>

            PHP PRACTICAL

            <span>•</span>

            PATIENT DATA PROCESSING

            <span>•</span>

            VALIDATION & EXCEPTION HANDLING

        </footer>


    </main>

</div>


</body>

</html>