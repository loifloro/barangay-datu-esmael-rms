<?php 
include 'connection.php';
require '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$label = $_GET['label'];
$id = $_GET['id'];
$date = $_GET['date'];
$date2 = $_GET['date2'];

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
