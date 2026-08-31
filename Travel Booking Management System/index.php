<?php
session_start();

date_default_timezone_set("Asia/Kolkata");

if (!isset($_SESSION["bookings"])) {
    $_SESSION["bookings"] = [];
}

$destinations = [
    [
        "name" => "Ooty",
        "location" => "Tamil Nadu",
        "date" => "2026-09-12",
        "time" => "06:30 AM",
        "duration" => "2 Days",
        "price" => "₹3,500"
    ],
    [
        "name" => "Munnar",
        "location" => "Kerala",
        "date" => "2026-09-18",
        "time" => "07:00 AM",
        "duration" => "3 Days",
        "price" => "₹5,200"
    ],
    [
        "name" => "Goa",
        "location" => "Goa",
        "date" => "2026-09-25",
        "time" => "08:30 AM",
        "duration" => "4 Days",
        "price" => "₹7,800"
    ],
    [
        "name" => "Coorg",
        "location" => "Karnataka",
        "date" => "2026-10-03",
        "time" => "06:00 AM",
        "duration" => "3 Days",
        "price" => "₹4,800"
    ]
];

$today = new DateTime(date("Y-m-d"));

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Tripora | Travel Booking
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">


    <!-- NAVBAR -->

    <header>

        <div class="logo-area">

            <div class="logo">
                ✈
            </div>

            <div>

                <h2>Tripora</h2>

                <span>
                    TRAVEL & BOOKING
                </span>

            </div>

        </div>


        <div class="nav-info">

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

        <div class="hero-text">

            <div class="hero-tag">
                ✦ PLAN YOUR NEXT JOURNEY
            </div>

            <h1>
                Your journey
                <span>starts here.</span>
            </h1>

            <p>
                Explore beautiful destinations, choose
                your travel schedule, and reserve your
                next unforgettable trip.
            </p>

            <div class="hero-points">

                <span>✓ Flexible dates</span>

                <span>✓ Easy booking</span>

                <span>✓ Instant confirmation</span>

            </div>

        </div>


        <div class="hero-visual">

            <div class="sun"></div>

            <div class="mountain mountain-one"></div>

            <div class="mountain mountain-two"></div>

            <div class="plane">
                ✈
            </div>

        </div>

    </section>


    <!-- MAIN -->

    <main>


        <!-- DESTINATIONS -->

        <section class="destination-section">

            <div class="section-heading">

                <div>

                    <span>
                        EXPLORE DESTINATIONS
                    </span>

                    <h2>
                        Upcoming Trips
                    </h2>

                </div>

                <div class="trip-count">
                    <?php echo count($destinations); ?>
                    TRIPS
                </div>

            </div>


            <div class="destination-list">


                <?php foreach ($destinations as $index => $trip): ?>

                    <?php

                    $travelDate =
                        new DateTime($trip["date"]);

                    $daysRemaining =
                        $today->diff($travelDate);

                    ?>

                    <div class="destination-card">


                        <!-- DESTINATION ICON -->

                        <div class="destination-icon">

                            <?php

                            $icons = ["🏔", "🌿", "🌊", "🌲"];

                            echo $icons[$index];

                            ?>

                        </div>


                        <!-- DESTINATION DETAILS -->

                        <div class="destination-details">

                            <span class="trip-number">
                                TRIP 0<?php echo $index + 1; ?>
                            </span>

                            <h3>
                                <?php
                                echo htmlspecialchars(
                                    $trip["name"]
                                );
                                ?>
                            </h3>

                            <small>
                                <?php
                                echo htmlspecialchars(
                                    $trip["location"]
                                );
                                ?>
                            </small>


                            <div class="trip-meta">

                                <span>
                                    📅
                                    <?php
                                    echo $travelDate->format(
                                        "d M Y"
                                    );
                                    ?>
                                </span>

                                <span>
                                    ◷
                                    <?php
                                    echo $trip["time"];
                                    ?>
                                </span>

                            </div>

                        </div>


                        <!-- DURATION -->

                        <div class="trip-duration">

                            <strong>
                                <?php
                                echo $trip["duration"];
                                ?>
                            </strong>

                            <span>
                                JOURNEY
                            </span>

                        </div>


                        <!-- PRICE -->

                        <div class="trip-price">

                            <span>
                                FROM
                            </span>

                            <strong>
                                <?php
                                echo $trip["price"];
                                ?>
                            </strong>

                        </div>


                        <!-- BOOK -->

                        <form
                            action="process.php"
                            method="POST"
                        >

                            <input
                                type="hidden"
                                name="destination"
                                value="<?php
                                echo htmlspecialchars(
                                    $trip["name"]
                                );
                                ?>"
                            >

                            <input
                                type="hidden"
                                name="location"
                                value="<?php
                                echo htmlspecialchars(
                                    $trip["location"]
                                );
                                ?>"
                            >

                            <input
                                type="hidden"
                                name="travel_date"
                                value="<?php
                                echo $trip["date"];
                                ?>"
                            >

                            <input
                                type="hidden"
                                name="travel_time"
                                value="<?php
                                echo $trip["time"];
                                ?>"
                            >

                            <input
                                type="hidden"
                                name="duration"
                                value="<?php
                                echo $trip["duration"];
                                ?>"
                            >

                            <input
                                type="hidden"
                                name="price"
                                value="<?php
                                echo $trip["price"];
                                ?>"
                            >

                            <button type="submit">
                                Book Trip →
                            </button>

                        </form>

                    </div>

                <?php endforeach; ?>

            </div>

        </section>


        <!-- BOOKING PANEL -->

        <aside class="booking-panel">

            <div class="panel-top">

                <div class="panel-icon">
                    ✈
                </div>

                <span>
                    MY JOURNEYS
                </span>

            </div>


            <h2>
                Your Travel Desk
            </h2>

            <p>
                Your booking information is maintained
                throughout this session.
            </p>


            <!-- BOOKING COUNT -->

            <div class="booking-count">

                <strong>
                    <?php
                    echo count($_SESSION["bookings"]);
                    ?>
                </strong>

                <span>
                    ACTIVE BOOKINGS
                </span>

            </div>


            <?php if (count($_SESSION["bookings"]) > 0): ?>


                <div class="registered-title">
                    RECENT BOOKINGS
                </div>


                <?php foreach ($_SESSION["bookings"] as $booking): ?>

                    <div class="booking-item">

                        <div class="check">
                            ✓
                        </div>

                        <div>

                            <strong>
                                <?php
                                echo htmlspecialchars(
                                    $booking["destination"]
                                );
                                ?>
                            </strong>

                            <small>
                                <?php
                                echo htmlspecialchars(
                                    $booking["travel_date"]
                                );
                                ?>
                            </small>

                        </div>

                    </div>

                <?php endforeach; ?>


            <?php else: ?>


                <div class="empty-booking">

                    <div>
                        ✦
                    </div>

                    <p>
                        No trips booked yet.
                    </p>

                    <small>
                        Choose a destination to
                        start your journey.
                    </small>

                </div>


            <?php endif; ?>


            <div class="session-box">

                <strong>
                    SESSION ACTIVE
                </strong>

                <small>
                    Booking information is being
                    maintained using PHP sessions.
                </small>

            </div>

        </aside>

    </main>


    <!-- FOOTER -->

    <footer>

        <span>
            TRIPORA · TRAVEL BOOKING MANAGEMENT SYSTEM
        </span>

        <span>
            PHP · FILES · SESSIONS · DATE FUNCTIONS
        </span>

    </footer>

</div>

</body>

</html>