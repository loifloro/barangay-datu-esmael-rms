<!-- Postnatal daily reports -->
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
            <div class="deworming-reports__date">
                Date: <?php echo $date; ?>
            </div>
        </div>
        <!-- Query Start -->
        <?php
            $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND postnatal_date='$date'";
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
            $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age<=17 AND postnatal_date='$date'";
            $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Patient Age less/equal 17 y/o: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
            $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=18 AND age<=29 AND postnatal_date='$date'";
            $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Patient Age 18-29 y/o: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
            $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=30 AND postnatal_date='$date'";
            $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Patient Age 30-up y/o: <?php echo $row['count(*)']; ?>
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
                $query = "SELECT * FROM postnatal WHERE archive_label='' AND postnatal_date='$date'";
                $query_run = mysqli_query($conn, $query);

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
