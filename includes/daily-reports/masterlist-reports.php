<!-- Daily Reports -->
<section class="reports" id="reports">
    <form action="#reports" class="reports__form" method="GET">
        <h2 class="reports__title">
            Reports
        </h2>
        <p class="reports__desc">
            Overview of the total number of records on masterlist.
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
                    <option value="Maternal Care"> Maternal Care </option>
                    <option value="Childhood Care Female"> Childhood Care Female </option>
                    <option value="Childhood Care Male"> Childhood Care Male </option>

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
                    <input type="date" name="report__date" id="date__from" required value="<?= $date; ?>" onchange="datePicker()">
                </div>
                <div class=" reports__form__date">
                    <label for="report__date">Date To </label>
                    <input type="date" name="report__date2" id="date__to" value="<?= $date2; ?>" disabled>
                </div>
            </div>

            <button type="submit" name="sort__date" class="btn-green btn-add services__btn">
                <p>Sort record</p>
            </button>
        </div>


        <?php
        if (isset($_GET['report__service'])) {
            $report_service = $_GET['report__service'];
            if ($report_service == "Childhood Care Female") {
                include 'childcare-female.php';
            } elseif ($report_service == "Childhood Care Male") {
                include 'childcare-male.php';
            } elseif ($report_service == 'Maternal Care') {
                include 'maternal-care.php';
            }
        }
        ?>

        <!-- <button type="submit" name="sort__date" class="btn-green btn-add services__btn" required>
            <p>Sort Record</p>
        </button> -->
    </form>
</section>