<?php

/* =========================================
   STUDENT PLACEMENT DATA
   ========================================= */

$students = [

    [
        "name" => "Ananya",
        "department" => "Computer Science",
        "company" => "TCS",
        "package" => 6.5
    ],

    [
        "name" => "Bhavya",
        "department" => "Computer Science",
        "company" => "Infosys",
        "package" => 5.8
    ],

    [
        "name" => "Charan",
        "department" => "Computer Science",
        "company" => "Accenture",
        "package" => 7.2
    ],

    [
        "name" => "Divya",
        "department" => "Information Technology",
        "company" => "Wipro",
        "package" => 6.0
    ],

    [
        "name" => "Harini",
        "department" => "Information Technology",
        "company" => "Cognizant",
        "package" => 7.5
    ],

    [
        "name" => "Kavin",
        "department" => "Information Technology",
        "company" => "IBM",
        "package" => 8.0
    ],

    [
        "name" => "Meena",
        "department" => "Data Science",
        "company" => "Deloitte",
        "package" => 8.5
    ],

    [
        "name" => "Nithya",
        "department" => "Data Science",
        "company" => "Amazon",
        "package" => 10.0
    ],

    [
        "name" => "Rahul",
        "department" => "Data Science",
        "company" => "Zoho",
        "package" => 9.0
    ],

    [
        "name" => "Sneha",
        "department" => "Computer Science",
        "company" => "HCL",
        "package" => 5.5
    ],

    [
        "name" => "Varun",
        "department" => "Information Technology",
        "company" => "Tech Mahindra",
        "package" => 6.8
    ],

    [
        "name" => "Yamini",
        "department" => "Data Science",
        "company" => "Microsoft",
        "package" => 12.0
    ]

];


/* =========================================
   BASIC STATISTICS
   ========================================= */

$totalStudents = count($students);

$placedStudents = count($students);

$totalPackage = 0;

$highestPackage = $students[0]["package"];

$lowestPackage = $students[0]["package"];


/* =========================================
   CALCULATE PACKAGE VALUES
   ========================================= */

foreach ($students as $student) {

    $package = $student["package"];

    $totalPackage += $package;

    if ($package > $highestPackage) {
        $highestPackage = $package;
    }

    if ($package < $lowestPackage) {
        $lowestPackage = $package;
    }
}


/* =========================================
   MATHEMATICAL CALCULATIONS
   ========================================= */

$averagePackage = $totalPackage / $placedStudents;

$placementPercentage =
    ($placedStudents / $totalStudents) * 100;


/* =========================================
   SORT STUDENTS BY PACKAGE
   HIGHEST TO LOWEST
   ========================================= */

$rankedStudents = $students;

usort(
    $rankedStudents,
    function ($a, $b) {

        return $b["package"] <=> $a["package"];

    }
);


/* =========================================
   DEPARTMENT-WISE DATA
   ========================================= */

$departments = [];


foreach ($students as $student) {

    $department = $student["department"];

    if (!isset($departments[$department])) {

        $departments[$department] = [

            "students" => 0,

            "total_package" => 0,

            "highest_package" => 0

        ];

    }


    $departments[$department]["students"]++;

    $departments[$department]["total_package"]
        += $student["package"];


    if (
        $student["package"] >
        $departments[$department]["highest_package"]
    ) {

        $departments[$department]["highest_package"]
            = $student["package"];

    }

}


/* =========================================
   DEPARTMENT AVERAGE
   ========================================= */

foreach ($departments as $department => $data) {

    $departments[$department]["average_package"] =
        $data["total_package"] /
        $data["students"];

}


/* =========================================
   SORT DEPARTMENTS BY AVERAGE PACKAGE
   ========================================= */

uasort(
    $departments,
    function ($a, $b) {

        return
            $b["average_package"]
            <=>
            $a["average_package"];

    }
);


/* =========================================
   DEPARTMENT RANK
   ========================================= */

$departmentRank = 1;

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
        Placement Report
    </title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


<div class="page">


    <!-- =====================================
         HEADER
         ===================================== -->

    <header class="header">

        <div class="brand">

            <div class="logo">
                🎓
            </div>

            <div>

                <span>
                    PLACEMENT CELL
                </span>

                <h1>
                    Student Placement Statistics
                </h1>

            </div>

        </div>


        <div class="year">
            2026 BATCH
        </div>

    </header>



    <!-- =====================================
         MAIN CONTAINER
         ===================================== -->

    <main class="container">


        <!-- =====================================
             REPORT HEADER
             ===================================== -->

        <section class="report-header">

            <span>
                PLACEMENT ANALYSIS
            </span>

            <h2>
                Campus Placement Report
            </h2>

            <p>
                Overall student performance and
                department-wise placement analysis.
            </p>

        </section>



        <!-- =====================================
             MAIN STATISTICS
             ===================================== -->

        <section class="statistics">


            <div class="stat">

                <span>
                    TOTAL STUDENTS
                </span>

                <strong>
                    <?php echo $totalStudents; ?>
                </strong>

            </div>


            <div class="stat">

                <span>
                    PLACED STUDENTS
                </span>

                <strong>
                    <?php echo $placedStudents; ?>
                </strong>

            </div>


            <div class="stat">

                <span>
                    PLACEMENT %
                </span>

                <strong>
                    <?php
                    echo number_format(
                        $placementPercentage,
                        1
                    );
                    ?>%
                </strong>

            </div>


            <div class="stat">

                <span>
                    HIGHEST PACKAGE
                </span>

                <strong>
                    ₹<?php
                    echo number_format(
                        $highestPackage,
                        1
                    );
                    ?> LPA
                </strong>

            </div>


        </section>



        <!-- =====================================
             PACKAGE SUMMARY
             ===================================== -->

        <section class="report-card">


            <div class="report-title">

                <span>
                    PACKAGE SUMMARY
                </span>

                <h3>
                    Placement Package Statistics
                </h3>

            </div>


            <section class="statistics">


                <div class="stat">

                    <span>
                        AVERAGE PACKAGE
                    </span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $averagePackage,
                            2
                        );
                        ?> LPA
                    </strong>

                </div>


                <div class="stat">

                    <span>
                        LOWEST PACKAGE
                    </span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $lowestPackage,
                            1
                        );
                        ?> LPA
                    </strong>

                </div>


                <div class="stat">

                    <span>
                        HIGHEST PACKAGE
                    </span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $highestPackage,
                            1
                        );
                        ?> LPA
                    </strong>

                </div>


                <div class="stat">

                    <span>
                        TOTAL PACKAGE VALUE
                    </span>

                    <strong>
                        ₹<?php
                        echo number_format(
                            $totalPackage,
                            1
                        );
                        ?> LPA
                    </strong>

                </div>


            </section>


        </section>



        <!-- =====================================
             STUDENT RANKING
             ===================================== -->

        <section class="report-card">


            <div class="report-title">

                <span>
                    STUDENT RANKING
                </span>

                <h3>
                    Students Ranked by Package
                </h3>

            </div>


            <div class="table-wrapper">


                <table>

                    <thead>

                        <tr>

                            <th>
                                RANK
                            </th>

                            <th>
                                STUDENT
                            </th>

                            <th>
                                DEPARTMENT
                            </th>

                            <th>
                                COMPANY
                            </th>

                            <th>
                                PACKAGE
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                    <?php

                    $rank = 1;

                    foreach (
                        $rankedStudents
                        as $student
                    ):

                    ?>


                        <tr>

                            <td>

                                <span class="rank">

                                    <?php
                                    echo $rank;
                                    ?>

                                </span>

                            </td>


                            <td class="student">

                                <?php
                                echo htmlspecialchars(
                                    $student["name"]
                                );
                                ?>

                            </td>


                            <td>

                                <?php
                                echo htmlspecialchars(
                                    $student["department"]
                                );
                                ?>

                            </td>


                            <td class="company">

                                <?php
                                echo htmlspecialchars(
                                    $student["company"]
                                );
                                ?>

                            </td>


                            <td class="package">

                                ₹<?php
                                echo number_format(
                                    $student["package"],
                                    1
                                );
                                ?> LPA

                            </td>

                        </tr>


                    <?php

                        $rank++;

                    endforeach;

                    ?>


                    </tbody>

                </table>


            </div>


        </section>



        <!-- =====================================
             DEPARTMENT RANKING
             ===================================== -->

        <section class="report-card">


            <div class="report-title">

                <span>
                    DEPARTMENT ANALYSIS
                </span>

                <h3>
                    Department-wise Rankings
                </h3>

            </div>


            <div class="department-grid">


            <?php

            foreach (
                $departments
                as $department => $data
            ):

            ?>


                <div class="department-card">


                    <div class="department-rank">

                        #<?php
                        echo $departmentRank;
                        ?>

                    </div>


                    <h4>

                        <?php
                        echo htmlspecialchars(
                            $department
                        );
                        ?>

                    </h4>


                    <p>

                        Students:

                        <strong>

                            <?php
                            echo $data["students"];
                            ?>

                        </strong>

                    </p>


                    <p>

                        Average Package:

                        <strong>

                            ₹<?php
                            echo number_format(
                                $data["average_package"],
                                2
                            );
                            ?> LPA

                        </strong>

                    </p>


                    <p>

                        Highest Package:

                        <strong>

                            ₹<?php
                            echo number_format(
                                $data["highest_package"],
                                1
                            );
                            ?> LPA

                        </strong>

                    </p>


                </div>


            <?php

                $departmentRank++;

            endforeach;

            ?>


            </div>


        </section>



        <!-- =====================================
             BACK BUTTON
             ===================================== -->

        <div class="back-button">

            <a href="index.php">
                ← Generate New Report
            </a>

        </div>



        <!-- =====================================
             FOOTER
             ===================================== -->

        <footer>

            <span>
                PHP PRACTICAL
            </span>

            <i>•</i>

            Student Placement Statistics

            <i>•</i>

            Multidimensional Arrays & Sorting

        </footer>


    </main>


</div>


</body>

</html>