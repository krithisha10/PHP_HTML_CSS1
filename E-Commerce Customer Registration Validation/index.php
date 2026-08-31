<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>E-Commerce Customer Registration</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">


    <!-- ==============================
         HEADER
         ============================== -->

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
                    Customer Registration
                </h1>

            </div>

        </div>


        <div class="secure-badge">
            🔒 SECURE REGISTRATION
        </div>

    </header>



    <!-- ==============================
         MAIN CONTENT
         ============================== -->

    <main class="main-container">


        <!-- ==============================
             LEFT INFORMATION PANEL
             ============================== -->

        <section class="welcome-panel">

            <div class="welcome-content">

                <span class="section-label">
                    WELCOME TO OUR STORE
                </span>

                <h2>
                    Create your
                    shopping account.
                </h2>

                <p>
                    Enter your registration details to create
                    an e-commerce customer account. Your
                    information will be checked using predefined
                    validation rules.
                </p>


                <!-- BENEFITS -->

                <div class="benefits">


                    <div class="benefit">

                        <div class="benefit-icon">
                            ✓
                        </div>

                        <div>

                            <strong>
                                Quick Registration
                            </strong>

                            <span>
                                Simple and easy account creation
                            </span>

                        </div>

                    </div>



                    <div class="benefit">

                        <div class="benefit-icon">
                            ✓
                        </div>

                        <div>

                            <strong>
                                Secure Details
                            </strong>

                            <span>
                                Registration information is validated
                            </span>

                        </div>

                    </div>



                    <div class="benefit">

                        <div class="benefit-icon">
                            ✓
                        </div>

                        <div>

                            <strong>
                                Better Shopping
                            </strong>

                            <span>
                                Access your personalized account
                            </span>

                        </div>

                    </div>


                </div>


                <!-- DECORATION -->

                <div class="shopping-art">

                    <div class="circle circle-one"></div>

                    <div class="circle circle-two"></div>

                    <div class="cart">
                        🛒
                    </div>

                </div>

            </div>

        </section>



        <!-- ==============================
             REGISTRATION FORM
             ============================== -->

        <section class="registration-panel">


            <div class="form-heading">

                <span>
                    CUSTOMER ACCOUNT
                </span>

                <h2>
                    Registration Details
                </h2>

                <p>
                    Please enter valid information in all fields.
                </p>

            </div>



            <form action="process.php"
                  method="POST">


                <!-- CUSTOMER NAME -->

                <div class="input-group">

                    <label>
                        CUSTOMER NAME
                    </label>

                    <div class="input-box">

                        <span class="input-icon">
                            👤
                        </span>

                        <input
                            type="text"
                            name="customer[name]"
                            placeholder="Enter your full name"
                            required
                        >

                    </div>

                </div>



                <!-- EMAIL -->

                <div class="input-group">

                    <label>
                        EMAIL ADDRESS
                    </label>

                    <div class="input-box">

                        <span class="input-icon">
                            ✉
                        </span>

                        <input
                            type="text"
                            name="customer[email]"
                            placeholder="example@gmail.com"
                            required
                        >

                    </div>

                </div>



                <!-- PHONE -->

                <div class="input-group">

                    <label>
                        PHONE NUMBER
                    </label>

                    <div class="input-box">

                        <span class="input-icon">
                            ☎
                        </span>

                        <input
                            type="text"
                            name="customer[phone]"
                            placeholder="10-digit mobile number"
                            maxlength="10"
                            required
                        >

                    </div>

                </div>



                <!-- USERNAME -->

                <div class="input-group">

                    <label>
                        USERNAME
                    </label>

                    <div class="input-box">

                        <span class="input-icon">
                            @
                        </span>

                        <input
                            type="text"
                            name="customer[username]"
                            placeholder="Choose a username"
                            required
                        >

                    </div>

                </div>



                <!-- PASSWORD -->

                <div class="input-group">

                    <label>
                        PASSWORD
                    </label>

                    <div class="input-box">

                        <span class="input-icon">
                            🔑
                        </span>

                        <input
                            type="password"
                            name="customer[password]"
                            placeholder="Create a secure password"
                            required
                        >

                    </div>

                </div>



                <!-- VALIDATION NOTE -->

                <div class="validation-note">

                    <div class="note-icon">
                        i
                    </div>

                    <div>

                        <strong>
                            Validation Check
                        </strong>

                        <p>
                            Name, email, phone, username and password
                            will be examined using regular expressions.
                        </p>

                    </div>

                </div>



                <!-- SUBMIT -->

                <button type="submit"
                        class="register-button">

                    Create Customer Account
                    <span>→</span>

                </button>


                <p class="form-footer">
                    PHP • Regular Expressions • Customer Validation
                </p>


            </form>

        </section>


    </main>



    <!-- ==============================
         VALIDATION RULES
         ============================== -->

    <section class="rules-section">

        <div class="rules-heading">

            <span>
                REGISTRATION REQUIREMENTS
            </span>

            <h2>
                What will be validated?
            </h2>

        </div>


        <div class="rules-grid">


            <div class="rule-card">

                <div class="rule-number">
                    01
                </div>

                <div class="rule-icon">
                    A
                </div>

                <h3>
                    Name
                </h3>

                <p>
                    Letters and spaces only
                </p>

            </div>



            <div class="rule-card">

                <div class="rule-number">
                    02
                </div>

                <div class="rule-icon">
                    @
                </div>

                <h3>
                    Email
                </h3>

                <p>
                    Valid email format
                </p>

            </div>



            <div class="rule-card">

                <div class="rule-number">
                    03
                </div>

                <div class="rule-icon">
                    #
                </div>

                <h3>
                    Phone
                </h3>

                <p>
                    Exactly 10 digits
                </p>

            </div>



            <div class="rule-card">

                <div class="rule-number">
                    04
                </div>

                <div class="rule-icon">
                    U
                </div>

                <h3>
                    Username
                </h3>

                <p>
                    Letters and numbers
                </p>

            </div>



            <div class="rule-card">

                <div class="rule-number">
                    05
                </div>

                <div class="rule-icon">
                    *
                </div>

                <h3>
                    Password
                </h3>

                <p>
                    Minimum 8 characters
                </p>

            </div>


        </div>

    </section>



    <!-- FOOTER -->

    <footer>

        PHP Practical • E-Commerce Customer Registration Validation

    </footer>


</div>

</body>

</html>