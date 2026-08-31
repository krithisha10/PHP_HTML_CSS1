<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Player Score Analysis</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">


    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="brand-icon">
                🏆
            </div>

            <div>

                <span class="mini-title">
                    SPORTS ANALYTICS
                </span>

                <h1>
                    Player Score Analysis
                </h1>

            </div>

        </div>


        <div class="header-badge">

            <span>PHP</span>

            <strong>ARRAYS</strong>

        </div>

    </header>



    <!-- HERO -->

    <section class="hero">

        <div>

            <span class="hero-label">
                TOURNAMENT SCOREBOARD
            </span>

            <h2>
                Enter Player Scores
            </h2>

            <p>
                Add player names and their scores to generate
                a complete performance analysis.
            </p>

        </div>


        <div class="trophy">

            🏆

        </div>

    </section>



    <!-- PLAYER FORM -->

    <form action="process.php"
          method="POST">


        <section class="players">


            <!-- PLAYER 1 -->

            <div class="player-card card-orange">

                <div class="player-top">

                    <span class="rank">
                        01
                    </span>

                    <span class="player-symbol">
                        🥇
                    </span>

                </div>

                <label>
                    Player Name
                </label>

                <input
                    type="text"
                    name="players[0][name]"
                    placeholder="Enter player name"
                    required
                >

                <label>
                    Score
                </label>

                <input
                    type="number"
                    name="players[0][score]"
                    placeholder="Enter score"
                    min="0"
                    required
                >

            </div>



            <!-- PLAYER 2 -->

            <div class="player-card card-blue">

                <div class="player-top">

                    <span class="rank">
                        02
                    </span>

                    <span class="player-symbol">
                        🥈
                    </span>

                </div>

                <label>
                    Player Name
                </label>

                <input
                    type="text"
                    name="players[1][name]"
                    placeholder="Enter player name"
                    required
                >

                <label>
                    Score
                </label>

                <input
                    type="number"
                    name="players[1][score]"
                    placeholder="Enter score"
                    min="0"
                    required
                >

            </div>



            <!-- PLAYER 3 -->

            <div class="player-card card-green">

                <div class="player-top">

                    <span class="rank">
                        03
                    </span>

                    <span class="player-symbol">
                        🥉
                    </span>

                </div>

                <label>
                    Player Name
                </label>

                <input
                    type="text"
                    name="players[2][name]"
                    placeholder="Enter player name"
                    required
                >

                <label>
                    Score
                </label>

                <input
                    type="number"
                    name="players[2][score]"
                    placeholder="Enter score"
                    min="0"
                    required
                >

            </div>



            <!-- PLAYER 4 -->

            <div class="player-card card-purple">

                <div class="player-top">

                    <span class="rank">
                        04
                    </span>

                    <span class="player-symbol">
                        ⭐
                    </span>

                </div>

                <label>
                    Player Name
                </label>

                <input
                    type="text"
                    name="players[3][name]"
                    placeholder="Enter player name"
                    required
                >

                <label>
                    Score
                </label>

                <input
                    type="number"
                    name="players[3][score]"
                    placeholder="Enter score"
                    min="0"
                    required
                >

            </div>



            <!-- PLAYER 5 -->

            <div class="player-card card-pink">

                <div class="player-top">

                    <span class="rank">
                        05
                    </span>

                    <span class="player-symbol">
                        ⚡
                    </span>

                </div>

                <label>
                    Player Name
                </label>

                <input
                    type="text"
                    name="players[4][name]"
                    placeholder="Enter player name"
                    required
                >

                <label>
                    Score
                </label>

                <input
                    type="number"
                    name="players[4][score]"
                    placeholder="Enter score"
                    min="0"
                    required
                >

            </div>



            <!-- PLAYER 6 -->

            <div class="player-card card-teal">

                <div class="player-top">

                    <span class="rank">
                        06
                    </span>

                    <span class="player-symbol">
                        🎯
                    </span>

                </div>

                <label>
                    Player Name
                </label>

                <input
                    type="text"
                    name="players[5][name]"
                    placeholder="Enter player name"
                    required
                >

                <label>
                    Score
                </label>

                <input
                    type="number"
                    name="players[5][score]"
                    placeholder="Enter score"
                    min="0"
                    required
                >

            </div>


        </section>



        <!-- BUTTON -->

        <div class="button-area">

            <button type="submit">

                Analyze Player Scores

                <span>→</span>

            </button>

            <p>
                PHP Arrays • max() • min() • array_sum() • count()
            </p>

        </div>


    </form>



    <!-- FOOTER -->

    <footer>

        PHP Practical • Player Score Analysis

    </footer>


</div>

</body>

</html>