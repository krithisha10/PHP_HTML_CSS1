<?php

$patient_id = trim($_POST['patient_id']);

$departments = [
    "Cardiology" => "patients/cardiology.txt",
    "Neurology" => "patients/neurology.txt",
    "Orthopedics" => "patients/orthopedics.txt",
    "General Medicine" => "patients/general_medicine.txt"
];

$patient = null;
$department_found = "";
$file_found = false;


/*
    Search each department file
*/

foreach ($departments as $department => $file) {

    if (file_exists($file)) {

        $file_found = true;

        $records = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($records as $record) {

            $data = explode("|", $record);

            if ($data[0] === $patient_id) {

                $patient = [
                    "id" => $data[0],
                    "name" => $data[1],
                    "age" => $data[2],
                    "gender" => $data[3],
                    "condition" => $data[4],
                    "doctor" => $data[5],
                    "room" => $data[6]
                ];

                $department_found = $department;

                break 2;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Patient Record | MedFile</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

<div class="result-wrapper">

    <div class="result-container">


        <!-- TOP -->

        <div class="result-top">

            <a href="index.php" class="back">
                ← Patient Search
            </a>

            <span class="record-label">
                MEDICAL RECORD
            </span>

        </div>


        <?php if ($patient): ?>


            <!-- SUCCESS -->

            <div class="record-header">

                <div class="patient-avatar">
                    <?php echo strtoupper(substr($patient["name"], 0, 1)); ?>
                </div>

                <div class="patient-heading">

                    <p class="found-label">
                        ● RECORD FOUND
                    </p>

                    <h1>
                        <?php echo htmlspecialchars($patient["name"]); ?>
                    </h1>

                    <p>
                        Patient ID:
                        <strong><?php echo htmlspecialchars($patient["id"]); ?></strong>
                    </p>

                </div>

                <div class="department-badge">
                    <?php echo htmlspecialchars($department_found); ?>
                </div>

            </div>


            <!-- DETAILS -->

            <div class="record-grid">


                <div class="detail-card">

                    <span>AGE</span>

                    <strong>
                        <?php echo htmlspecialchars($patient["age"]); ?>
                    </strong>

                    <small>Years</small>

                </div>


                <div class="detail-card">

                    <span>GENDER</span>

                    <strong>
                        <?php echo htmlspecialchars($patient["gender"]); ?>
                    </strong>

                    <small>Patient profile</small>

                </div>


                <div class="detail-card">

                    <span>ROOM</span>

                    <strong>
                        <?php echo htmlspecialchars($patient["room"]); ?>
                    </strong>

                    <small>Assigned room</small>

                </div>


                <div class="detail-card">

                    <span>DOCTOR</span>

                    <strong>
                        <?php echo htmlspecialchars($patient["doctor"]); ?>
                    </strong>

                    <small>Consulting doctor</small>

                </div>


            </div>


            <!-- CONDITION -->

            <div class="condition-card">

                <div class="condition-icon">
                    !
                </div>

                <div>

                    <span>MEDICAL CONDITION</span>

                    <h2>
                        <?php echo htmlspecialchars($patient["condition"]); ?>
                    </h2>

                </div>

            </div>


            <!-- FILE INFORMATION -->

            <div class="file-information">

                <div>

                    <span>RECORD SOURCE</span>

                    <strong>
                        <?php echo strtolower(str_replace(" ", "_", $department_found)); ?>.txt
                    </strong>

                </div>

                <div>

                    <span>FILE STATUS</span>

                    <strong class="loaded">
                        ● Successfully Retrieved
                    </strong>

                </div>

            </div>


        <?php else: ?>


            <!-- NOT FOUND -->

            <div class="not-found">

                <div class="not-found-icon">
                    ?
                </div>

                <p class="found-label">
                    RECORD NOT FOUND
                </p>

                <h1>
                    No patient record found
                </h1>

                <p>
                    We couldn't find a patient with ID
                    <strong><?php echo htmlspecialchars($patient_id); ?></strong>
                    in any department file.
                </p>

                <a href="index.php" class="search-again">
                    ← Search Again
                </a>

            </div>


        <?php endif; ?>


    </div>

</div>

</body>

</html>