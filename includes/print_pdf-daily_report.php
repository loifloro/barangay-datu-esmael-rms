<?php 
include 'connection.php';
require '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$label = $_GET['label'];
$id = $_GET['id'];
$date = $_GET['date'];
$date2 = $_GET['date2'];
$username = $_GET['userName'];

// CONVERT DATE TO MM-DD-YY
$date_pdf = new DateTime($date);
$new_date_pdf = $date_pdf->format("m-d-Y");

$date2_pdf = new DateTime($date2);
$new_date2_pdf = $date2_pdf->format("m-d-Y");

if($date2 == ''){
    $date_show2 = '-';
}else{
    $date_show2 = date('-'. "m-d-Y", strtotime($date2)).'-';
}

$date_show = date("m-d-Y", strtotime($date));


// DAILY REPORTS


if ($label == 'Deworming'){

    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT * FROM deworming WHERE archive_label='' AND deworming_date='$date'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM deworming WHERE archive_label='' AND deworming_date >= '$date' AND deworming_date <= '$date2'");
    }

    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/deworming_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    
    $dompdf->stream($date_show.$date_show2.'deworming.pdf',['Attachment'=>false]);
   
}

if ($label == 'Consultation'){

    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT * FROM consultation WHERE archive_label='' AND consultation_date='$date'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM consultation WHERE archive_label='' AND consultation_date >= '$date' AND consultation_date <= '$date2'");
    }

    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/consultation_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date_show.$date_show2.'consultation.pdf',['Attachment'=>false]);
}

if ($label == 'Postnatal'){
    
    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT * FROM postnatal WHERE archive_label='' AND postnatal_date='$date'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM postnatal WHERE archive_label='' AND postnatal_date >= '$date' AND postnatal_date <= '$date2'");
    }

    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/postnatal_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date_show.$date_show2.'postnatal.pdf',['Attachment'=>false]);
}

if ($label == 'Prenatal'){
    
    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT * FROM prenatal WHERE archive_label='' AND prenatal_date='$date'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM prenatal WHERE archive_label='' AND prenatal_date >= '$date' AND prenatal_date <= '$date2'");
    }

    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/prenatal_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date_show.$date_show2.'prenatal.pdf',['Attachment'=>false]);
}

if ($label == 'Search and Destroy'){
    
    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date='$date'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date >= '$date' AND search_destroy_date <= '$date2'");
    }

    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/search_destroy_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date_show.$date_show2.'search_destroy.pdf',['Attachment'=>false]);
}

if ($label == 'Early Childhood'){
    
    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT * FROM early_childhood WHERE archive_label='' AND early_childhood_date='$date'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM early_childhood WHERE archive_label='' AND early_childhood_date >= '$date' AND early_childhood_date <= '$date2'");
    }

    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/early_childhood_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date_show.$date_show2.'early_childhood.pdf',['Attachment'=>false]);
}

if ($label == 'Other Services'){
    $service_name = $_GET['service_name'];
    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT * FROM other_service WHERE archive_label='' AND service_date='$date' AND service_name='$service_name'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM other_service WHERE archive_label='' AND service_date >= '$date' AND service_date <= '$date2' AND service_name='$service_name'");
    }

    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/other_services_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date_show.$date_show2.'other_services.pdf',['Attachment'=>false]);
}

//MASTERLIST SERVICES


if ($label == 'Target Maternal Care'){

    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT * FROM target_maternal WHERE date_registered='$date'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM target_maternal WHERE date_registered >= '$date' AND date_registered <= '$date2'");
    }

    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/maternal_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date_show.$date_show2.'target_maternal.pdf',['Attachment'=>false]);
}


if ($label == 'Target Childcare Male'){
    
    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT * FROM target_childcare_male WHERE date_registered='$date'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM target_childcare_male WHERE date_registered >= '$date' AND date_registered <= '$date2'");
    }

    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/childcare_male_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date_show.$date_show2.'target_childcare_male.pdf',['Attachment'=>false]);
}


if ($label == 'Target Childcare Female'){
    
    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT * FROM target_childcare_female WHERE date_registered='$date'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM target_childcare_female WHERE date_registered >= '$date' AND date_registered <= '$date2'");
    }
    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/childcare_female_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date_show.$date_show2.'target_childcare_female.pdf',['Attachment'=>false]);
}

if ($label == 'All'){

    if($date == $date && $date2 == ''){
        $sql = mysqli_query($conn,"SELECT deworming_id, deworming_date, firstname, lastname, label FROM deworming WHERE deworming_date='$date'
        UNION ALL
        SELECT consultation_id, consultation_date, firstname, lastname, label FROM consultation WHERE consultation_date='$date'
        UNION ALL
        SELECT prenatal_id, prenatal_date, firstname, lastname, label FROM prenatal WHERE prenatal_date='$date'
        UNION ALL
        SELECT postnatal_id, postnatal_date, firstname, lastname, label FROM postnatal WHERE postnatal_date='$date'
        UNION ALL
        SELECT early_childhood_id, early_childhood_date, child_fname, child_lname, label FROM early_childhood WHERE early_childhood_date='$date'
        UNION ALL
        SELECT search_destroy_id, search_destroy_date, owner_fname, owner_lname, label FROM search_destroy WHERE search_destroy_date='$date'
        UNION ALL
        SELECT id, service_date, firstname, lastname, label FROM other_service WHERE service_date='$date'");
    }
    else{
        $sql = mysqli_query($conn,"SELECT deworming_id, deworming_date, firstname, lastname, label FROM deworming WHERE deworming_date >='$date' AND deworming_date <='$date2'
        UNION ALL
        SELECT consultation_id, consultation_date, firstname, lastname, label FROM consultation WHERE consultation_date >='$date' AND consultation_date <='$date2'
        UNION ALL
        SELECT prenatal_id, prenatal_date, firstname, lastname, label FROM prenatal WHERE prenatal_date >='$date' AND prenatal_date <='$date2'
        UNION ALL
        SELECT postnatal_id, postnatal_date, firstname, lastname, label FROM postnatal WHERE postnatal_date >='$date' AND postnatal_date <='$date2'
        UNION ALL
        SELECT early_childhood_id, early_childhood_date, child_fname, child_lname, label FROM early_childhood WHERE early_childhood_date >='$date' AND early_childhood_date <='$date2'
        UNION ALL
        SELECT search_destroy_id, search_destroy_date, owner_fname, owner_lname, label FROM search_destroy WHERE search_destroy_date >='$date' AND search_destroy_date <='$date2'
        UNION ALL
        SELECT id, service_date, firstname, lastname, label FROM other_service WHERE service_date >='$date' AND service_date <='$date2'");
    }

    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-daily_reports/all_reports-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    
    $dompdf->stream($date_show.$date_show2.'all_services.pdf',['Attachment'=>false]);
   
}