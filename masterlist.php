<?php
session_start();
include 'includes/connection.php';
$position = $_SESSION['position'];
if (($position == 'Barangay Health Worker' || !isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
    header("Location: index.php?error=You are not logged in"); /*Redirect to this page if successful*/
    exit();
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
        if (isset($_GET['maternal-care'])) {
            echo 'Masterlist | Maternal Care';
        } else if (isset($_GET['childhood-female'])) {
            echo 'Masterlist | Childhood Female';
        } else if (isset($_GET['childhood-male'])) {
            echo 'Masterlist | Childhood Male';
        }
        ?>
    </title>
</head>

<body class="grid" id="grid">
    <?php
    include './includes/loader.php';
    include './includes/sidebar/masterlist.php';
    include './includes/navbar/services.php'
    ?>

    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
    ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Added Succesfully',
                })
            </script>
        <?php
        } elseif ($_GET['status'] == 'error') {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error when adding',
                })
            </script>
        <?php
        }
    }
    if (isset($_GET['edited'])) {
        if ($_GET['edited'] == 'success') {
        ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Edited Succesfully',
                })
            </script>
        <?php
        } elseif ($_GET['status'] == 'error') {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error when editing',
                })
            </script>
        <?php
        }
    }
    if (isset($_GET['deleted'])) {
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Deleted Succesfully',
            })
        </script>
    <?php
    }
    ?>

    <!-- Contents -->
    <?php
    if (isset($_GET['maternal-care'])) {
        include 'includes\masterlist\maternal-care.php';
    } else if (isset($_GET['childhood-female'])) {
        include 'includes\masterlist\childhood-care-female.php';
    } else if (isset($_GET['childhood-male'])) {
        include 'includes\masterlist\childhood-care-male.php';
    }
    ?>

    <script src="./js/app.js"></script>

</body>

</html>