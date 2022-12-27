<?php
session_start();
include '../includes/connection.php';
if (!isset($_SESSION['account_id']) && !isset($_SESSION['phone_num'])) {
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
    <link rel="stylesheet" href="../css/main.css">
    <script src="/barangay-datu-esmael-rms/node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <title>Add Target Client list for Child Care Male</title>
</head>
<body class="grid">
    <!-- Sidebar -->
    <aside role="navigation" class="sidebar">
        <ul role="list" class="sidebar__list">
            <li class="sidebar__item">
                <a href="../dashboard.php" class="sidebar__link">
                    <svg alt="Home" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg>
                    <p class="sidebar__caption">Dashboard</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="../patients.php" class="sidebar__link">
                    <svg alt="Patient" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg>
                    <p class="sidebar__caption">Patient</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="../tutorial.php" class="sidebar__link">
                    <svg alt="Tutorial" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M21,14H20V4h1a1,1,0,0,0,0-2H3A1,1,0,0,0,3,4H4V14H3a1,1,0,0,0,0,2h8v1.15l-4.55,3A1,1,0,0,0,7,22a.94.94,0,0,0,.55-.17L11,19.55V21a1,1,0,0,0,2,0V19.55l3.45,2.28A.94.94,0,0,0,17,22a1,1,0,0,0,.55-1.83l-4.55-3V16h8a1,1,0,0,0,0-2Zm-3,0H6V4H18ZM9.61,12.26a1.73,1.73,0,0,0,1.76,0l3-1.74a1.76,1.76,0,0,0,0-3l-3-1.74a1.73,1.73,0,0,0-1.76,0,1.71,1.71,0,0,0-.87,1.52v3.48A1.71,1.71,0,0,0,9.61,12.26Zm1.13-4.58L13,9l-2.28,1.32Z" />
                    </svg>
                    <p class="sidebar__caption">Tutorial</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="../back-up.php" class="sidebar__link">
                    <svg alt="Backup" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1H8.62a1,1,0,0,0,0-2H6.22A8,8,0,1,1,4,12a1,1,0,0,0-2,0A10,10,0,1,0,12,2Zm0,6a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h2a1,1,0,0,0,0-2H13V9A1,1,0,0,0,12,8Z" />
                    </svg>
                    <p class="sidebar__caption">Backup</p>
                </a>
            </li>
            <hr class="sidebar__line" />
            <li class="sidebar__item sidebar__item--active">
                <a href="../services-consultation.php" class="sidebar__link">
                    <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                    </svg>
                    <p class="sidebar__caption">Services</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="../dashboard-masterlist.php" class="sidebar__link">
                    <svg alt="Masterlist" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M13,14H9a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2ZM17,4H15.82A3,3,0,0,0,13,2H11A3,3,0,0,0,8.18,4H7A3,3,0,0,0,4,7V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V7A3,3,0,0,0,17,4ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm8,14a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H8V7A1,1,0,0,0,9,8h6a1,1,0,0,0,1-1V6h1a1,1,0,0,1,1,1Zm-3-9H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    <p class="sidebar__caption">Masterlist</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--margin-top">
                <a href="../user-profile.php" class="sidebar__link">
                    <svg alt="Settings" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M21.32,9.55l-1.89-.63.89-1.78A1,1,0,0,0,20.13,6L18,3.87a1,1,0,0,0-1.15-.19l-1.78.89-.63-1.89A1,1,0,0,0,13.5,2h-3a1,1,0,0,0-.95.68L8.92,4.57,7.14,3.68A1,1,0,0,0,6,3.87L3.87,6a1,1,0,0,0-.19,1.15l.89,1.78-1.89.63A1,1,0,0,0,2,10.5v3a1,1,0,0,0,.68.95l1.89.63-.89,1.78A1,1,0,0,0,3.87,18L6,20.13a1,1,0,0,0,1.15.19l1.78-.89.63,1.89a1,1,0,0,0,.95.68h3a1,1,0,0,0,.95-.68l.63-1.89,1.78.89A1,1,0,0,0,18,20.13L20.13,18a1,1,0,0,0,.19-1.15l-.89-1.78,1.89-.63A1,1,0,0,0,22,13.5v-3A1,1,0,0,0,21.32,9.55ZM20,12.78l-1.2.4A2,2,0,0,0,17.64,16l.57,1.14-1.1,1.1L16,17.64a2,2,0,0,0-2.79,1.16l-.4,1.2H11.22l-.4-1.2A2,2,0,0,0,8,17.64l-1.14.57-1.1-1.1L6.36,16A2,2,0,0,0,5.2,13.18L4,12.78V11.22l1.2-.4A2,2,0,0,0,6.36,8L5.79,6.89l1.1-1.1L8,6.36A2,2,0,0,0,10.82,5.2l.4-1.2h1.56l.4,1.2A2,2,0,0,0,16,6.36l1.14-.57,1.1,1.1L17.64,8a2,2,0,0,0,1.16,2.79l1.2.4ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                    </svg>
                    <p class="sidebar__caption">Settings</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Feedback" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M11.29,15.29a1.58,1.58,0,0,0-.12.15.76.76,0,0,0-.09.18.64.64,0,0,0-.06.18,1.36,1.36,0,0,0,0,.2.84.84,0,0,0,.08.38.9.9,0,0,0,.54.54.94.94,0,0,0,.76,0,.9.9,0,0,0,.54-.54A1,1,0,0,0,13,16a1,1,0,0,0-.29-.71A1,1,0,0,0,11.29,15.29ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20ZM12,7A3,3,0,0,0,9.4,8.5a1,1,0,1,0,1.73,1A1,1,0,0,1,12,9a1,1,0,0,1,0,2,1,1,0,0,0-1,1v1a1,1,0,0,0,2,0v-.18A3,3,0,0,0,12,7Z" />
                    </svg>
                    <p class="sidebar__caption">Feedback</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="../logout.php" class="sidebar__link">
                    <svg alt="Logout" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z" />
                    </svg>
                    <p class="sidebar__caption">Logout</p>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Nav Bar -->
    <header class="navbar">
        <nav class="navigation">
            <h1 class="navigation__title h3">
                <!-- This would change depending on the URL or the current page  -->
                Services
            </h1>
             <form class="navigation__search" action="../search-result.php" method="GET">



                <input name="search_input" type="text" class="navigation__search__bar" placeholder="Search patient last name" /><!--  
                --><button type="submit" class="navigation__search__btn">
                    <svg class="search-icon navigation__search__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256.001 256.001"><rect width="256" height="256" fill="none"/><circle cx="115.997" cy="116" r="84"  stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/><line x1="175.391" x2="223.991" y1="175.4" y2="224.001"  stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/></svg>
                  </button>
            </form>

            <button id="nav-btn" class="navigation__btn btn-green">
                <p>Add New</p>
                <svg class="add-icon navigation__btn__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512" viewBox="0 0 512 512"><path fill="#231f20" d="M468.3,212.7H305.2v-169c0-24.2-19.6-43.8-43.8-43.8c-24.2,0-43.8,19.6-43.8,43.8v169h-174 C19.6,212.7,0,232.3,0,256.5c0,24.2,19.6,43.8,43.8,43.8h174v168c0,24.2,19.6,43.8,43.8,43.8c24.2,0,43.8-19.6,43.8-43.8v-168h163.1 c24.2,0,43.8-19.6,43.8-43.8C512,232.3,492.5,212.7,468.3,212.7z"/></svg>
            </button>
        </nav>
    </header>

    <!-- Contents -->
    <main class="add-child_care-male">
        <section class="form">
            <p class="back__btn">
                Back
            </p>
            <h2 class="add-child_care-male__title">
                Add Target Client list for Child Care Male
            </h2>
            <p class="add-child_care-male__desc">
                Fill up necessary information to complete the process
            </p>

            <form action="../includes/add_query.php" method="POST" class="add-child_care-male__form"> <!--ACTION AND METHOD ADDED-->

                <!-- <div class="add-child_care-male__form-item">
                    <label for="child_care-male-number">No.</label>
                    <input type="text" name="child_care-male-number" id="child_care-male-number">
                </div> -->
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-registration">Date of Registration</label>
                    <input type="date" name="child_care-male-registration" id="child_care-male-registration">
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-birthdate">Date of Birthdate</label>
                    <input type="date" name="child_care-male-birthdate" id="child_care-male-birthdate">
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-family-serial">Family Serial No.</label>
                    <input type="text" name="child_care-male-family-serial" id="child_care-male-family-serial">
                </div>
                <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                    <label for="se-status">SE Status</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="se-status" id="se-status-nhts" value="NHTS"> <!--Value added-->
                            <label for="bhw-chn">NHTS</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="se-status" id="se-status-non-nhts" value="NON NHTS"> <!--Value added-->
                            <label for="bhw-bhw">NON NHTS</label>
                        </div>
                    </div>
                </div>
                
                <!-- Divider -->
                <hr>
                
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-child-name">Name of Child</label>
                    <div class="three-input">
                        <div class="three-input__item">
                            <input type="text" name="child_care-male-first-name" id="child_care-male-first-name">
                            <label for="child_care-male-first-name">First Name</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="child_care-male-middle-inital" id="child_care-male-middle-inital">
                            <label for="child_care-male-middle-inital">MI</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="child_care-male-last-name" id="child_care-male-last-name">
                            <label for="child_care-male-last-name">Last Name</label>
                        </div>
                    </div>                    
                </div>
                <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                    <label for="se-status">Sex</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-male-sex" id="child_care-male-sex-m" value="Male"> <!--Value added-->
                            <label for="child_care-male-sex-m">Male</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-male-sex" id="child_care-male-sex-f" value="Female"> <!--Value added-->
                            <label for="child_care-male-sex-f">Female</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-mother-name">Complete Name of Mother</label>
                    <div class="three-input">
                        <div class="three-input__item">
                            <input type="text" name="child_care-male-mother-first-name" id="child_care-male-mother-first-name">
                            <label for="child_care-male-first-name">First Name</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="child_care-male-mother-middle-inital" id="child_care-male-mother-middle-inital">
                            <label for="child_care-male-mother-middle-inital">MI</label>
                        </div>
                        <div class="three-input__item">
                            <input type="text" name="child_care-male-mother-last-name" id="child_care-male-last-name"> <!--name="child_care-male-last-name" change into child_care-male-mother-last-name-->
                            <label for="child_care-male-last-name">Last Name</label>
                        </div>
                    </div>                    
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-address">Complete Address</label>
                    <textarea name="child_care-male-address" id="child_care-male-address" cols="27" rows="5"></textarea>
                </div>

                <!-- Divider -->
                <hr>

                <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                    <label for="child_care-male--cpab">Child Protected at Birth (CPAB)</label>
                    <div class="add-user__form--role-item">
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-male--cpab" id="child_care-male--tt2" value="TT2/Td2 given a month prior to delivery"> <!--Value added-->
                            <label for="child_care-male--tt2">TT2/Td2 given a month prior to delivery</label>
                        </div>
                        <div class="add-user__form-item">
                            <input type="radio" name="child_care-male--cpab" id="child_care-male--tt3" value="TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery"> <!--Value added-->
                            <!-- <label for="child_care-male--tt2">TT2/Td2 given a month prior to delivery</label> --> <!--to be remove due to repeated code-->
                            <label for="child_care-male--tt3">TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery</label>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr>

                <h2 class="add-child_care-male__title">
                    Newborn (0-28 days old)
                </h2>
                <p class="add-child_care-male__desc">
                    Fill up necessary information to complete the process
                </p>
                
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-newborn-length">Length at Birth <br>(cm)</label>
                    <input type="text" name="child_care-male-newborn-length" id="child_care-male-newborn-length">
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male--newbornweight">Status(Birth Weight)     <br>(kg)</label>
                    <input type="tel" name="child_care-male-newborn-weight" id="child_care-male-newborn-weight">
                </div>
                <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                    <label for="child_care-male-newborn-weight">Weight at Birth <br>(kg)</label>
                        <div class="add-user__form--role-item">
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-newborn-weight-status" id="child_care-male-newborn-weight-low" value="L: low: < 2500gms"> <!--name="child_care-male-newborn-weight" CHANGE INTO name="child_care-male-newborn-weight-status" AND value added-->
                                <label for="child_care-male-newborn-weight-low">L: low: < 2500gms </label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-newborn-weight-status" id="child_care-male-newborn-weight-normal" value="N:normal: >= 2500gms"> <!--name="child_care-male-newborn-weight" CHANGE INTO name="child_care-male-newborn-weight-status" AND value added-->
                                <label for="child_care-male-newborn-weight-normal">N:normal: >= 2500gms </label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-newborn-weight-status" id="child_care-male-newborn-weight-unknown" value="U:unknown"> <!--name="child_care-male-newborn-weight" CHANGE INTO name="child_care-male-newborn-weight-status" AND value added-->
                                <label for="child_care-male-newborn-weight-unknown">U:unknown </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-male__form-item add-child_care-male__form-item--textarea">
                    <label for="child_care-male-newborn-initiation">
                        Initiation of breastfeeding immediately after birth lasting for at least 90 minutes
                    </label>
                    <textarea name="child_care-male-newborn-initiation" id="child_care-male-newborn-initiation" cols="27" rows="5"></textarea>
                </div>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            Immunization
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-newborn-bcg">BCG</label>
                        <input type="date" name="child_care-male-newborn-bgc" id="child_care-male-newborn-bcg">
                        <label for="child_care-male-newborn-hepa-b">Hepa B- BD</label>
                        <input type="date" name="child_care-male-newborn-hepa-b" id="child_care-male-newborn-hepa-b">
                    </div>
                </div>
                
                <!-- Divider -->
                <hr>

                <h2 class="add-child_care-male__title">
                    1-3 months old
                </h2>
                <p class="add-child_care-male__desc">
                    Nutritional Status Assessment
                </p>
                

                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-age">Age in months</label>
                    <input type="number" name="child_care-male-1mos-age" id="child_care-male-1mos-age">
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-1mos-legth">Length</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-male-1mos-length-cm" id="child_care-male-1mos-length-cm">
                            <label for="child_care-male-length-cm">cm</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-male-1mos-length-date" id="child_care-male-1mos-length-date">
                            <label for="child_care-male-1mos-length-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-1mos-weight">Weight</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-male-1mos-weight-kg" id="child_care-male-1mos-weight-kg">
                            <label for="child_care-male-weight-kg">kg</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-male-1mos-weight-date" id="child_care-male-1mos-weight-date">
                            <label for="child_care-male-weight-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                    <label for="child_care-male-1mos-status">Status</label>
                        <div class="add-user__form--role-item">
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-1mos-status" id="child_care-male-1mos-status-underweight" value="underweight"> <!--Value added-->
                                <label for="child_care-male-1mos-status-underweight">UW = underweight</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-1mos-status" id="child_care-male-1mos-status-stunted" value="stunted"> <!--Value added-->
                                <label for="child_care-male-1mos-status-stunted">S = stunted</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-1mos-status" id="child_care-male-1mos-status-wasted" value="wasted"> <!--Value added-->
                                <label for="child_care-male-1mos-status-wasted">W = wasted</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-1mos-status" id="child_care-male-1mos-status-obese" value="obese/overweight"> <!--Value added-->
                                <label for="child_care-male-1mos-status-obese">O = obese/overweight</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-1mos-status" id="child_care-male-1mos-status-normal" value="normal"> <!--Value added-->
                                <label for="child_care-male-1mos-status-normal">N = normal</label>
                            </div>
                        </div>
                </div>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            Low birth weight given iron
                        </p>
                        <p class="dose-indication">
                            (Write the date)
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-low-weight-1mo">1 &frac12 mo</label>
                        <input type="date" name="child_care-male-low-weight-1mo" id="child_care-male-low-weight-1mo">
                        <label for="child_care-male-low-weight-2mos">2 &frac12 mos</label>
                        <input type="date" name="child_care-male-low-weight-2mos" id="child_care-male-low-weight-2mos">
                        <label for="child_care-male-low-weight-3mos">3 &frac12 mos</label>
                        <input type="date" name="child_care-male-low-weight-3mos" id="child_care-male-low-weight-3mos">
                    </div>
                </div>
                <p class="add-child_care-male__desc add-child_care-male__desc--bold">
                    Immunization
                </p>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            DPT- Hep B-Hb
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-dpt-1">First Dose Date</label>
                        <input type="date" name="child_care-male-dpt-1" id="child_care-male-dpt-1">
                        <label for="child_care-male-dpt-2">Second Dose Date</label>
                        <input type="date" name="child_care-male-dpt-2" id="child_care-male-dpt-2">
                        <label for="child_care-male-dpt-3">Third Dose Date</label>
                        <input type="date" name="child_care-male-dpt-3" id="child_care-male-dpt-3">
                    </div>
                </div>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            OPV
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-opv-1">First Dose Date</label>
                        <input type="date" name="child_care-male-opv-1" id="child_care-male-opv-1">
                        <label for="child_care-male-opv-2">Second Dose Date</label>
                        <input type="date" name="child_care-male-opv-2" id="child_care-male-opv-2">
                        <label for="child_care-male-opv-3">Third Dose Date</label>
                        <input type="date" name="child_care-male-opv-3" id="child_care-male-opv-3">
                    </div>
                </div>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            PCV
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-pcv-1">First Dose Date</label>
                        <input type="date" name="child_care-male-pcv-1" id="child_care-male-pcv-1">
                        <label for="child_care-male-pcv-2">Second Dose Date</label>
                        <input type="date" name="child_care-male-pcv-2" id="child_care-male-pcv-2">
                        <label for="child_care-male-pcv-3">Third Dose Date</label>
                        <input type="date" name="child_care-male-pcv-3" id="child_care-male-pcv-3">
                    </div>
                </div>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            IPV
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-ipv">3 1/2 mos</label>
                        <input type="date" name="child_care-male-ipv-1" id="child_care-male-ipv-1">
                    </div>
                </div>
                <div class="add-child_care-male__form-doses add-child_care-male__form-doses--checkbox">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            Exclusive Breastfeeding*
                        </p>
                        <p class="dose-indication">
                            Place a check () During the following immunization visit of the child at 1 ½ , 2 ½ and 3 ½ months old, ask if child continues to be exclusively breastfed, Place a check () on each column
                        </p>
                    </div>
                    <div class="add-child_care-male__form--role-item">
                        <div class="add-child_care-male__form-item">
                            <input type="checkbox" name="child_care-male--breastfeeding1" id="child_care-male--breastfeeding-1" value="1 ½ mos"> <!--value added--> <!--child_care-male--breastfeeding CHANGE TO child_care-male--breastfeeding1-->
                            <label class="checkbox-label" for="child_care-male--breastfeeding-1">1 ½ mos</label>
                        </div>
                        <div class="add-child_care-male__form-item">
                            <input type="checkbox" name="child_care-male--breastfeeding2" id="child_care-male--breastfeeding-2" value="2 ½ mos"> <!--value added--> <!--child_care-male--breastfeeding CHANGE TO child_care-male--breastfeeding2-->
                            <label class="checkbox-label" for="child_care-male--breastfeeding-2">2 ½ mos</label>
                        </div>
                        <div class="add-child_care-male__form-item">
                            <input type="checkbox" name="child_care-male--breastfeeding3" id="child_care-male--breastfeeding-3" value="3 ½ mos"> <!--value added--> <!--child_care-male--breastfeeding CHANGE TO child_care-male--breastfeeding3-->
                            <label class="checkbox-label" for="child_care-male--breastfeeding-3">3 ½ mos</label>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr>

                <h2 class="add-child_care-male__title">
                    6-11 months old
                </h2>
                <p class="add-child_care-male__desc">
                    Nutritional Status Assessment
                </p>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-age">Age in months</label>
                    <input type="number" name="child_care-male-6mos-age" id="child_care-male-6mos-age">
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-6mos-legth">Length</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-male-6mos-length-cm" id="child_care-male-6mos-length-cm">
                            <label for="child_care-male-length-cm">cm</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-male-6mos-length-date" id="child_care-male-6mos-length-date">
                            <label for="child_care-male-6mos-length-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-6mos-weight">Weight</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-male-6mos-weight-kg" id="child_care-male-6mos-weight-kg">
                            <label for="child_care-male-weight-kg">kg</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-male-6mos-weight-date" id="child_care-male-6mos-weight-date">
                            <label for="child_care-male-weight-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                    <label for="child_care-male-6mos-status">Status</label>
                        <div class="add-user__form--role-item">
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-6mos-status" id="child_care-male-6mos-status-underweight" value="underweight"> <!--Value added-->
                                <label for="child_care-male-6mos-status-underweight">UW = underweight</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-6mos-status" id="child_care-male-6mos-status-stunted" value="stunted"> <!--Value added-->
                                <label for="child_care-male-6mos-status-stunted">S = stunted</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-6mos-status" id="child_care-male-6mos-status-wasted" value="wasted"> <!--Value added-->
                                <label for="child_care-male-6mos-status-wasted">W = wasted</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-6mos-status" id="child_care-male-6mos-status-obese" value="obese/overweight"> <!--Value added-->
                                <label for="child_care-male-6mos-status-obese">O = obese/overweight</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-6mos-status" id="child_care-male-6mos-status-normal" value="normal"> <!--Value added-->
                                <label for="child_care-male-6mos-status-normal">N = normal</label>
                            </div>
                        </div>
                </div>

                <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                    <label for="child_care-male-6mos-breastfed">Exclusively* Breastfed up to 6 months</label>
                        <div class="add-user__form--role-item">
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-6mos-status-exclusive" id="child_care-male-6mos-status-underweight" value="Yes"> <!--value added--> <!--child_care-male-6mos-status CHANGE INTO child_care-male-6mos-status-exclusive DUE TO SAME name--->
                                <label for="child_care-male-6mos-status-breastfed-yes">Yes</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-6mos-status-exclusive" id="child_care-male-6mos-status-stunted" value="No"> <!--value added--> <!--child_care-male-6mos-status CHANGE INTO child_care-male-6mos-status-exclusive DUE TO SAME name--->
                                <label for="child_care-male-6mos-status-breastfed-no">No</label>
                            </div>
                        </div>
                </div>
                <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                    <label for="child_care-male-complementary-feeding">Introduction of Complementary Feeding** at 6 months old</label>
                        <div class="add-user__form--role-item">
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-complementary-feeding" id="child_care-male-complementary-feeding-1" value="with continued breastfeeding"> <!--value added-->
                                <label for="child_care-male-6mos-status-breastfed-yes">1 - with continued breastfeeding</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-complementary-feeding" id="child_care-male-complementary-feeding-2" value="no longer breastfeeding or never breastfed"> <!--value added-->
                                <label for="child_care-male-6mos-status-breastfed-no">2 - no longer breastfeeding or never breastfed</label>
                            </div>
                        </div>
                </div>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            Vitamin A
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-vit-a">Date Given</label>
                        <input type="date" name="child_care-male-vit-a" id="child_care-male-vit-a" placeholder="First Dose Date">    
                    </div>
                </div>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            MNP
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-mnp">Date when 90 sachets given</label>
                        <input type="date" name="child_care-male-mnp" id="child_care-male-mnp" placeholder="First Dose Date">    
                    </div>
                </div>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            MMR Dose 1 at 9th month
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-mmr">Date Given</label>
                        <input type="date" name="child_care-male-mmr" id="child_care-male-mmr" placeholder="First Dose Date">    
                    </div>
                </div>

                <!-- Divider -->
                <hr>

                <h2 class="add-child_care-male__title">
                    12 months old
                </h2>
                <p class="add-child_care-male__desc">
                    Nutritional Status Assessment
                </p>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-age">Age in months</label>
                    <input type="number" name="child_care-male-12mos-age" id="child_care-male-12mos-age">
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-12mos-legth">Length</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-male-12mos-length-cm" id="child_care-male-12mos-length-cm">
                            <label for="child_care-male-length-cm">cm</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-male-12mos-length-date" id="child_care-male-12mos-length-date">
                            <label for="child_care-male-12mos-length-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-12mos-weight">Weight</label>
                    <div class="two-input">
                        <div class="two-input__item">
                            <input type="text" name="child_care-male-12mos-weight-kg" id="child_care-male-12mos-weight-kg">
                            <label for="child_care-male-weight-kg">kg</label>
                        </div>
                        <div class="two-input__item">
                            <input type="date" name="child_care-male-12mos-weight-date" id="child_care-male-12mos-weight-date">
                            <label for="child_care-male-weight-date">Date Taken</label>
                        </div>
                    </div>
                </div>
                <div class="add-child_care-male__form-item add-child_care-male__form-item--radio">
                    <label for="child_care-male-12mos-status">Status</label>
                        <div class="add-user__form--role-item">
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-12mos-status" id="child_care-male-12mos-status-underweight" value="underweight"><!--value added-->
                                <label for="child_care-male-12mos-status-underweight">UW = underweight</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-12mos-status" id="child_care-male-12mos-status-stunted" value="stunted"><!--value added-->
                                <label for="child_care-male-12mos-status-stunted">S = stunted</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-12mos-status" id="child_care-male-12mos-status-wasted" value="wasted"><!--value added-->
                                <label for="child_care-male-12mos-status-wasted">W = wasted</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-12mos-status" id="child_care-male-12mos-status-obese" value="obese/overweight"><!--value added-->
                                <label for="child_care-male-12mos-status-obese">O = obese/overweight</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-male-12mos-status" id="child_care-male-12mos-status-normal" value="normal"><!--value added-->
                                <label for="child_care-male-12mos-status-normal">N = normal</label>
                            </div>
                        </div>
                </div>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            MMR Dose 2 at 12th month
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-12mos-mmr">Date Given</label>
                        <input type="date" name="child_care-male-12mos-mmr" id="child_care-male-12mos-mmr" placeholder="First Dose Date">    
                    </div>
                </div>
                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            FIC***
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-fic">Date</label>
                        <input type="date" name="child_care-male-fic" id="child_care-male-fic" placeholder="First Dose Date">    
                    </div>
                </div>

                <!-- Divider -->
                <hr>

                <div class="add-child_care-male__form-doses">
                    <div class="add-child_care-male__form-label">
                        <p class="dose-title">
                            CIC
                        </p>
                    </div>
                    <div class="add-child_care-male__form-input">
                        <label for="child_care-male-12mos-mmr">Date Given</label>
                        <input type="date" name="child_care-male-12mos-cic" id="child_care-male-cic" placeholder="First Dose Date"> <!--child_care-male-12mos-mmr CHANGE INTO child_care-male-12mos-cic-->    
                    </div>
                </div>
                <div class="add-child_care-male__form-item">
                    <label for="child_care-male-remarks">Remarks</label>
                    <textarea name="child_care-male-remarks" id="child_care-male-remarks" cols="27" rows="5"></textarea>
                </div>  
                
                <!-- Divider -->
                <hr>

                <div class="add-child_care-male__form-btn">
                    <button type="submit" class="btn-green btn-add" name="add_childcare_male" onclick="return  confirm('Do you want to add this record?')"> <!--added name-->
                        Add
                    </button>
                    <button type="reset" class="btn-red btn-cancel" onclick="return  confirm('Do you want to clear?')"> <!--added type and onclick-->
                        Clear
                    </button>
                </div>
                <!-- Query to get the user session name -->
                <?php 
                    include '../includes/connection.php';
                    $query = "SELECT * FROM account_information WHERE account_id = '".$_SESSION['account_id']."'";
                    $query_run = mysqli_query($conn, $query);

                    if(mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $user){
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
                    <a href="">Add Early Childhood Care and Development</a>
                </li>
                <li class="content__item content__item--active">
                    <a href="">Newborn (0-28 days old) </a>
                </li>
                <li class="content__item">
                    <a href="">1-3 months old</a>
                </li>
                <li class="content__item">
                    <a href="">6-11 months old</a>
                </li>
                <li class="content__item">
                    <a href="">12 months old </a>
                </li>
            </ul>
        </section>
    </main>
    <script src="./js/app.js"></script>
</body>

</html>
 