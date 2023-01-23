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
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>

    <title>Patients</title>
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
            <li class="sidebar__item">
                <a href="dashboard.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Home" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg>
                    <p class="sidebar__caption">Dashboard</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--active">
                <a href="patients.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Patient" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg>
                    <p class="sidebar__caption">Patient</p>
                </a>
            </li>

            <li class="sidebar__item" id="backup_sidebar"> <!--added id-->
                <a href="archive.php" class="sidebar__link">
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
            <a href="dashboard-masterlist.php" class="sidebar__link" id="masterlist_sidebar"> <!--id-->
                <li class="sidebar__item">
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
                Patients
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
                </select>
            </div>


            <!-- TABS event initialization-->
            <ul role="list" class="services__list">
                <?php
                $query = "SELECT count(*) FROM deworming WHERE archive_label=''";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <li class="services__list__item services__list__item--active" onclick="patient(event, 'Deworming' , <?php echo $row['count(*)']; ?>)">
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
                        <li class="services__list__item" onclick="patient(event, 'Consultation', <?php echo $row['count(*)']; ?> )">
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
                            <li class="services__list__item" onclick="patient(event, 'Pre-Natal', <?php echo $row['count(*)']; ?>)">
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
                                <li class="services__list__item" onclick="patient(event, 'Post-Natal', <?php echo $row['count(*)']; ?>)">
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
                                    <li class="services__list__item" onclick="patient(event, 'Search and Destroy', <?php echo $row['count(*)']; ?>)">
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
                                        <li class="services__list__item" onclick="patient(event, 'Childhood Care', <?php echo $row['count(*)']; ?>)">
                                            <!-- COUNT EC -->
                                            Childhood Care (<?php echo $row['count(*)']; ?>)
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
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $num_per_page = 9;
                $start_from = ($page - 1) * 02;
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
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['deworming_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['firstname']; ?>&lname=<?= $patient['lastname']; ?>">
                                    <?= $patient['firstname'] . " " . $patient['lastname']; ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $patient['deworming_date']; ?>
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
                    <!-- <div class="pagination"> -->
                        <?php
                        if ($page > 1) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page - 1) ?>&deworming' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page=<?php echo $i; ?>&deworming' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page + 1) ?>&deworming' class="pagination_next">Next</a>
                        <?php
                        }
                        //END OF PAGINATION
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
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $num_per_page = 9;
                $start_from = ($page - 1) * 02;
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
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['consultation_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['firstname']; ?>&lname=<?= $patient['lastname']; ?>">
                                    <?= $patient['firstname'] . " " . $patient['lastname']; ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $patient['consultation_date']; ?>
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
                    <!-- <div class="pagination"> -->
                        <?php
                        if ($page > 1) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page - 1) ?>&consultation' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page=<?php echo $i; ?>&consultation' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page + 1) ?>&consultation' class="pagination_next">Next</a>
                        <?php
                        }
                        //END OF PAGINATION
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
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $num_per_page = 9;
                $start_from = ($page - 1) * 02;
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
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['prenatal_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['firstname']; ?>&lname=<?= $patient['lastname']; ?>">
                                    <?= $patient['firstname'] . " " . $patient['lastname']; ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $patient['prenatal_date']; ?> <!--Date Registered-->
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
                    <!-- <div class="pagination"> -->
                        <?php
                        if ($page > 1) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page - 1) ?>&prenatal' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page=<?php echo $i; ?>&prenatal' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page + 1) ?>&prenatal' class="pagination_next">Next</a>
                        <?php
                        }
                        //END OF PAGINATION
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
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $num_per_page = 9;
                $start_from = ($page - 1) * 02;
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
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['postnatal_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['firstname']; ?>&lname=<?= $patient['lastname']; ?>">
                                    <?= $patient['firstname'] . " " . $patient['lastname']; ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $patient['postnatal_date']; ?>
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
                    <!-- <div class="pagination"> -->
                        <?php
                        if ($page > 1) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page - 1) ?>&postnatal' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page=<?php echo $i; ?>&postnatal' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page + 1) ?>&postnatal' class="pagination_next">Next</a>
                        <?php
                        }
                        //END OF PAGINATION
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
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $num_per_page = 9;
                $start_from = ($page - 1) * 02;
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
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['search_destroy_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['owner_fname']; ?>&lname=<?= $patient['owner_lname']; ?>">
                                    <?= $patient['owner_fname'] . ' ' . $patient['owner_lname'] ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $patient['date_visit']; ?>
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
                    <!-- <div class="pagination"> -->
                        <?php
                        if ($page > 1) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page - 1) ?>&searchdestroy' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page=<?php echo $i; ?>&searchdestroy' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page + 1) ?>&searchdestroy' class="pagination_next">Next</a>
                        <?php
                        }
                        //END OF PAGINATION
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
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $num_per_page = 9;
                $start_from = ($page - 1) * 02;
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
                ?>
                        <ul class="patient__table__row patient__info" role="list">

                            <li class="patient__name p-bold">
                                <a href="patient-profile.php?id=<?= $patient['early_childhood_id'] ?>&label=<?= $patient['label']; ?>&fname=<?= $patient['child_fname']; ?>&lname=<?= $patient['child_lname']; ?>">
                                    <?= $patient['child_fname'] . ' ' . $patient['child_lname'] ?>
                                </a>
                            </li>
                            <li class="patient__num">
                                <?= $patient['child_birthdate']; ?> <!--Date Registered-->
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
                    <!-- <div class="pagination"> -->
                        <?php
                        if ($page > 1) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page - 1) ?>&earlychildhood' class="pagination_previous">Previous</a>
                        <?php
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                            <a href='patients.php?page=<?php echo $i; ?>&earlychildhood' class="pagination_number"><?php echo $i; ?></a>
                        <?php
                        }
                        if ($page < $total_page) {
                        ?>
                            <a href='patients.php?page=<?php echo ($page + 1) ?>&earlychildhood' class="pagination_next">Next</a>
                        <?php
                        }
                        //END OF PAGINATION
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
            patient(event, 'Deworming');
        </script>
    <?php
    }
    if (isset($_POST['consultation_sort_name']) || isset($_POST['consultation_sort_sex']) || isset($_POST['consultation_sort_date_availed']) || isset($_GET['consultation'])) {
    ?>
        <script>
            patient(event, 'Consultation');
        </script>
    <?php
    }
    if (isset($_POST['prenatal_sort_name']) || isset($_POST['prenatal_sort_sex']) || isset($_POST['prenatal_sort_date_availed']) || isset($_GET['prenatal'])) {
    ?>
        <script>
            patient(onclick, 'Pre-Natal');
        </script>
    <?php
    }
    if (isset($_POST['postnatal_sort_name']) || isset($_POST['postnatal_sort_sex']) || isset($_POST['postnatal_sort_date_availed']) || isset($_GET['postnatal'])) {
    ?>
        <script>
            patient(event, 'Post-Natal');
        </script>
    <?php
    }
    if (isset($_POST['search_sort_name']) || isset($_POST['search_sort_status']) || isset($_POST['search_sort_sex']) || isset($_POST['search_sort_date_availed']) || isset($_GET['searchdestroy'])) {
    ?>
        <script>
            patient(event, 'Search and Destroy');
        </script>
    <?php
    }
    if (isset($_POST['early_sort_name']) || isset($_POST['early_sort_date_availed']) || isset($_POST['early_sort_sex']) || isset($_POST['early_sort_date_availed']) || isset($_GET['earlychildhood'])) {
    ?>
        <script>
            patient(event, 'Childhood Care');
        </script>
    <?php
    }
    ?>
    <script>
        var loader = document.getElementById("loader");

        window.addEventListener("load", () => {
            loader.style.display = "none";
        });
    </script>
</body>

</html>