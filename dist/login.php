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
    $encrypted_pwd = md5($password);
    
    if (empty($username)) { /*if else statement for validation*/
        header("Location: index.php?error=User email is required"); /*Error Alert*/
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=Password is required"); /*Error Alert*/
        exit();
    } else {
        $sql = "SELECT * FROM account_information WHERE user_email='$username' AND password='$encrypted_pwd' OR default_email='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            header("Location: index.php?error=Incorrect username or password!");
        }

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            //QUERY FOR DEFAULT EMAIL
            if ($row['password'] == $encrypted_pwd && $row['default_email'] == $username) {
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['phone_num'] = $row['phone_num'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['account_id'] = $row['account_id'];
                $_SESSION['position'] = $row['position'];

                $id=$row['account_id'];
                header("Location: edit/edit-bhw.php?id=".$id); /*Redirect to this page if successful*/
                exit();
            }

            //QUERY FOR ADMIN AND BHW
            if ($row['password'] == $encrypted_pwd && $row['user_email'] == $username) {
                $_SESSION['user_email'] = $row['user_email'];
                $_SESSION['phone_num'] = $row['phone_num'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['account_id'] = $row['account_id'];
                $_SESSION['position'] = $row['position'];
                header("Location: dashboard.php?success"); /*Redirect to this page if successful*/
                exit();
            }
        } 
        
        else {
            //QUERY FOR PATIENTS
            $sql= "SELECT deworming_email, deworming_password, phone_num, deworming_id, label FROM deworming 
            WHERE deworming_email='$username' AND deworming_password='$encrypted_pwd'
            UNION ALL
            SELECT consultation_email, consultation_password, phone_number, consultation_id, label FROM consultation 
            WHERE consultation_email='$username' AND consultation_password='$encrypted_pwd'
            UNION ALL
            SELECT prenatal_email, prenatal_password, phone_num, prenatal_id, label FROM prenatal 
            WHERE prenatal_email='$username' AND prenatal_password='$encrypted_pwd'
            UNION ALL
            SELECT postnatal_email, postnatal_password, phone_num, postnatal_id, label FROM postnatal 
            WHERE postnatal_email='$username' AND postnatal_password='$encrypted_pwd'
            UNION ALL
            SELECT search_destroy_email, search_destroy_password, phone_num, search_destroy_id, label FROM search_destroy 
            WHERE search_destroy_email='$username' AND search_destroy_password='$encrypted_pwd'
            UNION ALL
            SELECT early_childhood_email, early_childhood_password, phone_num, early_childhood_id, label FROM early_childhood 
            WHERE early_childhood_email='$username' AND early_childhood_password='$encrypted_pwd'
            ";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);

                    if ($row['deworming_password'] == $encrypted_pwd && $row['deworming_email'] == $username){
                        $_SESSION['phone_num'] = $row['phone_num'];
                        $_SESSION['user_email'] = $row['deworming_email'];
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['deworming_id'] = $row['deworming_id'];
                        $_SESSION['account_id'] = $row['deworming_id'];
                        $_SESSION['label'] = $row['label'];
                        
                        $filtervalues = $row['deworming_email'];
                        $filtervalues2 = $row['password'];
                        $query = "SELECT deworming_id, firstname, lastname, deworming_date, sex, phone_num, label, deworming_email, deworming_password 
                        FROM deworming WHERE CONCAT(firstname,lastname,deworming_date,sex,phone_num,label, deworming_email, deworming_password) 
                        LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,deworming_date,sex,phone_num, label, deworming_email, deworming_password) LIKE '%$filtervalues2%'
                        UNION ALL
                        SELECT consultation_id, firstname, lastname, consultation_date, sex, phone_number, label, consultation_email, consultation_password  
                        FROM consultation WHERE CONCAT(firstname,lastname,consultation_date,sex,phone_number, label, consultation_email, consultation_password) 
                        LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,consultation_date,sex,phone_number, label, consultation_email, consultation_password) LIKE '%$filtervalues2%'
                        UNION ALL
                        SELECT prenatal_id, firstname, lastname, prenatal_date, sex, phone_num, label, prenatal_email, prenatal_password  
                        FROM prenatal WHERE CONCAT(firstname,lastname,prenatal_date,sex,phone_num, label, prenatal_email, prenatal_password) 
                        LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,prenatal_date,sex,phone_num, label, prenatal_email, prenatal_password) LIKE '%$filtervalues2%'
                        UNION ALL
                        SELECT postnatal_id, firstname, lastname, postnatal_date, sex, phone_num, label, postnatal_email, postnatal_password  
                        FROM postnatal WHERE CONCAT(firstname,lastname,postnatal_date,sex,phone_num, label, postnatal_email, postnatal_password) 
                        LIKE '%$filtervalues%' AND CONCAT(firstname,lastname,postnatal_date,sex,phone_num, label, postnatal_email, postnatal_password) LIKE '%$filtervalues2%'
                        UNION ALL
                        SELECT search_destroy_id, owner_fname, owner_lname, search_destroy_date, sex, phone_num, label, search_destroy_email, search_destroy_password  
                        FROM search_destroy WHERE CONCAT(owner_fname,owner_lname,search_destroy_date,sex,phone_num, label, search_destroy_email, search_destroy_password) 
                        LIKE '%$filtervalues%' AND CONCAT(owner_fname,owner_lname,search_destroy_date,sex,phone_num, label, search_destroy_email, search_destroy_password) LIKE '%$filtervalues2%'
                        UNION ALL
                        SELECT early_childhood_id, child_fname, child_lname, early_childhood_date, sex, phone_num, label, early_childhood_email, early_childhood_password 
                        FROM early_childhood WHERE CONCAT(child_fname,child_lname,early_childhood_date,sex,phone_num, label, early_childhood_email, early_childhood_password) 
                        LIKE '%$filtervalues%' AND CONCAT(child_fname,child_lname,early_childhood_date,sex,phone_num, label, early_childhood_email, early_childhood_password) LIKE '%$filtervalues2%'
                        ";

                    $query_run = mysqli_query($conn, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $search) {
                            $id=$search['deworming_id'];
                            $label=$search['label'];
                            $fname=$search['firstname'];
                            $lname=$search['lastname'];
                        }
                    }

                        header("Location: patient-profile.php?id=$id&label=$label&fname=$fname&lname=$lname&success"); /*Redirect to this page if successful*/
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
