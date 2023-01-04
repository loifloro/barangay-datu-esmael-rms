<?php
session_start();
include '../includes/connection.php';
if ((!isset($_SESSION['account_id']) || !isset($_SESSION['phone_num'])) || !isset($_SESSION['position'])) {
    header("Location: ../index.php?error=You are not logged in"); /*Redirect to this page if successful*/
    exit();
}
//FUNCTION TO HIDE CONTENT BASED ON USER LEVEL
include_once "../includes/functions.php";
hide_content_forms();
//END OF FUNCTION
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <script src="/barangay-datu-esmael-rms/node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <title>Edit Post-natal</title>
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
 
            <li class="sidebar__item" id="backup_sidebar">
                <a href="../archive.php" class="sidebar__link">
                    <svg alt="Backup" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1H8.62a1,1,0,0,0,0-2H6.22A8,8,0,1,1,4,12a1,1,0,0,0-2,0A10,10,0,1,0,12,2Zm0,6a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h2a1,1,0,0,0,0-2H13V9A1,1,0,0,0,12,8Z" />
                    </svg>
                    <p class="sidebar__caption">Archive</p>
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
            <li class="sidebar__item" id="masterlist_sidebar">
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
            <li class="sidebar__item" onclick="logoutAlert()">
                <a href="#" class="sidebar__link">
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
                Edit Post-natal
            </h1>
             <form class="navigation__search" action="../search-result.php" method="GET">
                <input name="search_input" type="text" class="navigation__search__bar" placeholder="Search patient last name" /><!--  
                --><button type="submit" class="navigation__search__btn">
                    <svg class="search-icon navigation__search__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256.001 256.001"><rect width="256" height="256" fill="none"/><circle cx="115.997" cy="116" r="84"  stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/><line x1="175.391" x2="223.991" y1="175.4" y2="224.001"  stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/></svg>
                  </button>
            </form>

            <button id="nav-btn" class="navigation__btn btn-green">
                <p>Add Record</p>
                <svg class="add-icon navigation__btn__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512" viewBox="0 0 512 512"><path fill="#231f20" d="M468.3,212.7H305.2v-169c0-24.2-19.6-43.8-43.8-43.8c-24.2,0-43.8,19.6-43.8,43.8v169h-174 C19.6,212.7,0,232.3,0,256.5c0,24.2,19.6,43.8,43.8,43.8h174v168c0,24.2,19.6,43.8,43.8,43.8c24.2,0,43.8-19.6,43.8-43.8v-168h163.1 c24.2,0,43.8-19.6,43.8-43.8C512,232.3,492.5,212.7,468.3,212.7z"/></svg>
            </button>
        </nav>
    </header>

    <!-- Contents -->
    <main class="edit-prenatal">
        <section class="form" id='personal'>
            <p class="back__btn">
                <a href="#" onclick="backAlert()">Back</a>   
            </p>
            <h2 class="edit-postnatal__title">
                Edit Postnatal Record

            </h2>
            <p class="edit-prenatal__desc">
                Fill out  necessary information to complete the process
            </p>

            <form action="../includes/edit_query.php" method='POST' class="edit-prenatal__form">
                    <?php
                        if(isset($_GET['id']))
                        {
                            $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM postnatal WHERE postnatal_id='$patient_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $patient = mysqli_fetch_array($query_run);
                    ?>
                <input type="hidden" name="prenatal_id" value="<?= $patient['postnatal_id']; ?>"> <!--nakahide sya para access ID sa edit-->

                <div class="edit-prenatal__form-item">
                    <label for="prenatal-date">Date Registered</label>
                    <input type="date" name="prenatal-date" id="prenatal-date" value="<?= $patient['postnatal_date']; ?>">
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-lname">Last Name *</label>
                    <input type="text" name="prenatal-lname" id="prenatal-lname" value="<?= $patient['lastname']; ?>" required>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-fname">First Name *</label>
                    <input type="text" name="prenatal-fname" id="prenatal-fname" value="<?= $patient['firstname']; ?>" required>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-mname">Middle Name</label>
                    <input type="text" name="prenatal-mname" id="prenatal-mname" value="<?= $patient['middlename']; ?>">
                </div>
                <!-- <div class="edit-prenatal__form-item">
                    <label for="prenatal-age">Age *</label>
                    <input type="number" name="prenatal-age" id="prenatal-age" maxlength="2" min="1" value="<?= $patient['age']; ?>" required>
                </div> -->
                <!-- <div class="edit-prenatal__form-item edit-prenatal__form-item--radio">
                    <label for="prenatal-sex">Gender</label>
                    <div class="edit-prenatal__form--role-item">
                        <div class="edit-prenatal__form-item">
                            <input type="radio" name="prenatal-sex" id="prenatal-sex--female" value="Male">
                            <label for="prenatal-sex">Male</label>
                        </div>
                        <div class="edit-prenatal__form-item">
                            <input type="radio" name="prenatal-sex" id="prenatal-sex--female" value="Female">
                            <label for="prenatal-sex">Female</label>
                        </div>
                    </div>
                </div> -->
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-birthday">Birthday *</label>
                    <input type="date" name="prenatal-birthday" id="prenatal-birthday" value="<?= $patient['birthdate']; ?>" required>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-street">Street Address *</label>
                    <input type="text" name="prenatal-street" id="prenatal-street" value="<?= $patient['street_address']; ?>" required>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-barangay">Barangay *</label>
                    <input type="text" name="prenatal-barangay" id="prenatal-barangay" value="<?= $patient['barangay']; ?>" required>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-city">City *</label>
                    <input type="text" name="prenatal-city" id="prenatal-city" value="<?= $patient['city']; ?>" required>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-contact">Phone Number</label>
                    <input type="number" name="prenatal-contact" id="prenatal-contact" value="<?= $patient['phone_num']; ?>" maxlength="11" min="1">
                </div>
                
                
                <!-- Divider -->
                <hr id='symptom'>

                <h2 class="edit-prenatal__title">
                    Symptoms
                </h2>
                <p class="edit-prenatal__desc">
                    Fill out  necessary information to complete the process
                </p>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-symptoms">Symptoms</label>
                    <textarea name="prenatal-symptoms" id="prenatal-symptoms" cols="27" rows="10"><?= $patient['symptoms']; ?></textarea>
                </div>
                
                <div class="edit-prenatal__form-doses">
                    <div class="edit-prenatal__form-label">
                        <p class="dose-title">
                            Blood Pressure
                        </p>
                    </div>
                    <div class="edit-prenatal__form-input">
                        <label for="prenatal-bp">mmHg</label>
                        <input type="text" name="prenatal-bp" id="prenatal-bp" value="<?= $patient['blood_pressure']; ?>">
                    </div>
                </div>
                <div class="edit-prenatal__form-doses">
                    <div class="edit-prenatal__form-label">
                        <p class="dose-title">
                            Weight
                        </p>
                    </div>
                    <div class="edit-prenatal__form-input">
                        <label for="prenatal-weight">kg</label>
                        <input type="text" name="prenatal-weight" id="prenatal-weight" value="<?= $patient['weight']; ?>">
                    </div>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-height">Height</label>
                    <input type="text" name="prenatal-height" id="prenatal-height" value="<?= $patient['height']; ?>">
                </div>


                <!-- Divider -->
                <hr id='ob'>

                <h2 class="edit-prenatal__title">
                    OB History
                </h2>
                <p class="edit-prenatal__desc">
                    Fill out  necessary information to complete the process
                </p>

                <div class="edit-prenatal__form-item">
                    <label for="prenatal-gravida">Gravida *</label>
                    <input type="text" name="prenatal-gravida" id="prenatal-gravida" value="<?= $patient['gravida']; ?>" required>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-p">P *</label>
                    <input type="text" name="prenatal-preterm" id="prenatal-p" value="<?= $patient['preterm']; ?>" required>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-lmp">LMP</label>
                    <input type="text" name="prenatal-lmp" id="prenatal-lmp" value="<?= $patient['last_menstrual']; ?>">
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-edc">EDC *</label>
                    <input type="text" name="prenatal-edc" id="prenatal-edc" value="<?= $patient['edc']; ?>" required>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-aog">AOG *</label>
                    <input type="text" name="prenatal-aog" id="prenatal-aog" value="<?= $patient['aog']; ?>" required>
                </div>



                <!-- Divider -->
                <hr id='abdomen'>

                <h2 class="edit-prenatal__title">
                    Abdomen
                </h2>
                <p class="edit-prenatal__desc">
                    Fill out  necessary information to complete the process
                </p>
                
                <div class="edit-prenatal__form-doses">
                    <div class="edit-prenatal__form-label">
                        <p class="dose-title">
                            Fetal heart (FH)
                        </p>
                    </div>
                    <div class="edit-prenatal__form-input">
                        <label for="prenatal-fh">cm</label>
                        <input type="text" name="prenatal-fh" id="prenatal-fh" value="<?= $patient['fetal_heart']; ?>">
                    </div>
                </div>
                <div class="edit-prenatal__form-doses">
                    <div class="edit-prenatal__form-label">
                        <p class="dose-title">
                            Fetal heart tones (FHT)
                        </p>
                    </div>
                    <div class="edit-prenatal__form-input">
                        <label for="prenatal-fht">/min</label>
                        <input type="text" name="prenatal-fht" id="prenatal-fht" value="<?= $patient['fetal_heart_tones']; ?>">
                    </div>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-presentation">Presentation</label>
                    <input type="text" name="prenatal-presentation" id="prenatal-presentation" value="<?= $patient['presentation']; ?>">
                </div>

                <!-- Divider -->
                <hr id='tetanus'>

                <h2 class="edit-prenatal__title">
                    Tetanus Toxoid Status:
                </h2>
                <p class="edit-prenatal__desc">
                    Fill out  necessary information to complete the process
                </p>
                
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-a">A</label>
                    <textarea name="prenatal-a" id="prenatal-a" cols="27" rows="10"><?= $patient['a']; ?></textarea>
                </div>
                <div class="edit-prenatal__form-item">
                    <label for="prenatal-p">P</label>
                    <input type="text" name="prenatal-p" id="prenatal-p" value="<?= $patient['p']; ?>">
                </div>
                
                <!-- Divider -->
                <hr id='reason'>

                <h2 class="edit-prenatal__reason">
                    Reason
                </h2>
                <p class="edit-prenatal__reason-desc">
                    Fill out  necessary info *
                </p>

                <!-- Radio Buttons -->
                <div class="edit-prenatal__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-mispelled-name" value="Mispelled Name" required>
                    <label for="patient-mispelled">Mispelled Name</label>
                </div>
                <div class="edit-prenatal__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-incorrect-gender" value="Incorrect Gender" required>
                    <label for="patient-mispelled">Incorrect Gender</label>
                </div>
                <div class="edit-prenatal__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-incorrect-birthdate" value="Incorrect Birthdate" required>
                    <label for="patient-mispelled">Incorrect Birthdate</label>
                </div>
                <div class="edit-prenatal__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-wrong-address" value="Wrong Address" required>
                    <label for="patient-mispelled">Wrong Address</label>
                </div>
                <div class="edit-prenatal__form-item--reason">
                    <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                    <label for="patient-others">Others: </label>
                    <input type="text" name="patient-others" id="patient-others">
                </div>

                <!-- Divider -->
                <hr>

                <div class="edit-prenatal__form-btn">
                    <button type="submit" class="btn-green btn-add" name="edit_postnatal" onclick="return  confirm('Do you want to edit this record?')">
                        Edit
                    </button>
                    <button type="button" class="btn-red btn-cancel" onclick="backAlert()"> <!--added type and onclick-->
                        Cancel
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
                    <a href="#personal">Personal Information</a>
                </li>
                <li class="content__item content__item--active">
                    <a href="#symptom">Symptoms</a>
                </li>
                <li class="content__item content__item--active">
                    <a href="#ob">OB History</a>
                </li>
                <li class="content__item">
                    <a href="#abdomen">Abdomen</a>
                </li>
                <li class="content__item">
                    <a href="#tetanus">Tetanus Toxoid Status</a>
                </li>
                <li class="content__item">
                    <a href="#reason">Reasons</a>
                </li>
            </ul>
        </section>
    </main>
    <script src="../js/app.js"></script>
</body>

</html>
 