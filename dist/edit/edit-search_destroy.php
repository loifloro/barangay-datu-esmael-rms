<?php
session_start();
include "../includes/connection.php";
if (isset($_SESSION['account_id']) && isset($_SESSION['phone_num'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body class="grid">
    <!-- Sidebar -->
    <aside role="navigation" class="sidebar">
        <ul role="list" class="sidebar__list">
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Home" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z" />
                    </svg>
                    <p class="sidebar__caption">Dashboard</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Patient" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z" />
                    </svg>
                    <p class="sidebar__caption">Patient</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
                    <svg alt="Tutorial" role="listitem" class="sidebar__icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M21,14H20V4h1a1,1,0,0,0,0-2H3A1,1,0,0,0,3,4H4V14H3a1,1,0,0,0,0,2h8v1.15l-4.55,3A1,1,0,0,0,7,22a.94.94,0,0,0,.55-.17L11,19.55V21a1,1,0,0,0,2,0V19.55l3.45,2.28A.94.94,0,0,0,17,22a1,1,0,0,0,.55-1.83l-4.55-3V16h8a1,1,0,0,0,0-2Zm-3,0H6V4H18ZM9.61,12.26a1.73,1.73,0,0,0,1.76,0l3-1.74a1.76,1.76,0,0,0,0-3l-3-1.74a1.73,1.73,0,0,0-1.76,0,1.71,1.71,0,0,0-.87,1.52v3.48A1.71,1.71,0,0,0,9.61,12.26Zm1.13-4.58L13,9l-2.28,1.32Z" />
                    </svg>
                    <p class="sidebar__caption">Tutorial</p>
                </a>
            </li>
            <li class="sidebar__item">
                <a href="" class="sidebar__link">
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
                <a href="" class="sidebar__link">
                    <svg alt="Services" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1ZM17,9H15V7a1,1,0,0,0-1-1H10A1,1,0,0,0,9,7V9H7a1,1,0,0,0-1,1v4a1,1,0,0,0,1,1H9v2a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V15h2a1,1,0,0,0,1-1V10A1,1,0,0,0,17,9Zm-1,4H14a1,1,0,0,0-1,1v2H11V14a1,1,0,0,0-1-1H8V11h2a1,1,0,0,0,1-1V8h2v2a1,1,0,0,0,1,1h2Z" />
                    </svg>
                    <p class="sidebar__caption">Services</p>
                </a>
            </li>
            <li class="sidebar__item">
                    <a href="" class="sidebar__link">
                    <svg alt="Masterlist" role="listitem" class="sidebar__icon" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M13,14H9a1,1,0,0,0,0,2h4a1,1,0,0,0,0-2ZM17,4H15.82A3,3,0,0,0,13,2H11A3,3,0,0,0,8.18,4H7A3,3,0,0,0,4,7V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V7A3,3,0,0,0,17,4ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm8,14a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V7A1,1,0,0,1,7,6H8V7A1,1,0,0,0,9,8h6a1,1,0,0,0,1-1V6h1a1,1,0,0,1,1,1Zm-3-9H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Z" />
                    </svg>
                    <p class="sidebar__caption">Masterlist</p>
                </a>
            </li>
            <li class="sidebar__item sidebar__item--margin-top">
                <a href="" class="sidebar__link">
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
                <a href="" class="sidebar__link">
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
            <form class="navigation__search">
                <input type="text" class="navigation__search__bar" placeholder="Search patient last name"/><!--  
                --><button type="submit" class="navigation__search__btn">
                    <svg class="search-icon navigation__search__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256.001 256.001"><rect width="256" height="256" fill="none"/><circle cx="115.997" cy="116" r="84"  stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/><line x1="175.391" x2="223.991" y1="175.4" y2="224.001"  stroke-linecap="round" stroke-linejoin="round" stroke-width="24"/></svg>
                  </button>
            </form>

            <button class="navigation__btn btn-green">
                <p>Add New</p>
                <svg class="add-icon navigation__btn__icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512" viewBox="0 0 512 512"><path fill="#231f20" d="M468.3,212.7H305.2v-169c0-24.2-19.6-43.8-43.8-43.8c-24.2,0-43.8,19.6-43.8,43.8v169h-174 C19.6,212.7,0,232.3,0,256.5c0,24.2,19.6,43.8,43.8,43.8h174v168c0,24.2,19.6,43.8,43.8,43.8c24.2,0,43.8-19.6,43.8-43.8v-168h163.1 c24.2,0,43.8-19.6,43.8-43.8C512,232.3,492.5,212.7,468.3,212.7z"/></svg>
            </button>
        </nav>
    </header>

    <!-- Contents -->
    <main class="edit-search_destroy">
        <section class="form">
            <p class="back__btn">
                <a href="../services-consultation.php" onclick="return  confirm('Do you want to cancel?')">Back</a>
            </p>
            <h2 class="edit-search_destroy__title">
                Edit Search and Destroy Record
            </h2>
            <p class="edit-search_destroy__desc">
                Fill up necessary information to complete the process
            </p>

            <form action="../includes/edit_query.php" method= "POST" class="edit-search_destroy__form">
                  <?php
                        if(isset($_GET['id']))
                        {
                            $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM search_destroy WHERE search_destroy_id='$patient_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $patient = mysqli_fetch_array($query_run);
                    ?>
                <input type="hidden" name="search_destroy_id" value="<?= $patient['search_destroy_id']; ?>"> <!--nakahide sya para access ID sa edit-->
                
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy_date_added">Registration Date</label>
                    <input type="date" name="search_destroy_date_added" id="early_childhood-clinic" value="<?= $patient['search_destroy_date']; ?>">
                </div>
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-barangay">Name of Barangay</label>
                    <input type="text" name="search_destroy-barangay" id="search_destroy-barangay" value="<?= $patient['barangay']; ?>">
                </div>
                <div class="edit-search_destroy__form-item">
                <label for="search_destroy-city">City</label>
                    <input type="text" name="search_destroy-city" id="search_destroy-barangay" value="<?= $patient['city']; ?>">
                </div>
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-purok">Purok/Block Coverage</label>
                    <input type="text" name="search_destroy-purok" id="search_destroy-purok" value="<?= $patient['block']; ?>">
                </div>
                
                
                <!-- Divider -->
                <hr>

                <h2 class="edit-search_destroy__title">
                    Detailed Summary
                </h2>
                <p class="edit-search_destroy__desc">
                    Fill up necessary information to complete the process
                </p>
                
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-date">Date Visited</label>
                    <input type="date" name="search_destroy-date_visit" id="search_destroy-date" value="<?= $patient['date_visit']; ?>">
                </div>
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-owner_fname">Owner First Name</label>
                    <input type="text" name="search_destroy-owner_fname" id="search_destroy-owner" value="<?= $patient['owner_fname']; ?>">
                </div>
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-owner_mname">Owner Middle Name</label>
                    <input type="text" name="search_destroy-owner_mname" id="search_destroy-owner" value="<?= $patient['owner_mname']; ?>">
                </div>
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-owner_lname">Owner Last Name</label>
                    <input type="text" name="search_destroy-owner_lname" id="search_destroy-owner" value="<?= $patient['owner_lname']; ?>">
                </div>
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-date">Birthdate</label>
                    <input type="date" name="search_destroy-bdate" id="search_destroy-date" value="<?= $patient['birthdate']; ?>">
                </div>
                <div class="edit-deworming__form-item add-deworming__form-item--radio">
                    <label for="deworming-sex">Gender</label>
                    <div class="add-deworming__form--role-item">
                        <div class="add-deworming__form-item">
                            <input type="radio" name="search_destroy-sex" id="deworming-sex--female" value="Male" <?= ($patient['sex']=='Male')? 'checked' : '' ?>>
                            <label for="deworming-sex">Male</label>
                        </div>
                        <div class="add-deworming__form-item">
                            <input type="radio" name="search_destroy-sex" id="deworming-sex--female" value="Female" <?= ($patient['sex']=='Female')? 'checked' : '' ?>>
                            <label for="deworming-sex">Female</label>
                        </div>
                    </div>
                </div>
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-editress">Complete Address</label>
                    <textarea name="search_destroy-editress" id="search_destroy-editress" cols="27" rows="10"><?= $patient['address']; ?></textarea>
                </div>
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-pnumber">Phone Number</label>
                    <input type="number" name="search_destroy-pnumber" id="search_destroy-number-container" maxlength="11" min="1" value="<?= $patient['phone_num']; ?>">
                </div>
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-name-container">Name of Container Positive for Larva</label>
                    <input type="text" name="search_destroy-name-container" id="search_destroy-name-container" value="<?= $patient['container_name']; ?>">
                </div>
                <div class="edit-search_destroy__form-item">
                    <label for="search_destroy-number-container">No. of Container Positive for Larva</label>
                    <input type="text" name="search_destroy-number-container" id="search_destroy-number-container" value="<?= $patient['container_num']; ?>">
                </div>
                <div class="edit-deworming__form-item add-deworming__form-item--radio">
                    <label for="deworming-sex">Remarks</label>
                    <div class="add-deworming__form--role-item">
                        <div class="add-deworming__form-item">
                            <input type="radio" name="search_destroy-remarks" id="deworming-sex--female" value="Positive" <?= ($patient['remark_status']=='Positive')? 'checked' : '' ?>> 
                            <label for="deworming-sex">Positive</label>
                        </div>
                        <div class="add-deworming__form-item">
                            <input type="radio" name="search_destroy-remarks" id="deworming-sex--female" value="Negative" <?= ($patient['remark_status']=='Negative')? 'checked' : '' ?>>
                            <label for="deworming-sex">Negative</label>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr>

                <h2 class="edit-consultation__reason">
                    Reason
                </h2>
                <p class="edit-consultation__reason-desc">
                    Fill up necessary info
                </p>

                <!-- Radio Buttons -->
                <div class="edit-search_destroy__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-mispelled-name" value="Mispelled Name">
                    <label for="patient-mispelled">Mispelled Name</label>
                </div>
                <div class="edit-search_destroy__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-incorrect-gender" value="Incorrect Gender">
                    <label for="patient-mispelled">Incorrect Gender</label>
                </div>
                <div class="edit-search_destroy__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-incorrect-birthdate" value="Incorrect Birthdate">
                    <label for="patient-mispelled">Incorrect Birthdate</label>
                </div>
                <div class="edit-search_destroy__form-item--reason">
                    <input type="radio" name="edit-reason" id="patient-wrong-editress" value="Wrong address">
                    <label for="patient-mispelled">Wrong address</label>
                </div>
                <div class="edit-search_destroy__form-item--reason">
                    <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                    <label for="patient-others">Others: </label>
                    <input type="text" name="patient-others" id="patient-others">
                </div>

                <!-- Divider -->
                <hr>

                <div class="edit-search_destroy__form-btn">
                    <button type="submit" class="btn-green btn-add" name="edit_search_destroy" onclick="return  confirm('Do you want to edit this record?')">
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
                    <a href="">General Information</a>
                </li>
                <li class="content__item content__item--active">
                    <a href="">Detailed Summary</a>
                </li>
                <li class="content__item content__item--active">
                    <a href="">Reason</a>
                </li>

            </ul>
        </section>
    </main>
</body>
</html>
<?php
}
else{
    header("Location: index.php"); /*Redirect to this page if successful*/
    exit();
}
?>