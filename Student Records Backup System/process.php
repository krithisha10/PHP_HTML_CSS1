<?php

$dataDir = "data";
$backupDir = "backups";
$dataFile = $dataDir . "/students.txt";


// ==========================================
// CREATE REQUIRED DIRECTORIES
// ==========================================

if (!is_dir($dataDir)) {
    mkdir($dataDir, 0777, true);
}

if (!is_dir($backupDir)) {
    mkdir($backupDir, 0777, true);
}

if (!file_exists($dataFile)) {
    file_put_contents($dataFile, "");
}


// ==========================================
// GET ACTION
// ==========================================

$action = $_POST["action"] ?? "";


// ==========================================
// ADD STUDENT
// ==========================================

if ($action === "add") {

    $studentId =
        trim($_POST["student_id"] ?? "");

    $studentName =
        trim($_POST["student_name"] ?? "");

    $department =
        trim($_POST["department"] ?? "");

    $year =
        trim($_POST["year"] ?? "");


    // Validate input

    if (
        $studentId === "" ||
        $studentName === "" ||
        $department === "" ||
        $year === ""
    ) {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "Please fill in all student details."
            )
        );

        exit;
    }


    // Clean special characters

    $studentId =
        str_replace(
            ["|", "\n", "\r"],
            "",
            $studentId
        );

    $studentName =
        str_replace(
            ["|", "\n", "\r"],
            "",
            $studentName
        );

    $department =
        str_replace(
            ["|", "\n", "\r"],
            "",
            $department
        );

    $year =
        str_replace(
            ["|", "\n", "\r"],
            "",
            $year
        );


    // Check duplicate ID

    $existingRecords =
        file(
            $dataFile,
            FILE_IGNORE_NEW_LINES |
            FILE_SKIP_EMPTY_LINES
        );

    foreach ($existingRecords as $record) {

        $parts = explode("|", $record);

        if (
            isset($parts[0]) &&
            $parts[0] === $studentId
        ) {

            header(
                "Location: index.php?type=error&message="
                . urlencode(
                    "Student ID already exists."
                )
            );

            exit;
        }
    }


    // Create record

    $record =
        $studentId . "|" .
        $studentName . "|" .
        $department . "|" .
        $year . PHP_EOL;


    // Append record to file

    file_put_contents(
        $dataFile,
        $record,
        FILE_APPEND | LOCK_EX
    );


    header(
        "Location: index.php?type=success&message="
        . urlencode(
            "Student record saved successfully."
        )
    );

    exit;
}


// ==========================================
// CREATE BACKUP
// ==========================================

if ($action === "backup") {

    $content =
        file_get_contents($dataFile);


    if (trim($content) === "") {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "No student records available for backup."
            )
        );

        exit;
    }


    // Timestamp

    $timestamp =
        date("Y-m-d_H-i-s");


    // Backup filename

    $backupFile =
        $backupDir .
        "/students_backup_" .
        $timestamp .
        ".txt";


    // Add backup header

    $backupContent =
        "STUDENT RECORD BACKUP" .
        PHP_EOL;

    $backupContent .=
        "Backup Date & Time: " .
        date("d-m-Y h:i:s A") .
        PHP_EOL;

    $backupContent .=
        "----------------------------------------" .
        PHP_EOL;

    $backupContent .=
        $content;


    // Create backup file

    if (
        file_put_contents(
            $backupFile,
            $backupContent,
            LOCK_EX
        ) !== false
    ) {

        header(
            "Location: index.php?type=success&message="
            . urlencode(
                "Backup created successfully at "
                . date("d-m-Y h:i:s A")
            )
        );

        exit;

    } else {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "Unable to create backup file."
            )
        );

        exit;
    }
}


// ==========================================
// INVALID ACTION
// ==========================================

header(
    "Location: index.php?type=error&message="
    . urlencode(
        "Invalid operation."
    )
);

exit;

?>