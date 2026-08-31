<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Email Address Extraction</title>

    <link rel="stylesheet" href="style.css">

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
                    Email Address Scanner
                </h1>

                <p>
                    Identify valid email addresses using Regular Expressions
                </p>

            </div>

        </div>

        <div class="regex-badge">
            REGEX SCANNER
        </div>

    </header>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <span>
                EMAIL EXTRACTION
            </span>

            <h2>
                Scan employee records<br>
                for valid email addresses.
            </h2>

            <p>
                Enter employee details containing email addresses.
                The system will identify valid addresses using PHP
                regular expressions.
            </p>

        </div>

        <div class="hero-symbol">
            @
        </div>

    </section>


    <!-- INPUT SECTION -->

    <section class="input-section">

        <div class="section-heading">

            <div>

                <span>
                    EMPLOYEE RECORDS
                </span>

                <h2>
                    Enter Email Information
                </h2>

            </div>

            <div class="rule-badge">
                REGEX VALIDATION
            </div>

        </div>


        <form action="process.php" method="POST">


            <div class="employee-grid">


                <!-- EMPLOYEE 1 -->

                <div class="employee-card">

                    <div class="card-top">

                        <div class="employee-number">
                            01
                        </div>

                        <div class="person-icon">
                            👤
                        </div>

                    </div>

                    <label>
                        EMPLOYEE NAME
                    </label>

                    <input
                        type="text"
                        name="employees[0][name]"
                        placeholder="Enter employee name"
                        required
                    >

                    <label>
                        EMAIL ADDRESS
                    </label>

                    <input
                        type="text"
                        name="employees[0][email]"
                        placeholder="employee@example.com"
                        required
                    >

                </div>


                <!-- EMPLOYEE 2 -->

                <div class="employee-card">

                    <div class="card-top">

                        <div class="employee-number">
                            02
                        </div>

                        <div class="person-icon">
                            👤
                        </div>

                    </div>

                    <label>
                        EMPLOYEE NAME
                    </label>

                    <input
                        type="text"
                        name="employees[1][name]"
                        placeholder="Enter employee name"
                        required
                    >

                    <label>
                        EMAIL ADDRESS
                    </label>

                    <input
                        type="text"
                        name="employees[1][email]"
                        placeholder="employee@example.com"
                        required
                    >

                </div>


                <!-- EMPLOYEE 3 -->

                <div class="employee-card">

                    <div class="card-top">

                        <div class="employee-number">
                            03
                        </div>

                        <div class="person-icon">
                            👤
                        </div>

                    </div>

                    <label>
                        EMPLOYEE NAME
                    </label>

                    <input
                        type="text"
                        name="employees[2][name]"
                        placeholder="Enter employee name"
                        required
                    >

                    <label>
                        EMAIL ADDRESS
                    </label>

                    <input
                        type="text"
                        name="employees[2][email]"
                        placeholder="employee@example.com"
                        required
                    >

                </div>


            </div>


            <!-- SUBMIT -->

            <div class="button-area">

                <button type="submit">
                    Scan Email Addresses →
                </button>

                <p>
                    PHP • Regular Expressions • Email Extraction
                </p>

            </div>


        </form>

    </section>


    <!-- REGEX INFO -->

    <section class="regex-info">

        <div class="info-icon">
            .*
        </div>

        <div>

            <span>
                VALIDATION RULE
            </span>

            <p>
                Email addresses are checked using a PHP regular
                expression pattern before being extracted.
            </p>

        </div>

    </section>


    <!-- FOOTER -->

    <footer>

        PHP Practical • Email Address Extraction Using Regular Expressions

    </footer>


</div>

</body>

</html>