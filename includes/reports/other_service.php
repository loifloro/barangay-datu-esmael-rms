<div id="other_service_report<?= $patient['id']; ?>" class="modal consultation__report">
    <h4 class="consultation__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of Dasmariñas, Cavite
    </p>

    <h5 class="consultation__report__title consultation__report__patient-record">
        <?= $patient['service_name'];?> Record
    </h5>

    <div class="consultation__report__personal-info">
        <p class="consultation__report__personal-info__item consultation__report__personal-info__name">
            Name:
            <span class="value">
                <?= $patient['firstname'] . " " . $patient['middlename'] . " " . $patient['lastname']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__age">
            Age:
            <span class="value">
                <?= $patient['age']; ?>
            </span>
        </p>
        <?php
        // CONVERT DATE TO MM-DD-YY
        $consul_bdate = new DateTime($patient['bdate']);
        $new_consul_bdate = $consul_bdate->format("m-d-Y");
        ?>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__bday">
            Birthday:
            <span class="value">
                <?= $new_consul_bdate; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__address">
            Address:
            <span class="value">
                <?= $patient['address'] . " " . $patient['barangay'] . " " . $patient['city']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__phone">
            Phone Number#:
            <span class="value">
                <?= $patient['phone_num']; ?>
            </span>
        </p>
        <?php
        // CONVERT DATE TO MM-DD-YY
        $consul_date = new DateTime($patient['service_date']);
        $new_consul_date = $consul_date->format("m-d-Y");

        // $consul_bdate = new DateTime($patient['birthdate']);
        // $new_consul_bdate = $consul_bdate->format("m-d-Y");
        ?>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__date">
            Date:
            <span class="value">
                <?= $new_consul_date; ?>
            </span>
        </p>
    </div>

    <div class="padding-left">
        <p class="prenatal__report__a">
            <abbr title="">Descriptions </abbr>
            <span class="value">
                <?= $patient['description']; ?>
            </span>
        </p>
        <p class="prenatal__report__p">
            <abbr title="">Result </abbr>
            <span class="value">
                <?= $patient['result']; ?>
            </span>
        </p>
        <p class="prenatal__report__p">
            <abbr title="">Prescriptions </abbr>
            <span class="value">
                <?= $patient['prescription']; ?>
            </span>
        </p>
        <?php
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
                      SELECT label, early_childhood_email FROM early_childhood WHERE early_childhood_email='$mail'
                      UNION ALL
                      SELECT label, service_email FROM other_service WHERE service_email='$mail'";
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
                        <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf.php?id=<?= $patient['id'] ?>&&label=<?= $patient['label'] ?>')">
                            Save as PDF
                        </button>
                    <?php
                }
            }   
        ?>
        
    </div>
</div>

<?php
if (isset($_GET['report__date'])) {
?>
    <!-- Consultation daily reports -->
    <div class="modal deworming-reports" id="other-daily-reports">
        <h4 class="consultation__report__title">
            City Government of Dasmariñas <br> City Health Office II
        </h4>
        <p class="consultation__report__city">
            City of Dasmariñas, Cavite
        </p>

        <h4 class="deworming-reports__title">
            <?php
                if (isset($_GET['report__service'])){
                    $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
                }
               
            ?>
            <?php echo $service_name; ?> Reports
        </h4>
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
        $query = "SELECT count(*) FROM other_service WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM other_service WHERE service_date = '$date' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__brgy">
                Total No. of Patient: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->


        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Male'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Male' AND service_date = '$date' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Male' AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Male: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Female'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Female' AND service_date = '$date' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Female' AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Female: <?php echo $row['count(*)']; ?>
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
                    <th>ADDRESS</th>
                    <th>AGE</th>
                    <th>SEX</th>
                </tr>
            </thead>
            <?php
            include 'includes/connection.php';
            if (isset($_GET['report__date'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT * FROM other_service WHERE archive_label='' AND service_date = '$date' AND service_name = '$service_name'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT * FROM other_service WHERE archive_label='' AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                        $query_run = mysqli_query($conn, $query);
                    }
            }

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $patient) {
                    // CONVERT DATE TO MM-DD-YY
                    $d_date = new DateTime($patient['service_date']);
                    $new_consul_date = $d_date->format("m-d-Y");
            ?>
                    <tr>
                        <td> <?= $new_consul_date; ?> </td>
                        <td> <?= $patient['firstname']; ?> <?= $patient['middlename']; ?> <?= $patient['lastname']; ?> </td>
                        <td> <?= $patient['address'] . ' ' . $patient['barangay']; ?> </td>
                        <td> <?= $patient['age']; ?> </td>
                        <td> <?= $patient['sex']; ?> </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>

        <p class="dewroming-reports__total p-bold">
            Total No. of Patient Based on Age:
        </p>
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=1 AND age<=12";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=1 AND age<=12 AND service_date = '$date' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=1 AND age<=12 AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="dewroming-reports__total">
                Age 1-12 y/o: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=13 AND age<=19";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=13 AND age<=19 AND service_date = '$date' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=13 AND age<=19 AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="dewroming-reports__total">
                Age 13-19 y/o: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=20";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=20 AND service_date = '$date' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=20 AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                    $result = mysqli_query($conn, $query);
                }
        }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age 20-up y/o: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->
    
    <!-- Query To Disabled Save as PDF -->
    <?php
    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
        $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);

        if($date2 == ''){
            $query = "SELECT count(*) FROM other_service WHERE service_date ='$date'";
            $result = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT count(*) FROM other_service WHERE service_date >='$date' AND service_date <='$date2'";
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
                      SELECT label, early_childhood_email FROM early_childhood WHERE early_childhood_email='$mail'
                      UNION ALL
                      SELECT label, service_email FROM other_service WHERE service_email='$mail'";
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
                        <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf-daily_report.php?id=<?=$patient['id']?>&&label=<?=$patient['label']?>&&date=<?= $date; ?>&&date2=<?= $date2; ?>&&service_name=<?= $service_name; ?>')">
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