<head>
  <title><?= $patient['firstname'].' '.$patient['lastname']; ?> <?= $patient['service_name'];?> Record</title>
</head>

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

<div class="modal consultation__report">
    <!-- QUERY FOR DYNAMIC CITY/BARANGAY -->
    <?php
        $query = "SELECT * FROM account_information WHERE position='Admin'";
        $query_run= mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $user) {
                $barangay_name = $user['barangay_name'];
                $city_name = $user['city_name'];
            }
        }
    ?>
    <h4 class="consultation__report__title">
        City Government of <?=$city_name?> <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of <?=$city_name;?>
    </p>

    <h5 class="consultation__report__title consultation__report__patient-record">
        <?= $patient['service_name'];?> Record
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
                <?= $patient['bdate']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__address">
            Address:
            <span class="value">
                <?= $patient['address'] . " " . $patient['barangay'] . " " . $patient['city']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__phone">
            Phone Number#:
            <span class="value">
                <?= $patient['phone_num']; ?>
            </span>
        </p>
        <p class="consultation__report__personal-info__item consultation__report__personal-info__date">
            Date:
            <span class="value">
                <?= $patient['service_date']; ?>
            </span>
        </p>
    </div>

    <div class="padding-left">
    <p class="prenatal__report__a">
            <abbr title="">Descriptions </abbr>
            <span class="value">
                <?= $patient['description']; ?>
            </span>
        </p>
        <p class="prenatal__report__p">
            <abbr title="">Result </abbr>
            <span class="value">
                <?= $patient['result']; ?>
            </span>
        </p>
        <p class="prenatal__report__p">
            <abbr title="">Prescriptions </abbr>
            <span class="value">
                <?= $patient['prescription']; ?>
            </span>
        </p>
    </div>
</div>