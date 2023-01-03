<!-- Daily Reports -->
<section class="reports">
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
                
                <select name="report__service" id="report__service" value>
                <?php
                    if (isset($_GET['report__service'])) {  ?>
                        <option disabled selected> <?=$_GET['report__service']?> </option>
                    <?php
                    }
                    ?>
                        <option value="Deworming"> Deworming </option>
                        <option  value="Consultation"> Consultation </option>
                        <option  value="Pre-natal"> Pre-natal </option>
                        <option  value="Post-natal"> Post-natal </option>
                        <option  value="Search and Destroy"> Search and Destroy </option>
                        <option  value="Childhood Care"> Childhood Care </option>

                </select>
            </div>
            
            <div class="reports__form__date">
                <label for="report__date"> Date </label>
                <!-- QUERY FOR DEFAULT DISPLAY IN DATE -->
                <?php
                    if(isset($_GET['sort__date'])){
                        $date= mysqli_real_escape_string($conn, $_GET['report__date']);
                    }
                ?>
                <input type="date" name="report__date" id="report__date" required value="<?= $date; ?>">
            </div>
        </div>

        <?php
        if (isset($_GET['report__service']) == 'Deworming') {
            include 'deworming.php'; 
        } elseif (isset($_GET['report__service']) == 'Consultation') {
            include 'consultation.php';
        } elseif (isset($_GET['report__service']) == 'Pre-natal') {
            include 'prenatal.php';
        } elseif (isset($_GET['report__service']) == 'Post-natal') {
            include 'postnatal.php';
        } elseif (isset($_GET['report__service']) == 'Search and Destroy') {
            include 'search-destroy.php';
        } elseif (isset($_GET['report__service']) == 'Childcare') {
            include 'early-childhood.php';
        } else {
            include 'consultation.php'; 

        }

    ?>
        <button type="submit" name="sort__date" class="btn-green btn-add services__btn">
            <p>View Report</p>  
        </button>

    </form>
</section>