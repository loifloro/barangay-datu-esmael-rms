<?php
session_start();
include "../connection.php";

// EDIT PROFILE
if(isset($_POST['edit_bhw']))
{       
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


    $query = "UPDATE account_information SET 
              firstname='$fname', lastname='$lname', middlename='$mname', sex='$sex', phone_num='$phone_num', 
              birthday='$birthday', street_add='$street_add', barangay='$barangay', city='$city', 
              password='$password' WHERE account_id='$account_id'";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        if($password=='' && $cpassword==''){
            echo '<script>alert("Enter Password Please")</script>';
        }
        else if ($password != $cpassword){
            echo '<script>alert("Password Mismatch")</script>';
        }
        else {
            // $_SESSION['message'] = "Student Created Successfully";
            header("Location: ../user-profile.php");
            exit(0);
        }
    }
    else
    {
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../user-profile.php");
        exit(0);
    }
}



// EDIT DEWORMING RECORD
if(isset($_POST['edit_deworming']))
{   
    $deworming_id = mysqli_real_escape_string($conn, $_POST['deworming_id']);
    $deworming_date = mysqli_real_escape_string($conn, $_POST['deworming-date']);
    $lastname = mysqli_real_escape_string($conn, $_POST['deworming-lname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['deworming-fname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['deworming-mname']);
    $age = mysqli_real_escape_string($conn, $_POST['deworming-age']);
    $sex = mysqli_real_escape_string($conn, $_POST['deworming-sex']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['deworming-birthday']);
    $street_add = mysqli_real_escape_string($conn, $_POST['deworming-street']);
    $barangay = mysqli_real_escape_string($conn, $_POST['deworming-barangay']);
    $city = mysqli_real_escape_string($conn, $_POST['deworming-city']);


    $query = "UPDATE deworming SET deworming_date = '$deworming_date', lastname = '$lastname', firstname = '$firstname', 
    middlename = '$middlename', age = '$age', sex = '$sex', birthdate = '$birthdate', street_address = '$street_add', 
    barangay = '$barangay', city = '$city' WHERE deworming_id='$deworming_id'";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else
    {
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}


// EDIT CONSULTATION RECORD
if(isset($_POST['edit_consultation']))
{   
    $consultation_id = mysqli_real_escape_string($conn, $_POST['consultation_id']);
    $consultation_date = mysqli_real_escape_string($conn, $_POST['consultation-date']);
    $lastname = mysqli_real_escape_string($conn, $_POST['consultation-lname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['consultation-fname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['consultation-mname']);
    $age = mysqli_real_escape_string($conn, $_POST['consultation-age']);
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


    $query = "UPDATE consultation SET consultation_date = '$consultation_date', lastname = '$lastname', firstname = '$firstname', middlename = '$middlename', age = '$age', sex = '$sex', birthdate = '$birthdate', street_address = '$street_add', barangay = '$barangay', city = '$city', phone_number = '$phone_num', symptoms = '$symptomps', blood_pressure = '$blood_pressure', weight = '$weight', abnormal = '$abnormal', prescriptions = '$prescriptions' WHERE consultation_id='$consultation_id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else
    {
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}


// EDIT PRENATAL RECORD
if(isset($_POST['edit_prenatal']))
{   
    $prenatal_id = mysqli_real_escape_string($conn, $_POST['prenatal_id']);
    $prenatal_date = mysqli_real_escape_string($conn, $_POST['prenatal-date']);
    $lastname = mysqli_real_escape_string($conn, $_POST['prenatal-lname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['prenatal-fname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['prenatal-mname']);
    $age = mysqli_real_escape_string($conn, $_POST['prenatal-age']);
    $sex = mysqli_real_escape_string($conn, $_POST['prenatal-sex']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['prenatal-birthday']);
    $street_add = mysqli_real_escape_string($conn, $_POST['prenatal-street']);
    $barangay = mysqli_real_escape_string($conn, $_POST['prenatal-barangay']);
    $city = mysqli_real_escape_string($conn, $_POST['prenatal-city']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['prenatal-contact']);

    $blood_pressure = mysqli_real_escape_string($conn, $_POST['prenatal-bp']);
    $weight = mysqli_real_escape_string($conn, $_POST['prenatal-weight']);
    $height = mysqli_real_escape_string($conn, $_POST['prenatal-height']);

    $gravida = mysqli_real_escape_string($conn, $_POST['prenatal-gravida']);
    $preterm = mysqli_real_escape_string($conn, $_POST['prenatal-p']);
    $lmp = mysqli_real_escape_string($conn, $_POST['prenatal-lmp']);
    $edc = mysqli_real_escape_string($conn, $_POST['prenatal-edc']);
    $aog = mysqli_real_escape_string($conn, $_POST['prenatal-aog']);

    $fh = mysqli_real_escape_string($conn, $_POST['prenatal-fh']);
    $fht = mysqli_real_escape_string($conn, $_POST['prenatal-fht']);
    $presentation = mysqli_real_escape_string($conn, $_POST['prenatal-presentation']);

    $abnormal = mysqli_real_escape_string($conn, $_POST['prenatal-a']);
    $prescriptions = mysqli_real_escape_string($conn, $_POST['prenatal-p']);


    $query = "UPDATE prenatal SET prenatal_date = '$prenatal_date', lastname = '$lastname', firstname = '$firstname', 
            middlename = '$middlename', age = '$age', sex = '$sex', birthdate = '$birthdate', street_address = '$street_add', 
            barangay = '$barangay', city = '$city', phone_num = '$phone_num', blood_pressure = '$blood_pressure', 
            weight = '$weight', height = '$height', gravida = '$gravida', preterm = '$preterm', last_menstrual = '$lmp', 
            edc = '$edc', aog = '$aog', fetal_heart = '$fh', fetal_heart_tones = '$fht', presentation = '$presentation', a = '$abnormal', 
            p = '$prescriptions' WHERE prenatal_id='$prenatal_id'";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else
    {
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}


// EDIT POSTNATAL RECORD
if(isset($_POST['edit_postnatal']))
{   
    $postnatal_id = mysqli_real_escape_string($conn, $_POST['postnatal_id']);
    $postnatal_date = mysqli_real_escape_string($conn, $_POST['postnatal-date']);
    $lastname = mysqli_real_escape_string($conn, $_POST['postnatal-lname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['postnatal-fname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['postnatal-mname']);
    $age = mysqli_real_escape_string($conn, $_POST['postnatal-age']);
    $sex = mysqli_real_escape_string($conn, $_POST['postnatal-sex']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['postnatal-birthday']);
    $street_add = mysqli_real_escape_string($conn, $_POST['postnatal-street']);
    $barangay = mysqli_real_escape_string($conn, $_POST['postnatal-barangay']);
    $city = mysqli_real_escape_string($conn, $_POST['postnatal-city']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['postnatal-contact']);

    $blood_pressure = mysqli_real_escape_string($conn, $_POST['postnatal-bp']);
    $weight = mysqli_real_escape_string($conn, $_POST['postnatal-weight']);
    $height = mysqli_real_escape_string($conn, $_POST['postnatal-height']);

    $gravida = mysqli_real_escape_string($conn, $_POST['postnatal-gravida']);
    $preterm = mysqli_real_escape_string($conn, $_POST['postnatal-p']);
    $lmp = mysqli_real_escape_string($conn, $_POST['postnatal-lmp']);
    $edc = mysqli_real_escape_string($conn, $_POST['postnatal-edc']);
    $aog = mysqli_real_escape_string($conn, $_POST['postnatal-aog']);

    $fh = mysqli_real_escape_string($conn, $_POST['postnatal-fh']);
    $fht = mysqli_real_escape_string($conn, $_POST['postnatal-fht']);
    $presentation = mysqli_real_escape_string($conn, $_POST['postnatal-presentation']);

    $abnormal = mysqli_real_escape_string($conn, $_POST['postnatal-a']);
    $prescriptions = mysqli_real_escape_string($conn, $_POST['postnatal-p']);


   
    $query = "UPDATE postnatal SET postnatal_date = '$postnatal_date', lastname = '$lastname', firstname = '$firstname', 
    middlename = '$middlename', age = '$age', sex = '$sex', birthdate = '$birthdate', street_address = '$street_add', 
    barangay = '$barangay', city = '$city', phone_num = '$phone_num', blood_pressure = '$blood_pressure, weight = '$weight', 
    height = '$height', gravida = '$gravida', preterm = '$preterm', last_menstrual = '$lmp', edc = '$edc', aog = '$aog', 
    fetal_heart = $fh', fetal_heart_tones = '$fht', presentation = '$presentation', a = '$abnormal', p = '$prescriptions'
    WHERE postnatal_id='$postnatal_id'";


    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else
    {
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}


// EDIT SEARCH_DESTROY RECORD
if(isset($_POST['edit_search_destroy']))
{   
    $search_destroy_id = mysqli_real_escape_string($conn, $_POST['search_destroy_id']);
    $barangay = mysqli_real_escape_string($conn, $_POST['search_destroy-barangay']);
    $total_household = mysqli_real_escape_string($conn, $_POST['search_destroy-household-visited']);
    $total_positive = mysqli_real_escape_string($conn, $_POST['search_destroy-household-positive']);
    $block = mysqli_real_escape_string($conn, $_POST['search_destroy-purok']);
    $date_visit = mysqli_real_escape_string($conn, $_POST['search_destroy-date']);
    $owner_name = mysqli_real_escape_string($conn, $_POST['search_destroy-owner']);
    $address = mysqli_real_escape_string($conn, $_POST['search_destroy-address']);
    $con_name = mysqli_real_escape_string($conn, $_POST['search_destroy-name-container']);
    $con_num = mysqli_real_escape_string($conn, $_POST['search_destroy-number-container']);
    $remarks = mysqli_real_escape_string($conn, $_POST['search_destroy-remarks']);
   


    $query = "UPDATE search_destroy SET barangay='$barangay', total_household_visit='$total_household', 
    total_positive_larva='$total_positive', block='$block', date_visit='$date_visit', owner_name='$owner_name', 
    address='$address', container_name='$con_name', container_num='$con_num', remarks='$remarks' WHERE search_destroy_id='$search_destroy_id'";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else
    {
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}



// EDIT EARLY CHILDHOOD RECORD
if(isset($_POST['edit_early_childhood']))
{   
    $early_childhood_id = mysqli_real_escape_string($conn, $_POST['early_childhood_id']);
    $clinic = mysqli_real_escape_string($conn, $_POST['early_childhood-clinic']);
    $barangay = mysqli_real_escape_string($conn, $_POST['early_childhood-barangay']);
    $purok = mysqli_real_escape_string($conn, $_POST['early_childhood-purol']);
    $child_name = mysqli_real_escape_string($conn, $_POST['early_childhood-childname']);
    $hospital = mysqli_real_escape_string($conn, $_POST['early_childhood-hospital']);
    $lic = mysqli_real_escape_string($conn, $_POST['early_childhood-lic']);
    $sex = mysqli_real_escape_string($conn, $_POST['early_childhood-sex']);
    $time_delivery = mysqli_real_escape_string($conn, $_POST['early_childhood-time']);
    
    // MOTHER INFORMATION
    $mother_name = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-name']);
    $no_pregnancies = mysqli_real_escape_string($conn, $_POST['early_childhood-pregnancies']);
    $mother_educ = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-education']);
    $mother_age = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-age']);
    $mother_occupation = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-occupation']);
    $mother_birthdate = mysqli_real_escape_string($conn, $_POST['early_childhood-mother-birthdate']);
    $status = mysqli_real_escape_string($conn, $_POST['early_childhood-status']);

    //FATHER INFORMATION
    $father_name = mysqli_real_escape_string($conn, $_POST['early_childhood-father-name']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['early_childhood-father-contact']);
    $father_educ = mysqli_real_escape_string($conn, $_POST['early_childhood-father-education']);
    $father_age = mysqli_real_escape_string($conn, $_POST['early_childhood-father-age']);
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

    $query = "UPDATE early_childhood SET clinic='$clinic', barangay='$barangay', purok='$purok', child_name='$child_name', 
    hospital='$hospital', lic='$lic', sex='$sex', time_delivery='$time_delivery', mother_name='$mother_name', 
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
    vitamin2_date='$vitamin2_date', vitamin3_date='$vitamin3_date', vitamin_catchup_date='$vitamin_catchup_date' 
    WHERE early_childhood_id='$early_childhood_id'";
              
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else
    {
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}



?>