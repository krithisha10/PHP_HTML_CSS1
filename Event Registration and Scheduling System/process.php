<?php

session_start();

date_default_timezone_set("Asia/Kolkata");


// ========================================
// CHECK REQUEST
// ========================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit;
}


// ========================================
// GET EVENT DATA
// ========================================

$event_name = $_POST["event_name"] ?? "";

$event_date = $_POST["event_date"] ?? "";

$event_time = $_POST["event_time"] ?? "";

$event_venue = $_POST["event_venue"] ?? "";


// ========================================
// VALIDATE
// ========================================

if (
    empty($event_name) ||
    empty($event_date) ||
    empty($event_time) ||
    empty($event_venue)
) {

    header("Location: index.php");

    exit;
}


// ========================================
// FORMAT EVENT DATE
// ========================================

$date_object = new DateTime($event_date);

$formatted_date =
    $date_object->format("d M Y");

$day =
    $date_object->format("l");


// ========================================
// CREATE SESSION ARRAY
// ========================================

if (!isset($_SESSION["registrations"])) {

    $_SESSION["registrations"] = [];

}


// ========================================
// CHECK DUPLICATE REGISTRATION
// ========================================

$already_registered = false;

foreach ($_SESSION["registrations"] as $registration) {

    if ($registration["name"] === $event_name) {

        $already_registered = true;

        break;
    }
}


// ========================================
// ADD REGISTRATION
// ========================================

if (!$already_registered) {

    $_SESSION["registrations"][] = [

        "name" => $event_name,

        "date" => $formatted_date,

        "time" => $event_time,

        "venue" => $event_venue,

        "registered_at" =>
            date("d M Y, h:i A")

    ];

}


// ========================================
// FILE HANDLING
// ========================================

$file_name = "events.txt";

$registration_time =
    date("d M Y, h:i:s A");


// ========================================
// CREATE RECORD
// ========================================

$record =
    "Event: " . $event_name . PHP_EOL .
    "Date: " . $formatted_date . PHP_EOL .
    "Day: " . $day . PHP_EOL .
    "Time: " . $event_time . PHP_EOL .
    "Venue: " . $event_venue . PHP_EOL .
    "Registered At: " . $registration_time . PHP_EOL .
    "----------------------------------------" . PHP_EOL;


// ========================================
// APPEND TO FILE
// ========================================

file_put_contents(
    $file_name,
    $record,
    FILE_APPEND
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
        Evently | Registration Successful
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">


    <!-- HEADER -->

    <header>

        <div class="brand">

            <div class="brand-icon">
                ✦
            </div>

            <div>

                <h2>Evently</h2>

                <span>
                    EVENTS & SCHEDULING
                </span>

            </div>

        </div>

        <div class="header-right">

            <span>
                REGISTRATION
            </span>

            <strong>
                SUCCESSFUL
            </strong>

        </div>

    </header>


    <!-- SUCCESS HERO -->

    <section class="hero">

        <div class="hero-content">

            <div class="tag">
                ✓ REGISTRATION CONFIRMED
            </div>

            <h1>
                You're
                <span>all set.</span>
            </h1>

            <p>
                Your event registration has been successfully
                recorded. Your registration is maintained using
                a PHP session.
            </p>

        </div>


        <div class="hero-shape">

            <div class="circle">

                <span>
                    REGISTERED
                </span>

                <strong>
                    ✓
                </strong>

            </div>

        </div>

    </section>


    <!-- RESULT -->

    <main>

        <section class="schedule-section">

            <div class="section-title">

                <div>

                    <span>
                        REGISTRATION DETAILS
                    </span>

                    <h2>
                        Event Pass
                    </h2>

                </div>

            </div>


            <div class="event-card">

                <div class="event-date">

                    <span>
                        <?php
                        echo $date_object->format("M");
                        ?>
                    </span>

                    <strong>
                        <?php
                        echo $date_object->format("d");
                        ?>
                    </strong>

                    <small>
                        <?php
                        echo $date_object->format("D");
                        ?>
                    </small>

                </div>


                <div class="event-details">

                    <span class="event-number">
                        REGISTERED EVENT
                    </span>

                    <h3>
                        <?php
                        echo htmlspecialchars($event_name);
                        ?>
                    </h3>

                    <div class="event-meta">

                        <span>
                            ◷
                            <?php
                            echo htmlspecialchars($event_time);
                            ?>
                        </span>

                        <span>
                            ◉
                            <?php
                            echo htmlspecialchars($event_venue);
                            ?>
                        </span>

                    </div>

                </div>


                <div class="days-left">

                    <strong>
                        ✓
                    </strong>

                    <span>
                        READY
                    </span>

                </div>


                <div></div>

            </div>


            <!-- DATE INFORMATION -->

            <div class="registration-panel"
                 style="margin-top:15px;">

                <div class="panel-icon">
                    ◷
                </div>

                <span class="panel-label">
                    SCHEDULE INFORMATION
                </span>

                <h2>
                    Event Date
                </h2>

                <p>
                    Your event is scheduled according to
                    the selected date and time.
                </p>

                <div class="registration-number">

                    <strong>
                        <?php
                        echo $date_object->format("d");
                        ?>
                    </strong>

                    <span>
                        <?php
                        echo strtoupper(
                            $date_object->format("F Y")
                        );
                        ?>
                    </span>

                </div>

            </div>

        </section>


        <!-- SIDE PANEL -->

        <aside class="registration-panel">

            <div class="panel-icon">
                ✓
            </div>

            <span class="panel-label">
                REGISTRATION COMPLETE
            </span>

            <h2>
                Event Reserved
            </h2>

            <p>
                Your registration has been added to
                your current session.
            </p>


            <div class="registered-event">

                <span>
                    ✓
                </span>

                <div>

                    <strong>
                        <?php
                        echo htmlspecialchars($event_name);
                        ?>
                    </strong>

                    <small>
                        <?php
                        echo $formatted_date;
                        ?>
                    </small>

                </div>

            </div>


            <div class="session-note">

                <strong>
                    FILE UPDATED
                </strong>

                <small>
                    Registration details have been
                    appended to events.txt.
                </small>

            </div>


            <form action="index.php" method="GET">

                <button
                    type="submit"
                    style="
                    width:100%;
                    height:38px;
                    margin-top:15px;
                    border:none;
                    border-radius:8px;
                    background:#e57f6f;
                    color:white;
                    font-size:7px;
                    font-weight:700;
                    cursor:pointer;
                    "
                >
                    View All Events →
                </button>

            </form>

        </aside>

    </main>


    <footer>

        <span>
            EVENTLY · EVENT REGISTRATION & SCHEDULING
        </span>

        <span>
            REGISTRATION SAVED SUCCESSFULLY
        </span>

    </footer>

</div>

</body>

</html>