<?php
class AcademicInfo {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Fetch institution by profile ID
    public function getInstitutionByProfileId($profileId)
    {
        $this->db->query('SELECT institution FROM academicinfo WHERE profileId = :profileId');
        $this->db->bind(':profileId', $profileId);
        $result = $this->db->single();

        if ($result) {
            return $result->institution;
        } else {
            return 'Default Institution';
        }
    }

    public function getMajor($profileId)
    {
        $this->db->query('SELECT major FROM academicinfo WHERE profileId = :profileId');
        $this->db->bind(':profileId', $profileId);
        $result = $this->db->single();

        if ($result) {
            return $result->major;
        } else {
            return 'Default major';
        }
    }
}
