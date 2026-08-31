<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Music Studio - Playlist Search</title>

    <link rel="stylesheet" href="style.css">

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
                    Playlist Explorer
                </h1>

            </div>

        </div>

        <div class="track-count">
            <strong>06</strong>
            <span>TRACKS</span>
        </div>

    </header>


    <!-- INTRO -->

    <section class="welcome">

        <div class="welcome-text">

            <span>
                MUSIC SEARCH
            </span>

            <h2>
                Find the song<br>
                you're looking for.
            </h2>

            <p>
                Search your playlist by song title or artist
                and discover the details instantly.
            </p>

        </div>

        <div class="headphone">
            🎧
        </div>

    </section>


    <!-- SEARCH -->

    <form action="process.php" method="POST">

        <div class="search-section">

            <div class="search-label">
                SEARCH YOUR PLAYLIST
            </div>

            <div class="search-row">

                <div class="search-input">

                    <span>
                        🔍
                    </span>

                    <input
                        type="text"
                        name="search"
                        placeholder="Enter song title or artist..."
                        required
                    >

                </div>

                <button type="submit">
                    SEARCH
                    <span>→</span>
                </button>

            </div>

            <p class="search-hint">
                Try searching for "Munbe Vaa", "Shreya"
                or any song in your playlist.
            </p>

        </div>

    </form>


    <!-- PLAYLIST -->

    <section class="playlist">

        <div class="playlist-heading">

            <div>

                <span>
                    YOUR COLLECTION
                </span>

                <h2>
                    Featured Tracks
                </h2>

            </div>

            <div class="shuffle">
                ♫ Playlist
            </div>

        </div>


        <div class="songs">


            <!-- SONG 1 -->

            <div class="song song-one">

                <div class="album album-one">
                    🎵
                </div>

                <div class="song-number">
                    01
                </div>

                <div class="song-details">

                    <h3>
                        New York Nagaram
                    </h3>

                    <p>
                        A.R. Rahman
                    </p>

                    <span>
                        Tamil • Melody
                    </span>

                </div>

                <div class="play">
                    ▶
                </div>

            </div>


            <!-- SONG 2 -->

            <div class="song song-two">

                <div class="album album-two">
                    🎧
                </div>

                <div class="song-number">
                    02
                </div>

                <div class="song-details">

                    <h3>
                        Munbe Vaa
                    </h3>

                    <p>
                        Shreya Ghoshal
                    </p>

                    <span>
                        Tamil • Romantic
                    </span>

                </div>

                <div class="play">
                    ▶
                </div>

            </div>


            <!-- SONG 3 -->

            <div class="song song-three">

                <div class="album album-three">
                    🎶
                </div>

                <div class="song-number">
                    03
                </div>

                <div class="song-details">

                    <h3>
                        Vaseegara
                    </h3>

                    <p>
                        Bombay Jayashri
                    </p>

                    <span>
                        Tamil • Classic
                    </span>

                </div>

                <div class="play">
                    ▶
                </div>

            </div>


            <!-- SONG 4 -->

            <div class="song song-four">

                <div class="album album-four">
                    🎼
                </div>

                <div class="song-number">
                    04
                </div>

                <div class="song-details">

                    <h3>
                        Hosanna
                    </h3>

                    <p>
                        Vijay Prakash
                    </p>

                    <span>
                        Tamil • Melody
                    </span>

                </div>

                <div class="play">
                    ▶
                </div>

            </div>


            <!-- SONG 5 -->

            <div class="song song-five">

                <div class="album album-five">
                    🎤
                </div>

                <div class="song-number">
                    05
                </div>

                <div class="song-details">

                    <h3>
                        Anbil Avan
                    </h3>

                    <p>
                        Devan Ekambaram
                    </p>

                    <span>
                        Tamil • Romantic
                    </span>

                </div>

                <div class="play">
                    ▶
                </div>

            </div>


            <!-- SONG 6 -->

            <div class="song song-six">

                <div class="album album-six">
                    🎹
                </div>

                <div class="song-number">
                    06
                </div>

                <div class="song-details">

                    <h3>
                        Vennilave
                    </h3>

                    <p>
                        Hariharan
                    </p>

                    <span>
                        Tamil • Melody
                    </span>

                </div>

                <div class="play">
                    ▶
                </div>

            </div>


        </div>

    </section>


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