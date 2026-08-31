<?php

/* ==========================================
   GET SALES DATA
   ========================================== */

$salesData = $_POST["sales"] ?? [];


/* ==========================================
   MONTH NAMES
   ========================================== */

$months = [

    "January",
    "February",
    "March",
    "April",
    "May",
    "June"

];


/* ==========================================
   CREATE SALES ARRAY
   ========================================== */

$sales = [];


foreach ($salesData as $index => $item) {

    $amount = (float)($item["amount"] ?? 0);

    $sales[] = $amount;

}


/* ==========================================
   BASIC ARRAY FUNCTIONS
   ========================================== */

$totalSales = array_sum($sales);

$totalPeriods = count($sales);

$highestSales = !empty($sales)
    ? max($sales)
    : 0;

$lowestSales = !empty($sales)
    ? min($sales)
    : 0;


/* ==========================================
   AVERAGE SALES
   ========================================== */

$averageSales = $totalPeriods > 0
    ? $totalSales / $totalPeriods
    : 0;


/* ==========================================
   FIND HIGHEST AND LOWEST MONTH
   ========================================== */

$highestIndex = !empty($sales)
    ? array_search($highestSales, $sales)
    : 0;

$lowestIndex = !empty($sales)
    ? array_search($lowestSales, $sales)
    : 0;


$highestMonth = $months[$highestIndex] ?? "-";

$lowestMonth = $months[$lowestIndex] ?? "-";


/* ==========================================
   CALCULATE GROWTH AND TREND
   ========================================== */

$analysis = [];


for ($i = 0; $i < $totalPeriods; $i++) {

    $currentSales = $sales[$i];

    if ($i == 0) {

        $growth = 0;

        $trend = "Starting Point";

    } else {

        $previousSales = $sales[$i - 1];


        if ($previousSales != 0) {

            $growth =
                (($currentSales - $previousSales)
                / $previousSales) * 100;

        } else {

            $growth = 0;

        }


        if ($currentSales > $previousSales) {

            $trend = "Increasing";

        } elseif ($currentSales < $previousSales) {

            $trend = "Decreasing";

        } else {

            $trend = "Stable";

        }

    }


    $analysis[] = [

        "month" => $months[$i] ?? "Period " . ($i + 1),

        "sales" => $currentSales,

        "growth" => $growth,

        "trend" => $trend

    ];

}


/* ==========================================
   OVERALL TREND
   ========================================== */

if ($totalPeriods >= 2) {

    $firstSales = $sales[0];

    $lastSales = $sales[$totalPeriods - 1];


    if ($lastSales > $firstSales) {

        $overallTrend = "Increasing";

    } elseif ($lastSales < $firstSales) {

        $overallTrend = "Decreasing";

    } else {

        $overallTrend = "Stable";

    }

} else {

    $overallTrend = "Not Available";

}


/* ==========================================
   OVERALL GROWTH
   ========================================== */

if (
    $totalPeriods >= 2 &&
    $sales[0] != 0
) {

    $overallGrowth =
        (($sales[$totalPeriods - 1] - $sales[0])
        / $sales[0]) * 100;

} else {

    $overallGrowth = 0;

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Sales Analysis Report</title>


    <style>

    * {

        margin: 0;

        padding: 0;

        box-sizing: border-box;

    }


    body {

        font-family:
            Arial,
            Helvetica,
            sans-serif;

        background: #f5f7f9;

        color: #3d454d;

        min-height: 100vh;

    }


    /* =============================
       HEADER
       ============================= */

    header {

        height: 80px;

        background: #ffffff;

        border-bottom: 1px solid #e1e5e9;

        display: flex;

        align-items: center;

        justify-content: space-between;

        padding: 0 7%;

    }


    .brand {

        display: flex;

        align-items: center;

        gap: 13px;

    }


    .brand-icon {

        width: 43px;

        height: 43px;

        border-radius: 12px;

        background: #e7f6ee;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 20px;

    }


    .mini {

        display: block;

        font-size: 7px;

        letter-spacing: 1.5px;

        color: #4e9870;

        font-weight: bold;

        margin-bottom: 4px;

    }


    h1 {

        font-size: 18px;

        color: #353c44;

    }


    .report {

        padding: 8px 13px;

        border-radius: 20px;

        background: #f0f3f5;

        color: #747d85;

        font-size: 7px;

        font-weight: bold;

    }


    /* =============================
       MAIN
       ============================= */

    main {

        width: 86%;

        max-width: 1080px;

        margin: 27px auto;

    }


    .intro {

        margin-bottom: 18px;

    }


    .intro-label {

        display: block;

        color: #4e9870;

        font-size: 7px;

        font-weight: bold;

        letter-spacing: 1.5px;

        margin-bottom: 6px;

    }


    .intro h2 {

        font-size: 25px;

        margin-bottom: 6px;

    }


    .intro p {

        font-size: 9px;

        color: #949ca4;

    }


    /* =============================
       SUMMARY CARDS
       ============================= */

    .summary {

        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 13px;

        margin-bottom: 20px;

    }


    .summary-card {

        min-height: 108px;

        border-radius: 13px;

        padding: 18px;

        border: 1px solid transparent;

    }


    .green {

        background: #eaf6ef;

        border-color: #d9ebe0;

    }


    .blue {

        background: #eaf1f9;

        border-color: #dbe6f1;

    }


    .orange {

        background: #fff2e3;

        border-color: #f0dfc8;

    }


    .purple {

        background: #f0ebf7;

        border-color: #e3dced;

    }


    .summary-label {

        display: block;

        font-size: 7px;

        font-weight: bold;

        letter-spacing: 1px;

        color: #78818a;

        margin-bottom: 10px;

    }


    .summary-value {

        display: block;

        font-size: 21px;

        font-weight: bold;

        color: #414950;

    }


    .summary-sub {

        display: block;

        margin-top: 5px;

        font-size: 7px;

        color: #969ea6;

    }


    /* =============================
       OVERALL TREND
       ============================= */

    .trend-banner {

        background: #ffffff;

        border: 1px solid #e1e5e9;

        border-radius: 14px;

        padding: 19px 21px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-bottom: 20px;

    }


    .trend-left span {

        display: block;

        font-size: 7px;

        letter-spacing: 1.2px;

        color: #8b939b;

        margin-bottom: 6px;

    }


    .trend-left strong {

        font-size: 18px;

        color: #414950;

    }


    .trend-right {

        text-align: right;

    }


    .growth-value {

        font-size: 20px;

        font-weight: bold;

    }


    .growth-label {

        display: block;

        margin-top: 4px;

        font-size: 7px;

        color: #929aa2;

    }


    /* =============================
       PERIOD ANALYSIS
       ============================= */

    .analysis {

        background: #ffffff;

        border: 1px solid #e1e5e9;

        border-radius: 14px;

        padding: 22px;

    }


    .section-title {

        margin-bottom: 17px;

    }


    .section-title span {

        display: block;

        font-size: 7px;

        font-weight: bold;

        letter-spacing: 1.4px;

        color: #4e9870;

        margin-bottom: 5px;

    }


    .section-title h2 {

        font-size: 18px;

    }


    /* =============================
       SALES ROW
       ============================= */

    .sales-list {

        display: flex;

        flex-direction: column;

        gap: 9px;

    }


    .sales-row {

        min-height: 66px;

        padding: 10px 13px;

        background: #f8f9fa;

        border: 1px solid #e2e6ea;

        border-radius: 10px;

        display: flex;

        align-items: center;

        gap: 13px;

    }


    .period-number {

        width: 33px;

        height: 33px;

        border-radius: 8px;

        background: #ffffff;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 8px;

        font-weight: bold;

        color: #7d858d;

    }


    .period-info {

        flex: 1;

    }


    .period-info strong {

        display: block;

        font-size: 9px;

        color: #4a525a;

        margin-bottom: 4px;

    }


    .period-info span {

        font-size: 7px;

        color: #9aa1a8;

    }


    .amount {

        font-size: 12px;

        font-weight: bold;

        color: #424950;

        min-width: 105px;

        text-align: right;

    }


    .trend {

        min-width: 90px;

        text-align: center;

        padding: 7px 8px;

        border-radius: 7px;

        font-size: 7px;

        font-weight: bold;

    }


    .increase {

        background: #e7f5ed;

        color: #4d966d;

    }


    .decrease {

        background: #f9e9e9;

        color: #b56c6c;

    }


    .stable {

        background: #fff2dc;

        color: #b38245;

    }


    .starting {

        background: #edf0f3;

        color: #7b838b;

    }


    .growth {

        min-width: 65px;

        text-align: right;

        font-size: 8px;

        font-weight: bold;

    }


    /* =============================
       FUNCTIONS
       ============================= */

    .functions {

        margin-top: 17px;

        padding: 16px;

        background: #f3f6f4;

        border: 1px solid #dfe9e2;

        border-radius: 10px;

    }


    .functions strong {

        display: block;

        font-size: 8px;

        color: #5f7065;

        margin-bottom: 8px;

    }


    .function-list {

        display: flex;

        flex-wrap: wrap;

        gap: 7px;

    }


    .function {

        padding: 6px 9px;

        background: #ffffff;

        border: 1px solid #dce4de;

        border-radius: 6px;

        color: #718078;

        font-size: 7px;

    }


    /* =============================
       BACK BUTTON
       ============================= */

    .action {

        text-align: center;

        margin-top: 20px;

    }


    .back {

        display: inline-block;

        text-decoration: none;

        padding: 12px 22px;

        background: #424a53;

        color: #ffffff;

        border-radius: 8px;

        font-size: 9px;

        font-weight: bold;

    }


    .back:hover {

        background: #2e353d;

    }


    /* =============================
       FOOTER
       ============================= */

    footer {

        width: 86%;

        max-width: 1080px;

        margin: auto;

        padding: 17px 0 25px;

        border-top: 1px solid #dfe3e7;

        text-align: center;

        color: #9aa2aa;

        font-size: 8px;

    }


    /* =============================
       RESPONSIVE
       ============================= */

    @media (max-width: 900px) {

        .summary {

            grid-template-columns:
                repeat(2, 1fr);

        }

    }


    @media (max-width: 650px) {

        main,
        footer {

            width: 90%;

        }


        .summary {

            grid-template-columns: 1fr;

        }


        .trend-banner {

            align-items: flex-start;

            gap: 15px;

        }


        .sales-row {

            flex-wrap: wrap;

        }


        .amount,
        .growth {

            text-align: left;

        }

    }

    </style>

</head>


<body>


<!-- HEADER -->

<header>

    <div class="brand">

        <div class="brand-icon">
            📈
        </div>

        <div>

            <span class="mini">
                BUSINESS ANALYTICS
            </span>

            <h1>
                Sales Trend Analysis
            </h1>

        </div>

    </div>


    <div class="report">
        ANALYSIS REPORT
    </div>

</header>



<main>


    <!-- INTRO -->

    <section class="intro">

        <span class="intro-label">
            HISTORICAL PERFORMANCE
        </span>

        <h2>
            Sales Analysis Report
        </h2>

        <p>
            Sales growth and trends calculated from the entered records.
        </p>

    </section>



    <!-- SUMMARY -->

    <section class="summary">


        <div class="summary-card green">

            <span class="summary-label">
                TOTAL SALES
            </span>

            <strong class="summary-value">

                ₹<?= number_format($totalSales, 2) ?>

            </strong>

            <span class="summary-sub">
                Combined sales
            </span>

        </div>



        <div class="summary-card blue">

            <span class="summary-label">
                AVERAGE SALES
            </span>

            <strong class="summary-value">

                ₹<?= number_format($averageSales, 2) ?>

            </strong>

            <span class="summary-sub">
                Average per period
            </span>

        </div>



        <div class="summary-card orange">

            <span class="summary-label">
                HIGHEST SALES
            </span>

            <strong class="summary-value">

                ₹<?= number_format($highestSales, 2) ?>

            </strong>

            <span class="summary-sub">
                <?= htmlspecialchars($highestMonth) ?>
            </span>

        </div>



        <div class="summary-card purple">

            <span class="summary-label">
                LOWEST SALES
            </span>

            <strong class="summary-value">

                ₹<?= number_format($lowestSales, 2) ?>

            </strong>

            <span class="summary-sub">
                <?= htmlspecialchars($lowestMonth) ?>
            </span>

        </div>


    </section>



    <!-- OVERALL TREND -->

    <section class="trend-banner">


        <div class="trend-left">

            <span>
                OVERALL SALES TREND
            </span>

            <strong>

                <?php

                if ($overallTrend == "Increasing") {

                    echo "📈 Sales are Increasing";

                } elseif ($overallTrend == "Decreasing") {

                    echo "📉 Sales are Decreasing";

                } elseif ($overallTrend == "Stable") {

                    echo "➡️ Sales are Stable";

                } else {

                    echo "Sales Trend Unavailable";

                }

                ?>

            </strong>

        </div>


        <div class="trend-right">

            <div class="growth-value">

                <?= number_format($overallGrowth, 2) ?>%

            </div>

            <span class="growth-label">
                Overall Growth
            </span>

        </div>


    </section>



    <!-- PERIOD ANALYSIS -->

    <section class="analysis">


        <div class="section-title">

            <span>
                PERIOD-WISE ANALYSIS
            </span>

            <h2>
                Sales Performance
            </h2>

        </div>



        <div class="sales-list">


            <?php foreach (
                $analysis
                as $index => $item
            ): ?>


                <div class="sales-row">


                    <div class="period-number">

                        <?= $index + 1 ?>

                    </div>


                    <div class="period-info">

                        <strong>

                            <?= htmlspecialchars(
                                $item["month"]
                            ) ?>

                        </strong>

                        <span>
                            Historical sales period
                        </span>

                    </div>


                    <div class="amount">

                        ₹<?= number_format(
                            $item["sales"],
                            2
                        ) ?>

                    </div>


                    <?php

                    if ($item["trend"] == "Increasing") {

                        $trendClass = "increase";

                    } elseif ($item["trend"] == "Decreasing") {

                        $trendClass = "decrease";

                    } elseif ($item["trend"] == "Stable") {

                        $trendClass = "stable";

                    } else {

                        $trendClass = "starting";

                    }

                    ?>


                    <div class="trend <?= $trendClass ?>">

                        <?php

                        if (
                            $item["trend"]
                            == "Increasing"
                        ) {

                            echo "↑ Increasing";

                        } elseif (
                            $item["trend"]
                            == "Decreasing"
                        ) {

                            echo "↓ Decreasing";

                        } elseif (
                            $item["trend"]
                            == "Stable"
                        ) {

                            echo "→ Stable";

                        } else {

                            echo "Starting";

                        }

                        ?>

                    </div>


                    <div class="growth">

                        <?php

                        if ($index == 0) {

                            echo "--";

                        } else {

                            echo
                                ($item["growth"] >= 0
                                    ? "+"
                                    : "")
                                .
                                number_format(
                                    $item["growth"],
                                    2
                                )
                                . "%";

                        }

                        ?>

                    </div>


                </div>


            <?php endforeach; ?>


        </div>



        <!-- ARRAY FUNCTIONS -->

        <div class="functions">

            <strong>
                PHP FUNCTIONS USED
            </strong>


            <div class="function-list">

                <span class="function">
                    array_sum()
                </span>

                <span class="function">
                    count()
                </span>

                <span class="function">
                    max()
                </span>

                <span class="function">
                    min()
                </span>

                <span class="function">
                    array_search()
                </span>

            </div>

        </div>


    </section>



    <!-- BACK -->

    <div class="action">

        <a href="index.php"
           class="back">

            ← Enter New Sales

        </a>

    </div>


</main>



<footer>

    PHP Practical • Sales Trend Analysis

</footer>


</body>

</html>