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
    <!-- Title Tab Query -->
    <?php
    $query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
    ?>
            <title><?= $user['firstname'] . ' ' . $user['lastname']; ?> | Brgy. Datu Esmael Patient Record System</title>
    <?php
        }
    } else {
        echo "<h5> No Record Found </h5>";
    }
    ?>
    <!-- End of Query -->
</head>

<body class="grid" id="grid">
    <?php
    include './includes/loader.php';
    include './includes/sidebar/user-profile.php';
    include './includes/navbar/user-profile.php'
    ?>


    <!-- Contents -->
    <main class="user-profile">
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="user-profile__title">
            Profile
        </h2>
        <section class="user-profile__card">
            <?php
            include 'includes/connection.php'; //changed
            $query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $user) {
                    // CONVERT DATE TO MM-DD-YY
                    $added_date = new DateTime($user['date_registered']);
                    $new_added_date = $added_date->format("m-d-Y");

                    $user_bdate = new DateTime($user['birthday']);
                    $new_user_bdate = $user_bdate->format("m-d-Y");
            ?>
                    <ul class="user-profile__list" role="list">
                        <!-- photo, name, user-id, contact number -->
                        <ul class="user-profile__item user-profile__list--center" role="list">
                            <li class="user-profile__img">
                                <img class="" src="./assets/img/patient-profile.svg" alt="Profile">
                            </li>
                            <li class="user-profile__id user-profile__category">
                                #<?= $user['account_id']; ?>
                            </li>
                            <li class="user-profile__name h5">
                                <?= $user['firstname'] . ' ' . $user['lastname']; ?>
                            </li>
                            <li class="user-profile__contact">
                                <?= $user['phone_num']; ?>
                            </li>
                        </ul>

                        <ul class="user-profile__item " role="list">
                            <li class="user-profile__sex">
                                <span class="user-profile__category">Sex</span>
                                <?= $user['sex']; ?>
                            </li>
                            <li class="user-profile__last-date-added">
                                <span class="user-profile__category">Date Added</span>
                                <?= $new_added_date; ?>
                            </li>
                            <li class="user-profile__last-modified">
                                <span class="user-profile__category">Birthday</span>
                                <?= $new_user_bdate; ?>
                            </li>
                        </ul>
                        <ul class="user-profile__item" role="list">
                            <li class="user-profile__street">
                                <span class="user-profile__category">Street Address</span>
                                <?= $user['street_add']; ?>
                            </li>
                            <li class="user-profile__last-city">
                                <span class="user-profile__category">City</span>
                                <?= $user['city']; ?>
                            </li>
                            <li class="user-profile__barangay">
                                <span class="user-profile__category">Barangay</span>
                                <?= $user['barangay']; ?>
                            </li>
                        </ul>
                        <ul class="user-profile__item__btn" role="list">
                            <!-- Buttons -->
                            <li class="user-profile__btn">
                                <button type="submit" class="btn-green btn-save" onclick="window.location.href = 'edit-record.php?bhw&id=<?= $user['account_id']; ?>'">
                                    <span>
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"><path d="M6 34.5V42h7.5l22.13-22.13-7.5-7.5L6 34.5zm35.41-20.41c.78-.78.78-2.05 0-2.83l-4.67-4.67c-.78-.78-2.05-.78-2.83 0l-3.66 3.66 7.5 7.5 3.66-3.66z"/><path fill="none" d="M0 0h48v48H0z"/></svg> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                            <defs>
                                                <clipPath id="a">
                                                    <rect width="64" height="64" />
                                                </clipPath>
                                            </defs>
                                            <g clip-path="url(#a)">
                                                <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                            </g>
                                        </svg>
                                    </span>
                                    <p>Edit</p>
                                </button>
                            </li>
                        </ul>
                <?php
                }
            } else {
                echo "<h5> No Record Found </h5>";
            }
                ?>
                <!-- End of Query -->
                    </ul>
        </section>




        <hr>
        <section class="user-profile__backup">
            <h2 class="user-profile__title">
                Backup
            </h2>
            <p class="user-profile__desc">
                You can restore backup records here
            </p>

            <form action="includes/functions.php" method="POST">
                <div class="user-profile__backup__form">
                    <label for="patient-password">
                        <p class="backup-title">Upload</p>
                        Click the button to download in your local file the backup of the database system.
                    </label>
                    <div class="btn-section">
                        <div class="input-file-container">
                            <label tabindex="0" for="my-file" class="input-file-trigger">Select a file...</label>
                            <input class="input-file" id="my-file" type="file" accept=".sql" name='filename'>
                        </div>
                        <p class="file-return"></p>
                    </div>
                </div>
                <div class="user-profile__backup__form">
                    <label for="patient-password">
                        <p class="backup-title">Restore</p>
                        Upload only sql file that you backup and then click the "Restore" button to restore all the record in the database system.
                    </label>
                    <button type="submit" class="btn-green btn-change btn-restore" name="restore_database" onclick="return  confirm('Do you want to restore the backup record?')">
                        <p>Restore</p>
                    </button>
                </div>
                <div class="user-profile__backup__form">
                    <label for="patient-password">
                        <p class="backup-title">Backup</p>
                        Click the button to download in you're local file the backup of the database system.
                    </label>
                    <button type="submit" class="btn-green btn-change btn-restore" name="backup_database" onclick="return  confirm('Do you want to create a backup?')">
                        <p>Backup</p>
                    </button>
                </div>
                <div class="user-profile__backup__form">
                    <label for="patient-password">
                        <p class="backup-title">CSV</p>
                        Choose what information to download first and then click the CSV button to download the file in you're local computer.
                    </label>
                    <div class="user-profile__columns">
                        <select name="csv_record" id="report__service" class="csv__services" required>
                            <option selected disabled>Select a service</option>
                            <option value="all"> All </option>
                            <option value="deworming"> Deworming </option>
                            <option value="consultation"> Consultation </option>
                            <option value="prenatal"> Pre-natal </option>
                            <option value="postnatal"> Post-natal </option>
                            <option value="search_destroy"> Search and Destroy </option>
                            <option value="early_childhood"> Childhood Care </option>
                            <option value="target_maternal"> Target Maternal Care </option>
                            <option value="target_childcare_male"> Target Childcare Male </option>
                            <option value="target_childcare_female"> Target Childcare Female </option>
                        </select>
                        <button type="submit" class="btn-green btn-change btn-restore" name="csv_database" onclick="return  confirm('Do you want to create a backup?')">
                            <p>Download</p>
                        </button>
                    </div>
                </div>
                </div>
                <div class="reports__input">
            </form>
        </section>

        <hr>
        <section class="bhw-account">
            <h2 class="bhw-profile__title">
                BHW
            </h2>
            <p class="bhw-profile__desc">
                Barangay Health Workers Current Credentials
            </p>
            <!-- <button type="submit" class="btn-green btn-add">
                <p>Add New</p>
            </button> -->

            <div class="bhw-account__table" id="bhw-account__table">
                <!-- SORT QUERY -->
                <form action="#bhw-account__table" method="POST">
                    <ul class="bhw-account__table__row bhw-account__header" role="list">
                        <li class="bhw-account__attributes__item">
                            Name
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="bhw_name" value="1">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="bhw-account__attributes__item">
                            Username
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="bhw_email" value="2">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="bhw-account__attributes__item">
                            Status
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="bhw_sex" value="3">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="bhw-account__attributes__item">
                            Date Availed
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="bhw_date" value="4">
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

                <!-- To be put in the loop -->
                <?php
                include 'includes/connection.php';
                $query = "SELECT * FROM account_information WHERE position != 'Administrator'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    if (isset($_POST['bhw_name'])) {
                        $sort_id = $_POST['bhw_name'];
                        if ($sort_id == 1) {
                            $query = "SELECT * FROM account_information WHERE position = 'Barangay Health Worker' ORDER BY firstname";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['bhw_email'])) {
                        $sort_id = $_POST['bhw_email'];
                        if ($sort_id == 2) {
                            $query = "SELECT * FROM account_information WHERE position = 'Barangay Health Worker' ORDER BY user_email OR default_email";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['bhw_sex'])) {
                        $sort_id = $_POST['bhw_sex'];
                        if ($sort_id == 3) {
                            $query = "SELECT * FROM account_information WHERE position = 'Barangay Health Worker' ORDER BY sex";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    if (isset($_POST['bhw_date'])) {
                        $sort_id = $_POST['bhw_date'];
                        if ($sort_id == 4) {
                            $query = "SELECT * FROM account_information WHERE position = 'Barangay Health Worker' ORDER BY date_registered";
                            $query_run = mysqli_query($conn, $query);
                        }
                    }
                    foreach ($query_run as $patient) {
                        // CONVERT DATE TO MM-DD-YY
                        $bhw_added_date = new DateTime($patient['date_registered']);
                        $new_bhw_added_date = $bhw_added_date->format("m-d-Y");
                ?>
                        <ul class="bhw-account__table__row bhw-account__info" role="list">
                            <li class="bhw-account__name p-bold">
                                <?= $patient['firstname'] . ' ' . $patient['lastname']; ?>
                            </li>
                            <?php
                            if ($patient['user_email'] == '') {
                                $email = $patient['default_email'];
                            }
                            if ($patient['default_email'] == '') {
                                $email = $patient['user_email'];
                            }
                            ?>
                            <li class="bhw-account__num">
                                <?= $email; ?>
                            </li>
                            <li class="bhw-account__sex">
                                <?= $patient['status'] ?>
                            </li>
                            <li class="bhw-account__date--availed">
                                <?= $new_bhw_added_date; ?>
                            </li>
                            <li class="bhw-account__option">
                                <!-- Buttons -->
                                <button type="submit" name="inactive_account" onclick="return confirmDeactivateStatus('<?= $user['position']; ?>' , '<?= $patient['account_id']; ?>')">
                                    <span>
                                        <svg class='delete-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z" />
                                        </svg>
                                    </span>
                                </button>
                                <button type="submit" name="active_account" onclick="return confirmActivateStatus('<?= $user['position']; ?>' , '<?= $patient['account_id']; ?>')">
                                    <svg class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z" />
                                    </svg>
                                </button>
                                <button type="submit" name="edit_bhw" onclick="return confirmEditUser('<?= $patient['account_id']; ?>')">
                                    <svg id="edit-profile" class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
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


                                <!--End Button-->
                            </li>
                        </ul>
                <?php
                    }
                } else {
                    echo "<h5> No Record Found </h5>";
                }
                ?>
            </div>
            <button type="button" class="btn-green btn-add" onclick="addUser()">
                <p>Add</p>
            </button>
        </section>
    </main>
    <script src="./js/app.js"></script>
    <?php
    if (isset($_GET['edited'])) {
        if (isset($_GET['edited']) == 'success') { ?>
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-right',
                    icon: 'success',
                    iconColor: 'white',
                    title: 'Profile updated',
                    customClass: {
                        popup: 'toast'
                    },
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                })
            </script>
        <?php
        } else { ?>
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-right',
                    icon: 'error',
                    iconColor: 'white',
                    title: 'Error editing account',
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
    }
    if (isset($_GET['success'])) { ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'success',
                iconColor: 'white',
                title: 'Added successfully',
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
    if (isset($_GET['error'])) { ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'error',
                iconColor: 'white',
                title: 'Error deleting account',
                customClass: {
                    popup: 'toast'
                },
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            })
        </script>
    <?php
    } ?>

</body>

</html>