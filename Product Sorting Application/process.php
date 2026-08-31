<?php

/* =========================================================
   PRODUCT SORTING APPLICATION
   ========================================================= */


/* ---------------------------------------------------------
   RECEIVE FORM DATA
   --------------------------------------------------------- */

$products = $_POST['products'] ?? [];

$sortOrder = $_POST['sort_order'] ?? 'asc';


/* ---------------------------------------------------------
   CLEAN AND PREPARE PRODUCT ARRAY
   --------------------------------------------------------- */

$productList = [];

foreach ($products as $product) {

    $name = trim($product['name'] ?? '');
    $price = $product['price'] ?? 0;

    if ($name !== '' && is_numeric($price)) {

        $productList[] = [
            'name' => $name,
            'price' => (float)$price
        ];

    }
}


/* ---------------------------------------------------------
   SORT PRODUCTS USING USORT()
   --------------------------------------------------------- */

usort($productList, function ($a, $b) use ($sortOrder) {

    if ($sortOrder === 'desc') {

        return $b['price'] <=> $a['price'];

    } else {

        return $a['price'] <=> $b['price'];

    }

});


/* ---------------------------------------------------------
   CALCULATE SUMMARY
   --------------------------------------------------------- */

$totalProducts = count($productList);

$totalValue = 0;

foreach ($productList as $product) {

    $totalValue += $product['price'];

}


$averagePrice = $totalProducts > 0
    ? $totalValue / $totalProducts
    : 0;


/* ---------------------------------------------------------
   FIND CHEAPEST AND MOST EXPENSIVE
   --------------------------------------------------------- */

$cheapest = null;
$mostExpensive = null;

if ($totalProducts > 0) {

    $prices = array_column($productList, 'price');

    $minPrice = min($prices);
    $maxPrice = max($prices);

    foreach ($productList as $product) {

        if ($product['price'] == $minPrice) {

            $cheapest = $product;

        }

        if ($product['price'] == $maxPrice) {

            $mostExpensive = $product;

        }

    }

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Sorted Product Report
    </title>


    <style>

        /* =========================================
           RESET
           ========================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* =========================================
           BODY
           ========================================= */

        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f7f8fc;

            color: #3d4650;

            min-height: 100vh;

        }


        /* =========================================
           HEADER
           ========================================= */

        .header {

            height: 76px;

            background: #ffffff;

            border-bottom:
                1px solid #e6e8ed;

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


        .brand-icon {

            width: 43px;
            height: 43px;

            border-radius: 12px;

            background: #eeeaff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

        }


        .eyebrow {

            display: block;

            font-size: 7px;

            letter-spacing: 1.5px;

            color: #8175bd;

            font-weight: bold;

            margin-bottom: 4px;

        }


        .brand h1 {

            font-size: 18px;

            color: #39424e;

        }


        /* =========================================
           HEADER BADGE
           ========================================= */

        .header-badge {

            padding: 8px 13px;

            border-radius: 20px;

            background: #eef7f0;

            border: 1px solid #dceade;

            color: #62916d;

            font-size: 7px;

            font-weight: bold;

            letter-spacing: .8px;

        }


        /* =========================================
           MAIN
           ========================================= */

        .container {

            width: 86%;

            max-width: 1080px;

            margin: 25px auto 35px;

        }


        /* =========================================
           RESULT HERO
           ========================================= */

        .result-hero {

            min-height: 190px;

            padding: 30px 34px;

            border-radius: 19px;

            background: #eeebff;

            border: 1px solid #e1dcf8;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 18px;

            overflow: hidden;

            position: relative;

        }


        .result-label {

            display: block;

            font-size: 7px;

            letter-spacing: 1.5px;

            color: #786bb0;

            font-weight: bold;

            margin-bottom: 8px;

        }


        .result-hero h2 {

            font-size: 29px;

            font-weight: 400;

            color: #414957;

            margin-bottom: 8px;

        }


        .result-hero h2 span {

            color: #776ab2;

            font-weight: bold;

        }


        .result-hero p {

            font-size: 9px;

            color: #858692;

            line-height: 1.7;

        }


        /* =========================================
           SORT VISUAL
           ========================================= */

        .sort-visual {

            width: 125px;

            height: 125px;

            border-radius: 50%;

            background: #ffffff;

            border: 1px solid #ded9ef;

            display: flex;

            flex-direction: column;

            align-items: center;

            justify-content: center;

            color: #786db0;

            box-shadow:
                0 12px 30px rgba(70, 65, 100, .08);

        }


        .sort-visual .arrow {

            font-size: 30px;

            line-height: 30px;

            font-weight: bold;

        }


        .sort-visual small {

            margin-top: 8px;

            font-size: 6px;

            letter-spacing: 1px;

            font-weight: bold;

        }


        /* =========================================
           SUMMARY GRID
           ========================================= */

        .summary-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 10px;

            margin-bottom: 18px;

        }


        .summary-card {

            min-height: 105px;

            padding: 15px;

            border-radius: 12px;

            border: 1px solid;

        }


        .summary-card:nth-child(1) {

            background: #eef5f9;

            border-color: #dce9ef;

        }


        .summary-card:nth-child(2) {

            background: #f3f0ff;

            border-color: #e3def7;

        }


        .summary-card:nth-child(3) {

            background: #eef7f0;

            border-color: #dceade;

        }


        .summary-card:nth-child(4) {

            background: #fff5ea;

            border-color: #efdfce;

        }


        .summary-card label {

            display: block;

            font-size: 6px;

            letter-spacing: .8px;

            color: #858e94;

            font-weight: bold;

            margin-bottom: 9px;

        }


        .summary-card strong {

            display: block;

            font-size: 18px;

            color: #505a63;

            margin-bottom: 5px;

        }


        .summary-card small {

            font-size: 6px;

            color: #9da3a7;

        }


        .summary-card:nth-child(1) strong {

            color: #638aa1;

        }


        .summary-card:nth-child(2) strong {

            color: #796cb0;

        }


        .summary-card:nth-child(3) strong {

            color: #62916d;

        }


        .summary-card:nth-child(4) strong {

            color: #b27e4e;

        }


        /* =========================================
           PRODUCT REPORT
           ========================================= */

        .report {

            background: #ffffff;

            border: 1px solid #e3e5ea;

            border-radius: 16px;

            padding: 22px;

            margin-bottom: 18px;

        }


        .report-header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 17px;

        }


        .report-header span {

            display: block;

            font-size: 7px;

            letter-spacing: 1.4px;

            color: #8175b9;

            font-weight: bold;

            margin-bottom: 5px;

        }


        .report-header h2 {

            font-size: 18px;

            color: #424b56;

        }


        .order-badge {

            padding: 7px 11px;

            border-radius: 7px;

            background: #f3f0ff;

            color: #776bb0;

            font-size: 6px;

            font-weight: bold;

            letter-spacing: .6px;

        }


        /* =========================================
           TABLE HEADER
           ========================================= */

        .table-header {

            display: grid;

            grid-template-columns:
                55px 1fr 170px;

            gap: 12px;

            padding: 9px 13px;

            border-radius: 8px;

            background: #f5f5f8;

            margin-bottom: 8px;

        }


        .table-header div {

            font-size: 6px;

            letter-spacing: .8px;

            font-weight: bold;

            color: #92989d;

        }


        .table-header div:last-child {

            text-align: right;

        }


        /* =========================================
           PRODUCT ITEM
           ========================================= */

        .product-item {

            display: grid;

            grid-template-columns:
                55px 1fr 170px;

            gap: 12px;

            align-items: center;

            padding: 12px 13px;

            border-radius: 9px;

            margin-bottom: 7px;

            border: 1px solid;

        }


        .product-item:nth-child(2) {

            background: #f2f8fb;

            border-color: #dfebf1;

        }


        .product-item:nth-child(3) {

            background: #f6f3fb;

            border-color: #e8e1f2;

        }


        .product-item:nth-child(4) {

            background: #f1f8f3;

            border-color: #dfebe1;

        }


        .product-item:nth-child(5) {

            background: #fff7ed;

            border-color: #f0e3d4;

        }


        .rank {

            width: 30px;

            height: 30px;

            border-radius: 8px;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 8px;

            font-weight: bold;

            color: #77818a;

        }


        .product-name {

            font-size: 10px;

            font-weight: bold;

            color: #4e5962;

        }


        .price {

            text-align: right;

            font-size: 13px;

            font-weight: bold;

            color: #7165a9;

        }


        /* =========================================
           PRICE BAR
           ========================================= */

        .price-area {

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 9px;

        }


        .price-bar {

            width: 65px;

            height: 5px;

            border-radius: 10px;

            background: #e5e4ec;

            overflow: hidden;

        }


        .price-fill {

            height: 100%;

            border-radius: 10px;

            background: #8a7dc0;

        }


        /* =========================================
           INSIGHT SECTION
           ========================================= */

        .insight {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 11px;

            margin-bottom: 20px;

        }


        .insight-card {

            padding: 18px;

            border-radius: 13px;

            border: 1px solid;

        }


        .insight-card.cheap {

            background: #eef7f0;

            border-color: #dceade;

        }


        .insight-card.expensive {

            background: #fff3e8;

            border-color: #efdfcf;

        }


        .insight-label {

            display: block;

            font-size: 6px;

            letter-spacing: 1px;

            font-weight: bold;

            margin-bottom: 8px;

        }


        .cheap .insight-label {

            color: #669172;

        }


        .expensive .insight-label {

            color: #ae7c4d;

        }


        .insight h3 {

            font-size: 13px;

            color: #555f67;

            margin-bottom: 5px;

        }


        .insight p {

            font-size: 7px;

            color: #92999d;

        }


        /* =========================================
           PHP CONCEPT
           ========================================= */

        .php-note {

            padding: 17px;

            border-radius: 13px;

            background: #f5f3fc;

            border: 1px solid #e4e0f1;

            margin-bottom: 20px;

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .php-icon {

            width: 38px;

            height: 38px;

            border-radius: 9px;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #7669ad;

            font-size: 9px;

            font-weight: bold;

        }


        .php-note h3 {

            font-size: 9px;

            color: #5c6370;

            margin-bottom: 4px;

        }


        .php-note p {

            font-size: 7px;

            color: #959aa1;

            line-height: 1.6;

        }


        /* =========================================
           BUTTONS
           ========================================= */

        .actions {

            display: flex;

            justify-content: center;

            gap: 10px;

        }


        .actions a {

            text-decoration: none;

            padding: 11px 20px;

            border-radius: 8px;

            font-size: 8px;

            font-weight: bold;

        }


        .back {

            background: #ffffff;

            border: 1px solid #dedfe4;

            color: #697279;

        }


        .back:hover {

            background: #f3f3f5;

        }


        .new {

            background: #7468ad;

            color: #ffffff;

        }


        .new:hover {

            background: #62579a;

        }


        /* =========================================
           FOOTER
           ========================================= */

        footer {

            margin-top: 20px;

            padding-top: 17px;

            border-top: 1px solid #dedfe3;

            text-align: center;

            font-size: 6px;

            letter-spacing: 1px;

            color: #9da2a5;

        }


        footer span {

            margin: 0 6px;

            color: #c3c5c7;

        }


        /* =========================================
           RESPONSIVE
           ========================================= */

        @media (max-width: 850px) {

            .container {

                width: 90%;

            }


            .summary-grid {

                grid-template-columns:
                    repeat(2, 1fr);

            }


            .table-header,
            .product-item {

                grid-template-columns:
                    45px 1fr 140px;

            }

        }


        @media (max-width: 650px) {

            .header {

                padding: 0 5%;

            }


            .header-badge {

                display: none;

            }


            .container {

                width: 92%;

            }


            .hero {

                padding: 24px;

            }


            .sort-visual {

                width: 85px;

                height: 85px;

            }


            .sort-visual .arrow {

                font-size: 22px;

            }


            .result-hero h2 {

                font-size: 23px;

            }


            .summary-grid {

                grid-template-columns: 1fr 1fr;

            }


            .table-header {

                display: none;

            }


            .product-item {

                grid-template-columns:
                    38px 1fr;

                gap: 10px;

            }


            .price-area {

                grid-column: 2;

                justify-content: flex-start;

            }


            .price {

                text-align: left;

            }


            .insight {

                grid-template-columns: 1fr;

            }


            .actions {

                flex-direction: column;

            }


            .actions a {

                text-align: center;

            }

        }


        @media (max-width: 430px) {

            .brand h1 {

                font-size: 15px;

            }


            .brand-icon {

                width: 38px;

                height: 38px;

            }


            .sort-visual {

                display: none;

            }


            .summary-grid {

                grid-template-columns: 1fr;

            }

        }

    </style>

</head>


<body>


<!-- =========================================
     HEADER
     ========================================= -->

<header class="header">


    <div class="brand">

        <div class="brand-icon">
            🛍️
        </div>

        <div>

            <span class="eyebrow">
                PRODUCT MANAGEMENT
            </span>

            <h1>
                Product Sorting
            </h1>

        </div>

    </div>


    <div class="header-badge">

        ✓ SORTING COMPLETE

    </div>


</header>



<!-- =========================================
     MAIN
     ========================================= -->

<main class="container">


    <!-- =====================================
         RESULT HERO
         ===================================== -->

    <section class="result-hero">

        <div>

            <span class="result-label">
                SORTING REPORT
            </span>

            <h2>

                Products arranged
                <span>
                    successfully.
                </span>

            </h2>

            <p>

                The product array has been sorted based
                on price using PHP array functions.

            </p>

        </div>


        <div class="sort-visual">

            <div class="arrow">

                <?php

                echo ($sortOrder === 'desc')
                    ? "↓"
                    : "↑";

                ?>

            </div>


            <small>

                <?php

                echo ($sortOrder === 'desc')
                    ? "HIGH → LOW"
                    : "LOW → HIGH";

                ?>

            </small>

        </div>

    </section>



    <!-- =====================================
         SUMMARY
         ===================================== -->

    <section class="summary-grid">


        <div class="summary-card">

            <label>
                PRODUCTS ANALYSED
            </label>

            <strong>

                <?php

                echo $totalProducts;

                ?>

            </strong>

            <small>
                Items in array
            </small>

        </div>



        <div class="summary-card">

            <label>
                AVERAGE PRICE
            </label>

            <strong>

                ₹<?php

                echo number_format(
                    $averagePrice,
                    2
                );

                ?>

            </strong>

            <small>
                Average product value
            </small>

        </div>



        <div class="summary-card">

            <label>
                TOTAL VALUE
            </label>

            <strong>

                ₹<?php

                echo number_format(
                    $totalValue,
                    2
                );

                ?>

            </strong>

            <small>
                Combined product value
            </small>

        </div>



        <div class="summary-card">

            <label>
                SORT ORDER
            </label>

            <strong>

                <?php

                echo ($sortOrder === 'desc')
                    ? "High → Low"
                    : "Low → High";

                ?>

            </strong>

            <small>
                Selected arrangement
            </small>

        </div>


    </section>



    <!-- =====================================
         PRODUCT REPORT
         ===================================== -->

    <section class="report">


        <div class="report-header">

            <div>

                <span>
                    SORTED PRODUCT LIST
                </span>

                <h2>
                    Price-wise Products
                </h2>

            </div>


            <div class="order-badge">

                <?php

                echo ($sortOrder === 'desc')
                    ? "DESCENDING"
                    : "ASCENDING";

                ?>

            </div>

        </div>



        <!-- TABLE HEADER -->

        <div class="table-header">

            <div>
                RANK
            </div>

            <div>
                PRODUCT
            </div>

            <div>
                PRICE
            </div>

        </div>



        <!-- =================================
             PRODUCTS
             ================================= -->

        <?php

        if ($totalProducts > 0):

            $rank = 1;

            foreach ($productList as $product):

                /*
                 * Calculate bar width.
                 * Maximum price gets 100%.
                 */

                $barWidth = ($maxPrice > 0)
                    ? ($product['price'] / $maxPrice) * 100
                    : 0;

        ?>

            <div class="product-item">


                <!-- RANK -->

                <div class="rank">

                    <?php

                    echo str_pad(
                        $rank,
                        2,
                        "0",
                        STR_PAD_LEFT
                    );

                    ?>

                </div>



                <!-- PRODUCT NAME -->

                <div class="product-name">

                    <?php

                    echo htmlspecialchars(
                        $product['name']
                    );

                    ?>

                </div>



                <!-- PRICE -->

                <div class="price-area">

                    <div class="price-bar">

                        <div
                            class="price-fill"
                            style="
                                width:
                                <?php
                                echo $barWidth;
                                ?>%;
                            "
                        >
                        </div>

                    </div>


                    <div class="price">

                        ₹<?php

                        echo number_format(
                            $product['price'],
                            2
                        );

                        ?>

                    </div>

                </div>


            </div>


        <?php

                $rank++;

            endforeach;

        else:

        ?>

            <div class="product-item">

                <div class="product-name">

                    No valid products found.

                </div>

            </div>

        <?php endif; ?>


    </section>



    <?php if ($totalProducts > 0): ?>


        <!-- =================================
             INSIGHTS
             ================================= -->

        <section class="insight">


            <!-- CHEAPEST -->

            <div class="insight-card cheap">

                <span class="insight-label">
                    LOWEST PRICED PRODUCT
                </span>

                <h3>

                    <?php

                    echo htmlspecialchars(
                        $cheapest['name']
                    );

                    ?>

                </h3>

                <p>

                    Starting price:
                    <strong>

                        ₹<?php

                        echo number_format(
                            $cheapest['price'],
                            2
                        );

                        ?>

                    </strong>

                </p>

            </div>



            <!-- MOST EXPENSIVE -->

            <div class="insight-card expensive">

                <span class="insight-label">
                    HIGHEST PRICED PRODUCT
                </span>

                <h3>

                    <?php

                    echo htmlspecialchars(
                        $mostExpensive['name']
                    );

                    ?>

                </h3>

                <p>

                    Highest price:
                    <strong>

                        ₹<?php

                        echo number_format(
                            $mostExpensive['price'],
                            2
                        );

                        ?>

                    </strong>

                </p>

            </div>


        </section>


    <?php endif; ?>



    <!-- =====================================
         PHP CONCEPT
         ===================================== -->

    <section class="php-note">

        <div class="php-icon">
            PHP
        </div>


        <div>

            <h3>
                Array Sorting Applied
            </h3>

            <p>

                Product details are stored in a
                multidimensional array and sorted using
                the <strong>usort()</strong> function
                according to the selected price order.

            </p>

        </div>

    </section>



    <!-- =====================================
         ACTION BUTTONS
         ===================================== -->

    <div class="actions">

        <a
            href="index.php"
            class="back"
        >
            ← Modify Products
        </a>


        <a
            href="index.php"
            class="new"
        >
            Sort New Products →
        </a>

    </div>



    <!-- =====================================
         FOOTER
         ===================================== -->

    <footer>

        PHP PRACTICAL

        <span>•</span>

        PRODUCT SORTING

        <span>•</span>

        ARRAY FUNCTIONS

    </footer>


</main>


</body>

</html>