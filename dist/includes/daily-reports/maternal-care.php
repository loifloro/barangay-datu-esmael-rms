<!-- MATERNAL CARE -->
<div class="reports__card">

    <!-- Query Start -->
    <?php
    //DEFAULT DISPLAY
    $query = "SELECT count(*) FROM target_maternal"; // WHERE archive_label=''
    $result = mysqli_query($conn, $query);

    //CONDITION IF SORT BUTTON IS CLICKED
    if (isset($_GET['sort__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date'";
        $result = mysqli_query($conn, $query);
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <h4 class="reports__card__title">Total No. of Patients: <?php echo $row['count(*)']; ?></h4>
    <?php
    }
    ?>
    <!-- END -->

    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NHTS'"; // WHERE archive_label=''
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND socio_status='NHTS'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. NHTS Patient</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- END -->
    </div>

    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM target_maternal WHERE socio_status='NON NHTS'"; // WHERE archive_label=''
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND socio_status='NON NHTS'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. NON-NHTS Patient</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- END -->
    </div>

    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM target_maternal WHERE age<=17"; // WHERE archive_label=''
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND age<=17";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. Age less than or equal 17 y/o</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- END -->
    </div>

    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM target_maternal WHERE age>=18"; // WHERE archive_label=''
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND age>=18";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. Age greater than or equal 18 y/o</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- END -->
    </div>
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM target_maternal WHERE hepatitis_status='Positive'"; // WHERE archive_label=''
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND hepatitis_status='Positive'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. Positive in Syphilis Screening</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- END -->
    </div>

    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM target_maternal WHERE syphilis_status='Positive'"; // WHERE archive_label=''
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM target_maternal WHERE date_registered='$date' AND syphilis_status='Positive'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. Positive in Hepatitis B Screening</p>
            <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- END -->
    </div>
    <div class="view-report-item">
        <!-- test start -->
        <a href="#maternal-daily-reports" rel="modal:open" class="view-report"> <!--manage to get report date-->
            View Reports
        </a>
    </div>
    <?php
    include './includes/reports/maternal-care.php'
    ?>
</div>