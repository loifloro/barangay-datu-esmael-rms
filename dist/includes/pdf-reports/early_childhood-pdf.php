<head>
  <title><?= $patient['child_fname'] . ' ' . $patient['child_lname']; ?> Early Childhood Record</title>
</head>

<div id="early__childhood__report<?= $patient['early_childhood_id']; ?>" class="modal early__childhood__report">
    <div class="early__childhood__report__header">
        <img src="../assets/img/doh.png" alt="DOH Logo" class="doh-image">
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
            <td> <?= $patient['bcg1_date']; ?> </td>
            <td> <?= $patient['bcg2_date']; ?> </td>
            <td> <?= $patient['bcg3_date']; ?> </td>
            <td> <?= $patient['bcg_catchup_date']; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__hepb">
            <td> HEP B </td>
            <td> <?= $patient['hepb1_date']; ?> </td>
            <td> <?= $patient['hepb2_date']; ?> </td>
            <td> <?= $patient['hepb3_date']; ?> </td>
            <td> <?= $patient['hepb_catchup_date']; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__penta">
            <td> PENTAVALENT </td>
            <td> <?= $patient['penta1_date']; ?> </td>
            <td> <?= $patient['penta2_date']; ?> </td>
            <td> <?= $patient['penta3_date']; ?> </td>
            <td> <?= $patient['penta_catchup_date']; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__opv">
            <td> ORAL POLIO VACCINE OPV </td>
            <td> <?= $patient['oral_polio1_date']; ?> </td>
            <td> <?= $patient['oral_polio2_date']; ?> </td>
            <td> <?= $patient['oral_polio3_date']; ?> </td>
            <td> <?= $patient['oral_polio_catchup_date']; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__ipv">
            <td> INACTIVE POLIO VACCINE IPV </td>
            <td> <?= $patient['inactive_polio1_date']; ?> </td>
            <td> <?= $patient['inactive_polio2_date']; ?> </td>
            <td> <?= $patient['inactive_polio3_date']; ?> </td>
            <td> <?= $patient['inactive_polio_catchup_date']; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__pneumoco">
            <td> PNEUMOCOCCAL CONJUGATE VACCINE 13 (PCV 13) </td>
            <td> <?= $patient['pneumoco1_date']; ?> </td>
            <td> <?= $patient['pneumoco2_date']; ?> </td>
            <td> <?= $patient['pneumoco3_date']; ?> </td>
            <td> <?= $patient['pneumoco_catchup_date']; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__measle">
            <td> MEASLES CONTAINING VACCINE (AMV, MR, MMR) </td>
            <td> <?= $patient['measle1_date']; ?> </td>
            <td> <?= $patient['measle2_date']; ?> </td>
            <td> <?= $patient['measle3_date']; ?> </td>
            <td> <?= $patient['measle_catchup_date']; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
        <tr class="early__childhood__report__vitamin">
            <td> 1. VITAMIN A/ MNP </td>
            <td> <?= $patient['vitamin1_date']; ?> </td>
            <td> <?= $patient['vitamin2_date']; ?> </td>
            <td> <?= $patient['vitamin3_date']; ?> </td>
            <td> <?= $patient['vitamin_catchup_date']; ?> </td>
            <!-- <td> N/A </td> -->
            <td> </td>
        </tr>
    </table>
</div>