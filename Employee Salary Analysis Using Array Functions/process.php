<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}


/* =====================================
   STORE EMPLOYEE DETAILS IN ARRAY
   ===================================== */

$employees = $_POST["employees"];


/* =====================================
   EXTRACT SALARIES
   ===================================== */

$salaries = array_column($employees, "salary");

$salaries = array_map("floatval", $salaries);


/* =====================================
   ARRAY FUNCTIONS
   ===================================== */

/* Highest salary */
$highestSalary = max($salaries);


/* Lowest salary */
$lowestSalary = min($salaries);


/* Total salary */
$totalSalary = array_sum($salaries);


/* Average salary */
$averageSalary = $totalSalary / count($salaries);


/* =====================================
   FIND EMPLOYEES
   ===================================== */

$highestIndex = array_search(
    $highestSalary,
    $salaries
);

$lowestIndex = array_search(
    $lowestSalary,
    $salaries
);

$highestEmployee =
    $employees[$highestIndex]["name"];

$lowestEmployee =
    $employees[$lowestIndex]["name"];


/* =====================================
   FORMAT MONEY
   ===================================== */

function money($amount)
{
    return "₹" . number_format($amount, 2);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Salary Analysis Report</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">


    <!-- HEADER -->

    <header>

        <div class="logo">
            ₹
        </div>

        <div>

            <h1>Salary Analysis Report</h1>

            <p>
                Employee salary statistics generated successfully
            </p>

        </div>

    </header>


    <!-- SUMMARY -->

    <section class="summary">

        <div class="summary-card">

            <span>HIGHEST SALARY</span>

            <h2>
                <?= money($highestSalary) ?>
            </h2>

            <p>
                <?= htmlspecialchars($highestEmployee) ?>
            </p>

        </div>


        <div class="summary-card">

            <span>LOWEST SALARY</span>

            <h2>
                <?= money($lowestSalary) ?>
            </h2>

            <p>
                <?= htmlspecialchars($lowestEmployee) ?>
            </p>

        </div>


        <div class="summary-card">

            <span>AVERAGE SALARY</span>

            <h2>
                <?= money($averageSalary) ?>
            </h2>

            <p>
                Average per employee
            </p>

        </div>

    </section>


    <!-- EMPLOYEE DETAILS -->

    <section class="report">

        <div class="report-heading">

            <div>

                <span>EMPLOYEE OVERVIEW</span>

                <h2>Salary Distribution</h2>

            </div>

            <p>
                <?= count($employees) ?> Employees
            </p>

        </div>


        <div class="employee-results">

            <?php foreach ($employees as $index => $employee): ?>

                <?php

                $salary =
                    (float)$employee["salary"];

                $percentage =
                    ($salary / $highestSalary) * 100;

                ?>

                <div class="employee-result">

                    <div class="employee-info">

                        <div class="result-number">
                            0<?= $index + 1 ?>
                        </div>

                        <div>

                            <h3>
                                <?= htmlspecialchars($employee["name"]) ?>
                            </h3>

                            <p>
                                Employee <?= $index + 1 ?>
                            </p>

                        </div>

                    </div>


                    <div class="salary-value">

                        <strong>
                            <?= money($salary) ?>
                        </strong>

                        <span>
                            Monthly
                        </span>

                    </div>


                    <div class="salary-bar">

                        <div
                            class="salary-fill"
                            style="width: <?= $percentage ?>%;">
                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </section>


    <!-- ANALYSIS -->

    <section class="analysis">

        <div class="analysis-icon">
            ★
        </div>

        <div>

            <span>ANALYSIS RESULT</span>

            <h2>
                <?= htmlspecialchars($highestEmployee) ?>
                has the highest salary
            </h2>

            <p>
                The highest monthly salary is
                <strong>
                    <?= money($highestSalary) ?>
                </strong>,
                while the overall average salary is
                <strong>
                    <?= money($averageSalary) ?>
                </strong>.
            </p>

        </div>

    </section>


    <!-- BACK BUTTON -->

    <div class="back">

        <a href="index.php">
            ← Enter New Employee Data
        </a>

    </div>


    <footer>
        PHP Practical • Array Functions • Employee Salary Analysis
    </footer>

</div>


<style>

/* =========================
   SUMMARY
   ========================= */

.summary {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 15px;

    margin-bottom: 20px;
}

.summary-card {
    background: #ffffff;

    border: 1px solid #e4e0d6;

    border-radius: 13px;

    padding: 21px;

    box-shadow:
        0 7px 22px rgba(70, 64, 47, 0.05);
}

.summary-card span {
    font-size: 8px;

    letter-spacing: 1px;

    font-weight: bold;

    color: #a0813d;
}

.summary-card h2 {
    font-size: 21px;

    color: #4b463b;

    margin: 7px 0;
}

.summary-card p {
    font-size: 10px;

    color: #938d81;
}


/* =========================
   REPORT
   ========================= */

.report {
    background: #ffffff;

    border: 1px solid #e4e0d6;

    border-radius: 15px;

    padding: 27px;

    box-shadow:
        0 7px 22px rgba(70, 64, 47, 0.05);

    margin-bottom: 20px;
}

.report-heading {
    display: flex;

    justify-content: space-between;

    align-items: flex-end;

    margin-bottom: 22px;
}

.report-heading span {
    font-size: 8px;

    letter-spacing: 1.2px;

    color: #a0813d;

    font-weight: bold;
}

.report-heading h2 {
    font-size: 18px;

    color: #4b473e;

    margin-top: 5px;
}

.report-heading > p {
    font-size: 10px;

    color: #9d978c;
}


/* =========================
   EMPLOYEE RESULTS
   ========================= */

.employee-results {
    display: flex;

    flex-direction: column;

    gap: 14px;
}

.employee-result {
    padding: 17px;

    border: 1px solid #e8e4db;

    border-radius: 10px;

    background: #fcfbf8;
}

.employee-info {
    display: flex;

    align-items: center;

    gap: 11px;

    margin-bottom: 13px;
}

.result-number {
    width: 32px;
    height: 32px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: #f1ead9;

    color: #9a7a38;

    border-radius: 8px;

    font-size: 9px;

    font-weight: bold;
}

.employee-info h3 {
    font-size: 12px;

    color: #514c42;

    margin-bottom: 3px;
}

.employee-info p {
    font-size: 9px;

    color: #9a9489;
}


/* =========================
   SALARY
   ========================= */

.salary-value {
    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 8px;
}

.salary-value strong {
    font-size: 13px;

    color: #9a7a38;
}

.salary-value span {
    font-size: 9px;

    color: #9a9489;
}


/* =========================
   SALARY BAR
   ========================= */

.salary-bar {
    width: 100%;

    height: 6px;

    background: #eeeae1;

    border-radius: 10px;

    overflow: hidden;
}

.salary-fill {
    height: 100%;

    background: #b49a5e;

    border-radius: 10px;
}


/* =========================
   ANALYSIS
   ========================= */

.analysis {
    display: flex;

    align-items: center;

    gap: 15px;

    background: #5e5749;

    color: white;

    border-radius: 14px;

    padding: 22px 25px;

    margin-bottom: 20px;
}

.analysis-icon {
    width: 43px;
    height: 43px;

    min-width: 43px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: rgba(255,255,255,0.13);

    border-radius: 9px;

    font-size: 17px;
}

.analysis span {
    font-size: 8px;

    letter-spacing: 1px;

    color: #dcd5c6;

    font-weight: bold;
}

.analysis h2 {
    font-size: 15px;

    margin: 5px 0;
}

.analysis p {
    font-size: 10px;

    line-height: 1.6;

    color: #e4dfd4;
}


/* =========================
   BACK
   ========================= */

.back {
    text-align: center;

    margin: 23px 0;
}

.back a {
    display: inline-block;

    background: #9a7a38;

    color: #ffffff;

    text-decoration: none;

    padding: 11px 19px;

    border-radius: 7px;

    font-size: 10px;

    font-weight: bold;
}

.back a:hover {
    background: #806328;
}


/* =========================
   RESPONSIVE
   ========================= */

@media (max-width: 800px) {

    .summary {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 600px) {

    .container {
        width: 94%;
    }

    .report {
        padding: 20px;
    }

    .analysis {
        align-items: flex-start;
    }

}

</style>

</body>
</html>