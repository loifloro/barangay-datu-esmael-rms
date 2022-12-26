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
    <title>Edit Early-childhood</title>
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
                Edit Early-childhood Record
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
    <main class="edit-early_childhood">
        <section class="form">
            <p class="back__btn">
                <a href="#" onclick="backAlert()">Back</a>   
            </p></p>
            <h2 class="edit-early_childhood__title">
                Edit Early Childhood Care and Development Care
            </h2>
            <p class="edit-early_childhood__desc">
                Fill up necessary information to complete the process
            </p>

            <form action="../includes/edit_query.php" method='POST' class="edit-early_childhood__form">
                    <?php
                        include "../includes/connection.php";
                        if(isset($_GET['id']))
                        {
                            $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM early_childhood WHERE early_childhood_id ='$patient_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $patient = mysqli_fetch_array($query_run);
                    ?>

                <input type="hidden" name="early_childhood_id" value="<?= $patient['early_childhood_id']; ?>"> <!--nakahide sya para access ID sa edit-->
                
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-date">Registration Date</label>
                    <input type="date" name="early_childhood-added_date" id="early_childhood-clinic" value="<?= $patient['early_childhood_date']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-clinic">Clinic/Health Center</label>
                    <input type="text" name="early_childhood-clinic" id="early_childhood-clinic" value="<?= $patient['clinic']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-street">Street Address</label>
                    <input type="text" name="early_childhood-streetadd" id="early_childhood-barangay" value="<?= $patient['street_address']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-barangay">Barangay</label>
                    <input type="text" name="early_childhood-barangay" id="early_childhood-barangay" value="<?= $patient['barangay']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-city">City Address</label>
                    <input type="text" name="early_childhood-city" id="early_childhood-barangay" value="<?= $patient['city']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-purol">Purol/Sitio</label>
                    <input type="text" name="early_childhood-purol" id="early_childhood-purol" value="<?= $patient['purok']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-childfname">Child First Name</label>
                    <input type="text" name="early_childhood-childfname" id="early_childhood-childname" value="<?= $patient['child_fname']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-childmname">Child Middle Name</label>
                    <input type="text" name="early_childhood-childmname" id="early_childhood-childname" value="<?= $patient['child_mname']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-childlname">Child Last Name</label>
                    <input type="text" name="early_childhood-childlname" id="early_childhood-childname" value="<?= $patient['child_lname']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-hospital">Hospital</label>
                    <textarea name="early_childhood-hospital" id="early_childhood-hospital" cols="27" rows="7"><?= $patient['hospital']; ?></textarea>
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-lic">LIC</label>
                    <input type="text" name="early_childhood-lic" id="early_childhood-lic" value="<?= $patient['lic']; ?>">
                </div>
                <div class="edit-early_childhood__form-item edit-early_childhood__form-item--radio">
                    <label for="early_childhood-sex">Sex</label>
                    <div class="edit-early_childhood__form--role-item">
                        <div class="edit-early_childhood__form-item">
                            <input type="radio" name="early_childhood-sex" id="early_childhood-sex--female" value="Male" <?= ($patient['sex']=='Male')? 'checked' : '' ?>>
                            <label for="early_childhood-sex">Male</label>
                        </div>
                        <div class="edit-early_childhood__form-item">
                            <input type="radio" name="early_childhood-sex" id="early_childhood-sex--female" value="Female" <?= ($patient['sex']=='Female')? 'checked' : '' ?>>
                            <label for="early_childhood-sex">Female</label>
                        </div>
                    </div>
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-street">Time Delivery</label>
                    <input type="text" name="early_childhood-time" id="early_childhood-street" value="<?= $patient['time_delivery']; ?>">
                </div>
                
                <!-- Divider -->
                <hr>

                <h2 class="edit-early_childhood__title">
                    Mother Information
                </h2>
                <p class="edit-early_childhood__desc">
                    Fill up necessary information to complete the process
                </p>
                
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-mother-name">Name</label>
                    <input type="text" name="early_childhood-mother-name" id="early_childhood-mother-name" value="<?= $patient['mother_name']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-pregnancies">No. of Pregnancies</label>
                    <input type="number" name="early_childhood-pregnancies" id="early_childhood-pregnancies" value="<?= $patient['no_pregnancies']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-mother-education">Educational Attainment</label>
                    <input type="text" name="early_childhood-mother-education" id="early_childhood-mother-education" value="<?= $patient['mother_educ']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-mother-age">Age</label>
                    <input type="number" name="early_childhood-mother-age" id="early_childhood-mother-age" value="<?= $patient['mother_age']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-mother-occupation">Occupation</label>
                    <input type="text" name="early_childhood-mother-occupation" id="early_childhood-mother-occupation" value="<?= $patient['mother_occupation']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-mother-birthdate">Birthdate</label>
                    <input type="date" name="early_childhood-mother-birthdate" id="early_childhood-mother-birthdate" value="<?= $patient['mother_birthdate']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-status">Status</label>
                    <input type="text" name="early_childhood-status" id="early_childhood-status" value="<?= $patient['status']; ?>">
                </div>

                <!-- Divider -->
                <hr>

                <h2 class="edit-early_childhood__title">
                    Father Information
                </h2>
                <p class="edit-early_childhood__desc">
                    Fill up necessary information to complete the process
                </p>
                
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-father-name">Name</label>
                    <input type="text" name="early_childhood-father-name" id="early_childhood-father-name" value="<?= $patient['father_name']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-father-contact">Phone Number</label>
                    <input type="number" name="early_childhood-father-contact" id="early_childhood-father-contact" value="<?= $patient['phone_num']; ?>" maxlength="11" min="1">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-father-education">Educational Attainment</label>
                    <input type="text" name="early_childhood-father-education" id="early_childhood-father-education" value="<?= $patient['father_educ']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-father-age">Age</label>
                    <input type="number" name="early_childhood-father-age" id="early_childhood-father-age" value="<?= $patient['father_age']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-father-occupation">Occupation</label>
                    <input type="text" name="early_childhood-father-occupation" id="early_childhood-father-occupation" value="<?= $patient['father_occupation']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-father-birthdate">Birthdate</label>
                    <input type="date" name="early_childhood-father-birthdate" id="early_childhood-father-birthdate" value="<?= $patient['father_birthdate']; ?>">
                </div>
                
                
                <!-- Divider -->
                <hr>

                <h2 class="edit-early_childhood__title">
                    Childhood Information
                </h2>
                <p class="edit-early_childhood__desc">
                    Fill up necessary information to complete the process
                </p>

                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-child-birthdate">Birthdate</label>
                    <input type="date" name="early_childhood-child-birthdate" id="early_childhood-child-birthdate" value="<?= $patient['child_birthdate']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-gestational">Gestational Age of Birth</label>
                    <input type="number" name="early_childhood-gestational" id="early_childhood-gestational" value="<?= $patient['gestational_age']; ?>">
                </div>
                <div class="edit-early_childhood__form-item edit-early_childhood__form-item--radio">
                    <label for="early_childhood-birth">Type of Birth</label>
                    <div class="edit-early_childhood__form--role-item">
                        <div class="edit-early_childhood__form-item">
                            <input type="radio" name="early_childhood-birth" id="early_childhood-birth--normal" value="Normal" <?= ($patient['birth_type']=='Normal')? 'checked' : '' ?>>
                            <label for="early_childhood-birth">Normal</label>
                        </div>
                        <div class="edit-early_childhood__form-item">
                            <input type="radio" name="early_childhood-birth" id="early_childhood-birth--cs" value="CS" <?= ($patient['birth_type']=='CS')? 'checked' : '' ?>>
                            <label for="early_childhood-birth">CS</label>
                        </div>
                    </div>
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-birth-order">Birth Order</label>
                    <input type="number" name="early_childhood-birth-order" id="early_childhood-birth-order" value="<?= $patient['birth_order']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-birth-weight">Birth Weight</label>
                    <input type="number" name="early_childhood-birth-weight" id="early_childhood-birth-weight" value="<?= $patient['birth_weight']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-birth-length">Birth Length</label>
                    <input type="number" name="early_childhood-birth-length" id="early_childhood-birth-length" value="<?= $patient['birth_length']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-birth-place">Place of Delivery</label>
                    <!-- <input type="number" name="early_childhood-birth-lenght" id="early_childhood-birth-lenght"> -->
                    <select name="early_childhood-birth-place" id="">
                        <option value="Home" <?= ($patient['place_delivery']=='Home')? 'selected' : '' ?>>Home</option>
                        <option value="Lying In" <?= ($patient['place_delivery']=='Lying In')? 'selected' : '' ?>>Lying In</option>
                        <option value="Hospital" <?= ($patient['place_delivery']=='Hospital')? 'selected' : '' ?>>Hospital</option>
                        <option value="Others" <?= ($patient['place_delivery']=='Others')? 'selected' : '' ?>>Others</option>
                    </select>
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-child-accomodation">Date of Birth Accomodation</label>
                    <input type="date" name="early_childhood-child-accomodation" id="early_childhood-child-accomodation" value="<?= $patient['birth_accomodate']; ?>">
                </div>
                <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-birth-attendant">Birth Attendant</label>
                    <!-- <input type="number" name="early_childhood-birth-lenght" id="early_childhood-birth-lenght"> -->
                    <select name="early_childhood-birth-attendant" id="">
                        <option value="Doctor" <?= ($patient['birth_attendant']=='Doctor')? 'selected' : '' ?>>Doctor</option>
                        <option value="Midwife" <?= ($patient['birth_attendant']=='Midwife')? 'selected' : '' ?>>Midwife</option>
                        <option value="Nurse" <?= ($patient['birth_attendant']=='Nurse')? 'selected' : '' ?>>Nurse</option>
                        <option value="Hilot" <?= ($patient['birth_attendant']=='Hilot')? 'selected' : '' ?>>Hilot</option>
                        <option value="Others" <?= ($patient['birth_attendant']=='Others')? 'selected' : '' ?>>Others</option>
                    </select>
                </div>

                
                <!-- Divider -->
                <hr>

                <h2 class="edit-early_childhood__title">
                    Vaccine Remarks
                </h2>
                <p class="edit-early_childhood__desc">
                    Fill up necessary information to complete the process
                </p>
                
                <div class="edit-early_childhood__form-doses">
                    <div class="edit-early_childhood__form-label">
                        <p class="dose-title">
                            BCG
                        </p>
                        <p class="dose-indication">
                            Tubercolosis
                        </p>
                    </div>
                    <div class="edit-early_childhood__form-input">
                        <label for="early_childhood-child-early_childhood-bgc-1">First Dose Date</label>
                        <input type="date" name="early_childhood-bgc-1" id="early_childhood-bgc-1" placeholder="First Dose Date" value="<?= $patient['bcg1_date']; ?>">
                        <label for="early_childhood-child-early_childhood-bgc-2">Second Dose Date</label>
                        <input type="date" name="early_childhood-bgc-2" id="early_childhood-bgc-2" placeholder="Second Dose Date" value="<?= $patient['bcg2_date']; ?>">
                        <label for="early_childhood-child-early_childhood-bgc-3">Third Dose Date</label>
                        <input type="date" name="early_childhood-bgc-3" id="early_childhood-bgc-3" placeholder="Third Dose Date" value="<?= $patient['bcg3_date']; ?>">
                        <label for="early_childhood-child-early_childhood-catch-up">Catch up Dose Date</label>
                        <input type="date" name="early_childhood-catch-up" id="early_childhood-catch-up" placeholder="Catch up Dose Date" value="<?= $patient['bcg_catchup_date']; ?>">
                    </div>
                </div>
                <div class="edit-early_childhood__form-doses">
                    <div class="edit-early_childhood__form-label">
                        <p class="dose-title">
                            HEP B
                        </p>
                        <p class="dose-indication">
                            Hepatatitis B
                        </p>
                    </div>
                    <div class="edit-early_childhood__form-input">
                        <label for="early_childhood-child-early_childhood-hebp-1">First Dose Date</label>
                        <input type="date" name="early_childhood-hebp-1" id="early_childhood-hebp-1" placeholder="First Dose Date" value="<?= $patient['hepb1_date']; ?>">
                        <label for="early_childhood-child-early_childhood-hebp-2">Second Dose Date</label>
                        <input type="date" name="early_childhood-hebp-2" id="early_childhood-hebp-2" placeholder="Second Dose Date" value="<?= $patient['hepb2_date']; ?>">
                        <label for="early_childhood-child-early_childhood-hebp-3">Third Dose Date</label>
                        <input type="date" name="early_childhood-hebp-3" id="early_childhood-hebp-3" placeholder="Third Dose Date" value="<?= $patient['hepb3_date']; ?>">
                        <label for="early_childhood-child-early_childhood-hebp-catch-up">Catch up Dose Date</label>
                        <input type="date" name="early_childhood-hebp-catch-up" id="early_childhood-hebp-catch-up" placeholder="Catch up Dose Date" value="<?= $patient['hepb_catchup_date']; ?>">
                    </div>
                </div>
                <div class="edit-early_childhood__form-doses">
                    <div class="edit-early_childhood__form-label">
                        <p class="dose-title">
                            Pentavalent
                        </p>
                        <p class="dose-indication">
                            Dipterya, Tetano, Hepa  B, Pertussis, Pulmonya, Meningitis
                        </p>
                    </div>
                    <div class="edit-early_childhood__form-input">
                        <label for="early_childhood-child-early_childhood-pentavalent-1">First Dose Date</label>
                        <input type="date" name="early_childhood-pentavalent-1" id="early_childhood-pentavalent-1" placeholder="First Dose Date" value="<?= $patient['penta1_date']; ?>">
                        <label for="early_childhood-child-early_childhood-hebp-2">Second Dose Date</label>
                        <input type="date" name="early_childhood-pentavalent-2" id="early_childhood-pentavalent-2" placeholder="Second Dose Date" value="<?= $patient['penta2_date']; ?>">
                        <label for="early_childhood-child-early_childhood-hebp-3">Third Dose Date</label>
                        <input type="date" name="early_childhood-pentavalent-3" id="early_childhood-pentavalent-3" placeholder="Third Dose Date" value="<?= $patient['penta3_date']; ?>">
                        <label for="early_childhood-child-early_childhood-hebp-catch-up">Catch up Dose Date</label>
                        <input type="date" name="early_childhood-pentavalent-catch-up" id="early_childhood-pentavalent-catch-up" placeholder="Catch up Dose Date" value="<?= $patient['penta_catchup_date']; ?>">
                    </div>
                </div>
                <div class="edit-early_childhood__form-doses">
                    <div class="edit-early_childhood__form-label">
                        <p class="dose-title">
                            Oral Polio Vaccine
                        </p>
                    </div>
                    <div class="edit-early_childhood__form-input">
                        <label for="early_childhood-child-early_childhood-opv-1">First Dose Date</label>
                        <input type="date" name="early_childhood-opv-1" id="early_childhood-opv-1" placeholder="First Dose Date" value="<?= $patient['oral_polio1_date']; ?>">
                        <label for="early_childhood-child-early_childhood-opv-2">Second Dose Date</label>
                        <input type="date" name="early_childhood-opv-2" id="early_childhood-opv-2" placeholder="Second Dose Date" value="<?= $patient['oral_polio2_date']; ?>">
                        <label for="early_childhood-child-early_childhood-opv-3">Third Dose Date</label>
                        <input type="date" name="early_childhood-opv-3" id="early_childhood-opv-3" placeholder="Third Dose Date" value="<?= $patient['oral_polio3_date']; ?>">
                        <label for="early_childhood-child-early_childhood-opv-catch-up">Catch up Dose Date</label>
                        <input type="date" name="early_childhood-opv-catch-up" id="early_childhood-opv-catch-up" placeholder="Catch up Dose Date" value="<?= $patient['oral_polio_catchup_date']; ?>">
                    </div>
                </div>
                <div class="edit-early_childhood__form-doses">
                    <div class="edit-early_childhood__form-label">
                        <p class="dose-title">
                            Inactivated Polio Vaccine
                        </p>
                    </div>
                    <div class="edit-early_childhood__form-input">
                        <label for="early_childhood-child-early_childhood-ipv-1">First Dose Date</label>
                        <input type="date" name="early_childhood-ipv-1" id="early_childhood-ipv-1" placeholder="First Dose Date" value="<?= $patient['inactive_polio1_date']; ?>">
                        <label for="early_childhood-child-early_childhood-ipv-2">Second Dose Date</label>
                        <input type="date" name="early_childhood-ipv-2" id="early_childhood-ipv-2" placeholder="Second Dose Date" value="<?= $patient['inactive_polio2_date']; ?>">
                        <label for="early_childhood-child-early_childhood-ipv-3">Third Dose Date</label>
                        <input type="date" name="early_childhood-ipv-3" id="early_childhood-ipv-3" placeholder="Third Dose Date" value="<?= $patient['inactive_polio3_date']; ?>">
                        <label for="early_childhood-child-early_childhood-ipv-catch-up">Catch up Dose Date</label>
                        <input type="date" name="early_childhood-ipv-catch-up" id="early_childhood-ipv-catch-up" placeholder="Catch up Dose Date" value="<?= $patient['inactive_polio_catchup_date']; ?>">
                    </div>
                </div>
                <div class="edit-early_childhood__form-doses">
                    <div class="edit-early_childhood__form-label">
                        <p class="dose-title">
                            Pneumococcal Conjugate Vaccine
                        </p>
                    </div>
                    <div class="edit-early_childhood__form-input">
                        <label for="early_childhood-child-early_childhood-pcv-1">First Dose Date</label>
                        <input type="date" name="early_childhood-pcv-1" id="early_childhood-pcv-1" placeholder="First Dose Date" value="<?= $patient['pneumoco1_date']; ?>">
                        <label for="early_childhood-child-early_childhood-pcv-2">Second Dose Date</label>
                        <input type="date" name="early_childhood-pcv-2" id="early_childhood-pcv-2" placeholder="Second Dose Date" value="<?= $patient['pneumoco2_date']; ?>">
                        <label for="early_childhood-child-early_childhood-pcv-3">Third Dose Date</label>
                        <input type="date" name="early_childhood-pcv-3" id="early_childhood-pcv-3" placeholder="Third Dose Date" value="<?= $patient['pneumoco3_date']; ?>">
                        <label for="early_childhood-child-early_childhood-pcv-catch-up">Catch up Dose Date</label>
                        <input type="date" name="early_childhood-pcv-catch-up" id="early_childhood-pcv-catch-up" placeholder="Catch up Dose Date" value="<?= $patient['pneumoco_catchup_date']; ?>">
                    </div>
                </div>
                <div class="edit-early_childhood__form-doses">
                    <div class="edit-early_childhood__form-label">
                        <p class="dose-title">
                            Measles Containing Vaccine
                        </p>
                        <p class="dose-indication">
                            Pulmonya Meningitis
                        </p>
                    </div>
                    <div class="edit-early_childhood__form-input">
                        <label for="early_childhood-child-early_childhood-mcv-1">First Dose Date</label>
                        <input type="date" name="early_childhood-mcv-1" id="early_childhood-mcv-1" placeholder="First Dose Date" value="<?= $patient['measle1_date']; ?>">
                        <label for="early_childhood-child-early_childhood-mcv-2">Second Dose Date</label>
                        <input type="date" name="early_childhood-mcv-2" id="early_childhood-mcv-2" placeholder="Second Dose Date" value="<?= $patient['measle2_date']; ?>">
                        <label for="early_childhood-child-early_childhood-mcv-3">Third Dose Date</label>
                        <input type="date" name="early_childhood-mcv-3" id="early_childhood-mcv-3" placeholder="Third Dose Date" value="<?= $patient['measle3_date']; ?>">
                        <label for="early_childhood-child-early_childhood-mcv-catch-up">Catch up Dose Date</label>
                        <input type="date" name="early_childhood-mcv-catch-up" id="early_childhood-mcv-catch-up" placeholder="Catch up Dose Date" value="<?= $patient['measle_catchup_date']; ?>"> 
                    </div>
                </div>
                <div class="edit-early_childhood__form-doses">
                    <div class="edit-early_childhood__form-label">
                        <p class="dose-title">
                            Vitamin A Supplementation
                        </p>
                    </div>
                    <div class="edit-early_childhood__form-input">
                        <label for="early_childhood-child-early_childhood-vitA-1">First Dose Date</label>
                        <input type="date" name="early_childhood-vitA-1" id="early_childhood-vitA-1" placeholder="First Dose Date" value="<?= $patient['vitamin1_date']; ?>">
                        <label for="early_childhood-child-early_childhood-vitA-2">Second Dose Date</label>
                        <input type="date" name="early_childhood-vitA-2" id="early_childhood-vitA-2" placeholder="Second Dose Date" value="<?= $patient['vitamin2_date']; ?>">
                        <label for="early_childhood-child-early_childhood-vitA-3">Third Dose Date</label>
                        <input type="date" name="early_childhood-vitA-3" id="early_childhood-vitA-3" placeholder="Third Dose Date" value="<?= $patient['vitamin3_date']; ?>">
                        <label for="early_childhood-child-early_childhood-vitA-catch-up">Catch up Dose Date</label>
                        <input type="date" name="early_childhood-vitA-catch-up" id="early_childhood-vitA-catch-up" placeholder="Catch up Dose Date" value="<?= $patient['vitamin_catchup_date']; ?>">
                    </div>
                </div>
                
                <!-- Divider -->
                <hr>

                <h2 class="edit-early_childhood__reason">
                    Reason
                </h2>
                <p class="edit-early_childhood__reason-desc">
                    Fill up necessary info
                </p>

                <!-- Radio Buttons -->
                <div class="edit-early_childhood__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-mispelled-name" value="Mispelled Name">
                    <label for="patient-mispelled">Mispelled Name</label>
                </div>
                <div class="edit-early_childhood__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-incorrect-gender" value="Incorrect Gender">
                    <label for="patient-mispelled">Incorrect Gender</label>
                </div>
                <div class="edit-early_childhood__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-incorrect-birthdate" value="Incorrect Birthdate">
                    <label for="patient-mispelled">Incorrect Birthdate</label>
                </div>
                <div class="edit-early_childhood__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-wrong-address" value="Wrong Address">
                    <label for="patient-mispelled">Wrong Address</label>
                </div>
                <div class="edit-early_childhood__form-item--reason">
                    <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                    <label for="patient-others">Others: </label>
                    <input type="text" name="patient-others" id="patient-others">
                </div>

                <!-- Divider -->
                <hr>

                <div class="edit-early_childhood__form-btn">
                    <button type="submit" class="btn-green btn-add" name="edit_early_childhood" onclick="return  confirm('Do you want to edit this record?')">
                        Save
                    </button>
                    <button type="reset" class="btn-red btn-cancel" onclick="return  confirm('Do you want to clear?')"> <!--added type and onclick-->
                        Clear
                    </button>
                </div>
                <?php
                    }
                    else
                    {
                        echo "<h4>No Such Id Found</h4>";
                    }
                    }
                 ?>
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
                 <!-- QUERY END -->
            </form>
        </section>

        <section class="contents">
            <ul class="contents__list">
                <li class="content__item content__item--active">
                    <a href="">Add Early Childhood Care and Development</a>
                </li>
                <li class="content__item content__item--active">
                    <a href="">Mother Information</a>
                </li>
                <li class="content__item">
                    <a href="">Father Information</a>
                </li>
                <li class="content__item">
                    <a href="">Child Information</a>
                </li>
                <li class="content__item">
                    <a href="">Vaccine Remarks</a>
                </li>
                <li class="content__item">
                    <a href="">Reason</a>
                </li>
            </ul>
        </section>
    </main>
    <script src="../js/app.js"></script>
</body>

</html>
 