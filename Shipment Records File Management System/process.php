<?php

date_default_timezone_set("Asia/Kolkata");


// =========================================
// GET FORM DATA
// =========================================

$shipment_id = trim($_POST["shipment_id"] ?? "");
$customer_name = trim($_POST["customer_name"] ?? "");
$destination = trim($_POST["destination"] ?? "");
$shipment_type = trim($_POST["shipment_type"] ?? "");
$status = strtolower(trim($_POST["status"] ?? ""));


// =========================================
// VALIDATION
// =========================================

if (
    $shipment_id == "" ||
    $customer_name == "" ||
    $destination == "" ||
    $shipment_type == "" ||
    $status == ""
) {
    die("Please fill in all the required fields.");
}


// =========================================
// VALIDATE STATUS
// =========================================

$valid_statuses = [
    "pending",
    "shipped",
    "delivered"
];

if (!in_array($status, $valid_statuses)) {
    die("Invalid shipment status.");
}


// =========================================
// CLEAN SHIPMENT ID
// =========================================

$shipment_id = preg_replace(
    "/[^A-Za-z0-9_-]/",
    "",
    $shipment_id
);

if ($shipment_id == "") {
    die("Invalid Shipment ID.");
}


// =========================================
// BASE DIRECTORY
// =========================================

$base_directory = "shipments/";


// =========================================
// CREATE DIRECTORIES
// =========================================

$directories = [
    "pending",
    "shipped",
    "delivered"
];

foreach ($directories as $directory) {

    $folder_path = $base_directory . $directory;

    if (!is_dir($folder_path)) {

        mkdir(
            $folder_path,
            0777,
            true
        );

    }
}


// =========================================
// SELECT DIRECTORY
// =========================================

$selected_directory =
    $base_directory . $status . "/";


// =========================================
// FILE NAME
// =========================================

$filename =
    $selected_directory .
    $shipment_id .
    ".txt";


// =========================================
// DATE AND TIME
// =========================================

$current_date = date("d M Y");

$current_time = date("h:i A");


// =========================================
// SHIPMENT RECORD
// =========================================

$record =

"========================================" . PHP_EOL .
"        CARGOTRACK SHIPMENT RECORD" . PHP_EOL .
"========================================" . PHP_EOL .
"Shipment ID   : " . $shipment_id . PHP_EOL .
"Customer Name : " . $customer_name . PHP_EOL .
"Destination   : " . $destination . PHP_EOL .
"Shipment Type : " . $shipment_type . PHP_EOL .
"Status        : " . ucfirst($status) . PHP_EOL .
"Date          : " . $current_date . PHP_EOL .
"Time          : " . $current_time . PHP_EOL .
"========================================" . PHP_EOL;


// =========================================
// SAVE FILE
// =========================================

if (
    file_put_contents(
        $filename,
        $record,
        LOCK_EX
    ) === false
) {

    die("Unable to save shipment record.");

}


// =========================================
// RETRIEVE SAVED RECORD
// =========================================

$saved_record = file_get_contents($filename);

if ($saved_record === false) {

    die("Unable to retrieve shipment record.");

}


// =========================================
// DISPLAY STATUS
// =========================================

$status_display = ucfirst($status);

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
        Shipment Saved | CargoTrack
    </title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>

<div class="result-page">


    <!-- =====================================
         HEADER
    ====================================== -->

    <header class="result-header">


        <div class="brand">

            <div class="brand-logo">
                CT
            </div>

            <div>

                <strong>
                    CargoTrack
                </strong>

                <span>
                    SHIPMENT RECORDS
                </span>

            </div>

        </div>


        <a href="index.php">
            + New Shipment
        </a>


    </header>



    <!-- =====================================
         MAIN
    ====================================== -->

    <main class="result-main">


        <!-- SUCCESS -->

        <section class="success">


            <div class="success-icon">
                ✓
            </div>


            <span>
                SHIPMENT RECORD SAVED
            </span>


            <h1>

                Shipment successfully
                <strong>organized.</strong>

            </h1>


            <p>

                The shipment record has been stored
                as an individual file inside its
                corresponding status directory.

            </p>


        </section>



        <!-- =================================
             FILE LOCATION
        ================================== -->

        <section class="file-location">


            <div class="file-badge">
                TXT
            </div>


            <div>

                <small>
                    RECORD LOCATION
                </small>

                <strong>

                    <?php
                    echo htmlspecialchars($filename);
                    ?>

                </strong>

            </div>


        </section>



        <!-- =================================
             RECORD GRID
        ================================== -->

        <section class="record-grid">


            <!-- =================================
                 DETAILS
            ================================== -->

            <div class="record-details">


                <span>
                    SHIPMENT INFORMATION
                </span>


                <h2>

                    <?php
                    echo htmlspecialchars(
                        $shipment_id
                    );
                    ?>

                </h2>


                <div class="record-row">

                    <span>
                        CUSTOMER
                    </span>

                    <strong>

                        <?php
                        echo htmlspecialchars(
                            $customer_name
                        );
                        ?>

                    </strong>

                </div>


                <div class="record-row">

                    <span>
                        DESTINATION
                    </span>

                    <strong>

                        <?php
                        echo htmlspecialchars(
                            $destination
                        );
                        ?>

                    </strong>

                </div>


                <div class="record-row">

                    <span>
                        TYPE
                    </span>

                    <strong>

                        <?php
                        echo htmlspecialchars(
                            $shipment_type
                        );
                        ?>

                    </strong>

                </div>


                <div class="record-row">

                    <span>
                        STATUS
                    </span>

                    <strong class="status-badge">

                        <?php
                        echo htmlspecialchars(
                            $status_display
                        );
                        ?>

                    </strong>

                </div>


                <div class="record-row">

                    <span>
                        CREATED
                    </span>

                    <strong>

                        <?php
                        echo $current_date;
                        ?>

                    </strong>

                </div>


            </div>



            <!-- =================================
                 FILE PREVIEW
            ================================== -->

            <div class="file-preview">


                <div class="preview-top">

                    <span>
                        FILE PREVIEW
                    </span>

                    <span>
                        ● SAVED
                    </span>

                </div>


                <pre><?php

                    echo htmlspecialchars(
                        $saved_record
                    );

                ?></pre>


            </div>


        </section>



        <!-- =================================
             BOTTOM
        ================================== -->

        <div class="bottom">


            <div>

                <span class="green-dot"></span>

                Record stored successfully

            </div>


            <a href="index.php">

                Add Another Shipment →

            </a>


        </div>


    </main>


</div>


</body>

</html>