<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "patient_record_system";


// $sname= "localhost";
// $uname= "id20499505_root";
// $password= "Putangina--00";
// $db_name= "id20499505_patient_record_system";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection Failed!";
}
