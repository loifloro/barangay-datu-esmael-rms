<!-- Contents -->
<main class="add-maternal_care">
    <section class="form" id='add-target'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="add-maternal_care__title">
            Add Target Client list for Maternal Care
        </h2>
        <p class="add-maternal_care__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/add_query.php" method='POST' class="add-maternal_care__form">

            <div class="add-maternal_care__form-item">
                <label for="maternal_care-registration">Date of Registration *</label>
                <input type="date" name="maternal_care-registration" id="maternal_care-registration" required>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-family-serial">Family Serial No.</label>
                <input type="text" name="maternal_care-family-serial" id="maternal_care-family-serial">
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-child-name">Name</label>
                <div class="three-input">
                    <div class="three-input__item">
                        <input type="text" name="maternal_care-first-name" id="maternal_care-first-name" required>
                        <label for="maternal_care-first-name">First Name *</label>
                    </div>
                    <div class="three-input__item">
                        <input type="text" name="maternal_care-middle-inital" id="maternal_care-middle-inital">
                        <label for="maternal_care-middle-inital">MI</label>
                    </div>
                    <div class="three-input__item">
                        <input type="text" name="maternal_care-last-name" id="maternal_care-last-name" required>
                        <label for="maternal_care-last-name">Last Name *</label>
                    </div>
                </div>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-address">Complete Address *</label>
                <textarea name="maternal_care-address" id="maternal_care-address" cols="27" rows="5" required></textarea>
            </div>
            <div class="add-maternal_care__form-item add-maternal_care__form-item--radio">
                <label for="se-status">Socio Economic Status</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="se-status" id="se-status-nhts" value="NHTS"> <!--Added value-->
                        <label for="se-status-nhts">NHTS</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="se-status" id="se-status-non_nhts" value="NON NHTS"> <!--Added value-->
                        <label for="se-status-non_nhts">NON NHTS</label>
                    </div>
                </div>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-1mos-legth">Birthday *</label>
                <div class="two-input">
                    <!-- <div class="two-input__item">
                            <input type="number" name="maternal_care-age" id="maternal_care-age" required>
                            <label for="maternal_care-age">Age *</label>
                        </div> to be fix -->
                    <div class="two-input__item">
                        <input type="date" name="maternal_care-birthday" id="maternal_care-birthday" required>
                        <label for="maternal_care-birthday">Birthday</label>
                    </div>
                </div>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-lmp">Last Menstrual Period *</label>
                <input type="date" name="maternal_care-lmp" id="maternal_care-lmp" required>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-gp">G-P *</label>
                <input type="number" name="maternal_care-gp" id="maternal_care-gp" min="0" required>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-edc">Expected Date of Confinement *</label>
                <input type="date" name="maternal_care-edc" id="maternal_care-edc" required>
            </div>

            <!-- Divider -->
            <hr id='dates'>

            <h2 class="add-maternal_care__title">
                Dates of Pre-natal Check-ups
            </h2>
            <p class="add-maternal_care__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-maternal_care__form-item">
                <label for="maternal_care-1st-tri">1st Tri</label>
                <input type="date" name="maternal_care-1st-tri" id="maternal_care-1st-tri">
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-2nd-tri">2nd Tri</label>
                <input type="date" name="maternal_care-2nd-tri" id="maternal_care-2nd-tri">
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-3rd-tri">3rd Tri</label>
                <input type="date" name="maternal_care-3rd-tri" id="maternal_care-3rd-tri">
            </div>


            <!-- Divider -->
            <hr id='immunization'>

            <h2 class="add-maternal_care__title">
                Immunization Status
            </h2>
            <p class="add-maternal_care__desc">
                Fill out necessary information to complete the process
            </p>
            <div class="add-maternal_care__form-doses">
                <div class="add-maternal_care__form-label">
                    <p class="dose-title">
                        Date Tetanus diptheria (Td) or Tetanus Toxoid (TT) given
                    </p>
                </div>
                <div class="add-maternal_care__form-input">
                    <label for="maternal_care-td1">Td1/TT1</label>
                    <input type="text" name="maternal_care-td1" id="maternal_care-td1">
                    <label for="maternal_care-td2">Td2/TT2</label>
                    <input type="text" name="maternal_care-td2" id="maternal_care-td2">
                    <label for="maternal_care-td3">Td3/TT3</label>
                    <input type="text" name="maternal_care-td3" id="maternal_care-td3">
                    <label for="maternal_care-td4">Td4/TT4</label>
                    <input type="text" name="maternal_care-td4" id="maternal_care-td4">
                    <label for="maternal_care-td5">Td5/TT5</label>
                    <input type="text" name="maternal_care-td5" id="maternal_care-td5">
                </div>
            </div>
            <div class="add-maternal_care__form-item add-maternal_care__form-item--checkbox">
                <label for="">
                </label>
                <div class="add-maternal_care__form--role-item">
                    <div class="add-maternal_care__form-item">
                        <input type="checkbox" name="maternal_care-fim" id="maternal_care-fim">
                        <label for="maternal_care-fim">FIM Status</label>
                    </div>
                </div>
            </div>

            <hr id='micronutrient'>

            <h2 class="add-maternal_care__title">
                Micronutrient Supplementation
            </h2>
            <p class="add-maternal_care__desc">

            </p>

            <p class="add-maternal_care__desc add-maternal_care__desc--bold">
                Iron sulfate with Folic Acid
            </p>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-iron-1">1st visit (1st tri) </label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="number" name="maternal_care-iron-1-tablet" id="maternal_care-iron-1-tablet" min="0">
                        <label for="maternal_care-iron-1-tablet">Number of Tablets Given</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="maternal_care-iron-1-date" id="maternal_care-iron-1-date">
                        <label for="maternal_care-iron-1-date">Date Given</label>
                    </div>
                </div>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-iron-2">2nd visit (2nd tri)</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="number" name="maternal_care-iron-2-tablet" id="maternal_care-iron-2-tablet" min="0">
                        <label for="maternal_care-iron-2-tablet">Number of Tablets Given</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="maternal_care-iron-2-date" id="maternal_care-iron-2-date">
                        <label for="maternal_care-iron-2-date">Date Given</label>
                    </div>
                </div>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-iron-3">3rd visit (3rd tri)</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="number" name="maternal_care-iron-3-tablet" id="maternal_care-iron-3-tablet" min="0">
                        <label for="maternal_care-iron-3-tablet">Number of Tablets Given</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="maternal_care-iron-3-date" id="maternal_care-iron-3-date"> <!--maternal_care-iron-1-date change into maternal_care-iron-3-date-->
                        <label for="maternal_care-iron-3-date">Date Given</label>
                    </div>
                </div>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-iron-4">4rd visit (4rd tri)</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="number" name="maternal_care-iron-4-tablet" id="maternal_care-iron-4-tablet" min="0">
                        <label for="maternal_care-iron-4-tablet">Number of Tablets Given</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="maternal_care-iron-4-date" id="maternal_care-iron-4-date"> <!--maternal_care-iron-1-date change into maternal_care-iron-4-date-->
                        <label for="maternal_care-iron-4-date">Date Given</label>
                    </div>
                </div>
            </div>

            <hr>
            <p class="add-maternal_care__desc add-maternal_care__desc--bold">
                Calcium Carbonate
            </p>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-calcium-2">2nd visit (2nd tri) </label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="number" name="maternal_care-calcium-2-capsule" id="maternal_care-calcium-2-capsule" min="0">
                        <label for="maternal_care-calcium-2-capsule">Number of Capsules Given</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="maternal_care-calcium-2-date" id="maternal_care-calcium-2-date">
                        <label for="maternal_care-calcium-2-date">Date Given</label>
                    </div>
                </div>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-calcium-3">3rd visit (3rd tri)</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="number" name="maternal_care-calcium-3-capsule" id="maternal_care-calcium-3-capsule" min="0">
                        <label for="maternal_care-calcium-3-capsule">Number of Capsule Given</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="maternal_care-calcium-3-date" id="maternal_care-calcium-3-date"> <!--maternal_care-calcium-1-date change into maternal_care-calcium-3-date-->
                        <label for="maternal_care-calcium-3-date">Date Given</label>
                    </div>
                </div>
            </div>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-calcium-4">4rd visit (4rd tri)</label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="number" name="maternal_care-calcium-4-capsule" id="maternal_care-calcium-4-capsule" min="0">
                        <label for="maternal_care-calcium-4-capsule">Number of Capsule Given</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="maternal_care-calcium-4-date" id="maternal_care-calcium-4-date"> <!--maternal_care-calcium-1-date change into maternal_care-calcium-4-date-->
                        <label for="maternal_care-calcium-4-date">Date Given</label>
                    </div>
                </div>
            </div>

            <hr>
            <p class="add-maternal_care__desc add-maternal_care__desc--bold">
                Iodine Capsules
            </p>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-iodine-1">1st visit (1st tri) </label>
                <div class="two-input">
                    <div class="two-input__item">
                        <input type="number" name="maternal_care-iodine-1-capsule" id="maternal_care-iodine-1-capsule" min="0">
                        <label for="maternal_care-iodine-1-capsule">Number of Capsules Given</label>
                    </div>
                    <div class="two-input__item">
                        <input type="date" name="maternal_care-iodine-1-date" id="maternal_care-iodine-1-date">
                        <label for="maternal_care-iodine-1-date">Date Given</label>
                    </div>
                </div>
            </div>

            <hr id='nutrional'>
            <h2 class="add-maternal_care__title">
                Nutritional Assessment
            </h2>
            <p class="add-maternal_care__desc">
                (Write the BMI for 1st Tri)
            </p>
            <div class="add-maternal_care__form-item">
                <label for="maternal_care-1st-tri-weight">Weight (kg)</label>
                <input type="text" name="maternal_care-1st-tri-weight" id="maternal_care-1st-tri-weight">
            </div>
            <div class="add-maternal_care__form-doses">
                <div class="add-maternal_care__form-label">
                    <p class="dose-title">
                        Deworming Tablet
                    </p>
                </div>
                <div class="add-maternal_care__form-input">
                    <label for="maternal_care-deworming-tablet">Date Given 2nd or 3rd Tris</label>
                    <input type="date" name="maternal_care-deworming-tablet" id="maternal_care-deworming-tablet">
                </div>
            </div>


            <hr id='infectious'>
            <h2 class="add-maternal_care__title">
                Infectious Disease Surveillance
            </h2>
            <p class="add-maternal_care__desc">

            </p>
            <div class="add-maternal_care__form-doses">
                <div class="add-maternal_care__form-label">
                    <p class="dose-title">
                        Syphilis Screening
                    </p>
                    <p class="dose-indication">
                        RPR or RDT Result
                    </p>
                </div>
                <div class="add-maternal_care__form-input">
                    <label for="maternal_care-syphilis-screening-date">Date</label>
                    <input type="date" name="maternal_care-syphilis-screening-date" id="maternal_care-syphilis-screening-date">
                </div>
            </div>
            <div class="add-maternal_care__form-item add-maternal_care__form-item--radio">
                <label for="maternal_care-syphilis-screening-status">Status</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="maternal_care-syphilis-screening-status" id="maternal_care-syphilis-screening-status-positive" value="Positive"> <!--Value added-->
                        <label for="maternal_care-syphilis-screening-status-positive">Positive</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="maternal_care-syphilis-screening-status" id="maternal_care-syphilis-screening-status-negative" value="Negative"> <!--Value added-->
                        <label for="maternal_care-syphilis-screening-status-negative">Negative</label>
                    </div>
                </div>
            </div>
            <div class="add-maternal_care__form-doses">
                <div class="add-maternal_care__form-label">
                    <p class="dose-title">
                        Hepatitis B Screening
                    </p>
                    <p class="dose-indication">
                        Result of HBsAg Test
                    </p>
                </div>
                <div class="add-maternal_care__form-input">
                    <label for="maternal_care-hepatitis-screening-date">Date</label>
                    <input type="date" name="maternal_care-hepatitis-screening-date" id="maternal_care-hepatitis-screening-date">
                </div>
            </div>
            <div class="add-maternal_care__form-item add-maternal_care__form-item--radio">
                <label for="maternal_care-hepatitis-screening-status">Status</label>
                <div class="add-user__form--role-item">
                    <div class="add-user__form-item">
                        <input type="radio" name="maternal_care-hepatitis-screening-status" id="maternal_care-hepatitis-screening-status-positive" value="Positive"> <!--Value added-->
                        <label for="maternal_care-hepatitis-screening-status-positive">Positive</label>
                    </div>
                    <div class="add-user__form-item">
                        <input type="radio" name="maternal_care-hepatitis-screening-status" id="maternal_care-hepatitis-screening-status-negative" value="Negative"> <!--Value added-->
                        <label for="maternal_care-hepatitis-screening-status-negative">Negative</label>
                    </div>
                </div>
            </div>
            <div class="add-maternal_care__form-doses">
                <div class="add-maternal_care__form-label">
                    <p class="dose-title">
                        HIV Screening
                    </p>
                    <!-- <p class="dose-indication">
                            Result of HBsAg Test
                        </p> -->
                </div>
                <div class="add-maternal_care__form-input">
                    <label for="maternal_care-hiv-screening-date">Date Screened</label>
                    <input type="date" name="maternal_care-hiv-screening-date" id="maternal_care-hiv-screening-date">
                </div>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-maternal_care__form-btn">
                <button type="submit" class="btn-green btn-add" name="add_maternal_list" "> <!--added name-->
                        Add
                    </button>
                    <button type=" button" class="btn-red btn-cancel" onclick="confirmReset(form)"> <!--added type and onclick-->
                    Clear
                </button>
            </div>
            <!-- Query to get the user session name -->
            <?php
            include 'includes/connection.php';
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
                <a href="#add-target">Add Target Client list for Maternal Care </a>
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
                <a href="#nutrional">Nutritional Assessment </a>
            </li>
            <li class="content__item">
                <a href="#infectious">Infectious Disease Surveillance </a>
            </li>
        </ul>
    </section>
</main>