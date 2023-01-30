<style>
    span {
        font-weight: bolder;
        font-size: 12pt;
        border-bottom: 1pt solid black;
        padding-bottom: 3pt;
    }

    ul[role=list],
    ol[role=list] {
        list-style: none;
    }

    .search-and-destroy__report {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
    }

    .consultation__report__title {
        text-align: center;
        color: #212529;
        font-weight: bold;
        text-transform: uppercase;
        line-height: 1.1;
    }

    .consultation__report__city,
    .search-and-destroy__report__title {
        text-align: center;

    }

    .deworming-reports__title {
        font-weight: bold;
        text-transform: uppercase;
    }

    .deworming-reports__details {
        width: 100vw;
    }

    .deworming-reports__details>* {
        display: inline;
    }

    .deworming-reports__date {
        float: right;
    }

    .deworming-reports__total {
        margin-top: -10pt;
    }

    .search-and-destroy__report__table {
        width: 100%;
        border: 1px solid;
        border-collapse: collapse;
        margin-block: 2rem;
    }

    .search-and-destroy__report__table__header {
        font-size: 9pt;
        color: #909087;
    }

    .search-and-destroy__report__table thead>tr>th {
        font-weight: bold;
    }

    .search-and-destroy__report__table table,
    .search-and-destroy__report__table td,
    .search-and-destroy__report__table th {
        border: 1px solid gainsboro;
    }
</style>

<!-- Search and Destroy Daily report -->

<head>
    <?php
        if($date2 == ""){
            ?>
                <title>Search and Destroy Reports <?= $date; ?></title>
            <?php
        }
        else{
            ?>
                <title>Search and Destroy Reports <?= $date; ?> - <?= $date2; ?></title>
            <?php
        }
    ?>
</head>

<div id="search-and-destroy__daily-report" class="modal search-and-destroy__report">
    <h4 class="consultation__report__title">
        City Government of Dasmariñas <br> City Health Office II
    </h4>
    <p class="consultation__report__city">
        City of Dasmariñas, Cavite
    </p>

    <h4 class="search-and-destroy__report__title">
        Daily Consolidation for Search and Destroy
    </h4>

    <?php
        if($date2 == ""){
            ?>
                <div class="deworming-reports__date">
                    Date From: <?php echo $date; ?>
                </div>
            <?php
        }
        else{
            ?>
                <div class="deworming-reports__date">
                    Date From: <?php echo $date; ?>
                    <br>Date To: <?php echo $date2; ?>
                </div>
            <?php
        }
        ?>

    <ul class="search-and-destroy__report__summary" role="list">
        <li class="search-and-destroy__report__summary__item">Name of Barangay Visited:
            <span class="search-and-destroy__report__summary--value">
                Datu Esmael
            </span>
        </li>
        <!-- START QUERY -->
        <?php
        if($date == $date && $date2 == ''){
            $query = "SELECT count(*) AS total, sum(container_num) AS total_p FROM search_destroy WHERE archive_label='' AND search_destroy_date = '$date'";
            $result = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT count(*) AS total, sum(container_num) AS total_p FROM search_destroy WHERE archive_label='' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <li class="search-and-destroy__report__summary__item">Total No. of Household Visited: <span class="search-and-destroy__report__summary--value"><?php echo $row['total'] ?></span></li>
            <li class="search-and-destroy__report__summary__item">Total No. of Container Positive for Larva: <span class="search-and-destroy__report__summary--value"><?php echo $row['total_p']; ?></span></li>

        <?php
        }
        ?>
        <!-- END QUERY -->

        <!-- START QUERY -->
        <?php
        if($date == $date && $date2 == ''){
            $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Positive' AND search_destroy_date = '$date'";
            $result = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Positive' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <li class="search-and-destroy__report__summary__item">Total No. of Household Positive for Larva: <span class="search-and-destroy__report__summary--value"><?php echo $row['count(*)']; ?></span></li>
        <?php
        }
        ?>
        <!-- END QUERY -->

        <!-- START QUERY -->
        <?php
        if($date == $date && $date2 == ''){
            $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Negative' AND search_destroy_date = '$date'";
            $result = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Negative' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <li class="search-and-destroy__report__summary__item">Total No. of Household Negative for Larva: <span class="search-and-destroy__report__summary--value"><?php echo $row['count(*)']; ?></span></li>
        <?php
        }
        ?>
        <!-- END QUERY -->

        <li class="search-and-destroy__report__summary__item">
            Purok/Block Coverage:

            <span class="search-and-destroy__report__summary--value">

                <?php
                if($date == $date && $date2 == ''){
                    $query = "SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date = '$date'";
                    $query_run = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2'";
                    $query_run = mysqli_query($conn, $query);
                }

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $patient) // PROBLEM
                    {
                ?>

                        <?= $patient['block'] . '/ '; ?>

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
                <th>
                    Remarks
                </th>
            </tr>
        </thead>
        <!-- To be put in the loop -->
        <?php
        if($date == $date && $date2 == ''){
            $query = "SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date = '$date' ORDER BY date_visit";
            $query_run = mysqli_query($conn, $query);
        }
        else{
            $query = "SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2' ORDER BY date_visit";
            $query_run = mysqli_query($conn, $query);
        }

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
                        <td><?= $patient['remark_status']; ?></td>
                    </tr>
                </tbody>
        <?php
            }
        }
        ?>
    </table>
</div>