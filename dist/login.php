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
    if (empty($username)) { /*if else statement for validation*/
        header("Location: index.php?error=Contact number is required"); /*Error Alert*/
        exit();
    } 

    else if (empty($password)){
        header("Location: index.php?error=Password is required"); /*Error Alert*/
        exit();
    } 

    else {
        $sql= "SELECT * FROM account_information WHERE phone_num='$username' AND password='$password'"; /*will validate the data in the database based on user input*/
        $result= mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // print_r($row);  /*this code displays the data in database in rows */
            if ($row['phone_num'] == $username && $row['password'] == $password){
                $_SESSION['phone_num'] = $row['phone_num'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['account_id'] = $row['account_id'];
                header("Location: dashboard.php?success"); /*Redirect to this page if successful*/
                exit();
            } 

            else {
                header("Location: index.php?error=Incorrect Username or Password"); /*Error Alert*/
                exit();
            }
        } 

        else {
            header("Location: index.php?error=Incorrect Username or Password"); /*Error Alert*/
            exit();
        }
    }


}

else{
    header("Location: index.php");
    exit();
}