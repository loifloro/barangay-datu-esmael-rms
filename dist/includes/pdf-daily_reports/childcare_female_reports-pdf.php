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
        margin-top: 20pt;
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
</style>

<!-- Maternal-care daily reports -->

<head>
    <title>Target Childcare Female <?= $date; ?></title>
</head>
<div class="modal deworming-reports" id="childcare-male-daily-reports">
    <h4 class="consultation__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of Dasmariñas, Cavite
    </p>

    <h4 class="deworming-reports__title">
        Target Client List for Childcare Female Reports
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
    $query = "SELECT count(*) FROM target_childcare_female WHERE status='NHTS' AND date_registered='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__brgy">
            Total No. of NHTS Patient: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM target_childcare_female WHERE status='NON NHTS' AND date_registered='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of NON NHTS Patient: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->


    <!-- Query Start -->
    <?php
    $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered='$date'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <p class="deworming-reports__total">
            Total No. of Patients: <span> <?php echo $row['count(*)']; ?> </span>
        </p>
    <?php
    }
    ?>
    <!-- Query End -->

    <table class="deworming-reports__table">
        <thead>
            <tr>
                <th>Status</th>
                <th>0-28 days old</th>
                <th>1-3 months old</th>
                <th>6-11 months old </th>
                <th>12 months old </th>
            </tr>
        </thead>

        <?php
        $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_newborn='low: < 2500gms' AND date_registered='$date'";
        $query_run = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($query_run)) {
            if ($row['count(*)'] == 0) {
                $low_value = '';
            } else {
                $low_value = $row['count(*)'];
            }
        ?>
            <tr>
                <td> low: <= 2500gms </td>
                <td> <?php echo $low_value; ?></td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        <?php
        }
        ?>
        <!-- End Query for Low -->

        <?php
        $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_newborn='normal: >= 2500gms' AND date_registered='$date'";
        $query_run = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($query_run)) {
            if ($row['count(*)'] == 0) {
                $normal_value = '';
            } else {
                $normal_value = $row['count(*)'];
            }
        ?>
            <tr>
                <td> normal: >= 2500gms </td>
                <td> <?php echo $normal_value; ?></td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        <?php
        }
        ?>
        <!-- End Query for normal -->

        <?php
        $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_newborn='unknown' AND date_registered='$date'";
        $query_run = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($query_run)) {
            if ($row['count(*)'] == 0) {
                $unknown_value = '';
            } else {
                $unknown_value = $row['count(*)'];
            }
        ?>
            <tr>
                <td> unknown </td>
                <td> <?php echo $unknown_value; ?></td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        <?php
        }
        ?>
        <!-- End Query for unknown -->

        <tr>
            <td> underweight </td>
            <td> </td>

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_1_3='underweight' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_1_3_underweight = '';
                } else {
                    $status_month_1_3_underweight = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_1_3_underweight; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_1_3-underweight -->

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_6_11='underweight' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_6_11_underweight = '';
                } else {
                    $status_month_6_11_underweight = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_6_11_underweight; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_6_11-underweight -->

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_12='underweight' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_12_underweight = '';
                } else {
                    $status_month_12_underweight = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_6_11_underweight; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_12-underweight -->
        </tr>

        <tr>
            <td> stunted </td>
            <td> </td>

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_1_3='stunted' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_1_3_stunted = '';
                } else {
                    $status_month_1_3_stunted = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_1_3_stunted; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_1_3-stunted -->

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_6_11='stunted' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_6_11_stunted = '';
                } else {
                    $status_month_6_11_stunted = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_6_11_stunted; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_6_11-stunted -->

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_12='stunted' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_12_stunted = '';
                } else {
                    $status_month_12_stunted = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_12_stunted; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_12-stunted -->
        </tr>
        <tr>
            <td> wasted </td>
            <td> </td>

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_1_3='wasted' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_1_3_wasted = '';
                } else {
                    $status_month_1_3_wasted = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_1_3_wasted; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_1_3-wasted -->

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_6_11='wasted' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_6_11_wasted = '';
                } else {
                    $status_month_6_11_wasted = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_6_11_wasted; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_6_11-wasted -->

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_12='wasted' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_12_wasted = '';
                } else {
                    $status_month_12_wasted = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_12_wasted; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_12-wasted -->
        </tr>
        <tr>
            <td> obese / overweight </td>
            <td> </td>


            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_1_3='obese/overweight' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_1_3_obese_overweight = '';
                } else {
                    $status_month_1_3_obese_overweight = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_1_3_obese_overweight; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_1_3-obese/overweight -->

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_6_11='obese/overweight' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_6_11_obese_overweight = '';
                } else {
                    $status_month_6_11_obese_overweight = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_6_11_obese_overweight; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_6_11-obese/overweight -->

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_12='obese/overweight' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_12_obese_overweight = '';
                } else {
                    $status_month_12_obese_overweight = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_12_obese_overweight; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_12-obese/overweight -->
        </tr>
        <tr>
            <td> normal </td>
            <td> </td>


            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_1_3='normal' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_1_3_normal = '';
                } else {
                    $status_month_1_3_normal = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_1_3_normal; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_1_3-normal -->

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_6_11='normal' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_6_11_normal = '';
                } else {
                    $status_month_6_11_normal = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_6_11_normal; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_6_11-normal -->

            <?php
            $query = "SELECT count(*) FROM target_childcare_female 
                WHERE status_month_12='normal' AND date_registered='$date'";
            $query_run = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                if ($row['count(*)'] == 0) {
                    $status_month_12_normal = '';
                } else {
                    $status_month_12_normal = $row['count(*)'];
                }
            ?>
                <td> <?php echo $status_month_12_normal; ?></td>
            <?php
            }
            ?>
            <!-- End Query for status_month_12-normal -->
        </tr>
    </table>

    <table class="deworming-reports__table">
        <thead>
            <tr>
                <th>Date Registered</th>
                <th>Child's Name</th>
                <th>Mother's Name</th>
                <th>Socio Economic Status</th>
                <th>Address</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <?php
        $query = "SELECT * FROM target_childcare_female WHERE date_registered='$date'";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $patient) {
        ?>
                <tr>
                    <td><?= $patient['date_registered']; ?></td>
                    <td><?= $patient['child_firstname'] . ' ' . $patient['child_middle_initial'] . ' ' . $patient['child_lastname']; ?></td>
                    <td><?= $patient['mother_firstname'] . ' ' . $patient['mother_middle_initial'] . ' ' . $patient['mother_lastname']; ?></td>
                    <td><?= $patient['status']; ?></td>
                    <td><?= $patient['complete_address']; ?></td>
                    <td><?= $patient['remarks']; ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</div>