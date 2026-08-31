<?php

date_default_timezone_set("Asia/Kolkata");

$base_directory = "shipments/";

$directories = [
    "pending",
    "shipped",
    "delivered"
];

foreach ($directories as $directory) {

    if (!is_dir($base_directory . $directory)) {

        mkdir(
            $base_directory . $directory,
            0777,
            true
        );

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>CargoTrack | Shipment Management</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


<div class="app">


    <!-- =====================================
         TOP NAVIGATION
    ====================================== -->

    <header class="topbar">


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


        <div class="system-status">

            <span></span>

            File System Online

        </div>


    </header>



    <!-- =====================================
         MAIN CONTENT
    ====================================== -->

    <main class="main">


        <!-- =================================
             HERO
        ================================== -->

        <section class="hero">


            <div class="hero-text">

                <span class="eyebrow">
                    LOGISTICS CONTROL CENTER
                </span>


                <h1>

                    Keep every
                    <span>shipment</span>
                    on track.

                </h1>


                <p>

                    Organize shipment records into
                    dedicated status folders and retrieve
                    them whenever you need.

                </p>


                <div class="directory-preview">

                    <div class="folder pending">

                        <div class="folder-icon">
                            P
                        </div>

                        <div>

                            <strong>
                                Pending
                            </strong>

                            <small>
                                Awaiting dispatch
                            </small>

                        </div>

                    </div>


                    <div class="folder shipped">

                        <div class="folder-icon">
                            S
                        </div>

                        <div>

                            <strong>
                                Shipped
                            </strong>

                            <small>
                                In transit
                            </small>

                        </div>

                    </div>


                    <div class="folder delivered">

                        <div class="folder-icon">
                            D
                        </div>

                        <div>

                            <strong>
                                Delivered
                            </strong>

                            <small>
                                Successfully received
                            </small>

                        </div>

                    </div>

                </div>

            </div>



            <!-- =================================
                 FORM
            ================================== -->

            <div class="shipment-card">


                <div class="card-header">

                    <div class="package-icon">
                        ▣
                    </div>

                    <div>

                        <span>
                            NEW SHIPMENT
                        </span>

                        <h2>
                            Shipment Record
                        </h2>

                    </div>

                </div>


                <form
                    action="process.php"
                    method="POST"
                >


                    <!-- SHIPMENT ID -->

                    <div class="form-group">

                        <label>
                            Shipment ID
                        </label>

                        <input
                            type="text"
                            name="shipment_id"
                            placeholder="e.g. SHP1001"
                            required
                        >

                    </div>


                    <!-- CUSTOMER -->

                    <div class="form-group">

                        <label>
                            Customer Name
                        </label>

                        <input
                            type="text"
                            name="customer_name"
                            placeholder="Enter customer name"
                            required
                        >

                    </div>


                    <!-- DESTINATION -->

                    <div class="form-group">

                        <label>
                            Destination
                        </label>

                        <input
                            type="text"
                            name="destination"
                            placeholder="e.g. Coimbatore"
                            required
                        >

                    </div>


                    <!-- CATEGORY -->

                    <div class="form-group">

                        <label>
                            Shipment Type
                        </label>

                        <select
                            name="shipment_type"
                            required
                        >

                            <option value="">
                                Select type
                            </option>

                            <option value="Electronics">
                                Electronics
                            </option>

                            <option value="Documents">
                                Documents
                            </option>

                            <option value="Clothing">
                                Clothing
                            </option>

                            <option value="Other">
                                Other
                            </option>

                        </select>

                    </div>


                    <!-- STATUS -->

                    <div class="form-group">

                        <label>
                            Shipment Status
                        </label>

                        <select
                            name="status"
                            required
                        >

                            <option value="">
                                Select status
                            </option>

                            <option value="pending">
                                Pending
                            </option>

                            <option value="shipped">
                                Shipped
                            </option>

                            <option value="delivered">
                                Delivered
                            </option>

                        </select>

                    </div>


                    <!-- SUBMIT -->

                    <button type="submit">

                        Save Shipment Record

                        <span>
                            →
                        </span>

                    </button>

                </form>


                <div class="form-note">

                    <span>●</span>

                    Record will be stored in its
                    corresponding status directory.

                </div>


            </div>

        </section>



        <!-- =================================
             BOTTOM INFORMATION
        ================================== -->

        <section class="info-strip">


            <div class="info-item">

                <div class="info-number">
                    01
                </div>

                <div>

                    <strong>
                        Multiple Files
                    </strong>

                    <small>
                        Each shipment gets its own file.
                    </small>

                </div>

            </div>


            <div class="divider"></div>


            <div class="info-item">

                <div class="info-number">
                    02
                </div>

                <div>

                    <strong>
                        Organized Directories
                    </strong>

                    <small>
                        Records are grouped by status.
                    </small>

                </div>

            </div>


            <div class="divider"></div>


            <div class="info-item">

                <div class="info-number">
                    03
                </div>

                <div>

                    <strong>
                        Easy Retrieval
                    </strong>

                    <small>
                        Find records from their folders.
                    </small>

                </div>

            </div>


        </section>


    </main>


    <!-- FOOTER -->

    <footer>

        CargoTrack · PHP File & Directory Management

    </footer>


</div>


</body>

</html>