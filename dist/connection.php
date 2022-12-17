<?php
$sname= "localhost";
$unmae= "root";
$password= "";

$db_name= "patient_record_system";
$conn= mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Connection Failed!";
}