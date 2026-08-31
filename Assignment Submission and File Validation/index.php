<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CampusSubmit | Assignment Portal</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <!-- TOP NAVIGATION -->

    <nav class="navbar">

        <div class="logo">

            <div class="logo-mark">
                CS
            </div>

            <div>
                <h2>CampusSubmit</h2>
                <span>ACADEMIC PORTAL</span>
            </div>

        </div>

        <div class="nav-status">
            <span></span>
            Submission Portal
        </div>

    </nav>


    <!-- MAIN -->

    <main class="main-container">


        <!-- LEFT INTRO -->

        <section class="hero">

            <div class="badge">
                ✦ STUDENT SUBMISSION
            </div>

            <h1>
                Submit your
                <span>assignment.</span>
            </h1>

            <p>
                Upload your completed assignment securely.
                We'll validate the file and organize it
                automatically according to your department.
            </p>


            <div class="process">

                <div class="process-item active">

                    <div class="process-number">
                        01
                    </div>

                    <div>
                        <strong>Prepare</strong>
                        <small>Choose your assignment</small>
                    </div>

                </div>


                <div class="process-line"></div>


                <div class="process-item">

                    <div class="process-number">
                        02
                    </div>

                    <div>
                        <strong>Validate</strong>
                        <small>Check file format</small>
                    </div>

                </div>


                <div class="process-line"></div>


                <div class="process-item">

                    <div class="process-number">
                        03
                    </div>

                    <div>
                        <strong>Store</strong>
                        <small>Save by department</small>
                    </div>

                </div>

            </div>


            <div class="allowed">

                <div class="allowed-icon">
                    ✓
                </div>

                <div>

                    <strong>Accepted formats</strong>

                    <p>
                        PDF, DOC, DOCX, PPT, PPTX
                    </p>

                </div>

            </div>

        </section>


        <!-- UPLOAD CARD -->

        <section class="upload-card">

            <div class="card-header">

                <div>

                    <p>NEW SUBMISSION</p>

                    <h2>Assignment Details</h2>

                </div>

                <div class="upload-icon">
                    ↑
                </div>

            </div>


            <form action="process.php"
                  method="POST"
                  enctype="multipart/form-data">


                <!-- STUDENT NAME -->

                <div class="field">

                    <label>
                        Student Name
                    </label>

                    <input
                        type="text"
                        name="student_name"
                        placeholder="Enter your full name"
                        required
                    >

                </div>


                <!-- DEPARTMENT -->

                <div class="field">

                    <label>
                        Department
                    </label>

                    <select name="department" required>

                        <option value="">
                            Select your department
                        </option>

                        <option value="Computer_Science">
                            Computer Science
                        </option>

                        <option value="Data_Science">
                            Data Science
                        </option>

                        <option value="Information_Technology">
                            Information Technology
                        </option>

                        <option value="Computer_Applications">
                            Computer Applications
                        </option>

                    </select>

                </div>


                <!-- ASSIGNMENT TITLE -->

                <div class="field">

                    <label>
                        Assignment Title
                    </label>

                    <input
                        type="text"
                        name="assignment_title"
                        placeholder="e.g. Web Development Assignment"
                        required
                    >

                </div>


                <!-- FILE -->

                <div class="field">

                    <label>
                        Assignment File
                    </label>

                    <div class="file-area">

                        <div class="file-symbol">
                            ↑
                        </div>

                        <div>

                            <strong>
                                Choose your assignment
                            </strong>

                            <p>
                                PDF, DOC, DOCX, PPT or PPTX
                            </p>

                        </div>

                        <input
                            type="file"
                            name="assignment"
                            accept=".pdf,.doc,.docx,.ppt,.pptx"
                            required
                        >

                    </div>

                </div>


                <button type="submit">

                    Submit Assignment

                    <span>→</span>

                </button>


                <div class="secure-note">

                    🔒 Your submission is validated before storage.

                </div>

            </form>

        </section>

    </main>


    <footer>

        <span>CampusSubmit</span>

        <p>
            PHP File Upload & Validation System
        </p>

    </footer>

</div>

</body>

</html>