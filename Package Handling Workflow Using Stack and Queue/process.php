<?php

/* =========================================
   GET PACKAGE DATA
   ========================================= */

$packages = $_POST["packages"] ?? [];


/* =========================================
   CLEAN PACKAGE NAMES
   ========================================= */

$cleanPackages = [];

foreach ($packages as $package) {

    $package = trim($package);

    if ($package !== "") {

        $cleanPackages[] = $package;

    }

}


/* =========================================
   STACK OPERATION
   ========================================= */

/*
 * Stack follows LIFO:
 * Last In - First Out
 */

$stack = [];


/*
 * Add packages using array_push()
 */

foreach ($cleanPackages as $package) {

    array_push($stack, $package);

}


/*
 * Process stack using array_pop()
 */

$stackProcessed = [];

while (!empty($stack)) {

    $package = array_pop($stack);

    $stackProcessed[] = $package;

}


/* =========================================
   QUEUE OPERATION
   ========================================= */

/*
 * Queue follows FIFO:
 * First In - First Out
 */

$queue = [];


/*
 * Add packages using array_push()
 */

foreach ($cleanPackages as $package) {

    array_push($queue, $package);

}


/*
 * Process queue using array_shift()
 */

$queueProcessed = [];

while (!empty($queue)) {

    $package = array_shift($queue);

    $queueProcessed[] = $package;

}


/* =========================================
   STATISTICS
   ========================================= */

$totalPackages = count($cleanPackages);

$stackCount = count($stackProcessed);

$queueCount = count($queueProcessed);


/* =========================================
   FIRST AND LAST PACKAGE
   ========================================= */

$firstPackage = $totalPackages > 0
    ? $cleanPackages[0]
    : "None";

$lastPackage = $totalPackages > 0
    ? $cleanPackages[$totalPackages - 1]
    : "None";

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Package Processing Report</title>


<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {

    font-family: Arial, Helvetica, sans-serif;

    background: #f5f7fb;

    color: #38424c;
}


.page {

    width: 100%;

    padding: 30px 6% 25px;
}


/* =========================================
   HEADER
   ========================================= */

.header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 23px;
}


.brand {

    display: flex;

    align-items: center;

    gap: 13px;
}


.logo {

    width: 52px;
    height: 52px;

    border-radius: 14px;

    background: #e4ecfb;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 22px;
}


.label {

    display: block;

    font-size: 8px;

    letter-spacing: 1.7px;

    color: #6683b1;

    font-weight: bold;

    margin-bottom: 5px;
}


.header h1 {

    font-size: 24px;

    color: #3d474f;
}


.badge {

    padding: 9px 13px;

    background: #ffffff;

    border: 1px solid #dfe5ec;

    border-radius: 8px;

    color: #6983a9;

    font-size: 8px;

    font-weight: bold;
}


/* =========================================
   HERO
   ========================================= */

.hero {

    min-height: 145px;

    padding: 27px 32px;

    background: #e7edf8;

    border-radius: 18px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    position: relative;

    overflow: hidden;

    margin-bottom: 20px;
}


.hero::after {

    content: "";

    position: absolute;

    width: 230px;
    height: 230px;

    border-radius: 50%;

    right: -70px;

    top: -110px;

    background: rgba(255,255,255,.4);
}


.hero-text {

    position: relative;

    z-index: 2;
}


.hero-text span {

    font-size: 8px;

    letter-spacing: 2px;

    color: #6683b1;

    font-weight: bold;
}


.hero-text h2 {

    font-size: 27px;

    color: #3d4955;

    margin-top: 7px;

    margin-bottom: 7px;
}


.hero-text p {

    font-size: 9px;

    color: #747f89;
}


.hero-icon {

    position: relative;

    z-index: 2;

    width: 70px;
    height: 70px;

    border-radius: 50%;

    background: #ffffff;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 27px;
}


/* =========================================
   STATS
   ========================================= */

.stats {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 13px;

    margin-bottom: 22px;
}


.stat {

    min-height: 105px;

    padding: 17px;

    border-radius: 11px;
}


.stat-one {

    background: #eaf1fb;

    border-top: 4px solid #7295c5;
}


.stat-two {

    background: #eee9f5;

    border-top: 4px solid #9880ae;
}


.stat-three {

    background: #e8f3ed;

    border-top: 4px solid #72a084;
}


.stat span {

    display: block;

    font-size: 7px;

    letter-spacing: 1px;

    color: #7d8790;

    font-weight: bold;

    margin-bottom: 8px;
}


.stat strong {

    font-size: 25px;

    color: #3f4b55;
}


.stat small {

    display: block;

    margin-top: 5px;

    font-size: 7px;

    color: #929aa2;
}


/* =========================================
   SECTION TITLE
   ========================================= */

.section-title {

    margin-bottom: 13px;
}


.section-title span {

    display: block;

    font-size: 7px;

    letter-spacing: 1.6px;

    color: #6683b1;

    font-weight: bold;

    margin-bottom: 5px;
}


.section-title h2 {

    font-size: 19px;

    color: #3d4953;
}


/* =========================================
   WORKFLOW CONTAINER
   ========================================= */

.workflow {

    display: grid;

    grid-template-columns:
        1fr 1fr;

    gap: 15px;

    margin-bottom: 22px;
}


.operation {

    background: #ffffff;

    border: 1px solid #e0e6ec;

    border-radius: 13px;

    padding: 18px;

    box-shadow:
        0 5px 15px rgba(60,80,110,.035);
}


/* =========================================
   OPERATION HEADER
   ========================================= */

.operation-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 15px;
}


.operation-title {

    display: flex;

    align-items: center;

    gap: 10px;
}


.operation-icon {

    width: 40px;
    height: 40px;

    border-radius: 9px;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 17px;

    font-weight: bold;
}


.stack-operation
.operation-icon {

    background: #e6eef9;

    color: #6687b7;
}


.queue-operation
.operation-icon {

    background: #e5f1ea;

    color: #659078;
}


.operation-title h3 {

    font-size: 12px;

    color: #46515a;
}


.operation-title p {

    font-size: 7px;

    color: #969ea5;

    margin-top: 3px;
}


.operation-badge {

    padding: 6px 8px;

    border-radius: 6px;

    font-size: 7px;

    font-weight: bold;
}


.lifo {

    background: #e7eef9;

    color: #6685b3;
}


.fifo {

    background: #e6f1eb;

    color: #638b75;
}


/* =========================================
   PACKAGE FLOW
   ========================================= */

.package-flow {

    display: flex;

    flex-direction: column;

    gap: 8px;
}


.flow-card {

    display: flex;

    align-items: center;

    gap: 10px;

    padding: 10px;

    border-radius: 8px;

    background: #f7f9fb;

    border: 1px solid #e8ecf0;
}


.flow-number {

    width: 27px;
    height: 27px;

    border-radius: 7px;

    background: #ffffff;

    display: flex;

    align-items: center;
    justify-content: center;

    font-size: 7px;

    font-weight: bold;

    color: #71808c;
}


.flow-name {

    flex: 1;

    font-size: 9px;

    color: #4d5963;

    font-weight: bold;
}


.flow-status {

    font-size: 7px;

    color: #84909a;
}


.stack-operation .flow-card:first-child {

    border-left: 3px solid #7295c5;
}


.queue-operation .flow-card:first-child {

    border-left: 3px solid #72a084;
}


/* =========================================
   COMPARISON
   ========================================= */

.comparison {

    background: #ffffff;

    border: 1px solid #e0e6ec;

    border-radius: 13px;

    padding: 20px;

    margin-bottom: 20px;
}


.comparison-title {

    text-align: center;

    margin-bottom: 15px;
}


.comparison-title span {

    display: block;

    font-size: 7px;

    letter-spacing: 1.5px;

    color: #6683b1;

    font-weight: bold;

    margin-bottom: 5px;
}


.comparison-title h2 {

    font-size: 18px;

    color: #414c56;
}


.comparison-flow {

    display: grid;

    grid-template-columns:
        1fr 70px 1fr;

    align-items: center;

    gap: 15px;
}


.compare-box {

    padding: 16px;

    border-radius: 10px;

    text-align: center;
}


.compare-stack {

    background: #edf3fc;

    border: 1px solid #dce7f5;
}


.compare-queue {

    background: #eaf4ee;

    border: 1px solid #dbeae1;
}


.compare-box strong {

    display: block;

    font-size: 10px;

    color: #4b5660;

    margin-bottom: 6px;
}


.compare-box p {

    font-size: 8px;

    color: #818b94;

    line-height: 1.5;
}


.compare-symbol {

    width: 48px;
    height: 48px;

    border-radius: 50%;

    background: #f3f5f8;

    border: 1px solid #e1e5ea;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: auto;

    font-size: 12px;

    font-weight: bold;

    color: #7b8791;
}


/* =========================================
   BUTTON
   ========================================= */

.action {

    text-align: center;

    margin-top: 20px;
}


.back-button {

    display: inline-block;

    text-decoration: none;

    background: #718db7;

    color: #ffffff;

    padding: 12px 22px;

    border-radius: 8px;

    font-size: 9px;

    font-weight: bold;

    transition: .2s ease;
}


.back-button:hover {

    background: #607ba4;

    transform: translateY(-2px);
}


/* =========================================
   FOOTER
   ========================================= */

footer {

    text-align: center;

    margin-top: 20px;

    padding-top: 12px;

    border-top: 1px solid #dfe4ea;

    font-size: 8px;

    color: #9ba3aa;
}


/* =========================================
   RESPONSIVE
   ========================================= */

@media (max-width: 800px) {

    .stats {

        grid-template-columns:
            1fr 1fr;
    }

    .workflow {

        grid-template-columns: 1fr;
    }

    .comparison-flow {

        grid-template-columns: 1fr;
    }

    .compare-symbol {

        transform: rotate(90deg);
    }

}


@media (max-width: 550px) {

    .page {

        padding: 22px 5%;
    }

    .badge {

        display: none;
    }

    .hero-icon {

        display: none;
    }

    .stats {

        grid-template-columns: 1fr;
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
                📦
            </div>

            <div>

                <span class="label">
                    LOGISTICS MANAGEMENT
                </span>

                <h1>
                    Package Processing Report
                </h1>

            </div>

        </div>


        <div class="badge">
            PROCESSING COMPLETE
        </div>

    </header>



    <!-- HERO -->

    <section class="hero">

        <div class="hero-text">

            <span>
                WORKFLOW ANALYSIS
            </span>

            <h2>
                Package Handling Results
            </h2>

            <p>
                The submitted packages have been processed using
                both stack and queue data structures.
            </p>

        </div>


        <div class="hero-icon">
            📦
        </div>

    </section>



    <!-- STATISTICS -->

    <section class="stats">


        <div class="stat stat-one">

            <span>
                TOTAL PACKAGES
            </span>

            <strong>
                <?= $totalPackages ?>
            </strong>

            <small>
                Packages received
            </small>

        </div>



        <div class="stat stat-two">

            <span>
                STACK OPERATIONS
            </span>

            <strong>
                <?= $stackCount ?>
            </strong>

            <small>
                LIFO packages processed
            </small>

        </div>



        <div class="stat stat-three">

            <span>
                QUEUE OPERATIONS
            </span>

            <strong>
                <?= $queueCount ?>
            </strong>

            <small>
                FIFO packages processed
            </small>

        </div>


    </section>



    <!-- STACK & QUEUE -->

    <div class="section-title">

        <span>
            PROCESSING WORKFLOW
        </span>

        <h2>
            Stack and Queue Operations
        </h2>

    </div>



    <section class="workflow">


        <!-- STACK -->

        <div class="operation stack-operation">


            <div class="operation-header">

                <div class="operation-title">

                    <div class="operation-icon">
                        ⬆
                    </div>

                    <div>

                        <h3>
                            Stack Processing
                        </h3>

                        <p>
                            Last In • First Out
                        </p>

                    </div>

                </div>


                <div class="operation-badge lifo">
                    LIFO
                </div>

            </div>



            <div class="package-flow">


                <?php foreach (
                    $stackProcessed
                    as $index => $package
                ): ?>


                    <div class="flow-card">

                        <div class="flow-number">

                            <?= $index + 1 ?>

                        </div>


                        <div class="flow-name">

                            <?= htmlspecialchars($package) ?>

                        </div>


                        <div class="flow-status">

                            ✓ Processed

                        </div>

                    </div>


                <?php endforeach; ?>


            </div>


        </div>



        <!-- QUEUE -->

        <div class="operation queue-operation">


            <div class="operation-header">

                <div class="operation-title">

                    <div class="operation-icon">
                        →
                    </div>

                    <div>

                        <h3>
                            Queue Processing
                        </h3>

                        <p>
                            First In • First Out
                        </p>

                    </div>

                </div>


                <div class="operation-badge fifo">
                    FIFO
                </div>

            </div>



            <div class="package-flow">


                <?php foreach (
                    $queueProcessed
                    as $index => $package
                ): ?>


                    <div class="flow-card">

                        <div class="flow-number">

                            <?= $index + 1 ?>

                        </div>


                        <div class="flow-name">

                            <?= htmlspecialchars($package) ?>

                        </div>


                        <div class="flow-status">

                            ✓ Processed

                        </div>

                    </div>


                <?php endforeach; ?>


            </div>


        </div>


    </section>



    <!-- COMPARISON -->

    <section class="comparison">


        <div class="comparison-title">

            <span>
                DATA STRUCTURE COMPARISON
            </span>

            <h2>
                Processing Order
            </h2>

        </div>



        <div class="comparison-flow">


            <div class="compare-box compare-stack">

                <strong>
                    STACK — LIFO
                </strong>

                <p>
                    Last package added:
                    <b>
                        <?= htmlspecialchars($lastPackage) ?>
                    </b>

                    is processed first.
                </p>

            </div>


            <div class="compare-symbol">
                VS
            </div>


            <div class="compare-box compare-queue">

                <strong>
                    QUEUE — FIFO
                </strong>

                <p>
                    First package added:
                    <b>
                        <?= htmlspecialchars($firstPackage) ?>
                    </b>

                    is processed first.
                </p>

            </div>


        </div>


    </section>



    <!-- BUTTON -->

    <div class="action">

        <a href="index.php"
           class="back-button">

            ← Process New Packages

        </a>

    </div>



    <!-- FOOTER -->

    <footer>

        PHP Practical • Package Handling Workflow • Stack & Queue

    </footer>


</div>


</body>

</html>