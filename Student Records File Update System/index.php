<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>StudentVault | Student Records</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="app">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="logo">
            <div class="logo-box">SV</div>

            <div>
                <strong>StudentVault</strong>
                <small>RECORDS SYSTEM</small>
            </div>
        </div>


        <div class="side-menu">

            <span class="menu-title">MENU</span>

            <div class="menu-item active">
                <span>＋</span>
                Add Student
            </div>

            <div class="menu-item">
                <span>▣</span>
                Student Records
            </div>

        </div>


        <div class="sidebar-bottom">

            <div class="secure-icon">✓</div>

            <strong>File Storage</strong>

            <p>
                Student records are stored
                securely in a text file.
            </p>

        </div>

    </aside>


    <!-- MAIN CONTENT -->

    <main class="content">

        <header class="topbar">

            <div>
                <span class="small-heading">
                    ADMINISTRATION / STUDENTS
                </span>

                <h1>
                    Student Records
                </h1>
            </div>

            <div class="status">
                <span></span>
                File system active
            </div>

        </header>


        <section class="dashboard">

            <!-- LEFT FORM -->

            <div class="form-section">

                <div class="section-heading">

                    <div class="heading-icon">
                        +
                    </div>

                    <div>
                        <span>NEW ENTRY</span>

                        <h2>
                            Add Student
                        </h2>
                    </div>

                </div>


                <p class="description">
                    Enter student information to append
                    a new record to the existing file.
                </p>


                <form action="process.php" method="POST">

                    <div class="input-group">

                        <label>
                            Student ID
                        </label>

                        <input
                            type="text"
                            name="student_id"
                            placeholder="e.g. CS101"
                            required
                        >

                    </div>


                    <div class="input-group">

                        <label>
                            Student Name
                        </label>

                        <input
                            type="text"
                            name="student_name"
                            placeholder="e.g. Krithisha"
                            required
                        >

                    </div>


                    <div class="two-column">

                        <div class="input-group">

                            <label>
                                Department
                            </label>

                            <select
                                name="department"
                                required
                            >

                                <option value="">
                                    Select
                                </option>

                                <option value="Computer Science">
                                    Computer Science
                                </option>

                                <option value="Commerce">
                                    Commerce
                                </option>

                                <option value="Mathematics">
                                    Mathematics
                                </option>

                                <option value="Physics">
                                    Physics
                                </option>

                            </select>

                        </div>


                        <div class="input-group">

                            <label>
                                Year
                            </label>

                            <select
                                name="year"
                                required
                            >

                                <option value="">
                                    Select
                                </option>

                                <option value="I Year">
                                    I Year
                                </option>

                                <option value="II Year">
                                    II Year
                                </option>

                                <option value="III Year">
                                    III Year
                                </option>

                            </select>

                        </div>

                    </div>


                    <div class="input-group">

                        <label>
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            placeholder="student@example.com"
                            required
                        >

                    </div>


                    <button type="submit">

                        Save Student Record

                        <span>→</span>

                    </button>

                </form>

            </div>


            <!-- RIGHT INFO -->

            <div class="info-section">

                <div class="info-card">

                    <span class="info-label">
                        HOW IT WORKS
                    </span>

                    <h2>
                        Simple file-based
                        record keeping.
                    </h2>

                    <p>
                        Every new student is appended
                        to the existing student file without
                        removing previous records.
                    </p>


                    <div class="steps">

                        <div class="step">

                            <div class="step-number">
                                01
                            </div>

                            <div>
                                <strong>
                                    Enter Details
                                </strong>

                                <small>
                                    Fill in the student information.
                                </small>
                            </div>

                        </div>


                        <div class="step">

                            <div class="step-number">
                                02
                            </div>

                            <div>
                                <strong>
                                    Append Record
                                </strong>

                                <small>
                                    The record is added to students.txt.
                                </small>
                            </div>

                        </div>


                        <div class="step">

                            <div class="step-number">
                                03
                            </div>

                            <div>
                                <strong>
                                    View Updated File
                                </strong>

                                <small>
                                    All stored records are displayed.
                                </small>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="file-preview">

                    <div class="file-top">

                        <div class="file-icon">
                            TXT
                        </div>

                        <div>
                            <strong>
                                students.txt
                            </strong>

                            <small>
                                Student data file
                            </small>
                        </div>

                    </div>


                    <div class="file-line">
                        <span></span>
                        <span></span>
                    </div>

                    <div class="file-line short">
                        <span></span>
                        <span></span>
                    </div>

                    <div class="file-line">
                        <span></span>
                        <span></span>
                    </div>

                    <div class="file-line short">
                        <span></span>
                        <span></span>
                    </div>

                </div>

            </div>

        </section>


        <footer>
            StudentVault · PHP File Management System
        </footer>

    </main>

</div>

</body>

</html>