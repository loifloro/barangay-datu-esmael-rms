<!-- EARLY CHILDHOOD SECTION -->
<div class="reports__card">
    <!-- Early Childhood -->
    <div class="reports__card__item"> 
    <!-- Query Start -->
    <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label=''";
        $result = mysqli_query($conn, $query);
        
        //CONDITION IF SORT BUTTON IS CLICKED
        if(isset($_GET['sort__date'])){
            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND early_childhood_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while($row = mysqli_fetch_array($result)) {  
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
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Male'";
        $result = mysqli_query($conn, $query);
        
        //CONDITION IF SORT BUTTON IS CLICKED
        if(isset($_GET['sort__date'])){
            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Male' AND early_childhood_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while($row = mysqli_fetch_array($result)) {  
    ?>
        <p class="reports__card__title">Total No. of Male Child</p>
        <input type="range" name="" id=""> 
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
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Female'";
        $result = mysqli_query($conn, $query);
        
        //CONDITION IF SORT BUTTON IS CLICKED
        if(isset($_GET['sort__date'])){
            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Female' AND early_childhood_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while($row = mysqli_fetch_array($result)) {  
    ?>
        <p class="reports__card__title">Total No. of Female Child</p>
        <input type="range" name="" id=""> 
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
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=17 AND mother_age<=22";
        $result = mysqli_query($conn, $query);
        
        //CONDITION IF SORT BUTTON IS CLICKED
        if(isset($_GET['sort__date'])){
            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=17 AND mother_age<=22 AND early_childhood_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while($row = mysqli_fetch_array($result)) {  
    ?>
        <p class="reports__card__title">Total No. of Mother age 17-22</p>
        <input type="range" name="" id=""> 
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
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=23 AND mother_age<=29";
        $result = mysqli_query($conn, $query);
        
        //CONDITION IF SORT BUTTON IS CLICKED
        if(isset($_GET['sort__date'])){
            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=23 AND mother_age<=29 AND early_childhood_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while($row = mysqli_fetch_array($result)) {  
    ?>
        <p class="reports__card__title">Total No. of Mother age 23-29</p>
        <input type="range" name="" id=""> 
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
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=30";
        $result = mysqli_query($conn, $query);
        
        //CONDITION IF SORT BUTTON IS CLICKED
        if(isset($_GET['sort__date'])){
            $date= mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=30 AND early_childhood_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while($row = mysqli_fetch_array($result)) {  
    ?>
        <p class="reports__card__title">Total No. of Mother age 30-up</p>
        <input type="range" name="" id=""> 
        <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
    <?php
        }
    ?>
    <!-- Query End -->
    </div>
</div>