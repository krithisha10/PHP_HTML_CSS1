<?php
session_start();

if (!isset($_SESSION["student_activities"])) {
    $_SESSION["student_activities"] = [];
}

$student_name = $_SESSION["student_name"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>CampusChronicle | Student Activity</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="brand">

            <div class="brand-icon">
                CC
            </div>

            <div>
                <strong>CampusChronicle</strong>
                <small>STUDENT ACTIVITY HUB</small>
            </div>

        </div>

        <a href="report.php" class="nav-report">
            View Reports →
        </a>

    </nav>


    <!-- MAIN -->

    <main class="main">

        <!-- LEFT CONTENT -->

        <section class="welcome">

            <span class="eyebrow">
                ✦ ACADEMIC ACTIVITY TRACKER
            </span>

            <h1>
                Every activity
                <span>tells a story.</span>
            </h1>

            <p>
                Record student activities, organize them by date,
                and generate a simple learner activity report.
            </p>


            <div class="activity-preview">

                <div class="preview-title">
                    ACTIVITY JOURNEY
                </div>

                <div class="preview-item">

                    <div class="dot blue"></div>

                    <div>
                        <strong>Assignment Submitted</strong>
                        <small>Academic Activity</small>
                    </div>

                    <span>Today</span>

                </div>


                <div class="preview-item">

                    <div class="dot green"></div>

                    <div>
                        <strong>Workshop Attended</strong>
                        <small>Extra Curricular</small>
                    </div>

                    <span>Yesterday</span>

                </div>


                <div class="preview-item">

                    <div class="dot orange"></div>

                    <div>
                        <strong>Quiz Completed</strong>
                        <small>Assessment</small>
                    </div>

                    <span>Earlier</span>

                </div>

            </div>

        </section>


        <!-- FORM CARD -->

        <section class="form-card">

            <div class="card-icon">
                📝
            </div>

            <span class="card-label">
                NEW RECORD
            </span>

            <h2>
                Add student activity
            </h2>

            <p>
                Enter the learner details and activity information.
            </p>


            <form action="process.php" method="POST">

                <label>
                    Student Name
                </label>

                <input
                    type="text"
                    name="student_name"
                    placeholder="e.g. Krithisha"
                    required
                >


                <label>
                    Activity
                </label>

                <input
                    type="text"
                    name="activity"
                    placeholder="e.g. Python Workshop"
                    required
                >


                <label>
                    Activity Type
                </label>

                <select name="activity_type" required>

                    <option value="">
                        Select activity type
                    </option>

                    <option value="Academic">
                        Academic
                    </option>

                    <option value="Assessment">
                        Assessment
                    </option>

                    <option value="Workshop">
                        Workshop
                    </option>

                    <option value="Sports">
                        Sports
                    </option>

                    <option value="Cultural">
                        Cultural
                    </option>

                </select>


                <label>
                    Activity Date
                </label>

                <input
                    type="date"
                    name="activity_date"
                    required
                >


                <button type="submit">
                    Save Activity
                    <span>→</span>
                </button>

            </form>

        </section>

    </main>


    <footer>
        CampusChronicle · File-Based Student Activity Management
    </footer>

</div>

</body>

</html>