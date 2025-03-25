<?php

class Rewards extends Controller
{
    protected $rewardModel;
    public function __construct()
    {
        $this->rewardModel = $this->model('Reward');
    }

    public function index()
    {
        $culturalRewards = $this->rewardModel->AllCultural();
        $sportsRewards = $this->rewardModel->AllSports();
        $outdoorRewards = $this->rewardModel->AllOutdoor();
        $serviceRewards = $this->rewardModel->AllService();
        $educationRewards = $this->rewardModel->AllEducation();


        $data = [
            'rewards' => [
                'cultural' => $culturalRewards,
                'sports' => $sportsRewards,
                'outdoor' => $outdoorRewards,
                'service' => $serviceRewards,
                'education' => $educationRewards,
            ],
        ];

        $this->view('rewards/index', $data);
    }

    public function sports()
    {
        $culturalRewards = $this->rewardModel->AllCultural();
        $sportsRewards = $this->rewardModel->AllSports();
        $outdoorRewards = $this->rewardModel->AllOutdoor();
        $serviceRewards = $this->rewardModel->AllService();
        $educationRewards = $this->rewardModel->AllEducation();

        $data = [
            'rewards' => [
                'cultural' => $culturalRewards,
                'sports' => $sportsRewards,
                'outdoor' => $outdoorRewards,
                'service' => $serviceRewards,
                'education' => $educationRewards,
            ],
        ];

        $this->view('rewards/sports', $data);
    }

    public function outdoor()
    {
        $culturalRewards = $this->rewardModel->AllCultural();
        $sportsRewards = $this->rewardModel->AllSports();
        $outdoorRewards = $this->rewardModel->AllOutdoor();
        $serviceRewards = $this->rewardModel->AllService();
        $educationRewards = $this->rewardModel->AllEducation();

        $data = [
            'rewards' => [
                'cultural' => $culturalRewards,
                'sports' => $sportsRewards,
                'outdoor' => $outdoorRewards,
                'service' => $serviceRewards,
                'education' => $educationRewards,
            ],
        ];

        $this->view('rewards/outdoor', $data);
    }

    public function service()
    {
        $culturalRewards = $this->rewardModel->AllCultural();
        $sportsRewards = $this->rewardModel->AllSports();
        $outdoorRewards = $this->rewardModel->AllOutdoor();
        $serviceRewards = $this->rewardModel->AllService();
        $educationRewards = $this->rewardModel->AllEducation();

        $data = [
            'rewards' => [
                'cultural' => $culturalRewards,
                'sports' => $sportsRewards,
                'outdoor' => $outdoorRewards,
                'service' => $serviceRewards,
                'education' => $educationRewards,
            ],
        ];

        $this->view('rewards/service', $data);
    }

    public function education()
    {
        $culturalRewards = $this->rewardModel->AllCultural();
        $sportsRewards = $this->rewardModel->AllSports();
        $outdoorRewards = $this->rewardModel->AllOutdoor();
        $serviceRewards = $this->rewardModel->AllService();
        $educationRewards = $this->rewardModel->AllEducation();

        $data = [
            'rewards' => [
                'cultural' => $culturalRewards,
                'sports' => $sportsRewards,
                'outdoor' => $outdoorRewards,
                'service' => $serviceRewards,
                'education' => $educationRewards,
            ],
        ];

        $this->view('rewards/education', $data);
    }
    public function create()
{
    // if (!isLoggedIn()) {
    //     header("Location: " . URLROOT . "/rewards");
    //     exit();
    // }

    if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'student') {
        // Redirect to some unauthorized page or display an error message
        header("Location: " . URLROOT . "/rewards");
        exit();
    }

    $data = [
        'rewardCategory' => '',
        'rewardName' => '',
        'rewardDesc' => '',
        //'rewardPoints' => '',
        'rewardCriteria' => '',
        
    ];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_REWARD = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'rewardCategory' => trim($_REWARD['rewardCategory']),
            'rewardName' => trim($_REWARD['rewardName']),
            'rewardDesc' => trim($_REWARD['description']),
            'rewardCriteria' => trim($_REWARD['criteria'])
        ];

        if ($data['rewardCategory'] && $data['rewardName'] && $data['rewardDesc']  && $data['rewardCriteria']) {
            if ($this->rewardModel->addReward($data)) {
                header("Location: " . URLROOT . "/rewards");
            } else {
                die("Something went wrong :(");
            }
        } else {
            $this->view('rewards/index', $data);
        }
    }

    $this->view('rewards/create', $data);
}

    public function update($rewardId)
    {
        if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'student') {
            // Redirect to some unauthorized page or display an error message
            header("Location: " . URLROOT . "/rewards");
            exit();
        }

        $reward = $this->rewardModel->findRewardById($rewardId);

        // if (!isLoggedIn()) {
        //     header("Location: " . URLROOT . "/rewards");
        // }

        $data = [
            'reward'=>$reward,
            'rewardId'=>'',
            'rewardCategory' => '',
            'rewardName' => '',
            'rewardDesc' => '',
            'rewardCriteria' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_REWARD = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'rewardId' => $rewardId,
                'rewardCategory' => trim($_REWARD['rewardCategory']),
                'rewardName' => trim($_REWARD['rewardName']),
                'rewardDesc' => trim($_REWARD['description']),
                'rewardCriteria' => trim($_REWARD['criteria']),

            ];
//
            if ($data['rewardCategory'] && $data['rewardName'] && $data['rewardDesc'] && $data['rewardCriteria']) {
                if ($this->rewardModel->updateReward($data)) {
                    header("Location: " . URLROOT . "/rewards");
                } else {
                    die("Something went wrong :(");
                }
            } else {
                $this->view('rewards/index', $data);
            }
        }

        $this->view('rewards/update', $data); 
    }

    public function delete($rewardId)
    {
        $reward = $this->rewardModel->findRewardById($rewardId);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/rewards");
        }

        $data = 
        [
            'reward'=>$reward,
            'rewardId'=>'',
            'rewardCategory' => '',
            'rewardName' => '',
            'rewardDesc' => '',
            //'rewardPoints' => '',
            'rewardCriteria' => '',
        ];

        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        }

        if($this->rewardModel->deleteReward($rewardId)){
            header("Location: " . URLROOT . "/rewards");
        }
        else
        {
            die('Something went wrong..');
        }
            
    }

    public function claimRewards()
    {
        $claimRewardId = $this->rewardModel->getAllClaimRewards();
        $studentReward = $this->rewardModel->getAllClaimRewards();

        $data = [
            'claimRewardId' => $claimRewardId,
            'rewardId'=> $claimRewardId,
            'users_id'=>$claimRewardId,
            'rewardName'=>$claimRewardId,
            'firstname'=>$claimRewardId,
            'rewardDesc'=>$claimRewardId,
            'studentReward'=>$studentReward,

        ];

        $this->view('rewards/claimrewards', $data);
    }
    
    public function deleteclaim($claimRewardId)
    {
        //$claimRewardId = $this->rewardModel->getAllClaimRewards();

        $data = [
            'claimRewardId' => $claimRewardId,
            'rewardId'=> ' ',
            'users_id'=>' ',
            'rewardName'=>' ',
            'firstname'=>' ',
        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        }
    
        if ($this->rewardModel->deleteclaimreward($claimRewardId)) {
            header("Location: " . URLROOT . "/rewards/claimrewards");
            exit();
        } else {
            die('Something went wrong..');
        }
    }
    

}
?>
