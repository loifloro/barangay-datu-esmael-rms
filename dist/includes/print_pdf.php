<?php
include '../includes/connection.php';
require '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$label = $_GET['label'];
$id = $_GET['id'];
$date = date('m-d-Y');

if ($label == 'Deworming') {
    $sql = mysqli_query($conn, "SELECT * FROM deworming WHERE deworming_id='$id'");
    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-reports/deworming-pdf.php');
    $html = ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date.'-deworming.pdf',['Attachment'=>false]);
}

if ($label == 'Consultation') {
    $sql = mysqli_query($conn, "SELECT * FROM consultation WHERE consultation_id='$id'");
    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-reports/consultation-pdf.php');
    $html = ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date.'-consultation.pdf',['Attachment'=>false]);
}

if ($label == 'Prenatal') {
    $sql = mysqli_query($conn, "SELECT * FROM prenatal WHERE prenatal_id='$id'");
    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-reports/prenatal-pdf.php');
    $html = ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date.'-prenatal.pdf',['Attachment'=>false]);
}

if ($label == 'Postnatal') {
    $sql = mysqli_query($conn, "SELECT * FROM postnatal WHERE postnatal_id='$id'");
    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-reports/postnatal-pdf.php');
    $html = ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date.'-postnatal.pdf',['Attachment'=>false]);
}

if ($label == 'Search and Destroy') {
    $sql = mysqli_query($conn, "SELECT * FROM search_destroy WHERE search_destroy_id='$id'");
    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-reports/search_destroy-pdf.php');
    $html = ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date.'-search_destroy.pdf',['Attachment'=>false]);
}

if ($label == 'Early Childhood') {
    $sql = mysqli_query($conn, "SELECT * FROM early_childhood WHERE early_childhood_id='$id'");
    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-reports/early_childhood-pdf.php');
    $html = ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date.'-early_childhood.pdf',['Attachment'=>false]);
}

if ($label == 'Other Services') {
    $sql = mysqli_query($conn, "SELECT * FROM other_service WHERE id='$id'");
    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-reports/other_service-pdf.php');
    $html = ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($date.'-other_service.pdf',['Attachment'=>false]);
}
