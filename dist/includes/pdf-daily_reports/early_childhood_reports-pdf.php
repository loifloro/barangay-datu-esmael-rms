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
    <title>Early Childhood Reports <?= $date; ?></title>
</head>

<div class="modal deworming-reports" id="childhood-daily-reports">
    <h4 class="consultation__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of Dasmariñas, Cavite
    </p>

    <h4 class="deworming-reports__title">
        Early Childhood Care reports
    </h4>
    <div class="deworming-reports__details">
        <p class="deworming-reports__brgy">
            Name of Barangay: Datu Esmael
        </p>
        <div class="deworming-reports__date">
            Date: <?php echo $date; ?>
        </div>
    </div>

    <div class="deworming-reports__details">

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND early_childhood_date='$date'";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__brgy">
                Total No. of Patient: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Male' AND early_childhood_date='$date'";
    $result = mysqli_query($conn, $query);

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
    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Female' AND early_childhood_date='$date'";
    $result = mysqli_query($conn, $query);

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
                <th>CHILD NAME</th>
                <th>CHILD SEX</th>
                <th>MOTHER NAME</th>
                <th>MOTHER AGE</th>
                <th>ADDRESS</th>
            </tr>
        </thead>
        <?php
        $query = "SELECT * FROM early_childhood WHERE archive_label='' AND early_childhood_date='$date'";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $patient) {
        ?>
                <tr>
                    <td> <?= $patient['early_childhood_date']; ?> </td>
                    <td> <?= $patient['child_fname']; ?> <?= $patient['child_mname']; ?> <?= $patient['child_lname']; ?> </td>
                    <td> <?= $patient['sex']; ?> </td>
                    <td> <?= $patient['mother_name']; ?> </td>
                    <td> <?= $patient['mother_age']; ?> </td>
                    <td> <?= $patient['street_address'] . ' ' . $patient['purok'] . ' ' . $patient['barangay']; ?> </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>

    <p class="dewroming-reports__total p-bold">
        Total No. of Patient Based Mothers Age:
    </p>
    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age<=17 AND early_childhood_date='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age less/equal 17 y/o - <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=18 AND mother_age<=29 AND early_childhood_date='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age 18-29 y/o - <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=30 AND early_childhood_date='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age 30-up y/o - <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->
</div>