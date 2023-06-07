<!-- Contents -->
<main class="edit-consultation">
    <section class="form" id='personal'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        </p>
        <h2 class="edit-consultation__title">
            Edit Consultation Record
        </h2>
        <p class="edit-consultation__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/edit_query.php" method='POST' class="edit-consultation__form" onsubmit="return validateForm()">
            <?php
            if (isset($_GET['id'])) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM consultation WHERE consultation_id='$patient_id' ";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
            ?>
                    <input type="hidden" name="consultation_id" value="<?= $patient['consultation_id']; ?>">

                    <div class="edit-consultation__form-item">
                        <label for="consultation-date">Registration Date</label>
                        <input type="date" name="consultation-date" id="consultation-date" value="<?= $patient['consultation_date']; ?>">
                    </div>
                    <div class="add-consultation__form-item">
                        <label for="consultation-email">Username (optional)</label>
                        <input type="text" name="consultation-email" id="consultation-email" value="<?= $patient['consultation_email']; ?>">
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-lname">Last Name *</label>
                        <input type="text" name="consultation-lname" id="consultation-lname" value="<?= $patient['lastname']; ?>" required>
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-fname">First Name *</label>
                        <input type="text" name="consultation-fname" id="consultation-fname" value="<?= $patient['firstname']; ?>" required>
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-mname">Middle Name</label>
                        <input type="text" name="consultation-mname" id="consultation-mname" value="<?= $patient['middlename']; ?>">
                    </div>
                    <div class="edit-consultation__form-item edit-consultation__form-item--radio">
                        <label for="consultation-sex">Sex *</label>
                        <div class="edit-consultation__form--role-item">
                            <div class="edit-consultation__form-item">
                                <input type="radio" name="consultation-sex" id="consultation-sex-male" value="Male" <?= ($patient['sex'] == 'Male') ? 'checked' : '' ?> required>
                                <label for="consultation-sex-male">Male</label>
                            </div>
                            <div class="edit-consultation__form-item">
                                <input type="radio" name="consultation-sex" id="consultation-sex-female" value="Female" <?= ($patient['sex'] == 'Female') ? 'checked' : '' ?> required>
                                <label for="consultation-sex-female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-birthday">Birthday *</label>
                        <input type="date" name="consultation-birthday" id="consultation-birthday" value="<?= $patient['birthdate']; ?>" required>
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-street">Street Address *</label>
                        <input type="text" name="consultation-street" id="consultation-street" value="<?= $patient['street_address']; ?>" required>
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-barangay">Barangay *</label>
                        <input type="text" name="consultation-barangay" id="consultation-barangay" value="<?= $patient['barangay']; ?>" required>
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-city">City *</label>
                        <input type="text" name="consultation-city" id="consultation-city" value="<?= $patient['city']; ?>" required>
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-contact">Phone Number</label>
                        <input type="number" name="consultation-contact" id="consultation-contact" maxlength="11" min="0" value="<?= $patient['phone_number']; ?>">
                    </div>


                    <!-- Divider -->
                    <hr id='symptom'>

                    <h2 class="edit-consultation__title">
                        Symptoms
                    </h2>
                    <p class="edit-consultation__desc">
                        Fill out necessary information to complete the process
                    </p>

                    <div class="edit-consultation__form-item">
                        <label for="consultation-symptoms">Symptoms *</label>
                        <textarea name="consultation-symptoms" id="consultation-symptoms" cols="27" rows="10" required><?= $patient['symptoms']; ?></textarea>
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-bp">Blood pressure (mmhg)</label>
                        <input type="text" name="consultation-bp" id="consultation-bp" value="<?= $patient['blood_pressure']; ?>">
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-weight">Weight (kg)</label>
                        <input type="text" name="consultation-weight" id="consultation-weight" value="<?= $patient['weight']; ?>">
                    </div>

                    <!-- Divider -->
                    <hr id='lab'>

                    <h2 class="edit-consultation__title">
                        Laboratory Results
                    </h2>
                    <p class="edit-consultation__desc">
                        Fill out necessary information to complete the process
                    </p>

                    <div class="edit-consultation__form-item">
                        <label for="consultation-a">Abnormality</label>
                        <input type="text" name="consultation-a" id="consultation-a" value="<?= $patient['abnormal']; ?>">
                    </div>
                    <div class="edit-consultation__form-item">
                        <label for="consultation-prescriptions">Prescriptions *</label>
                        <textarea name="consultation-prescriptions" id="consultation-prescriptions" cols="27" rows="10" required><?= $patient['prescriptions']; ?></textarea>
                    </div>

                    <!-- Divider -->
                    <hr id='reason'>

                    <h2 class="edit-consultation__reason">
                        Reason
                    </h2>
                    <p class="edit-consultation__reason-desc">
                        Fill out necessary info *
                    </p>

                    <!-- Radio Buttons -->
                    <div class="edit-deworming__form-item--reason">
                        <input type="checkbox" class="edit-checkbox" name="edit-reason1" id="edit-reason-mispelled" value="Mispelled Name">
                        <label for="edit-reason-mispelled">Mispelled Name</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <input type="checkbox" class="edit-checkbox" name="edit-reason2" id="edit-reason-gender" value="Incorrect Sex">
                        <label for="edit-reason-gender">Incorrect Sex</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <input type="checkbox" class="edit-checkbox" name="edit-reason3" id="edit-reason-bdate" value="Incorrect Birthdate">
                        <label for="edit-reason-bdate">Incorrect Birthdate</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <input type="checkbox" class="edit-checkbox" name="edit-reason4" id="edit-reason-address" value="Wrong Address">
                        <label for="edit-reason-address">Wrong Address</label>
                    </div>
                    <div class="edit-deworming__form-item--reason">
                        <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                        <label for="patient-others">Others: </label>
                        <input type="text" name="patient-others" id="patient-others">
                    </div>

                    <!-- Divider -->
                    <hr>

                    <div class="edit-consultation__form-btn">
                        <button type="submit" class="btn-green btn-add" name="edit_consultation">
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
            var checkboxes = document.querySelectorAll('input[type="checkbox"].edit-reason');
            var others = document.getElementById('patient-others').value;
            var checked = false;

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked || others != '') {
                    checked = true;
                    break;
                }
            }

            if (!checked && others == '') {
                Swal.fire({
                    toast: true,
                    position: 'top-right',
                    icon: 'error',
                    iconColor: 'white',
                    title: 'Please select a reason',
                    customClass: {
                        popup: 'toast'
                    },
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                })
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
                <a href="#symptom">Symptom</a>
            </li>
            <li class="content__item">
                <a href="#lab">Laboratory Results</a>
            </li>
            <li class="content__item">
                <a href="#reason">Reason</a>
            </li>
        </ul>
    </section>
</main>