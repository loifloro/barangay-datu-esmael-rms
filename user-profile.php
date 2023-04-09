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
            <title><?= $user['firstname'] . ' ' . $user['lastname']; ?></title>
    <?php
        }
    } else {
        echo "<h5> No Record Found </h5>";
    }
    ?>
    <!-- End of Query -->
</head>

<body class="grid">
    <div class="loader" id="loader">
        <svg width='150px' height='179px' version='1.1' xmlns='http://www.w3.org/2000/svg'>
            <path class='d-spinner d-spinner__four' d='M144.421372,121.923755 C143.963266,123.384111 143.471366,124.821563 142.945674,126.236112 C138.856723,137.238783 133.098899,146.60351 125.672029,154.330576 C118.245158,162.057643 109.358082,167.978838 99.0105324,172.094341 C89.2149248,175.990321 78.4098994,178.04219 66.5951642,178.25 L0,178.25 L144.421372,121.923755 L144.421372,121.923755 Z' />
            <path class='d-spinner d-spinner__three' d='M149.033408,92.6053108 C148.756405,103.232477 147.219069,113.005232 144.421372,121.923755 L0,178.25 L139.531816,44.0158418 C140.776016,46.5834381 141.913968,49.2553065 142.945674,52.0314515 C146.681818,62.0847774 148.711047,73.2598899 149.033408,85.5570717 L149.033408,92.6053108 L149.033408,92.6053108 Z' />
            <path class='d-spinner d-spinner__two' d='M80.3248924,1.15770478 C86.9155266,2.16812827 93.1440524,3.83996395 99.0105324,6.17322306 C109.358082,10.2887257 118.245158,16.2099212 125.672029,23.9369874 C131.224984,29.7143944 135.844889,36.4073068 139.531816,44.0158418 L0,178.25 L80.3248924,1.15770478 L80.3248924,1.15770478 Z' />
            <path class='d-spinner d-spinner__one' d='M32.2942065,0 L64.5884131,0 C70.0451992,0 75.290683,0.385899921 80.3248924,1.15770478 L0,178.25 L0,0 L32.2942065,0 L32.2942065,0 Z' />
        </svg>
    </div>
    <!-- Sidebar -->
    <aside role="navigation" class="sidebar" id="sidebar">
        <ul role="list" class="sidebar__list">
            <li class="sidebar__item sidebar__item--search">
                <form class="navigation__search navigation__search--mobile" action="search-result.php" method="GET">
                    <input type="text" name="search_input" class="navigation__search__bar navigation__search__bar--mobile" placeholder="Search patient last name" /><!--  
                --><button type="submit" name="search_btn" class="navigation__search__btn">
                        <svg class="search-icon navigation__search__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256.001 256.001">
                            <rect width="256" height="256" fill="none" />
                            <circle cx="115.997" cy="116" r="84" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                            <line x1="175.391" x2="223.991" y1="175.4" y2="224.001" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                        </svg>
                    </button>
                </form>
            </li>
            <li class="sidebar__title">
                Brgy. Datu Esmael Patient Record System
            </li>
            <li class="sidebar__item">
                <a href="dashboard.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Home" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg>
                    <p class="sidebar__caption">Dashboard</p>
                </a>
            </li>
            <li class="sidebar__item ">
                <a href="patients.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Patient" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg>
                    <p class="sidebar__caption">Patient</p>
                </a>
            </li>

            <li class="sidebar__item" id="backup_sidebar"> <!--added id to use in hiding-->
                <a href="archive.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Backup" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1H8.62a1,1,0,0,0,0-2H6.22A8,8,0,1,1,4,12a1,1,0,0,0-2,0A10,10,0,1,0,12,2Zm0,6a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h2a1,1,0,0,0,0-2H13V9A1,1,0,0,0,12,8Z" />
                    </svg>
                    <p class="sidebar__caption">Archive</p>
                </a>
            </li>
            <hr class="sidebar__line" />
            <li class="sidebar__item">
                <a href="services.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                    </svg>
                    <p class="sidebar__caption">Services</p>
                </a>
            </li>
            <li class="sidebar__item" id="masterlist_sidebar"> <!--added id to use in hiding-->
                <a href="dashboard-masterlist.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Masterlist" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M13,14H9a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2ZM17,4H15.82A3,3,0,0,0,13,2H11A3,3,0,0,0,8.18,4H7A3,3,0,0,0,4,7V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V7A3,3,0,0,0,17,4ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm8,14a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H8V7A1,1,0,0,0,9,8h6a1,1,0,0,0,1-1V6h1a1,1,0,0,1,1,1Zm-3-9H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    <p class="sidebar__caption">Masterlist</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--margin-top sidebar__item--active">
                <a href="user-profile.php" class="sidebar__link"> <!--href link added-->
                    <svg alt='Profile' role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 32 32" viewBox="0 0 32 32">
                        <path d="M16,0.5C7.45001,0.5,0.5,7.45001,0.5,16S7.45001,31.5,16,31.5S31.5,24.54999,31.5,16S24.54999,0.5,16,0.5z M26.54999,22.67999C24.39001,19.59998,20.44,17.64001,16,17.64001s-8.40002,1.95996-10.53998,5.06C4.22998,20.76001,3.5,18.45996,3.5,16C3.5,9.10999,9.10999,3.5,16,3.5S28.5,9.10999,28.5,16C28.5,18.45996,27.78003,20.75,26.54999,22.67999z" />
                        <circle cx="16" cy="11" r="4.97" />
                    </svg>
                    <p class="sidebar__caption"><?php echo $_SESSION['firstname']; ?></p>
                </a>
            </li>
            <li class="sidebar__item" onclick="logoutAlert()">
                <a href="#" class="sidebar__link"> <!--href link added-->
                    <svg alt="Logout" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z" />
                    </svg>
                    <p class="sidebar__caption">Logout</p>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Nav Bar -->
    <header class="navbar">
        <nav class="navigation">
            <div id="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <h1 class="navigation__title h3">
                <!-- This would change depending on the URL or the current page  -->
                Services
            </h1>
            <form class="navigation__search" action="search-result.php" method="GET">
                <input type="text" name="search_input" class="navigation__search__bar" placeholder="Search patient last name" /><!--  
                --><button type="submit" name="search_btn" class="navigation__search__btn">
                    <svg class="search-icon navigation__search__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256.001 256.001">
                        <rect width="256" height="256" fill="none" />
                        <circle cx="115.997" cy="116" r="84" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                        <line x1="175.391" x2="223.991" y1="175.4" y2="224.001" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
                    </svg>
                </button>
            </form>

            <button id="nav-btn" class="navigation__btn btn-green">
                <p>Add Record</p>
                <svg class="add-icon navigation__btn__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512" viewBox="0 0 512 512">
                    <path fill="#231f20" d="M468.3,212.7H305.2v-169c0-24.2-19.6-43.8-43.8-43.8c-24.2,0-43.8,19.6-43.8,43.8v169h-174 C19.6,212.7,0,232.3,0,256.5c0,24.2,19.6,43.8,43.8,43.8h174v168c0,24.2,19.6,43.8,43.8,43.8c24.2,0,43.8-19.6,43.8-43.8v-168h163.1 c24.2,0,43.8-19.6,43.8-43.8C512,232.3,492.5,212.7,468.3,212.7z" />
                </svg>
            </button>
        </nav>
    </header>

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
                                <button type="submit" class="btn-green btn-save" onclick="window.location.href = 'edit/edit-bhw.php?id=<?= $user['account_id']; ?>'">
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
                        Click the button to download in you're local file the backup of the database system.
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
                            Sex
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
                $query = "SELECT * FROM account_information WHERE position = 'Barangay Health Worker'";
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
                                <?= $patient['sex']; ?>
                            </li>
                            <li class="bhw-account__date--availed">
                                <?= $new_bhw_added_date; ?>
                            </li>
                            <li class="bhw-account__option">
                                <!-- Buttons -->
                                <button type="submit" name="delete_bhw" onclick="return confirmDeleteUser('<?= $user['position']; ?>' , '<?= $patient['account_id']; ?>')">
                                    <span>
                                        <svg class='delete-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z" />
                                        </svg>
                                    </span>
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
    <script>
        var loader = document.getElementById("loader");

        window.addEventListener("load", () => {
            loader.style.display = "none";
        });
    </script>
</body>

</html>