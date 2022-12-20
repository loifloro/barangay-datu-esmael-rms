<!-- Deworming - report -->


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