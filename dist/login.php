<?php
session_start();
include "includes/connection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
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
    } else if (empty($password)) {
        header("Location: index.php?error=Password is required"); /*Error Alert*/
        exit();
    } else {
        $sql = "SELECT * FROM account_information WHERE user_email='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            header("Location: index.php?error=Incorrect username or password!");
        }

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] == $password && $row['user_email'] == $username) {
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['phone_num'] = $row['phone_num'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['account_id'] = $row['account_id'];
                $_SESSION['position'] = $row['position'];
                header("Location: dashboard.php?success"); /*Redirect to this page if successful*/
                exit();
            }
        } else {
            $sql= "SELECT deworming_email, deworming_password, phone_num, deworming_id, label FROM deworming 
            WHERE deworming_email='$username' AND deworming_password='$password'
            UNION ALL
            SELECT consultation_email, consultation_password, phone_number, consultation_id, label FROM consultation 
            WHERE consultation_email='$username' AND consultation_password='$password'
            UNION ALL
            SELECT prenatal_email, prenatal_password, phone_num, prenatal_id, label FROM prenatal 
            WHERE prenatal_email='$username' AND prenatal_password='$password'
            UNION ALL
            SELECT postnatal_email, postnatal_password, phone_num, postnatal_id, label FROM postnatal 
            WHERE postnatal_email='$username' AND postnatal_password='$password'
            UNION ALL
            SELECT search_destroy_email, search_destroy_password, phone_num, search_destroy_id, label FROM search_destroy 
            WHERE search_destroy_email='$username' AND search_destroy_password='$password'
            UNION ALL
            SELECT early_childhood_email, early_childhood_password, phone_num, early_childhood_id, label FROM early_childhood 
            WHERE early_childhood_email='$username' AND early_childhood_password='$password'
            ";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);

                    if ($row['deworming_password'] == $password && $row['deworming_email'] == $username){
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
} else {
    header("Location: index.php");
    exit();
}
