<!-- Consultation daily reports -->
<head>
  <title>Consultation Reports <?= $date; ?></title>
</head>

<div class="modal deworming-reports" id="consultation-daily-reports">
    <h4 class="consultation__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of Dasmariñas, Cavite
    </p>

    <h4 class="deworming-reports__title">
        Consultation reports
    </h4>
    <div class="deworming-reports__details">
        <p class="deworming-reports__brgy">
            Name of Barangay: Datu Esmael
        </p>
        <div class="deworming-reports__date">
            Date: <?php echo $date; ?>
        </div>
    </div>

    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND consultation_date='$date'";
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


    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Male' AND consultation_date='$date'";
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
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Female' AND consultation_date='$date'";
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
                <th>NAME</th>
                <th>ADDRESS</th>
                <th>AGE</th>
                <th>SEX</th>
            </tr>
        </thead>
        <?php
            $query = "SELECT * FROM consultation WHERE archive_label='' AND consultation_date='$date'";
            $query_run = mysqli_query($conn, $query);
    

        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $patient) {
        ?>
                <tr>
                    <td> <?= $patient['consultation_date']; ?> </td>
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
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=1 AND age<=13 AND consultation_date='$date'";
        $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age 1-13 y/o: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=14 AND age<=22 AND consultation_date='$date'";
        $result = mysqli_query($conn, $query);
    

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age 14-22 y/o: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=23 AND consultation_date='$date'";
        $result = mysqli_query($conn, $query);
    

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age 23-up y/o: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->
</div>