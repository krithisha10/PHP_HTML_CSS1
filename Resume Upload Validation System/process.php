<?php

// ==========================================
// RESUME DIRECTORY
// ==========================================

$uploadDir = "resumes/";


// Create directory if it doesn't exist

if (!is_dir($uploadDir)) {

    mkdir(
        $uploadDir,
        0777,
        true
    );
}


// ==========================================
// CHECK FILE
// ==========================================

if (
    !isset($_FILES["resume"])
) {

    header(
        "Location: index.php?type=error&message="
        . urlencode(
            "No resume was selected."
        )
    );

    exit;
}


$file = $_FILES["resume"];


// ==========================================
// CHECK UPLOAD ERROR
// ==========================================

if (
    $file["error"] !== UPLOAD_ERR_OK
) {

    $errorMessage = "An error occurred during upload.";

    switch ($file["error"]) {

        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:

            $errorMessage =
                "The uploaded file is too large.";

            break;

        case UPLOAD_ERR_PARTIAL:

            $errorMessage =
                "The file was only partially uploaded.";

            break;

        case UPLOAD_ERR_NO_FILE:

            $errorMessage =
                "Please select a resume.";

            break;
    }


    header(
        "Location: index.php?type=error&message="
        . urlencode($errorMessage)
    );

    exit;
}


// ==========================================
// FILE INFORMATION
// ==========================================

$originalName = $file["name"];

$fileSize = $file["size"];

$fileExtension = strtolower(
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
    "docx"
];


// ==========================================
// VALIDATE EXTENSION
// ==========================================

if (
    !in_array(
        $fileExtension,
        $allowedExtensions
    )
) {

    header(
        "Location: index.php?type=error&message="
        . urlencode(
            "Invalid file type. Only PDF, DOC and DOCX files are accepted."
        )
    );

    exit;
}


// ==========================================
// FILE SIZE VALIDATION
// ==========================================

// 5 MB

$maxSize = 5 * 1024 * 1024;


if ($fileSize > $maxSize) {

    header(
        "Location: index.php?type=error&message="
        . urlencode(
            "Invalid file size. Resume must be smaller than 5 MB."
        )
    );

    exit;
}


// ==========================================
// MIME TYPE VALIDATION
// ==========================================

$finfo = finfo_open(
    FILEINFO_MIME_TYPE
);

$mimeType = finfo_file(
    $finfo,
    $file["tmp_name"]
);

finfo_close($finfo);


$allowedMimeTypes = [

    "pdf" => [
        "application/pdf"
    ],

    "doc" => [
        "application/msword"
    ],

    "docx" => [
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
    ]

];


if (
    !isset(
        $allowedMimeTypes[
            $fileExtension
        ]
    ) ||
    !in_array(
        $mimeType,
        $allowedMimeTypes[
            $fileExtension
        ]
    )
) {

    header(
        "Location: index.php?type=error&message="
        . urlencode(
            "Invalid resume content detected."
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


if ($fileName === "") {

    $fileName = "resume";
}


// Add timestamp

$newFileName =
    $fileName .
    "_" .
    date("Ymd_His") .
    "." .
    $fileExtension;


$destination =
    $uploadDir .
    $newFileName;


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
        "Location: index.php?type=success&message="
        . urlencode(
            "Your resume has been uploaded and validated successfully."
        )
    );

    exit;

} else {

    header(
        "Location: index.php?type=error&message="
        . urlencode(
            "Unable to save the resume. Please try again."
        )
    );

    exit;
}

?>