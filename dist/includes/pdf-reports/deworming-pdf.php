<head>
  <title>Deworming Record</title>
</head>

<div id='deworming-modal<?= $patient['deworming_id']; ?>' class="modal deworming-report__table">
</div>

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

