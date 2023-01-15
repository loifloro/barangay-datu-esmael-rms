<!-- Maternal-care daily reports -->
<?php
if (isset($_GET['report__date'])) {

?>
    <div class="modal deworming-reports" id="childcare-female-daily-reports">
        <h4 class="consultation__report__title">
            City Government of Dasmariñas <br> City Health Office II
        </h4>
        <p class="consultation__report__city">
            City of Dasmariñas, Cavite
        </p>

        <h4 class="deworming-reports__title">
            Target Client List for Childcare Female Reports
        </h4>
        <div class="deworming-reports__details">
            <p class="deworming-reports__brgy">
                Name of Barangay: Datu Esmael
            </p>
            <!-- Query Start -->
            <?php


            if (isset($_GET['report__date'])) {
                $date = mysqli_real_escape_string($conn, $_GET['report__date']);
                $consultation_sort = $date;
            } else {
                $consultation_sort = "N/A";
            }
            ?>
            <div class="deworming-reports__date">
                Date: <?php echo $consultation_sort; ?>
            </div>
        </div>

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM consultation WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND consultation_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__brgy">
                Total No. of NHTS Patient: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM consultation WHERE archive_label=''";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND consultation_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__brgy">
                Total No. of NON NHTS Patient: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->


        <!-- Query Start -->
        <?php
        $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Female'";
        $result = mysqli_query($conn, $query);

        if (isset($_GET['report__date'])) {
            $date = mysqli_real_escape_string($conn, $_GET['report__date']);
            $query = "SELECT count(*) FROM consultation WHERE archive_label='' AND sex='Female' AND consultation_date='$date'";
            $result = mysqli_query($conn, $query);
        }

        while ($row = mysqli_fetch_array($result)) {
        ?>
            <p class="deworming-reports__male">
                Total No. of Female: <?php echo $row['count(*)']; ?>
            </p>
        <?php
        }
        ?>
        <!-- Query End -->

        <table class="deworming-reports__table">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>0-28 days old</th>
                    <th>1-3 months old</th>
                    <th>6-11 months old </th>
                    <th>12 months old </th>
                </tr>
            </thead>

            <tr>
                <td> low: <= 2500gms </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>

            <tr>
                <td> normal: >= 2500gms </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>

            <tr>
                <td> unknown </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
                <td> underweight </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
                <td> stunted </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
                <td> wasted </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
                <td> obese / overweight </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
                <td> normal </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        </table>

        <table class="deworming-reports__table">
            <thead>
                <tr>
                    <th>Date Registered</th>
                    <th>Child's Name</th>
                    <th>Mother's Name</th>
                    <th>Mother's Age</th>
                    <th>Socio Economic Status</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tr>
                <td>Date Registered</td>
                <td>Child's Name</td>
                <td>Mother's Name</td>
                <td>Mother's Age</td>
                <td>Socio Economic Status</td>
                <td>Address</td>
                <td>Status</td>
            </tr>
        </table>

        <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.open('./includes/print_pdf-daily_report.php?id=<?= $patient['consultation_id'] ?>&&label=<?= $patient['label'] ?>&&date=<?= $date; ?>')">
            Save as PDF
        </button>

    </div>
<?php
}
?>