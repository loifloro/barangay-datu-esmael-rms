<?php
session_start();
include "includes/connection.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['roles'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $roles = validate($_POST['roles']);
    if (empty($username)) { /*if else statement for validation*/
        header("Location: index.php?error=Contact number is required"); /*Error Alert*/
        exit();
    } 

    else if (empty($password)){
        header("Location: index.php?error=Password is required"); /*Error Alert*/
        exit();
    } 
    else {
        if($roles == 'Health Worker'){
            $sql= "SELECT * FROM account_information WHERE user_email='$username' AND password='$password'
            ";
            $result= mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['password'] == $password && $row['user_email'] == $username){
                    $_SESSION['user_email'] = $row['user_email'];
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
        }

        if($roles == 'Patient'){
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

                // if($row['phone_num']){

                // }

                if ($row['firstname'] == $password && $row['phone_num'] == $username){
                    $_SESSION['phone_num'] = $row['phone_num'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['deworming_id'] = $row['deworming_id'];
                    $_SESSION['label'] = $row['label'];
                    header("Location: search-result.php?success"); /*Redirect to this page if successful*/
                    exit();
                } 
                else {
                    header("Location: index.php?error=Incorrect Username or Password"); /*Error Alert*/
                    exit();
                }
            }
        }


        // $sql= "SELECT phone_num, password, position FROM account_information WHERE phone_num='$username' AND password='$password'
        // UNION
        // SELECT phone_num, firstname, label FROM deworming WHERE phone_num='$username' AND firstname='$password'
        // "; /*will validate the data in the database based on user input*/
        // $result= mysqli_query($conn, $sql);
        // if (mysqli_num_rows($result) == 1) {
        //     $row = mysqli_fetch_assoc($result);
        //     // print_r($row);  /*this code displays the data in database in rows */
        //     if ($row['password'] == $password && $row['phone_num'] == $username && $row['position']== 'City Health Nurse'){
        //         $_SESSION['phone_num'] = $row['phone_num'];
        //         $_SESSION['firstname'] = $row['firstname'];
        //         $_SESSION['account_id'] = $row['account_id'];
        //         $_SESSION['position'] = $row['position'];
        //         header("Location: dashboard.php?success"); /*Redirect to this page if successful*/
        //         exit();
        //         } 
        //     //test
        //     if ($row['password'] == $password && $row['phone_num'] == $username && $row['position']== 'Barangay Health Worker'){
        //         $_SESSION['phone_num'] = $row['phone_num'];
        //         $_SESSION['firstname'] = $row['firstname'];
        //         $_SESSION['account_id'] = $row['account_id'];
        //         $_SESSION['position'] = $row['position'];
        //         header("Location: dashboard.php?success"); /*Redirect to this page if successful*/
        //         exit();
        //         } 

        //     if ($row['password'] == $password && $row['phone_num'] == $username && $row['position']== 'Deworming'){
        //         $_SESSION['phone_num'] = $row['phone_num'];
        //         $_SESSION['firstname'] = $row['firstname'];
        //         $_SESSION['deworming_id'] = $row['deworming_id'];
        //         $_SESSION['label'] = $row['label'];
        //         header("Location: search-result copy.php?success"); /*Redirect to this page if successful*/
        //         exit();
        //         } 

        //     else {
        //         header("Location: index.php?error=Incorrect Username or Password"); /*Error Alert*/
        //         exit();
        //     }
        // } 

        else {
            header("Location: index.php?error=Incorrect Username or Password"); /*Error Alert*/
            exit();
             }
    }


}

//TEST
// if (isset($_POST['username']) && isset($_POST['password'])) {
//     function validate($data){
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }

//     $username = validate($_POST['username']);
//     $password = validate($_POST['password']);
//     if (empty($username)) { /*if else statement for validation*/
//         header("Location: index.php?error=Contact number is required"); /*Error Alert*/
//         exit();
//     } 

//     else if (empty($password)){
//         header("Location: index.php?error=Password is required"); /*Error Alert*/
//         exit();
//     } 

//     else {
//         $sql= "SELECT * FROM deworming WHERE phone_num='$username' AND firstname='$password'"; /*will validate the data in the database based on user input*/
//         $result= mysqli_query($conn, $sql);
//         if (mysqli_num_rows($result) == 2) {
//             $row = mysqli_fetch_assoc($result);
//             // print_r($row);  /*this code displays the data in database in rows */
//             if ($row['phone_num'] == $username && $row['firstname'] == $password){
//                 $_SESSION['phone_num'] = $row['phone_num'];
//                 $_SESSION['lastname'] = $row['lastname'];
//                 $_SESSION['deworming_id'] = $row['deworming_id'];
//                 header("Location: patient-profile.php?success"); /*Redirect to this page if successful*/
//                 exit();
//                 } 

//             else {
//                 header("Location: index.php?error=Incorrecti Username or Password"); /*Error Alert*/
//                 exit();
//             }
//         } 

//         else {
//             header("Location: index.php?error=Incorrecti Username or Password"); /*Error Alert*/
//             exit();
//         }
//     }


// }
// END TEST

// if (isset($_POST['sign-in'])) {
//     $username = mysqli_real_escape_string($conn, $_POST['username']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);

//     $query = "SELECT * FROM deworming WHERE archive_label='' AND username='$username' AND firstname='$password'";
//     $query_run = mysqli_query($conn, $query);
//     while($row = mysqli_fetch_array($query_run)){
//         header("Location: patient-profile.php");
//     }
// }

else{
    header("Location: index.php");
    exit();
}