<?php
class Pages extends Controller {
protected $pageModel;
    public function __construct()
    {
        $this->pageModel = $this->model('Page');
    }

    public function index() {
        // Check if the search form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
            // Sanitize the search input
            $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
    
            // Call a method in your model to perform the search
            $searchResults = $this->pageModel->searchByName($search);
    
            // Pass the search results to the view
            $data = [
                'title' => 'Home page',
                'searchResults' => $searchResults
            ];
    
            $this->view('index', $data);
        } else {
            // Your existing code for displaying the page
            $data = [
                'title' => 'Home page'
            ];
    
            $this->view('index', $data);
        }
    }


    public function edit_profile()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $location = 'pages/';

            // if (!is_dir($location)) {
            //     mkdir($location, 0777, true);
            // }

            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["file"]["name"];
                $filetype = $_FILES["file"]["type"];
                $filesize = $_FILES["file"]["size"];

                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) {
                    $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                    header("Location: " . URLROOT . "/pages/edit_profile");
                    exit();
                }
                $username = $_SESSION['email'];

                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) {
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                    header("Location: " . URLROOT . "/pages/edit_profile");
                    exit();
                }

                //$location .= "images/users/";
                $location = "images/users/" . $username;
                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        
                if (!is_dir($location)) {
                   // mkdir($location, 0777, true);
                   mkdir('images/users/' . $username, 0777, true);

                }

                $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                $location .= $fileNameNew;

                move_uploaded_file($_FILES['file']['tmp_name'], $location);
            }
        } else {
            $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/pages/edit_profile");
        } 
    } else {

            $_SESSION['failed'] = "Error: There was an error uploading your file!";
                    header("Location: " . URLROOT . "/pages/edit_profile");
          
        }

                    // $_POST['update_student'] hidden value from form
            if ($_POST['update_student']) {
                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {

                $data = [
                    'ic' =>trim($_POST['ic']),
                    'firstname' => isset($_POST['firstname']) ? trim($_POST['firstname']) : '',
                    'gender' => trim($_POST['gender']),
                    'street' => trim($_POST['street']),
                    'institution' => trim($_POST['institution']),
                    'city' => trim($_POST['city']),
                    'state' => trim($_POST['state']),
                    'postal_code' => trim($_POST['postal_code']),
                    'country' => trim($_POST['country']),
                    'phone' => trim($_POST['phone']),
                    'major' => trim($_POST['major']),
                    'st_image' => $location,
                    
                ];}
                
                else{
                    $data = [
                        'ic' =>trim($_POST['ic']),
                        'firstname' => isset($_POST['firstname']) ? trim($_POST['firstname']) : '',
                        'gender' => trim($_POST['gender']),
                        'street' => trim($_POST['street']),
                        'institution' => trim($_POST['institution']),
                        'city' => trim($_POST['city']),
                        'state' => trim($_POST['state']),
                        'postal_code' => trim($_POST['postal_code']),
                        'country' => trim($_POST['country']),
                        'phone' => trim($_POST['phone']),
                        'major' => trim($_POST['major']),
                        
                    ];
                }


            }
            // else {
            //     $_SESSION['failed'] = "Error: There was an error uploading your file!";
            //     header("Location: " . URLROOT . "/pages/edit_profile");
            //     exit();
            // }

            if ($_POST['update_student']) {
                if ($this->pageModel->updateStudentProfile($data)) {
                    header("Location: " . URLROOT . "/pages/edit_profile");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('pages/index');
            }
        }

        $studentProfile = $this->pageModel->studentProfile();

        $data = [
            'studentProfile' => $studentProfile
        ];

        $this->view('pages/index', $data);
    }

    public function edit_profileClient()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $location = 'pages/';

            // if (!is_dir($location)) {
            //     mkdir($location, 0777, true);
            // }

            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["file"]["name"];
                $filetype = $_FILES["file"]["type"];
                $filesize = $_FILES["file"]["size"];

                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) {
                    $_SESSION['failed'] = "Error: You cannot upload files of this type!";
                    header("Location: " . URLROOT . "/pages/edit_profileClient");
                    exit();
                }
                $username = $_SESSION['email'];

                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) {
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                    header("Location: " . URLROOT . "/pages/edit_profileClient");
                    exit();
                }

                //$location .= "images/users/";
                $location = "images/users/" . $username;
                if (in_array($filetype, $allowed)) {

                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        
                if (!is_dir($location)) {
                   // mkdir($location, 0777, true);
                   mkdir('images/users/' . $username, 0777, true);

                }

                $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                $location .= $fileNameNew;

                move_uploaded_file($_FILES['file']['tmp_name'], $location);
            }
        } else {
            $_SESSION['failed'] = "Error: There was an error uploading your file!";
                        header("Location: " . URLROOT . "/pages/edit_profileClient");
        } 
    } else {

            $_SESSION['failed'] = "Error: There was an error uploading your file!";
                    header("Location: " . URLROOT . "/pages/edit_profileClient");
          
        }

                    // $_POST['update_student'] hidden value from form
            if ($_POST['update_student']) {
                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {

                $data = [
                    'ic' =>trim($_POST['ic']),
                    'firstname' => isset($_POST['firstname']) ? trim($_POST['firstname']) : '',
                    'gender' => trim($_POST['gender']),
                    'street' => trim($_POST['street']),
                    'institution' => trim($_POST['institution']),
                    'city' => trim($_POST['city']),
                    'state' => trim($_POST['state']),
                    'postal_code' => trim($_POST['postal_code']),
                    'country' => trim($_POST['country']),
                    'phone' => trim($_POST['phone']),
                    'st_image' => $location,
                    
                ];}
                
                else{
                    $data = [
                        'ic' =>trim($_POST['ic']),
                        'firstname' => isset($_POST['firstname']) ? trim($_POST['firstname']) : '',
                        'gender' => trim($_POST['gender']),
                        'street' => trim($_POST['street']),
                        'institution' => trim($_POST['institution']),
                        'city' => trim($_POST['city']),
                        'state' => trim($_POST['state']),
                        'postal_code' => trim($_POST['postal_code']),
                        'country' => trim($_POST['country']),
                        'phone' => trim($_POST['phone']),
                        
                    ];
                }


            }
            // else {
            //     $_SESSION['failed'] = "Error: There was an error uploading your file!";
            //     header("Location: " . URLROOT . "/pages/edit_profile");
            //     exit();
            // }

            if ($_POST['update_student']) {
                if ($this->pageModel->updateStudentProfile($data)) {
                    header("Location: " . URLROOT . "/pages/edit_profileClient");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('pages/index');
            }
        }

        $studentProfile = $this->pageModel->studentProfile();

        $data = [
            'studentProfile' => $studentProfile
        ];

        $this->view('pages/index', $data);
    }

    public function studprofile()
    {
        // Assuming you have a function in your model to retrieve student profile data
        $studentProfile = $this->pageModel->studentProfile();
        $studentReward = $this->pageModel->getAllClaimRewards();


        $data = [
            'studentProfile' => $studentProfile,
            'studentReward'=>$studentReward,
            'rewardName'=>$studentReward,
            
        ];

        $this->view('pages/studprofile', $data);    }

    public function edit_skills()
    {
        if (isset($_SESSION['roles']) && $_SESSION['roles'] !== 'student') {
            // Redirect to some unauthorized page or display an error message
            header("Location: " . URLROOT . "/studprofile");
            exit();
        }
    
        $skills = $this->pageModel->getSkills($_SESSION['users_id']);
        $studentProfile = $this->pageModel->studentProfile();
    
        $data = [
            'skills' => $skills,
            'studentProfile' => $studentProfile,
            'language' => '',
            'technical' => '',
            'soft' => '',
        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SKILLS = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'skills' => $skills,
                'studentProfile' => $studentProfile,
                'language' => trim($_SKILLS['language']),
                'technical' => trim($_SKILLS['technical']),
                'soft' => trim($_SKILLS['soft']),
            ];
    
            if ($data['language'] && $data['technical'] && $data['soft']) {
                if ($this->pageModel->updateSkills($data)) {
                    header("Location: " . URLROOT . "/studprofile");
                    exit();
                } else {
                    die("Something went wrong :(");
                }
            }
        }
    
        $this->view('pages/edit_skills', $data);
    }
    

public function search_student() {
    // Check if the search form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
        // Sanitize the search input
        $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);

        // Call a method in your model to perform the search
        $searchResults = $this->pageModel->searchByName($search);

        // Pass the search results to the view
        $data = [
            'title' => 'Search Student',
            'searchResults' => $searchResults,
        ];

        $this->view('search_student', $data);
    } else {
        // 
        header("Location: " . URLROOT . "/");
        exit();
    }
}


}
