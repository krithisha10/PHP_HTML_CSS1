<?php

/* =====================================================
   GET EMPLOYEE RECORDS
   ===================================================== */

$employees = $_POST["employees"] ?? [];


/* =====================================================
   REGULAR EXPRESSION PATTERN
   ===================================================== */

$emailPattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";


/* =====================================================
   ARRAYS FOR RESULTS
   ===================================================== */

$validEmails = [];

$invalidEmails = [];


/* =====================================================
   VALIDATE EMAILS USING REGEX
   ===================================================== */

foreach ($employees as $employee) {

    $name = trim($employee["name"] ?? "");

    $email = trim($employee["email"] ?? "");


    if (preg_match($emailPattern, $email)) {

        $validEmails[] = [
            "name" => $name,
            "email" => $email
        ];

    } else {

        $invalidEmails[] = [
            "name" => $name,
            "email" => $email
        ];

    }

}


/* =====================================================
   COUNTS
   ===================================================== */

$totalEmployees = count($employees);

$validCount = count($validEmails);

$invalidCount = count($invalidEmails);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Email Validation Report</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family: Arial, Helvetica, sans-serif;

            background: #f7f5fc;

            color: #383440;

            min-height: 100vh;
        }


        .page {

            width: 100%;

            padding: 32px 6% 25px;
        }


        /* HEADER */

        .header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;
        }


        .brand {

            display: flex;

            align-items: center;

            gap: 14px;
        }


        .mail-icon {

            width: 54px;
            height: 54px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #e8e1f7;

            color: #7957ad;

            border-radius: 15px;

            font-size: 25px;
        }


        .label {

            display: block;

            font-size: 8px;

            letter-spacing: 1.8px;

            color: #8063ae;

            font-weight: bold;

            margin-bottom: 5px;
        }


        .header h1 {

            font-size: 25px;

            color: #383440;
        }


        .header p {

            font-size: 9px;

            color: #96909e;

            margin-top: 5px;
        }


        .status {

            background: #e9f5ed;

            color: #4e8b65;

            padding: 9px 13px;

            border-radius: 8px;

            font-size: 8px;

            font-weight: bold;

            letter-spacing: 1px;
        }


        /* REPORT HERO */

        .report-hero {

            background: #ddd4ef;

            border-radius: 17px;

            padding: 27px 30px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 20px;

            position: relative;

            overflow: hidden;
        }


        .report-hero::after {

            content: "@";

            position: absolute;

            right: 9%;

            top: -35px;

            font-size: 145px;

            font-weight: bold;

            color: rgba(90, 65, 115, .07);
        }


        .hero-text {

            position: relative;

            z-index: 2;
        }


        .hero-text span {

            font-size: 8px;

            letter-spacing: 2px;

            font-weight: bold;

            color: #7655a2;
        }


        .hero-text h2 {

            font-size: 22px;

            color: #41384b;

            margin-top: 7px;

            margin-bottom: 5px;
        }


        .hero-text p {

            font-size: 9px;

            color: #766d7c;
        }


        .regex-symbol {

            position: relative;

            z-index: 2;

            width: 70px;
            height: 70px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #ffffff;

            color: #8060ad;

            font-size: 21px;

            font-weight: bold;
        }


        /* STATISTICS */

        .stats {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 13px;

            margin-bottom: 25px;
        }


        .stat {

            min-height: 92px;

            padding: 17px;

            border-radius: 12px;

            position: relative;

            overflow: hidden;
        }


        .stat:nth-child(1) {

            background: #eee8f8;
        }


        .stat:nth-child(2) {

            background: #e5f4ea;
        }


        .stat:nth-child(3) {

            background: #fdebe7;
        }


        .stat span {

            display: block;

            font-size: 8px;

            font-weight: bold;

            letter-spacing: 1px;

            color: #77717d;

            margin-bottom: 9px;
        }


        .stat strong {

            font-size: 27px;

            color: #413a47;
        }


        .stat-icon {

            position: absolute;

            right: 15px;

            bottom: 9px;

            font-size: 25px;

            opacity: .45;
        }


        /* RESULT HEADING */

        .result-heading {

            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            margin-bottom: 14px;
        }


        .result-heading span {

            display: block;

            font-size: 8px;

            letter-spacing: 1.6px;

            color: #8060aa;

            font-weight: bold;

            margin-bottom: 5px;
        }


        .result-heading h2 {

            font-size: 19px;

            color: #403847;
        }


        .result-count {

            background: #eee8f8;

            color: #7658a0;

            padding: 7px 10px;

            border-radius: 6px;

            font-size: 8px;

            font-weight: bold;
        }


        /* EMAIL RESULT GRID */

        .email-grid {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 14px;

            margin-bottom: 25px;
        }


        .email-card {

            background: #ffffff;

            border: 1px solid #e5dfeb;

            border-radius: 13px;

            padding: 17px;

            display: flex;

            align-items: center;

            gap: 13px;

            position: relative;

            overflow: hidden;

            transition: .2s ease;
        }


        .email-card:hover {

            transform: translateY(-3px);

            box-shadow:
                0 9px 20px rgba(65, 45, 90, .07);
        }


        .email-card::before {

            content: "";

            position: absolute;

            left: 0;
            top: 0;

            width: 4px;
            height: 100%;

            background: #65a77c;
        }


        .invalid-card::before {

            background: #d87969;
        }


        .email-icon {

            width: 46px;
            height: 46px;

            min-width: 46px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: #e7f4eb;

            color: #5d9973;

            font-size: 18px;
        }


        .invalid-card .email-icon {

            background: #fde9e5;

            color: #c66d5e;
        }


        .email-info {

            min-width: 0;
        }


        .email-info small {

            display: block;

            font-size: 7px;

            color: #9b939f;

            letter-spacing: 1px;

            font-weight: bold;

            margin-bottom: 5px;
        }


        .email-info h3 {

            font-size: 12px;

            color: #433b48;

            margin-bottom: 5px;
        }


        .email-info p {

            font-size: 9px;

            color: #77707c;

            word-break: break-all;
        }


        .valid-badge {

            margin-left: auto;

            background: #e7f4eb;

            color: #57906c;

            padding: 5px 7px;

            border-radius: 5px;

            font-size: 7px;

            font-weight: bold;
        }


        .invalid-badge {

            margin-left: auto;

            background: #fde9e5;

            color: #c56b5d;

            padding: 5px 7px;

            border-radius: 5px;

            font-size: 7px;

            font-weight: bold;
        }


        /* EMPTY */

        .empty {

            background: #ffffff;

            border: 1px solid #e5dfeb;

            border-radius: 13px;

            padding: 35px;

            text-align: center;

            margin-bottom: 25px;
        }


        .empty-icon {

            font-size: 27px;

            margin-bottom: 9px;
        }


        .empty h3 {

            font-size: 15px;

            color: #443b48;

            margin-bottom: 5px;
        }


        .empty p {

            font-size: 9px;

            color: #99919d;
        }


        /* BACK BUTTON */

        .action {

            text-align: center;

            margin-top: 5px;
        }


        .back-button {

            display: inline-block;

            text-decoration: none;

            background: #8060ad;

            color: #ffffff;

            padding: 11px 21px;

            border-radius: 8px;

            font-size: 9px;

            font-weight: bold;

            transition: .2s ease;
        }


        .back-button:hover {

            background: #6d4e99;

            transform: translateY(-2px);
        }


        /* FOOTER */

        footer {

            text-align: center;

            border-top: 1px solid #e5dfeb;

            margin-top: 22px;

            padding-top: 13px;

            font-size: 8px;

            color: #9c96a2;
        }


        /* RESPONSIVE */

        @media (max-width: 800px) {

            .email-grid {

                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 650px) {

            .stats {

                grid-template-columns: 1fr;
            }


            .report-hero {

                align-items: flex-start;
            }


            .regex-symbol {

                width: 55px;
                height: 55px;
            }

        }


        @media (max-width: 450px) {

            .header h1 {

                font-size: 20px;
            }


            .status {

                display: none;
            }


            .regex-symbol {

                display: none;
            }

        }

    </style>

</head>


<body>


<div class="page">


    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="mail-icon">
                ✉
            </div>

            <div>

                <span class="label">
                    EMPLOYEE MAIL SYSTEM
                </span>

                <h1>
                    Email Validation Report
                </h1>

                <p>
                    Regular Expression Analysis
                </p>

            </div>

        </div>


        <div class="status">
            SCAN COMPLETE
        </div>

    </header>


    <!-- REPORT HERO -->

    <section class="report-hero">

        <div class="hero-text">

            <span>
                REGEX ANALYSIS
            </span>

            <h2>
                Email Extraction Results
            </h2>

            <p>
                Employee email addresses have been checked
                using a regular expression pattern.
            </p>

        </div>


        <div class="regex-symbol">
            .*
        </div>

    </section>


    <!-- STATISTICS -->

    <section class="stats">


        <div class="stat">

            <span>
                EMPLOYEES SCANNED
            </span>

            <strong>
                <?= $totalEmployees ?>
            </strong>

            <div class="stat-icon">
                👥
            </div>

        </div>


        <div class="stat">

            <span>
                VALID EMAILS
            </span>

            <strong>
                <?= $validCount ?>
            </strong>

            <div class="stat-icon">
                ✓
            </div>

        </div>


        <div class="stat">

            <span>
                INVALID EMAILS
            </span>

            <strong>
                <?= $invalidCount ?>
            </strong>

            <div class="stat-icon">
                !
            </div>

        </div>


    </section>


    <!-- VALID EMAILS -->

    <?php if ($validCount > 0): ?>


        <section>

            <div class="result-heading">

                <div>

                    <span>
                        IDENTIFIED ADDRESSES
                    </span>

                    <h2>
                        Valid Email Addresses
                    </h2>

                </div>

                <div class="result-count">
                    <?= $validCount ?> VALID
                </div>

            </div>


            <div class="email-grid">


                <?php foreach ($validEmails as $employee): ?>

                    <div class="email-card">

                        <div class="email-icon">
                            ✓
                        </div>

                        <div class="email-info">

                            <small>
                                EMPLOYEE
                            </small>

                            <h3>
                                <?= htmlspecialchars($employee["name"]) ?>
                            </h3>

                            <p>
                                <?= htmlspecialchars($employee["email"]) ?>
                            </p>

                        </div>

                        <div class="valid-badge">
                            VALID
                        </div>

                    </div>

                <?php endforeach; ?>


            </div>

        </section>


    <?php endif; ?>


    <!-- INVALID EMAILS -->

    <?php if ($invalidCount > 0): ?>


        <section>

            <div class="result-heading">

                <div>

                    <span>
                        VALIDATION ALERT
                    </span>

                    <h2>
                        Invalid Email Addresses
                    </h2>

                </div>

                <div class="result-count">
                    <?= $invalidCount ?> INVALID
                </div>

            </div>


            <div class="email-grid">


                <?php foreach ($invalidEmails as $employee): ?>

                    <div class="email-card invalid-card">

                        <div class="email-icon">
                            !
                        </div>

                        <div class="email-info">

                            <small>
                                EMPLOYEE
                            </small>

                            <h3>
                                <?= htmlspecialchars($employee["name"]) ?>
                            </h3>

                            <p>
                                <?= htmlspecialchars($employee["email"]) ?>
                            </p>

                        </div>

                        <div class="invalid-badge">
                            INVALID
                        </div>

                    </div>

                <?php endforeach; ?>


            </div>

        </section>


    <?php endif; ?>


    <!-- NO RESULTS -->

    <?php if ($totalEmployees == 0): ?>

        <div class="empty">

            <div class="empty-icon">
                📭
            </div>

            <h3>
                No Employee Records
            </h3>

            <p>
                No employee email information was submitted.
            </p>

        </div>

    <?php endif; ?>


    <!-- BACK -->

    <div class="action">

        <a href="index.php" class="back-button">
            ← Scan Another Set
        </a>

    </div>


    <!-- FOOTER -->

    <footer>

        PHP Practical • Email Address Extraction Using Regular Expressions

    </footer>


</div>


</body>

</html>