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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/main.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>

    <title>Archive</title>
</head>

<body class="grid">
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
            <li class="sidebar__item">
                <a href="dashboard.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Home" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg>
                    <p class="sidebar__caption">Dashboard</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="patients.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Patient" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg>
                    <p class="sidebar__caption">Patient</p>
                </a>
            </li>

            <li class="sidebar__item sidebar__item--active">
                <a href="archive.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Backup" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1H8.62a1,1,0,0,0,0-2H6.22A8,8,0,1,1,4,12a1,1,0,0,0-2,0A10,10,0,1,0,12,2Zm0,6a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h2a1,1,0,0,0,0-2H13V9A1,1,0,0,0,12,8Z" />
                    </svg>
                    <p class="sidebar__caption">Archive</p>
                </a>
            </li>
            <hr class="sidebar__line" />
            <li class="sidebar__item">
                <a href="services-consultation.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                    </svg>
                    <p class="sidebar__caption">Services</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="dashboard-masterlist.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Masterlist" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M13,14H9a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2ZM17,4H15.82A3,3,0,0,0,13,2H11A3,3,0,0,0,8.18,4H7A3,3,0,0,0,4,7V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V7A3,3,0,0,0,17,4ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm8,14a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H8V7A1,1,0,0,0,9,8h6a1,1,0,0,0,1-1V6h1a1,1,0,0,1,1,1Zm-3-9H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    <p class="sidebar__caption">Masterlist</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--margin-top"> <!--href link added-->
                <a href="user-profile.php" class="sidebar__link">
                    <svg alt="Settings" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M21.32,9.55l-1.89-.63.89-1.78A1,1,0,0,0,20.13,6L18,3.87a1,1,0,0,0-1.15-.19l-1.78.89-.63-1.89A1,1,0,0,0,13.5,2h-3a1,1,0,0,0-.95.68L8.92,4.57,7.14,3.68A1,1,0,0,0,6,3.87L3.87,6a1,1,0,0,0-.19,1.15l.89,1.78-1.89.63A1,1,0,0,0,2,10.5v3a1,1,0,0,0,.68.95l1.89.63-.89,1.78A1,1,0,0,0,3.87,18L6,20.13a1,1,0,0,0,1.15.19l1.78-.89.63,1.89a1,1,0,0,0,.95.68h3a1,1,0,0,0,.95-.68l.63-1.89,1.78.89A1,1,0,0,0,18,20.13L20.13,18a1,1,0,0,0,.19-1.15l-.89-1.78,1.89-.63A1,1,0,0,0,22,13.5v-3A1,1,0,0,0,21.32,9.55ZM20,12.78l-1.2.4A2,2,0,0,0,17.64,16l.57,1.14-1.1,1.1L16,17.64a2,2,0,0,0-2.79,1.16l-.4,1.2H11.22l-.4-1.2A2,2,0,0,0,8,17.64l-1.14.57-1.1-1.1L6.36,16A2,2,0,0,0,5.2,13.18L4,12.78V11.22l1.2-.4A2,2,0,0,0,6.36,8L5.79,6.89l1.1-1.1L8,6.36A2,2,0,0,0,10.82,5.2l.4-1.2h1.56l.4,1.2A2,2,0,0,0,16,6.36l1.14-.57,1.1,1.1L17.64,8a2,2,0,0,0,1.16,2.79l1.2.4ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                    </svg>
                    <p class="sidebar__caption">Settings</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Feedback" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M11.29,15.29a1.58,1.58,0,0,0-.12.15.76.76,0,0,0-.09.18.64.64,0,0,0-.06.18,1.36,1.36,0,0,0,0,.2.84.84,0,0,0,.08.38.9.9,0,0,0,.54.54.94.94,0,0,0,.76,0,.9.9,0,0,0,.54-.54A1,1,0,0,0,13,16a1,1,0,0,0-.29-.71A1,1,0,0,0,11.29,15.29ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20ZM12,7A3,3,0,0,0,9.4,8.5a1,1,0,1,0,1.73,1A1,1,0,0,1,12,9a1,1,0,0,1,0,2,1,1,0,0,0-1,1v1a1,1,0,0,0,2,0v-.18A3,3,0,0,0,12,7Z" />
                    </svg>
                    <p class="sidebar__caption">Feedback</p>
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
                Archive
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
                    Deworming
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
                    Consultation
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
                    Pre-Natal
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
                    Post-Natal
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
                    Search and Destroy
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
                    Childhood Care
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
                    <button type="submit" name="sort_name" value="1">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Contact No.
                    <!-- BUTTON FOR CONTACT -->
                    <button type="submit" name="sort_contact" value="2">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Sex
                    <!-- BUTTON FOR SEX -->
                    <button type="submit" name="sort_sex" value="3">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Date Availed
                    <!-- BUTTON FOR DATE -->
                    <button type="submit" name="sort_date" value="4">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Status
                     <!-- BUTTON FOR STATUS -->
                     <button type="submit" name="sort_status" value="5">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
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
                if (isset($_POST['sort_name'])) {
                    $sort_id = $_POST['sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM deworming WHERE archive_label = 'archived' ORDER BY firstname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_contact'])) {
                    $sort_id = $_POST['sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM deworming WHERE archive_label = 'archived' ORDER BY phone_num";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_sex'])) {
                    $sort_id = $_POST['sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM deworming WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_date'])) {
                    $sort_id = $_POST['sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM deworming  WHERE archive_label = 'archived' ORDER BY deworming_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_status'])) {
                    $sort_id = $_POST['sort_status'];
                    if ($sort_id == 5) {
                        $query = "SELECT * FROM deworming WHERE archive_label = 'archived' ORDER BY archive_label";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['firstname'].' '.$archive['lastname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_num']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $archive['deworming_date']; ?>
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
                    <button type="submit" name="sort_name" value="1">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Contact No.
                    <!-- BUTTON FOR CONTACT -->
                    <button type="submit" name="sort_contact" value="2">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Sex
                    <!-- BUTTON FOR SEX -->
                    <button type="submit" name="sort_sex" value="3">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Date Availed
                    <!-- BUTTON FOR DATE -->
                    <button type="submit" name="sort_date" value="4">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Status
                    <!-- BUTTON FOR STATUS -->
                    <button type="submit" name="sort_status" value="5">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
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
                if (isset($_POST['sort_name'])) {
                    $sort_id = $_POST['sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM consultation WHERE archive_label = 'archived' ORDER BY firstname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_contact'])) {
                    $sort_id = $_POST['sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM consultation WHERE archive_label = 'archived' ORDER BY phone_number";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_sex'])) {
                    $sort_id = $_POST['sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM consultation WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_date'])) {
                    $sort_id = $_POST['sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM consultation  WHERE archive_label = 'archived' ORDER BY consultation_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_status'])) {
                    $sort_id = $_POST['sort_status'];
                    if ($sort_id == 5) {
                        $query = "SELECT * FROM consultation WHERE archive_label = 'archived' ORDER BY archive_label";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['firstname'].' '.$archive['lastname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_number']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $archive['consultation_date']; ?>
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
                   <button type="submit" name="sort_name" value="1">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Contact No.
                    <!-- BUTTON FOR CONTACT -->
                    <button type="submit" name="sort_contact" value="2">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Sex
                    <!-- BUTTON FOR SEX -->
                    <button type="submit" name="sort_sex" value="3">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Date Availed
                    <!-- BUTTON FOR DATE -->
                    <button type="submit" name="sort_date" value="4">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Status
                    <!-- BUTTON FOR STATUS -->
                    <button type="submit" name="sort_status" value="5">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
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
                if (isset($_POST['sort_name'])) {
                    $sort_id = $_POST['sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM prenatal WHERE archive_label = 'archived' ORDER BY firstname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_contact'])) {
                    $sort_id = $_POST['sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM prenatal WHERE archive_label = 'archived' ORDER BY phone_num";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_sex'])) {
                    $sort_id = $_POST['sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM prenatal WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_date'])) {
                    $sort_id = $_POST['sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM prenatal  WHERE archive_label = 'archived' ORDER BY prenatal_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_status'])) {
                    $sort_id = $_POST['sort_status'];
                    if ($sort_id == 5) {
                        $query = "SELECT * FROM prenatal WHERE archive_label = 'archived' ORDER BY archive_label";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['firstname'].' '.$archive['lastname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_num']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $archive['prenatal_date']; ?>
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
                    <button type="submit" name="sort_name" value="1">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Contact No.
                   <!-- BUTTON FOR CONTACT -->
                   <button type="submit" name="sort_contact" value="2">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Sex
                    <!-- BUTTON FOR SEX -->
                    <button type="submit" name="sort_sex" value="3">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Date Availed
                    <!-- BUTTON FOR DATE -->
                    <button type="submit" name="sort_date" value="4">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Status
                    <!-- BUTTON FOR STATUS -->
                    <button type="submit" name="sort_status" value="5">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item"></li>
            </ul>

            <!-- To be put in the loop -->
            <?php
            $query = "SELECT * FROM postnatal WHERE archive_label = 'archived'";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                if (isset($_POST['sort_name'])) {
                    $sort_id = $_POST['sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM postnatal WHERE archive_label = 'archived' ORDER BY firstname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_contact'])) {
                    $sort_id = $_POST['sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM postnatal WHERE archive_label = 'archived' ORDER BY phone_num";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_sex'])) {
                    $sort_id = $_POST['sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM postnatal WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_date'])) {
                    $sort_id = $_POST['sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM postnatal  WHERE archive_label = 'archived' ORDER BY postnatal_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_status'])) {
                    $sort_id = $_POST['sort_status'];
                    if ($sort_id == 5) {
                        $query = "SELECT * FROM postnatal WHERE archive_label = 'archived' ORDER BY archive_label";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['firstname'].' '.$archive['lastname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_num']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $archive['postnatal_date']; ?>
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
                    <button type="submit" name="sort_name" value="1">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Contact No.
                    <!-- BUTTON FOR CONTACT -->
                    <button type="submit" name="sort_contact" value="2">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Sex
                    <!-- BUTTON FOR SEX -->
                    <button type="submit" name="sort_sex" value="3">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Date Availed
                    <!-- BUTTON FOR DATE -->
                    <button type="submit" name="sort_date" value="4">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Status
                    <!-- BUTTON FOR STATUS -->
                    <button type="submit" name="sort_status" value="5">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
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
                if (isset($_POST['sort_name'])) {
                    $sort_id = $_POST['sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label = 'archived' ORDER BY owner_fname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_contact'])) {
                    $sort_id = $_POST['sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label = 'archived' ORDER BY phone_num";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_sex'])) {
                    $sort_id = $_POST['sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_date'])) {
                    $sort_id = $_POST['sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM search_destroy  WHERE archive_label = 'archived' ORDER BY search_destroy_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_status'])) {
                    $sort_id = $_POST['sort_status'];
                    if ($sort_id == 5) {
                        $query = "SELECT * FROM search_destroy WHERE archive_label = 'archived' ORDER BY archive_label";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['owner_fname'].' '.$archive['owner_lname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_num']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $archive['search_destroy_date']; ?>
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
                    <button type="submit" name="sort_name" value="1">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Contact No.
                    <!-- BUTTON FOR CONTACT -->
                    <button type="submit" name="sort_contact" value="2">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Sex
                    <!-- BUTTON FOR SEX -->
                    <button type="submit" name="sort_sex" value="3">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Date Availed
                    <!-- BUTTON FOR DATE -->
                    <button type="submit" name="sort_date" value="4">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
                </li>
                <li class="backup__attributes__item">
                    Status
                    <!-- BUTTON FOR STATUS -->
                    <button type="submit" name="sort_status" value="5">
                        <svg class='sort-icon' viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.29,14.29,12,18.59l-4.29-4.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,1.42,0l5-5a1,1,0,0,0-1.42-1.42ZM7.71,9.71,12,5.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42l-5-5a1,1,0,0,0-1.42,0l-5,5A1,1,0,0,0,7.71,9.71Z" />
                        </svg>
                    </button>
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
                if (isset($_POST['sort_name'])) {
                    $sort_id = $_POST['sort_name'];
                    if ($sort_id == 1) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label = 'archived' ORDER BY child_fname";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_contact'])) {
                    $sort_id = $_POST['sort_contact'];
                    if ($sort_id == 2) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label = 'archived' ORDER BY phone_num";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_sex'])) {
                    $sort_id = $_POST['sort_sex'];
                    if ($sort_id == 3) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label = 'archived' ORDER BY sex";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_date'])) {
                    $sort_id = $_POST['sort_date'];
                    if ($sort_id == 4) {
                        $query = "SELECT * FROM early_childhood  WHERE archive_label = 'archived' ORDER BY early_childhood_date";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                if (isset($_POST['sort_status'])) {
                    $sort_id = $_POST['sort_status'];
                    if ($sort_id == 5) {
                        $query = "SELECT * FROM early_childhood WHERE archive_label = 'archived' ORDER BY archive_label";
                        $query_run = mysqli_query($conn, $query);
                    }
                }
                foreach ($query_run as $archive) {
            ?>
                    <ul class="backup__table__row backup__info" role="list">
                        <li class="backup__name p-bold">
                            <?= $archive['child_fname'].' '. $archive['child_lname']; ?>
                        </li>
                        <li class="backup__num">
                            <?= $archive['phone_num']; ?>
                        </li>
                        <li class="backup__sex">
                            <?= $archive['sex']; ?>
                        </li>
                        <li class="backup__date--availed">
                            <?= $archive['early_childhood_date']; ?>
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
    ?>
</body>

</html>