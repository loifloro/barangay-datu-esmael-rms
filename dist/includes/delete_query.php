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

// DEWORMING ARCHIVING
if (isset($_POST['archive_deworming'])) {
        $deworming_id = mysqli_real_escape_string($conn, $_POST['deworming_id']);
        $deworming_fname = mysqli_real_escape_string($conn, $_POST['deworming_fname']);
        $deworming_lname = mysqli_real_escape_string($conn, $_POST['deworming_lname']);

        $query = "UPDATE deworming SET archive_label = 'archived' WHERE deworming_id='$deworming_id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            // QUERY TO RECENT UPDATE DEWORMING
            $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
            $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
            $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
            $date = date('Y-m-d');
            $time = date('H:i:s');
            $patient_fname = mysqli_real_escape_string($conn, $_POST['deworming_fname']);
            $patient_lname = mysqli_real_escape_string($conn, $_POST['deworming_lname']);

            $query2 = "INSERT INTO recent_activity 
                    (reasons, user_fname, user_lname, user_role, changes_label, 
                    date_edit, time_edit, patient_fname, patient_lname, record_name)
                    VALUES 
                    ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'archived', 
                    '$date', '$time', '$patient_fname', '$patient_lname', 'Deworming')";

            $query_run2 = mysqli_query($conn, $query2);
            if($query_run2){
                header("Location: ../services-consultation.php");
                exit(0);}
            //END OF QUERY
        }
} 

// CONSULTATION ARCHIVING
if (isset($_POST['archive_consultation'])) {
    $consultation_id = mysqli_real_escape_string($conn, $_POST['consultation_id']);
    $consultation_fname = mysqli_real_escape_string($conn, $_POST['consultation_fname']);
    $consultation_lname = mysqli_real_escape_string($conn, $_POST['consultation_lname']);

    $query = "UPDATE consultation SET archive_label = 'archived' WHERE consultation_id='$consultation_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE CONSULTATION
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['consultation_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['consultation_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Archive Record', '$user_fname', '$user_lname', '$user_role', 'archived', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Consultation')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../services-consultation.php");
            exit(0);}
        //END OF QUERY
    }
} 

// PRENATAL ARCHIVING
if (isset($_POST['archive_prenatal'])) {
    $prenatal_id = mysqli_real_escape_string($conn, $_POST['prenatal_id']);
    $prenatal_fname = mysqli_real_escape_string($conn, $_POST['prenatal_fname']);
    $prenatal_lname = mysqli_real_escape_string($conn, $_POST['prenatal_lname']);

    $query = "UPDATE prenatal SET archive_label = 'archived' WHERE prenatal_id='$prenatal_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE PRENATAL
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
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
            header("Location: ../services-consultation.php");
            exit(0);}
        //END OF QUERY
    }
} 

// POSTNATAL ARCHIVING
if (isset($_POST['archive_postnatal'])) {
    $postnatal_id = mysqli_real_escape_string($conn, $_POST['postnatal_id']);
    $postnatal_fname = mysqli_real_escape_string($conn, $_POST['postnatal_fname']);
    $postnatal_lname = mysqli_real_escape_string($conn, $_POST['postnatal_lname']);

    $query = "UPDATE postnatal SET archive_label = 'archived' WHERE postnatal_id='$postnatal_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE POSTNATAL
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
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
            header("Location: ../services-consultation.php");
            exit(0);}
        //END OF QUERY
    }
} 

// SEARCH DESTROY ARCHIVING
if (isset($_POST['archive_search_destroy'])) {
    $search_destroy_id = mysqli_real_escape_string($conn, $_POST['search_destroy_id']);
    $search_destroy_fname = mysqli_real_escape_string($conn, $_POST['search_destroy_fname']);
    $search_destroy_lname = mysqli_real_escape_string($conn, $_POST['search_destroy_lname']);

    $query = "UPDATE search_destroy SET archive_label = 'archived' WHERE search_destroy_id='$search_destroy_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE SEARCH DESTROY
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
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
            header("Location: ../services-consultation.php");
            exit(0);}
        //END OF QUERY
    }
} 

// EARLY CHILDHOOD ARCHIVING
if (isset($_POST['archive_early_childhood'])) {
    $early_childhood_id = mysqli_real_escape_string($conn, $_POST['early_childhood_id']);
    $early_childhood_fname = mysqli_real_escape_string($conn, $_POST['early_childhood_fname']);
    $early_childhood_lname = mysqli_real_escape_string($conn, $_POST['early_childhood_lname']);

    $query = "UPDATE early_childhood SET archive_label = 'archived' WHERE early_childhood_id='$early_childhood_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE EARLY CHILDHOOD 
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
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
            header("Location: ../services-consultation.php");
            exit(0);}
        //END OF QUERY
    }
} 

// RESTORE DEWORMING
if (isset($_POST['restore_deworming'])) {
    $deworming_id = mysqli_real_escape_string($conn, $_POST['deworming_id']);
    $deworming_fname = mysqli_real_escape_string($conn, $_POST['deworming_fname']);
    $deworming_lname = mysqli_real_escape_string($conn, $_POST['deworming_lname']);

    $query = "UPDATE deworming SET archive_label = '' WHERE deworming_id='$deworming_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE DEWORMING 
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['deworming_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['deworming_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Restore Archive', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Deworming')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../archive.php");
            exit(0);}
        //END OF QUERY
    }
} 

// RESTORE CONSULTATION
if (isset($_POST['restore_consultation'])) {
    $consultation_id = mysqli_real_escape_string($conn, $_POST['consultation_id']);
    $consultation_fname = mysqli_real_escape_string($conn, $_POST['consultation_fname']);
    $consultation_lname = mysqli_real_escape_string($conn, $_POST['consultation_lname']);

    $query = "UPDATE consultation SET archive_label = '' WHERE consultation_id='$consultation_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE CONSULTATION 
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['consultation_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['consultation_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Restore Archive', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Consultation')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../archive.php");
            exit(0);}
        //END OF QUERY
    }
} 

// RESTORE PRENATAL
if (isset($_POST['restore_prenatal'])) {
    $prenatal_id = mysqli_real_escape_string($conn, $_POST['prenatal_id']);
    $prenatal_fname = mysqli_real_escape_string($conn, $_POST['prenatal_fname']);
    $prenatal_lname = mysqli_real_escape_string($conn, $_POST['prenatal_lname']);

    $query = "UPDATE prenatal SET archive_label = '' WHERE prenatal_id='$prenatal_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE PRENATAL 
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['prenatal_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['prenatal_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Restore Archive', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Prenatal')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../archive.php");
            exit(0);}
        //END OF QUERY
    }
} 

// RESTORE POSTNATAL
if (isset($_POST['restore_postnatal'])) {
    $postnatal_id = mysqli_real_escape_string($conn, $_POST['postnatal_id']);
    $postnatal_fname = mysqli_real_escape_string($conn, $_POST['postnatal_fname']);
    $postnatal_lname = mysqli_real_escape_string($conn, $_POST['postnatal_lname']);

    $query = "UPDATE postnatal SET archive_label = '' WHERE postnatal_id='$postnatal_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE POSTNATAL 
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['postnatal_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['postnatal_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Restore Archive', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Postnatal')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../archive.php");
            exit(0);}
        //END OF QUERY
    }
} 

// RESTORE SEARCH AND DESTROY
if (isset($_POST['restore_search_destroy'])) {
    $search_destroy_id = mysqli_real_escape_string($conn, $_POST['search_destroy_id']);
    $search_destroy_fname = mysqli_real_escape_string($conn, $_POST['search_destroy_fname']);
    $search_destroy_lname = mysqli_real_escape_string($conn, $_POST['search_destroy_lname']);

    $query = "UPDATE search_destroy SET archive_label = '' WHERE search_destroy_id='$search_destroy_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE SEARCH AND DESTROY
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['search_destroy_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['search_destroy_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Restore Archive', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Search/Destroy')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../archive.php");
            exit(0);}
        //END OF QUERY
    }
} 

// RESTORE EARLY CHILDHOOD
if (isset($_POST['restore_early_childhood'])) {
    $early_childhood_id = mysqli_real_escape_string($conn, $_POST['early_childhood_id']);
    $early_childhood_fname = mysqli_real_escape_string($conn, $_POST['early_childhood_fname']);
    $early_childhood_lname = mysqli_real_escape_string($conn, $_POST['early_childhood_lname']);

    $query = "UPDATE early_childhood SET archive_label = '' WHERE early_childhood_id='$early_childhood_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // QUERY TO RECENT UPDATE SEARCH AND DESTROY
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $patient_fname = mysqli_real_escape_string($conn, $_POST['early_childhood_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['early_childhood_lname']);

        $query2 = "INSERT INTO recent_activity 
                (reasons, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('Restore Archive', '$user_fname', '$user_lname', '$user_role', 'restored', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Childhood Care')";

        $query_run2 = mysqli_query($conn, $query2);
        if($query_run2){
            header("Location: ../archive.php");
            exit(0);}
        //END OF QUERY
    }
} 

//DELETE DEWORMING RECORD
if(isset($_POST['delete_deworming'])){   
    $deworming_id = mysqli_real_escape_string($conn, $_POST['deworming_id']);

    $query = "DELETE FROM deworming WHERE deworming_id='$deworming_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo "<script>alert('Successfully Deleted!');document.location='../archive.php'</script>";
        // header("Location: ../archive.php");
        exit(0);
    }
}
//DELETE CONSULTATION RECORD
if(isset($_POST['delete_consultation'])){   
    $consultation_id = mysqli_real_escape_string($conn, $_POST['consultation_id']);

    $query = "DELETE FROM consultation WHERE consultation_id='$consultation_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo "<script>alert('Successfully Deleted!');document.location='../archive.php'</script>";
        // header("Location: ../archive.php");
        exit(0);
    }
}
//DELETE PRENATAL RECORD
if(isset($_POST['delete_prenatal'])){   
    $prenatal_id = mysqli_real_escape_string($conn, $_POST['prenatal_id']);

    $query = "DELETE FROM prenatal WHERE prenatal_id='$prenatal_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo "<script>alert('Successfully Deleted!');document.location='../archive.php'</script>";
        // header("Location: ../archive.php");
        exit(0);
    }
}
//DELETE POSTNATAL RECORD
if(isset($_POST['delete_postnatal'])){   
    $postnatal_id = mysqli_real_escape_string($conn, $_POST['postnatal_id']);

    $query = "DELETE FROM postnatal WHERE postnatal_id='$postnatal_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo "<script>alert('Successfully Deleted!');document.location='../archive.php'</script>";
        // header("Location: ../archive.php");
        exit(0);
    }
}
//DELETE SEARCH AND DESTROY RECORD
if(isset($_POST['delete_search_destroy'])){   
    $search_destroy_id = mysqli_real_escape_string($conn, $_POST['search_destroy_id']);

    $query = "DELETE FROM search_destroy WHERE search_destroy_id='$search_destroy_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo "<script>alert('Successfully Deleted!');document.location='../archive.php'</script>";
        // header("Location: ../archive.php");
        exit(0);
    }
}
//DELETE EARLY_CHILDHOOD RECORD
if(isset($_POST['delete_early_childhood'])){   
    $early_childhood_id = mysqli_real_escape_string($conn, $_POST['early_childhood_id']);

    $query = "DELETE FROM early_childhood WHERE early_childhood_id='$early_childhood_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo "<script>alert('Successfully Deleted!');document.location='../archive.php'</script>";
        // header("Location: ../archive.php");
        exit(0);
    }
}
?>