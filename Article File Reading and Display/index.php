<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Article Reader</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="topbar">

        <div class="brand">
            <div class="brand-icon">A</div>

            <div>
                <h2>ARTICLE</h2>
                <p>READING ROOM</p>
            </div>
        </div>

        <div class="header-tag">
            PHP FILE READER
        </div>

    </header>


    <main class="container">

        <section class="intro">

            <div class="intro-label">
                FEATURED ARTICLE
            </div>

            <h1>
                Read. Explore.<br>
                <span>Discover.</span>
            </h1>

            <p>
                A simple PHP-powered article reader that retrieves
                content directly from a text file and presents it
                in a clean editorial format.
            </p>

        </section>


        <section class="article-preview">

            <div class="preview-number">
                01
            </div>

            <div class="preview-content">

                <p class="category">
                    TECHNOLOGY
                </p>

                <h2>
                    The Future of Technology
                </h2>

                <p>
                    Explore how artificial intelligence, cloud computing,
                    and digital skills are shaping the world around us.
                </p>

                <form action="process.php" method="POST">

                    <button type="submit">
                        Read Full Article
                        <span>→</span>
                    </button>

                </form>

            </div>

            <div class="preview-symbol">
                +
            </div>

        </section>


        <div class="info-row">

            <div>
                <strong>01</strong>
                <span>TEXT FILE</span>
            </div>

            <div>
                <strong>PHP</strong>
                <span>PROCESSING</span>
            </div>

            <div>
                <strong>LIVE</strong>
                <span>LINE COUNT</span>
            </div>

        </div>

    </main>


    <footer>

        <p>
            Article Reader • Built with PHP File Handling
        </p>

    </footer>

</body>

</html>