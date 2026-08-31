<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}


$employee = trim($_POST["employee"]);
$password = $_POST["password"];


/* =====================================
   REGULAR EXPRESSION RULES
   ===================================== */


/* Minimum 8 characters */
$lengthValid = preg_match(
    "/^.{8,}$/",
    $password
);


/* At least one uppercase letter */
$uppercaseValid = preg_match(
    "/[A-Z]/",
    $password
);


/* At least one lowercase letter */
$lowercaseValid = preg_match(
    "/[a-z]/",
    $password
);


/* At least one number */
$numberValid = preg_match(
    "/[0-9]/",
    $password
);


/* At least one special character */
$specialValid = preg_match(
    "/[^A-Za-z0-9]/",
    $password
);


/* =====================================
   FINAL VALIDATION
   ===================================== */

$isValid =
    $lengthValid &&
    $uppercaseValid &&
    $lowercaseValid &&
    $numberValid &&
    $specialValid;

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Password Validation Result</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

<div class="container">


    <!-- HEADER -->

    <header>

        <div class="logo">
            🔐
        </div>

        <div>

            <h1>Password Validation</h1>

            <p>
                Regular expression security verification
            </p>

        </div>

    </header>


    <!-- RESULT CARD -->

    <div class="result-card">

        <?php if ($isValid): ?>

            <!-- VALID -->

            <div class="status-icon valid">
                ✓
            </div>

            <span class="result-tag valid-text">
                VALID PASSWORD
            </span>

            <h2>
                Password Accepted
            </h2>

            <p class="result-message">

                Welcome,
                <strong>
                    <?= htmlspecialchars($employee) ?>
                </strong>.

                Your password satisfies all predefined
                security requirements.

            </p>


            <div class="success-box">

                <span>✓</span>

                <p>
                    All password security rules have been successfully satisfied.
                </p>

            </div>


        <?php else: ?>

            <!-- INVALID -->

            <div class="status-icon invalid">
                !
            </div>

            <span class="result-tag invalid-text">
                INVALID PASSWORD
            </span>

            <h2>
                Password Needs Improvement
            </h2>

            <p class="result-message">

                The password entered by
                <strong>
                    <?= htmlspecialchars($employee) ?>
                </strong>
                does not satisfy all security requirements.

            </p>


            <div class="failed-rules">

                <h3>
                    Security Check
                </h3>


                <div class="check">

                    <span class="<?= $lengthValid ? 'pass' : 'fail' ?>">
                        <?= $lengthValid ? '✓' : '✕' ?>
                    </span>

                    <p>
                        Minimum 8 characters
                    </p>

                </div>


                <div class="check">

                    <span class="<?= $uppercaseValid ? 'pass' : 'fail' ?>">
                        <?= $uppercaseValid ? '✓' : '✕' ?>
                    </span>

                    <p>
                        At least one uppercase letter
                    </p>

                </div>


                <div class="check">

                    <span class="<?= $lowercaseValid ? 'pass' : 'fail' ?>">
                        <?= $lowercaseValid ? '✓' : '✕' ?>
                    </span>

                    <p>
                        At least one lowercase letter
                    </p>

                </div>


                <div class="check">

                    <span class="<?= $numberValid ? 'pass' : 'fail' ?>">
                        <?= $numberValid ? '✓' : '✕' ?>
                    </span>

                    <p>
                        At least one number
                    </p>

                </div>


                <div class="check">

                    <span class="<?= $specialValid ? 'pass' : 'fail' ?>">
                        <?= $specialValid ? '✓' : '✕' ?>
                    </span>

                    <p>
                        At least one special character
                    </p>

                </div>

            </div>

        <?php endif; ?>


        <!-- BACK BUTTON -->

        <a href="index.php" class="back-button">
            ← Try Another Password
        </a>

    </div>


    <footer>
        PHP Practical • Regular Expressions • Password Validation
    </footer>

</div>


<style>

/* =========================
   RESULT CARD
   ========================= */

.result-card {
    background: #ffffff;

    border: 1px solid #dce5ef;

    border-radius: 17px;

    padding: 40px;

    text-align: center;

    box-shadow:
        0 10px 30px rgba(44, 67, 91, 0.07);
}


/* =========================
   STATUS ICON
   ========================= */

.status-icon {
    width: 62px;
    height: 62px;

    margin: 0 auto 18px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    font-size: 25px;

    font-weight: bold;
}

.valid {
    background: #e4f3e9;

    color: #34865a;
}

.invalid {
    background: #f9e8e8;

    color: #bd5757;
}


/* =========================
   RESULT TEXT
   ========================= */

.result-tag {
    font-size: 9px;

    letter-spacing: 1.3px;

    font-weight: bold;
}

.valid-text {
    color: #34865a;
}

.invalid-text {
    color: #bd5757;
}

.result-card h2 {
    font-size: 22px;

    color: #304b68;

    margin: 8px 0 10px;
}

.result-message {
    max-width: 580px;

    margin: auto;

    font-size: 12px;

    line-height: 1.7;

    color: #7f8d9b;
}


/* =========================
   SUCCESS BOX
   ========================= */

.success-box {
    max-width: 580px;

    margin: 25px auto;

    padding: 14px;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 9px;

    background: #f0f8f3;

    border: 1px solid #d5e9dc;

    border-radius: 9px;
}

.success-box span {
    color: #34865a;

    font-weight: bold;
}

.success-box p {
    font-size: 10px;

    color: #5f7768;
}


/* =========================
   FAILED RULES
   ========================= */

.failed-rules {
    max-width: 520px;

    margin: 25px auto;

    padding: 20px;

    text-align: left;

    background: #fafbfc;

    border: 1px solid #e1e7ed;

    border-radius: 10px;
}

.failed-rules h3 {
    font-size: 12px;

    color: #43586c;

    margin-bottom: 14px;
}

.check {
    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 10px;
}

.check:last-child {
    margin-bottom: 0;
}

.check span {
    width: 22px;
    height: 22px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    font-size: 10px;

    font-weight: bold;
}

.check p {
    font-size: 11px;

    color: #71808e;
}

.pass {
    background: #e2f1e7;

    color: #34865a;
}

.fail {
    background: #f8e3e3;

    color: #bd5757;
}


/* =========================
   BACK BUTTON
   ========================= */

.back-button {
    display: inline-block;

    margin-top: 10px;

    padding: 12px 22px;

    background: #527da8;

    color: white;

    text-decoration: none;

    border-radius: 8px;

    font-size: 11px;

    font-weight: bold;
}

.back-button:hover {
    background: #416b93;
}


/* =========================
   RESPONSIVE
   ========================= */

@media (max-width: 600px) {

    .result-card {
        padding: 28px 20px;
    }

}

</style>

</body>
</html>