<!-- Daily Reports -->
<section class="reports" id="reports">
    <form action="" class="reports__form" method="GET">
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
                    ?>
                    <option value="Deworming"> Deworming </option>
                    <option value="Consultation"> Consultation </option>
                    <option value="Pre-natal"> Pre-natal </option>
                    <option value="Post-natal"> Post-natal </option>
                    <option value="Search and Destroy"> Search and Destroy </option>
                    <option value="Childhood Care"> Childhood Care </option>

                </select>
            </div>
            
            <!-- QUERY FOR DEFAULT DISPLAY IN DATE -->
            <?php
                if (isset($_GET['sort__date'])) {
                    $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                    $date2 = mysqli_real_escape_string($conn, $_GET['report__date2']);
                }
            ?>
            <div class="reports__form__date">
                <label for="report__date">Date From </label>
                <input type="date" name="report__date" id="report__date" required value="<?= $date; ?>">
            </div>
            <div class="reports__form__date">
                <label for="report__date">Date To </label>
                <input type="date" name="report__date2" id="report__date" value="<?= $date2; ?>">
            </div>
        </div>

        <?php
        if (isset($_GET['report__service'])) {
            $report_service = $_GET['report__service'];
            if ($report_service == "Deworming") {
                include 'deworming.php';
            } elseif ($report_service == "Consultation") {
                include 'consultation.php';
            } elseif ($report_service == 'Pre-natal') {
                include 'prenatal.php';
            } elseif ($report_service == 'Post-natal') {
                include 'postnatal.php';
            } elseif ($report_service == 'Search and Destroy') {
                include 'search-destroy.php';
            } elseif ($report_service == 'Childhood Care') {
                include 'early-childhood.php';
            }
        } else {
            include 'deworming.php';
        }

        ?>
        <button type="submit" name="sort__date" class="btn-green btn-add services__btn">
            <p>Sort record</p>
        </button>

    </form>
</section>