<div id='deworming-modal<?= $patient['deworming_id']; ?>' class="modal deworming-report__table">
</div>

<style>
    .deworming-reports {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
    }

    .search-and-destroy__report__title {
        text-align: center;
        color: #212529;
        text-transform: uppercase;
        line-height: 1.1;
        margin-top: 10pt;
    }

    .deworming-reports table,
    .deworming-reports td,
    .deworming-reports th {
        border: 1pt solid gray;
    }

    .deworming-reports__table {
        width: 100%;
        border: 1px solid;
        border-collapse: collapse;
        margin-block: 2rem;
    }

    .deworming-reports__table__header {
        font-size: 9pt;
        color: #909087;
    }

    .deworming-reports__table thead>tr>th {
        font-weight: lighter;
    }

    .deworming-report__table {
        background: #ffffff;
        border-radius: 1vw;
        padding: none;
        box-sizing: border-box;
        width: 100vw;
    }

    .deworming-report__table__row {
        display: grid;
        grid-template-columns: 1fr repeat(3, 10%) 1fr 10%;
        -webkit-padding-start: unset;
        padding-inline-start: unset;
        padding: 1rem 1.5rem;
        margin-block: 0;
    }
</style>

<div id='deworming-reports' class="modal deworming-reports">
    <h4 class="search-and-destroy__report__title">
        Daily Activity (Deworming)
    </h4>

    <table class="deworming-reports__table">
        <thead>
            <tr>
                <th>DATE</th>
                <th>LAST NAME</th>
                <th>FIRST NAME</th>
                <th>MIDDLE NAME</th>
                <th>AGE</th>
                <th>GENDER</th>
                <th>BIRTHDAY</th>
                <th>ADDRESS</th>
                <th>SIGNATURE</th>
            </tr>
        </thead>
        <?php
        $query = "SELECT * FROM deworming WHERE archive_label='' ORDER BY deworming_date";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $patient) {
        ?>
                <tr>
                    <td> <?= $patient['deworming_date']; ?> </td>
                    <td> <?= $patient['lastname']; ?> </td>
                    <td> <?= $patient['firstname']; ?> </td>
                    <td> <?= $patient['middlename']; ?> </td>
                    <td> <?= $patient['age']; ?> </td>
                    <td> <?= $patient['sex']; ?> </td>
                    <td> <?= $patient['birthdate']; ?> </td>
                    <td> <?= $patient['street_address'] . ' ' . $patient['barangay'] . ' ' . $patient['city'] ?> </td>
                    <td></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</div>