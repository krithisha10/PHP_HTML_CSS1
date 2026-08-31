<?php

// ==========================================
// GET SELECTED FOLDER
// ==========================================

$folder = $_POST["folder"] ?? "";


// ==========================================
// ALLOWED DIRECTORIES
// ==========================================

$allowedFolders = [
    "academic" => "Academic Reports",
    "financial" => "Financial Reports",
    "project" => "Project Reports"
];


// ==========================================
// VALIDATE FOLDER
// ==========================================

if (!array_key_exists($folder, $allowedFolders)) {

    die("Invalid report directory.");

}


$folderPath = "reports/" . $folder . "/";


// ==========================================
// CHECK DIRECTORY
// ==========================================

if (!is_dir($folderPath)) {

    die("The selected report directory does not exist.");

}


// ==========================================
// READ DIRECTORY
// ==========================================

$files = scandir($folderPath);


// Remove . and ..

$files = array_diff(
    $files,
    [".", ".."]
);


// ==========================================
// ALLOWED FILE TYPES
// ==========================================

$allowedExtensions = [
    "pdf",
    "doc",
    "docx",
    "txt"
];


// ==========================================
// FILTER FILES
// ==========================================

$reports = [];

foreach ($files as $file) {

    $filePath = $folderPath . $file;

    if (is_file($filePath)) {

        $extension = strtolower(
            pathinfo(
                $file,
                PATHINFO_EXTENSION
            )
        );

        if (
            in_array(
                $extension,
                $allowedExtensions
            )
        ) {

            $reports[] = $file;

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?php echo $allowedFolders[$folder]; ?>
    </title>

    <link
        rel="stylesheet"
        href="style.css"
    >

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

                <h1>
                    ReportHub
                </h1>

                <span>
                    DOCUMENT ACCESS SYSTEM
                </span>

            </div>

        </div>


        <a
            href="index.php"
            class="back-button"
        >
            ← All Folders
        </a>

    </header>



    <!-- REPORT HEADER -->

    <section class="report-header">

        <div>

            <span class="eyebrow">
                REPORT DIRECTORY
            </span>

            <h2>

                <?php
                echo $allowedFolders[$folder];
                ?>

            </h2>

            <p>
                Available documents in this directory.
            </p>

        </div>


        <div class="file-count">

            <strong>
                <?php echo count($reports); ?>
            </strong>

            <span>
                FILES AVAILABLE
            </span>

        </div>

    </section>



    <!-- REPORT LIST -->

    <main class="reports-main">


        <?php if (count($reports) > 0): ?>

            <section class="report-list">

                <?php foreach ($reports as $file): ?>

                    <?php

                    $extension = strtolower(
                        pathinfo(
                            $file,
                            PATHINFO_EXTENSION
                        )
                    );

                    ?>

                    <div class="report-card">


                        <div class="file-icon">

                            <?php

                            echo strtoupper(
                                $extension
                            );

                            ?>

                        </div>


                        <div class="file-details">

                            <h3>

                                <?php
                                echo htmlspecialchars(
                                    $file
                                );
                                ?>

                            </h3>

                            <p>

                                <?php
                                echo strtoupper(
                                    $extension
                                );
                                ?>

                                DOCUMENT

                            </p>

                        </div>


                        <a
                            href="<?php
                            echo $folderPath .
                                 rawurlencode($file);
                            ?>"
                            target="_blank"
                            class="access-button"
                        >

                            Open Report

                            <span>
                                →
                            </span>

                        </a>


                    </div>

                <?php endforeach; ?>

            </section>


        <?php else: ?>


            <!-- EMPTY STATE -->

            <section class="empty-state">

                <div class="empty-icon">
                    📂
                </div>

                <h2>
                    No reports available
                </h2>

                <p>
                    This directory currently does not contain
                    any supported report files.
                </p>

                <a
                    href="index.php"
                    class="home-button"
                >
                    Back to Folders
                </a>

            </section>


        <?php endif; ?>


    </main>



    <footer>

        <span>
            REPORTHUB · REPORT ACCESS SYSTEM
        </span>

        <span>
            <?php echo count($reports); ?> DOCUMENTS
        </span>

    </footer>

</div>

</body>

</html>