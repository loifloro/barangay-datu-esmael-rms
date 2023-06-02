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
            echo
            "<tr>
                <td><a href='#deworming-modal{$patient['deworming_id']}'>{$patient['firstname']} {$patient['lastname']}</a></td>
                <td>{$patient['age']}</td>
                <td>{$patient['sex']}</td>
                <td></td>
                <td></td>
            </tr>";
            // include('includes/reports/deworming.php');
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