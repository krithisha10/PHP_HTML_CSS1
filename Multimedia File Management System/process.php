<?php

// ==========================================
// DIRECTORY SETTINGS
// ==========================================

$imageDir = "media/images/";
$videoDir = "media/videos/";

// Create directories automatically
if (!is_dir("media")) {
    mkdir("media", 0777, true);
}

if (!is_dir($imageDir)) {
    mkdir($imageDir, 0777, true);
}

if (!is_dir($videoDir)) {
    mkdir($videoDir, 0777, true);
}


// ==========================================
// SEARCH AND CATEGORY
// ==========================================

$search = trim($_GET["search"] ?? "");

$category = $_GET["category"] ?? "all";


// ==========================================
// ALLOWED FILE TYPES
// ==========================================

$imageTypes = [
    "jpg",
    "jpeg",
    "png",
    "gif",
    "webp"
];

$videoTypes = [
    "mp4",
    "webm",
    "mov",
    "avi"
];


// ==========================================
// MEDIA ARRAY
// ==========================================

$media = [];


// ==========================================
// READ IMAGE DIRECTORY
// ==========================================

if (is_dir($imageDir)) {

    $files = scandir($imageDir);

    foreach ($files as $file) {

        if ($file == "." || $file == "..") {
            continue;
        }

        $extension = strtolower(
            pathinfo($file, PATHINFO_EXTENSION)
        );

        if (in_array($extension, $imageTypes)) {

            $media[] = [
                "name" => $file,
                "path" => $imageDir . $file,
                "type" => "image",
                "extension" => strtoupper($extension),
                "size" => filesize($imageDir . $file),
                "modified" => filemtime($imageDir . $file)
            ];
        }
    }
}


// ==========================================
// READ VIDEO DIRECTORY
// ==========================================

if (is_dir($videoDir)) {

    $files = scandir($videoDir);

    foreach ($files as $file) {

        if ($file == "." || $file == "..") {
            continue;
        }

        $extension = strtolower(
            pathinfo($file, PATHINFO_EXTENSION)
        );

        if (in_array($extension, $videoTypes)) {

            $media[] = [
                "name" => $file,
                "path" => $videoDir . $file,
                "type" => "video",
                "extension" => strtoupper($extension),
                "size" => filesize($videoDir . $file),
                "modified" => filemtime($videoDir . $file)
            ];
        }
    }
}


// ==========================================
// FILTER MEDIA
// ==========================================

$filteredMedia = [];

foreach ($media as $item) {

    // Search condition
    $matchesSearch =
        $search === "" ||
        stripos($item["name"], $search) !== false;

    // Category condition
    $matchesCategory =
        $category === "all" ||
        $item["type"] === $category;

    if ($matchesSearch && $matchesCategory) {

        $filteredMedia[] = $item;
    }
}


// ==========================================
// STATISTICS
// ==========================================

$totalFiles = count($media);

$totalImages = 0;

$totalVideos = 0;

foreach ($media as $item) {

    if ($item["type"] === "image") {
        $totalImages++;
    }

    if ($item["type"] === "video") {
        $totalVideos++;
    }
}


// ==========================================
// MESSAGE FROM PROCESS.PHP
// ==========================================

$message = $_GET["message"] ?? "";

$type = $_GET["type"] ?? "";

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
        MediaVault | Multimedia File Manager
    </title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<div class="page">


    <!-- ==================================
         HEADER
    =================================== -->

    <header>

        <div class="logo-area">

            <div class="logo">
                ◈
            </div>

            <div>

                <h1>
                    MediaVault
                </h1>

                <span>
                    MULTIMEDIA FILE MANAGER
                </span>

            </div>

        </div>


        <div class="header-right">

            <span class="online-dot"></span>

            MEDIA LIBRARY ONLINE

        </div>

    </header>



    <!-- ==================================
         HERO SECTION
    =================================== -->

    <section class="hero">

        <div class="hero-content">

            <div class="hero-label">
                DIGITAL MEDIA LIBRARY
            </div>


            <h2>

                Find your media.

                <strong>
                    Instantly.
                </strong>

            </h2>


            <p>

                Organize, search and retrieve images and
                videos from one centralized multimedia library.

            </p>


            <!-- SEARCH FORM -->

            <form
                action="index.php"
                method="GET"
                class="search-box"
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
                    placeholder="Search media files..."
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

        </div>


        <!-- DECORATIVE MEDIA CARDS -->

        <div class="media-art">

            <div class="art-card card-one">

                <div class="art-symbol">
                    ▧
                </div>

            </div>


            <div class="art-card card-two">

                <div class="play-symbol">
                    ▶
                </div>

            </div>


            <div class="art-card card-three">

                <div class="art-symbol">
                    ✦
                </div>

            </div>

        </div>

    </section>



    <!-- ==================================
         MESSAGE
    =================================== -->

    <?php if ($message != ""): ?>

        <div class="message <?php echo $type; ?>">

            <span>

                <?php

                if ($type === "success") {
                    echo "✓";
                } else {
                    echo "!";
                }

                ?>

            </span>


            <?php

            echo htmlspecialchars($message);

            ?>

        </div>

    <?php endif; ?>



    <!-- ==================================
         STATISTICS
    =================================== -->

    <section class="stats">


        <!-- TOTAL -->

        <div class="stat-card">

            <div class="stat-icon all">
                ◈
            </div>


            <div>

                <span>
                    TOTAL MEDIA
                </span>


                <h3>
                    <?php echo $totalFiles; ?>
                </h3>

            </div>

        </div>



        <!-- IMAGES -->

        <div class="stat-card">

            <div class="stat-icon image">
                ▧
            </div>


            <div>

                <span>
                    IMAGES
                </span>


                <h3>
                    <?php echo $totalImages; ?>
                </h3>

            </div>

        </div>



        <!-- VIDEOS -->

        <div class="stat-card">

            <div class="stat-icon video">
                ▶
            </div>


            <div>

                <span>
                    VIDEOS
                </span>


                <h3>
                    <?php echo $totalVideos; ?>
                </h3>

            </div>

        </div>

    </section>



    <!-- ==================================
         MAIN CONTENT
    =================================== -->

    <main>


        <!-- ==================================
             MULTIMEDIA COLLECTION TOOLBAR
        =================================== -->

        <section class="toolbar">


            <div>

                <span class="library-label">
                    YOUR LIBRARY
                </span>


                <h2>
                    Multimedia Collection
                </h2>

            </div>


            <!-- CATEGORY FILTERS -->

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
                    href="index.php?category=image"
                    class="<?php

                        echo $category === "image"
                            ? "active"
                            : "";

                    ?>"
                >
                    Images
                </a>


                <a
                    href="index.php?category=video"
                    class="<?php

                        echo $category === "video"
                            ? "active"
                            : "";

                    ?>"
                >
                    Videos
                </a>

            </div>

        </section>



        <!-- ==================================
             MEDIA GRID
        =================================== -->

        <?php if (count($filteredMedia) > 0): ?>


            <section class="media-grid">


                <?php foreach ($filteredMedia as $item): ?>


                    <div class="media-card">


                        <!-- MEDIA PREVIEW -->

                        <div class="preview">


                            <?php if ($item["type"] === "image"): ?>


                                <img
                                    src="<?php
                                        echo htmlspecialchars(
                                            $item["path"]
                                        );
                                    ?>"
                                    alt="<?php
                                        echo htmlspecialchars(
                                            $item["name"]
                                        );
                                    ?>"
                                >


                                <div
                                    class="type-badge image-badge"
                                >
                                    IMAGE
                                </div>


                            <?php else: ?>


                                <video controls>

                                    <source
                                        src="<?php
                                            echo htmlspecialchars(
                                                $item["path"]
                                            );
                                        ?>"
                                    >

                                    Your browser does not
                                    support video.

                                </video>


                                <div
                                    class="type-badge video-badge"
                                >
                                    VIDEO
                                </div>


                            <?php endif; ?>


                        </div>



                        <!-- MEDIA DETAILS -->

                        <div class="media-details">


                            <div class="file-icon">

                                <?php

                                echo $item["type"] === "image"
                                    ? "▧"
                                    : "▶";

                                ?>

                            </div>


                            <div class="file-info">


                                <h3
                                    title="<?php
                                        echo htmlspecialchars(
                                            $item["name"]
                                        );
                                    ?>"
                                >

                                    <?php

                                    echo htmlspecialchars(
                                        $item["name"]
                                    );

                                    ?>

                                </h3>


                                <p>

                                    <?php
                                    echo $item["extension"];
                                    ?>

                                    ·

                                    <?php

                                    echo round(
                                        $item["size"] / 1024,
                                        1
                                    );

                                    ?>

                                    KB

                                </p>


                            </div>


                            <!-- OPEN FILE -->

                            <a
                                href="<?php
                                    echo htmlspecialchars(
                                        $item["path"]
                                    );
                                ?>"
                                target="_blank"
                                class="view-button"
                            >
                                ↗
                            </a>


                        </div>

                    </div>


                <?php endforeach; ?>


            </section>


        <?php else: ?>


            <!-- EMPTY STATE -->

            <section class="empty">


                <div class="empty-icon">
                    ◇
                </div>


                <h3>
                    No media files found
                </h3>


                <p>

                    Add images or videos to the appropriate
                    media folder or upload a file below.

                </p>


            </section>


        <?php endif; ?>



        <!-- ==================================
             UPLOAD MULTIMEDIA
        =================================== -->

        <section class="upload-panel">


            <div class="upload-heading">


                <div class="upload-icon">
                    ↑
                </div>


                <div>

                    <span>
                        ADD TO LIBRARY
                    </span>


                    <h2>
                        Upload Multimedia
                    </h2>

                </div>


            </div>



            <!-- UPLOAD FORM -->

            <form
                action="process.php"
                method="POST"
                enctype="multipart/form-data"
                class="upload-form"
            >


                <input
                    type="file"
                    name="media_file"
                    accept="
                        image/*,
                        video/*,
                        .mp4,
                        .webm,
                        .mov,
                        .avi
                    "
                    required
                >


                <button type="submit">
                    Upload File →
                </button>


            </form>



            <p>

                Supported images:
                JPG, JPEG, PNG, GIF, WEBP

                &nbsp; · &nbsp;

                Supported videos:
                MP4, WEBM, MOV, AVI

            </p>


        </section>



        <!-- ==================================
             DIRECTORY INFORMATION
        =================================== -->

        <section class="directory-info">


            <div class="directory-title">


                <div class="directory-icon">
                    ▤
                </div>


                <div>

                    <span>
                        FILE ORGANIZATION
                    </span>


                    <h2>
                        Media Directory Structure
                    </h2>

                </div>


            </div>



            <div class="directory-grid">


                <!-- IMAGE DIRECTORY -->

                <div class="directory-card">


                    <div class="dir-icon image-dir">
                        ▧
                    </div>


                    <div>

                        <h3>
                            Images
                        </h3>


                        <p>
                            media / images /
                        </p>


                        <strong>

                            <?php
                            echo $totalImages;
                            ?>

                            files

                        </strong>

                    </div>


                </div>



                <!-- VIDEO DIRECTORY -->

                <div class="directory-card">


                    <div class="dir-icon video-dir">
                        ▶
                    </div>


                    <div>

                        <h3>
                            Videos
                        </h3>


                        <p>
                            media / videos /
                        </p>


                        <strong>

                            <?php
                            echo $totalVideos;
                            ?>

                            files

                        </strong>

                    </div>


                </div>


            </div>


        </section>


    </main>



    <!-- ==================================
         FOOTER
    =================================== -->

    <footer>


        <span>
            MEDIAVAULT · PHP MULTIMEDIA MANAGEMENT
        </span>


        <span>
            scandir() · pathinfo() · filesize() · filemtime()
        </span>


    </footer>


</div>

</body>

</html>