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

<head>
    <?php
        if($date2 == ""){
            ?>
                <title>Deworming Reports <?= $new_date_pdf; ?></title>
            <?php
        }
        else{
            ?>
                <title>Deworming Reports <?= $new_date_pdf; ?> - <?= $new_date2_pdf; ?></title>
            <?php
        }
    ?>
</head>


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
    <p>Prepared by: <?php echo $username; ?></p>
    <div class="deworming-reports__details">
        <p class="deworming-reports__brgy">
            Name of Barangay: Datu Esmael
        </p>

        <!-- Query Start -->
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
        $query = "SELECT count(*) FROM deworming WHERE deworming_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND deworming_date >= '$date' AND deworming_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__totals">
            Total No. of Patient: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Male' AND deworming_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Male' AND deworming_date >= '$date' AND deworming_date <= '$date2'";
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
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Female' AND deworming_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Female' AND deworming_date >= '$date' AND deworming_date <= '$date2'";
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
                <th>DATE</th>
                <th>LAST NAME</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>AGE</th>
                <th>SEX</th>
                <th>BIRTHDAY</th>
                <th>ADDRESS</th>
            </tr>
        </thead>
        <?php

        if($date == $date && $date2 == ''){
            $query = "SELECT * FROM deworming WHERE archive_label='' AND deworming_date = '$date'";
            $query_run = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT * FROM deworming WHERE archive_label='' AND deworming_date >= '$date' AND deworming_date <= '$date2'";
            $query_run = mysqli_query($conn, $query);
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

    <p class="deworming-reports__totals p-bold">
        Total No. of Patient Based on Age:
    </p>
    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=1 AND age<=3 AND deworming_date = '$date'";
                $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=1 AND age<=3 AND deworming_date >= '$date' AND deworming_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Age 1-3 y/o: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=4 AND age<=7 AND deworming_date = '$date'";
                $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=4 AND age<=7 AND deworming_date >= '$date' AND deworming_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Age 4-7 y/o: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=8 AND deworming_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=8 AND deworming_date >= '$date' AND deworming_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Age 8-up y/o: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
</div>