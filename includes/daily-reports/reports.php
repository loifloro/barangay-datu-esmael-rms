<!-- Daily Reports -->
<section class="reports" id="reports">
    <form action="#reports" class="reports__form" method="GET">
        <h2 class="reports__title">
            Reports
        </h2>
        <p class="reports__desc">
            Overview of the total number of records on each services.
        </p>

        <div class="reports__input">
            <div class="reports__form__service">
                <label for="report__service"> Service </label>

                <select name="report__service" id="report__service" required>
                    <?php
                    if (isset($_GET['report__service'])) {  ?>
                        <option selected value="<?= $_GET['report__service'] ?>"> <?= $_GET['report__service'] ?> </option>
                        <?php
                    }

                    $query = "SELECT label FROM deworming GROUP BY label
                              UNION ALL
                              SELECT label FROM consultation GROUP BY label
                              UNION ALL
                              SELECT label FROM prenatal GROUP BY label
                              UNION ALL
                              SELECT label FROM postnatal GROUP BY label
                              UNION ALL
                              SELECT label FROM search_destroy GROUP BY label
                              UNION ALL
                              SELECT label FROM early_childhood GROUP BY label
                              UNION ALL
                              SELECT service_name FROM other_service GROUP BY service_name";
                    $query_run = mysqli_query($conn, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $label) {
                            $old_label = $label['label'];
                            $new_label = $old_label;
                        ?>
                            <option value="<?= $new_label; ?>"> <?php echo $new_label; ?> </option>
                    <?php
                        }
                    }
                    ?>
                            <option value="All"> All </option>
                </select>
            </div>

            <!-- QUERY FOR DEFAULT DISPLAY IN DATE -->
            <?php
            if (isset($_GET['sort__date'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
            }
            ?>
            <div class="reports__date">
                <div class="reports__form__date">
                    <label for="report__date">Date From </label>
                    <input type="date" name="report__date" id="report__date" required value="<?= $date; ?>">
                </div>
                <div class="reports__form__date">
                    <label for="report__date">Date To </label>
                    <input type="date" name="report__date2" id="report__date" value="<?= $date2; ?>">
                </div>
            </div>

            <button type="submit" name="sort__date" class="btn-green btn-add services__btn">
                <p>Sort record</p>
            </button>
        </div>


        <?php
        if (isset($_GET['report__service'])) {
            $report_service = $_GET['report__service'];
            if ($report_service == "Deworming") {
                include 'deworming.php';
            } elseif ($report_service == "Consultation") {
                include 'consultation.php';
            } elseif ($report_service == 'Prenatal') {
                include 'prenatal.php';
            } elseif ($report_service == 'Postnatal') {
                include 'postnatal.php';
            } elseif ($report_service == 'Search and Destroy') {
                include 'search-destroy.php';
            } elseif ($report_service == 'Early Childhood') {
                include 'early-childhood.php';
            } elseif ($report_service == 'All') {
                include 'all.php';
            } else{
                include 'other_services.php';
            }
        }
        ?>


    </form>
</section>