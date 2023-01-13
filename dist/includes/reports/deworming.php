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
        <li class="deworming-report__table__item">
            <?= $patient['birthdate']; ?>
        </li>
        <li class="deworming-report__table__item">
            <?= $patient['street_address'] . " " . $patient['barangay'] . " " . $patient['city']; ?>
        </li>
        <li class="deworming-report__table__item">
            <?= $patient['deworming_date']; ?>
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
    <div class="deworming-reports__details">
        <p class="deworming-reports__brgy">
            Name of Barangay: Datu Esmael
        </p>

        <!-- Query Start -->
        <?php


        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $deworming_sort = $date;
        } else {
            $deworming_sort = "N/A";
        }
        ?>
        <div class="deworming-reports__date">
            Date: <?php echo $deworming_sort; ?>
        </div>
    </div>

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM deworming WHERE archive_label=''";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND deworming_date='$date'";
        $result = mysqli_query($conn, $query);
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
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Male' AND deworming_date='$date'";
        $result = mysqli_query($conn, $query);
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
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Female' AND deworming_date='$date'";
        $result = mysqli_query($conn, $query);
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
        // $query = "SELECT * FROM deworming WHERE archive_label='' ORDER BY deworming_date";
        // $query_run = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) { //test
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT * FROM deworming WHERE archive_label='' AND deworming_date='$date'";
            // $result = mysqli_query($conn, $query);
            $query_run = mysqli_query($conn, $query);
        }

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

    <p class="dewroming-reports__total p-bold">
        Total No. of Patient Based on Age:
    </p>
    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=1 AND age<=3";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=1 AND age<=3 AND deworming_date='$date'";
        $result = mysqli_query($conn, $query);
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
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=4 AND age<=7 AND deworming_date='$date'";
        $result = mysqli_query($conn, $query);
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
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>=8 AND deworming_date='$date'";
        $result = mysqli_query($conn, $query);
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

    <button type="submit" class="btn-green btn-add services__btn btn-print" 
    onclick="window.open('./includes/print_pdf-daily_report.php?id=<?=$patient['deworming_id']?>&&label=<?=$patient['label']?>&&date=<?= $date; ?>')">
    Save as PDF
    </button>
</div>