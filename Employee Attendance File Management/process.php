<?php

$file = "attendance.txt";

$employees = [];

$total_present = 0;
$total_absent = 0;
$total_late = 0;

if (file_exists($file)) {

    /*
        Read all lines from the file
    */

    $records = file(
        $file,
        FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
    );


    /*
        Process each employee record
    */

    foreach ($records as $record) {

        $data = explode("|", $record);

        if (count($data) == 5) {

            $employees[] = [
                "id" => $data[0],
                "name" => $data[1],
                "department" => $data[2],
                "date" => $data[3],
                "status" => $data[4]
            ];


            /*
                Count attendance status
            */

            if ($data[4] == "Present") {

                $total_present++;

            } elseif ($data[4] == "Absent") {

                $total_absent++;

            } elseif ($data[4] == "Late") {

                $total_late++;
            }
        }
    }

} else {

    $file_error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Attendance Records | WorkPulse</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="records-page">


    <!-- HEADER -->

    <header class="records-header">

        <div>

            <a href="index.php" class="back">
                ← Attendance Dashboard
            </a>

            <p class="breadcrumb">
                WORKSPACE / ATTENDANCE / RECORDS
            </p>

            <h1>
                Attendance Records
            </h1>

            <p>
                Retrieved from
                <strong>attendance.txt</strong>
            </p>

        </div>

        <div class="records-date">
            25 AUG 2026
        </div>

    </header>


    <?php if (isset($file_error)): ?>

        <!-- ERROR -->

        <div class="file-error">

            <div class="error-icon">
                !
            </div>

            <h2>
                Attendance file not found
            </h2>

            <p>
                Please make sure that <strong>attendance.txt</strong>
                exists in the project folder.
            </p>

            <a href="index.php">
                ← Go Back
            </a>

        </div>


    <?php else: ?>


        <!-- STATISTICS -->

        <section class="stats">


            <div class="stat-card">

                <div class="stat-top">
                    <span>👥</span>
                    <small>TOTAL</small>
                </div>

                <strong>
                    <?php echo count($employees); ?>
                </strong>

                <p>
                    Employees
                </p>

            </div>


            <div class="stat-card present">

                <div class="stat-top">
                    <span>✓</span>
                    <small>PRESENT</small>
                </div>

                <strong>
                    <?php echo $total_present; ?>
                </strong>

                <p>
                    Employees present
                </p>

            </div>


            <div class="stat-card absent">

                <div class="stat-top">
                    <span>×</span>
                    <small>ABSENT</small>
                </div>

                <strong>
                    <?php echo $total_absent; ?>
                </strong>

                <p>
                    Employees absent
                </p>

            </div>


            <div class="stat-card late">

                <div class="stat-top">
                    <span>◷</span>
                    <small>LATE</small>
                </div>

                <strong>
                    <?php echo $total_late; ?>
                </strong>

                <p>
                    Employees late
                </p>

            </div>


        </section>


        <!-- TABLE -->

        <section class="attendance-card">

            <div class="table-heading">

                <div>

                    <p>
                        DAILY REPORT
                    </p>

                    <h2>
                        Employee Attendance
                    </h2>

                </div>

                <span class="record-count">
                    <?php echo count($employees); ?> RECORDS
                </span>

            </div>


            <div class="table-container">

                <table>

                    <thead>

                        <tr>

                            <th>EMPLOYEE</th>

                            <th>DEPARTMENT</th>

                            <th>DATE</th>

                            <th>STATUS</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php foreach ($employees as $employee): ?>

                        <tr>

                            <td>

                                <div class="employee">

                                    <div class="avatar">
                                        <?php
                                        echo strtoupper(
                                            substr(
                                                $employee["name"],
                                                0,
                                                1
                                            )
                                        );
                                        ?>
                                    </div>

                                    <div>

                                        <strong>
                                            <?php
                                            echo htmlspecialchars(
                                                $employee["name"]
                                            );
                                            ?>
                                        </strong>

                                        <small>
                                            <?php
                                            echo htmlspecialchars(
                                                $employee["id"]
                                            );
                                            ?>
                                        </small>

                                    </div>

                                </div>

                            </td>


                            <td>

                                <span class="department">
                                    <?php
                                    echo htmlspecialchars(
                                        $employee["department"]
                                    );
                                    ?>
                                </span>

                            </td>


                            <td>

                                <?php
                                echo date(
                                    "d M Y",
                                    strtotime($employee["date"])
                                );
                                ?>

                            </td>


                            <td>

                                <?php

                                $status_class =
                                    strtolower(
                                        $employee["status"]
                                    );

                                ?>

                                <span class="status <?php
                                    echo $status_class;
                                ?>">

                                    <?php

                                    if ($employee["status"] == "Present") {
                                        echo "✓ ";
                                    }

                                    elseif ($employee["status"] == "Absent") {
                                        echo "× ";
                                    }

                                    else {
                                        echo "◷ ";
                                    }

                                    echo htmlspecialchars(
                                        $employee["status"]
                                    );

                                    ?>

                                </span>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


            <!-- FOOTER -->

            <div class="table-footer">

                <div>

                    <span class="success-dot">
                        ✓
                    </span>

                    <p>
                        Records successfully retrieved from
                        <strong>attendance.txt</strong>
                    </p>

                </div>

                <a href="index.php">
                    ← Back
                </a>

            </div>

        </section>


    <?php endif; ?>


</div>

</body>

</html>