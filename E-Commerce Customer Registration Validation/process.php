<?php

/* =========================================
   GET CUSTOMER DATA
   ========================================= */

$customer = $_POST["customer"] ?? [];

$name = trim($customer["name"] ?? "");
$email = trim($customer["email"] ?? "");
$phone = trim($customer["phone"] ?? "");
$username = trim($customer["username"] ?? "");
$password = $customer["password"] ?? "";


/* =========================================
   REGULAR EXPRESSION PATTERNS
   ========================================= */

/* Name - alphabets and spaces only */
$namePattern = "/^[A-Za-z ]+$/";

/* Email - standard email format */
$emailPattern = "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/";

/* Phone - exactly 10 digits */
$phonePattern = "/^[0-9]{10}$/";

/* Username - starts with letter, 4-15 characters */
$usernamePattern = "/^[A-Za-z][A-Za-z0-9_]{3,14}$/";

/*
   Password:
   At least 8 characters
   At least one uppercase letter
   At least one lowercase letter
   At least one digit
   At least one special character
*/
$passwordPattern =
    "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,}$/";


/* =========================================
   VALIDATION
   ========================================= */

$nameValid =
    preg_match($namePattern, $name);

$emailValid =
    preg_match($emailPattern, $email);

$phoneValid =
    preg_match($phonePattern, $phone);

$usernameValid =
    preg_match($usernamePattern, $username);

$passwordValid =
    preg_match($passwordPattern, $password);


/* =========================================
   TOTAL VALIDATION
   ========================================= */

$validFields = 0;

if ($nameValid) {
    $validFields++;
}

if ($emailValid) {
    $validFields++;
}

if ($phoneValid) {
    $validFields++;
}

if ($usernameValid) {
    $validFields++;
}

if ($passwordValid) {
    $validFields++;
}


$allValid = ($validFields == 5);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Registration Validation Report</title>


    <style>

        /* =========================================
           GENERAL
           ========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family: Arial, Helvetica, sans-serif;

            background: #f8f6f3;

            color: #39343a;

            min-height: 100vh;
        }


        .page {

            width: 100%;

            padding: 28px 6% 22px;
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

            gap: 13px;
        }


        .brand-icon {

            width: 52px;
            height: 52px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: #f5d9d0;

            color: #a85e52;

            font-size: 22px;
        }


        .mini-title {

            display: block;

            font-size: 8px;

            letter-spacing: 1.8px;

            font-weight: bold;

            color: #a36b61;

            margin-bottom: 5px;
        }


        .header h1 {

            font-size: 24px;

            color: #39343a;
        }


        .status-badge {

            padding: 9px 13px;

            border-radius: 8px;

            font-size: 8px;

            font-weight: bold;

            letter-spacing: .8px;
        }


        .status-success {

            background: #e4f3e9;

            color: #568968;
        }


        .status-warning {

            background: #fbe8e3;

            color: #b9675c;
        }


        /* =========================================
           HERO
           ========================================= */

        .hero {

            background: #eee3f2;

            border-radius: 18px;

            padding: 29px 32px;

            min-height: 160px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            position: relative;

            overflow: hidden;

            margin-bottom: 20px;
        }


        .hero::before {

            content: "";

            position: absolute;

            width: 220px;

            height: 220px;

            border-radius: 50%;

            background: rgba(255,255,255,.30);

            right: -65px;

            top: -100px;
        }


        .hero-content {

            position: relative;

            z-index: 2;
        }


        .hero-content span {

            font-size: 8px;

            letter-spacing: 1.8px;

            font-weight: bold;

            color: #876795;
        }


        .hero-content h2 {

            font-size: 25px;

            color: #403748;

            margin-top: 7px;

            margin-bottom: 7px;
        }


        .hero-content p {

            font-size: 9px;

            color: #756b7b;
        }


        .hero-icon {

            position: relative;

            z-index: 2;

            width: 72px;

            height: 72px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #ffffff;

            font-size: 28px;

            box-shadow:
                0 8px 20px rgba(80,60,80,.08);
        }


        /* =========================================
           SUMMARY
           ========================================= */

        .summary {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 13px;

            margin-bottom: 24px;
        }


        .summary-card {

            min-height: 90px;

            border-radius: 12px;

            padding: 16px;

            position: relative;

            overflow: hidden;
        }


        .summary-card:nth-child(1) {

            background: #f5e8f7;
        }


        .summary-card:nth-child(2) {

            background: #e5f3e9;
        }


        .summary-card:nth-child(3) {

            background: #fae9e3;
        }


        .summary-card span {

            display: block;

            font-size: 7px;

            letter-spacing: 1px;

            font-weight: bold;

            color: #81777f;

            margin-bottom: 7px;
        }


        .summary-card strong {

            font-size: 27px;

            color: #413b42;
        }


        .summary-icon {

            position: absolute;

            right: 16px;

            bottom: 8px;

            font-size: 25px;

            opacity: .45;
        }


        /* =========================================
           REPORT HEADING
           ========================================= */

        .report-heading {

            margin-bottom: 13px;
        }


        .report-heading span {

            display: block;

            font-size: 7px;

            letter-spacing: 1.7px;

            font-weight: bold;

            color: #a36b61;

            margin-bottom: 5px;
        }


        .report-heading h2 {

            font-size: 19px;

            color: #403b40;
        }


        /* =========================================
           VALIDATION CARD
           ========================================= */

        .validation-card {

            background: #ffffff;

            border: 1px solid #e7dfdb;

            border-radius: 13px;

            padding: 18px;

            margin-bottom: 13px;

            box-shadow:
                0 5px 15px rgba(70,60,55,.035);
        }


        .validation-card.valid {

            border-left: 4px solid #65a984;
        }


        .validation-card.invalid {

            border-left: 4px solid #d27b6e;
        }


        .card-top {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 14px;
        }


        .field-title {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .field-icon {

            width: 38px;

            height: 38px;

            border-radius: 9px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #eee5f2;

            color: #806291;

            font-size: 14px;

            font-weight: bold;
        }


        .validation-card:nth-child(2)
        .field-icon {

            background: #fae8e4;

            color: #bd7065;
        }


        .validation-card:nth-child(3)
        .field-icon {

            background: #e6f2eb;

            color: #5f9274;
        }


        .validation-card:nth-child(4)
        .field-icon {

            background: #e6eff7;

            color: #5c82a3;
        }


        .validation-card:nth-child(5)
        .field-icon {

            background: #f8eedf;

            color: #b3874d;
        }


        .field-title small {

            display: block;

            font-size: 7px;

            color: #a29a97;

            letter-spacing: .8px;

            font-weight: bold;

            margin-bottom: 3px;
        }


        .field-title h3 {

            font-size: 12px;

            color: #494246;
        }


        .result-badge {

            padding: 7px 10px;

            border-radius: 6px;

            font-size: 7px;

            font-weight: bold;

            letter-spacing: .7px;
        }


        .valid-badge {

            background: #e4f3e9;

            color: #568968;
        }


        .invalid-badge {

            background: #fae7e2;

            color: #b9675c;
        }


        /* =========================================
           VALUE AREA
           ========================================= */

        .value-area {

            display: grid;

            grid-template-columns: 1fr auto;

            align-items: center;

            gap: 15px;

            background: #fbfaf9;

            border: 1px solid #eee8e4;

            border-radius: 8px;

            padding: 11px 13px;
        }


        .value {

            font-size: 9px;

            color: #554e51;

            word-break: break-word;
        }


        .value.invalid-value {

            color: #b5675e;
        }


        .check-icon {

            width: 25px;

            height: 25px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 11px;

            font-weight: bold;
        }


        .check-valid {

            background: #e1f1e7;

            color: #568968;
        }


        .check-invalid {

            background: #fae1dc;

            color: #b9675c;
        }


        /* =========================================
           RULE MESSAGE
           ========================================= */

        .rule-message {

            margin-top: 8px;

            font-size: 7px;

            color: #99918e;
        }


        .invalid-message {

            color: #b66b62;
        }


        /* =========================================
           FINAL RESULT
           ========================================= */

        .final-result {

            border-radius: 13px;

            padding: 18px 20px;

            display: flex;

            align-items: center;

            gap: 13px;

            margin-top: 20px;
        }


        .final-success {

            background: #e5f4eb;

            border: 1px solid #d4eadc;
        }


        .final-warning {

            background: #fae9e4;

            border: 1px solid #efd8d2;
        }


        .final-icon {

            width: 43px;

            height: 43px;

            min-width: 43px;

            border-radius: 50%;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;

            font-weight: bold;
        }


        .final-success .final-icon {

            color: #568968;
        }


        .final-warning .final-icon {

            color: #b9675c;
        }


        .final-result strong {

            display: block;

            font-size: 11px;

            margin-bottom: 4px;

            color: #4b4548;
        }


        .final-result p {

            font-size: 8px;

            color: #817977;

            line-height: 1.4;
        }


        /* =========================================
           BUTTON
           ========================================= */

        .action {

            text-align: center;

            margin-top: 20px;
        }


        .back-button {

            display: inline-block;

            text-decoration: none;

            padding: 11px 21px;

            border-radius: 8px;

            background: #a5685d;

            color: #ffffff;

            font-size: 9px;

            font-weight: bold;

            transition: .2s ease;
        }


        .back-button:hover {

            background: #8e574e;

            transform: translateY(-2px);

            box-shadow:
                0 7px 16px rgba(140,80,70,.15);
        }


        /* =========================================
           FOOTER
           ========================================= */

        footer {

            text-align: center;

            border-top: 1px solid #e4deda;

            padding-top: 12px;

            margin-top: 21px;

            font-size: 8px;

            color: #a39b98;
        }


        /* =========================================
           RESPONSIVE
           ========================================= */

        @media (max-width: 700px) {

            .page {

                padding: 22px 5% 20px;
            }


            .summary {

                grid-template-columns: 1fr;
            }


            .hero-icon {

                display: none;
            }

        }


        @media (max-width: 500px) {

            .header {

                align-items: flex-start;
            }


            .status-badge {

                display: none;
            }


            .card-top {

                align-items: flex-start;

                gap: 10px;
            }


            .value-area {

                grid-template-columns: 1fr;
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
                🛍️
            </div>

            <div>

                <span class="mini-title">
                    E-COMMERCE PORTAL
                </span>

                <h1>
                    Registration Report
                </h1>

            </div>

        </div>


        <?php if ($allValid): ?>

            <div class="status-badge status-success">
                REGISTRATION VALID
            </div>

        <?php else: ?>

            <div class="status-badge status-warning">
                REVIEW REQUIRED
            </div>

        <?php endif; ?>

    </header>



    <!-- =========================================
         HERO
         ========================================= -->

    <section class="hero">

        <div class="hero-content">

            <span>
                CUSTOMER ACCOUNT VERIFICATION
            </span>

            <h2>
                Registration Validation Report
            </h2>

            <p>
                Your entered information has been examined
                using predefined regular expression rules.
            </p>

        </div>


        <div class="hero-icon">

            <?php if ($allValid): ?>

                ✓

            <?php else: ?>

                !

            <?php endif; ?>

        </div>

    </section>



    <!-- =========================================
         SUMMARY
         ========================================= -->

    <section class="summary">


        <div class="summary-card">

            <span>
                FIELDS CHECKED
            </span>

            <strong>
                5
            </strong>

            <div class="summary-icon">
                ✓
            </div>

        </div>



        <div class="summary-card">

            <span>
                VALID FIELDS
            </span>

            <strong>
                <?= $validFields ?>
            </strong>

            <div class="summary-icon">
                ✔
            </div>

        </div>



        <div class="summary-card">

            <span>
                INVALID FIELDS
            </span>

            <strong>
                <?= 5 - $validFields ?>
            </strong>

            <div class="summary-icon">
                !
            </div>

        </div>


    </section>



    <!-- =========================================
         REPORT HEADING
         ========================================= -->

    <div class="report-heading">

        <span>
            FIELD-BY-FIELD ANALYSIS
        </span>

        <h2>
            Registration Details
        </h2>

    </div>



    <!-- =========================================
         NAME
         ========================================= -->

    <div class="validation-card
        <?= $nameValid ? 'valid' : 'invalid' ?>">

        <div class="card-top">

            <div class="field-title">

                <div class="field-icon">
                    A
                </div>

                <div>

                    <small>
                        FIELD 01
                    </small>

                    <h3>
                        Customer Name
                    </h3>

                </div>

            </div>


            <?php if ($nameValid): ?>

                <div class="result-badge valid-badge">
                    ✓ VALID
                </div>

            <?php else: ?>

                <div class="result-badge invalid-badge">
                    ✕ INVALID
                </div>

            <?php endif; ?>

        </div>


        <div class="value-area">

            <div class="value
                <?= !$nameValid ? 'invalid-value' : '' ?>">

                <?= htmlspecialchars($name) ?>

            </div>

            <div class="check-icon
                <?= $nameValid ? 'check-valid' : 'check-invalid' ?>">

                <?= $nameValid ? '✓' : '!' ?>

            </div>

        </div>


        <?php if ($nameValid): ?>

            <p class="rule-message">
                ✓ Contains alphabets and spaces only.
            </p>

        <?php else: ?>

            <p class="rule-message invalid-message">
                ✕ Name must contain alphabets and spaces only.
            </p>

        <?php endif; ?>

    </div>



    <!-- =========================================
         EMAIL
         ========================================= -->

    <div class="validation-card
        <?= $emailValid ? 'valid' : 'invalid' ?>">

        <div class="card-top">

            <div class="field-title">

                <div class="field-icon">
                    @
                </div>

                <div>

                    <small>
                        FIELD 02
                    </small>

                    <h3>
                        Email Address
                    </h3>

                </div>

            </div>


            <?php if ($emailValid): ?>

                <div class="result-badge valid-badge">
                    ✓ VALID
                </div>

            <?php else: ?>

                <div class="result-badge invalid-badge">
                    ✕ INVALID
                </div>

            <?php endif; ?>

        </div>


        <div class="value-area">

            <div class="value
                <?= !$emailValid ? 'invalid-value' : '' ?>">

                <?= htmlspecialchars($email) ?>

            </div>

            <div class="check-icon
                <?= $emailValid ? 'check-valid' : 'check-invalid' ?>">

                <?= $emailValid ? '✓' : '!' ?>

            </div>

        </div>


        <?php if ($emailValid): ?>

            <p class="rule-message">
                ✓ Entered email follows a valid email format.
            </p>

        <?php else: ?>

            <p class="rule-message invalid-message">
                ✕ Please enter a valid email address.
            </p>

        <?php endif; ?>

    </div>



    <!-- =========================================
         PHONE
         ========================================= -->

    <div class="validation-card
        <?= $phoneValid ? 'valid' : 'invalid' ?>">

        <div class="card-top">

            <div class="field-title">

                <div class="field-icon">
                    #
                </div>

                <div>

                    <small>
                        FIELD 03
                    </small>

                    <h3>
                        Phone Number
                    </h3>

                </div>

            </div>


            <?php if ($phoneValid): ?>

                <div class="result-badge valid-badge">
                    ✓ VALID
                </div>

            <?php else: ?>

                <div class="result-badge invalid-badge">
                    ✕ INVALID
                </div>

            <?php endif; ?>

        </div>


        <div class="value-area">

            <div class="value
                <?= !$phoneValid ? 'invalid-value' : '' ?>">

                <?= htmlspecialchars($phone) ?>

            </div>

            <div class="check-icon
                <?= $phoneValid ? 'check-valid' : 'check-invalid' ?>">

                <?= $phoneValid ? '✓' : '!' ?>

            </div>

        </div>


        <?php if ($phoneValid): ?>

            <p class="rule-message">
                ✓ Phone number contains exactly 10 digits.
            </p>

        <?php else: ?>

            <p class="rule-message invalid-message">
                ✕ Phone number must contain exactly 10 digits.
            </p>

        <?php endif; ?>

    </div>



    <!-- =========================================
         USERNAME
         ========================================= -->

    <div class="validation-card
        <?= $usernameValid ? 'valid' : 'invalid' ?>">

        <div class="card-top">

            <div class="field-title">

                <div class="field-icon">
                    U
                </div>

                <div>

                    <small>
                        FIELD 04
                    </small>

                    <h3>
                        Username
                    </h3>

                </div>

            </div>


            <?php if ($usernameValid): ?>

                <div class="result-badge valid-badge">
                    ✓ VALID
                </div>

            <?php else: ?>

                <div class="result-badge invalid-badge">
                    ✕ INVALID
                </div>

            <?php endif; ?>

        </div>


        <div class="value-area">

            <div class="value
                <?= !$usernameValid ? 'invalid-value' : '' ?>">

                <?= htmlspecialchars($username) ?>

            </div>

            <div class="check-icon
                <?= $usernameValid ? 'check-valid' : 'check-invalid' ?>">

                <?= $usernameValid ? '✓' : '!' ?>

            </div>

        </div>


        <?php if ($usernameValid): ?>

            <p class="rule-message">
                ✓ Username starts with a letter and contains
                4–15 valid characters.
            </p>

        <?php else: ?>

            <p class="rule-message invalid-message">
                ✕ Username must start with a letter and contain
                4–15 letters, numbers or underscores.
            </p>

        <?php endif; ?>

    </div>



    <!-- =========================================
         PASSWORD
         ========================================= -->

    <div class="validation-card
        <?= $passwordValid ? 'valid' : 'invalid' ?>">

        <div class="card-top">

            <div class="field-title">

                <div class="field-icon">
                    *
                </div>

                <div>

                    <small>
                        FIELD 05
                    </small>

                    <h3>
                        Password
                    </h3>

                </div>

            </div>


            <?php if ($passwordValid): ?>

                <div class="result-badge valid-badge">
                    ✓ VALID
                </div>

            <?php else: ?>

                <div class="result-badge invalid-badge">
                    ✕ INVALID
                </div>

            <?php endif; ?>

        </div>


        <div class="value-area">

            <div class="value
                <?= !$passwordValid ? 'invalid-value' : '' ?>">

                <?= str_repeat("•", strlen($password)) ?>

            </div>

            <div class="check-icon
                <?= $passwordValid ? 'check-valid' : 'check-invalid' ?>">

                <?= $passwordValid ? '✓' : '!' ?>

            </div>

        </div>


        <?php if ($passwordValid): ?>

            <p class="rule-message">
                ✓ Password satisfies all predefined security rules.
            </p>

        <?php else: ?>

            <p class="rule-message invalid-message">
                ✕ Password must contain 8+ characters, uppercase,
                lowercase, number and special character.
            </p>

        <?php endif; ?>

    </div>



    <!-- =========================================
         FINAL RESULT
         ========================================= -->

    <?php if ($allValid): ?>

        <div class="final-result final-success">

            <div class="final-icon">
                ✓
            </div>

            <div>

                <strong>
                    Registration Details Approved
                </strong>

                <p>
                    All 5 registration fields passed the
                    predefined regular expression validation.
                    The customer information is valid.
                </p>

            </div>

        </div>

    <?php else: ?>

        <div class="final-result final-warning">

            <div class="final-icon">
                !
            </div>

            <div>

                <strong>
                    Registration Requires Correction
                </strong>

                <p>
                    <?= 5 - $validFields ?>
                    field(s) failed validation.
                    Please correct the highlighted information
                    and submit the registration again.
                </p>

            </div>

        </div>

    <?php endif; ?>



    <!-- =========================================
         ACTION
         ========================================= -->

    <div class="action">

        <a href="index.php"
           class="back-button">

            ← Back to Registration

        </a>

    </div>



    <!-- =========================================
         FOOTER
         ========================================= -->

    <footer>

        PHP Practical • E-Commerce Customer Registration Validation

    </footer>


</div>


</body>

</html>