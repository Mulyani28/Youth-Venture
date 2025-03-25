<?php

class Activity{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function manageAllActivities($users_id)
    {
        $this->db->query('SELECT activities.*, rewards.rewardName 
                          FROM activities 
                          LEFT JOIN rewards ON activities.rewardId = rewards.rewardId
                          LEFT JOIN registered_events ON activities.act_id = registered_events.act_id AND registered_events.users_id = :users_id
                          WHERE registered_events.act_id IS NULL');
    
        $this->db->bind(':users_id', $users_id);
    
        $results = $this->db->resultSet();
        return $results;
    }
    
    
    public function getFeedbacksForActivity($act_id)
    {
        $this->db->query('SELECT * FROM feedbacks WHERE act_id = :act_id');
        $this->db->bind(':act_id', $act_id);
        $feedbacks = $this->db->resultSet();
        return $feedbacks;
    }

    // Add this method to allow a student to leave feedback for an activity
    public function leaveFeedback($data)
{
    $this->db->query('INSERT INTO feedbacks (act_id, users_id, comment, rating) VALUES (:act_id, :users_id, :comment, :rating)');
    $this->db->bind(':act_id', $data['act_id']);
    $this->db->bind(':users_id', $data['users_id']);
    $this->db->bind(':comment', $data['comment']);
    $this->db->bind(':rating', $data['rating']);

    if ($this->db->execute())
    {
        return true;
    }
    else
    {
        return false;
    }   
}

    public function deleteActivity($act_id){
        $this->db->query('DELETE FROM activities WHERE act_id = :act_id');

        $this->db->bind(':act_id', $act_id);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }



    public function RegisterAvailable()
    {
        $this->db->query('SELECT * FROM activities');

        $result = $this->db->resultSet();
        return $result;
    }

    // Inside your model (Activity.php)
    // Inside the Activity model (Activity.php)
    public function getStudentRegistrations($users_id)
    {
        $this->db->query('SELECT activities.*, registered_events.registration_date, rewards.rewardName
                          FROM registered_events 
                          INNER JOIN activities ON registered_events.act_id = activities.act_id 
                          LEFT JOIN rewards ON activities.rewardId = rewards.rewardId
                          WHERE registered_events.users_id = :users_id');

        $this->db->bind(':users_id', $users_id);
        $registrations = $this->db->resultSet();
        return $registrations;
    }

    public function getRegistrantsByActivityId($act_id)
{
    $this->db->query('SELECT users.*
                      FROM registered_events
                      INNER JOIN users ON registered_events.users_id = users.users_id
                      WHERE registered_events.act_id = :act_id');
    $this->db->bind(':act_id', $act_id);
    $registrants = $this->db->resultSet();
    return $registrants;
}
public function getStudentDetails($users_id)
{
    $this->db->query('SELECT * FROM users WHERE users_id = :users_id');
    $this->db->bind(':users_id', $users_id);
    $studentDetails = $this->db->single(); // Assuming a single result is expected

    return $studentDetails;
}

public function getRegistrantsDetails()
{
    $this->db->query("SELECT * FROM users");
    $result = $this->db->resultSet();

    return $result;
}

    public function findRegistrationById($id)
    {
        $this->db->query('SELECT * FROM registered_events WHERE id = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function deleteRegistration($id)
    {
        $this->db->query('DELETE FROM registered_events WHERE id = :id');
        $this->db->bind(':id', $id);

        // Execute
        return $this->db->execute();
    }

  

    public function getRewards()
{
    $this->db->query('SELECT * FROM rewards');
    $rewards = $this->db->resultSet(); // Assuming resultSet is a method to fetch multiple rows.

    return $rewards;
}
    public function registerActivity($data) {
        $this->db->query('INSERT INTO registered_events (act_id, users_id) VALUES (:act_id, :users_id)');
        $this->db->bind(':act_id', $data['act_id']);
        $this->db->bind(':users_id', $data['users_id']);
    
        return $this->db->execute();
    }
    
    public function addActivity($data) {
        

        $this->db->query('INSERT INTO activities (users_id, act_title, act_desc, act_start_date, act_duration, act_venue, rewardId, act_datetime) VALUES (:users_id, :act_title, :act_desc, :act_start_date, :act_duration, :act_venue, :rewardId, :act_datetime)');


        $this->db->bind(':users_id', $data['users_id']);

        $this->db->bind(':act_title', $data['act_title']);
        $this->db->bind(':act_desc', $data['act_desc']);
        $this->db->bind(':act_start_date', $data['act_start_date']);
        $this->db->bind(':act_duration', $data['act_duration']);
        $this->db->bind(':rewardId', $data['rewardId']);
        $this->db->bind(':act_venue', $data['act_venue']);
        $this->db->bind(':act_datetime', $data['act_datetime']);

       // $this->db->bind(':rewardId', $data['rewardId']); // Use act_rewards as the foreign key

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


     public function getUserFeedback($act_id, $users_id)
    {
        $this->db->query('INSERT INTO feedbacks (act_id, users_id) VALUES (:act_id, :users_id)');
        $this->db->bind(':act_id', $act_id);
        $this->db->bind(':users_id', $users_id);

        
       

        return $this->db->execute();

        $row = $this->db->single();

        return $row;
    }
    

    private function bindActivityParameters($data)
    {
        $this->db->bind(':act_title', $data['act_title']);
        $this->db->bind(':act_desc', $data['act_desc']);
        $this->db->bind(':act_start_date', $data['act_start_date']);
        $this->db->bind(':act_duration', $data['act_duration']);
        $this->db->bind(':rewardId', $data['rewardId']);
        $this->db->bind(':act_venue', $data['act_venue']);
    }

    public function addRegisterLink($data)
{
    $this->db->query('INSERT INTO activities (act_title, act_desc) VALUES (:act_title, :act_desc)');
    $this->db->bind(':act_title', $data['act_title']);
    $this->db->bind(':act_desc', $data['act_desc']);
    // $this->db->bind(':url', $data['url']);
    // $this->db->bind(':status', $data['status']);

    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}

public function getAllRegisterLinks()
{
    $this->db->query('SELECT * FROM activities');
    $result = $this->db->resultSet();
    return $result;
}

public function getAllRewards()
    {
        $this->db->query('SELECT * FROM rewards');
        $result = $this->db->resultSet();
        return $result;
    }

    // public function getRegisteredActivities($userId)
    // {
    //     $this->db->query('SELECT activities.*, registered_events.registration_date 
    //                       FROM activities 
    //                       JOIN registered_events ON activities.act_id = registered_events.act_id 
    //                       WHERE registered_events.users_id = :userId');

    //     $this->db->bind(':userId', $userId);
    //     $results = $this->db->resultSet();

    //     return $results;
    // }

    public function findRewardById($rewardId)
    {
        $this->db->query('SELECT * FROM rewards WHERE rewardId = :rewardId');
        $this->db->bind(':rewardId', $rewardId);

        $row = $this->db->single();

        return $row;
    }


    // public function getRewards() {
    //     $sql = "SELECT * FROM rewards";
    //     $this->db->query($sql);
    //     return $this->db->resultSet();
    // }

    public function registerEvent($act_id, $users_id) {
        $this->db->query('INSERT INTO registered_events (users_id, act_id) VALUES (:users_id, :act_id)');
        $this->db->bind(':users_id', $users_id);
        $this->db->bind(':act_id', $act_id);
    
        return $this->db->execute();
    }

    
    public function isActivityAvailable($act_id, $act_category) {
        // Implement your logic here to check if the activity is available
        // For example, you can check if the activity is not full or has not passed its deadline
        // You need to adapt this method based on your specific requirements

        // For now, let's assume all activities are available
        return true;
    }

    public function registerStudent($act_id, $users_id) {
        // Check if the user is already registered for the activity
        if ($this->isUserRegistered($act_id, $users_id)) {
            // You might want to handle this case based on your business logic
            return false;
        }

        // Insert the registration into the 'registered_events' table
        $this->db->query('INSERT INTO registered_events (users_id, act_id) VALUES (:users_id, :act_id)');
        $this->db->bind(':users_id', $users_id);
        $this->db->bind(':act_id', $act_id);

        return $this->db->execute();
    }
    
    public function getFeedbackForActivity($activityId) {
        $this->db->query('SELECT feedbacks.*, users.firstname, feedbacks.comment FROM feedbacks INNER JOIN users ON feedbacks.users_id = users.users_id WHERE feedbacks.act_id = :act_id');
        $this->db->bind(':act_id', $activityId);
    
        return $this->db->resultSet(); // Assuming resultSet() fetches the data as objects
    }
    public function updateActivity($data)
    {
        $this->db->query('UPDATE activities 
        SET act_title = :act_title, 
            act_desc = :act_desc, 
            act_start_date = :act_start_date, 
            act_duration = :act_duration, 
            rewardId = :rewardId, 
            act_venue = :act_venue
        WHERE act_id = :act_id');

    $this->db->bind(':act_id', $data['act_id']);
    $this->db->bind(':act_title', $data['act_title']);
    $this->db->bind(':act_desc', $data['act_desc']);
    $this->db->bind(':act_start_date', $data['act_start_date']);
    $this->db->bind(':act_duration', $data['act_duration']);
    $this->db->bind(':rewardId', $data['rewardId']);
    $this->db->bind(':act_venue', $data['act_venue']);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    

    public function deleteRegisteredEvent($id)
    {
        $deleteRegisteredEventQuery = "DELETE FROM registered_events WHERE id = :id";
        $this->db->query($deleteRegisteredEventQuery);
        $this->db->bind(':id', $id);
    
        // Execute the query
        return $this->db->execute();
    }
    
    // Additional method to delete registration from activities table
    public function deleteRegistrationFromActivity($id)
    {
        $deleteRegistrationQuery = "DELETE FROM activities WHERE id = :id";
        $this->db->query($deleteRegistrationQuery);
        $this->db->bind(':id', $id);
    
        // Execute the query
        return $this->db->execute();
    }

  

    private function isUserRegistered($act_id, $users_id) {
        // Check if the user is already registered for the activity
        $this->db->query('SELECT * FROM registered_events WHERE act_id = :act_id AND users_id = :users_id');
        $this->db->bind(':act_id', $act_id);
        $this->db->bind(':users_id', $users_id);

        $this->db->single(); // Assuming a single result is sufficient
        return $this->db->rowCount() > 0;
    }

    public function findActivityById($act_id) {
        $this->db->query('SELECT * FROM activities WHERE act_id = :act_id');
        $this->db->bind(':act_id', $act_id);

        // Assuming you have a single activity for the given ID
        return $this->db->single();
    }



    
    
}
?>