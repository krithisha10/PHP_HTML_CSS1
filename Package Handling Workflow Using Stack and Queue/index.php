<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Package Handling Workflow</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">


    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="logo">
                📦
            </div>

            <div>

                <span class="eyebrow">
                    LOGISTICS MANAGEMENT
                </span>

                <h1>
                    Package Handling Workflow
                </h1>

                <p>
                    Stack and queue based package processing
                </p>

            </div>

        </div>


        <div class="system-badge">
            WORKFLOW ACTIVE
        </div>

    </header>



    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <span>
                PACKAGE PROCESSING CENTER
            </span>

            <h2>
                Organize. Process. Deliver.
            </h2>

            <p>
                Enter package details and observe how stack
                and queue operations manage the processing workflow.
            </p>

        </div>


        <div class="hero-illustration">

            <div class="box-icon">
                📦
            </div>

            <div class="arrow-line">
                →
            </div>

            <div class="truck-icon">
                🚚
            </div>

        </div>

    </section>



    <!-- INPUT SECTION -->

    <section class="input-section">

        <div class="section-heading">

            <span>
                PACKAGE ENTRY
            </span>

            <h2>
                Add Packages to Workflow
            </h2>

            <p>
                Enter the package names that need to be processed.
            </p>

        </div>


        <form action="process.php" method="POST">


            <div class="package-grid">


                <!-- PACKAGE 1 -->

                <div class="package-card card-blue">

                    <div class="package-number">
                        01
                    </div>

                    <div class="package-icon">
                        📦
                    </div>

                    <label>
                        PACKAGE NAME
                    </label>

                    <input
                        type="text"
                        name="packages[]"
                        placeholder="Enter package name"
                        required
                    >

                </div>



                <!-- PACKAGE 2 -->

                <div class="package-card card-purple">

                    <div class="package-number">
                        02
                    </div>

                    <div class="package-icon">
                        🎁
                    </div>

                    <label>
                        PACKAGE NAME
                    </label>

                    <input
                        type="text"
                        name="packages[]"
                        placeholder="Enter package name"
                        required
                    >

                </div>



                <!-- PACKAGE 3 -->

                <div class="package-card card-orange">

                    <div class="package-number">
                        03
                    </div>

                    <div class="package-icon">
                        🛍️
                    </div>

                    <label>
                        PACKAGE NAME
                    </label>

                    <input
                        type="text"
                        name="packages[]"
                        placeholder="Enter package name"
                        required
                    >

                </div>



                <!-- PACKAGE 4 -->

                <div class="package-card card-green">

                    <div class="package-number">
                        04
                    </div>

                    <div class="package-icon">
                        🧳
                    </div>

                    <label>
                        PACKAGE NAME
                    </label>

                    <input
                        type="text"
                        name="packages[]"
                        placeholder="Enter package name"
                        required
                    >

                </div>


            </div>



            <!-- WORKFLOW INFORMATION -->

            <div class="workflow-info">


                <div class="workflow-item">

                    <div class="workflow-icon stack-icon">
                        ⬆
                    </div>

                    <div>

                        <strong>
                            Stack Processing
                        </strong>

                        <p>
                            LIFO — Last package added is processed first.
                        </p>

                    </div>

                </div>



                <div class="workflow-divider">
                    +
                </div>



                <div class="workflow-item">

                    <div class="workflow-icon queue-icon">
                        →
                    </div>

                    <div>

                        <strong>
                            Queue Processing
                        </strong>

                        <p>
                            FIFO — First package added is processed first.
                        </p>

                    </div>

                </div>


            </div>



            <!-- BUTTON -->

            <div class="button-area">

                <button type="submit">

                    Process Packages

                    <span>
                        →
                    </span>

                </button>

                <p>
                    PHP Arrays • Stack • Queue • LIFO • FIFO
                </p>

            </div>


        </form>

    </section>



    <!-- FOOTER -->

    <footer>

        PHP Practical • Package Handling Workflow Using Stack and Queue

    </footer>


</div>

</body>

</html>