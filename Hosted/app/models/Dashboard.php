<?php

class Dashboard {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Fetch counts
    public function getCounts()
    {
        $counts = array();

        // Fetch total user count
        $this->db->query('SELECT COUNT(*) AS user_count FROM users');
        $result = $this->db->single();
        $counts['user'] = $result->user_count;

        $this->db->query('SELECT COUNT(*) AS admin_count FROM users WHERE roles = "admin"');
        $result = $this->db->single();
        $counts['admin'] = $result->admin_count;

        // Fetch student count
        $this->db->query('SELECT COUNT(*) AS student_count FROM users WHERE roles = "student"');
        $result = $this->db->single();
        $counts['student'] = $result->student_count;


        $this->db->query('SELECT COUNT(*) AS client_count FROM users WHERE roles = "client"');
        $result = $this->db->single();
        $counts['client'] = $result->client_count;

        $this->db->query('SELECT COUNT(*) AS activities FROM activities');
        $result = $this->db->single();
        $counts['activities'] = $result->activities;

        $this->db->query('SELECT COUNT(*) AS rewards FROM rewards');
        $result = $this->db->single();
        $counts['rewards'] = $result->rewards;

        $this->db->query('SELECT COUNT(*) AS crewards FROM rewards WHERE rewardCategory = "Cultural Events"');
        $result = $this->db->single();
        $counts['crewards'] = $result->crewards;

        $this->db->query('SELECT COUNT(*) AS sirewards FROM rewards WHERE rewardCategory = "Service Initiatives"');
        $result = $this->db->single();
        $counts['sirewards'] = $result->sirewards;

        $this->db->query('SELECT COUNT(*) AS sarewards FROM rewards WHERE rewardCategory = "Sports Activities"');
        $result = $this->db->single();
        $counts['sarewards'] = $result->sarewards;

        $this->db->query('SELECT COUNT(*) AS oarewards FROM rewards WHERE rewardCategory = "Outdoor Adventures"');
        $result = $this->db->single();
        $counts['oarewards'] = $result->oarewards;

        $this->db->query('SELECT COUNT(*) AS erewards FROM rewards WHERE rewardCategory = "Education Empowerment"');
        $result = $this->db->single();
        $counts['erewards'] = $result->erewards;

        
        // Add more counts as needed

        return $counts;
    }
}

?>