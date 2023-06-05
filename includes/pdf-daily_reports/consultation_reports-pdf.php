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

<!-- Consultation daily reports -->

<head>
    <?php
        if($date2 == ""){
            ?>
                <title>Consultation Reports <?= $new_date_pdf; ?></title>
            <?php
        }
        else{
            ?>
                <title>Consultation Reports <?= $new_date_pdf; ?> - <?= $new_date2_pdf; ?></title>
            <?php
        }
    ?>
</head>

<div class="modal deworming-reports" id="consultation-daily-reports">
    <!-- QUERY FOR DYNAMIC CITY/BARANGAY -->
    <?php
        $query = "SELECT * FROM account_information WHERE position='Admin'";
        $query_run= mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $user) {
                $barangay_name = $user['barangay_name'];
                $city_name = $user['city_name'];
            }
        }
    ?>
    <h4 class="consultation__report__title">
        City Government of <?=$city_name;?> <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of <?=$city_name;?>
    </p>

    <h4 class="deworming-reports__title">
        Consultation reports
    </h4>
    <p>Prepared by: <?php echo $username; ?></p>
    <div class="deworming-reports__details">
        <p class="deworming-reports__brgy">
            Name of Barangay: <?=$barangay_name;?>
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
        $query = "SELECT count(*) FROM consultation WHERE consultation_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND consultation_date >= '$date' AND consultation_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__brgy">
            Total No. of Patient: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->


    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Male' AND consultation_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Male' AND consultation_date >= '$date' AND consultation_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Male: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Female' AND consultation_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Female' AND consultation_date >= '$date' AND consultation_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Female: <span> <?php echo $row['count(*)']; ?> </span>
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
        if($date == $date && $date2 == ''){
            $query = "SELECT * FROM consultation WHERE archive_label='' AND consultation_date = '$date'";
            $query_run = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT * FROM consultation WHERE archive_label='' AND consultation_date >= '$date' AND consultation_date <= '$date2'";
            $query_run = mysqli_query($conn, $query);
        }


        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $patient) {
                // CONVERT DATE TO MM-DD-YY
                $d_date = new DateTime($patient['consultation_date']);
                $new_consul_date = $d_date->format("m-d-Y");
        ?>
                <tr>
                    <td> <?= $new_consul_date; ?> </td>
                    <td> <?= $patient['firstname']; ?> <?= $patient['middlename']; ?> <?= $patient['lastname']; ?> </td>
                    <td> <?= $patient['street_address'] . ' ' . $patient['barangay']; ?> </td>
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
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=1 AND age<=13 AND consultation_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=1 AND age<=13 AND consultation_date >= '$date' AND consultation_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__totalreports__total">
            Age 1-13 y/o: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=14 AND age<=22 AND consultation_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=14 AND age<=22 AND consultation_date >= '$date' AND consultation_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }


    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Age 14-22 y/o: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=23 AND consultation_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=23 AND consultation_date >= '$date' AND consultation_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }


    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Age 23-up y/o: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->
</div>