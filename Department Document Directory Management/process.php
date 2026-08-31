<?php

$baseDir = "departments";


// ========================================
// CREATE BASE DIRECTORY
// ========================================

if (!is_dir($baseDir)) {

    mkdir($baseDir, 0777, true);

}


// ========================================
// GET ACTION
// ========================================

$action = $_POST["action"] ?? "";


// ========================================
// FUNCTION TO CLEAN FOLDER NAME
// ========================================

function cleanFolderName($name)
{
    $name = trim($name);

    $name = preg_replace(
        "/[^A-Za-z0-9 _-]/",
        "",
        $name
    );

    return $name;
}


// ========================================
// CREATE FOLDER
// ========================================

if ($action === "create") {

    $department =
        cleanFolderName(
            $_POST["department"] ?? ""
        );


    if ($department === "") {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "Please enter a valid department name."
            )
        );

        exit;
    }


    $folderPath =
        $baseDir . "/" . $department;


    if (is_dir($folderPath)) {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "This department folder already exists."
            )
        );

        exit;
    }


    if (mkdir($folderPath, 0777, true)) {

        header(
            "Location: index.php?type=success&message="
            . urlencode(
                "Department folder created successfully."
            )
        );

        exit;

    } else {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "Unable to create the department folder."
            )
        );

        exit;
    }
}


// ========================================
// RENAME FOLDER
// ========================================

if ($action === "rename") {

    $oldName =
        cleanFolderName(
            $_POST["old_name"] ?? ""
        );

    $newName =
        cleanFolderName(
            $_POST["new_name"] ?? ""
        );


    if ($oldName === "" || $newName === "") {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "Please provide both folder names."
            )
        );

        exit;
    }


    $oldPath =
        $baseDir . "/" . $oldName;

    $newPath =
        $baseDir . "/" . $newName;


    if (!is_dir($oldPath)) {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "The selected folder does not exist."
            )
        );

        exit;
    }


    if (is_dir($newPath)) {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "A folder with the new name already exists."
            )
        );

        exit;
    }


    if (rename($oldPath, $newPath)) {

        header(
            "Location: index.php?type=success&message="
            . urlencode(
                "Department folder renamed successfully."
            )
        );

        exit;

    } else {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "Unable to rename the folder."
            )
        );

        exit;
    }
}


// ========================================
// DELETE FOLDER
// ========================================

if ($action === "delete") {

    $department =
        cleanFolderName(
            $_POST["department"] ?? ""
        );


    if ($department === "") {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "Please select a department folder."
            )
        );

        exit;
    }


    $folderPath =
        $baseDir . "/" . $department;


    if (!is_dir($folderPath)) {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "The selected folder does not exist."
            )
        );

        exit;
    }


    /*
     * rmdir() deletes only EMPTY directories.
     * This prevents accidental deletion of
     * folders containing documents.
     */

    $contents =
        scandir($folderPath);


    if (count($contents) > 2) {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "Folder is not empty. Remove its contents first."
            )
        );

        exit;
    }


    if (rmdir($folderPath)) {

        header(
            "Location: index.php?type=success&message="
            . urlencode(
                "Department folder deleted successfully."
            )
        );

        exit;

    } else {

        header(
            "Location: index.php?type=error&message="
            . urlencode(
                "Unable to delete the folder."
            )
        );

        exit;
    }
}


// ========================================
// INVALID ACTION
// ========================================

header(
    "Location: index.php?type=error&message="
    . urlencode(
        "Invalid directory operation."
    )
);

exit;

?>