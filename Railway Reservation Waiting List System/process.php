<?php

/* =========================================
   GET PASSENGER DATA
   ========================================= */

$passengers = $_POST["passengers"] ?? [];

$cancelledSeats = isset($_POST["cancelled_seats"])
    ? (int) $_POST["cancelled_seats"]
    : 0;


/* =========================================
   CREATE WAITING QUEUE
   ========================================= */

$waitingQueue = [];


/* =========================================
   ADD PASSENGERS USING array_push()
   ========================================= */

foreach ($passengers as $passenger) {

    $name = trim($passenger["name"] ?? "");

    $age = (int) ($passenger["age"] ?? 0);

    if ($name !== "" && $age > 0) {

        array_push(
            $waitingQueue,
            [
                "name" => $name,
                "age" => $age
            ]
        );

    }
}


/* =========================================
   INITIAL CONFIRMED PASSENGERS
   ========================================= */

$confirmedPassengers = [];


/* =========================================
   CANCELLED SEATS ARE RELEASED
   ========================================= */

$availableSeats = $cancelledSeats;


/* =========================================
   FIFO SEAT ALLOCATION
   ========================================= */

while (
    $availableSeats > 0 &&
    !empty($waitingQueue)
) {

    /*
     * array_shift() removes the
     * first passenger from the queue.
     */

    $passenger = array_shift($waitingQueue);


    $confirmedPassengers[] = $passenger;

    $availableSeats--;

}


/* =========================================
   REMAINING WAITING LIST
   ========================================= */

$remainingPassengers = $waitingQueue;


/* =========================================
   STATISTICS
   ========================================= */

$totalPassengers =
    count($passengers);

$confirmedCount =
    count($confirmedPassengers);

$waitingCount =
    count($remainingPassengers);

$cancelledCount =
    $cancelledSeats;

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Railway Reservation Report</title>


<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {

    font-family: Arial, Helvetica, sans-serif;

    background: #f6f7f4;

    color: #3e4843;
}


.page {

    width: 100%;

    padding: 30px 6% 25px;
}


/* =========================================
   HEADER
   ========================================= */

.header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 23px;
}


.brand {

    display: flex;

    align-items: center;

    gap: 13px;
}


.train-icon {

    width: 52px;
    height: 52px;

    border-radius: 14px;

    background: #e8ead9;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 22px;
}


.label {

    display: block;

    font-size: 8px;

    letter-spacing: 1.7px;

    color: #718052;

    font-weight: bold;

    margin-bottom: 5px;
}


.header h1 {

    font-size: 24px;

    color: #3d4741;
}


.badge {

    padding: 9px 13px;

    background: #ffffff;

    border: 1px solid #e0e5dc;

    border-radius: 8px;

    color: #778453;

    font-size: 8px;

    font-weight: bold;
}


/* =========================================
   HERO
   ========================================= */

.hero {

    min-height: 145px;

    padding: 27px 32px;

    background: #e9ecdd;

    border-radius: 18px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    position: relative;

    overflow: hidden;

    margin-bottom: 20px;
}


.hero::after {

    content: "";

    position: absolute;

    width: 230px;
    height: 230px;

    border-radius: 50%;

    right: -70px;
    top: -110px;

    background: rgba(255,255,255,.38);
}


.hero-text {

    position: relative;

    z-index: 2;
}


.hero-text span {

    font-size: 8px;

    letter-spacing: 2px;

    color: #718052;

    font-weight: bold;
}


.hero-text h2 {

    font-size: 26px;

    color: #3d4941;

    margin-top: 7px;

    margin-bottom: 7px;
}


.hero-text p {

    font-size: 9px;

    color: #727b73;
}


.hero-icon {

    position: relative;

    z-index: 2;

    width: 70px;
    height: 70px;

    border-radius: 50%;

    background: #ffffff;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 27px;
}


/* =========================================
   STATISTICS
   ========================================= */

.stats {

    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap: 13px;

    margin-bottom: 22px;
}


.stat {

    min-height: 95px;

    padding: 16px;

    border-radius: 11px;

    position: relative;

    overflow: hidden;
}


.stat:nth-child(1) {

    background: #eef3e5;

    border-top: 4px solid #91a463;
}


.stat:nth-child(2) {

    background: #e8f1ed;

    border-top: 4px solid #6d9b82;
}


.stat:nth-child(3) {

    background: #fff0e1;

    border-top: 4px solid #d19a61;
}


.stat:nth-child(4) {

    background: #eee9f4;

    border-top: 4px solid #9680a9;
}


.stat span {

    display: block;

    font-size: 7px;

    letter-spacing: .9px;

    color: #7d8781;

    font-weight: bold;

    margin-bottom: 8px;
}


.stat strong {

    font-size: 25px;

    color: #3f4c45;
}


.stat small {

    display: block;

    margin-top: 4px;

    font-size: 7px;

    color: #919a94;
}


/* =========================================
   SECTION
   ========================================= */

.section-title {

    margin-bottom: 13px;
}


.section-title span {

    display: block;

    font-size: 7px;

    letter-spacing: 1.6px;

    color: #718052;

    font-weight: bold;

    margin-bottom: 5px;
}


.section-title h2 {

    font-size: 19px;

    color: #3d4942;
}


/* =========================================
   PASSENGER CARDS
   ========================================= */

.passenger-card {

    background: #ffffff;

    border: 1px solid #e0e5df;

    border-radius: 11px;

    padding: 16px;

    margin-bottom: 11px;

    display: flex;

    align-items: center;

    gap: 14px;

    box-shadow:
        0 5px 15px rgba(60,70,60,.035);
}


.number {

    width: 43px;
    height: 43px;

    min-width: 43px;

    border-radius: 10px;

    background: #e7ecd9;

    color: #718052;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 9px;

    font-weight: bold;
}


.passenger-info {

    flex: 1;
}


.passenger-info small {

    display: block;

    font-size: 7px;

    letter-spacing: .8px;

    color: #9aa19c;

    font-weight: bold;

    margin-bottom: 4px;
}


.passenger-info h3 {

    font-size: 12px;

    color: #414d47;

    margin-bottom: 4px;
}


.passenger-info p {

    font-size: 8px;

    color: #7f8984;
}


.confirmed {

    padding: 7px 10px;

    border-radius: 6px;

    background: #e5f1e9;

    color: #54836a;

    font-size: 7px;

    font-weight: bold;
}


/* =========================================
   WAITING LIST
   ========================================= */

.waiting {

    border-top: 4px solid #d39a5e;
}


.waiting .number {

    background: #faecd9;

    color: #ad7845;
}


.waiting-badge {

    padding: 7px 10px;

    border-radius: 6px;

    background: #fff1df;

    color: #b27d47;

    font-size: 7px;

    font-weight: bold;
}


/* =========================================
   EMPTY MESSAGE
   ========================================= */

.empty {

    padding: 28px;

    text-align: center;

    background: #ffffff;

    border: 1px dashed #d8dfd8;

    border-radius: 11px;

    margin-bottom: 12px;
}


.empty-icon {

    font-size: 25px;

    margin-bottom: 7px;
}


.empty p {

    font-size: 9px;

    color: #89938e;
}


/* =========================================
   FIFO FLOW
   ========================================= */

.flow {

    margin-top: 19px;

    padding: 15px;

    border-radius: 10px;

    background: #f1f4eb;

    border: 1px solid #e0e6d8;

    text-align: center;
}


.flow-title {

    font-size: 7px;

    letter-spacing: 1.5px;

    font-weight: bold;

    color: #718052;

    margin-bottom: 10px;
}


.flow-items {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    flex-wrap: wrap;
}


.flow-item {

    padding: 8px 12px;

    border-radius: 7px;

    background: #ffffff;

    color: #59644f;

    font-size: 8px;

    font-weight: bold;
}


.arrow {

    color: #82905f;

    font-weight: bold;
}


/* =========================================
   BUTTON
   ========================================= */

.action {

    text-align: center;

    margin-top: 20px;
}


.back-button {

    display: inline-block;

    text-decoration: none;

    background: #7c8e59;

    color: #ffffff;

    padding: 12px 22px;

    border-radius: 8px;

    font-size: 9px;

    font-weight: bold;
}


.back-button:hover {

    background: #687948;
}


/* =========================================
   FOOTER
   ========================================= */

footer {

    text-align: center;

    margin-top: 20px;

    padding-top: 12px;

    border-top: 1px solid #dfe4dc;

    font-size: 8px;

    color: #9ba29d;
}


/* =========================================
   RESPONSIVE
   ========================================= */

@media (max-width: 900px) {

    .stats {

        grid-template-columns:
            repeat(2, 1fr);
    }

}


@media (max-width: 600px) {

    .page {

        padding: 22px 5%;
    }

    .badge {

        display: none;
    }

    .stats {

        grid-template-columns: 1fr;
    }

    .hero-icon {

        display: none;
    }

    .passenger-card {

        align-items: flex-start;

        flex-direction: column;
    }

    .confirmed,
    .waiting-badge {

        align-self: flex-start;
    }

}

</style>

</head>


<body>


<div class="page">


    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="train-icon">
                🚆
            </div>

            <div>

                <span class="label">
                    RAILWAY RESERVATION
                </span>

                <h1>
                    Reservation Report
                </h1>

            </div>

        </div>


        <div class="badge">
            PROCESSING COMPLETE
        </div>

    </header>



    <!-- HERO -->

    <section class="hero">

        <div class="hero-text">

            <span>
                WAITING LIST ANALYSIS
            </span>

            <h2>
                Seat Allocation Report
            </h2>

            <p>
                Cancelled seats have been allocated to passengers
                according to the FIFO queue principle.
            </p>

        </div>


        <div class="hero-icon">
            🎫
        </div>

    </section>



    <!-- STATISTICS -->

    <section class="stats">


        <div class="stat">

            <span>
                TOTAL PASSENGERS
            </span>

            <strong>
                <?= $totalPassengers ?>
            </strong>

            <small>
                In waiting queue
            </small>

        </div>



        <div class="stat">

            <span>
                CONFIRMED
            </span>

            <strong>
                <?= $confirmedCount ?>
            </strong>

            <small>
                Seats allocated
            </small>

        </div>



        <div class="stat">

            <span>
                CANCELLED SEATS
            </span>

            <strong>
                <?= $cancelledCount ?>
            </strong>

            <small>
                Seats released
            </small>

        </div>



        <div class="stat">

            <span>
                WAITING
            </span>

            <strong>
                <?= $waitingCount ?>
            </strong>

            <small>
                Still in queue
            </small>

        </div>


    </section>



    <!-- CONFIRMED -->

    <section>

        <div class="section-title">

            <span>
                SEAT ALLOCATION
            </span>

            <h2>
                Confirmed Passengers
            </h2>

        </div>


        <?php if (!empty($confirmedPassengers)): ?>


            <?php foreach (
                $confirmedPassengers
                as $index => $passenger
            ): ?>


                <div class="passenger-card">


                    <div class="number">

                        C<?= $index + 1 ?>

                    </div>


                    <div class="passenger-info">

                        <small>
                            CONFIRMED PASSENGER
                        </small>

                        <h3>
                            <?= htmlspecialchars(
                                $passenger["name"]
                            ) ?>
                        </h3>

                        <p>
                            Age:
                            <?= htmlspecialchars(
                                $passenger["age"]
                            ) ?>
                        </p>

                    </div>


                    <div class="confirmed">
                        ✓ SEAT CONFIRMED
                    </div>


                </div>


            <?php endforeach; ?>


        <?php else: ?>


            <div class="empty">

                <div class="empty-icon">
                    🎫
                </div>

                <p>
                    No seats were available for confirmation.
                </p>

            </div>


        <?php endif; ?>


    </section>



    <!-- WAITING LIST -->

    <section>

        <div class="section-title">

            <span>
                CURRENT QUEUE
            </span>

            <h2>
                Remaining Waiting List
            </h2>

        </div>


        <?php if (!empty($remainingPassengers)): ?>


            <?php foreach (
                $remainingPassengers
                as $index => $passenger
            ): ?>


                <div class="passenger-card waiting">


                    <div class="number">

                        W<?= $index + 1 ?>

                    </div>


                    <div class="passenger-info">

                        <small>
                            WAITING POSITION <?= $index + 1 ?>
                        </small>

                        <h3>
                            <?= htmlspecialchars(
                                $passenger["name"]
                            ) ?>
                        </h3>

                        <p>
                            Age:
                            <?= htmlspecialchars(
                                $passenger["age"]
                            ) ?>
                        </p>

                    </div>


                    <div class="waiting-badge">
                        ⏳ WAITING
                    </div>


                </div>


            <?php endforeach; ?>


        <?php else: ?>


            <div class="empty">

                <div class="empty-icon">
                    ✓
                </div>

                <p>
                    All passengers have been allocated seats.
                </p>

            </div>


        <?php endif; ?>


    </section>



    <!-- FIFO FLOW -->

    <div class="flow">

        <div class="flow-title">
            FIFO ALLOCATION ORDER
        </div>


        <div class="flow-items">


            <?php foreach (
                $confirmedPassengers
                as $index => $passenger
            ): ?>


                <div class="flow-item">

                    <?= htmlspecialchars(
                        $passenger["name"]
                    ) ?>

                </div>


                <?php if (
                    $index <
                    count($confirmedPassengers) - 1
                ): ?>

                    <div class="arrow">
                        →
                    </div>

                <?php endif; ?>


            <?php endforeach; ?>


        </div>

    </div>



    <!-- BUTTON -->

    <div class="action">

        <a href="index.php"
           class="back-button">

            ← New Reservation

        </a>

    </div>



    <!-- FOOTER -->

    <footer>

        PHP Practical • Railway Reservation Waiting List System • FIFO

    </footer>


</div>


</body>

</html>