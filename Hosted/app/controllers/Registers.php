<?php

class Registers extends Controller{
    private $registerModel;
    public function __construct(){
        $this->registerModel = $this->model('Register');
    }

    public function index(){
        $registers = $this->registerModel->manageAllRegister();

        $data = [
            'registers' => $registers
        ];

        $this->view('registers/index', $data);
    }

    public function generatePdf() {
        // Create instance of FPDF
        $pdf = new FPDF();

        // Add a page
        $pdf->AddPage();

        // Output the PDF to the browser or save it to a file
        $pdf->Output();
    }

    public function pdfRegistrants() {
        echo "Inside pdfRegistrants method"; // Debugging
        $registers = $this->registerModel->manageAllRegister();
        $data = [
            'registers' => $registers,
        ];
        $this->view('pdfRegistrants/', $data);
    }
    
    

    // Inside Registers controller

    public function create()
    {
        // Check if the user is logged in and has the 'client' role
        // if (isLoggedIn() && $_SESSION['roles'] == 'client') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize and validate form data
                $data = [
                    'title' => trim($_POST['title']),
                    'description' => trim($_POST['description']),
                    // 'url' => trim($_POST['url']),
                    // 'status' => $_POST['status'],
                     // Add other fields as needed
                ];
    
                // Validate and process the form data
                if ($this->registerModel->addRegisterLink($data)) {
                    // // Registration link added successfully, you can redirect or display a success message
                    // flash('register_message', 'Registration link added successfully!')->success();
                    header('location: ' . URLROOT . '/registers/create');
                    exit;
                } else {
                    // Failed to add registration link, handle accordingly
                    die('Something went wrong.');
                }
            } else {
                // Initial load of the page, no form submission
                $registerLinks = $this->registerModel->RegisterAvailable();
    
                $data = [
                    'registerLinks' => $registerLinks,
                ];
    
                $this->view('registers/create', $data);
            }
        // } else {
        //     // User is not logged in or doesn't have the 'client' role
        //     header('location: ' . URLROOT . '/registers/linklist');
        // }
    }
    

        


    
    public function linklist() {
        $registerLinks = $this->registerModel->RegisterAvailable();
    
        $data = [
            'registerLinks' => $registerLinks,
        ];
    
        $this->view('registers/linklist', $data);
    }
    
}

       



?>