<?php
session_start();
include "connection.php";

//DELETE BHW ACCOUNT
if(isset($_POST['delete_bhw'])){   
    $user_position = mysqli_real_escape_string($conn, $_POST['position']);
    $user_id = mysqli_real_escape_string($conn, $_POST['account_id']);

    if($user_position == 'City Health Nurse'){
        $query = "DELETE FROM account_information WHERE account_id='$user_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            echo "<script>alert('Successfully Deleted!');document.location='../user-profile.php'</script>";
            // header("Location: ../user-profile.php");
            exit(0);
        }
    }
    if($user_position == 'Barangay Health Worker'){
        echo "<script>alert('Sorry only admin can delete account');document.location='../user-profile.php'</script>";
            exit(0);
    }

}
?>