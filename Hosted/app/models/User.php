<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    private function extractBirthdateFromIC($icNumber) {
        $year = substr($icNumber, 0, 2);
        $month = substr($icNumber, 2, 2);
        $day = substr($icNumber, 4, 2);

        // Assuming the birthdate is in the format 'Y-m-d'
        return "20$year-$month-$day";
    }
    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();

        return $this->db->rowCount() > 0;
    }

    public function updatePassword($data)
    {

        $this->db->query("UPDATE users SET password = :password 
            WHERE email = :email;");

        //Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, password, firstname, birthday, gender, ic, roles) VALUES(:username, :email, :password, :firstname, :birthday, :gender,:ic, :roles)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        // $this->db->bind(':date_registered', $data['date_registered']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':birthday', $data['birthday']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':ic', $data['ic']);
        // $this->db->bind(':street', $data['street']);
        // $this->db->bind(':city', $data['city']);
        // $this->db->bind(':state', $data['state']);
        // $this->db->bind(':postal_code', $data['postal_code']);
        // $this->db->bind(':country', $data['country']);
        $this->db->bind(':roles', $data['roles']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if ($row) {
            $hashedPassword = $row->password;
    
            if (password_verify($password, $hashedPassword)) {
                return $row; // User authenticated successfully
            }
        }
    
        return false; // User not found or authentication failed
    }

    public function createResetEmail($data)
    {

        //admin users
        $this->db->query("INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) 
         VALUES(:pwdResetEmail, :pwdResetSelector, :pwdResetToken, :pwdResetExpires);");

        $this->db->bind(':pwdResetEmail', $data['email']);
        $this->db->bind(':pwdResetSelector', $data['pwdResetSelector']);
        $this->db->bind(':pwdResetToken', $data['pwdResetToken']);
        $this->db->bind(':pwdResetExpires', $data['pwdResetExpires']);

        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteResetEmail($email)
    {

        $this->db->query("DELETE FROM pwdreset WHERE pwdResetEmail = :pwdResetEmail");
        $p = 1;
        $this->db->bind(':pwdResetEmail', $email);
        //execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmailByToken($email)
    {
        //prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //email param will be binded with the email variable.

        $this->db->bind(':email', $email);

        $this->db->execute();

        //Check if email is already registered
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the controller.
    public function findEmailByToken($selector)
    {

        //prepared statement
        $this->db->query('SELECT * FROM pwdreset 
        WHERE pwdResetSelector = :pwdResetSelector AND pwdResetExpires >= :pwdResetExpires');

        //email param will be binded with the email variable.
        
        $currentDate = date("U");

        $this->db->bind(':pwdResetSelector', $selector);
   
        $this->db->bind(':pwdResetExpires', $currentDate);

        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {

            return false;
        }
    }

    // public function login($username, $password) {
    //     $this->db->query('SELECT * FROM users WHERE username = :username');

    //     //Bind value
    //     $this->db->bind(':username', $username);

    //     $row = $this->db->single();

    //     if ($row) {
    //         $hashedPassword = $row->password;
    
    //         if (password_verify($password, $hashedPassword)) {
    //             return $row; // User authenticated successfully
    //         }
    //     }
    
    //     return false; // User not found or authentication failed
    // }

    // public function login($email, $password) {
    //     $this->db->query('SELECT * FROM users WHERE email = :email');

    //     //Bind value
    //     $this->db->bind(':email', $email);

    //     $row = $this->db->single();

    //     if ($row) {
    //         $hashedPassword = $row->password;
    
    //         if (password_verify($password, $hashedPassword)) {
    //             return $row; // User authenticated successfully
    //         }
    //     }
    
    //     return false; // User not found or authentication failed
    // }

    public function getUserImage($email) {
        $this->db->query('SELECT st_image FROM users WHERE email=:email');
        $this->db->bind(':email', $email);
        
        $row = $this->db->single();
    
        return $row ? $row->st_image : null;
    }

    public function getUserFullname($email) {
        $this->db->query('SELECT firstname FROM users WHERE email=:email');
        $this->db->bind(':email', $email);
        
        $row = $this->db->single();
    
        return $row ? $row->firstname : null;
    }
 
    
    }

    //Find user by email. Email is passed in by the Controller.


    // public function isUsernameExists($username) {
    //     $query = "SELECT * FROM users WHERE username = :username";
    //     $result = $this->db->query($query, ['username' => $username]);
        
    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
