<?php

$folders = [
    "academic" => "Academic Reports",
    "financial" => "Financial Reports",
    "project" => "Project Reports"
];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>ReportHub | File Access System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <!-- HEADER -->

    <header>

        <div class="brand">

            <div class="brand-icon">
                R
            </div>

            <div>

                <h1>ReportHub</h1>

                <span>DOCUMENT ACCESS SYSTEM</span>

            </div>

        </div>

        <div class="secure-status">

            <span class="status-dot"></span>

            FILE ACCESS READY

        </div>

    </header>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <span class="eyebrow">
                REPORT LIBRARY
            </span>

            <h2>
                Find the report<br>
                <strong>you need.</strong>
            </h2>

            <p>
                Browse organized report folders, view available
                documents, and access files from one simple workspace.
            </p>

        </div>


        <div class="folder-illustration">

            <div class="folder-back"></div>

            <div class="folder-front">

                <div class="document-line"></div>
                <div class="document-line short"></div>
                <div class="document-line"></div>

            </div>

            <div class="folder-label">
                REPORTS
            </div>

        </div>

    </section>


    <!-- MAIN -->

    <main>


        <div class="section-top">

            <div>

                <span class="section-label">
                    ORGANIZED DOCUMENTS
                </span>

                <h2>
                    Report folders
                </h2>

            </div>

            <div class="folder-count">
                <?php echo count($folders); ?> FOLDERS
            </div>

        </div>


        <!-- FOLDER CARDS -->

        <section class="folder-grid">

            <?php foreach ($folders as $folder => $title): ?>

                <div class="folder-card">

                    <div class="card-top">

                        <div class="folder-icon">
                            📁
                        </div>

                        <span class="folder-tag">
                            DIRECTORY
                        </span>

                    </div>


                    <h3>
                        <?php echo $title; ?>
                    </h3>


                    <p>
                        Browse reports stored in the
                        <?php echo $folder; ?> directory.
                    </p>


                    <form
                        action="process.php"
                        method="POST"
                    >

                        <input
                            type="hidden"
                            name="folder"
                            value="<?php echo $folder; ?>"
                        >

                        <button type="submit">
                            View Reports
                            <span>→</span>
                        </button>

                    </form>

                </div>

            <?php endforeach; ?>

        </section>


        <!-- INFORMATION -->

        <section class="info-panel">

            <div class="info-icon">
                i
            </div>

            <div>

                <h3>
                    About the report library
                </h3>

                <p>
                    Reports are organized into separate directories.
                    Select a folder above to display the files available
                    for access.
                </p>

            </div>

        </section>


        <!-- DIRECTORY FEATURES -->

        <section class="features">

            <div class="feature">

                <div class="feature-number">
                    01
                </div>

                <div>

                    <h3>
                        Organized folders
                    </h3>

                    <p>
                        Reports are maintained in separate directories.
                    </p>

                </div>

            </div>


            <div class="feature">

                <div class="feature-number">
                    02
                </div>

                <div>

                    <h3>
                        Directory scanning
                    </h3>

                    <p>
                        PHP directory functions retrieve available files.
                    </p>

                </div>

            </div>


            <div class="feature">

                <div class="feature-number">
                    03
                </div>

                <div>

                    <h3>
                        Easy access
                    </h3>

                    <p>
                        Select a report to open the stored document.
                    </p>

                </div>

            </div>

        </section>


    </main>


    <!-- FOOTER -->

    <footer>

        <span>
            REPORTHUB · PHP FILE ACCESS SYSTEM
        </span>

        <span>
            DIRECTORY FUNCTIONS · FILE HANDLING
        </span>

    </footer>

</div>

</body>

</html>