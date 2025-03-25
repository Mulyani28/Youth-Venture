<?php

// ResumeModel.php

class Resume{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // public function getResumeByStudentID($users_id) {//3
    //     $this->db->query('SELECT resumeID FROM resume WHERE users_id = :users_id');
    //     $this->db->bind(':users_id', $users_id);
        
    //     return $this->db->single();

        
    // }

    public function getUserByID($users_id) {
        $this->db->query("SELECT * FROM users WHERE users_id = :users_id");
        $this->db->bind(':users_id', $users_id);

        $row = $this->db->single();

        return $row;
    }

    public function getSkills($users_id) {
        $this->db->query("SELECT * FROM skills WHERE users_id = :users_id");
        $this->db->bind(':users_id', $users_id);

        $row = $this->db->single();

        return $row;
    }

    public function getActivities($users_id) {
        $this->db->query("
            SELECT activities.act_title, rewards.rewardName
            FROM registered_events 
            INNER JOIN activities ON registered_events.act_id = activities.act_id
            INNER JOIN rewards ON activities.rewardId = rewards.rewardId
            WHERE registered_events.users_id = :users_id
        ");
        $this->db->bind(':users_id', $users_id);
        $activities = $this->db->resultSet();
    
        return $activities;
    }
    

   
    
    
    
    

    // public function getDatafromProfile($users_id){
    //     $this->db->query('SELECT * FROM users WHERE users_id = :users_id') ;
    //     $this->db->query(':users_id', $users_id) ;

    //     return $this->db->single();
    // }
    

    // Add other methods for updating, creating, and deleting resumes as needed
}
