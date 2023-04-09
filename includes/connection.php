<?php
$sname= "localhost";
$uname= "root";
$password= "";

$db_name= "patient_record_system";
$conn= mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection Failed!";
}