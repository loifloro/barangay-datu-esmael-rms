<?php
session_start();
include "connection.php";

//DELETE BHW ACCOUNT
if(isset($_GET['delete_bhw'])){   
    $user_position = mysqli_real_escape_string($conn, $_GET['position']);
    $user_id = mysqli_real_escape_string($conn, $_GET['id']);

    if($user_position == 'City Health Nurse'){
        $query = "DELETE FROM account_information WHERE account_id='$user_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            // echo "<script>alert('Successfully Deleted!');document.location='../user-profile.php'</script>";
            header("Location: ../user-profile.php?deleted");
            exit(0);
        } else {
            header("Location: ../user-profile.php?error");
        }
    }
    if($user_position == 'Barangay Health Worker'){
        echo "<script>alert('Sorry only admin can delete account');document.location='../user-profile.php'</script>";
            exit(0);
    }

}

if (isset($_GET['archive'])) {
    // DEWORMING ARCHIVING
    if (isset($_GET['deworming'])) {
        $deworming_id = mysqli_real_escape_string($conn, $_GET['id']);
        $deworming_fname = mysqli_real_escape_string($conn, $_GET['patientFirstName']);
        $deworming_lname = mysqli_real_escape_string($conn, $_GET['patientLastName']);


        $query = "UPDATE deworming SET archive_label = 'archived' WHERE deworming_id='$deworming_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            // QUERY TO RECENT UPDATE DEWORMING
            $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
            $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
            $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
            $date = date('Y-m-d');
            $time = date('H:i:s');
            $patient_fname = mysqli_real_escape_string($conn, $_GET['patientFirstName']);
            $patient_lname = mysqli_real_escape_string($conn, $_GET['patientLastName']);

            $query2 = "INSERT INTO recent_activity 
                    (reasons, user_fname, user_lname, user_role, changes_label, 
                    date_edit, time_edit, patient_fname, patient_lname, record_name)
                    VALUES 
                    ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'archived', 
                    '$date', '$time', '$patient_fname', '$patient_lname', 'Deworming')";

            $query_run2 = mysqli_query($conn, $query2);
            if($query_run2){
                header("Location: ../services-consultation.php?archive&service=deworming");
                // header("Location: ../services-consultation.php");
                exit(0);}
            //END OF QUERY
        }
    } 

    // CONSULTATION ARCHIVING
    if (isset($_GET['consultation'])) {
    $consultation_id = mysqli_real_escape_string($conn, $_GET['id']);
    $consultation_fname = mysqli_real_escape_string($conn,  $_GET['patientFirstName']);
    $consultation_lname = mysqli_real_escape_string($conn, $_GET['patientLastName']);

    $query = "UPDATE consultation SET archive_label = 'archived' WHERE consultation_id='$consultation_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE CONSULTATION
        $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
        $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
        $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_GET['patientFirstName']);
        $patient_lname = mysqli_real_escape_string($conn, $_GET['patientLastName']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'archived', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Consultation')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php?archive&service=consultation");
            exit(0);}
        //END OF QUERY
    }
    } 

    // PRENATAL ARCHIVING
    if (isset($_GET['prenatal'])) {
    $prenatal_id = mysqli_real_escape_string($conn, $_POST['prenatal_id']);
    $prenatal_fname = mysqli_real_escape_string($conn, $_POST['prenatal_fname']);
    $prenatal_lname = mysqli_real_escape_string($conn, $_POST['prenatal_lname']);

    $query = "UPDATE prenatal SET archive_label = 'archived' WHERE prenatal_id='$prenatal_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE PRENATAL
        $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
        $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
        $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['prenatal_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['prenatal_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'archived', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Prenatal')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php?archive&service=prenatal");
            exit(0);}
        //END OF QUERY
    }
    } 

    // POSTNATAL ARCHIVING
    if (isset($_GET['postnatal'])) {
    $postnatal_id = mysqli_real_escape_string($conn, $_POST['postnatal_id']);
    $postnatal_fname = mysqli_real_escape_string($conn, $_POST['postnatal_fname']);
    $postnatal_lname = mysqli_real_escape_string($conn, $_POST['postnatal_lname']);

    $query = "UPDATE postnatal SET archive_label = 'archived' WHERE postnatal_id='$postnatal_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE POSTNATAL
        $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
        $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
        $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['postnatal_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['postnatal_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'archived', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Postnatal')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php?archive&service=postnatal");
            exit(0);}
        //END OF QUERY
    }
    } 

    // SEARCH DESTROY ARCHIVING
    if (isset($_GET['search-destroy'])) {
    $search_destroy_id = mysqli_real_escape_string($conn, $_POST['search_destroy_id']);
    $search_destroy_fname = mysqli_real_escape_string($conn, $_POST['search_destroy_fname']);
    $search_destroy_lname = mysqli_real_escape_string($conn, $_POST['search_destroy_lname']);

    $query = "UPDATE search_destroy SET archive_label = 'archived' WHERE search_destroy_id='$search_destroy_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE SEARCH DESTROY
        $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
        $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
        $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['search_destroy_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['search_destroy_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'archived', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Search/Destroy')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php?archive&service=search-destroy");
            exit(0);}
        //END OF QUERY
    }
    } 

    // EARLY CHILDHOOD ARCHIVING
    if (isset($_GET['early-childhood'])) {
    $early_childhood_id = mysqli_real_escape_string($conn, $_POST['early_childhood_id']);
    $early_childhood_fname = mysqli_real_escape_string($conn, $_POST['early_childhood_fname']);
    $early_childhood_lname = mysqli_real_escape_string($conn, $_POST['early_childhood_lname']);

    $query = "UPDATE early_childhood SET archive_label = 'archived' WHERE early_childhood_id='$early_childhood_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE EARLY CHILDHOOD 
        $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
        $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
        $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['early_childhood_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['early_childhood_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'archived', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Childhood Care')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php?archive&service=childhood");
            exit(0);}
        //END OF QUERY
    }
    } 
}

if (isset($_GET['restore'])) {
    // DEWORMING RESTORE
    if (isset($_GET['deworming'])) {
        $deworming_id = mysqli_real_escape_string($conn, $_GET['id']);
        $deworming_fname = mysqli_real_escape_string($conn, $_GET['patientFirstName']);
        $deworming_lname = mysqli_real_escape_string($conn, $_GET['patientLastName']);


        $query = "UPDATE deworming SET archive_label = ' ' WHERE deworming_id='$deworming_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            // QUERY TO RECENT UPDATE DEWORMING
            $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
            $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
            $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
            $date = date('Y-m-d');
            $time = date('H:i:s');
            $patient_fname = mysqli_real_escape_string($conn, $_GET['patientFirstName']);
            $patient_lname = mysqli_real_escape_string($conn, $_GET['patientLastName']);

            $query2 = "INSERT INTO recent_activity 
                    (reasons, user_fname, user_lname, user_role, changes_label, 
                    date_edit, time_edit, patient_fname, patient_lname, record_name)
                    VALUES 
                    ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'restored', 
                    '$date', '$time', '$patient_fname', '$patient_lname', 'Deworming')";

            $query_run2 = mysqli_query($conn, $query2);
            if($query_run2){
                header("Location: ../services-consultation.php?restore&service=deworming");
                // header("Location: ../services-consultation.php");
                exit(0);}
            //END OF QUERY
        }
    } 

    // CONSULTATION RESTORE
    if (isset($_GET['consultation'])) {
    $consultation_id = mysqli_real_escape_string($conn, $_GET['id']);
    $consultation_fname = mysqli_real_escape_string($conn,  $_GET['patientFirstName']);
    $consultation_lname = mysqli_real_escape_string($conn, $_GET['patientLastName']);

    $query = "UPDATE consultation SET archive_label = ' ' WHERE consultation_id='$consultation_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE CONSULTATION
        $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
        $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
        $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_GET['patientFirstName']);
        $patient_lname = mysqli_real_escape_string($conn, $_GET['patientLastName']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Consultation')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php?restore&service=consultation");
            exit(0);}
        //END OF QUERY
    }
    } 

    // PRENATAL RESTORE
    if (isset($_GET['prenatal'])) {
    $prenatal_id = mysqli_real_escape_string($conn, $_POST['prenatal_id']);
    $prenatal_fname = mysqli_real_escape_string($conn, $_POST['prenatal_fname']);
    $prenatal_lname = mysqli_real_escape_string($conn, $_POST['prenatal_lname']);

    $query = "UPDATE prenatal SET archive_label = ' ' WHERE prenatal_id='$prenatal_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE PRENATAL
        $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
        $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
        $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['prenatal_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['prenatal_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Prenatal')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php?restore&service=prenatal");
            exit(0);}
        //END OF QUERY
    }
    } 

    // POSTNATAL RESTORE
    if (isset($_GET['postnatal'])) {
    $postnatal_id = mysqli_real_escape_string($conn, $_POST['postnatal_id']);
    $postnatal_fname = mysqli_real_escape_string($conn, $_POST['postnatal_fname']);
    $postnatal_lname = mysqli_real_escape_string($conn, $_POST['postnatal_lname']);

    $query = "UPDATE postnatal SET archive_label = ' ' WHERE postnatal_id='$postnatal_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE POSTNATAL
        $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
        $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
        $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['postnatal_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['postnatal_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Postnatal')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php?restore&service=postnatal");
            exit(0);}
        //END OF QUERY
    }
    } 

    // SEARCH DESTROY RESTORE
    if (isset($_GET['search-destroy'])) {
    $search_destroy_id = mysqli_real_escape_string($conn, $_POST['search_destroy_id']);
    $search_destroy_fname = mysqli_real_escape_string($conn, $_POST['search_destroy_fname']);
    $search_destroy_lname = mysqli_real_escape_string($conn, $_POST['search_destroy_lname']);

    $query = "UPDATE search_destroy SET archive_label = ' ' WHERE search_destroy_id='$search_destroy_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE SEARCH DESTROY
        $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
        $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
        $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['search_destroy_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['search_destroy_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Search/Destroy')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php?restore&service=search-destroy");
            exit(0);}
        //END OF QUERY
    }
    } 

    // EARLY CHILDHOOD RESTORE
    if (isset($_GET['early-childhood'])) {
    $early_childhood_id = mysqli_real_escape_string($conn, $_POST['early_childhood_id']);
    $early_childhood_fname = mysqli_real_escape_string($conn, $_POST['early_childhood_fname']);
    $early_childhood_lname = mysqli_real_escape_string($conn, $_POST['early_childhood_lname']);

    $query = "UPDATE early_childhood SET archive_label = ' ' WHERE early_childhood_id='$early_childhood_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE EARLY CHILDHOOD 
        $user_fname = mysqli_real_escape_string($conn, $_GET['userFirstName']);
        $user_lname = mysqli_real_escape_string($conn, $_GET['userLastName']);
        $user_role = mysqli_real_escape_string($conn, $_GET['userPosition']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['early_childhood_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['early_childhood_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Childhood Care')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php?restore&service=childhood");
            exit(0);}
        //END OF QUERY
    }
    } 
}

if (isset($_GET['delete'])) {
    //DELETE DEWORMING RECORD
    if(isset($_GET['deworming'])){   
        $deworming_id = mysqli_real_escape_string($conn, $_GET['id']);
    
        $query = "DELETE FROM deworming WHERE deworming_id='$deworming_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            
            header("Location: ../archive.php?deleted");
            exit(0);
        }
    }
    //DELETE CONSULTATION RECORD
    if(isset($_GET['consultation'])){   
        $consultation_id = mysqli_real_escape_string($conn, $_GET['id']);
    
        $query = "DELETE FROM consultation WHERE consultation_id='$consultation_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            header("Location: ../archive.php?deleted");

            exit(0);
        }
    }
    //DELETE PRENATAL RECORD
    if(isset($_GET['prenatal'])){   
        $prenatal_id = mysqli_real_escape_string($conn, $_GET['id']);
    
        $query = "DELETE FROM prenatal WHERE prenatal_id='$prenatal_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            header("Location: ../archive.php?deleted");

            exit(0);
        }
    }
    //delete-iconDELETE POSTNATAL RECORD
    if(isset($_GET['postnatal'])){   
        $postnatal_id = mysqli_real_escape_string($conn, $_GET['id']);
    
        $query = "DELETE FROM postnatal WHERE postnatal_id='$postnatal_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            header("Location: ../archive.php?deleted");

            exit(0);
        }
    }
    //DELETE SEARCH AND DESTROY RECORD
    if(isset($_GET['search_destroy'])){   
        $search_destroy_id = mysqli_real_escape_string($conn, $_GET['id']);
    
        $query = "DELETE FROM search_destroy WHERE search_destroy_id='$search_destroy_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            header("Location: ../archive.php?deleted");

            exit(0);
        }
    }
    //DELETE EARLY_CHILDHOOD RECORD
    if(isset($_GET['early_childhood'])){   
        $early_childhood_id = mysqli_real_escape_string($conn, $_GET['id']);
    
        $query = "DELETE FROM early_childhood WHERE early_childhood_id='$early_childhood_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            header("Location: ../archive.php?deleted");

            exit(0);
        }
    }
}
