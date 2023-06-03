<?php
session_start();
include 'includes/connection.php';
if ((!isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
    header("Location: index.php?error=You are not logged in"); /*Redirect to this page if successful*/
    exit();
}

$query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
$query_run = mysqli_query($conn, $query);
if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $user) {
        $user['firstname'];
        $user['lastname'];
        $user['position'];
    }
}

//FUNCTION TO HIDE CONTENT BASED ON USER LEVEL
include_once "includes/functions.php";
hide_content();
//END OF FUNCTION
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="./js/jquerymodal.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="./js/datatable.js"></script>

    <title>Services | Brgy. Datu Esmael Patient Record System</title>
</head>

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
                title: 'Error when adding',
            })
        </script>
    <?php
    }
}

if (isset($_GET['archive'])) {
    if ($_GET['archive'] == 'error') {
    ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'error',
                iconColor: 'white',
                title: 'Error archiving!',
                customClass: {
                    popup: 'toast'
                },
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            })
        </script>
    <?php
    } else {
    ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'success',
                iconColor: 'white',
                title: 'Archived succesfully!',
                customClass: {
                    popup: 'toast'
                },
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            })
        </script>
    <?php
    }
}

if (isset($_GET['restore'])) {
    ?>
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            icon: 'success',
            iconColor: 'white',
            title: 'Restored succesfully!',
            customClass: {
                popup: 'toast'
            },
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
        })
    </script>
<?php
}
?>

<body class="grid" id="grid">
    <?php
    include './includes/loader.php';
    include './includes/sidebar/services.php';
    include './includes/navbar/services.php'
    ?>

    <!-- Contents -->
    <main class="services">
        <!-- TABS event initialization-->
        <ul role="list" class="services__list">
            <?php
            $query = "SELECT * FROM deworming WHERE archive_label=''";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
                $serviceRow = 0;
            } else {
                $serviceRow = 1;
            }
            ?>
            <li class="services__list__item" id='services__list__item--deworming' onclick="services(event, 'Deworming' , '<?= $serviceRow ?>')">
                <!-- START DEWORMING COUNT -->
                <?php
                $query = "SELECT count(*) FROM deworming WHERE archive_label=''";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    Deworming (<?php echo $row['count(*)']; ?>)
                <?php
                }
                ?>
                <!-- END -->
            </li>
            <?php
            $query = "SELECT * FROM consultation WHERE archive_label=''";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
                $serviceRow = 0;
            } else {
                $serviceRow = 1;
            }
            ?>
            <li class="services__list__item" id='services__list__item--consultation' onclick="services(event, 'Consultation', '<?= $serviceRow ?>')">
                <!-- START CONSULTATION COUNT -->
                <?php
                $query = "SELECT count(*) FROM consultation WHERE archive_label=''";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    Consultation (<?php echo $row['count(*)']; ?>)
                <?php
                }
                ?>
                <!-- END -->
            </li>
            <?php
            $query = "SELECT * FROM prenatal WHERE archive_label=''";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
                $serviceRow = 0;
            } else {
                $serviceRow = 1;
            }
            ?>
            <li class="services__list__item" id='services__list__item--prenatal' onclick="services(event, 'Pre-Natal' , '<?= $serviceRow ?>')">
                <!-- START PRENATAL COUNT -->
                <?php
                $query = "SELECT count(*) FROM prenatal WHERE archive_label=''";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    Pre-Natal (<?php echo $row['count(*)']; ?>)
                <?php
                }
                ?>
                <!-- END -->
            </li>
            <?php
            $query = "SELECT * FROM postnatal WHERE archive_label=''";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
                $serviceRow = 0;
            } else {
                $serviceRow = 1;
            }
            ?>
            <li class="services__list__item" id='services__list__item--postnatal' onclick="services(event, 'Post-Natal' , '<?= $serviceRow ?>')">
                <!-- START POSTNATAL COUNT -->
                <?php
                $query = "SELECT count(*) FROM postnatal WHERE archive_label=''";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    Post-Natal (<?php echo $row['count(*)']; ?>)
                <?php
                }
                ?>
                <!-- END -->
            </li>
            <?php
            $query = "SELECT * FROM search_destroy WHERE archive_label=''";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
                $serviceRow = 0;
            } else {
                $serviceRow = 1;
            }
            ?>
            <li class="services__list__item" id='services__list__item--search' onclick="services(event, 'Search-and-Destroy' , '<?= $serviceRow ?>')">
                <!-- START SEARCH DESTROY COUNT -->
                <?php
                $query = "SELECT count(*) FROM search_destroy WHERE archive_label=''";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    Search and Destroy (<?php echo $row['count(*)']; ?>)
                <?php
                }
                ?>
                <!-- END -->
            </li>
            <?php
            $query = "SELECT * FROM early_childhood WHERE archive_label=''";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
                $serviceRow = 0;
            } else {
                $serviceRow = 1;
            }
            ?>
            <li class="services__list__item" id='services__list__item--childhood' onclick="services(event, 'Childhood-Care' , '<?= $serviceRow ?>')">
                <!-- START EARLY CHILDHOOD COUNT -->
                <?php
                $query = "SELECT count(*) FROM early_childhood WHERE archive_label=''";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    Childhood Care (<?php echo $row['count(*)']; ?>)
                <?php
                }
                ?>
                <!-- END -->
            </li>

            <?php
            $query = "SELECT * FROM other_service WHERE archive_label=''";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
                $serviceRow = 0;
            } else {
                $serviceRow = 1;
            }
            ?>
            <li class="services__list__item" id='services__list__item--other' onclick="services(event, 'Other-services' , '<?= $serviceRow ?>')">
                <!-- START EARLY CHILDHOOD COUNT -->
                <?php
                $query = "SELECT count(*) FROM other_service WHERE archive_label=''";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    Others (<?php echo $row['count(*)']; ?>)
                <?php
                }
                ?>
                <!-- END -->
            </li>
        </ul>
        <!-- end of TABS event initialization -->
        <hr class="services__list--hr">

        <select name="" id="" class="services__list--mobile" onchange="servicesClick(value);">
            <option selected>Select a service</option>
            <option value="services__list__item--deworming">Deworming</option>
            <option value="services__list__item--consultation">Consultation</option>
            <option value="services__list__item--prenatal">Prenatal</option>
            <option value="services__list__item--postnatal">Postnatal</option>
            <option value="services__list__item--childhood">Early childhood Care</option>
            <option value="services__list__item--search">Search and destroy</option>
            <option value="services__list__item--other">Other</option>
        </select>

        <!-- Start Tab for Deworming -->
        <div class="services__table" id="Deworming">
            <!-- SORT QUERY -->
            <form action="" method="POST">
                <ul class="services__table__row services__header" role="list">
                    <li class="services__attributes__item">
                        <p>Name</p>
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="deworming_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Age
                        <!-- BUTTON FOR AGE -->
                        <button type="submit" name="deworming_sort_age" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Sex
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="deworming_sort_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Date Availed
                        <!-- SEX FOR DATE AVAILED -->
                        <button type="submit" name="deworming_sort_date_availed" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li>

                    </li>
                </ul>
            </form>
            <!-- END OF SORT -->

            <?php
            //PAGINATION COUNTER
            if (isset($_GET['page_deworming'])) {
                $page = $_GET['page_deworming'];
            } else {
                $page = 1;
            }
            $num_per_page = 9;
            $start_from = ($page - 1) * $num_per_page;
            // END OF PAGINATION COUNTER

            $query = "SELECT * FROM deworming WHERE archive_label='' LIMIT $start_from, $num_per_page";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['deworming_sort_name'])) {
                    $sort_id = $_POST['deworming_sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM deworming WHERE archive_label='' ORDER BY firstname LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['deworming_sort_age'])) {
                    $sort_id = $_POST['deworming_sort_age'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM deworming WHERE archive_label='' ORDER BY age LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['deworming_sort_sex'])) {
                    $sort_id = $_POST['deworming_sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM deworming WHERE archive_label='' ORDER BY sex LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['deworming_sort_date_availed'])) {
                    $sort_id = $_POST['deworming_sort_date_availed'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM deworming WHERE archive_label='' ORDER BY deworming_date LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $patient) {
                    // CONVERT DATE TO MM-DD-YY
                    $deworm_date = new DateTime($patient['deworming_date']);
                    $new_deworm_date = $deworm_date->format("m-d-Y");

                    $deworm_bdate = new DateTime($patient['birthdate']);
                    $new_deworm_bdate = $deworm_bdate->format("m-d-Y");
            ?>
                    <!-- To be put in the loop -->
                    <ul class="services__table__row services__info" role="list" id='services__deworming'>
                        <!-- Modal Trigger -->
                        <li class="services__name p-bold">
                            <a href="#deworming-modal<?= $patient['deworming_id']; ?>" rel="modal:open"><?= $patient['firstname'] . " " . $patient['lastname']; ?></a>
                        </li>
                        <!-- End of Modal Trigger -->
                        <li class="services__num">
                            <?= $patient['age']; ?>
                        </li>
                        <li class="services__sex">
                            <?= $patient['sex']; ?>
                        </li>
                        <li class="services__date--availed">
                            <?= $new_deworm_date; ?>
                        </li>



                        <!-- ARCHIVING -->
                        <li class="services__option">

                            <button type="button" onclick="confirmArchive('deworming' ,'<?= $patient['deworming_id']; ?>' , '<?= $patient['firstname']; ?>' , '<?= $patient['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                </svg>
                            </button>
                            <!-- END OF ARCHIVING -->

                            <button type="button" onclick="window.location.href = `edit-record.php?service=deworming&id=<?= $patient['deworming_id']; ?>`">
                                <svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                    <defs>
                                        <clipPath id="a">
                                            <rect width="64" height="64" />
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)">
                                        <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                    </g>
                                </svg>
                            </button type="button">
                        </li>
                        <?php include('./includes/reports/deworming.php'); ?>
                    </ul>
                <?php
                    include('./includes/reports/deworming.php');
                }
                //PAGINATION
                $pr_query = "SELECT * FROM deworming";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_page = ceil($total_record / $num_per_page);
                ?>
                <div class="pagination">
                    <?php
                    if ($page > 1) {
                    ?>
                        <a href='services.php?page_deworming=<?php echo ($page - 1) ?>&deworming' class="pagination_previous">Previous</a>

                    <?php
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                    ?>
                        <a href='services.php?page_deworming=<?php echo $i; ?>&deworming' class="pagination_number"><?php echo $i; ?></a>
                    <?php
                    }
                    if ($page < $total_page) {
                    ?>
                        <a href='services.php?page_deworming=<?php echo ($page + 1) ?>&deworming' class="pagination_next">Next</a>

                    <?php
                    }
                    ?>
                </div>
            <?php
                //END OF PAGINATION
            }

            ?>

            <!-- <a href="#deworming-reports" rel="modal:open" class="view-report"> View report</a> -->
            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add-record.php?service=deworming'">
                <p>Add</p>
            </button>
        </div>

        <?php
        include 'includes/tables/services_deworming.php'
        ?>


        <!-- Start Tab for Consultation -->
        <div class="services__table" id="Consultation">
            <!-- START OF FORM ACTION -->
            <form action="" method="POST">
                <ul class="services__table__row services__header" role="list">
                    <li class="services__attributes__item">
                        <p>Name</p>
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="consultation_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>

                    <li class="services__attributes__item">
                        Age
                        <!-- BUTTON FOR AGE -->
                        <button type="submit" name="consultation_sort_age" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Sex
                        <form action="" method="POST">
                            <!-- BUTTON FOR SEX -->
                            <button type="submit" name="consultation_sort_sex" value="3">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </form>
                    </li>
                    <li class="services__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE AVAILED -->
                        <button type="submit" name="consultation_sort_date_availed" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li>

                    </li>
                </ul>
                <!-- END OF FORM -->

                <!-- To be put in the loop -->
                <?php
                //PAGINATION COUNTER
                if (isset($_GET['page_consultation'])) {
                    $page = $_GET['page_consultation'];
                } else {
                    $page = 1;
                }
                $num_per_page = 9;
                $start_from = ($page - 1) * $num_per_page;
                // END OF PAGINATION COUNTER

                $query = "SELECT * FROM consultation WHERE archive_label='' LIMIT $start_from, $num_per_page";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    if (isset($_POST['consultation_sort_name'])) {
                        $sort_id = $_POST['consultation_sort_name'];
                        if ($sort_id == 1) {
                            $query = "SELECT * FROM consultation WHERE archive_label='' ORDER BY firstname LIMIT $start_from, $num_per_page";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['consultation_sort_age'])) {
                        $sort_id = $_POST['consultation_sort_age'];
                        if ($sort_id == 2) {
                            $query = "SELECT * FROM consultation WHERE archive_label='' ORDER BY age LIMIT $start_from, $num_per_page";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['consultation_sort_sex'])) {
                        $sort_id = $_POST['consultation_sort_sex'];
                        if ($sort_id == 3) {
                            $query = "SELECT * FROM consultation WHERE archive_label='' ORDER BY sex LIMIT $start_from, $num_per_page";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['consultation_sort_date_availed'])) {
                        $sort_id = $_POST['consultation_sort_date_availed'];
                        if ($sort_id == 4) {
                            $query = "SELECT * FROM consultation WHERE archive_label='' ORDER BY consultation_date LIMIT $start_from, $num_per_page";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    foreach ($query_run as $patient) {
                        // CONVERT DATE TO MM-DD-YY
                        $consul_date = new DateTime($patient['consultation_date']);
                        $new_consul_date = $consul_date->format("m-d-Y");

                        $consul_bdate = new DateTime($patient['birthdate']);
                        $new_consul_bdate = $consul_bdate->format("m-d-Y");
                ?>
                        <ul class="services__table__row services__info" role="list">
                            <li class="services__name p-bold">
                                <a href="#consultation__report<?= $patient['consultation_id']; ?>" rel="modal:open"><?= $patient['firstname'] . " " . $patient['lastname']; ?></a>
                            </li>
                            <li class="services__num">
                                <?= $patient['age']; ?>
                            </li>
                            <li class="services__sex">
                                <?= $patient['sex']; ?>
                            </li>
                            <li class="services__date--availed">
                                <?= $new_consul_date; ?>
                            </li>
                            <!-- ARCHIVING -->
                            <li class="services__option">
                                <button type="button" onclick="confirmArchive('consultation' ,'<?= $patient['consultation_id']; ?>' , '<?= $patient['firstname']; ?>' , '<?= $patient['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                    </svg>
                                </button>
                                <button type="button" onclick="window.location.href = `edit-record.php?service=consultation&id=<?= $patient['consultation_id']; ?>`">
                                    <svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                        <defs>
                                            <clipPath id="a">
                                                <rect width="64" height="64" />
                                            </clipPath>
                                        </defs>
                                        <g clip-path="url(#a)">
                                            <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                        </g>
                                    </svg>
                                </button>
                            </li>
                            <?php include('./includes/reports/consultation.php'); ?>
                        </ul>
                    <?php
                    }

                    //PAGINATION
                    $pr_query = "SELECT * FROM consultation";
                    $pr_result = mysqli_query($conn, $pr_query);
                    $total_record = mysqli_num_rows($pr_result);

                    $total_page = ceil($total_record / $num_per_page);
                    ?>
                    <div class="pagination">
                        <?php
                        if ($page > 1) {
                        ?>
                            </style>
                            <a href='services.php?page_consultation=<?php echo ($page - 1) ?>&consultation' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='services.php?page_consultation=<?php echo $i; ?>&consultation' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='services.php?page_consultation=<?php echo ($page + 1) ?>&consultation' class="pagination_next">Next</a>
                    <?php
                        }
                        //END OF PAGINATION

                    }

                    ?>
                    </div>
                    <!-- End of Query -->
                    <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add-record.php?service=consultation'">
                        <p>Add</p>
                    </button>
        </div>
        <!-- End Tab for Consultation -->

        <!-- Start Tab for Pre-Natal -->
        <div class="services__table" id="Pre-Natal">
            <!-- START OF FORM ACTION -->
            <form action="" method="POST">
                <ul class="services__table__row services__header" role="list">
                    <li class="services__attributes__item">
                        <p>Name</p>
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="prenatal_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Age
                        <!-- BUTTON FOR AGE -->
                        <button type="submit" name="prenatal_sort_age" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Sex
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="prenatal_sort_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE AVAILED -->
                        <button type="submit" name="prenatal_sort_date_availed" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li>

                    </li>
                </ul>
            </form>
            <!-- END OF FORM -->

            <!-- To be put in the loop -->
            <?php
            //PAGINATION COUNTER
            if (isset($_GET['page_prenatal'])) {
                $page = $_GET['page_prenatal'];
            } else {
                $page = 1;
            }
            $num_per_page = 9;
            $start_from = ($page - 1) * $num_per_page;
            // END OF PAGINATION COUNTER

            $query = "SELECT * FROM prenatal WHERE archive_label='' LIMIT $start_from, $num_per_page";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['prenatal_sort_name'])) {
                    $sort_id = $_POST['prenatal_sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM prenatal WHERE archive_label='' ORDER BY firstname LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['prenatal_sort_age'])) {
                    $sort_id = $_POST['prenatal_sort_age'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM prenatal WHERE archive_label='' ORDER BY age LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['prenatal_sort_sex'])) {
                    $sort_id = $_POST['prenatal_sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM prenatal WHERE archive_label='' ORDER BY sex LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['prenatal_sort_date_availed'])) {
                    $sort_id = $_POST['prenatal_sort_date_availed'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM prenatal WHERE archive_label='' ORDER BY prenatal_date LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $patient) {
                    // CONVERT DATE TO MM-DD-YY
                    $prenatal_date = new DateTime($patient['prenatal_date']);
                    $new_prenatal_date = $prenatal_date->format("m-d-Y");

                    $prenatal_bdate = new DateTime($patient['birthdate']);
                    $new_prenatal_bdate = $prenatal_bdate->format("m-d-Y");
            ?>
                    <ul class="services__table__row services__info" role="list">
                        <li class="services__name p-bold">
                            <a href="#prenatal__report<?= $patient['prenatal_id']; ?>" rel="modal:open"><?= $patient['firstname'] . " " . $patient['lastname']; ?></a>
                        </li>
                        <li class="services__num">
                            <?= $patient['age']; ?>
                        </li>
                        <li class="services__sex">
                            <?= $patient['sex']; ?>
                        </li>
                        <li class="services__date--availed">
                            <?= $new_prenatal_date; ?>
                        </li>
                        <li class="services__option">
                            <button type="button" onclick="confirmArchive('prenatal' ,'<?= $patient['prenatal_id']; ?>' , '<?= $patient['firstname']; ?>' , '<?= $patient['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                </svg>
                            </button>
                            <button type="button" onclick="window.location.href = `edit-record.php?service=prenatal&id=<?= $patient['prenatal_id']; ?>`">
                                <svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                    <defs>
                                        <clipPath id="a">
                                            <rect width="64" height="64" />
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)">
                                        <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                    </g>
                                </svg>
                            </button>
                        </li>
                        <?php include('./includes/reports/prenatal.php'); ?>
                    </ul>
                <?php
                }
                //PAGINATION
                $pr_query = "SELECT * FROM prenatal";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_page = ceil($total_record / $num_per_page);
                ?>
                <div class="pagination">
                    <?php
                    if ($page > 1) {
                    ?>
                        <a href='services.php?page_prenatal=<?php echo ($page - 1) ?>&prenatal' class="pagination_previous">Previous</a>
                    <?php
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                    ?>
                        <a href='services.php?page_prenatal=<?php echo $i; ?>&prenatal' class="pagination_number"><?php echo $i; ?></a>
                    <?php
                    }
                    if ($page < $total_page) {
                    ?>
                        <a href='services.php?page_prenatal=<?php echo ($page + 1) ?>&prenatal' class="pagination_next">Next</a>
                    <?php
                    }
                    ?>
                </div>
            <?php
                //END OF PAGINATION
            }

            ?>

            <!-- End of Query -->

            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add-record.php?service=prenatal'">
                <p>Add</p>
            </button>
        </div>
        <!-- End Tab for Pre-Natal -->

        <!-- Start Tab for Post-Natal -->
        <div class="services__table" id="Post-Natal">
            <!-- START OF FORM ACTION -->
            <form action="" method="POST">
                <ul class="services__table__row services__header" role="list">
                    <li class="services__attributes__item">
                        <p>Name</p>
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="postnatal_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Age
                        <!-- BUTTON FOR AGE -->
                        <button type="submit" name="postnatal_sort_age" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Sex
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="postnatal_sort_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE AVAILED -->
                        <button type="submit" name="postnatal_sort_date_availed" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li>

                    </li>
                </ul>
            </form>
            <!-- END OF FORM -->

            <!-- To be put in the loop -->
            <?php
            //PAGINATION COUNTER
            if (isset($_GET['page_postnatal'])) {
                $page = $_GET['page_postnatal'];
            } else {
                $page = 1;
            }
            $num_per_page = 9;
            $start_from = ($page - 1) * $num_per_page;
            // END OF PAGINATION COUNTER

            $query = "SELECT * FROM postnatal WHERE archive_label='' LIMIT $start_from, $num_per_page";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['postnatal_sort_name'])) {
                    $sort_id = $_POST['postnatal_sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM postnatal WHERE archive_label='' ORDER BY firstname LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['postnatal_sort_age'])) {
                    $sort_id = $_POST['postnatal_sort_age'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM postnatal WHERE archive_label='' ORDER BY age LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['postnatal_sort_sex'])) {
                    $sort_id = $_POST['postnatal_sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM postnatal WHERE archive_label='' ORDER BY sex LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['postnatal_sort_date_availed'])) {
                    $sort_id = $_POST['postnatal_sort_date_availed'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM postnatal WHERE archive_label='' ORDER BY postnatal_date LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $patient) {
                    // CONVERT DATE TO MM-DD-YY
                    $postnatal_date = new DateTime($patient['postnatal_date']);
                    $new_postnatal_date = $postnatal_date->format("m-d-Y");

                    $postnatal_bdate = new DateTime($patient['birthdate']);
                    $new_postnatal_bdate = $postnatal_bdate->format("m-d-Y");
            ?>

                    <ul class="services__table__row services__info" role="list">
                        <li class="services__name p-bold">
                            <a href="#postnatal__report<?= $patient['postnatal_id']; ?>" rel="modal:open"><?= $patient['firstname'] . " " . $patient['lastname']; ?></a>
                            <?php include('./includes/reports/postnatal.php'); ?>
                        </li>
                        <li class="services__num">
                            <?= $patient['age']; ?>
                        </li>
                        <li class="services__sex">
                            <?= $patient['sex']; ?>
                        </li>
                        <li class="services__date--availed">
                            <?= $new_postnatal_date; ?>
                        </li>
                        <li class="services__option">
                            <button type="button" onclick="confirmArchive('postnatal' ,'<?= $patient['postnatal_id']; ?>' , '<?= $patient['firstname']; ?>' , '<?= $patient['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                </svg>
                            </button>
                            <button type="button" onclick="window.location.href = `edit-record.php?service=postnatal&id=<?= $patient['postnatal_id']; ?>`">
                                <svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                    <defs>
                                        <clipPath id="a">
                                            <rect width="64" height="64" />
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)">
                                        <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                    </g>
                                </svg>
                            </button>
                        </li>
                    </ul>

                <?php
                }
                //PAGINATION
                $pr_query = "SELECT * FROM postnatal";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_page = ceil($total_record / $num_per_page);

                ?>
                <div class="pagination">
                    <?php
                    if ($page > 1) {
                    ?>
                        <a href='services.php?page_postnatal=<?php echo ($page - 1) ?>&postnatal' class="pagination_previous">Previous</a>
                    <?php
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                    ?>
                        <a href='services.php?page_postnatal=<?php echo $i; ?>&postnatal' class="pagination_number"><?php echo $i; ?></a>
                    <?php
                    }
                    if ($page < $total_page) {
                    ?>
                        <a href='services.php?page_postnatal=<?php echo ($page + 1) ?>&postnatal' class="pagination_next">Next</a>
                    <?php
                    }
                    ?>
                </div>
            <?php
                //END OF PAGINATION
            }

            ?>

            <!-- End of Query -->
            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add-record.php?service=postnatal'">
                <p>Add</p>
            </button>
        </div>
        <!-- End Tab for Post-Natal -->

        <!-- Start Tab for Search and Destroy -->
        <div class="services__table" id="Search-and-Destroy">
            <!-- START OF FORM ACTION -->
            <form action="" method="POST">
                <ul class="services__table__row services__header" role="list">
                    <li class="services__attributes__item">
                        <p>Name of Owner</p>
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="search_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Status
                        <!-- BUTTON FOR AGE -->
                        <button type="submit" name="search_sort_status" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Positive Container
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="search_sort_con" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Date Visit
                        <!-- BUTTON FOR DATE AVAILED -->
                        <button type="submit" name="search_sort_date_availed" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li>

                    </li>
                </ul>
            </form>
            <!-- END OF FORM -->

            <!-- To be put in the loop -->
            <?php
            //PAGINATION COUNTER
            if (isset($_GET['page_searchdestroy'])) {
                $page = $_GET['page_searchdestroy'];
            } else {
                $page = 1;
            }
            $num_per_page = 9;
            $start_from = ($page - 1) * $num_per_page;
            // END OF PAGINATION COUNTER

            $query = "SELECT * FROM search_destroy WHERE archive_label='' LIMIT $start_from, $num_per_page";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['search_sort_name'])) {
                    $sort_id = $_POST['search_sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label='' ORDER BY owner_fname LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['search_sort_status'])) {
                    $sort_id = $_POST['search_sort_status'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label='' ORDER BY remark_status LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['search_sort_con'])) {
                    $sort_id = $_POST['search_sort_con'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label='' ORDER BY container_num LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['search_sort_date_availed'])) {
                    $sort_id = $_POST['search_sort_date_availed'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label='' ORDER BY date_visit LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $patient) {
                    // CONVERT DATE TO MM-DD-YY
                    $sd_date = new DateTime($patient['date_visit']);
                    $new_sd_date = $sd_date->format("m-d-Y");
            ?>

                    <ul class="services__table__row services__info" role="list">
                        <li class="services__name p-bold">
                            <a href="#search-and-destroy-modal<?= $patient['search_destroy_id']; ?>" rel="modal:open"><?= $patient['owner_fname'] . ' ' . $patient['owner_lname']; ?></a>
                        </li>
                        <li class="services__num">
                            <?= $patient['remark_status']; ?>
                        </li>
                        <li class="services__sex">
                            <?= $patient['container_num']; ?>
                        </li>
                        <li class="services__date--availed">
                            <?= $new_sd_date; ?>
                        </li>
                        <li class="services__option">
                            <button type="button" onclick="confirmArchive('search-destroy' ,'<?= $patient['search_destroy_id']; ?>' , '<?= $patient['owner_fname']; ?>' , '<?= $patient['owner_fname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                </svg>
                            </button>
                            <button type="button" onclick="window.location.href = `edit-record.php?service=search-and-destroy&id=<?= $patient['search_destroy_id']; ?>`">
                                <svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                    <defs>
                                        <clipPath id="a">
                                            <rect width="64" height="64" />
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)">
                                        <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                    </g>
                                </svg>
                            </button>
                        </li>
                    </ul>
                <?php
                    include('./includes/reports/search-and-destroy.php'); //moved caused of error when in top
                }
                //PAGINATION
                $pr_query = "SELECT * FROM search_destroy";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_page = ceil($total_record / $num_per_page);

                ?>
                <div class="pagination">
                    <?php
                    if ($page > 1) {
                    ?>
                        <a href='services.php?page_searchdestroy=<?php echo ($page - 1) ?>&searchdestroy' class="pagination_previous">Previous</a>

                    <?php
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                    ?>
                        <a href='services.php?page_searchdestroy=<?php echo $i; ?>&searchdestroy' class="pagination_number"><?php echo $i; ?></a>
                    <?php
                    }
                    if ($page < $total_page) {
                    ?>
                        <a href='services.php?page_searchdestroy=<?php echo ($page + 1) ?>&searchdestroy' class="pagination_next">Next</a>
                    <?php
                    }
                    ?>
                </div>
            <?php
                //END OF PAGINATION
            }

            ?>


            <!-- End of Query -->
            <!-- <a href="#search-and-destroy__report" rel="modal:open" class="view-report"> View report</a> -->
            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add-record.php?service=search-and-destroy'">
                <p>Add</p>
            </button>

        </div>
        <!-- End Tab for Search and Destroy -->

        <!-- Start Tab for Early Childhood -->
        <div class="services__table" id="Childhood-Care">
            <!-- START OF FORM ACTION -->
            <form action="" method="POST">
                <ul class="services__table__row services__header" role="list">
                    <li class="services__attributes__item">
                        <p>Child Name</p>
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="early_sort_cname" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Mother Name
                        <!-- BUTTON FOR MOTHER NAME -->
                        <button type="submit" name="early_sort_mname" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Age
                        <!-- BUTTON FOR Age -->
                        <button type="submit" name="early_sort_age" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE AVAILED -->
                        <button type="submit" name="early_sort_date_availed" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li>

                    </li>
                </ul>
            </form>
            <!-- END OF FORM -->

            <!-- To be put in the loop -->
            <?php
            //PAGINATION COUNTER
            if (isset($_GET['page_earlychildhood'])) {
                $page = $_GET['page_earlychildhood'];
            } else {
                $page = 1;
            }
            $num_per_page = 9;
            $start_from = ($page - 1) * $num_per_page;
            // END OF PAGINATION COUNTER

            $query = "SELECT * FROM early_childhood WHERE archive_label='' LIMIT $start_from, $num_per_page";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['early_sort_cname'])) {
                    $sort_id = $_POST['early_sort_cname'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label='' ORDER BY child_fname LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['early_sort_mname'])) {
                    $sort_id = $_POST['early_sort_mname'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label='' ORDER BY mother_name LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['early_sort_age'])) {
                    $sort_id = $_POST['early_sort_age'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label='' ORDER BY mother_age LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['early_sort_date_availed'])) {
                    $sort_id = $_POST['early_sort_date_availed'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label='' ORDER BY early_childhood_date LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $patient) {
                    // CONVERT DATE TO MM-DD-YY
                    $ec_date = new DateTime($patient['early_childhood_date']);
                    $new_ec_date = $ec_date->format("m-d-Y");
            ?>
                    <ul class="services__table__row services__info" role="list">
                        <li class="services__name p-bold">
                            <a href="#early__childhood__report<?= $patient['early_childhood_id']; ?>" rel="modal:open"><?= $patient['child_fname'] . ' ' . $patient['child_lname']; ?></a>
                            <?php include('./includes/reports/early__childhood.php'); ?>
                        </li>
                        <li class="services__num">
                            <?= $patient['mother_name']; ?>
                        </li>
                        <li class="services__sex">
                            <?= $patient['mother_age']; ?>
                        </li>
                        <li class="services__date--availed">
                            <?= $new_ec_date; ?>
                        </li>
                        <li class="services__option">
                            <button type="button" onclick="confirmArchive('early-childhood' ,'<?= $patient['early_childhood_id']; ?>' , '<?= $patient['child_fname']; ?>' , '<?= $patient['child_lname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                </svg>
                            </button>
                            <button type="button" onclick="window.location.href = `edit-record.php?service=early-childhood&id=<?= $patient['early_childhood_id']; ?>`">
                                <svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                    <defs>
                                        <clipPath id="a">
                                            <rect width="64" height="64" />
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)">
                                        <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                    </g>
                                </svg>
                            </button>
                        </li>
                    </ul>
                <?php
                }
                //PAGINATION
                $pr_query = "SELECT * FROM early_childhood";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_page = ceil($total_record / $num_per_page);

                ?>
                <div class="pagination">
                    <?php
                    if ($page > 1) {
                    ?>
                        <a href='services.php?page_earlychildhood=<?php echo ($page - 1) ?>&earlychildhood' class="pagination_previous">Previous</a>

                    <?php
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                    ?>
                        <a href='services.php?page_earlychildhood=<?php echo $i; ?>&earlychildhood' class="pagination_number"><?php echo $i; ?></a>
                    <?php
                    }
                    if ($page < $total_page) {
                    ?>
                        <a href='services.php?page_earlychildhood=<?php echo ($page + 1) ?>&earlychildhood' class="pagination_next">Next</a>
                    <?php
                    }
                    ?>
                </div>
            <?php
                //END OF PAGINATION
            }

            ?>

            <!-- End of Query -->

            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add-record.php?service=early-childhood'">
                <p>Add</p>
            </button>
        </div>
        <!-- End Tab for Search and Destroy -->


        <!-- Start Tab for Other Services -->
        <div class="services__table" id="Other-services">
            <!-- START OF FORM ACTION -->
            <form action="" method="POST">
                <ul class="services__table__row services__header" role="list">
                    <li class="services__attributes__item">
                        <p>Name</p>
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="other_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Service
                        <!-- BUTTON FOR MOTHER NAME -->
                        <button type="submit" name="other_service" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Sex
                        <!-- BUTTON FOR Age -->
                        <button type="submit" name="other_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="services__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE AVAILED -->
                        <button type="submit" name="other_date_availed" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li>

                    </li>
                </ul>
            </form>
            <!-- END OF FORM -->

            <!-- To be put in the loop -->
            <?php
            //PAGINATION COUNTER
            if (isset($_GET['page_other'])) {
                $page = $_GET['page_other'];
            } else {
                $page = 1;
            }
            $num_per_page = 9;
            $start_from = ($page - 1) * $num_per_page;
            // END OF PAGINATION COUNTER

            $query = "SELECT * FROM other_service WHERE archive_label='' LIMIT $start_from, $num_per_page";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['other_name'])) {
                    $sort_id = $_POST['other_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM other_service WHERE archive_label='' ORDER BY firstname LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['other_service'])) {
                    $sort_id = $_POST['other_service'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM other_service WHERE archive_label='' ORDER BY service_name LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['other_sex'])) {
                    $sort_id = $_POST['other_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM other_service WHERE archive_label='' ORDER BY sex LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['other_date_availed'])) {
                    $sort_id = $_POST['other_date_availed'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM other_service WHERE archive_label='' ORDER BY service_date LIMIT $start_from, $num_per_page";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $patient) {
                    // CONVERT DATE TO MM-DD-YY
                    $ec_date = new DateTime($patient['service_date']);
                    $new_ec_date = $ec_date->format("m-d-Y");
            ?>
                    <ul class="services__table__row services__info" role="list">
                        <li class="services__name p-bold">
                            <a href="#other_service_report<?= $patient['id']; ?>" rel="modal:open"><?= $patient['firstname'] . ' ' . $patient['lastname']; ?></a>
                            <?php include('./includes/reports/other_service.php'); ?>
                        </li>
                        <li class="services__num">
                            <?= $patient['service_name']; ?>
                        </li>
                        <li class="services__sex">
                            <?= $patient['sex']; ?>
                        </li>
                        <li class="services__date--availed">
                            <?= $new_ec_date; ?>
                        </li>
                        <li class="services__option">
                            <button type="button" onclick="confirmArchive('other-service' ,'<?= $patient['id']; ?>' , '<?= $patient['firstname']; ?>' , '<?= $patient['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                </svg>
                            </button>
                            <button type="button" onclick="window.location.href = `edit-record.php?service=others&id=<?= $patient['id']; ?>`">
                                <svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                    <defs>
                                        <clipPath id="a">
                                            <rect width="64" height="64" />
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#a)">
                                        <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                    </g>
                                </svg>
                            </button>
                        </li>
                    </ul>
                <?php
                }
                //PAGINATION
                $pr_query = "SELECT * FROM other_service";
                $pr_result = mysqli_query($conn, $pr_query);
                $total_record = mysqli_num_rows($pr_result);

                $total_page = ceil($total_record / $num_per_page);

                ?>
                <div class="pagination">
                    <?php
                    if ($page > 1) {
                    ?>
                        <a href='services.php?page_other=<?php echo ($page - 1) ?>&otherservices' class="pagination_previous">Previous</a>

                    <?php
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                    ?>
                        <a href='services.php?page_other=<?php echo $i; ?>&otherservices' class="pagination_number"><?php echo $i; ?></a>
                    <?php
                    }
                    if ($page < $total_page) {
                    ?>
                        <a href='services.php?page_other=<?php echo ($page + 1) ?>&otherservices' class="pagination_next">Next</a>
                    <?php
                    }
                    ?>
                </div>
            <?php
                //END OF PAGINATION
            }

            ?>

            <!-- End of Query -->

            <button type="submit" class="btn-green btn-add services__btn" onclick="window.location.href = 'add-record.php?service=others'">
                <p>Add</p>
            </button>
        </div>
        <!-- End Tab for Search and Destroy -->

        <hr id="services__hr">

    </main>
    <script src="./js/app.js"></script>

    <?php
    if (isset($_GET['service'])) {
        if ($_GET['service'] === 'deworming') {
            $query = "SELECT * FROM deworming";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
    ?>
                <script>
                    noRecord();
                </script>
            <?php
            }
            ?>
            <script>
                servicesClick('deworming__Services');
            </script>
            <?php
        } else if ($_GET['service'] === 'childhood') {
            $query = "SELECT * FROM early_childhood";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
            ?>
                <script>
                    noRecord();
                </script>
            <?php
            }
            ?>
            <script>
                servicesClick('services__list__item--childhood');
            </script>
            <?php
        } else if ($_GET['service'] === 'consultation') {
            $query = "SELECT * FROM consultation";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
            ?>
                <script>
                    noRecord();
                </script>
            <?php
            }
            ?>
            <script>
                servicesClick('services__list__item--consultation');
            </script>
            <?php
        } else if ($_GET['service'] === 'prenatal') {
            $query = "SELECT * FROM prenatal";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
            ?>
                <script>
                    noRecord();
                </script>
            <?php
            }
            ?>
            <script>
                servicesClick('services__list__item--prenatal');
            </script>
            <?php
        } else if ($_GET['service'] === 'search-destroy') {
            $query = "SELECT * FROM search_destroy";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
            ?>
                <script>
                    noRecord();
                </script>
            <?php
            }
            ?>
            <script>
                servicesClick('services__list__item--search');
            </script>
            <?php
        } else if ($_GET['service'] === 'postnatal') {
            $query = "SELECT * FROM postnatal";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
            ?>
                <script>
                    noRecord();
                </script>
            <?php
            }
            ?>
            <script>
                servicesClick('services__list__item--postnatal');
            </script>
            <?php
        } else if ($_GET['service'] === 'otherservices') {
            $query = "SELECT * FROM other_service";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) == 0) {
            ?>
                <script>
                    noRecord();
                </script>
            <?php
            }
            ?>
            <script>
                servicesClick('services__list__item--other');
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            servicesClick('services__list__item--deworming');
        </script>
    <?php
    }


    if (isset($_POST['deworming_sort_name']) || isset($_POST['deworming_sort_age']) || isset($_POST['deworming_sort_sex']) || isset($_POST['deworming_sort_date_availed']) || isset($_GET['deworming'])) {
    ?>
        <script>
            servicesClick('services__list__item--deworming');
        </script>
    <?php
    }
    if (isset($_POST['consultation_sort_name']) || isset($_POST['consultation_sort_age']) || isset($_POST['consultation_sort_sex']) || isset($_POST['consultation_sort_date_availed']) || isset($_GET['consultation'])) {
    ?>
        <script>
            servicesClick('services__list__item--consultation');
        </script>
    <?php
    }
    if (isset($_POST['prenatal_sort_name']) || isset($_POST['prenatal_sort_age']) || isset($_POST['prenatal_sort_sex']) || isset($_POST['prenatal_sort_date_availed']) || isset($_GET['prenatal'])) {
    ?>
        <script>
            servicesClick('services__list__item--prenatal');
        </script>
    <?php
    }
    if (isset($_POST['postnatal_sort_name']) || isset($_POST['postnatal_sort_age']) || isset($_POST['postnatal_sort_sex']) || isset($_POST['postnatal_sort_date_availed']) || isset($_GET['postnatal'])) {
    ?>
        <script>
            servicesClick('services__list__item--postnatal');
        </script>
    <?php
    }
    if (isset($_POST['search_sort_name']) || isset($_POST['search_sort_status']) || isset($_POST['search_sort_con']) || isset($_POST['search_sort_date_availed']) || isset($_GET['searchdestroy'])) {
    ?>
        <script>
            servicesClick('services__list__item--search');
        </script>
    <?php
    }
    if (isset($_POST['early_sort_cname']) || isset($_POST['early_sort_mname']) || isset($_POST['early_sort_age']) || isset($_POST['early_sort_date_availed']) || isset($_GET['earlychildhood'])) {
    ?>
        <script>
            servicesClick('services__list__item--childhood');
        </script>
    <?php
    }
    if (isset($_POST['other_name']) || isset($_POST['other_service']) || isset($_POST['other_sex']) || isset($_POST['other_date_availed']) || isset($_GET['otherservices'])) {
    ?>
        <script>
            servicesClick('services__list__item--other');
        </script>
    <?php
    }
    ?>


    <!-- Datatables -->
    <script>
        $(document).ready(function() {
            $("#deworming__services").DataTable();
        });
        $('#example').dataTable({
            "columnDefs": [{
                "width": "30%",
                "targets": 0
            }]
        });
    </script>

</body>

</html>