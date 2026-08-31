<?php

date_default_timezone_set("Asia/Kolkata");


// ========================================
// GET INPUT VALUES
// ========================================

$checkin = $_POST["checkin"] ?? "";
$checkout = $_POST["checkout"] ?? "";


// ========================================
// VALIDATE INPUT
// ========================================

if ($checkin === "" || $checkout === "") {

    showError("Please select both check-in and check-out dates.");

}


// ========================================
// CONVERT TO DATE OBJECTS
// ========================================

$checkin_date = new DateTime($checkin);

$checkout_date = new DateTime($checkout);


// ========================================
// CHECK DATE ORDER
// ========================================

if ($checkout_date <= $checkin_date) {

    showError(
        "Check-out date must be later than check-in date."
    );

}


// ========================================
// CALCULATE STAY
// ========================================

$duration = $checkin_date->diff($checkout_date);

$total_days = $duration->days;


// ========================================
// FORMAT DATES
// ========================================

$formatted_checkin =
    $checkin_date->format("d M Y");

$formatted_checkout =
    $checkout_date->format("d M Y");

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
        StayEase | Booking Summary
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">


    <!-- HEADER -->

    <header>

        <div class="logo">

            <div class="logo-icon">
                ✦
            </div>

            <div>

                <h2>StayEase</h2>

                <span>HOTEL & RESORTS</span>

            </div>

        </div>

        <div class="header-text">
            BOOKING SUMMARY
        </div>

    </header>



    <!-- RESULT -->

    <main>

        <section class="intro">

            <div class="small-label">
                ✦ STAY CONFIRMED
            </div>

            <h1>

                Your stay
                <span>is planned.</span>

            </h1>

            <p>

                Based on the dates you selected,
                your total hotel stay duration has
                been calculated successfully.

            </p>


            <div class="benefits">

                <div class="benefit">

                    <div class="benefit-icon">
                        ✓
                    </div>

                    <div>

                        <strong>
                            Dates Verified
                        </strong>

                        <small>
                            Your check-in and check-out dates are valid.
                        </small>

                    </div>

                </div>


                <div class="benefit">

                    <div class="benefit-icon">
                        ◷
                    </div>

                    <div>

                        <strong>
                            Duration Calculated
                        </strong>

                        <small>
                            PHP DateTime calculated your stay accurately.
                        </small>

                    </div>

                </div>

            </div>

        </section>



        <!-- RESULT CARD -->

        <section class="calculator-section">

            <div class="calculator-card">

                <div class="card-heading">

                    <span>
                        BOOKING DETAILS
                    </span>

                    <h2>
                        Your Stay
                    </h2>

                    <p>
                        Here's your calculated duration.
                    </p>

                </div>


                <!-- CHECK-IN -->

                <div
                    class="detail-box"
                    style="
                    margin-top:25px;
                    padding:15px;
                    background:#faf7f1;
                    border:1px solid #e5ddcf;
                    border-radius:10px;
                    "
                >

                    <span
                        style="
                        display:block;
                        color:#9a927f;
                        font-size:6px;
                        letter-spacing:1px;
                        "
                    >
                        CHECK-IN
                    </span>

                    <strong
                        style="
                        display:block;
                        margin-top:5px;
                        color:#555650;
                        font-size:13px;
                        "
                    >
                        <?php
                        echo htmlspecialchars($formatted_checkin);
                        ?>
                    </strong>

                </div>



                <!-- CHECK-OUT -->

                <div
                    class="detail-box"
                    style="
                    margin-top:10px;
                    padding:15px;
                    background:#faf7f1;
                    border:1px solid #e5ddcf;
                    border-radius:10px;
                    "
                >

                    <span
                        style="
                        display:block;
                        color:#9a927f;
                        font-size:6px;
                        letter-spacing:1px;
                        "
                    >
                        CHECK-OUT
                    </span>

                    <strong
                        style="
                        display:block;
                        margin-top:5px;
                        color:#555650;
                        font-size:13px;
                        "
                    >
                        <?php
                        echo htmlspecialchars($formatted_checkout);
                        ?>
                    </strong>

                </div>



                <!-- DURATION -->

                <div
                    style="
                    margin-top:18px;
                    padding:22px;
                    text-align:center;
                    background:#eee5d6;
                    border-radius:12px;
                    "
                >

                    <span
                        style="
                        display:block;
                        color:#9a8054;
                        font-size:6px;
                        letter-spacing:1.2px;
                        font-weight:800;
                        "
                    >
                        TOTAL STAY
                    </span>

                    <strong
                        style="
                        display:block;
                        margin-top:6px;
                        color:#8d7045;
                        font-family:Georgia,serif;
                        font-size:34px;
                        font-weight:500;
                        "
                    >
                        <?php
                        echo $total_days;
                        ?>
                    </strong>

                    <span
                        style="
                        color:#9a8054;
                        font-size:7px;
                        "
                    >
                        <?php
                        echo ($total_days == 1)
                            ? "DAY"
                            : "DAYS";
                        ?>
                    </span>

                </div>



                <form action="index.php" method="GET">

                    <button type="submit">
                        Calculate Another Stay
                        <span>→</span>
                    </button>

                </form>


                <div class="card-footer">

                    <span>
                        DATE DIFFERENCE
                    </span>

                    <strong>
                        <?php
                        echo $total_days;
                        ?> NIGHT<?php
                        echo ($total_days == 1) ? "" : "S";
                        ?>
                    </strong>

                </div>

            </div>

        </section>

    </main>


    <footer>

        <span>
            STAYEASE HOTEL & RESORTS
        </span>

        <span>
            SMART STAY PLANNER · 2026
        </span>

    </footer>

</div>

</body>

</html>


<?php


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

    <title>
        StayEase | Error
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <header>

        <div class="logo">

            <div class="logo-icon">
                ✦
            </div>

            <div>

                <h2>StayEase</h2>

                <span>HOTEL & RESORTS</span>

            </div>

        </div>

    </header>


    <main>

        <section class="intro">

            <div class="small-label">
                ✦ DATE CHECK
            </div>

            <h1>
                Let's fix
                <span>your dates.</span>
            </h1>

            <p>
                We couldn't calculate the stay duration
                because the selected dates are not valid.
            </p>

        </section>


        <section class="calculator-section">

            <div class="calculator-card">

                <div class="card-heading">

                    <span>
                        VALIDATION ERROR
                    </span>

                    <h2>
                        Invalid Dates
                    </h2>

                    <p>
                        <?php
                        echo htmlspecialchars($message);
                        ?>
                    </p>

                </div>


                <form action="index.php" method="GET">

                    <button type="submit">
                        Choose Dates Again →
                    </button>

                </form>

            </div>

        </section>

    </main>

</div>

</body>

</html>

<?php
    exit;
}

?>