<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Sales Trend Analysis</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="brand-icon">
                📈
            </div>

            <div>

                <span class="mini-title">
                    BUSINESS ANALYTICS
                </span>

                <h1>
                    Sales Trend Analysis
                </h1>

            </div>

        </div>

        <div class="header-tag">
            SALES INSIGHTS
        </div>

    </header>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <span class="hero-label">
                HISTORICAL SALES PERFORMANCE
            </span>

            <h2>
                Analyze Your Sales Journey
            </h2>

            <p>
                Enter historical sales values for different months
                to identify growth patterns and sales trends.
            </p>

        </div>

        <div class="hero-icon">
            📊
        </div>

    </section>


    <!-- FORM -->

    <form action="process.php" method="POST">

        <section class="sales-grid">


            <!-- MONTH 1 -->

            <div class="sales-card card-one">

                <div class="card-head">

                    <span class="month-number">
                        01
                    </span>

                    <span class="month-icon">
                        🗓️
                    </span>

                </div>

                <h3>
                    January
                </h3>

                <p>
                    First sales period
                </p>

                <label>
                    Sales Amount
                </label>

                <div class="input-box">

                    <span>₹</span>

                    <input
                        type="number"
                        name="sales[0][amount]"
                        placeholder="Enter sales"
                        min="0"
                        step="0.01"
                        required
                    >

                </div>

            </div>


            <!-- MONTH 2 -->

            <div class="sales-card card-two">

                <div class="card-head">

                    <span class="month-number">
                        02
                    </span>

                    <span class="month-icon">
                        📅
                    </span>

                </div>

                <h3>
                    February
                </h3>

                <p>
                    Second sales period
                </p>

                <label>
                    Sales Amount
                </label>

                <div class="input-box">

                    <span>₹</span>

                    <input
                        type="number"
                        name="sales[1][amount]"
                        placeholder="Enter sales"
                        min="0"
                        step="0.01"
                        required
                    >

                </div>

            </div>


            <!-- MONTH 3 -->

            <div class="sales-card card-three">

                <div class="card-head">

                    <span class="month-number">
                        03
                    </span>

                    <span class="month-icon">
                        📅
                    </span>

                </div>

                <h3>
                    March
                </h3>

                <p>
                    Third sales period
                </p>

                <label>
                    Sales Amount
                </label>

                <div class="input-box">

                    <span>₹</span>

                    <input
                        type="number"
                        name="sales[2][amount]"
                        placeholder="Enter sales"
                        min="0"
                        step="0.01"
                        required
                    >

                </div>

            </div>


            <!-- MONTH 4 -->

            <div class="sales-card card-four">

                <div class="card-head">

                    <span class="month-number">
                        04
                    </span>

                    <span class="month-icon">
                        📅
                    </span>

                </div>

                <h3>
                    April
                </h3>

                <p>
                    Fourth sales period
                </p>

                <label>
                    Sales Amount
                </label>

                <div class="input-box">

                    <span>₹</span>

                    <input
                        type="number"
                        name="sales[3][amount]"
                        placeholder="Enter sales"
                        min="0"
                        step="0.01"
                        required
                    >

                </div>

            </div>


            <!-- MONTH 5 -->

            <div class="sales-card card-five">

                <div class="card-head">

                    <span class="month-number">
                        05
                    </span>

                    <span class="month-icon">
                        📅
                    </span>

                </div>

                <h3>
                    May
                </h3>

                <p>
                    Fifth sales period
                </p>

                <label>
                    Sales Amount
                </label>

                <div class="input-box">

                    <span>₹</span>

                    <input
                        type="number"
                        name="sales[4][amount]"
                        placeholder="Enter sales"
                        min="0"
                        step="0.01"
                        required
                    >

                </div>

            </div>


            <!-- MONTH 6 -->

            <div class="sales-card card-six">

                <div class="card-head">

                    <span class="month-number">
                        06
                    </span>

                    <span class="month-icon">
                        📅
                    </span>

                </div>

                <h3>
                    June
                </h3>

                <p>
                    Sixth sales period
                </p>

                <label>
                    Sales Amount
                </label>

                <div class="input-box">

                    <span>₹</span>

                    <input
                        type="number"
                        name="sales[5][amount]"
                        placeholder="Enter sales"
                        min="0"
                        step="0.01"
                        required
                    >

                </div>

            </div>


        </section>


        <!-- BUTTON -->

        <div class="button-area">

            <button type="submit">

                Generate Sales Analysis

                <span>→</span>

            </button>

            <p>
                PHP Arrays • Growth Percentage • Trend Detection
            </p>

        </div>

    </form>


    <!-- FOOTER -->

    <footer>

        PHP Practical • Sales Trend Analysis

    </footer>

</div>

</body>

</html>