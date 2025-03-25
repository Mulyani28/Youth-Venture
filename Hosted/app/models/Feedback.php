<?php

class Feedback {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function manageAllFeedback()
    {
        $this->db->query('SELECT * FROM feedbacks');

        $result = $this->db->resultSet();
        return $result;
    }

    public function addFeedback($data) {
    $this->db->query('INSERT INTO feedbacks (users_id, comment, rating, feedback_date, act_id) 
                      VALUES (:users_id, :comment, :rating, :feedback_date, :act_id)');
    
    $this->db->bind(':users_id', $data['users_id']);
    $this->db->bind(':comment', $data['comment']);
    $this->db->bind(':rating', $data['rating']);
    $this->db->bind(':feedback_date', $data['feedback_date']);

    // Make sure 'act_id' is set before binding
    $actId = isset($data['act_id']) ? $data['act_id'] : null;
    $this->db->bind(':act_id', $actId);

    // Execute the query
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}

    public function isUserRegisteredForFeedback($act_id, $users_id)
    {
        $this->db->query('SELECT * FROM feedbacks WHERE users_id = :users_id AND act_id = :act_id');
        $this->db->bind(':users_id', $users_id);
        $this->db->bind(':act_id', $act_id);

        return $this->db->single() !== null;
    }

    public function getactivitytitle($act_id){
        $this->db->query("SELECT act_title FROM activities WHERE act_id = :act_id");
        $this->db->bind(':act_id', $act_id);
    
        $result = $this->db->single(); // Assuming you expect a single result
        return isset($result->act_title) ? $result->act_title : '';
    }

    // public function getUserFeedback($act_id, $users_id)
    // {
    //     $this->db->query('SELECT * FROM feedbacks WHERE act_id = :act_id AND users_id = :users_id');
    //     $this->db->bind(':act_id', $act_id);
    //     $this->db->bind(':users_id', $users_id);

    //     $row = $this->db->single();

    //     return $row;
    // }
    
    public function getFeedbackForActivity($act_id) {
        // Replace the following with your actual database query to fetch feedback
        $this->db->query("SELECT * FROM feedbacks WHERE act_id = :act_id");
        $this->db->bind(':act_id', $act_id);
        return $this->db->resultSet();
    }


    public function getActivityId($act_id)
{
    $this->db->query("SELECT act_id FROM activities WHERE act_id = :act_id");
    $this->db->bind(':act_id', $act_id);

    $result = $this->db->single(); // Assuming you expect a single result
    return $result ;
    return isset($result->act_id) ? $result->act_id : '';

}


   

    // public function getActivities(){
    //     $this->db->query("SELECT * FROM activities WHERE act_id = :act_id");
    //     $this->db->bind(':act_id', $act_id);

    //     $results = $this->db->resultSet();
    //     return $results;
    // }

    public function updateFeedback($data)
    {
    $this->db->query("UPDATE feedback SET act_id = :act_id, user_id = :user_id, comment = :comment, rating=:rating WHERE user_id = :user_id");
    $this->db->bind(':act_id', $data['act_id']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':comment', $data['comment']);
    $this->db->bind(':rating', $data['rating']);

    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
    }

    // Inside Register model

    public function getFeedbackComments($feedbackID)
    {
        $this->db->query("SELECT * FROM comments WHERE feedbackID = :feedbackID");

        $result = $this->db->resultSet();
        return $result;
    }

    public function registeredEventFeedback()
    {
        $this->db->query('SELECT * FROM registered_events');

        $result = $this->db->resultSet();
        return $result;
    }

    public function registerFeedback($act_id, $users_id)
{
    // Check if the user is already registered for the feedback form
    if ($this->isUserRegisteredForFeedback($act_id, $users_id)) {
        // You might want to handle this case based on your business logic
        return false;
    }

    

    // Insert the registration into the 'registered_feedbacks' table (assuming such a table exists)
    $this->db->query('INSERT INTO feedbacks (users_id, act_id) VALUES (:users_id, :act_id)');
    $this->db->bind(':users_id', $users_id);
    $this->db->bind(':act_id', $act_id);

    return $this->db->execute();
}

    public function findActivityById($act_id) {
        $this->db->query('SELECT * FROM activities WHERE act_id = :act_id');
        $this->db->bind(':act_id', $act_id);

        // Assuming you have a single activity for the given ID
        return $this->db->single();
    }


    // Inside Register model

public function addFeedbackComment($feedbackID, $comment)
{
    $this->db->query("INSERT INTO comment (feedbackID, comment) VALUES (:feedbackID, :comment)");
    $this->db->bind(':feedbackID', $feedbackID);
    $this->db->bind(':comment', $comment);

    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}
}
?>