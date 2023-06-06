<?php
session_start();
include 'includes/connection.php';
if ((!isset($_SESSION['account_id']) || !isset($_SESSION['phone_num']))) {
    header("Location: index.php?error=You are not logged in"); /*Redirect to this page if successful*/
    exit();
}
// FUNCTION TO HIDE CONTENT BASED ON USER LEVEL
$email = $_SESSION['user_email'];

// PATIENT ACCESS
$query = "SELECT label, deworming_email FROM deworming WHERE deworming_email='$email'
    UNION
    SELECT label, consultation_email FROM consultation WHERE consultation_email='$email'
    UNION
    SELECT label, prenatal_email FROM prenatal WHERE prenatal_email='$email'
    UNION
    SELECT label, postnatal_email FROM postnatal WHERE postnatal_email='$email'
    UNION
    SELECT label, search_destroy_email FROM search_destroy WHERE search_destroy_email='$email'
    UNION
    SELECT label, early_childhood_email FROM early_childhood WHERE early_childhood_email='$email'
    UNION
    SELECT label, service_email FROM other_service WHERE service_email='$email'
    ";
$query_run = mysqli_query($conn, $query);
if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $patient) {
        if ($patient['label'] == 'Deworming') {
            include_once "includes/functions.php";
            hide_patient_deworming();
            $input_search = $patient['deworming_email'];
        }
        if ($patient['label'] == 'Consultation') {
            include_once "includes/functions.php";
            hide_patient_consultation();
            $input_search = $patient['deworming_email'];
        }
        if ($patient['label'] == 'Prenatal') {
            include_once "includes/functions.php";
            hide_patient_prenatal();
            $input_search = $patient['deworming_email'];
        }
        if ($patient['label'] == 'Postnatal') {
            include_once "includes/functions.php";
            hide_patient_postnatal();
            $input_search = $patient['deworming_email'];
        }
        if ($patient['label'] == 'Search and Destroy') {
            include_once "includes/functions.php";
            hide_patient_search_destroy();
            $input_search = $patient['deworming_email'];
        }
        if ($patient['label'] == 'Early Childhood') {
            include_once "includes/functions.php";
            hide_patient_childhood();
            $input_search = $patient['deworming_email'];
        }
        if ($patient['label'] == 'Other Services') {
            include_once "includes/functions.php";
            hide_patient_others();
            $input_search = $patient['deworming_email'];
        }
    }
}

$query2 = "SELECT * FROM account_information WHERE user_email='$email'";
$query_run2 = mysqli_query($conn, $query2);
if (mysqli_num_rows($query_run2) > 0) {
    foreach ($query_run2 as $patient) {
        if ($patient['position'] == 'Barangay Health Worker') {
            include_once "includes/functions.php";
            hide_content();
        }
        if ($patient['position'] == 'City Health Nurse') {
            include_once "includes/functions.php";
            hide_content();
        }
    }
}
//END OF FUNCTION
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="./js/jquerymodal.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="./js/datatable.js"></script>

    <!-- START QUERY FOR DISPLAYING TITLE TAB -->
    <?php
    if (isset($_GET['label'])) {
        $patient_label = mysqli_real_escape_string($conn, $_GET['label']);

        //Deworming
        if (($patient_label == "Deworming") and (isset($_GET['id']))) {
            $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM deworming WHERE deworming_id='$patient_id'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $patient = mysqli_fetch_array($query_run);
                if (isset($_GET['fname']) && isset($_GET['lname'])) {
                    $patient_fname = mysqli_real_escape_string($conn, $_GET['fname']);
                    $patient_lname = mysqli_real_escape_string($conn, $_GET['lname']);
                    if ($patient['firstname'] == $patient_fname && $patient['lastname'] == $patient_lname) {
                        $patient_tab = $patient['firstname'] . ' ' . $patient['lastname'];
                    }
                }
            }
        }

        //Consultation
        if (($patient_label == "Consultation") and (isset($_GET['id']))) {
            $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM consultation WHERE consultation_id='$patient_id'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $patient = mysqli_fetch_array($query_run);
                if (isset($_GET['fname']) && isset($_GET['lname'])) {
                    $patient_fname = mysqli_real_escape_string($conn, $_GET['fname']);
                    $patient_lname = mysqli_real_escape_string($conn, $_GET['lname']);
                    if ($patient['firstname'] == $patient_fname && $patient['lastname'] == $patient_lname) {
                        $patient_tab = $patient['firstname'] . ' ' . $patient['lastname'];
                    }
                }
            }
        }

        //Prenatal
        if (($patient_label == "Prenatal") and (isset($_GET['id']))) {
            $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM prenatal WHERE prenatal_id='$patient_id'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $patient = mysqli_fetch_array($query_run);
                if (isset($_GET['fname']) && isset($_GET['lname'])) {
                    $patient_fname = mysqli_real_escape_string($conn, $_GET['fname']);
                    $patient_lname = mysqli_real_escape_string($conn, $_GET['lname']);
                    if ($patient['firstname'] == $patient_fname && $patient['lastname'] == $patient_lname) {
                        $patient_tab = $patient['firstname'] . ' ' . $patient['lastname'];
                    }
                }
            }
        }

        //Postnatal
        if (($patient_label == "Postnatal") and (isset($_GET['id']))) {
            $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM postnatal WHERE postnatal_id='$patient_id'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $patient = mysqli_fetch_array($query_run);
                if (isset($_GET['fname']) && isset($_GET['lname'])) {
                    $patient_fname = mysqli_real_escape_string($conn, $_GET['fname']);
                    $patient_lname = mysqli_real_escape_string($conn, $_GET['lname']);
                    if ($patient['firstname'] == $patient_fname && $patient['lastname'] == $patient_lname) {
                        $patient_tab = $patient['firstname'] . ' ' . $patient['lastname'];
                    }
                }
            }
        }

        //Search and Destroy
        if (($patient_label == "Search and Destroy") and (isset($_GET['id']))) {
            $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM search_destroy WHERE search_destroy_id='$patient_id'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $patient = mysqli_fetch_array($query_run);
                if (isset($_GET['fname']) && isset($_GET['lname'])) {
                    $patient_fname = mysqli_real_escape_string($conn, $_GET['fname']);
                    $patient_lname = mysqli_real_escape_string($conn, $_GET['lname']);
                    if ($patient['owner_fname'] == $patient_fname && $patient['owner_lname'] == $patient_lname) {
                        $patient_tab = $patient['owner_fname'] . ' ' . $patient['owner_lname'];
                    }
                }
            }
        }

        //Early Childhood
        if (($patient_label == "Early Childhood") and (isset($_GET['id']))) {
            $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM early_childhood WHERE early_childhood_id='$patient_id'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $patient = mysqli_fetch_array($query_run);
                if (isset($_GET['fname']) && isset($_GET['lname'])) {
                    $patient_fname = mysqli_real_escape_string($conn, $_GET['fname']);
                    $patient_lname = mysqli_real_escape_string($conn, $_GET['lname']);
                    if ($patient['child_fname'] == $patient_fname && $patient['child_lname'] == $patient_lname) {
                        $patient_tab = $patient['child_fname'] . ' ' . $patient['child_lname'];
                    }
                }
            }
        }

        //Other Services
        if (($patient_label == "Other Services") and (isset($_GET['id']))) {
            $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
            $query = "SELECT * FROM other_service WHERE id='$patient_id'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $patient = mysqli_fetch_array($query_run);
                if (isset($_GET['fname']) && isset($_GET['lname'])) {
                    $patient_fname = mysqli_real_escape_string($conn, $_GET['fname']);
                    $patient_lname = mysqli_real_escape_string($conn, $_GET['lname']);
                    if ($patient['firstname'] == $patient_fname && $patient['lastname'] == $patient_lname) {
                        $patient_tab = $patient['firstname'] . ' ' . $patient['lastname'];
                    }
                }
            }
        }
    ?>
        <title><?= $patient_tab; ?></title>
    <?php
    }
    ?>
    <!-- END QUERY FOR DISPLAYING TITLE TAB -->
</head>

<body class="grid" id="grid">
    <?php
    include './includes/loader.php';
    include './includes/sidebar/patients.php';
    include './includes/navbar/patient-profile.php'
    ?>

    <!-- Contents -->
    <main class="patient-profile">
        <p class="back__btn">
            <a href="patients.php">Back</a>
        </p>
        <h2 class="patient-profile__title">
            Profile
        </h2>

        <?php

        if (isset($_GET['label'])) {
            $patient_label = mysqli_real_escape_string($conn, $_GET['label']);

            //DEWORMING
            if (($patient_label == "Deworming") and (isset($_GET['id']))) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM deworming WHERE deworming_id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
                    include('includes/patient_profile/profile_deworming.php');
                }
            }
            //CONSULTATION
            if (($patient_label == "Consultation") and (isset($_GET['id']))) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM consultation WHERE consultation_id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
                    include('includes/patient_profile/profile_consultation.php');
                }
            }
            //PRENATAL
            if (($patient_label == "Prenatal") and (isset($_GET['id']))) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM prenatal WHERE prenatal_id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
                    include('includes/patient_profile/profile_prenatal.php');
                }
            }
            //POSTNATAL
            if (($patient_label == "Postnatal") and (isset($_GET['id']))) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM postnatal WHERE postnatal_id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
                    include('includes/patient_profile/profile_postnatal.php');
                }
            }
            //SEARCH AND DESTROY
            if (($patient_label == "Search and Destroy") and (isset($_GET['id']))) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM search_destroy WHERE search_destroy_id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
                    include('includes/patient_profile/profile_search_destroy.php');
                }
            }
            //EARLY CHILDHOOD
            if (($patient_label == "Early Childhood") and (isset($_GET['id']))) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM early_childhood WHERE early_childhood_id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
                    include('includes/patient_profile/profile_childhood_care.php');
                }
            }
            //OTHER SERVICE
            if (($patient_label == "Other Services") and (isset($_GET['id']))) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM other_service WHERE id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
                    include('includes/patient_profile/profile_other_service.php');
                }
            }
        }
        // include('./includes/reports/deworming.php');

        ?>

    </main>
    <script src="./js/app.js"></script>
    <script>
        $(document).ready(function() {
            $('#patient-profile-table').DataTable();
        });
    </script>
</body>

</html>