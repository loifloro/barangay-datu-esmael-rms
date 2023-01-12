<?php 
include '../includes/connection.php';
require '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$label = $_GET['label'];
$id = $_GET['id'];

if ($label == 'Early Childhood'){
    $sql = mysqli_query($conn,"SELECT * FROM early_childhood WHERE early_childhood_id='$id'");
    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-reports/early_childhood-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('print-details.pdf',['Attachment'=>false]);
}

if ($label == 'Consultation'){
    $sql = mysqli_query($conn,"SELECT * FROM consultation WHERE consultation_id='$id'");
    $patient = mysqli_fetch_assoc($sql);

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    ob_start();
    require('./pdf-reports/consultation-pdf.php');
    $html =ob_get_contents();
    ob_get_clean();

    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('print-details.pdf',['Attachment'=>false]);
}



