<?php

$file = "article.txt";

$article_content = "";
$line_count = 0;

if (file_exists($file)) {

    // Read the complete file
    $article_content = file_get_contents($file);

    // Count the number of lines
    $line_count = count(file($file));

} else {

    $article_content = "Unable to locate the article file.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Article | Reading Room</title>

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
        FILE CONTENT
    </div>

</header>


<main class="reader-container">

    <div class="article-header">

        <div>

            <p class="category">
                TECHNOLOGY • FEATURED
            </p>

            <h1>
                The Future of Technology
            </h1>

            <p class="subtitle">
                An article retrieved directly from a PHP text file.
            </p>

        </div>

        <div class="line-stat">

            <strong>
                <?php echo $line_count; ?>
            </strong>

            <span>
                LINES
            </span>

        </div>

    </div>


    <div class="reader-layout">

        <aside>

            <p class="aside-title">
                ARTICLE INFO
            </p>

            <div class="aside-item">
                <span>Source</span>
                <strong>article.txt</strong>
            </div>

            <div class="aside-item">
                <span>Format</span>
                <strong>Text File</strong>
            </div>

            <div class="aside-item">
                <span>Lines</span>
                <strong><?php echo $line_count; ?></strong>
            </div>

            <div class="aside-item">
                <span>Status</span>
                <strong class="status">● Loaded</strong>
            </div>

        </aside>


        <article class="article-content">

            <?php

            $paragraphs = preg_split("/\r\n|\n|\r/", $article_content);

            foreach ($paragraphs as $paragraph) {

                $paragraph = trim($paragraph);

                if (!empty($paragraph)) {

                    if (strpos($paragraph, "The Future of Technology") !== false) {

                        continue;

                    } else {

                        echo "<p>" . htmlspecialchars($paragraph) . "</p>";
                    }
                }
            }

            ?>

        </article>

    </div>


    <div class="bottom-section">

        <div>
            <span class="mini-icon">✓</span>

            <div>
                <strong>File successfully processed</strong>
                <p>
                    Content was read using PHP file handling functions.
                </p>
            </div>
        </div>

        <a href="index.php">
            ← Back to Home
        </a>

    </div>

</main>


<footer>

    <p>
        Article Reader • PHP File Handling Demonstration
    </p>

</footer>

</body>

</html>