<?php

/* =========================================================
   PAYROLL EXCEPTION HANDLING
   ========================================================= */


/* ---------------------------------------------------------
   CUSTOM PAYROLL EXCEPTION
   --------------------------------------------------------- */

class PayrollException extends Exception
{
}


/* ---------------------------------------------------------
   GET INPUT VALUES
   --------------------------------------------------------- */

$name = trim($_POST["name"] ?? "");
$employee_id = trim($_POST["employee_id"] ?? "");

$basicInput = $_POST["basic_salary"] ?? "";
$allowanceInput = $_POST["allowance"] ?? "";
$deductionInput = $_POST["deduction"] ?? "";


/* ---------------------------------------------------------
   VARIABLES
   --------------------------------------------------------- */

$success = false;

$errorType = "";

$message = "";

$basic = 0;
$allowance = 0;
$deduction = 0;

$grossSalary = 0;
$netSalary = 0;


/* =========================================================
   PAYROLL PROCESSING
   ========================================================= */

try {

    /* -----------------------------------------------------
       VALIDATE EMPLOYEE NAME
       ----------------------------------------------------- */

    if ($name === "") {

        throw new PayrollException(
            "Employee name cannot be empty."
        );

    }


    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $name)) {

        throw new PayrollException(
            "Employee name contains invalid characters."
        );

    }


    /* -----------------------------------------------------
       VALIDATE EMPLOYEE ID
       ----------------------------------------------------- */

    if ($employee_id === "") {

        throw new PayrollException(
            "Employee ID cannot be empty."
        );

    }


    if (!preg_match("/^EMP[0-9]{3,6}$/i", $employee_id)) {

        throw new PayrollException(
            "Invalid Employee ID. Use a format such as EMP101."
        );

    }


    /* -----------------------------------------------------
       VALIDATE BASIC SALARY
       ----------------------------------------------------- */

    if (
        $basicInput === "" ||
        !is_numeric($basicInput)
    ) {

        throw new PayrollException(
            "Basic salary must be a valid number."
        );

    }


    $basic = floatval($basicInput);


    if ($basic <= 0) {

        throw new PayrollException(
            "Basic salary must be greater than zero."
        );

    }


    /* -----------------------------------------------------
       VALIDATE ALLOWANCE
       ----------------------------------------------------- */

    if (
        $allowanceInput === "" ||
        !is_numeric($allowanceInput)
    ) {

        throw new PayrollException(
            "Allowance must be a valid number."
        );

    }


    $allowance = floatval($allowanceInput);


    if ($allowance < 0) {

        throw new PayrollException(
            "Allowance cannot be negative."
        );

    }


    /* -----------------------------------------------------
       VALIDATE DEDUCTION
       ----------------------------------------------------- */

    if (
        $deductionInput === "" ||
        !is_numeric($deductionInput)
    ) {

        throw new PayrollException(
            "Deduction must be a valid number."
        );

    }


    $deduction = floatval($deductionInput);


    if ($deduction < 0) {

        throw new PayrollException(
            "Deduction cannot be negative."
        );

    }


    /* -----------------------------------------------------
       CALCULATE GROSS SALARY
       ----------------------------------------------------- */

    $grossSalary = $basic + $allowance;


    if ($grossSalary <= 0) {

        throw new PayrollException(
            "Gross salary calculation resulted in an invalid value."
        );

    }


    /* -----------------------------------------------------
       CHECK DEDUCTION
       ----------------------------------------------------- */

    if ($deduction > $grossSalary) {

        throw new PayrollException(
            "Deduction cannot be greater than gross salary."
        );

    }


    /* -----------------------------------------------------
       CALCULATE NET SALARY
       ----------------------------------------------------- */

    $netSalary = $grossSalary - $deduction;


    /* -----------------------------------------------------
       ROUND VALUES
       ----------------------------------------------------- */

    $basic = round($basic, 2);

    $allowance = round($allowance, 2);

    $deduction = round($deduction, 2);

    $grossSalary = round($grossSalary, 2);

    $netSalary = round($netSalary, 2);


    /* -----------------------------------------------------
       SUCCESS
       ----------------------------------------------------- */

    $success = true;

    $message =
        "Payroll processed successfully for "
        . $name . ".";

}


/* =========================================================
   CUSTOM PAYROLL EXCEPTION
   ========================================================= */

catch (PayrollException $e) {

    $success = false;

    $errorType = "Payroll Validation Error";

    $message = $e->getMessage();

}


/* =========================================================
   DIVISION BY ZERO
   ========================================================= */

catch (DivisionByZeroError $e) {

    $success = false;

    $errorType = "Calculation Error";

    $message =
        "A division-by-zero error was detected and "
        . "prevented safely.";

}


/* =========================================================
   GENERAL RUNTIME ERROR
   ========================================================= */

catch (Throwable $e) {

    $success = false;

    $errorType = "Runtime Exception";

    $message =
        "An unexpected runtime error occurred. "
        . "Payroll processing was safely stopped.";

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Payroll Processing Result
    </title>


    <style>

        /* =========================================
           RESET
           ========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =========================================
           BODY
           ========================================= */

        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f6f5f2;

            color: #3e4548;

            min-height: 100vh;

        }


        /* =========================================
           HEADER
           ========================================= */

        .header {

            width: 100%;

            height: 76px;

            background: #ffffff;

            border-bottom:
                1px solid #e5e3df;

            padding: 0 7%;

            display: flex;

            align-items: center;

            justify-content: space-between;

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .logo {

            width: 43px;
            height: 43px;

            border-radius: 11px;

            background: #f0e8dc;

            color: #a67d4d;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 21px;

            font-weight: bold;

        }


        .brand span {

            display: block;

            font-size: 7px;

            letter-spacing: 1.5px;

            color: #a17e53;

            font-weight: bold;

            margin-bottom: 4px;

        }


        .brand h1 {

            font-size: 18px;

            color: #394247;

        }


        .status {

            padding: 8px 13px;

            border-radius: 20px;

            font-size: 7px;

            font-weight: bold;

            letter-spacing: .8px;

        }


        .status.success {

            background: #eef6ef;

            border: 1px solid #dce9df;

            color: #648b6e;

        }


        .status.error {

            background: #fff0ed;

            border: 1px solid #efdcd7;

            color: #b47468;

        }


        /* =========================================
           MAIN
           ========================================= */

        main {

            width: 86%;

            max-width: 1080px;

            margin: 25px auto 35px;

        }


        /* =========================================
           RESULT HERO
           ========================================= */

        .result-hero {

            min-height: 180px;

            padding: 28px 32px;

            border-radius: 18px;

            background: #f1ebe3;

            border: 1px solid #e7ddd0;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 18px;

        }


        .result-label {

            display: block;

            font-size: 7px;

            letter-spacing: 1.6px;

            color: #a17d51;

            font-weight: bold;

            margin-bottom: 8px;

        }


        .result-hero h2 {

            font-size: 28px;

            color: #3f484c;

            margin-bottom: 8px;

        }


        .result-hero p {

            font-size: 9px;

            color: #85847f;

        }


        .result-symbol {

            width: 75px;

            height: 75px;

            border-radius: 50%;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 30px;

            font-weight: bold;

            box-shadow:
                0 10px 25px
                rgba(80, 65, 50, .08);

        }


        .result-symbol.success {

            color: #62966e;

        }


        .result-symbol.error {

            color: #b87469;

        }


        /* =========================================
           MESSAGE
           ========================================= */

        .message {

            padding: 15px 17px;

            border-radius: 11px;

            margin-bottom: 18px;

            display: flex;

            align-items: center;

            gap: 11px;

        }


        .message.success {

            background: #edf7ef;

            border: 1px solid #d8eadc;

        }


        .message.error {

            background: #fff1ef;

            border: 1px solid #efdcd8;

        }


        .message-icon {

            width: 31px;

            height: 31px;

            border-radius: 50%;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: bold;

        }


        .message.success .message-icon {

            color: #5d956b;

        }


        .message.error .message-icon {

            color: #b57168;

        }


        .message strong {

            display: block;

            font-size: 8px;

            margin-bottom: 3px;

        }


        .message span {

            font-size: 8px;

            color: #858b8b;

        }


        /* =========================================
           EMPLOYEE INFORMATION
           ========================================= */

        .panel {

            background: #ffffff;

            border: 1px solid #e2e1de;

            border-radius: 15px;

            padding: 21px;

            margin-bottom: 18px;

        }


        .heading {

            margin-bottom: 15px;

        }


        .heading span {

            display: block;

            font-size: 7px;

            letter-spacing: 1.4px;

            color: #a17d51;

            font-weight: bold;

            margin-bottom: 5px;

        }


        .heading h2 {

            font-size: 17px;

            color: #414a4e;

        }


        .employee-grid {

            display: grid;

            grid-template-columns:
                1.5fr
                1fr;

            gap: 10px;

        }


        .employee-card {

            padding: 14px;

            background: #fafaf9;

            border: 1px solid #e5e4e1;

            border-radius: 10px;

        }


        .employee-card label {

            display: block;

            font-size: 6px;

            color: #929a9b;

            font-weight: bold;

            letter-spacing: .8px;

            margin-bottom: 7px;

        }


        .employee-card strong {

            font-size: 13px;

            color: #4b555a;

        }


        /* =========================================
           SALARY SUMMARY
           ========================================= */

        .salary-summary {

            background: #ffffff;

            border: 1px solid #e2e1de;

            border-radius: 15px;

            padding: 21px;

            margin-bottom: 18px;

        }


        .salary-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 10px;

        }


        .salary-card {

            min-height: 95px;

            padding: 14px;

            border-radius: 11px;

            border: 1px solid;

        }


        .basic {

            background: #edf3f7;

            border-color: #dce7ed;

        }


        .allowance {

            background: #edf5ef;

            border-color: #dceade;

        }


        .gross {

            background: #f4f0e9;

            border-color: #e7dfd2;

        }


        .deduction {

            background: #fbf0e6;

            border-color: #eedfce;

        }


        .salary-card label {

            display: block;

            font-size: 6px;

            letter-spacing: .7px;

            font-weight: bold;

            color: #7e8789;

            margin-bottom: 8px;

        }


        .salary-card strong {

            font-size: 17px;

            color: #485257;

        }


        .allowance strong {

            color: #5e916b;

        }


        .deduction strong {

            color: #b37c4e;

        }


        .gross strong {

            color: #9b794f;

        }


        /* =========================================
           NET SALARY
           ========================================= */

        .net-salary {

            padding: 21px;

            border-radius: 14px;

            background: #eef5ef;

            border: 1px solid #dbe8de;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 18px;

        }


        .net-salary span {

            display: block;

            font-size: 7px;

            letter-spacing: 1px;

            color: #719078;

            font-weight: bold;

            margin-bottom: 5px;

        }


        .net-salary h2 {

            font-size: 11px;

            color: #64756a;

        }


        .net-amount {

            font-size: 25px;

            font-weight: bold;

            color: #568963;

        }


        /* =========================================
           EXCEPTION HANDLING
           ========================================= */

        .exception-panel {

            background: #f5f3ed;

            border: 1px solid #e8e3d8;

            border-radius: 14px;

            padding: 17px;

            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 20px;

        }


        .exception-icon {

            width: 40px;

            height: 40px;

            border-radius: 10px;

            background: #ffffff;

            color: #b18757;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;

            font-weight: bold;

            flex-shrink: 0;

        }


        .exception-panel h3 {

            font-size: 9px;

            color: #625c53;

            margin-bottom: 4px;

        }


        .exception-panel p {

            font-size: 7px;

            line-height: 1.6;

            color: #938e85;

        }


        /* =========================================
           ERROR DETAILS
           ========================================= */

        .error-panel {

            background: #fff1ef;

            border: 1px solid #efdcd8;

            border-radius: 14px;

            padding: 19px;

            margin-bottom: 20px;

        }


        .error-panel h3 {

            font-size: 10px;

            color: #a96860;

            margin-bottom: 6px;

        }


        .error-panel p {

            font-size: 8px;

            color: #927b78;

            line-height: 1.6;

        }


        /* =========================================
           ACTION BUTTONS
           ========================================= */

        .actions {

            display: flex;

            justify-content: center;

            gap: 10px;

        }


        .actions a {

            text-decoration: none;

            padding: 11px 20px;

            border-radius: 8px;

            font-size: 8px;

            font-weight: bold;

        }


        .back {

            background: #ffffff;

            border: 1px solid #dededb;

            color: #697276;

        }


        .back:hover {

            background: #f1f1ef;

        }


        .new {

            background: #596b64;

            color: #ffffff;

        }


        .new:hover {

            background: #465750;

        }


        /* =========================================
           FOOTER
           ========================================= */

        footer {

            margin-top: 20px;

            padding-top: 17px;

            border-top: 1px solid #dfdfdc;

            text-align: center;

            font-size: 6px;

            letter-spacing: 1px;

            color: #9da2a1;

        }


        /* =========================================
           RESPONSIVE
           ========================================= */

        @media (max-width: 900px) {

            main {
                width: 90%;
            }

            .salary-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 650px) {

            .header {
                padding: 0 5%;
            }

            .status {
                display: none;
            }

            main {
                width: 92%;
            }

            .result-hero {
                padding: 23px;
            }

            .result-symbol {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }

            .result-hero h2 {
                font-size: 22px;
            }

            .employee-grid {
                grid-template-columns: 1fr;
            }

            .salary-grid {
                grid-template-columns: 1fr;
            }

            .net-salary {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            .actions {
                flex-direction: column;
            }

            .actions a {
                text-align: center;
            }

        }


        @media (max-width: 430px) {

            .brand h1 {
                font-size: 15px;
            }

            .logo {
                width: 38px;
                height: 38px;
            }

            .result-symbol {
                display: none;
            }

        }

    </style>

</head>


<body>


<!-- =========================================
     HEADER
     ========================================= -->

<header class="header">

    <div class="brand">

        <div class="logo">
            ₹
        </div>

        <div>

            <span>
                PAYROLL MANAGEMENT
            </span>

            <h1>
                Salary Processing Center
            </h1>

        </div>

    </div>


    <div class="
        status
        <?php
            echo $success
                ? 'success'
                : 'error';
        ?>
    ">

        <?php

        echo $success
            ? "PAYROLL COMPLETED"
            : "ERROR HANDLED";

        ?>

    </div>

</header>



<!-- =========================================
     MAIN
     ========================================= -->

<main>


    <!-- =====================================
         RESULT HERO
         ===================================== -->

    <section class="result-hero">

        <div>

            <span class="result-label">
                PAYROLL PROCESSING RESULT
            </span>


            <?php if ($success): ?>

                <h2>
                    Payroll Processed
                </h2>

                <p>
                    Employee salary has been calculated
                    successfully.
                </p>

            <?php else: ?>

                <h2>
                    Processing Exception
                </h2>

                <p>
                    The error was handled safely without
                    crashing the application.
                </p>

            <?php endif; ?>

        </div>


        <div class="
            result-symbol
            <?php
                echo $success
                    ? 'success'
                    : 'error';
            ?>
        ">

            <?php

            echo $success
                ? "✓"
                : "!";

            ?>

        </div>

    </section>



    <!-- =====================================
         MESSAGE
         ===================================== -->

    <div class="
        message
        <?php
            echo $success
                ? 'success'
                : 'error';
        ?>
    ">

        <div class="message-icon">

            <?php

            echo $success
                ? "✓"
                : "!";

            ?>

        </div>


        <div>

            <strong>

                <?php

                echo $success
                    ? "SUCCESS"
                    : htmlspecialchars($errorType);

                ?>

            </strong>


            <span>

                <?php

                echo htmlspecialchars($message);

                ?>

            </span>

        </div>

    </div>



    <!-- =====================================
         EMPLOYEE INFORMATION
         ===================================== -->

    <section class="panel">

        <div class="heading">

            <span>
                EMPLOYEE INFORMATION
            </span>

            <h2>
                Employee Details
            </h2>

        </div>


        <div class="employee-grid">


            <div class="employee-card">

                <label>
                    EMPLOYEE NAME
                </label>

                <strong>

                    <?php

                    echo htmlspecialchars($name);

                    ?>

                </strong>

            </div>



            <div class="employee-card">

                <label>
                    EMPLOYEE ID
                </label>

                <strong>

                    <?php

                    echo htmlspecialchars($employee_id);

                    ?>

                </strong>

            </div>


        </div>

    </section>



    <?php if ($success): ?>


        <!-- =================================
             SALARY SUMMARY
             ================================= -->

        <section class="salary-summary">

            <div class="heading">

                <span>
                    SALARY BREAKDOWN
                </span>

                <h2>
                    Payroll Components
                </h2>

            </div>


            <div class="salary-grid">


                <!-- BASIC -->

                <div class="salary-card basic">

                    <label>
                        BASIC SALARY
                    </label>

                    <strong>

                        ₹<?php

                        echo number_format(
                            $basic,
                            2
                        );

                        ?>

                    </strong>

                </div>



                <!-- ALLOWANCE -->

                <div class="salary-card allowance">

                    <label>
                        ALLOWANCE
                    </label>

                    <strong>

                        + ₹<?php

                        echo number_format(
                            $allowance,
                            2
                        );

                        ?>

                    </strong>

                </div>



                <!-- GROSS -->

                <div class="salary-card gross">

                    <label>
                        GROSS SALARY
                    </label>

                    <strong>

                        ₹<?php

                        echo number_format(
                            $grossSalary,
                            2
                        );

                        ?>

                    </strong>

                </div>



                <!-- DEDUCTION -->

                <div class="salary-card deduction">

                    <label>
                        DEDUCTION
                    </label>

                    <strong>

                        − ₹<?php

                        echo number_format(
                            $deduction,
                            2
                        );

                        ?>

                    </strong>

                </div>


            </div>

        </section>



        <!-- =================================
             NET SALARY
             ================================= -->

        <section class="net-salary">

            <div>

                <span>
                    FINAL PAYABLE AMOUNT
                </span>

                <h2>
                    Net Salary
                </h2>

            </div>


            <div class="net-amount">

                ₹<?php

                echo number_format(
                    $netSalary,
                    2
                );

                ?>

            </div>

        </section>


    <?php endif; ?>



    <!-- =====================================
         EXCEPTION HANDLING
         ===================================== -->

    <section class="exception-panel">

        <div class="exception-icon">
            !
        </div>


        <div>

            <h3>
                Exception Handling Protection
            </h3>


            <p>

                <?php if ($success): ?>

                    The payroll calculation completed without
                    errors. PHP exception handling is ready to
                    catch invalid inputs and runtime problems.

                <?php else: ?>

                    The exception was caught successfully.
                    Instead of terminating the application,
                    the error was converted into a readable
                    message for the user.

                <?php endif; ?>

            </p>

        </div>

    </section>



    <?php if (!$success): ?>

        <!-- =================================
             ERROR DETAILS
             ================================= -->

        <section class="error-panel">

            <h3>
                ⚠ Processing Information
            </h3>

            <p>

                No salary calculation was completed because
                the supplied information could not be safely
                processed. Correct the input and try again.

            </p>

        </section>

    <?php endif; ?>



    <!-- =====================================
         ACTIONS
         ===================================== -->

    <div class="actions">

        <a
            href="index.php"
            class="back"
        >
            ← Back to Payroll
        </a>


        <a
            href="index.php"
            class="new"
        >
            New Payroll →
        </a>

    </div>



    <!-- =====================================
         FOOTER
         ===================================== -->

    <footer>

        PHP PRACTICAL

        <span>•</span>

        EXCEPTION HANDLING

        <span>•</span>

        PAYROLL MANAGEMENT

    </footer>


</main>


</body>

</html>