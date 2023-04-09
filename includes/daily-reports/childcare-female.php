<!-- CHILD CARE FEMALE-->
<div class="reports__card">
    <!-- Query Start -->
    <?php
    //DEFAULT DISPLAY
    $query = "SELECT count(*) FROM target_childcare_female"; // WHERE archive_label=''
    $result = mysqli_query($conn, $query);

    //CONDITION IF SORT BUTTON IS CLICKED
    if (isset($_GET['sort__date'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if($date == $date && $date2 == ''){
                $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered = '$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM target_childcare_female WHERE date_registered >= '$date' AND date_registered <= '$date2'";
                $result = mysqli_query($conn, $query);
            }
    }

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <h4 class="reports__card__title">Total No. of Female Patients: <?php echo $row['count(*)']; ?></h4>
    <?php
    }
    ?>
    <!-- END -->

    <div class="reports__card__accordion">
        <p class="reports__card__accordion__title">
            Socio Economic Status
        </p>
        <div class="reports__card__accordion__content">
            <div class="reports__card__item">
                <!-- Query Start -->
                <?php
                //DEFAULT DISPLAY
                $query = "SELECT count(*) FROM target_childcare_female WHERE status='NHTS'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status='NHTS' AND date_registered = '$date'";
                            $result = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status='NHTS' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $result = mysqli_query($conn, $query);
                        }
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status='NON NHTS'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status='NON NHTS' AND date_registered = '$date'";
                            $result = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status='NON NHTS' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $result = mysqli_query($conn, $query);
                        }
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
        </div>
    </div>

    <hr>
    <div class="reports__card__accordion">
        <p class="reports__card__accordion__title">
            0-28 days old
        </p>
        <div class="reports__card__accordion__content">
            <div class="reports__card__item">
                <!-- Query Start -->
                <?php
        //DEFAULT DISPLAY
        $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='low: < 2500gms'"; // WHERE archive_label=''
        $result = mysqli_query($conn, $query);
        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='low: < 2500gms' AND date_registered = '$date'";
                    $query_run = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='low: < 2500gms' AND date_registered >= '$date' AND date_registered <= '$date2'";
                    $query_run = mysqli_query($conn, $query);
                }
        }
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <p class="reports__card__title">Total No. 0-28 days old patient status (low: < 2500gms)</p>
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
        $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='normal: >= 2500gms'"; // WHERE archive_label=''
        $result = mysqli_query($conn, $query);

        //CONDITION IF SORT BUTTON IS CLICKED
        if (isset($_GET['sort__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='normal: >= 2500gms' AND date_registered = '$date'";
                    $query_run = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='normal: >= 2500gms' AND date_registered >= '$date' AND date_registered <= '$date2'";
                    $query_run = mysqli_query($conn, $query);
                }
        }
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <p class="reports__card__title">Total No. 0-28 days old patient status (normal: >= 2500gms)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='unknown'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='unknown' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_newborn='unknown' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 0-28 days old patient status (unknown)</p>
                <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
                <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                <?php
                }
                ?>
                <!-- END -->
            </div>
        </div>
    </div>

    <hr>
    <div class="reports__card__accordion">
        <p class="reports__card__accordion__title">
            1-3 months old
        </p>
        <div class="reports__card__accordion__content">
            <div class="reports__card__item">
                <!-- Query Start -->
                <?php
                //DEFAULT DISPLAY
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='underweight'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='underweight' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='underweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 1-3 months old patient status (underweight)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='stunted'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='stunted' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='stunted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 1-3 months old patient status (stunted)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='wasted'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='wasted' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='wasted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 1-3 months old patient status (wasted)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='obese/overweight'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='obese/overweight' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='obese/overweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 1-3 months old patient status (obese/overweight)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='normal'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='normal' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_1_3='normal' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 1-3 months old patient status (normal)</p>
                <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
                <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                <?php
                }
                ?>
                <!-- END -->
            </div>
        </div>
    </div>

    <hr>
    <div class="reports__card__accordion">
        <p class="reports__card__accordion__title">
            6-11 months old
        </p>
        <div class="reports__card__accordion__content">
            <div class="reports__card__item">
                <!-- Query Start -->
                <?php
                //DEFAULT DISPLAY
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='underweight'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='underweight' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='underweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 6-11 months old patient status (underweight)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='stunted'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='stunted' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='stunted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 6-11 months old patient status (stunted)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='wasted'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='wasted' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='wasted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 6-11 months old patient status (wasted)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='obese/overweight'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='obese/overweight' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='obese/overweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 6-11 months old patient status (obese/overweight)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='normal'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='normal' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_6_11='normal' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 6-11 months old patient status (normal)</p>
                <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
                <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                <?php
                }
                ?>
                <!-- END -->
            </div>
        </div>
    </div>

    <hr>
    <div class="reports__card__accordion">
        <p class="reports__card__accordion__title">
            12 months old
        </p>
        <div class="reports__card__accordion__content">
            <div class="reports__card__item">
                <!-- Query Start -->
                <?php
                //DEFAULT DISPLAY
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='underweight'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='underweight' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='underweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 12 months old patient status (underweight)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='stunted'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='stunted' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='stunted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 12 months old patient status (stunted)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='wasted'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='wasted' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='wasted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 12 months old patient status (wasted)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='obese/overweight'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='obese/overweight' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='obese/overweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 12 months old patient status (obese/overweight)</p>
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
                $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='normal'"; // WHERE archive_label=''
                $result = mysqli_query($conn, $query);
                //CONDITION IF SORT BUTTON IS CLICKED
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='normal' AND date_registered = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT count(*) FROM target_childcare_female WHERE status_month_12='normal' AND date_registered >= '$date' AND date_registered <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
                }
                while ($row = mysqli_fetch_array($result)) {
                ?>
                <p class="reports__card__title">Total No. 12 months old patient status (normal)</p>
                <input type="range" name="" id="" max="20" value='<?php echo $row['count(*)']; ?>'>
                <p class="reports__card__total"> <?php echo $row['count(*)']; ?> </p>
                <?php
                }
                ?>
                <!-- END -->
            </div>
        </div>
    </div>

    <div class="view-report-item">
        <!-- test start -->
        <a href="#childcare-female-daily-reports" rel="modal:open" class="view-report">
            <!--manage to get report date-->
            View Reports
        </a>
    </div>
    <?php
    include './includes/reports/childcare-female.php'
    ?>
</div>