<!-- Deworming - report -->
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
            include 'includes/connection.php';
            $query = "SELECT * FROM deworming WHERE archive_label='' ORDER BY deworming_date";
            $query_run = mysqli_query($conn, $query);
            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $patient)
            {
        ?>
        <tr>
            <td> <?= $patient['deworming_date']; ?> </td>
            <td> <?= $patient['lastname']; ?> </td>
            <td> <?= $patient['firstname']; ?> </td>
            <td> <?= $patient['middlename']; ?> </td>
            <td> <?= $patient['age']; ?> </td>
            <td> <?= $patient['sex']; ?> </td>
            <td> <?= $patient['birthdate']; ?> </td>
            <td> <?= $patient['street_address'] .' '. $patient['barangay'] .' '. $patient['city'] ?> </td>
            <td></td>
        </tr>
        <?php 
            }}
        ?>
    </table>
    <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.print();">
        Print
    </button>
</div>


<div id='deworming-modal<?= $patient['deworming_id']; ?>' class="modal deworming-report__table">
            <ul class="deworming-report__table__row deworming-report__header" role="list">
                <li class="deworming-report__table__item">
                    Name
                </li>
                <li class="deworming-report__table__item">
                    Sex
                </li>
                <li class="deworming-report__table__item">
                    Age
                </li>
                <li class="deworming-report__table__item">
                    Birthdate
                </li>
                <li class="deworming-report__table__item">
                    Address
                </li>
                <li class="deworming-report__table__item">
                    Date Availed
                </li>
            </ul>
    
            <ul class="deworming-report__table__row deworming-report__item" role="list">
                <li class="deworming-report__table__item">
                    <?= $patient['firstname']." " . $patient['lastname']; ?>
                </li>
                <li class="deworming-report__table__item">
                    <?= $patient['sex']; ?>
                </li>
                <li class="deworming-report__table__item">
                    <?= $patient['age']; ?>
                </li>
                <li class="deworming-report__table__item">
                    <?= $patient['birthdate']; ?>
                </li>
                <li class="deworming-report__table__item">
                    <?= $patient['street_address'] ." ". $patient['barangay'] ." ". $patient['city']; ?>
                </li>
                <li class="deworming-report__table__item">
                    <?= $patient['deworming_date']; ?>
                </li>
            </ul>
            
</div>


        <!-- <p><a href="#ex1" rel="modal:open">Open Modal</a></p> -->