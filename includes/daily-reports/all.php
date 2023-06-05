<!-- ALL SECTION -->
<div class="reports__card">
    <?php

    if (isset($_GET['sort__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
        
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
        } else{
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
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <h4 class="reports__card__heading">Total No. of Records: <?php echo $row['totalvalue']; ?></h4>
    <?php
    }
    ?>
    <!-- Query End -->

    <!-- Consultation -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND consultation_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND consultation_date >= '$date' AND consultation_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Consultation</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>

    <!-- Deworming -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND deworming_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND deworming_date >= '$date' AND deworming_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Deworming</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    
    <!-- Early Childhood -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND early_childhood_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND early_childhood_date >= '$date' AND early_childhood_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Early Childhood</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>

    <!-- Prenatal -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND prenatal_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND prenatal_date >= '$date' AND prenatal_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Prenatal</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>

    <!-- Postnatal -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND postnatal_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Postnatal</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>

    <!-- Search and Destroy -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND search_destroy_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Search Destroy</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>

    <!-- Others -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND service_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM other_service WHERE archive_label='' AND service_date >= '$date' AND service_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Others</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>

    <div class="view-report-item">
        <!-- test start -->
        <a href="#prenatal-daily-reports" rel="modal:open" class="view-report"> <!--manage to get report date-->
            View Reports
        </a>
    </div>

    <?php
    include './includes/reports/all.php'
    ?>
</div>