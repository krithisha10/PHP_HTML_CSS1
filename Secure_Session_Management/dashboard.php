<?php

session_start();

date_default_timezone_set("Asia/Kolkata");


// ========================================
// CHECK SESSION
// ========================================

if (
    !isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true
) {

    // ====================================
    // TRY COOKIE AUTHENTICATION
    // ====================================

    if (isset($_COOKIE["auth_token"])) {

        $decoded = base64_decode(
            $_COOKIE["auth_token"],
            true
        );


        if ($decoded !== false) {

            $parts = explode("|", $decoded);


            if (count($parts) === 3) {

                $username = $parts[0];

                $expiry = $parts[1];

                $signature = $parts[2];


                $secret_key =
                    "SecureGate_2026_Key";


                $data =
                    $username . "|" . $expiry;


                $expected_signature =
                    hash_hmac(
                        "sha256",
                        $data,
                        $secret_key
                    );


                // Verify cookie
                if (
                    hash_equals(
                        $expected_signature,
                        $signature
                    ) &&
                    time() < (int)$expiry
                ) {

                    // Restore session
                    session_regenerate_id(true);

                    $_SESSION["logged_in"] = true;

                    $_SESSION["username"] =
                        $username;

                    $_SESSION["login_time"] =
                        date(
                            "d M Y, h:i A"
                        );

                }

            }

        }

    }

}


// ========================================
// FINAL SESSION CHECK
// ========================================

if (
    !isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true
) {

    header("Location: index.php");

    exit;

}


// ========================================
// GET USER DATA
// ========================================

$username =
    $_SESSION["username"] ?? "User";

$login_time =
    $_SESSION["login_time"] ?? "Unknown";


// ========================================
// COOKIE STATUS
// ========================================

$cookie_active =
    isset($_COOKIE["auth_token"]);


?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        SecureGate | Dashboard
    </title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

<div class="dashboard-page">


    <!-- HEADER -->

    <header class="dashboard-header">

        <div class="brand">

            <div class="logo">S</div>

            <div>

                <strong>SecureGate</strong>

                <span>AUTHENTICATION CENTER</span>

            </div>

        </div>


        <a href="logout.php">
            Sign Out →
        </a>

    </header>



    <!-- MAIN -->

    <main class="dashboard-content">


        <!-- WELCOME -->

        <section class="dashboard-welcome">

            <span>
                ● AUTHENTICATED USER
            </span>

            <h1>

                Welcome,
                <?php
                echo htmlspecialchars($username);
                ?>!

            </h1>

            <p>
                You have successfully entered
                the protected dashboard.
            </p>

        </section>



        <!-- INFORMATION -->

        <section class="info-grid">


            <!-- SESSION -->

            <div class="info-card">

                <div class="card-icon">
                    S
                </div>

                <span>
                    SERVER-SIDE AUTHENTICATION
                </span>

                <h3>
                    PHP Session
                </h3>

                <p>
                    Sessions maintain the active
                    authentication state on the server.
                </p>


                <div class="detail">

                    <span>Status</span>

                    <strong>Active</strong>

                </div>


                <div class="detail">

                    <span>Username</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($username);
                        ?>
                    </strong>

                </div>


                <div class="detail">

                    <span>Login Time</span>

                    <strong>
                        <?php
                        echo htmlspecialchars($login_time);
                        ?>
                    </strong>

                </div>

            </div>



            <!-- COOKIE -->

            <div class="info-card">

                <div class="card-icon">
                    C
                </div>

                <span>
                    BROWSER-SIDE AUTHENTICATION
                </span>

                <h3>
                    Authentication Cookie
                </h3>

                <p>
                    Cookies can remember authentication
                    information between visits.
                </p>


                <div class="detail">

                    <span>Status</span>

                    <strong>

                        <?php

                        echo $cookie_active
                            ? "Active"
                            : "Not Set";

                        ?>

                    </strong>

                </div>


                <div class="detail">

                    <span>Remembered User</span>

                    <strong>

                        <?php

                        echo htmlspecialchars(
                            $_COOKIE["remembered_user"]
                            ?? "Not available"
                        );

                        ?>

                    </strong>

                </div>


                <div class="detail">

                    <span>Validity</span>

                    <strong>
                        30 Days
                    </strong>

                </div>

            </div>


        </section>



        <!-- SESSION VS COOKIE -->

        <section class="comparison-card">

            <span>
                SESSION VS COOKIE
            </span>

            <h3>
                What's the difference?
            </h3>


            <div class="comparison">


                <div class="compare-box">

                    <strong>
                        🔐 SESSION
                    </strong>

                    <p>
                        Session data is maintained on
                        the server. It is mainly used
                        for maintaining the user's
                        active login state.
                    </p>

                </div>


                <div class="compare-box">

                    <strong>
                        🍪 COOKIE
                    </strong>

                    <p>
                        Cookie data is stored in the
                        browser. It can be used to
                        remember authentication or
                        user preferences.
                    </p>

                </div>


            </div>

        </section>



        <!-- SECURITY STATUS -->

        <div class="status">

            ✓ Account protected ·
            Session active ·
            Cookie authentication available

        </div>


    </main>

</div>

</body>

</html>