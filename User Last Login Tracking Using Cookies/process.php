<?php

/*
    Set timezone
*/

date_default_timezone_set("Asia/Kolkata");


/*
    Get username
*/

$username = trim($_POST["username"]);


/*
    Current login time
*/

$current_login =
    date("d M Y, h:i A");


/*
    Check previous login cookie
*/

if (isset($_COOKIE["last_login"])) {

    $previous_login =
        $_COOKIE["last_login"];

    $has_previous_login = true;

} else {

    $previous_login = "";

    $has_previous_login = false;
}


/*
    Store current login
    in cookie for 30 days
*/

setcookie(
    "last_login",
    $current_login,
    time() + (30 * 24 * 60 * 60),
    "/"
);


/*
    Store username
*/

setcookie(
    "username",
    $username,
    time() + (30 * 24 * 60 * 60),
    "/"
);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login Successful | LoginPulse</title>

    <link rel="stylesheet"
          href="style.css">

</head>


<body>

<div class="result-page">


    <div class="result-card">


        <!-- SUCCESS ICON -->

        <div class="success-icon">
            ✓
        </div>


        <p class="result-label">
            LOGIN SUCCESSFUL
        </p>


        <h1>
            Welcome back,
            <span>
                <?php
                echo htmlspecialchars($username);
                ?>!
            </span>
        </h1>


        <?php if ($has_previous_login): ?>

            <p class="result-description">
                We've recognized your previous visit.
                Here's when you last logged in.
            </p>


            <!-- LAST LOGIN -->

            <div class="last-login-card">

                <div class="clock-icon">
                    ◷
                </div>

                <div>

                    <span>
                        YOUR LAST LOGIN
                    </span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $previous_login
                        );
                        ?>
                    </strong>

                </div>

            </div>


            <!-- CURRENT LOGIN -->

            <div class="current-login">

                <div>

                    <span>
                        CURRENT LOGIN
                    </span>

                    <strong>
                        <?php
                        echo $current_login;
                        ?>
                    </strong>

                </div>

                <div class="online-badge">
                    ● ACTIVE
                </div>

            </div>


        <?php else: ?>


            <p class="result-description">
                This is your first login on this browser.
                Your current login time has now been saved
                in a cookie.
            </p>


            <div class="first-login">

                <div class="first-icon">
                    ✦
                </div>

                <div>

                    <span>
                        FIRST LOGIN
                    </span>

                    <strong>
                        <?php
                        echo $current_login;
                        ?>
                    </strong>

                    <small>
                        Your next visit will show this
                        as your last login time.
                    </small>

                </div>

            </div>


        <?php endif; ?>


        <!-- TECHNICAL DETAILS -->

        <div class="technical">

            <div>

                <span>
                    COOKIE
                </span>

                <strong>
                    last_login
                </strong>

            </div>


            <div>

                <span>
                    VALID FOR
                </span>

                <strong>
                    30 Days
                </strong>

            </div>


            <div>

                <span>
                    TIMEZONE
                </span>

                <strong>
                    IST
                </strong>

            </div>

        </div>


        <a href="index.php"
           class="back-button">

            ← Return to Login

        </a>


    </div>

</div>

</body>

</html>