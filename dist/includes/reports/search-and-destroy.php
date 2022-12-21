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
            <?= $patient['owner_name']; ?>    
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
        <li class="search-and-destroy__report__summary__item">Name of Barangay Visited: </li>
        <!-- START QUERY -->
        <?php
                $query = "SELECT
                        count(*) AS total, 
                        sum(total_positive_larva) AS total_p 
                        FROM search_destroy";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result)) {  
        ?>
        <li class="search-and-destroy__report__summary__item">Total No. of Household Visited: <?php echo $row['total'] ?></li>
        <li class="search-and-destroy__report__summary__item">Total No. of Household Positive for Larva: <?php echo $row['total_p']; ?></li>
       
        <?php
        }
        ?>
        <!-- END QUERY -->
        <?php 
                    include 'includes/connection.php';
                    $query = "SELECT * FROM search_destroy";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient) // PROBLEM
                    {
        ?>
        <li class="search-and-destroy__report__summary__item">Purok/Block Coverage: <?= $patient['block']; ?></li> <!--not yet fix-->
        <?php 
                    }}
        ?>                
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
                    $query = "SELECT * FROM search_destroy ORDER BY date_visit";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $patient)
                    {
        ?>
        <tbody class="search-and-destroy__report__table__item">
            <tr>
                <td class="search-and-destroy__report__table--date"><?= $patient['date_visit']; ?></td>
                <th><?= $patient['owner_name']; ?></th>
                <td><?= $patient['address'].' '. $patient['block']; ?></td>
                <td><?= $patient['container_name']; ?></td>
                <td><?= $patient['total_positive_larva']; ?></td>
            </tr>
        </tbody>
        <?php 
                    }}
        ?>
    </table>
    <button type="submit" class="btn-green btn-add services__btn btn-print" onclick="window.print();">
        Print
    </button>
</div>