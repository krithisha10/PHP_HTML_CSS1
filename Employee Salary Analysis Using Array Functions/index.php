<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Salary Analysis</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <!-- HEADER -->
    <header>

        <div class="logo">₹</div>

        <div>
            <h1>Employee Salary Analysis</h1>
            <p>Analyze employee salaries using PHP array functions</p>
        </div>

    </header>


    <!-- INTRODUCTION -->
    <section class="intro">

        <span>SALARY MANAGEMENT</span>

        <h2>Enter Employee Details</h2>

        <p>
            Provide the employee names and salaries to generate a salary analysis report.
        </p>

    </section>


    <!-- EMPLOYEE FORM -->
    <form action="process.php" method="POST">

        <div class="employee-container">


            <!-- EMPLOYEE 1 -->
            <div class="employee-card">

                <div class="number">01</div>

                <h3>Employee One</h3>

                <label>Employee Name</label>

                <input
                    type="text"
                    name="employees[0][name]"
                    placeholder="Enter employee name"
                    required
                >

                <label>Monthly Salary</label>

                <div class="salary-input">

                    <span>₹</span>

                    <input
                        type="number"
                        name="employees[0][salary]"
                        placeholder="Enter salary"
                        min="1"
                        required
                    >

                </div>

            </div>


            <!-- EMPLOYEE 2 -->
            <div class="employee-card">

                <div class="number">02</div>

                <h3>Employee Two</h3>

                <label>Employee Name</label>

                <input
                    type="text"
                    name="employees[1][name]"
                    placeholder="Enter employee name"
                    required
                >

                <label>Monthly Salary</label>

                <div class="salary-input">

                    <span>₹</span>

                    <input
                        type="number"
                        name="employees[1][salary]"
                        placeholder="Enter salary"
                        min="1"
                        required
                    >

                </div>

            </div>


            <!-- EMPLOYEE 3 -->
            <div class="employee-card">

                <div class="number">03</div>

                <h3>Employee Three</h3>

                <label>Employee Name</label>

                <input
                    type="text"
                    name="employees[2][name]"
                    placeholder="Enter employee name"
                    required
                >

                <label>Monthly Salary</label>

                <div class="salary-input">

                    <span>₹</span>

                    <input
                        type="number"
                        name="employees[2][salary]"
                        placeholder="Enter salary"
                        min="1"
                        required
                    >

                </div>

            </div>


        </div>


        <!-- BUTTON -->

        <div class="button-area">

            <button type="submit">
                Analyze Salaries →
            </button>

            <p>Using PHP Array Functions</p>

        </div>

    </form>


    <footer>
        PHP Practical • Employee Salary Analysis
    </footer>

</div>

</body>
</html>