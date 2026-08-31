<?php

/* =====================================================
   GET CUSTOMER DATA
   ===================================================== */

$customers = $_POST["customers"] ?? [];


/* =====================================================
   REGULAR EXPRESSION PATTERNS
   ===================================================== */

/* Customer Name - letters and spaces only */
$namePattern = "/^[A-Za-z ]+$/";

/* Phone Number - exactly 10 digits */
$phonePattern = "/^[0-9]{10}$/";

/* Email ID */
$emailPattern = "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/";

/* Account Number - exactly 10 digits */
$accountPattern = "/^[0-9]{10}$/";


/* =====================================================
   RESULT ARRAYS
   ===================================================== */

$results = [];

$validCustomers = 0;

$invalidCustomers = 0;


/* =====================================================
   VALIDATE EACH CUSTOMER
   ===================================================== */

foreach ($customers as $customer) {

    $name = trim($customer["name"] ?? "");

    $phone = trim($customer["phone"] ?? "");

    $email = trim($customer["email"] ?? "");

    $account = trim($customer["account"] ?? "");


    /* ---------------------------------------------
       VALIDATE NAME
       --------------------------------------------- */

    $nameValid = preg_match($namePattern, $name);


    /* ---------------------------------------------
       VALIDATE PHONE
       --------------------------------------------- */

    $phoneValid = preg_match($phonePattern, $phone);


    /* ---------------------------------------------
       VALIDATE EMAIL
       --------------------------------------------- */

    $emailValid = preg_match($emailPattern, $email);


    /* ---------------------------------------------
       VALIDATE ACCOUNT NUMBER
       --------------------------------------------- */

    $accountValid = preg_match($accountPattern, $account);


    /* ---------------------------------------------
       CHECK CUSTOMER STATUS
       --------------------------------------------- */

    $customerValid =
        $nameValid &&
        $phoneValid &&
        $emailValid &&
        $accountValid;


    if ($customerValid) {

        $validCustomers++;

    } else {

        $invalidCustomers++;

    }


    /* ---------------------------------------------
       STORE RESULT
       --------------------------------------------- */

    $results[] = [

        "name" => $name,

        "phone" => $phone,

        "email" => $email,

        "account" => $account,

        "nameValid" => $nameValid,

        "phoneValid" => $phoneValid,

        "emailValid" => $emailValid,

        "accountValid" => $accountValid,

        "customerValid" => $customerValid

    ];

}


$totalCustomers = count($results);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Customer Validation Report</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family: Arial, Helvetica, sans-serif;

            background: #f5f8fc;

            color: #303b4a;

            min-height: 100vh;
        }


        .page {

            width: 100%;

            padding: 32px 6% 25px;
        }


        /* =========================================
           HEADER
           ========================================= */

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


        .brand-icon {

            width: 54px;
            height: 54px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 15px;

            background: #dcebf9;

            color: #397bb2;

            font-size: 25px;

            font-weight: bold;
        }


        .small-label {

            display: block;

            font-size: 8px;

            letter-spacing: 1.8px;

            font-weight: bold;

            color: #4b82b2;

            margin-bottom: 5px;
        }


        .header h1 {

            font-size: 25px;

            color: #303b4a;
        }


        .header p {

            font-size: 9px;

            color: #9099a4;

            margin-top: 5px;
        }


        .status {

            padding: 9px 13px;

            border-radius: 8px;

            font-size: 8px;

            font-weight: bold;

            letter-spacing: 1px;

            background: #e5f4eb;

            color: #4d9068;
        }


        /* =========================================
           HERO
           ========================================= */

        .hero {

            background: #dcebf8;

            border-radius: 18px;

            padding: 27px 32px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 20px;

            position: relative;

            overflow: hidden;
        }


        .hero::after {

            content: "✓";

            position: absolute;

            right: 7%;

            top: -45px;

            font-size: 160px;

            font-weight: bold;

            color: rgba(70, 115, 150, .07);
        }


        .hero-text {

            position: relative;

            z-index: 2;
        }


        .hero-text span {

            font-size: 8px;

            letter-spacing: 2px;

            font-weight: bold;

            color: #4176a4;
        }


        .hero-text h2 {

            font-size: 23px;

            color: #344657;

            margin-top: 7px;

            margin-bottom: 5px;
        }


        .hero-text p {

            font-size: 9px;

            color: #687b8c;
        }


        .hero-icon {

            position: relative;

            z-index: 2;

            width: 70px;
            height: 70px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #ffffff;

            color: #4f8ab8;

            font-size: 27px;

            font-weight: bold;
        }


        /* =========================================
           STATISTICS
           ========================================= */

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

            background: #e8f1fa;
        }


        .stat:nth-child(2) {

            background: #e5f4eb;
        }


        .stat:nth-child(3) {

            background: #fbe9e5;
        }


        .stat span {

            display: block;

            font-size: 8px;

            font-weight: bold;

            letter-spacing: 1px;

            color: #777f88;

            margin-bottom: 8px;
        }


        .stat strong {

            font-size: 27px;

            color: #3d4854;
        }


        .stat-icon {

            position: absolute;

            right: 16px;

            bottom: 9px;

            font-size: 26px;

            opacity: .45;
        }


        /* =========================================
           REPORT
           ========================================= */

        .report-heading {

            margin-bottom: 14px;
        }


        .report-heading span {

            display: block;

            font-size: 8px;

            letter-spacing: 1.6px;

            font-weight: bold;

            color: #4c82ae;

            margin-bottom: 5px;
        }


        .report-heading h2 {

            font-size: 19px;

            color: #354250;
        }


        /* =========================================
           CUSTOMER RESULT CARD
           ========================================= */

        .customer-result {

            background: #ffffff;

            border: 1px solid #e1e8ef;

            border-radius: 13px;

            margin-bottom: 15px;

            padding: 18px;

            position: relative;

            overflow: hidden;

            box-shadow:
                0 5px 15px rgba(50, 75, 100, .035);
        }


        .customer-result.valid {

            border-left: 4px solid #65a984;
        }


        .customer-result.invalid {

            border-left: 4px solid #d87969;
        }


        .customer-title {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 16px;
        }


        .customer-name {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .person {

            width: 40px;
            height: 40px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #eaf3fa;

            border-radius: 9px;

            font-size: 17px;
        }


        .customer-name small {

            display: block;

            font-size: 7px;

            color: #9aa2aa;

            letter-spacing: 1px;

            font-weight: bold;

            margin-bottom: 4px;
        }


        .customer-name h3 {

            font-size: 13px;

            color: #3d4854;
        }


        .status-badge {

            padding: 7px 10px;

            border-radius: 6px;

            font-size: 7px;

            font-weight: bold;

            letter-spacing: .8px;
        }


        .valid-badge {

            background: #e5f4eb;

            color: #4c9068;
        }


        .invalid-badge {

            background: #fbe9e5;

            color: #c66d5e;
        }


        /* =========================================
           FIELD RESULTS
           ========================================= */

        .field-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 10px;
        }


        .field {

            border: 1px solid #e6ebef;

            border-radius: 9px;

            padding: 11px;

            background: #fafcfe;

            position: relative;
        }


        .field.valid {

            background: #f5fbf7;

            border-color: #d9ecdf;
        }


        .field.invalid {

            background: #fff8f6;

            border-color: #f1dcd7;
        }


        .field-label {

            display: block;

            font-size: 7px;

            letter-spacing: .8px;

            font-weight: bold;

            color: #89929b;

            margin-bottom: 6px;
        }


        .field-value {

            font-size: 9px;

            color: #4a5560;

            word-break: break-word;

            padding-right: 25px;
        }


        .check {

            position: absolute;

            right: 9px;

            top: 10px;

            width: 18px;
            height: 18px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 9px;

            font-weight: bold;
        }


        .field.valid .check {

            background: #dcefe3;

            color: #4d9068;
        }


        .field.invalid .check {

            background: #f7ddd8;

            color: #c66d5e;
        }


        /* =========================================
           RULE INFORMATION
           ========================================= */

        .regex-box {

            background: #eef5fa;

            border: 1px solid #dce8f1;

            border-radius: 11px;

            padding: 15px 18px;

            margin-top: 22px;

            display: flex;

            align-items: center;

            gap: 12px;
        }


        .regex-symbol {

            width: 40px;
            height: 40px;

            min-width: 40px;

            border-radius: 9px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #ffffff;

            color: #4f83ad;

            font-weight: bold;

            font-size: 11px;
        }


        .regex-box span {

            display: block;

            font-size: 7px;

            letter-spacing: 1px;

            color: #4c82ae;

            font-weight: bold;

            margin-bottom: 4px;
        }


        .regex-box p {

            font-size: 8px;

            color: #7d8993;

        }


        /* =========================================
           BUTTON
           ========================================= */

        .action {

            text-align: center;

            margin-top: 21px;
        }


        .back-button {

            display: inline-block;

            text-decoration: none;

            background: #4f84b0;

            color: #ffffff;

            padding: 11px 21px;

            border-radius: 8px;

            font-size: 9px;

            font-weight: bold;

            transition: .2s ease;
        }


        .back-button:hover {

            background: #3f719b;

            transform: translateY(-2px);
        }


        /* =========================================
           FOOTER
           ========================================= */

        footer {

            text-align: center;

            border-top: 1px solid #e2e8ee;

            margin-top: 22px;

            padding-top: 13px;

            font-size: 8px;

            color: #9aa2aa;
        }


        /* =========================================
           RESPONSIVE
           ========================================= */

        @media (max-width: 900px) {

            .field-grid {

                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 650px) {

            .page {

                padding: 25px 5% 20px;
            }


            .header {

                align-items: flex-start;
            }


            .status {

                display: none;
            }


            .hero {

                padding: 24px;

            }


            .hero-icon {

                width: 55px;
                height: 55px;

                font-size: 22px;
            }


            .stats {

                grid-template-columns: 1fr;
            }


            .field-grid {

                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 450px) {

            .header h1 {

                font-size: 20px;
            }


            .hero-icon {

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

            <div class="brand-icon">
                ✓
            </div>

            <div>

                <span class="small-label">
                    CUSTOMER VERIFICATION
                </span>

                <h1>
                    Validation Report
                </h1>

                <p>
                    Regular Expression Analysis
                </p>

            </div>

        </div>


        <div class="status">
            VALIDATION COMPLETE
        </div>

    </header>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-text">

            <span>
                CUSTOMER DATA CHECK
            </span>

            <h2>
                Customer Information Results
            </h2>

            <p>
                Name, phone, email and account number
                have been validated using regular expressions.
            </p>

        </div>


        <div class="hero-icon">
            ✓
        </div>

    </section>


    <!-- STATISTICS -->

    <section class="stats">


        <div class="stat">

            <span>
                CUSTOMERS CHECKED
            </span>

            <strong>
                <?= $totalCustomers ?>
            </strong>

            <div class="stat-icon">
                👥
            </div>

        </div>


        <div class="stat">

            <span>
                FULLY VALID
            </span>

            <strong>
                <?= $validCustomers ?>
            </strong>

            <div class="stat-icon">
                ✓
            </div>

        </div>


        <div class="stat">

            <span>
                NEEDS ATTENTION
            </span>

            <strong>
                <?= $invalidCustomers ?>
            </strong>

            <div class="stat-icon">
                !
            </div>

        </div>


    </section>


    <!-- REPORT -->

    <div class="report-heading">

        <span>
            DETAILED VALIDATION
        </span>

        <h2>
            Customer Validation Results
        </h2>

    </div>


    <!-- CUSTOMER RESULTS -->

    <?php foreach ($results as $index => $result): ?>


        <div class="customer-result
            <?= $result["customerValid"] ? "valid" : "invalid" ?>">


            <div class="customer-title">

                <div class="customer-name">

                    <div class="person">
                        👤
                    </div>

                    <div>

                        <small>
                            CUSTOMER <?= $index + 1 ?>
                        </small>

                        <h3>
                            <?= htmlspecialchars($result["name"]) ?>
                        </h3>

                    </div>

                </div>


                <?php if ($result["customerValid"]): ?>

                    <div class="status-badge valid-badge">
                        ALL DETAILS VALID
                    </div>

                <?php else: ?>

                    <div class="status-badge invalid-badge">
                        CHECK DETAILS
                    </div>

                <?php endif; ?>


            </div>


            <div class="field-grid">


                <!-- NAME -->

                <div class="field
                    <?= $result["nameValid"] ? "valid" : "invalid" ?>">

                    <span class="field-label">
                        CUSTOMER NAME
                    </span>

                    <div class="field-value">
                        <?= htmlspecialchars($result["name"]) ?>
                    </div>

                    <div class="check">

                        <?= $result["nameValid"] ? "✓" : "!" ?>

                    </div>

                </div>


                <!-- PHONE -->

                <div class="field
                    <?= $result["phoneValid"] ? "valid" : "invalid" ?>">

                    <span class="field-label">
                        PHONE NUMBER
                    </span>

                    <div class="field-value">
                        <?= htmlspecialchars($result["phone"]) ?>
                    </div>

                    <div class="check">

                        <?= $result["phoneValid"] ? "✓" : "!" ?>

                    </div>

                </div>


                <!-- EMAIL -->

                <div class="field
                    <?= $result["emailValid"] ? "valid" : "invalid" ?>">

                    <span class="field-label">
                        EMAIL ID
                    </span>

                    <div class="field-value">
                        <?= htmlspecialchars($result["email"]) ?>
                    </div>

                    <div class="check">

                        <?= $result["emailValid"] ? "✓" : "!" ?>

                    </div>

                </div>


                <!-- ACCOUNT -->

                <div class="field
                    <?= $result["accountValid"] ? "valid" : "invalid" ?>">

                    <span class="field-label">
                        ACCOUNT NUMBER
                    </span>

                    <div class="field-value">
                        <?= htmlspecialchars($result["account"]) ?>
                    </div>

                    <div class="check">

                        <?= $result["accountValid"] ? "✓" : "!" ?>

                    </div>

                </div>


            </div>


        </div>


    <?php endforeach; ?>


    <!-- REGEX INFORMATION -->

    <div class="regex-box">

        <div class="regex-symbol">
            .*
        </div>

        <div>

            <span>
                REGULAR EXPRESSION VALIDATION
            </span>

            <p>
                Four predefined patterns were used to validate
                customer name, phone number, email ID and account number.
            </p>

        </div>

    </div>


    <!-- ACTION -->

    <div class="action">

        <a href="index.php" class="back-button">
            ← Validate Another Set
        </a>

    </div>


    <!-- FOOTER -->

    <footer>

        PHP Practical • Customer Information Validation Using Regular Expressions

    </footer>


</div>


</body>

</html>