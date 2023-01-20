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

    <title>Add Target Client list for Child Care Female</title>
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
                    <svg alt="Settings" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M21.32,9.55l-1.89-.63.89-1.78A1,1,0,0,0,20.13,6L18,3.87a1,1,0,0,0-1.15-.19l-1.78.89-.63-1.89A1,1,0,0,0,13.5,2h-3a1,1,0,0,0-.95.68L8.92,4.57,7.14,3.68A1,1,0,0,0,6,3.87L3.87,6a1,1,0,0,0-.19,1.15l.89,1.78-1.89.63A1,1,0,0,0,2,10.5v3a1,1,0,0,0,.68.95l1.89.63-.89,1.78A1,1,0,0,0,3.87,18L6,20.13a1,1,0,0,0,1.15.19l1.78-.89.63,1.89a1,1,0,0,0,.95.68h3a1,1,0,0,0,.95-.68l.63-1.89,1.78.89A1,1,0,0,0,18,20.13L20.13,18a1,1,0,0,0,.19-1.15l-.89-1.78,1.89-.63A1,1,0,0,0,22,13.5v-3A1,1,0,0,0,21.32,9.55ZM20,12.78l-1.2.4A2,2,0,0,0,17.64,16l.57,1.14-1.1,1.1L16,17.64a2,2,0,0,0-2.79,1.16l-.4,1.2H11.22l-.4-1.2A2,2,0,0,0,8,17.64l-1.14.57-1.1-1.1L6.36,16A2,2,0,0,0,5.2,13.18L4,12.78V11.22l1.2-.4A2,2,0,0,0,6.36,8L5.79,6.89l1.1-1.1L8,6.36A2,2,0,0,0,10.82,5.2l.4-1.2h1.56l.4,1.2A2,2,0,0,0,16,6.36l1.14-.57,1.1,1.1L17.64,8a2,2,0,0,0,1.16,2.79l1.2.4ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                    </svg>
                    <p class="sidebar__caption">Settings</p>
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
            <form class="navigation__search" action="../search-result.php" method="GET">

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
    <main class="add-child_care-female">
        <section class="form" id='add-child_care-female'>
            <p class="back__btn">
                <a href="#" onclick="backAlert()">Back</a>
            </p>
            <h2 class="add-child_care-female__title">
                Add Target Client list for Child Care Male
            </h2>
            <p class="add-child_care-female__desc">
                Fill out necessary information to complete the process
            </p>

            <form action="../includes/add_query.php" method="POST" class="add-child_care-female__form">
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-registration">Date of Registration *</label>
                    <input type="date" name="child_care-female-registration" id="child_care-female-registration" required>
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-birthdate">Date of Birthdate *</label>
                    <input type="date" name="child_care-female-birthdate" id="child_care-female-birthdate" required>
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-family-serial">Family Serial No. *</label>
                    <input type="text" name="child_care-female-family-serial" id="child_care-female-family-serial" required>
                </div>
                <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                    <label for="se-status">SE Status *</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="se-status" id="se-status" value="NHTS" required>
                            <label for="se-status">NHTS</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="se-status" id="se-status" value="NON NHTS" required>
                            <label for="se-status">NON NHTS</label>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr>

                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-child-name">Name of Child</label>
                    <div class="three-input">
                        <div class="three-input__item">
                            <input type="text" name="child_care-female-first-name" id="child_care-female-first-name" required>
                            <label for="child_care-female-first-name">First Name *</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="child_care-female-middle-inital" id="child_care-female-middle-inital">
                            <label for="child_care-female-middle-inital">MI</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="child_care-female-last-name" id="child_care-female-last-name" required>
                            <label for="child_care-female-last-name">Last Name *</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-mother-name">Complete Name of Mother</label>
                    <div class="three-input">
                        <div class="three-input__item">
                            <input type="text" name="child_care-female-mother-first-name" id="child_care-female-mother-first-name" required>
                            <label for="child_care-female-first-name">First Name *</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="child_care-female-mother-middle-inital" id="child_care-female-mother-middle-inital">
                            <label for="child_care-female-mother-middle-inital">MI</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="child_care-female-mother-last-name" id="child_care-female-last-name" required>
                            <label for="child_care-female-last-name">Last Name *</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-address">Complete Address *</label>
                    <textarea name="child_care-female-address" id="child_care-female-address" cols="27" rows="5" required></textarea>
                </div>

                <!-- Divider -->
                <hr>

                <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                    <label for="child_care-female--cpab">Child Protected at Birth (CPAB) *</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female--cpab" id="child_care-female--cpab" value="TT2/Td2 given a month prior to delivery" required>
                            <label for="child_care-female--cpab">TT2/Td2 given a month prior to delivery</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female--cpab" id="child_care-female--cpab" value="TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery" required>
                            <label for="child_care-female--cpab">TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery</label>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr id="newborn">

                <h2 class="add-child_care-female__title">
                    Newborn (0-28 days old)
                </h2>
                <p class="add-child_care-female__desc">
                    Fill out necessary information to complete the process
                </p>

                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-newborn-length">Length at Birth <br>(cm)</label>
                    <input type="text" name="child_care-female-newborn-length" id="child_care-female-newborn-length">
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female--newbornweight">Weight at Birth * <br>(kg)</label>
                    <input type="tel" name="child_care-female-newborn-weight" id="child_care-female-newborn-weight" required>
                </div>
                <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                    <label for="child_care-female-newborn-weight">Status(Birth Weight) * <br>(kg)</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-newborn-weight-status" id="child_care-female-newborn-weight-status" value="low: < 2500gms" required>
                            <label for="child_care-female-newborn-weight-status">L: low: < 2500gms </label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-newborn-weight-status" id="child_care-female-newborn-weight-status" value="normal: >= 2500gms" required>
                            <label for="child_care-female-newborn-weight-status">N:normal: >= 2500gms </label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-newborn-weight-status" id="child_care-female-newborn-weight-status" value="unknown" required>
                            <label for="child_care-female-newborn-weight-status">U:unknown </label>
                        </div>
                    </div>
                </div>
                </div>
                <div class="add-child_care-female__form-item add-child_care-female__form-item--textarea">
                    <label for="child_care-female-newborn-initiation">
                        Initiation of breastfeeding immediately after birth lasting for at least 90 minutes
                    </label>
                    <textarea name="child_care-female-newborn-initiation" id="child_care-female-newborn-initiation" cols="27" rows="5"></textarea>
                </div>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            Immunization
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-newborn-bcg">BCG</label>
                        <input type="date" name="child_care-female-newborn-bgc" id="child_care-female-newborn-bcg">
                        <label for="child_care-female-newborn-hepa-b">Hepa B- BD</label>
                        <input type="date" name="child_care-female-newborn-hepa-b" id="child_care-female-newborn-hepa-b">
                    </div>
                </div>

                <!-- Divider -->
                <hr id='1-3'>

                <h2 class="add-child_care-female__title">
                    1-3 months old
                </h2>
                <p class="add-child_care-female__desc">
                    Nutritional Status Assessment
                </p>


                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-age">Age in months</label>
                    <input type="number" name="child_care-female-1mos-age" id="child_care-female-1mos-age" min="0">
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-1mos-legth">Length</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-female-1mos-length-cm" id="child_care-female-1mos-length-cm">
                            <label for="child_care-female-length-cm">cm</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-female-1mos-length-date" id="child_care-female-1mos-length-date">
                            <label for="child_care-female-1mos-length-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-1mos-weight">Weight</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-female-1mos-weight-kg" id="child_care-female-1mos-weight-kg">
                            <label for="child_care-female-weight-kg">kg</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-female-1mos-weight-date" id="child_care-female-1mos-weight-date">
                            <label for="child_care-female-weight-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                    <label for="child_care-female-1mos-status">Status</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status" value="underweight"><!--value added-->
                            <label for="child_care-female-1mos-status">UW = underweight</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status" value="stunted"><!--value added-->
                            <label for="child_care-female-1mos-status">S = stunted</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status" value="wasted"><!--value added-->
                            <label for="child_care-female-1mos-status">W = wasted</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status" value="obese/overweight"><!--value added-->
                            <label for="child_care-female-1mos-status">O = obese/overweight</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status" value="normal"><!--value added-->
                            <label for="child_care-female-1mos-status">N = normal</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            Low birth weight given iron
                        </p>
                        <p class="dose-indication">
                            (Write the date)
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-low-weight-1mo">1 &frac12 mo</label>
                        <input type="date" name="child_care-female-low-weight-1mo" id="child_care-female-low-weight-1mo">
                        <label for="child_care-female-low-weight-2mos">2 &frac12 mos</label>
                        <input type="date" name="child_care-female-low-weight-2mos" id="child_care-female-low-weight-2mos">
                        <label for="child_care-female-low-weight-3mos">3 &frac12 mos</label>
                        <input type="date" name="child_care-female-low-weight-3mos" id="child_care-female-low-weight-3mos">
                    </div>
                </div>
                <p class="add-child_care-female__desc add-child_care-female__desc--bold">
                    Immunization
                </p>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            DPT- Hep B-Hb
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-dpt-1">First Dose Date</label>
                        <input type="date" name="child_care-female-dpt-1" id="child_care-female-dpt-1">
                        <label for="child_care-female-dpt-2">Second Dose Date</label>
                        <input type="date" name="child_care-female-dpt-2" id="child_care-female-dpt-2">
                        <label for="child_care-female-dpt-3">Third Dose Date</label>
                        <input type="date" name="child_care-female-dpt-3" id="child_care-female-dpt-3">
                    </div>
                </div>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            OPV
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-opv-1">First Dose Date</label>
                        <input type="date" name="child_care-female-opv-1" id="child_care-female-opv-1">
                        <label for="child_care-female-opv-2">Second Dose Date</label>
                        <input type="date" name="child_care-female-opv-2" id="child_care-female-opv-2">
                        <label for="child_care-female-opv-3">Third Dose Date</label>
                        <input type="date" name="child_care-female-opv-3" id="child_care-female-opv-3">
                    </div>
                </div>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            PCV
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-pcv-1">First Dose Date</label>
                        <input type="date" name="child_care-female-pcv-1" id="child_care-female-pcv-1">
                        <label for="child_care-female-pcv-2">Second Dose Date</label>
                        <input type="date" name="child_care-female-pcv-2" id="child_care-female-pcv-2">
                        <label for="child_care-female-pcv-3">Third Dose Date</label>
                        <input type="date" name="child_care-female-pcv-3" id="child_care-female-pcv-3">
                    </div>
                </div>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            IPV
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-ipv">3 1/2 mos</label>
                        <input type="date" name="child_care-female-ipv-1" id="child_care-female-ipv-1">
                    </div>
                </div>
                <div class="add-child_care-female__form-doses add-child_care-female__form-doses--checkbox">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            Exclusive Breastfeeding*
                        </p>
                        <p class="dose-indication">
                            Place a check () During the following immunization visit of the child at 1 ½ , 2 ½ and 3 ½ months old, ask if child continues to be exclusively breastfed, Place a check () on each column
                        </p>
                    </div>
                    <div class="add-child_care-female__form--role-item">
                        <div class="add-child_care-female__form-item">
                            <input type="checkbox" name="child_care-female--breastfeeding1" id="child_care-female--breastfeeding-1"><!--child_care-female--breastfeeding CHANGE INTO child_care-female--breastfeeding1--><!--value added-->
                            <label class="checkbox-label" for="child_care-female--breastfeeding-1">1 ½ mos</label>
                        </div>
                        <div class="add-child_care-female__form-item">
                            <input type="checkbox" name="child_care-female--breastfeeding2" id="child_care-female--breastfeeding-2"><!--child_care-female--breastfeeding CHANGE INTO child_care-female--breastfeeding2--><!--value added-->
                            <label class="checkbox-label" for="child_care-female--breastfeeding-2">2 ½ mos</label>
                        </div>
                        <div class="add-child_care-female__form-item">
                            <input type="checkbox" name="child_care-female--breastfeeding3" id="child_care-female--breastfeeding-3"><!--child_care-female--breastfeeding CHANGE INTO child_care-female--breastfeeding3--><!--value added-->
                            <label class="checkbox-label" for="child_care-female--breastfeeding-3">3 ½ mos</label>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr id='6-11'>

                <h2 class="add-child_care-female__title">
                    6-11 months old
                </h2>
                <p class="add-child_care-female__desc">
                    Nutritional Status Assessment
                </p>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-age">Age in months</label>
                    <input type="number" name="child_care-female-6mos-age" id="child_care-female-6mos-age"  min="0">
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-6mos-legth">Length</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-female-6mos-length-cm" id="child_care-female-6mos-length-cm">
                            <label for="child_care-female-length-cm">cm</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-female-6mos-length-date" id="child_care-female-6mos-length-date">
                            <label for="child_care-female-6mos-length-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-6mos-weight">Weight</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-female-6mos-weight-kg" id="child_care-female-6mos-weight-kg">
                            <label for="child_care-female-weight-kg">kg</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-female-6mos-weight-date" id="child_care-female-6mos-weight-date">
                            <label for="child_care-female-weight-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                    <label for="child_care-female-6mos-status">Status</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status" value="underweight"><!--value added-->
                            <label for="child_care-female-6mos-status">UW = underweight</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status" value="stunted"><!--value added-->
                            <label for="child_care-female-6mos-status">S = stunted</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status" value="wasted"><!--value added-->
                            <label for="child_care-female-6mos-status">W = wasted</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status" value="obese/overweight"><!--value added-->
                            <label for="child_care-female-6mos-status">O = obese/overweight</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status" value="normal"><!--value added-->
                            <label for="child_care-female-6mos-status">N = normal</label>
                        </div>
                    </div>
                </div>

                <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                    <label for="child_care-female-6mos-breastfed">Exclusively* Breastfed up to 6 months</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-6mos-status-exclusive" id="child_care-female-6mos-status-exclusive" value="Yes"><!--child_care-female-6mos-status CHANGE INTO child_care-female-6mos-status-exclusive--><!--value added-->
                            <label for="child_care-female-6mos-status-exclusive">Yes</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-6mos-status-exclusive" id="child_care-female-6mos-status-exclusive" value="No"><!--child_care-female-6mos-status CHANGE INTO child_care-female-6mos-status-exclusive--><!--value added-->
                            <label for="child_care-female-6mos-status-exclusive">No</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                    <label for="child_care-female-complementary-feeding">Introduction of Complementary Feeding** at 6 months old</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-complementary-feeding" id="child_care-female-complementary-feeding">
                            <label for="child_care-female-complementary-feeding">1 - with continued breastfeeding</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-complementary-feeding" id="child_care-female-complementary-feeding">
                            <label for="child_care-female-complementary-feeding">2 - no longer breastfeeding or never breastfed</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            Vitamin A
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-vit-a">Date Given</label>
                        <input type="date" name="child_care-female-vit-a" id="child_care-female-vit-a" placeholder="First Dose Date">
                    </div>
                </div>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            MNP
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-mnp">Date when 90 sachets given</label>
                        <input type="date" name="child_care-female-mnp" id="child_care-female-mnp" placeholder="First Dose Date">
                    </div>
                </div>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            MMR Dose 1 at 9th month
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-mmr">Date Given</label>
                        <input type="date" name="child_care-female-mmr" id="child_care-female-mmr" placeholder="First Dose Date">
                    </div>
                </div>

                <!-- Divider -->
                <hr id="12">

                <h2 class="add-child_care-female__title">
                    12 months old
                </h2>
                <p class="add-child_care-female__desc">
                    Nutritional Status Assessment
                </p>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-age">Age in months</label>
                    <input type="number" name="child_care-female-12mos-age" id="child_care-female-12mos-age"  min="0">
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-12mos-legth">Length</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-female-12mos-length-cm" id="child_care-female-12mos-length-cm">
                            <label for="child_care-female-length-cm">cm</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-female-12mos-length-date" id="child_care-female-12mos-length-date">
                            <label for="child_care-female-12mos-length-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-12mos-weight">Weight</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-female-12mos-weight-kg" id="child_care-female-12mos-weight-kg">
                            <label for="child_care-female-weight-kg">kg</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-female-12mos-weight-date" id="child_care-female-12mos-weight-date">
                            <label for="child_care-female-weight-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-item add-child_care-female__form-item--radio">
                    <label for="child_care-female-12mos-status">Status</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status" value="underweight"><!--value added-->
                            <label for="child_care-female-12mos-status">UW = underweight</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status" value="stunted"><!--value added-->
                            <label for="child_care-female-12mos-status">S = stunted</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status" value="wasted"><!--value added-->
                            <label for="child_care-female-12mos-status">W = wasted</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status" value="obese/overweight"><!--value added-->
                            <label for="child_care-female-12mos-status">O = obese/overweight</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status" value="normal"><!--value added-->
                            <label for="child_care-female-12mos-status">N = normal</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            MMR Dose 2 at 12th month
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-12mos-mmr">Date Given</label>
                        <input type="date" name="child_care-female-12mos-mmr" id="child_care-female-12mos-mmr" placeholder="First Dose Date">
                    </div>
                </div>
                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            FIC***
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-fic">Date</label>
                        <input type="date" name="child_care-female-fic" id="child_care-female-fic" placeholder="First Dose Date">
                    </div>
                </div>

                <!-- Divider -->
                <hr>

                <div class="add-child_care-female__form-doses">
                    <div class="add-child_care-female__form-label">
                        <p class="dose-title">
                            CIC
                        </p>
                    </div>
                    <div class="add-child_care-female__form-input">
                        <label for="child_care-female-12mos-mmr">Date Given</label>
                        <input type="date" name="child_care-female-12mos-cic" id="child_care-female-cic" placeholder="First Dose Date"> <!--child_care-female-12mos-mmr CHANGE INTO child_care-female-12mos-cic-->
                    </div>
                </div>
                <div class="add-child_care-female__form-item">
                    <label for="child_care-female-remarks">Remarks</label>
                    <textarea name="child_care-female-remarks" id="child_care-female-remarks" cols="27" rows="5"></textarea>
                </div>

                <!-- Divider -->
                <hr>

                <div class="add-child_care-female__form-btn">
                    <button type="submit" class="btn-green btn-add" name="add_childcare_female" "> <!--name added-->
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
                    <a href="#add-child_care-female">Add Early Childhood Care and Development</a>
                </li>
                <li class="content__item content__item--active">
                    <a href="#newborn">Newborn (0-28 days old) </a>
                </li>
                <li class="content__item">
                    <a href="#1-3">1-3 months old</a>
                </li>
                <li class="content__item">
                    <a href="#6-11">6-11 months old</a>
                </li>
                <li class="content__item">
                    <a href="#12">12 months old </a>
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