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
// GET CUSTOMER DETAILS
// ========================================

$customer_name =
    trim($_POST["customer_name"] ?? "");

$customer_email =
    trim($_POST["customer_email"] ?? "");

$customer_phone =
    trim($_POST["customer_phone"] ?? "");


// ========================================
// GET TRAVEL DETAILS
// ========================================

$destination =
    trim($_POST["destination"] ?? "");

$location =
    trim($_POST["location"] ?? "");

$travel_date =
    trim($_POST["travel_date"] ?? "");

$travel_time =
    trim($_POST["travel_time"] ?? "");

$duration =
    trim($_POST["duration"] ?? "");

$price =
    trim($_POST["price"] ?? "");


// ========================================
// FIRST REQUEST
// ========================================

if (
    empty($customer_name) &&
    empty($customer_email) &&
    empty($customer_phone)
) {

    ?>

    <!DOCTYPE html>

    <html>

    <head>

        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >

        <title>
            Tripora | Customer Details
        </title>

        <link rel="stylesheet" href="style.css">

        <style>

            .customer-page {
                width: 86%;
                max-width: 600px;

                margin: 50px auto;

                background: white;

                padding: 35px;

                border-radius: 18px;

                border: 1px solid #e3ebe8;

                box-shadow:
                    0 12px 35px
                    rgba(40,80,75,0.06);
            }

            .customer-page .mini-icon {
                width: 45px;
                height: 45px;

                border-radius: 12px;

                background: #fff3d9;

                display: flex;

                align-items: center;

                justify-content: center;

                font-size: 20px;
            }

            .customer-page h1 {
                margin-top: 15px;

                font-family: Georgia, serif;

                font-size: 27px;

                font-weight: 500;

                color: #414b49;
            }

            .customer-page p {
                margin-top: 7px;

                color: #969f9c;

                font-size: 7px;

                line-height: 1.7;
            }

            .selected-trip {
                margin-top: 20px;

                padding: 14px;

                background: #eaf4f2;

                border-radius: 10px;
            }

            .selected-trip strong {
                display: block;

                color: #418f88;

                font-size: 9px;
            }

            .selected-trip span {
                display: block;

                margin-top: 4px;

                color: #8a9b97;

                font-size: 6px;
            }

            .customer-form {
                margin-top: 22px;
            }

            .field {
                margin-bottom: 15px;
            }

            .field label {
                display: block;

                margin-bottom: 6px;

                color: #697673;

                font-size: 6px;

                font-weight: 700;

                letter-spacing: .7px;
            }

            .field input {
                width: 100%;

                height: 40px;

                padding: 0 11px;

                border: 1px solid #dfe8e5;

                border-radius: 8px;

                outline: none;

                font-family: inherit;

                font-size: 7px;

                background: #fbfdfc;
            }

            .field input:focus {
                border-color: #65aaa3;

                box-shadow:
                    0 0 0 3px
                    rgba(101,170,163,.1);
            }

            .customer-form button {
                width: 100%;

                height: 42px;

                border: none;

                border-radius: 8px;

                background: #3d9a92;

                color: white;

                font-family: inherit;

                font-size: 7px;

                font-weight: 700;

                cursor: pointer;
            }

            .customer-form button:hover {
                background: #2e837c;
            }

            .back-link {
                display: block;

                margin-top: 14px;

                text-align: center;

                color: #8da09c;

                text-decoration: none;

                font-size: 6px;
            }

        </style>

    </head>


    <body>

    <div class="page">

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

        </header>


        <div class="customer-page">

            <div class="mini-icon">
                ✈
            </div>

            <h1>
                Complete Your Booking
            </h1>

            <p>
                Enter your customer information to
                confirm your selected journey.
            </p>


            <div class="selected-trip">

                <strong>
                    <?php
                    echo htmlspecialchars($destination);
                    ?>
                </strong>

                <span>

                    <?php
                    echo htmlspecialchars($location);
                    ?>

                    ·

                    <?php
                    echo date(
                        "d M Y",
                        strtotime($travel_date)
                    );
                    ?>

                    ·

                    <?php
                    echo htmlspecialchars($travel_time);
                    ?>

                </span>

            </div>


            <form
                class="customer-form"
                action="process.php"
                method="POST"
            >

                <input
                    type="hidden"
                    name="destination"
                    value="<?php
                    echo htmlspecialchars($destination);
                    ?>"
                >

                <input
                    type="hidden"
                    name="location"
                    value="<?php
                    echo htmlspecialchars($location);
                    ?>"
                >

                <input
                    type="hidden"
                    name="travel_date"
                    value="<?php
                    echo htmlspecialchars($travel_date);
                    ?>"
                >

                <input
                    type="hidden"
                    name="travel_time"
                    value="<?php
                    echo htmlspecialchars($travel_time);
                    ?>"
                >

                <input
                    type="hidden"
                    name="duration"
                    value="<?php
                    echo htmlspecialchars($duration);
                    ?>"
                >

                <input
                    type="hidden"
                    name="price"
                    value="<?php
                    echo htmlspecialchars($price);
                    ?>"
                >


                <div class="field">

                    <label>
                        CUSTOMER NAME
                    </label>

                    <input
                        type="text"
                        name="customer_name"
                        placeholder="Enter your full name"
                        required
                    >

                </div>


                <div class="field">

                    <label>
                        EMAIL ADDRESS
                    </label>

                    <input
                        type="email"
                        name="customer_email"
                        placeholder="Enter your email address"
                        required
                    >

                </div>


                <div class="field">

                    <label>
                        PHONE NUMBER
                    </label>

                    <input
                        type="tel"
                        name="customer_phone"
                        placeholder="Enter your phone number"
                        required
                    >

                </div>


                <button type="submit">
                    Confirm Booking →
                </button>

            </form>


            <a
                href="index.php"
                class="back-link"
            >
                ← Back to destinations
            </a>

        </div>


        <footer>

            <span>
                TRIPORA · TRAVEL BOOKING MANAGEMENT SYSTEM
            </span>

            <span>
                CUSTOMER DETAILS
            </span>

        </footer>

    </div>

    </body>

    </html>

    <?php

    exit;
}


// ========================================
// FORMAT TRAVEL DATE
// ========================================

$date_object =
    new DateTime($travel_date);

$formatted_date =
    $date_object->format("d M Y");

$travel_day =
    $date_object->format("l");


// ========================================
// CREATE SESSION
// ========================================

if (!isset($_SESSION["bookings"])) {

    $_SESSION["bookings"] = [];

}


// ========================================
// GENERATE BOOKING ID
// ========================================

$booking_id =
    "TRP" . date("YmdHis");


// ========================================
// BOOKING DATA
// ========================================

$booking = [

    "booking_id" => $booking_id,

    "customer_name" =>
        $customer_name,

    "customer_email" =>
        $customer_email,

    "customer_phone" =>
        $customer_phone,

    "destination" =>
        $destination,

    "location" =>
        $location,

    "travel_date" =>
        $formatted_date,

    "travel_day" =>
        $travel_day,

    "travel_time" =>
        $travel_time,

    "duration" =>
        $duration,

    "price" =>
        $price,

    "booked_at" =>
        date("d M Y, h:i A")

];


// ========================================
// STORE IN SESSION
// ========================================

$_SESSION["bookings"][] = $booking;


// ========================================
// FILE RECORD
// ========================================

$record =

    "Booking ID: " .
    $booking_id . PHP_EOL .

    "Customer Name: " .
    $customer_name . PHP_EOL .

    "Email: " .
    $customer_email . PHP_EOL .

    "Phone: " .
    $customer_phone . PHP_EOL .

    "Destination: " .
    $destination . PHP_EOL .

    "Location: " .
    $location . PHP_EOL .

    "Travel Date: " .
    $formatted_date . PHP_EOL .

    "Travel Day: " .
    $travel_day . PHP_EOL .

    "Travel Time: " .
    $travel_time . PHP_EOL .

    "Duration: " .
    $duration . PHP_EOL .

    "Price: " .
    $price . PHP_EOL .

    "Booked At: " .
    date("d M Y, h:i:s A") . PHP_EOL .

    "----------------------------------------" .
    PHP_EOL;


// ========================================
// SAVE TO FILE
// ========================================

file_put_contents(
    "bookings.txt",
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
        Tripora | Booking Confirmed
    </title>

    <link rel="stylesheet" href="style.css">

    <style>

        .confirmation {
            width: 86%;

            max-width: 850px;

            margin: 50px auto;

            background: white;

            border: 1px solid #e3ebe8;

            border-radius: 18px;

            padding: 35px;

            box-shadow:
                0 15px 40px
                rgba(40,80,75,0.06);
        }

        .success {
            width: 50px;
            height: 50px;

            border-radius: 50%;

            background: #e5f3ea;

            color: #609675;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;
        }

        .confirmation h1 {
            margin-top: 15px;

            font-family: Georgia, serif;

            color: #414b49;

            font-size: 30px;

            font-weight: 500;
        }

        .confirmation > p {
            margin-top: 7px;

            color: #96a09d;

            font-size: 7px;
        }

        .confirmation-grid {
            margin-top: 25px;

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;
        }

        .confirmation-item {
            padding: 15px;

            background: #f7faf9;

            border-radius: 10px;
        }

        .confirmation-item span {
            display: block;

            color: #a0aaa7;

            font-size: 5.5px;

            letter-spacing: .8px;
        }

        .confirmation-item strong {
            display: block;

            margin-top: 6px;

            color: #55625f;

            font-size: 8px;
        }

        .booking-id {
            margin-top: 18px;

            padding: 14px;

            background: #eaf4f2;

            border-radius: 10px;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        .booking-id span {
            color: #7b9590;

            font-size: 6px;
        }

        .booking-id strong {
            color: #3d938b;

            font-size: 9px;

            letter-spacing: .8px;
        }

        .confirmation-buttons {
            display: flex;

            gap: 10px;

            margin-top: 20px;
        }

        .confirmation-buttons a {
            flex: 1;

            height: 40px;

            border-radius: 8px;

            display: flex;

            align-items: center;

            justify-content: center;

            text-decoration: none;

            font-size: 6.5px;

            font-weight: 700;
        }

        .primary-btn {
            background: #3d9a92;

            color: white;
        }

        .secondary-btn {
            background: #eef3f1;

            color: #66807b;
        }

        @media (max-width: 600px) {

            .confirmation-grid {
                grid-template-columns: 1fr;
            }

            .confirmation-buttons {
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

<div class="page">


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
                BOOKING STATUS
            </span>

            <strong>
                CONFIRMED
            </strong>

        </div>

    </header>


    <div class="confirmation">

        <div class="success">
            ✓
        </div>

        <h1>
            Booking Confirmed!
        </h1>

        <p>
            Your journey has been successfully reserved.
            Your customer information has been stored and
            your booking confirmation has been generated.
        </p>


        <!-- BOOKING ID -->

        <div class="booking-id">

            <span>
                BOOKING REFERENCE
            </span>

            <strong>
                <?php
                echo $booking_id;
                ?>
            </strong>

        </div>


        <!-- DETAILS -->

        <div class="confirmation-grid">


            <div class="confirmation-item">

                <span>
                    CUSTOMER
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $customer_name
                    );
                    ?>
                </strong>

            </div>


            <div class="confirmation-item">

                <span>
                    EMAIL
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $customer_email
                    );
                    ?>
                </strong>

            </div>


            <div class="confirmation-item">

                <span>
                    DESTINATION
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $destination
                    );
                    ?>
                </strong>

            </div>


            <div class="confirmation-item">

                <span>
                    LOCATION
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $location
                    );
                    ?>
                </strong>

            </div>


            <div class="confirmation-item">

                <span>
                    TRAVEL DATE
                </span>

                <strong>
                    <?php
                    echo $formatted_date;
                    ?>
                </strong>

            </div>


            <div class="confirmation-item">

                <span>
                    TRAVEL DAY
                </span>

                <strong>
                    <?php
                    echo $travel_day;
                    ?>
                </strong>

            </div>


            <div class="confirmation-item">

                <span>
                    DEPARTURE
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $travel_time
                    );
                    ?>
                </strong>

            </div>


            <div class="confirmation-item">

                <span>
                    DURATION
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $duration
                    );
                    ?>
                </strong>

            </div>


        </div>


        <!-- BUTTONS -->

        <div class="confirmation-buttons">

            <a
                href="index.php"
                class="primary-btn"
            >
                Explore More Trips
            </a>

            <a
                href="index.php"
                class="secondary-btn"
            >
                Return to Home
            </a>

        </div>

    </div>


    <footer>

        <span>
            TRIPORA · TRAVEL BOOKING MANAGEMENT SYSTEM
        </span>

        <span>
            BOOKING SAVED SUCCESSFULLY
        </span>

    </footer>

</div>

</body>

</html>