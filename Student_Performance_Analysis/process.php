<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit();
}

$students = $_POST["students"];

$subjects = [
    "Python",
    "DBMS",
    "Java",
    "Computer Networks",
    "Mathematics"
];


/* Calculate total, average and grade */

foreach ($students as $key => $student) {

    $total = 0;

    foreach ($subjects as $subject) {
        $total += (int)$student["marks"][$subject];
    }

    $average = $total / count($subjects);

    if ($average >= 90) {
        $grade = "A+";
    } elseif ($average >= 80) {
        $grade = "A";
    } elseif ($average >= 70) {
        $grade = "B";
    } elseif ($average >= 60) {
        $grade = "C";
    } elseif ($average >= 50) {
        $grade = "D";
    } else {
        $grade = "F";
    }

    $students[$key]["total"] = $total;
    $students[$key]["average"] = $average;
    $students[$key]["grade"] = $grade;
}


/* Find subject-wise toppers */

$subjectToppers = [];

foreach ($subjects as $subject) {

    $highest = -1;
    $topperName = "";

    foreach ($students as $student) {

        $mark = (int)$student["marks"][$subject];

        if ($mark > $highest) {
            $highest = $mark;
            $topperName = $student["name"];
        }
    }

    $subjectToppers[$subject] = [
        "name" => $topperName,
        "mark" => $highest
    ];
}


/* Find overall topper */

$overallTopper = $students[0];

foreach ($students as $student) {

    if ($student["average"] > $overallTopper["average"]) {
        $overallTopper = $student;
    }
}


/* Calculate class averages */

$classAverages = [];

foreach ($subjects as $subject) {

    $total = 0;

    foreach ($students as $student) {
        $total += (int)$student["marks"][$subject];
    }

    $classAverages[$subject] =
        $total / count($students);
}


/* Overall class average */

$overallTotal = 0;

foreach ($students as $student) {
    $overallTotal += $student["total"];
}

$classAverage =
    $overallTotal /
    (count($students) * count($subjects));

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Performance Report</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .report-title {
            background: white;
            border: 1px solid #dfe6ef;
            border-radius: 14px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .report-title h1 {
            font-size: 26px;
            color: #263d5b;
            margin-bottom: 6px;
        }

        .report-title p {
            font-size: 13px;
            color: #8a96a6;
        }

        .topper {
            background: #edf4ff;
            border: 1px solid #d6e4f8;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .topper h2 {
            font-size: 19px;
            color: #304d74;
            margin-bottom: 8px;
        }

        .topper p {
            font-size: 13px;
            color: #687a91;
        }

        .topper strong {
            color: #4f73aa;
        }

        .report-box {
            background: white;
            border: 1px solid #dfe6ef;
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 20px;
        }

        .report-box h2 {
            font-size: 18px;
            color: #30435e;
            margin-bottom: 15px;
        }

        .report-box table {
            min-width: 700px;
        }

        .report-box th {
            background: #eef3f9;
        }

        .report-box td {
            padding: 13px 10px;
        }

        .grade {
            display: inline-block;
            padding: 5px 10px;
            background: #edf3fc;
            color: #5276ad;
            border-radius: 5px;
            font-weight: bold;
        }

        .back {
            display: inline-block;
            padding: 11px 18px;
            background: #5c80b8;
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 12px;
        }

    </style>

</head>

<body>

<div class="container">


    <div class="report-title">

        <h1>📊 Student Performance Report</h1>

        <p>
            Detailed analysis of semester marks
        </p>

    </div>


    <!-- Overall Topper -->

    <div class="topper">

        <h2>🏆 Overall Academic Topper</h2>

        <p>

            <strong>
                <?= htmlspecialchars($overallTopper["name"]) ?>
            </strong>

            achieved an average of

            <strong>
                <?= number_format(
                    $overallTopper["average"],
                    1
                ) ?>%
            </strong>

        </p>

    </div>


    <!-- Student Report -->

    <div class="report-box">

        <h2>Student Performance</h2>

        <div class="table-container">

            <table>

                <tr>

                    <th>Student</th>

                    <?php foreach ($subjects as $subject): ?>

                        <th>
                            <?= htmlspecialchars($subject) ?>
                        </th>

                    <?php endforeach; ?>

                    <th>Total</th>
                    <th>Average</th>
                    <th>Grade</th>

                </tr>


                <?php foreach ($students as $student): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($student["name"]) ?>
                        </td>

                        <?php foreach ($subjects as $subject): ?>

                            <td>
                                <?= $student["marks"][$subject] ?>
                            </td>

                        <?php endforeach; ?>

                        <td>
                            <?= $student["total"] ?>
                        </td>

                        <td>
                            <?= number_format(
                                $student["average"],
                                1
                            ) ?>%
                        </td>

                        <td>
                            <span class="grade">
                                <?= $student["grade"] ?>
                            </span>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </table>

        </div>

    </div>


    <!-- Subject Toppers -->

    <div class="report-box">

        <h2>🏅 Subject-wise Toppers</h2>

        <div class="table-container">

            <table>

                <tr>
                    <th>Subject</th>
                    <th>Topper</th>
                    <th>Marks</th>
                </tr>

                <?php foreach ($subjectToppers as $subject => $topper): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($subject) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($topper["name"]) ?>
                        </td>

                        <td>
                            <?= $topper["mark"] ?> / 100
                        </td>

                    </tr>

                <?php endforeach; ?>

            </table>

        </div>

    </div>


    <!-- Class Averages -->

    <div class="report-box">

        <h2>📈 Class Averages</h2>

        <div class="table-container">

            <table>

                <tr>
                    <th>Subject</th>
                    <th>Class Average</th>
                </tr>

                <?php foreach ($classAverages as $subject => $average): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($subject) ?>
                        </td>

                        <td>
                            <?= number_format($average, 1) ?>
                        </td>

                    </tr>

                <?php endforeach; ?>


                <tr>

                    <td>
                        <strong>Overall Class Average</strong>
                    </td>

                    <td>
                        <strong>
                            <?= number_format(
                                $classAverage,
                                1
                            ) ?>%
                        </strong>
                    </td>

                </tr>

            </table>

        </div>

    </div>


    <a href="index.php" class="back">
        ← Back to Student Entry
    </a>


    <div class="footer">
        PHP Practical • Student Performance Analysis
    </div>


</div>

</body>

</html>