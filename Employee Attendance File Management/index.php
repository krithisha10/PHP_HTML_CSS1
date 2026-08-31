<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>WorkPulse | Attendance</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="app">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                W
            </div>

            <div>
                <h2>WorkPulse</h2>
                <span>PEOPLE & ATTENDANCE</span>
            </div>

        </div>


        <div class="navigation">

            <p class="nav-label">
                WORKSPACE
            </p>

            <div class="nav-item active">
                <span>▦</span>
                Attendance
            </div>

            <div class="nav-item">
                <span>♙</span>
                Employees
            </div>

            <div class="nav-item">
                <span>◷</span>
                Reports
            </div>

            <div class="nav-item">
                <span>⚙</span>
                Settings
            </div>

        </div>


        <div class="side-footer">

            <div class="mini-avatar">
                HR
            </div>

            <div>
                <strong>HR Manager</strong>
                <small>Administrator</small>
            </div>

        </div>

    </aside>


    <!-- MAIN -->

    <main class="main">

        <header>

            <div>

                <p class="breadcrumb">
                    WORKSPACE / ATTENDANCE
                </p>

                <h1>
                    Employee Attendance
                </h1>

                <p class="subtitle">
                    Retrieve and monitor attendance records stored in your system.
                </p>

            </div>

            <div class="date-card">

                <span>RECORD DATE</span>

                <strong>
                    25 AUG 2026
                </strong>

            </div>

        </header>


        <!-- WELCOME -->

        <section class="welcome">

            <div>

                <p>
                    DAILY ATTENDANCE
                </p>

                <h2>
                    Keep your team
                    <span>in sync.</span>
                </h2>

                <p class="welcome-text">
                    Attendance records are securely retrieved
                    from the employee attendance file and displayed
                    below.
                </p>

            </div>

            <div class="welcome-icon">
                ◷
            </div>

        </section>


        <!-- ACTION -->

        <section class="action-card">

            <div class="action-icon">
                ↗
            </div>

            <div class="action-content">

                <h3>
                    Retrieve Attendance Records
                </h3>

                <p>
                    Click below to read and display the
                    employee attendance information.
                </p>

            </div>

            <form action="process.php" method="POST">

                <button type="submit">
                    View Records →
                </button>

            </form>

        </section>


        <!-- FILE INFO -->

        <div class="file-info">

            <div>
                <span>DATA SOURCE</span>
                <strong>attendance.txt</strong>
            </div>

            <div>
                <span>FORMAT</span>
                <strong>Text File</strong>
            </div>

            <div>
                <span>PROCESSING</span>
                <strong>PHP File Handling</strong>
            </div>

            <div>
                <span>STATUS</span>
                <strong class="online">● Ready</strong>
            </div>

        </div>


    </main>

</div>

</body>

</html>