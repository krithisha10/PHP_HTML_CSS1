<?php

/* =========================================
   GET LOAN DETAILS
   ========================================= */

$loanAmount = isset($_POST["loan_amount"])
    ? (float) $_POST["loan_amount"]
    : 0;

$interestRate = isset($_POST["interest_rate"])
    ? (float) $_POST["interest_rate"]
    : 0;

$tenureYears = isset($_POST["tenure"])
    ? (int) $_POST["tenure"]
    : 0;


/* =========================================
   VALIDATION
   ========================================= */

if ($loanAmount <= 0 || $interestRate < 0 || $tenureYears <= 0) {

    die("
        <div style='
            font-family: Arial;
            text-align:center;
            margin-top:100px;
        '>

            <h2>Invalid Loan Details</h2>

            <p>Please enter valid loan information.</p>

            <a href='index.php'>
                ← Go Back
            </a>

        </div>
    ");

}


/* =========================================
   LOAN CALCULATIONS
   ========================================= */

$months = $tenureYears * 12;


/* Monthly interest rate */

$monthlyRate = $interestRate / (12 * 100);


/* =========================================
   EMI CALCULATION
   ========================================= */

if ($monthlyRate == 0) {

    $emi = $loanAmount / $months;

} else {

    $power = pow(1 + $monthlyRate, $months);

    $emi = ($loanAmount * $monthlyRate * $power)
         / ($power - 1);

}


/* =========================================
   TOTAL AMOUNTS
   ========================================= */

$totalPayment = $emi * $months;

$totalInterest = $totalPayment - $loanAmount;


/* =========================================
   REPAYMENT SCHEDULE
   ========================================= */

$balance = $loanAmount;

$schedule = [];


for ($month = 1; $month <= $months; $month++) {

    /* Calculate monthly interest */

    $interest = $balance * $monthlyRate;


    /* Calculate principal */

    $principal = $emi - $interest;


    /* Prevent negative balance */

    if ($principal > $balance) {

        $principal = $balance;

    }


    /* Calculate remaining balance */

    $balance = $balance - $principal;


    if ($balance < 0) {

        $balance = 0;

    }


    $schedule[] = [

        "month" => $month,

        "emi" => $emi,

        "principal" => $principal,

        "interest" => $interest,

        "balance" => $balance

    ];

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Loan Repayment Report</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family: Arial, Helvetica, sans-serif;

            background: #f5f7f6;

            color: #35433f;

            min-height: 100vh;
        }


        .page {

            width: 100%;

            padding: 30px 6% 25px;
        }


        /* =================================
           HEADER
           ================================= */

        .header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 22px;
        }


        .brand {

            display: flex;

            align-items: center;

            gap: 13px;
        }


        .brand-icon {

            width: 52px;
            height: 52px;

            border-radius: 14px;

            background: #dcefe7;

            color: #43866a;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 23px;

            font-weight: bold;
        }


        .small-label {

            display: block;

            font-size: 8px;

            letter-spacing: 1.7px;

            color: #4b8a70;

            font-weight: bold;

            margin-bottom: 5px;
        }


        .header h1 {

            font-size: 24px;

            color: #35433f;
        }


        .badge {

            padding: 9px 13px;

            background: #ffffff;

            border: 1px solid #dce5e1;

            border-radius: 8px;

            color: #52816d;

            font-size: 8px;

            font-weight: bold;

            letter-spacing: 1px;
        }


        /* =================================
           HERO
           ================================= */

        .hero {

            background: #e3eee9;

            border-radius: 18px;

            padding: 27px 32px;

            min-height: 145px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            position: relative;

            overflow: hidden;

            margin-bottom: 20px;
        }


        .hero::after {

            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            border-radius: 50%;

            right: -70px;
            top: -110px;

            background: rgba(255,255,255,.35);
        }


        .hero-text {

            position: relative;

            z-index: 2;
        }


        .hero-text span {

            font-size: 8px;

            letter-spacing: 2px;

            color: #43836a;

            font-weight: bold;
        }


        .hero-text h2 {

            font-size: 26px;

            color: #354941;

            margin-top: 7px;

            margin-bottom: 7px;
        }


        .hero-text p {

            font-size: 9px;

            color: #6e7e77;
        }


        .hero-icon {

            position: relative;

            z-index: 2;

            width: 72px;
            height: 72px;

            border-radius: 50%;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #4b8b70;

            font-size: 27px;

            font-weight: bold;
        }


        /* =================================
           SUMMARY
           ================================= */

        .summary {

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 13px;

            margin-bottom: 23px;
        }


        .summary-card {

            min-height: 105px;

            padding: 17px;

            border-radius: 12px;

            position: relative;

            overflow: hidden;
        }


        .summary-card:nth-child(1) {

            background: #e4f1eb;

            border-top: 4px solid #5b9c7b;
        }


        .summary-card:nth-child(2) {

            background: #eee9f4;

            border-top: 4px solid #8c78a5;
        }


        .summary-card:nth-child(3) {

            background: #faeee0;

            border-top: 4px solid #d29458;
        }


        .summary-card:nth-child(4) {

            background: #e6eff5;

            border-top: 4px solid #7198b2;
        }


        .summary-card span {

            display: block;

            font-size: 7px;

            letter-spacing: 1px;

            color: #78847f;

            font-weight: bold;

            margin-bottom: 8px;
        }


        .summary-card strong {

            font-size: 22px;

            color: #3c4b46;
        }


        .summary-card small {

            display: block;

            margin-top: 5px;

            font-size: 7px;

            color: #8b9691;
        }


        /* =================================
           LOAN DETAILS
           ================================= */

        .details {

            background: #ffffff;

            border: 1px solid #e1e8e4;

            border-radius: 14px;

            padding: 21px;

            margin-bottom: 20px;
        }


        .section-label {

            font-size: 7px;

            letter-spacing: 1.6px;

            color: #4b8a70;

            font-weight: bold;

            margin-bottom: 5px;
        }


        .details h2 {

            font-size: 18px;

            color: #384841;

            margin-bottom: 16px;
        }


        .detail-grid {

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 12px;
        }


        .detail {

            padding: 13px;

            background: #f7f9f8;

            border-radius: 9px;

            border: 1px solid #e4eae7;
        }


        .detail span {

            display: block;

            font-size: 7px;

            color: #89938f;

            letter-spacing: .8px;

            font-weight: bold;

            margin-bottom: 5px;
        }


        .detail strong {

            font-size: 12px;

            color: #4a5752;
        }


        /* =================================
           SCHEDULE
           ================================= */

        .schedule-title {

            margin-bottom: 14px;
        }


        .schedule-title span {

            display: block;

            font-size: 7px;

            letter-spacing: 1.6px;

            color: #4b8a70;

            font-weight: bold;

            margin-bottom: 5px;
        }


        .schedule-title h2 {

            font-size: 19px;

            color: #384841;
        }


        .schedule {

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 12px;
        }


        .month-card {

            background: #ffffff;

            border: 1px solid #e2e8e5;

            border-radius: 11px;

            padding: 15px;

            box-shadow: 0 5px 15px rgba(50,70,60,.035);

            transition: .2s ease;
        }


        .month-card:hover {

            transform: translateY(-2px);

            box-shadow: 0 8px 18px rgba(50,70,60,.07);
        }


        .month-top {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 13px;
        }


        .month-number {

            width: 34px;
            height: 34px;

            border-radius: 8px;

            background: #e3f0e9;

            color: #4b896c;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 8px;

            font-weight: bold;
        }


        .month-label {

            font-size: 7px;

            color: #9aa39f;

            letter-spacing: .8px;

            font-weight: bold;
        }


        .payment {

            margin-bottom: 12px;

            padding-bottom: 10px;

            border-bottom: 1px solid #edf0ee;
        }


        .payment span {

            display: block;

            font-size: 7px;

            color: #929b97;

            margin-bottom: 4px;
        }


        .payment strong {

            font-size: 15px;

            color: #405049;
        }


        .breakdown {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 8px;
        }


        .part {

            padding: 9px;

            border-radius: 7px;
        }


        .part.principal {

            background: #e8f3ed;
        }


        .part.interest {

            background: #f3ebf5;
        }


        .part span {

            display: block;

            font-size: 6px;

            color: #89938e;

            margin-bottom: 4px;
        }


        .part strong {

            font-size: 9px;

            color: #53615b;
        }


        .balance {

            margin-top: 8px;

            padding: 9px;

            border-radius: 7px;

            background: #f5f7f6;
        }


        .balance span {

            font-size: 6px;

            color: #8c9691;
        }


        .balance strong {

            float: right;

            font-size: 8px;

            color: #53615b;
        }


        /* =================================
           SHOW MORE NOTE
           ================================= */

        .schedule-note {

            margin-top: 17px;

            padding: 13px 16px;

            background: #f1f7f4;

            border: 1px solid #dfeae4;

            border-radius: 9px;

            text-align: center;

            font-size: 8px;

            color: #77857e;
        }


        /* =================================
           BUTTON
           ================================= */

        .action {

            text-align: center;

            margin-top: 20px;
        }


        .back-button {

            display: inline-block;

            text-decoration: none;

            background: #4d8c70;

            color: #ffffff;

            padding: 12px 22px;

            border-radius: 8px;

            font-size: 9px;

            font-weight: bold;

            transition: .2s ease;
        }


        .back-button:hover {

            background: #3e765d;

            transform: translateY(-2px);
        }


        /* =================================
           FOOTER
           ================================= */

        footer {

            text-align: center;

            margin-top: 20px;

            padding-top: 12px;

            border-top: 1px solid #dfe6e2;

            font-size: 8px;

            color: #9ba4a0;
        }


        /* =================================
           RESPONSIVE
           ================================= */

        @media (max-width: 950px) {

            .summary {

                grid-template-columns: repeat(2, 1fr);
            }

            .schedule {

                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 700px) {

            .page {

                padding: 22px 5%;
            }

            .badge {

                display: none;
            }

            .detail-grid {

                grid-template-columns: 1fr;
            }

            .schedule {

                grid-template-columns: 1fr;
            }

            .hero-icon {

                display: none;
            }

        }


        @media (max-width: 500px) {

            .summary {

                grid-template-columns: 1fr;
            }

            .header h1 {

                font-size: 20px;
            }

            .hero-text h2 {

                font-size: 22px;
            }

            .calculator {

                padding: 18px;
            }

        }

    </style>

</head>


<body>


<div class="page">


    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="brand-icon">
                ₹
            </div>

            <div>

                <span class="small-label">
                    FINANCIAL PLANNER
                </span>

                <h1>
                    Loan Repayment Report
                </h1>

            </div>

        </div>


        <div class="badge">
            CALCULATION COMPLETE
        </div>

    </header>



    <!-- HERO -->

    <section class="hero">

        <div class="hero-text">

            <span>
                LOAN ANALYSIS
            </span>

            <h2>
                Your Repayment Summary
            </h2>

            <p>
                EMI and repayment details calculated from
                the information you provided.
            </p>

        </div>


        <div class="hero-icon">
            ₹
        </div>

    </section>



    <!-- SUMMARY CARDS -->

    <section class="summary">


        <div class="summary-card">

            <span>
                MONTHLY EMI
            </span>

            <strong>
                ₹<?= number_format($emi, 2) ?>
            </strong>

            <small>
                Monthly payment
            </small>

        </div>



        <div class="summary-card">

            <span>
                TOTAL INTEREST
            </span>

            <strong>
                ₹<?= number_format($totalInterest, 2) ?>
            </strong>

            <small>
                Interest payable
            </small>

        </div>



        <div class="summary-card">

            <span>
                TOTAL PAYMENT
            </span>

            <strong>
                ₹<?= number_format($totalPayment, 2) ?>
            </strong>

            <small>
                Principal + Interest
            </small>

        </div>



        <div class="summary-card">

            <span>
                LOAN TENURE
            </span>

            <strong>
                <?= $tenureYears ?>
            </strong>

            <small>
                Years (<?= $months ?> months)
            </small>

        </div>


    </section>



    <!-- LOAN DETAILS -->

    <section class="details">

        <div class="section-label">
            LOAN INFORMATION
        </div>

        <h2>
            Entered Loan Details
        </h2>


        <div class="detail-grid">


            <div class="detail">

                <span>
                    LOAN AMOUNT
                </span>

                <strong>
                    ₹<?= number_format($loanAmount, 2) ?>
                </strong>

            </div>


            <div class="detail">

                <span>
                    ANNUAL INTEREST RATE
                </span>

                <strong>
                    <?= number_format($interestRate, 2) ?>%
                </strong>

            </div>


            <div class="detail">

                <span>
                    REPAYMENT PERIOD
                </span>

                <strong>
                    <?= $tenureYears ?> Years
                </strong>

            </div>


        </div>

    </section>



    <!-- REPAYMENT SCHEDULE -->

    <section>

        <div class="schedule-title">

            <span>
                MONTHLY BREAKDOWN
            </span>

            <h2>
                Repayment Schedule
            </h2>

        </div>


        <div class="schedule">


            <?php foreach ($schedule as $payment): ?>

                <div class="month-card">


                    <div class="month-top">

                        <div class="month-number">

                            M<?= $payment["month"] ?>

                        </div>

                        <div class="month-label">

                            MONTH <?= $payment["month"] ?>

                        </div>

                    </div>


                    <div class="payment">

                        <span>
                            MONTHLY PAYMENT
                        </span>

                        <strong>
                            ₹<?= number_format($payment["emi"], 2) ?>
                        </strong>

                    </div>


                    <div class="breakdown">


                        <div class="part principal">

                            <span>
                                PRINCIPAL
                            </span>

                            <strong>
                                ₹<?= number_format(
                                    $payment["principal"],
                                    2
                                ) ?>
                            </strong>

                        </div>


                        <div class="part interest">

                            <span>
                                INTEREST
                            </span>

                            <strong>
                                ₹<?= number_format(
                                    $payment["interest"],
                                    2
                                ) ?>
                            </strong>

                        </div>


                    </div>


                    <div class="balance">

                        <span>
                            REMAINING BALANCE
                        </span>

                        <strong>
                            ₹<?= number_format(
                                $payment["balance"],
                                2
                            ) ?>
                        </strong>

                    </div>


                </div>

            <?php endforeach; ?>


        </div>



        <div class="schedule-note">

            ✓ Complete <?= $months ?>-month repayment schedule generated successfully.

        </div>


    </section>



    <!-- ACTION -->

    <div class="action">

        <a href="index.php"
           class="back-button">

            ← Calculate Another Loan

        </a>

    </div>



    <!-- FOOTER -->

    <footer>

        PHP Practical • Loan Repayment Calculator • Mathematical Functions

    </footer>


</div>


</body>

</html>