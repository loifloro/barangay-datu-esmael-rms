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
    <?php
        if($date2 == ""){
            ?>
                <title>All Services Reports <?= $new_date_pdf; ?></title>
            <?php
        }
        else{
            ?>
                <title>All Services Reports <?= $new_date_pdf; ?> - <?= $new_date2_pdf; ?></title>
            <?php
        }
    ?>
</head>

<div class="modal deworming-reports" id="prenatal-daily-reports">
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
        All Services reports
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
    }
    else{
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

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__brgy">
            Total No. of Records:<span> <?php echo $row['totalvalue']; ?> </span>
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
</div>