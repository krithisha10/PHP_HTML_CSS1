<?php
session_start();

if (isset($_SESSION["username"])) {
    header("Location: shop.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LumaCart | Welcome</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="landing">

    <nav class="navbar">

        <div class="logo">
            <div class="logo-box">L</div>

            <div>
                <strong>LumaCart</strong>
                <small>SHOP • SAVE • SMILE</small>
            </div>
        </div>

        <span class="secure">
            🔒 Secure Shopping
        </span>

    </nav>


    <main class="login-wrapper">

        <section class="hero-content">

            <span class="tag">
                ✦ YOUR PERSONAL SHOPPING SPACE
            </span>

            <h1>
                Shopping that
                <span>remembers you.</span>
            </h1>

            <p>
                Sign in to keep your cart, remember the products
                you viewed, and continue your shopping journey
                right where you left off.
            </p>

            <div class="feature-row">

                <div>
                    <strong>🛒</strong>
                    <span>Smart Cart</span>
                </div>

                <div>
                    <strong>♡</strong>
                    <span>Browsing History</span>
                </div>

                <div>
                    <strong>◉</strong>
                    <span>Session Login</span>
                </div>

            </div>

        </section>


        <section class="login-box">

            <div class="login-symbol">
                👋
            </div>

            <p class="mini-title">
                WELCOME BACK
            </p>

            <h2>
                Sign in to shop
            </h2>

            <p class="login-description">
                Your shopping session will be saved.
            </p>


            <form action="login.php" method="POST">

                <label>
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    placeholder="Enter your name"
                    required
                >


                <label>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >


                <button type="submit">
                    Enter LumaCart →
                </button>

            </form>


            <div class="cookie-note">
                🍪 Cookies keep your shopping preferences.
            </div>

        </section>

    </main>


    <footer>
        LumaCart © 2026 · Session & Cookie Based Shopping System
    </footer>

</div>

</body>
</html>