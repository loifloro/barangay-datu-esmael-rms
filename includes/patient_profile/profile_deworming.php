<section class="patient-profile__card" id="patient-profile__card">
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
    include "./includes/connection.php";
    if (isset($_GET['id'])) {
        $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
        $query = "SELECT * FROM deworming WHERE deworming_id='$patient_id'";
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
                    <li class="patient-profile__id patient-profile__category" id="patient_profile_id">
                        #<?= $patient['deworming_id']; ?>
                    </li>
                    <li class="patient-profile__name h5">
                        <?= $patient['firstname'] . " " . $patient['lastname']; ?> <!--Test if displays the fname and lname-->
                    </li>
                    <li class="patient-profile__contact">
                        <?= $patient['phone_num']; ?> <!--added phone num-->
                    </li>
                </ul>

                <ul class="patient-profile__item " role="list">
                    <?php
                    // CONVERT DATE TO MM-DD-YY
                    $deworm_bdate = new DateTime($patient['birthdate']);
                    $new_deworm_bdate = $deworm_bdate->format("m-d-Y");
                    ?>
                    <li class="patient-profile__last-modified">
                        <span class="patient-profile__category">Birthday</span>
                        <?= $new_deworm_bdate; ?>
                    </li>
                    <li class="patient-profile__sex">
                        <span class="patient-profile__category">Sex</span>
                        <?= $patient['sex']; ?>
                    </li>
                    <?php
                    // CONVERT DATE TO MM-DD-YY
                    $deworm_date = new DateTime($patient['deworming_date']);
                    $new_deworm_date = $deworm_date->format("m-d-Y");
                    ?>
                    <li class="patient-profile__last-date-added">
                        <span class="patient-profile__category">Date Added</span>
                        <?= $new_deworm_date; ?> <!--added date-->
                    </li>
                </ul>
                <ul class="patient-profile__item" role="list">
                    <li class="patient-profile__street">
                        <span class="patient-profile__category">Street Address</span>
                        <?= $patient['street_address']; ?>
                    </li>
                    <li class="patient-profile__last-city">
                        <span class="patient-profile__category">City</span>
                        <?= $patient['city']; ?>
                    </li>
                    <li class="patient-profile__barangay">
                        <span class="patient-profile__category">Barangay</span>
                        <?= $patient['barangay']; ?>
                    </li>
                </ul>
                <ul class="patient-profile__item" role="list">
                    <li class="patient-profile__barangay">
                        <span class="patient-profile__category">Registered Username</span>
                        <?= $patient['deworming_email']; ?>
                    </li>
                    <li class="patient-profile__barangay" id="generated_password">
                        <span class="patient-profile__category">Generated Password</span>
                        <?php
                        $password_date = $patient['birthdate'];
                        $year_date = date('Y', strtotime($password_date));
                        $lastname_space = strtolower(str_replace(" ", "", $patient['lastname'])); // remove space
                        $password =  $lastname_space . $year_date . '-deworm';
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
</section>




<section class="history hidden" id="history">
    <section class="medical-history">
        <!-- Medical History -->
        <div class="medical-history__title">

            <button id="add_service_bt" class="btn-green btn-change btn-restore" onclick="addNewRecord('<?= $patient['firstname'] ?>' , '<?= $patient['lastname'] ?>' , '<?= $patient['phone_num']; ?>' , '<?= $password_date; ?>' ,  '<?= $patient['sex']; ?>' , '<?= $patient['street_address']; ?>' , '<?= $patient['city']; ?>' , '<?= $patient['barangay'] ?>' , '<?= $patient['deworming_email']; ?>')">
                <p>Add Service</p>
            </button>
        </div>

        <?php include 'includes/data-tables/deworming.php'; ?>
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
                                $deworm_rdate = new DateTime($recent['date_edit']);
                                $new_deworm_rdate = $deworm_ldate->format("m-d-Y");

                    ?>
                                <span class="edit-history__editor p-bold">
                                    <?= $recent['user_fname'] . ' ' . $recent['user_lname'] . ' ' . $recent['changes_label']; ?>
                                </span>
                                <span class="edit-history edit-history__action p-bold"><?= $recent['patient_fname'] . ' ' . $recent['patient_lname']; ?> </span>
                                <span class="edit-history__subject"><?= $recent['record_name']; ?> record</span> on
                                <span class="edit-history__date"><?= $new_deworm_rdate; ?></span>
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