<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Course Enrolment Analysis</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">


    <!-- HEADER -->

    <header>

        <div class="logo">
            🎓
        </div>

        <div>

            <h1>Course Enrolment Analysis</h1>

            <p>
                Analyze student enrolment across different courses
            </p>

        </div>

    </header>


    <!-- INTRODUCTION -->

    <section class="intro">

        <span>ACADEMIC ENROLMENT</span>

        <h2>Enter Course Enrolment Details</h2>

        <p>
            Enter the number of students enrolled in each course
            to generate an enrolment summary.
        </p>

    </section>


    <!-- COURSE FORM -->

    <form action="process.php" method="POST">


        <div class="course-container">


            <!-- COURSE 1 -->

            <div class="course-card">

                <div class="course-top">

                    <div class="course-number">
                        01
                    </div>

                    <div class="course-icon">
                        💻
                    </div>

                </div>

                <h3>Computer Science</h3>

                <p>
                    Computing and programming
                </p>

                <label>
                    Number of Students
                </label>

                <input
                    type="number"
                    name="courses[0][students]"
                    placeholder="Enter enrolment"
                    min="0"
                    required
                >

            </div>


            <!-- COURSE 2 -->

            <div class="course-card">

                <div class="course-top">

                    <div class="course-number">
                        02
                    </div>

                    <div class="course-icon">
                        📊
                    </div>

                </div>

                <h3>Data Science</h3>

                <p>
                    Data analysis and insights
                </p>

                <label>
                    Number of Students
                </label>

                <input
                    type="number"
                    name="courses[1][students]"
                    placeholder="Enter enrolment"
                    min="0"
                    required
                >

            </div>


            <!-- COURSE 3 -->

            <div class="course-card">

                <div class="course-top">

                    <div class="course-number">
                        03
                    </div>

                    <div class="course-icon">
                        🤖
                    </div>

                </div>

                <h3>Artificial Intelligence</h3>

                <p>
                    AI and intelligent systems
                </p>

                <label>
                    Number of Students
                </label>

                <input
                    type="number"
                    name="courses[2][students]"
                    placeholder="Enter enrolment"
                    min="0"
                    required
                >

            </div>


            <!-- COURSE 4 -->

            <div class="course-card">

                <div class="course-top">

                    <div class="course-number">
                        04
                    </div>

                    <div class="course-icon">
                        🌐
                    </div>

                </div>

                <h3>Web Development</h3>

                <p>
                    Modern web technologies
                </p>

                <label>
                    Number of Students
                </label>

                <input
                    type="number"
                    name="courses[3][students]"
                    placeholder="Enter enrolment"
                    min="0"
                    required
                >

            </div>


        </div>


        <!-- SUBMIT -->

        <div class="button-area">

            <button type="submit">
                Generate Enrolment Report →
            </button>

            <p>
                PHP Arrays • Course Analysis
            </p>

        </div>

    </form>


    <!-- FOOTER -->

    <footer>

        PHP Practical • Course Enrolment Analysis

    </footer>


</div>

</body>

</html>