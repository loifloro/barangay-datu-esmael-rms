<style>
    .value {
        font-weight: bolder;
        font-size: 12pt;
        border-bottom: 1pt solid black;
        padding-bottom: 3pt;

    }

    .prenatal__report {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
    }

    .prenatal__report__title {
        text-align: center;
        color: #212529;
        text-transform: uppercase;
        line-height: 1.1;
    }

    .prenatal__report__city {
        text-align: center;
    }

    .prenatal__report__subtitle {
        text-align: center;
    }

    .prenatal__report__patient-record {
        margin-bottom: unset;
    }

    .prenatal__report__personal-info {
        text-transform: uppercase;
        margin-top: 20pt;
    }

    .prenatal__report__personal-info__name,
    .prenatal__report__personal-info__age,
    .prenatal__report__personal-info__bday,
    .prenatal__report__personal-info__address,
    .prenatal__report__personal-info__phone {
        display: inline;
    }

    .prenatal__report__personal-info__age {
        padding-left: 50pt;

    }

    .prenatal__report__personal-info__bday {
        padding-left: 100pt;
    }

    .prenatal__report__personal-info__phone {
        padding-left: 50pt;
    }

    .prenatal__report .padding-left {
        padding-left: 2rem;
    }


    .prenatal__report__bmi>* {
        margin-right: 100pt;
        display: inline;
    }

    .prenatal__report__ob>* {
        margin-top: 1.5rem;
        display: inline;

    }

    .prenatal__report__ob-title {
        display: inline;
        margin-block: unset;
    }

    .prenatal__report__ob {
        margin-top: 10pt;
    }

    .prenatal__report__ob__gp>* {
        margin-right: 100pt;
        display: inline;
    }

    .center {
        text-align: center;
    }

    .prenatal__report__signature {
        text-align: right;
    }
</style>

<head>
    <title><?= $patient['firstname'] . ' ' . $patient['lastname']; ?> Postnatal Record</title>
</head>


<div id="postnatal__report<?= $patient['postnatal_id'] ?>" class="modal prenatal__report">
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
        <?php
        // CONVERT DATE TO MM-DD-YY
        $postnatal_bdate = new DateTime($patient['birthdate']);
        $new_postnatal_bdate = $postnatal_bdate->format("m-d-Y");
        ?>
        <p class="prenatal__report__personal-info__item prenatal__report__personal-info__bday">
            Birthday:
            <span class="value">
                <?= $new_postnatal_bdate; ?>
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
        $postnatal_date = new DateTime($patient['postnatal_date']);
        $new_postnatal_date = $postnatal_date->format("m-d-Y");
        ?>
        <p class="prenatal__report__personal-info__item prenatal__report__personal-info__date">
            Date:
            <span class="value">
                <?= $new_postnatal_date; ?>
            </span>
        </p>
    </div>

    <div class="padding-left">
        <p class="prenatal__report__symptom">
            <abbr title="Symptoms">Symptoms</abbr>
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
                <abbr title="">Last Menstrual Period: </abbr>
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
            <abbr title="">Abnormalities> </abbr>
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
</div>