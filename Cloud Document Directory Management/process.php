<?php

// ==========================================
// DIRECTORY SETTINGS
// ==========================================

$baseDir = "documents/";

$pdfDir   = $baseDir . "pdf/";
$wordDir  = $baseDir . "word/";
$excelDir = $baseDir . "excel/";
$otherDir = $baseDir . "other/";


// ==========================================
// CREATE DIRECTORIES
// ==========================================

$directories = [
    $baseDir,
    $pdfDir,
    $wordDir,
    $excelDir,
    $otherDir
];

foreach ($directories as $directory) {

    if (!is_dir($directory)) {

        mkdir(
            $directory,
            0777,
            true
        );
    }
}


// ==========================================
// DELETE DOCUMENT
// ==========================================

if (
    isset($_GET["action"]) &&
    $_GET["action"] === "delete"
) {

    $file = $_GET["file"] ?? "";


    // Security check

    $realBase =
        realpath($baseDir);

    $realFile =
        realpath($file);


    if (
        $realFile !== false &&
        $realBase !== false &&
        strpos(
            $realFile,
            $realBase
        ) === 0 &&
        is_file($realFile)
    ) {

        if (unlink($realFile)) {

            header(
                "Location: index.php?type=success&message="
                . urlencode(
                    "Document deleted successfully."
                )
            );

            exit;

        } else {

            header(
                "Location: index.php?type=error&message="
                . urlencode(
                    "Unable to delete the document."
                )
            );

            exit;
        }

    } else {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "Invalid document selected."
            )
        );

        exit;
    }
}


// ==========================================
// CHECK UPLOAD
// ==========================================

if (
    !isset($_FILES["document_file"]) ||
    $_FILES["document_file"]["error"]
    !== UPLOAD_ERR_OK
) {

    header(
        "Location: index.php?type=error&message="
        . urlencode(
            "Please select a document."
        )
    );

    exit;
}


$file = $_FILES["document_file"];


// ==========================================
// FILE INFORMATION
// ==========================================

$originalName = $file["name"];

$extension = strtolower(
    pathinfo(
        $originalName,
        PATHINFO_EXTENSION
    )
);


// ==========================================
// ALLOWED TYPES
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
// DETERMINE DESTINATION
// ==========================================

if (
    in_array(
        $extension,
        $pdfTypes
    )
) {

    $targetDir = $pdfDir;

} elseif (
    in_array(
        $extension,
        $wordTypes
    )
) {

    $targetDir = $wordDir;

} elseif (
    in_array(
        $extension,
        $excelTypes
    )
) {

    $targetDir = $excelDir;

} elseif (
    in_array(
        $extension,
        $otherTypes
    )
) {

    $targetDir = $otherDir;

} else {

    header(
        "Location: index.php?type=error&message="
        . urlencode(
            "Unsupported document type."
        )
    );

    exit;
}


// ==========================================
// FILE SIZE VALIDATION
// ==========================================

// Maximum size = 10 MB

$maxSize = 10 * 1024 * 1024;

if ($file["size"] > $maxSize) {

    header(
        "Location: index.php?type=error&message="
        . urlencode(
            "File size must be below 10 MB."
        )
    );

    exit;
}


// ==========================================
// CREATE SAFE FILE NAME
// ==========================================

$fileName = pathinfo(
    $originalName,
    PATHINFO_FILENAME
);


$fileName = preg_replace(
    "/[^A-Za-z0-9_-]/",
    "_",
    $fileName
);


$newName =
    $fileName .
    "_" .
    date("Ymd_His") .
    "." .
    $extension;


$targetPath =
    $targetDir . $newName;


// ==========================================
// UPLOAD FILE
// ==========================================

if (
    move_uploaded_file(
        $file["tmp_name"],
        $targetPath
    )
) {

    header(
        "Location: index.php?type=success&message="
        . urlencode(
            "Document uploaded successfully."
        )
    );

    exit;

} else {

    header(
        "Location: index.php?type=error&message="
        . urlencode(
            "Unable to upload document."
        )
    );

    exit;
}

?>