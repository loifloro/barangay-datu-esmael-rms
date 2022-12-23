
<section class="patient-profile__card">
    <!-- START QUERY -->
    <?php
            include "../dist/includes/connection.php";
            if(isset($_GET['id'])){
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM consultation WHERE consultation_id='$patient_id'";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0){
                    $patient = mysqli_fetch_array($query_run);
        ?>
    <ul class="patient-profile__list" role="list">
        <!-- photo, name, patient-id, contact number -->
        <ul class="patient-profile__item patient-profile__list--center" role="list">
            <li class="patient-profile__img">
                <img class=""
                        src="./assets/img/patient-profile.svg"
                        alt="">
            </li>
            <li class="patient-profile__id patient-profile__category">
                #<?= $patient['consultation_id']?>
            </li>
            <li class="patient-profile__name h5">
                <?= $patient['firstname']." " . $patient['lastname']; ?> <!--Test if displays the fname and lname-->
            </li>
            <li class="patient-profile__contact">
                <?= $patient['phone_number']?>
            </li>
        </ul>
        
        <ul class="patient-profile__item " role="list">
            <li class="patient-profile__sex">
                <span class="patient-profile__category">Sex</span>
                <?= $patient['sex']?>
            </li>
            <li class="patient-profile__street">
                <span class="patient-profile__category">Street Address</span>
                <?= $patient['street_address']?>
            </li>
            <li class="patient-profile__last-date-added">
                <span class="patient-profile__category">Date Added</span>
                <?= $patient['consultation_date']?>
            </li>
        </ul>
        <ul class="patient-profile__item" role="list">
            <li class="patient-profile__last-modified">
                <span class="patient-profile__category">Birthday</span>
                <?= $patient['birthdate']?>
            </li>
            <li class="patient-profile__last-city">
                <span class="patient-profile__category">City</span>
                <?= $patient['city']?>
            </li>
            
        </ul>
        <ul class="patient-profile__item" role="list">
            <li class="patient-profile__barangay">
                <span class="patient-profile__category">Barangay</span>
                <?= $patient['barangay']?>
            </li>
            
            <!-- Buttons -->
            <li class="patient-profile__btn">
                <button type="submit" class="btn-green btn-save">
                    <span>
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"><path d="M6 34.5V42h7.5l22.13-22.13-7.5-7.5L6 34.5zm35.41-20.41c.78-.78.78-2.05 0-2.83l-4.67-4.67c-.78-.78-2.05-.78-2.83 0l-3.66 3.66 7.5 7.5 3.66-3.66z"/><path fill="none" d="M0 0h48v48H0z"/></svg> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate"><defs><clipPath id="a"><rect width="64" height="64"/></clipPath></defs><g clip-path="url(#a)"><path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z"/></g></svg>
                    </span>
                    <p>Edit</p>
                </button>
                <!-- <button class="btn-red btn-delete">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M3.389 7.113L4.49 18.021c.061.461 2.287 1.977 5.51 1.979 3.225-.002 5.451-1.518 5.511-1.979l1.102-10.908C14.929 8.055 12.412 8.5 10 8.5c-2.41 0-4.928-.445-6.611-1.387zm9.779-5.603l-.859-.951C11.977.086 11.617 0 10.916 0H9.085c-.7 0-1.061.086-1.392.559l-.859.951C4.264 1.959 2.4 3.15 2.4 4.029v.17C2.4 5.746 5.803 7 10 7c4.198 0 7.601-1.254 7.601-2.801v-.17c0-.879-1.863-2.07-4.433-2.519zM12.07 4.34L11 3H9L7.932 4.34h-1.7s1.862-2.221 2.111-2.522c.19-.23.384-.318.636-.318h2.043c.253 0 .447.088.637.318.248.301 2.111 2.522 2.111 2.522h-1.7z"/></svg>
                    </span>
                    <p>Delete</p>
                </button> -->
            </li>
        </ul>
    </ul>
    <?php
            }
            }
            else
            {
                echo "<h5> No Record Found </h5>";
            }
    ?>   
    <!-- END OF QUERY MAIN -->
</section>

<!-- Medical History -->
<h2 class="medical-history__title">
    Medical History
</h2>
<section class="history">
    <section class="medical-history">
        <div class="medical-history__card">
            <ul class="medical-history__header medical-history__card__row" role="list">
                <li class="medical-history__item">
                    Services Availed
                </li>
                <li class="medical-history__item">
                    Service Date
                </li>
            </ul>
            <!-- Query for Medical History -->
            <?php
                        $patient_fname = $patient['firstname'];
                        $patient_lname = $patient['lastname'];
                        $query3 = "SELECT * FROM recent_activity WHERE patient_fname='$patient_fname' AND patient_lname ='$patient_lname'
                        ORDER BY recent_activity_id";
                        $query_run3 = mysqli_query($conn, $query3);
                            if(mysqli_num_rows($query_run3) > 0){
                            //  $recent2 = mysqli_fetch_array($query_run3);
                                foreach($query_run3 as $recent2){
                    ?>
            <ul class="medical-history__card__row" role="list">
                <li class="medical-history__item medical-history__service p-bold">
                    <?= $recent2['record_name']; ?>
                </li>
                <li class="medical-history__item medical-history__service__date-availed">
                    <?= $patient['consultation_date']; ?>
                </li>
                <li class="medical-history__item medical-history__btn">
                    <a href="edit/edit-consultation.php?id=<?= $patient['consultation_id']; ?>">
                        <svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate"><defs><clipPath id="a"><rect width="64" height="64"/></clipPath></defs><g clip-path="url(#a)"><path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z"/></g></svg>
                    </a>
                </li>
            </ul>
            <?php
                                }
                            }
            ?>
            <!-- End of Query for Medical History -->
        </div>
    </section>

    <section class="edit-history">
        <div class="edit-history__card">
            <div class="edit-history__header">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 32 32" viewBox="0 0 32 32"><path d="M12.82373,12.95898l-1.86279,6.21191c-0.1582,0.52832-0.01367,1.10156,0.37646,1.49121c0.28516,0.28516,0.66846,0.43945,1.06055,0.43945c0.14404,0,0.28906-0.02051,0.43066-0.06348l6.2124-1.8623c0.23779-0.07129,0.45459-0.2002,0.62988-0.37598L31.06055,7.41016C31.3418,7.12891,31.5,6.74707,31.5,6.34961s-0.1582-0.7793-0.43945-1.06055l-4.3501-4.34961c-0.58594-0.58594-1.53516-0.58594-2.12109,0L13.2002,12.3291C13.02441,12.50488,12.89551,12.7207,12.82373,12.95898z M15.58887,14.18262L25.6499,4.12109l2.22852,2.22852L17.81738,16.41113l-3.18262,0.9541L15.58887,14.18262z"/><path d="M30,14.5c-0.82861,0-1.5,0.67188-1.5,1.5v10c0,1.37891-1.12158,2.5-2.5,2.5H6c-1.37842,0-2.5-1.12109-2.5-2.5V6c0-1.37891,1.12158-2.5,2.5-2.5h10c0.82861,0,1.5-0.67188,1.5-1.5S16.82861,0.5,16,0.5H6C2.96729,0.5,0.5,2.96777,0.5,6v20c0,3.03223,2.46729,5.5,5.5,5.5h20c3.03271,0,5.5-2.46777,5.5-5.5V16C31.5,15.17188,30.82861,14.5,30,14.5z"/></svg>
                    </span>
                    <h4 class="edit-history__title">Edit History</h4>
            </div>
            <ul class="edit-history__list" role="list">
                <li class="edit-history__item">
                    <!-- Start Query For Recent Update -->
                    <?php
                        $patient_fname = $patient['firstname'];
                        $query2 = "SELECT * FROM recent_activity WHERE patient_fname='$patient_fname'
                        ORDER BY recent_activity_id LIMIT 3";
                        $query_run2 = mysqli_query($conn, $query2);
                            if(mysqli_num_rows($query_run2) > 0){
                            //  $recent = mysqli_fetch_array($query_run2);
                                foreach($query_run2 as $recent){
                    ?>
                    <span class="edit-history__editor p-bold">
                        <?= $recent['user_fname'].' '.$recent['user_lname'].' '.$recent['changes_label']; ?>
                    </span>
                    <span class="edit-history edit-history__action p-bold"><?= $recent['patient_fname'].' '.$patient['lastname']; ?> </span>
                    <span class="edit-history__subject"><?= $recent['record_name']; ?> record</span> on
                    <span class="edit-history__date"><?= $recent['date_edit']; ?></span>
                        <hr>
                    <?php
                                }
                        }
                    ?>
                    <!-- End Query For Recent Update -->
                </li>
            </ul>
        </div>
    </section>
</section>