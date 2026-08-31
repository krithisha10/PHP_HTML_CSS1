<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Loan Repayment Calculator</title>

    <link rel="stylesheet" href="style.css">

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
                    Loan Repayment Calculator
                </h1>

                <p>
                    Calculate EMI and plan your loan repayment
                </p>

            </div>

        </div>


        <div class="secure-badge">
            LOAN PLANNER
        </div>

    </header>



    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <span>
                SMART LOAN ANALYSIS
            </span>

            <h2>
                Plan Your Monthly Repayments
            </h2>

            <p>
                Enter your loan details to calculate EMI,
                interest payable and repayment schedule.
            </p>

        </div>


        <div class="hero-circle">

            <div class="rupee">
                ₹
            </div>

        </div>

    </section>



    <!-- MAIN FORM -->

    <section class="calculator">


        <div class="section-title">

            <span>
                LOAN DETAILS
            </span>

            <h2>
                Enter Your Loan Information
            </h2>

        </div>



        <form action="process.php" method="POST">


            <div class="input-grid">


                <!-- LOAN AMOUNT -->

                <div class="input-card amount-card">

                    <div class="input-top">

                        <div class="input-icon">
                            ₹
                        </div>

                        <span>
                            STEP 01
                        </span>

                    </div>


                    <label>
                        LOAN AMOUNT
                    </label>

                    <div class="input-wrapper">

                        <span>₹</span>

                        <input
                            type="number"
                            name="loan_amount"
                            placeholder="e.g. 500000"
                            min="1"
                            step="0.01"
                            required
                        >

                    </div>


                    <p>
                        Enter the total amount you want to borrow.
                    </p>

                </div>



                <!-- INTEREST RATE -->

                <div class="input-card interest-card">

                    <div class="input-top">

                        <div class="input-icon">
                            %
                        </div>

                        <span>
                            STEP 02
                        </span>

                    </div>


                    <label>
                        ANNUAL INTEREST RATE
                    </label>

                    <div class="input-wrapper">

                        <input
                            type="number"
                            name="interest_rate"
                            placeholder="e.g. 8.5"
                            min="0"
                            step="0.01"
                            required
                        >

                        <span>%</span>

                    </div>


                    <p>
                        Enter the annual interest rate offered by the lender.
                    </p>

                </div>



                <!-- LOAN TENURE -->

                <div class="input-card tenure-card">

                    <div class="input-top">

                        <div class="input-icon">
                            ⏱
                        </div>

                        <span>
                            STEP 03
                        </span>

                    </div>


                    <label>
                        LOAN TENURE
                    </label>

                    <div class="input-wrapper">

                        <input
                            type="number"
                            name="tenure"
                            placeholder="e.g. 5"
                            min="1"
                            required
                        >

                        <span>Years</span>

                    </div>


                    <p>
                        Enter the repayment period in years.
                    </p>

                </div>


            </div>



            <!-- CALCULATION INFO -->

            <div class="formula-box">

                <div class="formula-icon">
                    ∑
                </div>


                <div>

                    <strong>
                        EMI Calculation
                    </strong>

                    <p>
                        Your monthly EMI will be calculated using
                        the standard loan repayment formula.
                    </p>

                </div>


                <div class="formula">
                    EMI
                </div>

            </div>



            <!-- BUTTON -->

            <div class="button-area">

                <button type="submit">

                    Calculate Loan Repayment

                    <span>
                        →
                    </span>

                </button>

                <p>
                    PHP Mathematical Functions • EMI • Interest • Repayment Schedule
                </p>

            </div>


        </form>

    </section>



    <!-- FEATURES -->

    <section class="features">


        <div class="feature">

            <div class="feature-icon">
                %
            </div>

            <div>

                <strong>
                    Interest
                </strong>

                <p>
                    Calculate total interest payable
                </p>

            </div>

        </div>



        <div class="feature">

            <div class="feature-icon">
                ₹
            </div>

            <div>

                <strong>
                    EMI
                </strong>

                <p>
                    Find your monthly installment
                </p>

            </div>

        </div>



        <div class="feature">

            <div class="feature-icon">
                📅
            </div>

            <div>

                <strong>
                    Schedule
                </strong>

                <p>
                    View month-wise repayment details
                </p>

            </div>

        </div>


    </section>



    <!-- FOOTER -->

    <footer>

        PHP Practical • Loan Repayment Calculator

    </footer>


</div>

</body>

</html>