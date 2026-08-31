<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Patient Records Analysis</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <!-- HEADER -->

    <header>

        <div class="logo">
            🏥
        </div>

        <div>

            <div class="eyebrow">
                HEALTHCARE ANALYTICS
            </div>

            <h1>Patient Records Analysis</h1>

            <p>
                Analyze patient information and treatment statistics
            </p>

        </div>

    </header>


    <!-- INTRODUCTION -->

    <section class="intro">

        <span>PATIENT MANAGEMENT</span>

        <h2>Enter Patient Details</h2>

        <p>
            Enter patient information to generate department-wise
            reports and treatment statistics.
        </p>

    </section>


    <!-- FORM -->

    <form action="process.php" method="POST">


        <div class="patient-container">


            <!-- PATIENT 1 -->

            <div class="patient-card blue">

                <div class="patient-top">

                    <div class="patient-number">
                        PATIENT 01
                    </div>

                    <div class="patient-icon">
                        👤
                    </div>

                </div>

                <h3>Patient Information</h3>

                <div class="field">

                    <label>Patient Name</label>

                    <input
                        type="text"
                        name="patients[0][name]"
                        placeholder="Enter patient name"
                        required
                    >

                </div>


                <div class="two-fields">

                    <div class="field">

                        <label>Age</label>

                        <input
                            type="number"
                            name="patients[0][age]"
                            placeholder="Age"
                            min="1"
                            max="120"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>Department</label>

                        <select
                            name="patients[0][department]"
                            required
                        >

                            <option value="">
                                Select
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

                            <option value="General Medicine">
                                General Medicine
                            </option>

                        </select>

                    </div>

                </div>


                <div class="field">

                    <label>Treatment</label>

                    <input
                        type="text"
                        name="patients[0][treatment]"
                        placeholder="Enter treatment"
                        required
                    >

                </div>

            </div>



            <!-- PATIENT 2 -->

            <div class="patient-card teal">

                <div class="patient-top">

                    <div class="patient-number">
                        PATIENT 02
                    </div>

                    <div class="patient-icon">
                        🩺
                    </div>

                </div>

                <h3>Patient Information</h3>

                <div class="field">

                    <label>Patient Name</label>

                    <input
                        type="text"
                        name="patients[1][name]"
                        placeholder="Enter patient name"
                        required
                    >

                </div>


                <div class="two-fields">

                    <div class="field">

                        <label>Age</label>

                        <input
                            type="number"
                            name="patients[1][age]"
                            placeholder="Age"
                            min="1"
                            max="120"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>Department</label>

                        <select
                            name="patients[1][department]"
                            required
                        >

                            <option value="">
                                Select
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

                            <option value="General Medicine">
                                General Medicine
                            </option>

                        </select>

                    </div>

                </div>


                <div class="field">

                    <label>Treatment</label>

                    <input
                        type="text"
                        name="patients[1][treatment]"
                        placeholder="Enter treatment"
                        required
                    >

                </div>

            </div>



            <!-- PATIENT 3 -->

            <div class="patient-card purple">

                <div class="patient-top">

                    <div class="patient-number">
                        PATIENT 03
                    </div>

                    <div class="patient-icon">
                        💊
                    </div>

                </div>

                <h3>Patient Information</h3>

                <div class="field">

                    <label>Patient Name</label>

                    <input
                        type="text"
                        name="patients[2][name]"
                        placeholder="Enter patient name"
                        required
                    >

                </div>


                <div class="two-fields">

                    <div class="field">

                        <label>Age</label>

                        <input
                            type="number"
                            name="patients[2][age]"
                            placeholder="Age"
                            min="1"
                            max="120"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>Department</label>

                        <select
                            name="patients[2][department]"
                            required
                        >

                            <option value="">
                                Select
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

                            <option value="General Medicine">
                                General Medicine
                            </option>

                        </select>

                    </div>

                </div>


                <div class="field">

                    <label>Treatment</label>

                    <input
                        type="text"
                        name="patients[2][treatment]"
                        placeholder="Enter treatment"
                        required
                    >

                </div>

            </div>



            <!-- PATIENT 4 -->

            <div class="patient-card orange">

                <div class="patient-top">

                    <div class="patient-number">
                        PATIENT 04
                    </div>

                    <div class="patient-icon">
                        🧬
                    </div>

                </div>

                <h3>Patient Information</h3>

                <div class="field">

                    <label>Patient Name</label>

                    <input
                        type="text"
                        name="patients[3][name]"
                        placeholder="Enter patient name"
                        required
                    >

                </div>


                <div class="two-fields">

                    <div class="field">

                        <label>Age</label>

                        <input
                            type="number"
                            name="patients[3][age]"
                            placeholder="Age"
                            min="1"
                            max="120"
                            required
                        >

                    </div>


                    <div class="field">

                        <label>Department</label>

                        <select
                            name="patients[3][department]"
                            required
                        >

                            <option value="">
                                Select
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

                            <option value="General Medicine">
                                General Medicine
                            </option>

                        </select>

                    </div>

                </div>


                <div class="field">

                    <label>Treatment</label>

                    <input
                        type="text"
                        name="patients[3][treatment]"
                        placeholder="Enter treatment"
                        required
                    >

                </div>

            </div>


        </div>


        <!-- BUTTON -->

        <div class="button-area">

            <button type="submit">
                Generate Patient Report →
            </button>

            <p>
                PHP Practical • Multidimensional Arrays
            </p>

        </div>

    </form>


    <footer>
        Patient Records Analysis • Healthcare Data Management
    </footer>

</div>

</body>

</html>