<main class="add-deworming">
    <section class="form" id='personal'>

        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="add-deworming__title">
            Add New Deworming Record
        </h2>
        <p class="add-deworming__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/add_query.php" method="POST" class="add-deworming__form">
            <div class="add-deworming__form-item">
                <label for="deworming-lname">Username (optional)</label>
                <input type="text" name="deworming-email" id="deworming-email" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>">
            </div>
            <div class="add-deworming__form-item">
                <label for="deworming-lname">Last Name *</label>
                <input type="text" name="deworming-lname" id="deworming-lname" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : ''; ?>" required>
            </div>
            <div class="add-deworming__form-item">
                <label for="deworming-fname">First Name *</label>
                <input type="text" name="deworming-fname" id="deworming-fname" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : ''; ?>" required>
            </div>
            <div class="add-deworming__form-item">
                <label for="deworming-mname">Middle Name</label>
                <input type="text" name="deworming-mname" id="deworming-mname">
            </div>
            <!-- <div class="add-deworming__form-item">
                    <label for="deworming-age">Age *</label>
                    <input type="number" name="deworming-age" id="deworming-age" maxlength="2" min="1" required>
                </div> -->
            <div class="add-deworming__form-item"> <!--added input box-->
                <label for="deworming-phone_num">Phone Number</label>
                <input type="number" name="deworming-phone_num" id="deworming-age" maxlength="11" min="1" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
            </div>
            <div class="add-deworming__form-item add-deworming__form-item--radio">
                <label for="deworming-sex">Sex *</label>
                <div class="add-deworming__form--role-item">
                    <div class="add-deworming__form-item">
                        <input type="radio" name="deworming-sex" id="deworming-sex-male" value="Male" <?php if (isset($_GET['sex']) && $_GET['sex'] == 'Male') echo 'checked'; ?> required> <!--Nilagyan ko Value para masave sa database-->
                        <label for="deworming-sex-male">Male</label>
                    </div>
                    <div class="add-deworming__form-item">
                        <input type="radio" name="deworming-sex" id="deworming-sex-female" value="Female" <?php if (isset($_GET['sex']) && $_GET['sex'] == 'Female') echo 'checked'; ?> required>
                        <label for="deworming-sex-female">Female</label>
                    </div>
                </div>
            </div>
            <div class="add-deworming__form-item">
                <label for="deworming-birthday">Birthday *</label>
                <input type="date" name="deworming-birthday" id="deworming-birthday" value="<?php echo isset($_GET['bday']) ? $_GET['bday'] : ''; ?>" required>
            </div>
            <div class="add-deworming__form-item">
                <label for="deworming-street">Street Address *</label>
                <input type="text" name="deworming-street" id="deworming-street" value="<?php echo isset($_GET['address']) ? $_GET['address'] : ''; ?>" required>
            </div>
            <div class="add-deworming__form-item">
                <label for="deworming-barangay">Barangay</label>
                <input type="text" name="deworming-barangay" id="deworming-barangay" value="<?php echo isset($_GET['barangay']) ? $_GET['barangay'] : ''; ?>">
            </div>
            <div class="add-deworming__form-item">
                <label for="deworming-city">City</label>
                <input type="text" name="deworming-city" id="deworming-city" value="<?php echo isset($_GET['city']) ? $_GET['city'] : ''; ?>">
            </div>





            <!-- Divider -->
            <hr>

            <div class="add-deworming__form-btn">
                <button id='btn-submit' type="submit" class="btn-green btn-save" name="save_deworming">
                    Save
                </button>
                <button type="button" class="btn-red btn-cancel" onclick="confirmReset(form)"> <!--added type and onclick-->
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
            <!-- <li class="content__item">
                    <a href="">Reason</a>
                </li> -->
        </ul>
    </section>
</main>