<?php 
include 'connection.php';
require '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$label = $_GET['label'];
$id = $_GET['id'];
$date = $_GET['date'];
$date2 = $_GET['date2'];
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
    $dompdf->stream($date_show.'-deworming.pdf',['Attachment'=>false]);
}

if ($label == 'Consultation'){
    $sql = mysqli_query($conn,"SELECT * FROM consultation WHERE archive_label='' AND consultation_date='$date'");
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
    $dompdf->stream($date_show.'-consultation.pdf',['Attachment'=>false]);
}

if ($label == 'Postnatal'){
    $sql = mysqli_query($conn,"SELECT * FROM postnatal WHERE archive_label='' AND postnatal_date='$date'");
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
    $dompdf->stream($date_show.'-postnatal.pdf',['Attachment'=>false]);
}

if ($label == 'Prenatal'){
    $sql = mysqli_query($conn,"SELECT * FROM prenatal WHERE archive_label='' AND prenatal_date='$date'");
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
    $dompdf->stream($date_show.'-prenatal.pdf',['Attachment'=>false]);
}

if ($label == 'Search and Destroy'){
    $sql = mysqli_query($conn,"SELECT * FROM search_destroy WHERE archive_label='' AND search_destroy_date='$date'");
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
    $dompdf->stream($date_show.'-search_destroy.pdf',['Attachment'=>false]);
}

if ($label == 'Early Childhood'){
    $sql = mysqli_query($conn,"SELECT * FROM early_childhood WHERE archive_label='' AND early_childhood_date='$date'");
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
    $dompdf->stream($date_show.'-early_childhood.pdf',['Attachment'=>false]);
}

//MASTERLIST SERVICES


if ($label == 'Target Maternal Care'){
    $sql = mysqli_query($conn,"SELECT * FROM target_maternal WHERE date_registered='$date'");
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
    $dompdf->stream($date_show.'-target_maternal.pdf',['Attachment'=>false]);
}


if ($label == 'Target Childcare Male'){
    $sql = mysqli_query($conn,"SELECT * FROM target_childcare_male WHERE date_registered='$date'");
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
    $dompdf->stream($date_show.'-target_childcare_male.pdf',['Attachment'=>false]);
}


if ($label == 'Target Childcare Female'){
    $sql = mysqli_query($conn,"SELECT * FROM target_childcare_female WHERE date_registered='$date'");
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
    $dompdf->stream($date_show.'-target_childcare_female.pdf',['Attachment'=>false]);
}
