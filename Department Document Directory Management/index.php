<?php

$baseDir = "departments";

if (!is_dir($baseDir)) {
    mkdir($baseDir, 0777, true);
}

$folders = [];

$items = scandir($baseDir);

foreach ($items as $item) {

    if ($item != "." && $item != "..") {

        if (is_dir($baseDir . "/" . $item)) {
            $folders[] = $item;
        }
    }
}

sort($folders);

$message = $_GET["message"] ?? "";
$type = $_GET["type"] ?? "";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        DocuNest | Department Directory
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <!-- HEADER -->

    <header>

        <div class="brand">

            <div class="brand-icon">
                ▦
            </div>

            <div>

                <h1>DocuNest</h1>

                <span>
                    DEPARTMENT DIRECTORY
                </span>

            </div>

        </div>

        <div class="header-status">

            <span class="status-dot"></span>

            DIRECTORY ONLINE

        </div>

    </header>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <div class="eyebrow">
                ✦ DOCUMENT ORGANIZATION
            </div>

            <h2>
                Manage your
                <span>department folders.</span>
            </h2>

            <p>
                Create, rename and remove department
                directories from one simple workspace.
            </p>

        </div>

        <div class="hero-folder">

            <div class="folder-back"></div>

            <div class="folder-front">

                <div class="folder-tab"></div>

                <div class="folder-lines">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>

            </div>

        </div>

    </section>


    <!-- MESSAGE -->

    <?php if ($message != ""): ?>

        <div class="message <?php echo $type; ?>">

            <span>
                <?php
                echo $type == "success" ? "✓" : "!";
                ?>
            </span>

            <?php
            echo htmlspecialchars($message);
            ?>

        </div>

    <?php endif; ?>


    <!-- MAIN -->

    <main>


        <!-- CREATE -->

        <section class="card create-card">

            <div class="card-heading">

                <div class="heading-icon create">
                    +
                </div>

                <div>

                    <h3>
                        Create Department
                    </h3>

                    <p>
                        Add a new department directory
                    </p>

                </div>

            </div>


            <form
                action="process.php"
                method="POST"
            >

                <input
                    type="hidden"
                    name="action"
                    value="create"
                >

                <label>
                    DEPARTMENT NAME
                </label>

                <div class="input-button">

                    <input
                        type="text"
                        name="department"
                        placeholder="e.g. Computer Science"
                        required
                    >

                    <button type="submit">
                        Create Folder
                    </button>

                </div>

                <small>
                    Use letters, numbers, spaces and hyphens.
                </small>

            </form>

        </section>


        <!-- RENAME -->

        <section class="card">

            <div class="card-heading">

                <div class="heading-icon rename">
                    ↻
                </div>

                <div>

                    <h3>
                        Rename Department
                    </h3>

                    <p>
                        Change an existing folder name
                    </p>

                </div>

            </div>


            <form
                action="process.php"
                method="POST"
            >

                <input
                    type="hidden"
                    name="action"
                    value="rename"
                >

                <label>
                    CURRENT FOLDER
                </label>

                <select
                    name="old_name"
                    required
                >

                    <option value="">
                        Select department
                    </option>

                    <?php foreach ($folders as $folder): ?>

                        <option value="<?php
                            echo htmlspecialchars($folder);
                        ?>">
                            <?php
                            echo htmlspecialchars($folder);
                            ?>
                        </option>

                    <?php endforeach; ?>

                </select>


                <label>
                    NEW FOLDER NAME
                </label>

                <input
                    type="text"
                    name="new_name"
                    placeholder="Enter new department name"
                    required
                >

                <button
                    type="submit"
                    class="full-button rename-button"
                >
                    Rename Folder
                </button>

            </form>

        </section>


        <!-- DELETE -->

        <section class="card delete-card">

            <div class="card-heading">

                <div class="heading-icon delete">
                    ×
                </div>

                <div>

                    <h3>
                        Delete Department
                    </h3>

                    <p>
                        Permanently remove a folder
                    </p>

                </div>

            </div>


            <form
                action="process.php"
                method="POST"
                onsubmit="
                    return confirm(
                        'Are you sure you want to delete this folder?'
                    );
                "
            >

                <input
                    type="hidden"
                    name="action"
                    value="delete"
                >

                <label>
                    SELECT FOLDER
                </label>

                <select
                    name="department"
                    required
                >

                    <option value="">
                        Select department
                    </option>

                    <?php foreach ($folders as $folder): ?>

                        <option value="<?php
                            echo htmlspecialchars($folder);
                        ?>">
                            <?php
                            echo htmlspecialchars($folder);
                            ?>
                        </option>

                    <?php endforeach; ?>

                </select>


                <button
                    type="submit"
                    class="full-button delete-button"
                >
                    Delete Folder
                </button>

                <div class="warning">
                    ⚠ Only empty folders can be deleted.
                </div>

            </form>

        </section>


        <!-- DIRECTORY LIST -->

        <section class="directory-section">

            <div class="directory-header">

                <div>

                    <span>
                        CURRENT DIRECTORY
                    </span>

                    <h2>
                        Department Folders
                    </h2>

                </div>

                <div class="folder-count">

                    <?php echo count($folders); ?>

                    <small>
                        FOLDERS
                    </small>

                </div>

            </div>


            <?php if (count($folders) > 0): ?>

                <div class="folder-grid">

                    <?php foreach ($folders as $index => $folder): ?>

                        <div class="folder-card">

                            <div class="small-folder">
                                ▰
                            </div>

                            <div class="folder-info">

                                <h3>
                                    <?php
                                    echo htmlspecialchars($folder);
                                    ?>
                                </h3>

                                <p>
                                    departments /
                                    <?php
                                    echo htmlspecialchars($folder);
                                    ?>
                                </p>

                            </div>

                            <div class="folder-number">
                                <?php
                                echo str_pad(
                                    $index + 1,
                                    2,
                                    "0",
                                    STR_PAD_LEFT
                                );
                                ?>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <div class="empty">

                    <div class="empty-icon">
                        □
                    </div>

                    <h3>
                        No department folders yet
                    </h3>

                    <p>
                        Create your first department folder
                        using the form above.
                    </p>

                </div>

            <?php endif; ?>

        </section>

    </main>


    <!-- FOOTER -->

    <footer>

        <span>
            DOCUNEST · PHP DIRECTORY MANAGEMENT
        </span>

        <span>
            mkdir() · rename() · rmdir() · scandir()
        </span>

    </footer>

</div>

</body>

</html>