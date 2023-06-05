<table id="deworming__services" class="display" style="width:100%">
    <thead class="data-table__head">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Date Availed</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM deworming WHERE archive_label=''";
        $query_run = mysqli_query($conn, $query);
        foreach ($query_run as $patient) {
            $deworm_date = new DateTime($patient['deworming_date']);
            $new_deworm_date = $deworm_date->format("m-d-Y");

            $deworm_bdate = new DateTime($patient['birthdate']);
            $new_deworm_bdate = $deworm_bdate->format("m-d-Y");
        ?>
            <tr>
                <td> <a href="#deworming-modal<?= $patient['deworming_id']; ?>" rel="modal:open"><?= $patient['firstname'] . " " . $patient['lastname']; ?></a></td>
                <td><?= $patient['age']; ?></td>
                <td><?= $patient['sex']; ?></td>
                <td><?= $new_deworm_date; ?></td>
                <td></td>

            </tr>
        <?php
        }

        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Date Availed</th>
            <th></th>
        </tr>
    </tfoot>
</table>
<?php include('./includes/reports/deworming.php'); ?>