<main class="add-postnatal">
    <section class="form" id='personal'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        </p>
        <h2 class="add-postnatal__title">
            Add New Postnatal Record
        </h2>
        <p class="add-postnatal__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/add_query.php" method="POST" class="add-postnatal__form">
            <div class="add-postnatal__form-item">
                <label for="postnatal-email">Username (optional)</label>
                <input type="text" name="postnatal-email" id="postnatal-email" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>">
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-lname">Last Name *</label>
                <input type="text" name="postnatal-lname" id="postnatal-lname" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : ''; ?>" required>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-fname">First Name *</label>
                <input type="text" name="postnatal-fname" id="postnatal-fname" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : ''; ?>" required>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-mname">Middle Name</label>
                <input type="text" name="postnatal-mname" id="postnatal-mname">
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-birthday">Birthday *</label>
                <input type="date" name="postnatal-birthday" id="postnatal-birthday" value="<?php echo isset($_GET['bday']) ? $_GET['bday'] : ''; ?>" required>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-street">Street Address *</label>
                <input type="text" name="postnatal-street" id="postnatal-street" value="<?php echo isset($_GET['address']) ? $_GET['address'] : ''; ?>" required>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-barangay">Barangay *</label>
                <input type="text" name="postnatal-barangay" id="postnatal-barangay" value="<?php echo isset($_GET['barangay']) ? $_GET['barangay'] : ''; ?>" required>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-city">City *</label>
                <input type="text" name="postnatal-city" id="postnatal-city" value="<?php echo isset($_GET['city']) ? $_GET['city'] : ''; ?>" required>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-contact">Phone Number</label>
                <input type="number" name="postnatal-contact" id="postnatal-contact" maxlength="11" min="0" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
            </div>


            <!-- Divider -->
            <hr id='symptom'>

            <h2 class="add-postnatal__title">
                Symptoms
            </h2>
            <p class="add-postnatal__desc">
                Fill out necessary information to complete the process
            </p>
            <div class="add-postnatal__form-item"><!--added-->
                <label for="prenatal-symptoms">Symptoms</label>
                <textarea name="postnatal-symptoms" id="prenatal-symptoms" cols="27" rows="10"></textarea>
            </div>

            <div class="add-postnatal__form-doses">
                <div class="add-postnatal__form-label">
                    <p class="dose-title">
                        Blood Pressure
                    </p>
                </div>
                <div class="add-postnatal__form-input">
                    <label for="postnatal-bp">mmHg</label>
                    <input type="text" name="postnatal-bp" id="postnatal-bp">
                </div>
            </div>
            <div class="add-postnatal__form-doses">
                <div class="add-postnatal__form-label">
                    <p class="dose-title">
                        Weight
                    </p>
                </div>
                <div class="add-postnatal__form-input">
                    <label for="postnatal-weight">kg</label>
                    <input type="text" name="postnatal-weight" id="postnatal-weight">
                </div>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-height">Height (cm)</label>
                <input type="text" name="postnatal-height" id="postnatal-height">
            </div>


            <!-- Divider -->
            <hr id='ob'>

            <h2 class="add-postnatal__title">
                OB History
            </h2>
            <p class="add-postnatal__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-postnatal__form-item">
                <label for="postnatal-gravida">Gravida *</label>
                <input type="text" name="postnatal-gravida" id="postnatal-gravida" required>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-p">Preterm *</label>
                <input type="text" name="postnatal-preterm" id="postnatal-p" required>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-lmp">Last Menstrual Period</label>
                <input type="date" name="postnatal-lmp" id="postnatal-lmp">
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-edc">Expected Date of Confinement *</label>
                <input type="date" name="postnatal-edc" id="postnatal-edc" required>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-aog">Assessment of Gestational (weeks) *</label>
                <input type="text" name="postnatal-aog" id="postnatal-aog" required>
            </div>



            <!-- Divider -->
            <hr id='abdomen'>

            <h2 class="add-postnatal__title">
                Abdomen
            </h2>
            <p class="add-postnatal__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-postnatal__form-doses">
                <div class="add-postnatal__form-label">
                    <p class="dose-title">
                        Fetal heart (FH)
                    </p>
                </div>
                <div class="add-postnatal__form-input">
                    <label for="postnatal-fh">cm</label>
                    <input type="text" name="postnatal-fh" id="postnatal-fh">
                </div>
            </div>
            <div class="add-postnatal__form-doses">
                <div class="add-postnatal__form-label">
                    <p class="dose-title">
                        Fetal heart tones (FHT)
                    </p>
                </div>
                <div class="add-postnatal__form-input">
                    <label for="postnatal-fht">/min</label>
                    <input type="text" name="postnatal-fht" id="postnatal-fht">
                </div>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-presentation">Presentation</label>
                <input type="text" name="postnatal-presentation" id="postnatal-presentation">
            </div>

            <!-- Divider -->
            <hr id='tetanus'>

            <h2 class="add-postnatal__title">
                Tetanus Toxoid Status:
            </h2>
            <p class="add-postnatal__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-postnatal__form-item">
                <label for="postnatal-a">Abnormality</label>
                <textarea name="postnatal-a" id="postnatal-a" cols="27" rows="10"></textarea>
            </div>
            <div class="add-postnatal__form-item">
                <label for="postnatal-p">Prescription</label>
                <input type="text" name="postnatal-p" id="postnatal-p">
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-postnatal__form-btn">
                <button type="submit" class="btn-green btn-add" name="save_postnatal">
                    Add
                </button>
                <button type=" button" class="btn-red btn-cancel" onclick="confirmReset(form)"> <!--added type and onclick-->
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