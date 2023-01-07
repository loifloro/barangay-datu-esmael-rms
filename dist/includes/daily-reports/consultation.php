<!-- CONSULTATION SECTION -->
<div class="reports__card">
    <!-- Consultation -->
    <div class="reports__card__item">
        <!-- Query Start -->
        <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM consultation WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND consultation_date='$date'";
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
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Male'";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Male' AND consultation_date='$date'";
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
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Female'";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Female' AND consultation_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Female Patients</p>
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
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=1 AND age<=13";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=1 AND age<=13 AND consultation_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 1-13</p>
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
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=14 AND age<=22";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=14 AND age<=22 AND consultation_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 14-22</p>
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
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=23";
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND age>=23 AND consultation_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="reports__card__title">Total No. of Patients age 23-up</p>
            <input type="range" name="" id="" value="<?= $row['count(*)']; ?>" max='10'>
            <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
        <?php
        }
        ?>
        <!-- Query End -->
    </div>
</div>