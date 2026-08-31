<?php

session_start();


// ==================================================
// UPLOAD MEDICAL RECORD
// ==================================================

if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_POST["upload_record"])
) {


    // Check authentication

    if (
        !isset($_SESSION["logged_in"]) ||
        $_SESSION["logged_in"] !== true
    ) {

        header("Location: index.php");

        exit;
    }


    // Upload folder

    $uploadFolder = "private/";


    // Create folder if missing

    if (!is_dir($uploadFolder)) {

        mkdir($uploadFolder, 0755, true);
    }


    // Check file

    if (
        !isset($_FILES["medical_file"]) ||
        $_FILES["medical_file"]["error"] !== UPLOAD_ERR_OK
    ) {

        header("Location: upload.php?error=upload");

        exit;
    }


    $file = $_FILES["medical_file"];


    // Maximum 5 MB

    $maxSize = 5 * 1024 * 1024;

    if ($file["size"] > $maxSize) {

        header("Location: upload.php?error=size");

        exit;
    }


    // Get extension

    $extension =
        strtolower(
            pathinfo(
                $file["name"],
                PATHINFO_EXTENSION
            )
        );


    // Only PDF allowed

    if ($extension !== "pdf") {

        header("Location: upload.php?error=type");

        exit;
    }


    // Verify MIME type

    $allowedMime = "application/pdf";

    $fileInfo =
        finfo_open(FILEINFO_MIME_TYPE);

    $mimeType =
        finfo_file(
            $fileInfo,
            $file["tmp_name"]
        );

    finfo_close($fileInfo);


    if ($mimeType !== $allowedMime) {

        header("Location: upload.php?error=invalid");

        exit;
    }


    // Generate random filename

    $safeFileName =
        bin2hex(random_bytes(16))
        . ".pdf";


    $destination =
        $uploadFolder . $safeFileName;


    // Prevent duplicate filename

    if (file_exists($destination)) {

        header("Location: upload.php?error=duplicate");

        exit;
    }


    // Move uploaded file

    if (
        move_uploaded_file(
            $file["tmp_name"],
            $destination
        )
    ) {

        header("Location: dashboard.php?success=1");

        exit;

    } else {

        header("Location: upload.php?error=failed");

        exit;
    }
}



// ==================================================
// LOGIN
// ==================================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: index.php");

    exit;
}


$username =
    trim($_POST["username"] ?? "");

$password =
    $_POST["password"] ?? "";


// Demo credentials

$validUsername = "doctor";

$validPassword = "med123";


if (
    $username === $validUsername &&
    $password === $validPassword
) {

    // Regenerate session ID

    session_regenerate_id(true);


    // Session data

    $_SESSION["logged_in"] = true;

    $_SESSION["username"] = $username;

    $_SESSION["role"] = "Medical Staff";

    $_SESSION["login_time"] =
        date("d-m-Y h:i:s A");


    // Redirect

    header("Location: dashboard.php");

    exit;
}


// Invalid login

header("Location: index.php?error=1");

exit;

?>