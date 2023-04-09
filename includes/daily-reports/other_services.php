<!-- DEWORMING SECTION -->
<div class="reports__card">
    <!-- Deworming -->
    <!-- Query Start -->
    <?php
    //DEFAULT DISPLAY
    $query = "SELECT count(*) FROM other_service WHERE archive_label=''";
    $result = mysqli_query($conn, $query);
    
    //CONDITION IF SORT BUTTON IS CLICKED
    if (isset($_GET['sort__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
        $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND service_date = '$date' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
    }

    while ($row = mysqli_fetch_array($result)) {
        ?>
            <h4 class="reports__card__heading">Total No. of Patients: <?php echo $row['count(*)']; ?></h4>
        <?php
    }
    ?>
    <!-- Query End -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Male'";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Male' AND service_date = '$date' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Male' AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Male Patients</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>

            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Female'";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Female' AND service_date = '$date' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND sex='Female' AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Female Patients</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>= 1 AND age<=12";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=1 AND age<=12 AND service_date = '$date' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=1 AND age<=12 AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 1-12</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>= 13 AND age<=19";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=13 AND age<=19 AND service_date = '$date' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=13 AND age<=19 AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 13-19</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>= 20";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            $service_name = mysqli_real_escape_string($conn, $_GET['report__service']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=20 AND service_date = '$date' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND age>=20 AND service_date >= '$date' AND service_date <= '$date2' AND service_name = '$service_name'";
                $result = mysqli_query($conn, $query);
            }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 20-up</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="view-report-item">
        <!-- test start -->
        <a href="#other-daily-reports" rel="modal:open" class="view-report"> <!--manage to get report date-->
            View Reports
        </a>
    </div>

    <?php
    include './includes/reports/other_service.php'
    ?>
</div>