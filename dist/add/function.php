<?php
session_start();
include "../connection.php";

// ADD BHW
if(isset($_POST['save_bhw']))
{   
    $register_date = mysqli_real_escape_string($conn, $_POST['add-user-date']);
    $fname = mysqli_real_escape_string($conn, $_POST['add-user-fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['add-user-mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['add-user-lname']);
    $sex = mysqli_real_escape_string($conn, $_POST['add-user-sex']);

    $phone_num = mysqli_real_escape_string($conn, $_POST['bhw-contact']);
    $password = mysqli_real_escape_string($conn, $_POST['bhw-pass']);
    $position = mysqli_real_escape_string($conn, $_POST['bhw-role']);


    $query = "INSERT INTO account_information 
              (date_registered, firstname, middlename, lastname, sex, phone_num, password, position) 
              VALUES 
              ('$register_date', '$fname', '$mname', '$lname', '$sex', '$phone_num', '$password', '$position')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../user-profile.php");
        exit(0);
    }
    else
    {
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../user-profile.php");
        exit(0);
    }
}

// ADD DEWORMING RECORD
if(isset($_POST['save_deworming']))
{
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


    $query = "INSERT INTO deworming 
              (deworming_date, lastname, firstname, middlename, age, sex, birthdate, street_address, barangay, city, label) 
              VALUES 
              ('$deworming_date', '$lastname', '$firstname', '$middlename', '$age', '$sex', '$birthdate', '$street_add', '$barangay', '$city', 'Deworming')";

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

// ADD CONSULTATION RECORD
if(isset($_POST['save_consultation']))
{
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


    $query = "INSERT INTO consultation 
              (consultation_date, lastname, firstname, middlename, age, sex, birthdate, street_address, barangay, city, phone_number, symptoms, blood_pressure, weight, abnormal, prescriptions, label) 
              VALUES 
              ('$deworming_date', '$lastname', '$firstname', '$middlename', '$age', '$sex', '$birthdate', '$street_add', '$barangay', '$city', '$phone_num', '$symptomps', '$blood_pressure', '$weight', '$abnormal', '$prescriptions', 'Consultation')";

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


// ADD PRENATAL RECORD
if(isset($_POST['save_prenatal']))
{
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


    $query = "INSERT INTO prenatal 
              (prenatal_date, lastname, firstname, middlename, age, sex, birthdate, street_address, barangay, city, phone_num, blood_pressure, weight, height, gravida, preterm, last_menstrual, edc, aog, fetal_heart, fetal_heart_tones, presentation, a, p, label) 
              VALUES 
              ('$prenatal_date', '$lastname', '$firstname', '$middlename', '$age', '$sex', '$birthdate', '$street_add', '$barangay', '$city', '$phone_num', '$blood_pressure', '$weight', '$height', '$gravida', '$preterm', '$lmp', '$edc', '$aog', '$fh', '$fht', '$presentation', '$abnormal', '$prescriptions', 'Prenatal')";

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


// ADD POSTNATAL RECORD
if(isset($_POST['save_postnatal']))
{
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


    $query = "INSERT INTO postnatal 
              (postnatal_date, lastname, firstname, middlename, age, sex, birthdate, street_address, barangay, city, phone_num, blood_pressure, weight, height, gravida, preterm, last_menstrual, edc, aog, fetal_heart, fetal_heart_tones, presentation, a, p, label) 
              VALUES 
              ('$postnatal_date', '$lastname', '$firstname', '$middlename', '$age', '$sex', '$birthdate', '$street_add', '$barangay', '$city', '$phone_num', '$blood_pressure', '$weight', '$height', '$gravida', '$preterm', '$lmp', '$edc', '$aog', '$fh', '$fht', '$presentation', '$abnormal', '$prescriptions', 'Post-natal')";

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

// ADD SEARCH_DESTROY RECORD
if(isset($_POST['save_search_destroy']))
{
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
   


    $query = "INSERT INTO search_destroy 
              (barangay, total_household_visit, total_positive_larva, block, date_visit, owner_name, address, container_name, container_num, remarks, label) 
              VALUES 
              ('$barangay', '$total_household', '$total_positive', '$block', '$date_visit', '$owner_name', '$address', '$con_name', '$con_num', '$remarks', 'Search and Destroy')";

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


// ADD EARLY CHILDHOOD RECORD
if(isset($_POST['save_early_childhood']))
{
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

    $query = "INSERT INTO early_childhood 
              (clinic, barangay, purok, child_name, hospital, lic, sex, time_delivery, mother_name, no_pregnancies, mother_educ, mother_age, mother_occupation, mother_birthdate, status, father_name, phone_num, father_educ, father_age, father_occupation, father_birthdate, child_birthdate, gestational_age, birth_type, birth_order, birth_weight, birth_length, place_delivery, birth_accomodate, birth_attendant, bcg1_date, bcg2_date, bcg3_date, bcg_catchup_date, hepb1_date, hepb2_date, hepb3_date, hepb_catchup_date, penta1_date, penta2_date, penta3_date, penta_catchup_date, oral_polio1_date, oral_polio2_date, oral_polio3_date, oral_polio_catchup_date, inactive_polio1_date, inactive_polio2_date, inactive_polio3_date, inactive_polio_catchup_date, pneumoco1_date, pneumoco2_date, pneumoco3_date, pneumoco_catchup_date, measle1_date, measle2_date, measle3_date, measle_catchup_date, vitamin1_date, vitamin2_date, vitamin3_date, vitamin_catchup_date, label) 
              VALUES 
              ('$clinic', '$barangay', '$purok', '$child_name', '$hospital', '$lic', '$sex', '$time_delivery', '$mother_name', '$no_pregnancies', '$mother_educ', '$mother_age', '$mother_occupation', '$mother_birthdate', '$status', '$father_name', '$phone_num', '$father_educ', '$father_age', '$father_occupation', '$father_birthdate', '$child_birthdate', '$gestational_age', '$birth_type', '$birth_order', '$birth_weight', '$birth_length', '$place_delivery', '$birth_accomodate', '$birth_attendant', '$bcg1_date', '$bcg2_date', '$bcg3_date', '$bcg_catchup_date', '$hepb1_date', '$hepb2_date', '$hepb3_date', '$hepb_catchup_date', '$penta1_date', '$penta2_date', '$penta3_date', '$penta_catchup_date', '$oral_polio1_date', '$oral_polio2_date', '$oral_polio3_date', '$oral_polio_catchup_date', '$inactive_polio1_date', '$inactive_polio2_date', '$inactive_polio3_date', '$inactive_polio_catchup_date', '$pneumoco1_date', '$pneumoco2_date', '$pneumoco3_date', '$pneumoco_catchup_date', '$measle1_date', '$measle2_date', '$measle3_date', '$measle_catchup_date', '$vitamin1_date', '$vitamin2_date', '$vitamin3_date', '$vitamin_catchup_date', 'Early Childhood')";
              
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
