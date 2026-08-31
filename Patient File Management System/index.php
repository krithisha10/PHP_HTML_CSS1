<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MedFile | Patient Records</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="app">

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="logo">

            <div class="logo-icon">
                +
            </div>

            <div>
                <h2>MedFile</h2>
                <p>RECORD SYSTEM</p>
            </div>

        </div>


        <div class="side-menu">

            <p class="menu-title">SYSTEM</p>

            <div class="menu-item active">
                <span>▣</span>
                Patient Records
            </div>

            <div class="menu-item">
                <span>▤</span>
                Departments
            </div>

            <div class="menu-item">
                <span>◉</span>
                File Storage
            </div>

        </div>


        <div class="security-box">

            <div class="shield">✓</div>

            <div>
                <strong>Secure Storage</strong>
                <p>Department files protected</p>
            </div>

        </div>

    </aside>


    <!-- MAIN CONTENT -->

    <main class="main">

        <header>

            <div>

                <p class="breadcrumb">
                    MEDICAL RECORDS / SEARCH
                </p>

                <h1>Patient Records</h1>

                <p class="header-description">
                    Retrieve patient information securely using a unique patient ID.
                </p>

            </div>

            <div class="hospital-status">

                <span class="status-dot"></span>

                System Online

            </div>

        </header>


        <!-- SEARCH CARD -->

        <section class="search-card">

            <div class="search-icon">
                ⌕
            </div>

            <div class="search-content">

                <h2>Find a Patient</h2>

                <p>
                    Enter the patient ID to retrieve the corresponding medical record.
                </p>

                <form action="process.php" method="POST">

                    <div class="search-box">

                        <input
                            type="text"
                            name="patient_id"
                            placeholder="Enter Patient ID  (e.g. P1001)"
                            required
                        >

                        <button type="submit">
                            Search Record →
                        </button>

                    </div>

                </form>

            </div>

        </section>


        <!-- DEPARTMENTS -->

        <section class="departments">

            <div class="section-heading">

                <div>
                    <p>FILE ORGANIZATION</p>
                    <h2>Departments</h2>
                </div>

                <span>
                    04 FILES
                </span>

            </div>


            <div class="department-grid">

                <div class="department cardiology">

                    <div class="dept-icon">♡</div>

                    <div>
                        <h3>Cardiology</h3>
                        <p>cardiology.txt</p>
                    </div>

                    <span class="file-count">03</span>

                </div>


                <div class="department neurology">

                    <div class="dept-icon">◉</div>

                    <div>
                        <h3>Neurology</h3>
                        <p>neurology.txt</p>
                    </div>

                    <span class="file-count">03</span>

                </div>


                <div class="department orthopedics">

                    <div class="dept-icon">✚</div>

                    <div>
                        <h3>Orthopedics</h3>
                        <p>orthopedics.txt</p>
                    </div>

                    <span class="file-count">03</span>

                </div>


                <div class="department general">

                    <div class="dept-icon">✚</div>

                    <div>
                        <h3>General Medicine</h3>
                        <p>general_medicine.txt</p>
                    </div>

                    <span class="file-count">03</span>

                </div>

            </div>

        </section>


        <!-- INFORMATION -->

        <section class="info-panel">

            <div class="info-number">
                01
            </div>

            <div>

                <h3>How patient retrieval works</h3>

                <p>
                    Each department maintains a separate text file.
                    The system searches these files using the patient ID
                    and displays the matching record.
                </p>

            </div>

        </section>

    </main>

</div>

</body>

</html>