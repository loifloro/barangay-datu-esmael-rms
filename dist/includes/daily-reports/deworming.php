<!-- DEWORMING SECTION -->
<div class="reports__card">
    <!-- Deworming -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM deworming WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND deworming_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <h4 class="reports__card__heading">Total No. of Patients: <?php echo $row['count(*)']; ?></h4>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Male'";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Male' AND deworming_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Male Patients</p>
            <input type="range" name="" id="" value="<?= $row['count(*)']; ?>">

            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Female'";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND sex='Female' AND deworming_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Female Patients</p>
            <input type="range" name="" id="" value="<?= $row['count(*)']; ?>">
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>= 1 AND age<=3";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>= 1 AND age<=3 AND deworming_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 1-3</p>
            <input type="range" name="" id="" value="<?= $row['count(*)']; ?>" max='10'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>= 4 AND age<=7";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>= 4 AND age<=7 AND deworming_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 4-7</p>
            <input type="range" name="" id="" value="<?= $row['count(*)']; ?>" max='10'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>= 8";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM deworming WHERE archive_label='' AND age>= 8 AND deworming_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 8-up</p>
            <input type="range" name="" id="" value="<?= $row['count(*)']; ?>" max='10'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="view-report-item">
        <!-- test start -->
        <a href="#deworming-daily-reports" rel="modal:open" class="view-report"> <!--manage to get report date-->
            View Reports
        </a>
    </div>

    <?php
    include './includes/reports/deworming.php'
    ?>
</div>