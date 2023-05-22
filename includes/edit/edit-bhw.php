<!-- Contents -->
<main class="edit-bhw">
    <section class="form" id='personal'>
        <p class="back__btn">
            <a href="#" onclick="backAlert()">Back</a>
        </p>
        <h2 class="edit-bhw__title">
            Edit Profile
        </h2>
        <p class="edit-bhw__desc">
            Fill out necessary information to complete the process
        </p>

        <form action="includes/edit_query.php" method='POST' class="edit-bhw__form">
            <?php
            if (isset($_GET['id'])) {
                $user_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM account_information WHERE account_id ='$user_id' ";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $user = mysqli_fetch_array($query_run);
            ?>
                    <input type="hidden" name="account_id" value="<?= $user['account_id']; ?>"> <!--nakahide sya para access ID sa edit-->

                    <div class="edit-bhw__form-item">
                        <label for="bhw-name">First Name *</label>
                        <input type="text" name="bhw-fname" id="bhw-name" value="<?= $user['firstname']; ?>" required>
                    </div>
                    <div class="edit-bhw__form-item">
                        <label for="bhw-name">Last Name *</label>
                        <input type="text" name="bhw-lname" id="bhw-name" value="<?= $user['lastname']; ?>" required>
                    </div>
                    <div class="edit-bhw__form-item">
                        <label for="bhw-name">Middle Name</label>
                        <input type="text" name="bhw-mname" id="bhw-name" value="<?= $user['middlename']; ?>">
                    </div>
                    <div class="edit-bhw__form-item edit-bhw__form-item--radio">
                        <label for="bhw-sex">Sex *</label>
                        <div class="edit-bhw__form--role-item">
                            <div class="edit-bhw__form-item">
                                <input type="radio" name="bhw-sex" id="bhw-sex-male" value="Male" <?= ($user['sex'] == 'Male') ? 'checked' : '' ?> required>
                                <label for="bhw-sex-male">Male</label>
                            </div>
                            <div class="edit-bhw__form-item">
                                <input type="radio" name="bhw-sex" id="bhw-sex-female" value="Female" <?= ($user['sex'] == 'Female') ? 'checked' : '' ?> required>
                                <label for="bhw-sex-female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="edit-bhw__form-item">
                        <label for="bhw-contact">Contact Number</label>
                        <input type="number" name="bhw-contact" id="bhw-contact" value="<?= $user['phone_num']; ?>" maxlength="11" min="0">
                    </div>
                    <?php
                    if ($user['user_email'] == '') {
                        $email = $user['default_email'];
                    ?>
                        <div class="edit-bhw__form-item">
                            <label for="bhw-contact">New Username *</label>
                            <input type="text" name="bhw-email" id="bhw-contact" value="" required>
                        </div>
                    <?php
                    }
                    if ($user['default_email'] == '') {
                        $email = $user['user_email'];
                    ?>
                        <div class="edit-bhw__form-item">
                            <label for="bhw-contact">Username *</label>
                            <input type="text" name="bhw-email" id="bhw-contact" value="<?= $user['user_email']; ?>" required>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="edit-bhw__form-item">
                        <label for="bhw-birthday">Birthday *</label>
                        <input type="date" name="bhw-birthday" id="bhw-birthday" value="<?= $user['birthday']; ?>" required>
                    </div>
                    <div class="edit-bhw__form-item">
                        <label for="bhw-street-address">Street Address *</label>
                        <input type="text" name="bhw-street-address" id="bhw-street-address" value="<?= $user['street_add']; ?>" required>
                    </div>
                    <div class="edit-bhw__form-item">
                        <label for="bhw-barangay">Barangay *</label>
                        <input type="text" name="bhw-barangay" id="bhw-barangay" value="<?= $user['barangay']; ?>" required>
                    </div>
                    <div class="edit-bhw__form-item">
                        <label for="bhw-city">City *</label>
                        <input type="text" name="bhw-city" id="bhw-city" value="<?= $user['city']; ?>" required>
                    </div>

                    <!-- Divider -->
                    <hr id='security'>

                    <h2 class="edit-bhw__title">
                        Security Question
                    </h2>
                    <p class="edit-bhw__desc">
                        The answer on the security would be needed when resetting a password
                    </p>
                    <div class="edit-bhw__form-item">
                        <label for="bhw-security-question">Security Question *</label>
                        <!-- If it already has a value, it should be disabled -->
                        <select name="bhw-security-question" id="">
                            <option value="In what city were you born?" value="<?= $user['security_question']; ?>" <?= ($user['security_question'] == 'In what city were you born?') ? 'selected' : '' ?> required>In what city were you born?</option>
                            <option value="What is the name of your favorite pet?" value="<?= $user['security_question']; ?>" <?= ($user['security_question'] == 'What is the name of your favorite pet?') ? 'selected' : '' ?> required>What is the name of your favorite pet?</option>
                            <option value="What high school did you attend?" value="<?= $user['security_question']; ?>" <?= ($user['security_question'] == 'What high school did you attend?') ? 'selected' : '' ?> required>What high school did you attend?</option>
                            <option value="What was the name of your elementary school?" value="<?= $user['security_question']; ?>" <?= ($user['security_question'] == 'What was the name of your elementary school?') ? 'selected' : '' ?> required>What was the name of your elementary school?</option>
                            <option value="What was the make of your first car?" value="<?= $user['security_question']; ?>" <?= ($user['security_question'] == 'What was the make of your first car?') ? 'selected' : '' ?> required>What was the make of your first car?</option>
                        </select>
                    </div>
                    <div class="edit-bhw__form-item">
                        <label for="bhw-security-question-answer">Security Answer *</label>
                        <input type="text" name="bhw-security-question-answer" id="bhw-security-question-answer" value="<?= $user['security_answer']; ?>" required>
                    </div>

                    <h2 class="edit-bhw__title">
                        Password
                    </h2>
                    <p class="edit-bhw__desc">
                        Enter your account password to proceed
                    </p>
                    <div class="edit-bhw__form-item">
                        <label for="bhw-new-password">New Password</label>
                        <div class="password">
                            <input type="password" class="password__bar__input" id="bhw-new-password" min="8" name="bhw-new-password" placeholder="Enter your password" /><!--  
                --><button type="button" class="password__bar__btn" onclick="passwordToggle('bhw-new-password' , 'password-show-p' , 'password-hide-p')">
                                <svg id='password-show-p' class="password-icon password__bar__icon password-show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                </svg>
                                <svg id='password-hide-p' class="password-icon password__bar__icon password-hide password-icon--hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24M1 1l22 22" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="edit-bhw__form-item">
                        <label for="bhw-confirm-new-password">Confirm New Password</label>
                        <div class="password">
                            <input type="password" class="password__bar__input" id="bhw-confirm-new-password" min="8" name="bhw-confirm-new-password" placeholder="Confirm your password" /><!--  
                --><button type="button" class="password__bar__btn" onclick="passwordToggle('bhw-confirm-new-password', 'password-show-np' , 'password-hide-np')">
                                <svg id='password-show-np' class="password-icon password__bar__icon password-show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z" />
                                </svg>
                                <svg id='password-hide-np' class="password-icon password__bar__icon password-hide password-icon--hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24M1 1l22 22" />
                                </svg>
                            </button>
                        </div>
                    </div>


                    <!-- Divider -->
                    <hr>

                    <!-- Buttons -->
                    <div class="edit-bhw__form-btn">
                        <!-- <button type="submit" class="btn-green btn-save" name="edit_bhw" onclick="return  confirm('Do you want to edit this account?')"> onclick added -->
                        <button type="submit" class="btn-green btn-save" name="edit_bhw"> <!--onclick added-->
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
        </form>
    </section>

    <section class="contents">
        <ul class="contents__list">
            <li class="content__item content__item--active">
                <a href="#personal">Personal Information</a>
            </li>
            <li class="content__item content__item--active">
                <a href="#security">Security Question</a>
            </li>
            <li class="content__item">
                <a href="#password">Password</a>
            </li>
        </ul>
    </section>
</main>


<?php
if (isset($_GET['error'])) {
?>
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            icon: 'error',
            iconColor: 'white',
            title: '<?php echo $_GET["error"] ?>',
            customClass: {
                popup: 'toast'
            },
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        })
    </script>
<?php
}

?>