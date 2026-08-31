<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Railway Waiting List</title>

    <link rel="stylesheet" href="style.css">

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
                    Waiting List Manager
                </h1>

                <p>
                    Manage passengers and seat allocation
                </p>

            </div>

        </div>


        <div class="status-badge">
            QUEUE SYSTEM
        </div>

    </header>



    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <span>
                PASSENGER RESERVATION
            </span>

            <h2>
                Manage Your Waiting List
            </h2>

            <p>
                Add passengers to the waiting queue and process
                cancellations to automatically confirm seats.
            </p>

        </div>


        <div class="railway-symbol">
            🚉
        </div>

    </section>



    <!-- PASSENGER FORM -->

    <section class="reservation-box">

        <div class="section-heading">

            <span>
                PASSENGER DETAILS
            </span>

            <h2>
                Enter Waiting List Passengers
            </h2>

        </div>


        <form action="process.php" method="POST">


            <div class="passenger-grid">


                <!-- PASSENGER 1 -->

                <div class="passenger-card card-one">

                    <div class="card-top">

                        <span>
                            PASSENGER 01
                        </span>

                        <div class="person-icon">
                            👤
                        </div>

                    </div>


                    <label>
                        PASSENGER NAME
                    </label>

                    <input
                        type="text"
                        name="passengers[0][name]"
                        placeholder="Enter passenger name"
                        required
                    >


                    <label>
                        AGE
                    </label>

                    <input
                        type="number"
                        name="passengers[0][age]"
                        placeholder="Enter age"
                        min="1"
                        max="120"
                        required
                    >

                </div>



                <!-- PASSENGER 2 -->

                <div class="passenger-card card-two">

                    <div class="card-top">

                        <span>
                            PASSENGER 02
                        </span>

                        <div class="person-icon">
                            🎫
                        </div>

                    </div>


                    <label>
                        PASSENGER NAME
                    </label>

                    <input
                        type="text"
                        name="passengers[1][name]"
                        placeholder="Enter passenger name"
                        required
                    >


                    <label>
                        AGE
                    </label>

                    <input
                        type="number"
                        name="passengers[1][age]"
                        placeholder="Enter age"
                        min="1"
                        max="120"
                        required
                    >

                </div>



                <!-- PASSENGER 3 -->

                <div class="passenger-card card-three">

                    <div class="card-top">

                        <span>
                            PASSENGER 03
                        </span>

                        <div class="person-icon">
                            🧳
                        </div>

                    </div>


                    <label>
                        PASSENGER NAME
                    </label>

                    <input
                        type="text"
                        name="passengers[2][name]"
                        placeholder="Enter passenger name"
                        required
                    >


                    <label>
                        AGE
                    </label>

                    <input
                        type="number"
                        name="passengers[2][age]"
                        placeholder="Enter age"
                        min="1"
                        max="120"
                        required
                    >

                </div>



                <!-- PASSENGER 4 -->

                <div class="passenger-card card-four">

                    <div class="card-top">

                        <span>
                            PASSENGER 04
                        </span>

                        <div class="person-icon">
                            🎟️
                        </div>

                    </div>


                    <label>
                        PASSENGER NAME
                    </label>

                    <input
                        type="text"
                        name="passengers[3][name]"
                        placeholder="Enter passenger name"
                        required
                    >


                    <label>
                        AGE
                    </label>

                    <input
                        type="number"
                        name="passengers[3][age]"
                        placeholder="Enter age"
                        min="1"
                        max="120"
                        required
                    >

                </div>


            </div>



            <!-- CANCELLATION -->

            <div class="cancel-section">

                <div class="cancel-icon">
                    ↩
                </div>


                <div class="cancel-content">

                    <strong>
                        Cancelled Seats
                    </strong>

                    <p>
                        Enter the number of seats released due
                        to passenger cancellations.
                    </p>

                </div>


                <div class="cancel-input">

                    <input
                        type="number"
                        name="cancelled_seats"
                        value="1"
                        min="0"
                        max="4"
                        required
                    >

                    <span>
                        SEATS
                    </span>

                </div>

            </div>



            <!-- FIFO INFO -->

            <div class="fifo-box">

                <div class="fifo-icon">
                    1 → 2 → 3 → 4
                </div>

                <div>

                    <strong>
                        FIFO Seat Allocation
                    </strong>

                    <p>
                        When seats become available, they are allocated
                        to passengers in waiting-list order.
                    </p>

                </div>

            </div>



            <!-- BUTTON -->

            <div class="button-area">

                <button type="submit">

                    Process Reservation

                    <span>
                        →
                    </span>

                </button>

                <p>
                    PHP Arrays • Queue Operations • FIFO • Seat Allocation
                </p>

            </div>


        </form>

    </section>



    <!-- FOOTER -->

    <footer>

        PHP Practical • Railway Reservation Waiting List System

    </footer>


</div>

</body>

</html>