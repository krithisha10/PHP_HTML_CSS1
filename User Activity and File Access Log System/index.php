<?php

session_start();


// ==========================================
// LOGIN CHECK
// ==========================================

if (
    !isset($_SESSION["logged_in"]) ||
    $_SESSION["logged_in"] !== true
) {

    header("Location: process.php");
    exit;

}


// ==========================================
// COOKIE INFORMATION
// ==========================================

$lastVisit = $_COOKIE["last_visit"] ?? "First visit";


// Update visit cookie

setcookie(
    "last_visit",
    date("d M Y, h:i A"),
    time() + (86400 * 30)
);


// ==========================================
// CREATE LOG DIRECTORY
// ==========================================

if (!is_dir("logs")) {

    mkdir("logs", 0777, true);

}


// ==========================================
// READ LOGIN HISTORY
// ==========================================

$loginHistory = [];

if (file_exists("logs/login_history.txt")) {

    $loginHistory =
        file(
            "logs/login_history.txt",
            FILE_IGNORE_NEW_LINES
        );

}


// ==========================================
// READ FILE ACCESS LOG
// ==========================================

$fileAccess = [];

if (file_exists("logs/file_access.txt")) {

    $fileAccess =
        file(
            "logs/file_access.txt",
            FILE_IGNORE_NEW_LINES
        );

}


// ==========================================
// CURRENT USER ACTIVITY
// ==========================================

$username = $_SESSION["username"];

$userLoginCount = 0;
$userAccessCount = 0;


// Count user's login activity

foreach ($loginHistory as $record) {

    if (
        strpos(
            $record,
            "User: " . $username
        ) !== false
    ) {

        $userLoginCount++;

    }

}


// Count user's file access

foreach ($fileAccess as $record) {

    if (
        strpos(
            $record,
            "User: " . $username
        ) !== false
    ) {

        $userAccessCount++;

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Activity Monitor
    </title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>


<div class="page">


    <!-- ==============================
         HEADER
    =============================== -->

    <header>

        <div class="brand">

            <div class="brand-mark">
                AM
            </div>

            <div>

                <h1>
                    Activity Monitor
                </h1>

                <span>
                    USER & FILE AUDIT SYSTEM
                </span>

            </div>

        </div>


        <div class="header-right">

            <div class="online">

                <span></span>

                ACTIVE SESSION

            </div>


            <div class="user-name">

                <?php
                echo htmlspecialchars($username);
                ?>

            </div>


            <a
                href="logout.php"
                class="logout"
            >
                Logout
            </a>

        </div>

    </header>



    <!-- ==============================
         HERO
    =============================== -->

    <section class="hero">

        <div class="hero-content">

            <span class="hero-label">
                ACTIVITY INTELLIGENCE
            </span>

            <h2>
                Know what happens<br>
                <strong>inside your system.</strong>
            </h2>

            <p>
                Monitor user sessions, login history and
                document access through a centralized activity log.
            </p>

        </div>


        <div class="activity-visual">

            <div class="circle circle-one"></div>

            <div class="circle circle-two"></div>

            <div class="activity-center">
                ✓
            </div>

        </div>

    </section>



    <!-- ==============================
         MAIN
    =============================== -->

    <main>


        <!-- ==============================
             WELCOME
        =============================== -->

        <section class="welcome">

            <div>

                <span>
                    WELCOME BACK
                </span>

                <h2>
                    Hello,
                    <?php
                    echo htmlspecialchars($username);
                    ?>!
                </h2>

                <p>
                    Your activity is being securely recorded.
                </p>

            </div>


            <div class="last-visit">

                <span>
                    LAST VISIT
                </span>

                <strong>
                    <?php
                    echo htmlspecialchars($lastVisit);
                    ?>
                </strong>

            </div>

        </section>



        <!-- ==============================
             STATISTICS
        =============================== -->

        <section class="stats">


            <div class="stat-card">

                <div class="stat-icon">
                    ↪
                </div>

                <div>

                    <span>
                        LOGIN ACTIVITY
                    </span>

                    <strong>
                        <?php echo $userLoginCount; ?>
                    </strong>

                    <small>
                        recorded sessions
                    </small>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    □
                </div>

                <div>

                    <span>
                        FILE ACCESS
                    </span>

                    <strong>
                        <?php echo $userAccessCount; ?>
                    </strong>

                    <small>
                        recorded accesses
                    </small>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    ◷
                </div>

                <div>

                    <span>
                        CURRENT SESSION
                    </span>

                    <strong>
                        ACTIVE
                    </strong>

                    <small>
                        session protected
                    </small>

                </div>

            </div>


        </section>



        <!-- ==============================
             FILE ACCESS
        =============================== -->

        <section class="activity-section">

            <div class="section-heading">

                <div>

                    <span>
                        FILE ACTIVITY
                    </span>

                    <h2>
                        Access documents
                    </h2>

                </div>

                <div class="section-tag">
                    SESSION LOGGED
                </div>

            </div>


            <div class="file-grid">


                <a
                    href="access.php?file=academic_report.txt"
                    class="file-card"
                >

                    <div class="file-symbol">
                        TXT
                    </div>

                    <div>

                        <h3>
                            Academic Report
                        </h3>

                        <p>
                            academic_report.txt
                        </p>

                    </div>

                    <span class="arrow">
                        →
                    </span>

                </a>



                <a
                    href="access.php?file=project_report.txt"
                    class="file-card"
                >

                    <div class="file-symbol">
                        TXT
                    </div>

                    <div>

                        <h3>
                            Project Report
                        </h3>

                        <p>
                            project_report.txt
                        </p>

                    </div>

                    <span class="arrow">
                        →
                    </span>

                </a>



                <a
                    href="access.php?file=attendance_report.txt"
                    class="file-card"
                >

                    <div class="file-symbol">
                        TXT
                    </div>

                    <div>

                        <h3>
                            Attendance Report
                        </h3>

                        <p>
                            attendance_report.txt
                        </p>

                    </div>

                    <span class="arrow">
                        →
                    </span>

                </a>


            </div>

        </section>



        <!-- ==============================
             LOGIN HISTORY
        =============================== -->

        <section class="log-section">

            <div class="section-heading">

                <div>

                    <span>
                        LOGIN HISTORY
                    </span>

                    <h2>
                        Recent user sessions
                    </h2>

                </div>

            </div>


            <div class="log-box">

                <?php

                if (count($loginHistory) > 0):

                    $recentLogins =
                        array_slice(
                            array_reverse(
                                $loginHistory
                            ),
                            0,
                            5
                        );

                    foreach ($recentLogins as $record):

                ?>

                    <div class="log-row">

                        <div class="log-status">
                            ✓
                        </div>

                        <div class="log-content">

                            <?php
                            echo htmlspecialchars(
                                $record
                            );
                            ?>

                        </div>

                    </div>

                <?php

                    endforeach;

                else:

                ?>

                    <div class="no-log">
                        No login history available.
                    </div>

                <?php endif; ?>

            </div>

        </section>



        <!-- ==============================
             FILE ACCESS LOG
        =============================== -->

        <section class="log-section">

            <div class="section-heading">

                <div>

                    <span>
                        FILE ACCESS HISTORY
                    </span>

                    <h2>
                        Recent document activity
                    </h2>

                </div>

            </div>


            <div class="log-box">

                <?php

                if (count($fileAccess) > 0):

                    $recentAccess =
                        array_slice(
                            array_reverse(
                                $fileAccess
                            ),
                            0,
                            5
                        );

                    foreach ($recentAccess as $record):

                ?>

                    <div class="log-row">

                        <div class="log-status">
                            →
                        </div>

                        <div class="log-content">

                            <?php
                            echo htmlspecialchars(
                                $record
                            );
                            ?>

                        </div>

                    </div>

                <?php

                    endforeach;

                else:

                ?>

                    <div class="no-log">
                        No file access history available.
                    </div>

                <?php endif; ?>

            </div>

        </section>



        <!-- ==============================
             REPORT
        =============================== -->

        <section class="report-card">

            <div class="report-icon">
                ▤
            </div>

            <div>

                <span>
                    ACTIVITY REPORT
                </span>

                <h2>
                    User activity summary
                </h2>

                <p>
                    User
                    <strong>
                        <?php
                        echo htmlspecialchars(
                            $username
                        );
                        ?>
                    </strong>
                    has
                    <?php echo $userLoginCount; ?>
                    recorded login session(s) and
                    <?php echo $userAccessCount; ?>
                    file access event(s).
                </p>

            </div>

        </section>


    </main>



    <!-- ==============================
         FOOTER
    =============================== -->

    <footer>

        <span>
            ACTIVITY MONITOR · PHP FILE HANDLING
        </span>

        <span>
            SESSION · COOKIE · AUDIT LOG
        </span>

    </footer>


</div>


</body>

</html>