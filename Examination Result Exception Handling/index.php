<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Examination Result Portal</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="page">


    <!-- =========================================
         HEADER
         ========================================= -->

    <header class="top-header">

        <div class="header-left">

            <div class="college-logo">
                🎓
            </div>

            <div>

                <h1>
                    Examination Result Portal
                </h1>

                <p>
                    Result Processing & Exception Management
                </p>

            </div>

        </div>


        <div class="system-status">

            <span class="status-dot"></span>

            SYSTEM READY

        </div>

    </header>



    <!-- =========================================
         MAIN CONTENT
         ========================================= -->

    <main class="main-container">


        <!-- =====================================
             PAGE TITLE
             ===================================== -->

        <section class="page-heading">

            <div>

                <span class="section-tag">
                    EXAMINATION MANAGEMENT
                </span>

                <h2>
                    Enter Examination Results
                </h2>

                <p>
                    Enter the marks of each student to generate
                    the examination result report.
                </p>

            </div>


            <div class="exam-info">

                <div class="info-item">

                    <span>SUBJECTS</span>

                    <strong>03</strong>

                </div>


                <div class="info-item">

                    <span>MAX MARK</span>

                    <strong>100</strong>

                </div>


                <div class="info-item">

                    <span>PASS MARK</span>

                    <strong>40</strong>

                </div>

            </div>

        </section>



        <!-- =====================================
             FORM
             ===================================== -->

        <form
            action="process.php"
            method="POST"
        >


            <section class="marksheet">


                <!-- TABLE HEADER -->

                <div class="table-title">

                    <div>

                        <span>
                            STUDENT MARKSHEET
                        </span>

                        <h3>
                            Student Examination Records
                        </h3>

                    </div>


                    <div class="record-label">
                        04 RECORDS
                    </div>

                </div>



                <!-- =================================
                     TABLE
                     ================================= -->

                <div class="table-wrapper">

                    <table>


                        <thead>

                            <tr>

                                <th>
                                    NO.
                                </th>

                                <th>
                                    STUDENT NAME
                                </th>

                                <th>
                                    REGISTER NUMBER
                                </th>

                                <th>
                                    MARK 1
                                </th>

                                <th>
                                    MARK 2
                                </th>

                                <th>
                                    MARK 3
                                </th>

                            </tr>

                        </thead>



                        <tbody>


                            <!-- STUDENT 1 -->

                            <tr>

                                <td>

                                    <span class="row-number">
                                        01
                                    </span>

                                </td>


                                <td>

                                    <input
                                        type="text"
                                        name="students[0][name]"
                                        placeholder="Student name"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="text"
                                        name="students[0][register_no]"
                                        placeholder="23CS001"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[0][mark1]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[0][mark2]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[0][mark3]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>

                            </tr>



                            <!-- STUDENT 2 -->

                            <tr>

                                <td>

                                    <span class="row-number">
                                        02
                                    </span>

                                </td>


                                <td>

                                    <input
                                        type="text"
                                        name="students[1][name]"
                                        placeholder="Student name"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="text"
                                        name="students[1][register_no]"
                                        placeholder="23CS002"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[1][mark1]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[1][mark2]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[1][mark3]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>

                            </tr>



                            <!-- STUDENT 3 -->

                            <tr>

                                <td>

                                    <span class="row-number">
                                        03
                                    </span>

                                </td>


                                <td>

                                    <input
                                        type="text"
                                        name="students[2][name]"
                                        placeholder="Student name"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="text"
                                        name="students[2][register_no]"
                                        placeholder="23CS003"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[2][mark1]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[2][mark2]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[2][mark3]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>

                            </tr>



                            <!-- STUDENT 4 -->

                            <tr>

                                <td>

                                    <span class="row-number">
                                        04
                                    </span>

                                </td>


                                <td>

                                    <input
                                        type="text"
                                        name="students[3][name]"
                                        placeholder="Student name"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="text"
                                        name="students[3][register_no]"
                                        placeholder="23CS004"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[3][mark1]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[3][mark2]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>


                                <td>

                                    <input
                                        type="number"
                                        name="students[3][mark3]"
                                        placeholder="00"
                                        min="0"
                                        max="100"
                                        required
                                    >

                                </td>

                            </tr>


                        </tbody>

                    </table>

                </div>



                <!-- =================================
                     GRADING INFORMATION
                     ================================= -->

                <div class="grading-info">


                    <div class="grading-title">

                        <span>
                            GRADING SYSTEM
                        </span>

                        <strong>
                            Evaluation Criteria
                        </strong>

                    </div>


                    <div class="grades">


                        <div>
                            <b>A+</b>
                            <span>90 – 100</span>
                        </div>


                        <div>
                            <b>A</b>
                            <span>80 – 89</span>
                        </div>


                        <div>
                            <b>B</b>
                            <span>70 – 79</span>
                        </div>


                        <div>
                            <b>C</b>
                            <span>60 – 69</span>
                        </div>


                        <div>
                            <b>D</b>
                            <span>50 – 59</span>
                        </div>


                        <div>
                            <b>F</b>
                            <span>Below 50</span>
                        </div>


                    </div>


                </div>



                <!-- =================================
                     EXCEPTION HANDLING NOTE
                     ================================= -->

                <div class="exception-note">


                    <div class="exception-icon">
                        !
                    </div>


                    <div>

                        <strong>
                            Exception Handling Enabled
                        </strong>

                        <p>
                            Runtime errors encountered during
                            result generation will be recorded
                            without stopping the remaining records.
                        </p>

                    </div>


                </div>



                <!-- =================================
                     ACTION AREA
                     ================================= -->

                <div class="action-area">


                    <div class="action-description">

                        <span>
                            PHP PRACTICAL
                        </span>

                        <p>
                            Arrays • Calculations • Exception Handling
                        </p>

                    </div>


                    <button type="submit">

                        Generate Result Report

                        <span>→</span>

                    </button>


                </div>


            </section>


        </form>



        <!-- =====================================
             FOOTER
             ===================================== -->

        <footer>

            <span>
                PHP PRACTICAL
            </span>

            <i>•</i>

            Examination Result Processing

            <i>•</i>

            Runtime Exception Handling

        </footer>


    </main>


</div>


</body>

</html>