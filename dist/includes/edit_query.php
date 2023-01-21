<?php
session_start();
include "connection.php";

// EDIT PROFILE
if (isset($_POST['edit_bhw'])) {
    $account_id = mysqli_real_escape_string($conn, $_POST['account_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['bhw-fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['bhw-mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['bhw-lname']);

    $sex = mysqli_real_escape_string($conn, $_POST['bhw-sex']);

    $phone_num = mysqli_real_escape_string($conn, $_POST['bhw-contact']);
    $birthday = mysqli_real_escape_string($conn, $_POST['bhw-birthday']);
    $street_add = mysqli_real_escape_string($conn, $_POST['bhw-street-address']);
    $barangay = mysqli_real_escape_string($conn, $_POST['bhw-barangay']);
    $city = mysqli_real_escape_string($conn, $_POST['bhw-city']);
    $password = mysqli_real_escape_string($conn, $_POST['bhw-new-password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['bhw-confirm-new-password']);

    $date_modified = date('Y-m-d H:i:s');
    $email = mysqli_real_escape_string($conn, $_POST['bhw-email']);

    $query = "UPDATE account_information SET 
              firstname='$fname', lastname='$lname', middlename='$mname', sex='$sex', phone_num='$phone_num', 
              birthday='$birthday', street_add='$street_add', barangay='$barangay', city='$city', 
              password='$password', date_modified='$date_modified', user_email='$email', 
              default_email='' WHERE account_id='$account_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        if ($password == '' && $cpassword == '') {
            echo "<script>alert('Enter Password Please!');</script>";
        } else if ($password != $cpassword) {
            echo "<script>alert('Password Mismatch!');</script>";
        } else {
            // QUERY FOR FORGOT PASSWORD
            $security_question = mysqli_real_escape_string($conn, $_POST['bhw-security-question']);
            $security_answer = mysqli_real_escape_string($conn, $_POST['bhw-security-question-answer']);

            $query2 = "UPDATE account_information SET security_question ='$security_question', 
            security_answer='$security_answer' WHERE account_id='$account_id'";

            $query_run2 = mysqli_query($conn, $query2);
            if ($query_run2) {
                header("Location: ../user-profile.php");
                exit(0);
            }
            //END OF QUERY
        }
    } else {

        header("Location: ../user-profile.php");
        exit(0);
    }
}



// EDIT DEWORMING RECORD
if (isset($_POST['edit_deworming'])) {
    
    $deworming_date = mysqli_real_escape_string($conn, $_POST['deworming-date']);
    $deworming_id = mysqli_real_escape_string($conn, $_POST['deworming_id']);
    $lastname = mysqli_real_escape_string($conn, $_POST['deworming-lname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['deworming-fname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['deworming-mname']);

    //convert age based on bday
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['deworming-birthday']);
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age = $diff->format('%y');


    $sex = mysqli_real_escape_string($conn, $_POST['deworming-sex']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['deworming-birthday']);
    $street_add = mysqli_real_escape_string($conn, $_POST['deworming-street']);
    $barangay = mysqli_real_escape_string($conn, $_POST['deworming-barangay']);
    $city = mysqli_real_escape_string($conn, $_POST['deworming-city']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['deworming-phone_num']);

    $email = mysqli_real_escape_string($conn, $_POST['deworming-email']);
    $password_date = mysqli_real_escape_string($conn, $_POST['deworming-birthday']);
    $year_date = date('Y', strtotime($password_date));
    $password =  strtolower($firstname. $lastname . $year_date .'_deworming');

    $query = "UPDATE deworming SET deworming_date='$deworming_date', lastname = '$lastname', firstname = '$firstname', 
    middlename = '$middlename', age = '$age', sex = '$sex', birthdate = '$birthdate', street_address = '$street_add', 
    barangay = '$barangay', city = '$city', phone_num='$phone_num', deworming_email='$email',
    deworming_password='$password' WHERE deworming_id='$deworming_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        // QUERY TO RECENT UPDATE DEWORMING
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

        $reasons = mysqli_real_escape_string($conn, $_POST['edit-reason']);
        $patient_others = mysqli_real_escape_string($conn, $_POST['patient-others']);

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $patient_fname = mysqli_real_escape_string($conn, $_POST['deworming-fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['deworming-lname']);


        $query2 = "INSERT INTO recent_activity 
                            (reasons, other_reason, user_fname, user_lname, user_role, changes_label, 
                            date_edit, time_edit, patient_fname, patient_lname, record_name)
                            VALUES 
                            ('$reasons', '$patient_others', '$user_fname', '$user_lname', '$user_role', 'edited', 
                            '$date','$time', '$patient_fname', '$patient_lname', 'Deworming')";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            header("Location: ../services.php?edited=success&service=deworming");
            exit(0);
        }
        //END OF QUERY

        // $_SESSION['message'] = "Student Created Successfully";
        // header("Location: ../services.php");
        // exit(0);
    } else {
        header("Location: ../services.php?status=error&service=deworming");
        exit(0);
    }
}


// EDIT CONSULTATION RECORD
if (isset($_POST['edit_consultation'])) {
    $consultation_id = mysqli_real_escape_string($conn, $_POST['consultation_id']);
    $consultation_date = mysqli_real_escape_string($conn, $_POST['consultation-date']);
    $lastname = mysqli_real_escape_string($conn, $_POST['consultation-lname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['consultation-fname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['consultation-mname']);
    // $age = mysqli_real_escape_string($conn, $_POST['consultation-age']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['consultation-birthday']);
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age = $diff->format('%y');

    $sex = mysqli_real_escape_string($conn, $_POST['consultation-sex']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['consultation-birthday']);
    $street_add = mysqli_real_escape_string($conn, $_POST['consultation-street']);
    $barangay = mysqli_real_escape_string($conn, $_POST['consultation-barangay']);
    $city = mysqli_real_escape_string($conn, $_POST['consultation-city']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['consultation-contact']);

    $symptomps = mysqli_real_escape_string($conn, $_POST['consultation-symptoms']);
    $blood_pressure = mysqli_real_escape_string($conn, $_POST['consultation-bp']);
    $weight = mysqli_real_escape_string($conn, $_POST['consultation-weight']);

    $abnormal = mysqli_real_escape_string($conn, $_POST['consultation-a']);
    $prescriptions = mysqli_real_escape_string($conn, $_POST['consultation-prescriptions']);

    $email = mysqli_real_escape_string($conn, $_POST['consultation-email']);
    $password_date = mysqli_real_escape_string($conn, $_POST['consultation-birthday']);
    $year_date = date('Y', strtotime($password_date));
    $password =  strtolower($firstname. $lastname . $year_date .'_consultation');

    $query = "UPDATE consultation SET consultation_date = '$consultation_date', lastname = '$lastname', 
    firstname = '$firstname', middlename = '$middlename', age = '$age', sex = '$sex', birthdate = '$birthdate', 
    street_address = '$street_add', barangay = '$barangay', city = '$city', phone_number = '$phone_num', 
    symptoms = '$symptomps', blood_pressure = '$blood_pressure', weight = '$weight', abnormal = '$abnormal', 
    prescriptions = '$prescriptions', consultation_password='$password', consultation_email='$email' 
    WHERE consultation_id='$consultation_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        // QUERY TO RECENT UPDATE CONSULTATION
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

        $reasons = mysqli_real_escape_string($conn, $_POST['edit-reason']);
        $patient_others = mysqli_real_escape_string($conn, $_POST['patient-others']);

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $patient_fname = mysqli_real_escape_string($conn, $_POST['consultation-fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['consultation-lname']);


        $query2 = "INSERT INTO recent_activity 
                (reasons, other_reason, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('$reasons', '$patient_others', '$user_fname', '$user_lname', '$user_role', 'edited', 
                '$date', '$time', '$patient_fname', '$patient_lname', 'Consultation')";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            header("Location: ../services.php?edited=success&service=consultation");
            exit(0);
        }
        //END OF QUERY

        // $_SESSION['message'] = "Student Created Successfully";
        // header("Location: ../services.php");
        // exit(0);
    } else {
        header("Location: ../services.php?status=error&service=consultation");
        exit(0);
    }
}


// EDIT PRENATAL RECORD
if (isset($_POST['edit_prenatal'])) {
    $prenatal_id = mysqli_real_escape_string($conn, $_POST['prenatal_id']);
    $prenatal_date = mysqli_real_escape_string($conn, $_POST['prenatal-date']);
    $lastname = mysqli_real_escape_string($conn, $_POST['prenatal-lname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['prenatal-fname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['prenatal-mname']);
    // $age = mysqli_real_escape_string($conn, $_POST['prenatal-age']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['prenatal-birthday']);
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age = $diff->format('%y');

    // $sex = mysqli_real_escape_string($conn, $_POST['prenatal-sex']); removed
    $birthdate = mysqli_real_escape_string($conn, $_POST['prenatal-birthday']);
    $street_add = mysqli_real_escape_string($conn, $_POST['prenatal-street']);
    $barangay = mysqli_real_escape_string($conn, $_POST['prenatal-barangay']);
    $city = mysqli_real_escape_string($conn, $_POST['prenatal-city']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['prenatal-contact']);

    $symptoms = mysqli_real_escape_string($conn, $_POST['prenatal-symptoms']);
    $blood_pressure = mysqli_real_escape_string($conn, $_POST['prenatal-bp']);
    $weight = mysqli_real_escape_string($conn, $_POST['prenatal-weight']);
    $height = mysqli_real_escape_string($conn, $_POST['prenatal-height']);

    $gravida = mysqli_real_escape_string($conn, $_POST['prenatal-gravida']);
    $preterm = mysqli_real_escape_string($conn, $_POST['prenatal-preterm']);
    $lmp = mysqli_real_escape_string($conn, $_POST['prenatal-lmp']);
    $edc = mysqli_real_escape_string($conn, $_POST['prenatal-edc']);
    $aog = mysqli_real_escape_string($conn, $_POST['prenatal-aog']);

    $fh = mysqli_real_escape_string($conn, $_POST['prenatal-fh']);
    $fht = mysqli_real_escape_string($conn, $_POST['prenatal-fht']);
    $presentation = mysqli_real_escape_string($conn, $_POST['prenatal-presentation']);

    $abnormal = mysqli_real_escape_string($conn, $_POST['prenatal-a']);
    $prescriptions = mysqli_real_escape_string($conn, $_POST['prenatal-p']);

    $email = mysqli_real_escape_string($conn, $_POST['prenatal-email']);
    $password_date = mysqli_real_escape_string($conn, $_POST['prenatal-birthday']);
    $year_date = date('Y', strtotime($password_date));
    $password =  strtolower($firstname. $lastname . $year_date .'_prenatal');

    $query = "UPDATE prenatal SET prenatal_date = '$prenatal_date', lastname = '$lastname', firstname = '$firstname', 
            middlename = '$middlename', age = '$age', birthdate = '$birthdate', street_address = '$street_add', 
            barangay = '$barangay', city = '$city', phone_num = '$phone_num', blood_pressure = '$blood_pressure', 
            weight = '$weight', height = '$height', gravida = '$gravida', preterm = '$preterm', last_menstrual = '$lmp', 
            edc = '$edc', aog = '$aog', fetal_heart = '$fh', fetal_heart_tones = '$fht', presentation = '$presentation', a = '$abnormal', 
            p = '$prescriptions', symptoms='$symptoms', prenatal_email='$email', prenatal_password='$password' WHERE prenatal_id='$prenatal_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {

        // QUERY TO RECENT UPDATE PRENATAL
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

        $reasons = mysqli_real_escape_string($conn, $_POST['edit-reason']);
        $patient_others = mysqli_real_escape_string($conn, $_POST['patient-others']);

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $patient_fname = mysqli_real_escape_string($conn, $_POST['prenatal-fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['prenatal-lname']);


        $query2 = "INSERT INTO recent_activity 
                (reasons, other_reason, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('$reasons', '$patient_others', '$user_fname', '$user_lname', '$user_role', 'edited', 
                '$date','$time', '$patient_fname', '$patient_lname', 'Prenatal')";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            header("Location: ../services.php?edited=success&service=prenatal");
            exit(0);
        }
        //END OF QUERY

        // $_SESSION['message'] = "Student Created Successfully";
        // header("Location: ../services.php");
        // exit(0);
    } else {
        header("Location: ../services.php?status=error&service=prenatal");
        exit(0);
    }
}


// EDIT POSTNATAL RECORD
if (isset($_POST['edit_postnatal'])) {
    $postnatal_id = mysqli_real_escape_string($conn, $_POST['prenatal_id']);
    $postnatal_date = mysqli_real_escape_string($conn, $_POST['prenatal-date']);
    $lastname = mysqli_real_escape_string($conn, $_POST['prenatal-lname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['prenatal-fname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['prenatal-mname']);
    // $age = mysqli_real_escape_string($conn, $_POST['prenatal-age']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['prenatal-birthday']);
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age = $diff->format('%y');
    // $sex = mysqli_real_escape_string($conn, $_POST['prenatal-sex']); removed
    $birthdate = mysqli_real_escape_string($conn, $_POST['prenatal-birthday']);
    $street_add = mysqli_real_escape_string($conn, $_POST['prenatal-street']);
    $barangay = mysqli_real_escape_string($conn, $_POST['prenatal-barangay']);
    $city = mysqli_real_escape_string($conn, $_POST['prenatal-city']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['prenatal-contact']);

    $symptoms = mysqli_real_escape_string($conn, $_POST['prenatal-symptoms']);
    $blood_pressure = mysqli_real_escape_string($conn, $_POST['prenatal-bp']);
    $weight = mysqli_real_escape_string($conn, $_POST['prenatal-weight']);
    $height = mysqli_real_escape_string($conn, $_POST['prenatal-height']);

    $gravida = mysqli_real_escape_string($conn, $_POST['prenatal-gravida']);
    $preterm = mysqli_real_escape_string($conn, $_POST['prenatal-preterm']);
    $lmp = mysqli_real_escape_string($conn, $_POST['prenatal-lmp']);
    $edc = mysqli_real_escape_string($conn, $_POST['prenatal-edc']);
    $aog = mysqli_real_escape_string($conn, $_POST['prenatal-aog']);

    $fh = mysqli_real_escape_string($conn, $_POST['prenatal-fh']);
    $fht = mysqli_real_escape_string($conn, $_POST['prenatal-fht']);
    $presentation = mysqli_real_escape_string($conn, $_POST['prenatal-presentation']);

    $abnormal = mysqli_real_escape_string($conn, $_POST['prenatal-a']);
    $prescriptions = mysqli_real_escape_string($conn, $_POST['prenatal-p']);

    $email = mysqli_real_escape_string($conn, $_POST['prenatal-email']);
    $password_date = mysqli_real_escape_string($conn, $_POST['prenatal-birthday']);
    $year_date = date('Y', strtotime($password_date));
    $password =  strtolower($firstname. $lastname . $year_date .'_postnatal');

    $query = "UPDATE postnatal SET postnatal_date = '$postnatal_date', lastname = '$lastname', firstname = '$firstname', 
            middlename = '$middlename', age = '$age', birthdate = '$birthdate', street_address = '$street_add', 
            barangay = '$barangay', city = '$city', phone_num = '$phone_num', blood_pressure = '$blood_pressure', 
            weight = '$weight', height = '$height', gravida = '$gravida', preterm = '$preterm', last_menstrual = '$lmp', 
            edc = '$edc', aog = '$aog', fetal_heart = '$fh', fetal_heart_tones = '$fht', presentation = '$presentation', a = '$abnormal', 
            p = '$prescriptions', symptoms='$symptoms', postnatal_password='$password', 
            postnatal_email='$email' WHERE postnatal_id='$postnatal_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {

        // QUERY TO RECENT UPDATE PRENATAL
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

        $reasons = mysqli_real_escape_string($conn, $_POST['edit-reason']);
        $patient_others = mysqli_real_escape_string($conn, $_POST['patient-others']);

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $patient_fname = mysqli_real_escape_string($conn, $_POST['prenatal-fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['prenatal-lname']);


        $query2 = "INSERT INTO recent_activity 
                (reasons, other_reason, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('$reasons', '$patient_others', '$user_fname', '$user_lname', '$user_role', 'edited', 
                '$date','$time', '$patient_fname', '$patient_lname', 'Postnatal')";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            header("Location: ../services.php?edited=success&service=postnatal");
            exit(0);
        }
        //END OF QUERY

        // $_SESSION['message'] = "Student Created Successfully";
        // header("Location: ../services.php");
        // exit(0);
    } else {
        header("Location: ../services.php?status=error&service=postnatal");
        exit(0);
    }
}


// EDIT SEARCH_DESTROY RECORD
if (isset($_POST['edit_search_destroy'])) {
    $search_destroy_date = mysqli_real_escape_string($conn, $_POST['search_destroy_date_added']); // added
    $owner_fname = mysqli_real_escape_string($conn, $_POST['search_destroy-owner_fname']); // added
    $owner_lname = mysqli_real_escape_string($conn, $_POST['search_destroy-owner_lname']); // added
    $owner_mname = mysqli_real_escape_string($conn, $_POST['search_destroy-owner_mname']); // added
    $phone_num = mysqli_real_escape_string($conn, $_POST['search_destroy-pnumber']); // added
    $sex = mysqli_real_escape_string($conn, $_POST['search_destroy-sex']); // added
    $birthdate = mysqli_real_escape_string($conn, $_POST['search_destroy-bdate']); // added
    $city = mysqli_real_escape_string($conn, $_POST['search_destroy-city']); // added

    $search_destroy_id = mysqli_real_escape_string($conn, $_POST['search_destroy_id']);
    $barangay = mysqli_real_escape_string($conn, $_POST['search_destroy-barangay']);
    // $total_household = mysqli_real_escape_string($conn, $_POST['search_destroy-household-visited']);
    // $total_positive = mysqli_real_escape_string($conn, $_POST['search_destroy-household-positive']);
    $block = mysqli_real_escape_string($conn, $_POST['search_destroy-purok']);
    $date_visit = mysqli_real_escape_string($conn, $_POST['search_destroy-date_visit']);

    $address = mysqli_real_escape_string($conn, $_POST['search_destroy-editress']);
    $con_name = mysqli_real_escape_string($conn, $_POST['search_destroy-name-container']);
    $con_num = mysqli_real_escape_string($conn, $_POST['search_destroy-number-container']);

    $remark_status = mysqli_real_escape_string($conn, $_POST['search_destroy-remarks']); // changed

    $email = mysqli_real_escape_string($conn, $_POST['search_destroy-email']);
    $password_date = mysqli_real_escape_string($conn, $_POST['search_destroy-bdate']);
    $year_date = date('Y', strtotime($password_date));
    $password =  strtolower($owner_fname. $owner_lname . $year_date .'_searchdestroy');


    $query = "UPDATE search_destroy SET search_destroy_date = '$search_destroy_date',
    owner_fname = '$owner_fname', owner_lname = '$owner_lname', owner_mname = '$owner_mname',
    phone_num = '$phone_num', sex = '$sex', birthdate = '$birthdate', city = '$city',
    barangay='$barangay', block='$block', date_visit='$date_visit', address='$address', 
    container_name='$con_name', container_num='$con_num', remark_status='$remark_status',
    search_destroy_email='$email', search_destroy_password='$password'
    WHERE search_destroy_id='$search_destroy_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        // QUERY TO RECENT UPDATE SEARCH AND DESTROY
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

        $reasons = mysqli_real_escape_string($conn, $_POST['edit-reason']);
        $patient_others = mysqli_real_escape_string($conn, $_POST['patient-others']);

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $patient_fname = mysqli_real_escape_string($conn, $_POST['search_destroy-owner_fname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['search_destroy-owner_lname']);


        $query2 = "INSERT INTO recent_activity 
                (reasons, other_reason, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('$reasons', '$patient_others', '$user_fname','$user_lname', '$user_role', 'edited', 
                '$date','$time', '$patient_fname', '$patient_lname', 'Search/Destroy')";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            header("Location: ../services.php?edited=success&service=search-destroy");
            exit(0);
        }
        //END OF QUERY

        // $_SESSION['message'] = "Student Created Successfully";
        // header("Location: ../services.php");
        // exit(0);
    } else {
        header("Location: ../services.php?status=error&service=search-destroy");
        exit(0);
    }
}



// EDIT EARLY CHILDHOOD RECORD
if (isset($_POST['edit_early_childhood'])) {
    $child_fname = mysqli_real_escape_string($conn, $_POST['early_childhood-childfname']); //added firstname *
    $child_lname = mysqli_real_escape_string($conn, $_POST['early_childhood-childlname']); //added lastname *
    $child_mname = mysqli_real_escape_string($conn, $_POST['early_childhood-childmname']); //added middlename *
    $street_add = mysqli_real_escape_string($conn, $_POST['early_childhood-streetadd']); //added street add *
    $early_childhood_date = mysqli_real_escape_string($conn, $_POST['early_childhood-added_date']); // date added
    $city = mysqli_real_escape_string($conn, $_POST['early_childhood-city']); //added city *

    $early_childhood_id = mysqli_real_escape_string($conn, $_POST['early_childhood_id']);
    $clinic = mysqli_real_escape_string($conn, $_POST['early_childhood-clinic']);
    $barangay = mysqli_real_escape_string($conn, $_POST['early_childhood-barangay']); // *
    $purok = mysqli_real_escape_string($conn, $_POST['early_childhood-purol']);

    $hospital = mysqli_real_escape_string($conn, $_POST['early_childhood-hospital']);
    $lic = mysqli_real_escape_string($conn, $_POST['early_childhood-lic']);
    $sex = mysqli_real_escape_string($conn, $_POST['early_childhood-sex']); // *
    $time_delivery = mysqli_real_escape_string($conn, $_POST['early_childhood-time']);

    // MOTHER INFORMATION
    $mother_name = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-name']);
    $no_pregnancies = mysqli_real_escape_string($conn, $_POST['early_childhood-pregnancies']);
    $mother_educ = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-education']);
    // $mother_age = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-age']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-birthdate']);
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $mother_age = $diff->format('%y');

    $mother_occupation = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-occupation']);
    $mother_birthdate = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-birthdate']);
    $status = mysqli_real_escape_string($conn, $_POST['early_childhood-status']);

    //FATHER INFORMATION
    $father_name = mysqli_real_escape_string($conn, $_POST['early_childhood-father-name']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['early_childhood-father-contact']); // *
    $father_educ = mysqli_real_escape_string($conn, $_POST['early_childhood-father-education']);
    // $father_age = mysqli_real_escape_string($conn, $_POST['early_childhood-father-age']);
    $dateOfBirth2 = mysqli_real_escape_string($conn, $_POST['early_childhood-father-birthdate']);
    $diff2 = date_diff(date_create($dateOfBirth2), date_create($today));
    $father_age = $diff2->format('%y');

    $father_occupation = mysqli_real_escape_string($conn, $_POST['early_childhood-father-occupation']);
    $father_birthdate = mysqli_real_escape_string($conn, $_POST['early_childhood-father-birthdate']);

    //CHILD INFORMATION
    $child_birthdate = mysqli_real_escape_string($conn, $_POST['early_childhood-child-birthdate']);
    $gestational_age = mysqli_real_escape_string($conn, $_POST['early_childhood-gestational']);
    $birth_type = mysqli_real_escape_string($conn, $_POST['early_childhood-birth']);
    $birth_order = mysqli_real_escape_string($conn, $_POST['early_childhood-birth-order']);
    $birth_weight = mysqli_real_escape_string($conn, $_POST['early_childhood-birth-weight']);
    $birth_length = mysqli_real_escape_string($conn, $_POST['early_childhood-birth-length']);
    $place_delivery = mysqli_real_escape_string($conn, $_POST['early_childhood-birth-place']);
    $birth_accomodate = mysqli_real_escape_string($conn, $_POST['early_childhood-child-accomodation']);
    $birth_attendant = mysqli_real_escape_string($conn, $_POST['early_childhood-birth-attendant']);

    //BCG
    $bcg1_date = mysqli_real_escape_string($conn, $_POST['early_childhood-bgc-1']);
    $bcg2_date = mysqli_real_escape_string($conn, $_POST['early_childhood-bgc-2']);
    $bcg3_date = mysqli_real_escape_string($conn, $_POST['early_childhood-bgc-3']);
    $bcg_catchup_date = mysqli_real_escape_string($conn, $_POST['early_childhood-catch-up']);

    //HEPB1
    $hepb1_date = mysqli_real_escape_string($conn, $_POST['early_childhood-hebp-1']);
    $hepb2_date = mysqli_real_escape_string($conn, $_POST['early_childhood-hebp-2']);
    $hepb3_date = mysqli_real_escape_string($conn, $_POST['early_childhood-hebp-3']);
    $hepb_catchup_date = mysqli_real_escape_string($conn, $_POST['early_childhood-hebp-catch-up']);

    //PENTAVELENT
    $penta1_date = mysqli_real_escape_string($conn, $_POST['early_childhood-pentavalent-1']);
    $penta2_date = mysqli_real_escape_string($conn, $_POST['early_childhood-pentavalent-2']);
    $penta3_date = mysqli_real_escape_string($conn, $_POST['early_childhood-pentavalent-3']);
    $penta_catchup_date = mysqli_real_escape_string($conn, $_POST['early_childhood-pentavalent-catch-up']);

    //ORAL POLIO
    $oral_polio1_date = mysqli_real_escape_string($conn, $_POST['early_childhood-opv-1']);
    $oral_polio2_date = mysqli_real_escape_string($conn, $_POST['early_childhood-opv-2']);
    $oral_polio3_date = mysqli_real_escape_string($conn, $_POST['early_childhood-opv-3']);
    $oral_polio_catchup_date = mysqli_real_escape_string($conn, $_POST['early_childhood-opv-catch-up']);

    //INACTIVE POLIO
    $inactive_polio1_date = mysqli_real_escape_string($conn, $_POST['early_childhood-ipv-1']);
    $inactive_polio2_date = mysqli_real_escape_string($conn, $_POST['early_childhood-ipv-2']);
    $inactive_polio3_date = mysqli_real_escape_string($conn, $_POST['early_childhood-ipv-3']);
    $inactive_polio_catchup_date = mysqli_real_escape_string($conn, $_POST['early_childhood-ipv-catch-up']);

    //PNEUMOCO
    $pneumoco1_date = mysqli_real_escape_string($conn, $_POST['early_childhood-pcv-1']);
    $pneumoco2_date = mysqli_real_escape_string($conn, $_POST['early_childhood-pcv-2']);
    $pneumoco3_date = mysqli_real_escape_string($conn, $_POST['early_childhood-pcv-3']);
    $pneumoco_catchup_date = mysqli_real_escape_string($conn, $_POST['early_childhood-pcv-catch-up']);

    //MEASLES
    $measle1_date = mysqli_real_escape_string($conn, $_POST['early_childhood-mcv-1']);
    $measle2_date = mysqli_real_escape_string($conn, $_POST['early_childhood-mcv-2']);
    $measle3_date = mysqli_real_escape_string($conn, $_POST['early_childhood-mcv-3']);
    $measle_catchup_date = mysqli_real_escape_string($conn, $_POST['early_childhood-mcv-catch-up']);

    //VITAMIN A
    $vitamin1_date = mysqli_real_escape_string($conn, $_POST['early_childhood-vitA-1']);
    $vitamin2_date = mysqli_real_escape_string($conn, $_POST['early_childhood-vitA-2']);
    $vitamin3_date = mysqli_real_escape_string($conn, $_POST['early_childhood-vitA-3']);
    $vitamin_catchup_date = mysqli_real_escape_string($conn, $_POST['early_childhood-vitA-catch-up']);

    $password_date = mysqli_real_escape_string($conn, $_POST['early_childhood-child-birthdate']);
    $year_date = date('Y', strtotime($password_date));
    $password =  strtolower($child_fname. $child_lname . $year_date .'_earlychildhood');
    $email = mysqli_real_escape_string($conn, $_POST['early_childhood-email']);

    $query = "UPDATE early_childhood SET early_childhood_date = '$early_childhood_date',
    child_fname='$child_fname', child_lname='$child_lname', child_mname='$child_mname', street_address='$street_add', city='$city',
    clinic='$clinic', barangay='$barangay', purok='$purok', hospital='$hospital', lic='$lic', 
    sex='$sex', time_delivery='$time_delivery', mother_name='$mother_name', 
    no_pregnancies='$no_pregnancies', mother_educ='$mother_educ', mother_age='$mother_age', 
    mother_occupation='$mother_occupation', mother_birthdate='$mother_birthdate', status='$status', 
    father_name='$father_name', phone_num='$phone_num', father_educ='$father_educ', father_age='$father_age', 
    father_occupation='$father_occupation', father_birthdate='$father_birthdate', child_birthdate='$child_birthdate', 
    gestational_age='$gestational_age', birth_type='$birth_type', birth_order='$birth_order', birth_weight='$birth_weight', 
    birth_length='$birth_length', place_delivery='$place_delivery', birth_accomodate='$birth_accomodate', 
    birth_attendant='$birth_attendant', bcg1_date='$bcg1_date', bcg2_date='$bcg2_date', bcg3_date='$bcg3_date', 
    bcg_catchup_date='$bcg_catchup_date', hepb1_date='$hepb1_date', hepb2_date='$hepb2_date', hepb3_date='$hepb3_date', 
    hepb_catchup_date='$hepb_catchup_date', penta1_date='$penta1_date', penta2_date='$penta2_date', penta3_date='$penta3_date', 
    penta_catchup_date='$penta_catchup_date', oral_polio1_date='$oral_polio1_date', oral_polio2_date='$oral_polio2_date', 
    oral_polio3_date='$oral_polio3_date', oral_polio_catchup_date='$oral_polio_catchup_date', 
    inactive_polio1_date='$inactive_polio1_date', inactive_polio2_date='$inactive_polio2_date', 
    inactive_polio3_date='$inactive_polio3_date', inactive_polio_catchup_date='$inactive_polio_catchup_date', 
    pneumoco1_date='$pneumoco1_date', pneumoco2_date='$pneumoco2_date', pneumoco3_date='$pneumoco3_date', 
    pneumoco_catchup_date='$pneumoco_catchup_date', measle1_date='$measle1_date', measle2_date='$measle2_date', 
    measle3_date='$measle3_date', measle_catchup_date='$measle_catchup_date', vitamin1_date='$vitamin1_date', 
    vitamin2_date='$vitamin2_date', vitamin3_date='$vitamin3_date', vitamin_catchup_date='$vitamin_catchup_date',
    early_childhood_email='$email', early_childhood_password='$password'
    WHERE early_childhood_id='$early_childhood_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        // QUERY TO RECENT UPDATE CHILDHOOD CARE
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

        $reasons = mysqli_real_escape_string($conn, $_POST['edit-reason']);
        $patient_others = mysqli_real_escape_string($conn, $_POST['patient-others']);

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $patient_fname = mysqli_real_escape_string($conn, $_POST['early_childhood-childfname']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['early_childhood-childlname']);


        $query2 = "INSERT INTO recent_activity 
                (reasons, other_reason, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('$reasons', '$patient_others', '$user_fname', '$user_lname', '$user_role', 'edited', 
                '$date','$time', '$patient_fname', '$patient_lname', 'Childhood Care')";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            header("Location: ../services.php?edited=success&service=childhood");
            exit(0);
        }
        //END OF QUERY

        // $_SESSION['message'] = "Student Created Successfully";
        // header("Location: ../services.php");
        // exit(0);
    } else {
        header("Location: ../services.php?status=error&service=childhood");
        exit(0);
    }
}

// EDIT TARGET CLIENT LIST FOR MATERNAL CARE
if (isset($_POST['edit_maternal_list'])) //no page yet for this query
{
    $target_maternal_id = mysqli_real_escape_string($conn, $_POST['target_maternal_id']); //added new variable for ID
    $date_registered = mysqli_real_escape_string($conn, $_POST['maternal_care-registration']);
    $serial = mysqli_real_escape_string($conn, $_POST['maternal_care-family-serial']);
    $firstname = mysqli_real_escape_string($conn, $_POST['maternal_care-first-name']);
    $middle_initial = mysqli_real_escape_string($conn, $_POST['maternal_care-middle-inital']);
    $lastname = mysqli_real_escape_string($conn, $_POST['maternal_care-last-name']);

    $complete_address = mysqli_real_escape_string($conn, $_POST['maternal_care-address']);
    $socio_status = mysqli_real_escape_string($conn, $_POST['se-status']);
    // $age = mysqli_real_escape_string($conn, $_POST['maternal_care-age']);
    //convert bdate to age
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['maternal_care-birthday']);
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    $age = $diff->format('%y');
    
    $birthday = mysqli_real_escape_string($conn, $_POST['maternal_care-birthday']);
    $lmp = mysqli_real_escape_string($conn, $_POST['maternal_care-lmp']);

    $gp = mysqli_real_escape_string($conn, $_POST['maternal_care-gp']);
    $edc = mysqli_real_escape_string($conn, $_POST['maternal_care-edc']);
    $tri1_pre_checkup = mysqli_real_escape_string($conn, $_POST['maternal_care-1st-tri']);
    $tri2_pre_checkup = mysqli_real_escape_string($conn, $_POST['maternal_care-2nd-tri']);
    $tri3_pre_checkup = mysqli_real_escape_string($conn, $_POST['maternal_care-3rd-tri']);

    $td1_tetanus = mysqli_real_escape_string($conn, $_POST['maternal_care-td1']);
    $td2_tetanus = mysqli_real_escape_string($conn, $_POST['maternal_care-td2']);
    $td3_tetanus = mysqli_real_escape_string($conn, $_POST['maternal_care-td3']);
    $td4_tetanus = mysqli_real_escape_string($conn, $_POST['maternal_care-td4']);
    $td5_tetanus = mysqli_real_escape_string($conn, $_POST['maternal_care-td5']);
    $fim_status = mysqli_real_escape_string($conn, $_POST['maternal_care-fim']);

    $tri1_tablet_iron = mysqli_real_escape_string($conn, $_POST['maternal_care-iron-1-tablet']);
    $tri1_date_iron = mysqli_real_escape_string($conn, $_POST['maternal_care-iron-1-date']);
    $tri2_tablet_iron = mysqli_real_escape_string($conn, $_POST['maternal_care-iron-2-tablet']);
    $tri2_date_iron = mysqli_real_escape_string($conn, $_POST['maternal_care-iron-2-date']);

    $tri3_tablet_iron = mysqli_real_escape_string($conn, $_POST['maternal_care-iron-3-tablet']);
    $tri3_date_iron = mysqli_real_escape_string($conn, $_POST['maternal_care-iron-3-date']);
    $tri4_tablet_iron = mysqli_real_escape_string($conn, $_POST['maternal_care-iron-4-tablet']);
    $tri4_date_iron = mysqli_real_escape_string($conn, $_POST['maternal_care-iron-4-date']);

    $tri2_tablet_calcium = mysqli_real_escape_string($conn, $_POST['maternal_care-calcium-2-capsule']);
    $tri2_date_calcium = mysqli_real_escape_string($conn, $_POST['maternal_care-calcium-2-date']);
    $tri3_tablet_calcium = mysqli_real_escape_string($conn, $_POST['maternal_care-calcium-3-capsule']);
    $tri3_date_calcium = mysqli_real_escape_string($conn, $_POST['maternal_care-calcium-3-date']);

    $tri4_tablet_calcium = mysqli_real_escape_string($conn, $_POST['maternal_care-calcium-4-capsule']);
    $tri4_date_calcium = mysqli_real_escape_string($conn, $_POST['maternal_care-calcium-4-date']);
    $tri1_tablet_iodine = mysqli_real_escape_string($conn, $_POST['maternal_care-iodine-1-capsule']);
    $tri1_date_iodine = mysqli_real_escape_string($conn, $_POST['maternal_care-iodine-1-date']);

    $weight = mysqli_real_escape_string($conn, $_POST['maternal_care-1st-tri-weight']);
    $deworming_tablet = mysqli_real_escape_string($conn, $_POST['maternal_care-deworming-tablet']);
    $syphilis_date = mysqli_real_escape_string($conn, $_POST['maternal_care-syphilis-screening-date']);
    $syphilis_status = mysqli_real_escape_string($conn, $_POST['maternal_care-syphilis-screening-status']);

    $hepatitis_date = mysqli_real_escape_string($conn, $_POST['maternal_care-hepatitis-screening-date']);
    $hepatitis_status = mysqli_real_escape_string($conn, $_POST['maternal_care-hepatitis-screening-status']);
    $hiv_screen_date = mysqli_real_escape_string($conn, $_POST['maternal_care-hiv-screening-date']);



    $query = "UPDATE target_maternal SET
              date_registered='$date_registered', serial='$serial', firstname='$firstname', 
              middle_initial='$middle_initial', lastname='$lastname', complete_address='$complete_address', 
              socio_status='$socio_status', age='$age', birthday='$birthday', lmp='$lmp', gp='$gp', edc='$edc', 
              tri1_pre_checkup='$tri1_pre_checkup', tri2_pre_checkup='$tri2_pre_checkup', 
              tri3_pre_checkup='$tri3_pre_checkup', td1_tetanus='$td1_tetanus', td2_tetanus='$td2_tetanus', 
              td3_tetanus='$td3_tetanus', td4_tetanus='$td4_tetanus', td5_tetanus='$td5_tetanus', 
              fim_status='$fim_status', tri1_tablet_iron='$tri1_tablet_iron', tri1_date_iron='$tri1_date_iron',
              tri2_tablet_iron='$tri2_tablet_iron', tri2_date_iron='$tri2_date_iron', tri3_tablet_iron='$tri3_tablet_iron', 
              tri3_date_iron='$tri3_date_iron', tri4_tablet_iron='$tri4_tablet_iron', tri4_date_iron='$tri4_date_iron',
              tri2_tablet_calcium='$tri2_tablet_calcium', tri2_date_calcium='$tri2_date_calcium', 
              tri3_tablet_calcium='$tri3_tablet_calcium', tri3_date_calcium='$tri3_date_calcium', 
              tri4_tablet_calcium='$tri4_tablet_calcium', tri4_date_calcium='$tri4_date_calcium', 
              tri1_tablet_iodine='$tri1_tablet_iodine', tri1_date_iodine='$tri1_date_iodine', weight='$weight', 
              deworming_tablet='$deworming_tablet', syphilis_date='$syphilis_date', syphilis_status='$syphilis_status', 
              hepatitis_date='$hepatitis_date', hepatitis_status='$hepatitis_status', hiv_screen_date='$hiv_screen_date'
              WHERE target_maternal_id='$target_maternal_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        // QUERY TO RECENT UPDATE TARGET MATERNAL CARE
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

        $reasons = mysqli_real_escape_string($conn, $_POST['edit-reason']);
        $patient_others = mysqli_real_escape_string($conn, $_POST['patient-others']);

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $patient_fname = mysqli_real_escape_string($conn, $_POST['maternal_care-first-name']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['maternal_care-last-name']);


        $query2 = "INSERT INTO recent_activity 
                (reasons, other_reason, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('$reasons', '$patient_others', '$user_fname', '$user_lname', '$user_role', 'edited', 
                '$date','$time', '$patient_fname', '$patient_lname', 'Target Maternal Care')";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            header("Location: ../masterlist/maternal-care.php?edited=success"); //temporary destination
            exit(0);
        }
        //END OF QUERY
    } else {
        header("Location: ../masterlist/maternal-care.php?edited=error"); //will change depending on the name of the services page
        exit(0);
    }
}


// EDIT TARGET CLIENT LIST FOR CHILD CARE MALE
if (isset($_POST['edit_childcare_male'])) //no page yet for this query
{
    $target_childcare_male_id = mysqli_real_escape_string($conn, $_POST['target_childcare_male_id']); //added new variable for ID
    $date_registered = mysqli_real_escape_string($conn, $_POST['child_care-male-registration']);
    $birthday = mysqli_real_escape_string($conn, $_POST['child_care-male-birthdate']);
    $serial = mysqli_real_escape_string($conn, $_POST['child_care-male-family-serial']);
    $status = mysqli_real_escape_string($conn, $_POST['se-status']);

    $child_firstname = mysqli_real_escape_string($conn, $_POST['child_care-male-first-name']);
    $child_middle_initial = mysqli_real_escape_string($conn, $_POST['child_care-male-middle-inital']);
    $child_lastname = mysqli_real_escape_string($conn, $_POST['child_care-male-last-name']); //error occur
    // $sex = mysqli_real_escape_string($conn, $_POST['child_care-male-sex']);

    $mother_firstname = mysqli_real_escape_string($conn, $_POST['child_care-male-mother-first-name']);
    $mother_middle_initial = mysqli_real_escape_string($conn, $_POST['child_care-male-mother-middle-inital']);
    $mother_lastname = mysqli_real_escape_string($conn, $_POST['child_care-male-mother-last-name']); //error occur

    $complete_address = mysqli_real_escape_string($conn, $_POST['child_care-male-address']);
    $cpab = mysqli_real_escape_string($conn, $_POST['child_care-male--cpab']);

    $length_newborn = mysqli_real_escape_string($conn, $_POST['child_care-male-newborn-length']);
    $weight_newborn = mysqli_real_escape_string($conn, $_POST['child_care-male-newborn-weight']);
    $status_newborn = mysqli_real_escape_string($conn, $_POST['child_care-male-newborn-weight-status']); //change male to female
    $breastfeeding_newborn = mysqli_real_escape_string($conn, $_POST['child_care-male-newborn-initiation']);
    $bcg_newborn = mysqli_real_escape_string($conn, $_POST['child_care-male-newborn-bgc']);
    $hepa_newborn = mysqli_real_escape_string($conn, $_POST['child_care-male-newborn-hepa-b']);

    $age_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-1mos-age']);
    $length_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-1mos-length-cm']);

    $length_date_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-1mos-length-date']);
    $weight_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-1mos-weight-kg']);
    $weight_date_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-1mos-weight-date']);
    $status_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-1mos-status']);

    $iron_1mos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-low-weight-1mo']);
    $iron_2mos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-low-weight-2mos']);
    $iron_3mos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-low-weight-3mos']);
    $dpt_1dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-dpt-1']);

    $dpt_2dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-dpt-2']);
    $dpt_3dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-dpt-3']);
    $opv_1dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-opv-1']);
    $opv_2dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-opv-2']);

    $opv_3dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-opv-3']);
    $pcv_1dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-pcv-1']);
    $pcv_2dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-pcv-2']);
    $pcv_3dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-pcv-3']);

    $ipv_1dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male-ipv-1']);
    $breastfeed1_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male--breastfeeding1']);
    $breastfeed2_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male--breastfeeding2']);
    $breastfeed3_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-male--breastfeeding3']);

    $age_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-6mos-age']);
    $length_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-6mos-length-cm']);
    $length_date_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-6mos-length-date']);
    $weight_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-6mos-weight-kg']);
    $weight_date_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-6mos-weight-date']);

    $status_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-6mos-status']);
    $breastfeed_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-6mos-status-exclusive']);
    $complementary_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-complementary-feeding']);

    $vitamin_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-vit-a']);
    $mnp_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-mnp']);
    $mmr_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-male-mmr']);
    $age_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-male-12mos-age']);

    $length_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-male-12mos-length-cm']);
    $length_date_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-male-12mos-length-date']);
    $weight_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-male-12mos-weight-kg']);
    $weight_date_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-male-12mos-weight-date']);

    $status_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-male-12mos-status']);
    $mmr_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-male-12mos-mmr']);
    $fic_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-male-fic']);
    $cic = mysqli_real_escape_string($conn, $_POST['child_care-male-12mos-cic']);
    $remarks = mysqli_real_escape_string($conn, $_POST['child_care-male-remarks']);

    $query = "UPDATE target_childcare_male SET
              date_registered='$date_registered', birthday='$birthday', serial='$serial', status='$status', 
              child_firstname='$child_firstname', child_middle_initial='$child_middle_initial', 
              child_lastname='$child_lastname', mother_firstname='$mother_firstname', 
              mother_middle_initial='$mother_middle_initial', mother_lastname='$mother_lastname', 
              complete_address='$complete_address', cpab='$cpab', length_newborn='$length_newborn',
              weight_newborn='$weight_newborn', status_newborn='$status_newborn', 
              breastfeeding_newborn='$breastfeeding_newborn', bcg_newborn='$bcg_newborn', 
              hepa_newborn='$hepa_newborn', age_month_1_3='$age_month_1_3', 
              length_month_1_3='$length_month_1_3', length_date_month_1_3='$length_date_month_1_3', 
              weight_month_1_3='$weight_month_1_3', weight_date_month_1_3='$weight_date_month_1_3', 
              status_month_1_3='$status_month_1_3', iron_1mos_month_1_3='$iron_1mos_month_1_3', 
              iron_2mos_month_1_3='$iron_2mos_month_1_3',iron_3mos_month_1_3='$iron_3mos_month_1_3', 
              dpt_1dos_month_1_3='$dpt_1dos_month_1_3', dpt_2dos_month_1_3='$dpt_2dos_month_1_3',
              dpt_3dos_month_1_3='$dpt_3dos_month_1_3', opv_1dos_month_1_3='$opv_1dos_month_1_3', 
              opv_2dos_month_1_3='$opv_2dos_month_1_3', opv_3dos_month_1_3='$opv_3dos_month_1_3', 
              pcv_1dos_month_1_3='$pcv_1dos_month_1_3', pcv_2dos_month_1_3='$pcv_2dos_month_1_3', 
              pcv_3dos_month_1_3='$pcv_3dos_month_1_3', ipv_1dos_month_1_3='$ipv_1dos_month_1_3', 
              breastfeed1_month_1_3='$breastfeed1_month_1_3', breastfeed2_month_1_3='$breastfeed2_month_1_3', 
              breastfeed3_month_1_3='$breastfeed3_month_1_3', age_month_6_11='$age_month_6_11', 
              length_month_6_11='$length_month_6_11', length_date_month_6_11='$length_date_month_6_11', 
              weight_month_6_11='$weight_month_6_11', weight_date_month_6_11='$weight_date_month_6_11', 
              status_month_6_11='$status_month_6_11', breastfeed_month_6_11='$breastfeed_month_6_11', 
              complementary_month_6_11='$complementary_month_6_11', vitamin_month_6_11='$vitamin_month_6_11', 
              mnp_month_6_11='$mnp_month_6_11', mmr_month_6_11='$mmr_month_6_11', age_month_12='$age_month_12', 
              length_month_12='$length_month_12', length_date_month_12='$length_date_month_12',
              weight_month_12='$weight_month_12', weight_date_month_12='$weight_date_month_12', 
              status_month_12='$status_month_12', mmr_month_12='$mmr_month_12', fic_month_12='$fic_month_12', 
              cic='$cic', remarks='$remarks' WHERE target_childcare_male_id='$target_childcare_male_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        // QUERY TO RECENT UPDATE TARGET CHILDCARE MALE
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

        $reasons = mysqli_real_escape_string($conn, $_POST['edit-reason']);
        $patient_others = mysqli_real_escape_string($conn, $_POST['patient-others']);

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $patient_fname = mysqli_real_escape_string($conn, $_POST['child_care-male-first-name']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['child_care-male-last-name']);


        $query2 = "INSERT INTO recent_activity 
                (reasons, other_reason, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('$reasons', '$patient_others', '$user_fname', '$user_lname', '$user_role', 'edited', 
                '$date','$time', '$patient_fname', '$patient_lname', 'Target Childcare Male')";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            header("Location: ../masterlist/childhood-care-male.php?edited=success");
            exit(0);
        }
        //END OF QUERY
    } else {
        header("Location: ../masterlist/childhood-care-male.php?edited=error");
        exit(0);
    }
}



// EDIT TARGET CLIENT LIST FOR CHILD CARE FEMALE
if (isset($_POST['edit_childcare_female'])) //no page yet for this query
{
    $target_childcare_female_id = mysqli_real_escape_string($conn, $_POST['target_childcare_female_id']); //added new variable for ID
    $date_registered = mysqli_real_escape_string($conn, $_POST['child_care-female-registration']);
    $birthday = mysqli_real_escape_string($conn, $_POST['child_care-female-birthdate']);
    $serial = mysqli_real_escape_string($conn, $_POST['child_care-female-family-serial']);
    $status = mysqli_real_escape_string($conn, $_POST['se-status']);

    $child_firstname = mysqli_real_escape_string($conn, $_POST['child_care-female-first-name']);
    $child_middle_initial = mysqli_real_escape_string($conn, $_POST['child_care-female-middle-inital']);
    $child_lastname = mysqli_real_escape_string($conn, $_POST['child_care-female-last-name']); //error occur
    // $sex = mysqli_real_escape_string($conn, $_POST['child_care-female-sex']);

    $mother_firstname = mysqli_real_escape_string($conn, $_POST['child_care-female-mother-first-name']);
    $mother_middle_initial = mysqli_real_escape_string($conn, $_POST['child_care-female-mother-middle-inital']);
    $mother_lastname = mysqli_real_escape_string($conn, $_POST['child_care-female-mother-last-name']); //error occur

    $complete_address = mysqli_real_escape_string($conn, $_POST['child_care-female-address']);
    $cpab = mysqli_real_escape_string($conn, $_POST['child_care-female--cpab']);

    $length_newborn = mysqli_real_escape_string($conn, $_POST['child_care-female-newborn-length']);
    $weight_newborn = mysqli_real_escape_string($conn, $_POST['child_care-female-newborn-weight']);
    $status_newborn = mysqli_real_escape_string($conn, $_POST['child_care-female-newborn-weight-status']); //change male to female
    $breastfeeding_newborn = mysqli_real_escape_string($conn, $_POST['child_care-female-newborn-initiation']);
    $bcg_newborn = mysqli_real_escape_string($conn, $_POST['child_care-female-newborn-bgc']);
    $hepa_newborn = mysqli_real_escape_string($conn, $_POST['child_care-female-newborn-hepa-b']);

    $age_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-1mos-age']);
    $length_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-1mos-length-cm']);

    $length_date_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-1mos-length-date']);
    $weight_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-1mos-weight-kg']);
    $weight_date_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-1mos-weight-date']);
    $status_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-1mos-status']);

    $iron_1mos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-low-weight-1mo']);
    $iron_2mos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-low-weight-2mos']);
    $iron_3mos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-low-weight-3mos']);
    $dpt_1dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-dpt-1']);

    $dpt_2dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-dpt-2']);
    $dpt_3dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-dpt-3']);
    $opv_1dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-opv-1']);
    $opv_2dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-opv-2']);

    $opv_3dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-opv-3']);
    $pcv_1dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-pcv-1']);
    $pcv_2dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-pcv-2']);
    $pcv_3dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-pcv-3']);

    $ipv_1dos_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female-ipv-1']);
    $breastfeed1_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female--breastfeeding1']);
    $breastfeed2_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female--breastfeeding2']);
    $breastfeed3_month_1_3 = mysqli_real_escape_string($conn, $_POST['child_care-female--breastfeeding3']);

    $age_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-6mos-age']);
    $length_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-6mos-length-cm']);
    $length_date_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-6mos-length-date']);
    $weight_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-6mos-weight-kg']);
    $weight_date_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-6mos-weight-date']);

    $status_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-6mos-status']);
    $breastfeed_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-6mos-status-exclusive']);
    $complementary_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-complementary-feeding']);

    $vitamin_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-vit-a']);
    $mnp_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-mnp']);
    $mmr_month_6_11 = mysqli_real_escape_string($conn, $_POST['child_care-female-mmr']);
    $age_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-female-12mos-age']);

    $length_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-female-12mos-length-cm']);
    $length_date_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-female-12mos-length-date']);
    $weight_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-female-12mos-weight-kg']);
    $weight_date_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-female-12mos-weight-date']);

    $status_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-female-12mos-status']);
    $mmr_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-female-12mos-mmr']);
    $fic_month_12 = mysqli_real_escape_string($conn, $_POST['child_care-female-fic']);
    $cic = mysqli_real_escape_string($conn, $_POST['child_care-female-12mos-cic']);
    $remarks = mysqli_real_escape_string($conn, $_POST['child_care-female-remarks']);

    $query = "UPDATE target_childcare_female SET
              date_registered='$date_registered', birthday='$birthday', serial='$serial', status='$status', 
              child_firstname='$child_firstname', child_middle_initial='$child_middle_initial', 
              child_lastname='$child_lastname', mother_firstname='$mother_firstname', 
              mother_middle_initial='$mother_middle_initial', mother_lastname='$mother_lastname', 
              complete_address='$complete_address', cpab='$cpab', length_newborn='$length_newborn',
              weight_newborn='$weight_newborn', status_newborn='$status_newborn', 
              breastfeeding_newborn='$breastfeeding_newborn', bcg_newborn='$bcg_newborn', 
              hepa_newborn='$hepa_newborn', age_month_1_3='$age_month_1_3', 
              length_month_1_3='$length_month_1_3', length_date_month_1_3='$length_date_month_1_3', 
              weight_month_1_3='$weight_month_1_3', weight_date_month_1_3='$weight_date_month_1_3', 
              status_month_1_3='$status_month_1_3', iron_1mos_month_1_3='$iron_1mos_month_1_3', 
              iron_2mos_month_1_3='$iron_2mos_month_1_3',iron_3mos_month_1_3='$iron_3mos_month_1_3', 
              dpt_1dos_month_1_3='$dpt_1dos_month_1_3', dpt_2dos_month_1_3='$dpt_2dos_month_1_3',
              dpt_3dos_month_1_3='$dpt_3dos_month_1_3', opv_1dos_month_1_3='$opv_1dos_month_1_3', 
              opv_2dos_month_1_3='$opv_2dos_month_1_3', opv_3dos_month_1_3='$opv_3dos_month_1_3', 
              pcv_1dos_month_1_3='$pcv_1dos_month_1_3', pcv_2dos_month_1_3='$pcv_2dos_month_1_3', 
              pcv_3dos_month_1_3='$pcv_3dos_month_1_3', ipv_1dos_month_1_3='$ipv_1dos_month_1_3', 
              breastfeed1_month_1_3='$breastfeed1_month_1_3', breastfeed2_month_1_3='$breastfeed2_month_1_3', 
              breastfeed3_month_1_3='$breastfeed3_month_1_3', age_month_6_11='$age_month_6_11', 
              length_month_6_11='$length_month_6_11', length_date_month_6_11='$length_date_month_6_11', 
              weight_month_6_11='$weight_month_6_11', weight_date_month_6_11='$weight_date_month_6_11', 
              status_month_6_11='$status_month_6_11', breastfeed_month_6_11='$breastfeed_month_6_11', 
              complementary_month_6_11='$complementary_month_6_11', vitamin_month_6_11='$vitamin_month_6_11', 
              mnp_month_6_11='$mnp_month_6_11', mmr_month_6_11='$mmr_month_6_11', age_month_12='$age_month_12', 
              length_month_12='$length_month_12', length_date_month_12='$length_date_month_12',
              weight_month_12='$weight_month_12', weight_date_month_12='$weight_date_month_12', 
              status_month_12='$status_month_12', mmr_month_12='$mmr_month_12', fic_month_12='$fic_month_12', 
              cic='$cic', remarks='$remarks' WHERE target_childcare_female_id='$target_childcare_female_id'";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        // QUERY TO RECENT UPDATE TARGET CHILDCARE FEMALE
        $user_fname = mysqli_real_escape_string($conn, $_POST['user_fname']);
        $user_lname = mysqli_real_escape_string($conn, $_POST['user_lname']);
        $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);

        $reasons = mysqli_real_escape_string($conn, $_POST['edit-reason']);
        $patient_others = mysqli_real_escape_string($conn, $_POST['patient-others']);

        $date = date('Y-m-d');
        $time = date('H:i:s');

        $patient_fname = mysqli_real_escape_string($conn, $_POST['child_care-female-first-name']);
        $patient_lname = mysqli_real_escape_string($conn, $_POST['child_care-female-last-name']);


        $query2 = "INSERT INTO recent_activity 
                (reasons, other_reason, user_fname, user_lname, user_role, changes_label, 
                date_edit, time_edit, patient_fname, patient_lname, record_name)
                VALUES 
                ('$reasons', '$patient_others', '$user_fname', '$user_lname', '$user_role', 'edited', 
                '$date','$time', '$patient_fname', '$patient_lname', 'Target Childcare Female')";

        $query_run2 = mysqli_query($conn, $query2);
        if ($query_run2) {
            header("Location: ../masterlist/childhood-care-female.php?edited=success");
            exit(0);
        }
        //END OF QUERY
    } else {
        header("Location: ../masterlist/childhood-care-female.php?edited=error");
        exit(0);
    }
}
