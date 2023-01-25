<!-- Search Destroy Modal -->
<div id='search-and-destroy-modal<?= $patient['search_destroy_id']; ?>' class="modal search-and-destroy__record__table">
    <ul class="search-and-destroy__record__table__row search-and-destroy__record__header" role="list">
        <li class="search-and-destroy__record__table__item">
            Name of Owner
        </li>
        <li class="search-and-destroy__record__table__item">
            Container
        </li>
        <li class="search-and-destroy__record__table__item">
            Positive Container
        </li>
        <li class="search-and-destroy__record__table__item">
            Complete Address
        </li>
        <li class="search-and-destroy__record__table__item">
            Date of Visit
        </li>
    </ul>
    <ul class="search-and-destroy__record__table__row search-and-destroy__record__item" role="list">
        <li class="search-and-destroy__record__table__item">
            <?= $patient['owner_fname'] . ' ' . $patient['owner_lname']; ?>
        </li>
        <li class="search-and-destroy__record__table__item">
            <?= $patient['container_name']; ?>
        </li>
        <li class="search-and-destroy__record__table__item">
            <?= $patient['container_num']; ?>
        </li>
        <li class="search-and-destroy__record__table__item">
            <?= $patient['address']; ?>
        </li>
        <li class="search-and-destroy__record__table__item">
            <?= $patient['date_visit']; ?>
        </li>
    </ul>
</div>

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
                include 'includes/connection.php';
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
        include 'includes/connection.php';
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
    <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf.php?id=<?=$patient['search_destroy_id']?>&&label=<?=$patient['label']?>')">
    Save as PDF
    </button>
</div>


<!-- Search and Destroy Daily report -->
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
    
    <!-- Query Start -->
    <?php
    if (isset($_GET['report__date']) && isset($_GET['report__date2'])) {
        $date = mysqli_real_escape_string($conn, $_GET['report__date']);
        $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
        
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
    } 
    ?>
    <!-- End Date Query -->

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

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) AS total, sum(container_num) AS total_p FROM search_destroy WHERE archive_label='' AND search_destroy_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) AS total, sum(container_num) AS total_p FROM search_destroy WHERE archive_label='' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
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
        $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Positive'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Positive' AND search_destroy_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Positive' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
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
        $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Negative'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Negative' AND search_destroy_date = '$date'";
                    $result = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT count(*) FROM search_destroy WHERE archive_label='' AND remark_status='Negative' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2'";
                    $result = mysqli_query($conn, $query);
                }
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
                include 'includes/connection.php';
                $query = "SELECT * FROM search_destroy WHERE archive_label=''";
                $query_run = mysqli_query($conn, $query);

                if (isset($_GET['report__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                        if($date == $date && $date2 == ''){
                            $query = "SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date = '$date'";
                            $query_run = mysqli_query($conn, $query);
                        }
                        else{
                            $query = "SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2'";
                            $query_run = mysqli_query($conn, $query);
                        }
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
        include 'includes/connection.php';
        $query = "SELECT * FROM search_destroy WHERE archive_label='' ORDER BY date_visit";
        $query_run = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                if($date == $date && $date2 == ''){
                    $query = "SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date = '$date' ORDER BY date_visit";
                    $query_run = mysqli_query($conn, $query);
                }
                else{
                    $query = "SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2' ORDER BY date_visit";
                    $query_run = mysqli_query($conn, $query);
                }
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

    <!-- Query To Disabled Save as PDF -->
    <?php
        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
    
            if($date2 == ''){
                $query = "SELECT count(*) FROM search_destroy WHERE search_destroy_date ='$date'";
                $result = mysqli_query($conn, $query);
            }
            else{
                $query = "SELECT count(*) FROM search_destroy WHERE search_destroy_date >='$date' AND search_destroy_date <='$date2'";
                $result = mysqli_query($conn, $query);
            }
            
        }

        while ($row = mysqli_fetch_array($result)) {
            if($row['count(*)']==0){
        ?>
                <button type="submit" class="btn-add services__btn btn-print" disabled>
                    Save as PDF
                </button>
        <?php
            }
            else{
                $mail = $_SESSION['user_email'];
                $query = "SELECT position, user_email FROM account_information WHERE user_email='$mail'
                        UNION ALL
                        SELECT label, deworming_email FROM deworming WHERE deworming_email='$mail'
                        UNION ALL
                        SELECT label, consultation_email FROM consultation WHERE consultation_email='$mail'
                        UNION ALL
                        SELECT label, prenatal_email FROM prenatal WHERE prenatal_email='$mail'
                        UNION ALL
                        SELECT label, postnatal_email FROM postnatal WHERE postnatal_email='$mail'
                        UNION ALL
                        SELECT label, search_destroy_email FROM search_destroy WHERE search_destroy_email='$mail'
                        UNION ALL
                        SELECT label, early_childhood_email FROM early_childhood WHERE early_childhood_email='$mail'";
                $query_run = mysqli_query($conn, $query);
                if (mysqli_num_rows($query_run) == 1) {
                    $row = mysqli_fetch_assoc($query_run);
                    if($row['position'] == 'Barangay Health Worker'){
                        ?>
                            <button type="submit" class="btn-add services__btn btn-print" disabled>
                                Save as PDF
                            </button>
                        <?php
                    }
                    else{
                        ?>
                            <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf-daily_report.php?id=<?=$patient['search_destroy_id']?>&&label=<?=$patient['label']?>&&date=<?= $date; ?>&&date2=<?= $date2; ?>')">
                                Save as PDF
                            </button>
                        <?php
                    }
                }
            }
        }
        ?>
        <!-- Query End -->
</div>