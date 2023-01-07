<div id="consultation__report<?= $patient['consultation_id']; ?>" class="modal consultation__report">
    <h4 class="consultation__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of Dasmariñas, Cavite
    </p>

    <h5 class="consultation__report__title consultation__report__patient-record">
        Patient Record
    </h5>

    <div class="consultation__report__personal-info">
        <p class="consultation__report__personal-info__item consultation__report__personal-info__name">
            Name:
            <span class="value">
                <?= $patient['firstname'] . " " . $patient['middlename'] . " " . $patient['lastname']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__age">
            Age:
            <span class="value">
                <?= $patient['age']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__bday">
            Birthday:
            <span class="value">
                <?= $patient['birthdate']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__address">
            Address:
            <span class="value">
                <?= $patient['street_address'] . " " . $patient['barangay'] . " " . $patient['city']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__phone">
            Phone Number#:
            <span class="value">
                <?= $patient['phone_number']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__date">
            Date:
            <span class="value">
                <?= $patient['consultation_date']; ?>
            </span>
        </p>
    </div>

    <div class="padding-left">
        <p class="consultation__report__symptom">
            <abbr title="Symptoms">S></abbr>
            <span class="value">
                <?= $patient['symptoms']; ?>
            </span>
        </p>
        <h5 class="consultation__report__title consultation__report__patient-record">
            Laboratory Results
        </h5>

        <div class="consultation__report__bmi">
            <p class="consultation__report__bmi__item">
                <abbr title="O">O> BP</abbr>
                <span class="value">
                    <?= $patient['blood_pressure']; ?>
                </span>
                mmHg
            </p>
            <p class="consultation__report__bmi__item--weight">
                <abbr title="Weight">WT:</abbr>
                <span class="value">
                    <?= $patient['weight']; ?>
                </span>
                kg
            </p>
        </div>
        <p class="prenatal__report__a">
            <abbr title="">A> </abbr>
            <span class="value">
                <?= $patient['abnormal']; ?>
            </span>
        </p>
        <p class="prenatal__report__p">
            <abbr title="">P> </abbr>
            <span class="value">
                <?= $patient['prescriptions']; ?>
            </span>
        </p>

        <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.print();">
            Print
        </button>
    </div>
</div>


<!-- Consultation daily reports -->
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
        <!-- Query Start -->
        <?php


        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $consultation_sort = $date;
        } else {
            $consultation_sort = "N/A";
        }
        ?>
        <div class="deworming-reports__date">
            Date: <?php echo $consultation_sort; ?>
        </div>
    </div>
    <p class="deworming-reports__brgy">
        Total No. of Patient
    </p>
    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Male'";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Male' AND consultation_date='$date'";
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
    $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Female'";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Female' AND consultation_date='$date'";
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
                <th>DATE REGISTERED</th>
                <th>NAME</th>
                <th>ADDRESS</th>
                <th>AGE</th>
                <th>SEX</th>
            </tr>
        </thead>
        <?php
        include 'includes/connection.php';
        // $query = "SELECT * FROM deworming WHERE archive_label='' ORDER BY deworming_date";
        // $query_run = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) { //test
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT * FROM consultation WHERE archive_label='' AND consultation_date='$date'";
            // $result = mysqli_query($conn, $query);
            $query_run = mysqli_query($conn, $query);
        }

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
    $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=1 AND age<=13";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=1 AND age<=13 AND consultation_date='$date'";
        $result = mysqli_query($conn, $query);
    }

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
    $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=14 AND age<=22";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=14 AND age<=22 AND consultation_date='$date'";
        $result = mysqli_query($conn, $query);
    }

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
    $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=23";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['report__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=23 AND consultation_date='$date'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="dewroming-reports__total">
            Age 23-up y/o: <?php echo $row['count(*)']; ?>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.print();">
        Print
    </button>
</div>