<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Patient Data Processing</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="page">


    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="brand-icon">
                🩺
            </div>

            <div>

                <span class="eyebrow">
                    HEALTHCARE DATA SYSTEM
                </span>

                <h1>
                    Patient Data Processing
                </h1>

            </div>

        </div>


        <div class="status-badge">

            <span></span>

            VALIDATION READY

        </div>

    </header>



    <!-- MAIN -->

    <main class="container">


        <!-- HERO -->

        <section class="hero">

            <div class="hero-content">

                <span class="hero-label">
                    PATIENT RECORD MANAGEMENT
                </span>

                <h2>
                    Process patient data
                    <strong>reliably.</strong>
                </h2>

                <p>
                    Enter patient details below to validate
                    records, handle processing exceptions,
                    and generate a reliable patient report.
                </p>

            </div>


            <div class="medical-visual">

                <div class="circle circle-one"></div>

                <div class="circle circle-two"></div>

                <div class="medical-icon">
                    +
                </div>

                <div class="visual-card card-top">
                    ✓ Valid
                </div>

                <div class="visual-card card-bottom">
                    ⚠ Check
                </div>

            </div>

        </section>



        <!-- FORM -->

        <form action="process.php" method="POST">


            <section class="form-panel">


                <!-- PANEL HEADER -->

                <div class="panel-header">

                    <div>

                        <span>
                            PATIENT RECORDS
                        </span>

                        <h2>
                            Enter Patient Information
                        </h2>

                    </div>


                    <div class="record-count">
                        04
                    </div>

                </div>



                <!-- PATIENT 1 -->

                <div class="patient-card">

                    <div class="patient-number">
                        01
                    </div>


                    <div class="field">

                        <label>
                            PATIENT NAME
                        </label>

                        <input
                            type="text"
                            name="patients[0][name]"
                            placeholder="Enter patient name"
                            required
                        >

                    </div>


                    <div class="field small-field">

                        <label>
                            AGE
                        </label>

                        <input
                            type="number"
                            name="patients[0][age]"
                            placeholder="Age"
                            min="0"
                            max="120"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>
                            DEPARTMENT
                        </label>

                        <select
                            name="patients[0][department]"
                            required
                        >

                            <option value="">
                                Select department
                            </option>

                            <option value="General Medicine">
                                General Medicine
                            </option>

                            <option value="Cardiology">
                                Cardiology
                            </option>

                            <option value="Neurology">
                                Neurology
                            </option>

                            <option value="Orthopedics">
                                Orthopedics
                            </option>

                            <option value="Pediatrics">
                                Pediatrics
                            </option>

                        </select>

                    </div>


                    <div class="field">

                        <label>
                            PATIENT ID
                        </label>

                        <input
                            type="text"
                            name="patients[0][patient_id]"
                            placeholder="Example: P1001"
                            required
                        >

                    </div>

                </div>



                <!-- PATIENT 2 -->

                <div class="patient-card">

                    <div class="patient-number">
                        02
                    </div>


                    <div class="field">

                        <label>
                            PATIENT NAME
                        </label>

                        <input
                            type="text"
                            name="patients[1][name]"
                            placeholder="Enter patient name"
                            required
                        >

                    </div>


                    <div class="field small-field">

                        <label>
                            AGE
                        </label>

                        <input
                            type="number"
                            name="patients[1][age]"
                            placeholder="Age"
                            min="0"
                            max="120"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>
                            DEPARTMENT
                        </label>

                        <select
                            name="patients[1][department]"
                            required
                        >

                            <option value="">
                                Select department
                            </option>

                            <option value="General Medicine">
                                General Medicine
                            </option>

                            <option value="Cardiology">
                                Cardiology
                            </option>

                            <option value="Neurology">
                                Neurology
                            </option>

                            <option value="Orthopedics">
                                Orthopedics
                            </option>

                            <option value="Pediatrics">
                                Pediatrics
                            </option>

                        </select>

                    </div>


                    <div class="field">

                        <label>
                            PATIENT ID
                        </label>

                        <input
                            type="text"
                            name="patients[1][patient_id]"
                            placeholder="Example: P1002"
                            required
                        >

                    </div>

                </div>



                <!-- PATIENT 3 -->

                <div class="patient-card">

                    <div class="patient-number">
                        03
                    </div>


                    <div class="field">

                        <label>
                            PATIENT NAME
                        </label>

                        <input
                            type="text"
                            name="patients[2][name]"
                            placeholder="Enter patient name"
                            required
                        >

                    </div>


                    <div class="field small-field">

                        <label>
                            AGE
                        </label>

                        <input
                            type="number"
                            name="patients[2][age]"
                            placeholder="Age"
                            min="0"
                            max="120"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>
                            DEPARTMENT
                        </label>

                        <select
                            name="patients[2][department]"
                            required
                        >

                            <option value="">
                                Select department
                            </option>

                            <option value="General Medicine">
                                General Medicine
                            </option>

                            <option value="Cardiology">
                                Cardiology
                            </option>

                            <option value="Neurology">
                                Neurology
                            </option>

                            <option value="Orthopedics">
                                Orthopedics
                            </option>

                            <option value="Pediatrics">
                                Pediatrics
                            </option>

                        </select>

                    </div>


                    <div class="field">

                        <label>
                            PATIENT ID
                        </label>

                        <input
                            type="text"
                            name="patients[2][patient_id]"
                            placeholder="Example: P1003"
                            required
                        >

                    </div>

                </div>



                <!-- PATIENT 4 -->

                <div class="patient-card">

                    <div class="patient-number">
                        04
                    </div>


                    <div class="field">

                        <label>
                            PATIENT NAME
                        </label>

                        <input
                            type="text"
                            name="patients[3][name]"
                            placeholder="Enter patient name"
                            required
                        >

                    </div>


                    <div class="field small-field">

                        <label>
                            AGE
                        </label>

                        <input
                            type="number"
                            name="patients[3][age]"
                            placeholder="Age"
                            min="0"
                            max="120"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>
                            DEPARTMENT
                        </label>

                        <select
                            name="patients[3][department]"
                            required
                        >

                            <option value="">
                                Select department
                            </option>

                            <option value="General Medicine">
                                General Medicine
                            </option>

                            <option value="Cardiology">
                                Cardiology
                            </option>

                            <option value="Neurology">
                                Neurology
                            </option>

                            <option value="Orthopedics">
                                Orthopedics
                            </option>

                            <option value="Pediatrics">
                                Pediatrics
                            </option>

                        </select>

                    </div>


                    <div class="field">

                        <label>
                            PATIENT ID
                        </label>

                        <input
                            type="text"
                            name="patients[3][patient_id]"
                            placeholder="Example: P1004"
                            required
                        >

                    </div>

                </div>



                <!-- PROCESSING INFO -->

                <div class="processing-info">

                    <div class="info-icon">
                        ✓
                    </div>

                    <div>

                        <h3>
                            Automatic Validation
                        </h3>

                        <p>
                            Patient names, ages, departments and
                            patient IDs will be checked before processing.
                        </p>

                    </div>

                </div>



                <!-- SUBMIT -->

                <div class="submit-area">

                    <div class="php-note">

                        <span>
                            PHP
                        </span>

                        <p>
                            Arrays • Validation • Exceptions
                        </p>

                    </div>


                    <button type="submit">

                        Process Patient Records

                        <b>→</b>

                    </button>

                </div>


            </section>

        </form>



        <!-- CONCEPT SECTION -->

        <section class="concept-section">


            <div class="section-heading">

                <span>
                    PROCESSING FEATURES
                </span>

                <h2>
                    Reliable Patient Record Processing
                </h2>

            </div>


            <div class="feature-grid">


                <div class="feature-card">

                    <div class="feature-icon">
                        []
                    </div>

                    <h3>
                        Array Processing
                    </h3>

                    <p>
                        Patient records are stored and processed
                        using multidimensional PHP arrays.
                    </p>

                </div>



                <div class="feature-card">

                    <div class="feature-icon">
                        ✓
                    </div>

                    <h3>
                        Data Validation
                    </h3>

                    <p>
                        Patient information is checked for
                        valid and acceptable values.
                    </p>

                </div>



                <div class="feature-card">

                    <div class="feature-icon">
                        !
                    </div>

                    <h3>
                        Exception Handling
                    </h3>

                    <p>
                        Processing errors are handled safely
                        without stopping the application.
                    </p>

                </div>


            </div>

        </section>



        <!-- FOOTER -->

        <footer>

            PHP PRACTICAL

            <span>•</span>

            PATIENT DATA PROCESSING

            <span>•</span>

            VALIDATION & EXCEPTIONS

        </footer>


    </main>

</div>


</body>

</html>