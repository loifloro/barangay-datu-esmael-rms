<!-- INTERNAL CSS -->
<style>
    .value {
        font-weight: bolder;
        font-size: 12pt;
        border-bottom: 1pt solid black;
        padding-bottom: 3pt;
    }


    .consultation__report {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
    }

    .consultation__report__title {
        text-align: center;
        color: #212529;
        text-transform: uppercase;
        line-height: 1.1;
        margin-top: 10pt;
    }

    .consultation__report__city {
        text-align: center;
        margin-bottom: 1rem;
    }

    .consultation__report__subtitle {
        text-align: center;
    }

    .consultation__report__patient-record {
        margin-bottom: unset;
    }

    .consultation__report__personal-info {
        text-transform: uppercase;
        margin-top: 20pt;
    }

    .consultation__report__personal-info__name,
    .consultation__report__personal-info__age,
    .consultation__report__personal-info__bday,
    .consultation__report__personal-info__address,
    .consultation__report__personal-info__phone {
        display: inline;
    }

    .consultation__report__personal-info__age {
        padding-left: 50pt;

    }

    .consultation__report__personal-info__bday {
        padding-left: 100pt;
    }

    .consultation__report__personal-info__phone {
        padding-left: 50pt;
    }


    .consultation__report .padding-left {
        padding-left: 2rem;
    }

    .consultation__report__bmi {
        margin-bottom: 2rem;
    }

    .consultation__report__bmi__item--weight {
        margin-left: 2rem;
    }
</style>
<!-- END -->

<div id="consultation__report<?= $patient['consultation_id']; ?>" class="modal consultation__report">
    <h4 class="consultation__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of Dasmariñas, Cavite
    </p>

    <h5 class="consultation__report__title consultation__report__patient-record">
        PATIENT RECORD
    </h5>

    <div class="consultation__report__personal-info" style="width: 100%">
        <p class="consultation__report__personal-info__item consultation__report__personal-info__name" style="margin-right: auto;">
            Name:
            <span class="value">
                <?= $patient['firstname'] . " " . $patient['middlename'] . " " . $patient['lastname']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__age">
            Age:
            <span class="value">
                <?= $patient['age']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__bday">
            Birthday:
            <span class="value">
                <?= $patient['birthdate']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__address">
            Address:
            <span class="value">
                <?= $patient['street_address'] . " " . $patient['barangay'] . " " . $patient['city']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__phone">
            Phone Number#:
            <span class="value">
                <?= $patient['phone_number']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__date">
            Date:
            <span class="value">
                <?= $patient['consultation_date']; ?>
            </span>
        </p>
    </div>

    <div class="padding-left">
        <p class="consultation__report__symptom">
            <abbr title="Symptoms">S></abbr>
            <span class="value">
                <?= $patient['symptoms']; ?>
            </span>
        </p>
        <br><br><br><br>
        <h5 class="consultation__report__title consultation__report__patient-record">
            LABORATORY RESULTS
        </h5>

        <div class="consultation__report__bmi">
            <p class="consultation__report__bmi__item">
                <abbr title="O">O> BP</abbr>
                <span class="value">
                    <?= $patient['blood_pressure']; ?>
                    mmHg
                </span>

            </p>
            <p class="consultation__report__bmi__item--weight">
                <abbr title="Weight">WT:</abbr>
                <span class="value">
                    <?= $patient['weight']; ?>
                    kg
                </span>
            </p>
        </div>
        <p class="prenatal__report__a">
            <abbr title="">A> </abbr>
            <span class="value">
                <?= $patient['abnormal']; ?>
            </span>
        </p>
        <p class="prenatal__report__p">
            <abbr title="">P> </abbr>
            <span class="value">
                <?= $patient['prescriptions']; ?>
            </span>
        </p>
    </div>
</div>