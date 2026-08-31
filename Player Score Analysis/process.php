<?php

/* =========================================
   GET PLAYER DATA
   ========================================= */

$players = $_POST["players"] ?? [];


/* =========================================
   CREATE SCORE ARRAY
   ========================================= */

$scores = [];

$playerData = [];


/* =========================================
   PROCESS PLAYER DETAILS
   ========================================= */

foreach ($players as $player) {

    $name = trim($player["name"] ?? "");

    $score = (int)($player["score"] ?? 0);


    if ($name !== "") {

        $playerData[] = [

            "name" => $name,

            "score" => $score

        ];

        $scores[] = $score;

    }

}


/* =========================================
   ARRAY FUNCTIONS
   ========================================= */

$totalPlayers = count($scores);

$totalScore = array_sum($scores);


$highestScore = $totalPlayers > 0
    ? max($scores)
    : 0;


$lowestScore = $totalPlayers > 0
    ? min($scores)
    : 0;


$averageScore = $totalPlayers > 0
    ? $totalScore / $totalPlayers
    : 0;


/* =========================================
   FIND HIGHEST PLAYER
   ========================================= */

$highestPlayer = "";

$lowestPlayer = "";


foreach ($playerData as $player) {

    if ($player["score"] == $highestScore) {

        $highestPlayer = $player["name"];

    }


    if ($player["score"] == $lowestScore) {

        $lowestPlayer = $player["name"];

    }

}


/* =========================================
   SORT PLAYERS BY SCORE
   ========================================= */

usort(
    $playerData,
    function ($a, $b) {

        return $b["score"] <=> $a["score"];

    }
);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Score Analysis Report</title>


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

        background: #f5f6fa;

        color: #3e444d;

        min-height: 100vh;

    }


    /* =================================
       HEADER
       ================================= */

    header {

        height: 82px;

        background: #ffffff;

        border-bottom: 1px solid #e2e5ea;

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


    .icon {

        width: 44px;

        height: 44px;

        border-radius: 12px;

        background: #fff0dc;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 20px;

    }


    .mini {

        display: block;

        font-size: 7px;

        letter-spacing: 1.5px;

        color: #d18a40;

        font-weight: bold;

        margin-bottom: 4px;

    }


    h1 {

        font-size: 18px;

        color: #343a43;

    }


    .report-badge {

        background: #f1f2f6;

        padding: 9px 13px;

        border-radius: 20px;

        font-size: 7px;

        color: #747c85;

        font-weight: bold;

    }


    /* =================================
       MAIN
       ================================= */

    main {

        width: 86%;

        max-width: 1080px;

        margin: 28px auto;

    }


    .intro {

        margin-bottom: 19px;

    }


    .intro span {

        display: block;

        color: #d18a40;

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

        color: #959ca4;

    }


    /* =================================
       STATISTICS
       ================================= */

    .statistics {

        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 13px;

        margin-bottom: 20px;

    }


    .stat {

        min-height: 112px;

        border-radius: 14px;

        padding: 19px;

        border: 1px solid transparent;

    }


    .stat-orange {

        background: #fff1df;

        border-color: #f2ddc1;

    }


    .stat-blue {

        background: #eaf1fa;

        border-color: #dce6f2;

    }


    .stat-green {

        background: #eaf4ed;

        border-color: #dcebe1;

    }


    .stat-label {

        font-size: 7px;

        letter-spacing: 1px;

        font-weight: bold;

        color: #7c838c;

        display: block;

        margin-bottom: 10px;

    }


    .stat-value {

        font-size: 26px;

        font-weight: bold;

        color: #3e454e;

    }


    .stat-sub {

        display: block;

        margin-top: 5px;

        font-size: 7px;

        color: #9299a1;

    }


    /* =================================
       WINNER SECTION
       ================================= */

    .highlight {

        background: #ffffff;

        border: 1px solid #e1e4e9;

        border-radius: 14px;

        padding: 20px;

        display: grid;

        grid-template-columns:
            1fr 1fr;

        gap: 13px;

        margin-bottom: 20px;

    }


    .winner {

        padding: 18px;

        background: #fff9ed;

        border: 1px solid #f0dfc3;

        border-radius: 11px;

    }


    .lowest {

        padding: 18px;

        background: #f0f4f8;

        border: 1px solid #dce3ea;

        border-radius: 11px;

    }


    .winner-label {

        font-size: 7px;

        font-weight: bold;

        letter-spacing: 1px;

        color: #b57938;

        margin-bottom: 8px;

        display: block;

    }


    .lowest .winner-label {

        color: #6d7f91;

    }


    .player-name {

        font-size: 16px;

        font-weight: bold;

        color: #444b54;

    }


    .score-text {

        margin-top: 5px;

        font-size: 8px;

        color: #9299a2;

    }


    /* =================================
       SCOREBOARD
       ================================= */

    .score-section {

        background: #ffffff;

        border: 1px solid #e1e4e9;

        border-radius: 14px;

        padding: 22px;

    }


    .section-heading {

        margin-bottom: 17px;

    }


    .section-heading span {

        display: block;

        font-size: 7px;

        color: #d18a40;

        letter-spacing: 1.5px;

        font-weight: bold;

        margin-bottom: 5px;

    }


    .section-heading h2 {

        font-size: 18px;

    }


    /* =================================
       PLAYER ROWS
       ================================= */

    .score-list {

        display: flex;

        flex-direction: column;

        gap: 9px;

    }


    .score-row {

        min-height: 61px;

        display: flex;

        align-items: center;

        gap: 12px;

        padding: 9px 12px;

        background: #f8f9fb;

        border: 1px solid #e2e6eb;

        border-radius: 10px;

    }


    .score-row:first-child {

        background: #fff8ec;

        border-color: #efddbf;

    }


    .position {

        width: 32px;

        height: 32px;

        border-radius: 8px;

        background: #ffffff;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 8px;

        font-weight: bold;

        color: #7c838c;

    }


    .medal {

        width: 32px;

        text-align: center;

        font-size: 16px;

    }


    .player-info {

        flex: 1;

    }


    .player-info strong {

        display: block;

        font-size: 9px;

        color: #4a525b;

        margin-bottom: 4px;

    }


    .player-info span {

        font-size: 7px;

        color: #969da5;

    }


    .score-value {

        font-size: 18px;

        font-weight: bold;

        color: #424952;

        min-width: 50px;

        text-align: right;

    }


    .score-unit {

        display: block;

        font-size: 6px;

        font-weight: normal;

        color: #9ba2aa;

        margin-top: 2px;

    }


    /* =================================
       ARRAY FUNCTIONS
       ================================= */

    .functions {

        margin-top: 17px;

        padding: 17px;

        border-radius: 11px;

        background: #f5f3f8;

        border: 1px solid #e5dfed;

    }


    .functions strong {

        display: block;

        font-size: 8px;

        color: #615674;

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

        border-radius: 6px;

        font-size: 7px;

        color: #766a88;

        border: 1px solid #e5e0eb;

    }


    /* =================================
       BUTTON
       ================================= */

    .action {

        text-align: center;

        margin-top: 20px;

    }


    .back {

        display: inline-block;

        text-decoration: none;

        padding: 12px 22px;

        background: #3f4650;

        color: #ffffff;

        border-radius: 8px;

        font-size: 9px;

        font-weight: bold;

    }


    .back:hover {

        background: #292f37;

    }


    /* =================================
       FOOTER
       ================================= */

    footer {

        width: 86%;

        max-width: 1080px;

        margin: auto;

        padding: 17px 0 25px;

        border-top: 1px solid #dfe2e7;

        text-align: center;

        color: #9ba2aa;

        font-size: 8px;

    }


    /* =================================
       RESPONSIVE
       ================================= */

    @media (max-width: 700px) {

        main,
        footer {

            width: 90%;

        }


        .statistics {

            grid-template-columns: 1fr;

        }


        .highlight {

            grid-template-columns: 1fr;

        }

    }

    </style>

</head>


<body>


<!-- HEADER -->

<header>

    <div class="brand">

        <div class="icon">
            🏆
        </div>

        <div>

            <span class="mini">
                SPORTS ANALYTICS
            </span>

            <h1>
                Player Score Analysis
            </h1>

        </div>

    </div>


    <div class="report-badge">
        ANALYSIS REPORT
    </div>

</header>



<main>


    <!-- INTRO -->

    <section class="intro">

        <span>
            TOURNAMENT PERFORMANCE
        </span>

        <h2>
            Scoreboard Report
        </h2>

        <p>
            Player performance analyzed using PHP array functions.
        </p>

    </section>



    <!-- STATISTICS -->

    <section class="statistics">


        <div class="stat stat-orange">

            <span class="stat-label">
                HIGHEST SCORE
            </span>

            <strong class="stat-value">
                <?= $highestScore ?>
            </strong>

            <span class="stat-sub">
                Best performance
            </span>

        </div>



        <div class="stat stat-blue">

            <span class="stat-label">
                LOWEST SCORE
            </span>

            <strong class="stat-value">
                <?= $lowestScore ?>
            </strong>

            <span class="stat-sub">
                Lowest performance
            </span>

        </div>



        <div class="stat stat-green">

            <span class="stat-label">
                AVERAGE SCORE
            </span>

            <strong class="stat-value">
                <?= number_format($averageScore, 2) ?>
            </strong>

            <span class="stat-sub">
                Overall player average
            </span>

        </div>


    </section>



    <!-- HIGHLIGHTS -->

    <section class="highlight">


        <div class="winner">

            <span class="winner-label">
                🏆 TOP PLAYER
            </span>

            <div class="player-name">
                <?= htmlspecialchars($highestPlayer) ?>
            </div>

            <div class="score-text">
                Highest score: <?= $highestScore ?> points
            </div>

        </div>



        <div class="lowest">

            <span class="winner-label">
                📉 LOWEST SCORE
            </span>

            <div class="player-name">
                <?= htmlspecialchars($lowestPlayer) ?>
            </div>

            <div class="score-text">
                Score: <?= $lowestScore ?> points
            </div>

        </div>


    </section>



    <!-- SCOREBOARD -->

    <section class="score-section">


        <div class="section-heading">

            <span>
                RANKING
            </span>

            <h2>
                Player Performance
            </h2>

        </div>



        <div class="score-list">


            <?php foreach (
                $playerData
                as $index => $player
            ): ?>


                <div class="score-row">


                    <div class="position">

                        <?= $index + 1 ?>

                    </div>


                    <div class="medal">

                        <?php

                        if ($index === 0) {

                            echo "🥇";

                        } elseif ($index === 1) {

                            echo "🥈";

                        } elseif ($index === 2) {

                            echo "🥉";

                        } else {

                            echo "⭐";

                        }

                        ?>

                    </div>


                    <div class="player-info">

                        <strong>

                            <?= htmlspecialchars(
                                $player["name"]
                            ) ?>

                        </strong>

                        <span>
                            Player <?= $index + 1 ?>
                        </span>

                    </div>


                    <div class="score-value">

                        <?= $player["score"] ?>

                        <span class="score-unit">
                            POINTS
                        </span>

                    </div>


                </div>


            <?php endforeach; ?>


        </div>



        <!-- FUNCTIONS -->

        <div class="functions">

            <strong>
                PHP ARRAY FUNCTIONS USED
            </strong>


            <div class="function-list">

                <span class="function">
                    count()
                </span>

                <span class="function">
                    array_sum()
                </span>

                <span class="function">
                    max()
                </span>

                <span class="function">
                    min()
                </span>

                <span class="function">
                    usort()
                </span>

            </div>

        </div>


    </section>



    <!-- BACK BUTTON -->

    <div class="action">

        <a href="index.php"
           class="back">

            ← Enter New Scores

        </a>

    </div>


</main>



<footer>

    PHP Practical • Player Score Analysis

</footer>


</body>

</html>