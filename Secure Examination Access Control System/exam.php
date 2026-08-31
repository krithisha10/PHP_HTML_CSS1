<?php

session_start();


// ==========================================
// ACCESS CONTROL
// ==========================================

if (
    !isset($_SESSION["authenticated"]) ||
    $_SESSION["authenticated"] !== true
) {

    header("Location: index.php");

    exit;
}


// Check examination access

if (
    !isset($_SESSION["exam_access"]) ||
    $_SESSION["exam_access"] !== true
) {

    header("Location: index.php");

    exit;
}


$username =
    $_SESSION["student_username"];


// Read cookie

$savedName =
    $_COOKIE["student_name"] ?? $username;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Examination | ExamSecure
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body class="exam-page">


<header class="exam-header">

    <div class="exam-brand">

        <div class="mini-logo">
            EX
        </div>

        <div>

            <strong>
                ExamSecure
            </strong>

            <span>
                ONLINE EXAMINATION SYSTEM
            </span>

        </div>

    </div>


    <div class="student-area">

        <div>

            <span>
                CANDIDATE
            </span>

            <strong>
                <?php
                echo htmlspecialchars($savedName);
                ?>
            </strong>

        </div>

        <a href="logout.php">
            Logout
        </a>

    </div>

</header>


<main class="exam-main">


    <div class="exam-top">

        <div>

            <span class="section-tag">
                SECURE EXAMINATION
            </span>

            <h1>
                Computer Science Assessment
            </h1>

            <p>
                Welcome,
                <?php
                echo htmlspecialchars($username);
                ?>.
                Your examination access has been verified.
            </p>

        </div>


        <div class="secure-status">

            <span>✓</span>

            <div>

                <strong>
                    ACCESS VERIFIED
                </strong>

                <small>
                    Secure session active
                </small>

            </div>

        </div>

    </div>


    <div class="exam-layout">


        <section class="questions">


            <div class="question-card">

                <span class="question-number">
                    QUESTION 01
                </span>

                <h2>
                    Which language is primarily used
                    for web development with PHP?
                </h2>


                <label class="option">

                    <input type="radio"
                           name="q1">

                    HTML

                </label>


                <label class="option">

                    <input type="radio"
                           name="q1">

                    PHP

                </label>


                <label class="option">

                    <input type="radio"
                           name="q1">

                    SQL

                </label>


                <label class="option">

                    <input type="radio"
                           name="q1">

                    CSS

                </label>

            </div>


            <div class="question-card">

                <span class="question-number">
                    QUESTION 02
                </span>

                <h2>
                    Which PHP function starts a session?
                </h2>


                <label class="option">

                    <input type="radio"
                           name="q2">

                    start_cookie()

                </label>


                <label class="option">

                    <input type="radio"
                           name="q2">

                    session_start()

                </label>


                <label class="option">

                    <input type="radio"
                           name="q2">

                    begin_session()

                </label>


                <label class="option">

                    <input type="radio"
                           name="q2">

                    session_open()

                </label>

            </div>


            <a href="result.php"
               class="submit-exam">

                Submit Examination →

            </a>

        </section>


        <aside class="exam-sidebar">

            <div class="sidebar-card">

                <span>
                    EXAM DETAILS
                </span>

                <div class="detail-row">
                    <small>Candidate</small>
                    <strong>
                        <?php
                        echo htmlspecialchars($username);
                        ?>
                    </strong>
                </div>

                <div class="detail-row">
                    <small>Questions</small>
                    <strong>02</strong>
                </div>

                <div class="detail-row">
                    <small>Access</small>
                    <strong>Verified</strong>
                </div>

            </div>


            <div class="security-card">

                <div class="shield">
                    ✓
                </div>

                <h3>
                    Protected Access
                </h3>

                <p>
                    This examination page can only
                    be accessed by an authenticated user.
                </p>

            </div>

        </aside>

    </div>

</main>


</body>
</html>