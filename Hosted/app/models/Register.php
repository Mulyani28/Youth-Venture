<?php
//
class Register{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function manageAllRegister(){
        $this->db->query('SELECT * FROM registers');

        $result = $this->db->resultSet();
        return $result;
    }

    // Inside Register model

    public function RegisterAvailable()
    {
        $this->db->query('SELECT * FROM registrations');

        $result = $this->db->resultSet();
        return $result;
    }

    // Inside Register model

public function addRegisterLink($data)
{
    $this->db->query('INSERT INTO registrations (title, description) VALUES (:title, :description)');
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':description', $data['description']);
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
    $this->db->query('SELECT * FROM registrations');
    $result = $this->db->resultSet();
    return $result;
}

// public function updateRegisterStatus($reg_id, $status)
// {
//     $this->db->query('UPDATE registrations SET status = :status WHERE reg_id = :reg_id');

//     $this->db->bind(':status', $status);
//     $this->db->bind(':reg_id', $reg_id);

//     return $this->db->execute();
// }

public function addActivity($data)
{
    $this->db->query('INSERT INTO activities (act_title, act_desc, users_id) VALUES (:act_title, :act_desc, :users_id)');

    // Ensure that 'users_id' key exists in the $data array before binding
    if (isset($data['users_id'])) {
        $this->db->bind(':users_id', $data['users_id']);
    } else {
        // If 'users_id' is not set, you might want to handle it accordingly (throw an error, log, etc.)
        return false;
    }

    $this->db->bind(':act_title', $data['act_title']);
    $this->db->bind(':act_desc', $data['act_desc']);

    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}



}
?>