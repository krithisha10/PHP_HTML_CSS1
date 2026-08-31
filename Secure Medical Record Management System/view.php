<?php

session_start();


// ==========================================
// AUTHENTICATION CHECK
// ==========================================

if (
    !isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true
) {

    header("Location: index.php");

    exit;
}


// ==========================================
// GET FILE
// ==========================================

$file =
    $_GET["file"] ?? "";


// Prevent path traversal

$file =
    basename($file);


$filePath =
    __DIR__ .
    DIRECTORY_SEPARATOR .
    "private" .
    DIRECTORY_SEPARATOR .
    $file;


// Check file exists

if (
    $file === "" ||
    !file_exists($filePath) ||
    !is_file($filePath)
) {

    http_response_code(404);

    echo "Medical record not found.";

    exit;
}


// Only allow PDF

$extension =
    strtolower(
        pathinfo(
            $file,
            PATHINFO_EXTENSION
        )
    );


if ($extension !== "pdf") {

    http_response_code(403);

    echo "Access denied.";

    exit;
}


// ==========================================
// SEND PROTECTED FILE
// ==========================================

header("Content-Type: application/pdf");

header(
    "Content-Disposition: inline; filename=\""
    . basename($file)
    . "\""
);

header("Content-Length: " . filesize($file));

header("X-Content-Type-Options: nosniff");

readfile($filePath);

exit;

?>