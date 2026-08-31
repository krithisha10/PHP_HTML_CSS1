<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Stock Market Portfolio</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <!-- =========================
         TOP NAVIGATION
         ========================= -->

    <header class="topbar">

        <div class="brand">

            <div class="brand-mark">
                ↗
            </div>

            <div class="brand-text">

                <span>
                    FINANCIAL ANALYTICS
                </span>

                <h1>
                    Market Portfolio
                </h1>

            </div>

        </div>


        <div class="market-indicator">

            <span class="live-dot"></span>

            MARKET DATA

        </div>

    </header>



    <!-- =========================
         MAIN CONTENT
         ========================= -->

    <main>


        <!-- HERO -->

        <section class="hero">

            <div class="hero-content">

                <span class="eyebrow">
                    INVESTOR WORKSPACE
                </span>

                <h2>
                    Analyze Your<br>
                    <strong>Stock Portfolio</strong>
                </h2>

                <p>
                    Enter the opening and closing prices of
                    selected stocks to evaluate their financial
                    performance.
                </p>

            </div>


            <div class="hero-chart">

                <div class="chart-label">
                    PERFORMANCE
                </div>

                <div class="mini-chart">

                    <span class="bar bar-1"></span>
                    <span class="bar bar-2"></span>
                    <span class="bar bar-3"></span>
                    <span class="bar bar-4"></span>
                    <span class="bar bar-5"></span>
                    <span class="bar bar-6"></span>
                    <span class="bar bar-7"></span>

                </div>

                <div class="chart-growth">
                    ↗ Track price movement
                </div>

            </div>

        </section>



        <!-- =========================
             PORTFOLIO FORM
             ========================= -->

        <form action="process.php"
              method="POST">


            <section class="portfolio-section">


                <div class="section-heading">

                    <div>

                        <span>
                            PORTFOLIO INPUT
                        </span>

                        <h2>
                            Enter Market Prices
                        </h2>

                    </div>

                    <div class="stock-count">
                        06 STOCKS
                    </div>

                </div>



                <!-- STOCK LIST -->

                <div class="stock-list">


                    <!-- ================= STOCK 1 ================= -->

                    <div class="market-row">

                        <div class="company">

                            <div class="company-logo logo-tcs">
                                T
                            </div>

                            <div>

                                <strong>
                                    TCS
                                </strong>

                                <span>
                                    Tata Consultancy Services
                                </span>

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                OPENING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[0][open]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                CLOSING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[0][close]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="direction">
                            ↗
                        </div>

                    </div>



                    <!-- ================= STOCK 2 ================= -->

                    <div class="market-row">

                        <div class="company">

                            <div class="company-logo logo-infosys">
                                I
                            </div>

                            <div>

                                <strong>
                                    Infosys
                                </strong>

                                <span>
                                    Infosys Limited
                                </span>

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                OPENING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[1][open]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                CLOSING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[1][close]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="direction">
                            ↗
                        </div>

                    </div>



                    <!-- ================= STOCK 3 ================= -->

                    <div class="market-row">

                        <div class="company">

                            <div class="company-logo logo-reliance">
                                R
                            </div>

                            <div>

                                <strong>
                                    Reliance
                                </strong>

                                <span>
                                    Reliance Industries
                                </span>

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                OPENING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[2][open]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                CLOSING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[2][close]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="direction">
                            ↗
                        </div>

                    </div>



                    <!-- ================= STOCK 4 ================= -->

                    <div class="market-row">

                        <div class="company">

                            <div class="company-logo logo-hdfc">
                                H
                            </div>

                            <div>

                                <strong>
                                    HDFC Bank
                                </strong>

                                <span>
                                    HDFC Bank Limited
                                </span>

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                OPENING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[3][open]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                CLOSING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[3][close]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="direction">
                            ↗
                        </div>

                    </div>



                    <!-- ================= STOCK 5 ================= -->

                    <div class="market-row">

                        <div class="company">

                            <div class="company-logo logo-wipro">
                                W
                            </div>

                            <div>

                                <strong>
                                    Wipro
                                </strong>

                                <span>
                                    Wipro Limited
                                </span>

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                OPENING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[4][open]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                CLOSING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[4][close]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="direction">
                            ↗
                        </div>

                    </div>



                    <!-- ================= STOCK 6 ================= -->

                    <div class="market-row">

                        <div class="company">

                            <div class="company-logo logo-axis">
                                A
                            </div>

                            <div>

                                <strong>
                                    Axis Bank
                                </strong>

                                <span>
                                    Axis Bank Limited
                                </span>

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                OPENING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[5][open]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="price-field">

                            <label>
                                CLOSING PRICE
                            </label>

                            <div class="input-box">

                                <span>₹</span>

                                <input
                                    type="number"
                                    name="stocks[5][close]"
                                    placeholder="0.00"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                            </div>

                        </div>


                        <div class="direction">
                            ↗
                        </div>

                    </div>


                </div>


                <!-- =========================
                     FORM FOOTER
                     ========================= -->

                <div class="form-footer">


                    <div class="calculation-info">

                        <div class="info-icon">
                            i
                        </div>

                        <div>

                            <strong>
                                Automatic Analysis
                            </strong>

                            <span>
                                Return, profit/loss and performance
                                will be calculated automatically.
                            </span>

                        </div>

                    </div>


                    <button type="submit">

                        Generate Market Report

                        <span>
                            →
                        </span>

                    </button>


                </div>


            </section>


        </form>


        <!-- =========================
             FOOTER NOTE
             ========================= -->

        <div class="bottom-note">

            <span>
                PHP PRACTICAL
            </span>

            <span class="separator">
                •
            </span>

            <span>
                ARRAYS
            </span>

            <span class="separator">
                •
            </span>

            <span>
                NUMERICAL FUNCTIONS
            </span>

            <span class="separator">
                •
            </span>

            <span>
                STOCK ANALYSIS
            </span>

        </div>


    </main>

</div>

</body>

</html>