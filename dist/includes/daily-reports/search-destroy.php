<!-- SEARCH AND DESTROY -->
<div class="reports__card">
    <!-- Search and Destroy -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM search_destroy WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND search_destroy_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <h4 class="reports__card__title">Total No. of Record: <?php echo $row['count(*)']; ?></h4>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) AS total, sum(container_num) AS total_p FROM search_destroy WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) AS total, sum(container_num) AS total_p FROM search_destroy WHERE archive_label='' AND search_destroy_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Household Visited</p>
            <input type="range" name="" id="" value="<? echo $row['count(*)']; ?> ">
            <p class="reports__card__total"> <?php echo $row['total']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Positive'";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Positive' AND search_destroy_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Household Positive for Larva</p>
            <input type="range" name="" id="" value="<?php $row['count(*)']; ?>">
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
        $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Negative'";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Negative' AND search_destroy_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Household Negative for Larva</p>
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
        //DEFAULT DISPLAY
        $query = "SELECT count(*) AS total, sum(container_num) AS total_p FROM search_destroy WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) AS total, sum(container_num) AS total_p FROM search_destroy WHERE archive_label='' AND search_destroy_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Container Positive for Larva</p>
            <input type="range" name="" id="" value="<? echo $row['total_p']; ?>">
            <p class="reports__card__total"> <?php echo $row['total_p']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>

    <div class="view-report-item">
        <!-- test start -->
        <a href="#search-and-destroy__daily-report" rel="modal:open" class="view-report"> <!--manage to get report date-->
            View Reports
        </a>
    </div>

    <?php
    include './includes/reports/search-and-destroy.php'
    ?>
</div>