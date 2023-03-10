<?php
session_start();
include '../includes/connection.php';
if ((!isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
    header("Location: ../index.php?error=You are not logged in"); /*Redirect to this page if successful*/

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/main.css">
    <script src="/barangay-datu-esmael-rms/node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <title>Add Target Client list for Maternal Care</title>
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
                <form class="navigation__search navigation__search--mobile" action="../search-result.php" method="GET">
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
                <a href="../dashboard.php" class="sidebar__link">
                    <svg alt="Home" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg>
                    <p class="sidebar__caption">Dashboard</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="../patients.php" class="sidebar__link">
                    <svg alt="Patient" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg>
                    <p class="sidebar__caption">Patient</p>
                </a>
            </li>

            <li class="sidebar__item">
                <a href="../archive.php" class="sidebar__link">
                    <svg alt="Backup" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1H8.62a1,1,0,0,0,0-2H6.22A8,8,0,1,1,4,12a1,1,0,0,0-2,0A10,10,0,1,0,12,2Zm0,6a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h2a1,1,0,0,0,0-2H13V9A1,1,0,0,0,12,8Z" />
                    </svg>
                    <p class="sidebar__caption">Archive</p>
                </a>
            </li>
            <hr class="sidebar__line" />
            <li class="sidebar__item ">
                <a href="../services.php" class="sidebar__link">
                    <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                    </svg>
                    <p class="sidebar__caption">Services</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--active">
                <a href="../dashboard-masterlist.php" class="sidebar__link">
                    <svg alt="Masterlist" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M13,14H9a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2ZM17,4H15.82A3,3,0,0,0,13,2H11A3,3,0,0,0,8.18,4H7A3,3,0,0,0,4,7V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V7A3,3,0,0,0,17,4ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm8,14a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H8V7A1,1,0,0,0,9,8h6a1,1,0,0,0,1-1V6h1a1,1,0,0,1,1,1Zm-3-9H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    <p class="sidebar__caption">Masterlist</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--margin-top">
                <a href="../user-profile.php" class="sidebar__link">
                    <svg alt='Profile' role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 32 32" viewBox="0 0 32 32">
                        <path d="M16,0.5C7.45001,0.5,0.5,7.45001,0.5,16S7.45001,31.5,16,31.5S31.5,24.54999,31.5,16S24.54999,0.5,16,0.5z M26.54999,22.67999C24.39001,19.59998,20.44,17.64001,16,17.64001s-8.40002,1.95996-10.53998,5.06C4.22998,20.76001,3.5,18.45996,3.5,16C3.5,9.10999,9.10999,3.5,16,3.5S28.5,9.10999,28.5,16C28.5,18.45996,27.78003,20.75,26.54999,22.67999z" />
                        <circle cx="16" cy="11" r="4.97" />
                    </svg>
                    <p class="sidebar__caption"><?php echo $_SESSION['firstname'];?></p>
                </a>
            </li>
            <li class="sidebar__item" onclick="logoutAlert()">
                <a href="#" class="sidebar__link">
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
            <form class="navigation__search" action="../../search-result.php" method="GET">



                <input name="search_input" type="text" class="navigation__search__bar" placeholder="Search patient last name" /><!--  
                --><button type="submit" class="navigation__search__btn">
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
    <main class="add-maternal_care">
        <section class="form" id='add-target'>
            <p class="back__btn">
                <a href="#" onclick="backAlert()">Back</a>
            </p>
            <h2 class="add-maternal_care__title">
                Add Target Client list for Maternal Care
            </h2>
            <p class="add-maternal_care__desc">
                Fill out necessary information to complete the process
            </p>

            <form action="../includes/add_query.php" method='POST' class="add-maternal_care__form">

                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-registration">Date of Registration *</label>
                    <input type="date" name="maternal_care-registration" id="maternal_care-registration" required>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-family-serial">Family Serial No.</label>
                    <input type="text" name="maternal_care-family-serial" id="maternal_care-family-serial">
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-child-name">Name</label>
                    <div class="three-input">
                        <div class="three-input__item">
                            <input type="text" name="maternal_care-first-name" id="maternal_care-first-name" required>
                            <label for="maternal_care-first-name">First Name *</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="maternal_care-middle-inital" id="maternal_care-middle-inital">
                            <label for="maternal_care-middle-inital">MI</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="maternal_care-last-name" id="maternal_care-last-name" required>
                            <label for="maternal_care-last-name">Last Name *</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-address">Complete Address *</label>
                    <textarea name="maternal_care-address" id="maternal_care-address" cols="27" rows="5" required></textarea>
                </div>
                <div class="add-maternal_care__form-item add-maternal_care__form-item--radio">
                    <label for="se-status">Socio Economic Status</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="se-status" id="se-status-nhts" value="NHTS"> <!--Added value-->
                            <label for="se-status-nhts">NHTS</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="se-status" id="se-status-non_nhts" value="NON NHTS"> <!--Added value-->
                            <label for="se-status-non_nhts">NON NHTS</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-1mos-legth">Birthday *</label>
                    <div class="two-input">
                        <!-- <div class="two-input__item">
                            <input type="number" name="maternal_care-age" id="maternal_care-age" required>
                            <label for="maternal_care-age">Age *</label>
                        </div> to be fix -->
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-birthday" id="maternal_care-birthday" required>
                            <label for="maternal_care-birthday">Birthday</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-lmp">Last Menstrual Period *</label>
                    <input type="date" name="maternal_care-lmp" id="maternal_care-lmp" required>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-gp">G-P *</label>
                    <input type="number" name="maternal_care-gp" id="maternal_care-gp" min="0" required>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-edc">Expected Date of Confinement *</label>
                    <input type="date" name="maternal_care-edc" id="maternal_care-edc" required>
                </div>

                <!-- Divider -->
                <hr id='dates'>

                <h2 class="add-maternal_care__title">
                    Dates of Pre-natal Check-ups
                </h2>
                <p class="add-maternal_care__desc">
                    Fill out necessary information to complete the process
                </p>

                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-1st-tri">1st Tri</label>
                    <input type="date" name="maternal_care-1st-tri" id="maternal_care-1st-tri">
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-2nd-tri">2nd Tri</label>
                    <input type="date" name="maternal_care-2nd-tri" id="maternal_care-2nd-tri">
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-3rd-tri">3rd Tri</label>
                    <input type="date" name="maternal_care-3rd-tri" id="maternal_care-3rd-tri">
                </div>


                <!-- Divider -->
                <hr id='immunization'>

                <h2 class="add-maternal_care__title">
                    Immunization Status
                </h2>
                <p class="add-maternal_care__desc">
                    Fill out necessary information to complete the process
                </p>
                <div class="add-maternal_care__form-doses">
                    <div class="add-maternal_care__form-label">
                        <p class="dose-title">
                            Date Tetanus diptheria (Td) or Tetanus Toxoid (TT) given
                        </p>
                    </div>
                    <div class="add-maternal_care__form-input">
                        <label for="maternal_care-td1">Td1/TT1</label>
                        <input type="text" name="maternal_care-td1" id="maternal_care-td1">
                        <label for="maternal_care-td2">Td2/TT2</label>
                        <input type="text" name="maternal_care-td2" id="maternal_care-td2">
                        <label for="maternal_care-td3">Td3/TT3</label>
                        <input type="text" name="maternal_care-td3" id="maternal_care-td3">
                        <label for="maternal_care-td4">Td4/TT4</label>
                        <input type="text" name="maternal_care-td4" id="maternal_care-td4">
                        <label for="maternal_care-td5">Td5/TT5</label>
                        <input type="text" name="maternal_care-td5" id="maternal_care-td5">
                    </div>
                </div>
                <div class="add-maternal_care__form-item add-maternal_care__form-item--checkbox">
                    <label for="">
                    </label>
                    <div class="add-maternal_care__form--role-item">
                        <div class="add-maternal_care__form-item">
                            <input type="checkbox" name="maternal_care-fim" id="maternal_care-fim">
                            <label for="maternal_care-fim">FIM Status</label>
                        </div>
                    </div>
                </div>

                <hr id='micronutrient'>

                <h2 class="add-maternal_care__title">
                    Micronutrient Supplementation
                </h2>
                <p class="add-maternal_care__desc">

                </p>

                <p class="add-maternal_care__desc add-maternal_care__desc--bold">
                    Iron sulfate with Folic Acid
                </p>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-iron-1">1st visit (1st tri) </label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-iron-1-tablet" id="maternal_care-iron-1-tablet" min="0">
                            <label for="maternal_care-iron-1-tablet">Number of Tablets Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-iron-1-date" id="maternal_care-iron-1-date">
                            <label for="maternal_care-iron-1-date">Date Given</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-iron-2">2nd visit (2nd tri)</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-iron-2-tablet" id="maternal_care-iron-2-tablet" min="0">
                            <label for="maternal_care-iron-2-tablet">Number of Tablets Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-iron-2-date" id="maternal_care-iron-2-date">
                            <label for="maternal_care-iron-2-date">Date Given</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-iron-3">3rd visit (3rd tri)</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-iron-3-tablet" id="maternal_care-iron-3-tablet" min="0">
                            <label for="maternal_care-iron-3-tablet">Number of Tablets Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-iron-3-date" id="maternal_care-iron-3-date"> <!--maternal_care-iron-1-date change into maternal_care-iron-3-date-->
                            <label for="maternal_care-iron-3-date">Date Given</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-iron-4">4rd visit (4rd tri)</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-iron-4-tablet" id="maternal_care-iron-4-tablet" min="0">
                            <label for="maternal_care-iron-4-tablet">Number of Tablets Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-iron-4-date" id="maternal_care-iron-4-date"> <!--maternal_care-iron-1-date change into maternal_care-iron-4-date-->
                            <label for="maternal_care-iron-4-date">Date Given</label>
                        </div>
                    </div>
                </div>

                <hr>
                <p class="add-maternal_care__desc add-maternal_care__desc--bold">
                    Calcium Carbonate
                </p>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-calcium-2">2nd visit (2nd tri) </label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-calcium-2-capsule" id="maternal_care-calcium-2-capsule" min="0">
                            <label for="maternal_care-calcium-2-capsule">Number of Capsules Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-calcium-2-date" id="maternal_care-calcium-2-date">
                            <label for="maternal_care-calcium-2-date">Date Given</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-calcium-3">3rd visit (3rd tri)</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-calcium-3-capsule" id="maternal_care-calcium-3-capsule" min="0">
                            <label for="maternal_care-calcium-3-capsule">Number of Capsule Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-calcium-3-date" id="maternal_care-calcium-3-date"> <!--maternal_care-calcium-1-date change into maternal_care-calcium-3-date-->
                            <label for="maternal_care-calcium-3-date">Date Given</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-calcium-4">4rd visit (4rd tri)</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-calcium-4-capsule" id="maternal_care-calcium-4-capsule" min="0">
                            <label for="maternal_care-calcium-4-capsule">Number of Capsule Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-calcium-4-date" id="maternal_care-calcium-4-date"> <!--maternal_care-calcium-1-date change into maternal_care-calcium-4-date-->
                            <label for="maternal_care-calcium-4-date">Date Given</label>
                        </div>
                    </div>
                </div>

                <hr>
                <p class="add-maternal_care__desc add-maternal_care__desc--bold">
                    Iodine Capsules
                </p>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-iodine-1">1st visit (1st tri) </label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="number" name="maternal_care-iodine-1-capsule" id="maternal_care-iodine-1-capsule" min="0">
                            <label for="maternal_care-iodine-1-capsule">Number of Capsules Given</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="maternal_care-iodine-1-date" id="maternal_care-iodine-1-date">
                            <label for="maternal_care-iodine-1-date">Date Given</label>
                        </div>
                    </div>
                </div>

                <hr id='nutrional'>
                <h2 class="add-maternal_care__title">
                    Nutritional Assessment
                </h2>
                <p class="add-maternal_care__desc">
                    (Write the BMI for 1st Tri)
                </p>
                <div class="add-maternal_care__form-item">
                    <label for="maternal_care-1st-tri-weight">Weight (kg)</label>
                    <input type="text" name="maternal_care-1st-tri-weight" id="maternal_care-1st-tri-weight">
                </div>
                <div class="add-maternal_care__form-doses">
                    <div class="add-maternal_care__form-label">
                        <p class="dose-title">
                            Deworming Tablet
                        </p>
                    </div>
                    <div class="add-maternal_care__form-input">
                        <label for="maternal_care-deworming-tablet">Date Given 2nd or 3rd Tris</label>
                        <input type="date" name="maternal_care-deworming-tablet" id="maternal_care-deworming-tablet">
                    </div>
                </div>


                <hr id='infectious'>
                <h2 class="add-maternal_care__title">
                    Infectious Disease Surveillance
                </h2>
                <p class="add-maternal_care__desc">

                </p>
                <div class="add-maternal_care__form-doses">
                    <div class="add-maternal_care__form-label">
                        <p class="dose-title">
                            Syphilis Screening
                        </p>
                        <p class="dose-indication">
                            RPR or RDT Result
                        </p>
                    </div>
                    <div class="add-maternal_care__form-input">
                        <label for="maternal_care-syphilis-screening-date">Date</label>
                        <input type="date" name="maternal_care-syphilis-screening-date" id="maternal_care-syphilis-screening-date">
                    </div>
                </div>
                <div class="add-maternal_care__form-item add-maternal_care__form-item--radio">
                    <label for="maternal_care-syphilis-screening-status">Status</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="maternal_care-syphilis-screening-status" id="maternal_care-syphilis-screening-status-positive" value="Positive"> <!--Value added-->
                            <label for="maternal_care-syphilis-screening-status-positive">Positive</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="maternal_care-syphilis-screening-status" id="maternal_care-syphilis-screening-status-negative" value="Negative"> <!--Value added-->
                            <label for="maternal_care-syphilis-screening-status-negative">Negative</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-doses">
                    <div class="add-maternal_care__form-label">
                        <p class="dose-title">
                            Hepatitis B Screening
                        </p>
                        <p class="dose-indication">
                            Result of HBsAg Test
                        </p>
                    </div>
                    <div class="add-maternal_care__form-input">
                        <label for="maternal_care-hepatitis-screening-date">Date</label>
                        <input type="date" name="maternal_care-hepatitis-screening-date" id="maternal_care-hepatitis-screening-date">
                    </div>
                </div>
                <div class="add-maternal_care__form-item add-maternal_care__form-item--radio">
                    <label for="maternal_care-hepatitis-screening-status">Status</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="maternal_care-hepatitis-screening-status" id="maternal_care-hepatitis-screening-status-positive" value="Positive"> <!--Value added-->
                            <label for="maternal_care-hepatitis-screening-status-positive">Positive</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="maternal_care-hepatitis-screening-status" id="maternal_care-hepatitis-screening-status-negative" value="Negative"> <!--Value added-->
                            <label for="maternal_care-hepatitis-screening-status-negative">Negative</label>
                        </div>
                    </div>
                </div>
                <div class="add-maternal_care__form-doses">
                    <div class="add-maternal_care__form-label">
                        <p class="dose-title">
                            HIV Screening
                        </p>
                        <!-- <p class="dose-indication">
                            Result of HBsAg Test
                        </p> -->
                    </div>
                    <div class="add-maternal_care__form-input">
                        <label for="maternal_care-hiv-screening-date">Date Screened</label>
                        <input type="date" name="maternal_care-hiv-screening-date" id="maternal_care-hiv-screening-date">
                    </div>
                </div>

                <!-- Divider -->
                <hr>

                <div class="add-maternal_care__form-btn">
                    <button type="submit" class="btn-green btn-add" name="add_maternal_list" "> <!--added name-->
                        Add
                    </button>
                    <button type=" button" class="btn-red btn-cancel" onclick="confirmReset(form)"> <!--added type and onclick-->
                        Clear
                    </button>
                </div>
                <!-- Query to get the user session name -->
                <?php
                include '../includes/connection.php';
                $query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $user) {
                ?>

                        <input type="hidden" name="user_fname" value="<?= $user['firstname']; ?>">
                        <input type="hidden" name="user_lname" value="<?= $user['lastname']; ?>">
                        <input type="hidden" name="user_role" value="<?= $user['position']; ?>">

                <?php
                    }
                }
                ?>
                <!-- END OF QUERY -->
            </form>
        </section>

        <section class="contents">
            <ul class="contents__list">
                <li class="content__item content__item--active">
                    <a href="#add-target">Add Target Client list for Maternal Care </a>
                </li>
                <li class="content__item content__item--active">
                    <a href="#dates">Dates of Prenatal Checkup </a>
                </li>
                <li class="content__item">
                    <a href="#immunization">Immunization Status </a>
                </li>
                <li class="content__item">
                    <a href="#micronutrient">Micronutrient Supplementation </a>
                </li>
                <li class="content__item">
                    <a href="#nutrional">Nutritional Assessment </a>
                </li>
                <li class="content__item">
                    <a href="#infectious">Infectious Disease Surveillance </a>
                </li>
            </ul>
        </section>
    </main>
    <script src="../js/app.js"></script>
    <script>
        var loader = document.getElementById("loader");

        window.addEventListener("load", () => {
            loader.style.display = "none";
        });
    </script>
</body>

</html>