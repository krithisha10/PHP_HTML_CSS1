<?php

session_start();

date_default_timezone_set("Asia/Kolkata");


// ========================================
// DEMO USER DETAILS
// ========================================

$valid_username = "admin";
$valid_password = "admin123";


// ========================================
// GET FORM DATA
// ========================================

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

$remember = isset($_POST["remember"]);


// ========================================
// VALIDATION
// ========================================

if ($username === "" || $password === "") {

    showError("Please enter username and password.");

}


// ========================================
// CHECK LOGIN
// ========================================

if (
    $username !== $valid_username ||
    $password !== $valid_password
) {

    showError("Invalid username or password.");

}


// ========================================
// SECURE SESSION
// ========================================

session_regenerate_id(true);

$_SESSION["logged_in"] = true;

$_SESSION["username"] = $username;

$_SESSION["login_time"] = date("d M Y, h:i A");


// ========================================
// COOKIE AUTHENTICATION
// ========================================

if ($remember) {

    /*
       Create a secure authentication token.

       The username and expiry time are combined
       with an HMAC signature.
    */

    $expiry = time() + (86400 * 30);

    $data = $username . "|" . $expiry;

    $secret_key = "SecureGate_2026_Key";

    $signature = hash_hmac(
        "sha256",
        $data,
        $secret_key
    );

    $cookie_value =
        base64_encode(
            $data . "|" . $signature
        );


    // Remember username
    setcookie(
        "remembered_user",
        $username,
        [
            "expires" => $expiry,
            "path" => "/",
            "httponly" => true,
            "samesite" => "Lax"
        ]
    );


    // Authentication cookie
    setcookie(
        "auth_token",
        $cookie_value,
        [
            "expires" => $expiry,
            "path" => "/",
            "httponly" => true,
            "samesite" => "Lax"
        ]
    );

}


// ========================================
// REDIRECT
// ========================================

header("Location: dashboard.php");

exit;


// ========================================
// ERROR FUNCTION
// ========================================

function showError($message)
{
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login Failed | SecureGate</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="login-page">

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
                ● SECURITY CHECK
            </div>

            <h1>
                Protecting
                <span>your access.</span>
            </h1>

            <p>
                Authentication is required before
                accessing protected resources.
            </p>

        </div>

        <div class="footer">
            PHP SESSION & COOKIE MANAGEMENT
        </div>

    </section>


    <section class="login-panel">

        <div class="login-card">

            <div class="login-heading">

                <span>ACCESS DENIED</span>

                <h2>Login failed</h2>

                <p>
                    We couldn't verify your credentials.
                </p>

            </div>


            <div class="demo-box">

                <strong>Authentication Error</strong>

                <p>
                    <?php echo htmlspecialchars($message); ?>
                </p>

            </div>


            <form action="index.php" method="GET">

                <button type="submit">
                    Try Again →
                </button>

            </form>


            <div class="security-note">
                🔒 No active session was created.
            </div>

        </div>

    </section>

</div>

</body>

</html>

<?php

    exit;
}

?>