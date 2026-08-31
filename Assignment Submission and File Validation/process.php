<?php

$upload_base = "uploads/";

/*
    Allowed file extensions
*/

$allowed_extensions = [
    "pdf",
    "doc",
    "docx",
    "ppt",
    "pptx"
];


/*
    Get form details
*/

$student_name = trim($_POST["student_name"]);
$department = $_POST["department"];
$assignment_title = trim($_POST["assignment_title"]);


/*
    Department validation
*/

$allowed_departments = [
    "Computer_Science",
    "Data_Science",
    "Information_Technology",
    "Computer_Applications"
];


$status = "";
$message = "";
$uploaded_file = "";
$file_size = "";


/*
    Check department
*/

if (!in_array($department, $allowed_departments)) {

    $status = "error";
    $message = "Invalid department selected.";

}


/*
    Check file
*/

elseif (!isset($_FILES["assignment"]) ||
        $_FILES["assignment"]["error"] != 0) {

    $status = "error";
    $message = "Please select a valid assignment file.";

}


else {

    $file_name = $_FILES["assignment"]["name"];
    $file_tmp = $_FILES["assignment"]["tmp_name"];
    $file_size_bytes = $_FILES["assignment"]["size"];


    /*
        Get file extension
    */

    $file_extension = strtolower(
        pathinfo($file_name, PATHINFO_EXTENSION)
    );


    /*
        Validate extension
    */

    if (!in_array($file_extension, $allowed_extensions)) {

        $status = "error";

        $message =
            "Invalid file type. Allowed formats are PDF, DOC, DOCX, PPT and PPTX.";

    }


    /*
        Validate file size
        Maximum = 5 MB
    */

    elseif ($file_size_bytes > 5 * 1024 * 1024) {

        $status = "error";

        $message =
            "File size exceeds the maximum limit of 5 MB.";

    }


    else {

        /*
            Create department directory
            if it does not exist
        */

        $department_directory =
            $upload_base . $department . "/";


        if (!is_dir($department_directory)) {

            mkdir($department_directory, 0777, true);

        }


        /*
            Generate a safe file name
        */

        $safe_student =
            preg_replace(
                "/[^a-zA-Z0-9_-]/",
                "_",
                $student_name
            );


        $safe_title =
            preg_replace(
                "/[^a-zA-Z0-9_-]/",
                "_",
                $assignment_title
            );


        $new_file_name =
            $safe_student .
            "_" .
            $safe_title .
            "_" .
            time() .
            "." .
            $file_extension;


        $destination =
            $department_directory .
            $new_file_name;


        /*
            Move uploaded file
        */

        if (move_uploaded_file($file_tmp, $destination)) {

            $status = "success";

            $message =
                "Assignment uploaded successfully.";

            $uploaded_file = $new_file_name;

            $file_size =
                number_format(
                    $file_size_bytes / 1024,
                    2
                ) . " KB";

        }

        else {

            $status = "error";

            $message =
                "Unable to store the uploaded file.";

        }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Submission Status | CampusSubmit</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

<div class="result-page">


    <div class="result-card">


        <?php if ($status === "success"): ?>


            <!-- SUCCESS -->

            <div class="success-circle">
                ✓
            </div>


            <p class="result-label">
                SUBMISSION COMPLETE
            </p>


            <h1>
                Assignment
                <span>submitted!</span>
            </h1>


            <p class="result-message">

                Great work,
                <strong>
                    <?php echo htmlspecialchars($student_name); ?>
                </strong>.

                Your assignment has passed validation
                and has been stored successfully.

            </p>


            <!-- SUBMISSION DETAILS -->

            <div class="submission-details">


                <div class="detail">

                    <span>STUDENT</span>

                    <strong>
                        <?php echo htmlspecialchars($student_name); ?>
                    </strong>

                </div>


                <div class="detail">

                    <span>DEPARTMENT</span>

                    <strong>
                        <?php
                        echo htmlspecialchars(
                            str_replace("_", " ", $department)
                        );
                        ?>
                    </strong>

                </div>


                <div class="detail">

                    <span>ASSIGNMENT</span>

                    <strong>
                        <?php echo htmlspecialchars($assignment_title); ?>
                    </strong>

                </div>


                <div class="detail">

                    <span>FILE SIZE</span>

                    <strong>
                        <?php echo $file_size; ?>
                    </strong>

                </div>


            </div>


            <!-- FILE -->

            <div class="stored-file">

                <div class="document-icon">
                    📄
                </div>

                <div>

                    <span>STORED FILE</span>

                    <strong>
                        <?php echo htmlspecialchars($uploaded_file); ?>
                    </strong>

                </div>

                <div class="check">
                    ✓
                </div>

            </div>


            <div class="location">

                📁

                Stored in:

                <strong>
                    uploads/<?php echo htmlspecialchars($department); ?>/
                </strong>

            </div>


        <?php else: ?>


            <!-- ERROR -->

            <div class="error-circle">
                !
            </div>


            <p class="result-label error-text">
                SUBMISSION FAILED
            </p>


            <h1>
                File could not
                <span>be submitted.</span>
            </h1>


            <p class="result-message">
                <?php echo htmlspecialchars($message); ?>
            </p>


            <div class="error-info">

                <strong>Allowed file types</strong>

                <p>
                    PDF • DOC • DOCX • PPT • PPTX
                </p>

                <small>
                    Maximum file size: 5 MB
                </small>

            </div>


        <?php endif; ?>


        <a href="index.php" class="back-button">

            ← Submit another assignment

        </a>


    </div>

</div>

</body>

</html>