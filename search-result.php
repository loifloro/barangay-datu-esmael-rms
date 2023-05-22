<?php
session_start();
include 'includes/connection.php';
if (!isset($_SESSION['account_id']) && !isset($_SESSION['phone_num']) || !isset($_SESSION['position'])) {
    header("Location: index.php?error=You are not logged in"); /*Redirect to this page if successful*/
    exit();
}
//FUNCTION TO HIDE CONTENT BASED ON USER LEVEL    

$email = $_SESSION['user_email'];

// STAFF ACCESS
$query2 = "SELECT * FROM account_information WHERE user_email='$email'";
$query_run2 = mysqli_query($conn, $query2);
if (mysqli_num_rows($query_run2) > 0) {
    foreach ($query_run2 as $patient) {
        if ($patient['position'] == 'Barangay Health Worker') {
            include_once "includes/functions.php";
            hide_content();
            $input_search = $_GET['search_input'];
        }
        if ($patient['position'] == 'City Health Nurse') {
            $input_search = $_GET['search_input'];
        }
    }
}
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

    <title>Search results</title>
</head>

<body class="grid" id="grid">
    <div class="loader" id="loader">
        <svg width='150px' height='179px' version='1.1' xmlns='http://www.w3.org/2000/svg'>
            <path class='d-spinner d-spinner__four' d='M144.421372,121.923755 C143.963266,123.384111 143.471366,124.821563 142.945674,126.236112 C138.856723,137.238783 133.098899,146.60351 125.672029,154.330576 C118.245158,162.057643 109.358082,167.978838 99.0105324,172.094341 C89.2149248,175.990321 78.4098994,178.04219 66.5951642,178.25 L0,178.25 L144.421372,121.923755 L144.421372,121.923755 Z' />
            <path class='d-spinner d-spinner__three' d='M149.033408,92.6053108 C148.756405,103.232477 147.219069,113.005232 144.421372,121.923755 L0,178.25 L139.531816,44.0158418 C140.776016,46.5834381 141.913968,49.2553065 142.945674,52.0314515 C146.681818,62.0847774 148.711047,73.2598899 149.033408,85.5570717 L149.033408,92.6053108 L149.033408,92.6053108 Z' />
            <path class='d-spinner d-spinner__two' d='M80.3248924,1.15770478 C86.9155266,2.16812827 93.1440524,3.83996395 99.0105324,6.17322306 C109.358082,10.2887257 118.245158,16.2099212 125.672029,23.9369874 C131.224984,29.7143944 135.844889,36.4073068 139.531816,44.0158418 L0,178.25 L80.3248924,1.15770478 L80.3248924,1.15770478 Z' />
            <path class='d-spinner d-spinner__one' d='M32.2942065,0 L64.5884131,0 C70.0451992,0 75.290683,0.385899921 80.3248924,1.15770478 L0,178.25 L0,0 L32.2942065,0 L32.2942065,0 Z' />
        </svg>
    </div>
    <!-- Sidebar -->
    <?php
    if (isset($_GET['success'])) {
    ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'success',
                iconColor: 'white',
                title: 'Welcome, <?php echo $_SESSION['firstname'] ?>!',
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
            <li class="sidebar__item" id="dashboard_sidebar">
                <a href="dashboard.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Home" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg>
                    <p class="sidebar__caption">Dashboard</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--active" id="patient_sidebar">
                <a href="patients.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Patient" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg>
                    <p class="sidebar__caption">Patient</p>
                </a>
            </li>

            <li class="sidebar__item" id="backup_sidebar">
                <a href="archive.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Backup" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1H8.62a1,1,0,0,0,0-2H6.22A8,8,0,1,1,4,12a1,1,0,0,0-2,0A10,10,0,1,0,12,2Zm0,6a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h2a1,1,0,0,0,0-2H13V9A1,1,0,0,0,12,8Z" />
                    </svg>
                    <p class="sidebar__caption">Archive</p>
                </a>
            </li>
            <hr class="sidebar__line" id="line_sidebar" />
            <li class="sidebar__item" id="services_sidebar">
                <a href="services.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                    </svg>
                    <p class="sidebar__caption">Services</p>
                </a>
            </li>
            <li class="sidebar__item" id="masterlist_sidebar">
                <a href="dashboard-masterlist.php" class="sidebar__link"> <!--href link added-->
                    <svg alt="Masterlist" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M13,14H9a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2ZM17,4H15.82A3,3,0,0,0,13,2H11A3,3,0,0,0,8.18,4H7A3,3,0,0,0,4,7V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V7A3,3,0,0,0,17,4ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm8,14a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H8V7A1,1,0,0,0,9,8h6a1,1,0,0,0,1-1V6h1a1,1,0,0,1,1,1Zm-3-9H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    <p class="sidebar__caption">Masterlist</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--margin-top" id="setting_sidebar"> <!--href link added-->
                <a href="user-profile.php" class="sidebar__link">
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
                Patient
            </h1>
            <!-- SEARCH FORM ACTION -->
            <form class="navigation__search" action="search-result.php" method="GET">

                <input name="search_input" type="text" class="navigation__search__bar" placeholder="Search patient last name" value="<?php echo $input_search; ?>" /><!--  
                --><button name="search_btn" type="submit" class="navigation__search__btn">
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
    <main class="search-results">
        <section class="search-results">
            <!-- COUNT PATIENT QUERY -->
            <?php
            include_once "includes/functions.php";
            total_result();
            ?>
            <!-- END COUNT PATIENT QUERY -->
            <div class="search-results__table">
                <ul class="search-results__table__row patient__attributes" role="list">
                    <li class="search-results__attributes__item">
                        Name
                        <!-- Put SVG here -->
                    </li>
                    <li class="search-results__attributes__item">
                        Contact Number
                    </li>
                    <li class="search-results__attributes__item">
                        Sex
                        <!-- Put SVG here -->
                    </li>
                    <li class="search-results__attributes__item">
                        Services Availed
                        <!-- Put SVG here -->
                    </li>
                </ul>

                <!-- To be put in the loop -->
                <?php
                if (isset($input_search)) //get the search value
                {
                    $filtervalues = $input_search; //GET QUERY captures data
                    // $filtervalues = $phone_num;
                    $query = "SELECT deworming_id, firstname, lastname, deworming_date, sex, phone_num, label, deworming_email 
                                  FROM deworming WHERE CONCAT(firstname,lastname,deworming_date,sex,phone_num,label, deworming_email) 
                                  LIKE '%$filtervalues%' 
                                  UNION ALL
                                  SELECT consultation_id, firstname, lastname, consultation_date, sex, phone_number, label, consultation_email 
                                  FROM consultation WHERE CONCAT(firstname,lastname,consultation_date,sex,phone_number, label, consultation_email) 
                                  LIKE '%$filtervalues%' 
                                  UNION ALL
                                  SELECT prenatal_id, firstname, lastname, prenatal_date, sex, phone_num, label, prenatal_email 
                                  FROM prenatal WHERE CONCAT(firstname,lastname,prenatal_date,sex,phone_num, label, prenatal_email) 
                                  LIKE '%$filtervalues%' 
                                  UNION ALL
                                  SELECT postnatal_id, firstname, lastname, postnatal_date, sex, phone_num, label, postnatal_email 
                                  FROM postnatal WHERE CONCAT(firstname,lastname,postnatal_date,sex,phone_num, label, postnatal_email) 
                                  LIKE '%$filtervalues%' 
                                  UNION ALL
                                  SELECT search_destroy_id, owner_fname, owner_lname, search_destroy_date, sex, phone_num, label, search_destroy_email 
                                  FROM search_destroy WHERE CONCAT(owner_fname,owner_lname,search_destroy_date,sex,phone_num, label, search_destroy_email) 
                                  LIKE '%$filtervalues%' 
                                  UNION ALL
                                  SELECT early_childhood_id, child_fname, child_lname, early_childhood_date, sex, phone_num, label, early_childhood_email
                                  FROM early_childhood WHERE CONCAT(child_fname,child_lname,early_childhood_date,sex,phone_num, label, early_childhood_email) 
                                  LIKE '%$filtervalues%'
                                  UNION ALL
                                  SELECT id, firstname, lastname, service_date, sex, phone_num, label, service_email
                                  FROM other_service WHERE CONCAT(firstname,lastname,service_date,sex,phone_num, label, service_email) 
                                  LIKE '%$filtervalues%'
                                  ";
                    $query_run = mysqli_query($conn, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $search) {
                ?>
                            <ul class="search-results__table__row patient__info" role="list">
                                <li class="search-results__name p-bold">
                                    <?= $search['firstname'] . ' ' . $search['lastname']; ?>
                                </li>
                                <li class="search-results__num">
                                    <?= $search['phone_num']; ?>
                                </li>
                                <li class="search-results__sex">
                                    <?= $search['sex']; ?>
                                </li>
                                <li class="search-results__availed-service">
                                    <?php
                                    $service = $search['label'];
                                    if ($service == 'Deworming') {
                                        echo "<span class=\"search-results__availed-service--deworming\"> $service </span>";
                                    } else if ($service == 'Prenatal') {
                                        echo "<span class=\"search-results__availed-service--prenatal\">  $service </span>";
                                    } else if ($service == 'Consultation') {
                                        echo "<span class=\"search-results__availed-service--consultation\">  $service </span>";
                                    } else if ($service == 'Postnatal') {
                                        echo "<span class=\"search-results__availed-service--postnatal\">  $service </span>";
                                    } else if ($service == 'Search and Destroy') {
                                        echo "<span class=\"search-results__availed-service--search\">  $service </span>";
                                    } else if ($service == 'Early Childhood') {
                                        echo "<span class=\"search-results__availed-service--childhood\">  $service </span>";
                                    } else {
                                        $query = "SELECT * FROM other_service WHERE firstname='$search[firstname]' AND lastname='$search[lastname]'";
                                        $query_run = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($query_run) > 0) {
                                            foreach ($query_run as $patient) {
                                                $label = $patient['service_name'];
                                                $new_label = $label;
                                            }
                                        }
                                        echo "<span class=\"search-results__availed-service--others\">  $new_label </span>";
                                    }
                                    ?>
                                </li>
                                <li class="search-results__option">
                                    <p class="view-profile__btn">
                                        <a href="patient-profile.php?id=<?= $search['deworming_id'] ?>&label=<?= $search['label']; ?>&fname=<?= $search['firstname']; ?>&lname=<?= $search['lastname']; ?>">
                                            View Profile
                                        </a>
                                    </p>
                                </li>
                            </ul>
                        <?php
                        }
                    } else { ?>

                        <script>
                            Swal.fire({
                                toast: true,
                                position: "top-right",
                                icon: "info",
                                iconColor: "white",
                                title: "No record found",
                                customClass: {
                                    popup: "no-record",
                                },
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                            });
                        </script>
                <?php
                    }
                }
                ?>
            </div>
        </section>
    </main>
    <script src="./js/app.js"></script>
    <script>
        var loader = document.getElementById("loader");
        var grid = document.getElementById("grid");

        window.addEventListener("load", () => {
            loader.style.display = "none";
            grid.style.overflow = "unset";
        });
    </script>
</body>

</html>