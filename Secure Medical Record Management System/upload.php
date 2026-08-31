<?php

session_start();


// Protect page

if (
    !isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true
) {

    header("Location: index.php");

    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        MedVault | Upload Record
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body class="dashboard-page">


<header class="topbar">

    <div class="brand">

        <div class="small-logo">
            +
        </div>

        <div>

            <strong>
                MedVault
            </strong>

            <span>
                SECURE MEDICAL RECORDS
            </span>

        </div>

    </div>


    <a href="dashboard.php"
       class="back-link">

        ← Dashboard

    </a>

</header>


<main class="upload-page">


<div class="upload-card">

    <div class="upload-symbol">
        ↑
    </div>

    <span class="label">
        SECURE DOCUMENT STORAGE
    </span>

    <h1>
        Upload Medical Record
    </h1>

    <p>
        Select a PDF medical report to securely
        add it to the protected records area.
    </p>


    <form
        action="process.php"
        method="POST"
        enctype="multipart/form-data"
    >

        <input
            type="hidden"
            name="upload_record"
            value="1"
        >


        <div class="file-area">

            <label for="medical_file">

                <span class="file-upload-icon">
                    +
                </span>

                <strong>
                    Choose medical report
                </strong>

                <small>
                    PDF files only · Maximum 5 MB
                </small>

            </label>

            <input
                type="file"
                id="medical_file"
                name="medical_file"
                accept=".pdf"
                required
            >

        </div>


        <button type="submit"
                class="secure-upload">

            Securely Upload Record →

        </button>

    </form>


    <a href="dashboard.php"
       class="cancel">

        Cancel

    </a>

</div>


</main>

</body>
</html>