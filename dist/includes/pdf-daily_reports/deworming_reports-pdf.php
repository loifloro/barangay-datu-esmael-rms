<style>
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
</style>

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
    <div class="deworming-reports__details">
        <p class="deworming-reports__brgy">
            Name of Barangay: Datu Esmael
        </p>

        <!-- Query Start -->
        <p class="deworming-reports__date">
            Date: <?php echo $date; ?>
        </p>
    </div>

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND deworming_date='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__totals">
            Total No. of Patient: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Male' AND deworming_date='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Male: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Female' AND deworming_date='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
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

        $query = "SELECT * FROM deworming WHERE archive_label='' AND deworming_date='$date' ORDER BY deworming_date";
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
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=1 AND age<=3 AND deworming_date='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Age 1-3 y/o: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=4 AND age<=7 AND deworming_date='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Age 4-7 y/o: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=8 AND deworming_date='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Age 8-up y/o: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
</div>