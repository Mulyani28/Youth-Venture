<?php

class Page
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function studentProfile()
    {

        $this->db->query("SELECT * FROM users WHERE email = :email");

        $this->db->bind(':email', $_SESSION['email']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function updateStudentProfile($data)
{
    $query = "UPDATE users
              SET ic = :ic, 
                  firstname = :firstname, 
                  gender = :gender, 
                  street = :street, 
                  institution = :institution,
                  city = :city,
                  postal_code = :postal_code,
                  country = :country,
                  state = :state,
                  phone = :phone,
                  major = :major";
    
    // Check if st_image is provided
    if (isset($data['st_image'])) {
        $query .= ", st_image = :st_image";
    }
    
    $query .= " WHERE email = :email";
    
    $this->db->query($query);
    
    // Bind parameters
    $this->db->bind(':email', $_SESSION['email']);
    $this->db->bind(':ic', $data['ic']);
    $this->db->bind(':firstname', $data['firstname']);
    $this->db->bind(':gender', $data['gender']);
    $this->db->bind(':street', $data['street']);
    $this->db->bind(':institution', $data['institution']);
    $this->db->bind(':city', $data['city']);
    $this->db->bind(':state', $data['state']);

    $this->db->bind(':postal_code', $data['postal_code']);
    $this->db->bind(':country', $data['country']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':major', $data['major']);
    
    // Bind st_image only if it is provided
    if (isset($data['st_image'])) {
        $this->db->bind(':st_image', $data['st_image']);
    }
    
    // Execute the query
    if (!$this->db->execute()) {
        // Output the detailed error message
        $errorInfo = $this->db->getErrorInfo();
        echo "Error: " . $errorInfo['message'] . " (" . $errorInfo['code'] . ")";
        return false;
    }

    return true;
}


public function updateClientProfile($data)
{
    $query = "UPDATE users
              SET ic = :ic, 
                  firstname = :firstname, 
                  gender = :gender, 
                  street = :street, 
                  institution = :institution,
                  city = :city,
                  postal_code = :postal_code,
                  country = :country,
                  state = :state,
                  phone = :phone";
    
    // Check if st_image is provided
    if (isset($data['st_image'])) {
        $query .= ", st_image = :st_image";
    }
    
    $query .= " WHERE email = :email";
    
    $this->db->query($query);
    
    // Bind parameters
    $this->db->bind(':email', $_SESSION['email']);
    $this->db->bind(':ic', $data['ic']);
    $this->db->bind(':firstname', $data['firstname']);
    $this->db->bind(':gender', $data['gender']);
    $this->db->bind(':street', $data['street']);
    $this->db->bind(':institution', $data['institution']);
    $this->db->bind(':city', $data['city']);
    $this->db->bind(':state', $data['state']);
    $this->db->bind(':postal_code', $data['postal_code']);
    $this->db->bind(':country', $data['country']);
    $this->db->bind(':phone', $data['phone']);
    
    // Bind st_image only if it is provided
    if (isset($data['st_image'])) {
        $this->db->bind(':st_image', $data['st_image']);
    }
    
    // Execute the query
    if (!$this->db->execute()) {
        // Output the detailed error message
        $errorInfo = $this->db->getErrorInfo();
        echo "Error: " . $errorInfo['message'] . " (" . $errorInfo['code'] . ")";
        return false;
    }

    return true;
}

public function searchByName($firstname) {
    $this->db->query("SELECT * FROM users WHERE firstname LIKE :firstname");
    $this->db->bind(':firstname', '%' . $firstname . '%');
    return $this->db->resultSet();
}


public function getSkills($users_id)
{
    $this->db->query('SELECT s.*, u.firstname, u.email FROM skills s JOIN users u ON s.users_id = u.users_id WHERE s.users_id = :users_id');
    $this->db->bind(':users_id', $users_id);
    $result = $this->db->single();

    if (!$result) {
        $this->db->query('INSERT INTO skills (users_id, language, technical, soft) VALUES (:users_id, "", "", "")');
        $this->db->bind(':users_id', $users_id);
        $this->db->execute();

        // Fetch the newly created empty record
        $this->db->query('SELECT s.*, u.firstname, u.email FROM skills s RIGHT JOIN users u ON s.users_id = u.users_id WHERE s.users_id = :users_id');
        $this->db->bind(':users_id', $users_id);
        $result = $this->db->single();
    }
    $results = $this->db->resultSet();
    return $results;
}


public function updateSkills($data)
{
    $this->db->query('UPDATE skills SET language = :language, technical = :technical, soft = :soft WHERE users_id = :users_id');
    $this->db->bind(':language', $data['language']);
    $this->db->bind(':technical', $data['technical']);
    $this->db->bind(':soft', $data['soft']);
    $this->db->bind(':users_id', $_SESSION['users_id']); // Assuming you store user_id in the session

    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}


public function getAllClaimRewards()
{
    //$this->db->query('SELECT cr.*, r.rewardName, u.firstname FROM claimrewards cr JOIN rewards r ON cr.rewardId = r.rewardId JOIN users u ON cr.users_id = u.users_id');
    $this->db->query('SELECT a.*, re.*, rw.rewardName,re.users_id,rw.rewardCriteria FROM activities a JOIN registered_events re ON a.act_id = re.act_id JOIN rewards rw ON a.rewardId = rw.rewardId');

    $results = $this->db->resultSet();

    return $results;
}
    

}


    
    
    

    


//BAWAH NI YANG JADIII
    // public function updateStudentProfile($data)
    // {
    //     if (isset($data['st_image'])) {
    
    //         $this->db->query("UPDATE users
    //         SET ic = :ic, firstname = :firstname, gender = :gender, street = :street, institution= :institution,st_image = :st_image WHERE email = :email");
    
    //         $this->db->bind(':st_image', $data['st_image']); // Corrected binding
    //     } else {
    
    //         $this->db->query("UPDATE users
    //         SET ic = :ic,
    //         firstname = :firstname,
    //         gender = :gender, 
    //         street = :street,
    //         institution = :institution,
    //         WHERE email = :email");

           
    //     }
    
    //     // Bind other parameters
    //     $this->db->bind(':email', $_SESSION['email']);
    //     $this->db->bind(':ic', $data['ic']);
    //     $this->db->bind(':firstname', $data['firstname']);
    //     $this->db->bind(':gender', $data['gender']);
    //     $this->db->bind(':street', $data['street']);
    //     //$this->db->bind(':city', $data['city']);
    //     //$this->db->bind(':state', $data['state']);
    //     //$this->db->bind(':postal_code', $data['postal_code']);
    //     //$this->db->bind(':country', $data['country']);
    //     //$this->db->bind(':phone', $data['phone']);
    //     $this->db->bind(':institution', $data['institution']);
    //     //$this->db->bind(':major', $data['major']);
    
    //     // Execute the query
    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    //ATAS NI YANG JADIIIIIIII




    // public function updateStudentProfile($data)
    // {

 
    //     if (isset($data['st_image'])) {

    //     $this->db->query("UPDATE users
    //     SET ic = :ic, firstname = :firstname, gender = :gender,street  = :street, city  = :city, postal_code  = :postal_code,country=:country,phone=:phone, institution=:institution,major=:major,st_image:st_image= WHERE email   = :email;");

    //     $this->db->bind(':email', $_SESSION['email']);
    //     $this->db->bind(':ic', $data['ic']);
    //     $this->db->bind(':firstname', $data['firstname']);
    //     $this->db->bind(':gender', $data['gender']);
    //     $this->db->bind(':street', $data['street']);
    //     $this->db->bind(':city', $data['city']);
    //     $this->db->bind(':state', $data['state']);
    //     $this->db->bind(':postal_code', $data['postal_code']);
    //     $this->db->bind(':country', $data['country']);
    //     $this->db->bind(':phone', $data['phone']);
    //     $this->db->bind(':institution', $data['institution']);
    //     $this->db->bind(':major', $data['major']);


    //     }else{

    //     $this->db->query("UPDATE users
    //     SET ic = :ic, firstname = :firstname, gender = :gender,street  = :street, city  = :city, postal_code  = :postal_code,country=:country,phone=:phone, institution=:institution,major=:major WHERE email   = :email;");


    //     $this->db->bind(':email', $_SESSION['email']);
    //     $this->db->bind(':ic', $data['ic']);
    //     $this->db->bind(':firstname', $data['firstname']);
    //     $this->db->bind(':gender', $data['gender']);
    //     $this->db->bind(':street', $data['street']);
    //     $this->db->bind(':city', $data['city']);
    //     $this->db->bind(':state', $data['state']);
    //     $this->db->bind(':postal_code', $data['postal_code']);
    //     $this->db->bind(':country', $data['country']);
    //     $this->db->bind(':phone', $data['phone']);
    //     $this->db->bind(':institution', $data['institution']);
    //     $this->db->bind(':major', $data['major']);
            
    //     }
        
    //     //execute function
    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

 
