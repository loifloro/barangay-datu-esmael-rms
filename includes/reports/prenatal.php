<div id="prenatal__report<?= $patient['prenatal_id']; ?>" class="modal prenatal__report">
    <!-- QUERY FOR DYNAMIC CITY/BARANGAY -->
    <?php
    $query = "SELECT * FROM account_information WHERE position='Admin'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            $barangay_name = $user['barangay_name'];
            $city_name = $user['city_name'];
        }
    }
    ?>
    <h4 class="prenatal__report__title">
        City Government of <?= $city_name; ?> <br> City Health Office II
    </h4>
    <p class="prenatal__report__city">
        City of <?= $city_name; ?>
    </p>


    <h5 class="prenatal__report__title prenatal__report__patient-record">
        Patient Record
    </h5>
    <p class="prenatal__report__subtitle">
        (Pre-Natal)
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
        <?php
        // CONVERT DATE TO MM-DD-YY
        $prenatal_bdate = new DateTime($patient['birthdate']);
        $new_prenatal_bdate = $prenatal_bdate->format("m-d-Y");
        ?>
        <p class="prenatal__report__personal-info__item prenatal__report__personal-info__bday">
            Birthday:
            <span class="value">
                <?= $new_prenatal_bdate; ?>
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
        <?php
        // CONVERT DATE TO MM-DD-YY
        $prenatal_date = new DateTime($patient['prenatal_date']);
        $new_prenatal_date = $prenatal_date->format("m-d-Y");
        ?>
        <p class="prenatal__report__personal-info__item prenatal__report__personal-info__date">
            Date:
            <span class="value">
                <?= $new_prenatal_date; ?>
            </span>
        </p>
    </div>

    <div class="padding-left">
        <p class="prenatal__report__symptom">
            <abbr title="Symptoms">Symptoms></abbr>
            <span class="value">
                <!-- # $patient['symptoms']; -->
            </span>
        </p>
        <div class="prenatal__report__bmi">
            <p class="prenatal__report__bmi__item">
                <abbr title="O">Observation> Blood pressure</abbr>
                <span class="value">
                    <?= $patient['blood_pressure']; ?>
                </span>
                mmHg
            </p>
            <p class="prenatal__report__bmi__item">
                <abbr title="Weight">Weight:</abbr>
                <span class="value">
                    <?= $patient['weight']; ?>
                </span>
                kg
            </p>
            <p class="prenatal__report__bmi__item prenatal__report__bmi__item--end">
                <abbr title="Height">Height: </abbr>
                <span class="value">
                    <?= $patient['height']; ?>
                </span>
                cm
            </p>
        </div>
        <div class="prenatal__report__ob">
            <h5 class="prenatal__report__subtitle prenatal__report__ob-title">
                OB History
            </h5>
            <div class="prenatal__report__ob__gp">
                <p class="prenatal__report__ob-g">
                    <abbr title="">Gravida: </abbr>
                    <span class="value">
                        <?= $patient['gravida']; ?>
                    </span>
                </p>
                <p class="prenatal__report__ob-p">
                    <abbr title="">Preterm: </abbr>
                    <span class="value">
                        <?= $patient['preterm']; ?>
                    </span>
                </p>
            </div>
        </div>
        <div class="block center">
            <p class="prenatal__report__ob__lmp">
                <abbr title="">Last Menstraual Period: </abbr>
                <span class="value">
                    <?= $patient['last_menstrual']; ?>
                </span>
            </p>
            <p class="prenatal__report__ob__edc">
                <abbr title="">Estimated Date of Confinement: </abbr>
                <span class="value">
                    <?= $patient['edc']; ?>
                </span>
            </p>
            <p class="prenatal__report__ob__aog">
                <abbr title="">Assessment of Gestational Age: </abbr>
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
                <abbr title="">Fetal Heart: </abbr>
                <span class="value">
                    <?= $patient['fetal_heart']; ?>
                </span>
                cm
            </p>
            <p class="prenatal__report__abdomen">
                <abbr title="">Fetal Heart Tones: </abbr>
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
            <abbr title="">Abonormalities> </abbr>
            <span class="value">
                <?= $patient['a']; ?>
            </span>
        </p>
        <p class="prenatal__report__tetanus__a">
            <abbr title="">Prescription> </abbr>
            <span class="value">
                <?= $patient['p']; ?>
            </span>
        </p>

        <p class="prenatal__report__signature">
            Signature
        </p>
    </div>
    <?php
    $mail = $_SESSION['user_email'];
    $query = "SELECT position, user_email FROM account_information WHERE user_email='$mail'
                      UNION ALL
                      SELECT label, deworming_email FROM deworming WHERE deworming_email='$mail'
                      UNION ALL
                      SELECT label, consultation_email FROM consultation WHERE consultation_email='$mail'
                      UNION ALL
                      SELECT label, prenatal_email FROM prenatal WHERE prenatal_email='$mail'
                      UNION ALL
                      SELECT label, postnatal_email FROM postnatal WHERE postnatal_email='$mail'
                      UNION ALL
                      SELECT label, search_destroy_email FROM search_destroy WHERE search_destroy_email='$mail'
                      UNION ALL
                      SELECT label, early_childhood_email FROM early_childhood WHERE early_childhood_email='$mail'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) == 1) {
        $row = mysqli_fetch_assoc($query_run);
        if ($row['position'] == 'Barangay Health Worker') {
    ?>
            <button type="submit" class="btn-add services__btn btn-print" disabled>
                Save as PDF
            </button>
        <?php
        } else {
        ?>
            <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf.php?id=<?= $patient['prenatal_id'] ?>&&label=<?= $patient['label'] ?>')">
                Save as PDF
            </button>
    <?php
        }
    }
    ?>
</div>

<?php
if (isset($_GET['report__date'])) {
?>
    <!-- Postnatal daily reports -->
    <div class="modal deworming-reports" id="prenatal-daily-reports">
        <!-- QUERY FOR DYNAMIC CITY/BARANGAY -->
        <?php
        $query = "SELECT * FROM account_information WHERE position='Admin'";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $user) {
                $barangay_name = $user['barangay_name'];
                $city_name = $user['city_name'];
            }
        }
        ?>

        <h4 class="consultation__report__title">
            City Government of <?= $city_name; ?> <br> City Health Office II
        </h4>
        <p class="consultation__report__city">
            City of <?= $city_name; ?>
        </p>

        <h4 class="deworming-reports__title">
            Prenatal reports
        </h4>
        <?php
        $query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $user) {
                $user_name = $user['firstname'] . ' ' . $user['lastname'];
            }
        }
        ?>
        <p>Prepared by: <?php echo $user_name; ?></p>
        <div class="deworming-reports__details">
            <p class="deworming-reports__brgy">
                Name of Barangay: <?= $barangay_name; ?>
            </p>
            <!-- Query Start -->
            <?php
            if (isset($_GET['report__date']) && isset($_GET['report__date2'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);

                if ($date2 == "") {
                    // CONVERT DATE TO MM-DD-YY
                    $date = new DateTime($date);
                    $new_date = $date->format("m-d-Y");
            ?>
                    <div class="deworming-reports__date">
                        Date From: <?php echo $new_date; ?>
                    </div>
                <?php
                } else {
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
        $query = "SELECT count(*) FROM prenatal WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if ($date == $date && $date2 == '') {
                $query = "SELECT count(*) FROM prenatal WHERE prenatal_date = '$date'";
                $result = mysqli_query($conn, $query);
            } else {
                $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND prenatal_date >= '$date' AND prenatal_date <= '$date2'";
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
        $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age<=17";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if ($date == $date && $date2 == '') {
                $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age<=17 AND prenatal_date = '$date'";
                $result = mysqli_query($conn, $query);
            } else {
                $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age<=17 AND prenatal_date >= '$date' AND prenatal_date <= '$date2'";
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
        $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=18 AND age<=29";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if ($date == $date && $date2 == '') {
                $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=18 AND age<=29 AND prenatal_date = '$date'";
                $result = mysqli_query($conn, $query);
            } else {
                $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=18 AND age<=29 AND prenatal_date >= '$date' AND prenatal_date <= '$date2'";
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
        $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=30";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            if ($date == $date && $date2 == '') {
                $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=30 AND prenatal_date = '$date'";
                $result = mysqli_query($conn, $query);
            } else {
                $query = "SELECT count(*) FROM prenatal WHERE archive_label='' AND age>=30 AND prenatal_date >= '$date' AND prenatal_date <= '$date2'";
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
            if (isset($_GET['report__date'])) { //test
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if ($date == $date && $date2 == '') {
                    $query = "SELECT * FROM prenatal WHERE archive_label='' AND prenatal_date = '$date'";
                    $query_run = mysqli_query($conn, $query);
                } else {
                    $query = "SELECT * FROM prenatal WHERE archive_label='' AND prenatal_date >= '$date' AND prenatal_date <= '$date2'";
                    $query_run = mysqli_query($conn, $query);
                }
            }

            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $patient) {
                    // CONVERT DATE TO MM-DD-YY
                    $prenatal_date = new DateTime($patient['prenatal_date']);
                    $new_prenatal_date = $prenatal_date->format("m-d-Y");
            ?>
                    <tr>
                        <td> <?= $new_prenatal_date; ?> </td>
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

            if ($date2 == '') {
                $query = "SELECT count(*) FROM prenatal WHERE prenatal_date ='$date'";
                $result = mysqli_query($conn, $query);
            } else {
                $query = "SELECT count(*) FROM prenatal WHERE prenatal_date >='$date' AND prenatal_date <='$date2'";
                $result = mysqli_query($conn, $query);
            }
        }

        while ($row = mysqli_fetch_array($result)) {
            if ($row['count(*)'] == 0) {
        ?>
                <button type="submit" class="btn-add services__btn btn-print" disabled>
                    Save as PDF
                </button>
                <?php
            } else {
                $mail = $_SESSION['user_email'];
                $query = "SELECT position, user_email FROM account_information WHERE user_email='$mail'
                        UNION ALL
                        SELECT label, deworming_email FROM deworming WHERE deworming_email='$mail'
                        UNION ALL
                        SELECT label, consultation_email FROM consultation WHERE consultation_email='$mail'
                        UNION ALL
                        SELECT label, prenatal_email FROM prenatal WHERE prenatal_email='$mail'
                        UNION ALL
                        SELECT label, postnatal_email FROM postnatal WHERE postnatal_email='$mail'
                        UNION ALL
                        SELECT label, search_destroy_email FROM search_destroy WHERE search_destroy_email='$mail'
                        UNION ALL
                        SELECT label, early_childhood_email FROM early_childhood WHERE early_childhood_email='$mail'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) == 1) {
                    $row = mysqli_fetch_assoc($query_run);
                    if ($row['position'] == 'Barangay Health Worker') {
                ?>
                        <button type="submit" class="btn-add services__btn btn-print" disabled>
                            Save as PDF
                        </button>
                    <?php
                    } else {
                    ?>
                        <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf-daily_report.php?id=<?= $patient['prenatal_id'] ?>&&label=<?= $patient['label'] ?>&&date=<?= $date; ?>&&date2=<?= $date2; ?>&&userName=<?= $user_name ?>')">
                            Save as PDF
                        </button>
        <?php
                    }
                }
            }
        }
        ?>
        <!-- Query End -->
    </div>
<?php
}
?>