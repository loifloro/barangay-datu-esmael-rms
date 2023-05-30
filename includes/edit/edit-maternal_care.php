<main class="edit-maternal_care">
    <section class="form" id='edit-target'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="edit-maternal_care__title">
            Edit Target Client list for Maternal Care
        </h2>
        <p class="edit-maternal_care__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/edit_query.php" method='POST' class="edit-maternal_care__form"> <!--added action and method-->
            <!-- Start Query -->
            <?php
            if (isset($_GET['id'])) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM target_maternal WHERE target_maternal_id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
            ?>
                    <input type="hidden" name="target_maternal_id" value="<?= $patient['target_maternal_id']; ?>"> <!--nakahide sya para access ID sa edit-->
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-registration">Date of Registration *</label>
                        <input type="date" name="maternal_care-registration" id="maternal_care-registration" value="<?= $patient['date_registered']; ?>" required>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-family-serial">Family Serial No.</label>
                        <input type="text" name="maternal_care-family-serial" id="maternal_care-family-serial" value="<?= $patient['serial']; ?>">
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-child-name">Name</label>
                        <div class="three-input">
                            <div class="three-input__item">
                                <input type="text" name="maternal_care-first-name" id="maternal_care-first-name" value="<?= $patient['firstname']; ?>" required>
                                <label for="maternal_care-first-name">First Name *</label>
                            </div>
                            <div class="three-input__item">
                                <input type="text" name="maternal_care-middle-inital" id="maternal_care-middle-inital" value="<?= $patient['middle_initial']; ?>">
                                <label for="maternal_care-middle-inital">MI</label>
                            </div>
                            <div class="three-input__item">
                                <input type="text" name="maternal_care-last-name" id="maternal_care-last-name" value="<?= $patient['lastname']; ?>" required>
                                <label for="maternal_care-last-name">Last Name *</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-address">Complete Address *</label>
                        <textarea name="maternal_care-address" id="maternal_care-address" cols="27" rows="5" required><?= $patient['complete_address']; ?></textarea>
                    </div>
                    <div class="edit-maternal_care__form-item edit-maternal_care__form-item--radio">
                        <label for="bhw-contact">Socio Economic Status</label>
                        <div class="add-user__form--role-item">
                            <div class="add-user__form-item">
                                <input type="radio" name="se-status" id="se-status-nhts" value="NHTS" <?= ($patient['socio_status'] == 'NHTS') ? 'checked' : '' ?>>
                                <label for="se-status-nhts">NHTS</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="se-status" id="se-status-non_nhts" value="NON NHTS" <?= ($patient['socio_status'] == 'NON NHTS') ? 'checked' : '' ?>>
                                <label for="se-status-non_nhts">NON NHTS</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-1mos-legth">Birthday *</label>
                        <div class="two-input">
                            <!-- <div class="two-input__item">
                                    <input type="number" name="maternal_care-age" id="maternal_care-age" value="<?= $patient['age']; ?>" required>
                                    <label for="maternal_care-age">Age *</label>
                                </div> to be fix -->
                            <div class="two-input__item">
                                <input type="date" name="maternal_care-birthday" id="maternal_care-birthday" value="<?= $patient['birthday']; ?>" required>
                                <label for="maternal_care-birthday">Birthday</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-lmp">Last Menstrual Period *</label>
                        <input type="date" name="maternal_care-lmp" id="maternal_care-lmp" value="<?= $patient['lmp']; ?>" required>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-gp">G-P *</label>
                        <input type="number" name="maternal_care-gp" id="maternal_care-gp" min="0" value="<?= $patient['gp']; ?>" required>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-edc">Expected Date of Confinement *</label>
                        <input type="date" name="maternal_care-edc" id="maternal_care-edc" value="<?= $patient['edc']; ?>" required>
                    </div>

                    <!-- Divider -->
                    <hr id='dates'>

                    <h2 class="edit-maternal_care__title">
                        Dates of Pre-natal Check-ups
                    </h2>
                    <p class="edit-maternal_care__desc">
                        Fill out necessary information to complete the process
                    </p>

                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-1st-tri">1st Tri</label>
                        <input type="date" name="maternal_care-1st-tri" id="maternal_care-1st-tri" value="<?= $patient['tri1_pre_checkup']; ?>">
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-2nd-tri">2nd Tri</label>
                        <input type="date" name="maternal_care-2nd-tri" id="maternal_care-2nd-tri" value="<?= $patient['tri2_pre_checkup']; ?>">
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-3rd-tri">3rd Tri</label>
                        <input type="date" name="maternal_care-3rd-tri" id="maternal_care-3rd-tri" value="<?= $patient['tri3_pre_checkup']; ?>">
                    </div>


                    <!-- Divider -->
                    <hr id='immunization'>

                    <h2 class="edit-maternal_care__title">
                        Immunization Status
                    </h2>
                    <p class="edit-maternal_care__desc">
                        Fill out necessary information to complete the process
                    </p>
                    <div class="edit-maternal_care__form-doses">
                        <div class="edit-maternal_care__form-label">
                            <p class="dose-title">
                                Date Tetanus diptheria (Td) or Tetanus Toxoid (TT) given
                            </p>
                        </div>
                        <div class="edit-maternal_care__form-input">
                            <label for="maternal_care-td1">Td1/TT1</label>
                            <input type="text" name="maternal_care-td1" id="maternal_care-td1" value="<?= $patient['td1_tetanus']; ?>">
                            <label for="maternal_care-td2">Td2/TT2</label>
                            <input type="text" name="maternal_care-td2" id="maternal_care-td2" value="<?= $patient['td2_tetanus']; ?>">
                            <label for="maternal_care-td3">Td3/TT3</label>
                            <input type="text" name="maternal_care-td3" id="maternal_care-td3" value="<?= $patient['td3_tetanus']; ?>">
                            <label for="maternal_care-td4">Td4/TT4</label>
                            <input type="text" name="maternal_care-td4" id="maternal_care-td4" value="<?= $patient['td4_tetanus']; ?>">
                            <label for="maternal_care-td5">Td5/TT5</label>
                            <input type="text" name="maternal_care-td5" id="maternal_care-td5" value="<?= $patient['td5_tetanus']; ?>">
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item edit-maternal_care__form-item--checkbox">
                        <label for="">
                        </label>
                        <div class="edit-maternal_care__form--role-item">
                            <div class="edit-maternal_care__form-item">
                                <input type="checkbox" name="maternal_care-fim" id="maternal_care-fim" value="FIM Status" <?= ($patient['fim_status'] == 'FIM Status') ? 'checked' : '' ?>>
                                <label for="maternal_care-fim">FIM Status</label>
                            </div>
                        </div>
                    </div>

                    <hr id='micronutrient'>

                    <h2 class="edit-maternal_care__title">
                        Micronutrient Supplementation
                    </h2>
                    <p class="edit-maternal_care__desc">

                    </p>

                    <p class="edit-maternal_care__desc edit-maternal_care__desc--bold">
                        Iron sulfate with Folic Acid
                    </p>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-iron-1">1st visit (1st tri) </label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="number" name="maternal_care-iron-1-tablet" id="maternal_care-iron-1-tablet" min="0" value="<?= $patient['tri1_tablet_iron']; ?>">
                                <label for="maternal_care-iron-1-tablet">Number of Tablets Given</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="maternal_care-iron-1-date" id="maternal_care-iron-1-date" value="<?= $patient['tri1_date_iron']; ?>">
                                <label for="maternal_care-iron-1-date">Date Given</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-iron-2">2nd visit (2nd tri)</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="number" name="maternal_care-iron-2-tablet" id="maternal_care-iron-2-tablet" min="0" value="<?= $patient['tri2_tablet_iron']; ?>">
                                <label for="maternal_care-iron-2-tablet">Number of Tablets Given</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="maternal_care-iron-2-date" id="maternal_care-iron-2-date" value="<?= $patient['tri2_date_iron']; ?>">
                                <label for="maternal_care-iron-2-date">Date Given</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-iron-3">3rd visit (3rd tri)</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="number" name="maternal_care-iron-3-tablet" id="maternal_care-iron-3-tablet" min="0" value="<?= $patient['tri3_tablet_iron']; ?>">
                                <label for="maternal_care-iron-3-tablet">Number of Tablets Given</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="maternal_care-iron-3-date" id="maternal_care-iron-3-date" value="<?= $patient['tri3_date_iron']; ?>"><!--maternal_care-iron-1-date CHANGE TO maternal_care-iron-3-date-->
                                <label for="maternal_care-iron-3-date">Date Given</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-iron-4">4rd visit (4rd tri)</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="number" name="maternal_care-iron-4-tablet" id="maternal_care-iron-4-tablet" min="0" value="<?= $patient['tri4_tablet_iron']; ?>">
                                <label for="maternal_care-iron-4-tablet">Number of Tablets Given</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="maternal_care-iron-4-date" id="maternal_care-iron-4-date" value="<?= $patient['tri4_date_iron']; ?>"><!--maternal_care-iron-1-date CHANGE TO maternal_care-iron-4-date-->
                                <label for="maternal_care-iron-4-date">Date Given</label>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <p class="edit-maternal_care__desc edit-maternal_care__desc--bold">
                        Calcium Carbonate
                    </p>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-calcium-2">2nd visit (2nd tri) </label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="number" name="maternal_care-calcium-2-capsule" id="maternal_care-calcium-2-capsule" min="0" value="<?= $patient['tri2_tablet_calcium']; ?>">
                                <label for="maternal_care-calcium-2-capsule">Number of Capsules Given</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="maternal_care-calcium-2-date" id="maternal_care-calcium-2-date" value="<?= $patient['tri2_date_calcium']; ?>">
                                <label for="maternal_care-calcium-2-date">Date Given</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-calcium-3">3rd visit (3rd tri)</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="number" name="maternal_care-calcium-3-capsule" id="maternal_care-calcium-3-capsule" min="0" value="<?= $patient['tri3_tablet_calcium']; ?>">
                                <label for="maternal_care-calcium-3-capsule">Number of Capsule Given</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="maternal_care-calcium-3-date" id="maternal_care-calcium-3-date" value="<?= $patient['tri3_date_calcium']; ?>">
                                <label for="maternal_care-calcium-3-date">Date Given</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-calcium-4">4rd visit (4rd tri)</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="number" name="maternal_care-calcium-4-capsule" id="maternal_care-calcium-4-capsule" min="0" value="<?= $patient['tri4_tablet_calcium']; ?>">
                                <label for="maternal_care-calcium-4-capsule">Number of Capsule Given</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="maternal_care-calcium-4-date" id="maternal_care-calcium-4-date" value="<?= $patient['tri4_date_calcium']; ?>"><!--maternal_care-calcium-1-date CHANGE TO maternal_care-calcium-4-date-->
                                <label for="maternal_care-calcium-4-date">Date Given</label>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <p class="edit-maternal_care__desc edit-maternal_care__desc--bold">
                        Iodine Capsules
                    </p>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-iodine-1">1st visit (1st tri) </label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="number" name="maternal_care-iodine-1-capsule" id="maternal_care-iodine-1-capsule" min="0" value="<?= $patient['tri1_tablet_iodine']; ?>">
                                <label for="maternal_care-iodine-1-capsule">Number of Capsules Given</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="maternal_care-iodine-1-date" id="maternal_care-iodine-1-date" value="<?= $patient['tri1_date_iodine']; ?>">
                                <label for="maternal_care-iodine-1-date">Date Given</label>
                            </div>
                        </div>
                    </div>

                    <hr id='nutritional'>
                    <h2 class="edit-maternal_care__title">
                        Nutritional Assessment
                    </h2>
                    <p class="edit-maternal_care__desc">
                        (Write the BMI for 1st Tri)
                    </p>
                    <div class="edit-maternal_care__form-item">
                        <label for="maternal_care-1st-tri-weight">Weight (kg)</label>
                        <input type="text" name="maternal_care-1st-tri-weight" id="maternal_care-1st-tri-weight" value="<?= $patient['weight']; ?>">
                    </div>
                    <div class="edit-maternal_care__form-doses">
                        <div class="edit-maternal_care__form-label">
                            <p class="dose-title">
                                Deworming Tablet
                            </p>
                        </div>
                        <div class="edit-maternal_care__form-input">
                            <label for="maternal_care-deworming-tablet">Date Given 2nd or 3rd Tris</label>
                            <input type="date" name="maternal_care-deworming-tablet" id="maternal_care-deworming-tablet" value="<?= $patient['deworming_tablet']; ?>">
                        </div>
                    </div>


                    <hr id='infectious'>
                    <h2 class="edit-maternal_care__title">
                        Infectious Disease Surveillance
                    </h2>
                    <p class="edit-maternal_care__desc">

                    </p>
                    <div class="edit-maternal_care__form-doses">
                        <div class="edit-maternal_care__form-label">
                            <p class="dose-title">
                                Syphilis Screening
                            </p>
                            <p class="dose-indication">
                                RPR or RDT Result
                            </p>
                        </div>
                        <div class="edit-maternal_care__form-input">
                            <label for="maternal_care-syphilis-screening-date">Date</label>
                            <input type="date" name="maternal_care-syphilis-screening-date" id="maternal_care-syphilis-screening-date" value="<?= $patient['syphilis_date']; ?>">
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item edit-maternal_care__form-item--radio">
                        <label for="maternal_care-syphilis-screening-status">Status</label>
                        <div class="add-user__form--role-item">
                            <div class="add-user__form-item">
                                <input type="radio" name="maternal_care-syphilis-screening-status" id="maternal_care-syphilis-screening-status-positive" value="Positive" <?= ($patient['syphilis_status'] == 'Positive') ? 'checked' : '' ?>>
                                <label for="maternal_care-syphilis-screening-status-positive">Positive</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="maternal_care-syphilis-screening-status" id="maternal_care-syphilis-screening-status-negative" value="Negative" <?= ($patient['syphilis_status'] == 'Negative') ? 'checked' : '' ?>>
                                <label for="maternal_care-syphilis-screening-status-negative">Negative</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-doses">
                        <div class="edit-maternal_care__form-label">
                            <p class="dose-title">
                                Hepatitis B Screening
                            </p>
                            <p class="dose-indication">
                                Result of HBsAg Test
                            </p>
                        </div>
                        <div class="edit-maternal_care__form-input">
                            <label for="maternal_care-hepatitis-screening-date">Date</label>
                            <input type="date" name="maternal_care-hepatitis-screening-date" id="maternal_care-hepatitis-screening-date" value="<?= $patient['hepatitis_date']; ?>">
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-item edit-maternal_care__form-item--radio">
                        <label for="maternal_care-hepatitis-screening-status">Status</label>
                        <div class="add-user__form--role-item">
                            <div class="add-user__form-item">
                                <input type="radio" name="maternal_care-hepatitis-screening-status" id="maternal_care-hepatitis-screening-status-positive" value="Positive" <?= ($patient['hepatitis_status'] == 'Positive') ? 'checked' : '' ?>>
                                <label for="maternal_care-hepatitis-screening-status-positive">Positive</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="maternal_care-hepatitis-screening-status" id="maternal_care-hepatitis-screening-status-negative" value="Negative" <?= ($patient['hepatitis_status'] == 'Negative') ? 'checked' : '' ?>>
                                <label for="maternal_care-hepatitis-screening-status-negative">Negative</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-maternal_care__form-doses">
                        <div class="edit-maternal_care__form-label">
                            <p class="dose-title">
                                HIV Screening
                            </p>
                            <!-- <p class="dose-indication">
                            Result of HBsAg Test
                        </p> -->
                        </div>
                        <div class="edit-maternal_care__form-input">
                            <label for="maternal_care-hiv-screening-date">Date Screened</label>
                            <input type="date" name="maternal_care-hiv-screening-date" id="maternal_care-hiv-screening-date" value="<?= $patient['hiv_screen_date']; ?>">
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr id='reason'>

                    <h2 class="edit-maternal_care-female__reason">
                        Reason
                    </h2>
                    <p class="edit-maternal_care-female__reason-desc">
                        Fill out necessary info
                    </p>

                    <!-- Radio Buttons -->
                    <div class="edit-maternal_care-female__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-mispelled" value="Mispelled Name" required>
                        <label for="edit-reason-mispelled">Mispelled Name</label>
                    </div>
                    <div class="edit-maternal_care-female__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-gender" value="Incorrect Sex" required>
                        <label for="edit-reason-gender">Incorrect Sex</label>
                    </div>
                    <div class="edit-maternal_care-female__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-bdate" value="Incorrect Birthdate" required>
                        <label for="edit-reason-bdate">Incorrect Birthdate</label>
                    </div>
                    <div class="edit-maternal_care-female__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-address" value="Wrong Address" required>
                        <label for="edit-reason-address">Wrong Address</label>
                    </div>
                    <div class="edit-maternal_care-female__form-item--reason">
                        <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                        <label for="patient-others">Others: </label>
                        <input type="text" name="patient-others" id="patient-others">
                    </div>

                    <!-- Divider -->
                    <hr>

                    <div class="edit-maternal_care__form-btn">
                        <button type="submit" class="btn-green btn-add" name="edit_maternal_list"> <!--name added-->
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
                <a href="#edit-target">Edit Target Client list for Maternal Care </a>
            </li>
            <li class="content__item content__item--active">
                <a href="#dates">Dates of Prenatal Checkup </a>
            </li>
            <li class="content__item">
                <a href="#immunization">Immunization Status </a>
            </li>
            <li class="content__item">
                <a href="#micronutrient">Micronutrient Supplementation </a>
            </li>
            <li class="content__item">
                <a href="#nutritional">Nutritional Assessment </a>
            </li>
            <li class="content__item">
                <a href="#infectious">Infectious Disease Surveillance </a>
            </li>
            <li class="content__item">
                <a href="#reason">Reason </a>
            </li>
        </ul>
    </section>
</main>