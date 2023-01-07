<!-- PRENATAL SECTION -->
<div class="reports__card">
    <!-- Prenatal -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM prenatal WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND prenatal_date='$date'";
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
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=17 AND age<=21";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=17 AND age<=21 AND prenatal_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 17-21</p>
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
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=22 AND age<=29";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=22 AND age<=29 AND prenatal_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 22-29</p>
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
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=30";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=30 AND prenatal_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 30-up</p>
            <input type="range" name="" id="" value="<?= $row['count(*)']; ?>" max='10'>
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
    include './includes/reports/prenatal.php'
    ?>
</div>