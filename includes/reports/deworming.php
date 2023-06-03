<!-- Deworming - report -->
<div id='deworming-modal<?= $patient['deworming_id']; ?>' class="modal deworming-report__table">
    <ul class="deworming-report__table__row deworming-report__header" role="list">
        <li class="deworming-report__table__item">
            Name
        </li>
        <li class="deworming-report__table__item">
            Sex
        </li>
        <li class="deworming-report__table__item">
            Age
        </li>
        <li class="deworming-report__table__item">
            Birthdate
        </li>
        <li class="deworming-report__table__item">
            Address
        </li>
        <li class="deworming-report__table__item">
            Date Availed
        </li>
    </ul>

    <ul class="deworming-report__table__row deworming-report__item" role="list">
        <li class="deworming-report__table__item">
            <?= $patient['firstname'] . " " . $patient['lastname']; ?>
        </li>
        <li class="deworming-report__table__item">
            <?= $patient['sex']; ?>
        </li>
        <li class="deworming-report__table__item">
            <?= $patient['age']; ?>
        </li>
        <?php
            // CONVERT DATE TO MM-DD-YY
            $deworm_bdate = new DateTime($patient['birthdate']);
            $new_deworm_bdate = $deworm_bdate->format("m-d-Y");
        ?>
        <li class="deworming-report__table__item">
            <?= $new_deworm_bdate; ?>
        </li>
        <li class="deworming-report__table__item">
            <?= $patient['street_address'] . " " . $patient['barangay'] . " " . $patient['city']; ?>
        </li>
        <?php
            // CONVERT DATE TO MM-DD-YY
            $deworm_date = new DateTime($patient['deworming_date']);
            $new_deworm_date = $deworm_date->format("m-d-Y");
        ?>
        <li class="deworming-report__table__item">
            <?= $new_deworm_date; ?>
        </li>
    </ul>
</div>

<div id='deworming-reports' class="modal deworming-reports">
    <h4 class="search-and-destroy__report__title">
        Daily Activity (Deworming)
    </h4>

    <table class="deworming-reports__table">
        <thead>
            <tr>
                <th>DATE</th>
                <th>LAST NAME</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>AGE</th>
                <th>GENDER</th>
                <th>BIRTHDAY</th>
                <th>ADDRESS</th>
                <th>SIGNATURE</th>
            </tr>
        </thead>
        <?php
        include 'includes/connection.php';
        $query = "SELECT * FROM deworming WHERE archive_label='' ORDER BY deworming_date";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $patient) {
        ?>
                <tr>
                    <td> <?= $patient['deworming_date']; ?> </td>
                    <td> <?= $patient['lastname']; ?> </td>
                    <td> <?= $patient['firstname']; ?> </td>
                    <td> <?= $patient['middlename']; ?> </td>
                    <td> <?= $patient['age']; ?> </td>
                    <td> <?= $patient['sex']; ?> </td>
                    <td> <?= $patient['birthdate']; ?> </td>
                    <td> <?= $patient['street_address'] . ' ' . $patient['barangay'] . ' ' . $patient['city'] ?> </td>
                    <td></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
    <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf.php?id=<?=$patient['deworming_id']?>&&label=<?=$patient['label']?>')">
    Save as PDF
    </button>
</div>


<div class="modal deworming-reports" id="deworming-daily-reports">
    <h4 class="consultation__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of Dasmariñas, Cavite
    </p>

    <h4 class="deworming-reports__title">
        Deworming reports
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
    $query = "SELECT count(*) FROM deworming WHERE archive_label=''";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM deworming WHERE deworming_date = '$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND deworming_date >= '$date' AND deworming_date <= '$date2'";
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
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Male'";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Male' AND deworming_date = '$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Male' AND deworming_date >= '$date' AND deworming_date <= '$date2'";
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
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Female'";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Female' AND deworming_date = '$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Female' AND deworming_date >= '$date' AND deworming_date <= '$date2'";
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
                <th>DATE</th>
                <th>LAST NAME</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>AGE</th>
                <th>GENDER</th>
                <th>BIRTHDAY</th>
                <th>ADDRESS</th>
            </tr>
        </thead>
        <?php
        include 'includes/connection.php';
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if($date == $date && $date2 == ''){
                $query = "SELECT * FROM deworming WHERE archive_label='' AND deworming_date = '$date'";
                $query_run = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT * FROM deworming WHERE archive_label='' AND deworming_date >= '$date' AND deworming_date <= '$date2'";
                $query_run = mysqli_query($conn, $query);
            }
        }

        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $patient) {
                // CONVERT DATE TO MM-DD-YY
                $d_date = new DateTime($patient['deworming_date']);
                $new_deworm_date = $d_date->format("m-d-Y");

                $b_date = new DateTime($patient['birthdate']);
                $new_bdate = $b_date->format("m-d-Y");
        ?>
                <tr>
                    <td> <?= $new_deworm_date; ?> </td>
                    <td> <?= $patient['lastname']; ?> </td>
                    <td> <?= $patient['firstname']; ?> </td>
                    <td> <?= $patient['middlename']; ?> </td>
                    <td> <?= $patient['age']; ?> </td>
                    <td> <?= $patient['sex']; ?> </td>
                    <td> <?= $new_bdate; ?> </td>
                    <td> <?= $patient['street_address'] . ' ' . $patient['barangay'] . ' ' . $patient['city'] ?> </td>
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
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=1 AND age<=3";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=1 AND age<=3 AND deworming_date = '$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=1 AND age<=3 AND deworming_date >= '$date' AND deworming_date <= '$date2'";
                $result = mysqli_query($conn, $query);
            }
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age 1-3 y/o: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=4 AND age<=7";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=4 AND age<=7 AND deworming_date = '$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=4 AND age<=7 AND deworming_date >= '$date' AND deworming_date <= '$date2'";
                $result = mysqli_query($conn, $query);
            }
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age 4-7 y/o: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=8";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=8 AND deworming_date = '$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=8 AND deworming_date >= '$date' AND deworming_date <= '$date2'";
                $result = mysqli_query($conn, $query);
            }
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age 8-up y/o: <?php echo $row['count(*)']; ?>
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

        if($date2 == ''){
            $query = "SELECT count(*) FROM deworming WHERE deworming_date ='$date'";
            $result = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT count(*) FROM deworming WHERE deworming_date >='$date' AND deworming_date <='$date2'";
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
                        <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf-daily_report.php?id=<?=$patient['deworming_id']?>&&label=<?=$patient['label']?>&&date=<?= $date; ?>&&date2=<?= $date2; ?>&&userName=<?= $user_name ?>')">
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