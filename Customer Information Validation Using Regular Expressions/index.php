<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Customer Information Validation</title>

    <link rel="stylesheet" href="style.css">

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
                    Information Validation
                </h1>

                <p>
                    Validate customer details using Regular Expressions
                </p>

            </div>

        </div>

        <div class="header-badge">
            REGEX VALIDATOR
        </div>

    </header>


    <!-- INTRODUCTION -->

    <section class="intro">

        <div class="intro-content">

            <span>
                CUSTOMER DATA CHECK
            </span>

            <h2>
                Verify customer information
                with precision.
            </h2>

            <p>
                Enter customer details below. Each field will be
                checked against predefined regular expression
                rules to generate a complete validation report.
            </p>

        </div>

        <div class="intro-icon">
            ✓
        </div>

    </section>


    <!-- FORM SECTION -->

    <section class="form-section">

        <div class="section-heading">

            <div>

                <span>
                    CUSTOMER RECORDS
                </span>

                <h2>
                    Enter Customer Details
                </h2>

            </div>

            <div class="rule-tag">
                4 VALIDATION RULES
            </div>

        </div>


        <form action="process.php" method="POST">


            <div class="customer-grid">


                <!-- CUSTOMER 1 -->

                <div class="customer-card">

                    <div class="card-header">

                        <div class="customer-number">
                            01
                        </div>

                        <div class="customer-icon">
                            👤
                        </div>

                    </div>


                    <label>
                        CUSTOMER NAME
                    </label>

                    <input
                        type="text"
                        name="customers[0][name]"
                        placeholder="Enter customer name"
                        required
                    >


                    <label>
                        PHONE NUMBER
                    </label>

                    <input
                        type="text"
                        name="customers[0][phone]"
                        placeholder="10-digit phone number"
                        maxlength="10"
                        required
                    >


                    <label>
                        EMAIL ID
                    </label>

                    <input
                        type="text"
                        name="customers[0][email]"
                        placeholder="customer@example.com"
                        required
                    >


                    <label>
                        ACCOUNT NUMBER
                    </label>

                    <input
                        type="text"
                        name="customers[0][account]"
                        placeholder="10-digit account number"
                        maxlength="10"
                        required
                    >

                </div>


                <!-- CUSTOMER 2 -->

                <div class="customer-card">

                    <div class="card-header">

                        <div class="customer-number">
                            02
                        </div>

                        <div class="customer-icon">
                            👤
                        </div>

                    </div>


                    <label>
                        CUSTOMER NAME
                    </label>

                    <input
                        type="text"
                        name="customers[1][name]"
                        placeholder="Enter customer name"
                        required
                    >


                    <label>
                        PHONE NUMBER
                    </label>

                    <input
                        type="text"
                        name="customers[1][phone]"
                        placeholder="10-digit phone number"
                        maxlength="10"
                        required
                    >


                    <label>
                        EMAIL ID
                    </label>

                    <input
                        type="text"
                        name="customers[1][email]"
                        placeholder="customer@example.com"
                        required
                    >


                    <label>
                        ACCOUNT NUMBER
                    </label>

                    <input
                        type="text"
                        name="customers[1][account]"
                        placeholder="10-digit account number"
                        maxlength="10"
                        required
                    >

                </div>


                <!-- CUSTOMER 3 -->

                <div class="customer-card">

                    <div class="card-header">

                        <div class="customer-number">
                            03
                        </div>

                        <div class="customer-icon">
                            👤
                        </div>

                    </div>


                    <label>
                        CUSTOMER NAME
                    </label>

                    <input
                        type="text"
                        name="customers[2][name]"
                        placeholder="Enter customer name"
                        required
                    >


                    <label>
                        PHONE NUMBER
                    </label>

                    <input
                        type="text"
                        name="customers[2][phone]"
                        placeholder="10-digit phone number"
                        maxlength="10"
                        required
                    >


                    <label>
                        EMAIL ID
                    </label>

                    <input
                        type="text"
                        name="customers[2][email]"
                        placeholder="customer@example.com"
                        required
                    >


                    <label>
                        ACCOUNT NUMBER
                    </label>

                    <input
                        type="text"
                        name="customers[2][account]"
                        placeholder="10-digit account number"
                        maxlength="10"
                        required
                    >

                </div>


            </div>


            <!-- VALIDATION RULES -->

            <div class="rules">

                <div class="rule">

                    <div class="rule-icon">
                        A
                    </div>

                    <div>
                        <strong>Name</strong>
                        <span>Letters and spaces only</span>
                    </div>

                </div>


                <div class="rule">

                    <div class="rule-icon">
                        #
                    </div>

                    <div>
                        <strong>Phone</strong>
                        <span>Exactly 10 digits</span>
                    </div>

                </div>


                <div class="rule">

                    <div class="rule-icon">
                        @
                    </div>

                    <div>
                        <strong>Email</strong>
                        <span>Valid email format</span>
                    </div>

                </div>


                <div class="rule">

                    <div class="rule-icon">
                        №
                    </div>

                    <div>
                        <strong>Account</strong>
                        <span>Exactly 10 digits</span>
                    </div>

                </div>

            </div>


            <!-- SUBMIT -->

            <div class="button-area">

                <button type="submit">
                    Generate Validation Report →
                </button>

                <p>
                    PHP • Multidimensional Arrays • Regular Expressions
                </p>

            </div>


        </form>

    </section>


    <!-- FOOTER -->

    <footer>

        PHP Practical • Customer Information Validation Using Regular Expressions

    </footer>


</div>

</body>

</html>