<?php
    // HIDE CONTENT FOR BHW ACCOUNT
    function hide_content(){
        include 'includes/connection.php';
        $query = "SELECT * FROM account_information WHERE account_id = '".$_SESSION['account_id']."'";
        $query_run = mysqli_query($conn, $query);
        if(mysqli_num_rows($query_run) > 0){
            foreach($query_run as $user){
                $position = $user['position'];
            }
        if($position == 'Barangay Health Worker'){
    ?>
            <style type="text/css">
            .bhw-account{
                display:none;}
            #masterlist_sidebar{
                display:none;}
            #backup_sidebar{
                display:none;}
            </style>
    <?php
            }
        }
    }
    // HIDE CONTENT FOR ADD AND EDIT FORMS
    function hide_content_forms(){
        include '../includes/connection.php';
        $query = "SELECT * FROM account_information WHERE account_id = '".$_SESSION['account_id']."'";
        $query_run = mysqli_query($conn, $query);
        if(mysqli_num_rows($query_run) > 0){
            foreach($query_run as $user){
                $position = $user['position'];
            }
        if($position == 'Barangay Health Worker'){
    ?>
            <style type="text/css">
            .bhw-account{
                display:none;}
            #masterlist_sidebar{
                display:none;}
            #backup_sidebar{
                display:none;}
            </style>
    <?php
            }
        }
    }
    // TOTAL PATIENTS IN PATIENT.PHP
    function total_patient(){
        include 'includes/connection.php';
        $query = "SELECT 
                (select count(*) FROM deworming) + 
                (select count(*) FROM consultation) +
                (select count(*) FROM early_childhood) +
                (select count(*) FROM postnatal) +
                (select count(*) FROM prenatal) +
                (select count(*) FROM search_destroy)
                As total";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result)) {  
        ?>
            <p class="patient__total">
                Total records: <span class="patients__total--num h3"><?php echo $row['total']; ?></span>
            </p>
        <?php
            }
    }
?>
