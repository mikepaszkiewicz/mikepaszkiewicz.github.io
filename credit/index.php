<?php
include_once('../tcpdf/tcpdf.php');
include_once('../tcpdf/config/lang/eng.php');
include_once('form-class.php');
include_once('validation.php');

$validate = new validate();
if (isset($_REQUEST) && $_SERVER['REQUEST_METHOD'] == "POST") {

  $validate->checkValidation($validation, $_REQUEST);
}
  
  
    

    $form = new form();
    if ($validate->is_valid == 1) {
      $form->publish = 1;
    } else {
      $form->publish = 0;
      $form->errors = $validate->errors;
    }
    
    $string = get_include_contents('application.php', $form);

function get_include_contents($filename, $form) {
    if (is_file($filename)) {
        ob_start();
        include ($filename);
        return ob_get_clean();
    }
    return false;
}
 
      
  $pdf = new TCPDF (PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                   
  
  if ($form->publish) {



$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('VENDLEASE');
$pdf->SetTitle('CREDIT APPLICATION');
$pdf->SetSubject('CREDIT APPLICATION');
$pdf->SetKeywords('CREDIT, Application');



// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(10, 10, 10);


//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$lg = Array();
$lg['a_meta_charset'] = 'ISO-8859-1';
$lg['a_meta_dir'] = 'ltr';
$lg['a_meta_language'] = 'en';
$lg['w_page'] = 'page';

//set some language-dependent strings
$pdf->setLanguageArray($lg);


// ---------------------------------------------------------

// set font


// add a page
$pdf->AddPage();


$pdf->writeHTML($string, true, false, true, false, '');  
  
// *******************************************************************

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document

    //header('Content-type: application/pdf');
    //header('Content-Disposition: attachment; filename="downloaded.pdf"');

/*
$pdf->SetProtection(
  array('print', 'modify', 'copy', 'annot-forms', 'fill-forms', 'extract', 'assemble', 'print-high'),
  'bmw323ci',
  '0164gjwj',
  '3',
  null
 );
*/    
$pdfcontent = $pdf->Output('', 'I');
$data = chunk_split($pdfcontent);

exit;


$headers = "From: no-reply@vendlease.net";

    // Generate a boundary string
    $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    // Add the headers for a file attachment
    $headers .= "\nMIME-Version: 1.0\n" .
    "Content-Type: multipart/mixed;\n" .
    " boundary=\"{$mime_boundary}\"";

    // Add a multipart boundary above the plain message
    $message = "This is a multi-part message in MIME format.\n\n" .
    "--{$mime_boundary}\n" .
    "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n";
    

    // Base64 encode the file data
    $data = chunk_split(base64_encode($pdfcontent));

    // Add file attachment to the message
    $message .= "--{$mime_boundary}\n" .
    "Content-Type: application/pdf;\n" .
    " name=\"testfile.pdf\"\n" .
    "Content-Disposition: attachment;\n" .
    " filename=\"testfile.pdf\"\n" .
    "Content-Transfer-Encoding: base64\n\n" .
    $data . "\n\n" .
    "--{$mime_boundary}--\n";

    // Send the message
    $ok = @mail('jason@ddsystems.net', 'test file', $message, $headers);
    if ($ok) 
    {
        echo $_SERVER["PHP_SELF"];
    } else 
    {
        //echo 'no';
    }     
    exit;
  }   else {
    echo $string;
  }


?>