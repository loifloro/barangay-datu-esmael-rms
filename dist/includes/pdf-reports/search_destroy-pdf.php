<div id="search-and-destroy__report" class="modal search-and-destroy__report">
    <h4 class="search-and-destroy__report__title">
        Daily Consolidation for Search and Destroy
    </h4>


    <ul class="search-and-destroy__report__summary" role="list">
        <li class="search-and-destroy__report__summary__item">Name of Barangay Visited:
            <span class="search-and-destroy__report__summary--value">
                Datu Esmael
            </span>
        </li>
        <!-- START QUERY -->
        <?php
        $query = "SELECT count(*) AS total, sum(container_num) AS total_p FROM search_destroy WHERE archive_label=''";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <li class="search-and-destroy__report__summary__item">Total No. of Household Visited: <span class="search-and-destroy__report__summary--value"><?php echo $row['total'] ?></span></li>
            <li class="search-and-destroy__report__summary__item">Total No. of Household Positive for Larva: <span class="search-and-destroy__report__summary--value"><?php echo $row['total_p']; ?></span></li>

        <?php
        }
        ?>
        <!-- END QUERY -->
        <li class="search-and-destroy__report__summary__item">
            Purok/Block Coverage:

            <span class="search-and-destroy__report__summary--value">

                <?php
                $query = "SELECT * FROM search_destroy WHERE archive_label=''";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $patient) // PROBLEM
                    {
                ?>

                        <?= $patient['block'] . '. '; ?>

                <?php
                    }
                }
                ?>
            </span>
        </li> <!--not yet fix-->
    </ul>


    <h4 class="search-and-destroy__report__title">
        DETAILED SUMMARY OF HOUSEHOLD POSITIVE FOR LARVA
    </h4>

    <table class="search-and-destroy__report__table">
        <thead class="search-and-destroy__report__table__header">
            <tr>
                <th class="search-and-destroy__report__table--date">
                    Date of Visit
                </th>
                <th>
                    Owner of the House
                </th>
                <th>
                    Complete Address
                </th>
                <th>
                    Name of Container Positive for Larva
                </th>
                <th>
                    No. of Container Positive for Larva
                </th>
            </tr>
        </thead>
        <!-- To be put in the loop -->
        <?php
        $query = "SELECT * FROM search_destroy WHERE archive_label='' ORDER BY date_visit";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $patient) {
        ?>
                <tbody class="search-and-destroy__report__table__item">
                    <tr>
                        <td class="search-and-destroy__report__table--date"><?= $patient['date_visit']; ?></td>
                        <th><?= $patient['owner_fname'] . ' ' . $patient['owner_lname']; ?></th>
                        <td><?= $patient['address'] . ' ' . $patient['block']; ?></td>
                        <td><?= $patient['container_name']; ?></td>
                        <td><?= $patient['container_num']; ?></td>
                    </tr>
                </tbody>
        <?php
            }
        }
        ?>
    </table>
</div>