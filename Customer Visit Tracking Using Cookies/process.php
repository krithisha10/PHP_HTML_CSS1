<?php

// Cookie lifetime: 30 days
$cookie_time = time() + (30 * 24 * 60 * 60);

// Get form data
$name = htmlspecialchars($_POST['customer_name']);
$preference = htmlspecialchars($_POST['preference']);

// Check whether customer has visited before
$is_returning = isset($_COOKIE['customer_name']);

// Get previous visit count
if (isset($_COOKIE['visit_count'])) {
    $visit_count = (int)$_COOKIE['visit_count'] + 1;
} else {
    $visit_count = 1;
}

// Store customer information in cookies
setcookie("customer_name", $name, $cookie_time);
setcookie("preference", $preference, $cookie_time);
setcookie("visit_count", $visit_count, $cookie_time);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="result-page">

    <div class="result-card">

        <div class="success-icon">
            ✓
        </div>

        <?php if ($is_returning): ?>

            <p class="small-title">WELCOME BACK</p>

            <h1>
                Great to see you again,
                <span><?php echo $name; ?>!</span>
            </h1>

            <p class="message">
                We've remembered your favorite experience:
                <strong><?php echo $preference; ?></strong>.
            </p>

        <?php else: ?>

            <p class="small-title">WELCOME</p>

            <h1>
                Nice to meet you,
                <span><?php echo $name; ?>!</span>
            </h1>

            <p class="message">
                We've saved your preference for your next visit.
            </p>

        <?php endif; ?>

        <div class="stats">

            <div class="stat-box">
                <span>👋</span>
                <strong><?php echo $visit_count; ?></strong>
                <small>Visit Number</small>
            </div>

            <div class="stat-box">
                <span>❤️</span>
                <strong><?php echo $preference; ?></strong>
                <small>Preference</small>
            </div>

        </div>

        <div class="remember-box">
            <span>🍪</span>
            <div>
                <strong>We'll remember you</strong>
                <p>Your preferences are stored for 30 days.</p>
            </div>
        </div>

        <a href="index.php" class="back-button">
            ← Back to Welcome
        </a>

    </div>

</div>

</body>
</html>