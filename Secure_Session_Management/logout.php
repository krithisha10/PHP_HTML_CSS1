<?php

session_start();


// ========================================
// CLEAR SESSION DATA
// ========================================

$_SESSION = [];


// ========================================
// DESTROY SESSION COOKIE
// ========================================

if (ini_get("session.use_cookies")) {

    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        "",
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}


// ========================================
// DESTROY SESSION
// ========================================

session_destroy();


// ========================================
// REMOVE AUTH COOKIE
// ========================================

setcookie(
    "auth_token",
    "",
    [
        "expires" => time() - 3600,
        "path" => "/",
        "httponly" => true,
        "samesite" => "Lax"
    ]
);


// ========================================
// REMOVE REMEMBERED USER
// ========================================

setcookie(
    "remembered_user",
    "",
    [
        "expires" => time() - 3600,
        "path" => "/",
        "httponly" => true,
        "samesite" => "Lax"
    ]
);

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
        SecureGate | Logged Out
    </title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

<div class="login-page">


    <!-- LEFT -->

    <section class="security-panel">

        <div class="brand">

            <div class="logo">S</div>

            <div>

                <strong>SecureGate</strong>

                <span>AUTHENTICATION CENTER</span>

            </div>

        </div>


        <div class="security-content">

            <div class="tag">
                ● SESSION CLOSED
            </div>

            <h1>
                Access
                <span>securely closed.</span>
            </h1>

            <p>
                Your active authentication session
                has been terminated successfully.
            </p>

            <div class="feature">

                <div class="feature-icon">
                    ✓
                </div>

                <div>

                    <strong>
                        Session Destroyed
                    </strong>

                    <small>
                        Your active login session has ended.
                    </small>

                </div>

            </div>


            <div class="feature">

                <div class="feature-icon">
                    ✓
                </div>

                <div>

                    <strong>
                        Cookie Removed
                    </strong>

                    <small>
                        Authentication information was cleared.
                    </small>

                </div>

            </div>

        </div>


        <div class="footer">
            PHP SESSION & COOKIE MANAGEMENT
        </div>

    </section>



    <!-- RIGHT -->

    <section class="login-panel">

        <div class="login-card">

            <div class="login-heading">

                <span>
                    SUCCESSFULLY SIGNED OUT
                </span>

                <h2>
                    See you again!
                </h2>

                <p>
                    Your SecureGate session has been
                    safely terminated.
                </p>

            </div>


            <div class="demo-box">

                <strong>
                    Security Status
                </strong>

                <p>
                    ✓ PHP session destroyed
                </p>

                <p>
                    ✓ Authentication cookie removed
                </p>

                <p>
                    ✓ Remembered username removed
                </p>

            </div>


            <form action="index.php" method="GET">

                <button type="submit">
                    Sign In Again →
                </button>

            </form>


            <div class="security-note">
                🔒 Authenticate again to access protected pages.
            </div>

        </div>

    </section>

</div>

</body>

</html>