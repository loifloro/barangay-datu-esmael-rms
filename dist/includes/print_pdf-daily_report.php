<?php 
include 'connection.php';
require '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$label = $_GET['label'];
$id = $_GET['id'];
$date = $_GET['date'];

// DAILY REPORTS


if ($label == 'Deworming'){
    $sql = mysqli_query($conn,"SELECT * FROM deworming WHERE archive_label='' AND deworming_date='$date'");
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
    $dompdf->stream('print-details.pdf',['Attachment'=>false]);
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
    $dompdf->stream('print-details.pdf',['Attachment'=>false]);
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
    $dompdf->stream('print-details.pdf',['Attachment'=>false]);
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
    $dompdf->stream('print-details.pdf',['Attachment'=>false]);
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
    $dompdf->stream('print-details.pdf',['Attachment'=>false]);
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
    $dompdf->stream('print-details.pdf',['Attachment'=>false]);
}
