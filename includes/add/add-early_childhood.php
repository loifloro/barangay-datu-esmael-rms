<main class="add-early_childhood">
    <section class="form" id='add-new'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="add-early_childhood__title">
            Add Early Childhood Care and Development Care
        </h2>
        <p class="add-early_childhood__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/add_query.php" method="POST" class="add-early_childhood__form">
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-email">Username (optional)</label>
                <input type="text" name="early_childhood-email" id="early_childhood-email" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-clinic">Clinic/Health Center</label>
                <input type="text" name="early_childhood-clinic" id="early_childhood-clinic">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-street">Street Address *</label>
                <input type="text" name="early_childhood-street" id="early_childhood-barangay" value="<?php echo isset($_GET['address']) ? $_GET['address'] : ''; ?>" required>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-barangay">Barangay *</label>
                <input type="text" name="early_childhood-barangay" id="early_childhood-barangay" value="<?php echo isset($_GET['barangay']) ? $_GET['barangay'] : ''; ?>" required>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-city">City *</label>
                <input type="text" name="early_childhood-city" id="early_childhood-barangay" value="<?php echo isset($_GET['city']) ? $_GET['city'] : ''; ?>" required>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-purol">Purol/Sitio</label>
                <input type="text" name="early_childhood-purol" id="early_childhood-purol">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-childfname">Child First Name *</label>
                <input type="text" name="early_childhood-childfname" id="early_childhood-childname" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : ''; ?>" required>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-childmname">Child Middle Name</label>
                <input type="text" name="early_childhood-childmname" id="early_childhood-childname">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-childlname">Child Last Name *</label>
                <input type="text" name="early_childhood-childlname" id="early_childhood-childname" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : ''; ?>" required>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-hospital">Hospital</label>
                <textarea name="early_childhood-hospital" id="early_childhood-hospital" cols="27" rows="7"></textarea>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-lic">Liver Iron Concentration (mg)</label>
                <input type="text" name="early_childhood-lic" id="early_childhood-lic">
            </div>
            <div class="add-early_childhood__form-item add-early_childhood__form-item--radio">
                <label for="early_childhood-sex">Sex *</label>
                <div class="add-early_childhood__form--role-item">
                    <div class="add-early_childhood__form-item">
                        <input type="radio" name="early_childhood-sex" id="early_childhood-sex-male" value="Male" <?php if (isset($_GET['sex']) && $_GET['sex'] == 'Male') echo 'checked'; ?> required>
                        <label for="early_childhood-sex-male">Male</label>
                    </div>
                    <div class="add-early_childhood__form-item">
                        <input type="radio" name="early_childhood-sex" id="early_childhood-sex-female" value="Female" <?php if (isset($_GET['sex']) && $_GET['sex'] == 'Female') echo 'checked'; ?> required>
                        <label for="early_childhood-sex-female">Female</label>
                    </div>
                </div>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-street">Time Delivery</label>
                <input type="text" name="early_childhood-time" id="early_childhood-street">
            </div>

            <!-- Divider -->
            <hr id='mother'>

            <h2 class="add-early_childhood__title">
                Mother Information
            </h2>
            <p class="add-early_childhood__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-early_childhood__form-item">
                <label for="early_childhood-mother-name">Name *</label>
                <input type="text" name="early_childhood-mother-name" id="early_childhood-mother-name" required>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-pregnancies">No. of Pregnancies</label>
                <input type="number" name="early_childhood-pregnancies" id="early_childhood-pregnancies" min="0">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-mother-education">Educational Attainment</label>
                <input type="text" name="early_childhood-mother-education" id="early_childhood-mother-education">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-mother-occupation">Occupation</label>
                <input type="text" name="early_childhood-mother-occupation" id="early_childhood-mother-occupation">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-mother-birthdate">Birthdate *</label>
                <input type="date" name="early_childhood-mother-birthdate" id="early_childhood-mother-birthdate" required>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-status">Status</label>
                <input type="text" name="early_childhood-status" id="early_childhood-status">
            </div>

            <!-- Divider -->
            <hr id="father">

            <h2 class="add-early_childhood__title">
                Father Information
            </h2>
            <p class="add-early_childhood__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-early_childhood__form-item">
                <label for="early_childhood-father-name">Name *</label>
                <input type="text" name="early_childhood-father-name" id="early_childhood-father-name" required>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-father-contact">Phone Number</label>
                <input type="number" name="early_childhood-father-contact" id="early_childhood-father-contact" maxlength="11" min="1" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-father-education">Educational Attainment</label>
                <input type="text" name="early_childhood-father-education" id="early_childhood-father-education">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-father-occupation">Occupation</label>
                <input type="text" name="early_childhood-father-occupation" id="early_childhood-father-occupation">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-father-birthdate">Birthdate</label>
                <input type="date" name="early_childhood-father-birthdate" id="early_childhood-father-birthdate">
            </div>


            <!-- Divider -->
            <hr id='child'>

            <h2 class="add-early_childhood__title">
                Childhood Information
            </h2>
            <p class="add-early_childhood__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-early_childhood__form-item">
                <label for="early_childhood-child-birthdate">Birthdate *</label>
                <input type="date" name="early_childhood-child-birthdate" id="early_childhood-child-birthdate" value="<?php echo isset($_GET['bday']) ? $_GET['bday'] : ''; ?>" required>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-gestational">Gestational Age of Birth (weeks)</label>
                <input type="number" name="early_childhood-gestational" id="early_childhood-gestational" min="0">
            </div>
            <div class="add-early_childhood__form-item add-early_childhood__form-item--radio">
                <label for="early_childhood-birth">Type of Birth *</label>
                <div class="add-early_childhood__form--role-item">
                    <div class="add-early_childhood__form-item">
                        <input type="radio" name="early_childhood-birth" id="early_childhood-birth-normal" value="Normal" required>
                        <label for="early_childhood-birth-normal">Normal</label>
                    </div>
                    <div class="add-early_childhood__form-item">
                        <input type="radio" name="early_childhood-birth" id="early_childhood-birth-cs" value="CS" required>
                        <label for="early_childhood-birth-cs">CS</label>
                    </div>
                </div>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-birth-order">Birth Order</label>
                <input type="number" name="early_childhood-birth-order" id="early_childhood-birth-order">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-birth-weight">Birth Weight (kg)</label>
                <input type="text" name="early_childhood-birth-weight" id="early_childhood-birth-weight" min="0">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-birth-length">Birth Length (cm)</label>
                <input type="text" name="early_childhood-birth-length" id="early_childhood-birth-length" min="0">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-birth-place">Place of Delivery</label>
                <select name="early_childhood-birth-place" id="">
                    <option value="Home">Home</option>
                    <option value="Lying In">Lying In</option>
                    <option value="Hospital">Hospital</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-child-accomodation">Date of Birth Accomodation</label>
                <input type="date" name="early_childhood-child-accomodation" id="early_childhood-child-accomodation">
            </div>
            <div class="add-early_childhood__form-item">
                <label for="early_childhood-birth-attendant">Birth Attendant</label>
                <select name="early_childhood-birth-attendant" id="">
                    <option value="Doctor">Doctor</option>
                    <option value="Midwife">Midwife</option>
                    <option value="Nurse">Nurse</option>
                    <option value="Hilot">Hilot</option>
                    <option value="Others">Others</option>
                </select>
            </div>


            <!-- Divider -->
            <hr id='vaccine'>

            <h2 class="add-early_childhood__title">
                Vaccine Remarks
            </h2>
            <p class="add-early_childhood__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-early_childhood__form-doses">
                <div class="add-early_childhood__form-label">
                    <p class="dose-title">
                        BCG
                    </p>
                    <p class="dose-indication">
                        Tubercolosis
                    </p>
                </div>
                <div class="add-early_childhood__form-input">
                    <label for="early_childhood-child-early_childhood-bgc-1">First Dose Date</label>
                    <input type="date" name="early_childhood-bgc-1" id="early_childhood-bgc-1" placeholder="First Dose Date">
                    <label for="early_childhood-child-early_childhood-bgc-2">Second Dose Date</label>
                    <input type="date" name="early_childhood-bgc-2" id="early_childhood-bgc-2" placeholder="Second Dose Date">
                    <label for="early_childhood-child-early_childhood-bgc-3">Third Dose Date</label>
                    <input type="date" name="early_childhood-bgc-3" id="early_childhood-bgc-3" placeholder="Third Dose Date">
                    <label for="early_childhood-child-early_childhood-catch-up">Catch up Dose Date</label>
                    <input type="date" name="early_childhood-catch-up" id="early_childhood-catch-up" placeholder="Catch up Dose Date">
                </div>
            </div>
            <div class="add-early_childhood__form-doses">
                <div class="add-early_childhood__form-label">
                    <p class="dose-title">
                        HEP B
                    </p>
                    <p class="dose-indication">
                        Hepatatitis B
                    </p>
                </div>
                <div class="add-early_childhood__form-input">
                    <label for="early_childhood-child-early_childhood-hebp-1">First Dose Date</label>
                    <input type="date" name="early_childhood-hebp-1" id="early_childhood-hebp-1" placeholder="First Dose Date">
                    <label for="early_childhood-child-early_childhood-hebp-2">Second Dose Date</label>
                    <input type="date" name="early_childhood-hebp-2" id="early_childhood-hebp-2" placeholder="Second Dose Date">
                    <label for="early_childhood-child-early_childhood-hebp-3">Third Dose Date</label>
                    <input type="date" name="early_childhood-hebp-3" id="early_childhood-hebp-3" placeholder="Third Dose Date">
                    <label for="early_childhood-child-early_childhood-hebp-catch-up">Catch up Dose Date</label>
                    <input type="date" name="early_childhood-hebp-catch-up" id="early_childhood-hebp-catch-up" placeholder="Catch up Dose Date">
                </div>
            </div>
            <div class="add-early_childhood__form-doses">
                <div class="add-early_childhood__form-label">
                    <p class="dose-title">
                        Pentavalent
                    </p>
                    <p class="dose-indication">
                        Dipterya, Tetano, Hepa B, Pertussis, Pulmonya, Meningitis
                    </p>
                </div>
                <div class="add-early_childhood__form-input">
                    <label for="early_childhood-child-early_childhood-pentavalent-1">First Dose Date</label>
                    <input type="date" name="early_childhood-pentavalent-1" id="early_childhood-pentavalent-1" placeholder="First Dose Date">
                    <label for="early_childhood-child-early_childhood-hebp-2">Second Dose Date</label>
                    <input type="date" name="early_childhood-pentavalent-2" id="early_childhood-pentavalent-2" placeholder="Second Dose Date">
                    <label for="early_childhood-child-early_childhood-hebp-3">Third Dose Date</label>
                    <input type="date" name="early_childhood-pentavalent-3" id="early_childhood-pentavalent-3" placeholder="Third Dose Date">
                    <label for="early_childhood-child-early_childhood-hebp-catch-up">Catch up Dose Date</label>
                    <input type="date" name="early_childhood-pentavalent-catch-up" id="early_childhood-pentavalent-catch-up" placeholder="Catch up Dose Date">
                </div>
            </div>
            <div class="add-early_childhood__form-doses">
                <div class="add-early_childhood__form-label">
                    <p class="dose-title">
                        Oral Polio Vaccine
                    </p>
                </div>
                <div class="add-early_childhood__form-input">
                    <label for="early_childhood-child-early_childhood-opv-1">First Dose Date</label>
                    <input type="date" name="early_childhood-opv-1" id="early_childhood-opv-1" placeholder="First Dose Date">
                    <label for="early_childhood-child-early_childhood-opv-2">Second Dose Date</label>
                    <input type="date" name="early_childhood-opv-2" id="early_childhood-opv-2" placeholder="Second Dose Date">
                    <label for="early_childhood-child-early_childhood-opv-3">Third Dose Date</label>
                    <input type="date" name="early_childhood-opv-3" id="early_childhood-opv-3" placeholder="Third Dose Date">
                    <label for="early_childhood-child-early_childhood-opv-catch-up">Catch up Dose Date</label>
                    <input type="date" name="early_childhood-opv-catch-up" id="early_childhood-opv-catch-up" placeholder="Catch up Dose Date">
                </div>
            </div>
            <div class="add-early_childhood__form-doses">
                <div class="add-early_childhood__form-label">
                    <p class="dose-title">
                        Inactivated Polio Vaccine
                    </p>
                </div>
                <div class="add-early_childhood__form-input">
                    <label for="early_childhood-child-early_childhood-ipv-1">First Dose Date</label>
                    <input type="date" name="early_childhood-ipv-1" id="early_childhood-ipv-1" placeholder="First Dose Date">
                    <label for="early_childhood-child-early_childhood-ipv-2">Second Dose Date</label>
                    <input type="date" name="early_childhood-ipv-2" id="early_childhood-ipv-2" placeholder="Second Dose Date">
                    <label for="early_childhood-child-early_childhood-ipv-3">Third Dose Date</label>
                    <input type="date" name="early_childhood-ipv-3" id="early_childhood-ipv-3" placeholder="Third Dose Date">
                    <label for="early_childhood-child-early_childhood-ipv-catch-up">Catch up Dose Date</label>
                    <input type="date" name="early_childhood-ipv-catch-up" id="early_childhood-ipv-catch-up" placeholder="Catch up Dose Date">
                </div>
            </div>
            <div class="add-early_childhood__form-doses">
                <div class="add-early_childhood__form-label">
                    <p class="dose-title">
                        Pneumococcal Conjugate Vaccine
                    </p>
                </div>
                <div class="add-early_childhood__form-input">
                    <label for="early_childhood-child-early_childhood-pcv-1">First Dose Date</label>
                    <input type="date" name="early_childhood-pcv-1" id="early_childhood-pcv-1" placeholder="First Dose Date">
                    <label for="early_childhood-child-early_childhood-pcv-2">Second Dose Date</label>
                    <input type="date" name="early_childhood-pcv-2" id="early_childhood-pcv-2" placeholder="Second Dose Date">
                    <label for="early_childhood-child-early_childhood-pcv-3">Third Dose Date</label>
                    <input type="date" name="early_childhood-pcv-3" id="early_childhood-pcv-3" placeholder="Third Dose Date">
                    <label for="early_childhood-child-early_childhood-pcv-catch-up">Catch up Dose Date</label>
                    <input type="date" name="early_childhood-pcv-catch-up" id="early_childhood-pcv-catch-up" placeholder="Catch up Dose Date">
                </div>
            </div>
            <div class="add-early_childhood__form-doses">
                <div class="add-early_childhood__form-label">
                    <p class="dose-title">
                        Measles Containing Vaccine
                    </p>
                    <p class="dose-indication">
                        Pulmonya Meningitis
                    </p>
                </div>
                <div class="add-early_childhood__form-input">
                    <label for="early_childhood-child-early_childhood-mcv-1">First Dose Date</label>
                    <input type="date" name="early_childhood-mcv-1" id="early_childhood-mcv-1" placeholder="First Dose Date">
                    <label for="early_childhood-child-early_childhood-mcv-2">Second Dose Date</label>
                    <input type="date" name="early_childhood-mcv-2" id="early_childhood-mcv-2" placeholder="Second Dose Date">
                    <label for="early_childhood-child-early_childhood-mcv-3">Third Dose Date</label>
                    <input type="date" name="early_childhood-mcv-3" id="early_childhood-mcv-3" placeholder="Third Dose Date">
                    <label for="early_childhood-child-early_childhood-mcv-catch-up">Catch up Dose Date</label>
                    <input type="date" name="early_childhood-mcv-catch-up" id="early_childhood-mcv-catch-up" placeholder="Catch up Dose Date">
                </div>
            </div>
            <div class="add-early_childhood__form-doses">
                <div class="add-early_childhood__form-label">
                    <p class="dose-title">
                        Vitamin A Supplementation
                    </p>
                </div>
                <div class="add-early_childhood__form-input">
                    <label for="early_childhood-child-early_childhood-vitA-1">First Dose Date</label>
                    <input type="date" name="early_childhood-vitA-1" id="early_childhood-vitA-1" placeholder="First Dose Date">
                    <label for="early_childhood-child-early_childhood-vitA-2">Second Dose Date</label>
                    <input type="date" name="early_childhood-vitA-2" id="early_childhood-vitA-2" placeholder="Second Dose Date">
                    <label for="early_childhood-child-early_childhood-vitA-3">Third Dose Date</label>
                    <input type="date" name="early_childhood-vitA-3" id="early_childhood-vitA-3" placeholder="Third Dose Date">
                    <label for="early_childhood-child-early_childhood-vitA-catch-up">Catch up Dose Date</label>
                    <input type="date" name="early_childhood-vitA-catch-up" id="early_childhood-vitA-catch-up" placeholder="Catch up Dose Date">
                </div>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-early_childhood__form-btn">
                <button type="submit" class="btn-green btn-add" name="save_early_childhood" ">
                        Add
                    </button>
                    <button type=" button" class="btn-red btn-cancel" onclick="confirmReset(form)"> <!--added type and onclick-->
                    Clear
                </button>
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
                <!-- END OF QUERY -->
            </div>
        </form>
    </section>

    <section class="contents">
        <ul class="contents__list">
            <li class="content__item content__item--active">
                <a href="#add-new">Add Early Childhood Care and Development</a>
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
        </ul>
    </section>
</main>