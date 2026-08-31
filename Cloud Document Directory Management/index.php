<?php

// ==========================================
// DIRECTORY SETTINGS
// ==========================================

$baseDir = "documents/";

$pdfDir   = $baseDir . "pdf/";
$wordDir  = $baseDir . "word/";
$excelDir = $baseDir . "excel/";
$otherDir = $baseDir . "other/";


// Create directories automatically

$directories = [
    $baseDir,
    $pdfDir,
    $wordDir,
    $excelDir,
    $otherDir
];

foreach ($directories as $directory) {

    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
}


// ==========================================
// SEARCH AND CATEGORY
// ==========================================

$search = trim($_GET["search"] ?? "");

$category = $_GET["category"] ?? "all";


// ==========================================
// ALLOWED FILE TYPES
// ==========================================

$pdfTypes = [
    "pdf"
];

$wordTypes = [
    "doc",
    "docx"
];

$excelTypes = [
    "xls",
    "xlsx",
    "csv"
];

$otherTypes = [
    "txt"
];


// ==========================================
// DOCUMENT ARRAY
// ==========================================

$documents = [];


// ==========================================
// FUNCTION TO READ DIRECTORY
// ==========================================

function readDocuments(
    $directory,
    $type,
    &$documents
) {

    if (!is_dir($directory)) {
        return;
    }

    $files = scandir($directory);

    foreach ($files as $file) {

        if ($file === "." || $file === "..") {
            continue;
        }

        $fullPath = $directory . $file;

        if (!is_file($fullPath)) {
            continue;
        }

        $extension = strtolower(
            pathinfo(
                $file,
                PATHINFO_EXTENSION
            )
        );

        $documents[] = [
            "name" => $file,
            "path" => $fullPath,
            "type" => $type,
            "extension" => strtoupper($extension),
            "size" => filesize($fullPath),
            "modified" => filemtime($fullPath)
        ];
    }
}


// ==========================================
// RETRIEVE DOCUMENTS
// ==========================================

readDocuments(
    $pdfDir,
    "pdf",
    $documents
);

readDocuments(
    $wordDir,
    "word",
    $documents
);

readDocuments(
    $excelDir,
    "excel",
    $documents
);

readDocuments(
    $otherDir,
    "other",
    $documents
);


// ==========================================
// FILTER DOCUMENTS
// ==========================================

$filteredDocuments = [];

foreach ($documents as $document) {

    $matchesSearch =
        $search === "" ||
        stripos(
            $document["name"],
            $search
        ) !== false;

    $matchesCategory =
        $category === "all" ||
        $document["type"] === $category;

    if (
        $matchesSearch &&
        $matchesCategory
    ) {

        $filteredDocuments[] =
            $document;
    }
}


// ==========================================
// STATISTICS
// ==========================================

$totalDocuments = count($documents);

$totalPDF = 0;
$totalWord = 0;
$totalExcel = 0;
$totalOther = 0;

foreach ($documents as $document) {

    switch ($document["type"]) {

        case "pdf":
            $totalPDF++;
            break;

        case "word":
            $totalWord++;
            break;

        case "excel":
            $totalExcel++;
            break;

        case "other":
            $totalOther++;
            break;
    }
}


// ==========================================
// MESSAGE
// ==========================================

$message = $_GET["message"] ?? "";

$messageType = $_GET["type"] ?? "";

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
        CloudDesk | Document Manager
    </title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>


<div class="page">


    <!-- =====================================
         HEADER
    ====================================== -->

    <header>

        <div class="brand">

            <div class="cloud-logo">
                ☁
            </div>

            <div>

                <h1>
                    CloudDesk
                </h1>

                <span>
                    DOCUMENT MANAGEMENT
                </span>

            </div>

        </div>


        <div class="cloud-status">

            <span class="status-dot"></span>

            SECURE CLOUD STORAGE

        </div>

    </header>



    <!-- =====================================
         HERO
    ====================================== -->

    <section class="hero">

        <div class="hero-text">

            <span class="hero-tag">
                YOUR DIGITAL WORKSPACE
            </span>


            <h2>

                Everything you need,
                <strong>in one place.</strong>

            </h2>


            <p>

                Upload, organize, retrieve and manage
                your important documents with ease.

            </p>


            <a
                href="#upload"
                class="hero-button"
            >
                + Upload Document
            </a>

        </div>


        <div class="cloud-illustration">

            <div class="big-cloud">
                ☁
            </div>

            <div class="floating-folder folder-one">
                📁
            </div>

            <div class="floating-folder folder-two">
                📄
            </div>

            <div class="floating-folder folder-three">
                📊
            </div>

        </div>

    </section>



    <!-- =====================================
         MESSAGE
    ====================================== -->

    <?php if ($message !== ""): ?>

        <div
            class="message
            <?php echo htmlspecialchars($messageType); ?>"
        >

            <span>

                <?php

                echo $messageType === "success"
                    ? "✓"
                    : "!";

                ?>

            </span>


            <?php

            echo htmlspecialchars($message);

            ?>

        </div>

    <?php endif; ?>



    <!-- =====================================
         STATISTICS
    ====================================== -->

    <section class="stats">


        <div class="stat-card">

            <div class="stat-icon total">
                ☁
            </div>

            <div>

                <span>
                    TOTAL DOCUMENTS
                </span>

                <h3>
                    <?php echo $totalDocuments; ?>
                </h3>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon pdf">
                PDF
            </div>

            <div>

                <span>
                    PDF FILES
                </span>

                <h3>
                    <?php echo $totalPDF; ?>
                </h3>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon word">
                W
            </div>

            <div>

                <span>
                    WORD FILES
                </span>

                <h3>
                    <?php echo $totalWord; ?>
                </h3>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon excel">
                X
            </div>

            <div>

                <span>
                    EXCEL FILES
                </span>

                <h3>
                    <?php echo $totalExcel; ?>
                </h3>

            </div>

        </div>

    </section>



    <!-- =====================================
         MAIN
    ====================================== -->

    <main>


        <!-- =================================
             DOCUMENT LIBRARY
        ================================== -->

        <section class="library-header">

            <div>

                <span>
                    MY DOCUMENTS
                </span>

                <h2>
                    Document Library
                </h2>

            </div>


            <div class="filters">

                <a
                    href="index.php?category=all"
                    class="<?php
                        echo $category === "all"
                            ? "active"
                            : "";
                    ?>"
                >
                    All
                </a>


                <a
                    href="index.php?category=pdf"
                    class="<?php
                        echo $category === "pdf"
                            ? "active"
                            : "";
                    ?>"
                >
                    PDF
                </a>


                <a
                    href="index.php?category=word"
                    class="<?php
                        echo $category === "word"
                            ? "active"
                            : "";
                    ?>"
                >
                    Word
                </a>


                <a
                    href="index.php?category=excel"
                    class="<?php
                        echo $category === "excel"
                            ? "active"
                            : "";
                    ?>"
                >
                    Excel
                </a>

            </div>

        </section>



        <!-- =================================
             SEARCH
        ================================== -->

        <form
            action="index.php"
            method="GET"
            class="document-search"
        >

            <span>
                ⌕
            </span>


            <input
                type="text"
                name="search"
                value="<?php
                    echo htmlspecialchars($search);
                ?>"
                placeholder="Search your documents..."
            >


            <input
                type="hidden"
                name="category"
                value="<?php
                    echo htmlspecialchars($category);
                ?>"
            >


            <button type="submit">
                Search
            </button>

        </form>



        <!-- =================================
             DOCUMENT CARDS
        ================================== -->

        <?php if (count($filteredDocuments) > 0): ?>


            <section class="document-grid">


                <?php foreach (
                    $filteredDocuments
                    as $document
                ): ?>


                    <div class="document-card">


                        <div class="document-top">


                            <div
                                class="
                                document-icon
                                <?php
                                    echo $document["type"];
                                ?>"
                            >

                                <?php

                                if (
                                    $document["type"]
                                    === "pdf"
                                ) {

                                    echo "PDF";

                                } elseif (
                                    $document["type"]
                                    === "word"
                                ) {

                                    echo "W";

                                } elseif (
                                    $document["type"]
                                    === "excel"
                                ) {

                                    echo "X";

                                } else {

                                    echo "TXT";

                                }

                                ?>

                            </div>


                            <span class="extension">

                                <?php

                                echo $document[
                                    "extension"
                                ];

                                ?>

                            </span>


                        </div>


                        <h3
                            title="<?php
                                echo htmlspecialchars(
                                    $document["name"]
                                );
                            ?>"
                        >

                            <?php

                            echo htmlspecialchars(
                                $document["name"]
                            );

                            ?>

                        </h3>


                        <p class="document-meta">

                            <?php

                            echo round(
                                $document["size"] / 1024,
                                1
                            );

                            ?>

                            KB

                            &nbsp; • &nbsp;

                            <?php

                            echo date(
                                "d M Y",
                                $document["modified"]
                            );

                            ?>

                        </p>


                        <div class="document-actions">


                            <a
                                href="<?php
                                    echo htmlspecialchars(
                                        $document["path"]
                                    );
                                ?>"
                                target="_blank"
                                class="open-btn"
                            >
                                Open
                            </a>


                            <a
                                href="<?php
                                    echo htmlspecialchars(
                                        $document["path"]
                                    );
                                ?>"
                                download
                                class="download-btn"
                            >
                                ↓
                            </a>


                            <a
                                href="process.php?action=delete&file=<?php
                                    echo urlencode(
                                        $document["path"]
                                    );
                                ?>"
                                class="delete-btn"
                                onclick="
                                    return confirm(
                                        'Are you sure you want to delete this document?'
                                    );
                                "
                            >
                                ×
                            </a>

                        </div>

                    </div>


                <?php endforeach; ?>


            </section>


        <?php else: ?>


            <section class="empty">

                <div class="empty-icon">
                    ☁
                </div>

                <h3>
                    No documents found
                </h3>

                <p>
                    Upload a document or try another search.
                </p>

            </section>


        <?php endif; ?>



        <!-- =================================
             UPLOAD SECTION
        ================================== -->

        <section
            class="upload-section"
            id="upload"
        >


            <div class="upload-content">


                <div class="upload-icon">
                    ↑
                </div>


                <span>
                    ADD NEW DOCUMENT
                </span>


                <h2>
                    Upload to your cloud
                </h2>


                <p>
                    Files will automatically be organized
                    into the appropriate document folder.
                </p>


                <form
                    action="process.php"
                    method="POST"
                    enctype="multipart/form-data"
                    class="upload-form"
                >


                    <input
                        type="file"
                        name="document_file"
                        accept="
                            .pdf,
                            .doc,
                            .docx,
                            .xls,
                            .xlsx,
                            .csv,
                            .txt
                        "
                        required
                    >


                    <button type="submit">
                        Upload Document →
                    </button>


                </form>


                <small>
                    Supported:
                    PDF · DOC · DOCX · XLS · XLSX · CSV · TXT
                </small>

            </div>


        </section>



        <!-- =================================
             STORAGE STRUCTURE
        ================================== -->

        <section class="storage-section">


            <div class="storage-heading">

                <span>
                    STORAGE ORGANIZATION
                </span>

                <h2>
                    Your Document Folders
                </h2>

            </div>


            <div class="folder-grid">


                <div class="folder-card">

                    <div class="folder-icon pdf-folder">
                        PDF
                    </div>

                    <div>

                        <h3>
                            PDF Documents
                        </h3>

                        <p>
                            documents / pdf /
                        </p>

                        <strong>
                            <?php echo $totalPDF; ?> files
                        </strong>

                    </div>

                </div>


                <div class="folder-card">

                    <div class="folder-icon word-folder">
                        W
                    </div>

                    <div>

                        <h3>
                            Word Documents
                        </h3>

                        <p>
                            documents / word /
                        </p>

                        <strong>
                            <?php echo $totalWord; ?> files
                        </strong>

                    </div>

                </div>


                <div class="folder-card">

                    <div class="folder-icon excel-folder">
                        X
                    </div>

                    <div>

                        <h3>
                            Excel Documents
                        </h3>

                        <p>
                            documents / excel /
                        </p>

                        <strong>
                            <?php echo $totalExcel; ?> files
                        </strong>

                    </div>

                </div>


                <div class="folder-card">

                    <div class="folder-icon other-folder">
                        TXT
                    </div>

                    <div>

                        <h3>
                            Other Documents
                        </h3>

                        <p>
                            documents / other /
                        </p>

                        <strong>
                            <?php echo $totalOther; ?> files
                        </strong>

                    </div>

                </div>


            </div>

        </section>


    </main>



    <!-- =====================================
         FOOTER
    ====================================== -->

    <footer>

        <span>
            CLOUDDESK · PHP DOCUMENT MANAGEMENT
        </span>

        <span>
            scandir() · mkdir() · move_uploaded_file() · unlink()
        </span>

    </footer>


</div>

</body>

</html>