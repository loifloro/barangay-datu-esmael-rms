<main class="edit-child_care-female">
    <section class="form" id='add-early'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="edit-child_care-female__title">
            Edit Target Client list for Child Care Female <!--Renamed from Male to Female-->
        </h2>
        <p class="edit-child_care-female__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="../includes/edit_query.php" method='POST' class="edit-child_care-female__form"> <!--form action and method added-->

            <!-- <div class="edit-child_care-female__form-item">
                    <label for="child_care-male-number">No.</label>
                    <input type="text" name="child_care-male-number" id="child_care-male-number">
                </div> -->

            <!-- START QUERY -->
            <?php
            if (isset($_GET['id'])) {
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM target_childcare_female WHERE target_childcare_female_id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $patient = mysqli_fetch_array($query_run);
            ?>
                    <input type="hidden" name="target_childcare_female_id" value="<?= $patient['target_childcare_female_id']; ?>"> <!--nakahide sya para access ID sa edit-->
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-registration">Date of Registration *</label>
                        <input type="date" name="child_care-female-registration" id="child_care-male-registration" value="<?= $patient['date_registered']; ?>" required>
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-birthdate">Date of Birthdate *</label>
                        <input type="date" name="child_care-female-birthdate" id="child_care-male-birthdate" value="<?= $patient['birthday']; ?>" required>
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-family-serial">Family Serial No. *</label>
                        <input type="text" name="child_care-female-family-serial" id="child_care-male-family-serial" value="<?= $patient['serial']; ?>" required>
                    </div>
                    <div class="edit-child_care-female__form-item edit-child_care-female__form-item--radio">
                        <label for="se-status">SE Status *</label>
                        <div class="edit-user__form--role-item">
                            <div class="edit-user__form-item">
                                <input type="radio" name="se-status" id="se-status-nhts" value="NHTS" <?= ($patient['status'] == 'NHTS') ? 'checked' : '' ?> required>
                                <label for="se-status-nhts">NHTS</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="se-status" id="se-status-non_nhts" value="NON NHTS" <?= ($patient['status'] == 'NON NHTS') ? 'checked' : '' ?> required>
                                <label for="se-status-non_nhts">NON NHTS</label>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr>

                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-child-name">Name of Child</label>
                        <div class="three-input">
                            <div class="three-input__item">
                                <input type="text" name="child_care-female-first-name" id="child_care-male-first-name" value="<?= $patient['child_firstname']; ?>" required>
                                <label for="child_care-male-first-name">First Name *</label>
                            </div>
                            <div class="three-input__item">
                                <input type="text" name="child_care-female-middle-inital" id="child_care-male-middle-inital" value="<?= $patient['child_middle_initial']; ?>">
                                <label for="child_care-male-middle-inital">MI</label>
                            </div>
                            <div class="three-input__item">
                                <input type="text" name="child_care-female-last-name" id="child_care-male-last-name" value="<?= $patient['child_lastname']; ?>" required>
                                <label for="child_care-female-last-name">Last Name *</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-mother-name">Complete Name of Mother</label>
                        <div class="three-input">
                            <div class="three-input__item">
                                <input type="text" name="child_care-female-mother-first-name" id="child_care-male-mother-first-name" value="<?= $patient['mother_firstname']; ?>" required>
                                <label for="child_care-male-first-name">First Name *</label>
                            </div>
                            <div class="three-input__item">
                                <input type="text" name="child_care-female-mother-middle-inital" id="child_care-male-mother-middle-inital" value="<?= $patient['mother_middle_initial']; ?>">
                                <label for="child_care-male-mother-middle-inital">MI</label>
                            </div>
                            <div class="three-input__item">
                                <input type="text" name="child_care-female-mother-last-name" id="child_care-male-last-name" value="<?= $patient['mother_lastname']; ?>" required>
                                <label for="child_care-male-last-name">Last Name *</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-address">Complete Address *</label>
                        <textarea name="child_care-female-address" id="child_care-male-address" cols="27" rows="5" required><?= $patient['complete_address']; ?></textarea>
                    </div>

                    <!-- Divider -->
                    <hr>

                    <div class="edit-child_care-female__form-item edit-child_care-female__form-item--radio">
                        <label for="child_care-male--cpab">Child Protected at Birth (CPAB) *</label>
                        <div class="edit-user__form--role-item">
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female--cpab" id="child_care-female--cpab-tt2" value="TT2/Td2 given a month prior to delivery" <?= ($patient['cpab'] == 'TT2/Td2 given a month prior to delivery') ? 'checked' : '' ?> required>
                                <label for="child_care-female--cpab-tt2">TT2/Td2 given a month prior to delivery</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female--cpab" id="child_care-female--cpab-tt3" value="TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery" <?= ($patient['cpab'] == 'TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery') ? 'checked' : '' ?> required>
                                <label for="child_care-female--cpab-tt3">TT3/Td3 to TT5/Td5 (TT1/Td1 TT5/Td5) given any time prior to delivery</label>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr id='newborn'>

                    <h2 class="edit-child_care-female__title">
                        Newborn (0-28 days old)
                    </h2>
                    <p class="edit-child_care-female__desc">
                        Fill out necessary information to complete the process
                    </p>

                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-newborn-length">Length at Birth <br>(cm)</label>
                        <input type="text" name="child_care-female-newborn-length" id="child_care-male-newborn-length" value="<?= $patient['length_newborn']; ?>">
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male--newbornweight">Weight at Birth * <br>(kg)</label>
                        <input type="text" name="child_care-female-newborn-weight" id="child_care-male-newborn-weight" value="<?= $patient['weight_newborn']; ?>" required>
                    </div>
                    <div class="edit-child_care-female__form-item edit-child_care-female__form-item--radio">
                        <label for="child_care-male-newborn-weight">Status(Birth Weight) *<br>(kg)</label>
                        <div class="edit-user__form--role-item">
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-newborn-weight-status" id="child_care-female-newborn-weight-status-low" value="low: < 2500gms" <?= ($patient['status_newborn'] == 'low: < 2500gms') ? 'checked' : '' ?> required>
                                <label for="child_care-female-newborn-weight-status-low">L: low: < 2500gms </label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-newborn-weight-status" id="child_care-female-newborn-weight-status-normal" value="normal: >= 2500gms" <?= ($patient['status_newborn'] == 'normal: >= 2500gms') ? 'checked' : '' ?> required>
                                <label for="child_care-female-newborn-weight-status-normal">N:normal: >= 2500gms </label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-newborn-weight-status" id="child_care-female-newborn-weight-status-unknown" value="unknown" <?= ($patient['status_newborn'] == 'unknown') ? 'checked' : '' ?> required>
                                <label for="child_care-female-newborn-weight-status-unknown">U:unknown </label>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="edit-child_care-female__form-item edit-child_care-female__form-item--textarea">
                        <label for="child_care-male-newborn-initiation">
                            Initiation of breastfeeding immediately after birth lasting for at least 90 minutes
                        </label>
                        <textarea name="child_care-female-newborn-initiation" id="child_care-male-newborn-initiation" cols="27" rows="5"><?= $patient['breastfeeding_newborn']; ?></textarea>
                    </div>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                Immunization
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-newborn-bcg">BCG</label>
                            <input type="date" name="child_care-female-newborn-bgc" id="child_care-male-newborn-bcg" value="<?= $patient['bcg_newborn']; ?>">
                            <label for="child_care-male-newborn-hepa-b">Hepa B- BD</label>
                            <input type="date" name="child_care-female-newborn-hepa-b" id="child_care-male-newborn-hepa-b" value="<?= $patient['hepa_newborn']; ?>">
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr id='1-3'>

                    <h2 class="edit-child_care-female__title">
                        1-3 months old
                    </h2>
                    <p class="edit-child_care-female__desc">
                        Nutritional Status Assessment
                    </p>


                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-age">Age in months</label>
                        <input type="number" name="child_care-female-1mos-age" id="child_care-male-1mos-age" min="0" value="<?= $patient['age_month_1_3']; ?>">
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-1mos-legth">Length</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="text" name="child_care-female-1mos-length-cm" id="child_care-male-1mos-length-cm" value="<?= $patient['length_month_1_3']; ?>">
                                <label for="child_care-male-length-cm">cm</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="child_care-female-1mos-length-date" id="child_care-male-1mos-length-date" value="<?= $patient['length_date_month_1_3']; ?>">
                                <label for="child_care-male-1mos-length-date">Date Taken</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-1mos-weight">Weight</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="text" name="child_care-female-1mos-weight-kg" id="child_care-male-1mos-weight-kg" value="<?= $patient['weight_month_1_3']; ?>">
                                <label for="child_care-male-weight-kg">kg</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="child_care-female-1mos-weight-date" id="child_care-male-1mos-weight-date" value="<?= $patient['weight_date_month_1_3']; ?>">
                                <label for="child_care-male-weight-date">Date Taken</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-item edit-child_care-female__form-item--radio">
                        <label for="child_care-male-1mos-status">Status</label>
                        <div class="edit-user__form--role-item">
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status-underweight" value="underweight" <?= ($patient['status_month_1_3'] == 'underweight') ? 'checked' : '' ?>>
                                <label for="child_care-female-1mos-status-underweight">UW = underweight</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status-stunted" value="stunted" <?= ($patient['status_month_1_3'] == 'stunted') ? 'checked' : '' ?>>
                                <label for="child_care-female-1mos-status-stunted">S = stunted</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status-wasted" value="wasted" <?= ($patient['status_month_1_3'] == 'wasted') ? 'checked' : '' ?>>
                                <label for="child_care-female-1mos-status-wasted">W = wasted</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status-wasted" value="obese/overweight" <?= ($patient['status_month_1_3'] == 'obese/overweight') ? 'checked' : '' ?>>
                                <label for="child_care-female-1mos-status-wasted">O = obese/overweight</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-1mos-status" id="child_care-female-1mos-status-normal" value="normal" <?= ($patient['status_month_1_3'] == 'normal') ? 'checked' : '' ?>>
                                <label for="child_care-female-1mos-status-normal">N = normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                Low birth weight given iron
                            </p>
                            <p class="dose-indication">
                                (Write the date)
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-low-weight-1mo">1 &frac12 mo</label>
                            <input type="date" name="child_care-female-low-weight-1mo" id="child_care-male-low-weight-1mo" value="<?= $patient['iron_1mos_month_1_3']; ?>">
                            <label for="child_care-male-low-weight-2mos">2 &frac12 mos</label>
                            <input type="date" name="child_care-female-low-weight-2mos" id="child_care-male-low-weight-2mos" value="<?= $patient['iron_2mos_month_1_3']; ?>">
                            <label for="child_care-male-low-weight-3mos">3 &frac12 mos</label>
                            <input type="date" name="child_care-female-low-weight-3mos" id="child_care-male-low-weight-3mos" value="<?= $patient['iron_3mos_month_1_3']; ?>">
                        </div>
                    </div>
                    <p class="edit-child_care-female__desc edit-child_care-female__desc--bold">
                        Immunization
                    </p>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                DPT- Hep B-Hb
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-dpt-1">First Dose Date</label>
                            <input type="date" name="child_care-female-dpt-1" id="child_care-male-dpt-1" value="<?= $patient['dpt_1dos_month_1_3']; ?>">
                            <label for="child_care-male-dpt-2">Second Dose Date</label>
                            <input type="date" name="child_care-female-dpt-2" id="child_care-male-dpt-2" value="<?= $patient['dpt_2dos_month_1_3']; ?>">
                            <label for="child_care-male-dpt-3">Third Dose Date</label>
                            <input type="date" name="child_care-female-dpt-3" id="child_care-male-dpt-3" value="<?= $patient['dpt_3dos_month_1_3']; ?>">
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                OPV
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-opv-1">First Dose Date</label>
                            <input type="date" name="child_care-female-opv-1" id="child_care-male-opv-1" value="<?= $patient['opv_1dos_month_1_3']; ?>">
                            <label for="child_care-male-opv-2">Second Dose Date</label>
                            <input type="date" name="child_care-female-opv-2" id="child_care-male-opv-2" value="<?= $patient['opv_2dos_month_1_3']; ?>">
                            <label for="child_care-male-opv-3">Third Dose Date</label>
                            <input type="date" name="child_care-female-opv-3" id="child_care-male-opv-3" value="<?= $patient['opv_3dos_month_1_3']; ?>">
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                PCV
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-pcv-1">First Dose Date</label>
                            <input type="date" name="child_care-female-pcv-1" id="child_care-male-pcv-1" value="<?= $patient['pcv_1dos_month_1_3']; ?>">
                            <label for="child_care-male-pcv-2">Second Dose Date</label>
                            <input type="date" name="child_care-female-pcv-2" id="child_care-male-pcv-2" value="<?= $patient['pcv_2dos_month_1_3']; ?>">
                            <label for="child_care-male-pcv-3">Third Dose Date</label>
                            <input type="date" name="child_care-female-pcv-3" id="child_care-male-pcv-3" value="<?= $patient['pcv_3dos_month_1_3']; ?>">
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                IPV
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-ipv">3 1/2 mos</label>
                            <input type="date" name="child_care-female-ipv-1" id="child_care-male-ipv-1" value="<?= $patient['ipv_1dos_month_1_3']; ?>">
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-doses edit-child_care-female__form-doses--checkbox">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                Exclusive Breastfeeding*
                            </p>
                            <p class="dose-indication">
                                Place a check () During the following immunization visit of the child at 1 ½ , 2 ½ and 3 ½ months old, ask if child continues to be exclusively breastfed, Place a check () on each column
                            </p>
                        </div>
                        <div class="edit-child_care-female__form--role-item">
                            <div class="edit-child_care-female__form-item">
                                <input type="checkbox" name="child_care-female--breastfeeding1" id="child_care-male--breastfeeding-1" value="1 ½ mos" <?= ($patient['breastfeed1_month_1_3'] == '1 ½ mos') ? 'checked' : '' ?>>
                                <label class="checkbox-label" for="child_care-male--breastfeeding-1">1 ½ mos</label>
                            </div>
                            <div class="edit-child_care-female__form-item">
                                <input type="checkbox" name="child_care-female--breastfeeding2" id="child_care-male--breastfeeding-2" value="2 ½ mos" <?= ($patient['breastfeed2_month_1_3'] == '2 ½ mos') ? 'checked' : '' ?>>
                                <label class="checkbox-label" for="child_care-male--breastfeeding-2">2 ½ mos</label>
                            </div>
                            <div class="edit-child_care-female__form-item">
                                <input type="checkbox" name="child_care-female--breastfeeding3" id="child_care-male--breastfeeding-3" value="3 ½ mos" <?= ($patient['breastfeed3_month_1_3'] == '3 ½ mos') ? 'checked' : '' ?>>
                                <label class="checkbox-label" for="child_care-male--breastfeeding-3">3 ½ mos</label>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr id='6-11'>

                    <h2 class="edit-child_care-female__title">
                        6-11 months old
                    </h2>
                    <p class="edit-child_care-female__desc">
                        Nutritional Status Assessment
                    </p>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-age">Age in months</label>
                        <input type="number" name="child_care-female-6mos-age" id="child_care-male-6mos-age" min="0" value="<?= $patient['age_month_6_11']; ?>">
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-6mos-legth">Length</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="text" name="child_care-female-6mos-length-cm" id="child_care-male-6mos-length-cm" value="<?= $patient['length_month_6_11']; ?>">
                                <label for="child_care-male-length-cm">cm</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="child_care-female-6mos-length-date" id="child_care-male-6mos-length-date" value="<?= $patient['length_date_month_6_11']; ?>">
                                <label for="child_care-male-6mos-length-date">Date Taken</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-6mos-weight">Weight</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="text" name="child_care-female-6mos-weight-kg" id="child_care-male-6mos-weight-kg" value="<?= $patient['weight_month_6_11']; ?>">
                                <label for="child_care-male-weight-kg">kg</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="child_care-female-6mos-weight-date" id="child_care-male-6mos-weight-date" value="<?= $patient['weight_date_month_6_11']; ?>">
                                <label for="child_care-male-weight-date">Date Taken</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-item edit-child_care-female__form-item--radio">
                        <label for="child_care-male-6mos-status">Status</label>
                        <div class="edit-user__form--role-item">
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status-underweight" value="underweight" <?= ($patient['status_month_6_11'] == 'underweight') ? 'checked' : '' ?>>
                                <label for="child_care-female-6mos-status-underweight">UW = underweight</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status-stunted" value="stunted" <?= ($patient['status_month_6_11'] == 'stunted') ? 'checked' : '' ?>>
                                <label for="child_care-female-6mos-status-stunted">S = stunted</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status-wasted" value="wasted" <?= ($patient['status_month_6_11'] == 'wasted') ? 'checked' : '' ?>>
                                <label for="child_care-female-6mos-status-wasted">W = wasted</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status-obese" value="obese/overweight" <?= ($patient['status_month_6_11'] == 'obese/overweight') ? 'checked' : '' ?>>
                                <label for="child_care-female-6mos-status-obese">O = obese/overweight</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-6mos-status" id="child_care-female-6mos-status-normal" value="normal" <?= ($patient['status_month_6_11'] == 'normal') ? 'checked' : '' ?>>
                                <label for="child_care-female-6mos-status-normal">N = normal</label>
                            </div>
                        </div>
                    </div>

                    <div class="edit-child_care-female__form-item edit-child_care-female__form-item--radio">
                        <label for="child_care-male-6mos-breastfed">Exclusively* Breastfed up to 6 months</label>
                        <div class="edit-user__form--role-item">
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-6mos-status-exclusive" id="child_care-female-6mos-status-exclusive-yes" value="Yes" <?= ($patient['breastfeed_month_6_11'] == 'Yes') ? 'checked' : '' ?>>
                                <label for="child_care-female-6mos-status-exclusive-yes">Yes</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-6mos-status-exclusive" id="child_care-female-6mos-status-exclusive-no" value="No" <?= ($patient['breastfeed_month_6_11'] == 'No') ? 'checked' : '' ?>>
                                <label for="child_care-female-6mos-status-exclusive-no">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-item edit-child_care-female__form-item--radio">
                        <label for="child_care-male-complementary-feeding">Introduction of Complementary Feeding** at 6 months old</label>
                        <div class="add-user__form--role-item">
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-female-complementary-feeding" id="child_care-female-complementary-feeding-1" value="with continued breastfeeding" <?= ($patient['complementary_month_6_11'] == 'with continued breastfeeding') ? 'checked' : '' ?>>
                                <label for="child_care-female-complementary-feeding-1">1 - with continued breastfeeding</label>
                            </div>
                            <div class="add-user__form-item">
                                <input type="radio" name="child_care-female-complementary-feeding" id="child_care-female-complementary-feeding-2" value="no longer breastfeeding or never breastfed" <?= ($patient['complementary_month_6_11'] == 'no longer breastfeeding or never breastfed') ? 'checked' : '' ?>>
                                <label for="child_care-female-complementary-feeding-2">2 - no longer breastfeeding or never breastfed</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                Vitamin A
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-vit-a">Date Given</label>
                            <input type="date" name="child_care-female-vit-a" id="child_care-male-vit-a" placeholder="First Dose Date" value="<?= $patient['vitamin_month_6_11']; ?>">
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                MNP
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-mnp">Date when 90 sachets given</label>
                            <input type="date" name="child_care-female-mnp" id="child_care-male-mnp" placeholder="First Dose Date" value="<?= $patient['mnp_month_6_11']; ?>">
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                MMR Dose 1 at 9th month
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-mmr">Date Given</label>
                            <input type="date" name="child_care-female-mmr" id="child_care-male-mmr" placeholder="First Dose Date" value="<?= $patient['mmr_month_6_11']; ?>">
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr id='12'>

                    <h2 class="edit-child_care-female__title">
                        12 months old
                    </h2>
                    <p class="edit-child_care-female__desc">
                        Nutritional Status Assessment
                    </p>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-age">Age in months</label>
                        <input type="number" name="child_care-female-12mos-age" id="child_care-male-12mos-age" min="0" value="<?= $patient['age_month_12']; ?>">
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-12mos-legth">Length</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="text" name="child_care-female-12mos-length-cm" id="child_care-male-12mos-length-cm" value="<?= $patient['length_month_12']; ?>">
                                <label for="child_care-male-length-cm">cm</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="child_care-female-12mos-length-date" id="child_care-male-12mos-length-date" value="<?= $patient['length_date_month_12']; ?>">
                                <label for="child_care-male-12mos-length-date">Date Taken</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-12mos-weight">Weight</label>
                        <div class="two-input">
                            <div class="two-input__item">
                                <input type="text" name="child_care-female-12mos-weight-kg" id="child_care-male-12mos-weight-kg" value="<?= $patient['weight_month_12']; ?>">
                                <label for="child_care-male-weight-kg">kg</label>
                            </div>
                            <div class="two-input__item">
                                <input type="date" name="child_care-female-12mos-weight-date" id="child_care-male-12mos-weight-date" value="<?= $patient['weight_date_month_12']; ?>">
                                <label for="child_care-male-weight-date">Date Taken</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-item edit-child_care-female__form-item--radio">
                        <label for="child_care-male-12mos-status">Status</label>
                        <div class="edit-user__form--role-item">
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status-underweight" value="underweight" <?= ($patient['status_month_12'] == 'underweight') ? 'checked' : '' ?>>
                                <label for="child_care-female-12mos-status-underweight">UW = underweight</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status-stunted" value="stunted" <?= ($patient['status_month_12'] == 'stunted') ? 'checked' : '' ?>>
                                <label for="child_care-female-12mos-status-stunted">S = stunted</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status-wasted" value="wasted" <?= ($patient['status_month_12'] == 'wasted') ? 'checked' : '' ?>>
                                <label for="child_care-female-12mos-status-wasted">W = wasted</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status-obese" value="obese/overweight" <?= ($patient['status_month_12'] == 'obese/overweight') ? 'checked' : '' ?>>
                                <label for="child_care-female-12mos-status-obese">O = obese/overweight</label>
                            </div>
                            <div class="edit-user__form-item">
                                <input type="radio" name="child_care-female-12mos-status" id="child_care-female-12mos-status-normal" value="normal" <?= ($patient['status_month_12'] == 'normal') ? 'checked' : '' ?>>
                                <label for="child_care-female-12mos-status-normal">N = normal</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                MMR Dose 2 at 12th month
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-12mos-mmr">Date Given</label>
                            <input type="date" name="child_care-female-12mos-mmr" id="child_care-male-12mos-mmr" placeholder="First Dose Date" value="<?= $patient['mmr_month_12']; ?>">
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                FIC***
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-fic">Date</label>
                            <input type="date" name="child_care-female-fic" id="child_care-male-fic" placeholder="First Dose Date" value="<?= $patient['fic_month_12']; ?>">
                        </div>
                    </div>

                    <!-- Divider -->
                    <hr>

                    <div class="edit-child_care-female__form-doses">
                        <div class="edit-child_care-female__form-label">
                            <p class="dose-title">
                                CIC
                            </p>
                        </div>
                        <div class="edit-child_care-female__form-input">
                            <label for="child_care-male-12mos-mmr">Date Given</label>
                            <input type="date" name="child_care-female-12mos-cic" id="child_care-male-cic" placeholder="First Dose Date" value="<?= $patient['cic']; ?>">
                        </div>
                    </div>
                    <div class="edit-child_care-female__form-item">
                        <label for="child_care-male-remarks">Remarks</label>
                        <textarea name="child_care-female-remarks" id="child_care-male-remarks" cols="27" rows="5"><?= $patient['remarks']; ?></textarea>
                    </div>

                    <!-- Divider -->
                    <hr id='reasons'>

                    <h2 class="edit-child_care-female__reason">
                        Reason
                    </h2>
                    <p class="edit-child_care-female__reason-desc">
                        Fill out necessary info *
                    </p>

                    <!-- Radio Buttons -->
                    <div class="edit-child_care-female__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-mispelled" value="Mispelled Name" required>
                        <label for="edit-reason-mispelled">Mispelled Name</label>
                    </div>
                    <div class="edit-child_care-female__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-gender" value="Incorrect Sex" required>
                        <label for="edit-reason-gender">Incorrect Sex</label>
                    </div>
                    <div class="edit-child_care-female__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-bdate" value="Incorrect Birthdate" required>
                        <label for="edit-reason-bdate">Incorrect Birthdate</label>
                    </div>
                    <div class="edit-child_care-female__form-item--reason">
                        <input type="radio" name="edit-reason" id="edit-reason-address" value="Wrong Address" required>
                        <label for="edit-reason-address">Wrong Address</label>
                    </div>
                    <div class="edit-child_care-female__form-item--reason">
                        <!-- <input type="radio" name="edit-reason" id="patient-others"> -->
                        <label for="patient-others">Others: </label>
                        <input type="text" name="patient-others" id="patient-others">
                    </div>


                    <!-- Divider -->
                    <hr>

                    <div class="edit-child_care-female__form-btn">
                        <button type="submit" class="btn-green btn-save" name="edit_childcare_female"> <!--name added-->
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

    <section class="contents">
        <ul class="contents__list">
            <li class="content__item content__item--active">
                <a href="#add-early">Edit Early Childhood Care and Development</a>
            </li>
            <li class="content__item content__item--active">
                <a href="#newborn">Newborn (0-28 days old) </a>
            </li>
            <li class="content__item">
                <a href="#1-3">1-3 months old</a>
            </li>
            <li class="content__item">
                <a href="#6-11">6-11 months old</a>
            </li>
            <li class="content__item">
                <a href="#12">12 months old </a>
            </li>
            <li class="content__item">
                <a href="#reasons">Reason</a>
            </li>
        </ul>
    </section>
</main>