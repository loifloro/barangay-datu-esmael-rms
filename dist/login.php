<?php
session_start();
include "includes/connection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    // $roles = validate($_POST['roles']);
    if (empty($username)) { /*if else statement for validation*/
        header("Location: index.php?error=Contact number is required"); /*Error Alert*/
        exit();
    } 

    else if (empty($password)){
        header("Location: index.php?error=Password is required"); /*Error Alert*/
        exit();
    } 
    else {
        $sql= "SELECT * FROM account_information WHERE user_email='$username' AND password='$password'";
        $result= mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            header("Location: index.php?error=Incorrect username or password!");
        }

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] == $password && $row['user_email'] == $username){
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['phone_num'] = $row['phone_num'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['account_id'] = $row['account_id'];
                $_SESSION['position'] = $row['position'];
                header("Location: dashboard.php?success"); /*Redirect to this page if successful*/
                exit();
            } 
        } else {
            $sql= "SELECT firstname, phone_num, deworming_id, label FROM deworming 
            WHERE phone_num='$username' AND firstname='$password'
            UNION
            SELECT firstname, phone_number, consultation_id, label FROM consultation 
            WHERE phone_number='$username' AND firstname='$password'
            UNION
            SELECT firstname, phone_num, prenatal_id, label FROM prenatal 
            WHERE phone_num='$username' AND firstname='$password'
            UNION
            SELECT firstname, phone_num, postnatal_id, label FROM postnatal 
            WHERE phone_num='$username' AND firstname='$password'
            UNION
            SELECT owner_fname, phone_num, search_destroy_id, label FROM search_destroy 
            WHERE phone_num='$username' AND owner_fname='$password'
            UNION
            SELECT child_fname, phone_num, early_childhood_id, label FROM early_childhood 
            WHERE phone_num='$username' AND child_fname='$password'
            ";

            $result= mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);

                if ($row['firstname'] == $password && $row['phone_num'] == $username){
                    $_SESSION['phone_num'] = $row['phone_num'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['deworming_id'] = $row['deworming_id'];
                    $_SESSION['label'] = $row['label'];
                    header("Location: search-result.php?success"); /*Redirect to this page if successful*/
                    exit();
                } 
                else {
                    header("Location: index.php?error=No patient"); /*Error Alert*/
                    exit();
                }
            }
        }
        }

}

else{
    header("Location: index.php");
    exit();
}