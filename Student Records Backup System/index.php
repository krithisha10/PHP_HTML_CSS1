<?php

$dataFile = "data/students.txt";
$backupDir = "backups";

if (!is_dir("data")) {
    mkdir("data", 0777, true);
}

if (!is_dir($backupDir)) {
    mkdir($backupDir, 0777, true);
}

if (!file_exists($dataFile)) {
    file_put_contents($dataFile, "");
}

$students = [];

$content = file_get_contents($dataFile);

if (!empty(trim($content))) {
    $lines = file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {

        $parts = explode("|", $line);

        if (count($parts) >= 4) {

            $students[] = [
                "id" => $parts[0],
                "name" => $parts[1],
                "department" => $parts[2],
                "year" => $parts[3]
            ];
        }
    }
}

$backups = [];

$backupFiles = scandir($backupDir);

foreach ($backupFiles as $file) {

    if ($file != "." && $file != "..") {

        if (is_file($backupDir . "/" . $file)) {

            $backups[] = [
                "name" => $file,
                "time" => date(
                    "d M Y, h:i A",
                    filemtime($backupDir . "/" . $file)
                ),
                "size" => filesize(
                    $backupDir . "/" . $file
                )
            ];
        }
    }
}

usort($backups, function ($a, $b) {
    return strcmp($b["name"], $a["name"]);
});

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
        VaultSync | Student Backup System
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <!-- HEADER -->

    <header>

        <div class="logo-area">

            <div class="logo">
                ☁
            </div>

            <div>

                <h1>VaultSync</h1>

                <p>
                    STUDENT RECORD BACKUP
                </p>

            </div>

        </div>

        <div class="secure-status">

            <span></span>

            SYSTEM SECURE

        </div>

    </header>


    <!-- HERO -->

    <section class="hero">

        <div class="hero-text">

            <div class="tag">
                DIGITAL RECORD MANAGEMENT
            </div>

            <h2>
                Your student records,
                <strong>always backed up.</strong>
            </h2>

            <p>
                Maintain digital student records and create
                secure timestamped backups whenever needed.
            </p>

        </div>


        <div class="cloud-art">

            <div class="cloud">

                <div class="cloud-circle one"></div>
                <div class="cloud-circle two"></div>
                <div class="cloud-circle three"></div>

                <div class="cloud-base"></div>

                <div class="upload-arrow">
                    ↑
                </div>

            </div>

        </div>

    </section>


    <!-- MESSAGE -->

    <?php if ($message != ""): ?>

        <div class="message <?php echo $type; ?>">

            <div class="message-icon">

                <?php
                echo ($type == "success") ? "✓" : "!";
                ?>

            </div>

            <span>
                <?php
                echo htmlspecialchars($message);
                ?>
            </span>

        </div>

    <?php endif; ?>


    <!-- STATISTICS -->

    <section class="stats">

        <div class="stat-card">

            <div class="stat-icon students">
                ◉
            </div>

            <div>

                <span>
                    TOTAL STUDENTS
                </span>

                <h3>
                    <?php echo count($students); ?>
                </h3>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon backups">
                ↥
            </div>

            <div>

                <span>
                    TOTAL BACKUPS
                </span>

                <h3>
                    <?php echo count($backups); ?>
                </h3>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon status">
                ✓
            </div>

            <div>

                <span>
                    BACKUP STATUS
                </span>

                <h3 class="ready">
                    READY
                </h3>

            </div>

        </div>

    </section>


    <!-- MAIN -->

    <main>


        <!-- ADD STUDENT -->

        <section class="panel add-panel">

            <div class="panel-title">

                <div class="title-icon">
                    +
                </div>

                <div>

                    <h2>
                        Add Student Record
                    </h2>

                    <p>
                        Store a new digital student record
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
                    value="add"
                >

                <label>
                    STUDENT ID
                </label>

                <input
                    type="text"
                    name="student_id"
                    placeholder="e.g. CS001"
                    required
                >


                <label>
                    STUDENT NAME
                </label>

                <input
                    type="text"
                    name="student_name"
                    placeholder="Enter student name"
                    required
                >


                <div class="two-inputs">

                    <div>

                        <label>
                            DEPARTMENT
                        </label>

                        <select
                            name="department"
                            required
                        >

                            <option value="">
                                Select
                            </option>

                            <option>
                                Computer Science
                            </option>

                            <option>
                                Commerce
                            </option>

                            <option>
                                Mathematics
                            </option>

                            <option>
                                English
                            </option>

                            <option>
                                Physics
                            </option>

                        </select>

                    </div>


                    <div>

                        <label>
                            YEAR
                        </label>

                        <select
                            name="year"
                            required
                        >

                            <option value="">
                                Select
                            </option>

                            <option>
                                I Year
                            </option>

                            <option>
                                II Year
                            </option>

                            <option>
                                III Year
                            </option>

                        </select>

                    </div>

                </div>


                <button type="submit">
                    Save Student Record →
                </button>

            </form>

        </section>


        <!-- BACKUP -->

        <section class="panel backup-panel">

            <div class="backup-top">

                <div>

                    <div class="backup-label">
                        BACKUP CENTER
                    </div>

                    <h2>
                        Protect Your Records
                    </h2>

                    <p>
                        Create a timestamped copy of all
                        current student records.
                    </p>

                </div>

                <div class="backup-symbol">
                    ↥
                </div>

            </div>


            <form
                action="process.php"
                method="POST"
            >

                <input
                    type="hidden"
                    name="action"
                    value="backup"
                >

                <button
                    type="submit"
                    class="backup-button"
                >
                    Create Backup
                </button>

            </form>


            <div class="backup-note">

                <span>◷</span>

                Each backup is automatically saved with
                the current date and time.

            </div>

        </section>


        <!-- STUDENT RECORDS -->

        <section class="records-section">

            <div class="section-heading">

                <div>

                    <span>
                        DIGITAL DATABASE
                    </span>

                    <h2>
                        Student Records
                    </h2>

                </div>

                <div class="record-count">

                    <?php echo count($students); ?>

                    <small>
                        RECORDS
                    </small>

                </div>

            </div>


            <?php if (count($students) > 0): ?>

                <div class="table-wrapper">

                    <table>

                        <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                STUDENT ID
                            </th>

                            <th>
                                STUDENT NAME
                            </th>

                            <th>
                                DEPARTMENT
                            </th>

                            <th>
                                YEAR
                            </th>

                        </tr>

                        </thead>

                        <tbody>

                        <?php foreach ($students as $index => $student): ?>

                            <tr>

                                <td>
                                    <?php
                                    echo $index + 1;
                                    ?>
                                </td>

                                <td>

                                    <span class="student-id">

                                        <?php
                                        echo htmlspecialchars(
                                            $student["id"]
                                        );
                                        ?>

                                    </span>

                                </td>

                                <td>

                                    <strong>

                                        <?php
                                        echo htmlspecialchars(
                                            $student["name"]
                                        );
                                        ?>

                                    </strong>

                                </td>

                                <td>
                                    <?php
                                    echo htmlspecialchars(
                                        $student["department"]
                                    );
                                    ?>
                                </td>

                                <td>

                                    <span class="year-badge">

                                        <?php
                                        echo htmlspecialchars(
                                            $student["year"]
                                        );
                                        ?>

                                    </span>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <div class="empty">

                    <div class="empty-icon">
                        ◌
                    </div>

                    <h3>
                        No student records
                    </h3>

                    <p>
                        Add your first student record above.
                    </p>

                </div>

            <?php endif; ?>

        </section>


        <!-- BACKUP HISTORY -->

        <section class="records-section">

            <div class="section-heading">

                <div>

                    <span>
                        BACKUP MONITOR
                    </span>

                    <h2>
                        Backup History
                    </h2>

                </div>

                <div class="history-status">
                    ● ACTIVE
                </div>

            </div>


            <?php if (count($backups) > 0): ?>

                <div class="backup-list">

                    <?php foreach ($backups as $backup): ?>

                        <div class="backup-item">

                            <div class="backup-file-icon">
                                ↥
                            </div>

                            <div class="backup-details">

                                <h3>
                                    <?php
                                    echo htmlspecialchars(
                                        $backup["name"]
                                    );
                                    ?>
                                </h3>

                                <p>
                                    Created on
                                    <?php
                                    echo htmlspecialchars(
                                        $backup["time"]
                                    );
                                    ?>
                                </p>

                            </div>

                            <div class="backup-size">

                                <?php
                                echo round(
                                    $backup["size"] / 1024,
                                    2
                                );
                                ?>

                                KB

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <div class="empty">

                    <div class="empty-icon">
                        ↥
                    </div>

                    <h3>
                        No backups created yet
                    </h3>

                    <p>
                        Click "Create Backup" to generate
                        your first backup file.
                    </p>

                </div>

            <?php endif; ?>

        </section>

    </main>


    <!-- FOOTER -->

    <footer>

        <span>
            VAULTSYNC · STUDENT RECORD MANAGEMENT
        </span>

        <span>
            PHP FILE HANDLING · TIMESTAMPED BACKUPS
        </span>

    </footer>

</div>

</body>

</html>