<!-- Maternal-care daily reports -->
<?php
if (isset($_GET['report__date'])) {

?>
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

    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM consultation WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND consultation_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
    <p class="deworming-reports__brgy">
        Total No. of NHTS Patient: <?php echo $row['count(*)']; ?>
    </p>
    <?php
        }
        ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
        $query = "SELECT count(*) FROM consultation WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND consultation_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
    <p class="deworming-reports__brgy">
        Total No. of NON NHTS Patient: <?php echo $row['count(*)']; ?>
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
                <th>SOCIO-ECONOMIC STATUS</th>
                <th>LAST MENSTRUAL PERIOD</th>
                <th>GP</th>
                <th>EDC</th>
                <th>SYPHILIS SCREENING STATUS</th>
                <th>HEPATITIS B SCREENING STATUS</th>
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
            <td>
                <?= $patient['firstname']; ?> <?= $patient['middlename']; ?>
                <?= $patient['lastname']; ?>
            </td>
            <td>
                <?= $patient['street_address'] . ' ' . $patient['barangay']; ?>
            </td>
            <td> <?= $patient['age']; ?> </td>
            <td>
                <?= $patient['sex']; ?>
            </td>
            <td> <?= $patient['consultation_date']; ?> </td>
            <td>
                <?= $patient['firstname']; ?> <?= $patient['middlename']; ?>
                <?= $patient['lastname']; ?>
            </td>
            <td>
                <?= $patient['street_address'] . ' ' . $patient['barangay']; ?>
            </td>
            <td> <?= $patient['age']; ?> </td>
            <td>
                <?= $patient['sex']; ?>
            </td>
        </tr>
        <?php
                }
            }
            ?>
    </table>


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
        Total No. of Patient Age <= 17 y/o </p>
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
                Total No. of Patient Age >= 18 y/o
            </p>
            <?php
                }
                ?>
            <!-- Query End -->

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
                Total No. of Patient Positive in Syphilis Screening </p>
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
                Total No. of Patient Positive in Hepatitis Screening
            </p>
            <?php
                }
                ?>
            <!-- Query End -->


            <button type="submit" class="btn-green btn-add services__btn btn-print"
                onclick="window.open('./includes/print_pdf-daily_report.php?id=<?= $patient['consultation_id'] ?>&&label=<?= $patient['label'] ?>&&date=<?= $date; ?>')">
                Save as PDF
            </button>

</div>
<?php
}
?>