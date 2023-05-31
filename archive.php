<?php
session_start();
include 'includes/connection.php';
$position = $_SESSION['position'];
if (($position == 'Barangay Health Worker' || !isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
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

    <title>Archive | Brgy. Datu Esmael Patient Record System</title>
</head>

<body class="grid" id="grid">
    <?php
    include './includes/loader.php';
    include './includes/sidebar/archive.php';
    include './includes/navbar/archive.php'
    ?>






    <!-- Contents -->
    <main class="backup ">
        <!-- TABS event initialization-->
        <div class="services">
            <ul role="list" class="services__list">
                <?php
                $query = "SELECT * FROM deworming WHERE archive_label = 'archived'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) == 0) {
                    $serviceRow = 0;
                } else {
                    $serviceRow = 1;
                }
                ?>
                <li class="services__list__item" id='services__list__item--deworming' onclick="services(event, 'Deworming' , '<?= $serviceRow ?>' , 'backup')">
                    <!-- START DEWORMING COUNT -->
                    <?php
                    $query = "SELECT count(*) FROM deworming WHERE archive_label='archived'";
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
                $query = "SELECT * FROM consultation WHERE archive_label = 'archived'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) == 0) {
                    $serviceRow = 0;
                } else {
                    $serviceRow = 1;
                }
                ?>
                <li class="services__list__item" id='services__list__item--consultation' onclick="services(event, 'Consultation', '<?= $serviceRow ?>' , 'backup')">
                    <!-- START CONSULTATION COUNT -->
                    <?php
                    $query = "SELECT count(*) FROM consultation WHERE archive_label='archived'";
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
                $query = "SELECT * FROM prenatal WHERE archive_label = 'archived'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) == 0) {
                    $serviceRow = 0;
                } else {
                    $serviceRow = 1;
                }
                ?>
                <li class="services__list__item" id='services__list__item--prenatal' onclick="services(event, 'Pre-Natal' , '<?= $serviceRow ?>' , 'backup')">
                    <!-- START PRENATAL COUNT -->
                    <?php
                    $query = "SELECT count(*) FROM prenatal WHERE archive_label='archived'";
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
                $query = "SELECT * FROM postnatal WHERE archive_label = 'archived'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) == 0) {
                    $serviceRow = 0;
                } else {
                    $serviceRow = 1;
                }
                ?>
                <li class="services__list__item" id='services__list__item--postnatal' onclick="services(event, 'Post-Natal' , '<?= $serviceRow ?>' , 'backup')">
                    <!-- START POSTNATAL COUNT -->
                    <?php
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label='archived'";
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
                $query = "SELECT * FROM search_destroy WHERE archive_label = 'archived'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) == 0) {
                    $serviceRow = 0;
                } else {
                    $serviceRow = 1;
                }
                ?>
                <li class="services__list__item" id='services__list__item--search' onclick="services(event, 'Search-and-Destroy' , '<?= $serviceRow ?>' , 'backup')">
                    <!-- START SEARCH DESTROY COUNT -->
                    <?php
                    $query = "SELECT count(*) FROM search_destroy WHERE archive_label='archived'";
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
                $query = "SELECT * FROM early_childhood WHERE archive_label = 'archived'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) == 0) {
                    $serviceRow = 0;
                } else {
                    $serviceRow = 1;
                }
                ?>
                <li class="services__list__item" id='services__list__item--childhood' onclick="services(event, 'Childhood-Care' , '<?= $serviceRow ?>' , 'backup')">
                    <!-- START CHILDHOOD CARE COUNT -->
                    <?php
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='archived'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        Childhood Care (<?php echo $row['count(*)']; ?>)
                    <?php
                    }
                    ?>
                    <!-- END -->
                </li>
                <li class="services__list__item" id='services__list__item--other' onclick="services(event, 'Other-service' , '<?= $serviceRow ?>' , 'backup')">
                    <!-- START CHILDHOOD CARE COUNT -->
                    <?php
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='archived'";
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

            <hr class="services__list--hr">
        </div>

        <select name="" id="" class="services__list--mobile" onchange="servicesClick(value);">
            <option selected>Select a service</option>
            <option value="services__list__item--deworming">Deworming</option>
            <option value="services__list__item--consultation">Consultation</option>
            <option value="services__list__item--prenatal">Prenatal</option>
            <option value="services__list__item--postnatal">Postnatal</option>
            <option value="services__list__item--childhood">Early childhood Care</option>
            <option value="services__list__item--search">Search and destroy</option>
        </select>

        <!-- end of TABS event initialization -->

        <!-- DEWORMING SECTION -->
        <div class="backup__table" id="Deworming">
            <!-- SORT QUERY -->
            <form action="" method="POST">
                <ul class="backup__table__row backup__attributes" role="list">
                    <li class="backup__attributes__item">
                        Name
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="deworming_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Contact No.
                        <!-- BUTTON FOR CONTACT -->
                        <button type="submit" name="deworming_sort_contact" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Sex
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="deworming_sort_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE -->
                        <button type="submit" name="deworming_sort_date" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Status
                    </li>
                    <li class="backup__attributes__item"></li>
                </ul>
            </form>
            <!-- END OF SORT -->

            <!-- To be put in the loop -->
            <?php
            $query = "SELECT * FROM deworming WHERE archive_label = 'archived'";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['deworming_sort_name'])) {
                    $sort_id = $_POST['deworming_sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM deworming WHERE archive_label = 'archived' ORDER BY firstname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['deworming_sort_contact'])) {
                    $sort_id = $_POST['deworming_sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM deworming WHERE archive_label = 'archived' ORDER BY phone_num";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['deworming_sort_sex'])) {
                    $sort_id = $_POST['deworming_sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM deworming WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['deworming_sort_date'])) {
                    $sort_id = $_POST['deworming_sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM deworming  WHERE archive_label = 'archived' ORDER BY deworming_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
                    // CONVERT DATE TO MM-DD-YY
                    $deworm_date = new DateTime($archive['deworming_date']);
                    $new_deworm_date = $deworm_date->format("m-d-Y");
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['firstname'] . ' ' . $archive['lastname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_num']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $new_deworm_date; ?>
                        </li>
                        <li class="backup__status">
                            <span class="backup__status--deleted">Archived</span>
                            <!-- <span class="backup__status--available">Available</span> -->
                        </li>
                        <form action="includes/delete_query.php" method="POST">
                            <li class="backup__option">
                                <!-- RESTORE BUTTON -->
                                <button type="button" name="restore_consultation" onclick="confirmRestore('deworming' ,'<?= $archive['deworming_id']; ?>' , '<?= $archive['firstname']; ?>' , '<?= $archive['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                    </svg>
                                </button>
                                <!-- DELETE BUTTON -->
                                <button type="button" name="delete_deworming" onclick="confirmDelete('deworming' , '<?= $archive['deworming_id']; ?>', '<?= $archive['firstname']; ?>' , '<?= $archive['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='delete-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z" />
                                    </svg>
                                </button>
                            </li>
                    </ul>
            <?php
                }
            }
            ?>
        </div>

        <!-- CONSULTATION SECTION -->
        <div class="backup__table" id="Consultation">
            <!-- SORT QUERY -->
            <form action="" method="POST">
                <ul class="backup__table__row backup__attributes" role="list">
                    <li class="backup__attributes__item">
                        Name
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="consultation_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Contact No.
                        <!-- BUTTON FOR CONTACT -->
                        <button type="submit" name="consultation_sort_contact" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Sex
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="consultation_sort_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE -->
                        <button type="submit" name="consultation_sort_date" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Status
                    </li>
                    <li class="backup__attributes__item"></li>
                </ul>
            </form>
            <!-- END OF SORT -->

            <!-- To be put in the loop -->
            <?php
            $query = "SELECT * FROM consultation WHERE archive_label = 'archived'";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['consultation_sort_name'])) {
                    $sort_id = $_POST['consultation_sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM consultation WHERE archive_label = 'archived' ORDER BY firstname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['consultation_sort_contact'])) {
                    $sort_id = $_POST['consultation_sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM consultation WHERE archive_label = 'archived' ORDER BY phone_number";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['consultation_sort_sex'])) {
                    $sort_id = $_POST['consultation_sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM consultation WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['consultation_sort_date'])) {
                    $sort_id = $_POST['consultation_sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM consultation  WHERE archive_label = 'archived' ORDER BY consultation_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
                    // CONVERT DATE TO MM-DD-YY
                    $consul_date = new DateTime($archive['consultation_date']);
                    $new_consul_date = $consul_date->format("m-d-Y");
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['firstname'] . ' ' . $archive['lastname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_number']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $new_consul_date; ?>
                        </li>

                        <li class="backup__status">
                            <span class="backup__status--deleted">Archived</span>
                            <!-- <span class="backup__status--available">Available</span> -->
                        </li>

                        <li class="backup__option">
                            <!-- RESTORE BUTTON -->
                            <button type="submit" name="restore_consultation" onclick="confirmRestore('consultation' ,'<?= $archive['consultation_id']; ?>' , '<?= $archive['firstname']; ?>' , '<?= $archive['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                </svg>
                            </button>
                            <!-- DELETE BUTTON -->
                            <button type="button" name="delete_consultation" onclick="confirmDelete('consultation' , '<?= $archive['consultation_id']; ?>', '<?= $archive['firstname']; ?>' , '<?= $archive['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='delete-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
            <?php
                }
            }
            ?>
        </div>

        <!-- PRENATAL SECTION -->
        <div class="backup__table" id="Pre-Natal">
            <!-- SORT QUERY -->
            <form action="" method="POST">
                <ul class="backup__table__row backup__attributes" role="list">
                    <li class="backup__attributes__item">
                        Name
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="prenatal_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Contact No.
                        <!-- BUTTON FOR CONTACT -->
                        <button type="submit" name="prenatal_sort_contact" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Sex
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="prenatal_sort_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE -->
                        <button type="submit" name="prenatal_sort_date" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Status
                    </li>
                    <li class="backup__attributes__item"></li>
                </ul>
            </form>
            <!-- END OF SORT -->

            <!-- To be put in the loop -->
            <?php
            $query = "SELECT * FROM prenatal WHERE archive_label = 'archived'";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['prenatal_sort_name'])) {
                    $sort_id = $_POST['prenatal_sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM prenatal WHERE archive_label = 'archived' ORDER BY firstname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['prenatal_sort_contact'])) {
                    $sort_id = $_POST['prenatal_sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM prenatal WHERE archive_label = 'archived' ORDER BY phone_num";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['prenatal_sort_sex'])) {
                    $sort_id = $_POST['prenatal_sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM prenatal WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['prenatal_sort_date'])) {
                    $sort_id = $_POST['prenatal_sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM prenatal  WHERE archive_label = 'archived' ORDER BY prenatal_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
                    // CONVERT DATE TO MM-DD-YY
                    $prenatal_date = new DateTime($archive['prenatal_date']);
                    $new_prenatal_date = $prenatal_date->format("m-d-Y");
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['firstname'] . ' ' . $archive['lastname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_num']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $new_prenatal_date; ?>
                        </li>

                        <li class="backup__status">
                            <span class="backup__status--deleted">Archived</span>
                            <!-- <span class="backup__status--available">Available</span> -->
                        </li>
                        <li class="backup__option">
                            <!-- RESTORE BUTTON -->
                            <button type="button" name="restore_consultation" onclick="confirmRestore('prenatal' ,'<?= $archive['prenatal_id']; ?>' , '<?= $archive['firstname']; ?>' , '<?= $archive['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                </svg>
                            </button>
                            <!-- DELETE BUTTON -->
                            <button type="button" name="delete_prenatal" onclick="confirmDelete('prenatal' , '<?= $archive['prenatal_id']; ?>', '<?= $archive['firstname']; ?>' , '<?= $archive['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='delete-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
            <?php
                }
            }
            ?>
        </div>

        <!-- POSTNATAL SECTION -->
        <div class="backup__table" id="Post-Natal">
            <!-- SORT QUERY -->
            <form action="" method="POST">
                <ul class="backup__table__row backup__attributes" role="list">
                    <li class="backup__attributes__item">
                        Name
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="postnatal_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Contact No.
                        <!-- BUTTON FOR CONTACT -->
                        <button type="submit" name="postnatal_sort_contact" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Sex
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="postnatal_sort_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE -->
                        <button type="submit" name="postnatal_sort_date" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Status
                    </li>
                    <li class="backup__attributes__item"></li>
                </ul>

                <!-- To be put in the loop -->
                <?php
                $query = "SELECT * FROM postnatal WHERE archive_label = 'archived'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    if (isset($_POST['postnatal_sort_name'])) {
                        $sort_id = $_POST['postnatal_sort_name'];
                        if ($sort_id == 1) {
                            $query = "SELECT * FROM postnatal WHERE archive_label = 'archived' ORDER BY firstname";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['postnatal_sort_contact'])) {
                        $sort_id = $_POST['postnatal_sort_contact'];
                        if ($sort_id == 2) {
                            $query = "SELECT * FROM postnatal WHERE archive_label = 'archived' ORDER BY phone_num";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['postnatal_sort_sex'])) {
                        $sort_id = $_POST['postnatal_sort_sex'];
                        if ($sort_id == 3) {
                            $query = "SELECT * FROM postnatal WHERE archive_label = 'archived' ORDER BY sex";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['postnatal_sort_date'])) {
                        $sort_id = $_POST['postnatal_sort_date'];
                        if ($sort_id == 4) {
                            $query = "SELECT * FROM postnatal  WHERE archive_label = 'archived' ORDER BY postnatal_date";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    foreach ($query_run as $archive) {
                        // CONVERT DATE TO MM-DD-YY
                        $postnatal_date = new DateTime($archive['postnatal_date']);
                        $new_postnatal_date = $postnatal_date->format("m-d-Y");
                ?>
                        <ul class="backup__table__row backup__info" role="list">
                            <li class="backup__name p-bold">
                                <?= $archive['firstname'] . ' ' . $archive['lastname']; ?>
                            </li>
                            <li class="backup__num">
                                <?= $archive['phone_num']; ?>
                            </li>
                            <li class="backup__sex">
                                <?= $archive['sex']; ?>
                            </li>
                            <li class="backup__date--availed">
                                <?= $new_postnatal_date; ?>
                            </li>

                            <li class="backup__status">
                                <span class="backup__status--deleted">Archived</span>
                                <!-- <span class="backup__status--available">Available</span> -->
                            </li>
                            <li class="backup__option">
                                <!-- RESTORE BUTTON -->
                                <button type="button" onclick="confirmRestore('postnatal' ,'<?= $archive['postnatal_id']; ?>' , '<?= $archive['firstname']; ?>' , '<?= $archive['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                    </svg>
                                </button>
                                <!-- DELETE BUTTON -->
                                <button type="button" name="delete_postnatal" onclick="confirmDelete('postnatal' , '<?= $archive['postnatal_id']; ?>', '<?= $archive['firstname']; ?>' , '<?= $archive['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                    <svg class='delete-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z" />
                                    </svg>
                                </button>
                            </li>
                        </ul>
                <?php
                    }
                }
                ?>
        </div>

        <!-- SEARCH AND DESTROY SECTION -->
        <div class="backup__table" id="Search-and-Destroy">
            <!-- SORT QUERY -->
            <form action="" method="POST">
                <ul class="backup__table__row backup__attributes" role="list">
                    <li class="backup__attributes__item">
                        Name
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="search_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Contact No.
                        <!-- BUTTON FOR CONTACT -->
                        <button type="submit" name="search_sort_contact" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Sex
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="search_sort_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE -->
                        <button type="submit" name="search_sort_date" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Status
                    </li>
                    <li class="backup__attributes__item"></li>
                </ul>
            </form>
            <!-- END OF SORT -->

            <!-- To be put in the loop -->
            <?php
            $query = "SELECT * FROM search_destroy WHERE archive_label = 'archived'";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['search_sort_name'])) {
                    $sort_id = $_POST['search_sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label = 'archived' ORDER BY owner_fname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['search_sort_contact'])) {
                    $sort_id = $_POST['search_sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label = 'archived' ORDER BY phone_num";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['search_sort_sex'])) {
                    $sort_id = $_POST['search_sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['search_sort_date'])) {
                    $sort_id = $_POST['search_sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM search_destroy  WHERE archive_label = 'archived' ORDER BY search_destroy_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
                    // CONVERT DATE TO MM-DD-YY
                    $sd_date = new DateTime($archive['date_visit']);
                    $new_sd_date = $sd_date->format("m-d-Y");
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['owner_fname'] . ' ' . $archive['owner_lname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_num']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $new_sd_date; ?>
                        </li>

                        <li class="backup__status">
                            <span class="backup__status--deleted">Archived</span>
                            <!-- <span class="backup__status--available">Available</span> -->
                        </li>
                        <li class="backup__option">
                            <!-- RESTORE BUTTON -->
                            <button type="button" onclick="confirmRestore('search-destroy' ,'<?= $archive['search_destroy_id']; ?>' , '<?= $archive['owner_fname']; ?>' , '<?= $archive['owner_fname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                </svg>
                            </button>
                            <!-- DELETE BUTTON -->
                            <button type="button" name="delete_search-destroy" onclick="confirmDelete('search_destroy' , '<?= $archive['search_destroy_id']; ?>', '<?= $archive['owner_fname']; ?>' , '<?= $archive['owner_lname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='delete-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
            <?php
                }
            }
            ?>
        </div>

        <!-- EARLY CHILDHOOD SECTION -->
        <div class="backup__table" id="Childhood-Care">
            <!-- SORT QUERY -->
            <form action="" method="POST">
                <ul class="backup__table__row backup__attributes" role="list">
                    <li class="backup__attributes__item">
                        Name
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="early_sort_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Contact No.
                        <!-- BUTTON FOR CONTACT -->
                        <button type="submit" name="early_sort_contact" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Sex
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="early_sort_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE -->
                        <button type="submit" name="early_sort_date" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Status
                    </li>
                    <li class="backup__attributes__item"></li>
                </ul>
            </form>
            <!-- END OF SORT -->

            <!-- To be put in the loop -->
            <?php
            $query = "SELECT * FROM early_childhood WHERE archive_label = 'archived'";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['early_sort_name'])) {
                    $sort_id = $_POST['early_sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label = 'archived' ORDER BY child_fname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['early_sort_contact'])) {
                    $sort_id = $_POST['early_sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label = 'archived' ORDER BY phone_num";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['early_sort_sex'])) {
                    $sort_id = $_POST['early_sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['early_sort_date'])) {
                    $sort_id = $_POST['early_sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM early_childhood  WHERE archive_label = 'archived' ORDER BY early_childhood_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
                    // CONVERT DATE TO MM-DD-YY
                    $ec_date = new DateTime($archive['early_childhood_date']);
                    $new_ec_date = $ec_date->format("m-d-Y");
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['child_fname'] . ' ' . $archive['child_lname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_num']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $new_ec_date; ?>
                        </li>

                        <li class="backup__status">
                            <span class="backup__status--deleted">Archived</span>
                            <!-- <span class="backup__status--available">Available</span> -->
                        </li>
                        <li class="backup__option">
                            <!-- RESTORE BUTTON -->
                            <button type="button" onclick="confirmRestore('early-childhood' ,'<?= $archive['early_childhood_id']; ?>' , '<?= $archive['child_fname']; ?>' , '<?= $archive['child_lname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                </svg>
                            </button>
                            <!-- DELETE BUTTON -->
                            <button type="button" name="delete_early-childhood" onclick="confirmDelete('early_childhood' , '<?= $archive['early_childhood_id']; ?>', '<?= $archive['child_fname']; ?>' , '<?= $archive['child_lname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='delete-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
            <?php
                }
            }
            ?>
        </div>

        <!-- OTHER SERVICE SECTION -->
        <div class="backup__table" id="Other-service">
            <!-- SORT QUERY -->
            <form action="" method="POST">
                <ul class="backup__table__row backup__attributes" role="list">
                    <li class="backup__attributes__item">
                        Name
                        <!-- BUTTON FOR NAME -->
                        <button type="submit" name="other_name" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Service
                        <!-- BUTTON FOR CONTACT -->
                        <button type="submit" name="other_service" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Sex
                        <!-- BUTTON FOR SEX -->
                        <button type="submit" name="other_sex" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Date Availed
                        <!-- BUTTON FOR DATE -->
                        <button type="submit" name="other_date" value="4">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <li class="backup__attributes__item">
                        Status
                    </li>
                    <li class="backup__attributes__item"></li>
                </ul>
            </form>
            <!-- END OF SORT -->

            <!-- To be put in the loop -->
            <?php
            $query = "SELECT * FROM other_service WHERE archive_label = 'archived'";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['other_name'])) {
                    $sort_id = $_POST['other_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM other_service WHERE archive_label = 'archived' ORDER BY firstname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['other_service'])) {
                    $sort_id = $_POST['other_service'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM other_service WHERE archive_label = 'archived' ORDER BY service_name";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['other_sex'])) {
                    $sort_id = $_POST['other_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM other_service WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['other_date'])) {
                    $sort_id = $_POST['other_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM other_service  WHERE archive_label = 'archived' ORDER BY service_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
                    // CONVERT DATE TO MM-DD-YY
                    $ec_date = new DateTime($archive['service_date']);
                    $new_ec_date = $ec_date->format("m-d-Y");
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['firstname'] . ' ' . $archive['lastname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['service_name']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $new_ec_date; ?>
                        </li>

                        <li class="backup__status">
                            <span class="backup__status--deleted">Archived</span>
                            <!-- <span class="backup__status--available">Available</span> -->
                        </li>
                        <li class="backup__option">
                            <!-- RESTORE BUTTON -->
                            <button type="button" onclick="confirmRestore('other-service' ,'<?= $archive['id']; ?>' , '<?= $archive['firstname']; ?>' , '<?= $archive['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                </svg>
                            </button>
                            <!-- DELETE BUTTON -->
                            <button type="button" name="delete_other" onclick="confirmDelete('other-service' , '<?= $archive['id']; ?>', '<?= $archive['firstname']; ?>' , '<?= $archive['lastname']; ?>' , '<?= $user['firstname']; ?>' , '<?= $user['lastname']; ?>' , '<?= $user['position']; ?>')">
                                <svg class='delete-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
            <?php
                }
            }
            ?>
        </div>
    </main>
    <script src="./js/app.js"></script>
    <?php
    if (isset($_GET['deleted'])) { ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'success',
                iconColor: 'white',
                title: 'Deleted successfully',
                customClass: {
                    popup: 'toast'
                },
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            })
        </script>
    <?php
    }
    if (isset($_POST['deworming_sort_name']) || isset($_POST['deworming_sort_contact']) || isset($_POST['deworming_sort_sex']) || isset($_POST['deworming_sort_date'])) {
    ?>
        <script>
            servicesClick('services__list__item--deworming');
        </script>
    <?php
    }
    if (isset($_POST['consultation_sort_name']) || isset($_POST['consultation_sort_contact']) || isset($_POST['consultation_sort_sex']) || isset($_POST['consultation_sort_date'])) {
    ?>
        <script>
            servicesClick('services__list__item--consultation');
        </script>
    <?php
    }
    if (isset($_POST['prenatal_sort_name']) || isset($_POST['prenatal_sort_contact']) || isset($_POST['prenatal_sort_sex']) || isset($_POST['prenatal_sort_date'])) {
    ?>
        <script>
            servicesClick('services__list__item--prenatal');
        </script>
    <?php
    }
    if (isset($_POST['postnatal_sort_name']) || isset($_POST['postnatal_sort_contact']) || isset($_POST['postnatal_sort_sex']) || isset($_POST['postnatal_sort_date'])) {
    ?>
        <script>
            servicesClick('services__list__item--postnatal');
        </script>
    <?php
    }
    if (isset($_POST['search_sort_name']) || isset($_POST['search_sort_status']) || isset($_POST['search_sort_contact']) || isset($_POST['search_sort_date']) || isset($_POST['search_sort_sex'])) {
    ?>
        <script>
            servicesClick('services__list__item--search');
        </script>
    <?php
    }
    if (isset($_POST['early_sort_name']) || isset($_POST['early_sort_contact']) || isset($_POST['early_sort_age']) || isset($_POST['early_sort_date']) || isset($_POST['early_sort_sex'])) {
    ?>
        <script>
            servicesClick('services__list__item--childhood');
        </script>
    <?php
    }
    if (isset($_POST['other_name']) || isset($_POST['other_service']) || isset($_POST['other_sex']) || isset($_POST['other_date'])) {
    ?>
        <script>
            servicesClick('services__list__item--other');
        </script>
    <?php
    }
    ?>

</body>

</html>