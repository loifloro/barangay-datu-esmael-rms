<!-- Maternal-care daily reports -->
<?php
if (isset($_GET['report__date'])) {

?>
<div class="modal deworming-reports" id="maternal-daily-reports">
    <h4 class="consultation__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of Dasmariñas, Cavite
    </p>

    <h4 class="deworming-reports__title">
        Target Maternal Care Reports
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
                    ?>
                        <div class="deworming-reports__date">
                            Date From: <?php echo $date; ?>
                        </div>
                    <?php
                }
                else{
                    ?>
                        <div class="deworming-reports__date">
                            Date From: <?php echo $date; ?>
                            <br>Date To: <?php echo $date2; ?>
                        </div>
                    <?php
                }
            } 
        ?>
        <!-- End Date Query -->
    </div>

    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NHTS'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NHTS' AND date_registered = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NHTS' AND date_registered >= '$date' AND date_registered <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
    <p class="deworming-reports__brgy">
        Total No. of NHTS Patient: <?php echo $row['count(*)']; ?>
    </p>
    <?php
        }
        ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NON NHTS'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NON NHTS' AND date_registered = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NON NHTS' AND date_registered >= '$date' AND date_registered <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
    <p class="deworming-reports__brgy">
        Total No. of NON NHTS Patient: <?php echo $row['count(*)']; ?>
    </p>
    <?php
        }
        ?>
    <!-- Query End -->


    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM target_maternal";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_maternal WHERE date_registered = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_maternal WHERE date_registered >= '$date' AND date_registered <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
    <p class="deworming-reports__male">
        Total No. of Patients: <?php echo $row['count(*)']; ?>
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
                <th>SOCIO-ECONOMIC STATUS</th>
                <th>LAST MENSTRUAL PERIOD</th>
                <th>GP</th>
                <th>EDC</th>
                <th>SYPHILIS SCREENING STATUS</th>
                <th>HEPATITIS B SCREENING STATUS</th>
            </tr>
        </thead>
        <?php
            include 'includes/connection.php';
            if (isset($_GET['report__date'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT * FROM target_maternal WHERE date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT * FROM target_maternal WHERE date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }
            }

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $patient) {
            ?>
        <tr>
            <td> <?= $patient['date_registered']; ?> </td>
            <td> <?= $patient['firstname'].' '.$patient['middle_initial'].' '.$patient['lastname']; ?> </td>
            <td> <?= $patient['complete_address']; ?> </td>
            <td> <?= $patient['age']; ?> </td>
            <td> <?= $patient['socio_status']; ?> </td>
            <td> <?= $patient['lmp']; ?> </td>
            <td> <?= $patient['gp']; ?> </td>
            <td> <?= $patient['edc']; ?> </td>
            <td> <?= $patient['syphilis_status']; ?> </td>
            <td> <?= $patient['hepatitis_status']; ?> </td>
        </tr>
        <?php
                }
            }
            ?>
    </table>


    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM target_maternal WHERE age<=17";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_maternal WHERE age<=17 AND date_registered = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_maternal WHERE age<=17 AND date_registered >= '$date' AND date_registered <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
    <p class="dewroming-reports__total">
        Total No. of Patient Age <= 17 y/o : <?php echo $row['count(*)']; ?> 
    </p>
    <?php
        }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM target_maternal WHERE age>=18";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_maternal WHERE age>=18 AND date_registered = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_maternal WHERE age>=18 AND date_registered >= '$date' AND date_registered <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
    <p class="dewroming-reports__total">
        Total No. of Patient Age >= 18 y/o : <?php echo $row['count(*)']; ?> 
    </p>

    <?php
        }
        ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM target_maternal WHERE syphilis_status='Positive'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_maternal WHERE syphilis_status='Positive' AND date_registered = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_maternal WHERE syphilis_status='Positive' AND date_registered >= '$date' AND date_registered <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
    <p class="dewroming-reports__total">
        Total No. of Patient Positive in Syphilis Screening : <?php echo $row['count(*)']; ?>
    </p>
    <?php
        }
        ?>
    <!-- Query End -->

            <!-- Query Start -->
            <?php
                $query = "SELECT count(*) FROM target_maternal WHERE hepatitis_status='Positive'";
                $result = mysqli_query($conn, $query);

                if (isset($_GET['report__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_maternal WHERE hepatitis_status='Positive' AND date_registered = '$date'";
                            $result = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_maternal WHERE hepatitis_status='Positive' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $result = mysqli_query($conn, $query);
                        }
                }

                while ($row = mysqli_fetch_array($result)) {
                ?>
            <p class="dewroming-reports__total">
                Total No. of Patient Positive in Hepatitis Screening : <?php echo $row['count(*)']; ?>
            </p>
            <?php
                }
                ?>
            <!-- Query End -->


        <!-- Query To Disabled Save as PDF -->
        <?php
        $query = "SELECT count(*) FROM target_maternal";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date'";
            $result = mysqli_query($conn, $query);
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
            ?>
                <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf-daily_report.php?id=<?=$patient['target_maternal_id']?>&&label=<?=$patient['label']?>&&date=<?= $date; ?>&&date2=<?= $date2; ?>')">
                    Save as PDF
                </button>
            <?php
            }
        }
        ?>
        <!-- Query End -->

</div>
<?php
}
?>