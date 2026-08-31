<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}


/* ==========================================
   MULTIDIMENSIONAL ARRAY
   ========================================== */

$branches = $_POST["branches"];

$products = [
    "Laptop",
    "Mobile",
    "Tablet",
    "Headphones"
];


/* ==========================================
   BRANCH-WISE SALES TOTAL
   ========================================== */

$branchTotals = [];

foreach ($branches as $index => $branch) {

    $salesValues = array_map(
        "floatval",
        $branch["sales"]
    );

    $branchTotals[$index] =
        array_sum($salesValues);
}


/* ==========================================
   PRODUCT-WISE SALES TOTAL
   ========================================== */

$productTotals = [];

foreach ($products as $product) {

    $values = [];

    foreach ($branches as $branch) {

        $values[] =
            (float)$branch["sales"][$product];
    }

    $productTotals[$product] =
        array_sum($values);
}


/* ==========================================
   GRAND TOTAL
   ========================================== */

$grandTotal = array_sum($branchTotals);


/* ==========================================
   HIGHEST BRANCH
   ========================================== */

$highestBranchSales =
    max($branchTotals);

$highestBranchIndex =
    array_search(
        $highestBranchSales,
        $branchTotals
    );

$highestBranch =
    $branches[$highestBranchIndex]["name"];


/* ==========================================
   BEST PRODUCT
   ========================================== */

$highestProductSales =
    max($productTotals);

$highestProduct =
    array_search(
        $highestProductSales,
        $productTotals
    );


/* ==========================================
   AVERAGE SALES
   ========================================== */

$averageSales =
    $grandTotal / count($branches);


/* ==========================================
   FUNCTION FOR CURRENCY
   ========================================== */

function money($amount)
{
    return "₹" . number_format($amount, 2);
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Sales Analysis Report</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

<div class="page-container">


    <!-- HEADER -->

    <header class="main-header">

        <div class="brand-icon">
            ₹
        </div>

        <div>

            <h1>Sales Analysis Report</h1>

            <p>
                Consolidated branch-wise sales performance
            </p>

        </div>

    </header>


    <!-- TOTAL SALES -->

    <section class="total-card">

        <div class="total-content">

            <span class="total-label">
                TOTAL CONSOLIDATED SALES
            </span>

            <h2>
                <?= money($grandTotal) ?>
            </h2>

            <p>
                Combined sales from all three branches
            </p>

        </div>

        <div class="total-symbol">
            ₹
        </div>

    </section>


    <!-- BRANCH PERFORMANCE -->

    <section class="report-section">

        <div class="section-title">

            <div>
                <span>PERFORMANCE</span>

                <h2>Branch Comparison</h2>
            </div>

            <p>
                Sales contribution by branch
            </p>

        </div>


        <div class="result-branches">

            <?php foreach ($branches as $index => $branch): ?>

                <?php

                $percentage =
                    ($branchTotals[$index] / $grandTotal) * 100;

                ?>

                <div class="result-branch">

                    <div class="result-top">

                        <div class="result-number">
                            0<?= $index + 1 ?>
                        </div>

                        <div class="result-name">

                            <h3>
                                <?= htmlspecialchars($branch["name"]) ?>
                            </h3>

                            <span>
                                Branch <?= $index + 1 ?>
                            </span>

                        </div>

                    </div>


                    <div class="result-sales">

                        <span>Total Sales</span>

                        <strong>
                            <?= money($branchTotals[$index]) ?>
                        </strong>

                    </div>


                    <div class="progress-area">

                        <div class="progress-info">

                            <span>Contribution</span>

                            <span>
                                <?= number_format(
                                    $percentage,
                                    1
                                ) ?>%
                            </span>

                        </div>

                        <div class="progress-background">

                            <div
                                class="progress-bar"
                                style="width: <?= $percentage ?>%;">
                            </div>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- KEY RESULTS -->

    <section class="report-section">

        <div class="section-title">

            <div>
                <span>KEY RESULTS</span>

                <h2>Sales Highlights</h2>
            </div>

        </div>


        <div class="highlights">


            <!-- BEST BRANCH -->

            <div class="highlight">

                <div class="highlight-icon">
                    ★
                </div>

                <div>

                    <span>
                        TOP BRANCH
                    </span>

                    <h3>
                        <?= htmlspecialchars($highestBranch) ?>
                    </h3>

                    <p>
                        <?= money($highestBranchSales) ?>
                    </p>

                </div>

            </div>


            <!-- BEST PRODUCT -->

            <div class="highlight">

                <div class="highlight-icon">
                    ◆
                </div>

                <div>

                    <span>
                        BEST PRODUCT
                    </span>

                    <h3>
                        <?= htmlspecialchars($highestProduct) ?>
                    </h3>

                    <p>
                        <?= money($highestProductSales) ?>
                    </p>

                </div>

            </div>


            <!-- AVERAGE -->

            <div class="highlight">

                <div class="highlight-icon">
                    ↗
                </div>

                <div>

                    <span>
                        AVERAGE SALES
                    </span>

                    <h3>
                        Per Branch
                    </h3>

                    <p>
                        <?= money($averageSales) ?>
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- PRODUCT ANALYSIS -->

    <section class="report-section">

        <div class="section-title">

            <div>

                <span>PRODUCT ANALYSIS</span>

                <h2>Consolidated Product Sales</h2>

            </div>

            <p>
                Overall product contribution
            </p>

        </div>


        <div class="product-list">

            <?php foreach ($productTotals as $product => $total): ?>

                <?php

                $percentage =
                    ($total / $grandTotal) * 100;

                ?>

                <div class="product-item">

                    <div class="product-icon">
                        •
                    </div>

                    <div class="product-details">

                        <div class="product-heading">

                            <span>
                                <?= htmlspecialchars($product) ?>
                            </span>

                            <strong>
                                <?= money($total) ?>
                            </strong>

                        </div>

                        <div class="product-progress">

                            <div
                                class="product-bar"
                                style="width: <?= $percentage ?>%;">
                            </div>

                        </div>

                    </div>

                    <span class="product-percent">

                        <?= number_format(
                            $percentage,
                            1
                        ) ?>%

                    </span>

                </div>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- CONSOLIDATED MESSAGE -->

    <section class="summary-card">

        <div class="summary-icon">
            ✓
        </div>

        <div class="summary-text">

            <span>CONSOLIDATED REPORT</span>

            <h2>Sales analysis completed successfully</h2>

            <p>
                <strong>
                    <?= htmlspecialchars($highestBranch) ?>
                </strong>
                recorded the highest branch sales, while
                <strong>
                    <?= htmlspecialchars($highestProduct) ?>
                </strong>
                was the best-selling product.
            </p>

        </div>

        <div class="summary-total">

            <span>GRAND TOTAL</span>

            <strong>
                <?= money($grandTotal) ?>
            </strong>

        </div>

    </section>


    <!-- BACK -->

    <div class="back-area">

        <a href="index.php">
            ← Enter New Sales
        </a>

    </div>


    <footer>
        PHP Practical &nbsp;•&nbsp;
        Multidimensional Arrays & Array Functions
    </footer>

</div>


<style>

/* =========================================
   RESULT TOTAL
   ========================================= */

.total-card {
    display: flex;

    justify-content: space-between;

    align-items: center;

    background: #e2f1e8;

    border: 1px solid #cfe3d7;

    border-radius: 15px;

    padding: 28px 32px;

    margin-bottom: 22px;
}

.total-label {
    font-size: 10px;

    letter-spacing: 1.2px;

    color: #56806a;

    font-weight: bold;
}

.total-content h2 {
    font-size: 34px;

    color: #28794f;

    margin: 7px 0;
}

.total-content p {
    font-size: 11px;

    color: #789087;
}

.total-symbol {
    width: 55px;

    height: 55px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #ffffff;

    border-radius: 12px;

    color: #358d60;

    font-size: 23px;

    font-weight: bold;
}


/* =========================================
   REPORT SECTION
   ========================================= */

.report-section {
    background: #ffffff;

    border: 1px solid #dce8e1;

    border-radius: 15px;

    padding: 26px;

    margin-bottom: 20px;

    box-shadow:
        0 7px 23px rgba(38, 80, 58, 0.045);
}

.section-title {
    display: flex;

    align-items: flex-end;

    justify-content: space-between;

    margin-bottom: 20px;
}

.section-title span {
    font-size: 9px;

    letter-spacing: 1.2px;

    font-weight: bold;

    color: #398a60;
}

.section-title h2 {
    font-size: 18px;

    color: #294b3b;

    margin-top: 5px;
}

.section-title > p {
    font-size: 10px;

    color: #9aa69f;
}


/* =========================================
   BRANCH RESULTS
   ========================================= */

.result-branches {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 14px;
}

.result-branch {
    padding: 19px;

    border: 1px solid #e0e9e3;

    border-radius: 11px;

    background: #fbfdfc;
}

.result-top {
    display: flex;

    align-items: center;

    gap: 11px;

    margin-bottom: 19px;
}

.result-number {
    width: 34px;

    height: 34px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #e2f1e8;

    border-radius: 8px;

    color: #358b5e;

    font-size: 10px;

    font-weight: bold;
}

.result-name h3 {
    font-size: 13px;

    color: #304c3e;

    margin-bottom: 3px;
}

.result-name span {
    font-size: 9px;

    color: #9aa69f;
}

.result-sales {
    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 17px;
}

.result-sales span {
    font-size: 10px;

    color: #8b9992;
}

.result-sales strong {
    font-size: 15px;

    color: #358b5e;
}


/* =========================================
   PROGRESS
   ========================================= */

.progress-info {
    display: flex;

    justify-content: space-between;

    margin-bottom: 7px;

    font-size: 9px;

    color: #899790;
}

.progress-background {
    width: 100%;

    height: 6px;

    background: #eaf0ec;

    border-radius: 10px;

    overflow: hidden;
}

.progress-bar {
    height: 100%;

    background: #59a276;

    border-radius: 10px;
}


/* =========================================
   HIGHLIGHTS
   ========================================= */

.highlights {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 14px;
}

.highlight {
    display: flex;

    align-items: center;

    gap: 13px;

    padding: 17px;

    background: #fbfdfc;

    border: 1px solid #e0e9e3;

    border-radius: 11px;
}

.highlight-icon {
    width: 40px;

    height: 40px;

    min-width: 40px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #e2f1e8;

    color: #358b5e;

    border-radius: 9px;

    font-size: 16px;
}

.highlight span {
    font-size: 8px;

    letter-spacing: .8px;

    color: #9aa69f;

    font-weight: bold;
}

.highlight h3 {
    font-size: 13px;

    color: #304c3e;

    margin: 4px 0;
}

.highlight p {
    font-size: 10px;

    color: #358b5e;
}


/* =========================================
   PRODUCT LIST
   ========================================= */

.product-list {
    display: flex;

    flex-direction: column;

    gap: 15px;
}

.product-item {
    display: flex;

    align-items: center;

    gap: 12px;
}

.product-icon {
    width: 30px;

    height: 30px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #e2f1e8;

    color: #358b5e;

    border-radius: 7px;

    font-weight: bold;
}

.product-details {
    flex: 1;
}

.product-heading {
    display: flex;

    justify-content: space-between;

    margin-bottom: 7px;
}

.product-heading span {
    font-size: 11px;

    color: #40564a;
}

.product-heading strong {
    font-size: 11px;

    color: #358b5e;
}

.product-progress {
    width: 100%;

    height: 5px;

    background: #edf2ef;

    border-radius: 10px;

    overflow: hidden;
}

.product-bar {
    height: 100%;

    background: #65a780;

    border-radius: 10px;
}

.product-percent {
    width: 40px;

    font-size: 9px;

    text-align: right;

    color: #8d9993;
}


/* =========================================
   SUMMARY
   ========================================= */

.summary-card {
    display: flex;

    align-items: center;

    gap: 15px;

    background: #2f7952;

    color: white;

    border-radius: 15px;

    padding: 23px 25px;

    margin-bottom: 22px;
}

.summary-icon {
    width: 43px;

    height: 43px;

    min-width: 43px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: rgba(255,255,255,0.15);

    border-radius: 10px;

    font-size: 18px;
}

.summary-text {
    flex: 1;
}

.summary-text > span {
    font-size: 8px;

    letter-spacing: 1px;

    color: #c8e2d2;

    font-weight: bold;
}

.summary-text h2 {
    font-size: 15px;

    margin: 5px 0;
}

.summary-text p {
    font-size: 10px;

    line-height: 1.6;

    color: #dcebe2;
}

.summary-total {
    text-align: right;
}

.summary-total span {
    display: block;

    font-size: 8px;

    color: #c8e2d2;

    margin-bottom: 5px;
}

.summary-total strong {
    font-size: 19px;
}


/* =========================================
   BACK
   ========================================= */

.back-area {
    text-align: center;

    margin: 25px 0;
}

.back-area a {
    display: inline-block;

    padding: 11px 20px;

    background: #358d60;

    color: white;

    text-decoration: none;

    border-radius: 7px;

    font-size: 11px;

    font-weight: bold;
}

.back-area a:hover {
    background: #28784f;
}


/* =========================================
   RESULT RESPONSIVE
   ========================================= */

@media (max-width: 850px) {

    .result-branches,
    .highlights {
        grid-template-columns: 1fr;
    }

    .summary-card {
        align-items: flex-start;
    }

    .summary-total {
        margin-left: auto;
    }
}


@media (max-width: 600px) {

    .total-card {
        padding: 22px;
    }

    .total-content h2 {
        font-size: 27px;
    }

    .total-symbol {
        display: none;
    }

    .report-section {
        padding: 20px;
    }

    .section-title {
        display: block;
    }

    .section-title > p {
        margin-top: 6px;
    }

    .summary-card {
        flex-direction: column;
    }

    .summary-total {
        margin-left: 0;

        text-align: left;
    }
}

</style>

</body>

</html>