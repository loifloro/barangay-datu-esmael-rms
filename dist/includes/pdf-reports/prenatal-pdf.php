<div id="prenatal__report<?= $patient['prenatal_id']; ?>" class="modal prenatal__report">
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
                <?= $patient['prenatal_date']; ?>
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
</div>