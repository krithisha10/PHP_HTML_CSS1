<?php

session_start();


// ==========================================
// PROTECT RESULT PAGE
// ==========================================

if (
    !isset($_SESSION["authenticated"]) ||
    $_SESSION["authenticated"] !== true
) {

    header("Location: index.php");

    exit;
}


$username =
    $_SESSION["student_username"];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Examination Submitted
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body class="result-page">


<div class="result-card">

    <div class="success-icon">
        ✓
    </div>

    <span>
        EXAMINATION COMPLETED
    </span>

    <h1>
        Well done,
        <?php
        echo htmlspecialchars($username);
        ?>!
    </h1>

    <p>
        Your examination has been submitted successfully.
        Your secure examination session remains active.
    </p>


    <div class="result-details">

        <div>
            <small>STATUS</small>
            <strong>SUBMITTED</strong>
        </div>

        <div>
            <small>ACCESS</small>
            <strong>AUTHORIZED</strong>
        </div>

    </div>


    <a href="logout.php"
       class="finish-btn">

        End Secure Session

    </a>

</div>


</body>
</html>