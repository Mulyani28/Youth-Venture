<?php
require APPROOT . '/views/includes/head_metronic.php';
require APPROOT . '/views/includes/begin_app.php';

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

        $this->db->query('SELECT COUNT(*) AS registeredstudent_count FROM users WHERE roles = "student" AND institution IS NOT NULL');
        $result = $this->db->single();
        $counts['registeredstudent'] = $result->registeredstudent_count;
        $this->db->query('SELECT COUNT(*) AS femalestudent FROM users WHERE roles = "student" and gender="female"');
        $result = $this->db->single();
        $counts['femalestudent'] = $result->femalestudent;
        $this->db->query('SELECT COUNT(*) AS malestudent FROM users WHERE roles = "student" and gender="male"');
        $result = $this->db->single();
        $counts['malestudent'] = $result->malestudent;


        $this->db->query('SELECT COUNT(*) AS client_count FROM users WHERE roles = "client"');
        $result = $this->db->single();
        $counts['client'] = $result->client_count;
        $this->db->query('SELECT COUNT(*) AS femaleclient FROM users WHERE roles = "client"and gender="female"');
        $result = $this->db->single();
        $counts['femaleclient'] = $result->femaleclient;
        $this->db->query('SELECT COUNT(*) AS maleclient FROM users WHERE roles = "client"and gender="male"');
        $result = $this->db->single();
        $counts['maleclient'] = $result->maleclient;

        $this->db->query('SELECT COUNT(*) AS registeredclient_count FROM users WHERE roles = "client" AND institution IS NOT NULL');
        $result = $this->db->single();
        $counts['registeredclient'] = $result->registeredclient_count;

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

    

        $this->db->query('SELECT COUNT(*) AS studRegisteredEvent FROM registered_events WHERE users_id = :userId');
        $this->db->bind(':userId', $_SESSION['users_id']);
        $result = $this->db->single();
        $counts['studRegisteredEvent'] = $result->studRegisteredEvent;
    
        

        $this->db->query('SELECT COUNT(DISTINCT act_id) AS registeredEvent FROM registered_events');
        $result = $this->db->single();
        $counts['registeredEvent'] = $result->registeredEvent;

        $this->db->query('SELECT COUNT(DISTINCT users_id) AS activeStud FROM registered_events');
        $result = $this->db->single();
        $counts['activeStud'] = $result->activeStud;
        



        $currentTime = date('Y-m-d H:i:s');

        // Adjusted Query
$this->db->query('SELECT 
COUNT(DISTINCT a.act_id) AS upcomingEvents FROM activities a 
LEFT JOIN registered_events re ON a.act_id = re.act_id 
WHERE re.users_id = :userId AND a.act_start_date > :currentTime');

$this->db->bind(':currentTime', $currentTime);
$this->db->bind(':userId', $_SESSION['users_id']);
$result = $this->db->single();
$counts['upcomingEvents'] = $result->upcomingEvents;

$this->db->query('SELECT  COUNT(*) AS upcomingClientEvents FROM activities
WHERE users_id = :userId AND act_start_date > :currentTime');
$this->db->bind(':currentTime', $currentTime);
$this->db->bind(':userId', $_SESSION['users_id']);
$result = $this->db->single();
$counts['upcomingClientEvents'] = $result->upcomingClientEvents;

$this->db->query('SELECT  COUNT(*) AS createdClientEvents FROM activities
WHERE users_id = :userId ');
$this->db->bind(':userId', $_SESSION['users_id']);
$result = $this->db->single();
$counts['createdClientEvents'] = $result->createdClientEvents;

$this->db->query('SELECT 
COUNT(DISTINCT a.act_id) AS upcomingRegisteredEvents FROM activities a 
LEFT JOIN registered_events re ON a.act_id = re.act_id AND a.users_id = re.users_id 
WHERE a.act_start_date > :currentTime AND re.users_id = :userId');

$this->db->bind(':currentTime', $currentTime);
$this->db->bind(':userId', $_SESSION['users_id']);
$result = $this->db->single();
$counts['upcomingRegisteredEvents'] = $result->upcomingRegisteredEvents;


$this->db->query('SELECT 
COUNT(DISTINCT a.act_id) AS pastEvents FROM activities a 
LEFT JOIN registered_events re ON a.act_id = re.act_id AND a.users_id = re.users_id 
WHERE a.act_start_date < :currentTime  AND re.users_id = :userId');

$this->db->bind(':currentTime', $currentTime);
$this->db->bind(':userId', $_SESSION['users_id']);
$result = $this->db->single();
$counts['pastEvents'] = $result->pastEvents;


$this->db->query('SELECT 
COUNT(DISTINCT a.rewardId) AS studClaimedRewards  FROM 
activities a 
JOIN 
    registered_events re ON a.act_id = re.act_id AND re.users_id = :userId 
WHERE re.users_id = :userId');
$this->db->bind(':currentTime', $currentTime);
$this->db->bind(':userId', $_SESSION['users_id']);
$result = $this->db->single();
$counts['studClaimedRewards'] = $result->studClaimedRewards;


            return $counts;
        }


    
}

$dashboard = new Dashboard();
$count = $dashboard->getCounts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 50px auto;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body> 
</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!--begin::Content-->
<div id="kt_app_content_container" class="app-container container-fluid">
<div class="row mb-2"> 
            <!-- Left Column: Total Admin, Total Client, Total Students -->
        <div class="col-md-3 mb-5">
            <?php if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'admin') : ?>
                
                <div class="card border-left-info shadow h-100">
                    <div class="card-body">
                        <!-- Card 1: Total Admin -->
                        
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Users <span style="color: #183D64;">
                                    <div class=" mb-0 font-weight-bold text-gray-800"><?= $count['admin']+$count['client']+$count['student'] ?></span></div>
                                </div>
                            </div>

                        </div>
                        <div class="chart-pie pt-0">
                            <canvas id="myPie"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
    <div class="card shadow"><div class="card-body">
        <!-- Card Header - Dropdown -->
        <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Student <span style="color: #183D64;"></div>
                                        <div class=" mb-0 font-weight-bold text-gray-800"><?= $count['student'] ?></span></div>
                                    
                                </div>

                            </div>
       
        <!-- Card Body -->
        
            <!-- First Chart -->
            <div class="row">
                <div class="chart-pie col-md-6 pt-4">
                    <canvas id="studentsChart1"></canvas>
                <script>
                    var femalestudent1 = <?= $count['femalestudent'] ?>;
                    var malestudent1 = <?= $count['malestudent'] ?>;
                    var ctx1 = document.getElementById("studentsChart1");
                    var students1 = new Chart(ctx1, {
                        type: 'doughnut',
                        data: {
                            labels: ['Male', 'Female'],
                            datasets: [{
                                data: [malestudent1, femalestudent1],
                                backgroundColor: ['#183D64', '#e3e6ec'],
                                hoverBackgroundColor: ['#183D64', '#e3e6ec'],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 50,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            cutoutPercentage: 80,
                        },
                    });
                </script>
                            </div>
                <!-- Second Chart -->
                <div class="chart-pie col-md-6 pt-4">
                    <canvas id="studentsChart2"></canvas>
                <script>
                    var activeStud = <?= $count['activeStud'] ?>;
                    var notactiveStud = <?= $count['student']-$count['activeStud'] ?>;
                    var ctx2 = document.getElementById("studentsChart2");
                    var students2 = new Chart(ctx2, {
                        type: 'doughnut',
                        data: {
                            labels: ['Active', 'Not Active'],
                            datasets: [{
                                data: [activeStud, notactiveStud],
                                backgroundColor: ['#7C1C2B', '#e3e6ec'],
                                hoverBackgroundColor: ['#7C1C2B', '#e3e6ec'],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 50,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            cutoutPercentage: 80,
                        },
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>


                        <!-- ... -->
            <div class="col-md-3 mb-4">
                <div class="card shadow "> <div class="card-body">
                    <!-- Card Header - Dropdown -->
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-2">
                            Total Activities
                        </div>
                        <div class=" mb-0 font-weight-bold text-gray-800"><?= $count['activities'] ?></div>
                    
                    <!-- Card Body -->
                   
                        <div class="chart-pie pt-3">
                            <canvas id="participation2"></canvas> <!-- Change id to "participation2" -->
                            <script>
                                var registeredEvent = <?= $count['registeredEvent'] ?>;
                                var noregisteredEvent = <?= $count['activities'] - $count['registeredEvent'] ?>;
                                var ctx = document.getElementById("participation2"); // Change id to "participation2"
                                var participation = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Has Participation', 'No Participation'],
                                        datasets: [{
                                            data: [registeredEvent, noregisteredEvent],
                                            backgroundColor: ['#FCBD32', '#e3e6ec'],
                                            hoverBackgroundColor: ['#FCBD32', '#d1d4da'],
                                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                                        }],
                                    },
                                    options: {
                                        maintainAspectRatio: false,
                                        tooltips: {
                                            backgroundColor: "rgb(255,255,255)",
                                            bodyFontColor: "#858796",
                                            borderColor: '#dddfeb',
                                            borderWidth: 1,
                                            xPadding: 15,
                                            yPadding: 50,
                                            displayColors: false,
                                            caretPadding: 10,
                                        },
                                        legend: {
                                            display: true,
                                            position: 'bottom',
                                        },
                                        cutoutPercentage: 80,
                                    },
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>


                <div class="col-md-6 mb-2">
                    
                    <div class="card border-left-info shadow h-100">
                        <div class="card-body">
                            <!-- Card 1: Total Admin -->
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Total Client <span style="color: #183D64;">
                                        <div><?= $count['client'] ?></span></div>
                                    </div>
                                </div>

                            </div>
                            <div class="chart-pie pt-4">
                            <canvas id="client"></canvas> <!-- Change id to "participation2" -->
                            <script>
                                var femaleclient = <?= $count['femaleclient'] ?>;
                                var maleclient = <?= $count['maleclient']?>;
                                var ctx = document.getElementById("client"); // Change id to "participation2"
                                var client = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Male', 'Female'],
                                        datasets: [{
                                            data: [maleclient, femaleclient],
                                            backgroundColor: ['#183D64', '#e3e6ec'],
                                            hoverBackgroundColor: ['#17a673', '#d1d4da'],
                                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                                        }],
                                    },
                                    options: {
                                        maintainAspectRatio: false,
                                        tooltips: {
                                            backgroundColor: "rgb(255,255,255)",
                                            bodyFontColor: "#858796",
                                            borderColor: '#dddfeb',
                                            borderWidth: 1,
                                            xPadding: 15,
                                            yPadding: 50,
                                            displayColors: false,
                                            caretPadding: 10,
                                        },
                                        legend: {
                                            display: true,
                                            position: 'bottom',
                                        },
                                        cutoutPercentage: 80,
                                    },
                                });
                            </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2">
    <div class="card border-left-info shadow h-100">
        <div class="card-body">
            <!-- Card 1: Total Admin -->
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Rewards Category
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
            <div class="chart-pie pt-4">
                <canvas id="rewardCategoryCard1"></canvas>
                <script>
                    var ctxRewardCategoryCard1 = document.getElementById("rewardCategoryCard1");
                    var rewardCategoryDataCard1 = {
                        labels: ['Service Initiatives', 'Sports Activities', 'Outdoor Adventures', 'Cultural Events', 'Education Empowerment'],
                        datasets: [{
                            data: [<?= $count['sirewards'] ?>, <?= $count['sarewards'] ?>, <?= $count['oarewards'] ?>, <?= $count['crewards'] ?>, <?= $count['erewards'] ?>],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                            ],
                            hoverBackgroundColor: ['#17a673', '#d1d4da'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }],
                    };

                    var rewardCategoryOptionsCard1 = {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 50,
                            displayColors: false,
                            caretPadding: 10,
                        },
                        legend: {
                            display: true,
                            position: 'left', // Set legend position to left
                        },
                        cutoutPercentage: 80,
                    };

                    var rewardCategoryChartCard1 = new Chart(ctxRewardCategoryCard1, {
                        type: 'pie',
                        data: rewardCategoryDataCard1,
                        options: rewardCategoryOptionsCard1,
                    });
                </script>
            </div>
        </div>
    </div>
</div>

 

            <?php elseif (isset($_SESSION['roles']) && $_SESSION['roles'] === 'client'): ?>
                <div class="row">

            <?php endif; ?>
        </div>


    </div>
</div>


<div class="row">
    <?php if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'client'): ?>

        <div class="col-md-4 mb-4">
                        <div class="card border-left-info shadow h-100">
                            
                                <!-- Card 2: Total Client -->
                                <div class="card-header py-4">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Students Engaged with Company <span style="color: #183D64;"><?= $count['registeredstudent'] ?></span>
                                        </div>
                                    </div>

                                <!-- Card 3: Total Students -->
<div class="card-body">
                                <div class="chart-pie pt-4">
                                    <canvas id="myPie2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

     <!-- Right side -->
        <div class="col-md-4 mb-4">
    <div class="card border-left-info shadow h-100">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-4">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Total Activities Created
                <span style="color: #183D64;"><?= $count['createdClientEvents'] ?></span></div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-bar pt-4">
                <canvas id="clientEvent"></canvas>
                <script>
                    var upcomingClientEvents = <?= $count['upcomingClientEvents'] ?>;
                    var createdClientEvents = <?= $count['createdClientEvents'] ?>;
                    var pastClientEvents = Math.max(0, createdClientEvents - upcomingClientEvents);

                    var ctx = document.getElementById("clientEvent");
                    var clientEvent = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Upcoming', 'Past'],
                            datasets: [{
                                data: [upcomingClientEvents, pastClientEvents],
                                backgroundColor: ['#FCBD32', '#e3e6ec'],
                                hoverBackgroundColor: ['#17a673', '#d1d4da'],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 50,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            cutoutPercentage: 80,
                        },
                    });
                </script>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Left side -->
        <div class="col-md-4 mb-4">
                    <div class="card border-left-info shadow h-100">
                        <!-- Card Header - Dropdown -->


                        <div class="card-header py-4">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Rewards Category
                            </div>                        
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4">
                                <canvas id="rewardCategory"></canvas>
                            </div>
                        </div>
                    </div>
            </div>

       

      <!-- Right column-->
            <!-- <div class="col-md-3 mb-4">
                <div class="card shadow ">
                    Card Header - Dropdown
                    <div class="card-header py-3">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Activities
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count['activities'] ?></div>
                    </div>
                    Card Body
                    <div class="card-body">
                        <div class="chart-bar pt-4">
                            <canvas id="totalActivities"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->
</div>
        <!-- STUDENT ----------------------------------->

    <?php elseif (isset($_SESSION['roles']) && $_SESSION['roles'] === 'student'): ?>   
        <!-- Left side -->
        <div class="col-md-3 mb-4">
    <div class="card shadow">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Rewards Category
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4">
                <canvas id="rewardCategory"></canvas>
                <script>
                    var ctx = document.getElementById("rewardCategory");
                    var rewardCategory = {
                        labels: ['Service Initiatives', 'Sports Activities', 'Outdoor Adventures', 'Cultural Events', 'Education Empowerment'],
                        datasets: [{
                            data: [<?= $count['sirewards'] ?>, <?= $count['sarewards'] ?>, <?= $count['oarewards'] ?>, <?= $count['crewards'] ?>, <?= $count['erewards'] ?>],
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(255, 159, 64)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(54, 162, 235)',
                            ],
                            hoverBackgroundColor: ['#17a673', '#d1d4da'],
                            hoverBorderColor: "rgba(234, 236, 244, 1)",
                        }],
                    };

                    var rewardCategoryOptions = {
                        maintainAspectRatio: false,
                        tooltips: {
                            backgroundColor: "rgb(255,255,255)",
                            bodyFontColor: "#858796",
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 50,
                            displayColors: false,
                            caretPadding: 10,
                        },
                        legend: {
                            display: true,
                            position: 'left',
                        },
                        cutoutPercentage: 80,
                    };

                    var rewardCategoryChart = new Chart(ctx, {
                        type: 'pie',
                        data: rewardCategory,
                        options: rewardCategoryOptions,
                    });
                </script>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-md-3 mb-4">
    <div class="card shadow">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Available Rewards
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count['rewards'] ?></div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4">
                <!-- Use the correct canvas ID -->
                <canvas id="claimedRewards"></canvas>
                <script>
                    var studClaimedRewards = <?= $count['studClaimedRewards'] ?>;
                    var notClaimed = <?= $count['rewards'] - $count['studClaimedRewards'] ?>;
                    var ctx = document.getElementById("claimedRewards");
                    var claimedRewards = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Claimed', 'Not Claimed'],
                            datasets: [{
                                data: [studClaimedRewards, notClaimed],
                                backgroundColor: ['#183D64', '#e3e6ec'],
                                hoverBackgroundColor: ['#17a673', '#d1d4da'],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 50,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            cutoutPercentage: 80,
                        },
                    });
                </script>


                
                            </div>
                        </div>
                    </div>
            </div>

            <!-- Middle side -->
            <div class="col-md-3 mb-4">
    <div class="card shadow ">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Registered Activities
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count['studRegisteredEvent'] ?></div>
            
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-bar pt-4">
                <canvas id="activitiesPieChart"></canvas>
                <script>
                    // Ensure count is properly defined in your PHP code or within a script tag before using it.
                    var upcoming = <?= $count['upcomingEvents'] ?>;
                    var past = <?= $count['studRegisteredEvent'] - $count['upcomingEvents']?>;
                    var ctx = document.getElementById("activitiesPieChart");
                    var activitiesPieChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Upcoming', 'Past'],
                            datasets: [{
                                data: [upcoming, past],
                                backgroundColor: ['#FCBD32', '#e3e6ec'],
                                hoverBackgroundColor: ['#17a673', '#d1d4da'],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 50,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            cutoutPercentage: 80,
                        },
                    });
                </script>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right column-->
            <div class="col-md-3 mb-4">
    <div class="card shadow ">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Total Activities
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count['activities'] ?></div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-bar pt-4">
                <canvas id="totalActivities"></canvas>
                <script>
                    var remainingActivities = <?= $count['activities'] - $count['studRegisteredEvent'] ?>;
                    var ctx = document.getElementById("totalActivities");
                    var totalActivities = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ['Registered', 'Not Registered'],
                            datasets: [{
                                data: [<?= $count['studRegisteredEvent'] ?>, remainingActivities],
                                backgroundColor: ['#7C1C2B', '#e3e6ec'],
                                hoverBackgroundColor: ['#17a673', '#d1d4da'],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 50,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            cutoutPercentage: 80,
                        },
                    });
                </script>
            </div>
        </div>
    </div>
</div>

                        </div>
                    </div>
                </div>
            </div>

    <?php endif; ?> 
</div>

        </div>
</div>


<script>
    var count = <?php echo json_encode($count); ?>;
    var studentCount = count['student'];
    var clientCount = count['client'];
    var adminCount = count['admin'];
    var clientRegistered = count['registeredclient'];
    var studentRegistered = count['registeredstudent'];

    var ctx = document.getElementById("myPie");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Students', 'Clients', 'Admin'],
            datasets: [{
                data: [studentCount, clientCount, adminCount],
                backgroundColor: ['#183D64', '#7C1C2B', '#FCBD32'],
                hoverBackgroundColor: ['#17a673', '#2c9faf', '#FCBD32'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
    var studentnotengaged= count['student']-count['registeredstudent'];
    var ctx = document.getElementById("myPie2");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Engaged', 'Not Engaged'],
            datasets: [{
                data: [studentRegistered, studentnotengaged],
                backgroundColor: ['#183D64', '#7C1C2B'],
                hoverBackgroundColor: ['#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    var studRegisteredEvent=count['studRegisteredEvent'];



    var ctx = document.getElementById("rewardCategory");
    var rewardCategory = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Service Initiatives', 'Sports Activities', 'Outdoor Adventures', 'Cultural Events', 'Education Empowerment'],
        datasets: [{
            data: [count['sirewards'], count['sarewards'], count['oarewards'], count['crewards'], count['erewards']],
            backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
        ],
            hoverBackgroundColor: ['#17a673', '#d1d4da'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
    maintainAspectRatio: false,
    tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 50,
        displayColors: false,
        caretPadding: 10,
    },
    legend: {
        display: true,
        position: 'left', // Set legend position to left
    },
    cutoutPercentage: 80,
},
});




    var ctx = document.getElementById("rewardsBarChart");
    var rewardsBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Cultural Events', 'Service Initiatives', 'Sports Activities', 'Outdoor Adventures', 'Education Empowerment'],
            datasets: [{
                label: 'Number of Rewards',
                backgroundColor: ['#FCBD32', '#7C1C2B', '#183D64', '#e8df66', '#9c5c63'], // Add two colors similar to the provided ones
                borderColor: '#ffffff',
                data: [count['crewards'], count['sirewards'], count['sarewards'], count['oarewards'], count['erewards']],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
        }
    });

    var ctx = document.getElementById("claimedrewardsBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Cultural Events', 'Service Initiatives', 'Sports Activities', 'Outdoor Adventures', 'Education Empowerment'],
            datasets: [{
                label: 'Number of Rewards',
                backgroundColor: ['#FCBD32', '#7C1C2B', '#183D64', '#e8df66', '#9c5c63'], // Add two colors similar to the provided ones
                borderColor: '#ffffff',
                data: [count['crewards'], count['sirewards'], count['sarewards'], count['oarewards'], count['erewards']],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
        }
    });

    var ctx = document.getElementById("testNew");
var testNew = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
            data: [50, 60, 70, 180, 190],
        }],
    },
    options: {
        plugins: {
            datalabels: {
                display: true,
                backgroundColor: '#ccc',
                borderRadius: 3,
                font: {
                    color: 'red',
                    weight: 'bold',
                },
            },
            doughnutlabel: {  // <-- Corrected typo here
                labels: [
                    {
                        text: '550',
                        font: {
                            size: 20,
                            weight: 'bold',
                        },
                    },
                    {
                        text: 'total',
                    },
                ],
            },
        },
    },
});
</script>
        <!-- Add more cards here -->
    </div>
</div>



 
        <?php
    require APPROOT . '/views/includes/end_app.php';
    require APPROOT . '/views/includes/footer_metronic.php';
?>


