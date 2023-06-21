<?php
session_start();
include 'includes/connection.php';
if ((!isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
    header("Location: index.php?error=You are not logged in"); /*Redirect to this page if successful*/
    exit();
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

    <title>Recent Update | Brgy. Datu Esmael Patient Record System</title>
</head>

<body class="grid" id="grid">
    <?php
    include './includes/loader.php';
    include './includes/sidebar/dashboard.php';
    include './includes/navbar/recent-update.php'
    ?>

    <!-- Contents -->
    <main class="recent-update">

        <div class="recent-update__legend--container">
            <div class="recent-update__legend" id="legend">
                <h3 class="recent-update__legend__title">Roles legend:</h3>
                <div class="recent-update__legend__item">
                    <p class="legend__title">City Health Nurse</p>
                    <span class="legend__chn"> CHN </span>
                </div>
                <div class="recent-update__legend__item">
                    <p class="legend__title">Barangay Health Worker</p>
                    <span class="legend__bhw"> BHW </span>
                </div>
            </div>
        </div>
        <div class="recent-update__table">
            <form action="" method="POST">
                <ul class="recent-update__table__row recent-update__attributes" role="list">
                    <li class="recent-update__attributes__item">
                        Details
                        <button type="submit" name="sort_details" value="1">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    <li class="recent-update__attributes__item">
                        Reason
                        <button type="submit" name="sort_reason" value="2">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                    <!-- <li class="recent-update__attributes__item">
                        Other Reason
                    <button type="submit" name="sort_name" value="1">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z"/></svg>
                    </button>
                    </li> -->
                    <li class="recent-update__attributes__item">
                        Role
                        <button type="submit" name="sort_role" value="3">
                            <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                            </svg>
                        </button>
                    </li>
                </ul>
            </form>
            <!-- End of Form Action -->
            <!-- Start Query for sort-->
            <?php
            $query = "SELECT * FROM recent_activity ORDER BY date_edit DESC, time_edit DESC";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['sort_details'])) {
                    $sort_id = $_POST['sort_details'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM recent_activity ORDER BY date_edit DESC, time_edit DESC";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_reason'])) {
                    $sort_id = $_POST['sort_reason'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM recent_activity ORDER BY reasons";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_role'])) {
                    $sort_id = $_POST['sort_role'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM recent_activity ORDER BY user_role";
                        $query_run = mysqli_query($conn, $query);
                    }
                }

                foreach ($query_run as $update) {
            ?>
                    <!-- To be put in the loop -->
                    <ul class="recent-update__table__row recent-update__info" role="list">
                        <?php
                        // QUERY TO CHANGE CLASS COLOR BASED ON THE CHANGES LABEL
                        if ($update['changes_label'] == 'added') {
                            $class_name = 'update-activity update-activity--archived';
                        }
                        if ($update['changes_label'] == 'edited') {
                            $class_name = 'update-activity update-activity--edited';
                        }
                        if ($update['changes_label'] == 'deleted') {
                            $class_name = 'update-activity update-activity--delete';
                        }
                        // CONDITION FOR RECORD NAME
                        if ($update['record_name'] == 'Deworming') {
                            $class_record_name = 'service service--deworming';
                        }
                        if ($update['record_name'] == 'Consultation') {
                            $class_record_name = 'service service--childhood'; //no designated color for consultation
                        }
                        if ($update['record_name'] == 'Prenatal') {
                            $class_record_name = 'service service--prenatal';
                        }
                        if ($update['record_name'] == 'Postnatal') {
                            $class_record_name = 'service service--postnatal';
                        }
                        if ($update['record_name'] == 'Search/Destroy') {
                            $class_record_name = 'service service--search';
                        }
                        if ($update['record_name'] == 'Childhood Care') {
                            $class_record_name = 'service service--childhood';
                        }
                        // CONDITION FOR ROLE NAME
                        if ($update['user_role'] == 'Barangay Health Worker') {
                            $class_role = 'role role--bhw';
                            $display_role = 'BHW';
                        }
                        if ($update['user_role'] == 'City Health Nurse') {
                            $class_role = 'role role--chn';
                            $display_role = 'CHN';
                        }
                        if ($update['user_role'] == 'Admin') {
                            $class_role = 'role role--admin';
                            $display_role = 'Admin';
                        }
                        // END OF QUERY

                        // CONVERT DATE TO MM-DD-YY
                        $date = new DateTime($update['date_edit']);
                        $new_date = $date->format("m-d-Y");

                        // CONVERT SERVER TIME ZONE TO PHILIPPINE TIMEZONE 12H FORMAT
                        $time = new DateTime($update['time_edit']);
                        $time->setTimezone(new DateTimeZone("Asia/Manila"));
                        $philippine_time = $time->format("g:i A");


                        ?>
                        <li class="recent-update__details">
                            <span class="name"> <?= $update['user_fname'] . ' ' . $update['user_lname']; ?> </span> <span class="<?= $class_name; ?>"> <?= $update['changes_label']; ?> </span> <span class="edit-patient"> <?= $update['patient_fname'] . ' ' . $update['patient_lname']; ?> </span> <span class="<?= $class_record_name; ?>"> <?= $update['record_name']; ?> </span> record in <span class="edit-time"> <?= $new_date . ' ' . $philippine_time; ?> </span>
                        </li>
                        <li class="recent-update__attributes__item">
                            <?= $update['reasons']; ?>
                        </li>
                        <!-- <li class="recent-update__attributes__item">
                        Other Reason
                    </li> -->
                        <li class="recent-update__role">
                            <a href="#legend"> <span class="<?= $class_role; ?>"><?= $display_role; ?> </span>
                            </a>
                            <!-- <span class="recent-update__status--available">Available</span> -->
                        </li>
                    </ul>
            <?php
                }
            }
            ?>
        </div>
        </section>
    </main>
    <script src="./js/app.js"></script>

</body>

</html>