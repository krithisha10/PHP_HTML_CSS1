<?php
session_start();

date_default_timezone_set("Asia/Kolkata");

if (!isset($_SESSION["registrations"])) {
    $_SESSION["registrations"] = [];
}

$events = [
    [
        "name" => "AI & Machine Learning Summit",
        "date" => "2026-09-15",
        "time" => "10:00 AM",
        "venue" => "Innovation Hall"
    ],
    [
        "name" => "Web Development Workshop",
        "date" => "2026-09-18",
        "time" => "02:00 PM",
        "venue" => "Digital Lab"
    ],
    [
        "name" => "Data Analytics Conference",
        "date" => "2026-09-22",
        "time" => "11:30 AM",
        "venue" => "Conference Room"
    ]
];

$today = date("Y-m-d");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Evently | Event Registration
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
                TODAY
            </span>

            <strong>
                <?php echo date("d M Y"); ?>
            </strong>

        </div>

    </header>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <div class="tag">
                ✦ UPCOMING EVENTS
            </div>

            <h1>
                Discover.
                <span>Register. Attend.</span>
            </h1>

            <p>
                Explore upcoming events, check their schedules,
                and register for the sessions you don't want to miss.
            </p>

        </div>


        <div class="hero-shape">

            <div class="circle">
                <span>EVENT</span>
                <strong>2026</strong>
            </div>

        </div>

    </section>


    <!-- CONTENT -->

    <main>

        <!-- EVENT SCHEDULE -->

        <section class="schedule-section">

            <div class="section-title">

                <div>

                    <span>
                        EVENT CALENDAR
                    </span>

                    <h2>
                        Upcoming Schedule
                    </h2>

                </div>

                <div class="event-count">
                    <?php echo count($events); ?> EVENTS
                </div>

            </div>


            <div class="event-list">

                <?php foreach ($events as $index => $event): ?>

                    <?php

                    $eventDate =
                        new DateTime($event["date"]);

                    $todayDate =
                        new DateTime($today);

                    $difference =
                        $todayDate->diff($eventDate);

                    ?>

                    <div class="event-card">

                        <!-- DATE -->

                        <div class="event-date">

                            <span>
                                <?php
                                echo $eventDate->format("M");
                                ?>
                            </span>

                            <strong>
                                <?php
                                echo $eventDate->format("d");
                                ?>
                            </strong>

                            <small>
                                <?php
                                echo $eventDate->format("D");
                                ?>
                            </small>

                        </div>


                        <!-- DETAILS -->

                        <div class="event-details">

                            <span class="event-number">
                                EVENT 0<?php echo $index + 1; ?>
                            </span>

                            <h3>
                                <?php
                                echo htmlspecialchars(
                                    $event["name"]
                                );
                                ?>
                            </h3>

                            <div class="event-meta">

                                <span>
                                    ◷
                                    <?php
                                    echo $event["time"];
                                    ?>
                                </span>

                                <span>
                                    ◉
                                    <?php
                                    echo $event["venue"];
                                    ?>
                                </span>

                            </div>

                        </div>


                        <!-- DAYS -->

                        <div class="days-left">

                            <strong>

                                <?php

                                if ($eventDate >= $todayDate) {
                                    echo $difference->days;
                                } else {
                                    echo "0";
                                }

                                ?>

                            </strong>

                            <span>
                                DAYS
                            </span>

                        </div>


                        <!-- REGISTER -->

                        <form action="process.php"
                              method="POST">

                            <input
                                type="hidden"
                                name="event_name"
                                value="<?php
                                echo htmlspecialchars(
                                    $event["name"]
                                );
                                ?>"
                            >

                            <input
                                type="hidden"
                                name="event_date"
                                value="<?php
                                echo $event["date"];
                                ?>"
                            >

                            <input
                                type="hidden"
                                name="event_time"
                                value="<?php
                                echo $event["time"];
                                ?>"
                            >

                            <input
                                type="hidden"
                                name="event_venue"
                                value="<?php
                                echo htmlspecialchars(
                                    $event["venue"]
                                );
                                ?>"
                            >

                            <button type="submit">
                                Register →
                            </button>

                        </form>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>


        <!-- SIDE PANEL -->

        <aside class="registration-panel">

            <div class="panel-icon">
                ✓
            </div>

            <span class="panel-label">
                REGISTRATION DESK
            </span>

            <h2>
                Your Event Pass
            </h2>

            <p>
                Your session keeps track of the events
                you register for during your visit.
            </p>


            <div class="registration-number">

                <strong>
                    <?php
                    echo count($_SESSION["registrations"]);
                    ?>
                </strong>

                <span>
                    EVENTS REGISTERED
                </span>

            </div>


            <?php if (count($_SESSION["registrations"]) > 0): ?>

                <div class="registered-title">
                    YOUR REGISTRATIONS
                </div>

                <?php foreach ($_SESSION["registrations"] as $registration): ?>

                    <div class="registered-event">

                        <span>✓</span>

                        <div>

                            <strong>
                                <?php
                                echo htmlspecialchars(
                                    $registration["name"]
                                );
                                ?>
                            </strong>

                            <small>
                                <?php
                                echo htmlspecialchars(
                                    $registration["date"]
                                );
                                ?>
                            </small>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="empty-state">

                    No events registered yet.

                    <br>

                    Choose an event to get started.

                </div>

            <?php endif; ?>


            <div class="session-note">

                <strong>
                    SESSION ACTIVE
                </strong>

                <small>
                    Registration data is maintained
                    using PHP sessions.
                </small>

            </div>

        </aside>

    </main>


    <!-- FOOTER -->

    <footer>

        <span>
            EVENTLY · EVENT REGISTRATION & SCHEDULING
        </span>

        <span>
            PHP DATE · FILE · SESSION
        </span>

    </footer>

</div>

</body>

</html>