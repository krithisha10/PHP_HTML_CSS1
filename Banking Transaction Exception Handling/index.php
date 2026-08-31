<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Banking Transaction System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <!-- =========================================
         HEADER
         ========================================= -->

    <header class="header">

        <div class="brand">

            <div class="bank-icon">
                $
            </div>

            <div>

                <span class="small-title">
                    SECURE BANKING
                </span>

                <h1>
                    Transaction Center
                </h1>

            </div>

        </div>


        <div class="secure-badge">

            <span class="secure-dot"></span>

            SECURE SESSION

        </div>

    </header>



    <!-- =========================================
         MAIN CONTENT
         ========================================= -->

    <main class="main-container">


        <!-- =====================================
             HERO
             ===================================== -->

        <section class="hero">

            <div class="hero-content">

                <span class="eyebrow">
                    TRANSACTION PROCESSING
                </span>

                <h2>
                    Process your banking<br>
                    <strong>transaction safely.</strong>
                </h2>

                <p>
                    Enter your account details and transaction
                    amount. The system automatically validates
                    the input and handles calculation errors
                    using PHP exception handling.
                </p>

            </div>


            <div class="hero-symbol">

                <div class="circle-one"></div>

                <div class="circle-two">

                    <span>
                        ₹
                    </span>

                </div>

            </div>

        </section>



        <!-- =====================================
             TRANSACTION FORM
             ===================================== -->

        <form action="process.php"
              method="POST">


            <section class="transaction-panel">


                <div class="panel-heading">

                    <div>

                        <span>
                            ACCOUNT DETAILS
                        </span>

                        <h2>
                            Transaction Information
                        </h2>

                    </div>

                    <div class="step">
                        STEP 01
                    </div>

                </div>



                <!-- ACCOUNT HOLDER -->

                <div class="field-group">

                    <label for="name">
                        ACCOUNT HOLDER NAME
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter account holder name"
                        required
                    >

                </div>



                <!-- ACCOUNT NUMBER -->

                <div class="field-group">

                    <label for="account">
                        ACCOUNT NUMBER
                    </label>

                    <input
                        type="text"
                        id="account"
                        name="account"
                        placeholder="Enter 10-digit account number"
                        pattern="[0-9]{10}"
                        maxlength="10"
                        required
                    >

                    <small>
                        Account number must contain exactly 10 digits.
                    </small>

                </div>



                <!-- BALANCE + AMOUNT -->

                <div class="two-column">


                    <div class="field-group">

                        <label for="balance">
                            CURRENT BALANCE
                        </label>

                        <div class="amount-input">

                            <span>₹</span>

                            <input
                                type="number"
                                id="balance"
                                name="balance"
                                placeholder="0.00"
                                min="0"
                                step="0.01"
                                required
                            >

                        </div>

                    </div>



                    <div class="field-group">

                        <label for="amount">
                            TRANSACTION AMOUNT
                        </label>

                        <div class="amount-input">

                            <span>₹</span>

                            <input
                                type="number"
                                id="amount"
                                name="amount"
                                placeholder="0.00"
                                min="0"
                                step="0.01"
                                required
                            >

                        </div>

                    </div>


                </div>



                <!-- TRANSACTION TYPE -->

                <div class="field-group">

                    <label>
                        TRANSACTION TYPE
                    </label>


                    <div class="transaction-types">


                        <label class="type-option">

                            <input
                                type="radio"
                                name="transaction"
                                value="deposit"
                                required
                            >

                            <div class="type-box">

                                <span class="type-icon deposit">
                                    +
                                </span>

                                <div>

                                    <strong>
                                        Deposit
                                    </strong>

                                    <small>
                                        Add money
                                    </small>

                                </div>

                            </div>

                        </label>



                        <label class="type-option">

                            <input
                                type="radio"
                                name="transaction"
                                value="withdraw"
                            >

                            <div class="type-box">

                                <span class="type-icon withdraw">
                                    −
                                </span>

                                <div>

                                    <strong>
                                        Withdrawal
                                    </strong>

                                    <small>
                                        Remove money
                                    </small>

                                </div>

                            </div>

                        </label>


                    </div>

                </div>



                <!-- CALCULATION OPTION -->

                <div class="calculation-box">

                    <div class="calculation-icon">
                        ÷
                    </div>

                    <div>

                        <strong>
                            Transaction Ratio Check
                        </strong>

                        <span>
                            The system checks calculations safely
                            and prevents division-by-zero errors.
                        </span>

                    </div>

                </div>



                <!-- SUBMIT -->

                <div class="form-footer">

                    <div class="security-note">

                        <span>
                            ✓
                        </span>

                        Input validation enabled

                    </div>


                    <button type="submit">

                        Process Transaction

                        <span>
                            →
                        </span>

                    </button>

                </div>


            </section>


        </form>



        <!-- =====================================
             ERROR HANDLING INFO
             ===================================== -->

        <section class="safety-section">


            <div class="safety-heading">

                <span>
                    ERROR MANAGEMENT
                </span>

                <h2>
                    Built-in Transaction Protection
                </h2>

            </div>


            <div class="safety-grid">


                <div class="safety-card">

                    <div class="safety-icon blue">
                        !
                    </div>

                    <div>

                        <strong>
                            Invalid Input
                        </strong>

                        <p>
                            Detects incorrect or empty
                            transaction details.
                        </p>

                    </div>

                </div>



                <div class="safety-card">

                    <div class="safety-icon orange">
                        ÷
                    </div>

                    <div>

                        <strong>
                            Division by Zero
                        </strong>

                        <p>
                            Prevents unexpected mathematical
                            calculation errors.
                        </p>

                    </div>

                </div>



                <div class="safety-card">

                    <div class="safety-icon green">
                        ✓
                    </div>

                    <div>

                        <strong>
                            Exception Handling
                        </strong>

                        <p>
                            Displays clear messages when
                            transaction errors occur.
                        </p>

                    </div>

                </div>


            </div>

        </section>



        <!-- =====================================
             FOOTER
             ===================================== -->

        <footer>

            PHP PRACTICAL

            <span>•</span>

            EXCEPTION HANDLING

            <span>•</span>

            BANKING TRANSACTIONS

        </footer>


    </main>

</div>

</body>

</html>