<main class="edit-prenatal">
    <section class="form" id='personal'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="edit-postnatal__title">
            Edit Postnatal Record

        </h2>
        <p class="edit-prenatal__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/edit_query.php" method='POST' class="edit-prenatal__form">
            <?php
            if (isset($_GET['id'])) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM postnatal WHERE postnatal_id='$patient_id' ";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
            ?>
                    <input type="hidden" name="prenatal_id" value="<?= $patient['postnatal_id']; ?>"> <!--nakahide sya para access ID sa edit-->

                    <div class="edit-prenatal__form-item">
                        <label for="prenatal-date">Date Registered</label>
                        <input type="date" name="prenatal-date" id="prenatal-date" value="<?= $patient['postnatal_date']; ?>">
                    </div>
                    <div class="add-postnatal__form-item">
                        <label for="postnatal-email">Username (optional)</label>
                        <input type="text" name="prenatal-email" id="postnatal-email" value="<?= $patient['postnatal_email']; ?>">
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
                        Fill out necessary information to complete the process
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
                        <label for="prenatal-height">Height (cm)</label>
                        <input type="text" name="prenatal-height" id="prenatal-height" value="<?= $patient['height']; ?>">
                    </div>


                    <!-- Divider -->
                    <hr id='ob'>

                    <h2 class="edit-prenatal__title">
                        OB History
                    </h2>
                    <p class="edit-prenatal__desc">
                        Fill out necessary information to complete the process
                    </p>

                    <div class="edit-prenatal__form-item">
                        <label for="prenatal-gravida">Gravida *</label>
                        <input type="text" name="prenatal-gravida" id="prenatal-gravida" value="<?= $patient['gravida']; ?>" required>
                    </div>
                    <div class="edit-prenatal__form-item">
                        <label for="prenatal-p">Preterm *</label>
                        <input type="text" name="prenatal-preterm" id="prenatal-p" value="<?= $patient['preterm']; ?>" required>
                    </div>
                    <div class="edit-prenatal__form-item">
                        <label for="prenatal-lmp">Last Menstrual Period</label>
                        <input type="text" name="prenatal-lmp" id="prenatal-lmp" value="<?= $patient['last_menstrual']; ?>">
                    </div>
                    <div class="edit-prenatal__form-item">
                        <label for="prenatal-edc">Expected Date of Confinement *</label>
                        <input type="text" name="prenatal-edc" id="prenatal-edc" value="<?= $patient['edc']; ?>" required>
                    </div>
                    <div class="edit-prenatal__form-item">
                        <label for="prenatal-aog">Assessment of Gestational (weeks) *</label>
                        <input type="text" name="prenatal-aog" id="prenatal-aog" value="<?= $patient['aog']; ?>" required>
                    </div>



                    <!-- Divider -->
                    <hr id='abdomen'>

                    <h2 class="edit-prenatal__title">
                        Abdomen
                    </h2>
                    <p class="edit-prenatal__desc">
                        Fill out necessary information to complete the process
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
                        Fill out necessary information to complete the process
                    </p>

                    <div class="edit-prenatal__form-item">
                        <label for="prenatal-a">Abnormality</label>
                        <textarea name="prenatal-a" id="prenatal-a" cols="27" rows="10"><?= $patient['a']; ?></textarea>
                    </div>
                    <div class="edit-prenatal__form-item">
                        <label for="prenatal-p">Prescription</label>
                        <input type="text" name="prenatal-p" id="prenatal-p" value="<?= $patient['p']; ?>">
                    </div>

                    <!-- Divider -->
                    <hr id='reason'>

                    <h2 class="edit-prenatal__reason">
                        Reason
                    </h2>
                    <p class="edit-prenatal__reason-desc">
                        Fill out necessary info *
                    </p>

                    <!-- Radio Buttons -->
                    <div class="edit-prenatal__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-mispelled" value="Mispelled Name" required>
                        <label for="edit-reason-mispelled">Mispelled Name</label>
                    </div>
                    <div class="edit-prenatal__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-gender" value="Incorrect Sex" required>
                        <label for="edit-reason-gender">Incorrect Sex</label>
                    </div>
                    <div class="edit-prenatal__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-bdate" value="Incorrect Birthdate" required>
                        <label for="edit-reason-bdate">Incorrect Birthdate</label>
                    </div>
                    <div class="edit-prenatal__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-address" value="Wrong Address" required>
                        <label for="edit-reason-address">Wrong Address</label>
                    </div>
                    <div class="edit-prenatal__form-item--reason">
                        <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                        <label for="patient-others">Others: </label>
                        <input type="text" name="patient-others" id="patient-others">
                    </div>

                    <!-- Divider -->
                    <hr>

                    <div class="edit-prenatal__form-btn">
                        <button type="submit" class="btn-green btn-add" name="edit_postnatal">
                            Edit
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