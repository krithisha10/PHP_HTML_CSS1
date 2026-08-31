<?php
session_start();

$remembered_user = $_COOKIE['remembered_user'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SecureGate | Login</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="login-page">

    <!-- LEFT SIDE -->
    <section class="security-panel">

        <div class="brand">
            <div class="logo">S</div>

            <div>
                <strong>SecureGate</strong>
                <span>AUTHENTICATION CENTER</span>
            </div>
        </div>

        <div class="security-content">

            <div class="tag">● SECURE ACCESS</div>

            <h1>
                Your account.
                <span>Your control.</span>
            </h1>

            <p>
                A secure PHP authentication system using
                sessions and cookies for user management.
            </p>

            <div class="feature">

                <div class="feature-icon">✓</div>

                <div>
                    <strong>Session Authentication</strong>
                    <small>
                        Maintains your active login securely.
                    </small>
                </div>

            </div>

            <div class="feature">

                <div class="feature-icon">C</div>

                <div>
                    <strong>Cookie Authentication</strong>
                    <small>
                        Remembers authenticated users securely.
                    </small>
                </div>

            </div>

            <div class="feature">

                <div class="feature-icon">+</div>

                <div>
                    <strong>Protected Access</strong>
                    <small>
                        Only authenticated users can access the dashboard.
                    </small>
                </div>

            </div>

        </div>

        <div class="footer">
            PHP SESSION & COOKIE MANAGEMENT
        </div>

    </section>


    <!-- RIGHT SIDE -->
    <section class="login-panel">

        <div class="login-card">

            <div class="login-heading">

                <span>WELCOME BACK</span>

                <h2>Sign in</h2>

                <p>
                    Enter your credentials to continue.
                </p>

            </div>


            <form action="process.php" method="POST">

                <div class="input-group">

                    <label>Username</label>

                    <input
                        type="text"
                        name="username"
                        value="<?php echo htmlspecialchars($remembered_user); ?>"
                        placeholder="Enter username"
                        required
                    >

                </div>


                <div class="input-group">

                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter password"
                        required
                    >

                </div>


                <label class="remember">

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                    >

                    Remember me

                </label>


                <button type="submit">
                    Secure Sign In →
                </button>

            </form>


            <div class="demo-box">

                <strong>Demo Credentials</strong>

                <p>Username: <b>admin</b></p>
                <p>Password: <b>admin123</b></p>

            </div>


            <div class="security-note">
                🔒 Protected using PHP sessions and cookies
            </div>

        </div>

    </section>

</div>

</body>
</html>