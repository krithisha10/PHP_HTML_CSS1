<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Payroll Exception Handling</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <!-- =========================================
         HEADER
         ========================================= -->

    <header class="header">

        <div class="brand">

            <div class="logo">
                ₹
            </div>

            <div>

                <span class="mini-title">
                    PAYROLL MANAGEMENT
                </span>

                <h1>
                    Salary Processing Center
                </h1>

            </div>

        </div>


        <div class="header-status">

            <span class="status-dot"></span>

            SYSTEM READY

        </div>

    </header>



    <!-- =========================================
         MAIN
         ========================================= -->

    <main class="container">


        <!-- =====================================
             HERO
             ===================================== -->

        <section class="hero">

            <div class="hero-content">

                <span class="hero-label">
                    EMPLOYEE PAYROLL
                </span>

                <h2>
                    Process salaries with
                    <strong>exception protection.</strong>
                </h2>

                <p>
                    Enter employee salary details to calculate
                    allowances, deductions and net salary.
                    Runtime errors are handled safely so that
                    payroll processing can continue.
                </p>

            </div>


            <div class="hero-graphic">

                <div class="graphic-circle">

                    <span>₹</span>

                </div>

                <div class="graphic-small">
                    +
                </div>

                <div class="graphic-small second">
                    ✓
                </div>

            </div>

        </section>



        <!-- =====================================
             FORM
             ===================================== -->

        <form action="process.php"
              method="POST">


            <section class="payroll-card">


                <!-- CARD HEADER -->

                <div class="card-header">

                    <div>

                        <span>
                            PAYROLL INPUT
                        </span>

                        <h2>
                            Employee Salary Details
                        </h2>

                    </div>

                    <div class="step-number">
                        01
                    </div>

                </div>



                <!-- =================================
                     EMPLOYEE DETAILS
                     ================================= -->

                <div class="section-heading">

                    <span>
                        EMPLOYEE INFORMATION
                    </span>

                </div>


                <div class="form-grid">


                    <!-- EMPLOYEE NAME -->

                    <div class="field">

                        <label for="name">
                            Employee Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Enter employee name"
                            required
                        >

                    </div>



                    <!-- EMPLOYEE ID -->

                    <div class="field">

                        <label for="employee_id">
                            Employee ID
                        </label>

                        <input
                            type="text"
                            id="employee_id"
                            name="employee_id"
                            placeholder="Example: EMP101"
                            required
                        >

                    </div>


                </div>



                <!-- =================================
                     SALARY DETAILS
                     ================================= -->

                <div class="section-heading salary-heading">

                    <span>
                        SALARY COMPONENTS
                    </span>

                </div>


                <div class="salary-grid">


                    <!-- BASIC SALARY -->

                    <div class="salary-box blue-box">

                        <div class="salary-icon">
                            ₹
                        </div>

                        <label>
                            BASIC SALARY
                        </label>

                        <input
                            type="number"
                            name="basic_salary"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>



                    <!-- ALLOWANCE -->

                    <div class="salary-box green-box">

                        <div class="salary-icon">
                            +
                        </div>

                        <label>
                            ALLOWANCE
                        </label>

                        <input
                            type="number"
                            name="allowance"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>



                    <!-- DEDUCTION -->

                    <div class="salary-box orange-box">

                        <div class="salary-icon">
                            −
                        </div>

                        <label>
                            DEDUCTION
                        </label>

                        <input
                            type="number"
                            name="deduction"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>


                </div>



                <!-- =================================
                     ERROR HANDLING INFO
                     ================================= -->

                <div class="exception-info">

                    <div class="exception-symbol">
                        !
                    </div>

                    <div>

                        <strong>
                            Runtime Exception Protection
                        </strong>

                        <p>
                            Invalid salary values and calculation
                            errors will be handled without stopping
                            the entire payroll process.
                        </p>

                    </div>

                </div>



                <!-- =================================
                     SUBMIT
                     ================================= -->

                <div class="submit-area">

                    <div class="validation">

                        <span>✓</span>

                        Input validation enabled

                    </div>


                    <button type="submit">

                        Calculate Payroll

                        <span>
                            →
                        </span>

                    </button>

                </div>


            </section>


        </form>



        <!-- =====================================
             FEATURES
             ===================================== -->

        <section class="features">

            <div class="feature-heading">

                <span>
                    SYSTEM CAPABILITIES
                </span>

                <h2>
                    Safe Payroll Processing
                </h2>

            </div>


            <div class="feature-grid">


                <div class="feature-card">

                    <div class="feature-icon blue">
                        +
                    </div>

                    <div>

                        <h3>
                            Salary Calculation
                        </h3>

                        <p>
                            Calculates gross and net salary
                            automatically.
                        </p>

                    </div>

                </div>



                <div class="feature-card">

                    <div class="feature-icon orange">
                        !
                    </div>

                    <div>

                        <h3>
                            Runtime Handling
                        </h3>

                        <p>
                            Catches calculation errors without
                            crashing the application.
                        </p>

                    </div>

                </div>



                <div class="feature-card">

                    <div class="feature-icon green">
                        ✓
                    </div>

                    <div>

                        <h3>
                            Continuous Processing
                        </h3>

                        <p>
                            Valid employee records continue
                            processing even after an error.
                        </p>

                    </div>

                </div>


            </div>

        </section>



        <!-- =====================================
             FOOTER
             ===================================== -->

        <footer>

            PHP PRACTICAL

            <span>•</span>

            EXCEPTION HANDLING

            <span>•</span>

            PAYROLL MANAGEMENT

        </footer>


    </main>

</div>

</body>

</html>