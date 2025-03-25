<?php

class Feedbacks extends Controller
{
    private $feedbackModel;
    public function __construct()
    {
        $this->feedbackModel = $this->model('Feedback');
    }

    public function index()
    {
        $feedback = $this->feedbackModel->manageAllFeedback();
        $feedbacksactivity = $this ->feedbackModel ->getactivitytitle();
        $data = [
            'feedback' => $feedback,
            'feedbacksactivity' =>$feedbacksactivity
        ];
        $this->view('feedbacks/index', $data); // Assuming there is a view file named 'index' for feedback
    }

    public function create($act_id)
    {
        // Check if the user is logged in
        if (!isset($_SESSION['users_id'])) {
            // Handle the case when the user is not logged in
            // You might want to redirect to a login page or display an error message
            return;
        }

        // Fetch the details of the activity by ID
        $activity = $this->feedbackModel->findActivityById($act_id);
        $users_id = $_SESSION['users_id'];

        // Check if the activity exists
        if (!$activity) {
            // Handle the case when the activity is not found
            // You might want to redirect to an error page or display an error message
            return;
        }

        // Fetch the user's feedbacks for the given activity
        $userFeedback = $this->feedbackModel->getUserFeedback($act_id,$users_id);

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize the form data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Set the form data
            $data = [
                'act_id' => $act_id,
                'users_id' => $_SESSION['users_id'],
                'comment' => trim($_POST['comment']),
                'rating' => intval($_POST['rating']),
                'feedback_date' => date('Y-m-d H:i:s'),
            ];

            // Validate the form data
            if ($data['comment'] && $data['rating']) {
                // Add the feedback
                if ($this->feedbackModel->addFeedback($data)) {
                    // Redirect to the feedbacks page or show a success message
                    $_SESSION['success_message'] = "Your feedback was successfully submitted!";
                    header("Location: " . URLROOT . "/feedbacks/index");
                    exit;
                } else {
                    die("Something went wrong :(");
                }
            } else {
                // If validation fails, reload the form with the current data
                $this->view('feedbacks/create', ['activity' => $activity, 'userFeedback' => $userFeedback, 'data' => $data]);
                exit;
            }
        }

        // Display the feedback form
        $this->view('feedbacks/create', ['activity' => $activity, 'userFeedback' => $userFeedback]);
    }


    // public function update($id)
    // {
    //     $feedback = $this->feedbackModel->findFeedbackById($id);

    //     if (!isLoggedIn()) {
    //         header("Location: " . URLROOT . "/feedback");
    //     } elseif ($feedback->user_id != $_SESSION['user_id']) {
    //         header("Location: " . URLROOT . "/feedback");
    //     }

    //     $data = [
    //         'feedback' => $feedback,
    //         'event_title' => '',
    //         'feedback_comment' => '',
    //         'event_title_error' => '',
    //         'feedback_comment_error' => ''
    //     ];

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //         $data = [
    //             'id' => $id,
    //             'feedback' => $feedback,
    //             'user_id' => $_SESSION['user_id'],
    //             'event_title' => trim($_POST['event_title']),
    //             'feedback_comment' => trim($_POST['feedback_comment']),
    //             'event_title_error' => '',
    //             'feedback_comment_error' => ''
    //         ];

    //         // Validation and update logic here...

    //         if (empty($data['event_title_error']) && empty($data['feedback_comment_error'])) {
    //             if ($this->feedbackModel->updateFeedback($data)) {
    //                 header("Location: " . URLROOT . "/feedback");
    //             } else {
    //                 die("Something went wrong :(");
    //             }
    //         } else {
    //             $this->view('feedback/index', $data);
    //         }
    //     }

    //     $this->view('feedback/index', $data);
    // }

    // public function delete($id)
    // {
    //     $feedback = $this->feedbackModel->findFeedbackById($id);

    //     if (!isLoggedIn()) {
    //         header("Location: " . URLROOT . "/feedback");
    //     } elseif ($feedback->user_id != $_SESSION['user_id']) {
    //         header("Location: " . URLROOT . "/feedback");
    //     }

    //     // Delete logic here...

    //     if ($this->feedbackModel->deleteFeedback($id)) {
    //         header("Location: " . URLROOT . "/feedback");
    //     } else {
    //         die('Something went wrong..');
    //     }
    // }

    
}

?>
