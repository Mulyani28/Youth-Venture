<?php

class Activities extends Controller{
    private $activityModel;
    private $db;
    private $feedbackModel;


    public function __construct(){
        $this->activityModel = $this->model('Activity');

    }

    public function index()
{
    $users_id = $_SESSION['users_id'];
    $registrations = $this->activityModel->getStudentRegistrations($users_id);
    $allActivities = $this->activityModel->manageAllActivities($users_id);

    // Fetch registrants for each activity
    foreach ($allActivities as $key => $activity) {
        $registrants = $this->activityModel->getRegistrantsByActivityId($activity->act_id);
        $allActivities[$key]->registrants = $registrants;
    }

    $data = [
        'registrations' => $registrations,
        'allActivities' => $allActivities,
    ];

    $this->view('activities/index', $data);
}


public function registrants($activityId)
{
    // Check if the user is logged in
    if (!isset($_SESSION['users_id'])) {
        // Handle the case when the user is not logged in
        // You might want to redirect to a login page or display an error message
        return;
    }

    $users_id = $_SESSION['users_id'];

    // Fetch registrations for the user
    $registrations = $this->activityModel->getStudentRegistrations($users_id);

    // Fetch the selected activity
    $selectedActivity = $this->activityModel->findActivityById($activityId);

    if (!$selectedActivity) {
        // Handle the case when the activity with the given ID is not found
        // You might want to redirect to an error page or display an error message
        return;
    }

    // Fetch registrants for the selected activity
    $registrants = $this->activityModel->getRegistrantsByActivityId($activityId);
    $registrantsDetails = $this->activityModel->getRegistrantsDetails();
    // Prepare data to be passed to the view
    $data = [
        'registrations' => $registrations,
        'selectedActivity' => $selectedActivity,
        'registrants' => $registrants,
        'registrantsDetails'=>$registrantsDetails,

    ];

    // Load the 'registrants' view with the data
    $this->view('activities/registrants', $data);
}


public function studprofile($users_id)
{
    // Fetch student details based on the provided user ID
    $studentDetails = $this->activityModel->getStudentDetails($users_id);

    // Return the student details as JSON
    echo json_encode($studentDetails);
}


 
    



    public function create()
    {
        $rewards = $this->activityModel->getRewards();
        $users_id = $_SESSION['users_id'];


        $data = [
            'act_title' => '',
            'act_desc' => '',
            'act_start_date' => '', // Initialize start date
            'act_duration' => '',   // Initialize duration
            'rewardId' => '',       // Initialize rewardId
            'act_venue' => '',      // Initialize venue
            'rewards' => $rewards,
            //'act_rewards' => '', // Updated to act_rewards
            // 'rewardsList' => $rewardsList,
            // Add any other necessary data here
            // 'selectedRewards' => [] // Initialize an empty array for selected rewards

        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

             // Process the form submission and handle rewards selection
             $selectedRewards = isset($_POST['selected_rewards']) ? $_POST['selected_rewards'] : [];
             $data['selectedRewards'] = $selectedRewards;

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'users_id' => $users_id,
            'act_title' => trim($_POST['act_title']),
            'act_desc' => trim($_POST['act_desc']),
            'act_start_date' => trim($_POST['act_start_date']),
            'act_duration' => trim($_POST['act_duration']),
            'rewardId' => trim($_POST['rewardId']),
            'act_venue' => trim($_POST['act_venue']),
            'act_datetime' => date('Y-m-d H:i:s'),
                //  'rewardId' => $_POST['rewardId'],

                // Add any other necessary data here
            ];

    
            if ($data['act_title'] && $data['act_desc']) {
                if ($this->activityModel->addActivity($data)) {
                     // ... (existing code)
                    //  header("Location: " . URLROOT. "/activities" );

                     $_SESSION['success_message'] = "You have successfully created the activity!";

                    // Fetch all activities before rendering the view
                    $allActivities = $this->activityModel->manageAllActivities($users_id);
                    $data['allActivities'] = $allActivities;

                    $this->view('activities/index', $data);
                        exit;
                } else {
                    die("Something went wrong :(");
                }
            } else {
                // Initial load of the page, no form submission
                // $registerLinks = $this->activityModel->RegisterAvailable();
    
                // $data += [
                //     'registerLinks' => $registerLinks,
                // ];
    
                // $this->view('activities/create', $data);
                // exit; // Added exit to prevent further execution
            }


        }
    
// Fetch all activities and pass them to the view
            $allActivities = $this->activityModel->manageAllActivities($users_id);
            $data['allActivities'] = $allActivities;

            $this->view('activities/index', $data);  
          }
          public function manageStud()
          {
              // Debugging: Print the users_id from the session
              var_dump($_SESSION['users_id']);
          
              // Fetch the registered activities for the logged-in student
              $users_id = $_SESSION['users_id'];
              $registrations = $this->activityModel->getStudentRegistrations($users_id);
          
              // Debugging: Print the registrations
              var_dump($registrations);
          
              // Load the view to display the registered activities
              $data = ['registrations' => $registrations];
              $this->view('activities/manage_stud', $data);
          }

     

          public function update($act_id)
          {
              // Fetch the activity details by ID
              $activity = $this->activityModel->findActivityById($act_id);
          
              // Check if the activity exists
              if (!$activity) {
                  // Redirect or handle the case where the activity is not found
                  die("Activity not found :(");
              }
          
              $data = [
                  'activity' => $activity,
                  'act_title' => '',
                  'act_desc' => '',
                  'act_start_date' => '',
                  'act_duration' => '',
                  'act_venue' => '',
                  'rewardId' => '',
                  'rewards' => $this->activityModel->getRewards(),
              ];
          
              // Check if the form is submitted
              if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  // Sanitize the form data
                  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
                  // Set the form data
                  $data = [
                      'act_id' => $act_id,
                      'activity' => $activity,
                      'act_title' => trim($_POST['act_title']),
                      'act_desc' => trim($_POST['act_desc']),
                      'act_start_date' => $_POST['act_start_date'],
                      'act_duration' => $_POST['act_duration'],
                      'act_venue' => trim($_POST['act_venue']),
                      'rewardId' => $_POST['rewardId'],
                      'rewards' => $this->activityModel->getRewards(),
                  ];
          
                  // Validate the form data
                  if (
                      $data['act_title'] &&
                      $data['act_desc'] &&
                      $data['act_start_date'] &&
                      $data['act_duration'] &&
                      $data['act_venue'] &&
                      $data['rewardId']
                  ) {
                      // Update the activity
                      if ($this->activityModel->updateActivity($data)) {
                          // Redirect to the activities page on success
                          header("Location: " . URLROOT. "/activities");
                          exit;
                      } else {
                          // Handle the case where the update fails
                          die("Something went wrong :(");
                      }
                  } else {
                      // If validation fails, reload the form with the current data
                      $this->view('activities/index', $data);
                      exit;
                  }
              }
          
              // Display the form
              $this->view('activities/index', $data);
          }
          

   
    public function delete($act_id)
    {
        $activity = $this->activityModel->findActivityById($act_id);

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->activityModel->deleteActivity($act_id)){
                header("Location: " . URLROOT . "/activities");
            }
            else
            {
                die('Something went wrong..');
            }
    
        }

       
    }

  

    public function deleteRegistration($id)
    {
        // Fetch the registration details
        $registration = $this->activityModel->findRegistrationById($id);

        // Check if the registration exists
        if (!$registration) {
            // Redirect or handle the case where the registration is not found
            die("Registration not found :(");
        }

        // Check if the user is the owner of the registration
        $users_id = $_SESSION['users_id'];
        if ($registration->users_id != $users_id) {
            // Redirect or handle the case where the user is not authorized
            die("You are not authorized to delete this registration.");
        }

        // Check if the event has not started yet
        $currentDate = new DateTime();
        $eventStartDate = new DateTime($registration->act_start_date);

        if ($currentDate < $eventStartDate) {
            // Check if the request method is POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Delete the registration and associated data in the registered_events table
                if ($this->activityModel->deleteRegistration($id)) {
                    // Redirect to the activities page after successful deletion
                    $_SESSION['success_message'] = "Registration deleted successfully.";
                    header("Location: " . URLROOT . "/activities");
                } else {
                    die('Something went wrong..');
                }
            }
        } else {
            // If the event has already started, display an error or redirect to an error page
            die('You cannot delete this registration as the event has already started.');
            // or redirect to an error page
            // header("Location: " . URLROOT . "/error");
        }
    }


    public function linklist()
{
    // Get the user's ID from the session
    $users_id = $_SESSION['users_id'];

    // Fetch the list of available activities (excluding those the student has registered for)
    $activities = $this->activityModel->manageAllActivities($users_id);

    $data = [
        'activities' => $activities,
    ];

    $this->view('activities/linklist', $data);
}
    
    


    

   
        public function register($act_id) {
            // Check if the user is logged in and has the 'student' role
            if (isLoggedIn()) {
                header("Location: " . URLROOT . "/some_unauthorized_page");
                exit;
            }
    
            // Get the user's ID from the session
           $users_id = $_SESSION['users_id'];
    
            // Check if the activity is available for registration
            $activity = $this->activityModel->findActivityById($act_id);
            if ($activity && $this->activityModel->isActivityAvailable($act_id, $activity->act_title)) {
                // Register the student for the activity
                if ($this->activityModel->registerStudent($act_id, $users_id ?? null)) {

                    // Registration successful, redirect to linklist
                    $_SESSION['success'] = "Registration successful.";
                } else {
                    $_SESSION['error'] = "Failed to register for the activity.";
                }
            } else {
                $_SESSION['error'] = "Activity not available for registration.";
            }
    
            // Redirect to the linklist page
            header("Location: " . URLROOT . "/activities/linklist");
        }

        public function feedback($act_id)
{
    // ... (existing code)

    if (empty($_POST['rating'])) {
        $data['rating_error'] = "Select the rating you want to give.";
    }


    // Check if the form is submitted and handle feedback submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get feedback data from the form
        $feedbackData = [
            'act_id' => $act_id,
            'users_id' => $_SESSION['users_id'],
            'comment' => $_POST['comment'], // Adjust this based on your form field names
            'rating' => $_POST['rating'],   // Adjust this based on your form field names
        ];

        // Call the leaveFeedback method in the model
        $feedbackResult = $this->activityModel->leaveFeedback($feedbackData);

        // Check if feedback submission was successful
        if ($feedbackResult) {
            $data['feedback_success'] = "Your feedback was successfully submitted.";
            // Redirect to prevent form resubmission
            header('Location: ' . URLROOT . '/activities/feedback/' . $act_id);
            exit();
        } else {
            $data['feedback_error'] = "Failed to submit feedback. Please try again.";
        }
    }

    // Fetch the selected activity
    $selectedActivity = $this->activityModel->findActivityById($act_id);

    if (!$selectedActivity) {
        // Handle the case when the activity with the given ID is not found
        // You might want to redirect to an error page or display an error message
        return;
    }

    // Fetch existing feedback for the activity
    // $existingFeedback = $this->activityModel->getUserFeedback($act_id, $_SESSION['users_id']);

    // Merge form submission data with existing data
    $data = [
        'selectedActivity' => $selectedActivity,
        // 'existingFeedback' => $existingFeedback,
    ];

    // Load the 'feedback' view with the data
    $this->view('activities/feedback', $data);
}

    
        // ...
    
    
        public function showActivities()
{
    // Assuming $activities is an array of activities fetched from the database or elsewhere
    $activities = $this->activityModel->getAllActivities(); // Replace with your actual method

    // Pass activities to the view
    $this-> view('activities/linklist', ['activities' => $activities]);
}

// Add the following method to your Activities controller
public function feedbacklist($act_id)
{
    // Fetch the selected activity
    $selectedActivity = $this->activityModel->findActivityById($act_id);

    if (!$selectedActivity) {
        // Handle the case when the activity with the given ID is not found
        // You might want to redirect to an error page or display an error message
        return;
    }

    // Fetch feedback for the selected activity
    $feedbackList = $this->activityModel->getFeedbackForActivity($act_id);

    // Prepare data to be passed to the view
    $data = [
        'selectedActivity' => $selectedActivity,
        'feedbackList' => $feedbackList,
    ];

    // Load the 'feedbacklist' view with the data
    $this->view('activities/feedbacklist', $data);
}

    
    
  
}

?>