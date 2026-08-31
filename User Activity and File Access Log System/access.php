<?php

session_start();


// ==========================================
// AUTHENTICATION
// ==========================================

if (
    !isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true
) {

    header("Location: process.php");

    exit;

}


// ==========================================
// GET FILE
// ==========================================

$file =
    $_GET["file"] ?? "";


// Only allow known files

$allowedFiles = [

    "academic_report.txt",

    "project_report.txt",

    "attendance_report.txt"

];


if (
    !in_array(
        $file,
        $allowedFiles
    )
) {

    die("Unauthorized file request.");

}


// ==========================================
// CREATE DOCUMENT DIRECTORY
// ==========================================

if (!is_dir("documents")) {

    mkdir(
        "documents",
        0777,
        true
    );

}


// ==========================================
// FILE PATH
// ==========================================

$filePath =
    "documents/" . $file;


// ==========================================
// CREATE SAMPLE FILE IF MISSING
// ==========================================

if (!file_exists($filePath)) {

    $content = "";


    if (
        $file === "academic_report.txt"
    ) {

        $content =
            "ACADEMIC REPORT\n\n" .
            "Student: Krithisha\n" .
            "Department: Computer Science\n" .
            "Performance: Excellent\n";

    }


    elseif (
        $file === "project_report.txt"
    ) {

        $content =
            "PROJECT REPORT\n\n" .
            "Project: Activity Monitor\n" .
            "Technology: PHP\n" .
            "Status: Completed\n";

    }


    elseif (
        $file === "attendance_report.txt"
    ) {

        $content =
            "ATTENDANCE REPORT\n\n" .
            "Employee/Student: Krithisha\n" .
            "Attendance: 95%\n" .
            "Status: Regular\n";

    }


    file_put_contents(
        $filePath,
        $content,
        LOCK_EX
    );

}


// ==========================================
// LOG FILE ACCESS
// ==========================================

$accessTime =
    date(
        "d-m-Y h:i:s A"
    );


$accessRecord =
    "User: " .
    $_SESSION["username"] .
    " | File: " .
    $file .
    " | Accessed: " .
    $accessTime .
    PHP_EOL;


file_put_contents(
    "logs/file_access.txt",
    $accessRecord,
    FILE_APPEND | LOCK_EX
);


// ==========================================
// READ FILE
// ==========================================

$content =
    file_get_contents(
        $filePath
    );

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
        Document Access
    </title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>


<div class="access-page">


    <div class="access-card">


        <div class="success-icon">
            ✓
        </div>


        <span>
            ACCESS LOGGED
        </span>


        <h1>
            <?php
            echo htmlspecialchars(
                $file
            );
            ?>
        </h1>


        <p class="access-info">

            Accessed by
            <strong>
                <?php
                echo htmlspecialchars(
                    $_SESSION["username"]
                );
                ?>
            </strong>

            on

            <?php
            echo $accessTime;
            ?>

        </p>


        <div class="document-content">

            <pre><?php
                echo htmlspecialchars(
                    $content
                );
            ?></pre>

        </div>


        <a
            href="index.php"
            class="back-dashboard"
        >
            ← Back to Dashboard
        </a>


    </div>


</div>


</body>

</html>