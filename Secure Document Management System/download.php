<?php

session_start();


// ==========================================
// AUTHENTICATION
// ==========================================

if (
    !isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true
) {

    http_response_code(403);

    die(
        "Unauthorized access."
    );

}


// ==========================================
// CHECK FILE REQUEST
// ==========================================

if (
    !isset($_GET["file"])
) {

    http_response_code(400);

    die(
        "No document selected."
    );

}


$file = basename(
    $_GET["file"]
);


// ==========================================
// DOCUMENT DIRECTORY
// ==========================================

$directory = "secure_documents/";

$filePath =
    $directory .
    $file;


// ==========================================
// CHECK FILE
// ==========================================

if (
    !is_file($filePath)
) {

    http_response_code(404);

    die(
        "Document not found."
    );

}


// ==========================================
// SEND FILE
// ==========================================

$mimeType = mime_content_type(
    $filePath
);


header(
    "Content-Type: " . $mimeType
);

header(
    "Content-Disposition: attachment; filename=\"" .
    basename($file) .
    "\""
);

header(
    "Content-Length: " .
    filesize($filePath)
);


readfile($filePath);

exit;

?>