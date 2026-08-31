<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Campus Portal | Login</title>

    <link rel="stylesheet"
          href="style.css">
</head>

<body>

<div class="login-wrapper">

    <div class="login-left">

        <div class="logo">
            CP
        </div>

        <span class="small-title">
            CAMPUS PORTAL
        </span>

        <h1>
            Welcome<br>
            <span>back.</span>
        </h1>

        <p>
            Sign in to access your personalized
            dashboard and continue your journey.
        </p>

        <div class="feature-box">

            <div class="feature">
                <span>01</span>
                Secure Authentication
            </div>

            <div class="feature">
                <span>02</span>
                Instant Dashboard Access
            </div>

            <div class="feature">
                <span>03</span>
                Simple & Secure
            </div>

        </div>

    </div>


    <div class="login-right">

        <div class="login-card">

            <span class="form-label">
                MEMBER LOGIN
            </span>

            <h2>
                Sign in to continue
            </h2>

            <p class="subtext">
                Enter your credentials below.
            </p>


            <form action="process.php"
                  method="POST">

                <div class="input-group">

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


                <div class="input-group">

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


                <button type="submit">

                    Login to Dashboard

                    <span>→</span>

                </button>

            </form>


            <div class="demo-box">

                <span>
                    DEMO LOGIN
                </span>

                <p>
                    Username:
                    <strong>admin</strong>
                </p>

                <p>
                    Password:
                    <strong>admin123</strong>
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>