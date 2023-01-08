<section class="patient-profile__card">
    <!-- START QUERY -->
    <?php
            include "../dist/includes/connection.php";
            if(isset($_GET['id'])){
                $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM prenatal WHERE prenatal_id='$patient_id'";
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
                #<?= $patient['prenatal_id']; ?>
            </li>
            <li class="patient-profile__name h5">
                <?= $patient['firstname']." " . $patient['lastname']; ?>
            </li>
            <li class="patient-profile__contact">
                <?= $patient['phone_num']; ?>
            </li>
        </ul>
        
        <ul class="patient-profile__item " role="list">
            <li class="patient-profile__sex">
                <span class="patient-profile__category">Sex</span>
                <?= $patient['sex']; ?>
            </li>
            <li class="patient-profile__street">
                <span class="patient-profile__category">Street Address</span>
                <?= $patient['street_address']; ?>
            </li>
            <li class="patient-profile__last-date-added">
                <span class="patient-profile__category">Date Added</span>
                    <?= $patient['prenatal_date']; ?>
            </li>
        </ul>
        <ul class="patient-profile__item" role="list">
            <li class="patient-profile__last-modified">
                <span class="patient-profile__category">Birthday</span>
                <?= $patient['birthdate']; ?>
            </li>
            <li class="patient-profile__last-city">
                <span class="patient-profile__category">City</span>
                <?= $patient['city']; ?>
            </li>
            <li class="patient-profile__barangay">
                <span class="patient-profile__category">Barangay</span>
                <?= $patient['barangay']; ?>
            </li>
        </ul>
        <ul class="patient-profile__item" role="list">
            <li class="patient-profile__barangay">
                <span class="patient-profile__category">Registered Email</span>
                <?= $patient['prenatal_email']; ?>
            </li>
            <li class="patient-profile__barangay">
                <span class="patient-profile__category">Generated Password</span>
                <?= $patient['prenatal_password']; ?>
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
                        // $patient_fname = $patient['firstname'];
                        // $patient_lname = $patient['lastname'];
                        // $patient_label = $patient['label'];
                        // $query3 = "SELECT * FROM recent_activity WHERE patient_fname ='$patient_fname' AND patient_lname ='$patient_lname' GROUP BY record_name
                        // ORDER BY recent_activity_id";
                        // $query_run3 = mysqli_query($conn, $query3);
                        //     if(mysqli_num_rows($query_run3) > 0){

                            $filtervalues = $patient['firstname'];
                            $filtervalues2 = $patient['lastname'];
                            $query3 = "SELECT deworming_id, firstname, lastname, deworming_date, sex, phone_num, label 
                                      FROM deworming WHERE CONCAT(firstname,lastname,deworming_date,sex,phone_num, label) 
                                      LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,deworming_date,sex,phone_num, label) LIKE '%$filtervalues2%' GROUP BY label
                                      UNION ALL
                                      SELECT consultation_id, firstname, lastname, consultation_date, sex, phone_number, label 
                                      FROM consultation WHERE CONCAT(firstname,lastname,consultation_date,sex,phone_number, label) 
                                      LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,consultation_date,sex,phone_number, label) LIKE '%$filtervalues2%' GROUP BY label
                                      UNION ALL
                                      SELECT prenatal_id, firstname, lastname, prenatal_date, sex, phone_num, label 
                                      FROM prenatal WHERE CONCAT(firstname,lastname,prenatal_date,sex,phone_num, label) 
                                      LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,prenatal_date,sex,phone_num, label) LIKE '%$filtervalues2%' GROUP BY label
                                      UNION ALL
                                      SELECT postnatal_id, firstname, lastname, postnatal_date, sex, phone_num, label 
                                      FROM postnatal WHERE CONCAT(firstname,lastname,postnatal_date,sex,phone_num, label) 
                                      LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,postnatal_date,sex,phone_num, label) LIKE '%$filtervalues2%' GROUP BY label
                                      UNION ALL
                                      SELECT search_destroy_id, owner_fname, owner_lname, search_destroy_date, sex, phone_num, label 
                                      FROM search_destroy WHERE CONCAT(owner_fname,owner_lname,search_destroy_date,sex,phone_num, label) 
                                      LIKE '%$filtervalues%' AND CONCAT(owner_fname,owner_lname,search_destroy_date,sex,phone_num, label) LIKE '%$filtervalues2%' GROUP BY label
                                      UNION ALL
                                      SELECT early_childhood_id, child_fname, child_lname, early_childhood_date, sex, phone_num, label 
                                      FROM early_childhood WHERE CONCAT(child_fname,child_lname,early_childhood_date,sex,phone_num, label) 
                                      LIKE '%$filtervalues%' AND CONCAT(child_fname,child_lname,early_childhood_date,sex,phone_num, label)  LIKE '%$filtervalues2%' GROUP BY label
                                      ";
                            $query_run3 = mysqli_query($conn, $query3); 
                            if(mysqli_num_rows($query_run3) > 0){
                                foreach($query_run3 as $recent3){
                    ?>
            <ul class="medical-history__card__row" role="list">
                <li class="medical-history__item medical-history__service p-bold">
                    <?= $recent3['label']; ?>
                </li>
                <li class="medical-history__item medical-history__service__date-availed">
                    <?= $patient['prenatal_date']; ?>
                </li>
                <li class="medical-history__item medical-history__btn">
                    <!-- START QUERY FOR EDIT SERVICES-->
                    <?php
                        if(isset($_GET['label'])){
                            $patient_label = mysqli_real_escape_string($conn, $_GET['label']);
                            $changes_label=$recent3['label'];

                                //DEWORMING
                                if(($changes_label == "Deworming") AND (isset($_GET['id']))){
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM deworming WHERE firstname='$patient_fname' AND lastname='$patient_lname'";
                                    $query_run = mysqli_query($conn, $query);
                
                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $deworm){
                                            $patient_id = $deworm['deworming_id'];
                                            $link = "edit/edit-deworming.php?id=". $patient_id;
                                        }
                                    }
                                }

                                //C0NSULTATION
                                if(($changes_label == "Consultation") AND (isset($_GET['id']))){
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM consultation WHERE firstname='$patient_fname' AND lastname='$patient_lname'";
                                    $query_run = mysqli_query($conn, $query);
                
                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $consul){
                                            $patient_id = $consul['consultation_id'];
                                            $link = "edit/edit-consultation.php?id=". $patient_id;
                                        }
                                    }
                                }

                                //PRENATAL
                                if(($changes_label == "Prenatal") AND (isset($_GET['id']))){
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM prenatal WHERE firstname='$patient_fname' AND lastname='$patient_lname'";
                                    $query_run = mysqli_query($conn, $query);
                
                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $pre){
                                            $patient_link = $pre['prenatal_id'];
                                            $link = "edit/edit-prenatal.php?id=". $patient_link;
                                        }
                                    }
                                }

                                //POSTNATAL
                                if(($changes_label == "Postnatal") AND (isset($_GET['id']))){
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM postnatal WHERE firstname='$patient_fname' AND lastname='$patient_lname'";
                                    $query_run = mysqli_query($conn, $query);
                
                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $post){
                                            $patient_link = $post['postnatal_id'];
                                            $link = "edit/edit-postnatal.php?id=". $patient_link;
                                        }
                                    }
                                }

                                //SEARCH AND DESTROY
                                if(($changes_label == "Search and Destroy") AND (isset($_GET['id']))){
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM search_destroy WHERE owner_fname='$patient_fname' AND owner_lname='$patient_lname'";
                                    $query_run = mysqli_query($conn, $query);
                
                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $search_des){
                                            $patient_link = $search_des['search_destroy_id'];
                                            $link = "edit/edit-search_destroy.php?id=". $patient_link;
                                        }
                                    }
                                }

                                //EARLY CHILDHOOD
                                if(($changes_label == "Early Childhood") AND (isset($_GET['id']))){
                                    $patient_id = mysqli_real_escape_string($conn, $_GET['id']);
                                    $query = "SELECT * FROM early_childhood WHERE child_fname='$patient_fname' AND child_lname='$patient_lname'";
                                    $query_run = mysqli_query($conn, $query);
                
                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $early){
                                            $patient_link = $early['early_childhood_id'];
                                            $link = "edit/edit-early_childhood.php?id=". $patient_link;
                                        }
                                    }
                                }
                           
                    ?>
                    <a href="<?= $link; ?>">
                        <svg id="edit-profile" class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="64pt" height="64pt" viewBox="0 0 64 64" style="isolation:isolate"><defs><clipPath id="a"><rect width="64" height="64"/></clipPath></defs><g clip-path="url(#a)"><path d="M43.926 8.803L49.563 3.167C51.118 1.611 53.643 1.611 55.199 3.167L60.835 8.803C62.39 10.358 62.382 12.876 60.817 14.421L55.146 20.022C54.624 20.537 53.78 20.535 53.261 20.016L43.926 10.681C43.408 10.163 43.408 9.321 43.926 8.803zM42.048 12.56L51.441 21.954C51.96 22.472 51.96 23.314 51.441 23.833L15.276 59.998C15.017 60.257 14.511 60.51 14.148 60.562L4.285 61.971C2.834 62.178 1.823 61.168 2.031 59.716L3.44 49.853C3.492 49.49 3.744 48.985 4.003 48.726L40.169 12.56C40.687 12.042 41.529 12.042 42.048 12.56z"/></g></svg>
                    </a>
                    <a href="#">
                    <svg id="archive-profile" class='archive-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M18.521 1.478a1 1 0 0 0-1.414 0L1.48 17.107a1 1 0 1 0 1.414 1.414L18.52 2.892a1 1 0 0 0 0-1.414zM3.108 13.498l2.56-2.56A4.18 4.18 0 0 1 5.555 10c0-2.379 1.99-4.309 4.445-4.309.286 0 .564.032.835.082l1.203-1.202A12.645 12.645 0 0 0 10 4.401C3.44 4.4 0 9.231 0 10c0 .423 1.057 2.09 3.108 3.497zm13.787-6.993l-2.562 2.56c.069.302.111.613.111.935 0 2.379-1.989 4.307-4.444 4.307-.284 0-.56-.032-.829-.081l-1.204 1.203c.642.104 1.316.17 2.033.17 6.56 0 10-4.833 10-5.599 0-.424-1.056-2.09-3.105-3.495z"/></svg>
                    </a>
                    <?php
                         }
                    ?>
                    <!-- END QUERY FOR EDIT SERVICES -->
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
                        $patient_lname = $patient['lastname'];
                        $query2 = "SELECT * FROM recent_activity WHERE patient_fname='$patient_fname' AND patient_lname='$patient_lname'
                        ORDER BY recent_activity_id DESC LIMIT 3";
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
