<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Password Validation</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <header>

        <div class="logo">🔐</div>

        <div>
            <h1>Employee Password Validation</h1>

            <p>Secure password verification using Regular Expressions</p>
        </div>

    </header>


    <!-- MAIN CARD -->
    <div class="security-card">

        <div class="card-heading">

            <span class="tag">PASSWORD SECURITY</span>

            <h2>Create Secure Credentials</h2>

            <p>
                Enter employee details and create a password that satisfies
                all predefined security requirements.
            </p>

        </div>


        <!-- FORM -->
        <form action="process.php" method="POST">

            <!-- EMPLOYEE NAME -->
            <div class="input-group">

                <label>Employee Name</label>

                <input
                    type="text"
                    name="employee"
                    placeholder="Enter employee name"
                    required
                >

            </div>


            <!-- PASSWORD -->
            <div class="input-group">

                <label>Password</label>

                <div class="password-box">

                    <span>●</span>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                </div>

            </div>


            <!-- SECURITY RULES -->
            <div class="rules">

                <h3>Password Requirements</h3>

                <div class="rule">

                    <span class="rule-icon">✓</span>

                    <p>Minimum 8 characters</p>

                </div>

                <div class="rule">

                    <span class="rule-icon">✓</span>

                    <p>At least one uppercase letter</p>

                </div>

                <div class="rule">

                    <span class="rule-icon">✓</span>

                    <p>At least one lowercase letter</p>

                </div>

                <div class="rule">

                    <span class="rule-icon">✓</span>

                    <p>At least one number and special character</p>

                </div>

            </div>


            <!-- BUTTON -->
            <button type="submit">
                Validate Password
                <span>→</span>
            </button>

        </form>

    </div>


    <!-- FOOTER -->
    <footer>
        PHP Practical • Regular Expressions • Password Validation
    </footer>

</div>

</body>
</html>