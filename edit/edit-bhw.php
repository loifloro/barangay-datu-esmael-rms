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
        <title>Edit BHW</title>
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
                <li class="sidebar__item sidebar__item--active">
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
                <li class="sidebar__item ">
                    <a href="../services.php" class="sidebar__link">
                        <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                        </svg>
                        <p class="sidebar__caption">Services</p>
                    </a>
                </li>
                <li class="sidebar__item" id="masterlist_sidebar"> <!--added id-->
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
                    Patients
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
        <main class="edit-bhw">
            <section class="form" id='personal'>
                <p class="back__btn">
                    <a href="#" onclick="backAlert()">Back</a>
                </p>
                <h2 class="edit-bhw__title">
                    Edit Profile
                </h2>
                <p class="edit-bhw__desc">
                    Fill out necessary information to complete the process
                </p>

                <form action="../includes/edit_query.php" method='POST' class="edit-bhw__form">
                    <?php
                    include "../includes/connection.php";
                    if (isset($_GET['id'])) {
                        $user_id = mysqli_real_escape_string($conn, $_GET['id']);
                        $query = "SELECT * FROM account_information WHERE account_id ='$user_id' ";
                        $query_run = mysqli_query($conn, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $user = mysqli_fetch_array($query_run);
                    ?>
                            <input type="hidden" name="account_id" value="<?= $user['account_id']; ?>"> <!--nakahide sya para access ID sa edit-->

                            <div class="edit-bhw__form-item">
                                <label for="bhw-name">First Name *</label>
                                <input type="text" name="bhw-fname" id="bhw-name" value="<?= $user['firstname']; ?>" required>
                            </div>
                            <div class="edit-bhw__form-item">
                                <label for="bhw-name">Last Name *</label>
                                <input type="text" name="bhw-lname" id="bhw-name" value="<?= $user['lastname']; ?>" required>
                            </div>
                            <div class="edit-bhw__form-item">
                                <label for="bhw-name">Middle Name</label>
                                <input type="text" name="bhw-mname" id="bhw-name" value="<?= $user['middlename']; ?>">
                            </div>
                            <div class="edit-bhw__form-item edit-bhw__form-item--radio">
                                <label for="bhw-sex">Sex *</label>
                                <div class="edit-bhw__form--role-item">
                                    <div class="edit-bhw__form-item">
                                        <input type="radio" name="bhw-sex" id="bhw-sex-male" value="Male" <?= ($user['sex'] == 'Male') ? 'checked' : '' ?> required>
                                        <label for="bhw-sex-male">Male</label>
                                    </div>
                                    <div class="edit-bhw__form-item">
                                        <input type="radio" name="bhw-sex" id="bhw-sex-female" value="Female" <?= ($user['sex'] == 'Female') ? 'checked' : '' ?> required>
                                        <label for="bhw-sex-female">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="edit-bhw__form-item">
                                <label for="bhw-contact">Contact Number</label>
                                <input type="number" name="bhw-contact" id="bhw-contact" value="<?= $user['phone_num']; ?>" maxlength="11" min="0">
                            </div>
                            <?php
                            if ($user['user_email'] == '') {
                                $email = $user['default_email'];
                            ?>
                                <div class="edit-bhw__form-item">
                                    <label for="bhw-contact">New Username *</label>
                                    <input type="text" name="bhw-email" id="bhw-contact" value="" required>
                                </div>
                            <?php
                            }
                            if ($user['default_email'] == '') {
                                $email = $user['user_email'];
                            ?>
                                <div class="edit-bhw__form-item">
                                    <label for="bhw-contact">Username *</label>
                                    <input type="text" name="bhw-email" id="bhw-contact" value="<?= $user['user_email']; ?>" required>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="edit-bhw__form-item">
                                <label for="bhw-birthday">Birthday *</label>
                                <input type="date" name="bhw-birthday" id="bhw-birthday" value="<?= $user['birthday']; ?>" required>
                            </div>
                            <div class="edit-bhw__form-item">
                                <label for="bhw-street-address">Street Address *</label>
                                <input type="text" name="bhw-street-address" id="bhw-street-address" value="<?= $user['street_add']; ?>" required>
                            </div>
                            <div class="edit-bhw__form-item">
                                <label for="bhw-barangay">Barangay *</label>
                                <input type="text" name="bhw-barangay" id="bhw-barangay" value="<?= $user['barangay']; ?>" required>
                            </div>
                            <div class="edit-bhw__form-item">
                                <label for="bhw-city">City *</label>
                                <input type="text" name="bhw-city" id="bhw-city" value="<?= $user['city']; ?>" required>
                            </div>

                            <!-- Divider -->
                            <hr id='security'>

                            <h2 class="edit-bhw__title">
                                Security Question
                            </h2>
                            <p class="edit-bhw__desc">
                                The answer on the security would be needed when resetting a password
                            </p>
                            <div class="edit-bhw__form-item">
                                <label for="bhw-security-question">Security Question *</label>
                                <!-- If it already has a value, it should be disabled -->
                                <select name="bhw-security-question" id="">
                                    <option value="In what city were you born?" value="<?= $user['security_question']; ?>" <?= ($user['security_question'] == 'In what city were you born?') ? 'selected' : '' ?> required>In what city were you born?</option>
                                    <option value="What is the name of your favorite pet?" value="<?= $user['security_question']; ?>" <?= ($user['security_question'] == 'What is the name of your favorite pet?') ? 'selected' : '' ?> required>What is the name of your favorite pet?</option>
                                    <option value="What high school did you attend?" value="<?= $user['security_question']; ?>" <?= ($user['security_question'] == 'What high school did you attend?') ? 'selected' : '' ?> required>What high school did you attend?</option>
                                    <option value="What was the name of your elementary school?" value="<?= $user['security_question']; ?>" <?= ($user['security_question'] == 'What was the name of your elementary school?') ? 'selected' : '' ?> required>What was the name of your elementary school?</option>
                                    <option value="What was the make of your first car?" value="<?= $user['security_question']; ?>" <?= ($user['security_question'] == 'What was the make of your first car?') ? 'selected' : '' ?> required>What was the make of your first car?</option>
                                </select>
                            </div>
                            <div class="edit-bhw__form-item">
                                <label for="bhw-security-question-answer">Security Answer *</label>
                                <input type="text" name="bhw-security-question-answer" id="bhw-security-question-answer" value="<?= $user['security_answer']; ?>" required>
                            </div>

                            <h2 class="edit-bhw__title">
                                Password
                            </h2>
                            <p class="edit-bhw__desc">
                                Enter your account password to proceed
                            </p>
                            <div class="edit-bhw__form-item">
                                <label for="bhw-new-password">New Password</label>
                                <div class="password">
                                    <input type="password" class="password__bar__input" id="bhw-new-password" min="8" name="bhw-new-password" placeholder="Enter your password" /><!--  
                        --><button type="button" class="password__bar__btn" onclick="passwordToggle('bhw-new-password' , 'password-show-p' , 'password-hide-p')">
                                        <svg id='password-show-p' class="password-icon password__bar__icon password-show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                        </svg>
                                        <svg id='password-hide-p' class="password-icon password__bar__icon password-hide password-icon--hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24M1 1l22 22" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="edit-bhw__form-item">
                                <label for="bhw-confirm-new-password">Confirm New Password</label>
                                <div class="password">
                                    <input type="password" class="password__bar__input" id="bhw-confirm-new-password" min="8" name="bhw-confirm-new-password" placeholder="Confirm your password" /><!--  
                        --><button type="button" class="password__bar__btn" onclick="passwordToggle('bhw-confirm-new-password', 'password-show-np' , 'password-hide-np')">
                                        <svg id='password-show-np' class="password-icon password__bar__icon password-show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                        </svg>
                                        <svg id='password-hide-np' class="password-icon password__bar__icon password-hide password-icon--hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24M1 1l22 22" />
                                        </svg>
                                    </button>
                                </div>
                            </div>


                            <!-- Divider -->
                            <hr>

                            <!-- Buttons -->
                            <div class="edit-bhw__form-btn">
                                <button type="submit" class="btn-green btn-save" name="edit_bhw" onclick="return  confirm('Do you want to edit this account?')"> <!--onclick added-->
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
                </form>
            </section>

            <section class="contents">
                <ul class="contents__list">
                    <li class="content__item content__item--active">
                        <a href="#personal">Personal Information</a>
                    </li>
                    <li class="content__item content__item--active">
                        <a href="#security">Security Question</a>
                    </li>
                    <li class="content__item">
                        <a href="#password">Password</a>
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