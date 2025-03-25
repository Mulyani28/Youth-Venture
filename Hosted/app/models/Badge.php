<?php
class Badge {

    private $db;
    public function __construct(){
        $this->db=new Database;
    }

    public function findAllBadges(){
        $this->db->query('SELECT * FROM badges ORDER BY badgeName ASC');

        $results =$this->db->resultSet();

        return $results;
    }


}