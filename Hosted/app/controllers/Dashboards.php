<?php

class Dashboards extends Controller {
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

        // ... (Other count queries)

        return $counts;
    }
}
