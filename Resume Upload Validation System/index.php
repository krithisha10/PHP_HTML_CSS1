<?php

$uploadMessage = $_GET["message"] ?? "";
$messageType = $_GET["type"] ?? "";

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
        CareerApply | Resume Upload
    </title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>

<body>

<div class="page">


    <!-- HEADER -->

    <header>

        <div class="brand">

            <div class="brand-icon">
                C
            </div>

            <div>

                <h1>
                    CareerApply
                </h1>

                <span>
                    APPLICANT PORTAL
                </span>

            </div>

        </div>


        <div class="header-status">

            <span></span>

            SECURE APPLICATION PORTAL

        </div>

    </header>



    <!-- HERO -->

    <section class="hero">

        <div class="hero-content">

            <span class="hero-label">
                BUILD YOUR CAREER
            </span>


            <h2>

                Your next opportunity
                <strong>starts here.</strong>

            </h2>


            <p>

                Submit your resume securely and let your
                professional journey move one step forward.

            </p>


            <div class="hero-points">

                <div>
                    ✓ Secure Upload
                </div>

                <div>
                    ✓ File Validation
                </div>

                <div>
                    ✓ Instant Feedback
                </div>

            </div>

        </div>


        <div class="resume-visual">

            <div class="resume-paper">

                <div class="paper-top">
                    RESUME
                </div>

                <div class="paper-line large"></div>
                <div class="paper-line"></div>
                <div class="paper-line"></div>

                <div class="paper-section">
                    EXPERIENCE
                </div>

                <div class="paper-line"></div>
                <div class="paper-line"></div>

                <div class="paper-section">
                    EDUCATION
                </div>

                <div class="paper-line"></div>
                <div class="paper-line"></div>

            </div>


            <div class="check-badge">
                ✓
            </div>

        </div>

    </section>



    <!-- MESSAGE -->

    <?php if ($uploadMessage !== ""): ?>

        <div
            class="message
            <?php echo htmlspecialchars($messageType); ?>"
        >

            <div class="message-icon">

                <?php

                echo $messageType === "success"
                    ? "✓"
                    : "!";

                ?>

            </div>


            <div>

                <strong>

                    <?php

                    echo $messageType === "success"
                        ? "Upload Successful"
                        : "Upload Failed";

                    ?>

                </strong>


                <p>

                    <?php

                    echo htmlspecialchars(
                        $uploadMessage
                    );

                    ?>

                </p>

            </div>

        </div>

    <?php endif; ?>



    <!-- MAIN -->

    <main>


        <!-- UPLOAD CARD -->

        <section class="upload-card">


            <div class="section-heading">

                <div class="upload-symbol">
                    ↑
                </div>


                <div>

                    <span>
                        RESUME SUBMISSION
                    </span>

                    <h2>
                        Upload your resume
                    </h2>

                </div>

            </div>



            <form
                action="process.php"
                method="POST"
                enctype="multipart/form-data"
                class="upload-form"
            >


                <label
                    for="resume"
                    class="drop-zone"
                >

                    <div class="drop-icon">
                        ↑
                    </div>


                    <h3>
                        Choose your resume
                    </h3>


                    <p>
                        Click here to browse files
                    </p>


                    <span>
                        PDF, DOC or DOCX · Maximum 5 MB
                    </span>


                    <input
                        type="file"
                        id="resume"
                        name="resume"
                        accept=".pdf,.doc,.docx"
                        required
                    >

                </label>



                <button
                    type="submit"
                    class="submit-button"
                >

                    Submit Resume

                    <span>
                        →
                    </span>

                </button>


            </form>


        </section>



        <!-- VALIDATION INFORMATION -->

        <section class="validation-section">


            <div class="validation-heading">

                <span>
                    BEFORE YOU SUBMIT
                </span>

                <h2>
                    Upload requirements
                </h2>

            </div>


            <div class="requirements">


                <div class="requirement-card">

                    <div class="requirement-icon">
                        PDF
                    </div>

                    <div>

                        <h3>
                            Accepted Formats
                        </h3>

                        <p>
                            PDF, DOC and DOCX files only
                        </p>

                    </div>

                    <div class="valid">
                        ✓
                    </div>

                </div>



                <div class="requirement-card">

                    <div class="requirement-icon size">
                        5MB
                    </div>

                    <div>

                        <h3>
                            File Size
                        </h3>

                        <p>
                            Maximum file size is 5 MB
                        </p>

                    </div>

                    <div class="valid">
                        ✓
                    </div>

                </div>



                <div class="requirement-card">

                    <div class="requirement-icon name">
                        CV
                    </div>

                    <div>

                        <h3>
                            Valid Filename
                        </h3>

                        <p>
                            Avoid special characters in filenames
                        </p>

                    </div>

                    <div class="valid">
                        ✓
                    </div>

                </div>


            </div>

        </section>



        <!-- VALIDATION FLOW -->

        <section class="process-section">


            <div class="process-heading">

                <span>
                    HOW IT WORKS
                </span>

                <h2>
                    Resume validation process
                </h2>

            </div>


            <div class="process-grid">


                <div class="process-card">

                    <div class="step-number">
                        01
                    </div>

                    <h3>
                        Select
                    </h3>

                    <p>
                        Choose your resume from your device.
                    </p>

                </div>


                <div class="process-card">

                    <div class="step-number">
                        02
                    </div>

                    <h3>
                        Validate
                    </h3>

                    <p>
                        PHP checks the file type and size.
                    </p>

                </div>


                <div class="process-card">

                    <div class="step-number">
                        03
                    </div>

                    <h3>
                        Upload
                    </h3>

                    <p>
                        Valid resumes are securely stored.
                    </p>

                </div>


                <div class="process-card">

                    <div class="step-number">
                        04
                    </div>

                    <h3>
                        Confirm
                    </h3>

                    <p>
                        You receive an instant submission message.
                    </p>

                </div>


            </div>

        </section>


    </main>



    <!-- FOOTER -->

    <footer>

        <span>
            CAREERAPPLY · RESUME VALIDATION SYSTEM
        </span>

        <span>
            PHP · FILE UPLOAD · VALIDATION
        </span>

    </footer>


</div>

</body>

</html>