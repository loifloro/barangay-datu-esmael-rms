<?php
session_start();
include "connection.php";

// ADD BHW
if(isset($_POST['save_bhw'])){   

    $phone_num = mysqli_real_escape_string($conn, $_POST['bhw-contact']);
    $password = mysqli_real_escape_string($conn, $_POST['bhw-pass']);
    $position = mysqli_real_escape_string($conn, $_POST['bhw-role']);

    $date_added = date('Y-m-d H:i:s');

    $query = "INSERT INTO account_information 
              (phone_num, password, position, date_registered) 
              VALUES 
              ('$phone_num', '$password', '$position', '$date_added')";

    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../user-profile.php");
        exit(0);
    }
    else{
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../user-profile.php");
        exit(0);
    }
}

// ADD DEWORMING RECORD
if(isset($_POST['save_deworming'])){
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
    if($query_run){
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else{
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}

// ADD CONSULTATION RECORD
if(isset($_POST['save_consultation'])){
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
    if($query_run){
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else{
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}


// ADD PRENATAL RECORD
if(isset($_POST['save_prenatal'])){
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
    if($query_run){
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else{
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}


// ADD POSTNATAL RECORD
if(isset($_POST['save_postnatal'])){
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
    if($query_run){
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else{
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}

// ADD SEARCH_DESTROY RECORD
if(isset($_POST['save_search_destroy'])){
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
    if($query_run){
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else{
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}


// ADD EARLY CHILDHOOD RECORD
if(isset($_POST['save_early_childhood'])){
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
    if($query_run){
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-consultation.php");
        exit(0);
    }
    else{
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-consultation.php");
        exit(0);
    }
}


// ADD TARGET CLIENT LIST FOR MATERNAL CARE
if(isset($_POST['add_maternal_list'])){ //no page yet for this query
    $date_registered = mysqli_real_escape_string($conn, $_POST['maternal_care-registration']);
    $serial = mysqli_real_escape_string($conn, $_POST['maternal_care-family-serial']);
    $firstname = mysqli_real_escape_string($conn, $_POST['maternal_care-first-name']);
    $middle_initial = mysqli_real_escape_string($conn, $_POST['maternal_care-middle-inital']);
    $lastname = mysqli_real_escape_string($conn, $_POST['maternal_care-last-name']);

    $complete_address = mysqli_real_escape_string($conn, $_POST['maternal_care-address']);
    $socio_status = mysqli_real_escape_string($conn, $_POST['se-status']);
    $age = mysqli_real_escape_string($conn, $_POST['maternal_care-age']);
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
   
    $query = "INSERT INTO target_maternal 
              (date_registered, serial, firstname, middle_initial, lastname, complete_address, socio_status,
              age, birthday, lmp, gp, edc, tri1_pre_checkup, tri2_pre_checkup, tri3_pre_checkup, td1_tetanus,
              td2_tetanus, td3_tetanus, td4_tetanus, td5_tetanus, fim_status, tri1_tablet_iron, tri1_date_iron,
              tri2_tablet_iron, tri2_date_iron, tri3_tablet_iron, tri3_date_iron, tri4_tablet_iron, tri4_date_iron,
              tri2_tablet_calcium, tri2_date_calcium, tri3_tablet_calcium, tri3_date_calcium, tri4_tablet_calcium, 
              tri4_date_calcium, tri1_tablet_iodine, tri1_date_iodine, weight, deworming_tablet, syphilis_date,
              syphilis_status, hepatitis_date, hepatitis_status, hiv_screen_date, label) 
              VALUES 
              ('$date_registered', '$serial', '$firstname', '$middle_initial', '$lastname', '$complete_address', '$socio_status', 
              '$age', '$birthday', '$lmp', '$gp', '$edc', '$tri1_pre_checkup', '$tri2_pre_checkup', '$tri3_pre_checkup', '$td1_tetanus', 
              '$td2_tetanus', '$td3_tetanus', '$td4_tetanus', '$td5_tetanus', '$fim_status', '$tri1_tablet_iron', '$tri1_date_iron', 
              '$tri2_tablet_iron', '$tri2_date_iron', '$tri3_tablet_iron', '$tri3_date_iron', '$tri4_tablet_iron', '$tri4_date_iron', 
              '$tri2_tablet_calcium', '$tri2_date_calcium', '$tri3_tablet_calcium', '$tri3_date_calcium', '$tri4_tablet_calcium', 
              '$tri4_date_calcium', '$tri1_tablet_iodine', '$tri1_date_iodine', '$weight', '$deworming_tablet', '$syphilis_date', 
              '$syphilis_status', '$hepatitis_date', '$hepatitis_status', '$hiv_screen_date', 'Target Client List for Maternal Care')";

    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-target_list.php"); //will change depending on the name of the services page
        exit(0);
    }
    else{
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-target_list.php"); //will change depending on the name of the services page
        exit(0);
    }
}

// ADD TARGET CLIENT LIST FOR CHILD CARE MALE
if(isset($_POST['add_childcare_male'])){ //no page yet for this query
    $date_registered = mysqli_real_escape_string($conn, $_POST['child_care-male-registration']);
    $birthday = mysqli_real_escape_string($conn, $_POST['child_care-male-birthdate']);
    $serial = mysqli_real_escape_string($conn, $_POST['child_care-male-family-serial']);
    $status = mysqli_real_escape_string($conn, $_POST['se-status']);
    $child_firstname = mysqli_real_escape_string($conn, $_POST['child_care-male-first-name']);

    $child_middle_initial = mysqli_real_escape_string($conn, $_POST['child_care-male-middle-inital']);
    $child_lastname = mysqli_real_escape_string($conn, $_POST['child_care-male-last-name']);
    $sex = mysqli_real_escape_string($conn, $_POST['child_care-male-sex']);

    $mother_firstname = mysqli_real_escape_string($conn, $_POST['child_care-male-mother-first-name']);
    $mother_middle_initial = mysqli_real_escape_string($conn, $_POST['child_care-male-mother-middle-inital']);
    $mother_lastname = mysqli_real_escape_string($conn, $_POST['child_care-male-mother-last-name']);
    $complete_address = mysqli_real_escape_string($conn, $_POST['child_care-male-address']);
    $cpab = mysqli_real_escape_string($conn, $_POST['child_care-male--cpab']);

    $length_newborn = mysqli_real_escape_string($conn, $_POST['child_care-male-newborn-length']);
    $weight_newborn = mysqli_real_escape_string($conn, $_POST['child_care-male-newborn-weight']);
    $status_newborn = mysqli_real_escape_string($conn, $_POST['child_care-male-newborn-weight-status']);
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
    $cic = mysqli_real_escape_string($conn, $_POST['']);

    $remarks = mysqli_real_escape_string($conn, $_POST['child_care-male-12mos-cic']);
    $label = mysqli_real_escape_string($conn, $_POST['child_care-male-remarks']);

    $query = "INSERT INTO target_childcare_male 
              (date_registered, birthday, serial, status, child_firstname, child_middle_initial, child_lastname,
              sex, mother_firstname, mother_middle_initial, mother_lastname, complete_address, cpab, length_newborn,
              weight_newborn, status_newborn, breastfeeding_newborn, bcg_newborn, hepa_newborn, age_month_1_3, 
              length_month_1_3, length_date_month_1_3, weight_month_1_3, weight_date_month_1_3, status_month_1_3,
              iron_1mos_month_1_3, iron_2mos_month_1_3, iron_3mos_month_1_3, dpt_1dos_month_1_3, dpt_2dos_month_1_3,
              dpt_3dos_month_1_3, opv_1dos_month_1_3, opv_2dos_month_1_3, opv_3dos_month_1_3, pcv_1dos_month_1_3, 
              pcv_2dos_month_1_3, pcv_3dos_month_1_3, ipv_1dos_month_1_3, breastfeed1_month_1_3, breastfeed2_month_1_3, 
              breastfeed3_month_1_3, age_month_6_11, length_month_6_11, length_date_month_6_11, weight_month_6_11, 
              weight_date_month_6_11, status_month_6_11, breastfeed_month_6_11, complementary_month_6_11, 
              vitamin_month_6_11, mnp_month_6_11, mmr_month_6_11, age_month_12, length_month_12, length_date_month_12,
              weight_month_12, weight_date_month_12, status_month_12, mmr_month_12, fic_month_12, cic, remarks, label) 
              VALUES 
              ('$date_registered', '$birthday', '$serial', '$status', '$child_firstname', '$child_middle_initial', '$child_lastname',
              '$sex', '$mother_firstname', '$mother_middle_initial', '$mother_lastname', '$complete_address', '$cpab', '$length_newborn', 
              '$weight_newborn', '$status_newborn', '$breastfeeding_newborn', '$bcg_newborn', '$hepa_newborn', '$age_month_1_3', 
              '$length_month_1_3', '$length_date_month_1_3', '$weight_month_1_3', '$weight_date_month_1_3', '$status_month_1_3', 
              '$iron_1mos_month_1_3', '$iron_2mos_month_1_3', '$iron_3mos_month_1_3', '$dpt_1dos_month_1_3', '$dpt_2dos_month_1_3', 
              '$dpt_3dos_month_1_3', '$opv_1dos_month_1_3', '$opv_2dos_month_1_3', '$opv_3dos_month_1_3', '$pcv_1dos_month_1_3', 
              '$pcv_2dos_month_1_3', '$pcv_3dos_month_1_3', '$ipv_1dos_month_1_3', '$breastfeed1_month_1_3', '$breastfeed2_month_1_3', 
              '$breastfeed3_month_1_3', '$age_month_6_11', '$length_month_6_11', '$length_date_month_6_11', '$weight_month_6_11', 
              '$weight_date_month_6_11', '$status_month_6_11', '$breastfeed_month_6_11', '$complementary_month_6_11', 
              '$vitamin_month_6_11', '$mnp_month_6_11', '$mmr_month_6_11', '$age_month_12', '$length_month_12', '$length_date_month_12', 
              '$weight_month_12', '$weight_date_month_12', '$status_month_12', '$mmr_month_12', '$fic_month_12', '$cic', '$remarks', 'Target Client List for Childcare Male')";

    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-target_list.php"); //will change depending on the name of the services page
        exit(0);
    }
    else{
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-target_list.php"); //will change depending on the name of the services page
        exit(0);
    }
}


// ADD TARGET CLIENT LIST FOR CHILD CARE FEMALE
if(isset($_POST['add_childcare_female'])){ //no page yet for this query
    $date_registered = mysqli_real_escape_string($conn, $_POST['child_care-female-registration']);
    $birthday = mysqli_real_escape_string($conn, $_POST['child_care-female-birthdate']);
    $serial = mysqli_real_escape_string($conn, $_POST['child_care-female-family-serial']);
    $status = mysqli_real_escape_string($conn, $_POST['se-status']);

    $child_firstname = mysqli_real_escape_string($conn, $_POST['child_care-female-first-name']);
    $child_middle_initial = mysqli_real_escape_string($conn, $_POST['child_care-female-middle-inital']);
    $child_lastname = mysqli_real_escape_string($conn, $_POST['child_care-female-last-name']);
    $sex = mysqli_real_escape_string($conn, $_POST['child_care-female-sex']);

    $mother_firstname = mysqli_real_escape_string($conn, $_POST['child_care-female-mother-first-name']);
    $mother_middle_initial = mysqli_real_escape_string($conn, $_POST['child_care-female-mother-middle-inital']);
    $mother_lastname = mysqli_real_escape_string($conn, $_POST['child_care-female-mother-last-name']);
    $complete_address = mysqli_real_escape_string($conn, $_POST['child_care-female-address']);
    $cpab = mysqli_real_escape_string($conn, $_POST['child_care-female--cpab']);

    $length_newborn = mysqli_real_escape_string($conn, $_POST['child_care-female-newborn-length']);
    $weight_newborn = mysqli_real_escape_string($conn, $_POST['child_care-female-newborn-weight']);
    $status_newborn = mysqli_real_escape_string($conn, $_POST['child_care-male-newborn-weight-status']);
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
    $cic = mysqli_real_escape_string($conn, $_POST['']);

    $remarks = mysqli_real_escape_string($conn, $_POST['child_care-female-12mos-cic']);
    $label = mysqli_real_escape_string($conn, $_POST['child_care-female-remarks']);

    $query = "INSERT INTO target_childcare_female 
              (date_registered, birthday, serial, status, child_firstname, child_middle_initial, child_lastname,
              sex, mother_firstname, mother_middle_initial, mother_lastname, complete_address, cpab, length_newborn,
              weight_newborn, status_newborn, breastfeeding_newborn, bcg_newborn, hepa_newborn, age_month_1_3, 
              length_month_1_3, length_date_month_1_3, weight_month_1_3, weight_date_month_1_3, status_month_1_3,
              iron_1mos_month_1_3, iron_2mos_month_1_3, iron_3mos_month_1_3, dpt_1dos_month_1_3, dpt_2dos_month_1_3,
              dpt_3dos_month_1_3, opv_1dos_month_1_3, opv_2dos_month_1_3, opv_3dos_month_1_3, pcv_1dos_month_1_3, 
              pcv_2dos_month_1_3, pcv_3dos_month_1_3, ipv_1dos_month_1_3, breastfeed1_month_1_3, breastfeed2_month_1_3, 
              breastfeed3_month_1_3, age_month_6_11, length_month_6_11, length_date_month_6_11, weight_month_6_11, 
              weight_date_month_6_11, status_month_6_11, breastfeed_month_6_11, complementary_month_6_11, 
              vitamin_month_6_11, mnp_month_6_11, mmr_month_6_11, age_month_12, length_month_12, length_date_month_12,
              weight_month_12, weight_date_month_12, status_month_12, mmr_month_12, fic_month_12, cic, remarks, label) 
              VALUES 
              ('$date_registered', '$birthday', '$serial', '$status', '$child_firstname', '$child_middle_initial', '$child_lastname',
              '$sex', '$mother_firstname', '$mother_middle_initial', '$mother_lastname', '$complete_address', '$cpab', '$length_newborn', 
              '$weight_newborn', '$status_newborn', '$breastfeeding_newborn', '$bcg_newborn', '$hepa_newborn', '$age_month_1_3', 
              '$length_month_1_3', '$length_date_month_1_3', '$weight_month_1_3', '$weight_date_month_1_3', '$status_month_1_3', 
              '$iron_1mos_month_1_3', '$iron_2mos_month_1_3', '$iron_3mos_month_1_3', '$dpt_1dos_month_1_3', '$dpt_2dos_month_1_3', 
              '$dpt_3dos_month_1_3', '$opv_1dos_month_1_3', '$opv_2dos_month_1_3', '$opv_3dos_month_1_3', '$pcv_1dos_month_1_3', 
              '$pcv_2dos_month_1_3', '$pcv_3dos_month_1_3', '$ipv_1dos_month_1_3', '$breastfeed1_month_1_3', '$breastfeed2_month_1_3', 
              '$breastfeed3_month_1_3', '$age_month_6_11', '$length_month_6_11', '$length_date_month_6_11', '$weight_month_6_11', 
              '$weight_date_month_6_11', '$status_month_6_11', '$breastfeed_month_6_11', '$complementary_month_6_11', 
              '$vitamin_month_6_11', '$mnp_month_6_11', '$mmr_month_6_11', '$age_month_12', '$length_month_12', '$length_date_month_12', 
              '$weight_month_12', '$weight_date_month_12', '$status_month_12', '$mmr_month_12', '$fic_month_12', '$cic', '$remarks', 'Target Client List for Childcare Male')";

    $query_run = mysqli_query($conn, $query);
    if($query_run){
        // $_SESSION['message'] = "Student Created Successfully";
        header("Location: ../services-target_list.php"); //will change depending on the name of the services page
        exit(0);
    }
    else{
        // $_SESSION['message'] = "Student Not Created";
        header("Location: ../services-target_list.php"); //will change depending on the name of the services page
        exit(0);
    }
}


?>