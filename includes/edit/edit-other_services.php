<main class="add-deworming">
    <section class="form" id='personal'>

        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="add-deworming__title">
            Edit Services
        </h2>
        <p class="add-deworming__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/edit_query.php" method="POST" class="add-deworming__form" onsubmit="return validateForm()">
            <!-- Start Query -->
            <?php
            if (isset($_GET['id'])) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM other_service WHERE id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
            ?>
                    <input type="hidden" name="other_id" value="<?= $patient['id']; ?>">
                    <div class="add-deworming__form-item">
                        <label for="deworming-lname">Service Title</label>
                        <input type="text" name="others-title" id="deworming-email" value="<?= $patient['service_name']; ?>">
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-lname">Username (optional)</label>
                        <input type="text" name="others-username" id="deworming-email" value="<?= $patient['service_email']; ?>">
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-lname">Last Name *</label>
                        <input type="text" name="others-lname" id="deworming-lname" value="<?= $patient['lastname']; ?>" required>
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-fname">First Name *</label>
                        <input type="text" name="others-fname" id="deworming-fname" value="<?= $patient['firstname']; ?>" required>
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-mname">Middle Name</label>
                        <input type="text" name="others-mname" id="deworming-mname" value="<?= $patient['middlename']; ?>">
                    </div>
                    <div class="add-deworming__form-item"> <!--added input box-->
                        <label for="deworming-phone_num">Phone Number</label>
                        <input type="number" name="others-phone_num" id="deworming-age" maxlength="11" min="1" value="<?= $patient['phone_num']; ?>">
                    </div>
                    <div class="add-deworming__form-item add-deworming__form-item--radio">
                        <label for="deworming-sex">Sex *</label>
                        <div class="add-deworming__form--role-item">
                            <div class="add-deworming__form-item">
                                <input type="radio" name="others-sex" id="deworming-sex-male" value="Male" <?= ($patient['sex'] == 'Male') ? 'checked' : '' ?> required> <!--Nilagyan ko Value para masave sa database-->
                                <label for="deworming-sex-male">Male</label>
                            </div>
                            <div class="add-deworming__form-item">
                                <input type="radio" name="others-sex" id="deworming-sex-female" value="Female" <?= ($patient['sex'] == 'Female') ? 'checked' : '' ?> required>
                                <label for="deworming-sex-female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-birthday">Birthday *</label>
                        <input type="date" name="others-birthday" id="deworming-birthday" value="<?= $patient['bdate']; ?>" required>
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-street">Street Address *</label>
                        <input type="text" name="others-street" id="deworming-street" value="<?= $patient['address']; ?>" required>
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-barangay">Barangay</label>
                        <input type="text" name="others-barangay" id="deworming-barangay" value="<?= $patient['barangay']; ?>">
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-city">City</label>
                        <input type="text" name="others-city" id="deworming-city" value="<?= $patient['city']; ?>">
                    </div>





                    <!-- Divider -->
                    <hr>

                    <h2 class="add-deworming__title">
                        Findings
                    </h2>
                    <p class="add-deworming__desc">
                        Fill out necessary information to complete the process
                    </p>

                    <div class="add-deworming__form-item">
                        <label for="deworming-lname">Description</label>
                        <textarea name="others-description" id="consultation-symptoms" cols="27" rows="10" required><?= $patient['description']; ?></textarea>
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-lname">Results</label>
                        <textarea name="others-results" id="consultation-symptoms" cols="27" rows="10" required><?= $patient['result']; ?></textarea>
                    </div>
                    <div class="add-deworming__form-item">
                        <label for="deworming-lname">Prescriptions</label>
                        <textarea name="others-prescription" id="consultation-symptoms" cols="27" rows="10" required><?= $patient['prescription']; ?></textarea>
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

                    <div class="edit-deworming__form-btn">
                        <button type="submit" class="btn-green btn-save" name="edit_other">
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
            <!-- END OF QUERY -->
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
                <a href="#personal">Personal Information</a>
            </li>
            <li class="content__item">
                <a href="#reason">Reason</a>
            </li>
        </ul>
    </section>
</main>