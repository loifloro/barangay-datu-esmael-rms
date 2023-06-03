<!-- Maternal-care daily reports -->
<?php
if (isset($_GET['report__date'])) {

?>
    <div class="modal deworming-reports" id="childcare-male-daily-reports">
    <h4 class="consultation__report__title">
            City Government of Dasmariñas <br> City Health Office II
        </h4>
        <p class="consultation__report__city">
            City of Dasmariñas, Cavite
        </p>

        <h4 class="deworming-reports__title">
            Target Client List for Childcare Male Reports
        </h4>
        <?php
            $query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $user) {
                    $user_name= $user['firstname'].' '.$user['lastname'];
                }
            }   
        ?>
        <p>Prepared by: <?php echo $user_name; ?></p>
        <div class="deworming-reports__details">
            <p class="deworming-reports__brgy">
                Name of Barangay: Datu Esmael
            </p>
            <!-- Query Start -->
        <?php
            if (isset($_GET['report__date']) && isset($_GET['report__date2'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                
                if($date2 == ""){
                    // CONVERT DATE TO MM-DD-YY
                    $date = new DateTime($date);
                    $new_date = $date->format("m-d-Y");
                    ?>
                        <div class="deworming-reports__date">
                            Date From: <?php echo $new_date; ?>
                        </div>
                    <?php
                }
                else{
                    // CONVERT DATE TO MM-DD-YY
                    $date = new DateTime($date);
                    $new_date = $date->format("m-d-Y");

                    $date2 = new DateTime($date2);
                    $new_date2 = $date2->format("m-d-Y");
                    ?>
                        <div class="deworming-reports__date">
                            Date From: <?php echo $new_date; ?>
                            <br>Date To: <?php echo $new_date2; ?>
                        </div>
                    <?php
                }
            } 
        ?>
        <!-- End Date Query -->
        </div>

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM target_childcare_male WHERE status='NHTS'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_childcare_male WHERE status='NHTS' AND date_registered = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_childcare_male WHERE status='NHTS' AND date_registered >= '$date' AND date_registered <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__brgy">
                Total No. of NHTS Patient: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM target_childcare_male WHERE status='NON NHTS'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_childcare_male WHERE status='NON NHTS' AND date_registered = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_childcare_male WHERE status='NON NHTS' AND date_registered >= '$date' AND date_registered <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__brgy">
                Total No. of NON NHTS Patient: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->


        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM target_childcare_male";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered >= '$date' AND date_registered <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Patients: <?php echo $row['count(*)']; ?>
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
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_newborn='low: < 2500gms' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_newborn='low: < 2500gms' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $low_value='';
                    }
                    else{
                        $low_value= $row['count(*)'];
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
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_newborn='normal: >= 2500gms' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_newborn='normal: >= 2500gms' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $normal_value='';
                    }
                    else{
                        $normal_value= $row['count(*)'];
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
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_newborn='unknown' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_newborn='unknown' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $unknown_value='';
                    }
                    else{
                        $unknown_value= $row['count(*)'];
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
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='underweight' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='underweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_1_3_underweight='';
                    }
                    else{
                        $status_month_1_3_underweight= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_1_3_underweight; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_1_3-underweight -->
                
                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='underweight' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='underweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_6_11_underweight='';
                    }
                    else{
                        $status_month_6_11_underweight= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_6_11_underweight; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_6_11-underweight -->
                
                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='underweight' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='underweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_12_underweight='';
                    }
                    else{
                        $status_month_12_underweight= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_12_underweight; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_12-underweight -->
            </tr>

            <tr>
                <td> stunted </td>
                <td> </td>

                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='stunted' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='stunted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_1_3_stunted='';
                    }
                    else{
                        $status_month_1_3_stunted= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_1_3_stunted; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_1_3-stunted -->

                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='stunted' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='stunted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_6_11_stunted='';
                    }
                    else{
                        $status_month_6_11_stunted= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_6_11_stunted; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_6_11-stunted -->

                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='stunted' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='stunted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_12_stunted='';
                    }
                    else{
                        $status_month_12_stunted= $row['count(*)'];
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
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='wasted' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='wasted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_1_3_wasted='';
                    }
                    else{
                        $status_month_1_3_wasted= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_1_3_wasted; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_1_3-wasted -->

                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='wasted' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='wasted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_6_11_wasted='';
                    }
                    else{
                        $status_month_6_11_wasted= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_6_11_wasted; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_6_11-wasted -->

                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='wasted' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='wasted' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_12_wasted='';
                    }
                    else{
                        $status_month_12_wasted= $row['count(*)'];
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
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='obese/overweight' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='obese/overweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_1_3_obese_overweight='';
                    }
                    else{
                        $status_month_1_3_obese_overweight= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_1_3_obese_overweight; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_1_3-obese/overweight -->

                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='obese/overweight' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='obese/overweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_6_11_obese_overweight='';
                    }
                    else{
                        $status_month_6_11_obese_overweight= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_6_11_obese_overweight; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_6_11-obese/overweight -->

                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='obese/overweight' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='obese/overweight' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_12_obese_overweight='';
                    }
                    else{
                        $status_month_12_obese_overweight= $row['count(*)'];
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
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='normal' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_1_3='normal' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_1_3_normal='';
                    }
                    else{
                        $status_month_1_3_normal= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_1_3_normal; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_1_3-normal -->

                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='normal' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_6_11='normal' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_6_11_normal='';
                    }
                    else{
                        $status_month_6_11_normal= $row['count(*)'];
                    }
                ?>
                <td> <?php echo $status_month_6_11_normal; ?></td>
                <?php
                    }
                ?>
                <!-- End Query for status_month_6_11-normal -->

                <?php
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='normal' AND date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM target_childcare_male WHERE status_month_12='normal' AND date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

                while ($row = mysqli_fetch_array($query_run)) {
                    if($row['count(*)']==0){
                        $status_month_12_normal='';
                    }
                    else{
                        $status_month_12_normal= $row['count(*)'];
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
                $query = "SELECT * FROM target_childcare_male WHERE date_registered='$date'";
                $query_run = mysqli_query($conn, $query);

                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT * FROM target_childcare_male WHERE date_registered = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT * FROM target_childcare_male WHERE date_registered >= '$date' AND date_registered <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $patient) {
                    // CONVERT DATE TO MM-DD-YY
                    $male_date = new DateTime($patient['date_registered']);
                    $new_male_date = $male_date->format("m-d-Y");
            ?>
            <tr>
                <td><?= $new_male_date; ?></td>
                <td><?= $patient['child_firstname'].' '.$patient['child_middle_initial'].' '.$patient['child_lastname']; ?></td>
                <td><?= $patient['mother_firstname'].' '.$patient['mother_middle_initial'].' '.$patient['mother_lastname']; ?></td>
                <td><?= $patient['status']; ?></td>
                <td><?= $patient['complete_address']; ?></td>
                <td><?= $patient['remarks']; ?></td>
            </tr>
            <?php
                }
            }
            ?>
        </table>

        <!-- Query To Disabled Save as PDF -->
        <?php
        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);

            if($date2 == ''){
                $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered ='$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM target_childcare_male WHERE date_registered >='$date' AND date_registered <='$date2'";
                $result = mysqli_query($conn, $query);
            }
            
        }

        while ($row = mysqli_fetch_array($result)) {
            if($row['count(*)']==0){
        ?>
                <button type="submit" class="btn-add services__btn btn-print" disabled>
                    Save as PDF
                </button>
        <?php
            }
            else{
            ?>
                <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf-daily_report.php?id=<?=$patient['target_childcare_male_id']?>&&label=<?=$patient['label']?>&&date=<?= $date; ?>&&date2=<?= $date2; ?>&&userName=<?= $user_name ?>')">
                    Save as PDF
                </button>
            <?php
            }
        }
        ?>
        <!-- Query End -->

    </div>
<?php
}
?>