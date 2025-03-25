<?php

class Profiles extends Controller{
private $profileModel;
    public function __construct(){
        $this->profileModel=$this->model('Profile');
    }

    // public function index() {

    //     $profileModel = new Profile();

    //     $username = $profileModel->getProfileUsername($studentId);



    //     $this->view('profiles/index',$data);



    // }
    public function edit()
    {
        $studentProfile=$this->profileModel->getProfileEmail();
        $data = [
            'studentProfile' => $studentProfile
        ];
        $this->view('profiles/edit',$data);
    }

    public function edit_profile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Check if file is uploaded
            if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png"];
                $filename = $_FILES["file"]["name"];
                $filetype = $_FILES["file"]["type"];
                $filesize = $_FILES["file"]["size"];
                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));

                // Validate file extension
                if (!array_key_exists($fileActualExt, $allowed)) {
                    $_SESSION['failed'] = "Error: File type not allowed.";
                    header("Location: " . URLROOT . "/profiles/editProfile");
                    exit;
                }

                $username = $_SESSION['email'];
                $maxsize = 5 * 1024 * 1024;

                // Validate file size
                if ($filesize > $maxsize) {
                    $_SESSION['failed'] = "Error: File size is larger than the allowed limit.";
                    header("Location: " . URLROOT . "/profiles/editProfile");
                    exit;
                }

                $location = "images/users/" . $username;

                if (in_array($filetype, $allowed)) {
                    if (file_exists($location . $filename)) {
                        echo $filename . " is already exists.";
                        exit;
                    } else {
                        // Create directory if not exists
                        if (!is_dir($location)) {
                            mkdir('images/users/' . $username, 0777, true);
                        }

                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $location .= "/" . $fileNameNew;

                        // Move uploaded file to destination
                        move_uploaded_file($_FILES['file']['tmp_name'], $location);
                    }
                } else {
                    $_SESSION['failed'] = "Error: There was an error uploading your file!";
                    header("Location: " . URLROOT . "/profiles/editProfile");
                    exit;
                }
            } else {
                $_SESSION['failed'] = "Error: There was an error uploading your file!";
                header("Location: " . URLROOT . "/profiles/editProfile");
                exit;
            }

            // Handle form data update
            if (isset($_POST['update_student'])) {
                if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
                    $data = [
                        'ic' => trim($_POST['ic']),
                        'firstname' => trim($_POST['firstname']),
                        'birthday' => trim($_POST['birthday']),
                        'gender' => trim($_POST['gender']),
                        'street' => trim($_POST['street']),
                        'city' => trim($_POST['city']),
                        'state' => trim($_POST['state']),
                        'postal_code' => trim($_POST['postal_code']),
                        'country' => trim($_POST['country']),
                        'phone'=>trim($_POST['phone']),
                        'institution'=>trim($_POST['institution']),
                        'major'=>trim($_POST['major']),
                        'profileImage' => $location
                    ];
                } else {
                    $data = [
                        'ic' => trim($_POST['ic']),
                        'firstname' => trim($_POST['firstname']),
                        'birthday' => trim($_POST['birthday']),
                        'gender' => trim($_POST['gender']),
                        'street' => trim($_POST['street']),
                        'city' => trim($_POST['city']),
                        'state' => trim($_POST['state']),
                        'postal_code' => trim($_POST['postal_code']),
                        'country' => trim($_POST['country']),
                        'phone'=>trim($_POST['phone']),
                        'institution'=>trim($_POST['institution']),
                        'major'=>trim($_POST['major']),
                    ];
                }

            }
        }

        $studentProfile=$this->profileModel->getProfileEmail();
        // $data = [
        //     'studentProfile' => $studentProfile,
        //     'major' => $this->profileModel->getMajor()
        // ];
        $this->view('profiles/edit',$data);
    }

}
?>