<div id="postnatal__report<?= $patient['postnatal_id'] ?>" class="modal prenatal__report">
    <h4 class="prenatal__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="prenatal__report__city">
        City of Dasmariñas, Cavite
    </p>


    <h5 class="prenatal__report__title prenatal__report__patient-record">
        Patient Record
    </h5>
    <p class="prenatal__report__subtitle">
        (Post-Natal)
    </p>

    <div class="prenatal__report__personal-info">
        <p class="prenatal__report__personal-info__item prenatal__report__personal-info__name">
            Name:
            <span class="value">
                <?= $patient['firstname'] . " " . $patient['middlename'] . " " . $patient['lastname']; ?>
            </span>
        </p>
        <p class="prenatal__report__personal-info__item prenatal__report__personal-info__age">
            Age:
            <span class="value">
                <?= $patient['age']; ?>
            </span>
        </p>
        <p class="prenatal__report__personal-info__item prenatal__report__personal-info__bday">
            Birthday:
            <span class="value">
                <?= $patient['birthdate']; ?>
            </span>
        </p>
        <p class="prenatal__report__personal-info__item prenatal__report__personal-info__address">
            Address:
            <span class="value">
                <?= $patient['street_address'] . " " . $patient['barangay'] . " " . $patient['city']; ?>
            </span>
        </p>
        <p class="prenatal__report__personal-info__item prenatal__report__personal-info__phone">
            Phone Number#:
            <span class="value">
                <?= $patient['phone_num']; ?>
            </span>
        </p>
        <p class="prenatal__report__personal-info__item prenatal__report__personal-info__date">
            Date:
            <span class="value">
                <?= $patient['postnatal_date']; ?>
            </span>
        </p>
    </div>

    <div class="padding-left">
        <p class="prenatal__report__symptom">
            <abbr title="Symptoms">S></abbr>
            <span class="value">
                <!-- # $patient['symptoms']; -->
            </span>
        </p>
        <div class="prenatal__report__bmi">
            <p class="prenatal__report__bmi__item">
                <abbr title="O">O> BP</abbr>
                <span class="value">
                    <?= $patient['blood_pressure']; ?>
                </span>
                mmHg
            </p>
            <p class="prenatal__report__bmi__item">
                <abbr title="Weight">WT:</abbr>
                <span class="value">
                    <?= $patient['weight']; ?>
                </span>
                kg
            </p>
            <p class="prenatal__report__bmi__item prenatal__report__bmi__item--end">
                <abbr title="Height">H: </abbr>
                <span class="value">
                    <?= $patient['height']; ?>
                </span>
            </p>
        </div>
        <div class="prenatal__report__ob">
            <h5 class="prenatal__report__subtitle prenatal__report__ob-title">
                OB History
            </h5>
            <div class="prenatal__report__ob__gp">
                <p class="prenatal__report__ob-g">
                    <abbr title="">G: </abbr>
                    <span class="value">
                        <?= $patient['gravida']; ?>
                    </span>
                </p>
                <p class="prenatal__report__ob-p">
                    <abbr title="">P: </abbr>
                    <span class="value">
                        <?= $patient['preterm']; ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="block center">
            <p class="prenatal__report__ob__lmp">
                <abbr title="">LMP: </abbr>
                <span class="value">
                    <?= $patient['last_menstrual']; ?>
                </span>
            </p>
            <p class="prenatal__report__ob__edc">
                <abbr title="">EDC: </abbr>
                <span class="value">
                    <?= $patient['edc']; ?>
                </span>
            </p>
            <p class="prenatal__report__ob__aog">
                <abbr title="">AOG: </abbr>
                <span class="value">
                    <?= $patient['aog']; ?>
                </span>
            </p>
        </div>
        <h5 class="prenatal__report__title">
            Abdomen
        </h5>
        <div class="prenatal__report__abdomen center">
            <p class="prenatal__report__abdomen">
                <abbr title="">FH: </abbr>
                <span class="value">
                    <?= $patient['fetal_heart']; ?>
                </span>
                cm
            </p>
            <p class="prenatal__report__abdomen">
                <abbr title="">FHT: </abbr>
                <span class="value">
                    <?= $patient['fetal_heart_tones']; ?>
                </span>
                /min
            </p>
            <p class="prenatal__report__abdomen prenatal__report__abdomen--presentation">
                Presentation:
                <span class="value">
                    <?= $patient['presentation']; ?>
                </span>
            </p>
        </div>
        <h5 class="prenatal__report__title">
            Tetanus Toxoid Status
        </h5>
        <p class="prenatal__report__tetanus__a">
            <abbr title="">A> </abbr>
            <span class="value">
                <?= $patient['a']; ?>
            </span>
        </p>
        <p class="prenatal__report__tetanus__a">
            <abbr title="">P> </abbr>
            <span class="value">
                <?= $patient['p']; ?>
            </span>
        </p>

        <p class="prenatal__report__signature">
            Signature
        </p>
    </div>
    <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf.php?id=<?=$patient['postnatal_id']?>&&label=<?=$patient['label']?>')">
    Save as PDF
    </button>
</div>


<!-- Postnatal daily reports -->
<div class="modal deworming-reports" id="postnatal-daily-reports">
    <?php
        if (isset($_GET['report__date'])) {
    ?>
        <h4 class="consultation__report__title">
            City Government of Dasmariñas <br> City Health Office II
        </h4>
        <p class="consultation__report__city">
            City of Dasmariñas, Cavite
        </p>

        <h4 class="deworming-reports__title">
            Postnatal reports
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
                
                if($date2 == ""){
                    ?>
                        <div class="deworming-reports__date">
                            Date From: <?php echo $date; ?>
                        </div>
                    <?php
                }
                else{
                    ?>
                        <div class="deworming-reports__date">
                            Date From: <?php echo $date; ?>
                            <br>Date To: <?php echo $date2; ?>
                        </div>
                    <?php
                }
            } 
            ?>
            <!-- End Date Query -->
        </div>
        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM postnatal WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM postnatal WHERE postnatal_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
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

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age<=17";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age<=17 AND postnatal_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age<=17 AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Patient Age less/equal 17 y/o: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=18 AND age<=29";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=18 AND age<=29 AND postnatal_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=18 AND age<=29 AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Patient Age 18-29 y/o: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=30";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=30 AND postnatal_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM postnatal WHERE archive_label='' AND age>=30 AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Patient Age 30-up y/o: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <table class="deworming-reports__table">
            <thead>
                <tr>
                    <th>DATE REGISTERED</th>
                    <th>NAME</th>
                    <th>ADDRESS</th>
                    <th>AGE</th>
                    <th>BIRTHDAY</th>
                </tr>
            </thead>
            <?php
            include 'includes/connection.php';
            if (isset($_GET['report__date'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                    if($date == $date && $date2 == ''){
                        $query = "SELECT * FROM postnatal WHERE archive_label='' AND postnatal_date = '$date'";
                        $query_run = mysqli_query($conn, $query);
                    }
                    else{
                        $query = "SELECT * FROM postnatal WHERE archive_label='' AND postnatal_date >= '$date' AND postnatal_date <= '$date2'";
                        $query_run = mysqli_query($conn, $query);
                    }
            }

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $patient) {
            ?>
                    <tr>
                        <td> <?= $patient['postnatal_date']; ?> </td>
                        <td> <?= $patient['firstname']; ?> <?= $patient['middlename']; ?> <?= $patient['lastname']; ?> </td>
                        <td> <?= $patient['street_address'] . ' ' . $patient['barangay']; ?> </td>
                        <td> <?= $patient['age']; ?> </td>
                        <td> <?= $patient['sex']; ?> </td>
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
                $query = "SELECT count(*) FROM postnatal WHERE postnatal_date ='$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM postnatal WHERE postnatal_date >='$date' AND postnatal_date <='$date2'";
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
                <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf-daily_report.php?id=<?=$patient['postnatal_id']?>&&label=<?=$patient['label']?>&&date=<?= $date; ?>&&date2=<?= $date2; ?>')">
                    Save as PDF
                </button>
            <?php
            }
        }
        ?>
        <!-- Query End -->

        <?php
        }
        ?>
</div>

