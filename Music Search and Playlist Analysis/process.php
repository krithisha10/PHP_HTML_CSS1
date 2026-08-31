<?php

$songs = [

    [
        "title" => "New York Nagaram",
        "artist" => "A.R. Rahman",
        "genre" => "Tamil • Melody",
        "year" => 2006
    ],

    [
        "title" => "Munbe Vaa",
        "artist" => "Shreya Ghoshal",
        "genre" => "Tamil • Romantic",
        "year" => 2006
    ],

    [
        "title" => "Vaseegara",
        "artist" => "Bombay Jayashri",
        "genre" => "Tamil • Classic",
        "year" => 2001
    ],

    [
        "title" => "Hosanna",
        "artist" => "Vijay Prakash",
        "genre" => "Tamil • Melody",
        "year" => 2010
    ],

    [
        "title" => "Anbil Avan",
        "artist" => "Devan Ekambaram",
        "genre" => "Tamil • Romantic",
        "year" => 2010
    ],

    [
        "title" => "Vennilave",
        "artist" => "Hariharan",
        "genre" => "Tamil • Melody",
        "year" => 1998
    ]

];


/* =====================================================
   GET SEARCH INPUT
   ===================================================== */

$search = trim($_POST["search"] ?? "");


/* =====================================================
   SEARCH THE ARRAY
   ===================================================== */

$results = [];

foreach ($songs as $song) {

    if (
        stripos($song["title"], $search) !== false ||
        stripos($song["artist"], $search) !== false
    ) {

        $results[] = $song;

    }

}


/* =====================================================
   ANALYSIS
   ===================================================== */

$totalSongs = count($songs);

$matchedSongs = count($results);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Music Search Report</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {

            font-family: Arial, Helvetica, sans-serif;

            background: #fff8f4;

            color: #3d3432;

            min-height: 100vh;
        }


        .page {

            width: 100%;

            padding: 32px 6% 25px;
        }


        /* =========================================
           HEADER
           ========================================= */

        .header {

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;
        }


        .brand {

            display: flex;

            align-items: center;

            gap: 14px;
        }


        .music-symbol {

            width: 54px;
            height: 54px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 15px;

            background: #ffe2d5;

            color: #df7155;

            font-size: 28px;

            font-weight: bold;
        }


        .small-title {

            display: block;

            font-size: 8px;

            letter-spacing: 2px;

            color: #d77a61;

            font-weight: bold;

            margin-bottom: 5px;
        }


        .header h1 {

            font-size: 25px;

            color: #3e3431;
        }


        .header p {

            font-size: 9px;

            color: #958782;

            margin-top: 4px;
        }


        .report-label {

            background: #ffffff;

            border: 1px solid #efddd6;

            padding: 9px 13px;

            border-radius: 8px;

            font-size: 8px;

            font-weight: bold;

            color: #bc6954;

            letter-spacing: 1px;
        }


        /* =========================================
           REPORT BANNER
           ========================================= */

        .report-banner {

            background: #493630;

            border-radius: 17px;

            padding: 27px 30px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;

            overflow: hidden;

            position: relative;
        }


        .report-banner::after {

            content: "♫";

            position: absolute;

            right: 10%;

            top: -25px;

            font-size: 125px;

            color: rgba(255,255,255,0.05);
        }


        .banner-content {

            position: relative;

            z-index: 2;
        }


        .banner-content span {

            font-size: 8px;

            color: #e5b3a4;

            letter-spacing: 2px;

            font-weight: bold;
        }


        .banner-content h2 {

            color: #ffffff;

            font-size: 22px;

            margin-top: 7px;

            margin-bottom: 5px;
        }


        .banner-content p {

            color: #c9b9b4;

            font-size: 9px;
        }


        .search-display {

            position: relative;

            z-index: 2;

            text-align: right;
        }


        .search-display small {

            display: block;

            color: #bdaaa5;

            font-size: 7px;

            letter-spacing: 1px;

            margin-bottom: 5px;
        }


        .search-display strong {

            color: #ffffff;

            font-size: 17px;
        }


        /* =========================================
           STATISTICS
           ========================================= */

        .stats {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 13px;

            margin-bottom: 25px;
        }


        .stat {

            min-height: 95px;

            padding: 18px;

            border-radius: 12px;

            position: relative;

            overflow: hidden;
        }


        .stat:nth-child(1) {

            background: #ffe8df;
        }


        .stat:nth-child(2) {

            background: #eee8f8;
        }


        .stat:nth-child(3) {

            background: #e5f3ee;
        }


        .stat-label {

            display: block;

            font-size: 8px;

            letter-spacing: 1px;

            font-weight: bold;

            color: #806f6a;

            margin-bottom: 9px;
        }


        .stat strong {

            font-size: 27px;

            color: #453834;
        }


        .stat-icon {

            position: absolute;

            right: 16px;

            bottom: 10px;

            font-size: 27px;

            opacity: 0.45;
        }


        /* =========================================
           RESULT HEADING
           ========================================= */

        .result-heading {

            display: flex;

            align-items: flex-end;

            justify-content: space-between;

            margin-bottom: 14px;
        }


        .result-heading span {

            font-size: 8px;

            letter-spacing: 1.7px;

            color: #b56a57;

            font-weight: bold;
        }


        .result-heading h2 {

            font-size: 19px;

            color: #433633;

            margin-top: 5px;
        }


        .match-badge {

            padding: 7px 10px;

            background: #fff0ea;

            color: #c66851;

            border-radius: 6px;

            font-size: 8px;

            font-weight: bold;
        }


        /* =========================================
           RESULT CARDS
           ========================================= */

        .results {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 14px;

            margin-bottom: 25px;
        }


        .song-card {

            background: #ffffff;

            border: 1px solid #efdfd9;

            border-radius: 13px;

            padding: 18px;

            position: relative;

            overflow: hidden;

            transition: 0.2s ease;
        }


        .song-card:hover {

            transform: translateY(-3px);

            box-shadow:
                0 9px 20px rgba(70, 45, 38, 0.07);
        }


        .song-card::before {

            content: "";

            position: absolute;

            top: 0;
            left: 0;

            width: 100%;

            height: 4px;

            background: #df7155;
        }


        .song-card:nth-child(2)::before {

            background: #9b80c7;
        }


        .song-card:nth-child(3)::before {

            background: #e4a052;
        }


        .song-card:nth-child(4)::before {

            background: #68a889;
        }


        .song-card:nth-child(5)::before {

            background: #d8839e;
        }


        .song-card:nth-child(6)::before {

            background: #62a8b3;
        }


        .album {

            width: 50px;
            height: 50px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #fff0ea;

            border-radius: 10px;

            font-size: 21px;

            margin-bottom: 13px;
        }


        .song-card:nth-child(2) .album {

            background: #eee8f8;
        }


        .song-card:nth-child(3) .album {

            background: #fff0dd;
        }


        .song-card:nth-child(4) .album {

            background: #e8f3ed;
        }


        .song-card:nth-child(5) .album {

            background: #fae9ef;
        }


        .song-card:nth-child(6) .album {

            background: #e6f3f5;
        }


        .song-card h3 {

            font-size: 13px;

            color: #443633;

            margin-bottom: 6px;
        }


        .song-card p {

            font-size: 9px;

            color: #817570;

            margin-bottom: 8px;
        }


        .song-card .genre {

            display: inline-block;

            background: #faf4f1;

            color: #a08d87;

            padding: 5px 7px;

            border-radius: 5px;

            font-size: 7px;
        }


        .song-year {

            position: absolute;

            right: 14px;

            top: 17px;

            font-size: 8px;

            color: #aaa09d;
        }


        /* =========================================
           NO RESULT
           ========================================= */

        .no-result {

            background: #ffffff;

            border: 1px solid #efdfd9;

            border-radius: 14px;

            padding: 40px 20px;

            text-align: center;

            margin-bottom: 25px;
        }


        .no-result .icon {

            width: 55px;
            height: 55px;

            margin: 0 auto 12px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #ffe8df;

            font-size: 23px;
        }


        .no-result h3 {

            font-size: 16px;

            color: #493a36;

            margin-bottom: 6px;
        }


        .no-result p {

            font-size: 9px;

            color: #9b8f8b;
        }


        /* =========================================
           ACTION
           ========================================= */

        .action {

            text-align: center;

            margin-top: 8px;
        }


        .back-button {

            display: inline-block;

            text-decoration: none;

            background: #df7155;

            color: #ffffff;

            padding: 11px 20px;

            border-radius: 8px;

            font-size: 9px;

            font-weight: bold;

            transition: 0.2s ease;
        }


        .back-button:hover {

            background: #c95e45;

            transform: translateY(-2px);
        }


        /* =========================================
           FOOTER
           ========================================= */

        footer {

            text-align: center;

            border-top: 1px solid #efdfd9;

            margin-top: 23px;

            padding-top: 13px;
        }


        footer span {

            font-size: 7px;

            letter-spacing: 1.5px;

            color: #c47a66;

            font-weight: bold;
        }


        footer p {

            font-size: 8px;

            color: #a39894;

            margin-top: 4px;
        }


        /* =========================================
           RESPONSIVE
           ========================================= */

        @media (max-width: 850px) {

            .results {

                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 650px) {

            .page {

                padding: 25px 5% 20px;
            }


            .header {

                align-items: flex-start;
            }


            .report-banner {

                flex-direction: column;

                align-items: flex-start;

                gap: 20px;
            }


            .search-display {

                text-align: left;
            }


            .stats {

                grid-template-columns: 1fr;
            }


            .results {

                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 450px) {

            .header h1 {

                font-size: 20px;
            }


            .report-label {

                display: none;
            }

        }

    </style>

</head>


<body>


<div class="page">


    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="music-symbol">
                ♪
            </div>

            <div>

                <span class="small-title">
                    MY MUSIC SPACE
                </span>

                <h1>
                    Search Report
                </h1>

                <p>
                    Music Search & Playlist Analysis
                </p>

            </div>

        </div>


        <div class="report-label">
            ANALYSIS COMPLETE
        </div>

    </header>


    <!-- REPORT BANNER -->

    <section class="report-banner">

        <div class="banner-content">

            <span>
                PLAYLIST SEARCH
            </span>

            <h2>
                Your Music Results
            </h2>

            <p>
                Songs matching your search have been identified.
            </p>

        </div>


        <div class="search-display">

            <small>
                SEARCHED FOR
            </small>

            <strong>
                "<?= htmlspecialchars($search) ?>"
            </strong>

        </div>

    </section>


    <!-- STATISTICS -->

    <section class="stats">


        <div class="stat">

            <span class="stat-label">
                TOTAL SONGS
            </span>

            <strong>
                <?= $totalSongs ?>
            </strong>

            <span class="stat-icon">
                🎵
            </span>

        </div>


        <div class="stat">

            <span class="stat-label">
                MATCHES FOUND
            </span>

            <strong>
                <?= $matchedSongs ?>
            </strong>

            <span class="stat-icon">
                🔎
            </span>

        </div>


        <div class="stat">

            <span class="stat-label">
                PLAYLIST STATUS
            </span>

            <strong>
                Ready
            </strong>

            <span class="stat-icon">
                ✓
            </span>

        </div>


    </section>


    <!-- RESULT TITLE -->

    <section class="result-heading">

        <div>

            <span>
                SEARCH ANALYSIS
            </span>

            <h2>
                Matching Songs
            </h2>

        </div>


        <div class="match-badge">
            <?= $matchedSongs ?> RESULT(S)
        </div>

    </section>


    <!-- RESULTS -->

    <?php if ($matchedSongs > 0): ?>

        <div class="results">


            <?php foreach ($results as $song): ?>

                <div class="song-card">


                    <div class="song-year">
                        <?= htmlspecialchars($song["year"]) ?>
                    </div>


                    <div class="album">
                        🎧
                    </div>


                    <h3>
                        <?= htmlspecialchars($song["title"]) ?>
                    </h3>


                    <p>
                        <?= htmlspecialchars($song["artist"]) ?>
                    </p>


                    <span class="genre">
                        <?= htmlspecialchars($song["genre"]) ?>
                    </span>


                </div>

            <?php endforeach; ?>


        </div>


    <?php else: ?>


        <div class="no-result">

            <div class="icon">
                🔍
            </div>

            <h3>
                No Matching Song Found
            </h3>

            <p>
                We couldn't find a song or artist matching
                "<strong><?= htmlspecialchars($search) ?></strong>".
            </p>

        </div>


    <?php endif; ?>


    <!-- BACK BUTTON -->

    <div class="action">

        <a href="index.php" class="back-button">
            ← Search Again
        </a>

    </div>


    <!-- FOOTER -->

    <footer>

        <span>
            PHP PRACTICAL
        </span>

        <p>
            Music Search & Playlist Analysis
        </p>

    </footer>


</div>


</body>

</html>