<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StayEase | Hotel Stay Calculator</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="page">

    <!-- HEADER -->
    <header>

        <div class="logo">
            <div class="logo-icon">✦</div>

            <div>
                <h2>StayEase</h2>
                <span>HOTEL & RESORTS</span>
            </div>
        </div>

        <div class="header-text">
            <span>SMART STAY PLANNER</span>
        </div>

    </header>


    <!-- MAIN CONTENT -->
    <main>

        <!-- LEFT INFORMATION -->
        <section class="intro">

            <div class="small-label">
                ✦ YOUR STAY, SIMPLIFIED
            </div>

            <h1>
                Plan your
                <span>perfect stay.</span>
            </h1>

            <p>
                Enter your check-in and check-out dates
                to instantly calculate the total duration
                of your hotel stay.
            </p>


            <div class="benefits">

                <div class="benefit">

                    <div class="benefit-icon">
                        ✓
                    </div>

                    <div>
                        <strong>Instant Calculation</strong>

                        <small>
                            Get your stay duration immediately.
                        </small>
                    </div>

                </div>


                <div class="benefit">

                    <div class="benefit-icon">
                        ◷
                    </div>

                    <div>
                        <strong>Accurate Dates</strong>

                        <small>
                            Uses PHP date functions for accuracy.
                        </small>
                    </div>

                </div>


                <div class="benefit">

                    <div class="benefit-icon">
                        ★
                    </div>

                    <div>
                        <strong>Simple Planning</strong>

                        <small>
                            Organize your hotel stay with ease.
                        </small>
                    </div>

                </div>

            </div>

        </section>


        <!-- CALCULATOR CARD -->
        <section class="calculator-section">

            <div class="calculator-card">

                <div class="card-heading">

                    <span>STAY DURATION</span>

                    <h2>Hotel Booking</h2>

                    <p>
                        Select your travel dates below.
                    </p>

                </div>


                <form action="process.php" method="POST">

                    <div class="date-row">

                        <div class="input-group">

                            <label for="checkin">
                                CHECK-IN DATE
                            </label>

                            <div class="date-input">

                                <span>↘</span>

                                <input
                                    type="date"
                                    id="checkin"
                                    name="checkin"
                                    required
                                >

                            </div>

                        </div>


                        <div class="input-group">

                            <label for="checkout">
                                CHECK-OUT DATE
                            </label>

                            <div class="date-input">

                                <span>↗</span>

                                <input
                                    type="date"
                                    id="checkout"
                                    name="checkout"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    <div class="date-tip">

                        <span>i</span>

                        Check-out date must be later than
                        check-in date.

                    </div>


                    <button type="submit">
                        Calculate Stay Duration
                        <span>→</span>
                    </button>

                </form>


                <div class="card-footer">

                    <span>DATE CALCULATION</span>

                    <strong>Powered by PHP</strong>

                </div>

            </div>

        </section>

    </main>


    <!-- FOOTER -->

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