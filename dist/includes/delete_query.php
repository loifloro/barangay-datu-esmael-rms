<?php
session_start();
include "connection.php";

//DELETE BHW ACCOUNT
if(isset($_POST['delete_patient']))
{
    $patient_id = mysqli_real_escape_string($conn, $_POST['delete_patient']);

    $query = "DELETE FROM account_information WHERE id='$patient_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        // $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: ../user-profile.php");
        exit(0);
    }
    else
    {
        // $_SESSION['message'] = "Student Not Deleted";
        header("Location: ../user-profile.php");
        exit(0);
    }
}


?>