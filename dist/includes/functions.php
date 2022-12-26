<!-- QUERY TO HIDE CONTENT FOR BHW ACCOUNT -->
<?php
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
    ?>
<!-- END OF QUERY -->