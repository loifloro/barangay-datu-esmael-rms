<main class="edit-deworming">
    <section class="form" id='personal'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        </p>
        <h2 class="edit-deworming__title">
            Edit Deworming Record
        </h2>
        <p class="edit-deworming__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/edit_query.php" method='POST' class="edit-deworming__form" id='edit-deworming-form'>

            <?php
            if (isset($_GET['id'])) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM deworming WHERE deworming_id='$patient_id' ";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
            ?>
                    <input type="hidden" name="deworming_id" value="<?= $patient['deworming_id']; ?>"> <!--nakahide sya para access ID sa edit-->

                    <div class="edit-deworming__form-item">
                        <label for="deworming-date">Registration Date</label>
                        <input type="date" name="deworming-date" id="deworming-date" value="<?= $patient['deworming_date']; ?>">
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-lname">Username (optional)</label>
                        <input type="text" name="deworming-email" id="deworming-email" value="<?= $patient['deworming_email']; ?>">
                    </div>
                    <div class="edit-deworming__form-item">
                        <label for="deworming-lname">Last Name *</label>
                        <input type="text" name="deworming-lname" id="deworming-lname" value="<?= $patient['lastname']; ?>" required>
                    </div>
                    <div class="edit-deworming__form-item">
                        <label for="deworming-fname">First Name *</label>
                        <input type="text" name="deworming-fname" id="deworming-fname" value="<?= $patient['firstname']; ?>" required>
                    </div>
                    <div class="edit-deworming__form-item">
                        <label for="deworming-mname">Middle Name</label>
                        <input type="text" name="deworming-mname" id="deworming-mname" value="<?= $patient['middlename']; ?>">
                    </div>
                    <div class="edit-deworming__form-item">
                        <label for="deworming-age">Phone Number</label>
                        <input type="number" name="deworming-phone_num" id="deworming-age" maxlength="11" min="1" value="<?= $patient['phone_num']; ?>">
                    </div>
                    <div class="edit-deworming__form-item edit-deworming__form-item--radio">
                        <label for="deworming-sex">Sex *</label>
                        <div class="edit-deworming__form--role-item">
                            <div class="edit-deworming__form-item">
                                <input type="radio" name="deworming-sex" id="deworming-sex-male" value="Male" <?= ($patient['sex'] == 'Male') ? 'checked' : '' ?> required>
                                <label for="deworming-sex-male">Male</label>
                            </div>
                            <div class="edit-deworming__form-item">
                                <input type="radio" name="deworming-sex" id="deworming-sex-female" value="Female" <?= ($patient['sex'] == 'Female') ? 'checked' : '' ?> required>
                                <label for="deworming-sex-female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-deworming__form-item">
                        <label for="deworming-birthday">Birthday *</label>
                        <input type="date" name="deworming-birthday" id="deworming-birthday" value="<?= $patient['birthdate']; ?>" required>
                    </div>
                    <div class="edit-deworming__form-item">
                        <label for="deworming-street">Street Address *</label>
                        <input type="text" name="deworming-street" id="deworming-street" value="<?= $patient['street_address']; ?>" required>
                    </div>
                    <div class="edit-deworming__form-item">
                        <label for="deworming-barangay">Barangay</label>
                        <input type="text" name="deworming-barangay" id="deworming-barangay" value="<?= $patient['barangay']; ?>">
                    </div>
                    <div class="edit-deworming__form-item">
                        <label for="deworming-city">City</label>
                        <input type="text" name="deworming-city" id="deworming-city" value="<?= $patient['city']; ?>">
                    </div>

                    <!-- Divider -->
                    <hr id='reason'>

                    <h2 class="edit-deworming__reason">
                        Reason
                    </h2>
                    <p class="edit-deworming__reason-desc">
                        Fill out necessary info *
                    </p>

                    <!-- Radio Buttons -->

                    <div class="edit-deworming__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-mispelled" value="Mispelled Name" required>
                        <label for="edit-reason-mispelled">Mispelled Name</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-gender" value="Incorrect Sex" required>
                        <label for="edit-reason-gender">Incorrect Sex</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-bdate" value="Incorrect Birthdate" required>
                        <label for="edit-reason-bdate">Incorrect Birthdate</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-address" value="Wrong Address" required>
                        <label for="edit-reason-address">Wrong Address</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                        <label for="patient-others">Others: </label>
                        <input type="text" name="patient-others" id="patient-others">
                    </div>


                    <!-- Divider -->
                    <hr>

                    <div class="edit-deworming__form-btn">
                        <button type="submit" class="btn-green btn-save" name="edit_deworming">
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

    <section class="contents">
        <ul class="contents__list">
            <li class="content__item content__item--active">
                <a href="#personal">Personal Information</a>
            </li>
            <li class="content__item">
                <a href="#reason">Reason</a>
            </li>
        </ul>
    </section>
</main>