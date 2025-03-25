<!-- <?php
    require APPROOT . '/views/includes/head_metronic.php';
?>

 <?php
    require APPROOT . '/views/includes/begin_app.php';
 ?>
<?php require APPROOT . '/views/resume/layout.php'; ?>  

                
<?php
    require APPROOT . '/views/includes/end_app.php';
?>



<?php
    require APPROOT . '/views/includes/footer_metronic.php';
 ?>  -->



<?php

require('fpdf/fpdf.php');
require('dbconnect.php');

// Assuming you have a ResumePDF class defined in ResumePDF.php (adjust the path accordingly)
require('generate.php');

// Create an instance of the ResumePDF class
$pdf = new ResumePDF();

// Handle the request and dispatch to the appropriate action
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'view':
            // Assuming $_GET['studentID'] contains the student ID
            $pdf->generateResume($con, $_GET['studentID']);
            $pdf->Output();
            break;
        // Add more cases for other actions if needed
        default:
            // Handle default case
            break;
    }
} else {
    // Default action (e.g., display the index page)
    // You may add additional logic for your default action here
    // For example, redirect to a different page or display a message
    echo "Default action is not specified.";
}
