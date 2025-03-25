<?php
class Reward {

    private $db;
    public function __construct(){
        $this->db=new Database;
    }

    public function AllCultural(){
        $this->db->query('SELECT * FROM rewards WHERE rewardCategory = "Cultural Events" ORDER BY rewardName ASC');

        $results =$this->db->resultSet();

        return $results;
    }

    public function AllSports(){
        $this->db->query('SELECT * FROM rewards WHERE rewardCategory = "Sports Activities" ORDER BY rewardName ASC');

        $results =$this->db->resultSet();

        return $results;
    }

    public function AllOutdoor(){
        $this->db->query('SELECT * FROM rewards WHERE rewardCategory = "Outdoor Adventures" ORDER BY rewardName ASC');

        $results =$this->db->resultSet();

        return $results;
    }
    public function AllService(){
        $this->db->query('SELECT * FROM rewards WHERE rewardCategory = "Service Initiatives" ORDER BY rewardName ASC');

        $results =$this->db->resultSet();

        return $results;
    }
    public function AllEducation(){
        $this->db->query('SELECT * FROM rewards WHERE rewardCategory = "Education Empowerment" ORDER BY rewardName ASC');

        $results =$this->db->resultSet();

        return $results;
    }
    public function addReward($data)
    {
        $this->db->query('INSERT INTO rewards (rewardId,rewardCategory, rewardName, rewardDesc,rewardCriteria) VALUES (:rewardId,:rewardCategory, :rewardName, :rewardDesc,:rewardCriteria)');
        $this->db->bind(':rewardCategory', $data['rewardCategory']);
        $this->db->bind(':rewardName', $data['rewardName']);
        $this->db->bind(':rewardDesc', $data['rewardDesc']);
        $this->db->bind(':rewardCriteria', $data['rewardCriteria']);
        $this->db->bind(':rewardId', $data['rewardId']);


        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function updateReward($data)
    {
        $this->db->query('UPDATE rewards SET rewardCategory = :rewardCategory, rewardName = :rewardName, rewardDesc = :rewardDesc, rewardCriteria = :rewardCriteria WHERE rewardId = :rewardId');
        $this->db->bind(':rewardId', $data['rewardId']);
        $this->db->bind(':rewardCategory', $data['rewardCategory']);
        $this->db->bind(':rewardName', $data['rewardName']);
        $this->db->bind(':rewardDesc', $data['rewardDesc']);
        $this->db->bind(':rewardCriteria', $data['rewardCriteria']);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function findRewardById($rewardId)
    {
        $this->db->query('SELECT * FROM rewards WHERE rewardId = :rewardId');
        $this->db->bind(':rewardId', $rewardId);

        $row = $this->db->single();

        return $row;
    }

    public function getRewards()
{
    $this->db->query('SELECT * FROM rewards');
    $rewards = $this->db->resultSet(); // Assuming resultSet is a method to fetch multiple rows.

    return $rewards;
}

    public function deleteReward($rewardId){
        $this->db->query('DELETE FROM rewards WHERE rewardId = :rewardId');

        $this->db->bind(':rewardId', $rewardId);

        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    // Add this method to the existing Reward model

public function getAllClaimRewards()
{
    //$this->db->query('SELECT cr.*, r.rewardName, u.firstname FROM claimrewards cr JOIN rewards r ON cr.rewardId = r.rewardId JOIN users u ON cr.users_id = u.users_id');
    $this->db->query('SELECT a.*, re.*, rw.rewardName, re.users_id,u.firstname FROM activities a JOIN registered_events re ON a.act_id = re.act_id JOIN rewards rw ON a.rewardId = rw.rewardId JOIN users u ON re.users_id=u.users_id');

    $results = $this->db->resultSet();

    return $results;
}


public function deleteclaimreward($claimRewardId)
{
    $this->db->query('DELETE FROM claimrewards WHERE claimRewardId = :claimRewardId');
    $this->db->bind(':claimRewardId', $claimRewardId);

    return $this->db->execute();
}

    
}
