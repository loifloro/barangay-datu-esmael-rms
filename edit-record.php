<?php
session_start();
include 'includes/connection.php';
$position = $_SESSION['position'];
$name = $_SESSION['firstname'];
if ((!isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
    header("Location: index.php?error=You are not logged in"); /*Redirect to this page if successful*/
    exit();
}

include_once "includes/functions.php";
hide_content_forms();
hide_content_bhw_noname();

$query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
$query_run = mysqli_query($conn, $query);
if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $user) {
        $user['firstname'];
        $user['lastname'];
        $user['position'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="./js/jquerymodal.js"></script>

    <title>
        <?php
        if (isset($_GET['service'])) {
            $service = $_GET['service'];
            if ($service == "deworming") {
                echo 'Edit Deworming Record';
            } elseif ($service == "consultation") {
                echo 'Edit Consultation Record';
            } elseif ($service == 'prenatal') {
                echo 'Edit Prenatal Record';
            } elseif ($service == 'postnatal') {
                echo 'Edit Postnatal Record';
            } elseif ($service == 'search-and-destroy') {
                echo 'Edit Search and Destroy Record';
            } elseif ($service == 'early-childhood') {
                echo 'Edit Early Childhood Care and Development Care';
            } else if ($service == 'others') {
                echo 'Edit Record';
            } else if ($service == 'maternal-care') {
                echo 'Edit Target Client list for Maternal Care';
            } else if ($service == 'childcare-male') {
                echo 'Edit Target Client list for Child Care Male';
            } else if ($service == 'childcare-female') {
                echo 'Edit Target Client list for Child Care Female';
            }
        } else if (isset($_GET['bhw'])) {
            echo 'Edit Barangay Health Worker';
        }
        ?>
    </title>
</head>

<body class="grid" id="grid">
    <?php
    include './includes/loader.php';
    include './includes/sidebar/services.php';
    include './includes/navbar/services.php'
    ?>

    <!-- Contents -->
    <?php
    if (isset($_GET['service'])) {
        $service = $_GET['service'];
        if ($service == "deworming") {
            include 'includes/edit/edit-deworming.php';
        } elseif ($service == "consultation") {
            include 'includes/edit/edit-consultation.php';
        } elseif ($service == 'prenatal') {
            include 'includes/edit/edit-prenatal.php';
        } elseif ($service == 'postnatal') {
            include 'includes/edit/edit-postnatal.php';
        } elseif ($service == 'search-and-destroy') {
            include 'includes/edit/edit-search_destroy.php';
        } elseif ($service == 'early-childhood') {
            include 'includes/edit/edit-early_childhood.php';
        } else if ($service == 'others') {
            include 'includes/edit/edit-other_services.php';
        } else if ($service == 'maternal-care') {
            include 'includes/edit/edit-maternal_care.php';
        } else if ($service == 'childcare-male') {
            include 'includes/edit/edit-child_care-male.php';
        } else if ($service == 'childcare-female') {
            include 'includes/edit/edit-child_care-female.php';
        }
    } else if (isset($_GET['bhw'])) {
        include 'includes/edit/edit-bhw.php';
    }
    ?>


    <script src="./js/app.js"></script>


</body>

</html>