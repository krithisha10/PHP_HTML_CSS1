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
// CREATE SECURE DIRECTORY
// ==========================================

$directory = "secure_documents/";

if (!is_dir($directory)) {

    mkdir(
        $directory,
        0777,
        true
    );

}


// ==========================================
// GET DOCUMENTS
// ==========================================

$documents = [];

$files = scandir($directory);

foreach ($files as $file) {

    if (
        $file === "." ||
        $file === ".."
    ) {
        continue;
    }

    if (
        is_file($directory . $file)
    ) {

        $documents[] = $file;

    }

}

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
        SecureVault | Document Management
    </title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>

<body>

<div class="page">


    <!-- HEADER -->

    <header>

        <div class="brand">

            <div class="brand-icon">
                🔐
            </div>

            <div>

                <h1>
                    SecureVault
                </h1>

                <span>
                    DOCUMENT MANAGEMENT SYSTEM
                </span>

            </div>

        </div>


        <div class="user-area">

            <div class="user-info">

                <span>
                    SIGNED IN AS
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars(
                        $_SESSION["username"]
                    );
                    ?>
                </strong>

            </div>


            <a
                href="logout.php"
                class="logout-button"
            >
                Logout
            </a>

        </div>

    </header>



    <!-- HERO -->

    <section class="secure-hero">

        <div class="hero-text">

            <span class="eyebrow">
                PRIVATE DOCUMENT VAULT
            </span>

            <h2>
                Your files,
                <strong>protected.</strong>
            </h2>

            <p>
                Upload, manage and access your documents
                through a secure authenticated workspace.
            </p>

        </div>


        <div class="security-visual">

            <div class="shield">
                ✓
            </div>

            <div class="security-ring"></div>

        </div>

    </section>



    <!-- MAIN -->

    <main>


        <!-- STATUS CARDS -->

        <section class="stats">

            <div class="stat-card">

                <div class="stat-icon">
                    📄
                </div>

                <div>

                    <span>
                        DOCUMENTS
                    </span>

                    <strong>
                        <?php
                        echo count($documents);
                        ?>
                    </strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    🛡️
                </div>

                <div>

                    <span>
                        ACCESS
                    </span>

                    <strong>
                        AUTHORIZED
                    </strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    ✓
                </div>

                <div>

                    <span>
                        DUPLICATES
                    </span>

                    <strong>
                        BLOCKED
                    </strong>

                </div>

            </div>

        </section>



        <!-- UPLOAD -->

        <section class="upload-card">

            <div class="section-heading">

                <div class="upload-icon">
                    ↑
                </div>

                <div>

                    <span>
                        SECURE UPLOAD
                    </span>

                    <h2>
                        Add a new document
                    </h2>

                </div>

            </div>


            <form
                action="process.php"
                method="POST"
                enctype="multipart/form-data"
            >

                <label
                    class="secure-drop"
                    for="document"
                >

                    <div class="upload-symbol">
                        +
                    </div>

                    <h3>
                        Choose a document
                    </h3>

                    <p>
                        PDF, DOC, DOCX, TXT or XLSX
                    </p>

                    <span>
                        Maximum file size: 5 MB
                    </span>

                    <input
                        type="file"
                        name="document"
                        id="document"
                        accept=".pdf,.doc,.docx,.txt,.xlsx"
                        required
                    >

                </label>


                <button
                    type="submit"
                    class="upload-button"
                >

                    Upload Securely

                    <span>
                        →
                    </span>

                </button>

            </form>

        </section>



        <!-- DOCUMENT LIST -->

        <section class="documents-section">

            <div class="section-top">

                <div>

                    <span>
                        PROTECTED LIBRARY
                    </span>

                    <h2>
                        Your documents
                    </h2>

                </div>


                <div class="protected-badge">
                    🔒 PRIVATE
                </div>

            </div>


            <?php if (count($documents) > 0): ?>


                <div class="document-list">

                    <?php foreach ($documents as $document): ?>

                        <?php

                        $extension = strtolower(
                            pathinfo(
                                $document,
                                PATHINFO_EXTENSION
                            )
                        );

                        ?>

                        <div class="document-item">


                            <div class="file-icon">

                                <?php

                                echo strtoupper(
                                    $extension
                                );

                                ?>

                            </div>


                            <div class="document-details">

                                <h3>

                                    <?php
                                    echo htmlspecialchars(
                                        $document
                                    );
                                    ?>

                                </h3>

                                <p>
                                    Protected document
                                </p>

                            </div>


                            <a
                                href="download.php?file=<?php echo urlencode($document); ?>"
                                class="access-button"
                            >
                                Access →
                            </a>


                        </div>

                    <?php endforeach; ?>

                </div>


            <?php else: ?>


                <div class="empty-documents">

                    <div>
                        📂
                    </div>

                    <h3>
                        Your vault is empty
                    </h3>

                    <p>
                        Upload your first document to begin.
                    </p>

                </div>


            <?php endif; ?>

        </section>



        <!-- SECURITY FEATURES -->

        <section class="security-section">

            <div class="section-top">

                <div>

                    <span>
                        PROTECTION LAYER
                    </span>

                    <h2>
                        Built-in security
                    </h2>

                </div>

            </div>


            <div class="security-grid">


                <div class="security-card">

                    <div class="security-number">
                        01
                    </div>

                    <h3>
                        Authentication
                    </h3>

                    <p>
                        Only authenticated users can access
                        the document management system.
                    </p>

                </div>


                <div class="security-card">

                    <div class="security-number">
                        02
                    </div>

                    <h3>
                        Duplicate Protection
                    </h3>

                    <p>
                        Existing filenames are checked before
                        a new document is stored.
                    </p>

                </div>


                <div class="security-card">

                    <div class="security-number">
                        03
                    </div>

                    <h3>
                        File Validation
                    </h3>

                    <p>
                        File extensions and file sizes are
                        validated before storage.
                    </p>

                </div>


                <div class="security-card">

                    <div class="security-number">
                        04
                    </div>

                    <h3>
                        Controlled Access
                    </h3>

                    <p>
                        Documents are accessed through an
                        authenticated PHP endpoint.
                    </p>

                </div>


            </div>

        </section>


    </main>



    <footer>

        <span>
            SECUREVAULT · PHP DOCUMENT MANAGEMENT
        </span>

        <span>
            AUTHENTICATED · PROTECTED · SECURE
        </span>

    </footer>

</div>

</body>

</html>