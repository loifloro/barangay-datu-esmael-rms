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
    //TOTAL PATIENT SEARCH RESULT
    function total_result(){
        include 'includes/connection.php';
        if(isset($_GET['search_input'])) //get the search value
                    {
                        $value = $_GET['search_input'];
                        $query = "SELECT 
                        (select count(*) FROM deworming WHERE CONCAT(firstname,lastname,deworming_date,sex,phone_num, label) 
                                  LIKE '%$value%') + 
                        (select count(*) FROM consultation WHERE CONCAT(firstname,lastname,consultation_date,sex,phone_number, label) 
                                  LIKE '%$value%') +
                        (select count(*) FROM early_childhood WHERE CONCAT(child_fname,child_lname,early_childhood_date,sex,phone_num, label) 
                                  LIKE '%$value%') +
                        (select count(*) FROM postnatal WHERE CONCAT(firstname,lastname,postnatal_date,sex,phone_num, label) 
                                  LIKE '%$value%') +
                        (select count(*) FROM prenatal WHERE CONCAT(firstname,lastname,prenatal_date,sex,phone_num, label) 
                                  LIKE '%$value%') +
                        (select count(*) FROM search_destroy WHERE CONCAT(owner_fname,owner_lname,search_destroy_date,sex,phone_num, label) 
                                  LIKE '%$value%')
                        As totalvalue";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result)) {
                    
                ?>
            <p class="search-results__total">
                Total results: <span class="search-results__total--num h3"><?php echo $row['totalvalue']; ?></span>
            </p>
                <?php
                }
                    }
    }
    //RECENT UPDATES
    function recent_update(){
        include 'includes/connection.php';
        $query = "SELECT * FROM recent_activity ORDER BY recent_activity_id DESC LIMIT 3";
        $query_run = mysqli_query($conn, $query);
        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $user)
        {
    ?>     
        <p class="editor__details">
            <span class="editor__name">
                <?= $user['user_fname']." ". $user['user_lname']; ?>
            </span>
            <span class="editor__action editor__action--edited"><?= $user['changes_label']; ?> </span>
            <span class="editor__subject"><?= $user['patient_fname']." " . $user['patient_lname'] ." ". $user['record_name']; ?> record</span> on 
            <span class="editor__date"><?= $user['date_edit']; ?></span>
        </p>
    <?php
        }
        }
        else
        {
            echo "<h5> No Record Found </h5>";
        }
    }


    function forgot_password(){
        include 'includes/connection.php';
            
            if (isset($_GET['contact'])) {
                $contact = $_GET['contact'];
                $query = "SELECT * FROM account_information WHERE phone_num = '$contact'";

                $query_run = mysqli_query($conn, $query);
                if(mysqli_num_rows($query_run) > 0){
                    foreach($query_run as $user){
                        $phone_num = $user['phone_num'];
                        $security_question = $user['security_question'];
                        $security_answer = $user['security_answer'];
                    } ?>
                    <script type="text/javascript">
                        const { value: securityAnswer } = Swal.fire({
                            title: '<?= $security_question ?>',
                            input: 'text',
                            showCancelButton: true,
                            preConfirm: (securityAnswer) => {
                                if(securityAnswer !== '<?= $security_answer ?>') {
                                    Swal.showValidationMessage(`Incorrect answer`);
                                } else {
                                    Swal.fire({
                                        title: 'Enter new password',
                                        html: `<input type="password" id="login" class="swal2-input" placeholder="New Password">
                                        <input type="password" id="password" class="swal2-input" placeholder="Confirm New Password">`,
                                        confirmButtonText: 'Change',
                                        focusConfirm: false,
                                        preConfirm: () => {
                                            const newPassword = Swal.getPopup().querySelector('#login').value
                                            const confirmNewPassword = Swal.getPopup().querySelector('#password').value
                                            if (!newPassword || !confirmNewPassword) {
                                                Swal.showValidationMessage(`Please enter password`);
                                            } else if (newPassword !== confirmNewPassword) {
                                                Swal.showValidationMessage(`Password does not match `)
                                            }
                                            return { newPassword: newPassword, confirmNewPassword: confirmNewPassword }
                                        }
                                        }).then((result) => {
                                            // window.location.href = '/barangay-datu-esmael-rms/dist/index.php?contact=' + contactNum.value

                                        })
                                }
                            }
                        })

                    </script>
                <?php
                } else { ?>
                    <script>
                        Swal.fire({
                            toast: true,
                            position: 'top-right',
                            icon: 'info',
                            iconColor: 'white',
                            title: 'No record found',
                            customClass: {
                                popup: 'no-record'
                            },
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true, 
                            })
                    </script>
                    
                <?php    
                }
            }
    }
?>
