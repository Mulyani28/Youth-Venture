<?php

// require_once APPROOT . '\YouthVenture\mvcprojectnew\fpdf\fpdf.php'; // Add the path to the FPDF library
// require('fpdf/fpdf.php')

class Resumes extends Controller{
    private $modelResume;


    public function __construct() {
        $this->modelResume = $this->model('Resume') ;
    }

    public function generatePdf() {
        // Create instance of FPDF
        $pdf = new FPDF();

        // Add a page
        $pdf->AddPage();

        // Output the PDF to the browser or save it to a file
        $pdf->Output();
        
    }

    public function viewResume() {
        $users_id = $_SESSION['users_id'];
        $userData = $this->modelResume->getUserByID($users_id);
    
        if (!$userData) {
            // Handle the case when the resume is not found
            die("Resume not found for Student ID: $users_id");
        }

        $skillsData = $this->modelResume->getSkills($users_id);
        $actData = $this->modelResume->getActivities($users_id);
        
        // Manipulate data if needed
        $data = [
            'firstname' => $userData->firstname,
            'institution' => $userData->institution,
            'gender' => $userData->gender,
            'birthday' => $userData->birthday,
            'email' => $userData->email,
            'ic' => $userData->ic,
            'street' => $userData->street,
            'city' => $userData->city,
            'state' => $userData->state,
            'postal_code' => $userData->postal_code,
            'country' => $userData->country,
            'phone' => $userData->phone,
            'major' => $userData->major,
            // 'st_image' => $userData->st_image,
            'st_image' => URLROOT . '\YouthVenture\mvcprojectnew\public\pages' . $userData->st_image,
            'language' => $skillsData->language,
            'technical' => $skillsData->technical,
            'soft' => $skillsData->soft,
            
            
            'activitiesData' => $actData

        ];
    
        // Pass data to the view
        $this->view('resumes/viewResume', $data);
        // return view('your_view_name', ['data' => $data]);
    }

    // Example function to format the resume data
    private function formatResumeData($resume) {
        // Format the resume data as needed
        return "Resume ID: {$resume['resumeID']}\nStudent ID: {$resume['studentID']}\nResume Detail: {$resume['resumeDetail']}";
    }
}
