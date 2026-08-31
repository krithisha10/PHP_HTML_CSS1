<?php

session_start();

$file = "students.txt";


/*
    Get form values
*/

$student_id = trim($_POST["student_id"]);

$student_name = trim($_POST["student_name"]);

$department = trim($_POST["department"]);

$year = trim($_POST["year"]);

$email = trim($_POST["email"]);


/*
    Create student record
*/

$record =
    $student_id . "|" .
    $student_name . "|" .
    $department . "|" .
    $year . "|" .
    $email .
    PHP_EOL;


/*
    Append record to file
*/

file_put_contents(
    $file,
    $record,
    FILE_APPEND | LOCK_EX
);


/*
    Read updated file
*/

$records = [];

if (file_exists($file)) {

    $lines = file(
        $file,
        FILE_IGNORE_NEW_LINES |
        FILE_SKIP_EMPTY_LINES
    );


    foreach ($lines as $line) {

        $data = explode("|", $line);

        if (count($data) == 5) {

            $records[] = $data;

        }

    }

}


/*
    Session message
*/

$_SESSION["last_student"] = $student_name;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Updated Records | StudentVault</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="result-container">


    <!-- SUCCESS HEADER -->

    <div class="result-header">

        <div>

            <span class="small-heading">
                RECORD UPDATE
            </span>

            <h1>
                Student added successfully
            </h1>

            <p>
                The new record has been appended to
                <strong>students.txt</strong>.
            </p>

        </div>


        <div class="success-badge">

            <span>✓</span>

            File Updated

        </div>

    </div>


    <!-- NEW RECORD -->

    <section class="new-record">

        <div class="new-record-title">

            <span>NEW RECORD</span>

            <strong>
                <?php
                echo htmlspecialchars($student_name);
                ?>
            </strong>

        </div>


        <div class="new-record-grid">

            <div>

                <small>STUDENT ID</small>

                <strong>
                    <?php
                    echo htmlspecialchars($student_id);
                    ?>
                </strong>

            </div>


            <div>

                <small>DEPARTMENT</small>

                <strong>
                    <?php
                    echo htmlspecialchars($department);
                    ?>
                </strong>

            </div>


            <div>

                <small>YEAR</small>

                <strong>
                    <?php
                    echo htmlspecialchars($year);
                    ?>
                </strong>

            </div>


            <div>

                <small>EMAIL</small>

                <strong>
                    <?php
                    echo htmlspecialchars($email);
                    ?>
                </strong>

            </div>

        </div>

    </section>


    <!-- UPDATED CONTENT -->

    <section class="records-section">

        <div class="records-heading">

            <div>

                <span>
                    FILE CONTENT
                </span>

                <h2>
                    Updated Student Records
                </h2>

            </div>


            <div class="record-count">

                <?php echo count($records); ?>

                Records

            </div>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Student ID</th>

                        <th>Student Name</th>

                        <th>Department</th>

                        <th>Year</th>

                        <th>Email</th>

                    </tr>

                </thead>


                <tbody>

                <?php

                $count = 1;

                foreach ($records as $record):

                ?>

                    <tr>

                        <td>
                            <?php echo $count++; ?>
                        </td>

                        <td>

                            <span class="id-badge">

                                <?php
                                echo htmlspecialchars(
                                    $record[0]
                                );
                                ?>

                            </span>

                        </td>

                        <td>

                            <strong>

                                <?php
                                echo htmlspecialchars(
                                    $record[1]
                                );
                                ?>

                            </strong>

                        </td>

                        <td>

                            <?php
                            echo htmlspecialchars(
                                $record[2]
                            );
                            ?>

                        </td>

                        <td>

                            <span class="year-badge">

                                <?php
                                echo htmlspecialchars(
                                    $record[3]
                                );
                                ?>

                            </span>

                        </td>

                        <td>

                            <?php
                            echo htmlspecialchars(
                                $record[4]
                            );
                            ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </section>


    <!-- ACTIONS -->

    <div class="bottom-actions">

        <a href="index.php">
            ← Add Another Student
        </a>

        <div class="file-status">
            <span></span>
            students.txt updated
        </div>

    </div>


</div>

</body>

</html>