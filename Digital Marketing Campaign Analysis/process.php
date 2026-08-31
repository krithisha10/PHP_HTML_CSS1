<?php

/* =========================================
   DIGITAL MARKETING CAMPAIGN DATA
   ========================================= */

$campaigns = [

    [
        "campaign" => "Summer Sale",
        "source" => "Social Media",
        "impressions" => 50000,
        "clicks" => 4250,
        "conversions" => 510,
        "cost" => 12000,
        "revenue" => 36000
    ],

    [
        "campaign" => "Product Launch",
        "source" => "Search Ads",
        "impressions" => 40000,
        "clicks" => 3600,
        "conversions" => 432,
        "cost" => 15000,
        "revenue" => 45000
    ],

    [
        "campaign" => "Festival Offer",
        "source" => "Email Marketing",
        "impressions" => 30000,
        "clicks" => 2700,
        "conversions" => 405,
        "cost" => 8000,
        "revenue" => 32000
    ],

    [
        "campaign" => "Winter Promotion",
        "source" => "Social Media",
        "impressions" => 45000,
        "clicks" => 3150,
        "conversions" => 315,
        "cost" => 10000,
        "revenue" => 28000
    ],

    [
        "campaign" => "New Year Campaign",
        "source" => "Search Ads",
        "impressions" => 60000,
        "clicks" => 5400,
        "conversions" => 648,
        "cost" => 18000,
        "revenue" => 54000
    ],

    [
        "campaign" => "Customer Retention",
        "source" => "Email Marketing",
        "impressions" => 35000,
        "clicks" => 3500,
        "conversions" => 525,
        "cost" => 7000,
        "revenue" => 35000
    ]

];


/* =========================================
   INITIAL VALUES
   ========================================= */

$totalImpressions = 0;

$totalClicks = 0;

$totalConversions = 0;

$totalCost = 0;

$totalRevenue = 0;


/* =========================================
   CALCULATE TOTALS
   ========================================= */

foreach ($campaigns as $campaign) {

    $totalImpressions += $campaign["impressions"];

    $totalClicks += $campaign["clicks"];

    $totalConversions += $campaign["conversions"];

    $totalCost += $campaign["cost"];

    $totalRevenue += $campaign["revenue"];
}


/* =========================================
   OVERALL KPI CALCULATIONS
   ========================================= */

/*
   CTR = (Clicks / Impressions) × 100
*/

$overallCTR = 0;

if ($totalImpressions > 0) {

    $overallCTR =
        ($totalClicks / $totalImpressions) * 100;
}


/*
   Conversion Rate =
   (Conversions / Clicks) × 100
*/

$overallConversionRate = 0;

if ($totalClicks > 0) {

    $overallConversionRate =
        ($totalConversions / $totalClicks) * 100;
}


/*
   ROI =
   ((Revenue - Cost) / Cost) × 100
*/

$overallROI = 0;

if ($totalCost > 0) {

    $overallROI =
        (($totalRevenue - $totalCost) / $totalCost) * 100;
}


/* =========================================
   CAMPAIGN-WISE KPI CALCULATION
   ========================================= */

foreach ($campaigns as $key => $campaign) {

    $impressions = $campaign["impressions"];

    $clicks = $campaign["clicks"];

    $conversions = $campaign["conversions"];

    $cost = $campaign["cost"];

    $revenue = $campaign["revenue"];


    /* CTR */

    if ($impressions > 0) {

        $ctr =
            ($clicks / $impressions) * 100;

    } else {

        $ctr = 0;

    }


    /* Conversion Rate */

    if ($clicks > 0) {

        $conversionRate =
            ($conversions / $clicks) * 100;

    } else {

        $conversionRate = 0;

    }


    /* ROI */

    if ($cost > 0) {

        $roi =
            (($revenue - $cost) / $cost) * 100;

    } else {

        $roi = 0;

    }


    $campaigns[$key]["ctr"] = $ctr;

    $campaigns[$key]["conversion_rate"] =
        $conversionRate;

    $campaigns[$key]["roi"] = $roi;
}


/* =========================================
   FIND BEST CAMPAIGN
   ========================================= */

$bestCampaign = $campaigns[0];

foreach ($campaigns as $campaign) {

    if (
        $campaign["roi"] >
        $bestCampaign["roi"]
    ) {

        $bestCampaign = $campaign;

    }
}


/* =========================================
   SORT CAMPAIGNS BY ROI
   ========================================= */

$rankedCampaigns = $campaigns;

usort(
    $rankedCampaigns,
    function ($a, $b) {

        return $b["roi"] <=> $a["roi"];

    }
);


/* =========================================
   SOURCE-WISE ANALYSIS
   ========================================= */

$sources = [];


foreach ($campaigns as $campaign) {

    $source = $campaign["source"];


    if (!isset($sources[$source])) {

        $sources[$source] = [

            "campaigns" => 0,

            "impressions" => 0,

            "clicks" => 0,

            "conversions" => 0,

            "cost" => 0,

            "revenue" => 0

        ];

    }


    $sources[$source]["campaigns"]++;

    $sources[$source]["impressions"]
        += $campaign["impressions"];

    $sources[$source]["clicks"]
        += $campaign["clicks"];

    $sources[$source]["conversions"]
        += $campaign["conversions"];

    $sources[$source]["cost"]
        += $campaign["cost"];

    $sources[$source]["revenue"]
        += $campaign["revenue"];
}


/* =========================================
   SOURCE KPI CALCULATIONS
   ========================================= */

foreach ($sources as $source => $data) {

    if ($data["impressions"] > 0) {

        $sources[$source]["ctr"] =
            (
                $data["clicks"] /
                $data["impressions"]
            ) * 100;

    } else {

        $sources[$source]["ctr"] = 0;

    }


    if ($data["clicks"] > 0) {

        $sources[$source]["conversion_rate"] =
            (
                $data["conversions"] /
                $data["clicks"]
            ) * 100;

    } else {

        $sources[$source]["conversion_rate"] = 0;

    }


    if ($data["cost"] > 0) {

        $sources[$source]["roi"] =
            (
                (
                    $data["revenue"] -
                    $data["cost"]
                ) /
                $data["cost"]
            ) * 100;

    } else {

        $sources[$source]["roi"] = 0;

    }

}


/* =========================================
   SORT SOURCES BY ROI
   ========================================= */

uasort(
    $sources,
    function ($a, $b) {

        return $b["roi"] <=> $a["roi"];

    }
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
        Marketing Campaign Report
    </title>

    <link rel="stylesheet" href="style.css">


    <style>

        /* =====================================
           REPORT HEADER
           ===================================== */

        .report-header {

            background: #efebe2;

            border: 1px solid #e1dbcf;

            border-radius: 13px;

            padding: 22px;

            margin-bottom: 15px;

        }


        .report-header span {

            display: block;

            font-size: 6px;

            color: #897355;

            letter-spacing: 1.3px;

            font-weight: bold;

            margin-bottom: 6px;

        }


        .report-header h2 {

            font-size: 22px;

            color: #41433e;

            margin-bottom: 5px;

        }


        .report-header p {

            font-size: 7px;

            color: #96938c;

        }


        /* =====================================
           KPI CARDS
           ===================================== */

        .statistics {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 9px;

            margin-bottom: 15px;

        }


        .stat {

            background: #fffdf9;

            border: 1px solid #e1ddd4;

            border-radius: 10px;

            padding: 14px;

        }


        .stat span {

            display: block;

            font-size: 5px;

            color: #99968f;

            letter-spacing: .8px;

            font-weight: bold;

            margin-bottom: 7px;

        }


        .stat strong {

            font-size: 17px;

            color: #897254;

        }


        .stat:nth-child(2) strong {

            color: #65806b;

        }


        .stat:nth-child(3) strong {

            color: #806f91;

        }


        .stat:nth-child(4) strong {

            color: #9a755d;

        }


        /* =====================================
           REPORT CARD
           ===================================== */

        .report-card {

            background: #fffdf9;

            border: 1px solid #e1ddd4;

            border-radius: 13px;

            padding: 20px;

            margin-bottom: 15px;

        }


        .report-title {

            margin-bottom: 13px;

        }


        .report-title span {

            display: block;

            font-size: 6px;

            color: #897355;

            letter-spacing: 1.2px;

            font-weight: bold;

            margin-bottom: 5px;

        }


        .report-title h3 {

            font-size: 15px;

            color: #484a44;

        }


        /* =====================================
           TABLE
           ===================================== */

        .table-wrapper {

            width: 100%;

            overflow-x: auto;

            border: 1px solid #e1ddd5;

            border-radius: 9px;

        }


        table {

            width: 100%;

            min-width: 850px;

            border-collapse: collapse;

        }


        th {

            height: 40px;

            padding: 0 10px;

            background: #f3f0e9;

            border-bottom: 1px solid #dfdbd2;

            text-align: left;

            font-size: 5px;

            color: #817d74;

            letter-spacing: .7px;

        }


        td {

            height: 47px;

            padding: 7px 10px;

            border-bottom: 1px solid #eeeae3;

            font-size: 7px;

            color: #77766f;

        }


        tr:last-child td {

            border-bottom: none;

        }


        tbody tr:hover {

            background: #faf8f3;

        }


        .rank {

            width: 27px;

            height: 27px;

            border-radius: 7px;

            background: #eee9df;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            color: #887253;

            font-size: 6px;

            font-weight: bold;

        }


        .campaign-name {

            font-size: 8px;

            font-weight: bold;

            color: #50524b;

        }


        .source {

            color: #77786f;

        }


        .metric {

            font-weight: bold;

            color: #897254;

        }


        .roi {

            font-weight: bold;

            color: #65806b;

        }


        /* =====================================
           BEST CAMPAIGN
           ===================================== */

        .best-campaign {

            background: #f0f3ed;

            border: 1px solid #dce6d9;

            border-radius: 10px;

            padding: 17px;

            margin-bottom: 15px;

            display: flex;

            align-items: center;

            justify-content: space-between;

        }


        .best-content span {

            display: block;

            font-size: 6px;

            color: #6d826b;

            font-weight: bold;

            letter-spacing: 1px;

            margin-bottom: 5px;

        }


        .best-content h3 {

            font-size: 16px;

            color: #555a52;

            margin-bottom: 5px;

        }


        .best-content p {

            font-size: 7px;

            color: #898d85;

        }


        .best-roi {

            font-size: 20px;

            font-weight: bold;

            color: #65806b;

        }


        /* =====================================
           SOURCE GRID
           ===================================== */

        .source-grid-report {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 10px;

        }


        .source-report-card {

            background: #f8f5ef;

            border: 1px solid #e3ded4;

            border-radius: 9px;

            padding: 15px;

        }


        .source-report-card h4 {

            font-size: 9px;

            color: #55574f;

            margin-bottom: 10px;

        }


        .source-report-card p {

            font-size: 6px;

            color: #929088;

            margin-bottom: 6px;

        }


        .source-report-card strong {

            color: #70604a;

        }


        /* =====================================
           BACK BUTTON
           ===================================== */

        .back-button {

            text-align: center;

            margin-top: 17px;

        }


        .back-button a {

            display: inline-block;

            text-decoration: none;

            padding: 10px 17px;

            border-radius: 7px;

            background: #897254;

            color: white;

            font-size: 7px;

            font-weight: bold;

        }


        .back-button a:hover {

            background: #725d42;

        }


        /* =====================================
           RESPONSIVE
           ===================================== */

        @media (max-width: 850px) {

            .statistics {

                grid-template-columns:
                    repeat(2, 1fr);

            }

            .source-grid-report {

                grid-template-columns:
                    1fr;

            }

        }


        @media (max-width: 550px) {

            .statistics {

                grid-template-columns:
                    1fr;

            }

            .report-card {

                padding: 14px;

            }

            .best-campaign {

                flex-direction: column;

                align-items: flex-start;

                gap: 12px;

            }

        }

    </style>

</head>


<body>


<div class="page">


    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="logo">
                📣
            </div>

            <div>

                <span>
                    DIGITAL MARKETING
                </span>

                <h1>
                    Campaign Analysis
                </h1>

            </div>

        </div>


        <div class="badge">
            ANALYTICS
        </div>

    </header>



    <!-- MAIN -->

    <main class="container">


        <!-- REPORT HEADER -->

        <section class="report-header">

            <span>
                CAMPAIGN PERFORMANCE REPORT
            </span>

            <h2>
                Digital Marketing Summary
            </h2>

            <p>
                Performance analysis of campaigns collected
                from multiple marketing sources.
            </p>

        </section>



        <!-- KPI STATISTICS -->

        <section class="statistics">


            <div class="stat">

                <span>
                    TOTAL IMPRESSIONS
                </span>

                <strong>

                    <?php
                    echo number_format(
                        $totalImpressions
                    );
                    ?>

                </strong>

            </div>


            <div class="stat">

                <span>
                    TOTAL CLICKS
                </span>

                <strong>

                    <?php
                    echo number_format(
                        $totalClicks
                    );
                    ?>

                </strong>

            </div>


            <div class="stat">

                <span>
                    CONVERSIONS
                </span>

                <strong>

                    <?php
                    echo number_format(
                        $totalConversions
                    );
                    ?>

                </strong>

            </div>


            <div class="stat">

                <span>
                    OVERALL ROI
                </span>

                <strong>

                    <?php
                    echo number_format(
                        $overallROI,
                        1
                    );
                    ?>%

                </strong>

            </div>


        </section>



        <!-- KPI SUMMARY -->

        <section class="report-card">


            <div class="report-title">

                <span>
                    KEY PERFORMANCE INDICATORS
                </span>

                <h3>
                    Overall Campaign Metrics
                </h3>

            </div>


            <section class="statistics">


                <div class="stat">

                    <span>
                        CLICK-THROUGH RATE
                    </span>

                    <strong>

                        <?php
                        echo number_format(
                            $overallCTR,
                            2
                        );
                        ?>%

                    </strong>

                </div>


                <div class="stat">

                    <span>
                        CONVERSION RATE
                    </span>

                    <strong>

                        <?php
                        echo number_format(
                            $overallConversionRate,
                            2
                        );
                        ?>%

                    </strong>

                </div>


                <div class="stat">

                    <span>
                        TOTAL COST
                    </span>

                    <strong>

                        ₹<?php
                        echo number_format(
                            $totalCost
                        );
                        ?>

                    </strong>

                </div>


                <div class="stat">

                    <span>
                        TOTAL REVENUE
                    </span>

                    <strong>

                        ₹<?php
                        echo number_format(
                            $totalRevenue
                        );
                        ?>

                    </strong>

                </div>


            </section>


        </section>



        <!-- BEST CAMPAIGN -->

        <section class="best-campaign">


            <div class="best-content">

                <span>
                    ★ TOP PERFORMING CAMPAIGN
                </span>

                <h3>

                    <?php
                    echo htmlspecialchars(
                        $bestCampaign["campaign"]
                    );
                    ?>

                </h3>

                <p>

                    <?php
                    echo htmlspecialchars(
                        $bestCampaign["source"]
                    );
                    ?>

                    •

                    Revenue ₹<?php
                    echo number_format(
                        $bestCampaign["revenue"]
                    );
                    ?>

                </p>

            </div>


            <div class="best-roi">

                <?php
                echo number_format(
                    $bestCampaign["roi"],
                    1
                );
                ?>% ROI

            </div>


        </section>



        <!-- CAMPAIGN RANKING -->

        <section class="report-card">


            <div class="report-title">

                <span>
                    CAMPAIGN ANALYSIS
                </span>

                <h3>
                    Campaigns Ranked by ROI
                </h3>

            </div>


            <div class="table-wrapper">


                <table>


                    <thead>

                        <tr>

                            <th>
                                RANK
                            </th>

                            <th>
                                CAMPAIGN
                            </th>

                            <th>
                                SOURCE
                            </th>

                            <th>
                                IMPRESSIONS
                            </th>

                            <th>
                                CLICKS
                            </th>

                            <th>
                                CONVERSIONS
                            </th>

                            <th>
                                CTR
                            </th>

                            <th>
                                CONVERSION
                            </th>

                            <th>
                                ROI
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php

                    $rank = 1;

                    foreach (
                        $rankedCampaigns
                        as $campaign
                    ):

                    ?>


                        <tr>


                            <td>

                                <span class="rank">

                                    <?php
                                    echo $rank;
                                    ?>

                                </span>

                            </td>


                            <td class="campaign-name">

                                <?php
                                echo htmlspecialchars(
                                    $campaign["campaign"]
                                );
                                ?>

                            </td>


                            <td class="source">

                                <?php
                                echo htmlspecialchars(
                                    $campaign["source"]
                                );
                                ?>

                            </td>


                            <td>

                                <?php
                                echo number_format(
                                    $campaign["impressions"]
                                );
                                ?>

                            </td>


                            <td>

                                <?php
                                echo number_format(
                                    $campaign["clicks"]
                                );
                                ?>

                            </td>


                            <td>

                                <?php
                                echo number_format(
                                    $campaign["conversions"]
                                );
                                ?>

                            </td>


                            <td class="metric">

                                <?php
                                echo number_format(
                                    $campaign["ctr"],
                                    2
                                );
                                ?>%

                            </td>


                            <td class="metric">

                                <?php
                                echo number_format(
                                    $campaign["conversion_rate"],
                                    2
                                );
                                ?>%

                            </td>


                            <td class="roi">

                                <?php
                                echo number_format(
                                    $campaign["roi"],
                                    1
                                );
                                ?>%

                            </td>


                        </tr>


                    <?php

                        $rank++;

                    endforeach;

                    ?>


                    </tbody>


                </table>


            </div>


        </section>



        <!-- SOURCE ANALYSIS -->

        <section class="report-card">


            <div class="report-title">

                <span>
                    MARKETING SOURCES
                </span>

                <h3>
                    Source-wise Performance
                </h3>

            </div>


            <div class="source-grid-report">


            <?php foreach (
                $sources
                as $source => $data
            ): ?>


                <div class="source-report-card">


                    <h4>

                        <?php
                        echo htmlspecialchars(
                            $source
                        );
                        ?>

                    </h4>


                    <p>

                        Campaigns:

                        <strong>

                            <?php
                            echo $data["campaigns"];
                            ?>

                        </strong>

                    </p>


                    <p>

                        Clicks:

                        <strong>

                            <?php
                            echo number_format(
                                $data["clicks"]
                            );
                            ?>

                        </strong>

                    </p>


                    <p>

                        Conversions:

                        <strong>

                            <?php
                            echo number_format(
                                $data["conversions"]
                            );
                            ?>

                        </strong>

                    </p>


                    <p>

                        CTR:

                        <strong>

                            <?php
                            echo number_format(
                                $data["ctr"],
                                2
                            );
                            ?>%

                        </strong>

                    </p>


                    <p>

                        Conversion Rate:

                        <strong>

                            <?php
                            echo number_format(
                                $data["conversion_rate"],
                                2
                            );
                            ?>%

                        </strong>

                    </p>


                    <p>

                        ROI:

                        <strong>

                            <?php
                            echo number_format(
                                $data["roi"],
                                1
                            );
                            ?>%

                        </strong>

                    </p>


                </div>


            <?php endforeach; ?>


            </div>


        </section>



        <!-- BACK BUTTON -->

        <div class="back-button">

            <a href="index.php">

                ← Back to Campaign Analysis

            </a>

        </div>



        <!-- FOOTER -->

        <footer>

            <span>
                PHP PRACTICAL
            </span>

            <i>•</i>

            Digital Marketing Campaign Analysis

            <i>•</i>

            Array-Based Data Processing

        </footer>


    </main>


</div>


</body>

</html>