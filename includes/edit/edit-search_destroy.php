<main class="edit-search_destroy">
    <section class="form" id='general'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        </p>
        <h2 class="edit-search_destroy__title">
            Edit Search and Destroy Record
        </h2>
        <p class="edit-search_destroy__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/edit_query.php" method="POST" class="edit-search_destroy__form" onsubmit="return validateForm()">
            <?php
            if (isset($_GET['id'])) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM search_destroy WHERE search_destroy_id='$patient_id' ";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
            ?>
                    <input type="hidden" name="search_destroy_id" value="<?= $patient['search_destroy_id']; ?>"> <!--nakahide sya para access ID sa edit-->

                    <div class="edit-search_destroy__form-item">
                        <label for="search_destroy_date_added">Registration Date</label>
                        <input type="date" name="search_destroy_date_added" id="early_childhood-clinic" value="<?= $patient['search_destroy_date']; ?>">
                    </div>
                    <div class="add-search_destroy__form-item">
                        <label for="search_destroy-email">Username (optional)</label>
                        <input type="text" name="search_destroy-email" id="search_destroy-email" value="<?= $patient['search_destroy_email']; ?>">
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
                    <hr id='detailed'>

                    <h2 class="edit-search_destroy__title">
                        Detailed Summary
                    </h2>
                    <p class="edit-search_destroy__desc">
                        Fill out necessary information to complete the process
                    </p>

                    <div class="edit-search_destroy__form-item">
                        <label for="search_destroy-date">Date Visited</label>
                        <input type="date" name="search_destroy-date_visit" id="search_destroy-date" value="<?= $patient['date_visit']; ?>">
                    </div>
                    <div class="edit-search_destroy__form-item">
                        <label for="search_destroy-owner_fname">Owner First Name *</label>
                        <input type="text" name="search_destroy-owner_fname" id="search_destroy-owner" value="<?= $patient['owner_fname']; ?>" required>
                    </div>
                    <div class="edit-search_destroy__form-item">
                        <label for="search_destroy-owner_mname">Owner Middle Name</label>
                        <input type="text" name="search_destroy-owner_mname" id="search_destroy-owner" value="<?= $patient['owner_mname']; ?>">
                    </div>
                    <div class="edit-search_destroy__form-item">
                        <label for="search_destroy-owner_lname">Owner Last Name *</label>
                        <input type="text" name="search_destroy-owner_lname" id="search_destroy-owner" value="<?= $patient['owner_lname']; ?>" required>
                    </div>
                    <div class="edit-search_destroy__form-item">
                        <label for="search_destroy-date">Birthdate *</label>
                        <input type="date" name="search_destroy-bdate" id="search_destroy-date" value="<?= $patient['birthdate']; ?>" required>
                    </div>
                    <div class="edit-deworming__form-item add-deworming__form-item--radio">
                        <label for="deworming-sex">Sex</label>
                        <div class="add-deworming__form--role-item">
                            <div class="add-deworming__form-item">
                                <input type="radio" name="search_destroy-sex" id="search_destroy-sex-male" value="Male" <?= ($patient['sex'] == 'Male') ? 'checked' : '' ?>>
                                <label for="search_destroy-sex-male">Male</label>
                            </div>
                            <div class="add-deworming__form-item">
                                <input type="radio" name="search_destroy-sex" id="search_destroy-sex-female" value="Female" <?= ($patient['sex'] == 'Female') ? 'checked' : '' ?>>
                                <label for="search_destroy-sex-female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-search_destroy__form-item">
                        <label for="search_destroy-editress">Complete Address *</label>
                        <textarea name="search_destroy-editress" id="search_destroy-editress" cols="27" rows="10" required><?= $patient['address']; ?></textarea>
                    </div>
                    <div class="edit-search_destroy__form-item">
                        <label for="search_destroy-pnumber">Phone Number</label>
                        <input type="number" name="search_destroy-pnumber" id="search_destroy-number-container" maxlength="11" min="1" value="<?= $patient['phone_num']; ?>">
                    </div>
                    <div class="edit-search_destroy__form-item">
                        <label for="search_destroy-name-container">Name of Container Positive for Larva *</label>
                        <input type="text" name="search_destroy-name-container" id="search_destroy-name-container" value="<?= $patient['container_name']; ?>" required>
                    </div>
                    <div class="edit-search_destroy__form-item">
                        <label for="search_destroy-number-container">No. of Container Positive for Larva *</label>
                        <input type="text" name="search_destroy-number-container" id="search_destroy-number-container" min="0" value="<?= $patient['container_num']; ?>" required>
                    </div>
                    <div class="edit-deworming__form-item add-deworming__form-item--radio">
                        <label for="deworming-sex">Remarks *</label>
                        <div class="add-deworming__form--role-item">
                            <div class="add-deworming__form-item">
                                <input type="radio" name="search_destroy-remarks" id="search_destroy-remarks-positive" value="Positive" <?= ($patient['remark_status'] == 'Positive') ? 'checked' : '' ?> required>
                                <label for="search_destroy-remarks-positive">Positive</label>
                            </div>
                            <div class="add-deworming__form-item">
                                <input type="radio" name="search_destroy-remarks" id="search_destroy-remarks-negative" value="Negative" <?= ($patient['remark_status'] == 'Negative') ? 'checked' : '' ?> required>
                                <label for="search_destroy-remarks-negative">Negative</label>
                            </div>
                        </div>
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

                    <div class="edit-search_destroy__form-btn">
                        <button type="submit" class="btn-green btn-add" name="edit_search_destroy">
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
                <a href="#general">General Information</a>
            </li>
            <li class="content__item content__item--active">
                <a href="#detailed">Detailed Summary</a>
            </li>
            <li class="content__item content__item--active">
                <a href="#reason">Reason</a>
            </li>

        </ul>
    </section>
</main>