<?php
if (isset($_GET['report__date'])) {
?>
    <!-- Postnatal daily reports -->
    <div class="modal deworming-reports" id="prenatal-daily-reports">
        <h4 class="consultation__report__title">
            City Government of Dasmariñas <br> City Health Office II
        </h4>
        <p class="consultation__report__city">
            City of Dasmariñas, Cavite
        </p>

        <h4 class="deworming-reports__title">
            All Services Reports
        </h4>
        <?php
            $query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $user) {
                    $user_name= $user['firstname'].' '.$user['lastname'];
                }
            }   
        ?>
        <p>Prepared by: <?php echo $user_name; ?></p>
        <div class="deworming-reports__details">
            <p class="deworming-reports__brgy">
                Name of Barangay: Datu Esmael
            </p>
            <!-- Query Start -->
            <?php
            if (isset($_GET['report__date']) && isset($_GET['report__date2'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                
                if($date2 == ""){
                    // CONVERT DATE TO MM-DD-YY
                    $date = new DateTime($date);
                    $new_date = $date->format("m-d-Y");
                    ?>
                        <div class="deworming-reports__date">
                            Date From: <?php echo $new_date; ?>
                        </div>
                    <?php
                }
                else{
                    // CONVERT DATE TO MM-DD-YY
                    $date = new DateTime($date);
                    $new_date = $date->format("m-d-Y");

                    $date2 = new DateTime($date2);
                    $new_date2 = $date2->format("m-d-Y");
                    ?>
                        <div class="deworming-reports__date">
                            Date From: <?php echo $new_date; ?>
                            <br>Date To: <?php echo $new_date2; ?>
                        </div>
                    <?php
                }
            } 
            ?>
            <!-- End Date Query -->
        </div>
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM prenatal WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if($date == $date && $date2 == ''){
                $query = "SELECT 
                (select count(*) FROM deworming WHERE archive_label='' AND deworming_date = '$date') + 
                (select count(*) FROM consultation WHERE archive_label='' AND consultation_date = '$date') +
                (select count(*) FROM early_childhood WHERE archive_label='' AND early_childhood_date = '$date') +
                (select count(*) FROM postnatal WHERE archive_label='' AND postnatal_date = '$date') +
                (select count(*) FROM prenatal WHERE archive_label='' AND prenatal_date = '$date') +
                (select count(*) FROM search_destroy WHERE archive_label='' AND search_destroy_date = '$date') +
                (select count(*) FROM other_service WHERE archive_label='' AND service_date = '$date')
                As totalvalue";
                $result = mysqli_query($conn, $query);
            } else{
                $query = "SELECT 
                (select count(*) FROM deworming WHERE archive_label='' AND deworming_date >= '$date' AND deworming_date <= '$date2') + 
                (select count(*) FROM consultation WHERE archive_label='' AND consultation_date >= '$date' AND consultation_date <= '$date2') +
                (select count(*) FROM early_childhood WHERE archive_label='' AND early_childhood_date >= '$date' AND early_childhood_date <= '$date2') +
                (select count(*) FROM postnatal WHERE archive_label='' AND postnatal_date >= '$date' AND postnatal_date <= '$date2') +
                (select count(*) FROM prenatal WHERE archive_label='' AND prenatal_date >= '$date' AND prenatal_date <= '$date2') +
                (select count(*) FROM search_destroy WHERE archive_label='' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2') +
                (select count(*) FROM other_service WHERE archive_label='' AND service_date >= '$date' AND service_date <= '$date2')
                As totalvalue";
                $result = mysqli_query($conn, $query);
            }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
        <p class="deworming-reports__brgy">
            Total No. of Records: <?php echo $row['totalvalue']; ?>
        </p>
        <?php
        }
        ?>
        <!-- Query End -->

        

        <table class="deworming-reports__table">
            <thead>
                <tr>
                    <th>DATE REGISTERED</th>
                    <th>NAME</th>
                    <th>SERVICES</th>
                </tr>
            </thead>
            <?php
            include 'includes/connection.php';
            if (isset($_GET['report__date'])) { //test
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT deworming_id, deworming_date, firstname, lastname, label FROM deworming WHERE deworming_date='$date'
                                UNION ALL
                                SELECT consultation_id, consultation_date, firstname, lastname, label FROM consultation WHERE consultation_date='$date'
                                UNION ALL
                                SELECT prenatal_id, prenatal_date, firstname, lastname, label FROM prenatal WHERE prenatal_date='$date'
                                UNION ALL
                                SELECT postnatal_id, postnatal_date, firstname, lastname, label FROM postnatal WHERE postnatal_date='$date'
                                UNION ALL
                                SELECT early_childhood_id, early_childhood_date, child_fname, child_lname, label FROM early_childhood WHERE early_childhood_date='$date'
                                UNION ALL
                                SELECT search_destroy_id, search_destroy_date, owner_fname, owner_lname, label FROM search_destroy WHERE search_destroy_date='$date'
                                UNION ALL
                                SELECT id, service_date, firstname, lastname, label FROM other_service WHERE service_date='$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT deworming_id, deworming_date, firstname, lastname, label FROM deworming WHERE deworming_date >='$date' AND deworming_date <='$date2'
                                UNION ALL
                                SELECT consultation_id, consultation_date, firstname, lastname, label FROM consultation WHERE consultation_date >='$date' AND consultation_date <='$date2'
                                UNION ALL
                                SELECT prenatal_id, prenatal_date, firstname, lastname, label FROM prenatal WHERE prenatal_date >='$date' AND prenatal_date <='$date2'
                                UNION ALL
                                SELECT postnatal_id, postnatal_date, firstname, lastname, label FROM postnatal WHERE postnatal_date >='$date' AND postnatal_date <='$date2'
                                UNION ALL
                                SELECT early_childhood_id, early_childhood_date, child_fname, child_lname, label FROM early_childhood WHERE early_childhood_date >='$date' AND early_childhood_date <='$date2'
                                UNION ALL
                                SELECT search_destroy_id, search_destroy_date, owner_fname, owner_lname, label FROM search_destroy WHERE search_destroy_date >='$date' AND search_destroy_date <='$date2'
                                UNION ALL
                                SELECT id, service_date, firstname, lastname, label FROM other_service WHERE service_date >='$date' AND service_date <='$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }
            }

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $patient) {
                    // CONVERT DATE TO MM-DD-YY
                    $prenatal_date = new DateTime($patient['deworming_date']);
                    $new_prenatal_date = $prenatal_date->format("m-d-Y");
            ?>
                    <tr>
                        <td> <?= $new_prenatal_date; ?> </td>
                        <td> <?= $patient['firstname']; ?> <?= $patient['lastname']; ?> </td>
                        <td> <?= $patient['label']; ?> </td>
                    
                    </tr>
            <?php
                }
            }
            ?>
        </table>

        <!-- Query To Disabled Save as PDF -->
        <?php
        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
    
            if($date2 == ''){
                $query = "SELECT count(*) FROM prenatal WHERE prenatal_date ='$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM prenatal WHERE prenatal_date >='$date' AND prenatal_date <='$date2'";
                $result = mysqli_query($conn, $query);
            }
            
        }

        while ($row = mysqli_fetch_array($result)) {
            if($row['count(*)']==0){
        ?>
                <button type="submit" class="btn-add services__btn btn-print" disabled>
                    Save as PDF
                </button>
        <?php
            }
            else{
                $mail = $_SESSION['user_email'];
                $query = "SELECT position, user_email FROM account_information WHERE user_email='$mail'
                        UNION ALL
                        SELECT label, deworming_email FROM deworming WHERE deworming_email='$mail'
                        UNION ALL
                        SELECT label, consultation_email FROM consultation WHERE consultation_email='$mail'
                        UNION ALL
                        SELECT label, prenatal_email FROM prenatal WHERE prenatal_email='$mail'
                        UNION ALL
                        SELECT label, postnatal_email FROM postnatal WHERE postnatal_email='$mail'
                        UNION ALL
                        SELECT label, search_destroy_email FROM search_destroy WHERE search_destroy_email='$mail'
                        UNION ALL
                        SELECT label, early_childhood_email FROM early_childhood WHERE early_childhood_email='$mail'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) == 1) {
                    $row = mysqli_fetch_assoc($query_run);
                    if($row['position'] == 'Barangay Health Worker'){
                        ?>
                            <button type="submit" class="btn-add services__btn btn-print" disabled>
                                Save as PDF
                            </button>
                        <?php
                    }
                    else{
                        ?>
                            <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf-daily_report.php?id=<?=$patient['deworming_id']?>&&label=All&&date=<?= $date; ?>&&date2=<?= $date2; ?>&&userName=<?= $user_name ?>')">
                                Save as PDF
                            </button>
                        <?php
                    }
                }
            }
        }
        ?>
        <!-- Query End -->
    </div>
<?php
}
?>