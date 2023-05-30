<main class="add-search_destroy">
    <section class="form" id='general'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        </p>
        <h2 class="add-search_destroy__title">
            Add New Search and Destroy Record
        </h2>
        <p class="add-search_destroy__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/add_query.php" method="POST" class="add-search_destroy__form">
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-email">Username (optional)</label>
                <input type="text" name="search_destroy-email" id="search_destroy-email" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>">
            </div>
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-barangay">Name of Barangay *</label>
                <input type="text" name="search_destroy-barangay" id="search_destroy-barangay" value="<?php echo isset($_GET['barangay']) ? $_GET['barangay'] : ''; ?>" required>
            </div>
            <div class="add-search_destroy__form-item"> <!--added-->
                <label for="search_destroy-city">City *</label>
                <input type="text" name="search_destroy-city" id="search_destroy-barangay" value="<?php echo isset($_GET['city']) ? $_GET['city'] : ''; ?>" required>
            </div>
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-purok">Purok/Block Coverage *</label>
                <input type="text" name="search_destroy-purok" id="search_destroy-purok" required>
            </div>


            <!-- Divider -->
            <hr id='detailed'>

            <h2 class="add-search_destroy__title">
                Detailed Summary
            </h2>
            <p class="add-search_destroy__desc">
                Fill out necessary information to complete the process
            </p>

            <div class="add-search_destroy__form-item">
                <label for="search_destroy-date">Date Visited *</label>
                <input type="date" name="search_destroy-date" id="search_destroy-date" required>
            </div>
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-owner_fname">Owner First Name *</label>
                <input type="text" name="search_destroy-owner_fname" id="search_destroy-owner" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : ''; ?>" required>
            </div>
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-owner_mname">Owner Middle Name</label>
                <input type="text" name="search_destroy-owner_mname" id="search_destroy-owner">
            </div>
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-owner_lname">Owner Last Name *</label>
                <input type="text" name="search_destroy-owner_lname" id="search_destroy-owner" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : ''; ?>" required>
            </div>
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-date">Birthdate *</label>
                <input type="date" name="search_destroy-bdate" id="search_destroy-date" value="<?php echo isset($_GET['bday']) ? $_GET['bday'] : ''; ?>" required>
            </div>
            <div class="add-deworming__form-item add-deworming__form-item--radio">
                <label for="search_destroy-sex">Sex *</label>
                <div class="add-deworming__form--role-item">
                    <div class="add-deworming__form-item">
                        <input type="radio" name="search_destroy-sex" id="search_destroy-sex-male" value="Male" <?php if (isset($_GET['sex']) && $_GET['sex'] == 'Male') echo 'checked'; ?> required> <!--Nilagyan ko Value para masave sa database-->
                        <label for="search_destroy-sex-male">Male</label>
                    </div>
                    <div class="add-deworming__form-item">
                        <input type="radio" name="search_destroy-sex" id="search_destroy-sex-female" value="Female" <?php if (isset($_GET['sex']) && $_GET['sex'] == 'Female') echo 'checked'; ?> required>
                        <label for="search_destroy-sex-female">Female</label>
                    </div>
                </div>
            </div>
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-address">Complete Address *</label>
                <textarea name="search_destroy-address" id="search_destroy-address" cols="27" rows="10" required><?php echo isset($_GET['address']) ? $_GET['address'] : ''; ?></textarea>
            </div>
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-pnumber">Phone Number</label>
                <input type="number" name="search_destroy-pnumber" id="search_destroy-number-container" maxlength="11" min="1" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
            </div>
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-name-container">Name of Container Positive for Larva *</label>
                <input type="text" name="search_destroy-name-container" id="search_destroy-name-container" required>
            </div>
            <div class="add-search_destroy__form-item">
                <label for="search_destroy-number-container">No. of Container Positive for Larva *</label>
                <input type="number" name="search_destroy-number-container" id="search_destroy-number-container" min="0" required>
            </div>
            <div class="add-deworming__form-item add-deworming__form-item--radio">
                <label for="search_destroy-remarks">Remarks *</label>
                <div class="add-deworming__form--role-item">
                    <div class="add-deworming__form-item">
                        <input type="radio" name="search_destroy-remarks" id="search_destroy-remarks-positive" value="Positive" required> <!--Nilagyan ko Value para masave sa database-->
                        <label for="search_destroy-remarks-positive">Positive</label>
                    </div>
                    <div class="add-deworming__form-item">
                        <input type="radio" name="search_destroy-remarks" id="search_destroy-remarks-negative" value="Negative" required>
                        <label for="search_destroy-remarks-negative">Negative</label>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr>

            <div class="add-search_destroy__form-btn">
                <button type="submit" class="btn-green btn-add" name="save_search_destroy" ">
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
                <a href="#general">General Information</a>
            </li>
            <li class="content__item content__item--active">
                <a href="#detailed">Detailed Summary</a>
            </li>

        </ul>
    </section>
</main>