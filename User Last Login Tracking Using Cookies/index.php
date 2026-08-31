<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>LoginPulse | Secure Login</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">


    <!-- TOP BAR -->

    <nav class="topbar">

        <div class="brand">

            <div class="brand-icon">
                LP
            </div>

            <div>
                <h2>LoginPulse</h2>
                <span>SECURE ACCESS</span>
            </div>

        </div>


        <div class="security-status">

            <span class="pulse"></span>

            Secure connection

        </div>

    </nav>


    <!-- MAIN -->

    <main class="main-container">


        <!-- LEFT SECTION -->

        <section class="intro">

            <div class="eyebrow">
                ✦ ACCOUNT ACCESS
            </div>

            <h1>
                Welcome
                <span>back.</span>
            </h1>

            <p>
                Sign in to continue. LoginPulse remembers
                your previous login time using a secure
                browser cookie.
            </p>


            <!-- LOGIN TIMELINE -->

            <div class="timeline">

                <div class="timeline-item active">

                    <div class="timeline-icon">
                        01
                    </div>

                    <div>

                        <strong>
                            Login
                        </strong>

                        <small>
                            Enter your credentials
                        </small>

                    </div>

                </div>


                <div class="timeline-line"></div>


                <div class="timeline-item">

                    <div class="timeline-icon">
                        02
                    </div>

                    <div>

                        <strong>
                            Track
                        </strong>

                        <small>
                            Store login information
                        </small>

                    </div>

                </div>


                <div class="timeline-line"></div>


                <div class="timeline-item">

                    <div class="timeline-icon">
                        03
                    </div>

                    <div>

                        <strong>
                            Remember
                        </strong>

                        <small>
                            Display your last login
                        </small>

                    </div>

                </div>

            </div>


            <!-- INFO BOX -->

            <div class="info-box">

                <div class="info-icon">
                    ◷
                </div>

                <div>

                    <strong>
                        Automatic login tracking
                    </strong>

                    <p>
                        Your previous login date and time
                        will appear after your next visit.
                    </p>

                </div>

            </div>

        </section>


        <!-- LOGIN CARD -->

        <section class="login-card">

            <div class="card-top">

                <div class="lock">
                    🔐
                </div>

                <div>

                    <p>
                        SECURE LOGIN
                    </p>

                    <h2>
                        Sign in
                    </h2>

                </div>

            </div>


            <form action="process.php" method="POST">


                <!-- USERNAME -->

                <div class="field">

                    <label>
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        placeholder="Enter your username"
                        required
                    >

                </div>


                <!-- PASSWORD -->

                <div class="field">

                    <label>
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                </div>


                <div class="remember-row">

                    <label class="checkbox">

                        <input
                            type="checkbox"
                            checked
                        >

                        <span>
                            Remember this device
                        </span>

                    </label>

                    <span class="protected">
                        Protected
                    </span>

                </div>


                <button type="submit">

                    Sign In

                    <span>→</span>

                </button>


            </form>


            <div class="card-footer">

                <span>🔒</span>

                Login activity is stored using cookies.

            </div>

        </section>

    </main>


    <footer>

        <span>LoginPulse</span>

        <p>
            Cookie-Based Last Login Tracking System
        </p>

    </footer>


</div>

</body>

</html>