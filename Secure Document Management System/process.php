<?php

session_start();


// ==========================================
// AUTHENTICATION CHECK
// ==========================================

if (
    !isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true
) {

    header("Location: login.php");
    exit;

}


// ==========================================
// CHECK FILE
// ==========================================

if (
    !isset($_FILES["document"])
) {

    die("No document selected.");

}


$file = $_FILES["document"];


// ==========================================
// UPLOAD ERROR
// ==========================================

if (
    $file["error"] !== UPLOAD_ERR_OK
) {

    die("Error while uploading the document.");

}


// ==========================================
// FILE DETAILS
// ==========================================

$originalName = $file["name"];

$fileSize = $file["size"];

$extension = strtolower(
    pathinfo(
        $originalName,
        PATHINFO_EXTENSION
    )
);


// ==========================================
// ALLOWED EXTENSIONS
// ==========================================

$allowedExtensions = [
    "pdf",
    "doc",
    "docx",
    "txt",
    "xlsx"
];


if (
    !in_array(
        $extension,
        $allowedExtensions
    )
) {

    die(
        "Invalid file type. Only PDF, DOC, DOCX, TXT and XLSX files are allowed."
    );

}


// ==========================================
// SIZE VALIDATION
// ==========================================

// 5 MB

$maxSize = 5 * 1024 * 1024;


if ($fileSize > $maxSize) {

    die(
        "File too large. Maximum allowed size is 5 MB."
    );

}


// ==========================================
// DIRECTORY
// ==========================================

$uploadDirectory = "secure_documents/";


if (!is_dir($uploadDirectory)) {

    mkdir(
        $uploadDirectory,
        0777,
        true
    );

}


// ==========================================
// CLEAN FILE NAME
// ==========================================

$baseName = pathinfo(
    $originalName,
    PATHINFO_FILENAME
);


$baseName = preg_replace(
    "/[^A-Za-z0-9_-]/",
    "_",
    $baseName
);


$cleanName =
    $baseName .
    "." .
    $extension;


// ==========================================
// DUPLICATE CHECK
// ==========================================

$destination =
    $uploadDirectory .
    $cleanName;


if (
    file_exists($destination)
) {

    die(
        "Duplicate file detected. This document already exists."
    );

}


// ==========================================
// MOVE FILE
// ==========================================

if (
    move_uploaded_file(
        $file["tmp_name"],
        $destination
    )
) {

    header(
        "Location: index.php"
    );

    exit;

} else {

    die(
        "Unable to securely store the document."
    );

}

?>