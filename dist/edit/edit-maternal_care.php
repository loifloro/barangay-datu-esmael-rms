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
    <link rel="stylesheet" href="../css/main.css">
    <script src="/barangay-datu-esmael-rms/node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <title>Edit Maternal Care</title>
</head>

<body class="grid">
    <!-- Sidebar -->
    <aside role="navigation" class="sidebar">
        <ul role="list" class="sidebar__list">
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
                <a href="../services-consultation.php" class="sidebar__link">
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
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Feedback" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M11.29,15.29a1.58,1.58,0,0,0-.12.15.76.76,0,0,0-.09.18.64.64,0,0,0-.06.18,1.36,1.36,0,0,0,0,.2.84.84,0,0,0,.08.38.9.9,0,0,0,.54.54.94.94,0,0,0,.76,0,.9.9,0,0,0,.54-.54A1,1,0,0,0,13,16a1,1,0,0,0-.29-.71A1,1,0,0,0,11.29,15.29ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20ZM12,7A3,3,0,0,0,9.4,8.5a1,1,0,1,0,1.73,1A1,1,0,0,1,12,9a1,1,0,0,1,0,2,1,1,0,0,0-1,1v1a1,1,0,0,0,2,0v-.18A3,3,0,0,0,12,7Z" />
                    </svg>
                    <p class="sidebar__caption">Feedback</p>
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
            <h1 class="navigation__title h3">
                <!-- This would change depending on the URL or the current page  -->
                Edit Early-childhood
            </h1>
            <input type="text" class="navigation__search" placeholder="Search patient last name">
            <button id="nav-btn" class="navigation__btn btn-green">
                Add New
            </button>
        </nav>
    </header>

    <!-- Contents -->
    <main class="edit-maternal_care">
        <section class="form" id='edit-target'>
            <p class="back__btn">
                <a href="#" onclick="backAlert()">Back</a>
            </p>
            <h2 class="edit-maternal_care__title">
                Edit Target Client list for Maternal Care
            </h2>
            <p class="edit-maternal_care__desc">
                Fill out necessary information to complete the process
            </p>

            <form action="../includes/edit_query.php" method='POST' class="edit-maternal_care__form"> <!--added action and method-->
                <!-- Start Query -->
                <?php
                include "../includes/connection.php";
                if (isset($_GET['id'])) {
                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                    $query = "SELECT * FROM target_maternal WHERE target_maternal_id='$patient_id'";
                    $query_run = mysqli_query($conn, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $patient = mysqli_fetch_array($query_run);
                ?>
                        <input type="hidden" name="target_maternal_id" value="<?= $patient['target_maternal_id']; ?>"> <!--nakahide sya para access ID sa edit-->
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-registration">Date of Registration *</label>
                            <input type="date" name="maternal_care-registration" id="maternal_care-registration" value="<?= $patient['date_registered']; ?>" required>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-family-serial">Family Serial No.</label>
                            <input type="text" name="maternal_care-family-serial" id="maternal_care-family-serial" value="<?= $patient['serial']; ?>">
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-child-name">Name</label>
                            <div class="three-input">
                                <div class="three-input__item">
                                    <input type="text" name="maternal_care-first-name" id="maternal_care-first-name" value="<?= $patient['firstname']; ?>" required>
                                    <label for="maternal_care-first-name">First Name *</label>
                                </div>
                                <div class="three-input__item">
                                    <input type="text" name="maternal_care-middle-inital" id="maternal_care-middle-inital" value="<?= $patient['middle_initial']; ?>">
                                    <label for="maternal_care-middle-inital">MI</label>
                                </div>
                                <div class="three-input__item">
                                    <input type="text" name="maternal_care-last-name" id="maternal_care-last-name" value="<?= $patient['lastname']; ?>" required>
                                    <label for="maternal_care-last-name">Last Name *</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-address">Complete Address *</label>
                            <textarea name="maternal_care-address" id="maternal_care-address" cols="27" rows="5" required><?= $patient['complete_address']; ?></textarea>
                        </div>
                        <div class="edit-maternal_care__form-item edit-maternal_care__form-item--radio">
                            <label for="bhw-contact">Socio Economic Status</label>
                            <div class="add-user__form--role-item">
                                <div class="add-user__form-item">
                                    <input type="radio" name="se-status" id="se-status-nhts" value="NHTS" <?= ($patient['socio_status'] == 'NHTS') ? 'checked' : '' ?>>
                                    <label for="bhw-chn">NHTS</label>
                                </div>
                                <div class="add-user__form-item">
                                    <input type="radio" name="se-status" id="se-status-non-nhts" value="NON NHTS" <?= ($patient['socio_status'] == 'NON NHTS') ? 'checked' : '' ?>>
                                    <label for="bhw-bhw">NON NHTS</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-1mos-legth">Age</label>
                            <div class="two-input">
                                <div class="two-input__item">
                                    <input type="number" name="maternal_care-age" id="maternal_care-age" value="<?= $patient['age']; ?>" required>
                                    <label for="maternal_care-age">Age *</label>
                                </div>
                                <div class="two-input__item">
                                    <input type="date" name="maternal_care-birthday" id="maternal_care-birthday" value="<?= $patient['birthday']; ?>" required>
                                    <label for="maternal_care-birthday">Birthday *</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-lmp">LMP *</label>
                            <input type="date" name="maternal_care-lmp" id="maternal_care-lmp" value="<?= $patient['lmp']; ?>" required>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-gp">G-P *</label>
                            <input type="number" name="maternal_care-gp" id="maternal_care-gp" value="<?= $patient['gp']; ?>" required>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-edc">EDC *</label>
                            <input type="date" name="maternal_care-edc" id="maternal_care-edc" value="<?= $patient['edc']; ?>" required>
                        </div>

                        <!-- Divider -->
                        <hr id='dates'>

                        <h2 class="edit-maternal_care__title">
                            Dates of Pre-natal Check-ups
                        </h2>
                        <p class="edit-maternal_care__desc">
                            Fill out necessary information to complete the process
                        </p>

                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-1st-tri">1st Tri</label>
                            <input type="date" name="maternal_care-1st-tri" id="maternal_care-1st-tri" value="<?= $patient['tri1_pre_checkup']; ?>">
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-2nd-tri">2nd Tri</label>
                            <input type="date" name="maternal_care-2nd-tri" id="maternal_care-2nd-tri" value="<?= $patient['tri2_pre_checkup']; ?>">
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-3rd-tri">3rd Tri</label>
                            <input type="date" name="maternal_care-3rd-tri" id="maternal_care-3rd-tri" value="<?= $patient['tri3_pre_checkup']; ?>">
                        </div>


                        <!-- Divider -->
                        <hr id='immunization'>

                        <h2 class="edit-maternal_care__title">
                            Immunization Status
                        </h2>
                        <p class="edit-maternal_care__desc">
                            Fill out necessary information to complete the process
                        </p>
                        <div class="edit-maternal_care__form-doses">
                            <div class="edit-maternal_care__form-label">
                                <p class="dose-title">
                                    Date Tetanus diptheria (Td) or Tetanus Toxoid (TT) given
                                </p>
                            </div>
                            <div class="edit-maternal_care__form-input">
                                <label for="maternal_care-td1">Td1/TT1</label>
                                <input type="text" name="maternal_care-td1" id="maternal_care-td1" value="<?= $patient['td1_tetanus']; ?>">
                                <label for="maternal_care-td2">Td2/TT2</label>
                                <input type="text" name="maternal_care-td2" id="maternal_care-td2" value="<?= $patient['td2_tetanus']; ?>">
                                <label for="maternal_care-td3">Td3/TT3</label>
                                <input type="text" name="maternal_care-td3" id="maternal_care-td3" value="<?= $patient['td3_tetanus']; ?>">
                                <label for="maternal_care-td4">Td4/TT4</label>
                                <input type="text" name="maternal_care-td4" id="maternal_care-td4" value="<?= $patient['td4_tetanus']; ?>">
                                <label for="maternal_care-td5">Td5/TT5</label>
                                <input type="text" name="maternal_care-td5" id="maternal_care-td5" value="<?= $patient['td5_tetanus']; ?>">
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item edit-maternal_care__form-item--checkbox">
                            <label for="">
                            </label>
                            <div class="edit-maternal_care__form--role-item">
                                <div class="edit-maternal_care__form-item">
                                    <input type="checkbox" name="maternal_care-fim" id="maternal_care-fim" value="FIM Status" <?= ($patient['fim_status'] == 'FIM Status') ? 'checked' : '' ?>>
                                    <label for="maternal_care-fim">FIM Status</label>
                                </div>
                            </div>
                        </div>

                        <hr id='micronutrient'>

                        <h2 class="edit-maternal_care__title">
                            Micronutrient Supplementation
                        </h2>
                        <p class="edit-maternal_care__desc">

                        </p>

                        <p class="edit-maternal_care__desc edit-maternal_care__desc--bold">
                            Iron sulfate with Folic Acid
                        </p>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-iron-1">1st visit (1st tri) </label>
                            <div class="two-input">
                                <div class="two-input__item">
                                    <input type="number" name="maternal_care-iron-1-tablet" id="maternal_care-iron-1-tablet" value="<?= $patient['tri1_tablet_iron']; ?>">
                                    <label for="maternal_care-iron-1-tablet">Number of Tablets Given</label>
                                </div>
                                <div class="two-input__item">
                                    <input type="date" name="maternal_care-iron-1-date" id="maternal_care-iron-1-date" value="<?= $patient['tri1_date_iron']; ?>">
                                    <label for="maternal_care-iron-1-date">Date Given</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-iron-2">2nd visit (2nd tri)</label>
                            <div class="two-input">
                                <div class="two-input__item">
                                    <input type="number" name="maternal_care-iron-2-tablet" id="maternal_care-iron-2-tablet" value="<?= $patient['tri2_tablet_iron']; ?>">
                                    <label for="maternal_care-iron-2-tablet">Number of Tablets Given</label>
                                </div>
                                <div class="two-input__item">
                                    <input type="date" name="maternal_care-iron-2-date" id="maternal_care-iron-2-date" value="<?= $patient['tri2_date_iron']; ?>">
                                    <label for="maternal_care-iron-2-date">Date Given</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-iron-3">3rd visit (3rd tri)</label>
                            <div class="two-input">
                                <div class="two-input__item">
                                    <input type="number" name="maternal_care-iron-3-tablet" id="maternal_care-iron-3-tablet" value="<?= $patient['tri3_tablet_iron']; ?>">
                                    <label for="maternal_care-iron-3-tablet">Number of Tablets Given</label>
                                </div>
                                <div class="two-input__item">
                                    <input type="date" name="maternal_care-iron-3-date" id="maternal_care-iron-3-date" value="<?= $patient['tri3_date_iron']; ?>"><!--maternal_care-iron-1-date CHANGE TO maternal_care-iron-3-date-->
                                    <label for="maternal_care-iron-3-date">Date Given</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-iron-4">4rd visit (4rd tri)</label>
                            <div class="two-input">
                                <div class="two-input__item">
                                    <input type="number" name="maternal_care-iron-4-tablet" id="maternal_care-iron-4-tablet" value="<?= $patient['tri4_tablet_iron']; ?>">
                                    <label for="maternal_care-iron-4-tablet">Number of Tablets Given</label>
                                </div>
                                <div class="two-input__item">
                                    <input type="date" name="maternal_care-iron-4-date" id="maternal_care-iron-4-date" value="<?= $patient['tri4_date_iron']; ?>"><!--maternal_care-iron-1-date CHANGE TO maternal_care-iron-4-date-->
                                    <label for="maternal_care-iron-4-date">Date Given</label>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <p class="edit-maternal_care__desc edit-maternal_care__desc--bold">
                            Calcium Carbonate
                        </p>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-calcium-2">2nd visit (2nd tri) </label>
                            <div class="two-input">
                                <div class="two-input__item">
                                    <input type="number" name="maternal_care-calcium-2-capsule" id="maternal_care-calcium-2-capsule" value="<?= $patient['tri2_tablet_calcium']; ?>">
                                    <label for="maternal_care-calcium-2-capsule">Number of Capsules Given</label>
                                </div>
                                <div class="two-input__item">
                                    <input type="date" name="maternal_care-calcium-2-date" id="maternal_care-calcium-2-date" value="<?= $patient['tri2_date_calcium']; ?>">
                                    <label for="maternal_care-calcium-2-date">Date Given</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-calcium-3">3rd visit (3rd tri)</label>
                            <div class="two-input">
                                <div class="two-input__item">
                                    <input type="number" name="maternal_care-calcium-3-capsule" id="maternal_care-calcium-3-capsule" value="<?= $patient['tri3_tablet_calcium']; ?>">
                                    <label for="maternal_care-calcium-3-capsule">Number of Capsule Given</label>
                                </div>
                                <div class="two-input__item">
                                    <input type="date" name="maternal_care-calcium-3-date" id="maternal_care-calcium-3-date" value="<?= $patient['tri3_date_calcium']; ?>">
                                    <label for="maternal_care-calcium-3-date">Date Given</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-calcium-4">4rd visit (4rd tri)</label>
                            <div class="two-input">
                                <div class="two-input__item">
                                    <input type="number" name="maternal_care-calcium-4-capsule" id="maternal_care-calcium-4-capsule" value="<?= $patient['tri4_tablet_calcium']; ?>">
                                    <label for="maternal_care-calcium-4-capsule">Number of Capsule Given</label>
                                </div>
                                <div class="two-input__item">
                                    <input type="date" name="maternal_care-calcium-4-date" id="maternal_care-calcium-4-date" value="<?= $patient['tri4_date_calcium']; ?>"><!--maternal_care-calcium-1-date CHANGE TO maternal_care-calcium-4-date-->
                                    <label for="maternal_care-calcium-4-date">Date Given</label>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <p class="edit-maternal_care__desc edit-maternal_care__desc--bold">
                            Iodine Capsules
                        </p>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-iodine-1">1st visit (1st tri) </label>
                            <div class="two-input">
                                <div class="two-input__item">
                                    <input type="number" name="maternal_care-iodine-1-capsule" id="maternal_care-iodine-1-capsule" value="<?= $patient['tri1_tablet_iodine']; ?>">
                                    <label for="maternal_care-iodine-1-capsule">Number of Capsules Given</label>
                                </div>
                                <div class="two-input__item">
                                    <input type="date" name="maternal_care-iodine-1-date" id="maternal_care-iodine-1-date" value="<?= $patient['tri1_date_iodine']; ?>">
                                    <label for="maternal_care-iodine-1-date">Date Given</label>
                                </div>
                            </div>
                        </div>

                        <hr id='nutritional'>
                        <h2 class="edit-maternal_care__title">
                            Nutritional Assessment
                        </h2>
                        <p class="edit-maternal_care__desc">
                            (Write the BMI for 1st Tri)
                        </p>
                        <div class="edit-maternal_care__form-item">
                            <label for="maternal_care-1st-tri-weight">Weight (kg)</label>
                            <input type="text" name="maternal_care-1st-tri-weight" id="maternal_care-1st-tri-weight" value="<?= $patient['weight']; ?>">
                        </div>
                        <div class="edit-maternal_care__form-doses">
                            <div class="edit-maternal_care__form-label">
                                <p class="dose-title">
                                    Deworming Tablet
                                </p>
                            </div>
                            <div class="edit-maternal_care__form-input">
                                <label for="maternal_care-deworming-tablet">Date Given 2nd or 3rd Tris</label>
                                <input type="date" name="maternal_care-deworming-tablet" id="maternal_care-deworming-tablet" value="<?= $patient['deworming_tablet']; ?>">
                            </div>
                        </div>


                        <hr id='infectious'>
                        <h2 class="edit-maternal_care__title">
                            Infectious Disease Surveillance
                        </h2>
                        <p class="edit-maternal_care__desc">

                        </p>
                        <div class="edit-maternal_care__form-doses">
                            <div class="edit-maternal_care__form-label">
                                <p class="dose-title">
                                    Syphilis Screening
                                </p>
                                <p class="dose-indication">
                                    RPR or RDT Result
                                </p>
                            </div>
                            <div class="edit-maternal_care__form-input">
                                <label for="maternal_care-syphilis-screening-date">Date</label>
                                <input type="date" name="maternal_care-syphilis-screening-date" id="maternal_care-syphilis-screening-date" value="<?= $patient['syphilis_date']; ?>">
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item edit-maternal_care__form-item--radio">
                            <label for="maternal_care-syphilis-screening-status">Status</label>
                            <div class="add-user__form--role-item">
                                <div class="add-user__form-item">
                                    <input type="radio" name="maternal_care-syphilis-screening-status" id="maternal_care-syphilis-screening-status-positive" value="Positive" <?= ($patient['syphilis_status'] == 'Positive') ? 'checked' : '' ?>>
                                    <label for="maternal_care-syphilis-screening-status-positive">Positive</label>
                                </div>
                                <div class="add-user__form-item">
                                    <input type="radio" name="maternal_care-syphilis-screening-status" id="maternal_care-syphilis-screening-status-negative" value="Negative" <?= ($patient['syphilis_status'] == 'Negative') ? 'checked' : '' ?>>
                                    <label for="maternal_care-syphilis-screening-status-negative">Negative</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-doses">
                            <div class="edit-maternal_care__form-label">
                                <p class="dose-title">
                                    Hepatitis B Screening
                                </p>
                                <p class="dose-indication">
                                    Result of HBsAg Test
                                </p>
                            </div>
                            <div class="edit-maternal_care__form-input">
                                <label for="maternal_care-hepatitis-screening-date">Date</label>
                                <input type="date" name="maternal_care-hepatitis-screening-date" id="maternal_care-hepatitis-screening-date" value="<?= $patient['hepatitis_date']; ?>">
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-item edit-maternal_care__form-item--radio">
                            <label for="maternal_care-hepatitis-screening-status">Status</label>
                            <div class="add-user__form--role-item">
                                <div class="add-user__form-item">
                                    <input type="radio" name="maternal_care-hepatitis-screening-status" id="maternal_care-hepatitis-screening-status-positive" value="Positive" <?= ($patient['hepatitis_status'] == 'Positive') ? 'checked' : '' ?>>
                                    <label for="maternal_care-hepatitis-screening-status-positive">Positive</label>
                                </div>
                                <div class="add-user__form-item">
                                    <input type="radio" name="maternal_care-hepatitis-screening-status" id="maternal_care-hepatitis-screening-status-negative" value="Negative" <?= ($patient['hepatitis_status'] == 'Negative') ? 'checked' : '' ?>>
                                    <label for="maternal_care-hepatitis-screening-status-negative">Negative</label>
                                </div>
                            </div>
                        </div>
                        <div class="edit-maternal_care__form-doses">
                            <div class="edit-maternal_care__form-label">
                                <p class="dose-title">
                                    HIV Screening
                                </p>
                                <!-- <p class="dose-indication">
                            Result of HBsAg Test
                        </p> -->
                            </div>
                            <div class="edit-maternal_care__form-input">
                                <label for="maternal_care-hiv-screening-date">Date Screened</label>
                                <input type="date" name="maternal_care-hiv-screening-date" id="maternal_care-hiv-screening-date" value="<?= $patient['hiv_screen_date']; ?>">
                            </div>
                        </div>

                        <!-- Divider -->
                        <hr id='reason'>

                        <h2 class="edit-maternal_care-female__reason">
                            Reason
                        </h2>
                        <p class="edit-maternal_care-female__reason-desc">
                            Fill out necessary info
                        </p>

                        <!-- Radio Buttons -->
                        <div class="edit-maternal_care-female__form-item--reason">
                            <input type="radio" name="edit-reason" id="patient-mispelled-name" value="Mispelled Name" required>
                            <label for="patient-mispelled">Mispelled Name</label>
                        </div>
                        <div class="edit-maternal_care-female__form-item--reason">
                            <input type="radio" name="edit-reason" id="patient-incorrect-gender" value="Incorrect Gender" required>
                            <label for="patient-mispelled">Incorrect Gender</label>
                        </div>
                        <div class="edit-maternal_care-female__form-item--reason">
                            <input type="radio" name="edit-reason" id="patient-incorrect-birthdate" value="Incorrect Birthdate" required>
                            <label for="patient-mispelled">Incorrect Birthdate</label>
                        </div>
                        <div class="edit-maternal_care-female__form-item--reason">
                            <input type="radio" name="edit-reason" id="patient-wrong-address" value="Wrong Address" required>
                            <label for="patient-mispelled">Wrong Address</label>
                        </div>
                        <div class="edit-maternal_care-female__form-item--reason">
                            <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                            <label for="patient-others">Others: </label>
                            <input type="text" name="patient-others" id="patient-others">
                        </div>

                        <!-- Divider -->
                        <hr>

                        <div class="edit-maternal_care__form-btn">
                            <button type="submit" class="btn-green btn-add" name="edit_maternal_list"> <!--name added-->
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
                    <a href="#edit-target">Edit Target Client list for Maternal Care </a>
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
                    <a href="#nutritional">Nutritional Assessment </a>
                </li>
                <li class="content__item">
                    <a href="#infectious">Infectious Disease Surveillance </a>
                </li>
                <li class="content__item">
                    <a href="#reason">Reason </a>
                </li>
            </ul>
        </section>
    </main>
    <script src="../js/app.js"></script>
</body>

</html>