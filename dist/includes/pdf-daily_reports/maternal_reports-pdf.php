<style>
    span {
        font-weight: bolder;
        font-size: 12pt;
        border-bottom: 1pt solid black;
        padding-bottom: 3pt;
    }

    .deworming-reports {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
    }

    .consultation__report__title {
        text-align: center;
        color: #212529;
        font-weight: bold;
        text-transform: uppercase;
        line-height: 1.1;
    }

    .consultation__report__city,
    .deworming-reports__title {
        text-align: center;

    }

    .deworming-reports__title {
        font-weight: bold;
        text-transform: uppercase;
    }

    .deworming-reports__details {
        width: 100vw;
    }

    .deworming-reports__details>* {
        display: inline;
    }

    .deworming-reports__date {
        float: right;
    }

    .deworming-reports__total {
        margin-top: -10pt;
    }

    .deworming-reports__table {
        width: 100%;
        border: 1px solid;
        border-collapse: collapse;
        margin-block: 2rem;
    }

    .deworming-reports__table__header {
        font-size: 9pt;
        color: #909087;
    }

    .deworming-reports__table thead>tr>th {
        font-weight: bold;
    }

    .deworming-reports__table table,
    .deworming-reports__table td,
    .deworming-reports__table th {
        border: 1px solid gainsboro;
    }
</style>

<!-- Maternal-care daily reports -->

<head>
    <?php
        if($date2 == ""){
            ?>
                <title>Target Maternal Care Reports <?= $new_date_pdf; ?></title>
            <?php
        }
        else{
            ?>
                <title>Target Maternal Care Reports <?= $new_date_pdf; ?> - <?= $new_date2_pdf; ?></title>
            <?php
        }
    ?>
</head>
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
        <?php
        if($date2 == ""){
            ?>
                <div class="deworming-reports__date">
                    Date From: <?php echo $new_date_pdf; ?>
                </div>
            <?php
        }
        else{
            ?>
                <div class="deworming-reports__date">
                    Date From: <?php echo $new_date_pdf; ?>
                    <br>Date To: <?php echo $new_date2_pdf; ?>
                </div>
            <?php
        }
        ?>
    </div>

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NHTS' AND date_registered = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NHTS' AND date_registered >= '$date' AND date_registered <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__brgy">
            Total No. of NHTS Patient: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NON NHTS' AND date_registered = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NON NHTS' AND date_registered >= '$date' AND date_registered <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of NON NHTS Patient: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->


    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM target_maternal WHERE date_registered = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM target_maternal WHERE date_registered >= '$date' AND date_registered <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Patients: <span> <?php echo $row['count(*)']; ?> </span>
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
        if($date == $date && $date2 == ''){
            $query = "SELECT * FROM target_maternal WHERE date_registered = '$date'";
            $query_run = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT * FROM target_maternal WHERE date_registered >= '$date' AND date_registered <= '$date2'";
            $query_run = mysqli_query($conn, $query);
        }

        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $patient) {
                // CONVERT DATE TO MM-DD-YY
                $maternal_date = new DateTime($patient['date_registered']);
                $new_maternal_date = $maternal_date->format("m-d-Y");

                $lmp_date = new DateTime($patient['lmp']);
                $new_lmp_date = $lmp_date->format("m-d-Y");

                $edc_date = new DateTime($patient['edc']);
                $new_edc_date = $edc_date->format("m-d-Y");
        ?>
                <tr>
                    <td> <?= $new_maternal_date; ?> </td>
                    <td> <?= $patient['firstname'] . ' ' . $patient['middle_initial'] . ' ' . $patient['lastname']; ?> </td>
                    <td> <?= $patient['complete_address']; ?> </td>
                    <td> <?= $patient['age']; ?> </td>
                    <td> <?= $patient['socio_status']; ?> </td>
                    <td> <?= $new_lmp_date; ?> </td>
                    <td> <?= $patient['gp']; ?> </td>
                    <td> <?= $new_edc_date; ?> </td>
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
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM target_maternal WHERE age<=17 AND date_registered = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM target_maternal WHERE age<=17 AND date_registered >= '$date' AND date_registered <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <br>
        <p class="deworming-reports__total">
            Total No. of Patient Age less/equal 17 y/o : <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM target_maternal WHERE age>=18 AND date_registered = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM target_maternal WHERE age>=18 AND date_registered >= '$date' AND date_registered <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Patient Age greater/equal 18 y/o : <span> <?php echo $row['count(*)']; ?> </span>
        </p>

    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM target_maternal WHERE syphilis_status='Positive' AND date_registered = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM target_maternal WHERE syphilis_status='Positive' AND date_registered >= '$date' AND date_registered <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Patient Positive in Syphilis Screening : <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM target_maternal WHERE hepatitis_status='Positive' AND date_registered = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM target_maternal WHERE hepatitis_status='Positive' AND date_registered >= '$date' AND date_registered <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Patient Positive in Hepatitis Screening : <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->
</div>