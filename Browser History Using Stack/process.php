<?php

/* =========================================
   GET VISITED PAGES
   ========================================= */

$pages = $_POST["pages"] ?? [];


/* =========================================
   CLEAN INPUT
   ========================================= */

$visitedPages = [];

foreach ($pages as $page) {

    $page = trim($page);

    if ($page !== "") {

        $visitedPages[] = $page;

    }

}


/* =========================================
   CREATE STACK
   ========================================= */

$historyStack = [];


/* =========================================
   PUSH PAGES INTO STACK
   ========================================= */

foreach ($visitedPages as $page) {

    array_push($historyStack, $page);

}


/* =========================================
   STORE ORIGINAL STACK
   ========================================= */

$stackContents = $historyStack;


/* =========================================
   POP PAGES
   ========================================= */

$recentPages = [];

while (!empty($historyStack)) {

    $recentPage = array_pop($historyStack);

    $recentPages[] = $recentPage;

}


/* =========================================
   CALCULATE INFORMATION
   ========================================= */

$totalPages = count($visitedPages);

$processedPages = count($recentPages);

$latestPage = $totalPages > 0
    ? $visitedPages[$totalPages - 1]
    : "No page";


$firstPage = $totalPages > 0
    ? $visitedPages[0]
    : "No page";

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Browser History Report</title>


    <style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    body {

        font-family: Arial, Helvetica, sans-serif;

        background: #eef1f6;

        color: #3f4650;

        min-height: 100vh;
    }


    .browser-page {

        min-height: 100vh;
    }


    /* =================================
       TOP BAR
       ================================= */

    .browser-bar {

        height: 48px;

        background: #ffffff;

        border-bottom: 1px solid #dfe3e9;

        display: flex;

        align-items: flex-end;

        padding-left: 18px;
    }


    .window-controls {

        display: flex;

        gap: 7px;

        margin-bottom: 16px;

        margin-right: 25px;
    }


    .window-controls span {

        width: 9px;
        height: 9px;

        border-radius: 50%;
    }


    .close {
        background: #e99a9a;
    }


    .minimize {
        background: #e8c27f;
    }


    .maximize {
        background: #91c49d;
    }


    .browser-tab {

        height: 36px;

        width: 210px;

        background: #f1f3f7;

        border-radius: 10px 10px 0 0;

        display: flex;

        align-items: center;

        gap: 9px;

        padding: 0 13px;

        font-size: 9px;

        color: #626a74;
    }


    .tab-close {

        margin-left: auto;

        font-size: 14px;

        color: #8b939c;
    }


    /* =================================
       NAVIGATION
       ================================= */

    .navigation {

        height: 58px;

        background: #ffffff;

        display: flex;

        align-items: center;

        gap: 18px;

        padding: 0 25px;

        border-bottom: 1px solid #e1e5ea;
    }


    .nav-buttons {

        display: flex;

        gap: 16px;

        color: #7c858e;

        font-size: 16px;
    }


    .address-bar {

        height: 34px;

        flex: 1;

        background: #f1f3f6;

        border: 1px solid #e0e4e9;

        border-radius: 18px;

        display: flex;

        align-items: center;

        padding: 0 15px;

        gap: 8px;

        font-size: 9px;

        color: #737c86;
    }


    /* =================================
       MAIN
       ================================= */

    main {

        width: 88%;

        max-width: 1100px;

        margin: 30px auto;
    }


    .heading {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 20px;
    }


    .small-title {

        display: block;

        font-size: 8px;

        letter-spacing: 1.7px;

        color: #7b6fa6;

        font-weight: bold;

        margin-bottom: 6px;
    }


    h1 {

        font-size: 28px;

        color: #39414b;

        margin-bottom: 6px;
    }


    .heading p {

        font-size: 9px;

        color: #929aa2;
    }


    .stack-badge {

        background: #eeeafa;

        border: 1px solid #ddd7ee;

        border-radius: 16px;

        padding: 13px 18px;

        text-align: center;
    }


    .stack-badge strong {

        display: block;

        color: #71639d;

        font-size: 12px;
    }


    .stack-badge span {

        font-size: 7px;

        color: #9990b8;
    }


    /* =================================
       STAT CARDS
       ================================= */

    .stats {

        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 13px;

        margin-bottom: 22px;
    }


    .stat {

        padding: 18px;

        border-radius: 12px;

        min-height: 105px;
    }


    .stat-one {

        background: #eeeafa;

        border-top: 4px solid #9582b9;
    }


    .stat-two {

        background: #eaf1fa;

        border-top: 4px solid #7898c0;
    }


    .stat-three {

        background: #eaf4ed;

        border-top: 4px solid #78a184;
    }


    .stat span {

        display: block;

        font-size: 7px;

        letter-spacing: 1px;

        color: #7f8790;

        font-weight: bold;

        margin-bottom: 8px;
    }


    .stat strong {

        font-size: 25px;

        color: #404a54;
    }


    .stat small {

        display: block;

        margin-top: 5px;

        font-size: 7px;

        color: #929aa2;
    }


    /* =================================
       HISTORY SECTION
       ================================= */

    .history-section {

        background: #ffffff;

        border: 1px solid #dfe4ea;

        border-radius: 14px;

        padding: 22px;

        box-shadow:
            0 7px 20px rgba(70,80,100,.04);
    }


    .section-title {

        margin-bottom: 17px;
    }


    .section-title span {

        display: block;

        font-size: 7px;

        letter-spacing: 1.5px;

        color: #7b6fa6;

        font-weight: bold;

        margin-bottom: 5px;
    }


    .section-title h2 {

        font-size: 18px;

        color: #414a54;
    }


    /* =================================
       HISTORY CARDS
       ================================= */

    .history-list {

        display: flex;

        flex-direction: column;

        gap: 9px;
    }


    .history-card {

        display: flex;

        align-items: center;

        gap: 13px;

        min-height: 62px;

        padding: 9px 13px;

        background: #f8f9fb;

        border: 1px solid #e3e7ec;

        border-radius: 10px;

        transition: .2s ease;
    }


    .history-card:hover {

        transform: translateX(3px);

        background: #ffffff;

        box-shadow:
            0 5px 15px rgba(70,80,100,.05);
    }


    .history-card:first-child {

        background: #f0ecf8;

        border-color: #ddd5eb;

        border-left: 4px solid #8773ad;
    }


    .history-number {

        width: 35px;
        height: 35px;

        border-radius: 9px;

        background: #ffffff;

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 8px;

        font-weight: bold;

        color: #75689b;
    }


    .page-icon {

        width: 35px;
        height: 35px;

        border-radius: 9px;

        background: #e7edf7;

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 14px;
    }


    .page-details {

        flex: 1;
    }


    .page-details strong {

        display: block;

        font-size: 9px;

        color: #4a545e;

        margin-bottom: 4px;

        word-break: break-all;
    }


    .page-details span {

        font-size: 7px;

        color: #929aa2;
    }


    .recent-label {

        padding: 6px 8px;

        background: #e7def3;

        color: #76639d;

        border-radius: 6px;

        font-size: 7px;

        font-weight: bold;
    }


    /* =================================
       LIFO EXPLANATION
       ================================= */

    .explanation {

        margin-top: 18px;

        padding: 17px;

        border-radius: 11px;

        background: #f4f1f8;

        border: 1px solid #e5deed;

        display: flex;

        align-items: center;

        gap: 13px;
    }


    .explanation-icon {

        width: 42px;
        height: 42px;

        border-radius: 10px;

        background: #e6dff1;

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 18px;

        color: #76669e;
    }


    .explanation strong {

        display: block;

        font-size: 9px;

        color: #514761;

        margin-bottom: 5px;
    }


    .explanation p {

        font-size: 7px;

        color: #88818f;

        line-height: 1.5;
    }


    /* =================================
       BUTTON
       ================================= */

    .action {

        text-align: center;

        margin-top: 20px;
    }


    .back-button {

        display: inline-block;

        text-decoration: none;

        padding: 12px 22px;

        border-radius: 8px;

        background: #7b6ca5;

        color: white;

        font-size: 9px;

        font-weight: bold;
    }


    .back-button:hover {

        background: #6b5c96;
    }


    /* =================================
       FOOTER
       ================================= */

    footer {

        width: 88%;

        max-width: 1100px;

        margin: auto;

        padding: 17px 0 25px;

        border-top: 1px solid #dce1e7;

        text-align: center;

        font-size: 8px;

        color: #9aa2aa;
    }


    @media (max-width: 700px) {

        main,
        footer {

            width: 90%;
        }


        .stats {

            grid-template-columns: 1fr;
        }


        .heading {

            align-items: flex-start;
        }

    }

    </style>

</head>


<body>


<div class="browser-page">


    <!-- BROWSER TOP -->

    <div class="browser-bar">

        <div class="window-controls">

            <span class="close"></span>
            <span class="minimize"></span>
            <span class="maximize"></span>

        </div>


        <div class="browser-tab">

            <span>
                🌐
            </span>

            <span>
                History
            </span>

            <span class="tab-close">
                ×
            </span>

        </div>

    </div>


    <!-- NAVIGATION -->

    <div class="navigation">

        <div class="nav-buttons">

            <span>←</span>
            <span>→</span>
            <span>↻</span>

        </div>


        <div class="address-bar">

            🔒 &nbsp; browser://history

        </div>

    </div>


    <!-- MAIN -->

    <main>


        <!-- HEADING -->

        <section class="heading">

            <div>

                <span class="small-title">
                    BROWSING ACTIVITY
                </span>

                <h1>
                    History Report
                </h1>

                <p>
                    Recently visited pages processed using a stack.
                </p>

            </div>


            <div class="stack-badge">

                <strong>
                    STACK
                </strong>

                <span>
                    LIFO
                </span>

            </div>

        </section>



        <!-- STATISTICS -->

        <section class="stats">


            <div class="stat stat-one">

                <span>
                    PAGES VISITED
                </span>

                <strong>
                    <?= $totalPages ?>
                </strong>

                <small>
                    Total pages stored
                </small>

            </div>


            <div class="stat stat-two">

                <span>
                    PAGES PROCESSED
                </span>

                <strong>
                    <?= $processedPages ?>
                </strong>

                <small>
                    Stack pop operations
                </small>

            </div>


            <div class="stat stat-three">

                <span>
                    MOST RECENT PAGE
                </span>

                <strong style="font-size:13px;">
                    <?= htmlspecialchars($latestPage) ?>
                </strong>

                <small>
                    First page processed
                </small>

            </div>


        </section>



        <!-- HISTORY -->

        <section class="history-section">


            <div class="section-title">

                <span>
                    STACK OUTPUT
                </span>

                <h2>
                    Recently Visited Pages
                </h2>

            </div>



            <div class="history-list">


                <?php foreach (
                    $recentPages
                    as $index => $page
                ): ?>


                    <div class="history-card">


                        <div class="history-number">

                            <?= $index + 1 ?>

                        </div>


                        <div class="page-icon">
                            🌐
                        </div>


                        <div class="page-details">

                            <strong>
                                <?= htmlspecialchars($page) ?>
                            </strong>

                            <span>
                                Stack position:
                                <?= $index + 1 ?>
                            </span>

                        </div>


                        <?php if ($index === 0): ?>

                            <div class="recent-label">
                                MOST RECENT
                            </div>

                        <?php endif; ?>


                    </div>


                <?php endforeach; ?>


            </div>



            <!-- EXPLANATION -->

            <div class="explanation">

                <div class="explanation-icon">
                    ⬆
                </div>


                <div>

                    <strong>
                        LIFO — Last In, First Out
                    </strong>

                    <p>
                        The last page added to the browser history
                        stack is the first page removed and processed.
                        This behavior is implemented using
                        array_push() and array_pop().
                    </p>

                </div>

            </div>


        </section>



        <!-- BUTTON -->

        <div class="action">

            <a href="index.php"
               class="back-button">

                ← Add More Pages

            </a>

        </div>


    </main>


    <footer>

        PHP Practical • Browser History Using Stack

    </footer>


</div>


</body>

</html>