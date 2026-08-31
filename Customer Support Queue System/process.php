<?php

/* =========================================
   GET REQUESTS
   ========================================= */

$requests = $_POST["requests"] ?? [];


/* =========================================
   CREATE QUEUE
   ========================================= */

$queue = [];


/* =========================================
   ADD REQUESTS TO QUEUE
   USING array_push()
   ========================================= */

foreach ($requests as $request) {

    $name = trim($request["name"] ?? "");

    $issue = trim($request["issue"] ?? "");

    if ($name !== "" && $issue !== "") {

        array_push(
            $queue,
            [
                "name" => $name,
                "issue" => $issue
            ]
        );

    }
}


/* =========================================
   STORE ORIGINAL QUEUE
   ========================================= */

$waitingQueue = $queue;


/* =========================================
   PROCESS QUEUE USING FIFO
   USING array_shift()
   ========================================= */

$processedRequests = [];

while (!empty($queue)) {

    $currentRequest = array_shift($queue);

    $processedRequests[] = $currentRequest;
}


/* =========================================
   QUEUE STATISTICS
   ========================================= */

$totalRequests = count($processedRequests);

$processedCount = count($processedRequests);

$remainingCount = count($queue);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Support Queue Report</title>

</head>


<body>


<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {

    font-family: Arial, Helvetica, sans-serif;

    background: #f4f7f8;

    color: #35434a;
}


.page {

    width: 100%;

    padding: 30px 6% 22px;
}


/* HEADER */

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


.brand-icon {

    width: 53px;
    height: 53px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 15px;

    background: #d9eeee;

    color: #438b8b;

    font-size: 22px;
}


.label {

    display: block;

    font-size: 8px;

    letter-spacing: 1.8px;

    font-weight: bold;

    color: #4c8585;

    margin-bottom: 5px;
}


.header h1 {

    font-size: 24px;

    color: #35434a;
}


.badge {

    background: #e3f1ed;

    color: #4e8875;

    padding: 9px 13px;

    border-radius: 8px;

    font-size: 8px;

    font-weight: bold;

    letter-spacing: .8px;
}


/* HERO */

.hero {

    background: #dceeed;

    border-radius: 18px;

    min-height: 155px;

    padding: 27px 32px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 20px;

    position: relative;

    overflow: hidden;
}


.hero::after {

    content: "";

    position: absolute;

    width: 220px;
    height: 220px;

    border-radius: 50%;

    right: -60px;
    top: -100px;

    background: rgba(255,255,255,.32);
}


.hero-text {

    position: relative;

    z-index: 2;
}


.hero-text span {

    font-size: 8px;

    letter-spacing: 2px;

    font-weight: bold;

    color: #438080;
}


.hero-text h2 {

    font-size: 25px;

    margin-top: 7px;

    margin-bottom: 7px;

    color: #34464b;
}


.hero-text p {

    font-size: 9px;

    color: #6d7f83;
}


.hero-icon {

    position: relative;

    z-index: 2;

    width: 70px;
    height: 70px;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #ffffff;

    color: #4c8d8d;

    font-size: 27px;
}


/* STATISTICS */

.stats {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 13px;

    margin-bottom: 23px;
}


.stat {

    min-height: 88px;

    padding: 16px;

    border-radius: 12px;

    position: relative;

    overflow: hidden;
}


.stat:nth-child(1) {

    background: #e5f1f4;
}


.stat:nth-child(2) {

    background: #e7f3eb;
}


.stat:nth-child(3) {

    background: #f6eee4;
}


.stat span {

    display: block;

    font-size: 7px;

    letter-spacing: 1px;

    font-weight: bold;

    color: #788488;

    margin-bottom: 7px;
}


.stat strong {

    font-size: 26px;

    color: #3c4b50;
}


.stat-icon {

    position: absolute;

    right: 15px;

    bottom: 8px;

    font-size: 25px;

    opacity: .42;
}


/* SECTION */

.section-title {

    margin-bottom: 13px;
}


.section-title span {

    display: block;

    font-size: 7px;

    letter-spacing: 1.6px;

    font-weight: bold;

    color: #4c8585;

    margin-bottom: 5px;
}


.section-title h2 {

    font-size: 19px;

    color: #38474c;
}


/* PROCESSED REQUEST */

.request-card {

    background: #ffffff;

    border: 1px solid #e1e8e9;

    border-radius: 12px;

    padding: 17px;

    margin-bottom: 12px;

    display: flex;

    align-items: center;

    gap: 14px;

    box-shadow:
        0 5px 15px rgba(50,70,75,.035);
}


.request-number {

    width: 43px;
    height: 43px;

    min-width: 43px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: #e5f1f1;

    color: #4c8989;

    font-size: 10px;

    font-weight: bold;
}


.request-info {

    flex: 1;
}


.request-info small {

    display: block;

    font-size: 7px;

    letter-spacing: .8px;

    font-weight: bold;

    color: #9aa3a6;

    margin-bottom: 4px;
}


.request-info h3 {

    font-size: 12px;

    color: #414f53;

    margin-bottom: 4px;
}


.request-info p {

    font-size: 8px;

    color: #7e898c;
}


.processed {

    padding: 7px 10px;

    border-radius: 6px;

    background: #e5f3e9;

    color: #54896a;

    font-size: 7px;

    font-weight: bold;
}


/* FIFO FLOW */

.flow {

    margin-top: 20px;

    padding: 16px;

    background: #edf6f6;

    border: 1px solid #dceaea;

    border-radius: 11px;

    text-align: center;
}


.flow-title {

    font-size: 7px;

    letter-spacing: 1.5px;

    font-weight: bold;

    color: #4c8585;

    margin-bottom: 10px;
}


.flow-items {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    flex-wrap: wrap;
}


.flow-item {

    padding: 8px 12px;

    border-radius: 7px;

    background: #ffffff;

    color: #52666a;

    font-size: 8px;

    font-weight: bold;
}


.arrow {

    color: #6b9999;

    font-weight: bold;
}


/* BUTTON */

.action {

    text-align: center;

    margin-top: 20px;
}


.back-button {

    display: inline-block;

    text-decoration: none;

    background: #4f8d8d;

    color: #ffffff;

    padding: 11px 21px;

    border-radius: 8px;

    font-size: 9px;

    font-weight: bold;
}


.back-button:hover {

    background: #3f7777;
}


/* FOOTER */

footer {

    text-align: center;

    margin-top: 20px;

    padding-top: 12px;

    border-top: 1px solid #dfe7e8;

    font-size: 8px;

    color: #9ba4a6;
}


/* RESPONSIVE */

@media (max-width: 650px) {

    .page {

        padding: 23px 5% 20px;
    }


    .badge {

        display: none;
    }


    .stats {

        grid-template-columns: 1fr;
    }


    .hero-icon {

        display: none;
    }


    .request-card {

        align-items: flex-start;

        flex-direction: column;
    }


    .processed {

        align-self: flex-start;
    }

}

</style>


<div class="page">


    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="brand-icon">
                🎧
            </div>

            <div>

                <span class="label">
                    CUSTOMER SERVICE
                </span>

                <h1>
                    Queue Report
                </h1>

            </div>

        </div>


        <div class="badge">
            FIFO PROCESSED
        </div>

    </header>



    <!-- HERO -->

    <section class="hero">

        <div class="hero-text">

            <span>
                SUPPORT DESK ANALYSIS
            </span>

            <h2>
                Customer Support Queue
            </h2>

            <p>
                Requests were processed according to the
                First-In-First-Out principle.
            </p>

        </div>


        <div class="hero-icon">
            ✓
        </div>

    </section>



    <!-- STATISTICS -->

    <section class="stats">


        <div class="stat">

            <span>
                TOTAL REQUESTS
            </span>

            <strong>
                <?= $totalRequests ?>
            </strong>

            <div class="stat-icon">
                📥
            </div>

        </div>


        <div class="stat">

            <span>
                PROCESSED REQUESTS
            </span>

            <strong>
                <?= $processedCount ?>
            </strong>

            <div class="stat-icon">
                ✓
            </div>

        </div>


        <div class="stat">

            <span>
                REMAINING QUEUE
            </span>

            <strong>
                <?= $remainingCount ?>
            </strong>

            <div class="stat-icon">
                ⏳
            </div>

        </div>


    </section>



    <!-- PROCESSED REQUESTS -->

    <div class="section-title">

        <span>
            FIFO PROCESSING ORDER
        </span>

        <h2>
            Processed Customer Requests
        </h2>

    </div>



    <?php foreach ($processedRequests as $index => $request): ?>


        <div class="request-card">


            <div class="request-number">

                #<?= $index + 1 ?>

            </div>


            <div class="request-info">

                <small>
                    REQUEST <?= $index + 1 ?>
                </small>

                <h3>
                    <?= htmlspecialchars($request["name"]) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($request["issue"]) ?>
                </p>

            </div>


            <div class="processed">
                ✓ PROCESSED
            </div>


        </div>


    <?php endforeach; ?>



    <!-- FIFO FLOW -->

    <div class="flow">

        <div class="flow-title">
            FIFO PROCESSING FLOW
        </div>


        <div class="flow-items">

            <?php foreach ($processedRequests as $index => $request): ?>

                <div class="flow-item">

                    <?= htmlspecialchars($request["name"]) ?>

                </div>


                <?php if ($index < count($processedRequests) - 1): ?>

                    <div class="arrow">
                        →
                    </div>

                <?php endif; ?>


            <?php endforeach; ?>

        </div>

    </div>



    <!-- BUTTON -->

    <div class="action">

        <a href="index.php"
           class="back-button">

            ← Add New Requests

        </a>

    </div>



    <!-- FOOTER -->

    <footer>

        PHP Practical • Customer Support Queue System • FIFO

    </footer>


</div>


</body>

</html>