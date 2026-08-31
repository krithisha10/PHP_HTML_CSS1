<?php

/* =========================================================
   STOCK PERFORMANCE ANALYSIS
   ========================================================= */


/* ---------------------------------------------------------
   CHECK FORM SUBMISSION
   --------------------------------------------------------- */

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}


/* ---------------------------------------------------------
   STOCK INFORMATION
   --------------------------------------------------------- */

$stockNames = [
    "TCS",
    "Infosys",
    "Reliance",
    "HDFC Bank",
    "Wipro",
    "Axis Bank"
];

$stockDescriptions = [
    "Tata Consultancy Services",
    "Infosys Limited",
    "Reliance Industries",
    "HDFC Bank Limited",
    "Wipro Limited",
    "Axis Bank Limited"
];


/* ---------------------------------------------------------
   GET FORM DATA
   --------------------------------------------------------- */

$stocks = $_POST["stocks"] ?? [];

$analysis = [];

$totalOpening = 0;
$totalClosing = 0;

$gainers = 0;
$losers = 0;


/* ---------------------------------------------------------
   PROCESS STOCK DATA
   --------------------------------------------------------- */

foreach ($stockNames as $index => $name) {

    $opening = isset($stocks[$index]["open"])
        ? floatval($stocks[$index]["open"])
        : 0;

    $closing = isset($stocks[$index]["close"])
        ? floatval($stocks[$index]["close"])
        : 0;


    /* Price Change */

    $change = $closing - $opening;


    /* Percentage Return */

    if ($opening > 0) {

        $percentage = ($change / $opening) * 100;

    } else {

        $percentage = 0;

    }


    /* Round values */

    $opening = round($opening, 2);

    $closing = round($closing, 2);

    $change = round($change, 2);

    $percentage = round($percentage, 2);


    /* Determine status */

    if ($change > 0) {

        $status = "Gain";

        $symbol = "↗";

        $gainers++;

    } elseif ($change < 0) {

        $status = "Loss";

        $symbol = "↘";

        $losers++;

    } else {

        $status = "No Change";

        $symbol = "→";

    }


    /* Store processed information */

    $analysis[] = [

        "name" => $name,

        "description" => $stockDescriptions[$index],

        "opening" => $opening,

        "closing" => $closing,

        "change" => $change,

        "percentage" => $percentage,

        "status" => $status,

        "symbol" => $symbol

    ];


    $totalOpening += $opening;

    $totalClosing += $closing;

}


/* ---------------------------------------------------------
   TOTAL AND AVERAGE VALUES
   --------------------------------------------------------- */

$totalStocks = count($analysis);

$averageOpening = $totalStocks > 0
    ? $totalOpening / $totalStocks
    : 0;

$averageClosing = $totalStocks > 0
    ? $totalClosing / $totalStocks
    : 0;


$averageOpening = round($averageOpening, 2);

$averageClosing = round($averageClosing, 2);


/* ---------------------------------------------------------
   FIND BEST AND WORST PERFORMERS
   --------------------------------------------------------- */

$bestPerformer = $analysis[0];

$worstPerformer = $analysis[0];


foreach ($analysis as $stock) {

    if ($stock["percentage"] > $bestPerformer["percentage"]) {

        $bestPerformer = $stock;

    }


    if ($stock["percentage"] < $worstPerformer["percentage"]) {

        $worstPerformer = $stock;

    }

}


/* ---------------------------------------------------------
   OVERALL MARKET RETURN
   --------------------------------------------------------- */

$overallChange = $averageClosing - $averageOpening;


if ($averageOpening > 0) {

    $overallReturn =
        ($overallChange / $averageOpening) * 100;

} else {

    $overallReturn = 0;

}


$overallChange = round($overallChange, 2);

$overallReturn = round($overallReturn, 2);


/* ---------------------------------------------------------
   MARKET SENTIMENT
   --------------------------------------------------------- */

if ($gainers > $losers) {

    $sentiment = "POSITIVE";

    $sentimentIcon = "↗";

} elseif ($losers > $gainers) {

    $sentiment = "NEGATIVE";

    $sentimentIcon = "↘";

} else {

    $sentiment = "NEUTRAL";

    $sentimentIcon = "→";

}


/* ---------------------------------------------------------
   PERFORMANCE BAR WIDTH
   --------------------------------------------------------- */

function performanceWidth($percentage)
{

    $width = abs($percentage) * 10;

    if ($width > 100) {
        $width = 100;
    }

    if ($width < 8) {
        $width = 8;
    }

    return $width;
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Stock Performance Report</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family: Arial, Helvetica, sans-serif;

            background: #f5f6f2;

            color: #3f4743;

            min-height: 100vh;

        }


        .page {

            width: 100%;

            min-height: 100vh;

        }


        /* =====================================
           TOP BAR
           ===================================== */

        .topbar {

            height: 76px;

            background: #ffffff;

            border-bottom: 1px solid #e1e4df;

            padding: 0 7%;

            display: flex;

            align-items: center;

            justify-content: space-between;

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .brand-mark {

            width: 42px;

            height: 42px;

            border-radius: 10px;

            background: #e4f0e8;

            color: #4d8d69;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 22px;

            font-weight: bold;

        }


        .brand-text span {

            display: block;

            font-size: 7px;

            letter-spacing: 1.6px;

            color: #679579;

            font-weight: bold;

            margin-bottom: 4px;

        }


        .brand-text h1 {

            font-size: 18px;

            color: #3e4644;

        }


        .report-tag {

            padding: 8px 13px;

            background: #f1f4f1;

            border: 1px solid #e0e5e1;

            border-radius: 20px;

            font-size: 7px;

            color: #758079;

            font-weight: bold;

            letter-spacing: .8px;

        }


        /* =====================================
           MAIN
           ===================================== */

        main {

            width: 86%;

            max-width: 1080px;

            margin: 25px auto 30px;

        }


        /* =====================================
           REPORT HEADER
           ===================================== */

        .report-header {

            background: #eaf2ec;

            border: 1px solid #dce8df;

            border-radius: 17px;

            padding: 25px 30px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 18px;

        }


        .report-title span {

            display: block;

            font-size: 7px;

            letter-spacing: 1.5px;

            color: #598d6b;

            font-weight: bold;

            margin-bottom: 7px;

        }


        .report-title h2 {

            font-size: 27px;

            color: #414a46;

            margin-bottom: 7px;

        }


        .report-title p {

            font-size: 9px;

            color: #84908a;

        }


        .market-status {

            text-align: right;

        }


        .market-status .status-icon {

            font-size: 34px;

            color: #609575;

        }


        .market-status span {

            display: block;

            font-size: 7px;

            color: #78847d;

            letter-spacing: 1px;

            margin-top: 3px;

        }


        .market-status strong {

            display: block;

            font-size: 12px;

            color: #4f8965;

            margin-top: 4px;

        }


        /* =====================================
           SUMMARY GRID
           ===================================== */

        .summary-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 10px;

            margin-bottom: 18px;

        }


        .summary-card {

            background: #ffffff;

            border: 1px solid #e1e5e2;

            border-radius: 12px;

            padding: 15px;

            position: relative;

            overflow: hidden;

        }


        .summary-card::after {

            content: "";

            position: absolute;

            bottom: 0;

            left: 0;

            width: 100%;

            height: 3px;

        }


        .summary-card:nth-child(1)::after {

            background: #78a989;

        }


        .summary-card:nth-child(2)::after {

            background: #7e9db9;

        }


        .summary-card:nth-child(3)::after {

            background: #c89b62;

        }


        .summary-card:nth-child(4)::after {

            background: #9b82ad;

        }


        .summary-label {

            font-size: 7px;

            letter-spacing: .8px;

            color: #929a96;

            font-weight: bold;

            margin-bottom: 7px;

        }


        .summary-value {

            font-size: 20px;

            color: #414a46;

            font-weight: bold;

        }


        .summary-sub {

            font-size: 7px;

            color: #9aa29e;

            margin-top: 4px;

        }


        /* =====================================
           PERFORMANCE SECTION
           ===================================== */

        .performance-section {

            background: #ffffff;

            border: 1px solid #e0e4e1;

            border-radius: 15px;

            padding: 20px;

            margin-bottom: 18px;

        }


        .section-heading {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 15px;

        }


        .section-heading span {

            display: block;

            font-size: 7px;

            color: #679175;

            letter-spacing: 1.4px;

            font-weight: bold;

            margin-bottom: 5px;

        }


        .section-heading h2 {

            font-size: 17px;

            color: #414946;

        }


        .section-note {

            font-size: 7px;

            color: #9aa19d;

        }


        /* =====================================
           STOCK ROW
           ===================================== */

        .stock-row {

            display: grid;

            grid-template-columns:
                1.4fr
                .8fr
                .8fr
                1.7fr
                .8fr;

            align-items: center;

            gap: 15px;

            min-height: 66px;

            padding: 9px 11px;

            border: 1px solid #e5e8e6;

            background: #fafbfa;

            border-radius: 10px;

            margin-bottom: 8px;

        }


        .stock-company {

            display: flex;

            align-items: center;

            gap: 9px;

        }


        .stock-symbol {

            width: 35px;

            height: 35px;

            border-radius: 8px;

            background: #edf4ef;

            color: #578a69;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 9px;

            font-weight: bold;

        }


        .stock-company strong {

            display: block;

            font-size: 9px;

            color: #4a524e;

            margin-bottom: 3px;

        }


        .stock-company span {

            font-size: 6px;

            color: #9ba29f;

        }


        .price {

            font-size: 9px;

            color: #59625d;

            font-weight: bold;

        }


        .price small {

            display: block;

            font-size: 6px;

            color: #9ba29f;

            font-weight: normal;

            margin-bottom: 4px;

            letter-spacing: .5px;

        }


        /* =====================================
           PERFORMANCE BAR
           ===================================== */

        .performance-bar {

            width: 100%;

            height: 7px;

            background: #e9ecea;

            border-radius: 20px;

            overflow: hidden;

        }


        .performance-fill {

            height: 100%;

            border-radius: 20px;

        }


        .gain {

            background: #72a884;

        }


        .loss {

            background: #c98484;

        }


        .neutral {

            background: #aaa;

        }


        .percentage {

            font-size: 10px;

            font-weight: bold;

            text-align: right;

        }


        .percentage.gain-text {

            color: #5d946e;

        }


        .percentage.loss-text {

            color: #bd7373;

        }


        .percentage.neutral-text {

            color: #8b938e;

        }


        /* =====================================
           INSIGHTS
           ===================================== */

        .insight-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 12px;

            margin-bottom: 18px;

        }


        .insight-card {

            background: #ffffff;

            border: 1px solid #e0e4e1;

            border-radius: 14px;

            padding: 18px;

        }


        .insight-card h3 {

            font-size: 8px;

            color: #8b9490;

            letter-spacing: .8px;

            margin-bottom: 10px;

        }


        .insight-main {

            display: flex;

            align-items: center;

            justify-content: space-between;

        }


        .insight-name {

            font-size: 17px;

            font-weight: bold;

            color: #47504b;

        }


        .insight-value {

            font-size: 13px;

            font-weight: bold;

        }


        .positive {

            color: #5c936d;

        }


        .negative {

            color: #bd7474;

        }


        .insight-description {

            font-size: 7px;

            color: #9aa29e;

            margin-top: 6px;

        }


        /* =====================================
           INVESTOR INSIGHT
           ===================================== */

        .investor-box {

            background: #f1f5f1;

            border: 1px solid #dce7df;

            border-radius: 14px;

            padding: 18px 20px;

            display: flex;

            align-items: center;

            gap: 14px;

            margin-bottom: 18px;

        }


        .investor-icon {

            width: 42px;

            height: 42px;

            border-radius: 10px;

            background: #ffffff;

            color: #5f916f;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

            font-weight: bold;

        }


        .investor-box h3 {

            font-size: 10px;

            color: #53605a;

            margin-bottom: 5px;

        }


        .investor-box p {

            font-size: 8px;

            line-height: 1.6;

            color: #89938d;

        }


        /* =====================================
           BUTTONS
           ===================================== */

        .actions {

            display: flex;

            justify-content: center;

            gap: 10px;

        }


        .actions a {

            text-decoration: none;

            padding: 11px 18px;

            border-radius: 8px;

            font-size: 8px;

            font-weight: bold;

        }


        .back-button {

            background: #ffffff;

            border: 1px solid #dce1dd;

            color: #68726d;

        }


        .back-button:hover {

            background: #f3f5f3;

        }


        .new-report {

            background: #46504c;

            color: #ffffff;

        }


        .new-report:hover {

            background: #343d39;

        }


        /* =====================================
           FOOTER
           ===================================== */

        .footer {

            text-align: center;

            padding-top: 18px;

            border-top: 1px solid #dfe3df;

            margin-top: 20px;

            font-size: 6px;

            letter-spacing: 1px;

            color: #9ba39f;

        }


        /* =====================================
           RESPONSIVE
           ===================================== */

        @media (max-width: 850px) {

            main {

                width: 90%;

            }


            .summary-grid {

                grid-template-columns:
                    repeat(2, 1fr);

            }


            .stock-row {

                grid-template-columns:
                    1.3fr
                    .8fr
                    .8fr
                    1.3fr
                    .7fr;

            }

        }


        @media (max-width: 650px) {

            .topbar {

                padding: 0 5%;

            }


            main {

                width: 92%;

            }


            .report-header {

                padding: 20px;

            }


            .market-status {

                display: none;

            }


            .summary-grid {

                grid-template-columns: 1fr 1fr;

            }


            .stock-row {

                grid-template-columns: 1fr 1fr;

                gap: 12px;

                padding: 14px;

            }


            .stock-company {

                grid-column: 1 / -1;

            }


            .insight-grid {

                grid-template-columns: 1fr;

            }

        }


        @media (max-width: 450px) {

            .summary-grid {

                grid-template-columns: 1fr;

            }


            .report-title h2 {

                font-size: 22px;

            }


            .stock-row {

                grid-template-columns: 1fr;

            }


            .performance-bar {

                margin-top: 4px;

            }


            .percentage {

                text-align: left;

            }


            .actions {

                flex-direction: column;

            }


            .actions a {

                text-align: center;

            }

        }

    </style>

</head>


<body>


<div class="page">


    <!-- =====================================
         TOP BAR
         ===================================== -->

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


        <div class="report-tag">

            ANALYSIS COMPLETE

        </div>

    </header>



    <!-- =====================================
         MAIN
         ===================================== -->

    <main>


        <!-- REPORT HEADER -->

        <section class="report-header">

            <div class="report-title">

                <span>
                    STOCK PERFORMANCE REPORT
                </span>

                <h2>
                    Market Overview
                </h2>

                <p>
                    A consolidated analysis of the submitted
                    stock performance data.
                </p>

            </div>


            <div class="market-status">

                <div class="status-icon">
                    <?php echo $sentimentIcon; ?>
                </div>

                <span>
                    MARKET SENTIMENT
                </span>

                <strong>
                    <?php echo $sentiment; ?>
                </strong>

            </div>

        </section>



        <!-- =====================================
             SUMMARY CARDS
             ===================================== -->

        <section class="summary-grid">


            <div class="summary-card">

                <div class="summary-label">
                    STOCKS ANALYSED
                </div>

                <div class="summary-value">
                    <?php echo $totalStocks; ?>
                </div>

                <div class="summary-sub">
                    Companies in portfolio
                </div>

            </div>



            <div class="summary-card">

                <div class="summary-label">
                    AVERAGE OPENING
                </div>

                <div class="summary-value">
                    ₹<?php echo number_format($averageOpening, 2); ?>
                </div>

                <div class="summary-sub">
                    Average starting price
                </div>

            </div>



            <div class="summary-card">

                <div class="summary-label">
                    AVERAGE CLOSING
                </div>

                <div class="summary-value">
                    ₹<?php echo number_format($averageClosing, 2); ?>
                </div>

                <div class="summary-sub">
                    Average closing price
                </div>

            </div>



            <div class="summary-card">

                <div class="summary-label">
                    OVERALL RETURN
                </div>

                <div class="summary-value">

                    <?php if ($overallReturn >= 0): ?>

                        +
                        <?php echo number_format($overallReturn, 2); ?>%

                    <?php else: ?>

                        <?php echo number_format($overallReturn, 2); ?>%

                    <?php endif; ?>

                </div>

                <div class="summary-sub">
                    Portfolio movement
                </div>

            </div>


        </section>



        <!-- =====================================
             PERFORMANCE REPORT
             ===================================== -->

        <section class="performance-section">


            <div class="section-heading">

                <div>

                    <span>
                        PERFORMANCE BREAKDOWN
                    </span>

                    <h2>
                        Stock-by-Stock Analysis
                    </h2>

                </div>

                <div class="section-note">

                    <?php echo $gainers; ?> Gainers
                    •
                    <?php echo $losers; ?> Losers

                </div>

            </div>



            <?php foreach ($analysis as $stock): ?>

                <?php

                    $barWidth =
                        performanceWidth(
                            $stock["percentage"]
                        );

                    if ($stock["status"] === "Gain") {

                        $barClass = "gain";

                        $textClass = "gain-text";

                    } elseif ($stock["status"] === "Loss") {

                        $barClass = "loss";

                        $textClass = "loss-text";

                    } else {

                        $barClass = "neutral";

                        $textClass = "neutral-text";

                    }

                ?>


                <div class="stock-row">


                    <!-- COMPANY -->

                    <div class="stock-company">

                        <div class="stock-symbol">

                            <?php
                                echo strtoupper(
                                    substr(
                                        $stock["name"],
                                        0,
                                        1
                                    )
                                );
                            ?>

                        </div>

                        <div>

                            <strong>
                                <?php
                                    echo htmlspecialchars(
                                        $stock["name"]
                                    );
                                ?>
                            </strong>

                            <span>
                                <?php
                                    echo htmlspecialchars(
                                        $stock["description"]
                                    );
                                ?>
                            </span>

                        </div>

                    </div>



                    <!-- OPENING -->

                    <div class="price">

                        <small>
                            OPEN
                        </small>

                        ₹<?php
                            echo number_format(
                                $stock["opening"],
                                2
                            );
                        ?>

                    </div>



                    <!-- CLOSING -->

                    <div class="price">

                        <small>
                            CLOSE
                        </small>

                        ₹<?php
                            echo number_format(
                                $stock["closing"],
                                2
                            );
                        ?>

                    </div>



                    <!-- PERFORMANCE -->

                    <div>

                        <small style="
                            display:block;
                            font-size:6px;
                            color:#9aa29e;
                            margin-bottom:5px;
                        ">

                            PRICE MOVEMENT

                        </small>

                        <div class="performance-bar">

                            <div
                                class="performance-fill <?php echo $barClass; ?>"
                                style="
                                    width: <?php echo $barWidth; ?>%;
                                "
                            ></div>

                        </div>

                    </div>



                    <!-- RETURN -->

                    <div
                        class="percentage <?php echo $textClass; ?>"
                    >

                        <?php
                            echo $stock["symbol"];
                        ?>

                        <?php if ($stock["percentage"] > 0): ?>
                            +
                        <?php endif; ?>

                        <?php
                            echo number_format(
                                $stock["percentage"],
                                2
                            );
                        ?>%

                    </div>


                </div>


            <?php endforeach; ?>


        </section>



        <!-- =====================================
             BEST & WORST
             ===================================== -->

        <section class="insight-grid">


            <!-- BEST -->

            <div class="insight-card">

                <h3>
                    🏆 BEST PERFORMER
                </h3>


                <div class="insight-main">

                    <div class="insight-name">

                        <?php
                            echo htmlspecialchars(
                                $bestPerformer["name"]
                            );
                        ?>

                    </div>

                    <div class="insight-value positive">

                        +

                        <?php
                            echo number_format(
                                $bestPerformer["percentage"],
                                2
                            );
                        ?>%

                    </div>

                </div>


                <div class="insight-description">

                    Price moved from ₹
                    <?php
                        echo number_format(
                            $bestPerformer["opening"],
                            2
                        );
                    ?>

                    to ₹
                    <?php
                        echo number_format(
                            $bestPerformer["closing"],
                            2
                        );
                    ?>

                </div>

            </div>



            <!-- WORST -->

            <div class="insight-card">

                <h3>
                    LOWEST PERFORMER
                </h3>


                <div class="insight-main">

                    <div class="insight-name">

                        <?php
                            echo htmlspecialchars(
                                $worstPerformer["name"]
                            );
                        ?>

                    </div>


                    <div class="insight-value negative">

                        <?php
                            echo number_format(
                                $worstPerformer["percentage"],
                                2
                            );
                        ?>%

                    </div>

                </div>


                <div class="insight-description">

                    Price moved from ₹
                    <?php
                        echo number_format(
                            $worstPerformer["opening"],
                            2
                        );
                    ?>

                    to ₹
                    <?php
                        echo number_format(
                            $worstPerformer["closing"],
                            2
                        );
                    ?>

                </div>

            </div>


        </section>



        <!-- =====================================
             INVESTOR INSIGHT
             ===================================== -->

        <section class="investor-box">

            <div class="investor-icon">
                i
            </div>


            <div>

                <h3>
                    INVESTOR INSIGHT
                </h3>

                <p>

                    <?php if ($gainers > $losers): ?>

                        The portfolio shows a
                        <strong>positive trend</strong>,
                        with <?php echo $gainers; ?>
                        stocks recording gains compared with
                        <?php echo $losers; ?> declining stocks.

                    <?php elseif ($losers > $gainers): ?>

                        The portfolio shows a
                        <strong>negative trend</strong>,
                        with <?php echo $losers; ?>
                        stocks recording losses compared with
                        <?php echo $gainers; ?> gaining stocks.

                    <?php else: ?>

                        The portfolio shows a
                        <strong>neutral trend</strong>,
                        with an equal number of gaining and
                        declining stocks.

                    <?php endif; ?>

                </p>

            </div>

        </section>



        <!-- =====================================
             ACTION BUTTONS
             ===================================== -->

        <div class="actions">

            <a
                href="index.php"
                class="back-button"
            >
                ← Edit Stock Data
            </a>


            <a
                href="index.php"
                class="new-report"
            >
                New Analysis →
            </a>

        </div>



        <!-- FOOTER -->

        <div class="footer">

            PHP PRACTICAL
            •
            ARRAYS
            •
            NUMERICAL FUNCTIONS
            •
            STOCK PERFORMANCE ANALYSIS

        </div>


    </main>

</div>


</body>

</html>