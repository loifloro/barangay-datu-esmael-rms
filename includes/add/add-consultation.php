<main class="add-consultation">
    <section class="form" id='personal'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        </p>
        <h2 class="add-consultation__title">
            Add New Consultation Record
        </h2>
        <p class="add-consultation__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/add_query.php" method="POST" class="add-consultation__form">
            <div class="add-consultation__form-item">
                <label for="consultation-email">Username (optional)</label>
                <input type="text" name="consultation-email" id="consultation-email" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>">
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-lname">Last Name *</label>
                <input type="text" name="consultation-lname" id="consultation-lname" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : ''; ?>" required>
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-fname">First Name *</label>
                <input type="text" name="consultation-fname" id="consultation-fname" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : ''; ?>" required>
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-mname">Middle Name</label>
                <input type="text" name="consultation-mname" id="consultation-mname">
            </div>
            <div class="add-consultation__form-item add-consultation__form-item--radio">
                <label for="consultation-sex">Sex *</label>
                <div class="add-consultation__form--role-item">
                    <div class="add-consultation__form-item">
                        <input type="radio" name="consultation-sex" id="consultation-sex-male" value="Male" <?php if (isset($_GET['sex']) && $_GET['sex'] == 'Male') echo 'checked'; ?> required>
                        <label for="consultation-sex-male">Male</label>
                    </div>
                    <div class="add-consultation__form-item">
                        <input type="radio" name="consultation-sex" id="consultation-sex-female" value="Female" <?php if (isset($_GET['sex']) && $_GET['sex'] == 'Female') echo 'checked'; ?> required>
                        <label for="consultation-sex-female">Female</label>
                    </div>
                </div>
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-birthday">Birthday *</label>
                <input type="date" name="consultation-birthday" id="consultation-birthday" value="<?php echo isset($_GET['bday']) ? $_GET['bday'] : ''; ?>" required>
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-street">Street Address *</label>
                <input type="text" name="consultation-street" id="consultation-street" value="<?php echo isset($_GET['address']) ? $_GET['address'] : ''; ?>" required>
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-barangay">Barangay *</label>
                <input type="text" name="consultation-barangay" id="consultation-barangay" value="<?php echo isset($_GET['barangay']) ? $_GET['barangay'] : ''; ?>" required>
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-city">City *</label>
                <input type="text" name="consultation-city" id="consultation-city" value="<?php echo isset($_GET['city']) ? $_GET['city'] : ''; ?>" required>
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-contact">Phone Number</label>
                <input type="number" name="consultation-contact" id="consultation-contact" maxlength="11" min="1" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
            </div>


            <!-- Divider -->
            <hr id='symptom'>

            <h2 class="add-consultation__title">
                Symptoms
            </h2>
            <p class="add-consultation__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-consultation__form-item">
                <label for="consultation-symptoms">Symptoms *</label>
                <textarea name="consultation-symptoms" id="consultation-symptoms" cols="27" rows="10" required></textarea>
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-bp">Blood pressure (mmhg)</label>
                <input type="text" name="consultation-bp" id="consultation-bp">
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-weight">Weight (kg)</label>
                <input type="text" name="consultation-weight" id="consultation-weight">
            </div>

            <!-- Divider -->
            <hr id='lab'>

            <h2 class="add-consultation__title">
                Laboratory Results
            </h2>
            <p class="add-consultation__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-consultation__form-item">
                <label for="consultation-a">Abnormality</label>
                <input type="text" name="consultation-a" id="consultation-a">
            </div>
            <div class="add-consultation__form-item">
                <label for="consultation-prescriptions">Prescriptions *</label>
                <textarea name="consultation-prescriptions" id="consultation-prescriptions" cols="27" rows="10" required></textarea>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-consultation__form-btn">
                <button type="submit" class="btn-green btn-add" name="save_consultation" ">
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
            <li class="content__item">
                <a href="#symptom">Symptom</a>
            </li>
            <li class="content__item">
                <a href="#lab">Laboratory Results</a>
            </li>
        </ul>
    </section>
</main>