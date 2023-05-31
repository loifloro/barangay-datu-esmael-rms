<?php
session_start();
include 'includes/connection.php';
$position = $_SESSION['position'];
if ((!isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
    header("Location: index.php?error=You are not logged in"); /*Redirect to this page if successful*/
    exit();
}

include_once "includes/functions.php";
hide_content_forms();

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
                echo 'Add New Deworming Record';
            } elseif ($service == "consultation") {
                echo 'Add New Consultation Record';
            } elseif ($service == 'prenatal') {
                echo 'Add New Prenatal Record';
            } elseif ($service == 'postnatal') {
                echo 'Add New Postnatal Record';
            } elseif ($service == 'search-and-destroy') {
                echo 'Add New Search and Destroy Record';
            } elseif ($service == 'early-childhood') {
                echo 'Add Early Childhood Care and Development Care';
            } else if ($service == 'others') {
                echo 'Add New Record';
            } else if ($service == 'maternal-care') {
                echo 'Add Target Client list for Maternal Care';
            } else if ($service == 'childcare-male') {
                echo 'Add Target Client list for Child Care Male';
            } else if ($service == 'childcare-female') {
                echo 'Add Target Client list for Child Care Female';
            }
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
            include 'includes/add/add-deworming.php';
        } elseif ($service == "consultation") {
            include 'includes/add/add-consultation.php';
        } elseif ($service == 'prenatal') {
            include 'includes/add/add-prenatal.php';
        } elseif ($service == 'postnatal') {
            include 'includes/add/add-postnatal.php';
        } elseif ($service == 'search-and-destroy') {
            include 'includes/add/add-search_destroy.php';
        } elseif ($service == 'early-childhood') {
            include 'includes/add/add-early_childhood.php';
        } else if ($service == 'others') {
            include 'includes/add/add-other_services.php';
        } else if ($service == 'maternal-care') {
            include 'includes/add/add-maternal_care.php';
        } else if ($service == 'childcare-male') {
            include 'includes/add/add-child_care-male.php';
        } else if ($service == 'childcare-female') {
            include 'includes/add/add-child_care-female.php';
        }
    }
    ?>


    <script src="./js/app.js"></script>


</body>

</html>