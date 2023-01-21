<div id="early__childhood__report<?= $patient['early_childhood_id']; ?>" class="modal early__childhood__report">
    <div class="early__childhood__report__header">
        <img src="assets/img/doh.png" alt="DOH Logo" class="doh-image">
        <div class="early__childhood__report__title">
            <p>
                The Early Childhood Care
            </p>
            <p>
                and Development (ECCD) Card
            </p>
        </div>
    </div>

    <div class="early__childhood__report__address">
        <p class="early__childhood__report__address__item">
            Clinic/Health Center:
            <span class="value">
                <?= $patient['clinic']; ?>
            </span>
        </p>
        <p class="early__childhood__report__address__item">
            Barangay:
            <span class="value">
                <?= $patient['barangay']; ?>
            </span>
        </p>
        <p class="early__childhood__report__address__item">
            Purol/Sitio:
            <span class="value">
                <?= $patient['purok']; ?>
            </span>
        </p>
    </div>

    <div class="early__childhood__report__child-info">
        <p class="early__childhood__report__childname">
            Childname:
            <span class="value">
                <?= $patient['child_fname'] . ' ' . $patient['child_lname']; ?>
            </span>
        </p>
        <div class="early__childhood__report__two-column">
            <p class="early__childhood__report__hospital-name">
                Hospital:
                <span class="value">
                    <?= $patient['hospital']; ?>
                </span>
            </p>
            <p class="early__childhood__report__gender">
                Sex:
                <span class="value">
                    <?= $patient['sex']; ?>
                </span>
            </p>
        </div>
        <div class="early__childhood__report__two-column">
            <p class="early__childhood__report__lic">
                LIC:
                <span class="value">
                    <?= $patient['lic']; ?>
                </span>
            </p>
            <p class="early__childhood__report__hospital-name">
                Time Delivery:
                <span class="value">
                    <?= $patient['time_delivery']; ?>
                </span>
            </p>
        </div>
    </div>

    <div class="early__childhood__report__mother">
        <div class="early__childhood__report__two-column">
            <p class="early__childhood__report__mother-name">
                Mother's Name:
                <span class="value">
                    <?= $patient['mother_name']; ?>
                </span>
            </p>
            <p class="early__childhood__report__gender">
                No. Pregnancices:
                <span class="value">
                    <?= $patient['no_pregnancies']; ?>
                </span>
            </p>
        </div>
        <div class="early__childhood__report__two-column">
            <p class="early__childhood__report__occupation">
                Educational Level:
                <span class="value">
                    <?= $patient['mother_educ']; ?>
                </span>
            </p>
            <p class="early__childhood__report__hospital-name">
                Age:
                <span class="value">
                    <?= $patient['mother_age']; ?>
                </span>
            </p>
        </div>
        <div class="early__childhood__report__two-column">
            <p class="early__childhood__report__occupation">
                Occupation:
                <span class="value">
                    <?= $patient['mother_occupation']; ?>
                </span>
            </p>
            <p class="early__childhood__report__hospital-name">
                Birthdate:
                <span class="value">
                    <?= $patient['mother_birthdate']; ?>
                </span>

                Status:
                <span class="value">
                    <?= $patient['status']; ?>
                </span>
            </p>
        </div>
    </div>

    <div class="early__childhood__report__father">
        <div class="early__childhood__report__two-column">
            <p class="early__childhood__report__father-name">
                Father's Name:
                <span class="value">
                    <?= $patient['father_name']; ?>
                </span>
            </p>
            <p class="early__childhood__report__gender">
                Cellphone No:
                <span class="value">
                    <?= $patient['phone_num']; ?>
                </span>
            </p>
        </div>
        <div class="early__childhood__report__two-column">
            <p class="early__childhood__report__occupation">
                Educational Level:
                <span class="value">
                    <?= $patient['father_educ']; ?>
                </span>
            </p>
            <p class="early__childhood__report__hospital-name">
                Age:
                <span class="value">
                    <?= $patient['father_age']; ?>
                </span>
            </p>
        </div>
        <div class="early__childhood__report__two-column">
            <p class="early__childhood__report__occupation">
                Occupation:
                <span class="value">
                    <?= $patient['father_occupation']; ?>
                </span>
            </p>
            <p class="early__childhood__report__hospital-name">
                Birthdate:
                <span class="value">
                    <?= $patient['father_birthdate']; ?>
                </span>
            </p>
        </div>
    </div>

    <div class="early__childhood__report__three-column">
        <p class="early__childhood__report__birthdate">
            Birthdate:
            <span class="value">
                <?= $patient['child_birthdate']; ?>
            </span>
        </p>
        <p class="early__childhood__report__gestational">
            Gestational Age of Birth:
            <span class="value">
                <?= $patient['gestational_age']; ?>
            </span>
        </p>
        <p class="early__childhood__report__type">
            Type of Birth:
            <span class="value">
                <?= $patient['birth_type']; ?>
            </span>
        </p>
    </div>

    <p class="early__childhood__report__delivery">
        Place of Delivery:
        <span class="value">
            <?= $patient['place_delivery']; ?>
        </span>
    </p>
    <p class="early__childhood__report__accomodate">
        Date of Birth Accomodation:
        <span class="value">
            <?= $patient['birth_accomodate']; ?>
        </span>
    </p>
    <p class="early__childhood__report__accomodate">
        Birth Attendant:
        <span class="value">
            <?= $patient['birth_attendant']; ?>
        </span>
    </p>


    <table class="early__childhood__report__table">
        <thead class="early__childhood_report__table__header">
            <th class="width-10" rowspan="2">
                BAKUNA
            </th>
            <th colspan="4" rowspan="1">
                PETSA NANG BIGAY
                <table>
                </table>
            </th>
            <th class="width-10">REMARKS</th>
        </thead>
        <tr>
            <td></td>
            <td>1st Dose</td>
            <td>2nd Dose</td>
            <td>3rd Dose</td>
            <td>Catch-up Dose</td>
            <td></td>
        </tr>
        <tr class="early__childhood__report__bcg">
            <td> BCG </td>
            <?php
                if($patient['bcg1_date']=='0000-00-00'){
                    $patient_bcg1='';
                }
                else{
                    $patient_bcg1=$patient['bcg1_date'];
                }
            ?>
            <!-- bcg1 -->
            <td> <?= $patient_bcg1; ?> </td>
            <?php
                if($patient['bcg2_date']=='0000-00-00'){
                    $patient_bcg2='';
                }
                else{
                    $patient_bcg2=$patient['bcg2_date'];
                }
            ?>
            <!-- bcg2 -->
            <td> <?= $patient_bcg2; ?> </td>
            <?php
                if($patient['bcg3_date']=='0000-00-00'){
                    $patient_bcg3='';
                }
                else{
                    $patient_bcg3=$patient['bcg3_date'];
                }
            ?>
            <!-- bcg3 -->
            <td> <?= $patient_bcg3; ?> </td>
            <?php
                if($patient['bcg_catchup_date']=='0000-00-00'){
                    $patient_bcg4='';
                }
                else{
                    $patient_bcg4=$patient['bcg_catchup_date'];
                }
            ?>
            <!-- bcg4 -->
            <td> <?= $patient_bcg4; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__hepb">
            <td> HEP B </td>
            <?php
                if($patient['hepb1_date']=='0000-00-00'){
                    $patient_hepb1='';
                }
                else{
                    $patient_hepb1=$patient['hepb1_date'];
                }
            ?>
            <!-- hepb1 -->
            <td> <?= $patient_hepb1; ?> </td>
            <?php
                if($patient['hepb2_date']=='0000-00-00'){
                    $patient_hepb2='';
                }
                else{
                    $patient_hepb2=$patient['hepb2_date'];
                }
            ?>
            <!-- hepb2 -->
            <td> <?= $patient_hepb2; ?> </td>
            <?php
                if($patient['hepb3_date']=='0000-00-00'){
                    $patient_hepb3='';
                }
                else{
                    $patient_hepb3=$patient['hepb3_date'];
                }
            ?>
            <!-- hepb3 -->
            <td> <?= $patient_hepb3; ?> </td>
            <?php
                if($patient['hepb_catchup_date']=='0000-00-00'){
                    $patient_hepb4='';
                }
                else{
                    $patient_hepb4=$patient['hepb_catchup_date'];
                }
            ?>
            <!-- hepb4 -->
            <td> <?= $patient_hepb4; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__penta">
            <td> PENTAVALENT </td>
            <?php
                if($patient['penta1_date']=='0000-00-00'){
                    $patient_penta1='';
                }
                else{
                    $patient_penta1=$patient['penta1_date'];
                }
            ?>
            <!-- penta1 -->
            <td> <?= $patient_penta1; ?> </td>
            <?php
                if($patient['penta2_date']=='0000-00-00'){
                    $patient_penta2='';
                }
                else{
                    $patient_penta2=$patient['penta2_date'];
                }
            ?>
            <!-- penta2 -->
            <td> <?= $patient_penta2; ?> </td>
            <?php
                if($patient['penta3_date']=='0000-00-00'){
                    $patient_penta3='';
                }
                else{
                    $patient_penta3=$patient['penta3_date'];
                }
            ?>
            <!-- penta3 -->
            <td> <?= $patient_penta3; ?> </td>
            <?php
                if($patient['penta_catchup_date']=='0000-00-00'){
                    $patient_penta4='';
                }
                else{
                    $patient_penta4=$patient['penta_catchup_date'];
                }
            ?>
            <!-- penta4 -->
            <td> <?= $patient_penta4; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__opv">
            <td> ORAL POLIO VACCINE OPV </td>
            <?php
                if($patient['oral_polio1_date']=='0000-00-00'){
                    $patient_oral_polio1='';
                }
                else{
                    $patient_oral_polio1=$patient['oral_polio1_date'];
                }
            ?>
            <!-- oral_polio1 -->
            <td> <?= $patient_oral_polio1; ?> </td>
            <?php
                if($patient['oral_polio2_date']=='0000-00-00'){
                    $patient_oral_polio2='';
                }
                else{
                    $patient_oral_polio2=$patient['oral_polio2_date'];
                }
            ?>
            <!-- oral_polio2 -->
            <td> <?= $patient_oral_polio2; ?> </td>
            <?php
                if($patient['oral_polio3_date']=='0000-00-00'){
                    $patient_oral_polio3='';
                }
                else{
                    $patient_oral_polio3=$patient['oral_polio3_date'];
                }
            ?>
            <!-- oral_polio3 -->
            <td> <?= $patient_oral_polio3; ?> </td>
            <?php
                if($patient['oral_polio_catchup_date']=='0000-00-00'){
                    $patient_oral_polio4='';
                }
                else{
                    $patient_oral_polio4=$patient['oral_polio_catchup_date'];
                }
            ?>
            <!-- oral_polio4 -->
            <td> <?= $patient_oral_polio4; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__ipv">
            <td> INACTIVE POLIO VACCINE IPV </td>
            <?php
                if($patient['inactive_polio1_date']=='0000-00-00'){
                    $patient_inactive_polio1='';
                }
                else{
                    $patient_inactive_polio1=$patient['inactive_polio1_date'];
                }
            ?>
            <!-- inactive_polio1 -->
            <td> <?= $patient_inactive_polio1; ?> </td>
            <?php
                if($patient['inactive_polio2_date']=='0000-00-00'){
                    $patient_inactive_polio2='';
                }
                else{
                    $patient_inactive_polio2=$patient['inactive_polio2_date'];
                }
            ?>
            <!-- inactive_polio2 -->
            <td> <?= $patient_inactive_polio2; ?> </td>
            <?php
                if($patient['inactive_polio3_date']=='0000-00-00'){
                    $patient_inactive_polio3='';
                }
                else{
                    $patient_inactive_polio3=$patient['inactive_polio3_date'];
                }
            ?>
            <!-- inactive_polio3 -->
            <td> <?= $patient_inactive_polio3; ?> </td>
            <?php
                if($patient['inactive_polio_catchup_date']=='0000-00-00'){
                    $patient_inactive_polio4='';
                }
                else{
                    $patient_inactive_polio4=$patient['inactive_polio_catchup_date'];
                }
            ?>
            <!-- inactive_polio4 -->
            <td> <?= $patient_inactive_polio4; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__pneumoco">
            <td> PNEUMOCOCCAL CONJUGATE VACCINE 13 (PCV 13) </td>
            <?php
                if($patient['pneumoco1_date']=='0000-00-00'){
                    $patient_pneumoco1='';
                }
                else{
                    $patient_pneumoco1=$patient['pneumoco1_date'];
                }
            ?>
            <!-- pneumoco1 -->
            <td> <?= $patient_pneumoco1; ?> </td>
            <?php
                if($patient['pneumoco2_date']=='0000-00-00'){
                    $patient_pneumoco2='';
                }
                else{
                    $patient_pneumoco2=$patient['pneumoco2_date'];
                }
            ?>
            <!-- pneumoco2 -->
            <td> <?= $patient_pneumoco2; ?> </td>
            <?php
                if($patient['pneumoco3_date']=='0000-00-00'){
                    $patient_pneumoco3='';
                }
                else{
                    $patient_pneumoco3=$patient['pneumoco3_date'];
                }
            ?>
            <!-- pneumoco3 -->
            <td> <?= $patient_pneumoco3; ?> </td>
            <?php
                if($patient['pneumoco_catchup_date']=='0000-00-00'){
                    $patient_pneumoco4='';
                }
                else{
                    $patient_pneumoco4=$patient['pneumoco_catchup_date'];
                }
            ?>
            <!-- pneumoco4 -->
            <td> <?= $patient_pneumoco4; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__measle">
            <td> MEASLES CONTAINING VACCINE (AMV, MR, MMR) </td>
            <?php
                if($patient['measle1_date']=='0000-00-00'){
                    $patient_measle1='';
                }
                else{
                    $patient_measle1=$patient['measle1_date'];
                }
            ?>
            <!-- measle1 -->
            <td> <?= $patient_measle1; ?> </td>
            <?php
                if($patient['measle2_date']=='0000-00-00'){
                    $patient_measle2='';
                }
                else{
                    $patient_measle2=$patient['measle2_date'];
                }
            ?>
            <!-- measle2 -->
            <td> <?= $patient_measle2; ?> </td>
            <?php
                if($patient['measle3_date']=='0000-00-00'){
                    $patient_measle3='';
                }
                else{
                    $patient_measle3=$patient['measle3_date'];
                }
            ?>
            <!-- measle3 -->
            <td> <?= $patient_measle3; ?> </td>
            <?php
                if($patient['measle_catchup_date']=='0000-00-00'){
                    $patient_measle4='';
                }
                else{
                    $patient_measle4=$patient['measle_catchup_date'];
                }
            ?>
            <!-- measle4 -->
            <td> <?= $patient_measle4; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__vitamin">
            <td> 1. VITAMIN A/ MNP </td>
            <?php
                if($patient['vitamin1_date']=='0000-00-00'){
                    $patient_vitamin1='';
                }
                else{
                    $patient_vitamin1=$patient['vitamin1_date'];
                }
            ?>
            <!-- vitamin1 -->
            <td> <?= $patient_vitamin1; ?> </td>
            <?php
                if($patient['vitamin2_date']=='0000-00-00'){
                    $patient_vitamin2='';
                }
                else{
                    $patient_vitamin2=$patient['vitamin2_date'];
                }
            ?>
            <!-- vitamin2 -->
            <td> <?= $patient_vitamin2; ?> </td>
            <?php
                if($patient['vitamin3_date']=='0000-00-00'){
                    $patient_vitamin3='';
                }
                else{
                    $patient_vitamin3=$patient['vitamin3_date'];
                }
            ?>
            <!-- vitamin3 -->
            <td> <?= $patient_vitamin3; ?> </td>
            <?php
                if($patient['vitamin_catchup_date']=='0000-00-00'){
                    $patient_vitamin4='';
                }
                else{
                    $patient_vitamin4=$patient['vitamin_catchup_date'];
                }
            ?>
            <!-- vitamin4 -->
            <td> <?= $patient_vitamin4; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
    </table>
    <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf.php?id=<?= $patient['early_childhood_id'] ?>&&label=<?= $patient['label'] ?>')">
        Save as PDF
    </button>
</div>

<?php
if (isset($_GET['report__date'])) {

?>
    <!-- Early childhood daily reports -->
    <div class="modal deworming-reports" id="childhood-daily-reports">
        <h4 class="consultation__report__title">
            City Government of Dasmariñas <br> City Health Office II
        </h4>
        <p class="consultation__report__city">
            City of Dasmariñas, Cavite
        </p>

        <h4 class="deworming-reports__title">
            Early Childhood Care reports
        </h4>
        <div class="deworming-reports__details">
            <p class="deworming-reports__brgy">
                Name of Barangay: Datu Esmael
            </p>
            <!-- Query Start -->
            <?php
            if (isset($_GET['report__date']) && isset($_GET['report__date2'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                $earlychildhood_sort = $date;
                $earlychildhood_sort2 = $date2;
            } else {
                $earlychildhood_sort = "N/A";
                $earlychildhood_sort2 = "N/A";
            }
            ?>
            <div class="deworming-reports__date">
                Date From: <?php echo $searchdestroy_sort; ?>
                <br>Date To: <?php echo $searchdestroy_sort2; ?>
            </div>
        </div>

        <div class="deworming-reports__details">

            <!-- Query Start -->
            <?php
            $query = "SELECT count(*) FROM early_childhood WHERE archive_label=''";
            $result = mysqli_query($conn, $query);

            if (isset($_GET['report__date'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT count(*) FROM early_childhood WHERE early_childhood_date = '$date'";
                        $result = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND early_childhood_date >= '$date' AND early_childhood_date <= '$date2'";
                        $result = mysqli_query($conn, $query);
                    }
            }

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <p class="deworming-reports__brgy">
                    Total No. of Patient: <?php echo $row['count(*)']; ?>
                </p>
            <?php
            }
            ?>
            <!-- Query End -->
        </div>
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Male'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Male' AND early_childhood_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Male' AND early_childhood_date >= '$date' AND early_childhood_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Male: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Female'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Female' AND early_childhood_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND sex='Female' AND early_childhood_date >= '$date' AND early_childhood_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Female: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <table class="deworming-reports__table">
            <thead>
                <tr>
                    <th>DATE REGISTERED</th>
                    <th>CHILD NAME</th>
                    <th>CHILD SEX</th>
                    <th>MOTHER NAME</th>
                    <th>MOTHER AGE</th>
                    <th>ADDRESS</th>
                </tr>
            </thead>
            <?php
            include 'includes/connection.php';
            if (isset($_GET['report__date'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT * FROM early_childhood WHERE archive_label='' AND early_childhood_date = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT * FROM early_childhood WHERE archive_label='' AND early_childhood_date >= '$date' AND early_childhood_date <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }
            }

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $patient) {
            ?>
                    <tr>
                        <td> <?= $patient['early_childhood_date']; ?> </td>
                        <td> <?= $patient['child_fname']; ?> <?= $patient['child_mname']; ?> <?= $patient['child_lname']; ?> </td>
                        <td> <?= $patient['sex']; ?> </td>
                        <td> <?= $patient['mother_name']; ?> </td>
                        <td> <?= $patient['mother_age']; ?> </td>
                        <td> <?= $patient['street_address'] . ' ' . $patient['purok'] . ' ' . $patient['barangay']; ?> </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>

        <p class="dewroming-reports__total p-bold">
            Total No. of Patient Based Mothers Age:
        </p>
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age<=17";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age<=17 AND early_childhood_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age<=17 AND early_childhood_date >= '$date' AND early_childhood_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="dewroming-reports__total">
                Age less/equal 17 y/o - <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=18 AND mother_age<=29";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=18 AND mother_age<=29 AND early_childhood_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=18 AND mother_age<=29 AND early_childhood_date >= '$date' AND early_childhood_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="dewroming-reports__total">
                Age 18-29 y/o - <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=30";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=30 AND early_childhood_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND mother_age>=30 AND early_childhood_date >= '$date' AND early_childhood_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }
        while ($row = mysqli_fetch_array($result)) {
            ?>
                <p class="dewroming-reports__total">
                    Age 30-up y/o - <?php echo $row['count(*)']; ?>
                </p>
        <?php
        }
        ?>
        <!-- Query End -->

       <?php
        $query = "SELECT count(*) FROM early_childhood WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM early_childhood WHERE archive_label='' AND early_childhood_date='$date'";
            $result = mysqli_query($conn, $query);
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
                 <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf-daily_report.php?id=<?=$patient['early_childhood_id']?>&&label=<?=$patient['label']?>&&date=<?= $date; ?>&&date2=<?= $date2; ?>')">
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