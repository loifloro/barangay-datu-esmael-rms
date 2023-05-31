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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Patients | Brgy. Datu Esmael Patient Record System</title>
</head>

<body class="grid" id="grid">
    <?php
    include './includes/loader.php';
    include './includes/sidebar/patients.php';
    include './includes/navbar/patients.php'
    ?>

    <!-- Contents -->
    <main class="patient">
        <section class="patient">
            <!-- COUNT PATIENT QUERY -->
            <div class="patient__header">
                <?php
                include_once "includes/functions.php";
                total_patient();
                ?>
                <!-- END COUNT PATIENT QUERY -->
                <select name="" id="" class="services__list--mobile" onchange="patient(event, value);">
                    <option selected>Select a service</option>
                    <!-- COUNT DEWORMING -->
                    <?php
                    $query = "SELECT count(*) FROM deworming WHERE archive_label=''";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="Deworming">Deworming (<?php echo $row['count(*)']; ?>)</option>
                    <?php
                    }
                    ?>
                    <!-- COUNT CONSULTATION -->
                    <?php
                    $query = "SELECT count(*) FROM consultation WHERE archive_label=''";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <!-- END COUNT CONSULTATION -->
                        <option value="Consultation">Consultation (<?php echo $row['count(*)']; ?>)</option>
                    <?php
                    }
                    ?>
                    <!-- PRENATAL COUNT -->
                    <?php
                    $query = "SELECT count(*) FROM prenatal WHERE archive_label=''";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="Pre-Natal">Prenatal (<?php echo $row['count(*)']; ?>)</option>
                    <?php
                    }
                    ?>
                    <!-- COUNT POSTNATAL -->
                    <?php
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label=''";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="Post-Natal">Postnatal (<?php echo $row['count(*)']; ?>)</option>
                    <?php
                    }
                    ?>
                    <!--  COUNT S/D -->
                    <?php
                    $query = "SELECT count(*) FROM search_destroy WHERE archive_label=''";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="Childhood Care">Early childhood Care (<?php echo $row['count(*)']; ?>)</option>
                    <?php
                    }
                    ?>
                    <!-- COUNT EC -->
                    <?php
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label=''";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="Search and Destroy">Search and destroy (<?php echo $row['count(*)']; ?>)</option>
                    <?php
                    }
                    ?>
                    <!-- COUNT EC -->
                    <?php
                    $query = "SELECT count(*) FROM other_service WHERE archive_label=''";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="Other-service">Others (<?php echo $row['count(*)']; ?>)</option>
                    <?php
                    }
                    ?>
                </select>
            </div>


            <!-- TABS event initialization-->
            <ul role="list" class="services__list">
                <?php
                $query = "SELECT count(*) FROM deworming WHERE archive_label=''";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <li class="services__list__item services__list__item--active" id="services__list__item--deworming" onclick="patient(event, 'Deworming' , <?php echo $row['count(*)']; ?>)">
                        <!-- COUNT DEWORMING -->
                        <!-- END COUNT DEWORMING -->
                        Deworming (<?php echo $row['count(*)']; ?>)
                    <?php
                }
                    ?>
                    </li>
                    <?php
                    $query = "SELECT count(*) FROM consultation WHERE archive_label=''";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <li class="services__list__item" id="services__list__item--consultation" onclick="patient(event, 'Consultation', <?php echo $row['count(*)']; ?> )">
                            <!-- COUNT CONSULTATION -->
                            <!-- END COUNT CONSULTATION -->
                            Consultation (<?php echo $row['count(*)']; ?>)
                        <?php
                    }
                        ?>
                        </li>
                        <?php
                        $query = "SELECT count(*) FROM prenatal WHERE archive_label=''";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <li class="services__list__item services__list__item--prenatal" onclick="patient(event, 'Pre-Natal', <?php echo $row['count(*)']; ?>)">
                                <!-- PRENATAL COUNT -->
                                Pre-Natal (<?php echo $row['count(*)']; ?>)
                            <?php
                        }
                            ?>
                            </li>
                            <?php
                            $query = "SELECT count(*) FROM postnatal WHERE archive_label=''";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <li class="services__list__item" id="services__list__item--postnatal" onclick="patient(event, 'Post-Natal', <?php echo $row['count(*)']; ?>)">
                                    <!-- COUNT POSTNATAL -->
                                    Post-Natal (<?php echo $row['count(*)']; ?>)
                                <?php
                            }
                                ?>
                                </li>
                                <?php
                                $query = "SELECT count(*) FROM search_destroy WHERE archive_label=''";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <li class="services__list__item " id="services__list__item--search" onclick="patient(event, 'Search and Destroy', <?php echo $row['count(*)']; ?>)">
                                        <!--  COUNT S/D -->
                                        Search and Destroy (<?php echo $row['count(*)']; ?>)
                                    <?php
                                }
                                    ?>
                                    </li>
                                    <?php
                                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label=''";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <li class="services__list__item" id="services__list__item--childhood" onclick="patient(event, 'Childhood Care', <?php echo $row['count(*)']; ?>)">
                                            <!-- COUNT EC -->
                                            Childhood Care (<?php echo $row['count(*)']; ?>)
                                        <?php
                                    }
                                        ?>
                                        </li>
                                        <?php
                                        $query = "SELECT count(*) FROM other_service WHERE archive_label=''";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <li class="services__list__item" id="services__list__item--other" onclick="patient(event, 'Other-service', <?php echo $row['count(*)']; ?>)">
                                                <!--  COUNT S/D -->
                                                Others (<?php echo $row['count(*)']; ?>)
                                            <?php
                                        }
                                            ?>
                                            </li>
            </ul>
            <!-- end of TABS event initialization -->
            <hr class="services__list--hr">


            <!-- Start Tab for Deworming -->
            <div class="patient__table" id="Deworming">
                <!-- SORT QUERY -->
                <form action="" method="POST">
                    <ul class="patient__table__row patient__attributes" role="list">
                        <li class="patient__attributes__item">
                            Name
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="deworming_sort_name" value="1">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Date Availed
                            <!-- SORT DATE AVAILED -->
                            <button type="submit" name="deworming_sort_date_availed" value="2">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Sex
                            <!-- BUTTON FOR SEX -->
                            <button type="submit" name="deworming_sort_sex" value="3">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Services Availed
                        </li>
                    </ul>
                </form>
                <!-- END OF SORT -->

                <!-- To be put in the loop -->
                <!-- Start Query -->
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
                    if (isset($_POST['deworming_sort_date_availed'])) {
                        $sort_id = $_POST['deworming_sort_date_availed'];
                        if ($sort_id == 2) {
                            $query = "SELECT * FROM deworming WHERE archive_label='' ORDER BY deworming_date LIMIT $start_from, $num_per_page";
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
                    foreach ($query_run as $patient) {
                        // CONVERT DATE TO MM-DD-YY
                        $deworm_date = new DateTime($patient['deworming_date']);
                        $new_deworm_date = $deworm_date->format("m-d-Y");
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['deworming_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['firstname']; ?>&lname=<?= $patient['lastname']; ?>">
                                    <?= $patient['firstname'] . " " . $patient['lastname']; ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $new_deworm_date; ?>
                            </li>
                            <li class="patient__sex">
                                <?= $patient['sex']; ?>
                            </li>
                            <li class="patient__availed-service">
                                <span class="patient__availed-service--deworming"><?= $patient['label']; ?></span>
                            </li>
                            <li class="patient__option">
                                <button type="button" onclick="confirmArchive('deworming' ,'<?= $patient['deworming_id']; ?>' , '<?= $patient['firstname']; ?>' , '<?= $patient['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    <?php
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
                            <a href='patients.php?page_deworming=<?php echo ($page - 1) ?>&deworming' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page_deworming=<?php echo $i; ?>&deworming' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page_deworming=<?php echo ($page + 1) ?>&deworming' class="pagination_next">Next</a>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- END OF PAGINATION -->
                <?php
                }
                ?>
                <!--End of Query -->
            </div>
            <!-- End Tab for Deworming -->

            <!-- Start Tab for Consultation -->
            <div class="patient__table" id="Consultation">
                <!-- START OF FORM ACTION -->
                <form action="" method="POST">
                    <ul class="patient__table__row patient__attributes" role="list">
                        <li class="patient__attributes__item">
                            Name
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="consultation_sort_name" value="1">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Date Availed
                            <!-- SORT DATE AVAILED -->
                            <button type="submit" name="consultation_sort_date_availed" value="2">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Sex
                            <!-- BUTTON FOR SEX -->
                            <button type="submit" name="consultation_sort_sex" value="3">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Services Availed
                        </li>
                    </ul>
                </form>
                <!-- END OF FORM -->

                <!-- To be put in the loop -->
                <!-- Start Query -->
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
                    if (isset($_POST['consultation_sort_date_availed'])) {
                        $sort_id = $_POST['consultation_sort_date_availed'];
                        if ($sort_id == 2) {
                            $query = "SELECT * FROM consultation WHERE archive_label='' ORDER BY consultation_date LIMIT $start_from, $num_per_page";
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
                    foreach ($query_run as $patient) {
                        // CONVERT DATE TO MM-DD-YY
                        $consul_date = new DateTime($patient['consultation_date']);
                        $new_consul_date = $consul_date->format("m-d-Y");
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['consultation_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['firstname']; ?>&lname=<?= $patient['lastname']; ?>">
                                    <?= $patient['firstname'] . " " . $patient['lastname']; ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $new_consul_date; ?>
                            </li>
                            <li class="patient__sex">
                                <?= $patient['sex']; ?>
                            </li>
                            <li class="patient__availed-service">
                                <span class="patient__availed-service--consultation"><?= $patient['label']; ?></span>
                                <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                            </li>
                            <li class="patient__option">
                                <button type="button" onclick="confirmArchive('consultation' ,'<?= $patient['consultation_id']; ?>' , '<?= $patient['firstname']; ?>' , '<?= $patient['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                    </svg>
                                </button>
                            </li>
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
                            <a href='patients.php?page_consultation=<?php echo ($page - 1) ?>&consultation' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page_consultation=<?php echo $i; ?>&consultation' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page_consultation=<?php echo ($page + 1) ?>&consultation' class="pagination_next">Next</a>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
                <!--End of Query -->
            </div>
            <!-- End Tab for Consultation -->

            <!-- Start Tab for Prenatal -->
            <div class="patient__table" id="Pre-Natal">
                <!-- SORT QUERY -->
                <form action="" method="POST">
                    <ul class="patient__table__row patient__attributes" role="list">
                        <li class="patient__attributes__item">
                            Name
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="prenatal_sort_name" value="1">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Date Availed
                            <!-- SORT DATE AVAILED -->
                            <button type="submit" name="prenatal_sort_date_availed" value="2">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Sex
                            <!-- BUTTON FOR SEX -->
                            <button type="submit" name="prenatal_sort_sex" value="3">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Services Availed
                        </li>
                    </ul>
                </form>
                <!-- END OF SORT -->

                <!-- To be put in the loop -->
                <!-- Start Query -->
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
                    if (isset($_POST['prenatal_sort_date_availed'])) {
                        $sort_id = $_POST['prenatal_sort_date_availed'];
                        if ($sort_id == 2) {
                            $query = "SELECT * FROM prenatal WHERE archive_label='' ORDER BY prenatal_date LIMIT $start_from, $num_per_page";
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
                    foreach ($query_run as $patient) {
                        // CONVERT DATE TO MM-DD-YY
                        $prenatal_date = new DateTime($patient['prenatal_date']);
                        $new_prenatal_date = $prenatal_date->format("m-d-Y");
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['prenatal_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['firstname']; ?>&lname=<?= $patient['lastname']; ?>">
                                    <?= $patient['firstname'] . " " . $patient['lastname']; ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $new_prenatal_date; ?> <!--Date Registered-->
                            </li>
                            <li class="patient__sex">
                                <?= $patient['sex']; ?> <!--Patient Sex-->
                            </li>
                            <li class="patient__availed-service">
                                <span class="patient__availed-service--prenatal"><?= $patient['label']; ?></span>
                                <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                            </li>
                            <li class="patient__option">
                                <button type="button" onclick="confirmArchive('prenatal' ,'<?= $patient['prenatal_id']; ?>' , '<?= $patient['firstname']; ?>' , '<?= $patient['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                    </svg>
                                </button>
                            </li>
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
                            <a href='patients.php?page_prenatal=<?php echo ($page - 1) ?>&prenatal' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page_prenatal=<?php echo $i; ?>&prenatal' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page_prenatal=<?php echo ($page + 1) ?>&prenatal' class="pagination_next">Next</a>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- END OF PAGINATION -->
                <?php
                }
                ?>
                <!--End of Query -->
            </div>
            <!-- End Tab for Pre-Natal -->

            <!-- Start Tab for Post-Natal -->
            <div class="patient__table" id="Post-Natal">
                <!-- SORT QUERY -->
                <form action="" method="POST">
                    <ul class="patient__table__row patient__attributes" role="list">
                        <li class="patient__attributes__item">
                            Name
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="postnatal_sort_name" value="1">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Date Availed
                            <!-- SORT DATE AVAILED -->
                            <button type="submit" name="postnatal_sort_date_availed" value="2">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Sex
                            <!-- BUTTON FOR SEX -->
                            <button type="submit" name="postnatal_sort_sex" value="3">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Services Availed
                        </li>
                    </ul>
                </form>
                <!-- END OF SORT -->

                <!-- To be put in the loop -->
                <!-- Start Query -->
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
                    if (isset($_POST['postnatal_early_sort_name'])) {
                        $sort_id = $_POST['postnatal_sort_name'];
                        if ($sort_id == 1) {
                            $query = "SELECT * FROM postnatal WHERE archive_label='' ORDER BY firstname LIMIT $start_from, $num_per_page";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['postnatal_sort_date_availed'])) {
                        $sort_id = $_POST['postnatal_sort_date_availed'];
                        if ($sort_id == 2) {
                            $query = "SELECT * FROM postnatal WHERE archive_label='' ORDER BY postnatal_date LIMIT $start_from, $num_per_page";
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
                    foreach ($query_run as $patient) {
                        // CONVERT DATE TO MM-DD-YY
                        $postnatal_date = new DateTime($patient['postnatal_date']);
                        $new_postnatal_date = $postnatal_date->format("m-d-Y");
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['postnatal_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['firstname']; ?>&lname=<?= $patient['lastname']; ?>">
                                    <?= $patient['firstname'] . " " . $patient['lastname']; ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $new_postnatal_date; ?>
                            </li>
                            <li class="patient__sex">
                                <?= $patient['sex']; ?>
                            </li>
                            <li class="patient__availed-service">
                                <span class="patient__availed-service--postnatal"><?= $patient['label']; ?></span>
                                <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                            </li>
                            <li class="patient__option">
                                <button type="button" onclick="confirmArchive('postnatal' ,'<?= $patient['postnatal_id']; ?>' , '<?= $patient['firstname']; ?>' , '<?= $patient['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
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
                            <a href='patients.php?page_postnatal=<?php echo ($page - 1) ?>&postnatal' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page_postnatal=<?php echo $i; ?>&postnatal' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page_postnatal=<?php echo ($page + 1) ?>&postnatal' class="pagination_next">Next</a>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- END OF PAGINATION -->
                <?php
                }
                ?>
                <!--End of Query -->
            </div>
            <!-- End Tab for Post-Natal -->

            <!-- Start Tab for Search and Destroy -->
            <div class="patient__table" id="Search and Destroy">
                <!-- SORT QUERY -->
                <form action="" method="POST">
                    <ul class="patient__table__row patient__attributes" role="list">
                        <li class="patient__attributes__item">
                            Name
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="search_sort_name" value="1">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Date Availed
                            <!-- SORT DATE AVAILED -->
                            <button type="submit" name="search_sort_date_availed" value="2">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Sex
                            <!-- BUTTON FOR SEX -->
                            <button type="submit" name="search_sort_sex" value="3">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Services Availed
                        </li>
                    </ul>
                </form>
                <!-- END OF SORT -->

                <!-- To be put in the loop -->
                <!-- Start Query -->
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
                    if (isset($_POST['search_sort_date_availed'])) {
                        $sort_id = $_POST['search_sort_date_availed'];
                        if ($sort_id == 2) {
                            $query = "SELECT * FROM search_destroy WHERE archive_label='' ORDER BY search_destroy_date LIMIT $start_from, $num_per_page";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['search_sort_sex'])) {
                        $sort_id = $_POST['search_sort_sex'];
                        if ($sort_id == 3) {
                            $query = "SELECT * FROM search_destroy WHERE archive_label='' ORDER BY sex LIMIT $start_from, $num_per_page";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    foreach ($query_run as $patient) {
                        // CONVERT DATE TO MM-DD-YY
                        $sd_date = new DateTime($patient['date_visit']);
                        $new_sd_date = $sd_date->format("m-d-Y");
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['search_destroy_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['owner_fname']; ?>&lname=<?= $patient['owner_lname']; ?>">
                                    <?= $patient['owner_fname'] . ' ' . $patient['owner_lname'] ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $new_sd_date; ?>
                            </li>
                            <li class="patient__sex">
                                <?= $patient['sex']; ?>
                            </li>
                            <li class="patient__availed-service">
                                <span class="patient__availed-service--consultation"><?= $patient['label']; ?></span>
                                <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                            </li>
                            <li class="patient__option">
                                <button type="button" onclick="confirmArchive('search-destroy' ,'<?= $patient['search_destroy_id']; ?>' , '<?= $patient['owner_fname']; ?>' , '<?= $patient['owner_fname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    <?php
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
                            <a href='patients.php?page_searchdestroy=<?php echo ($page - 1) ?>&searchdestroy' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page_searchdestroy=<?php echo $i; ?>&searchdestroy' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page_searchdestroy=<?php echo ($page + 1) ?>&searchdestroy' class="pagination_next">Next</a>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- END OF PAGINATION -->

                <?php
                }
                ?>
                <!--End of Query -->
            </div>
            <!-- End Tab for Search and Destroy -->

            <!-- Start Tab for Early Childhood -->
            <div class="patient__table" id="Childhood Care">
                <!-- SORT QUERY -->
                <form action="" method="POST">
                    <ul class="patient__table__row patient__attributes" role="list">
                        <li class="patient__attributes__item">
                            Name
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="early_sort_name" value="1">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Date Availed
                            <!-- SORT DATE AVAILED -->
                            <button type="submit" name="early_sort_date_availed" value="2">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Sex
                            <!-- BUTTON FOR SEX -->
                            <button type="submit" name="early_sort_sex" value="3">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Services Availed
                        </li>
                    </ul>
                </form>
                <!-- END OF SORT -->

                <!-- To be put in the loop -->
                <!-- Start Query -->
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
                    if (isset($_POST['early_sort_name'])) {
                        $sort_id = $_POST['early_sort_name'];
                        if ($sort_id == 1) {
                            $query = "SELECT * FROM early_childhood WHERE archive_label='' ORDER BY child_fname LIMIT $start_from, $num_per_page";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['early_sort_date_availed'])) {
                        $sort_id = $_POST['early_sort_date_availed'];
                        if ($sort_id == 2) {
                            $query = "SELECT * FROM early_childhood WHERE archive_label='' ORDER BY early_childhood_date LIMIT $start_from, $num_per_page";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['early_sort_sex'])) {
                        $sort_id = $_POST['early_sort_sex'];
                        if ($sort_id == 3) {
                            $query = "SELECT * FROM early_childhood WHERE archive_label='' ORDER BY sex LIMIT $start_from, $num_per_page";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    foreach ($query_run as $patient) {
                        // CONVERT DATE TO MM-DD-YY
                        $ec_date = new DateTime($patient['early_childhood_date']);
                        $new_ec_date = $ec_date->format("m-d-Y");
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['early_childhood_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['child_fname']; ?>&lname=<?= $patient['child_lname']; ?>">
                                    <?= $patient['child_fname'] . ' ' . $patient['child_lname'] ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $new_ec_date; ?> <!--Date Registered-->
                            </li>
                            <li class="patient__sex">
                                <?= $patient['sex']; ?> <!--Patient Sex-->
                            </li>
                            <li class="patient__availed-service">
                                <span class="patient__availed-service--deworming"><?= $patient['label']; ?></span>
                                <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                            </li>
                            <li class="patient__option">
                                <button type="button" onclick="confirmArchive('early-childhood' ,'<?= $patient['early_childhood_id']; ?>' , '<?= $patient['child_fname']; ?>' , '<?= $patient['child_lname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
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
                            <a href='patients.php?page_earlychildhood=<?php echo ($page - 1) ?>&earlychildhood' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page_earlychildhood=<?php echo $i; ?>&earlychildhood' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page_earlychildhood=<?php echo ($page + 1) ?>&earlychildhood' class="pagination_next">Next</a>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- END OF PAGINATION -->

                <?php
                }
                ?>
                <!--End of Query -->
            </div>
            <!-- End Tab for Early Childhood -->

            <!-- Start Tab for Other Services -->
            <div class="patient__table" id="Other-service">
                <!-- SORT QUERY -->
                <form action="" method="POST">
                    <ul class="patient__table__row patient__attributes" role="list">
                        <li class="patient__attributes__item">
                            Name
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="other_name" value="1">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Date Availed
                            <!-- SORT DATE AVAILED -->
                            <button type="submit" name="other_date" value="2">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Sex
                            <!-- BUTTON FOR SEX -->
                            <button type="submit" name="other_sex" value="3">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="patient__attributes__item">
                            Services Availed
                        </li>
                    </ul>
                </form>
                <!-- END OF SORT -->

                <!-- To be put in the loop -->
                <!-- Start Query -->
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
                    if (isset($_POST['other_date'])) {
                        $sort_id = $_POST['other_date'];
                        if ($sort_id == 2) {
                            $query = "SELECT * FROM other_service WHERE archive_label='' ORDER BY service_date LIMIT $start_from, $num_per_page";
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
                    foreach ($query_run as $patient) {
                        // CONVERT DATE TO MM-DD-YY
                        $ec_date = new DateTime($patient['service_date']);
                        $new_ec_date = $ec_date->format("m-d-Y");
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['firstname']; ?>&lname=<?= $patient['lastname']; ?>">
                                    <?= $patient['firstname'] . ' ' . $patient['lastname'] ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $new_ec_date; ?> <!--Date Registered-->
                            </li>
                            <li class="patient__sex">
                                <?= $patient['sex']; ?> <!--Patient Sex-->
                            </li>
                            <li class="patient__availed-service">
                                <span class="patient__availed-service--deworming"><?= $patient['service_name']; ?></span>
                                <!-- <span class="patient__availed-service--prenatal">Prenatal</span> -->
                            </li>
                            <li class="patient__option">
                                <button type="button" onclick="confirmArchive('other-service' ,'<?= $patient['id']; ?>' , '<?= $patient['firstname']; ?>' , '<?= $patient['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
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
                            <a href='patients.php?page_other=<?php echo ($page - 1) ?>&otherservices' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page_other=<?php echo $i; ?>&otherservices' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page_other=<?php echo ($page + 1) ?>&otherservices' class="pagination_next">Next</a>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- END OF PAGINATION -->

                <?php
                }
                ?>
                <!--End of Query -->
            </div>
            <!-- End Tab for Early Childhood -->

        </section>
    </main>
    <script src="./js/app.js"></script>
    <?php
    if (isset($_POST['deworming_sort_name']) ||  isset($_POST['deworming_sort_sex']) || isset($_POST['deworming_sort_date_availed']) || isset($_GET['deworming'])) {
    ?>
        <script>
            servicesClick('services__list__item--deworming');
        </script>
    <?php
    }
    if (isset($_POST['consultation_sort_name']) || isset($_POST['consultation_sort_sex']) || isset($_POST['consultation_sort_date_availed']) || isset($_GET['consultation'])) {
    ?>
        <script>
            servicesClick('services__list__item--consultation');
        </script>
    <?php
    }
    if (isset($_POST['prenatal_sort_name']) || isset($_POST['prenatal_sort_sex']) || isset($_POST['prenatal_sort_date_availed']) || isset($_GET['prenatal'])) {
    ?>
        <script>
            servicesClick('services__list__item--prenatal');
        </script>
    <?php
    }
    if (isset($_POST['postnatal_sort_name']) || isset($_POST['postnatal_sort_sex']) || isset($_POST['postnatal_sort_date_availed']) || isset($_GET['postnatal'])) {
    ?>
        <script>
            servicesClick('services__list__item--postnatal');
        </script>
    <?php
    }
    if (isset($_POST['search_sort_name']) || isset($_POST['search_sort_status']) || isset($_POST['search_sort_sex']) || isset($_POST['search_sort_date_availed']) || isset($_GET['searchdestroy'])) {
    ?>
        <script>
            servicesClick('services__list__item--search');
        </script>
    <?php
    }
    if (isset($_POST['early_sort_name']) || isset($_POST['early_sort_date_availed']) || isset($_POST['early_sort_sex']) || isset($_POST['early_sort_date_availed']) || isset($_GET['earlychildhood'])) {
    ?>
        <script>
            servicesClick('services__list__item--childhood');
        </script>
    <?php
    }
    if (isset($_POST['other_name']) || isset($_POST['other_date']) || isset($_POST['other_sex']) || isset($_GET['otherservices'])) {
    ?>
        <script>
            servicesClick('services__list__item--other');
        </script>
    <?php
    }
    ?>

</body>

</html>