<main class="edit-early_childhood">
    <section class="form" id='add-early'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        </p>
        <h2 class="edit-early_childhood__title">
            Edit Early Childhood Care and Development Care
        </h2>
        <p class="edit-early_childhood__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/edit_query.php" method='POST' class="edit-early_childhood__form" onsubmit="return validateForm()">
            <?php
            if (isset($_GET['id'])) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM early_childhood WHERE early_childhood_id ='$patient_id' ";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
            ?>

                    <input type="hidden" name="early_childhood_id" value="<?= $patient['early_childhood_id']; ?>"> <!--nakahide sya para access ID sa edit-->

                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-date">Registration Date</label>
                        <input type="date" name="early_childhood-added_date" id="early_childhood-clinic" value="<?= $patient['early_childhood_date']; ?>">
                    </div>
                    <div class="add-early_childhood__form-item">
                        <label for="early_childhood-email">Username (optional)</label>
                        <input type="text" name="early_childhood-email" id="early_childhood-email" value="<?= $patient['early_childhood_email']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-clinic">Clinic/Health Center</label>
                        <input type="text" name="early_childhood-clinic" id="early_childhood-clinic" value="<?= $patient['clinic']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-street">Street Address *</label>
                        <input type="text" name="early_childhood-streetadd" id="early_childhood-barangay" value="<?= $patient['street_address']; ?>" required>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-barangay">Barangay *</label>
                        <input type="text" name="early_childhood-barangay" id="early_childhood-barangay" value="<?= $patient['barangay']; ?>" required>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-city">City Address *</label>
                        <input type="text" name="early_childhood-city" id="early_childhood-barangay" value="<?= $patient['city']; ?>" required>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-purol">Purol/Sitio</label>
                        <input type="text" name="early_childhood-purol" id="early_childhood-purol" value="<?= $patient['purok']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-childfname">Child First Name *</label>
                        <input type="text" name="early_childhood-childfname" id="early_childhood-childname" value="<?= $patient['child_fname']; ?>" required>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-childmname">Child Middle Name</label>
                        <input type="text" name="early_childhood-childmname" id="early_childhood-childname" value="<?= $patient['child_mname']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-childlname">Child Last Name *</label>
                        <input type="text" name="early_childhood-childlname" id="early_childhood-childname" value="<?= $patient['child_lname']; ?>" required>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-hospital">Hospital</label>
                        <textarea name="early_childhood-hospital" id="early_childhood-hospital" cols="27" rows="7"><?= $patient['hospital']; ?></textarea>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-lic">Liver Iron Concentration (mg)</label>
                        <input type="text" name="early_childhood-lic" id="early_childhood-lic" value="<?= $patient['lic']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item edit-early_childhood__form-item--radio">
                        <label for="early_childhood-sex">Sex *</label>
                        <div class="edit-early_childhood__form--role-item">
                            <div class="edit-early_childhood__form-item">
                                <input type="radio" name="early_childhood-sex" id="early_childhood-sex-male" value="Male" <?= ($patient['sex'] == 'Male') ? 'checked' : '' ?> required>
                                <label for="early_childhood-sex-male">Male</label>
                            </div>
                            <div class="edit-early_childhood__form-item">
                                <input type="radio" name="early_childhood-sex" id="early_childhood-sex-female" value="Female" <?= ($patient['sex'] == 'Female') ? 'checked' : '' ?> required>
                                <label for="early_childhood-sex-female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-street">Time Delivery</label>
                        <input type="text" name="early_childhood-time" id="early_childhood-street" value="<?= $patient['time_delivery']; ?>">
                    </div>

                    <!-- Divider -->
                    <hr id='mother'>

                    <h2 class="edit-early_childhood__title">
                        Mother Information
                    </h2>
                    <p class="edit-early_childhood__desc">
                        Fill out necessary information to complete the process
                    </p>

                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-mother-name">Name *</label>
                        <input type="text" name="early_childhood-mother-name" id="early_childhood-mother-name" value="<?= $patient['mother_name']; ?>" required>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-pregnancies">No. of Pregnancies</label>
                        <input type="number" name="early_childhood-pregnancies" id="early_childhood-pregnancies" min="0" value="<?= $patient['no_pregnancies']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-mother-education">Educational Attainment</label>
                        <input type="text" name="early_childhood-mother-education" id="early_childhood-mother-education" value="<?= $patient['mother_educ']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-mother-occupation">Occupation</label>
                        <input type="text" name="early_childhood-mother-occupation" id="early_childhood-mother-occupation" value="<?= $patient['mother_occupation']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-mother-birthdate">Birthdate *</label>
                        <input type="date" name="early_childhood-mother-birthdate" id="early_childhood-mother-birthdate" value="<?= $patient['mother_birthdate']; ?>" required>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-status">Status</label>
                        <input type="text" name="early_childhood-status" id="early_childhood-status" value="<?= $patient['status']; ?>">
                    </div>

                    <!-- Divider -->
                    <hr id='father'>

                    <h2 class="edit-early_childhood__title">
                        Father Information
                    </h2>
                    <p class="edit-early_childhood__desc">
                        Fill out necessary information to complete the process
                    </p>

                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-father-name">Name *</label>
                        <input type="text" name="early_childhood-father-name" id="early_childhood-father-name" value="<?= $patient['father_name']; ?>" required>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-father-contact">Phone Number</label>
                        <input type="number" name="early_childhood-father-contact" id="early_childhood-father-contact" value="<?= $patient['phone_num']; ?>" maxlength="11" min="1">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-father-education">Educational Attainment</label>
                        <input type="text" name="early_childhood-father-education" id="early_childhood-father-education" value="<?= $patient['father_educ']; ?>">
                    </div>
                    <!-- <div class="edit-early_childhood__form-item">
                    <label for="early_childhood-father-age">Age *</label>
                    <input type="number" name="early_childhood-father-age" id="early_childhood-father-age" value="<?= $patient['father_age']; ?>" required>
                </div> -->
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-father-occupation">Occupation</label>
                        <input type="text" name="early_childhood-father-occupation" id="early_childhood-father-occupation" value="<?= $patient['father_occupation']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-father-birthdate">Birthdate</label>
                        <input type="date" name="early_childhood-father-birthdate" id="early_childhood-father-birthdate" value="<?= $patient['father_birthdate']; ?>">
                    </div>


                    <!-- Divider -->
                    <hr id='child'>

                    <h2 class="edit-early_childhood__title">
                        Childhood Information
                    </h2>
                    <p class="edit-early_childhood__desc">
                        Fill out necessary information to complete the process
                    </p>

                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-child-birthdate">Birthdate *</label>
                        <input type="date" name="early_childhood-child-birthdate" id="early_childhood-child-birthdate" value="<?= $patient['child_birthdate']; ?>" required>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-gestational">Gestational Age of Birth (weeks)</label>
                        <input type="number" name="early_childhood-gestational" id="early_childhood-gestational" value="<?= $patient['gestational_age']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item edit-early_childhood__form-item--radio">
                        <label for="early_childhood-birth">Type of Birth *</label>
                        <div class="edit-early_childhood__form--role-item">
                            <div class="edit-early_childhood__form-item">
                                <input type="radio" name="early_childhood-birth" id="early_childhood-birth-normal" value="Normal" <?= ($patient['birth_type'] == 'Normal') ? 'checked' : '' ?> required>
                                <label for="early_childhood-birth-normal">Normal</label>
                            </div>
                            <div class="edit-early_childhood__form-item">
                                <input type="radio" name="early_childhood-birth" id="early_childhood-birth-cs" value="CS" <?= ($patient['birth_type'] == 'CS') ? 'checked' : '' ?> required>
                                <label for="early_childhood-birth-cs">CS</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-birth-order">Birth Order</label>
                        <input type="number" name="early_childhood-birth-order" id="early_childhood-birth-order" min="0" value="<?= $patient['birth_order']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-birth-weight">Birth Weight (kg)</label>
                        <input type="text" name="early_childhood-birth-weight" id="early_childhood-birth-weight" min="0" value="<?= $patient['birth_weight']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-birth-length">Birth Length (cm)</label>
                        <input type="text" name="early_childhood-birth-length" id="early_childhood-birth-length" min="0" value="<?= $patient['birth_length']; ?>">
                    </div>
                    <div class="edit-early_childhood__form-item">
                        <label for="early_childhood-birth-place">Place of Delivery</label>
                        <!-- <input type="number" name="early_childhood-birth-lenght" id="early_childhood-birth-lenght"> -->
                        <select name="early_childhood-birth-place" id="">
                            <option value="Home" <?= ($patient['place_delivery'] == 'Home') ? 'selected' : '' ?>>Home</option>
                            <option value="Lying In" <?= ($patient['place_delivery'] == 'Lying In') ? 'selected' : '' ?>>Lying In</option>
                            <option value="Hospital" <?= ($patient['place_delivery'] == 'Hospital') ? 'selected' : '' ?>>Hospital</option>
                            <option value="Others" <?= ($patient['place_delivery'] == 'Others') ? 'selected' : '' ?>>Others</option>
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
                            <option value="Doctor" <?= ($patient['birth_attendant'] == 'Doctor') ? 'selected' : '' ?>>Doctor</option>
                            <option value="Midwife" <?= ($patient['birth_attendant'] == 'Midwife') ? 'selected' : '' ?>>Midwife</option>
                            <option value="Nurse" <?= ($patient['birth_attendant'] == 'Nurse') ? 'selected' : '' ?>>Nurse</option>
                            <option value="Hilot" <?= ($patient['birth_attendant'] == 'Hilot') ? 'selected' : '' ?>>Hilot</option>
                            <option value="Others" <?= ($patient['birth_attendant'] == 'Others') ? 'selected' : '' ?>>Others</option>
                        </select>
                    </div>


                    <!-- Divider -->
                    <hr id='vaccine'>

                    <h2 class="edit-early_childhood__title">
                        Vaccine Remarks
                    </h2>
                    <p class="edit-early_childhood__desc">
                        Fill out necessary information to complete the process
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
                                Dipterya, Tetano, Hepa B, Pertussis, Pulmonya, Meningitis
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
                    <hr id='reason'>

                    <h2 class="edit-early_childhood__reason">
                        Reason
                    </h2>
                    <p class="edit-early_childhood__reason-desc">
                        Fill out necessary info *
                    </p>

                    <!-- Radio Buttons -->
                    <div class="edit-deworming__form-item--reason">
                        <input type="checkbox" name="edit-reason1" id="edit-reason-mispelled" value="Mispelled Name">
                        <label for="edit-reason-mispelled">Mispelled Name</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <input type="checkbox" name="edit-reason2" id="edit-reason-gender" value="Incorrect Sex">
                        <label for="edit-reason-gender">Incorrect Sex</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <input type="checkbox" name="edit-reason3" id="edit-reason-bdate" value="Incorrect Birthdate">
                        <label for="edit-reason-bdate">Incorrect Birthdate</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <input type="checkbox" name="edit-reason4" id="edit-reason-address" value="Wrong Address">
                        <label for="edit-reason-address">Wrong Address</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                        <label for="patient-others">Others: </label>
                        <input type="text" name="patient-others" id="patient-others">
                    </div>

                    <!-- Divider -->
                    <hr>

                    <div class="edit-early_childhood__form-btn">
                        <button type="submit" class="btn-green btn-add" name="edit_early_childhood">
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

    <!-- validate checkbox -->
    <script>
    function validateForm() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var checked = false;
        
        for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checked = true;
            break;
        }
        }
        
        if (!checked) {
        alert("Please select at least one checkbox.");
        return false;
        }
        
        return true;
    }
    </script>

    <section class="contents">
        <ul class="contents__list">
            <li class="content__item content__item--active">
                <a href="#add-early">Edit Early Childhood Care and Development</a>
            </li>
            <li class="content__item content__item--active">
                <a href="#mother">Mother Information</a>
            </li>
            <li class="content__item">
                <a href="#father">Father Information</a>
            </li>
            <li class="content__item">
                <a href="#child">Child Information</a>
            </li>
            <li class="content__item">
                <a href="#vaccine">Vaccine Remarks</a>
            </li>
            <li class="content__item">
                <a href="#reason">Reason</a>
            </li>
        </ul>
    </section>
</main>