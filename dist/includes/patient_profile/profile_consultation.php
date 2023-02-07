<section class="patient-profile__card">
    <!-- START QUERY -->
    <?php
    if (isset($_GET['success'])) {
    ?>
        <script>
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: 'success',
                iconColor: 'white',
                title: 'Welcome, <?php echo $_GET['fname']; ?>!',
                customClass: {
                    popup: 'toast'
                },
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            })
        </script>
    <?php
    }
    ?>
    
    <?php
    include "../dist/includes/connection.php";
    if (isset($_GET['id'])) {
        $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
        $query = "SELECT * FROM consultation WHERE consultation_id='$patient_id'";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $patient = mysqli_fetch_array($query_run);
    ?>
            <ul class="patient-profile__list" role="list">
                <!-- photo, name, patient-id, contact number -->
                <ul class="patient-profile__item patient-profile__list--center" role="list">
                    <li class="patient-profile__img">
                        <img class="" src="./assets/img/patient-profile.svg" alt="">
                    </li>
                    <li class="patient-profile__id patient-profile__category">
                        #<?= $patient['consultation_id'] ?>
                    </li>
                    <li class="patient-profile__name h5">
                        <?= $patient['firstname'] . " " . $patient['lastname']; ?> <!--Test if displays the fname and lname-->
                    </li>
                    <li class="patient-profile__contact">
                        <?= $patient['phone_number'] ?>
                    </li>
                </ul>

                <ul class="patient-profile__item " role="list">
                    <li class="patient-profile__sex">
                        <span class="patient-profile__category">Sex</span>
                        <?= $patient['sex'] ?>
                    </li>
                    <?php
                        // CONVERT DATE TO MM-DD-YY
                        $consul_date = new DateTime($patient['consultation_date']);
                        $new_consul_date = $consul_date->format("m-d-Y");
                    ?>
                    <li class="patient-profile__last-date-added">
                        <span class="patient-profile__category">Date Added</span>
                        <?= $new_consul_date ?>
                    </li>
                    <?php
                        // CONVERT DATE TO MM-DD-YY
                        $consul_bdate = new DateTime($patient['birthdate']);
                        $new_consul_bdate = $consul_bdate->format("m-d-Y");
                    ?>
                    <li class="patient-profile__last-modified">
                        <span class="patient-profile__category">Birthday</span>
                        <?= $new_consul_bdate ?>
                    </li>
                </ul>
                <ul class="patient-profile__item" role="list">
                    <li class="patient-profile__street">
                        <span class="patient-profile__category">Street Address</span>
                        <?= $patient['street_address'] ?>
                    </li>
                    <li class="patient-profile__last-city">
                        <span class="patient-profile__category">City</span>
                        <?= $patient['city'] ?>
                    </li>
                    <li class="patient-profile__barangay">
                        <span class="patient-profile__category">Barangay</span>
                        <?= $patient['barangay'] ?>
                    </li>
                </ul>
                <ul class="patient-profile__item" role="list">
                    <li class="patient-profile__barangay">
                        <span class="patient-profile__category">Registered Email</span>
                        <?= $patient['consultation_email']; ?>
                    </li>
                    <li class="patient-profile__barangay" id="generated_password">
                        <span class="patient-profile__category">Generated Password</span>
                        <?php 
                            $password_date = $patient['birthdate'];
                            $year_date = date('Y', strtotime($password_date));
                            $password =  strtolower($patient['firstname']. $patient['lastname'] . $year_date .'_consultation');
                        ?>
                        <?= $password; ?>
                    </li>
                </ul>
            </ul>
    <?php
        }
    } else {
        echo "<h5> No Record Found </h5>";
    }
    ?>
    <!-- END OF QUERY MAIN -->
</section>

<!-- Medical History -->
<h2 class="medical-history__title">
    Medical History
</h2>
<section class="history">
    <section class="medical-history">
        <div class="medical-history__card">
            <ul class="medical-history__header medical-history__card__row" role="list">
                <li class="medical-history__item">
                    Service
                </li>
                <li class="medical-history__item">
                    Date
                </li>
            </ul>
            <!-- Query for Medical History -->
            <?php
            $filtervalues = $patient['firstname'];
            $filtervalues2 = $patient['lastname'];
            $query3 = "SELECT deworming_id, firstname, lastname, deworming_date, sex, phone_num, label 
                    FROM deworming WHERE CONCAT(firstname,lastname,deworming_date,sex,phone_num, label) 
                    LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,deworming_date,sex,phone_num, label) LIKE '%$filtervalues2%' 
                    UNION ALL
                    SELECT consultation_id, firstname, lastname, consultation_date, sex, phone_number, label 
                    FROM consultation WHERE CONCAT(firstname,lastname,consultation_date,sex,phone_number, label) 
                    LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,consultation_date,sex,phone_number, label) LIKE '%$filtervalues2%' 
                    UNION ALL
                    SELECT prenatal_id, firstname, lastname, prenatal_date, sex, phone_num, label 
                    FROM prenatal WHERE CONCAT(firstname,lastname,prenatal_date,sex,phone_num, label) 
                    LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,prenatal_date,sex,phone_num, label) LIKE '%$filtervalues2%' 
                    UNION ALL
                    SELECT postnatal_id, firstname, lastname, postnatal_date, sex, phone_num, label 
                    FROM postnatal WHERE CONCAT(firstname,lastname,postnatal_date,sex,phone_num, label) 
                    LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,postnatal_date,sex,phone_num, label) LIKE '%$filtervalues2%' 
                    UNION ALL
                    SELECT search_destroy_id, owner_fname, owner_lname, search_destroy_date, sex, phone_num, label 
                    FROM search_destroy WHERE CONCAT(owner_fname,owner_lname,search_destroy_date,sex,phone_num, label) 
                    LIKE '%$filtervalues%' AND CONCAT(owner_fname,owner_lname,search_destroy_date,sex,phone_num, label) LIKE '%$filtervalues2%' 
                    UNION ALL
                    SELECT early_childhood_id, child_fname, child_lname, early_childhood_date, sex, phone_num, label 
                    FROM early_childhood WHERE CONCAT(child_fname,child_lname,early_childhood_date,sex,phone_num, label) 
                    LIKE '%$filtervalues%' AND CONCAT(child_fname,child_lname,early_childhood_date,sex,phone_num, label)  LIKE '%$filtervalues2%' 
                    ";
            $query_run3 = mysqli_query($conn, $query3);
            if (mysqli_num_rows($query_run3) > 0) {
                foreach ($query_run3 as $recent3) {
            ?>
                    <ul class="medical-history__card__row" role="list">
                        <li class="medical-history__item medical-history__service p-bold">
                            <!-- Query for modal link -->
                            <?php
                            if (isset($_GET['label'])) {
                                $patient_label = mysqli_real_escape_string($conn, $_GET['label']);
                                $changes_label = $recent3['label'];
                                $date=$recent3['deworming_date'];

                                //DEWORMING
                                if (($changes_label == "Deworming") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM deworming WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND deworming_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $patient) {
                                            $patient_id = $patient['deworming_id'];
                                            $modalLink = "#deworming-modal" . $patient_id;
                                        }
                                        include 'includes/reports/deworming.php';
                                    }
                                }

                                //C0NSULTATION
                                if (($changes_label == "Consultation") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM consultation WHERE firstname='$patient_fname' AND lastname='$patient_lname' 
                                    AND consultation_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $patient) {
                                            $patient_id = $patient['consultation_id'];
                                            $modalLink = "#consultation__report" . $patient_id;
                                        }
                                    }
                                    include('includes/reports/consultation.php');
                                }

                                //PRENATAL
                                if (($changes_label == "Prenatal") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM prenatal WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND prenatal_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $patient) {
                                            $patient_link = $patient['prenatal_id'];
                                            $modalLink = "#prenatal__report" . $patient_link;
                                        }
                                    }
                                    include('includes/reports/prenatal.php');
                                }

                                //POSTNATAL
                                if (($changes_label == "Postnatal") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM postnatal WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND postnatal_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $patient) {
                                            $patient_link = $patient['postnatal_id'];
                                            $modalLink = "#postnatal__report" . $patient_link;
                                        }
                                    }
                                    include('includes/reports/postnatal.php');
                                }

                                //SEARCH AND DESTROY
                                if (($changes_label == "Search and Destroy") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM search_destroy WHERE owner_fname='$patient_fname' AND owner_lname='$patient_lname'
                                    AND search_destroy_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $patient) {
                                            $patient_link = $patient['search_destroy_id'];
                                            $modalLink = "#search-and-destroy-modal" . $patient_link;
                                        }
                                    }
                                    include('includes/reports/search-and-destroy.php');
                                }

                                //EARLY CHILDHOOD
                                if (($changes_label == "Early Childhood") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM early_childhood WHERE child_fname='$patient_fname' AND child_lname='$patient_lname'
                                    AND early_childhood_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $patient) {
                                            $patient_link = $patient['early_childhood_id'];
                                            $modalLink = "#early__childhood__report" . $patient_link;
                                        }
                                    }
                                    include('includes/reports/early__childhood.php');
                                }

                            ?>
                                <a href="<?= $modalLink; ?>" rel="modal:open"><?= $recent3['label']; ?> </a>
                            <?php
                            }
                            ?>
                            <!-- End for Modal Link -->
                        </li>
                        <?php
                            // CONVERT DATE TO MM-DD-YY
                            $consul_ldate = new DateTime($recent3['deworming_date']);
                            $new_consul_ldate = $consul_ldate->format("m-d-Y");
                        ?>
                        <li class="medical-history__item medical-history__service__date-availed">
                            <?= $new_consul_ldate; ?>
                        </li>
                        <li class="medical-history__item medical-history__btn">
                            <!-- START QUERY FOR EDIT SERVICES-->
                            <?php
                            if (isset($_GET['label'])) {
                                $patient_label = mysqli_real_escape_string($conn, $_GET['label']);
                                $changes_label = $recent3['label'];
                                $date=$recent3['deworming_date'];

                                //DEWORMING
                                if (($changes_label == "Deworming") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM deworming WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND deworming_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $deworm) {
                                            $patient_id = $deworm['deworming_id'];
                                            $link = "edit/edit-deworming.php?id=" . $patient_id;
                                        }
                                    }
                                }

                                //C0NSULTATION
                                if (($changes_label == "Consultation") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM consultation WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND consultation_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $consul) {
                                            $patient_id = $consul['consultation_id'];
                                            $link = "edit/edit-consultation.php?id=" . $patient_id;
                                        }
                                    }
                                }

                                //PRENATAL
                                if (($changes_label == "Prenatal") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM prenatal WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND prenatal_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $pre) {
                                            $patient_link = $pre['prenatal_id'];
                                            $link = "edit/edit-prenatal.php?id=" . $patient_link;
                                        }
                                    }
                                }

                                //POSTNATAL
                                if (($changes_label == "Postnatal") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM postnatal WHERE firstname='$patient_fname' AND lastname='$patient_lname'
                                    AND postnatal_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $post) {
                                            $patient_link = $post['postnatal_id'];
                                            $link = "edit/edit-postnatal.php?id=" . $patient_link;
                                        }
                                    }
                                }

                                //SEARCH AND DESTROY
                                if (($changes_label == "Search and Destroy") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM search_destroy WHERE owner_fname='$patient_fname' AND owner_lname='$patient_lname'
                                    AND search_destroy_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $search_des) {
                                            $patient_link = $search_des['search_destroy_id'];
                                            $link = "edit/edit-search_destroy.php?id=" . $patient_link;
                                        }
                                    }
                                }

                                //EARLY CHILDHOOD
                                if (($changes_label == "Early Childhood") and (isset($_GET['id']))) {
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM early_childhood WHERE child_fname='$patient_fname' AND child_lname='$patient_lname'
                                    AND early_childhood_date='$date'";
                                    $query_run = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $early) {
                                            $patient_link = $early['early_childhood_id'];
                                            $link = "edit/edit-early_childhood.php?id=" . $patient_link;
                                        }
                                    }
                                }

                            ?>
                                <a href="<?= $link; ?>">
                                    <svg id="edit-profile" class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate">
                                        <defs>
                                            <clipPath id="a">
                                                <rect width="64" height="64" />
                                            </clipPath>
                                        </defs>
                                        <g clip-path="url(#a)">
                                            <path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z" />
                                        </g>
                                    </svg>
                                </a>
                            <?php
                            }
                            ?>
                            <!-- END QUERY FOR EDIT SERVICES -->
                            <!-- View Record Button - Visible for  -->
                        </li>
                    </ul>
            <?php
                }
            }
            ?>
            <!-- End of Query for Medical History -->
        </div>
    </section>

    <section class="edit-history">
        <div class="edit-history__card">
            <div class="edit-history__header">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 32 32" viewBox="0 0 32 32">
                        <path d="M12.82373,12.95898l-1.86279,6.21191c-0.1582,0.52832-0.01367,1.10156,0.37646,1.49121c0.28516,0.28516,0.66846,0.43945,1.06055,0.43945c0.14404,0,0.28906-0.02051,0.43066-0.06348l6.2124-1.8623c0.23779-0.07129,0.45459-0.2002,0.62988-0.37598L31.06055,7.41016C31.3418,7.12891,31.5,6.74707,31.5,6.34961s-0.1582-0.7793-0.43945-1.06055l-4.3501-4.34961c-0.58594-0.58594-1.53516-0.58594-2.12109,0L13.2002,12.3291C13.02441,12.50488,12.89551,12.7207,12.82373,12.95898z M15.58887,14.18262L25.6499,4.12109l2.22852,2.22852L17.81738,16.41113l-3.18262,0.9541L15.58887,14.18262z" />
                        <path d="M30,14.5c-0.82861,0-1.5,0.67188-1.5,1.5v10c0,1.37891-1.12158,2.5-2.5,2.5H6c-1.37842,0-2.5-1.12109-2.5-2.5V6c0-1.37891,1.12158-2.5,2.5-2.5h10c0.82861,0,1.5-0.67188,1.5-1.5S16.82861,0.5,16,0.5H6C2.96729,0.5,0.5,2.96777,0.5,6v20c0,3.03223,2.46729,5.5,5.5,5.5h20c3.03271,0,5.5-2.46777,5.5-5.5V16C31.5,15.17188,30.82861,14.5,30,14.5z" />
                    </svg>
                </span>
                <h4 class="edit-history__title">Edit History</h4>
            </div>
            <ul class="edit-history__list" role="list">
                <li class="edit-history__item">
                    <!-- Start Query For Recent Update -->
                    <?php
                    if (isset($_GET['fname']) && isset($_GET['lname'])) {
                        $patient_fname = mysqli_real_escape_string($conn, $_GET['fname']);
                        $patient_lname = mysqli_real_escape_string($conn, $_GET['lname']);

                        $query2 = "SELECT * FROM recent_activity 
                        WHERE patient_fname='$patient_fname' 
                        AND patient_lname='$patient_lname'
                        ORDER BY recent_activity_id 
                        DESC LIMIT 3";

                        $query_run2 = mysqli_query($conn, $query2);
                        if (mysqli_num_rows($query_run2) > 0) {
                            foreach ($query_run2 as $recent) {
                                // CONVERT DATE TO MM-DD-YY
                                $con_rdate = new DateTime($recent['date_edit']);
                                $new_con_rdate = $con_rdate->format("m-d-Y");
                    ?>
                                <span class="edit-history__editor p-bold">
                                    <?= $recent['user_fname'] . ' ' . $recent['user_lname'] . ' ' . $recent['changes_label']; ?>
                                </span>
                                <span class="edit-history edit-history__action p-bold"><?= $recent['patient_fname'] . ' ' . $recent['patient_lname']; ?> </span>
                                <span class="edit-history__subject"><?= $recent['record_name']; ?> record</span> on
                                <span class="edit-history__date"><?= $new_con_rdate; ?></span>
                                <hr>
                    <?php
                            }
                        }
                    }
                    ?>
                    <!-- End Query For Recent Update -->
                </li>
            </ul>
        </div>
    </section>
</section>