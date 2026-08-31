<?php

/* =========================================================
   BANKING TRANSACTION EXCEPTION HANDLING
   ========================================================= */


/* ---------------------------------------------------------
   CUSTOM EXCEPTION CLASS
   --------------------------------------------------------- */

class BankingException extends Exception
{
}


/* ---------------------------------------------------------
   GET FORM DATA
   --------------------------------------------------------- */

$name = trim($_POST["name"] ?? "");
$account = trim($_POST["account"] ?? "");
$balanceInput = $_POST["balance"] ?? "";
$amountInput = $_POST["amount"] ?? "";
$transaction = $_POST["transaction"] ?? "";


/* ---------------------------------------------------------
   VARIABLES
   --------------------------------------------------------- */

$success = false;
$message = "";
$errorType = "";
$newBalance = 0;
$ratio = 0;


/* ---------------------------------------------------------
   PROCESS TRANSACTION
   --------------------------------------------------------- */

try {

    /* ==============================================
       VALIDATE ACCOUNT HOLDER
       ============================================== */

    if ($name === "") {

        throw new BankingException(
            "Account holder name cannot be empty."
        );

    }


    if (!preg_match("/^[a-zA-Z ]{2,50}$/", $name)) {

        throw new BankingException(
            "Invalid account holder name."
        );

    }


    /* ==============================================
       VALIDATE ACCOUNT NUMBER
       ============================================== */

    if (!preg_match("/^[0-9]{10}$/", $account)) {

        throw new BankingException(
            "Account number must contain exactly 10 digits."
        );

    }


    /* ==============================================
       VALIDATE BALANCE
       ============================================== */

    if ($balanceInput === "" ||
        !is_numeric($balanceInput)) {

        throw new BankingException(
            "Current balance must be a valid number."
        );

    }


    $balance = floatval($balanceInput);


    if ($balance < 0) {

        throw new BankingException(
            "Current balance cannot be negative."
        );

    }


    /* ==============================================
       VALIDATE TRANSACTION AMOUNT
       ============================================== */

    if ($amountInput === "" ||
        !is_numeric($amountInput)) {

        throw new BankingException(
            "Transaction amount must be a valid number."
        );

    }


    $amount = floatval($amountInput);


    if ($amount <= 0) {

        throw new BankingException(
            "Transaction amount must be greater than zero."
        );

    }


    /* ==============================================
       VALIDATE TRANSACTION TYPE
       ============================================== */

    if (
        $transaction !== "deposit" &&
        $transaction !== "withdraw"
    ) {

        throw new BankingException(
            "Please select a valid transaction type."
        );

    }


    /* ==============================================
       DIVISION-BY-ZERO CHECK
       ============================================== */

    /*
       A transaction ratio is calculated as:

       Transaction Amount / Current Balance

       If the balance is zero, division by zero
       must be prevented.
    */

    if ($balance == 0) {

        throw new DivisionByZeroError(
            "Transaction ratio cannot be calculated because the current balance is zero."
        );

    }


    $ratio = ($amount / $balance) * 100;

    $ratio = round($ratio, 2);


    /* ==============================================
       DEPOSIT
       ============================================== */

    if ($transaction === "deposit") {

        $newBalance = $balance + $amount;

        $message =
            "Amount successfully deposited into the account.";

        $success = true;

    }


    /* ==============================================
       WITHDRAWAL
       ============================================== */

    elseif ($transaction === "withdraw") {


        if ($amount > $balance) {

            throw new BankingException(
                "Insufficient balance. Withdrawal cannot be processed."
            );

        }


        $newBalance = $balance - $amount;

        $message =
            "Withdrawal successfully processed.";

        $success = true;

    }


    /* ==============================================
       ROUND FINAL BALANCE
       ============================================== */

    $newBalance = round($newBalance, 2);


}


/* ---------------------------------------------------------
   BANKING EXCEPTION
   --------------------------------------------------------- */

catch (BankingException $e) {

    $success = false;

    $message = $e->getMessage();

    $errorType = "Transaction Error";

}


/* ---------------------------------------------------------
   DIVISION BY ZERO
   --------------------------------------------------------- */

catch (DivisionByZeroError $e) {

    $success = false;

    $message =
        "Calculation error prevented: " .
        $e->getMessage();

    $errorType = "Division by Zero";

}


/* ---------------------------------------------------------
   GENERAL EXCEPTION
   --------------------------------------------------------- */

catch (Throwable $e) {

    $success = false;

    $message =
        "An unexpected error occurred. " .
        "The transaction was not processed.";

    $errorType = "Unexpected Error";

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Banking Transaction Result
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

            background: #f4f6f8;

            color: #303b46;

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
                1px solid #e2e6ea;

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


        .bank-icon {

            width: 42px;

            height: 42px;

            border-radius: 10px;

            background: #e7eef8;

            color: #426c9d;

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

            color: #6484a6;

            font-weight: bold;

            margin-bottom: 4px;

        }


        .brand h1 {

            font-size: 18px;

            color: #35414c;

        }


        .status-tag {

            padding: 8px 13px;

            border-radius: 20px;

            background: #f0f7f2;

            border: 1px solid #dbe9df;

            color: #668b72;

            font-size: 7px;

            font-weight: bold;

            letter-spacing: .7px;

        }


        /* =========================================
           MAIN
           ========================================= */

        main {

            width: 86%;

            max-width: 1050px;

            margin: 27px auto 35px;

        }


        /* =========================================
           RESULT HERO
           ========================================= */

        .result-hero {

            background: #eaf0f7;

            border: 1px solid #dce5ef;

            border-radius: 17px;

            padding: 25px 30px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 18px;

        }


        .hero-label {

            display: block;

            font-size: 7px;

            letter-spacing: 1.5px;

            color: #587ba2;

            font-weight: bold;

            margin-bottom: 7px;

        }


        .result-hero h2 {

            font-size: 27px;

            color: #35414d;

            margin-bottom: 7px;

        }


        .result-hero p {

            font-size: 9px;

            color: #7d8995;

        }


        .result-icon {

            width: 72px;

            height: 72px;

            border-radius: 50%;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 32px;

            font-weight: bold;

            box-shadow:
                0 8px 22px
                rgba(50, 70, 90, .08);

        }


        .success-icon {

            color: #5e9970;

        }


        .error-icon {

            color: #c67b7b;

        }


        /* =========================================
           MESSAGE BOX
           ========================================= */

        .message-box {

            padding: 15px 18px;

            border-radius: 11px;

            margin-bottom: 18px;

            display: flex;

            align-items: center;

            gap: 11px;

        }


        .message-box.success {

            background: #edf7ef;

            border: 1px solid #d7eadb;

            color: #5a8d68;

        }


        .message-box.error {

            background: #fff0f0;

            border: 1px solid #efdada;

            color: #b66e6e;

        }


        .message-symbol {

            width: 30px;

            height: 30px;

            border-radius: 50%;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: bold;

            font-size: 12px;

        }


        .message-box strong {

            display: block;

            font-size: 8px;

            margin-bottom: 3px;

        }


        .message-box span {

            font-size: 8px;

        }


        /* =========================================
           ACCOUNT SUMMARY
           ========================================= */

        .account-panel {

            background: #ffffff;

            border: 1px solid #e0e4e8;

            border-radius: 15px;

            padding: 20px;

            margin-bottom: 18px;

        }


        .section-title {

            margin-bottom: 15px;

        }


        .section-title span {

            display: block;

            font-size: 7px;

            letter-spacing: 1.4px;

            color: #6683a2;

            font-weight: bold;

            margin-bottom: 5px;

        }


        .section-title h2 {

            font-size: 17px;

            color: #3f4951;

        }


        .account-grid {

            display: grid;

            grid-template-columns:
                1.3fr
                1fr
                1fr
                1fr;

            gap: 10px;

        }


        .account-card {

            padding: 14px;

            border-radius: 10px;

            background: #fafbfc;

            border: 1px solid #e4e7e9;

        }


        .account-card label {

            display: block;

            font-size: 6px;

            letter-spacing: .8px;

            color: #929ba2;

            font-weight: bold;

            margin-bottom: 7px;

        }


        .account-card strong {

            display: block;

            font-size: 13px;

            color: #4b565f;

        }


        .account-card small {

            display: block;

            font-size: 6px;

            color: #9da5aa;

            margin-top: 4px;

        }


        /* =========================================
           BALANCE DISPLAY
           ========================================= */

        .balance-section {

            background: #ffffff;

            border: 1px solid #e0e4e8;

            border-radius: 15px;

            padding: 20px;

            margin-bottom: 18px;

        }


        .balance-row {

            display: grid;

            grid-template-columns:
                1fr
                55px
                1fr;

            align-items: center;

            gap: 15px;

        }


        .balance-box {

            padding: 20px;

            border-radius: 12px;

            background: #f8fafc;

            border: 1px solid #e2e6ea;

        }


        .balance-box.new {

            background: #eef7f0;

            border-color: #d9eadc;

        }


        .balance-box label {

            display: block;

            font-size: 7px;

            letter-spacing: .7px;

            color: #89939b;

            font-weight: bold;

            margin-bottom: 8px;

        }


        .balance-box strong {

            font-size: 23px;

            color: #44515b;

        }


        .balance-box.new strong {

            color: #568c66;

        }


        .arrow {

            width: 42px;

            height: 42px;

            border-radius: 50%;

            background: #edf2f6;

            color: #69819a;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;

            font-weight: bold;

        }


        /* =========================================
           CALCULATION DETAILS
           ========================================= */

        .calculation-panel {

            background: #ffffff;

            border: 1px solid #e0e4e8;

            border-radius: 15px;

            padding: 20px;

            margin-bottom: 18px;

        }


        .calculation-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 10px;

        }


        .calculation-card {

            padding: 15px;

            background: #fafbfc;

            border: 1px solid #e4e7e9;

            border-radius: 10px;

        }


        .calculation-card label {

            display: block;

            font-size: 6px;

            color: #929ba2;

            font-weight: bold;

            letter-spacing: .7px;

            margin-bottom: 6px;

        }


        .calculation-card strong {

            font-size: 14px;

            color: #4c5760;

        }


        .calculation-card strong.green {

            color: #5c9670;

        }


        .calculation-card strong.orange {

            color: #c1874e;

        }


        /* =========================================
           EXCEPTION HANDLING
           ========================================= */

        .exception-box {

            background: #f6f3ec;

            border: 1px solid #e9e2d4;

            border-radius: 14px;

            padding: 18px;

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

            color: #b68a54;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;

            font-weight: bold;

        }


        .exception-box h3 {

            font-size: 9px;

            color: #665c50;

            margin-bottom: 4px;

        }


        .exception-box p {

            font-size: 7px;

            color: #958d81;

            line-height: 1.6;

        }


        /* =========================================
           BUTTONS
           ========================================= */

        .actions {

            display: flex;

            justify-content: center;

            gap: 10px;

        }


        .actions a {

            text-decoration: none;

            padding: 11px 19px;

            border-radius: 8px;

            font-size: 8px;

            font-weight: bold;

        }


        .back {

            background: #ffffff;

            border: 1px solid #dce1e5;

            color: #68747d;

        }


        .back:hover {

            background: #f1f3f5;

        }


        .new {

            background: #3f5264;

            color: #ffffff;

        }


        .new:hover {

            background: #304352;

        }


        /* =========================================
           FOOTER
           ========================================= */

        footer {

            text-align: center;

            border-top: 1px solid #dfe3e6;

            margin-top: 20px;

            padding-top: 17px;

            font-size: 6px;

            letter-spacing: 1px;

            color: #9ba3a8;

        }


        /* =========================================
           RESPONSIVE
           ========================================= */

        @media (max-width: 850px) {

            main {
                width: 90%;
            }

            .account-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 650px) {

            .header {
                padding: 0 5%;
            }

            .status-tag {
                display: none;
            }

            main {
                width: 92%;
            }

            .result-hero {
                padding: 22px;
            }

            .result-icon {
                width: 58px;
                height: 58px;
                font-size: 25px;
            }

            .result-hero h2 {
                font-size: 22px;
            }

            .balance-row {
                grid-template-columns: 1fr;
            }

            .arrow {
                margin: auto;
                transform: rotate(90deg);
            }

            .calculation-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 450px) {

            .account-grid {
                grid-template-columns: 1fr;
            }

            .result-icon {
                display: none;
            }

            .actions {
                flex-direction: column;
            }

            .actions a {
                text-align: center;
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

        <div class="bank-icon">
            $
        </div>

        <div>

            <span>
                SECURE BANKING
            </span>

            <h1>
                Transaction Center
            </h1>

        </div>

    </div>


    <div class="status-tag">

        <?php

        if ($success) {
            echo "TRANSACTION COMPLETED";
        } else {
            echo "TRANSACTION PROTECTED";
        }

        ?>

    </div>

</header>



<!-- =========================================
     MAIN
     ========================================= -->

<main>


    <!-- =====================================
         RESULT HEADER
         ===================================== -->

    <section class="result-hero">

        <div>

            <span class="hero-label">
                TRANSACTION RESULT
            </span>


            <?php if ($success): ?>

                <h2>
                    Transaction Successful
                </h2>

                <p>
                    Your banking transaction has been
                    safely processed.
                </p>

            <?php else: ?>

                <h2>
                    Transaction Not Processed
                </h2>

                <p>
                    The system detected an issue and
                    safely stopped the transaction.
                </p>

            <?php endif; ?>

        </div>


        <div class="
            result-icon
            <?php
                echo $success
                    ? 'success-icon'
                    : 'error-icon';
            ?>
        ">

            <?php

            echo $success ? "✓" : "!";

            ?>

        </div>

    </section>



    <!-- =====================================
         MESSAGE
         ===================================== -->

    <div class="
        message-box
        <?php
            echo $success
                ? 'success'
                : 'error';
        ?>
    ">

        <div class="message-symbol">

            <?php
                echo $success ? "✓" : "!";
            ?>

        </div>


        <div>

            <strong>

                <?php

                if ($success) {
                    echo "STATUS";
                } else {
                    echo htmlspecialchars($errorType);
                }

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
         ACCOUNT DETAILS
         ===================================== -->

    <section class="account-panel">

        <div class="section-title">

            <span>
                ACCOUNT SUMMARY
            </span>

            <h2>
                Transaction Information
            </h2>

        </div>


        <div class="account-grid">


            <div class="account-card">

                <label>
                    ACCOUNT HOLDER
                </label>

                <strong>
                    <?php
                        echo htmlspecialchars($name);
                    ?>
                </strong>

            </div>



            <div class="account-card">

                <label>
                    ACCOUNT NUMBER
                </label>

                <strong>
                    <?php

                    if (strlen($account) === 10) {

                        echo substr($account, 0, 3)
                            . "••••"
                            . substr($account, -3);

                    } else {

                        echo htmlspecialchars($account);

                    }

                    ?>
                </strong>

            </div>



            <div class="account-card">

                <label>
                    TRANSACTION TYPE
                </label>

                <strong>

                    <?php

                    if ($transaction === "deposit") {

                        echo "Deposit";

                    } elseif ($transaction === "withdraw") {

                        echo "Withdrawal";

                    } else {

                        echo "Invalid";

                    }

                    ?>

                </strong>

            </div>



            <div class="account-card">

                <label>
                    TRANSACTION AMOUNT
                </label>

                <strong>
                    ₹<?php
                        echo number_format(
                            is_numeric($amountInput)
                                ? floatval($amountInput)
                                : 0,
                            2
                        );
                    ?>
                </strong>

            </div>


        </div>

    </section>



    <?php if ($success): ?>


        <!-- =================================
             BALANCE CHANGE
             ================================= -->

        <section class="balance-section">

            <div class="section-title">

                <span>
                    BALANCE UPDATE
                </span>

                <h2>
                    Account Balance
                </h2>

            </div>


            <div class="balance-row">


                <div class="balance-box">

                    <label>
                        PREVIOUS BALANCE
                    </label>

                    <strong>
                        ₹<?php
                            echo number_format(
                                $balance,
                                2
                            );
                        ?>
                    </strong>

                </div>


                <div class="arrow">
                    →
                </div>


                <div class="balance-box new">

                    <label>
                        UPDATED BALANCE
                    </label>

                    <strong>
                        ₹<?php
                            echo number_format(
                                $newBalance,
                                2
                            );
                        ?>
                    </strong>

                </div>


            </div>

        </section>



        <!-- =================================
             CALCULATIONS
             ================================= -->

        <section class="calculation-panel">

            <div class="section-title">

                <span>
                    NUMERICAL ANALYSIS
                </span>

                <h2>
                    Transaction Calculations
                </h2>

            </div>


            <div class="calculation-grid">


                <div class="calculation-card">

                    <label>
                        TRANSACTION AMOUNT
                    </label>

                    <strong class="green">

                        ₹<?php

                        echo number_format(
                            $amount,
                            2
                        );

                        ?>

                    </strong>

                </div>



                <div class="calculation-card">

                    <label>
                        BALANCE CHANGE
                    </label>

                    <strong
                        class="<?php
                            echo $transaction === "deposit"
                                ? "green"
                                : "orange";
                        ?>"
                    >

                        <?php

                        if ($transaction === "deposit") {

                            echo "+";

                        } else {

                            echo "-";

                        }

                        ?>

                        ₹<?php

                        echo number_format(
                            $amount,
                            2
                        );

                        ?>

                    </strong>

                </div>



                <div class="calculation-card">

                    <label>
                        TRANSACTION RATIO
                    </label>

                    <strong>

                        <?php
                            echo number_format(
                                $ratio,
                                2
                            );
                        ?>%

                    </strong>

                </div>


            </div>

        </section>


    <?php endif; ?>



    <!-- =====================================
         EXCEPTION HANDLING MESSAGE
         ===================================== -->

    <section class="exception-box">

        <div class="exception-icon">
            !
        </div>


        <div>

            <h3>
                Exception Handling Protection
            </h3>

            <p>

                <?php if ($success): ?>

                    The transaction was validated successfully.
                    PHP exception handling protects the system
                    from invalid calculations and unexpected errors.

                <?php else: ?>

                    The transaction was safely stopped.
                    PHP exception handling prevented the error
                    from causing an unexpected application failure.

                <?php endif; ?>

            </p>

        </div>

    </section>



    <!-- =====================================
         ACTION BUTTONS
         ===================================== -->

    <div class="actions">

        <a
            href="index.php"
            class="back"
        >
            ← Back to Transaction
        </a>


        <a
            href="index.php"
            class="new"
        >
            New Transaction →
        </a>

    </div>



    <!-- =====================================
         FOOTER
         ===================================== -->

    <footer>

        PHP PRACTICAL

        •

        EXCEPTION HANDLING

        •

        BANKING TRANSACTIONS

    </footer>


</main>


</body>

</html>