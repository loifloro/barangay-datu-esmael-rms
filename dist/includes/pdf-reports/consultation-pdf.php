<!-- INTERNAL CSS -->
<style>

h4{
    font-weight:bold;
    text-align: center;
    margin: 0;
    padding: 0;
}
.consultation__report__city{
    text-align: center;
    margin: 0;
    padding: 0;
}
.consultation__report__title{
    text-align: center;
}
.consultation__report__personal-info__item{
    font-weight: bold;
    /* display: inline-block; */
}
.consultation__report__personal-info__bday{
    float: right;
    padding-right: 62px;
}
.consultation__report__personal-info__name{
    float: left;
}
.consultation__report__personal-info__age{
    float: left;
    padding-left: 189px;
}
.consultation__report__personal-info__address{
    float: right;
    padding-top: 25px;
    padding-right: 195px;
}
.consultation__report__personal-info__phone{
    float: left;
    padding-top: 25px;
    padding-left: 21px;
}
.consultation__report__personal-info__date{
    float: left;
    padding-top: 50px;
    padding-left:20px;
}
.value{
    font-weight: normal;
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
        Patient Record
    </h5>

    <div class="consultation__report__personal-info">
        <p class="consultation__report__personal-info__item consultation__report__personal-info__name">
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
        <h5 class="consultation__report__title consultation__report__patient-record">
            Laboratory Results
        </h5>

        <div class="consultation__report__bmi">
            <p class="consultation__report__bmi__item">
                <abbr title="O">O> BP</abbr>
                <span class="value">
                    <?= $patient['blood_pressure']; ?>
                </span>
                mmHg
            </p>
            <p class="consultation__report__bmi__item--weight">
                <abbr title="Weight">WT:</abbr>
                <span class="value">
                    <?= $patient['weight']; ?>
                </span>
                kg
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