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
hide_content_nurse();
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
        <section class="user-profile__backup" id="register_city_section">
            <hr>
            <h2 class="user-profile__title">
                Location
            </h2>
            <p class="user-profile__desc">
                You can change the barangay and city name here
            </p>
            <form action="./includes/edit_query.php" method="POST">
                <div class="user-profile__backup__form" id="upload_user">
                    <label for="patient-password">
                        <p class="backup-title">Barangay Name</p>
                        Update the Barangay Name to change all names of Barangay in forms, reports and entire system
                    </label>
                    <div class="user-profile__columns">

                        <input type="text" name='barangay_name' value="<?= $user['barangay_name']; ?>">
                    </div>
                </div>
                <div class="user-profile__backup__form" id="upload_user">
                    <label for="patient-password">
                        <p class="backup-title">Municipality / City Name</p>
                        Update the Barangay Name to change all names of Barangay in forms, reports and entire system
                    </label>
                    <div class="user-profile__columns">

                        <input type="text" name='city_name' value="<?= $user['city_name']; ?>">
                        <input type="hidden" name="user_id" value="<?= $user['account_id']; ?>">
                        <button type="submit" class="btn-green btn-change btn-restore" name="change_barangay" onclick="return  confirm('Do you want to change the registered barangay?')">
                            <p>Change</p>
                        </button>
                    </div>
                </div>
            </form>
            <hr>
        </section>
        <section class="user-profile__backup">
            <h2 class="user-profile__title">
                Backup
            </h2>
            <p class="user-profile__desc">
                You can restore backup records here
            </p>

            <form action="includes/functions.php" method="POST">
                <div class="user-profile__backup__form" id="upload_user">
                    <label for="patient-password">
                        <p class="backup-title">Upload</p>
                        Click the button to select in your local file the backup of the database system.
                    </label>
                    <div class="btn-section">
                        <div class="input-file-container">
                            <label tabindex="0" for="my-file" class="input-file-trigger">Upload</label>
                            <input class="input-file" id="my-file" type="file" accept=".sql" name='filename'>
                        </div>
                        <p class="file-return"></p>
                    </div>
                </div>
                <div class="user-profile__backup__form" id="restore_user">
                    <label for="patient-password">
                        <p class="backup-title">Restore</p>
                        Upload only sql file that you backup and then click the "Restore" button to restore all the record in the database system.
                    </label>
                    <button type="submit" class="btn-green btn-change btn-restore" name="restore_database" onclick="return  confirm('Do you want to restore the backup record?')">
                        <p>Restore</p>
                    </button>
                </div>
                <div class="user-profile__backup__form" id="backup_user">
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
            </form>
            <hr>
        </section>

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
                            Active Status
                            <!-- BUTTON FOR NAME -->
                            <button type="submit" name="bhw_sex" value="3">
                                <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                                </svg>
                            </button>
                        </li>
                        <li class="bhw-account__attributes__item">
                            Date Created
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
                $query = "SELECT * FROM account_information WHERE position != 'Admin'";
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
                            <li class="bhw-account__status">
                                <?php
                                if ($patient['status'] === 'Active') {
                                ?>
                                    <input type="checkbox" name="" id="active_user" checked onclick="confirmDeactivateStatus('<?= $user['position']; ?>' , '<?= $patient['account_id']; ?>')">
                                <?php
                                } else {
                                ?>
                                    <input type="checkbox" name="" id="deactive_user" onclick="confirmActivateStatus('<?= $user['position']; ?>' , '<?= $patient['account_id']; ?>')">
                                <?php
                                }
                                ?>
                                <p> <?= $patient["status"] ?> </p>
                            </li>
                            <li class="bhw-account__date--availed">
                                <?= $new_bhw_added_date; ?>
                            </li>
                            <li class="bhw-account__option">
                                <button type="submit" name="edit_bhw" id="deactive_user" onclick="return confirmEditUser('<?= $patient['account_id']; ?>')">
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
            <button type="button" class="btn-green btn-add" id="account_user" onclick="addUser()">
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
    if (isset($_GET['deactivated'])) { ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'success',
                iconColor: 'white',
                title: 'Deactivated successfully',
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
    if (isset($_GET['activated'])) { ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'success',
                iconColor: 'white',
                title: 'Activated successfully',
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