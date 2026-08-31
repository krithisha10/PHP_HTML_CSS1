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


// Create records folder if necessary

$recordFolder = "private/";

if (!is_dir($recordFolder)) {

    mkdir($recordFolder, 0755, true);
}


// Read available files

$records = [];

$files = scandir($recordFolder);

foreach ($files as $file) {

    if (
        $file !== "." &&
        $file !== ".." &&
        is_file($recordFolder . $file)
    ) {

        $records[] = $file;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        MedVault | Dashboard
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


    <div class="user-area">

        <div>

            <small>
                SIGNED IN AS
            </small>

            <strong>
                <?php
                echo htmlspecialchars($_SESSION["username"]);
                ?>
            </strong>

        </div>

        <a href="logout.php">
            Logout
        </a>

    </div>

</header>


<main class="dashboard-main">


<section class="welcome">

    <div>

        <span class="label">
            SECURE MEDICAL WORKSPACE
        </span>

        <h1>
            Medical Records
        </h1>

        <p>
            Welcome back,
            <?php
            echo htmlspecialchars($_SESSION["username"]);
            ?>.
            Your authorized records are available below.
        </p>

    </div>


    <div class="secure-badge">

        <div class="check">
            ✓
        </div>

        <div>

            <strong>
                SECURE SESSION
            </strong>

            <small>
                Access verified
            </small>

        </div>

    </div>

</section>


<section class="statistics">

    <div class="stat-card">

        <span>
            TOTAL RECORDS
        </span>

        <strong>
            <?php echo count($records); ?>
        </strong>

        <small>
            protected files
        </small>

    </div>


    <div class="stat-card">

        <span>
            USER ROLE
        </span>

        <strong class="role">
            STAFF
        </strong>

        <small>
            authorized user
        </small>

    </div>


    <div class="stat-card">

        <span>
            SESSION
        </span>

        <strong class="active-text">
            ACTIVE
        </strong>

        <small>
            authentication verified
        </small>

    </div>

</section>


<section class="records-section">


<div class="section-title">

    <div>

        <span class="label">
            PROTECTED FILE STORAGE
        </span>

        <h2>
            Medical Records
        </h2>

    </div>


    <a href="upload.php"
       class="upload-button">

        + Add Record

    </a>

</div>


<div class="records-list">

<?php

if (count($records) === 0) {

    echo '
    <div class="empty-state">

        <div class="empty-icon">
            +
        </div>

        <h3>
            No medical records yet
        </h3>

        <p>
            Upload a medical report to begin managing records.
        </p>

    </div>
    ';

} else {

    foreach ($records as $record) {

        echo '
        <div class="record-item">

            <div class="file-icon">
                PDF
            </div>

            <div class="record-name">

                <strong>
                    ' .
                    htmlspecialchars($record)
                    .
                '</strong>

                <span>
                    Protected medical document
                </span>

            </div>

            <a
                href="view.php?file=' .
                urlencode($record)
                .
                '"
                class="view-button"
            >
                View
            </a>

        </div>
        ';
    }
}

?>

</div>

</section>


<div class="security-note">

    <div class="note-icon">
        ✓
    </div>

    <div>

        <strong>
            Protected medical information
        </strong>

        <p>
            Medical records are accessible only after
            successful session authentication.
        </p>

    </div>

</div>


</main>

</body>
</html>