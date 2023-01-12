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