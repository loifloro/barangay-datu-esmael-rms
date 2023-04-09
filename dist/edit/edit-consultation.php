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
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Edit Consultation</title>
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

            <li class="sidebar__item" id="backup_sidebar"> <!--added id-->
                <a href="../archive.php" class="sidebar__link">
                    <svg alt="Backup" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12,2A10,10,0,0,0,5.12,4.77V3a1,1,0,0,0-2,0V7.5a1,1,0,0,0,1,1H8.62a1,1,0,0,0,0-2H6.22A8,8,0,1,1,4,12a1,1,0,0,0-2,0A10,10,0,1,0,12,2Zm0,6a1,1,0,0,0-1,1v3a1,1,0,0,0,1,1h2a1,1,0,0,0,0-2H13V9A1,1,0,0,0,12,8Z" />
                    </svg>
                    <p class="sidebar__caption">Archive</p>
                </a>
            </li>
            <hr class="sidebar__line" />
            <li class="sidebar__item sidebar__item--active">
                <a href="../services.php" class="sidebar__link">
                    <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                    </svg>
                    <p class="sidebar__caption">Services</p>
                </a>
            </li>
            <li class="sidebar__item" id="masterlist_sidebar">
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
                    <p class="sidebar__caption"><?php echo $_SESSION['firstname']; ?></p>
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
                Edit Consultation Record
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
    <main class="edit-consultation">
        <section class="form" id='personal'>
            <p class="back__btn">
                <a href="#" onclick="backAlert()">Back</a>
            </p>
            </p>
            <h2 class="edit-consultation__title">
                Edit Consultation Record
            </h2>
            <p class="edit-consultation__desc">
                Fill out necessary information to complete the process
            </p>

            <form action="../includes/edit_query.php" method='POST' class="edit-consultation__form">
                <?php
                include "../includes/connection.php";
                if (isset($_GET['id'])) {
                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                    $query = "SELECT * FROM consultation WHERE consultation_id='$patient_id' ";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $patient = mysqli_fetch_array($query_run);
                ?>
                        <input type="hidden" name="consultation_id" value="<?= $patient['consultation_id']; ?>">

                        <div class="edit-consultation__form-item">
                            <label for="consultation-date">Registration Date</label>
                            <input type="date" name="consultation-date" id="consultation-date" value="<?= $patient['consultation_date']; ?>">
                        </div>
                        <div class="add-consultation__form-item">
                            <label for="consultation-email">Username (optional)</label>
                            <input type="text" name="consultation-email" id="consultation-email" value="<?= $patient['consultation_email']; ?>">
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-lname">Last Name *</label>
                            <input type="text" name="consultation-lname" id="consultation-lname" value="<?= $patient['lastname']; ?>" required>
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-fname">First Name *</label>
                            <input type="text" name="consultation-fname" id="consultation-fname" value="<?= $patient['firstname']; ?>" required>
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-mname">Middle Name</label>
                            <input type="text" name="consultation-mname" id="consultation-mname" value="<?= $patient['middlename']; ?>">
                        </div>
                        <div class="edit-consultation__form-item edit-consultation__form-item--radio">
                            <label for="consultation-sex">Sex *</label>
                            <div class="edit-consultation__form--role-item">
                                <div class="edit-consultation__form-item">
                                    <input type="radio" name="consultation-sex" id="consultation-sex-male" value="Male" <?= ($patient['sex'] == 'Male') ? 'checked' : '' ?> required>
                                    <label for="consultation-sex-male">Male</label>
                                </div>
                                <div class="edit-consultation__form-item">
                                    <input type="radio" name="consultation-sex" id="consultation-sex-female" value="Female" <?= ($patient['sex'] == 'Female') ? 'checked' : '' ?> required>
                                    <label for="consultation-sex-female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-birthday">Birthday *</label>
                            <input type="date" name="consultation-birthday" id="consultation-birthday" value="<?= $patient['birthdate']; ?>" required>
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-street">Street Address *</label>
                            <input type="text" name="consultation-street" id="consultation-street" value="<?= $patient['street_address']; ?>" required>
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-barangay">Barangay *</label>
                            <input type="text" name="consultation-barangay" id="consultation-barangay" value="<?= $patient['barangay']; ?>" required>
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-city">City *</label>
                            <input type="text" name="consultation-city" id="consultation-city" value="<?= $patient['city']; ?>" required>
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-contact">Phone Number</label>
                            <input type="number" name="consultation-contact" id="consultation-contact" maxlength="11" min="0" value="<?= $patient['phone_number']; ?>">
                        </div>


                        <!-- Divider -->
                        <hr id='symptom'>

                        <h2 class="edit-consultation__title">
                            Symptoms
                        </h2>
                        <p class="edit-consultation__desc">
                            Fill out necessary information to complete the process
                        </p>

                        <div class="edit-consultation__form-item">
                            <label for="consultation-symptoms">Symptoms *</label>
                            <textarea name="consultation-symptoms" id="consultation-symptoms" cols="27" rows="10" required><?= $patient['symptoms']; ?></textarea>
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-bp">Blood pressure (mmhg)</label>
                            <input type="text" name="consultation-bp" id="consultation-bp" value="<?= $patient['blood_pressure']; ?>">
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-weight">Weight (kg)</label>
                            <input type="text" name="consultation-weight" id="consultation-weight" value="<?= $patient['weight']; ?>">
                        </div>

                        <!-- Divider -->
                        <hr id='lab'>

                        <h2 class="edit-consultation__title">
                            Laboratory Results
                        </h2>
                        <p class="edit-consultation__desc">
                            Fill out necessary information to complete the process
                        </p>

                        <div class="edit-consultation__form-item">
                            <label for="consultation-a">Abnormality</label>
                            <input type="text" name="consultation-a" id="consultation-a" value="<?= $patient['abnormal']; ?>">
                        </div>
                        <div class="edit-consultation__form-item">
                            <label for="consultation-prescriptions">Prescriptions *</label>
                            <textarea name="consultation-prescriptions" id="consultation-prescriptions" cols="27" rows="10" required><?= $patient['prescriptions']; ?></textarea>
                        </div>

                        <!-- Divider -->
                        <hr id='reason'>

                        <h2 class="edit-consultation__reason">
                            Reason
                        </h2>
                        <p class="edit-consultation__reason-desc">
                            Fill out necessary info *
                        </p>

                        <!-- Radio Buttons -->
                        <div class="edit-consultation__form-item--reason">
                            <input type="radio" name="edit-reason" id="edit-reason-mispelled" value="Mispelled Name" required>
                            <label for="edit-reason-mispelled">Mispelled Name</label>
                        </div>
                        <div class="edit-consultation__form-item--reason">
                            <input type="radio" name="edit-reason" id="edit-reason-gender" value="Incorrect Sex" required>
                            <label for="edit-reason-gender">Incorrect Sex</label>
                        </div>
                        <div class="edit-consultation__form-item--reason">
                            <input type="radio" name="edit-reason" id="edit-reason-bdate" value="Incorrect Birthdate" required>
                            <label for="edit-reason-bdate">Incorrect Birthdate</label>
                        </div>
                        <div class="edit-consultation__form-item--reason">
                            <input type="radio" name="edit-reason" id="edit-reason-address" value="Wrong Address" required>
                            <label for="edit-reason-address">Wrong Address</label>
                        </div>
                        <div class="edit-consultation__form-item--reason">
                            <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                            <label for="patient-others">Others: </label>
                            <input type="text" name="patient-others" id="patient-others">
                        </div>

                        <!-- Divider -->
                        <hr>

                        <div class="edit-consultation__form-btn">
                            <button type="submit" class="btn-green btn-add" name="edit_consultation">
                                Save
                            </button>
                            <button type="button" class="btn-red btn-cancel" onclick="backAlert()"> <!--added type and onclick-->
                                Cancel
                            </button>
                        </div>
                <?php
                    } else {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
                ?>
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
                <!-- QUERY END -->
            </form>
        </section>

        <section class="contents">
            <ul class="contents__list">
                <li class="content__item content__item--active">
                    <a href="#personal">Personal Information</a>
                </li>
                <li class="content__item">
                    <a href="#symptom">Symptom</a>
                </li>
                <li class="content__item">
                    <a href="#lab">Laboratory Results</a>
                </li>
                <li class="content__item">
                    <a href="#reason">Reason</a>
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