<main class="add-prenatal">
    <section class="form" id='personal'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        </p>
        <h2 class="add-prenatal__title">
            Add New Prenatal Record
        </h2>
        <p class="add-prenatal__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/add_query.php" method="POST" class="add-prenatal__form">
            <div class="add-prenatal__form-item">
                <label for="prenatal-email">Username (optional)</label>
                <input type="text" name="prenatal-email" id="prenatal-email" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>">
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-lname">Last Name *</label>
                <input type="text" name="prenatal-lname" id="prenatal-lname" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : ''; ?>" required>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-fname">First Name *</label>
                <input type="text" name="prenatal-fname" id="prenatal-fname" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : ''; ?>" required>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-mname">Middle Name</label>
                <input type="text" name="prenatal-mname" id="prenatal-mname">
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-birthday">Birthday *</label>
                <input type="date" name="prenatal-birthday" id="prenatal-birthday" value="<?php echo isset($_GET['bday']) ? $_GET['bday'] : ''; ?>" required>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-street">Street Address *</label>
                <input type="text" name="prenatal-street" id="prenatal-street" value="<?php echo isset($_GET['address']) ? $_GET['address'] : ''; ?>" required>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-barangay">Barangay *</label>
                <input type="text" name="prenatal-barangay" id="prenatal-barangay" value="<?php echo isset($_GET['barangay']) ? $_GET['barangay'] : ''; ?>" required>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-city">City *</label>
                <input type="text" name="prenatal-city" id="prenatal-city" value="<?php echo isset($_GET['city']) ? $_GET['city'] : ''; ?>" required>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-contact">Phone Number</label>
                <input type="number" name="prenatal-contact" id="prenatal-contact" maxlength="11" min="1" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
            </div>


            <!-- Divider -->
            <hr id='symptom'>

            <h2 class="add-prenatal__title">
                Symptoms
            </h2>
            <p class="add-prenatal__desc">
                Fill out necessary information to complete the process
            </p>
            <div class="add-prenatal__form-item">
                <label for="prenatal-symptoms">Symptoms</label>
                <textarea name="prenatal-symptoms" id="prenatal-symptoms" cols="27" rows="10"></textarea>
            </div>

            <div class="add-prenatal__form-doses">
                <div class="add-prenatal__form-label">
                    <p class="dose-title">
                        Blood Pressure
                    </p>
                </div>
                <div class="add-prenatal__form-input">
                    <label for="prenatal-bp">mmHg</label>
                    <input type="text" name="prenatal-bp" id="prenatal-bp">
                </div>
            </div>
            <div class="add-prenatal__form-doses">
                <div class="add-prenatal__form-label">
                    <p class="dose-title">
                        Weight
                    </p>
                </div>
                <div class="add-prenatal__form-input">
                    <label for="prenatal-weight">kg</label>
                    <input type="text" name="prenatal-weight" id="prenatal-weight">
                </div>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-height">Height (cm)</label>
                <input type="text" name="prenatal-height" id="prenatal-height">
            </div>


            <!-- Divider -->
            <hr id='ob'>

            <h2 class="add-prenatal__title">
                OB History
            </h2>
            <p class="add-prenatal__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-prenatal__form-item">
                <label for="prenatal-gravida">Gravida *</label>
                <input type="text" name="prenatal-gravida" id="prenatal-gravida" required>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-p">Preterm *</label>
                <input type="text" name="postnatal-preterm" id="prenatal-p" required>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-lmp">Last Menstrual Period</label>
                <input type="date" name="prenatal-lmp" id="prenatal-lmp">
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-edc">Expected Date of Confinement *</label>
                <input type="date" name="prenatal-edc" id="prenatal-edc" required>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-aog">Assessment of Gestational (weeks) *</label>
                <input type="text" name="prenatal-aog" id="prenatal-aog" required>
            </div>



            <!-- Divider -->
            <hr id='abdomen'>

            <h2 class="add-prenatal__title">
                Abdomen
            </h2>
            <p class="add-prenatal__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-prenatal__form-doses">
                <div class="add-prenatal__form-label">
                    <p class="dose-title">
                        Fetal heart (FH)
                    </p>
                </div>
                <div class="add-prenatal__form-input">
                    <label for="prenatal-fh">cm</label>
                    <input type="text" name="prenatal-fh" id="prenatal-fh">
                </div>
            </div>
            <div class="add-prenatal__form-doses">
                <div class="add-prenatal__form-label">
                    <p class="dose-title">
                        Fetal heart tones (FHT)
                    </p>
                </div>
                <div class="add-prenatal__form-input">
                    <label for="prenatal-fht">/min</label>
                    <input type="text" name="prenatal-fht" id="prenatal-fht">
                </div>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-presentation">Presentation</label>
                <input type="text" name="prenatal-presentation" id="prenatal-presentation">
            </div>

            <!-- Divider -->
            <hr id='tetanus'>

            <h2 class="add-prenatal__title">
                Tetanus Toxoid Status:
            </h2>
            <p class="add-prenatal__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-prenatal__form-item">
                <label for="prenatal-a">Abnormality</label>
                <textarea name="prenatal-a" id="prenatal-a" cols="27" rows="10"></textarea>
            </div>
            <div class="add-prenatal__form-item">
                <label for="prenatal-p">Prescriptions</label>
                <input type="text" name="prenatal-p" id="prenatal-p">
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-prenatal__form-btn">
                <button type="submit" class="btn-green btn-add" name="save_prenatal" ">
                        Add
                    </button>
                    <button type=" button" class="btn-red btn-cancel" onclick="confirmReset(form)">
                    Clear
                </button>
            </div>
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
        </ul>
    </section>
</main>