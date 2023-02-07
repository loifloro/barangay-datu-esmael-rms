<?php
// HIDE CONTENT FOR BHW ACCOUNT
function hide_content()
{
    include 'includes/connection.php';
    $query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            $position = $user['position'];
        }
        if ($position == 'Barangay Health Worker') {
?>
            <style type="text/css">
                .bhw-account {
                    display: none;
                }

                .user-profile__backup {
                    display: none;
                }

                #archive-profile {
                    display: none;
                }

                #masterlist_sidebar {
                    display: none;
                }

                #backup_sidebar {
                    display: none;
                }
            </style>
        <?php
        }
        if ($position == 'City Health Nurse') {
        ?>
            <style type="text/css">
                #archive-profile {
                    display: none;
                }
            </style>
        <?php
        }
    }
}
//HIDE CONTENT FOR DEWORMING PATIENT ACCESS
function hide_patient_deworming()
{
    include 'includes/connection.php';
    $query = "SELECT * FROM deworming WHERE deworming_id = '" . $_SESSION['account_id'] . "'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            $position = $user['label'];
        }
        if ($position == 'Deworming') {
        ?>
            <style type="text/css">
                .bhw-account {
                    display: none;
                }

                .user-profile__backup {
                    display: none;
                }

                .navigation__search {
                    display: none;
                }

                .back__btn {
                    display: none;
                }

                #edit-profile {
                    display: none;
                }

                #nav-btn {
                    display: none;
                }

                #masterlist_sidebar {
                    display: none;
                }

                #backup_sidebar {
                    display: none;
                }

                #dashboard_sidebar {
                    display: none;
                }

                #patient_sidebar {
                    display: none;
                }

                #line_sidebar {
                    display: none;
                }

                #services_sidebar {
                    display: none;
                }

                #setting_sidebar {
                    display: none;
                }

                #generated_password{
                    display: none;
                }
            </style>
        <?php
        }
    }
}
//HIDE CONTENT FOR CONSULTATION PATIENT ACCESS
function hide_patient_consultation()
{
    include 'includes/connection.php';
    $query = "SELECT * FROM consultation WHERE consultation_id = '" . $_SESSION['account_id'] . "'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            $position = $user['label'];
        }
        if ($position == 'Consultation') {
        ?>
            <style type="text/css">
                .bhw-account {
                    display: none;
                }

                .user-profile__backup {
                    display: none;
                }

                .navigation__search {
                    display: none;
                }

                .back__btn {
                    display: none;
                }

                #edit-profile {
                    display: none;
                }

                #nav-btn {
                    display: none;
                }

                #masterlist_sidebar {
                    display: none;
                }

                #backup_sidebar {
                    display: none;
                }

                #dashboard_sidebar {
                    display: none;
                }

                #patient_sidebar {
                    display: none;
                }

                #line_sidebar {
                    display: none;
                }

                #services_sidebar {
                    display: none;
                }

                #setting_sidebar {
                    display: none;
                }

                #generated_password{
                    display: none;
                }
            </style>
        <?php
        }
    }
}
//HIDE CONTENT FOR PRENATAL PATIENT ACCESS
function hide_patient_prenatal()
{
    include 'includes/connection.php';
    $query = "SELECT * FROM prenatal WHERE prenatal_id = '" . $_SESSION['account_id'] . "'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            $position = $user['label'];
        }
        if ($position == 'Prenatal') {
        ?>
            <style type="text/css">
                .bhw-account {
                    display: none;
                }

                .user-profile__backup {
                    display: none;
                }

                .navigation__search {
                    display: none;
                }

                .back__btn {
                    display: none;
                }

                #edit-profile {
                    display: none;
                }

                #nav-btn {
                    display: none;
                }

                #masterlist_sidebar {
                    display: none;
                }

                #backup_sidebar {
                    display: none;
                }

                #dashboard_sidebar {
                    display: none;
                }

                #patient_sidebar {
                    display: none;
                }

                #line_sidebar {
                    display: none;
                }

                #services_sidebar {
                    display: none;
                }

                #setting_sidebar {
                    display: none;
                }

                #generated_password{
                    display: none;
                }
            </style>
        <?php
        }
    }
}
//HIDE CONTENT FOR POSTNATAL PATIENT ACCESS
function hide_patient_postnatal()
{
    include 'includes/connection.php';
    $query = "SELECT * FROM postnatal WHERE postnatal_id = '" . $_SESSION['account_id'] . "'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            $position = $user['label'];
        }
        if ($position == 'Postnatal') {
        ?>
            <style type="text/css">
                .bhw-account {
                    display: none;
                }

                .user-profile__backup {
                    display: none;
                }

                .navigation__search {
                    display: none;
                }

                .back__btn {
                    display: none;
                }

                #edit-profile {
                    display: none;
                }

                #nav-btn {
                    display: none;
                }

                #masterlist_sidebar {
                    display: none;
                }

                #backup_sidebar {
                    display: none;
                }

                #dashboard_sidebar {
                    display: none;
                }

                #patient_sidebar {
                    display: none;
                }

                #line_sidebar {
                    display: none;
                }

                #services_sidebar {
                    display: none;
                }

                #setting_sidebar {
                    display: none;
                }

                #generated_password{
                    display: none;
                }
            </style>
        <?php
        }
    }
}
//HIDE CONTENT FOR SEARCH AND DESTROY PATIENT ACCESS
function hide_patient_search_destroy()
{
    include 'includes/connection.php';
    $query = "SELECT * FROM search_destroy WHERE search_destroy_id = '" . $_SESSION['account_id'] . "'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            $position = $user['label'];
        }
        if ($position == 'Search and Destroy') {
        ?>
            <style type="text/css">
                .bhw-account {
                    display: none;
                }

                .user-profile__backup {
                    display: none;
                }

                .navigation__search {
                    display: none;
                }

                .back__btn {
                    display: none;
                }

                #edit-profile {
                    display: none;
                }

                #nav-btn {
                    display: none;
                }

                #masterlist_sidebar {
                    display: none;
                }

                #backup_sidebar {
                    display: none;
                }

                #dashboard_sidebar {
                    display: none;
                }

                #patient_sidebar {
                    display: none;
                }

                #line_sidebar {
                    display: none;
                }

                #services_sidebar {
                    display: none;
                }

                #setting_sidebar {
                    display: none;
                }

                #generated_password{
                    display: none;
                }
            </style>
        <?php
        }
    }
}
//HIDE CONTENT FOR CHILDHOOD PATIENT ACCESS
function hide_patient_childhood()
{
    include 'includes/connection.php';
    $query = "SELECT * FROM early_childhood WHERE early_childhood_id = '" . $_SESSION['account_id'] . "'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            $position = $user['label'];
        }
        if ($position == 'Early Childhood') {
        ?>
            <style type="text/css">
                .bhw-account {
                    display: none;
                }

                .user-profile__backup {
                    display: none;
                }

                .navigation__search {
                    display: none;
                }

                .back__btn {
                    display: none;
                }

                #edit-profile {
                    display: none;
                }

                #nav-btn {
                    display: none;
                }

                #masterlist_sidebar {
                    display: none;
                }

                #backup_sidebar {
                    display: none;
                }

                #dashboard_sidebar {
                    display: none;
                }

                #patient_sidebar {
                    display: none;
                }

                #line_sidebar {
                    display: none;
                }

                #services_sidebar {
                    display: none;
                }

                #setting_sidebar {
                    display: none;
                }

                #generated_password{
                    display: none;
                }
            </style>
        <?php
        }
    }
}
// HIDE CONTENT FOR ADD AND EDIT FORMS
function hide_content_forms()
{
    include '../includes/connection.php';
    $query = "SELECT * FROM account_information WHERE account_id = '" . $_SESSION['account_id'] . "'";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            $position = $user['position'];
        }
        if ($position == 'Barangay Health Worker') {
        ?>
            <style type="text/css">
                .bhw-account {
                    display: none;
                }

                #masterlist_sidebar {
                    display: none;
                }

                #backup_sidebar {
                    display: none;
                }
            </style>
        <?php
        }
    }
}
// TOTAL PATIENTS IN PATIENT.PHP
function total_patient()
{
    include 'includes/connection.php';
    $query = "SELECT 
                (select count(*) FROM deworming WHERE archive_label='') + 
                (select count(*) FROM consultation WHERE archive_label='') +
                (select count(*) FROM early_childhood WHERE archive_label='') +
                (select count(*) FROM postnatal WHERE archive_label='') +
                (select count(*) FROM prenatal WHERE archive_label='') +
                (select count(*) FROM search_destroy WHERE archive_label='')
                As total";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <p class="patient__total">
            Total records: <span class="patients__total--num h3"><?php echo $row['total']; ?></span>
        </p>
        <?php
    }
}
//TOTAL PATIENT SEARCH RESULT
function total_result()
{
    include 'includes/connection.php';
    if (isset($_GET['search_input'])) //get the search value
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
        while ($row = mysqli_fetch_array($result)) {

        ?>
            <p class="search-results__total">
                Total results: <span class="search-results__total--num h3"><?php echo $row['totalvalue']; ?></span>
            </p>
        <?php
        }
    }
}
//RECENT UPDATES
function recent_update()
{
    include 'includes/connection.php';
    $query = "SELECT * FROM recent_activity ORDER BY recent_activity_id DESC LIMIT 3";
    $query_run = mysqli_query($conn, $query);
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            // CONVERT DATE TO MM-DD-YY
            $date = new DateTime($user['date_edit']);
            $new_date = $date->format("m-d-Y");
        ?>
            <p class="editor__details">
                <span class="editor__name">
                    <?= $user['user_fname'] . " " . $user['user_lname']; ?>
                </span>
                <span class="editor__action editor__action--edited"><?= $user['changes_label']; ?> </span>
                <span class="editor__subject"><?= $user['patient_fname'] . " " . $user['patient_lname'] . " " . $user['record_name']; ?> record</span> on
                <span class="editor__date"><?= $new_date; ?></span>
            </p>
        <?php
        }
    } else {
        echo "<h5> No Record Found </h5>";
    }
}


function forgot_password()
{
    include 'includes/connection.php';

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        $query = "SELECT * FROM account_information WHERE user_email = '$email'";


        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $user) {
                $user_email = $user['user_email'];
                $security_question = $user['security_question'];
                $security_answer = $user['security_answer'];
                $user_id = $user['account_id'];
            } ?>
            <script type="text/javascript">
                const {
                    value: securityAnswer
                } = Swal.fire({
                    title: '<?= $security_question ?>',
                    input: 'text',
                    showCancelButton: true,
                    preConfirm: (securityAnswer) => {
                        if (securityAnswer !== '<?= $security_answer ?>') {
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
                                    return {
                                        newPassword: newPassword,
                                        confirmNewPassword: confirmNewPassword
                                    }
                                }
                            }).then((result) => {
                                window.location.href = '/barangay-datu-esmael-rms/dist/includes/functions.php?changepassword&newpass=' + result.value.newPassword + '&email=<?= $user_email ?>' + '&id=<?= $user_id ?>';
                                // Please enter here what URL 
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

//QUERY FOR BACKUP
if (isset($_POST['backup_database'])) {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database_name = "patient_record_system";

    // Get connection object and set the charset
    $conn = mysqli_connect($host, $username, $password, $database_name);
    $conn->set_charset("utf8");

    // Get All Table Names From the Database
    $tables = array(); //specify table
    $sql = "SHOW TABLES";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }

    $sqlScript = "";
    foreach ($tables as $table) {
        // Prepare SQLscript for creating table structure
        $query = "SHOW CREATE TABLE $table";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($result);

        $sqlScript .= "\n\n" . $row[1] . ";\n\n";

        $query = "SELECT * FROM $table";
        $result = mysqli_query($conn, $query);

        $columnCount = mysqli_num_fields($result);


        // Prepare SQLscript for dumping data for each table
        for ($i = 0; $i < $columnCount; $i++) {
            while ($row = mysqli_fetch_row($result)) {
                $sqlScript .= "INSERT INTO $table VALUES(";
                for ($j = 0; $j < $columnCount; $j++) {
                    $row[$j] = $row[$j];

                    if (isset($row[$j])) {
                        $sqlScript .= '"' . $row[$j] . '"';
                    } else {
                        $sqlScript .= '""';
                    }
                    if ($j < ($columnCount - 1)) {
                        $sqlScript .= ',';
                    }
                }
                $sqlScript .= ");\n";
            }
        }
        $sqlScript .= "\n";
    }

    if (!empty($sqlScript)) {
        // Save the SQL script to a backup file
        $backup_file_name = $database_name . '_backup_' . time() . '.sql';

        //Save sql file in your folder also (optional to remove)
        $fileHandler = fopen($backup_file_name, 'w+');
        $number_of_lines = fwrite($fileHandler, $sqlScript);
        fclose($fileHandler);
        //(optional to remove)

        // Download the SQL backup file to the browser
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($backup_file_name));
        ob_clean();
        flush();
        readfile($backup_file_name);
        exec('rm ' . $backup_file_name);
    }
}

//QUERY TO RESTORE BACKUP
if (isset($_POST['restore_database'])) {
    try {
        $fileupload_name = $_POST['filename'];
        $sql = mysqli_connect('localhost', 'root', '', 'patient_record_system');
        $sqlSource = file_get_contents($fileupload_name); //need nasa loob ng folder para gumana restore
        mysqli_multi_query($sql, $sqlSource);

        header("Location: ../user-profile.php");
    } catch (ValueError) { //show error when there is no file uploaded
        echo "Upload a file to proceed";
    }
}

// Change password
if (isset($_GET['changepassword']) && isset($_GET['newpass']) && isset($_GET['email']) && isset($_GET['id'])) {
    include 'connection.php';

    $newpass = mysqli_real_escape_string($conn, $_GET['newpass']);
    $encrypted_pwd = md5($newpass);

    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $id = mysqli_real_escape_string($conn, $_GET['id']);


    $query = "UPDATE account_information SET password='$encrypted_pwd' WHERE account_id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header("Location: ../index.php?changed");
        exit(0);
    } else {
        header("Location: ../index.php?error=Unavailable to change password ");
    }
}

?>