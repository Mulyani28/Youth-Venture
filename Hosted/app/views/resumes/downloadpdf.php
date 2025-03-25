<?php

require('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Include the viewresume.php file to get the HTML content
ob_start();
include('viewresume.php');
$htmlContent = ob_get_clean();

// Output the HTML content to the PDF
$pdf->WriteHTML($htmlContent);

$pdfContent = $pdf->Output('', 'S');

if ($pdfContent === false) {
    die('PDF generation failed.');
}

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="resume.pdf"');
header('Content-Length: ' . strlen($pdfContent));

echo $pdfContent;

?>
