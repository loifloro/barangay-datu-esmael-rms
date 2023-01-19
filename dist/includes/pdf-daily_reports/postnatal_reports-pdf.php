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

<!-- Postnatal daily reports -->

<head>
    <title>Postnatal Reports <?= $date; ?></title>
</head>

<div class="modal deworming-reports" id="postnatal-daily-reports">
    <h4 class="consultation__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of Dasmariñas, Cavite
    </p>

    <h4 class="deworming-reports__title">
        Postnatal reports
    </h4>
    <div class="deworming-reports__details">
        <p class="deworming-reports__brgy">
            Name of Barangay: Datu Esmael
        </p>
        <?php
        if ($date=='') {
            $postnatal_sort = "N/A";
        }
        else{
            $postnatal_sort = $date;
        }
        
        if ($date2=='') {
            $postnatal_sort2 = "N/A";
        }
        else{
            $postnatal_sort2 = $date2;
        }
        ?>
        <div class="deworming-reports__date">
            Date From: <?php echo $postnatal_sort; ?>
            <br>Date To: <?php echo $postnatal_sort2; ?>
        </div>
    </div>
    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM postnatal WHERE postnatal_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__brgy">
            Total No. of Patient:<span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age<=17 AND postnatal_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age<=17 AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Patient Age less/equal 17 y/o:<span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=18 AND age<=29 AND postnatal_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=18 AND age<=29 AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Patient Age 18-29 y/o:<span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    if($date == $date && $date2 == ''){
        $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=30 AND postnatal_date = '$date'";
        $result = mysqli_query($conn, $query);
    }
    else{
        $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=30 AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Patient Age 30-up y/o:<span> <?php echo $row['count(*)']; ?> </span>
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
                <th>BIRTHDAY</th>
            </tr>
        </thead>
        <?php
        if($date == $date && $date2 == ''){
            $query = "SELECT * FROM postnatal WHERE archive_label='' AND postnatal_date = '$date'";
            $query_run = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT * FROM postnatal WHERE archive_label='' AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
            $query_run = mysqli_query($conn, $query);
        }

        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $patient) {
        ?>
                <tr>
                    <td> <?= $patient['postnatal_date']; ?> </td>
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
</div>